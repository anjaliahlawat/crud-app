<form class="client_form" action="admin/backend_logic.php" method="post">
<p class="client_hd">Add Modules details</p><br/><br/>
  <table class="soft_details">
          <tr>
            <td><label> Client Name:</label></td>
            <td> <select class="select_client" name="client_name">
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
            <td><input type="radio" id="alice" name="soft" value="alice"> Alice
                <input type="radio" id="liberty" name="soft" value="liberty"> Liberty </td>
          </tr>
          <table class="soft_details">
          <tr id="mod_alice" style="display: none;">
            <td style="width:200px;"><p >Modules Included:</p></td>
            <td style="width:500px;">
                 <input type="checkbox" name="Mod[]" value="Inquiry">Inquiry
                 <input type="checkbox" name="Mod[]" value="Management">Management
                 <input type="checkbox" name="Mod[]" value="Circulations">Circulations
                 <input type="checkbox" name="Mod[]" value="Acquisition">Acquisition
                 <input type="checkbox" name="Mod[]" value="Periodicals">Periodicals
                 <input type="checkbox" name="Mod[]" value="Stock Take">Stock Take
                 <input type="checkbox" name="Mod[]" value="Records">Records
                 <input type="checkbox" name="Mod[]" value="Systems">Systems
                 <input type="checkbox" name="Mod[]" value="Support">Support
                 <input type="checkbox" name="Mod[]" value="1">Web Opac
                 <input type="checkbox" name="Mod[]" value="Union Catalogue">Union Catalogue
                 <input type="checkbox" name="Mod[]" value="SIP2">SIP2
                
            </td>
          </tr>
          </table>
          <table class="soft_details">
          <tr id="mod_liberty" style="display: none;">
            <td style="width:200px;"><p >Modules Included:</p></td>
            <td style="width:500px;">
                 <input type="checkbox" name="Mod[]" value="Acquisitions">Acquisitions
                 <input type="checkbox" name="Mod[]" value="Advanced Serials">Advanced Serials
                 <input type="checkbox" name="Mod[]" value="Circulation">Circulation
                 <input type="checkbox" name="Mod[]" value="Customisation">Customisation
                 <input type="checkbox" name="Mod[]" value="Syndetics">Syndetics
                 <input type="checkbox" name="Mod[]" value="Inter_Library_Loans">Inter Library Loans
                 <input type="checkbox" name="Mod[]" value="infoNet">infoNet
                 <input type="checkbox" name="Mod[]" value="SMS">SMS
                 <input type="checkbox" name="Mod[]" value="OPAC">OPAC
                 <input type="checkbox" name="Mod[]" value="Picture_search">Picture Search
                 <input type="checkbox" name="Mod[]" value="Federated_search">Federated Search
                 <input type="checkbox" name="Mod[]" value="Resource">Resource
                 <input type="checkbox" name="Mod[]" value="Serial">Serial
                 <input type="checkbox" name="Mod[]" value="Z_cataloguing">Z Cataloguing
                 <input type="checkbox" name="Mod[]" value="Self_circulation">Self Circulation
                 <input type="checkbox" name="Mod[]" value="Single_sign_on">Single Sign On
                 <input type="checkbox" name="Mod[]" value="Shared_cataloguing">Shared Cataloguing
                 <input type="checkbox" name="Mod[]" value="Catalogue_groups">Catalogue Groups
                 <input type="checkbox" name="Mod[]" value="Conversion_ui">Conversion UI
                 <input type="checkbox" name="Mod[]" value="ASP_portal">ASP Portal
                 <input type="checkbox" name="Mod[]" value="Biostore">Biostore
                 <input type="checkbox" name="Mod[]" value="Web_services_api_full">Web Services API-Full
                 <input type="checkbox" name="Mod[]" value="Web_services_api_opac">Web Services API-OPAC and Open Search Only
                 <input type="checkbox" name="Mod[]" value="Web_services_api_open">Web Services API-Open Search Only
                 <input type="checkbox" name="Mod[]" value="review_rating">Book reviews and ratings
                 <input type="checkbox" name="Mod[]" value="ZServer">ZServer
                 <input type="checkbox" name="Mod[]" value="scholastic_year">Scholastic Year </td>
          </tr>
          </table>
          <table class="soft_details">
          <tr>
            <td><label> Date of purchased:</label></td>
            <td><input class="Afield" type="date" name="date_of_m_purchased"/> </td>
          </tr>
          <tr>
            <td><label> Cost of purchased:</label></td>
            <td><input class="Afield" type="number" name="module_cost" /> </td>
          </tr>
          
          <tr>
            <td><label> No. of nodes purchased:</label></td>
            <td><input class="Afield" type="number" name="no_of_nodes_purchased" /> </td>
          </tr>
          <tr>
            <td><label> Purchased Order No.:</label></td>
            <td><input class="Afield" type="text" name="purchased_order_no" /> </td>
          </tr>
          <tr>
            <td><label> Reg No.:</label></td>
            <td><input class="Afield" type="text" name="reg_no" /> </td>
          </tr>
          
          <tr>
            <td><label> Installation Date:</label></td>
            <td><input class="Afield" type="date" name="installation_date" placeholder="YYYY-MM-DD"/> </td>
          </tr>
          <tr>
            <td><label> Training date:</label></td>
            <td><input class="Afield" type="date" name="training_date" /> </td>
          </tr>
          <tr>
            <td><label>No. of days of training:</label></td>
            <td><input class="Afield" type="number" name="no_of_training_days" /> </td>
          </tr>
            
    </table>
            <input type="submit" class="form_btn" id="form_btn1" name="submit_form7" value="Save">
            <input type="reset" class="form_btn" id="form_btn2" value="Reset">
</form>