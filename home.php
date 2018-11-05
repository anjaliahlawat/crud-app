<?php
    session_start();
?>

<!DOCTYPE HTML5>
<head>
    <title>Softlinkasia</title>
    <link rel="stylesheet" href="css/style.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<script type="text/javascript" src="admin/admin-main.js"></script>
</head>

<body>

    <?php
    if ( isset( $_SESSION['user_id']) )
    {
      include_once "assets/header_new.php";
    }
    else 
    {
      include_once "assets/header.php";
    }
        
    ?>
   <div class="content">
   
    
    
   
 <?php
    include_once "dbh2.inc.php";
    include_once "login/dbh.inc.php";

    if ( isset( $_SESSION['user_id']) )
    {
    // type of user
       
       $user_id = $_SESSION['user_id'];
       $sql = "SELECT * FROM users WHERE user_id ='$user_id'";
       $result = mysqli_query($conn, $sql);
       $row = mysqli_fetch_assoc($result);
       $type = $row['type'];
       if ($type == "admin")
       {

          include_once "admin/admin.php";
       }
       elseif ($type == "director")
       {
          include_once "director/direc.php";	
       }
       elseif ($type == "employee")
       {
    	  include_once "employee/employee.php";
       }
    }
    else
    {
	    echo 'you are not logged in.';
    }
   ?>
</div> 

   <?php
        require_once "assets/footer.php";
    ?> 
</body>

</html>