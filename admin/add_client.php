
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
          </table>
          <table class="soft_details">
          <tr class="ds_class" id="ds_class1">
            <td style="width:190px;"><label> Type:</label></td>
            <td style="width:250px;"><input type="radio" id="excel" name="ds_type" value="afw"> Data import from Excel<br/>
                <input type="radio" id="afw" name="ds_type" value="excel"> Data conversion from Afw </td>
          </tr>

          <tr id="excel_files">
            <td style="width:190px;"><label> No. of files recovered from Excel:</label></td>
            <td style="width:150px;"><input class="Afield" type="number" name="no_of_excel_files_rnc" /></td>
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
            <td style="width:250px;"><input type="radio"  name="ds_status" value="yet to complete"> Yet to complete<br/>
                <input type="radio" name="ds_status" value="in_process"> In process<br/>
                <input type="radio" name="ds_status" value="completed"> Completed</td>
          </tr>
          <tr class="ds_class" id="ds_class5">
            <td style="width:190px;"><label> Remarks</label></td>
            <td style="width:150px;"><input class="Afield" type="text" name="ds_remarks" /></td>
          </tr>
          </table>

          <table>
          <tr style="width:300px !important;">
            <td style="width:190px;"><label> Data entry:</label></td>
            <td style="width:190px;"><input type="radio" id="de_yes" name="de" value="yes"> Yes
                <input type="radio" id="de_no" name="de" value="no"> No </td>
          </tr>
          </table>
          <table class="soft_details">
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
          <br/>
            <input type="submit" class="form_btn" id="form_btn1" name="submit_form1" value="Save">
            <input type="reset" class="form_btn" id="form_btn2" value="Reset">
   
</form>






  