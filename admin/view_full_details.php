<div id = "show_full_details">
<?php
   
    $query0 = "SELECT client_id FROM softlinkasia.main where client_name='$client_name' AND software_purchased='$software_purchased'";
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
            
             echo "<p>".$client_id."</p>";
        }
    }
    else
    {
        echo "Error: " . $query0 . "<br>" . mysqli_error($conn);
    } 

?>
   <label id="mod_hd1"><?php echo $client_name ?></label>
   <label id="mod_hd2"><?php echo $software_purchased ?></label>
   
      <?php
          $query1 = "SELECT mod_id, module_name, client_id, installation_date, purchased_order_no, no_of_nodes_purchased, date_of_m_purchased, module_cost, reg_no, training_date, no_of_training_days  FROM softlinkasia.modules where client_id='$client_id'";          
          $result1 = mysqli_query($conn, $query1);
          $resultcheck1 = mysqli_num_rows($result1);
          if ($resultcheck1 < 1)
          {
             echo "<p>This client has not purchased any module!</p>";
          }
          else
          {
             echo "<select class='modules'>";
             while($row = mysqli_fetch_assoc($result1))
             {                        
                 echo "<option value='".$row['mod_id']."'>".$row['module_name']."</option>";                         
             }
             echo "</select>"; 

      ?> 
        <table id="view_mod_table">             
          <tr>
              <td>Modules Purchased:</td>
              <td><input type='text' class='Afield' name='module_name' value="<?php echo $row['module_name']?>" readonly/></td>
          </tr>
          <tr>
               <td>Date of Purchased:</td>
               <td><input type='text' class='Afield' name='date_of_m_purchased' value="<?php echo $row['date_of_m_purchased']?>" readonly/></td>
          </tr>
          <tr>
               <td>Purchased Cost:</td>
               <td><input type='text' class='Afield' name='module_cost' value="<?php echo $row['module_cost']?>" readonly/></td>
          </tr>
          <tr>
               <td>Number of Nodes Purchased:</td>
               <td><input type='text' class='Afield' name='no_of_nodes_purchased' value="<?php echo $row['no_of_nodes_purchased']?>" readonly/></td>
          </tr> 
          <tr>
               <td>Purchased Order No.:</td>
               <td><input type='text' class='Afield' name='purchased_order_no' value="<?php echo $row['purchased_order_no']?>" readonly/></td>
          </tr>  
          <tr>
               <td>Reg No.:</td>
               <td><input type='text' class='Afield' name='reg_no' value="<?php echo $row['reg_no']?>" readonly/></td>
          </tr>
          <tr>
               <td>Installation Date:</td>
               <td><input type='text' class='Afield' name='installation_date' value="<?php echo $row['installation_date']?>" readonly/></td>
          </tr>
          <tr>
              <td>Training Date:</td>
              <td><input type='text' class='Afield' name='training_date' value="<?php echo $row['training_date']?>" readonly/></td>
          </tr>
          <tr>
              <td>No. of Training Days:</td>
              <td><input type='text' class='Afield' name='no_of_training_days' value="<?php echo $row['no_of_training_days']?>" readonly/></td>
          </tr>
  <?php
                  
        }
  ?>
   </table>
   <table id="view_amc_table" style="display:none;">
      <?php
            $client_name = $_POST['client_name'];
            $software_purchased = $_POST['software_purchased'];
            $query2 = "SELECT * FROM softlinkasia.amc WHERE client_id='$client_id'";
            if (mysqli_query($conn, $query2))
            {
              $result2 = mysqli_query($conn, $query2);
              $resultcheck2 = mysqli_num_rows($result2);
              if ($resultcheck2 < 1)
              {
                  echo "<p>This client has not purchased any module!</p>";
              }
              else
              {
      ?>
              <tr>
                  <td>Modules Purchased:</td>
                  <td><input type='text' class='amc_field' name='module_name' value="<?php $row['module_name']?>" readonly/></td>
              </tr>
              <tr>
                  <td>Invoice No.:</td>
                  <td><input type='text' class='amc_field' name='invoice_no' value="<?php $row['invoice_no']?>" readonly/></td>
              </tr>
              <tr>
                  <td>Invoice Date:</td>
                  <td><input type='text' class='amc_field' name='invoice_date' value="<?php $row['invoice_date']?>" readonly/></td>
              </tr>
              <tr>
                  <td>AMC Period:</td>
                  <td><input type='text' class='amc_field' name='amc_period' value="<?php $row['amc_period']?>" readonly/></td>
              </tr>
              <tr>
                  <td>Percent of AMC Given:</td>
                  <td><input type='text' class='amc_field' name='per_of_amc_given' value="<?php $row['per_of_amc_given']?>" readonly/></td>
              </tr>
              <tr>
                  <td>Remarks:</td>
                  <td><input type='text' class='amc_field' name='remarks' value="<?php $row['remarks']?>" readonly/></td>
              </tr>
    <?php
                  
              }
          }
  ?>
   </table>
   <table id="view_rec_table" style="display:none;">
     
   </table>
</div>