<label id="mod_hd1"><?php echo $client_name ?></label>
<label id="mod_hd2"><?php echo $software_purchased ?></label>
<form action="admin/backend_logic.php" method="post">
  <table id="view_con_table">
     <?php
            $query2 = "SELECT * FROM softlinkasia.contact_details WHERE con_id = '$con_id'";
            $result2 = mysqli_query($conn, $query2);
            $row = mysqli_fetch_assoc($result2);      
      ?>
      <input type='hidden' value='<?php echo $row['con_id']; ?>' name='con_id'/>
              <tr>
                  <td>Contact Person:</td>
                  <td><input type='text' class='con_field' name='con_name' value="<?php echo $row['con_name']?>"/></td>
                  <td><input type='submit' class='con_table_btn' id='con_table_btn_save' name='con_table_btn_save' value='Save'/></td>
              </tr>
              <tr>
                  <td>Phone No.:</td>
                  <td><input type='text' class='con_field' name='phone_no' value="<?php echo $row['phone_no']?>"/></td>
                  <td><input type='submit' class='con_table_btn' id='con_table_btn_del' name='con_table_btn_del' value='Delete'/></td>
              </tr>
              <tr>
                  <td>Designation:</td>
                  <td><input type='text' class='con_field' name='designation' value="<?php echo $row['designation']?>"/></td>
              </tr>
  </table>

</form>
