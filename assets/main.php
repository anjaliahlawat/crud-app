<!-- main html file for CRUD (php version) -->
<?php echo $CRUD["MESSAGES"] ?><?php echo $CRUD["ERRORS"] ?>
<div class="form">
<form action="<?php echo $CRUD["SELF"] ?>" method="post" name="client_details">
    <p class="subheading"><?php echo $CRUD["FORM_HEAD"] ?></p>

    <table class="form">
    <tr>
        <td><p class="Afield"> Client Name:</p></td>
        <td><input class="Afield" type="text" name="Aclient_name" value="<?php echo $CRUD["Aclient_name"] ?>"> </td>
    </tr>
    <tr>
        <td><p class="Afield"> Place:</p></td>
        <td><?php client_details_place_select() ?> &nbsp; </td>
    </tr>
    <tr>
        <td><p class="Afield"> Software Purchased:</p></td>
        <td><input class="Afield" type="text" name="Asoftware_purchased" value="<?php echo $CRUD["Asoftware_purchased"] ?>"> </td>
    </tr>
    <tr>
        <td><p class="Afield">Modules Included:</p></td>
        <td><b>Alice:</b><br/>
        
                 <input type="checkbox" name="Alice[]" value="Inquiry">Inquiry
                 <input type="checkbox" name="Alice[]" value="Management">Management
                 <input type="checkbox" name="Alice[]" value="Circulations">Circulations
                 <input type="checkbox" name="Alice[]" value="Acquisition">Acquisition
                 <input type="checkbox" name="Alice[]" value="Periodicals">Periodicals
                 <input type="checkbox" name="Alice[]" value="Stock Take">Stock Take
                 <input type="checkbox" name="Alice[]" value="Records">Records
                 <input type="checkbox" name="Alice[]" value="Systems">Systems
                 <input type="checkbox" name="Alice[]" value="Support">Support
                 <input type="checkbox" name="Alice[]" value="1">Web Opac
                 <input type="checkbox" name="Alice[]" value="Union Catalogue">Union Catalogue
                 <input type="checkbox" name="Alice[]" value="SIP2">SIP2
                 &nbsp;
                 <br/>
                 <br/>
           <b> Liberty:</b><br/>

                 <input type="checkbox" name="Liberty[]" value="Acquisitions">Acquisitions
                 <input type="checkbox" name="Liberty[]" value="Advanced Serials">Advanced Serials
                 <input type="checkbox" name="Liberty[]" value="Circulation">Circulation
                 <input type="checkbox" name="Liberty[]" value="Customisation">Customisation
                 <input type="checkbox" name="Liberty[]" value="Syndetics">Syndetics
                 <input type="checkbox" name="Liberty[]" value="Inter_Library_Loans">Inter Library Loans
                 <input type="checkbox" name="Liberty[]" value="infoNet">infoNet
                 <input type="checkbox" name="Liberty[]" value="SMS">SMS
                 <input type="checkbox" name="Liberty[]" value="OPAC">OPAC
                 <input type="checkbox" name="Liberty[]" value="Picture_search">Picture Search
                 <input type="checkbox" name="Liberty[]" value="Federated_search">Federated Search
                 <input type="checkbox" name="Liberty[]" value="Resource">Resource
                 <input type="checkbox" name="Liberty[]" value="Serial">Serial
                 <input type="checkbox" name="Liberty[]" value="Z_cataloguing">Z Cataloguing
                 <input type="checkbox" name="Liberty[]" value="Self_circulation">Self Circulation
                 <input type="checkbox" name="Liberty[]" value="Single_sign_on">Single Sign On
                 <input type="checkbox" name="Liberty[]" value="Shared_cataloguing">Shared Cataloguing
                 <input type="checkbox" name="Liberty[]" value="Catalogue_groups">Catalogue Groups
                 <input type="checkbox" name="Liberty[]" value="Conversion_ui">Conversion UI
                 <input type="checkbox" name="Liberty[]" value="ASP_portal">ASP Portal
                 <input type="checkbox" name="Liberty[]" value="Biostore">Biostore
                 <input type="checkbox" name="Liberty[]" value="Web_services_api_full">Web Services API-Full
                 <input type="checkbox" name="Liberty[]" value="Web_services_api_opac">Web Services API-OPAC and Open Search Only
                 <input type="checkbox" name="Liberty[]" value="Web_services_api_open">Web Services API-Open Search Only
                 <input type="checkbox" name="Liberty[]" value="review_rating">Book reviews and ratings
                 <input type="checkbox" name="Liberty[]" value="ZServer">ZServer
                 <input type="checkbox" name="Liberty[]" value="scholastic_year">Scholastic Year

    </tr>
    <tr class="software_date">
        <td><p class="Afield"> Date of Purchased:</p></td>
        <td>
            Day <input class="day" type="text" name="Asoftware_day" value="<?php echo $CRUD["Asoftware_day"] ?>"> &nbsp;
            Month <?php client_details_month_select1() ?> &nbsp;
            Year <input class="year" type="text" name="Asoftware_year" value="<?php echo $CRUD["Asoftware_year"] ?>"> &nbsp;
        </td>
    </tr>
    <tr>
        <td><p class="Afield">Purchase Order No.:</p></td>
        <td><input class="Afield" type="text" name="Apurchased_order_no" value="<?php echo $CRUD["Apurchased_order_no"] ?>"> </td>
    </tr>
    <tr>
        <td><p class="Afield">Cost:</p></td>
        <td><input class="Afield" type="text" name="Acost" value="<?php echo $CRUD["Acost"] ?>"> </td>
    </tr>
    <tr class="installation_date">
        <td><p class="Afield">Installation Date:</p></td>
        <td>
            Day <input class="day" type="text" name="Ainstallation_day" value="<?php echo $CRUD["Ainstallation_day"] ?>"> &nbsp;
            Month <?php client_details_month_select2() ?> &nbsp;
            Year <input class="year" type="text" name="Ainstallation_year" value="<?php echo $CRUD["Ainstallation_year"] ?>"> &nbsp;
        </td>
    </tr>
    <tr class="buttons">
        <td colspan="2">
<p class="buttons">
<?php echo $CRUD["BUTTONS"] ?><?php echo $CRUD["HIDDENS"] ?>
</p>
    </td></tr>
    </table>


</form>
</div>
<?php echo $CRUD["PRECONTENT"] ?><?php echo $CRUD["CONTENT"] ?><?php echo $CRUD["POSTCONTENT"] ?>
