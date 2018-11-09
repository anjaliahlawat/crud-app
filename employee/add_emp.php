<form class="hr_form" action="admin/backend_logic.php" method="POST">
<p class="hr_heading">Please fill the following details</p><br/><br/>
  <table class="hr_table">
  <tr>
    <td><label>Employee Id:</label></td>
    <td><input class="Afield" type="text" name="id"/></td>
  <tr>
    <td><label>Name:</label></td>
    <td><input class="Afield" type="text" name="name"/></td>
  </tr>
  <tr>
    <td><label>Designation:</label></td>
    <td><input class="Afield" type="text" name="designation"/></td>
  </tr>
  <tr>
    <td><label>Qualification:</label></td>
    <td><input class="Afield" type="text" name="qualification"/></td>
  </tr>
  <tr>
    <td><label>Experience:</label></td>
    <td><input class="Afield" type="text" name="experience1" placeholder="Prior" /></td>
    <td><input class="Afield" type="text" name="experience2" placeholder="Current" /></td>
  </tr>
  <tr>
    <td><label>Job responsibility:</label></td>
    <td><input class="Afield" type="text" name="job_resp"/></td>
  </tr>
  <tr>
    <td><label>Area of Expertise:</label></td>
    <td><input class="Afield" type="text" name="area_of_exp"/></td>
  </tr>

  </table>
  <br/>
  <input type="submit" class="form_btn" id="form_btn1" name="submit_form1" value="Save">
  <input type="reset" class="form_btn" id="form_btn2" value="Reset">
</form>