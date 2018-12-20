<label id="form_hd1">Employee: <?php echo $name; ?></label>
<div id = "show_emp_details" class="view_emp_details_div">
<form action="employee/backend_logic.php" method="post">
  <table id="view_emp_table">
  <?php 
      $query1 = "SELECT *  FROM securelogin.training_table WHERE id='$id'";
      $result1 = mysqli_query($conn, $query1);
      $row = mysqli_fetch_assoc($result1);
  ?>
    <input type='hidden' value='<?php echo $id; ?>' name='id'/>    
            <tr>
                <td>Emp. Name:</td>
                <td><input type='text' class='t_field' name='name' value="<?php echo $row['name']?>"/></td>
                <td><input type='submit' class='t_table_btn' id='t_table_btn_save' name='t_table_btn_save' value='Save'/></td>
            </tr>
            <tr>
                <td>Designation:</td>
                <td><input type='text' class='t_field' name='designation' value="<?php echo $row['designation']?>"/></td>
                <td><input type='submit' class='t_table_btn' id='t_table_btn_del' name='t_table_btn_del' value='Delete'/></td>
            </tr>
            <tr>
                <td>Cadre:</td>
                <td><input type='text' class='t_field' name='cadre' value="<?php echo $row['cadre']?>"/></td>
            </tr>
            <tr>
                <td>Months:</td>
                <td><input type='text' class='t_field' name='months' value="<?php echo $row['months']?>"/></td>
            </tr>
            <tr>
                <td>Status:</td>
                <td><input type='text' class='t_field' name='status' value="<?php echo $row['status']?>"/></td>
            </tr>
            <tr>
                <td>Faculty:</td>
                <td><input type='text' class='t_field' name='faculty' value="<?php echo $row['faculty']?>"/></td>
            </tr>
            
            <tr>
                <td>Trainee Name:</td>
                <td><input type='text' class='t_field' name='trainee_name' value="<?php echo $row['trainee_name']?>"/></td>
            </tr>
            <tr>
                <td>Venue:</td>
                <td><input type='text' class='t_field' name='venue' value="<?php echo $row['venue']?>"/></td>
            </tr>
            <tr>
                <td>Training Date:</td>
                <td><input type='date' class='t_field' name='t_date' value="<?php echo $row['t_date']?>"/></td>
            </tr>
            <tr>
                <td>Training Time:</td>
                <td><input type='time' class='t_field' name='t_time' value="<?php echo $row['t_time']?>"/></td>
            </tr>
            <tr>
                <td>Topic:</td>
                <td><input type='text' class='t_field' name='topic' value="<?php echo $row['topic']?>"/></td>
            </tr>
            <tr>
                <td>Rating:</td>
                <td><input type='text' class='t_field' name='rating' value="<?php echo $row['rating']?>"/></td>
            </tr>
  </table>
</form>
</div>