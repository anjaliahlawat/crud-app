
<div class="left">
    <form action="" method="post">
    <p style="font-size: 14px; font-weight: bold; margin-left: 20px;">Admin Details</p>
  	<button type="submit" class="admin_action" id="b1" name="view"  value="View Details">View Details</button>
    <button type="submit" class="admin_action1" id="b2" name="addClient" value="Add new Clients">Add new Clients</button>
    <button type="submit" class="admin_action" id="b3" name="addCon" value="Add Contact Details">Add Contact Details</button>
    <button type="submit" class="admin_action" id="b4" name="addMod" value="Add new Modules">Add new Modules</button>
    <button type="submit" class="admin_action" id="b5" name="addRec" value="Update Records">Update Records</button>
    <button type="submit" class="admin_action" id="b6" name="addAmc" value="Add amc Details">Add AMC Details</button>
    <button type="submit" class="admin_action" id="b10" name="addConfig" value="Add Config. Details">Add Config. Details</button>
    <button type="submit" class="admin_action" id="b7" name="addPr" value="Add new Product">Add new Product</button>
    <button type="submit" class="admin_action" id="b8" name="addSup" value="Add new Supplier">Add new Supplier</button>
    <button type="submit" class="admin_action" id="b9" name="addBd" value="Add Equipment B/D details"> Add Equipment B/D details</button>
    <br/>
    <br/>
     <p style="font-size: 14px; font-weight: bold; margin-left: 20px;">Intern Details</p>
    <button type="submit" class="admin_action" id="b10" name="addIntern" value="Add Intern details"> Add Intern Details</button>
    <button type="submit" class="admin_action" id="b11" name="viewIntern" value="View Intern details"> View Intern Details</button>
    </form>   
</div>

<div class="right">

<?php

if ( isset($_POST['view']))
{
   include_once "admin/view.php";
}
elseif (isset($_POST['addClient']))
{ 
   include_once "admin/add_client.php";
}
elseif (isset($_POST['addCon']))
{ 
   include_once "admin/add_conn.php";
}
elseif (isset($_POST['addMod']))
{ 
   include_once "admin/add_mod.php";
}
elseif (isset($_POST['addRec']))
{ 
   include_once "admin/add_rec.php";
}
elseif (isset($_POST['addAmc']))
{ 
   include_once "admin/amc_details.php";
}
elseif (isset($_POST['addConfig']))
{ 
   include_once "admin/add_config.php";
}
elseif (isset($_POST['addPr']))
{ 
   include_once "admin/add_pr.php";
}
elseif (isset($_POST['addSup']))
{ 
   include_once "admin/add_sup.php";
}
elseif (isset($_POST['addBd']))
{ 
   include_once "admin/add_bd.php";
}
elseif (isset($_POST['addIntern']))
{ 
   include_once "admin/add_intern.php";
}
elseif (isset($_POST['viewIntern']))
{ 
   include_once "admin/view_intern.php";
}
elseif(isset($_GET['view'])) 
{
   include_once "admin/view_bank_details.php";
}
elseif(isset($_GET['view1'])) 
{
   include_once "admin/invoice.php";
}
elseif(isset($_POST['view_full_details1'])) 
{
   foreach ($_POST['view_full_details1'] as $id => $view_full_details1)
   {
       $client_name= $_POST['client_name'][$id];
       $software_purchased = $_POST['software_purchased'][$id];
       $data_service = $_POST['data_service'][$id];
       $data_entry = $_POST['data_entry'][$id];              
       include_once "admin/view_full_details.php";
   } 
   
}
elseif(isset($_POST['edit_full_details2'])) 
{
   foreach ($_POST['edit_full_details2'] as $id => $edit_full_details2)
   {
      $product_id= $_POST['product_id'][$id];
      $product_name = $_POST['product_name'][$id];
      include_once "admin/view_full_details2.php";
   } 
   
}
elseif(isset($_POST['view_full_details3'])) 
{
   foreach ($_POST['view_full_details3'] as $id => $view_full_details3)
   {
      $supplier_id= $_POST['supplier_id'][$id];
      $supplier_name = $_POST['supplier_name'][$id];
      include_once "admin/view_full_details3.php";
   }    
}
elseif(isset($_POST['view_full_details4'])) 
{
   foreach ($_POST['view_full_details4'] as $id => $view_full_details4)
   {
      $bd_id= $_POST['bd_id'][$id];
      $equip_name = $_POST['equip_name'][$id];
      include_once "admin/view_full_details4.php";
   }    
}
elseif(isset($_POST['view_full_details5'])) 
{
   foreach ($_POST['view_full_details5'] as $id => $view_full_details5)
   {
      $intern_id= $_POST['intern_id'][$id];
      $name = $_POST['name'][$id];
      include_once "admin/view_full_details5.php";
   }    
}
elseif(isset($_POST['edit_mod']))
{
    foreach ($_POST['edit_mod'] as $id => $edit_mod)
    {
        $mod_id = $_POST['mod_id'][$id];
        $client_name= $_POST['client_name'];
        $software_purchased = $_POST['software_purchased'];
        include_once "admin/view_tables.php";
    }
}
elseif(isset($_POST['edit_amc']))
{
    foreach ($_POST['edit_amc'] as $id => $edit_amc)
    {
        $amc_id = $_POST['amc_id'][$id];
        $client_name= $_POST['client_name'];
        $software_purchased = $_POST['software_purchased'];
        include_once "admin/view_amc_table.php";
    }
}
elseif(isset($_POST['edit_rec']))
{
    foreach ($_POST['edit_rec'] as $id => $edit_rec)
    {
        $rec_id = $_POST['rec_id'][$id];
        $client_name= $_POST['client_name'];
        $software_purchased = $_POST['software_purchased'];
        include_once "admin/view_rec_table.php";
    }
}
elseif(isset($_POST['ds_table_btn_save']))
{
    echo "hello";
}
else 
{
   include_once "admin/homepage.php";
}

?> 
</div>



   
    

     
	 
   
