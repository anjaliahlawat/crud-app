<?php
    session_start();
?>

<!DOCTYPE HTML5>
<head>
    <title>Softlinkasia</title>
    <link rel="stylesheet" href="CRUD/css/style.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <style type = "text/css" media = "all">
    #chnge_pwd, #save_pwd
    {
	   width:130px;
	   background-color: #3a3434;
       color: white;
       width: 130px;
       height:35px;
       border-radius: 7px;
       border: 1px solid #3a3434;
       cursor: pointer;
    }
    #chnge_pwd
    {
    	position: relative;
    	top:10em;
    	left:13em;
    }
    #chnge_pwd:hover
    {
	   transform:scale(1.1);
    }
    #save_pwd
    {
    	position: relative;
    	top:9em;
    	left:12em;
    }
    table
    {
    	position: relative;
    	top:5em;
        left:3.5em;
    }
    h1
    {
    	font-size: 25px;
    	position: relative;
    	left:5em;
    }
    #save_pwd:hover
    {
	   transform:scale(1.1);
    }
    #setting_div2
    {
    	display: none;
    }
    #setting_div 
   {
	  height: 100%;
	  
   }
   #setting_div a
   {
     text-decoration: none;
     position: relative;
     top:5em;
     left:47em;
     color: blue;
   }
   #setting_div a:hover
   {
      color: red;
   }
   form
   {
   	  border:1px solid black;
      height:70%;
      width:40%;
	  position: relative;
      top:5em;
      left:20em;
      background-color:#efeeed;
   }
    </style>
    <script type="text/javascript">
      $(document).ready(function(){
    	$("#chnge_pwd").click(function()
    	{
            $("#setting_div2").css("display", "block");
            $("#chnge_pwd").css("display", "none");
    	});
      });
    </script>
</head>
<body>
 <?php
    if ( isset( $_SESSION['user_id']) )
    {
 ?>
   <div id="setting_div">
      <form action="setting_logic.php" method="POST">
         <h1> Password Setting</h1>
         <input type="button" id="chnge_pwd" name="chnge_pwd" value="Change Password"/>
         <div id="setting_div2">
            <table>
               <tr>
                  <td><label>Type old password:</label></td>
                  <td><input type="password" name="old_pwd" id="oldpwd"/></td>
               </tr>
               <tr>
                  <td><label>Type new password:</label></td>
                  <td><input type="password" name="new_pwd" id="newpwd"/></td>
               </tr>
            </table>
             <input type="submit" id="save_pwd" name="save_pwd" value="Save Changes"/>
         </div>
      </form>
      <a href="http://localhost/CRUD/softlinkasia.php">Back to home</a>
   </div>
 <?php
   }
   else
   {
   	    header("Location:http://localhost/CRUD/softlinkasia.php");
        exit();
   }
 ?>
  
</body>

</html>