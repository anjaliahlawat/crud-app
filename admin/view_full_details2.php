<label id="form_hd1">Product: <?php echo $product_name; ?></label>
<div id = "show_full_details2" class="view_full_details_div2">
<form action="admin/backend_logic.php" method="post">
  <table id="view_prod_table">
  <?php
      
      $query1 = "SELECT product_id, product_name, specifications, unit, rate, tax_type, delivery_terms, notes, warranty, supplier_name FROM softlinkasia.product WHERE product_id='$product_id'";
      $result1 = mysqli_query($conn, $query1);
      $row = mysqli_fetch_assoc($result1);
  ?>  
            <input type='hidden' value='<?php echo $product_id; ?>' name='product_id'/>    
            <tr>
                <td>Product:</td>
                <td><input type='text' class='prod_field' name='product_name' value="<?php echo $row['product_name']?>"/></td>
                <td><input type='submit' class='prod_table_btn' id='prod_table_btn_save' name='prod_table_btn_save' value='Save'/></td>
            </tr>
            <tr>
                <td>Specifications:</td>
                <td><input type='text' class='prod_field' name='specifications' value="<?php echo $row['specifications']?>"/></td>
                <td><input type='submit' class='prod_table_btn' id='prod_table_btn_del' name='prod_table_btn_del' value='Delete'/></td>
            </tr>
            <tr>
                <td>Unit:</td>
                <td><input type='number' class='prod_field' name='unit' value="<?php echo $row['unit']?>"/></td>                
            </tr>
            <tr>
                <td>Rate:</td>
                <td><input type='number' class='prod_field' name='rate' value="<?php echo $row['rate']?>"/></td>                
            </tr>
            <tr>
                <td>Tax Type:</td>
                <td><input type='text' class='prod_field' name='tax_type' value="<?php echo $row['tax_type']?>"/></td>
            </tr>
            <tr>
                <td>Delivery Terms:</td>
                <td><input type='text' class='prod_field' name='delivery_terms' value="<?php echo $row['delivery_terms']?>"/></td>
            </tr>
            <tr>
                <td>Notes:</td>
                <td><input type='text' class='prod_field' name='notes' value="<?php echo $row['notes'] ?>"/></td>
            </tr>
            <tr>
                <td>Warranty:</td>
                <td><input type='number' class='prod_field' name='warranty' value="<?php echo $row['warranty'] ?>"/></td>
            </tr>
            <tr>
                <td>Supplier:</td>
                <td><input type='text' class='prod_field' name='supplier_name' value="<?php echo $row['supplier_name'] ?>"/></td>
            </tr>
       </table>
     </form>
</div>