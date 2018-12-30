<?php  
  session_start();
?>

<!DOCTYPE html5>
<head>
    <title>Softlinkasia</title>
    
    <link rel="stylesheet" href="css/style.css"> 


</head>

<body>

	
	<?php
	    include_once "assets/header.php";
	?>
	<div class="content">

      <?php 
       

       if( isset( $_SESSION['user_id']))
       {
          
          header("Location:http://localhost:81/CRUD/home.php");
       }
       else
       {
          include_once "login/login_new.php";
          
       }
      
      

      ?>
    
    </div> 

   <?php
	    include_once "assets/footer.php";
	?> 
</body>
</html>
