<?php
   include_once "dbh2.inc.php";
   $sql0 = "SELECT client_name FROM main";
   $result1 = mysqli_query($conn, $sql0);
   if(isset($_POST['suggestion']))
   {
	    $name = $_POST['suggestion'];
    
      if(!empty($name))
      {
    	   while($row = mysqli_fetch_assoc($result1))
         {
             if(strpos($row['client_name'], $name) !== false)
             {
                  echo $row['client_name'];
                  echo "<br>";
             }
         }
      }
    
   }


?>