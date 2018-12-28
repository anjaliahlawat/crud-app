<form class="client_form" method="post" action="admin/backend_logic.php">
<p class="client_hd">Add Data Entry details</p><br/><br/>
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
       <tr class="de_class" id="de_class1">
            <td style="width:190px;"></td>
            <td style="width:190px;"><input type="radio"  name="de_type" value="onsite"> Onsite
                <input type="radio" name="de_type" value="offsite"> Offsite </td>
          </tr>

          <tr class="de_class" id="de_class2">
            <td style="width:190px;"><label> Start Date:</label></td>
            <td style="width:190px;"><input class="Afield" type="date" name="de_start_date" placeholder="YYYY-MM-DD"/></td>
          </tr>
          <tr class="de_class" id="de_class3">
            <td style="width:190px;"><label> End Date:</label></td>
            <td style="width:190px;"><input class="Afield" type="date" name="de_end_date" placeholder="YYYY-MM-DD"/></td>
          </tr>
          <tr class="de_class" id="de_class4">
            <td style="width:190px;"><label> Status:</label></td>
            <td style="width:250px;"><input type="radio"  name="de_status" value="yet to complete"> Yet to complete<br/>
                <input type="radio" name="de_status" value="in_process"> In process<br/>
                <input type="radio" name="de_status" value="completed"> Completed</td>
          </tr>
          <tr class="de_class" id="de_class5">
            <td style="width:190px;"><label> Remarks</label></td>
            <td style="width:190px;"><input class="Afield" type="text" name="de_remarks" /></td>
          </tr>

  </table>
   <input type="submit" class="form_btn" id="form_btn1" name="submit_form12" value="Save">
          <input type="reset" class="form_btn" id="form_btn2" value="Reset">
</form>