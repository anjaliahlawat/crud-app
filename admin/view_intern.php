<?php
   include_once "dbh.inc.php";
?>
<div id="view_intern_page">

<input class="Afield" id="view1_in" type="text" onkeyup="myFunction()" name="name" placeholder="type name here"/>
   

<table id="show_interns">
<?php
    
    $sql_in = "SELECT * FROM intern";
    if (mysqli_query($conn, $sql_in))
    {

      $result_in = mysqli_query($conn, $sql_in);
      $resultcheck_in = mysqli_num_rows($result_in);
      if ($resultcheck_in < 1)
      {
          echo "<p>No details of Intern is available!</p>";
      }
      else
      {
      	    echo "<tr>";
      	    echo "<th>S.No </th>";
      	    echo "<th>Intern </th>";
      	    echo "<th>Address</th>";
      	    echo "<th>Contact No.</th>";
      	    echo "<th>College</th>";
      	    echo "<th>Degree</th>";
      	    echo "<th>Grad. year</th>";
      	    echo "<th>Worked On</th>";
      	    echo "<th>Start Date</th>";
      	    echo "<th>End Date</th>";
      	    echo "</tr>";
            $count = 1;
            while ($row = mysqli_fetch_assoc($result_in))
              {

                 echo "<tr>";
                 echo "<td>" . $count . "</td>";
                 echo "<td>" . $row['name'] . "</td>";
                 echo "<td>" . $row['addrs'] . "</td>";
                 echo "<td>" . $row['contact_no'] . "</td>";
                 echo "<td>" . $row['college'] . "</td>";
                 echo "<td>" . $row['degree'] . "</td>";
                 echo "<td>" . $row['grad_year'] . "</td>";
                 echo "<td>" . $row['worked_on'] . "</td>";
                 echo "<td>" . $row['start_date'] . "</td>";
                 echo "<td>" . $row['end_date'] . "</td>";
                 echo "<td id='last_td4'><a href='#' id='edit'><img src='admin/edit.png'/></a><a href='#' id='delete'><img src='admin/delete.png'/></a></td>";
                 echo "</tr>"; 
                 $count++; 
             }
      }

   }
   else
   {
   	    echo "Error: " . $sql_in . "<br>" . mysqli_error($conn);
   }

?>

</table>

</div>