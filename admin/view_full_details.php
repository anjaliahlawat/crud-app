<label id="form_hd1">Client: <?php echo $client_name ?></label>
<label id="form_hd2"> Software Purchased: <?php echo $software_purchased ?></label>
<div id = "show_full_details" class="view_full_details_div">
<?php

    $query0 = "SELECT client_id, client_name, address, software_purchased, product_purchased, records, users, data_service, data_entry, status FROM softlinkasia.main where client_name='$client_name' AND software_purchased='$software_purchased'";
    if (mysqli_query($conn, $query0))
    {
        $result0 = mysqli_query($conn, $query0);
        $resultcheck0 = mysqli_num_rows($result0);
        if ($resultcheck0 < 1)
        {
            echo "<p>No details available!</p>";
        }
        else
        {
            $row = mysqli_fetch_assoc($result0);
            $client_id = $row['client_id'];          
        }
    }
    else
    {
        echo "Error: " . $query0 . "<br>" . mysqli_error($conn);
    } 

?>

  
  <div id="view_div">
  <form action='home.php' method='post'>
   
   <input type='hidden' value='<?php echo $client_name ?>' name='client_name'/>

   <input type='hidden' value='<?php echo $software_purchased ?>' name='software_purchased'/><br/><br/>
   <table id="main_table">
        <tr>
            <td>Address:</td>
            <td><input type='text' class='main_table_textfields' name='address_new' value="<?php echo $row['address']?>" readonly/></td>
        </tr>
        <tr>
            <td>Product Purchased:</td>
            <td><input type='text' class='main_table_textfields' name='product_purchased_new' value="<?php echo $row['product_purchased']?>" readonly/></td>
        </tr>
        <tr>
            <td>Records:</td>
            <td><input type='text' class='main_table_textfields_1' name='rec' value="<?php echo $row['records']?>" readonly/></td>
        </tr>
        <tr>
            <td>Users:</td>
            <td><input type='text' class='main_table_textfields' name='users_new' value="<?php echo $row['users']?>" readonly/></td>
        </tr>
        <?php
            if($data_service=='no')
            {
                echo "<tr>";
                echo "<td>Data Service</td>";
                echo "<td><input type='text' class='main_table_textfields' name='users_new' value='".$data_service."' readonly/></td>";
                echo "</tr>";
            }
            else
            {
                $query_ds= "SELECT type, start_date, end_date, d_status, remarks, no_of_excel_files_rnc FROM softlinkasia.data_service WHERE client_id='$client_id'";
                $result_ds = mysqli_query($conn, $query_ds);
                $row_ds = mysqli_fetch_assoc($result_ds);
                echo "<tr>";
                echo "<td>Data Service Type:</td>";
                echo "<td><input type='text' class='main_table_textfields' name='ds_type' value=".$row_ds['type']." readonly/></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Start Date:</td>";
                echo "<td><input type='text' class='main_table_textfields' name='start_date' value=".$row_ds['start_date']." readonly/></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>End Date:</td>";
                echo "<td><input type='text' class='main_table_textfields' name='end_date' value=".$row_ds['end_date']." readonly/></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Status</td>";
                echo "<td><input type='text' class='main_table_textfields' name='d_status' value=".$row_ds['d_status']." readonly/></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Remarks</td>";
                echo "<td><input type='text' class='main_table_textfields' name='remarks' value=".$row_ds['remarks']." readonly/></td>";
                echo "</tr>";
                if($row_ds['type'] == 'excel')
                {
                    echo "<tr>";
                    echo "<td>No. of Excel Files Recovered</td>";
                    echo "<td><input type='text' class='main_table_textfields' name='no_of_excel_files_rnc' value=".$row_ds['no_of_excel_files_rnc']." readonly/></td>";
                    echo "</tr>";
                }
            }
            if($data_entry=='no')
            {
                echo "<tr>";
                echo "<td>Data Entry</td>";
                echo "<td><input type='text' class='main_table_textfields' name='data_entry' value='".$data_entry."' readonly/></td>";
                echo "</tr>";
            }
            else
            {
                $query_de= "SELECT type, start_date, end_date, status, remarks FROM softlinkasia.data_entry WHERE client_id='$client_id'";
                $result_de = mysqli_query($conn, $query_de);
                $row_de = mysqli_fetch_assoc($result_de);
                echo "<tr>";
                echo "<td>Data Entry Type:</td>";
                echo "<td><input type='text' class='main_table_textfields' name='ds_type' value=".$row_de['type']." readonly/></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Start Date:</td>";
                echo "<td><input type='text' class='main_table_textfields' name='start_date' value=".$row_de['start_date']." readonly/></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>End Date:</td>";
                echo "<td><input type='text' class='main_table_textfields' name='end_date' value=".$row_de['end_date']." readonly/></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Status</td>";
                echo "<td><input type='text' class='main_table_textfields' name='status' value=".$row_de['status']." readonly/></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Remarks</td>";
                echo "<td><input type='text' class='main_table_textfields' name='remarks' value=".$row_de['remarks']." readonly/></td>";
                echo "</tr>";
            }             
        ?>
        <tr>
            <td>Status:</td>
            <td><input type='text' class='main_table_textfields' name='status' value="<?php echo $row['status']?>" readonly/></td>
        </tr>
   </table>

     </form>
     
    </div> 
    <div id="which_table" class="view_full_details_div">
        <select class="btn_for_table" id="table_choice" name="which_details">
           <option value="" disabled selected>Edit Details For-</option>
           <option  name="modules" value="modules">Modules</option>
           <option  name="amc" value="amc">AMC</option>
           <option  name="records" value="records">Records</option>
           <option  name="config" value="config">Server Config.</option>
           <option  name="contact" value="contact">Contact</option>
        </select>
   </div>
  
</div>
<div id="table_div"> 
    <table id = "mod_table" style="display:none;">   
      <?php
          $query1 = "SELECT mod_id, module_name, client_id, installation_date, purchased_order_no, no_of_nodes_purchased, date_of_m_purchased, module_cost, reg_no, training_date, no_of_training_days  FROM softlinkasia.modules where client_id='$client_id'";          
          $result1 = mysqli_query($conn, $query1);
          $resultcheck1 = mysqli_num_rows($result1);
          if ($resultcheck1 < 1)
          {
             echo "<p>No module details available!</p>";
          }
          else
          {
              echo "<tr>";
              echo "<th>S.No </th>";
              echo "<th>Module/es Name </th>";
              echo "<th>Installation Date</th>";
              echo "<th>Purchased Order No.</th>";
              echo "<th>No. of Nodes Purchased</th>";
              echo "<th>Date of Purchase</th>";
              echo "<th>Cost</th>";
              echo "<th>Reg No.</th>";
              echo "<th>Training Date</th>";
              echo "<th>No. of Training Days</th>";
              echo "</tr>";
              $count = 1;             
              while($row1=mysqli_fetch_assoc($result1))
              {
                  echo "<tr>";
                  echo "<td>" . $count . "</td>";
                  echo "<td>" . $row1['module_name'] . "</td>";
                  echo "<td>" . $row1['installation_date'] . "</td>";
                  echo "<td>" . $row1['purchased_order_no'] . "</td>";
                  echo "<td>" . $row1['no_of_nodes_purchased'] . "</td>";
                  echo "<td>" . $row1['date_of_m_purchased'] . "</td>";
                  echo "<td>" . $row1['module_cost'] . "</td>";
                  echo "<td>" . $row1['reg_no'] . "</td>";
                  echo "<td>" . $row1['training_date'] . "</td>";
                  echo "<td>" . $row1['no_of_training_days'] . "</td>";
                  echo "</tr>";
                  $count++;
              }             
          }          
     ?>
     </table>
     <table id = "amc_table" style="display:none;">   
      <?php
          $query1 = "SELECT amc_id, module_name, invoice_no, invoice_date, amc_period, per_of_amc_given, remarks FROM softlinkasia.amc where client_id='$client_id'";          
          $result1 = mysqli_query($conn, $query1);
          $resultcheck1 = mysqli_num_rows($result1);
          if ($resultcheck1 < 1)
          {
             echo "<p>No AMC details available!</p>";
          }
          else
          {
              echo "<tr>";
              echo "<th>S.No </th>";
              echo "<th>Module/es Name </th>";
              echo "<th>Invoice No.</th>";
              echo "<th>Invoice Date</th>";
              echo "<th>No. of Nodes Purchased</th>";
              echo "<th>AMC Period</th>";
              echo "<th>% of AMC Given</th>";
              echo "<th>Remarks</th>";
              echo "</tr>";
              $count = 1;             
              while($row1=mysqli_fetch_assoc($result1))
              {
                  echo "<tr>";
                  echo "<td>" . $count . "</td>";
                  echo "<td>" . $row1['module_name'] . "</td>";
                  echo "<td>" . $row1['invoice_no'] . "</td>";
                  echo "<td>" . $row1['invoice_date'] . "</td>";
                  echo "<td>" . $row1['amc_period'] . "</td>";
                  echo "<td>" . $row1['per_of_amc_given'] . "</td>";
                  echo "<td>" . $row1['remarks'] . "</td>";
                  echo "</tr>";
                  $count++;
              }              
          }
      ?>
   </table>
   <table id = "rec_table" style="display:none;">   
      <?php
          $query1 = "SELECT rec_id, records, installation_date, purchased_order_no, date_of_new_records, cost, reg_no FROM softlinkasia.records where client_id='$client_id'";          
          $result1 = mysqli_query($conn, $query1);
          $resultcheck1 = mysqli_num_rows($result1);
          if ($resultcheck1 < 1)
          {
             echo "<p>No Updated Records available!</p>";
          }
          else
          {
              echo "<tr>";
              echo "<th>S.No </th>";
              echo "<th>Records </th>";
              echo "<th>Installation Date</th>";
              echo "<th>Purchased Order No.</th>";
              echo "<th>Date of updating Records</th>";
              echo "<th>Cost</th>";
              echo "<th>Reg No.</th>";
              echo "</tr>";
              $count = 1;             
              while($row1=mysqli_fetch_assoc($result1))
              {
                  echo "<tr>";
                  echo "<td>" . $count . "</td>";
                  echo "<td>" . $row1['records'] . "</td>";
                  echo "<td>" . $row1['installation_date'] . "</td>";
                  echo "<td>" . $row1['purchased_order_no'] . "</td>";
                  echo "<td>" . $row1['date_of_new_records'] . "</td>";
                  echo "<td>" . $row1['cost'] . "</td>";
                  echo "<td>" . $row1['reg_no'] . "</td>";
                  echo "</tr>";
                  $count++;
              }  
          } 
      ?>
     </table>
     <table id = "config_table" style="display:none;">   
      <?php
          if($software_purchased=='alice')
          {
             $query1 = "SELECT config_id, installation_date, version, no_of_nodes, os, system, installed_memory, os_type, cmp_name, full_cmp_name, domain, workgroup, ip, webserver, url_web_opac, opac_loc, db_loc FROM softlinkasia.alice_system_details where client_id='$client_id'";
          }                    
          $result1 = mysqli_query($conn, $query1);
          $resultcheck1 = mysqli_num_rows($result1);
          if ($resultcheck1 < 1)
          {
             echo "<p>No details available!</p>";
          }
          else
          {
              echo "<tr>";
              echo "<th>S.No </th>";
              echo "<th>Records </th>";
              echo "<th>Installation Date</th>";
              echo "<th>Version </th>";
              echo "<th>No. of Nodes</th>";
              echo "<th>OS</th>";
              echo "<th>System(Processor)</th>";
              echo "<th>Installed Memory</th>";
              echo "<th>OS Type</th>";
              echo "<th>Computer Name</th>";
              echo "<th>Full Computer Name</th>";
              echo "<th>Domain</th>";
              echo "<th>Workgroup</th>";
              echo "<th>IP</th>";
              echo "<th>Web Server</th>";
              echo "<th>URL Web OPAC</th>";
              echo "<th>WEB OPAC Location</th>";
              echo "<th>OASIS+DB Location</th>";
              echo "</tr>";
              $count = 1;             
              while($row1=mysqli_fetch_assoc($result1))
              {
                  echo "<tr>";
                  echo "<td>" . $count . "</td>";
                  echo "<td>" . $row1['installation_date'] . "</td>";
                  echo "<td>" . $row1['version'] . "</td>";
                  echo "<td>" . $row1['no_of_nodes'] . "</td>";
                  echo "<td>" . $row1['os'] . "</td>";
                  echo "<td>" . $row1['system'] . "</td>";
                  echo "<td>" . $row1['installed_memory'] . "</td>";
                  echo "</tr>";
                  $count++;
              }  
          } 
      ?>
     </table>     
</div>   