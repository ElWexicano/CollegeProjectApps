<?php

require_once('../conf/libDB.php');

if(!isset($_POST['registration']))
{
    die();
}

$registration   = mysql_real_escape_string($_POST['registration']);
$year           = mysql_real_escape_string($_POST['year']);
$status         = mysql_real_escape_string($_POST['status']);
$make           = mysql_real_escape_string($_POST['make']);
$doe            = mysql_real_escape_string($_POST['doe']);
$taxed          = mysql_real_escape_string($_POST['taxed']);
$insured        = mysql_real_escape_string($_POST['insured']);

$dbConnection = dbConnect();
$result = mysql_query("update vehicles v
                                left join trucks t on v.vehicleReg = t.truckReg
                                set v.vehicleStatus = '$status',
                                t.truckMake = '$make',
                                t.truckDOE = $doe,
                                t.truckTaxed = $taxed,
                                t.truckInsured = $insured
                                where v.vehicleReg = '$registration'
                                ") or die("Error");  

mysql_close($dbConnection);
?>