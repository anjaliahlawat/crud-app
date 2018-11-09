<?php

define("VERSION", "2.3.8");


$client_details = array ('client_id',
    'client_name', 'place', 'software_purchased', 'date_of_purchased','purchased_order_no..','cost','installation_date'
);
$modules_included_alice;
$modules_included_liberty;

$track_fields = array (
    'track_number', 'client_name','duration'
);

$states=array ('Andhra Pradesh','Andaman & Nicobar','Arunachal Pradesh','Assam','Bihar','Bangladesh','Chhattisgarh','Daman & Diu','Delhi','Goa','Gujarat','Himachal Pradesh','Haryana','J&k','Jharkhand','Karnataka','Kerala','Lakshadweep','Manipur','Madhya Pradesh','Maharashtra','Meghalaya','Mizoram','Nagaland','Odissa','Punjab','Pakistan','Rajasthan','Sri Lanka','Telangana','Tripura','Tamil Nadu','Uttarakhand','Uttar Pradesh','West Bengal'
);

$months = array (
    "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"
);

_init();
main();
function main()
{
    if(! isset($_REQUEST['a'])) $_REQUEST['a'] = '';
    jump($_REQUEST["a"]);
}

function _init( )
{
    global $CRUD;

    $CRUD['client_name'] = "CRUD";
    $CRUD['SELF'] = $_SERVER["SCRIPT_NAME"];

    // loose "index.php" if nec (regexes are fugly in php. Feh.)
    $CRUD["SELF"] = preg_replace('/([\\/\\\])index\\.php$/i', '$1', $CRUD["SELF"]); 

    foreach ( array('DBVERSION', 'BUTTONS', 'HIDDENS', 'MESSAGES', 'ERRORS', 'CONTENT', 'PRECONTENT', 'POSTCONTENT','Aclient_name', 'Aplace', 'Asoftware_purchased','Amodules_included_alice','Amodules_included_liberty', 'Asoftware_day','Asoftware_month', 'Asoftware_year','Apurchase_order_no','Acost','Ainstallation_day' ,'Ainstallation_month','Ainstallation_year','Ttrack_number', 'Tclient_name', 'Tduration') as $v )
        $CRUD[$v] = '';
    $modules_included_alice='';
    $modules_included_liberty='';

    switch(DBENGINE) {
        case 'sqlite3':
            try {
                $dbh = new PDO('sqlite:' . DBFILE, 'unused', 'unused');
                $dbh->sqliteCreateFunction('SEC_TO_TIME', 'sec_to_time', 1);        // custom functions ...
                $dbh->sqliteCreateFunction('TIME_TO_SEC', 'time_to_sec', 1);
                $dbh->sqliteCreateAggregate('SUM_SEC_TO_TIME',
                    'sum_sec_to_time_step', 'sum_sec_to_time_finalize', 1);
                $CRUD['DBVERSION'] = SQLite3::version();
                $CRUD['DBVERSION'] = 'SQLite version ' . $CRUD['DBVERSION']['versionString'];
            } catch (PDOException $e) {
                error($e->getMessage());
            }
            break;
        case 'mysql':
            // connect to the database (persistent)
            try {
                $dbh = new PDO('mysql:host=localhost;dbname=' . MYSQLDB, MYSQLUSER, MYSQLPASS,array( PDO::ATTR_PERSISTENT => true ));
                $sth = $dbh->query("SHOW VARIABLES WHERE Variable_name = 'version'");
                $CRUD['DBVERSION'] = 'MySQL server version ' . $sth->fetchColumn(1);
            } catch (PDOException $e) {
                error($e->getMessage());
            }
            break;
        case 'pgsql':
            // connect to the database (persistent)
            try {
                $dbh = new PDO('pgsql:host=localhost;port=5432;dbname=' . PGSQLDB, PGSQLUSER, PGSQLPASS,
                    array( PDO::ATTR_PERSISTENT => true ));
                $dbh->exec("set client_encoding to 'latin1'");
                $sth = $dbh->query('SELECT VERSION()');
                $CRUD['DBVERSION'] = explode(' ', $sth->fetchColumn());
                $CRUD['DBVERSION'] = 'PostgreSQL server version ' . $CRUD['DBVERSION'][1];
            } catch (PDOException $e) {
                error($e->getMessage());
            }
            break;
        default:
            error('unsupported DBENGINE specified: ' . DBENGINE);
    }
    $CRUD['dbh'] = $dbh;
}
function page( $p )
{
    global $CRUD;   // used in the required files
    if( ! $p ) $p = "main";

    set_vars();

    require_once "assets/header.php";
    require_once "assets/$p.php";
    require_once "assets/footer.php";
    exit();
}

function jump( $action )
{
    switch($action) {
        case "add_client_details":
            do_add_client_details();
            break;
        case "client_details_action":
            do_client_details_action();
            break;
      
        default:    // default to show main page
            main_page();
    }
    return;
}
function main_page()
{
    list_client_detailss();
    form_head('Add client details');
    javascript_focus( 'client_details', 'Aclient_name' );
    hidden('a', 'add_client_details');
    button('add_client_details', ' Add client details ');
    page('main');
}
function do_add_client_details()
{
    global $CRUD, $client_details,$modules_included_liberty,$modules_included_alice;

    foreach( $client_details as $f ) {
        $fieldname = 'A' . $f;
        if ($f == "software_date"){
            $client_details[$f] = get_client_details_software_date($fieldname);

        }
        elseif($f == "installation_date"){
           $client_details[$f] = get_client_details_installation_date($fieldname);
        }
        elseif ($_REQUEST[$fieldname]){
            $client_details[$f] = get_field($fieldname);
        }
    }
    $modules_included_liberty = implode(",",$_POST['Liberty']);
    $modules_included_alice = implode(",",$_POST['Alice']);

    if( ! isset( $client_details['client_name'] ) ) error_message( "This field is required" );
    if( ! isset( $client_details['place'] ) ) error_message( "This field is required");
    if( ! isset( $client_details['software_purchased'] ) ) error_message( "This field is required");
    
    if( ! isset( $client_details['date_of_purchased'] ) ) error_message( "This field is required");
    if( ! isset( $client_details['purchased_order_no.'] ) ) error_message("This field is required");
    if( ! isset( $client_details['cost'] ) ) error_message( "This field is required");
    if( ! isset( $client_details['installation_date'] ) ) error_message( "This field is required");
    if( error_message() ) {
        foreach ( $client_details as $f ) {
            $CRUD[ 'A' . $f ] = isset($client_details[$f]) ? $client_details[$f] : '';
            if( $f == 'software' and isset($client_details[$f]) ) fill_client_details_software_date($client_details[$f]);
            elseif( $f == 'installation' and isset($client_details[$f]) )
                fill_client_details_installation_date( $client_details[$f] );
        }
        main_page();
    }
    create_client_details( $client_details, $modules_included_alice, $modules_included_liberty);
    main_page();
}

function create_client_details( $client_details, $modules_included_alice, $modules_included_liberty )
{
    $id = insert_client_details_sql( $client_details, $modules_included_alice, $modules_included_liberty );

    $client_name = $client_details['client_name'];
    message("client_details \"$client_name\" added.");
    message("You may now add tracks below.");

    javascript_focus( 'add_track', 'Ttrack_number' );
    client_details_edit( $id );
}

function client_details_month_select()
{
    global $CRUD, $months;
    $a = "<select name=\"Asoftware_month\">";
    $a .= "<option value=\"0\">-- Select a Month --</option>\n";
    for ( $i = 1; $i <= 12; $i++ ) {
        $m = $months[$i - 1];
        $selected = ( sprintf("%02d", $i) == $CRUD['Asoftware_month'] ) ? " selected" : "";
        $a .= "<option value=\"$i\"$selected>$m</option>\n";
        }
    $a .= "</select>\n";
    echo($a);
}
function client_details_place_select()
{
    global $CRUD, $states;
    $a = "<select name=\"Aplace\">";
    $a .= "<option value=\"0\">-- Select a place --</option>\n";
    for ( $i = 1; $i <= 35; $i++ ) {
        $s = $states[$i - 1];
        $selected = ( sprintf("%02d", $i) == $CRUD['Aplace'] ) ? " selected" : "";
        $a .= "<option value=\"$i\"$selected>$s</option>\n";
        }
    $a .= "</select>\n";
    echo($a);
}
function get_client_details_software_date($field)
{
    
    $year = get_field('Asoftware_year');
    $month = get_field('Asoftware_month');
    $day = get_field('Asoftware_day');

    // make sure they're numeric
    if( ! is_numeric($year) ) $year = 0;
    if( ! is_numeric($month) ) $month = 0;
    if( ! is_numeric($day) ) $day = 0;

    if( $year < 1 ) return NULL;
    if( $month < 1 ) $month = 1;
    if( $day < 1 ) $day = 1;

    // an SQL date looks like: "2009-01-24"
    return sprintf("%04d-%02d-%02d", $year, $month, $day);
}

function get_client_details_installation_date($field)
{
    
    $year = get_field('Ainstallation_year');
    $month = get_field('Ainstallation_month');
    $day = get_field('Ainstallation_day');

    // make sure they're numeric
    if( ! is_numeric($year) ) $year = 0;
    if( ! is_numeric($month) ) $month = 0;
    if( ! is_numeric($day) ) $day = 0;

    if( $year < 1 ) return NULL;
    if( $month < 1 ) $month = 1;
    if( $day < 1 ) $day = 1;

    // an SQL date looks like: "2009-01-24"
    return sprintf("%04d-%02d-%02d", $year, $month, $day);
}

function fill_client_details_software_date( $f )
{
    global $CRUD;
    list( $year, $month, $day ) = explode('-', $f, 3);

    $CRUD['Asoftware_year'] = $year;
    $CRUD['Asoftware_day'] = $day;
    $CRUD['Asoftware_month'] = $month;
}
function fill_client_details_installation_date( $f )
{
    global $CRUD;
    list( $year, $month, $day ) = explode('-', $f, 3);

    $CRUD['Ainstallation_year'] = $year;
    $CRUD['Ainstallation_day'] = $day;
    $CRUD['Ainstallation_month'] = $month;
}

function insert_client_details_sql( $client_details, $modules_included_alice, $modules_included_liberty )
{
    global $CRUD;
    $dbh = $CRUD['dbh'];

    $query = '
        INSERT INTO client_details
            (client_id, client_name, place, software_purchased, modules_included_alice ,modules_included_liberty,date_of_purchased,purchased_order_no.,cost,installation_date )
            VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    ';

    $sth = $dbh->prepare($query);
    if($sth) $sth->execute(
        array(@$client_details['client_id'], @$client_details['client_name'], @$client_details['place'], @$client_details['software_purchased'], @$modules_included_alice,@$modules_included_liberty,@$client_details['date_of_purchased'], @$client_details['purchased_order_no.'],@$client_details['cost'],@$client_details['installation_date'] )
    );
    else error("insert_client_details_sql: insert prepare returned no statement handle");

    // check for errors
    $err = $sth->errorInfo();
    if($err[0] != 0) error( $err[2] );

    // this is a kludge to make pgsql work like the others
    if(DBENGINE == 'pgsql') {
        $id = $dbh->lastInsertId('client_details_id_seq');
    } else {
        $id = $dbh->lastInsertId();
    }

    return($id);
}

function get_field ( $f )
{
    return stripslashes($_REQUEST[$f]);
}

?>