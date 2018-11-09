<!-- main html file for CRUD (php version) -->
<?php echo $CRUD["MESSAGES"] ?><?php echo $CRUD["ERRORS"] ?>
<div class="form">
<form action="<?php echo $CRUD["SELF"] ?>" method="post" name="album">
    <p class="subheading"><?php echo $CRUD["FORM_HEAD"] ?></p>

    <table class="form">
    <tr>
        <td><p class="Afield"> Client Name:</p></td>
        <td><input class="Afield" type="text" name="AClient_Name" value="<?php echo $CRUD["AClient_Name"] ?>"> </td>
    </tr>
    <tr>
        <td><p class="Afield"> Place:</p></td>
        <td><input class="Afield" type="text" name="APlace" value="<?php echo $CRUD["APlace"] ?>"> </td>
    </tr>
    <tr>
        <td><p class="Afield"> Software Purchased:</p></td>
        <td><input class="Afield" type="text" name="ASoftware_Purchased" value="<?php echo $CRUD["ASoftware_Purchased"] ?>"> </td>
    </tr>
    <tr>
        <td><p class="Afield">Modules Included:</p></td>
        <td><input class="Afield" type="text" name="Amodules_included" value="<?php echo $CRUD["Amodules_included"] ?>"> </td>
    </tr>
    <tr class="released">
        <td><p class="Afield"> Date of Purchased:</p></td>
        <td>
            Day <input class="day" type="text" name="Asoftware_day" value="<?php echo $CRUD["Asoftware_day"] ?>"> &nbsp;
            Month <?php client_details_month_select() ?> &nbsp;
            Year <input class="year" type="text" name="Asoftware_year" value="<?php echo $CRUD["Asoftware_year"] ?>"> &nbsp;
        </td>
    </tr>
    <tr>
        <td><p class="Afield">Purchase Order No.:</p></td>
        <td><input class="Afield" type="text" name="Apurchase_order_no" value="<?php echo $CRUD["Apurchase_order_no"] ?>"> </td>
    </tr>
    <tr>
        <td><p class="Afield">Cost:</p></td>
        <td><input class="Afield" type="text" name="Acost" value="<?php echo $CRUD["Acost"] ?>"> </td>
    </tr>
    <tr class="released">
        <td><p class="Afield">Installation Date:</p></td>
        <td>
            Day <input class="day" type="text" name="Ainstallation_day" value="<?php echo $CRUD["Ainstallation_day"] ?>"> &nbsp;
            Month <?php client_details_month_select() ?> &nbsp;
            Year <input class="year" type="text" name="Ainstallation_year" value="<?php echo $CRUD["Ainstallation_year"] ?>"> &nbsp;
        </td>
    </tr>
    <tr class="buttons"><td colspan="2">
<p class="buttons">
<?php echo $CRUD["BUTTONS"] ?><?php echo $CRUD["HIDDENS"] ?>
</p>
    </td></tr>
    </table>


</form>
</div>
<?php echo $CRUD["PRECONTENT"] ?><?php echo $CRUD["CONTENT"] ?><?php echo $CRUD["POSTCONTENT"] ?>
