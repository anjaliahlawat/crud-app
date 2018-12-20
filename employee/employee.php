
<div class="left">
   <form action="" method="POST">
      <p style="font-size: 14px; font-weight: bold; text-align: center;">Human Resource</p>
      <button type="submit" class="emp" id="emp1" name="add_emp"  value="Add">Add</button>
      <button type="submit" class="emp" id="emp2" name="view_hr" value="View">View</button>
      <br/>
      <br/>
      <br/>
      <p style="font-size: 14px; font-weight: bold; margin-left: 35px;">Training</p>
      <button type="submit" class="emp" id="emp3" name="add_training"  value="Add">Add</button>
      <button type="submit" class="emp" id="emp4" name="view_training" value="View">View</button>
   </form>

</div>
<div class="right">

<?php
  if(isset($_POST['add_emp']))
  {
  	 include_once "add_emp.php";
  }
  else if(isset($_POST['view_hr']))
  {
  	 include_once "view_hr.php";
  }
  else if(isset($_POST['add_training']))
  {
  	 include_once "add_training.php";
  }
  else if(isset($_POST['view_training']))
  {
  	 include_once "view_training.php";
  }
  elseif(isset($_POST['view_emp_details'])) 
  {
     foreach ($_POST['view_emp_details'] as $k_id => $view_emp_details)
     {
        $id= $_POST['id'][$k_id];
        $name = $_POST['name'][$k_id];
        include_once "employee/view_emp_details.php";
     }    
  }
  elseif(isset($_POST['view_t_details'])) 
  {
     foreach ($_POST['view_t_details'] as $k_id => $view_t_details)
     {
        $id= $_POST['id'][$k_id];
        $name = $_POST['name'][$k_id];
        include_once "employee/view_t_details.php";
     }    
  }
?>

</div>