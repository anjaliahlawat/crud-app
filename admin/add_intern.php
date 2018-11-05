<form class="intern_form" action="admin/backend_logic.php" method="POST">
<p class="intern_hd">Add Intern details</p><br/><br/>
  <table class="intern_details">
      <tr>
            <td><label> Intern Name:</label></td>
            <td><input class="Afield" type="text" name="name" /> </td>
          </tr>
          <tr>
            <td><label> Address:</label></td>
            <td><input class="Afield" type="text" name="addrs" /> </td>
          </tr>
          <tr>
            <td><label> Contact No.:</label></td>
            <td><input class="Afield" type="text" name="contact_no" /> </td>
          </tr>
          <tr>
            <td><label> College/University:</label></td>
            <td><input class="Afield" type="text" name="college" /> </td>
          </tr>
          <tr>
            <td><label> Degree:</label></td>
            <td><input class="Afield" type="text" name="degree" /> </td>
          </tr>
          <tr>
            <td><label> Grad. Year:</label></td>
            <td><input class="Afield" type="text" name="grad_year" /> </td>
          </tr>
          <tr>
            <td><label> Worked On:</label></td>
            <td><textarea class="Afield" name="worked_on" rows="4"></textarea>
          </tr>
          <tr>
            <td><label> Start Date:</label></td>
            <td><input class="Afield" type="date" name="start_date" /> </td>
          </tr>
          <tr>
            <td><label> End Date:</label></td>
            <td><input class="Afield" type="date" name="end_date" /> </td>
          </tr>
  </table>
   <br/>
      <input type="submit" class="form_btn" id="form_btn1" name="submit_form9" value="Save">
      <input type="reset" class="form_btn" id="form_btn2" value="Reset">
</form>