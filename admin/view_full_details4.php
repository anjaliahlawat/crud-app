<label id="form_hd1">Product: <?php echo $equip_name; ?></label>
<div id = "show_full_details4" class="view_full_details_div4">
 <form action="admin/backend_logic.php" method="post">
  <table id="view_bd_table">
    <?php
      
      $query1 = "SELECT bd_id, equip_name, bd_date, bd_time, id_no, bd_details, action_taken, bd_release, total_bd_hrs, remarks FROM softlinkasia.euipment_bd_details WHERE bd_id='$bd_id'";
      $result1 = mysqli_query($conn, $query1);
      $row = mysqli_fetch_assoc($result1);
   ?>
       <input type='hidden' value='<?php echo $bd_id; ?>' name='bd_id'/>    
       <tr>
          <td>Equipment:</td>
          <td><input type='text' class='bd_field' name='equip_name' value="<?php echo $row['equip_name']?>"/></td>
          <td><input type='submit' class='bd_table_btn' id='bd_table_btn_save' name='bd_table_btn_save' value='Save'/></td>
       </tr>
       <tr>
          <td>B/D Date</td>
          <td><input type='date' class='bd_field' name='bd_date' value="<?php echo $row['bd_date']?>"/></td>
          <td><input type='submit' class='bd_table_btn' id='bd_table_btn_del' name='bd_table_btn_del' value='Delete'/></td>
       </tr>
       <tr>
          <td>B/D Time:</td>
          <td><input type='time' class='bd_field' name='bd_time' value="<?php echo $row['bd_time']?>"/></td>
       </tr>
       <tr>
          <td>Equip ID no.:</td>
          <td><input type='text' class='bd_field' name='id_no' value="<?php echo $row['id_no']?>"/></td>
       </tr>
       <tr>
          <td>B/D Details.:</td>
          <td><input type='text' class='bd_field' name='bd_details' value="<?php echo $row['bd_details']?>"/></td>
       </tr>
       <tr>
          <td>Action Taken:</td>
          <td><input type='text' class='bd_field' name='action_taken' value="<?php echo $row['action_taken']?>"/></td>
       </tr>
       <tr>
          <td>B/D Release:</td>
          <td><input type='text' class='bd_field' name='bd_release' value="<?php echo $row['bd_release']?>"/></td>
       </tr>
       <tr>
          <td>Total B/D hours:</td>
          <td><input type='number' class='bd_field' name='total_bd_hrs' value="<?php echo $row['total_bd_hrs']?>"/></td>
       </tr>
       <tr>
          <td>Remarks:</td>
          <td><input type='text' class='bd_field' name='remarks' value="<?php echo $row['remarks']?>"/></td>
       </tr>
  </table>

 </form>
</div>  