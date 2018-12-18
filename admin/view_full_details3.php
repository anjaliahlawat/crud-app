<label id="form_hd1">Supplier: <?php echo $supplier_name; ?></label>
<div id = "show_full_details2" class="view_full_details_div2">
<form action="admin/backend_logic.php" method="post">
  <table id="view_supp_table">
<?php
      
      $query1 = "SELECT supplier_id, supplier_name, type_of_supplier, location, phone_no, contact_person, remarks FROM softlinkasia.supplier WHERE supplier_id='$supplier_id'";
      $result1 = mysqli_query($conn, $query1);
      $row = mysqli_fetch_assoc($result1);
?>
     <input type='hidden' value='<?php echo $supplier_id; ?>' name='supplier_id'/>    
            <tr>
                <td>Supplier:</td>
                <td><input type='text' class='supp_field' name='supplier_name' value="<?php echo $row['supplier_name']?>"/></td>
                <td><input type='submit' class='supp_table_btn' id='supp_table_btn_save' name='supp_table_btn_save' value='Save'/></td>
            </tr>
            <tr>
                <td>Type of Supplier:</td>
                <td><input type='text' class='supp_field' name='type_of_supplier' value="<?php echo $row['type_of_supplier']?>"/></td>
                <td><input type='submit' class='supp_table_btn' id='supp_table_btn_del' name='supp_table_btn_del' value='Delete'/></td>
            </tr>
            <tr>
                <td>Location:</td>
                <td><input type='text' class='supp_field' name='location' value="<?php echo $row['location']?>"/></td>                
            </tr>
            <tr>
                <td>Phone No.:</td>
                <td><input type='text' class='supp_field' name='phone_no' value="<?php echo $row['phone_no']?>"/></td>                
            </tr>
            <tr>
                <td>Contact Person:</td>
                <td><input type='text' class='supp_field' name='contact_person' value="<?php echo $row['contact_person']?>"/></td>
            </tr>
            <tr>
                <td>Remarks:</td>
                <td><input type='text' class='supp_field' name='remarks' value="<?php echo $row['remarks']?>"/></td>
            </tr>
</table>
</form>
</div>