<label id="mod_hd1"><?php echo $client_name ?></label>
<label id="mod_hd2"><?php echo $software_purchased ?></label>
<form action="admin/backend_logic.php" method="post"> 
   <table id="view_mod_table" style="display:block;">
        <?php
             $query2 = "SELECT mod_id, module_name, client_id, installation_date, purchased_order_no, no_of_nodes_purchased, date_of_m_purchased, module_cost, reg_no, training_date, no_of_training_days  FROM softlinkasia.modules WHERE mod_id='$mod_id'";
             $result2 = mysqli_query($conn, $query2);
             $row = mysqli_fetch_assoc($result2);
        ?>  
          <input type='hidden' value='<?php echo $row['mod_id']; ?>' name='mod_id'/>           
          <tr>
              <td>Modules Purchased:</td>
              <td><input type='text' class='Afield' name='module_name' value="<?php echo $row['module_name']?>"/></td>
              <td><input type='submit' class='mod_table_btn' id='mod_table_btn_save' name='mod_table_btn_save' value='Save'/></td>
          </tr>
          <tr>
               <td>Date of Purchased:</td>
               <td><input type='date' class='Afield' name='date_of_m_purchased' value="<?php echo $row['date_of_m_purchased']?>" /></td><td><input type='submit' class='mod_table_btn' id='mod_table_btn_del' name='mod_table_btn_del' value='Delete'/></td>
          </tr>
          <tr>
               <td>Purchased Cost:</td>
               <td><input type='number' class='Afield' name='module_cost' value="<?php echo $row['module_cost']?>"/></td>
          </tr>
          <tr>
               <td>Number of Nodes Purchased:</td>
               <td><input type='number' class='Afield' name='no_of_nodes_purchased' value="<?php echo $row['no_of_nodes_purchased']?>"/></td>
          </tr> 
          <tr>
               <td>Purchased Order No.:</td>
               <td><input type='text' class='Afield' name='purchased_order_no' value="<?php echo $row['purchased_order_no']?>" /></td>
          </tr>  
          <tr>
               <td>Reg No.:</td>
               <td><input type='text' class='Afield' name='reg_no' value="<?php echo $row['reg_no']?>"/></td>
          </tr>
          <tr>
               <td>Installation Date:</td>
               <td><input type='date' class='Afield' name='installation_date' value="<?php echo $row['installation_date']?>" /></td>
          </tr>
          <tr>
              <td>Training Date:</td>
              <td><input type='date' class='Afield' name='training_date' value="<?php echo $row['training_date']?>"/></td>
          </tr>
          <tr>
              <td>No. of Training Days:</td>
              <td><input type='number' class='Afield' name='no_of_training_days' value="<?php echo $row['no_of_training_days']?>" /></td>
          </tr>
   </table>
</form>
