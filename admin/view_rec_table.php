<label id="mod_hd1"><?php echo $client_name ?></label>
<label id="mod_hd2"><?php echo $software_purchased ?></label>
<form action="admin/backend_logic.php" method="post">
  <table id="view_rec_table">
     <?php
            $query2 = "SELECT rec_id, records, installation_date, purchased_order_no, date_of_new_records, cost, reg_no FROM softlinkasia.records WHERE rec_id = '$rec_id'";
            $result2 = mysqli_query($conn, $query2);
            $row = mysqli_fetch_assoc($result2);      
      ?>
      <input type='hidden' value='<?php echo $row['rec_id']; ?>' name='rec_id'/>
              <tr>
                  <td>Records:</td>
                  <td><input type='number' class='rec_field' name='records' value="<?php echo $row['records']?>"/></td>
                  <td><input type='submit' class='rec_table_btn' id='rec_table_btn_save' name='rec_table_btn_save' value='Save'/></td>
              </tr>
              <tr>
                  <td>Installation Date:</td>
                  <td><input type='date' class='rec_field' name='installation_date' value="<?php echo $row['installation_date']?>"/></td>
                  <td><input type='submit' class='rec_table_btn' id='rec_table_btn_del' name='rec_table_btn_del' value='Delete'/></td>
              </tr>
              <tr>
                  <td>Purchased Order No.:</td>
                  <td><input type='text' class='rec_field' name='purchased_order_no' value="<?php echo $row['purchased_order_no']?>"/></td>
              </tr>
              <tr>
                  <td>Date of New Records:</td>
                  <td><input type='date' class='rec_field' name='date_of_new_records' value="<?php echo $row['date_of_new_records']?>"/></td>
              </tr>
              <tr>
                  <td>Cost:</td>
                  <td><input type='number' class='rec_field' name='cost' value="<?php echo $row['cost']?>" /></td>
              </tr>
              <tr>
                  <td>Reg No.:</td>
                  <td><input type='text' class='rec_field' name='reg_no' value="<?php echo $row['reg_no']?>"/></td>
              </tr>

  </table>
</form>
