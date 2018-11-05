<form class="bd_form" method="post" action="admin/backend_logic.php">
<p class="client_hd">Add B/D Equipment details</p><br/><br/>
  <table class="soft_details">
          <tr>
            <td><label> Equipment Name:</label></td>
            <td><input class="Afield" type="text" name="equip_name" /></td>
          </tr>
          <tr>
            <td><label> B/D Date and time:</label></td>
            <td><input class="Afield" type="date" name="bd_date_time" /> </td>
          </tr>
          <tr>
            <td><label> Id no. :</label></td>
            <td><input class="Afield" type="text" name="id_no" /> </td>
          </tr>
          
          <tr>
            <td><label> B/D details:</label></td>
            <td><input class="Afield" type="text" name="bd_details" /> </td>
          </tr>
          <tr>
            <td><label> Action Taken:</label></td>
            <td><input class="Afield" type="text" name="action_taken" /> </td>
          </tr>
          
          <tr>
            <td><label> B/D Release:</label></td>
            <td><input class="Afield" type="text" name="bd_release" /> </td>
          </tr>
          <tr>
            <td><label> Total B/D hours:</label></td>
            <td><input class="Afield" type="number" name="total_bd_hrs" /> </td>
          </tr>
          <tr>
            <td><label>Remarks:</label></td>
            <td><input class="Afield" type="text" name="remarks" /> </td>
          </tr>
          <br/>
          

    </table>
             <input type="submit" class="form_btn" id="form_btn1" name="submit_form5" value="Save">
            <input type="reset" class="form_btn" id="form_btn2" value="Reset">
</form>