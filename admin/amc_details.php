<form class="client_form" method="post" action="admin/backend_logic.php">
<p class="client_hd">Add AMC details</p><br/><br/>
  <table class="soft_details">
          <tr>
            <td><label> Client Name:</label></td>
            <td><input class="Afield" type="text" name="client_name" /> </td>
          </tr>
          <tr>
            <td><label> Software purchased:</label></td>
            <td><input type="radio" name="soft" value="alice"> Alice
                <input type="radio" name="soft" value="liberty"> Liberty </td>
          </tr>
          <tr>
            <td><label> Module Name:</label></td>
            <td><input class="Afield" type="text" name="module_name" /> </td>
          </tr>
          <td><label> Invoice No.:</label></td>
            <td><input class="Afield" type="text" name="invoice_no" /> </td>
          </tr>
          <td><label> Invoice date:</label></td>
            <td><input class="Afield" type="date" name="invoice_date" /> </td>
          </tr>
          <td><label> AMC Period:</label></td>
            <td><input class="Afield" type="number" name="amc_period" /> </td>
          </tr>
          <tr>
          <td><label> Percent of AMC Given:</label></td>
            <td><input class="Afield" type="number" name="per_of_amc_given" /> </td>
          </tr>
          <tr>
          <td><label> Remarks:</label></td>
            <td><input class="Afield" type="text" name="remarks"/> </td>
          </tr>
          <br/>
            
    </table>
          <input type="submit" class="form_btn" id="form_btn1" name="submit_form3" value="Save">
          <input type="reset" class="form_btn" id="form_btn2" value="Reset">
</form>    




