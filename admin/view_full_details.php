<label id="form_hd1">Client: <?php echo $client_name; ?></label>
<label id="form_hd2"> Software Purchased: <?php echo $software_purchased; ?></label>
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
  <form action='admin/backend_logic.php' method='post'>
   
   <input type='hidden' value='<?php echo $client_name ?>' name='client_name'/>
   <input type='hidden' value='<?php echo $client_id ?>' name='client_id'/>
   <input type='hidden' value='<?php echo $software_purchased ?>' name='software_purchased'/><br/><br/>
   <table id="main_table">
        <tr>
            <td>Address:</td>
            <td><input type='text' class='main_table_textfields' name='address' value="<?php echo $row['address']?>" readonly/></td>
            <td><input type='button' class='main_table_btn' id='main_table_btn_edit' value='Edit'/>
            <input type='submit' class='main_table_btn' id='main_table_btn_save' name='main_table_btn_save' value='Save'/></td>
        </tr>
        <tr>
            <td>Product Purchased:</td>
            <td><input type='text' class='main_table_textfields' name='product_purchased' value="<?php echo $row['product_purchased']?>" readonly/></td>
            <td><input type='button' class='main_table_btn' id='main_table_btn_del' name='main_table_btn_del' value='Delete'/>
        </tr>
        <tr>
            <td>Records:</td>
            <td><input type='text' class='main_table_textfields_1' name='rec' value="<?php echo $row['records']?>" readonly/></td>
        </tr>
        <tr>
            <td>Users:</td>
            <td><input type='number' class='main_table_textfields' name='users' value="<?php echo $row['users']?>" readonly/></td>
        </tr>
        <tr>
            <td>Data Service</td>
            <td><input type='text' class='main_table_textfields_1' name='ds' value="<?php echo $data_service; ?>" readonly/></td>
        </tr>
        <tr>
            <td>Data Entry</td>
            <td><input type='text' class='main_table_textfields_1' name='de' value='<?php echo $data_entry; ?>' readonly/></td>
        </tr>
        <tr>
            <td>Status:</td>
            <td><input type='text' class='main_table_textfields' name='status' value="<?php echo $row['status']?>" readonly/></td>
        </tr>
   </table>
   </form>
  </div>
  <form action='home.php' method='post'>
  <input type='hidden' value='<?php echo $client_name ?>' name='client_name'/>

   <input type='hidden' value='<?php echo $software_purchased ?>' name='software_purchased'/><br/><br/>   
    <div id="which_table" class="view_full_details_div">
        <select class="btn_for_table" id="table_choice" name="which_details">
           <option value="" disabled selected>Edit Details For-</option>
           <option  name="modules" value="modules">Modules</option>
           <option  name="amc" value="amc">AMC</option>
           <option  name="records" value="records">Records</option>
           <option  name="config" value="config">Server Config.</option>
           <option  name="ds" value="ds">Data Service</option>
           <option  name="de" value="de">Data Entry</option>
           <option  name="contact" value="contact">Contact</option>
        </select>
   </div>
 </form>
</div>
<div id="table_div">
  <form action='home.php' method='post'>
  <input type='hidden' value='<?php echo $client_name ?>' name='client_name'/>

   <input type='hidden' value='<?php echo $software_purchased ?>' name='software_purchased'/><br/><br/> 
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
                              
             $result1 = mysqli_query($conn, $query1);
             $resultcheck1 = mysqli_num_rows($result1);
             if ($resultcheck1 < 1)
             {
                echo "<p>No details available!</p>";
             }
             else
             {
                $row=mysqli_fetch_assoc($result1);
       ?>
                <tr>
                   <td>Installation Date::</td>
                   <td><input type='text' class='config_table_textfields' name='installation_date' value="<?php echo $row['installation_date']?>" readonly/></td>
                </tr>
                <tr>
                   <td>Version:</td>
                   <td><input type='text' class='config_table_textfields' name='version' value="<?php echo $row['version']?>" readonly/></td>
                </tr>
                <tr>
                    <td>No. of Nodes:</td>
                    <td><input type='text' class='config_table_textfields' name='no_of_nodes' value="<?php echo $row['no_of_nodes']?>" readonly/></td>
                </tr>
                <tr>
                    <td>OS:</td>
                    <td><input type='text' class='config_table_textfields' name='os' value="<?php echo $row['os']?>" readonly/></td>
                </tr>
                <tr>
                    <td>System(Processor):</td>
                    <td><input type='text' class='config_table_textfields' name='system' value="<?php echo $row['system']?>" readonly/></td>
                </tr>
                <tr>
                    <td>Installed Memory:</td>
                    <td><input type='text' class='config_table_textfields' name='installed_memory' value="<?php echo $row['installed_memory']?>" readonly/></td>
                </tr>
                <tr>
                    <td>OS Type:</td>
                    <td><input type='text' class='config_table_textfields' name='os_type' value="<?php echo $row['os_type']?>" readonly/></td>
                </tr>
                <tr>
                    <td>Computer Name:</td>
                    <td><input type='text' class='config_table_textfields' name='cmp_name' value="<?php echo $row['cmp_name']?>" readonly/></td>
                </tr>
                <tr>
                    <td>Full Computer Name:</td>
                    <td><input type='text' class='config_table_textfields' name='full_cmp_name' value="<?php echo $row['full_cmp_name']?>" readonly/></td>
                </tr>
                <tr>
                    <td>Domain:</td>
                    <td><input type='text' class='config_table_textfields' name='domain' value="<?php echo $row['domain']?>" readonly/></td>
                </tr>
                <tr>
                    <td>Workgroup:</td>
                    <td><input type='text' class='config_table_textfields' name='workgroup' value="<?php echo $row['workgroup']?>" readonly/></td>
                </tr>
                <tr>
                    <td>IP(internal/external):</td>
                    <td><input type='text' class='config_table_textfields' name='ip' value="<?php echo $row['ip']?>" readonly/></td>
                </tr>
                <tr>
                    <td>Web Server:</td>
                    <td><input type='text' class='config_table_textfields' name='webserver' value="<?php echo $row['webserver']?>" readonly/></td>
                </tr>
                <tr>
                    <td>URL Web OPAC:</td>
                    <td><input type='text' class='config_table_textfields' name='url_web_opac' value="<?php echo $row['url_web_opac']?>" readonly/></td>
                </tr>
                <tr>
                    <td>WEB OPAC Location:</td>
                    <td><input type='text' class='config_table_textfields' name='opac_loc' value="<?php echo $row['opac_loc']?>" readonly/></td>
                </tr>
                <tr>
                    <td>OASIS+DB Location:</td>
                    <td><input type='text' class='config_table_textfields' name='db_loc' value="<?php echo $row['db_loc']?>" readonly/></td>
                </tr>
           <?php
               $query11="SELECT hd_id, drive_name_type, free_space, total_space FROM softlinkasia.hard_disk_alice where client_id='$client_id'";
               $result11 = mysqli_query($conn, $query11);
               $resultcheck11 = mysqli_num_rows($result11);
               if ($resultcheck11 > 0)
               {
                   $row11=mysqli_fetch_assoc($result11);
                ?>
                  <tr>
                     <td><b>Hard Disk</b></td>
                  </tr>
                  <tr>
                     <td>Drive Name :</td>
                     <td><input type='text' class='config_table_textfields' name='drive_name_type' value="<?php echo $row11['drive_name_type']?>" readonly/></td>
                  </tr>
                  <tr>
                     <td>Free Space :</td>
                     <td><input type='text' class='config_table_textfields' name='free_space' value="<?php echo $row11['free_space']?>" readonly/></td>
                  </tr>
                  <tr>
                     <td>Total Space :</td>
                     <td><input type='text' class='config_table_textfields' name='total_space' value="<?php echo $row11['total_space']?>" readonly/></td>
                  </tr>
                <?php
               }
               $query12 = "SELECT ws_id, os, system, installed_memory, system_type, remarks FROM softlinkasia.workstation WHERE client_id='$client_id'";
               $result12 = mysqli_query($conn, $query12);
               $resultcheck12 = mysqli_num_rows($result12);
               if ($resultcheck12 > 0)
               {
                  $row12=mysqli_fetch_assoc($result12);
                  ?>
                  <tr>
                     <td><b>Workstations</b></td>
                  </tr>
                  <tr>
                     <td>OS:</td>
                     <td><input type='text' class='config_table_textfields' name='client_os' value="<?php echo $row12['os']?>" readonly/></td>
                  </tr>
                  <tr>
                     <td>System :</td>
                     <td><input type='text' class='config_table_textfields' name='client_system' value="<?php echo $row12['system']?>" readonly/></td>
                  </tr>
                  <tr>
                     <td>Installed Memory:</td>
                     <td><input type='text' class='config_table_textfields' name='client_memory' value="<?php echo $row12['installed_memory']?>" readonly/></td>
                  </tr>
                  <tr>
                     <td>System Type:</td>
                     <td><input type='text' class='config_table_textfields' name='client_system_type' value="<?php echo $row12['system_type']?>" readonly/></td>
                  </tr>
                  <tr>
                     <td>Remarks:</td>
                     <td><input type='text' class='config_table_textfields' name='remarks' value="<?php echo $row12['remarks']?>" readonly/></td>
                  </tr>
                  <?php
               }   
           }
        }   
           else if($software_purchased=='liberty')
           {
              $query1 = "SELECT config_id, installation_date, version, db_name, os, system, installed_memory, system_type, harddisk, cmp_name, full_cmp_name, workgroup, ip_internal, ip_external, webserver, url_report_server_int, url_report_server_ext, url_liberty_int, url_liberty_ext, db_loc, server_loc, c_used, c_available, d_used, d_available FROM softlinkasia.liberty_system_details where client_id='$client_id'";
                              
              $result1 = mysqli_query($conn, $query1);
              $resultcheck1 = mysqli_num_rows($result1);
              if ($resultcheck1 < 1)
              {
                 echo "<p>No details available!</p>";
              }
              else
              {
                 $row=mysqli_fetch_assoc($result1);
        ?>
                 <tr>
                   <td>Installation Date:</td>
                   <td><input type='text' class='config_table_textfields' name='installation_date' value="<?php echo $row['installation_date']?>" readonly/></td>
                 </tr>
                 <tr>
                   <td>Version:</td>
                   <td><input type='text' class='config_table_textfields' name='version' value="<?php echo $row['version']?>" readonly/></td>
                </tr>
                <tr>
                   <td>Database Name:</td>
                   <td><input type='text' class='config_table_textfields' name='db_name' value="<?php echo $row['db_name']?>" readonly/></td>
                </tr>
                <tr>
                   <td>OS:</td>
                   <td><input type='text' class='config_table_textfields' name='os' value="<?php echo $row['os']?>" readonly/></td>
                </tr>
                <tr>
                   <td>System:</td>
                   <td><input type='text' class='config_table_textfields' name='system' value="<?php echo $row['system']?>" readonly/></td>
                </tr>
                <tr>
                   <td>Installed memory:</td>
                   <td><input type='text' class='config_table_textfields' name='installed_memory' value="<?php echo $row['installed_memory']?>" readonly/></td>
                </tr>
                <tr>
                   <td>System Type:</td>
                   <td><input type='text' class='config_table_textfields' name='system_type' value="<?php echo $row['system_type']?>" readonly/></td>
                </tr>
                <tr>
                   <td>Hard Disk:</td>
                   <td><input type='text' class='config_table_textfields' name='harddisk' value="<?php echo $row['harddisk']?>" readonly/></td>
                </tr>
                <tr>
                   <td>Computer Name:</td>
                   <td><input type='text' class='config_table_textfields' name='cmp_name' value="<?php echo $row['cmp_name']?>" readonly/></td>
                </tr>
                <tr>
                   <td>Full Computer Name:</td>
                   <td><input type='text' class='config_table_textfields' name='full_cmp_name' value="<?php echo $row['full_cmp_name']?>" readonly/></td>
                </tr>
                <tr>
                   <td>Workgroup:</td>
                   <td><input type='text' class='config_table_textfields' name='workgroup' value="<?php echo $row['workgroup']?>" readonly/></td>
                </tr> 
                <tr>
                   <td>IP (internal):</td>
                   <td><input type='text' class='config_table_textfields' name='ip_internal' value="<?php echo $row['ip_internal']?>" readonly/></td>
                </tr>
                <tr>
                   <td>IP (external):</td>
                   <td><input type='text' class='config_table_textfields' name='ip_external' value="<?php echo $row['ip_external']?>" readonly/></td>
                </tr>
                <tr>
                   <td>Web Server:</td>
                   <td><input type='text' class='config_table_textfields' name='webserver' value="<?php echo $row['webserver']?>" readonly/></td>
                </tr>
                <tr>
                   <td>URL Report Server (external):</td>
                   <td><input type='text' class='config_table_textfields' name='url_liberty_ext' value="<?php echo $row['url_report_server_ext']?>" readonly/></td>
                </tr>
                <tr>
                   <td>URL Report Server (internal):</td>
                   <td><input type='text' class='config_table_textfields' name='url_liberty_int' value="<?php echo $row['url_report_server_int']?>" readonly/></td>
                </tr>
                <tr>
                   <td>URL Liberty (external):</td>
                   <td><input type='text' class='config_table_textfields' name='url_liberty_ext' value="<?php echo $row['url_liberty_ext']?>" readonly/></td>
                </tr>
                <tr>
                   <td>URL Liberty (internal):</td>
                   <td><input type='text' class='config_table_textfields' name='url_liberty_int' value="<?php echo $row['url_liberty_int']?>" readonly/></td>
                </tr>
                <tr>
                   <td>Database Location:</td>
                   <td><input type='text' class='config_table_textfields' name='db_loc' value="<?php echo $row['db_loc']?>" readonly/></td>
                </tr>
                <tr>
                   <td>Server Location:</td>
                   <td><input type='text' class='config_table_textfields' name='server_loc' value="<?php echo $row['server_loc']?>" readonly/></td>
                </tr>
                <tr>
                   <td>C: Used:</td>
                   <td><input type='text' class='config_table_textfields' name='c_used' value="<?php echo $row['c_used']?>" readonly/></td>
                </tr>
                <tr>
                   <td>C: Available:</td>
                   <td><input type='text' class='config_table_textfields' name='c_available' value="<?php echo $row['c_available']?>" readonly/></td>
                </tr>
                <tr>
                   <td>D: Used:</td>
                   <td><input type='text' class='config_table_textfields' name='d_used' value="<?php echo $row['d_used']?>" readonly/></td>
                </tr>
                <tr>
                   <td>D: Available:</td>
                   <td><input type='text' class='config_table_textfields' name='d_available' value="<?php echo $row['d_available']?>" readonly/></td>
                </tr>
          <?php                 
              }
            }
        
           
      ?>
     </table>
     <table id="con_table" style="display:none;">
         <?php
             $query1 = "SELECT con_id, con_name, phone_no, designation FROM softlinkasia.contact_details WHERE client_id='$client_id'";
             $result1 = mysqli_query($conn, $query1);
             $resultcheck1 = mysqli_num_rows($result1);
             if ($resultcheck1 < 1)
             {
                echo "<p>No contact details available!</p>";
             }
             else
             {
                echo "<tr>";
                echo "<th>S.No </th>";
                echo "<th>Contact Person </th>";
                echo "<th>Phone Number</th>";
                echo "<th>Designation</th>";
                echo "</tr>";
                $count = 1;             
                while($row1=mysqli_fetch_assoc($result1))
                {
                    echo "<tr>";
                    echo "<td>" . $count . "</td>";
                    echo "<td>" . $row1['con_name'] . "</td>";
                    echo "<td>" . $row1['phone_no'] . "</td>";
                    echo "<td>" . $row1['designation'] . "</td>";
                    echo "</tr>";
                    $count++;
                }
              }

         ?>
     </table>
     <table id="ds_table" style="display:none; ">
         <?php
            if($data_service=='no')
            {
                echo "<p> No details available.</p>";
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
         ?>   
     </table>
     <table id="con_table" style="display:none;">
        <?php
            if($data_entry=='no')
            {
                echo "<p> No details available</p>";
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
     </table>
   </form>       
</div>   
