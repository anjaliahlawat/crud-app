<label id="form_hd1">Employee: <?php echo $name; ?></label>
<div id = "show_emp_details" class="view_emp_details_div">
<form action="employee/backend_logic.php" method="post">
  <table id="view_emp_table">
  <?php 
      $query1 = "SELECT id, emp_id, name, designation, qualification, experience_prior, experience_current, job_resp, area_of_exp  FROM securelogin.hr_table ";
      $result1 = mysqli_query($conn, $query1);
      $row = mysqli_fetch_assoc($result1);
  ?>
      <input type='hidden' value='<?php echo $id; ?>' name='id'/>    
            <tr>
                <td>Emp. ID:</td>
                <td><input type='text' class='emp_field' name='id' value="<?php echo $row['id']?>"/></td>
                <td><input type='submit' class='emp_table_btn' id='emp_table_btn_save' name='emp_table_btn_save' value='Save'/></td>
            </tr>
            <tr>
                <td>Emp. Name:</td>
                <td><input type='text' class='emp_field' name='name' value="<?php echo $row['name']?>"/></td>
                <td><input type='submit' class='emp_table_btn' id='emp_table_btn_del' name='emp_table_btn_del' value='Delete'/></td>
            </tr>
            <tr>
                <td>Designation:</td>
                <td><input type='text' class='emp_field' name='designation' value="<?php echo $row['designation']?>"/></td>
            </tr>
            <tr>
                <td>Qualification:</td>
                <td><input type='text' class='emp_field' name='qualification' value="<?php echo $row['qualification']?>"/></td>
            </tr>
            
            <tr>
                <td>Experience Prior:</td>
                <td><input type='text' class='emp_field' name='experience_prior' value="<?php echo $row['experience_prior']?>"/></td>
            </tr>
            <tr>
                <td>Experience Current:</td>
                <td><input type='text' class='emp_field' name='experience_current' value="<?php echo $row['experience_current']?>"/></td>
            </tr>
            <tr>
                <td>Job Responsibility:</td>
                <td><input type='text' class='emp_field' name='job_resp' value="<?php echo $row['job_resp']?>"/></td>
            </tr>
            <tr>
                <td>Area of Expertise:</td>
                <td><input type='text' class='emp_field' name='area_of_exp' value="<?php echo $row['area_of_exp']?>"/></td>
            </tr>
  </table>
</form>
</div>