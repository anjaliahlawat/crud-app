<form class="client_form" method="post" action="admin/backend_logic.php">
<p class="client_hd">Add Product details</p><br/><br/>
  
  <table class="soft_details" id="pr_table">          
          <tr>
            <td><label> Product Name:</label></td>
            <td><input class="Afield" type="text" name="product_name" /> </td>
          </tr>
          <tr>
            <td><label> Supplier:</label></td>
            <td><input class="Afield" type="text" name="supplier_name" /> </td>
          </tr>
          <tr>
            <td><label> Specifications:</label></td>
            <td><input class="Afield" type="text" name="specifications" /> </td>
          </tr>
          <tr>
            <td><label> Unit:</label></td>
            <td><input class="Afield" type="number" name="unit" /> </td>
          </tr>
          <tr>
            <td><label> Rate:</label></td>
            <td><input class="Afield" type="number" name="rate" /> </td>
          </tr>
          <tr>
            <td><label> Tax Type:</label></td>
            <td><input class="Afield" type="text" name="tax_type" /> </td>
          </tr>
          <tr>
            <td><label> Delivery Terms:</label></td>
            <td><input class="Afield" type="text" name="delivery_terms" /> </td>
          </tr>
          <tr>
            <td><label> Notes:</label></td>
            <td><input class="Afield" type="text" name="notes" /> </td>
          </tr>
          <tr>
            <td><label> Warranty:</label></td>
            <td><input class="Afield" type="number" name="warranty" placeholder="in years" /> </td>
          </tr>
</table>
      <input type="submit" class="form_btn" id="form_btn1" name="submit_form8" value="Save">
      <input type="reset" class="form_btn" id="form_btn2" value="Reset">
</form> 