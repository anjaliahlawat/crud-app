<label id="form_hd1">Product: <?php echo $name; ?></label>
<div id = "show_full_details5" class="view_full_details_div5">
 <form action="admin/backend_logic.php" method="post">
  <table id="view_intern_table">
    <?php
      
      $query1 = "SELECT * FROM securelogin.intern WHERE intern_id='$intern_id'";
      $result1 = mysqli_query($conn, $query1);
      $row = mysqli_fetch_assoc($result1);
   ?>
    <input type='hidden' value='<?php echo $intern_id; ?>' name='intern_id'/>    
       <tr>
          <td>Name:</td>
          <td><input type='text' class='intern_field' name='name' value="<?php echo $row['name']?>"/></td>
          <td><input type='submit' class='intern_table_btn' id='intern_table_btn_save' name='intern_table_btn_save' value='Save'/></td>
       </tr>
       <tr>
          <td>Address:</td>
          <td><input type='text' class='intern_field' name='addrs' value="<?php echo $row['addrs']?>"/></td>
          <td><input type='submit' class='intern_table_btn' id='intern_table_btn_del' name='intern_table_btn_del' value='Delete'/></td>
       </tr>
       <tr>
          <td>Contact No.:</td>
          <td><input type='text' class='intern_field' name='contact_no' value="<?php echo $row['contact_no']?>"/></td>
       </tr>
       <tr>
          <td>College:</td>
          <td><input type='text' class='intern_field' name='college' value="<?php echo $row['college']?>"/></td>
       </tr>
       <tr>
          <td>Degree:</td>
          <td><input type='text' class='intern_field' name='degree' value="<?php echo $row['degree']?>"/></td>
       </tr>
       <tr>
          <td>Graduation Year:</td>
          <td><input type='text' class='intern_field' name='grad_year' value="<?php echo $row['grad_year']?>"/></td>
       </tr>
       <tr>
          <td>Worked On:</td>
          <td><input type='text' class='intern_field' name='worked_on' value="<?php echo $row['worked_on']?>"/></td>
       </tr>
       <tr>
          <td>Start Date:</td>
          <td><input type='date' class='intern_field' name='start_date' value="<?php echo $row['start_date']?>"/></td>
       </tr>
       <tr>
          <td>End Date:</td>
          <td><input type='date' class='intern_field' name='end_date' value="<?php echo $row['end_date']?>"/></td>
       </tr>
  </table>
 </form>
</div>