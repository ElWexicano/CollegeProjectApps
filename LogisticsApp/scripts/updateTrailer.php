<?php

require_once('../conf/libDB.php');

if(!isset($_POST['registration']))
{
    die();
}

$registration   = mysql_real_escape_string($_POST['registration']);
$year           = mysql_real_escape_string($_POST['year']);
$status         = mysql_real_escape_string($_POST['status']);
$type           = mysql_real_escape_string($_POST['type']);

$dbConnection = dbConnect();

$query = "update vehicles v
                                left join trailers t on v.vehicleReg = t.trailerReg
                                set v.vehicleStatus = '$status',
                                t.trailerType = '$type'
                                where v.vehicleReg = '$registration'
                                ";


$result = mysql_query($query) 
                                or die("Error");  

mysql_close($dbConnection);
?>