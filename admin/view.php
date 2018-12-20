<?php
   include_once "dbh2.inc.php";
?>

<div id="view_page">
    <input class="Afield" id="view1" type="text" onkeyup="myFunction()" name="name" placeholder="type name here"/>    
    <select class="view_select" id="view2" name="view_select_type">
         <option  name="clients" value="clients">Clients</option>
    	   <option  name="suppliers" value="suppliers">Suppliers</option>
    	   <option  name="products" value="products">Products</option>
         <option  name="products" value="bd_details">B/D Details</option>
    </select>
<form method="post" action="home.php">
<table id="show_clients">
<?php   
   $sql_v = "SELECT client_name, address, software_purchased, product_purchased, records, users, data_service, data_entry, status FROM softlinkasia.main";
//   $result1 = mysqli_query($conn, $sql1);
   if (mysqli_query($conn, $sql_v))
   {
      $result_v = mysqli_query($conn, $sql_v);
      $resultcheck_v = mysqli_num_rows($result_v);
      if ($resultcheck_v < 1)
      {
          echo "<p>You have no clients registered!</p>";
      }
      else
      {
      	  echo "<tr>";
      	  echo "<th>S.No </th>";
      	  echo "<th>Client </th>";
      	  echo "<th>Address</th>";
      	  echo "<th>Software Purchased</th>";
      	  echo "<th>Product Purchased</th>";
      	  echo "<th>Records</th>";
      	  echo "<th>Users</th>";
      	  echo "<th>Data Service</th>";
      	  echo "<th>Data Entry</th>";
      	  echo "<th>Status</th>";
      	  echo "</tr>";
          $count = 1;
          $counter = 0;
      	  while ($row = mysqli_fetch_assoc($result_v))
             {

                 echo "<tr>";
                 echo "<td>" . $count . "</td>";
                 echo "<td>" . $row['client_name'] . "<input type='hidden' value=".$row['client_name'] ." name='client_name[]'/></td>";
                 echo "<td>" . $row['address'] . "</td>";
                 echo "<td>" . $row['software_purchased'] .  "<input type='hidden' value=". $row['software_purchased'] ." name ='software_purchased[]'/></td>";
                 echo "<td>" . $row['product_purchased'] . "</td>";
                 echo "<td>" . $row['records'] . "</td>";
                 echo "<td>" . $row['users'] . "</td>";
                 echo "<td>" . $row['data_service'] . "<input type='hidden' value=". $row['data_service'] ." name ='data_service[]'/></td>";
                 echo "<td>" . $row['data_entry'] . "<input type='hidden' value=". $row['data_entry'] ." name ='data_entry[]'/></td>";
                 echo "<td>" . $row['status'] . "</td>";
                 echo "<td id='last_td1'><input type='submit' class='form_btn' id='view_full_details1' name='view_full_details1[".$counter."]' value='View Details'></td>";
                 echo "</tr>"; 
                 $count++;
                 $counter++; 
             }
       }
   } 
   else 
   {
       echo "Error: " . $sql_v . "<br>" . mysqli_error($conn);
   }
?>

</table>


<table id = "show_products" style="display:none;">

   <?php
   $sql_v = "SELECT product_id, product_name, specifications, unit, rate, tax_type, delivery_terms, notes, warranty, supplier_name FROM softlinkasia.product";

   if (mysqli_query($conn, $sql_v))
   {

      $result_v = mysqli_query($conn, $sql_v);
      $resultcheck_v = mysqli_num_rows($result_v);
      if ($resultcheck_v < 1)
      {
           echo "<p>You have no hardware equipments yet!</p>";
      }
      else
      {
           echo "<tr>";
      	      echo "<th>S.No</th>";
      	      echo "<th>Product</th>";
      	      echo "<th>Specifications</th>";
      	      echo "<th>Unit</th>";
      	      echo "<th>Rate</th>";
      	      echo "<th>Tax Type</th>";
      	      echo "<th>Delivery Terms</th>";
      	      echo "<th>Notes</th>";
      	      echo "<th>Warranty</th>";
      	      echo "<th>Supplier</th>";
      	      echo "</tr>";
              $count = 0;
      	      while ($row = mysqli_fetch_assoc($result_v))
              {
                 echo "<tr>";
                 echo "<td>" . $count . "</td>";
                 echo "<td>" . $row['product_name'] . "<input type='hidden' value=".$row['product_id'] ." name='product_id[]'/></td>";
                 echo "<td>" . $row['specifications'] . "<input type='hidden' value=".$row['product_name'] ." name='product_name[]'/></td>";
                 echo "<td>" . $row['unit'] . "</td>";
                 echo "<td>" . $row['rate'] . "</td>";
                 echo "<td>" . $row['tax_type'] . "</td>";
                 echo "<td>" . $row['delivery_terms'] . "</td>";
                 echo "<td>" . $row['notes'] . "</td>";
                 echo "<td>" . $row['warranty'] . "</td>";
                 echo "<td>" . $row['supplier_name'] . "</td>";
                 echo "<td id='last_td2'><input type='submit' class='form_btn' id='edit_full_details2' name='edit_full_details2[".$count."]' value='Edit Details'></td>";
                 echo "</tr>"; 
                 $count++; 
             }
      }
   }
   else 
   {
       echo "Error: " . $sql_v . "<br>" . mysqli_error($conn);
   }
   
?>
</table>

<table id = "show_suppliers" style="display:none;">

   <?php
       $sql_s = "SELECT supplier_id, supplier_name, type_of_supplier, location, phone_no, contact_person, remarks FROM softlinkasia.supplier";
       if (mysqli_query($conn, $sql_s))
       {
          $result_s = mysqli_query($conn, $sql_s);
          $resultcheck_s = mysqli_num_rows($result_s);
          if ($resultcheck_s < 1)
          {
              echo "<p>You have no suppliers registered!</p>";
          }
          else
          {
              echo "<tr>";
      	      echo "<th>S.No </th>";
      	      echo "<th>Supplier </th>";
      	      echo "<th>Type Of Supplier</th>";
      	      echo "<th>Location</th>";
      	      echo "<th>Phone No.</th>";
      	      echo "<th>Contact Person</th>";
      	      echo "<th>Remarks</th>";
      	      echo "</tr>";
              $count = 0;
      	      while ($row = mysqli_fetch_assoc($result_s))
              {

                 echo "<tr>";
                 echo "<td>" . $count .  "<input type='hidden' value=".$row['supplier_id'] ." name='supplier_id[]'/></td>";
                 echo "<td>" . $row['supplier_name'] . "<input type='hidden' value=".$row['supplier_name'] ." name='supplier_name[]'/></td>";
                 echo "<td>" . $row['type_of_supplier'] . "</td>";
                 echo "<td>" . $row['location'] . "</td>";
                 echo "<td>" . $row['phone_no'] . "</td>";
                 echo "<td>" . $row['contact_person'] . "</td>";
                 echo "<td>" . $row['remarks'] . "</td>";
                 echo "<td id='last_td3'><input type='submit' class='form_btn' id='view_full_details3' name='view_full_details3[".$count."]' value='Edit Details'></td>";
                 echo "</tr>"; 
                 $count++; 
              }
          }
       } 
      else 
      {
          echo "Error: " . $sql_s . "<br>" . mysqli_error($conn);
      }
   ?>

   </table>
   <table id = "show_bd_details" style="display:none;">
      <?php
       $sql_e = "SELECT bd_id, equip_name, bd_date, bd_time, id_no, bd_details, action_taken, bd_release, total_bd_hrs, remarks FROM softlinkasia.euipment_bd_details";

       if (mysqli_query($conn, $sql_e))
       {
           $result_e = mysqli_query($conn, $sql_e);
           $resultcheck_e = mysqli_num_rows($result_e);
           if ($resultcheck_e < 1)
           {
              echo "<p>No Equipment breakdown details!</p>";
           }
           else
           {
              echo "<tr>";
              echo "<th>S.No </th>";
              echo "<th>Equipment </th>";
              echo "<th>B/D Date</th>";
              echo "<th>B/D Time</th>";
              echo "<th>Id No.</th>";
              echo "<th>B/D Details</th>";
              echo "<th>Action Taken</th>";
              echo "<th>B/D Release</th>";
              echo "<th>Total B/D hours</th>";
              echo "<th>Remarks</th>";
              echo "</tr>";
              $count = 0;
              while ($row = mysqli_fetch_assoc($result_e))
              {
                  echo "<tr>";
                 echo "<td>" . $count .  "<input type='hidden' value=".$row['bd_id'] ." name='bd_id[]'/></td>";
                 echo "<td>" . $row['equip_name'] . "<input type='hidden' value=".$row['equip_name'] ." name='equip_name[]'/></td>";
                 echo "<td>" . $row['bd_date'] . "</td>";
                 echo "<td>" . $row['bd_time'] . "</td>";
                 echo "<td>" . $row['id_no'] . "</td>";
                 echo "<td>" . $row['bd_details'] . "</td>";
                 echo "<td>" . $row['action_taken'] . "</td>";
                 echo "<td>" . $row['bd_release'] . "</td>";
                 echo "<td>" . $row['total_bd_hrs'] . "</td>";
                 echo "<td>" . $row['remarks'] . "</td>";
                 echo "<td id='last_td3'><input type='submit' class='form_btn' id='view_full_details4' name='view_full_details4[".$count."]' value='Edit Details'></td>";
                 echo "</tr>"; 
                 $count++; 
              }
           }
       }
       else 
       {
           echo "Error: " . $sql_e . "<br>" . mysqli_error($conn);
       }
    ?>
   </table>
</form>
</div>