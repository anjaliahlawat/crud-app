
<div class="left">
   <form action="" method="POST">
      <p style="font-size: 14px; font-weight: bold; text-align: center;">Human Resource</p>
      <button type="submit" class="emp" id="emp1" name="add_emp"  value="Add">Add</button>
      <button type="submit" class="emp" id="emp2" name="view_emp" value="View">View</button>
      <br/>
      <br/>
      <br/>
      <p style="font-size: 14px; font-weight: bold; margin-left: 35px;">Training</p>
      <button type="submit" class="emp" id="emp3" name="add_training"  value="Add">Add</button>
      <button type="submit" class="emp" id="emp4" name="view_training" value="View">View</button>
   </form>

</div>
<div class="right">
<form action="backend_logic.php" method="POST">
   <button type="submit" id="emp5" name="add_emp" value="customer support portal">Customer Support Portal</button>
</form>
   


<?php
  if(isset($_POST['add_emp']))
  {
  	 include_once "add_emp.php";
  }
  else if(isset($_POST['view_emp']))
  {
  	 include_once "view_emp.php";
  }
  else if(isset($_POST['add_training']))
  {
  	 include_once "add_training.php";
  }
  else if(isset($_POST['view_training']))
  {
  	 include_once "view_training.php";
  }
?>

</div>