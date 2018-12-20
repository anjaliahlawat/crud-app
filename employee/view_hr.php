<?php
   include_once "dbh.inc.php";
?>

<div id="view_emp">
   <input class="Afield" id="view1" type="text" onkeyup="myFunction()" name="name" placeholder="type name here"/> 
   <form method="post" action="home.php">
     <table id="show_emp">
      <?php   
        $sql1 = "SELECT id, emp_id, name, designation, qualification, experience_prior, experience_current, job_resp, area_of_exp  FROM securelogin.hr_table ";
        if (mysqli_query($conn, $sql1))
        {
            $result = mysqli_query($conn, $sql1);
            $resultcheck = mysqli_num_rows($result);
            if ($resultcheck < 1)
		    {
		        echo "<p>No employee details available!</p>";
		    }
		    else
	       {
	      	  echo "<tr>";
	      	  echo "<th>S.No</th>";
	      	  echo "<th>Emp. ID </th>";
	      	  echo "<th>Name</th>";
	      	  echo "<th>Designation</th>";
	      	  echo "<th>Qualification</th>";
	      	  echo "<th>Experience Prior</th>";
	      	  echo "<th>Experience current</th>";
	      	  echo "<th>Job Responsibility</th>";
	      	  echo "<th>Area of Expertise</th>";
	      	  echo "</tr>";
	          $count = 1;
	          $counter = 0;
	      	  while ($row = mysqli_fetch_assoc($result))
	          {
	                 echo "<tr>";
	                 echo "<td>" . $count . "</td>";
	                 echo "<td>" . $row['emp_id'] . "<input type='hidden' value=". $row['id'] . " name='id[]'/></td>";
	                 echo "<td>" . $row['name'] . "<input type='hidden' value=".$row['name'] ." name='name[]'/></td>";
	                 echo "<td>" . $row['designation'] . "</td>";
	                 echo "<td>" . $row['qualification'] .  "</td>";
	                 echo "<td>" . $row['experience_prior'] . "</td>";
	                 echo "<td>" . $row['experience_current'] . "</td>";
	                 echo "<td>" . $row['job_resp'] . "</td>";
	                 echo "<td>" . $row['area_of_exp'] . "</td>";
	                 echo "<td id='last_td1'><input type='submit' class='form_btn' id='view_emp_details' name='view_emp_details[".$counter."]' value='Edit Details'></td>";
	                 echo "</tr>"; 
	                 $count++;
	                 $counter++; 
	          }
		   }
		}
		else 
	    {
	       echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
	    }

   ?>
    </table>
   
   </form>
</div>