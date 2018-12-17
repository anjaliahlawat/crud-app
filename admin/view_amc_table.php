<label id="mod_hd1"><?php echo $client_name ?></label>
<label id="mod_hd2"><?php echo $software_purchased ?></label>
<form action="admin/backend_logic.php" method="post">   
   <table id="view_amc_table">
      <?php
            $query2 = "SELECT amc_id, module_name, invoice_no, invoice_date, amc_period, per_of_amc_given, remarks FROM softlinkasia.amc WHERE amc_id = '$amc_id'";
            $result2 = mysqli_query($conn, $query2);
            $row = mysqli_fetch_assoc($result2);      
      ?>
             <input type='hidden' value='<?php echo $row['amc_id']; ?>' name='amc_id'/>
              <tr>
                  <td>Modules Purchased:</td>
                  <td><input type='text' class='amc_field' name='module_name' value="<?php echo $row['module_name']?>"/></td>
                  <td><input type='submit' class='amc_table_btn' id='amc_table_btn_save' name='amc_table_btn_save' value='Save'/></td>
              </tr>
              <tr>
                  <td>Invoice No.:</td>
                  <td><input type='text' class='amc_field' name='invoice_no' value="<?php echo $row['invoice_no']?>"/></td>
                  <td><input type='submit' class='amc_table_btn' id='amc_table_btn_del' name='amc_table_btn_del' value='Delete'/></td>
              </tr>
              <tr>
                  <td>Invoice Date:</td>
                  <td><input type='date' class='amc_field' name='invoice_date' value="<?php echo $row['invoice_date']?>"/></td>
              </tr>
              <tr>
                  <td>AMC Period:</td>
                  <td><input type='number' class='amc_field' name='amc_period' value="<?php echo $row['amc_period']?>"/></td>
              </tr>
              <tr>
                  <td>Percent of AMC Given:</td>
                  <td><input type='number' class='amc_field' name='per_of_amc_given' value="<?php echo $row['per_of_amc_given']?>" /></td>
              </tr>
              <tr>
                  <td>Remarks:</td>
                  <td><input type='text' class='amc_field' name='remarks' value="<?php echo $row['remarks']?>"/></td>
              </tr>
   </table>
</form>