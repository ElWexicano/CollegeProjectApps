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
                                t.trailerType
                                from vehicles v
                                left join trailers t
                                on v.vehicleReg = t.trailerReg
                                where v.vehicleReg = '$registration'") 
                                or die("Error");  

$row = mysql_fetch_array( $result );

echo json_encode($row);

mysql_close($dbConnection);
?>
