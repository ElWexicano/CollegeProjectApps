<?php

require_once('../conf/libDB.php');

$dbConnection = dbConnect();

session_start();

$vehicleReg = $_POST['vehicleReg'];

if(!isset($_SESSION['username']) || !isset($vehicleReg))
{
    die();
}

$query = "delete from vehicles where vehicleReg = '$vehicleReg' limit 1";
$result = mysql_query($query) or die(mysql_error());

mysql_close($dbConnection);
?>