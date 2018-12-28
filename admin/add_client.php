
<form class="client_form" action="admin/backend_logic.php" method="POST">
<p class="client_hd">Add Client Details</p><br/><br/>
  <table class="soft_details">
          <tr>
            <td><label> Client Name:</label></td>
            <td><input class="Afield" type="text" name="client_name" /> </td>
          </tr>
          <tr>
            <td><label> Address:</label></td>
            <td><input class="Afield" type="text" name="addrs" /> </td>
          </tr>
          <tr>
            <td><label> Product purchased:</label></td>
            <td><input class="Afield" type="text" name="product_purchased" placeholder="Leave empty if not purchased" /></td>
          </tr>
          <tr>
            <td><label> Software purchased:</label></td>
            <td><input type="radio" name="soft" value="alice"> Alice
                <input type="radio" name="soft" value="liberty"> Liberty </td>
          </tr>
          <tr class="recs">
            <td><label> Records:</label></td>
            <td><input type="radio" name="rec" value="10000"> 10000
                <input type="radio" name="rec" value="20000"> 20000
                <input type="radio" name="rec" value="50000"> 50000
                <input type="radio" name="rec" value="60000"> 60000
                <input type="radio" name="rec" value="Unlimited"> Unlimited </td>
          </tr>
          <tr>
            <td><label> Users:</label></td>
            <td><input class="Afield" type="number" name="users" /> </td>
          </tr>
          <tr>
            <td><label> Data service:</label></td>
            <td><input type="radio" id="ds_yes" name="ds" value="yes"> Yes
                <input type="radio" id="ds_no" name="ds" value="no"> No </td>
          </tr>
          <tr style="width:300px !important;">
            <td style="width:190px;"><label> Data entry:</label></td>
            <td style="width:190px;"><input type="radio" id="de_yes" name="de" value="yes"> Yes
                <input type="radio" id="de_no" name="de" value="no"> No </td>
          </tr>
          
          
          </table>
          <br/>
            <input type="submit" class="form_btn" id="form_btn1" name="submit_form1" value="Save">
            <input type="reset" class="form_btn" id="form_btn2" value="Reset">
   
</form>






  