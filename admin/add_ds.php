<form class="client_form" method="post" action="admin/backend_logic.php">
<p class="client_hd">Add Data Service details</p><br/><br/>
  <table class="soft_details">
      <tr>
            <td><label> Client Name:</label></td>
            <td><select class="select_client" name="client_name">
                 <?php
                    include_once "dbh2.inc.php";
                    $sql0 = "SELECT client_name FROM softlinkasia.main";
                    $result1 = mysqli_query($conn, $sql0);
                    while($row = mysqli_fetch_assoc($result1))
                    {
                        echo "<option value='".$row['client_name']."'>".$row['client_name']."</option>";
                    }
                 ?>                  
          </select> </td>
          </tr>
       <tr>
            <td><label> Software purchased:</label></td>
            <td><input type="radio" name="soft" value="alice"> Alice
                <input type="radio" name="soft" value="liberty"> Liberty </td>
       </tr>
        <tr class="ds_class" id="ds_class1">
            <td style="width:190px;"><label> Type:</label></td>
            <td style="width:250px;"><input type="radio" id="excel" name="ds_type" value="excel"> Data import from Excel<br/>
                <input type="radio" id="afw" name="ds_type" value="afw"> Data conversion from Afw </td>
          </tr>

          <tr id="excel_files">
            <td style="width:190px;"><label> No. of files recovered from Excel:</label></td>
            <td><input class="Afield" type="number" name="no_of_excel_files_rnc" /></td>
          </tr>

          <tr class="ds_class" id="ds_class2">
            <td style="width:190px;"><label> Start Date:</label></td>
            <td style="width:150px;"><input class="Afield" type="date" name="start_date" placeholder="YYYY-MM-DD" /></td>
          </tr>
          <tr class="ds_class" id="ds_class3">
            <td style="width:190px;"><label> End Date:</label></td>
            <td style="width:150px;"><input class="Afield" type="date" name="end_date" placeholder="YYYY-MM-DD"/></td>
          </tr>
          <tr class="ds_class" id="ds_class4">
            <td style="width:190px;"><label> Status:</label></td>
            <td style="width:250px;"><input type="radio"  name="ds_status" value="Yet to complete"> Yet to complete<br/>
                <input type="radio" name="ds_status" value="In process"> In process<br/>
                <input type="radio" name="ds_status" value="Completed"> Completed</td>
          </tr>
          <tr class="ds_class" id="ds_class5">
            <td style="width:190px;"><label> Remarks</label></td>
            <td style="width:150px;"><input class="Afield" type="text" name="ds_remarks" /></td>
          </tr>

  </table>
    <input type="submit" class="form_btn" id="form_btn1" name="submit_form11" value="Save">
          <input type="reset" class="form_btn" id="form_btn2" value="Reset">
</form>