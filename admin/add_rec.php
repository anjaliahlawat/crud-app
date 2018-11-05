<form class="client_form" method="post" action="admin/backend_logic.php">
<p class="client_hd">Change Records of Alice</p><br/><br/>
  <table class="soft_details">
          <tr>
            <td><label> Client Name:</label></td>
            <td><input class="Afield" type="text" name="client_name" /> </td>
          </tr>
          <tr>
            <td><label> Records:</label></td>
            <td><input type="radio" name="rec" value="10000"> 10000
                <input type="radio" name="rec" value="20000"> 20000
                <input type="radio" name="rec" value="50000"> 50000
                <input type="radio" name="rec" value="60000"> 60000
                <input type="radio" name="rec" value="Unlimited"> Unlimited</td>
          </tr>
          <tr>
            <td><label> Installation Date:</label></td>
            <td><input class="Afield" type="date" name="installation_date" /> </td>
          </tr>
          
          <tr>
            <td><label> Purchased Order No:</label></td>
            <td><input class="Afield" type="text" name="purchased_order_no" /> </td>
          </tr>
          <tr>
            <td><label> Date of purchased:</label></td>
            <td><input class="Afield" type="date" name="date_of_new_records" /> </td>
          </tr>
          <tr>
            <td><label> Cost:</label></td>
            <td><input class="Afield" type="number" name="cost" /> </td>
          </tr>
          <tr>
            <td><label> Reg No.:</label></td>
            <td><input class="Afield" type="text" name="reg_no" /> </td>
          </tr>
    </table>
    <input type="submit" class="form_btn" id="form_btn1" name="submit_form2" value="Save">
    <input type="reset" class="form_btn" id="form_btn2" value="Reset">
</form>          