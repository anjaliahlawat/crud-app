<?php
   include_once "dbh.inc.php";
?>

<div id="view_emp">
   <input class="Afield" id="view1" type="text" onkeyup="myFunction()" name="name" placeholder="type name here"/> 
   <form method="post" action="home.php">
     <table id="show_emp">
        <?php   
        $sql1 = "SELECT * FROM securelogin.training_table ";
        if (mysqli_query($conn, $sql1))
        {
            $result = mysqli_query($conn, $sql1);
            $resultcheck = mysqli_num_rows($result);
            if ($resultcheck < 1)
		    {
		        echo "<p>No training details available!</p>";
		    }
		    else
	       {
              echo "<tr>";
	      	  echo "<th>S.No</th>";	      	  
	      	  echo "<th>Name</th>";
	      	  echo "<th>Designation</th>";
	      	  echo "<th>Cadre </th>";
	      	  echo "<th>Months</th>";
	      	  echo "<th>Status</th>";
	      	  echo "<th>Faculty</th>";
	      	  echo "<th>Trainee Name</th>";
	      	  echo "<th>Venue</th>";
	      	  echo "<th>Training Date</th>";
	      	  echo "<th>Training Time</th>";
	      	  echo "<th>Topic</th>";
	      	  echo "<th>Rating</th>";
	      	  echo "</tr>";
	          $count = 1;
	          $counter = 0;
	      	  while ($row = mysqli_fetch_assoc($result))
	      	  {
                     echo "<tr>";
	                 echo "<td>" . $count . "</td>";
	                 echo "<td>" . $row['name'] . "<input type='hidden' value=".$row['name'] ." name='name[]'/></td>";
	                 echo "<td>" . $row['designation'] . "</td>";
	                 echo "<td>" . $row['cadre'] . "<input type='hidden' value=". $row['id'] . " name='id[]'/></td>";
	                 echo "<td>" . $row['months'] .  "</td>";
	                 echo "<td>" . $row['status'] . "</td>";
	                 echo "<td>" . $row['faculty'] . "</td>";
	                 echo "<td>" . $row['trainee_name'] . "</td>";
	                 echo "<td>" . $row['venue'] . "</td>";
	                 echo "<td>" . $row['t_date'] . "</td>";
	                 echo "<td>" . $row['t_time'] . "</td>";
	                 echo "<td>" . $row['topic'] . "</td>";
	                 echo "<td>" . $row['rating'] . "</td>";
	                 echo "<td id='last_td1'><input type='submit' class='form_btn' id='view_t_details' name='view_t_details[".$counter."]' value='Edit Details'></td>";
	                 echo "</tr>"; 
	                 $count++;
	                 $counter++;
	      	  }
	       }
	    }
	    ?>

     </table>
   </form>
</div>