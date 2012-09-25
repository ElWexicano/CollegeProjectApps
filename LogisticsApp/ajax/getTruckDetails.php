<?php

require_once('../conf/libDB.php');

if(!isset($_GET['registration']))
{
    die();
}

$registration = $_GET['registration'];

$dbConnection = dbConnect();
$result = mysql_query("select v.vehicleReg,
                                v.vehicleYear,
                                v.vehicleStatus,
                                t.truckMake,
                                t.truckDOE,
                                t.truckTaxed,
                                t.truckInsured
                                from vehicles v
                                left join trucks t
                                on v.vehicleReg = t.truckReg
                                where v.vehicleReg = '$registration'") 
                                or die("Error");  

$row = mysql_fetch_array( $result );

echo json_encode($row);

mysql_close($dbConnection);
?>
