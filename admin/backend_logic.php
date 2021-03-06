<?php
include_once "dbh2.inc.php";
include_once "dbh.inc.php";
session_start();

//attendance
if(isset($_POST['attnd_btn']))
{
    $date_today = $_POST['date_today'];
    $s3 = (string)$date_today;
    if(empty($s3))
    {
        header("Location:http://localhost:81/CRUD/home.php?form=emptydatefield");
        exit();
    }
    // check if attendance is already taken on that date
    else
    {        
        $query="SELECT date_today FROM securelogin.attendance WHERE date_today='$date_today'";
        $result = mysqli_query($conn, $query);
        $resultcheck = mysqli_num_rows($result);
        if($resultcheck > 0)
        {
           echo "<p> Attendance is already updated on this date</p>";
        }
        else
        {
            
            foreach ($_POST['mark'] as $id => $mark)
            {
                $user_id= $_POST['user_id'][$id];
                $user_name =$_POST['user_name'][$id];
                $from = (string)($_POST['from'][$id]);
                $to = (string)($_POST['to'][$id]);
                $query2 = "INSERT INTO securelogin.attendance(user_id, user_name, attendance, from_time, to_time, date_today) VALUES('$user_id', '$user_name', '$mark', '$from', '$to', '$date_today')";
                if(mysqli_query($conn, $query2))
               {
                   header("Location:http://localhost:81/CRUD/home.php?form=success");
                   exit();  
               } 
                else 
               {
                  echo "Error: " . $query2 . "<br>" . mysqli_error($conn);
               }
              
            }
        }
    }
}
// view attendance function
 else if(isset($_POST['view_attnd']))
 {
     $query = "SELECT * FROM attendance";
     $result = mysqli_query($conn, $query);

     if (mysqli_num_rows($result) > 0) 
     {
         echo "<table id='display_attendance' style='border:1px solid black; text-align:center;position:relative;left:300px;top:50px;'>";
         echo "<tr>";
         echo "<th>Id</th>";
         echo "<th>Name</th>";
         echo "<th>Attendance Status</th>";
         echo "<th>Time In</th>";
         echo "<th>Time Out</th>";
         echo "<th>Date</th>";
         echo "<tr>";
         while($row = mysqli_fetch_assoc($result)) 
         {
            echo "<tr>";
            echo "<td>". $row["user_id"]."</td>";
            echo "<td>". $row["user_name"]."</td>";
            echo "<td>". $row["attendance"]."</td>";
            echo "<td>". $row["from_time"]."</td>";
            echo "<td>". $row["to_time"]."</td>";
            echo "<td>". $row["date_today"]."</td>";
            echo "</tr>";
         }
         echo "</table>";
     }
     else
     {
        echo "<p> No records</p>";
     }
      
 }
//to save bank details
elseif (isset($_POST['save_bank_details'])) {
    $account_name= $_POST['account_name'];
    $bank_name= $_POST['bank_name'];
    $curr_acc_no= $_POST['curr_acc_no'];
    $bank_addrs= $_POST['bank_addrs'];
    $country= $_POST['country'];
    $ifsc_code= $_POST['ifsc_code'];
    $swift_code= $_POST['swift_code'];
    $micr_code= $_POST['branch_code'];
    $branch_code= $_POST['branch_code'];
    $tan= $_POST['tan'];
    $pan= $_POST['pan'];
    $gstin= $_POST['gstin'];
    $tin_no= $_POST['tin_no'];
    $cin= $_POST['cin'];
    $date_of_effect= $_POST['date_of_effect'];
    $date = (string)$date_of_effect;
    if(empty($account_name) || empty($bank_name) || empty($curr_acc_no) || empty($bank_addrs) || empty($country) || empty($swift_code) || empty($ifsc_code) || empty($micr_code) || empty($branch_code) || empty($tan) || empty($pan) || empty($gstin) || empty($tin_no) || empty($cin) || empty($date))
    {
       header("Location:http://localhost:81/CRUD/home.php?view=bank?form=emptyfield");
        exit();
    }
    else
    {
       $query = "UPDATE securelogin.bank_details set account_name='$account_name', curr_acc_no='$curr_acc_no', bank_name='$bank_name', bank_addrs='$bank_addrs', country='$country', ifsc_code='$ifsc_code', swift_code='$swift_code', micr_code='$micr_code', branch_code='$branch_code', tan='$tan', pan='$pan', gstin='$gstin', tin_no='$tin_no', cin='$cin', date_of_effect='$date_of_effect'";
       if(mysqli_query($conn, $query))
       {
           header("Location:http://localhost:81/CRUD/home.php?view=Bank");
            exit();
       } 
       else 
       {
          echo "Error: " . $query . "<br>" . mysqli_error($conn);
       }
    }

 }

 //generate pdf of bank details
 elseif (isset($_POST['downloadpdf']))
 {
     $account_name= $_POST['account_name'];
    $bank_name= $_POST['bank_name'];
    $curr_acc_no= $_POST['curr_acc_no'];
    $bank_addrs= $_POST['bank_addrs'];
    $country= $_POST['country'];
    $ifsc_code= $_POST['ifsc_code'];
    $swift_code= $_POST['swift_code'];
    $micr_code= $_POST['branch_code'];
    $branch_code= $_POST['branch_code'];
    $tan= $_POST['tan'];
    $pan= $_POST['pan'];
    $gstin= $_POST['gstin'];
    $tin_no= $_POST['tin_no'];
    $cin= $_POST['cin'];
    $date_of_effect= $_POST['date_of_effect'];
     require ('fpdf181/fpdf.php');
     $pdf = new FPDF('p','mm','A4');
     $pdf->AddPage();
     $pdf->SetFont('Arial','B',14);
     $pdf->Cell(0,10,"Softlink Asia Pvt. Ltd. Bank Details",0,1,'C');
     $pdf->SetFont('Arial','',12);
     $pdf->Cell(0,17,"Please find below the Softlink Bank details:",0,1);
     $pdf->Cell(70,10,"1.Account name:",0,0);
     $pdf->Cell(70,10,$account_name,0,1);
     $pdf->Cell(70,10,"2.Current Account name:",0,0);
     $pdf->Cell(70,10,$curr_acc_no,0,1);
     $pdf->Cell(70,10,"3.Bank name:",0,0);
     $pdf->Cell(70,10,$bank_name,0,1);
     $pdf->Cell(70,10,"4.Bank address:",0,0);
     $pdf->Cell(70,10,$bank_addrs,0,1);
     $pdf->Cell(70,10,"5.Country:",0,0);
     $pdf->Cell(70,10,$country,0,1);
     $pdf->Cell(70,10,"6.RTGS/NEFT/IFSC CODE:",0,0);
     $pdf->Cell(70,10,$ifsc_code,0,1);
     $pdf->Cell(70,10,"7.SWIFT Code/ID:",0,0);
     $pdf->Cell(70,10,$swift_code,0,1);
     $pdf->Cell(70,10,"8.MICR Code:",0,0);
     $pdf->Cell(70,10,$micr_code,0,1);
     $pdf->Cell(70,10,"9.Branch Code:",0,0);
     $pdf->Cell(70,10,$branch_code,0,1);
     $pdf->Cell(70,10,"10.TAN:",0,0);
     $pdf->Cell(70,10,$tan,0,1);
     $pdf->Cell(70,10,"11.PAN:",0,0);
     $pdf->Cell(70,10,$pan,0,1);
     $pdf->Cell(70,10,"12.GSTIN:",0,0);
     $pdf->Cell(70,10,$gstin,0,1);
     $pdf->Cell(70,10,"13.Tin no.:",0,0);
     $pdf->Cell(70,10,$bank_addrs,0,1);
     $pdf->Cell(70,10,"14.CIN:",0,0);
     $pdf->Cell(70,10,$cin,0,1);
     $pdf->Cell(70,10,"15.Date of Effect:",0,0);
     $pdf->Cell(70,10,$date_of_effect,0,1);
     $pdf->output("D");  
 }

//for admin to add client
else if(isset($_POST['submit_form1']))
{
	$clientname = $_POST['client_name'];
	$addrs = $_POST['addrs'];
  $product_purchased = $_POST['product_purchased'];
	$soft = $_POST['soft'];
	$rec = $_POST['rec'];
	$users = $_POST['users'];
	$ds = $_POST['ds'];
	$de = $_POST['de'];
  $users_new = (string)$users;

	//error handlers
	 if (empty($clientname) || empty($addrs) || empty($soft) || empty($rec) || empty($users_new))
    {
        header("Location:http://localhost:81/CRUD/home.php?form=emptyfields1");
        exit();
    }
    else 
    {
        // check if input characters are valid
        if(!preg_match("/^[a-zA-Z .]*$/", $clientname))
        {
          header("Location:http://localhost:81/CRUD/home.php?form=invalid");
          exit();
        }
        else 
        {
            $sql = "INSERT INTO main (client_name, address, software_purchased, product_purchased, records, users, data_service, data_entry, status) VALUES ('$clientname', '$addrs', '$soft', '$product_purchased','$rec', '$users', '$ds', '$de', 'active')";
            if(mysqli_query($conn, $sql))
            {
                header("Location:http://localhost:81/CRUD/home.php?form=success");
                exit();
            } 
            else 
            {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }
}
// add ds details
else if (isset($_POST['submit_form11']))
{
       $clientname = $_POST['client_name'];
       $software_purchased = $_POST['soft'];
       $ds_type = $_POST['ds_type'];
       $ds_start_date = $_POST['start_date'];
       $ds_end_date = $_POST['end_date'];
       $ds_status = $_POST['ds_status'];
       $ds_remarks = $_POST['ds_remarks'];
       $start_date_new = (string)$ds_start_date;
       $end_date_new = (string)$ds_end_date;
       $num = $_POST['no_of_excel_files_rnc'];
      $sql0 = "SELECT client_id FROM softlinkasia.main WHERE client_name='$clientname' AND software_purchased='$software_purchased'";
      $result1 = mysqli_query($conn, $sql0);
      $row = mysqli_fetch_assoc($result1);
      $client_id = $row['client_id']; 
      $sql1 = "SELECT * FROM softlinkasia.data_service WHERE client_id='$client_id'";
      $result = mysqli_query($conn, $sql1);
      $resultcheck = mysqli_num_rows($result);
      if($resultcheck > 0)
      {
         echo "<p>Data service details already filled.</p>";
      }
      else
      {  
            if (empty($start_date_new) || empty($end_date_new) || empty($ds_status) || empty($ds_type))
            {
               header("Location:http://localhost:81/CRUD/home.php?form=emptyfields2");
               exit();
            }
            else
            {
                $sql2 = "INSERT INTO softlinkasia.data_service (client_id, type, start_date, end_date, d_status, remarks, no_of_excel_files_rnc) VALUES('$client_id', '$ds_type', '$ds_start_date', '$ds_end_date', '$ds_status', '$ds_remarks', '$num')";
                $sql3 = "UPDATE softlinkasia.main SET data_service='yes' WHERE client_id='$client_id'";

                if(mysqli_query($conn, $sql2))
                {
                    mysqli_query($conn, $sql3);
                    header("Location:http://localhost:81/CRUD/home.php?form=success");
                    exit();
                } 
                else 
                {
                    echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
                }           
            }            
       }
}

else if (isset($_POST['submit_form12']))
{
      $clientname = $_POST['client_name'];
      $software_purchased = $_POST['soft'];
      $de_type = $_POST['de_type'];
      $de_start_date = $_POST['de_start_date'];
      $de_end_date = $_POST['de_end_date'];
      $de_status = $_POST['de_status'];
      $de_remarks = $_POST['de_remarks'];
      $de_start_date_new = (string)$de_start_date;
      $de_end_date_new = (string)$de_end_date;
      $sql0 = "SELECT client_id FROM softlinkasia.main WHERE client_name='$clientname' AND software_purchased='$software_purchased'";
      $result1 = mysqli_query($conn, $sql0);
      $row = mysqli_fetch_assoc($result1);
      $client_id = $row['client_id'];
      $sql1 = "SELECT * FROM softlinkasia.data_entry WHERE client_id='$client_id'";
      $result = mysqli_query($conn, $sql1);
      $resultcheck = mysqli_num_rows($result);
      if($resultcheck > 0)
      {
         echo "<p>Data entry details already filled.</p>";
      }
      else
      { 
          if (empty($de_start_date_new) || empty($de_end_date_new) || empty($de_status) || empty($de_type))
          {
                header("Location:http://localhost:81/CRUD/home.php?form=emptyfields3");
                exit();
          }
          else
          {
                $sql3 = "INSERT INTO softlinkasia.data_entry (client_id, type, start_date, end_date, status, remarks) VALUES('$client_id', '$de_type', '$de_start_date', '$de_end_date', '$de_status', '$de_remarks')";
                $sql2 = "UPDATE softlinkasia.main SET data_entry='yes' WHERE client_id='$client_id'";
                if(mysqli_query($conn, $sql3))
                {
                    mysqli_query($conn, $sql2);
                    header("Location:http://localhost:81/CRUD/home.php?form=success");
                    exit();
                } 
                else 
                {
                    echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);
                }
          }  
      }
}

//add modules......

else if (isset($_POST['submit_form7'])) 
{
	$clientname = $_POST['client_name'];
  $software_purchased = $_POST['soft'];
  $module_name = implode(",",$_POST['Mod']);
	$date_of_m_purchased = $_POST['date_of_m_purchased'];
	$module_cost = $_POST['module_cost'];
	$no_of_nodes_purchased = $_POST['no_of_nodes_purchased'];
	$purchased_order_no = $_POST['purchased_order_no'];
	$reg_no = $_POST['reg_no'];
	$installation_date = $_POST['installation_date'];
	$training_date = $_POST['training_date'];
	$no_of_training_days = $_POST['no_of_training_days'];
  $s1 = (string)$date_of_m_purchased;
  $s2 = (string)$module_cost;
  $s3 = (string)$no_of_nodes_purchased;
  $s4 = (string)$installation_date;
  $s5 = (string)$training_date;
  $s6 = (string)$no_of_training_days;

    if (empty($clientname) || empty($software_purchased) || empty($module_name) || empty($s1) || empty($s2) || empty($s3) || empty($purchased_order_no) || empty($reg_no) || empty($s4) || empty($s5) || empty($s6))
    {
        header("Location:http://localhost:81/CRUD/home.php?form=emptyfields");
                exit();
    }
    else
    {
        if(!preg_match("/^[a-zA-Z .]*$/", $clientname))
        {
           header("Location:http://localhost:81/CRUD/home.php?form=invalid");
            exit();
        }
        else 
        {
            
            $sql1 = "SELECT client_id FROM softlinkasia.main WHERE client_name='$clientname' AND software_purchased='$software_purchased'";
            $result1 = mysqli_query($conn, $sql1);
            $resultcheck = mysqli_num_rows($result1);
           if ($resultcheck < 1)
           {
               echo "<p class='error_message'> This isn't your registered client Or they may not have access to this module </p>";
           }
           else
           {
               $row = mysqli_fetch_assoc($result1);
               $client_id = $row['client_id'];
               $sql2 = "INSERT INTO softlinkasia.modules ( module_name, client_id, installation_date, purchased_order_no, no_of_nodes_purchased, date_of_m_purchased, module_cost, reg_no, training_date, no_of_training_days) VALUES ( '$module_name', '$client_id', '$installation_date', '$purchased_order_no', '$no_of_nodes_purchased', '$date_of_m_purchased', '$module_cost', '$reg_no', '$training_date', '$no_of_training_days')";
               mysqli_query($conn, $sql2);
               header("Location:http://localhost:81/CRUD/home.php?form=success");
                exit();
           }
        }  
	      
   }
}
// add amc details
elseif (isset($_POST['submit_form3']))
{
	  $clientname = $_POST['client_name'];
    $software_purchased = $_POST['soft'];
    $module_name = $_POST['module_name'];
    $invoice_no = $_POST['invoice_no'];
    $invoice_date = $_POST['invoice_date'];
    $amc_period = $_POST['amc_period'];
    $per_of_amc_given = $_POST['per_of_amc_given'];
    $remarks = $_POST['remarks'];
    $s1 = (string)$invoice_date;
    $s2 = (string)$amc_period;
    $s3 = (string)$per_of_amc_given;
    if (empty($clientname) || empty($software_purchased) || empty($module_name) || empty($invoice_no) || empty($s1) || empty($s2) || empty($s3))
    {
        header("Location:http://localhost:81/CRUD/home.php?form=emptyfields");
        exit();
    }
    else 
    {
        if(!preg_match("/^[a-zA-Z .]*$/", $clientname))
        {
            header("Location:http://localhost:81/CRUD/home.php?form=invalid");
            exit();
        }
        else         {
            
            $sql1 = "SELECT client_id FROM softlinkasia.main WHERE client_name = '$clientname' AND software_purchased='$software_purchased'";
            $result1 = mysqli_query($conn, $sql1);
            $resultcheck = mysqli_num_rows($result1);
            if ($resultcheck < 1)
            {
               echo "<p class='error_message'> This client doesn't have access to this module. </p>";
            }
            else
            { 
               $row = mysqli_fetch_assoc($result1);
               $client_id = $row['client_id'];
               $sql2 = "INSERT INTO softlinkasia.amc(client_id, module_name, invoice_no, invoice_date, amc_period, per_of_amc_given, remarks) VALUES('$client_id', '$module_name', '$invoice_no', '$invoice_date', '$amc_period', '$per_of_amc_given', '$remarks')";
               if(mysqli_query($conn, $sql2))
               {
                   header("Location:http://localhost:81/CRUD/home.php?form=success");
                   exit();
               }
               else
               {
                   echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
               }
               
            }
        }
    }
}

//add configuration details
else if(isset($_POST['submit_form10']))
{
    $client_name = $_POST['client_name'];
    $config_soft = $_POST['config_soft'];
    if(empty($client_name) || empty($config_soft))
    {
        header("Location:http://localhost:81/CRUD/home.php?form=emptyfields1");
        exit();
    }
    else
    {
        $query1 ="SELECT client_id FROM softlinkasia.main WHERE client_name = '$client_name' AND software_purchased='$config_soft'";
        $result1 = mysqli_query($conn, $query1);
        $resultcheck = mysqli_num_rows($result1);
        if($resultcheck < 0)
        {
            echo "<p> This is not a registered client</p>";
        }
        else
        {
           $row = mysqli_fetch_assoc($result1);
           $client_id = $row['client_id'];
           if($config_soft == 'alice')
           {
              $installation_date = $_POST['installation_date'];
              $s1 = (string)$installation_date;
              $version = $_POST['version'];
              $nodes = $_POST['nodes'];
              $s2 = (string)$nodes;
              $os= $_POST['os'];
              $system = $_POST['system'];
              $memory = $_POST['memory'];
              $os_type = $_POST['os_type'];
              $cmp_name = $_POST['cmp_name'];
              $full_cmp_name = $_POST['full_cmp_name'];
              $domain = $_POST['domain'];
              $workgroup = $_POST['workgroup'];
              $ip = $_POST['ip'];
              $webserver = $_POST['webserver'];
              $url_web_opac = $_POST['url_web_opac'];
              $opac_loc = $_POST['opac_loc'];
              $db_loc = $_POST['db_loc'];
              $drive_name_type = $_POST['drive_name_type'];
              $free_space = $_POST['free_space'];
              $total_space = $_POST['total_space'];
              $client_os = $_POST['client_os'];
              $client_system = $_POST['client_system'];
              $client_memory = $_POST['client_memory'];
              $client_system_type = $_POST['client_system_type'];
              $remarks = $_POST['remarks'];
              if(empty($version) || empty($s1) || empty($s2) || empty($os) || empty($system) || empty($memory) || empty($os_type) || empty($cmp_name) || empty($full_cmp_name) || empty($domain) || empty($workgroup) || empty($ip) || empty($webserver) || empty($url_web_opac) || empty($opac_loc) || empty($db_loc) || empty($drive_name_type) || empty($free_space) || empty($total_space) || empty($client_os) || empty($client_system) || empty($client_memory) || empty($client_system_type))
              {
                  header("Location:http://localhost:81/CRUD/home.php?form=emptyfields2");
                  exit();
              }
              else
              {                   
                   $sql1 = "INSERT INTO softlinkasia.alice_system_details(client_id, installation_date, version, no_of_nodes, os, system, installed_memory, os_type, cmp_name, full_cmp_name, domain, workgroup, ip, webserver, url_web_opac, opac_loc, db_loc) VALUES('$client_id', '$installation_date', '$version', '$nodes', '$os','$system', '$memory', '$os_type', '$cmp_name', '$full_cmp_name', '$domain', '$workgroup', '$ip', '$webserver', '$url_web_opac', '$opac_loc', '$db_loc')";
                   $sql2 = "INSERT INTO softlinkasia.hard_disk_alice(client_id, drive_name_type, free_space, total_space) VALUES('$client_id', '$drive_name_type', '$free_space', '$total_space')";
                   $sql3 = "INSERT INTO softlinkasia.workstation(client_id, os, system, installed_memory, system_type, remarks) VALUES('$client_id', '$client_os', '$client_system', '$client_memory', '$client_system_type', '$remarks')";
                   if(mysqli_query($conn, $sql1))
                   {
                      if(mysqli_query($conn, $sql2))
                      {
                          if(mysqli_query($conn, $sql3))
                          {
                             header("Location:http://localhost:81/CRUD/home.php?form=success");
                             exit();
                          }
                          else
                          {
                             echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);
                          }
                      }
                      else
                      {
                          echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
                      }
                   } 
                   else 
                   {
                      echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
                   }               
              }
           }
            else if($config_soft =='liberty')
            {
               $installation_date = $_POST['l_installation_date'];
               $s1 = (string)$installation_date;
               $l_version = $_POST['l_version'];
               $db_name = $_POST['db_name'];
               $l_os = $_POST['l_os'];
               $l_system = $_POST['l_system'];
               $l_memory = $_POST['l_memory'];
               $l_system_type = $_POST['l_system_type'];
               $hard_disk = $_POST['hard_disk'];
               $l_cmp_name = $_POST['l_cmp_name'];
               $l_full_cmp_name = $_POST['l_full_cmp_name'];
               $l_workgroup = $_POST['l_workgroup'];
               $ip_int = $_POST['ip_int'];
               $ip_ext = $_POST['ip_ext'];
               $l_webserver = $_POST['l_webserver'];
               $url_int = $_POST['url_int'];
               $url_ext = $_POST['url_ext'];
               $l_url_int = $_POST['l_url_int'];
               $l_url_ext = $_POST['l_url_ext'];
               $l_db_loc = $_POST['l_db_loc'];
               $l_server_loc = $_POST['l_server_loc'];
               $c_used = $_POST['c_used'];
               $c_available = $_POST['c_available'];
               $d_used = $_POST['d_used'];
               $d_available = $_POST['d_available'];
               if(empty($s1) || empty($l_version) || empty($db_name) || empty($l_os) || empty($l_system) || empty($l_memory) || empty($l_system_type) || empty($hard_disk) || empty($l_cmp_name) || empty($l_full_cmp_name) || empty($l_workgroup) || empty($ip_int) || empty($ip_ext) || empty($l_webserver) || empty($url_int) || empty($url_ext) || empty($l_url_int) || empty($l_url_ext) || empty($l_db_loc) || empty($l_server_loc))
               {
                   header("Location:http://localhost:81/CRUD/home.php?form=emptyfields");
                   exit();
               }
               else
               {
                   $sql1 = "INSERT INTO softlinkasia.liberty_system_details(installation_date, version, db_name, os, system, installed_memory, system_type, harddisk, cmp_name, full_cmp_name, workgroup, ip_internal, ip_external, webserver, url_report_server_int, url_report_server_ext, url_liberty_int, url_liberty_ext, db_loc, server_loc, client_id, c_used, c_available, d_used, d_available) VALUES('$installation_date', '$l_version', '$db_name', '$l_os', '$l_system', '$l_memory', '$l_system_type', $hard_disk', '$l_cmp_name', '$l_full_cmp_name', '$l_workgroup', '$ip_int', '$ip_ext', '$l_webserver', '$url_int', '$url_ext', '$l_url_int', '$l_url_ext', '$l_db_loc', '$l_server_loc', '$client_id', '$c_used', '$c_available', '$d_used', '$d_available')";
                   if(mysqli_query($conn, $sql1))
                   {
                      header("Location:http://localhost:81/CRUD/home.php?form=success");
                      exit();
                   } 
                   else 
                   {
                      echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
                   }
                }
            }
        }
    }
}
// updating records
else if (isset($_POST['submit_form2']))
{
   $clientname = mysqli_real_escape_string($conn, $_POST['client_name']);
   $rec = $_POST['rec'];
   $purchased_order_no = $_POST['purchased_order_no'];
   $cost = $_POST['cost'];
   $reg_no = $_POST['reg_no'];
   $date_of_new_records = $_POST['date_of_new_records'];
   $installation_date = $_POST['installation_date'];
   $s1 = (string)$cost;
   $s2 = (string)$date_of_new_records;
   $s3 = (string)$installation_date;

   if (empty($clientname) || empty($rec) || empty($purchased_order_no) || empty($s1) || empty($reg_no) || empty($s2) || empty($s3))
   {
      header("Location:http://localhost:81/CRUD/home.php?form=emptyfields");
      exit();
   }
   else 
   {
      if(!preg_match("/^[a-zA-Z .]*$/", $clientname))
      {
          header("Location:http://localhost:81/CRUD/home.php?form=invalid");
                exit();
      }
      else 
      {
         $sql1 = "SELECT client_id FROM softlinkasia.main WHERE client_name='$clientname' AND software_purchased='alice'";
         $result1 = mysqli_query($conn, $sql1);
         $resultcheck = mysqli_num_rows($result1);
         if( $resultcheck < 1)
         {
            echo "<p class='error_message'> This isn't your registered client </p>";
         }
         else 
         {
            $row = mysqli_fetch_assoc($result1);
            $client_id = $row['client_id'];
            $sql2 = "INSERT INTO softlinkasia.records(client_id, records, installation_date, purchased_order_no, date_of_new_records, cost, reg_no) VALUES('$client_id', '$rec', '$installation_date', '$purchased_order_no', '$date_of_new_records', '$cost', '$reg_no')";
            if(mysqli_query($conn, $sql2))
            {
                header("Location:http://localhost:81/CRUD/home.php?form=success");
                  exit();
            }            
         }
      }
   }
} 
// product details
else if( isset($_POST['submit_form8']))
{
    $product_name = $_POST['product_name'];
    $supplier_name = $_POST['supplier_name'];
    $specifications = $_POST['specifications'];
    $unit = $_POST['unit'];
    $rate = $_POST['rate'];
    $tax_type =$_POST['tax_type'];
    $delivery_terms = $_POST['delivery_terms'];
    $notes = $_POST['notes'];
    $warranty = $_POST['warranty'];
    $s1 = (string)$unit;
    $s2 = (string)$rate;

    if (empty($product_name) || empty($specifications) || empty($s1) || empty($s2) || empty($delivery_terms) || empty($notes))
    {
       header("Location:http://localhost:81/CRUD/home.php?form=emptyfields");
       exit();
    }
    else 
    {
        $sql2 = "INSERT INTO softlinkasia.product(product_name, specifications, unit, rate, tax_type, delivery_terms, notes, warranty, supplier_name) VALUES('$product_name','$specifications', '$unit', '$rate', '$tax_type', '$delivery_terms', '$notes', '$warranty', '$supplier_name')";
        if(mysqli_query($conn, $sql2))   
        {
            header("Location:http://localhost:81/CRUD/home.php?form=success");
            exit();
        } 
        else 
        {
            echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
        }
    }
}
//adding supp
else if(isset($_POST['submit_form6']))
{
    $supplier_name = mysqli_real_escape_string($conn, $_POST['supplier_name']);
    $type_of_supplier = mysqli_real_escape_string($conn, $_POST['type_of_supplier']);
    $location = $_POST['location'];
    $contact_person = mysqli_real_escape_string($conn, $_POST['contact_person']);
    $phone_no = $_POST['phone_no'];
    $remarks = $_POST['remarks'];
    if(empty($supplier_name) || empty($type_of_supplier) || empty($location) || empty($contact_person) || empty($phone_no))
    {
        header("Location:http://localhost:81/CRUD/home.php?form=empty");
                  exit();
    }
    else 
    {
        if (!preg_match("/^[a-zA-Z .]*$/", $supplier_name))
         {
              header("Location:http://localhost:81/CRUD/home.php?form=invalid");
              exit();  
         }
         else
         {
            $sql1 = "SELECT * FROM supplier WHERE supplier_name='$supplier_name'";
            $result1 = mysqli_query($conn, $sql1);
            $resultcheck = mysqli_num_rows($result1);
            if( $resultcheck > 0)
            {
                echo "<p class='error_message'> This is a already registered supplier. </p>";
            }
            else
            {
                $sql2 = "INSERT INTO supplier(supplier_name, type_of_supplier, location, contact_person, phone_no, remarks) VALUES ('$supplier_name', '$type_of_supplier', '$location', '$contact_person', '$phone_no', '$remarks')";
                if(mysqli_query($conn, $sql2))
                {
                   header("Location:http://localhost:81/CRUD/home.php?form=success");
                   exit();
                } 
                else 
                {
                   echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
                }
            } 
         }
    }
}
// equip B/D
else if(isset($_POST['submit_form5']))
{
    $equip_name = $_POST['equip_name'];
    $bd_date = $_POST['bd_date'];
    $bd_time = $_POST['bd_time'];
    $id_no = $_POST['id_no'];
    $bd_details = $_POST['bd_details'];
    $action_taken = $_POST['action_taken'];
    $bd_release = $_POST['bd_release'];
    $total_bd_hrs = $_POST['total_bd_hrs'];
    $remarks = $_POST['remarks'];
    $s1 = (string)$bd_date;
    $s2 = (string)$total_bd_hrs;
    

    if (empty($equip_name) || empty($s1) || empty($id_no) || empty($bd_details) || empty($action_taken) || empty($bd_release) || empty($s2))
    {
        header("Location:http://localhost:81/CRUD/home.php?form=empty");
        exit();
    }
    else 
    {
        if (!preg_match("/^[a-zA-Z ]*$/", $equip_name))
        {
            header("Location:http://localhost:81/CRUD/home.php?form=empty");
            exit();
        }
        else 
        {
            $sql = "INSERT INTO softlinkasia.euipment_bd_details(equip_name, bd_date, bd_time, id_no, bd_details, action_taken, bd_release, total_bd_hrs, remarks) VALUES ('$equip_name', '$bd_date', '$bd_time', '$id_no', '$bd_details', '$action_taken', '$bd_release', '$total_bd_hrs', '$remarks')";
            mysqli_query($conn, $sql);
            header("Location:http://localhost:81/CRUD/home.php?form=success");
            exit();
        }
    }
}

else if(isset($_POST['submit_form_con']))
{
    $clientname = $_POST['client_name'];
    $con_name = $_POST['con_name'];
    $phone_no = $_POST['phone_no'];
    $designation = $_POST['designation'];
    if( empty($clientname) || empty($con_name) || empty($phone_no) || empty($designation))
    {
        header("Location:http://localhost:81/CRUD/home.php?form=empty");
        exit();
    }
    else
    {
        if(!preg_match("/^[a-zA-Z ]*$/", $clientname) || !preg_match("/^[a-zA-Z ]*$/", $con_name) || !preg_match("/^[a-zA-Z ]*$/", $designation))
        {
            header("Location:http://localhost:81/CRUD/home.php?form=invalid");
            exit();
        }
        else
        {
            $sql1 = "SELECT client_id FROM softlinkasia.main WHERE client_name='$clientname'";
            $result1 = mysqli_query($conn, $sql1);
            $resultcheck = mysqli_num_rows($result1);
            if( $resultcheck < 1)
            {
                 echo "<p class='error_message'> This isn't your registered client. </p>";
            }
            else 
            {
                 $row = mysqli_fetch_assoc($result1);
                 $client_id = $row['client_id'];
                 $sql2 = "INSERT INTO softlinkasia.contact_details(client_id, con_name, phone_no, designation) VALUES('$client_id', '$con_name', '$phone_no', '$designation')";
                 mysqli_query($conn, $sql2);
                 $con_name2 = $_POST['con_name2'];
                 $phone_no2 = $_POST['phone_no2'];
                 $designation2 = $_POST['designation2'];
                 if (!empty($con_name2) || !empty($phone_no2) || !empty($designation2))
                 {
                    
                    if(!preg_match("/^[a-zA-Z ]*$/", $con_name2) || !preg_match("/^[a-zA-Z ]*$/", $designation2))
                    {
                        header("Location:http://localhost:81/CRUD/home.php?form=invalid");
                        exit();
                    }
                    else 
                    {           
                        $sql22 = "INSERT INTO softlinkasia.contact_details(client_id, con_name, phone_no, designation) VALUES('$client_id', '$con_name2', '$phone_no2', '$designation2')";
                        mysqli_query($conn, $sql22);                        
                    }
                 }
                 $con_name3 = $_POST['con_name3'];
                 $phone_no3 = $_POST['phone_no3'];
                 $designation3 = $_POST['designation3'];
                 if (!empty($con_name3) || !empty($phone_no3) || !empty($designation3))
                 {                    
                     if(!preg_match("/^[a-zA-Z ]*$/", $con_name3) || !preg_match("/^[a-zA-Z ]*$/", $designation3))
                     {
                          header("Location:http://localhost:81/CRUD/home.php?form=invalid");
                          exit();
                     }
                     else 
                     {
                          $sql23 = "INSERT INTO softlinkasia.contact_details(client_id, con_name, phone_no, designation) VALUES('$client_id', '$con_name3', '$phone_no3', '$designation3')";
                          mysqli_query($conn, $sql23);
                          
                     }
                }
                header("Location:http://localhost:81/CRUD/home.php?form=success");
                exit();
    
           }
       }    
    }
}
//intern details
else if(isset($_POST['submit_form9']))
{
    $name = mysqli_escape_string($conn, $_POST['name']);
    $addrs =$_POST['addrs'];
    $contact_no = $_POST['contact_no'];
    $college = $_POST['college'];
    $degree = $_POST['degree'];
    $grad_year = $_POST['grad_year'];
    $worked_on = $_POST['worked_on'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $s1 = (string)$start_date;
    $s2 = (string)$end_date;
    $s3 = (string)$worked_on;

    if(empty($name) |empty($addrs) || empty($contact_no) ||  empty($college) || empty($degree) || empty($grad_year) || empty($s3) || empty($s1) || empty($s2))
    {
        header("Location:http://localhost:81/CRUD/home.php?form=empty");
                   exit();
    }
    else
    {
        if(!preg_match("/^[a-zA-Z .]*$/", $name))
        {
           header("Location:http://localhost:81/CRUD/home.php?form=invalid");
                   exit();
        }
        else
        {
            $sql1 = "INSERT INTO securelogin.intern(name, addrs, contact_no, college, degree, grad_year, worked_on, start_date, end_date) VALUES('$name', '$addrs', '$contact_no', '$college', '$degree', '$grad_year', '$worked_on', '$start_date', '$end_date')";
            mysqli_query($conn, $sql1);
            header("Location:http://localhost:81/CRUD/home.php?form=success");
                   exit();
        }
    }
}

//edit main details of client
else if(isset($_POST['main_table_btn_save']))
{
    $address = $_POST['address'];
    $product_purchased = $_POST['product_purchased'];
    $users = $_POST['users'];
    $s1 = (string)$users;
    $status = $_POST['status'];
    $client_id= $_POST['client_id'];
    if(empty($s1) || empty($status) || empty($address))
    {
        header("Location:http://localhost:81/CRUD/home.php?form=empty");
        exit();
    }
    else
    {
        $query="UPDATE softlinkasia.main set address='$address', product_purchased='$product_purchased', users= '$users', status='$status' WHERE client_id='$client_id'";
        if(mysqli_query($conn, $query))
        {
            header("Location:http://localhost:81/CRUD/home.php?form=success");
            exit();
        } 
        else 
        {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
        
    }
}
else if(isset($_POST['main_table_btn_del']))
{
    $client_id= $_POST['client_id'];
    $query ="DELETE FROM softlinkasia.main WHERE client_id='$client_id'";
    if(mysqli_query($conn, $query))
        {
            header("Location:http://localhost:81/CRUD/home.php?form=success");
            exit();
        } 
        else 
        {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
}
else if(isset($_POST['mod_table_btn_save']))
{
    $module_name = $_POST['module_name'];
    $date_of_m_purchased = $_POST['date_of_m_purchased'];
    $s1 = (string)$date_of_m_purchased;
    $module_cost = $_POST['module_cost'];
    $s2 = (string)$module_cost;
    $no_of_nodes_purchased = $_POST['no_of_nodes_purchased'];
    $s3 = (string)$no_of_nodes_purchased;
    $purchased_order_no = $_POST['purchased_order_no'];
    $reg_no = $_POST['reg_no'];
    $installation_date = $_POST['installation_date'];
    $s4 = (string)$installation_date;
    $training_date = $_POST['training_date'];
    $s5 = (string)$training_date;
    $no_of_training_days = $_POST['no_of_training_days'];
    $s6 = (string)$no_of_training_days;
    $mod_id = $_POST['mod_id'];
    if(empty($s1) || empty($s2) || empty($s3) || empty($s4) || empty($s5) || empty($s6) || empty($reg_no) || empty($purchased_order_no) || empty($module_name))
    {
        header("Location:http://localhost:81/CRUD/home.php?form=empty");
        exit();     
    }
    else
    {
         $query="UPDATE softlinkasia.modules SET module_name ='$module_name', installation_date='$installation_date', purchased_order_no='$purchased_order_no', no_of_nodes_purchased='$no_of_nodes_purchased', date_of_m_purchased='$date_of_m_purchased', module_cost='$module_cost', reg_no='$reg_no', training_date='$training_date', no_of_training_days='$no_of_training_days' WHERE mod_id='$mod_id'";
         if(mysqli_query($conn, $query))
          {
              header("Location:http://localhost:81/CRUD/home.php?form=success");
              exit();
          } 
          else 
          {
              echo "Error: " . $query . "<br>" . mysqli_error($conn);
          }
    }
}
else if(isset($_POST['mod_table_btn_del']))
{
    $mod_id= $_POST['mod_id'];
    $query ="DELETE FROM softlinkasia.modules WHERE mod_id='$mod_id'";
    if(mysqli_query($conn, $query))
        {
            header("Location:http://localhost:81/CRUD/home.php?form=success");
            exit();
        } 
        else 
        {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
}
else if(isset($_POST['amc_table_btn_save']))
{
    $module_name = $_POST['module_name'];
    $invoice_no = $_POST['invoice_no'];
    $invoice_date = $_POST['invoice_date'];
    $s1 = (string)$invoice_date;
    $amc_period = $_POST['amc_period'];
    $s2 = (string)$amc_period;
    $per_of_amc_given = $_POST['per_of_amc_given'];
    $s3 = (string)$per_of_amc_given;
    $remarks = $_POST['remarks'];
    $amc_id = $_POST['amc_id'];
    if(empty($s1) || empty($s2) || empty($s3) || empty($module_name) || empty($invoice_no) || empty($remarks))
    {
        header("Location:http://localhost:81/CRUD/home.php?form=empty");
        exit();     
    }
    else
    {
        $query="UPDATE softlinkasia.amc SET module_name ='$module_name', invoice_no='$invoice_no', invoice_date='$invoice_date', amc_period='$amc_period', per_of_amc_given='$per_of_amc_given', remarks='$remarks' WHERE amc_id='$amc_id'";
         if(mysqli_query($conn, $query))
          {
              header("Location:http://localhost:81/CRUD/home.php?form=success");
              exit();
          } 
          else 
          {
              echo "Error: " . $query . "<br>" . mysqli_error($conn);
          }
    }
}
else if(isset($_POST['ds_table_btn_save']))
{
       $ds_type = $_POST['ds_type'];
       $ds_start_date = $_POST['start_date'];
       $ds_end_date = $_POST['end_date'];
       $ds_status = $_POST['ds_status'];
       $ds_remarks = $_POST['ds_remarks'];
       $start_date_new = (string)$ds_start_date;
       $end_date_new = (string)$ds_end_date;
       $num = $_POST['no_of_excel_files_rnc'];
      $ds_id = $_POST['ds_id'];
      if (empty($start_date_new) || empty($end_date_new) || empty($ds_status) || empty($ds_type))
      {
          header("Location:http://localhost:81/CRUD/home.php?form=emptyfields2");
          exit();
      }
      else
      {
          $sql2 = "UPDATE softlinkasia.data_service SET type='$ds_type', start_date='$ds_start_date', end_date='$ds_end_date', d_status='$ds_status', remarks='$ds_remarks', no_of_excel_files_rnc='$num' WHERE ds_id='$ds_id'";

                if(mysqli_query($conn, $sql2))
                {
                    header("Location:http://localhost:81/CRUD/home.php?form=success");
                    exit();
                } 
                else 
                {
                    echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
                }           
      }

}
else if(isset($_POST['ds_table_btn_del']))
{
    $ds_id= $_POST['ds_id'];
    $query1 ="SELECT client_id FROM softlinkasia.data_service WHERE ds_id='$ds_id'";
    $result1 = mysqli_query($conn, $query1);
    $row = mysqli_fetch_assoc($result1);
    $client_id=$row['client_id'];
    $query ="DELETE FROM softlinkasia.data_service WHERE ds_id='$ds_id'";
    if(mysqli_query($conn, $query))
    {
        $value="no";
        $query2 ="UPDATE softlinkasia.main SET data_service='$value' WHERE client_id='$client_id'";
        if(mysqli_query($conn, $query2))
        {
            header("Location:http://localhost:81/CRUD/home.php?form=success");
            exit();            
        }
        else
        {
            echo "Error: " . $query2 . "<br>" . mysqli_error($conn);
        }
    } 
    else 
    {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
else if(isset($_POST['de_table_btn_save']))
{
       $de_type = $_POST['de_type'];
       $de_start_date = $_POST['de_start_date'];
       $de_end_date = $_POST['de_end_date'];
       $de_status = $_POST['de_status'];
       $de_remarks = $_POST['de_remarks'];
       $start_date_new = (string)$de_start_date;
       $end_date_new = (string)$de_end_date;
      $de_id = $_POST['de_id'];
      if (empty($start_date_new) || empty($end_date_new) || empty($de_status) || empty($de_type))
      {
          header("Location:http://localhost:81/CRUD/home.php?form=emptyfields2");
          exit();
      }
      else
      {
          $sql2 = "UPDATE softlinkasia.data_entry SET type='$de_type', start_date='$de_start_date', end_date='$de_end_date', status='$de_status', remarks='$de_remarks' WHERE de_id='$de_id'";

                if(mysqli_query($conn, $sql2))
                {

                    header("Location:http://localhost:81/CRUD/home.php?form=success");
                    exit();
                } 
                else 
                {
                    echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
                }           
      }
}
else if(isset($_POST['de_table_btn_del']))
{
    $de_id= $_POST['de_id'];
    $query1 ="SELECT client_id FROM softlinkasia.data_entry WHERE de_id='$de_id'";
    $result1 = mysqli_query($conn, $query1);
    $row = mysqli_fetch_assoc($result1);
    $client_id=$row['client_id'];
    $query ="DELETE FROM softlinkasia.data_entry WHERE de_id='$de_id'";
    if(mysqli_query($conn, $query))
    {  
        $value="no";
        $query2 ="UPDATE softlinkasia.main SET data_entry='$value' WHERE client_id='$client_id'";
        if(mysqli_query($conn, $query2))
        {
            header("Location:http://localhost:81/CRUD/home.php?form=success");
            exit();
        }
        else
        {
            echo "Error: " . $query2 . "<br>" . mysqli_error($conn);
        }
    } 
    else 
    {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
else if(isset($_POST['amc_table_btn_del']))
{
    $amc_id= $_POST['amc_id'];
    $query ="DELETE FROM softlinkasia.amc WHERE amc_id='$amc_id'";
    if(mysqli_query($conn, $query))
        {
            header("Location:http://localhost:81/CRUD/home.php?form=success");
            exit();
        } 
        else 
        {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
}
else if(isset($_POST['rec_table_btn_save']))
{
    $records = $_POST['records'];
    $s1 = (string)$records;
    $installation_date = $_POST['installation_date'];
    $s2 = (string)$installation_date;
    $purchased_order_no = $_POST['purchased_order_no'];
    $date_of_new_records = $_POST['date_of_new_records'];
    $s3 = (string)$date_of_new_records;
    $cost = $_POST['cost'];
    $s4 = (string)$cost;
    $reg_no = $_POST['reg_no'];
    $rec_id = $_POST['rec_id'];
    if(empty($s1) || empty($s2) || empty($s3)  || empty($s4) || empty($reg_no) || empty($purchased_order_no))
    {
        header("Location:http://localhost:81/CRUD/home.php?form=empty");
        exit();     
    }
    else
    {
        $query="UPDATE softlinkasia.records SET records ='$records', installation_date='$installation_date', purchased_order_no='$purchased_order_no', date_of_new_records='$date_of_new_records', cost='$cost', reg_no='$reg_no' WHERE rec_id='$rec_id'";
         if(mysqli_query($conn, $query))
          {
              header("Location:http://localhost:81/CRUD/home.php?form=success");
              exit();
          } 
          else 
          {
              echo "Error: " . $query . "<br>" . mysqli_error($conn);
          }
    }
}
else if(isset($_POST['rec_table_btn_del']))
{
    $rec_id= $_POST['rec_id'];
    $query ="DELETE FROM softlinkasia.records WHERE rec_id='$rec_id'";
    if(mysqli_query($conn, $query))
        {
            header("Location:http://localhost:81/CRUD/home.php?form=success");
            exit();
        } 
        else 
        {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
}
else if(isset($_POST['config_table_btn_save']))
{
    $client_id = $_POST['client_id'];
    $software_purchased = $_POST['software_purchased'];
    if($software_purchased == 'alice')
    {
       $installation_date = $_POST['installation_date'];
       $s1 = (string)$installation_date;
       $version = $_POST['version'];
       $nodes = $_POST['nodes'];
       $s2 = (string)$nodes;
       $os= $_POST['os'];
       $system = $_POST['system'];
       $memory = $_POST['memory'];
       $os_type = $_POST['os_type'];
       $cmp_name = $_POST['cmp_name'];
       $full_cmp_name = $_POST['full_cmp_name'];
       $domain = $_POST['domain'];
       $workgroup = $_POST['workgroup'];
       $ip = $_POST['ip'];
       $webserver = $_POST['webserver'];
       $url_web_opac = $_POST['url_web_opac'];
       $opac_loc = $_POST['opac_loc'];
       $db_loc = $_POST['db_loc'];
       $drive_name_type = $_POST['drive_name_type'];
       $free_space = $_POST['free_space'];
       $total_space = $_POST['total_space'];
       $client_os = $_POST['client_os'];
       $client_system = $_POST['client_system'];
       $client_memory = $_POST['client_memory'];
       $client_system_type = $_POST['client_system_type'];
       $remarks = $_POST['remarks'];
       if(empty($version) || empty($s1) || empty($s2) || empty($os) || empty($system) || empty($memory) || empty($os_type) || empty($cmp_name) || empty($full_cmp_name) || empty($domain) || empty($workgroup) || empty($ip) || empty($webserver) || empty($url_web_opac) || empty($opac_loc) || empty($db_loc) || empty($drive_name_type) || empty($free_space) || empty($total_space) || empty($client_os) || empty($client_system) || empty($client_memory) || empty($client_system_type))
       {
            header("Location:http://localhost:81/CRUD/home.php?form=emptyfields2");
            exit();
       }
       else
       {
          $query="UPDATE softlinkasia.alice_system_details SET installation_date='$installation_date', version='$version', no_of_nodes='$nodes', os='$os', system='$system', installed_memory='$memory', os_type='$os', cmp_name='$cmp_name', full_cmp_name='$full_cmp_name', domain='$domain', workgroup='$workgroup', ip='$ip', webserver='$webserver', url_web_opac='$url_web_opac', opac_loc='$opac_loc', db_loc='$db_loc' WHERE client_id='$client_id'";
         if(mysqli_query($conn, $query))
          {
               $query1 = "UPDATE softlinkasia.hard_disk_alice SET drive_name_type='$drive_name_type', free_space='$free_space', total_space='$total_space' WHERE client_id='$client_id'";
               if(mysqli_query($conn, $query1))
               {
                  $query2 = "UPDATE softlinkasia.workstation SET os='$client_os', system='$client_system', installed_memory='$client_memory', system_type='$client_system_type', remarks='$remarks' WHERE client_id='$client_id'";
                  if(mysqli_query($conn, $query2))
                  {
                       header("Location:http://localhost:81/CRUD/home.php?form=success");
                       exit();
                  }
                  else 
                  {
                       echo "Error: " . $query2 . "<br>" . mysqli_error($conn);
                  }
               }
               else 
               {
                   echo "Error: " . $query1 . "<br>" . mysqli_error($conn);
               }
          } 
          else 
          {
              echo "Error: " . $query . "<br>" . mysqli_error($conn);
          } 
       }
    }
    elseif($software_purchased =='liberty')
    {
        $installation_date = $_POST['l_installation_date'];
        $s1 = (string)$installation_date;
        $l_version = $_POST['l_version'];
        $db_name = $_POST['db_name'];
        $l_os = $_POST['l_os'];
        $l_system = $_POST['l_system'];
        $l_memory = $_POST['l_memory'];
        $l_system_type = $_POST['l_system_type'];
        $hard_disk = $_POST['hard_disk'];
        $l_cmp_name = $_POST['l_cmp_name'];
        $l_full_cmp_name = $_POST['l_full_cmp_name'];
        $l_workgroup = $_POST['l_workgroup'];
        $ip_int = $_POST['ip_int'];
        $ip_ext = $_POST['ip_ext'];
        $l_webserver = $_POST['l_webserver'];
        $url_int = $_POST['url_int'];
        $url_ext = $_POST['url_ext'];
        $l_url_int = $_POST['l_url_int'];
        $l_url_ext = $_POST['l_url_ext'];
        $l_db_loc = $_POST['l_db_loc'];
        $l_server_loc = $_POST['l_server_loc'];
        $c_used = $_POST['c_used'];
        $c_available = $_POST['c_available'];
        $d_used = $_POST['d_used'];
        $d_available = $_POST['d_available'];
        if(empty($s1) || empty($l_version) || empty($db_name) || empty($l_os) || empty($l_system) || empty($l_memory) || empty($l_system_type) || empty($hard_disk) || empty($l_cmp_name) || empty($l_full_cmp_name) || empty($l_workgroup) || empty($ip_int) || empty($ip_ext) || empty($l_webserver) || empty($url_int) || empty($url_ext) || empty($l_url_int) || empty($l_url_ext) || empty($l_db_loc) || empty($l_server_loc))
        {
            header("Location:http://localhost:81/CRUD/home.php?form=emptyfields");
            exit();
        }
        else
        {
             $query="UPDATE softlinkasia.liberty_system_details SET installation_date='$installation_date', version='$l_version', db_name='$db_name', os='$l_os', system='$l_system', installed_memory='$l_memory', system_type='$l_system_type', harddisk='$hard_disk', cmp_name='$l_cmp_name', full_cmp_name='$l_full_cmp_name', workgroup='$l_workgroup', ip_internal='$ip_int', ip_external='$ip_ext', webserver='$l_webserver', url_report_server_int ='$url_int', url_report_server_ext='$url_ext', url_liberty_int='$l_url_int', url_liberty_ext='$l_url_ext', db_loc='$l_db_loc', server_loc='$l_server_loc', c_used ='$c_used',c_available='$c_used', d_used='$d_used', d_available='$d_available' WHERE client_id='$client_id'";
             if(mysqli_query($conn, $query))
             {
                 header("Location:http://localhost:81/CRUD/home.php?form=success");
                 exit();
             }
             else 
            {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }  
        }       
    }
                            
}
else if(isset($_POST['config_table_btn_del']))
{
    $config_id= $_POST['config_id'];
    $query ="DELETE FROM softlinkasia.records WHERE config_id='$config_id'";
    if(mysqli_query($conn, $query))
        {
            header("Location:http://localhost:81/CRUD/home.php?form=success");
            exit();
        } 
        else 
        {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
}
else if(isset($_POST['con_table_btn_save']))
{
    $con_name = $_POST['con_name'];
    $phone_no = $_POST['phone_no'];
    $designation = $_POST['designation'];
    $con_id = $_POST['con_id'];
    if(empty($con_name) || empty($phone_no) || empty($designation))
    {
        header("Location:http://localhost:81/CRUD/home.php?form=empty");
        exit();
    }
    else
    {
        $sql2 = "UPDATE softlinkasia.contact_details SET con_name='$con_name', phone_no='$phone_no', designation='$designation' WHERE con_id='$con_id'";
        if(mysqli_query($conn, $sql2))
        {
            header("Location:http://localhost:81/CRUD/home.php?form=success");
            exit();
        } 
        else 
        {
            echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
        }
    }
}
else if(isset($_POST['con_table_btn_del']))
{
    $con_id= $_POST['con_id'];
    $query ="DELETE FROM softlinkasia.contact_details WHERE con_id='$con_id'";
    if(mysqli_query($conn, $query))
        {
            header("Location:http://localhost:81/CRUD/home.php?form=success");
            exit();
        } 
        else 
        {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
}
else if(isset($_POST['prod_table_btn_save']))
{
    $product_name = $_POST['product_name'];
    $supplier_name = $_POST['supplier_name'];
    $specifications = $_POST['specifications'];
    $unit = $_POST['unit'];
    $rate = $_POST['rate'];
    $tax_type =$_POST['tax_type'];
    $delivery_terms = $_POST['delivery_terms'];
    $notes = $_POST['notes'];
    $warranty = $_POST['warranty'];
    $s1 = (string)$unit;
    $s2 = (string)$rate;
    $product_id= $_POST['product_id'];
    if (empty($product_name) || empty($specifications) || empty($s1) || empty($s2) || empty($delivery_terms) || empty($notes))
    {
       header("Location:http://localhost:81/CRUD/home.php?form=emptyfields");
       exit();
    }
    else 
    {
        $sql2 = "UPDATE softlinkasia.product SET product_name='$product_name', specifications='$specifications', unit='$unit', rate='$rate', tax_type='$tax_type', delivery_terms='$delivery_terms', notes='$notes', warranty='$warranty', supplier_name='$supplier_name' WHERE product_id='$product_id'";
       if(mysqli_query($conn, $sql2))     
       {
           header("Location:http://localhost:81/CRUD/home.php?form=success");
           exit();
       } 
       else 
       {
           echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
       }          
    }
}
else if(isset($_POST['prod_table_btn_del']))
{
     $product_id= $_POST['product_id'];
    $query ="DELETE FROM softlinkasia.product WHERE product_id='$product_id'";
    if(mysqli_query($conn, $query))
    {
        header("Location:http://localhost:81/CRUD/home.php?form=success");
        exit();
    } 
    else 
    {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
else if(isset($_POST['supp_table_btn_save']))
{
    $supplier_name = $_POST['supplier_name'];
    $type_of_supplier = $_POST['type_of_supplier'];
    $location = $_POST['location'];
    $contact_person = $_POST['contact_person'];
    $phone_no = $_POST['phone_no'];
    $remarks = $_POST['remarks'];
    $supplier_id = $_POST['supplier_id'];
    if(empty($supplier_name) || empty($type_of_supplier) || empty($location) || empty($contact_person) || empty($phone_no))
    {
        header("Location:http://localhost:81/CRUD/home.php?form=empty");
        exit();
    }
    else 
    {
        $sql2 = "UPDATE softlinkasia.supplier SET supplier_name='$supplier_name', type_of_supplier='$type_of_supplier', location='$location', contact_person='$contact_person', phone_no='$phone_no', remarks='$remarks' WHERE supplier_id='$supplier_id'";
        if(mysqli_query($conn, $sql2))
        {
            header("Location:http://localhost:81/CRUD/home.php?form=success");
            exit();
        } 
        else 
        {
           echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
        } 
    }
}
else if(isset($_POST['supp_table_btn_del']))
{
    $supplier_id= $_POST['supplier_id'];
    $query ="DELETE FROM softlinkasia.supplier WHERE supplier_id='$supplier_id'";
    if(mysqli_query($conn, $query))
    {
        header("Location:http://localhost:81/CRUD/home.php?form=success");
        exit();
    } 
    else 
    {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
else if(isset($_POST['bd_table_btn_save']))
{
    $equip_name = $_POST['equip_name'];
    $bd_date = $_POST['bd_date'];
    $bd_time = $_POST['bd_time'];
    $id_no = $_POST['id_no'];
    $bd_details = $_POST['bd_details'];
    $action_taken = $_POST['action_taken'];
    $bd_release = $_POST['bd_release'];
    $total_bd_hrs = $_POST['total_bd_hrs'];
    $remarks = $_POST['remarks'];
    $s1 = (string)$bd_date;
    $s2 = (string)$total_bd_hrs;
    $bd_id = $_POST['bd_id'];
    if (empty($equip_name) || empty($s1) || empty($id_no) || empty($bd_details) || empty($action_taken) || empty($bd_release) || empty($s2))
    {
        header("Location:http://localhost:81/CRUD/home.php?form=empty");
        exit();
    }
    else
    {
        $sql = "UPDATE softlinkasia.euipment_bd_details SET equip_name='$equip_name', bd_date='$bd_date', bd_time='$bd_time', id_no='$id_no', bd_details='$bd_details', action_taken= '$action_taken', bd_release='$bd_release', total_bd_hrs='$total_bd_hrs', remarks='$remarks' WHERE bd_id='$bd_id'";
        if(mysqli_query($conn, $sql))
        {
            header("Location:http://localhost:81/CRUD/home.php?form=success");
            exit();
        }
        else 
        {
           echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        } 
    } 
}
else if(isset($_POST['bd_table_btn_del']))
{
    $bd_id= $_POST['bd_id'];
    $query ="DELETE FROM softlinkasia.euipment_bd_details WHERE bd_id='$bd_id'";
    if(mysqli_query($conn, $query))
    {
        header("Location:http://localhost:81/CRUD/home.php?form=success");
        exit();
    } 
    else 
    {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
else if(isset($_POST['intern_table_btn_save']))
{
    $name = $_POST['name'];
    $addrs =$_POST['addrs'];
    $contact_no = $_POST['contact_no'];
    $college = $_POST['college'];
    $degree = $_POST['degree'];
    $grad_year = $_POST['grad_year'];
    $worked_on = $_POST['worked_on'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $s1 = (string)$start_date;
    $s2 = (string)$end_date;
    $intern_id=$_POST['intern_id'];
    if(empty($name) |empty($addrs) || empty($contact_no) ||  empty($college) || empty($degree) || empty($grad_year) || empty($s1) || empty($s2))
    {
        header("Location:http://localhost:81/CRUD/home.php?form=empty");
        exit();
    }
    else
    {
        $sql1 = "UPDATE securelogin.intern SET name='$name', addrs='$addrs', contact_no='$contact_no', college='$college', degree='$degree', grad_year='$grad_year', worked_on='$worked_on', start_date='$start_date', end_date='$end_date' WHERE intern_id='$intern_id'";
        mysqli_query($conn, $sql1);
        header("Location:http://localhost:81/CRUD/home.php?form=success");
        exit();
    }
}
else if(isset($_POST['intern_table_btn_del']))
{
    $intern_id= $_POST['intern_id'];
    $query ="DELETE FROM securelogin.intern WHERE intern_id='$intern_id'";
    if(mysqli_query($conn, $query))
    {
        header("Location:http://localhost:81/CRUD/home.php?form=success");
        exit();
    } 
    else 
    {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
else if(isset($_POST['config_table_btn_pdf_a']))
{
       $client_name = $_POST['client_name'];
       $installation_date = $_POST['installation_date'];
       $s1 = (string)$installation_date;
       $version = $_POST['version'];
       $nodes = $_POST['nodes'];
       $s2 = (string)$nodes;
       $os= $_POST['os'];
       $system = $_POST['system'];
       $memory = $_POST['memory'];
       $os_type = $_POST['os_type'];
       $cmp_name = $_POST['cmp_name'];
       $full_cmp_name = $_POST['full_cmp_name'];
       $domain = $_POST['domain'];
       $workgroup = $_POST['workgroup'];
       $ip = $_POST['ip'];
       $webserver = $_POST['webserver'];
       $url_web_opac = $_POST['url_web_opac'];
       $opac_loc = $_POST['opac_loc'];
       $db_loc = $_POST['db_loc'];
       $drive_name_type = $_POST['drive_name_type'];
       $free_space = $_POST['free_space'];
       $total_space = $_POST['total_space'];
       $client_os = $_POST['client_os'];
       $client_system = $_POST['client_system'];
       $client_memory = $_POST['client_memory'];
       $client_system_type = $_POST['client_system_type'];
       $remarks = $_POST['remarks'];
       $count = 1;
       require ('fpdf181/fpdf.php');
       class PDF extends FPDF
        {
        // Page header
          function Header()
          {
           $this->Image('fpdf181/logo.jpg',140,5,60,10,'JPG',0,1);
          }

        }
     $pdf = new PDF();
     $pdf->SetMargins(5,14,5,5);
     $pdf->AliasNbPages();
     $pdf->AddPage();
     $pdf->SetFont('Arial','B',12);
     $pdf->Cell(0,10,"Current Configuration of Server and Workstation",0,1,'C');
     $pdf->SetFont('Arial','',10);
     $pdf->Cell(70,7," Institute Name:",0,0);
     $pdf->Cell(70,7,$client_name,0,1);
     $pdf->Cell(70,7," Alice Installation Date:",0,0);
     $pdf->Cell(70,7,$installation_date,0,1);
     $pdf->Cell(70,7," Alice Version:",0,0);
     $pdf->Cell(70,7,$version,0,1);
     $pdf->Cell(70,7," Number of Nodes:",0,0);
     $pdf->Cell(70,7,$nodes,0,1);
     $pdf->Cell(70,7," Windows Operating System:",0,0);
     $pdf->Cell(70,7,$os,0,1);
     $pdf->Cell(70,7," System(Processor):",0,0);
     $pdf->Cell(70,7,$system,0,1);
     $pdf->Cell(70,7," Installed Memory(RAM):",0,0);
     $pdf->Cell(70,7,$memory,0,1);
     $pdf->Cell(70,7," Operating System Type(32/64 Bit):",0,0);
     $pdf->Cell(70,7,$os_type,0,1);
     $pdf->Cell(70,7," Computer Name:",0,0);
     $pdf->Cell(70,7,$cmp_name,0,1);
     $pdf->Cell(70,7," Full Computer Name:",0,0);
     $pdf->Cell(70,7,$full_cmp_name,0,1);
     $pdf->Cell(70,7," Domain(If Yes,Name):",0,0);
     $pdf->Cell(70,7,$domain,0,1);
     $pdf->Cell(70,7," Workgroup(If Yes,Name):",0,0);
     $pdf->Cell(70,7,$workgroup,0,1);
     $pdf->Cell(70,7," IP(Internal/External):",0,0);
     $pdf->Cell(70,7,$ip,0,1);
     $pdf->Cell(70,7," Web Server(IIS):",0,0);
     $pdf->Cell(70,7,$webserver,0,1);
     $pdf->Cell(70,7," URL WEB OPAC:",0,0);
     $pdf->Cell(70,7,$url_web_opac,0,1);
     $pdf->Cell(70,7," WEB OPAC Location:",0,0);
     $pdf->Cell(70,7,$opac_loc,0,1);
     $pdf->Cell(70,7," OASIS + Database Location:",0,0);
     $pdf->Cell(70,7,$db_loc,0,1);
     $pdf->SetFont('Arial','B',12);
     $pdf->Cell(0,10,"Hard DISK",0,1,'L');
     $pdf->SetFont('Arial','',10);
     $pdf->Cell(45,7,"Drive Name Type:",1,0);
     $pdf->Cell(45,7,"Free Space",1,0);
     $pdf->Cell(45,7,"Total Space",1,1);
     $pdf->Cell(45,10,$drive_name_type,1,0);
     $pdf->Cell(45,10,$free_space,1,0);
     $pdf->Cell(45,10,$total_space,1,1);
     $pdf->SetFont('Arial','B',12);
     $pdf->Cell(0,10,"No. of Work Station",0,1,'L');
     $pdf->SetFont('Arial','',10);
     $pdf->Cell(15,10,"S.No.:",1,0);
     $pdf->Cell(40,10,"Windows OS",1,0);
     $pdf->Cell(40,10,"System(processor:",1,0);
     $pdf->Cell(40,10,"Installed",1,0);
     $pdf->Cell(30,10,"System:",1,0);
     $pdf->Cell(30,10,"remarks:",1,1);
     $pdf->Cell(15,15,$count,1,0);
     $pdf->Cell(40,15,$client_os,1,0);
     $pdf->Cell(40,15,$client_system,1,0);
     $pdf->Cell(40,15,$client_memory,1,0);
     $pdf->Cell(30,15,$client_system_type,1,0);
     $pdf->Cell(30,15,$remarks,1,1);
     $pdf->Cell(100,20," ",0,1);
     $pdf->Cell(150,10,"Authorized Signatory(Softlink)",0,0);
     $pdf->Cell(120,10,"Authorized Signatory(Library)",0,1);
     $pdf->output("D");
}
else if(isset($_POST['config_table_btn_pdf_l']))
{
    $client_name = $_POST['client_name'];
    $installation_date = $_POST['l_installation_date'];
    $s1 = (string)$installation_date;
    $l_version = $_POST['l_version'];
    $db_name = $_POST['db_name'];
    $l_os = $_POST['l_os'];
    $l_system = $_POST['l_system'];
    $l_memory = $_POST['l_memory'];
    $l_system_type = $_POST['l_system_type'];
    $hard_disk = $_POST['hard_disk'];
    $l_cmp_name = $_POST['l_cmp_name'];
    $l_full_cmp_name = $_POST['l_full_cmp_name'];
    $l_workgroup = $_POST['l_workgroup'];
    $ip_int = $_POST['ip_int'];
    $ip_ext = $_POST['ip_ext'];
    $l_webserver = $_POST['l_webserver'];
    $url_int = $_POST['url_int'];
    $url_ext = $_POST['url_ext'];
    $l_url_int = $_POST['l_url_int'];
    $l_url_ext = $_POST['l_url_ext'];
    $l_db_loc = $_POST['l_db_loc'];
    $l_server_loc = $_POST['l_server_loc'];
    $c_used = $_POST['c_used'];
    $c_available = $_POST['c_available'];
    $d_used = $_POST['d_used'];
    $d_available = $_POST['d_available'];
    $count = 1;
    require ('fpdf181/fpdf.php');
    class PDF extends FPDF
    {
      // Page header
      function Header()
      {
         $this->Image('fpdf181/logo.jpg',140,5,60,10,'JPG',0,1);
      }
    }      
     $pdf = new PDF();
     $pdf->SetMargins(5,14,5,5);
     $pdf->AliasNbPages();
     $pdf->AddPage();
     $pdf->SetFont('Arial','B',12);
     $pdf->Cell(0,10,"Server and Liberty Configuration Details",0,1,'C');
     $pdf->SetFont('Arial','',10);
     $pdf->Cell(70,7,"Institute Name:",0,0);
     $pdf->Cell(70,7,$client_name,0,1);
     $pdf->Cell(70,7," Installation Date:",0,0);
     $pdf->Cell(70,7,$installation_date,0,1);
     $pdf->Cell(70,7," Liberty Version:",0,0);
     $pdf->Cell(70,7,$l_version,0,1);
     $pdf->Cell(70,7,"Database:",0,0);
     $pdf->Cell(70,7,$db_name,0,1);
     $pdf->Cell(70,7," Windows Operating System:",0,0);
     $pdf->Cell(70,7,$l_os,0,1);
     $pdf->Cell(70,7," System:",0,0);
     $pdf->Cell(70,7,$l_system,0,1);
     $pdf->Cell(70,7," Installed Memory(RAM):",0,0);
     $pdf->Cell(70,7,$l_memory,0,1);
     $pdf->Cell(70,7," Operating System Type(32/64 Bit):",0,0);
     $pdf->Cell(70,7,$l_system_type,0,1);
     $pdf->Cell(70,7," Hard Disk:",0,0);
     $pdf->Cell(70,7,$hard_disk,0,1);
     $pdf->Cell(70,7," Computer Name:",0,0);
     $pdf->Cell(70,7,$l_cmp_name,0,1);
     $pdf->Cell(70,7," Full Computer Name:",0,0);
     $pdf->Cell(70,7,$l_full_cmp_name,0,1);
     $pdf->Cell(70,7,"12. Workgroup:",0,0);
     $pdf->Cell(70,7,$l_workgroup,0,1);
     $pdf->Cell(70,7," IP(Internal):",0,0);
     $pdf->Cell(70,7,$ip_int,0,1);
     $pdf->Cell(70,7," IP(External):",0,0);
     $pdf->Cell(70,7,$ip_ext,0,1);
     $pdf->Cell(70,7," Web Server:",0,0);
     $pdf->Cell(70,7,$l_webserver,0,1);
     $pdf->Cell(70,7," URL Report Server(Internal):",0,0);
     $pdf->Cell(70,7,$url_int,0,1);
     $pdf->Cell(70,7," URL Report Server(External):",0,0);
     $pdf->Cell(70,7,$url_ext,0,1);
     $pdf->Cell(70,7," URL Liberty(Internal):",0,0);
     $pdf->Cell(70,7,$l_url_int,0,1);
     $pdf->Cell(70,7," URL Liberty(External):",0,0);
     $pdf->Cell(70,7,$l_url_ext,0,1);
     $pdf->Cell(70,7," Database Location:",0,0);
     $pdf->Cell(70,7,$l_db_loc,0,1);
     $pdf->Cell(70,7," Liberty Server Location:",0,0);
     $pdf->Cell(70,7,$l_server_loc,0,1);
     $pdf->Cell(70,10," ",0,1);
     $pdf->Cell(45,7,"C:/Fixed Drive",0,0);
     $pdf->Cell(45,7,$c_used,0,0);
     $pdf->Cell(45,7,$c_available,0,1);
     $pdf->Cell(45,7,"D:/Fixed Drive",0,0);
     $pdf->Cell(45,10,$d_used,0,0);
     $pdf->Cell(45,7,$d_available,0,1);
     $pdf->output("D");               
}
function test_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}



?>