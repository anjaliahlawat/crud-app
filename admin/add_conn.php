<form class="client_form" method="post" action="admin/backend_logic.php">
<p class="client_hd">Add Client Contact details</p><br/><br/>
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
            <td><label>Contact Person-</label></td>
          </tr>  
          <tr>
            <td><label> Name:</label></td>
            <td><input class="Afield" type="text" name="con_name"/> </td>
          </tr>
          <tr>
            <td><label> Phone No:</label></td>
            <td><input class="Afield" type="text" name="phone_no"/> </td>
          </tr>
          <tr>
            <td><label> Designation:</label></td>
            <td><input class="Afield" type="text" name="designation"/> </td>
          </tr>
          </table>
            <input type="button" class="form_btn" id="add_more" name="submit_form_con2" value="+ Add More">
          <br/>
          <br/>
          <table id="add2" style="display: none">
          <tr>
            <td><label>Contact Person 2-</label></td>
          </tr>
          <tr>
             <td style="width:260px"><label> Name:</label></td>
            <td><input class="Afield" type="text" name="con_name2"/> </td>
          </tr>
          <tr>
            <td><label> Phone No:</label></td>
            <td><input class="Afield" type="text" name="phone_no2"/> </td>
          </tr>
          <tr>
            <td><label> Designation:</label></td>
            <td><input class="Afield" type="text" name="designation2"/> </td>
            <td><input type="button" class="form_btn" id="add_more2" name="submit_form_con3" value="+ Add More"></td>
            <td><input type="button" class="form_btn" id="cancel2" value="Cancel"></td>
          </tr>
          </table>
          <br/>
          <br/>
          <table id="add3" style="display: none">
          <tr>
            <td><label>Contact Person 3-</label></td>
          </tr>
          <tr>
             <td style="width:260px"><label> Name:</label></td>
            <td><input class="Afield" type="text" name="con_name3"/> </td>
          </tr>
          <tr>
            <td><label> Phone No:</label></td>
            <td><input class="Afield" type="text" name="phone_no3"/> </td>
          </tr>
          <tr>
            <td><label> Designation:</label></td>
            <td><input class="Afield" type="text" name="designation3"/> </td>
            <td><input type="button" class="form_btn" id="cancel3" value="Cancel"></td>
          </tr>
          </table>

        
  </table>
        
        <input type="submit" class="form_btn" id="form_btn1" name="submit_form_con" value="Save">
        <input type="reset" class="form_btn" id="form_btn2" value="Reset">
</form> 