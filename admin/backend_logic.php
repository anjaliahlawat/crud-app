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
        header("Location:http://localhost/CRUD/home.php?form=emptydatefield");
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
                  echo "New record created successfully";
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
       header("Location:http://localhost/CRUD/home.php?view=bank?form=emptyfield");
        exit();
    }
    else
    {
       $query = "UPDATE securelogin.bank_details set account_name='$account_name', curr_acc_no='$curr_acc_no', bank_name='$bank_name', bank_addrs='$bank_addrs', country='$country', ifsc_code='$ifsc_code', swift_code='$swift_code', micr_code='$micr_code', branch_code='$branch_code', tan='$tan', pan='$pan', gstin='$gstin', tin_no='$tin_no', cin='$cin', date_of_effect='$date_of_effect'";
       if(mysqli_query($conn, $query))
       {
           header("Location:http://localhost/CRUD/home.php?view=Bank");
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
     $pdf->Cell(65,10,"1.Account name:",0,0);
     $pdf->Cell(65,10,$account_name,0,1);
     $pdf->Cell(65,10,"2.Current Account name:",0,0);
     $pdf->Cell(65,10,$curr_acc_no,0,1);
     $pdf->Cell(65,10,"3.Bank name:",0,0);
     $pdf->Cell(65,10,$bank_name,0,1);
     $pdf->Cell(65,10,"4.Bank address:",0,0);
     $pdf->Cell(65,10,$bank_addrs,0,1);
     $pdf->Cell(65,10,"5.Country:",0,0);
     $pdf->Cell(65,10,$country,0,1);
     $pdf->Cell(65,10,"6.RTGS/NEFT/IFSC CODE:",0,0);
     $pdf->Cell(65,10,$ifsc_code,0,1);
     $pdf->Cell(65,10,"7.SWIFT Code/ID:",0,0);
     $pdf->Cell(65,10,$swift_code,0,1);
     $pdf->Cell(65,10,"8.MICR Code:",0,0);
     $pdf->Cell(65,10,$micr_code,0,1);
     $pdf->Cell(65,10,"9.Branch Code:",0,0);
     $pdf->Cell(65,10,$branch_code,0,1);
     $pdf->Cell(65,10,"10.TAN:",0,0);
     $pdf->Cell(65,10,$tan,0,1);
     $pdf->Cell(65,10,"11.PAN:",0,0);
     $pdf->Cell(65,10,$pan,0,1);
     $pdf->Cell(65,10,"12.GSTIN:",0,0);
     $pdf->Cell(65,10,$gstin,0,1);
     $pdf->Cell(65,10,"13.Tin no.:",0,0);
     $pdf->Cell(65,10,$bank_addrs,0,1);
     $pdf->Cell(65,10,"14.CIN:",0,0);
     $pdf->Cell(65,10,$cin,0,1);
     $pdf->Cell(65,10,"15.Date of Effect:",0,0);
     $pdf->Cell(65,10,$date_of_effect,0,1);
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


	  if($ds == 'yes')
	  {
		   $ds_type = $_POST['ds_type'];
		   $ds_start_date = $_POST['start_date'];
		   $ds_end_date = $_POST['end_date'];
		   $ds_status = mysqli_real_escape_string($conn, $_POST['ds_status']);
		   $ds_remarks = mysqli_real_escape_string($conn, $_POST['ds_remarks']);
       $start_date_new = (string)$ds_start_date;
       $end_date_new = (string)$ds_end_date;
		   if ($ds_type == 'excel'){
			    $no_of_excel_files_rnc = $_POST['no_of_excel_files_rnc'];
          $num = (string)$no_of_excel_files_rnc;
		   }

	  }
	 if ($de == 'yes')
	 {
	  	$de_type = $_POST['de_type'];
		  $de_start_date = $_POST['de_start_date'];
		  $de_end_date = $_POST['de_end_date'];
		  $de_status = $_POST['de_status'];
      $de_remarks = $_POST['de_remarks'];
      $de_start_date_new = (string)$de_start_date;
      $de_end_date_new = (string)$de_end_date;

	 }

	//error handlers
	 if (empty($clientname) || empty($addrs) || empty($soft) || empty($rec) || empty($users_new))
    {
        header("Location:http://localhost/CRUD/home.php?form=emptyfields1");
        exit();
    }
    else 
    {
        // check if input characters are valid
        if(!preg_match("/^[a-zA-Z .]*$/", $clientname))
        {
          header("Location:http://localhost/CRUD/home.php?form=invalid");
          exit();
        }
        else 
        {
            $sql = "INSERT INTO main (client_name, address, software_purchased, product_purchased, records, users, data_service, data_entry, status) VALUES ('$clientname', '$addrs', '$soft', '$product_purchased','$rec', '$users', '$ds', '$de', 'active')";
            if(mysqli_query($conn, $sql))
            {
               echo "New record created successfully";
            } 
            else 
            {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }
   if($ds == 'yes' || $de == 'yes') 
   {
      $sql0 = "SELECT client_id FROM main WHERE client_name='$clientname' AND software_purchased='$soft'";
      $result1 = mysqli_query($conn, $sql0);
      $row = mysqli_fetch_assoc($result1);
      $client_id = $row['client_id']; 
    	if($ds == 'yes')
    	{
    		if (empty($start_date_new) || empty($end_date_new) || empty($ds_status) || empty($ds_type))
        {
             header("Location:http://localhost/CRUD/home.php?form=emptyfields2");
             exit();
        }
        else
        {
           if($ds_type == 'excel')
           {
                if(empty($num))
                {
                    header("Location:http://localhost/CRUD/home.php?form=emptyfield");
                    exit();
                }
           }
          $sql2 = "INSERT INTO data_service (client_id, type, start_date, end_date, d_status, remarks, no_of_excel_files_rnc) VALUES('$client_id', '$ds_type', '$ds_start_date', '$ds_end_date', '$ds_status', '$ds_remarks', '$no_of_excel_files_rnc')";

              if(mysqli_query($conn, $sql2))
              {
                  echo "New record created successfully";
              } 
              else 
              {
                  echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
              }
           
        }
            
    	}
    	if ($de == 'yes') 
    	{
    		if (empty($de_start_date_new) || empty($de_end_date_new) || empty($de_status) || empty($de_type))
        {
            header("Location:http://localhost/CRUD/home.php?form=emptyfields3");
            exit();
        }
        else
        {
            $sql3 = "INSERT INTO data_entry (client_id, type, start_date, end_date, status, remarks) VALUES('$client_id', '$de_type', '$de_start_date', '$de_end_date', '$de_status', '$de_remarks')";
            if(mysqli_query($conn, $sql3))
            {
                echo "New record created successfully";
            } 
            else 
            {
                echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);
            }
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
        header("Location:http://localhost/CRUD/home.php?form=emptyfields");
                exit();
    }
    else
    {
        if(!preg_match("/^[a-zA-Z .]*$/", $clientname))
        {
           header("Location:http://localhost/CRUD/home.php?form=invalid");
            exit();
        }
        else 
        {
            
            $sql1 = "SELECT client_id FROM main WHERE client_name='$clientname' AND software_purchased='$software_purchased'";
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
               $sql2 = "INSERT INTO modules ( module_name, client_id, installation_date, purchased_order_no, no_of_nodes_purchased, date_of_m_purchased, module_cost, reg_no, training_date, no_of_training_days) VALUES ( '$module_name', '$client_id', '$installation_date', '$purchased_order_no', '$no_of_nodes_purchased', '$date_of_m_purchased', '$module_cost', '$reg_no', '$training_date', '$no_of_training_days')";
               mysqli_query($conn, $sql2);
               header("Location:http://localhost/CRUD/home.php?form=success");
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
        header("Location:http://localhost/CRUD/home.php?form=emptyfields");
        exit();
    }
    else 
    {
        if(!preg_match("/^[a-zA-Z .]*$/", $clientname))
        {
            header("Location:http://localhost/CRUD/home.php?form=invalid");
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
                   header("Location:http://localhost/CRUD/home.php?form=success");
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
        header("Location:http://localhost/CRUD/home.php?form=emptyfields1");
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
                  header("Location:http://localhost/CRUD/home.php?form=emptyfields2");
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
                             echo "Registered";
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
               $l_os_type = $_POST['l_os_type'];
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
               if(empty($s1) || empty($l_version) || empty($db_name) || empty($l_os) || empty($l_system) || empty($l_memory) || empty($l_os_type) || empty($hard_disk) || empty($l_cmp_name) || empty($l_full_cmp_name) || empty($l_workgroup) || empty($ip_int) || empty($ip_ext) || empty($l_webserver) || empty($url_int) || empty($url_ext) || empty($l_url_int) || empty($l_url_ext) || empty($l_db_loc) || empty($l_server_loc))
               {
                   header("Location:http://localhost/CRUD/home.php?form=emptyfields");
                   exit();
               }
               else
               {
                   $sql1 = "INSERT INTO liberty_system_details(installation_date, version, db_name, l_os, l_system, l_memory, os_type, hard_disk, l_comp_name, l_full_cmp_name, workgroup, ip_int, ip_ext, webserver, url_int, url_ext, l_url_int,l_url_ext, l_db_loc, l_server_loc, client_id, c_used, c_available, d_used, d_available) VALUES('$installation_date', '$l_version', '$db_name', '$l_os', '$l_system', '$l_memory', '$l_os_type', '$hard_disk', '$l_comp_name', '$l_full_cmp_name', '$l_workgroup', '$ip_int', '$ip_ext', '$l_webserver', '$url_int', '$url_ext', '$l_url_int', '$l_url_ext', '$l_db_loc', '$l_server_loc', '$client_id', '$c_used', '$c_available', '$d_used', '$d_available')";
                   if(mysqli_query($conn, $sql1))
                   {
                      echo "Registered";
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
      header("Location:http://localhost/CRUD/home.php?form=emptyfields");
      exit();
   }
   else 
   {
      if(!preg_match("/^[a-zA-Z .]*$/", $clientname))
      {
          header("Location:http://localhost/CRUD/home.php?form=invalid");
                exit();
      }
      else 
      {
         $sql1 = "SELECT client_id FROM main WHERE client_name='$clientname' AND software_purchased='alice'";
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
            $sql2 = "INSERT INTO records(client_id, records, installation_date, purchased_order_no, date_of_new_records, cost, reg_no) VALUES('$client_id', '$rec', '$installation_date', '$purchased_order_no', '$date_of_new_records', '$cost', '$reg_no')";
            header("Location:http://localhost/CRUD/home.php?form=success");
                  exit();

         }

      }
   }
} 
// product details
else if( isset($_POST['submit_form8']))
{
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $supplier_name = mysqli_real_escape_string($conn, $_POST['supplier_name']);
    $specifications = $_POST['specifications'];
    $unit = $_POST['unit'];
    $rate = $_POST['rate'];
    $tax_type =$_POST['tax_type'];
    $delivery_terms = $_POST['delivery_terms'];
    $notes = $_POST['notes'];
    $warranty = $_POST['warranty'];
    $s1 = (string)$unit;
    $s2 = (string)$rate;
    

    if (empty($product_name) || empty($supplier_name) || empty($specifications) || empty($s1) || empty($s2) || empty($delivery_terms) || empty($notes))
    {
       header("Location:http://localhost/CRUD/home.php?form=emptyfields");
       exit();
    }
    else 
    {
       if (!preg_match("/^[a-zA-Z ]*$/", $product_name) || !preg_match("/^[a-zA-Z .]*$/", $supplier_name))
       {
          header("Location:http://localhost/CRUD/home.php?form=invalid");
          exit();
       }
       else 
       {
            $sql1 = "SELECT supplier_id FROM softlinkasia.supplier where supplier_name = '$supplier_name'";
            $result1 = mysqli_query($conn, $sql1);
            $resultcheck = mysqli_num_rows($result1);
            if($resultcheck < 1)
            {
                echo "<p> This is not your current supplier</p>";
            } 
            else
            {
                  $row = mysqli_fetch_assoc($result1);
                  $supplier_id = $row['supplier_id'];
                  $sql2 = "INSERT INTO product(product_name, specifications, unit, rate, tax_type, delivery_terms, notes, warranty, supplier_id) VALUES('$product_name','$specifications', '$unit', '$rate', '$tax_type', '$delivery_terms', '$notes', '$warranty', '$supplier_id')";
                  if(mysqli_query($conn, $sql2))
            
                  {
                     echo "New record created successfully";
                  } 
                   else 
                  {
                     echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
                  }
            }
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
        header("Location:http://localhost/CRUD/home.php?form=empty");
                  exit();
    }
    else 
    {
        if (!preg_match("/^[a-zA-Z .]*$/", $supplier_name))
         {
              header("Location:http://localhost/CRUD/home.php?form=invalid");
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
                   echo "New record created successfully";
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
    $equip_name = mysqli_real_escape_string($conn, $_POST['equip_name']);
    $bd_date_time = $_POST['bd_date_time'];
    $id_no = $_POST['id_no'];
    $bd_details = $_POST['bd_details'];
    $action_taken = $_POST['action_taken'];
    $bd_release = $_POST['bd_release'];
    $total_bd_hrs = $_POST['total_bd_hrs'];
    $remarks = $_POST['remarks'];
    $s1 = (string)$bd_date_time;
    $s2 = (string)$total_bd_hrs;


    if (empty($equip_name) || empty($s1) || empty($id_no) || empty($bd_details) || empty($action_taken) || empty($bd_release) || empty($s2))
    {
        header("Location:http://localhost/CRUD/home.php?form=empty");
        exit();
    }
    else 
    {
        if (!preg_match("/^[a-zA-Z ]*$/", $equip_name))
        {
            header("Location:http://localhost/CRUD/home.php?form=empty");
            exit();
        }
        else 
        {
            $sql = "INSERT INTO euipment_bd_details(equip_name, bd_date_time, id_no, bd_details, action_taken, bd_release, total_bd_hrs, remarks) VALUES ('$equip_name', '$bd_date_time', '$id_no', '$bd_details', '$action_taken', '$bd_release', '$total_bd_hrs', '$remarks')";
            mysqli_query($conn, $sql);
            header("Location:http://localhost/CRUD/home.php?form=success");
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
        header("Location:http://localhost/CRUD/home.php?form=empty");
        exit();
    }
    else
    {
        if(!preg_match("/^[a-zA-Z ]*$/", $clientname) || !preg_match("/^[a-zA-Z ]*$/", $con_name) || !preg_match("/^[a-zA-Z ]*$/", $designation))
        {
            header("Location:http://localhost/CRUD/home.php?form=invalid");
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
                        header("Location:http://localhost/CRUD/home.php?form=invalid");
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
                          header("Location:http://localhost/CRUD/home.php?form=invalid");
                          exit();
                     }
                     else 
                     {
                          $sql23 = "INSERT INTO softlinkasia.contact_details(client_id, con_name, phone_no, designation) VALUES('$client_id', '$con_name3', '$phone_no3', '$designation3')";
                          mysqli_query($conn, $sql23);
                          
                     }
                }
                header("Location:http://localhost/CRUD/home.php?form=success");
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
        header("Location:http://localhost/CRUD/home.php?form=empty");
                   exit();
    }
    else
    {
        if(!preg_match("/^[a-zA-Z .]*$/", $name))
        {
           header("Location:http://localhost/CRUD/home.php?form=invalid");
                   exit();
        }
        else
        {
            $sql1 = "INSERT INTO securelogin.intern(name, addrs, contact_no, college, degree, grad_year, worked_on, start_date, end_date) VALUES('$name', '$addrs', '$contact_no', '$college', '$degree', '$grad_year', '$worked_on', '$start_date', '$end_date')";
            mysqli_query($conn, $sql1);
            header("Location:http://localhost/CRUD/home.php?form=success");
                   exit();
        }
    }
}

function test_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}



?>