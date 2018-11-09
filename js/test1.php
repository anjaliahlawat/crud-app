<?php
   $sql0 = "SELECT client_name FROM main";
   $result1 = mysqli_query($conn, $sql0);
   $row = mysqli_fetch_assoc($result1);
   if(isset($_POST['suggestion']))
   {
	    $name = $_POST['suggestion'];
    
      if(!empty($name))
      {
    	   while($row = mysqli_fetch_assoc($result))
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