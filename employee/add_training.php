<form class="training_form" action="employee/backend_logic.php" method="post">
<p class="training_heading">Please fill the following details</p><br/><br/>
  <table class="training_table">
     <tr>
       <td><label>Name:</label></td>
       <td><input class="Afield" type="text" name="name"/></td>
     </tr>
     <tr>
       <td><label>Designation:</label></td>
       <td><input class="Afield" type="text" name="designation"/></td>
     </tr>
     <tr>
       <td><label>Training Particular/Topic:</label></td>
       <td><input class="Afield" type="text" name="topic"/></td>
     </tr>
     <tr>
       <td><label>Cadre:</label></td>
       <td><input type="radio" name="cadre" value="Staff"> Staff
           <input type="radio" name="cadre" value="Operator"> Operator</td>
     </tr>
     <tr>
       <td><label>Months</label></td>
       <td><input class="Afield" type="text" name="months"/></td>
     </tr>
     <tr>
       <td><label>Status:</label></td>
       <td><input class="Afield" type="text" name="status"/></td>
     </tr>
     <tr>
       <td><label>Faculty:</label></td>
       <td><input type="radio" name="faculty" value="internal"> Internal
           <input type="radio" name="faculty" value="external"> External</td>
     </tr>
     <tr>
       <td><label>Trainee Name:</label></td>
       <td><input class="Afield" type="text" name="trainee_name"/></td>
     </tr>
     <tr>
       <td><label>Venue:</label></td>
       <td><input class="Afield" type="text" name="venue"/></td>
     </tr>
     <tr>
       <td><label>Date of Training:</label></td>
       <td><input class="Afield" type="date" name="t_date"/></td>
     </tr>
     <tr>
       <td><label>Time of Training:</label></td>
       <td><input class="Afield" type="time" name="t_time"/></td>
     </tr>
     <tr>
       <td><label>Effectiveness(Rating):</label></td>
       <td><input class="Afield" type="text" name="rating"/></td>
     </tr>
  </table>
  <br/>
  <input type="submit" class="form_btn" id="form_btn1" name="submit_form_tr" value="Save">
  <input type="reset" class="form_btn" id="form_btn2" value="Reset">
</form>