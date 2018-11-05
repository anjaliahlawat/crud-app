<!DOCTYPE html5>
<head>
    <title>Softlinkasia</title>
    <link rel="stylesheet" href="css/style.css"> 

</head>
</head>
<body class="register_body">

  <h2 class="register_heading"> Register Here</h2>
  <form class="register_form" action="register.inc.php" method="post">
  	
   <br/>
   <table class="register_table">
   <tr>
      
      <td><input class="register_text" type="text" name="username" placeholder="Username" /></td>
   </tr>

   <tr>
      
      <td><input class="register_text" type="password" name="password" placeholder="Password" /></td>
   </tr> 

     <tr>
      
      <td><input class="register_text" type="text" name="code" placeholder="Your emp code" /></td>
   </tr>

   <tr>
   
    <td><select class="register_select" name="select_type">
           <option value="" disabled selected>Select your type</option>
           <option  name="director" value="director">Director</option>
    	   <option  name="admin" value="admin">Admin</option>
    	   <option  name="employee" value="employee">Employee</option>

    </select></td>
    </tr>

   <tr>
     <td><input class="register_bttn" id="register_bttn1"   type="submit" value="Register" name="Register"/><input class="register_bttn" id="register_bttn2" type="reset" value="Reset"/></td>


    </tr>

    

    </table>


  </form>
    <h3 class="sft"> Softlink asia Pvt Ltd</h3>
</body>
</html>