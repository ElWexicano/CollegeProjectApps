<?php

require_once('../conf/libDB.php');

$dbConnection = dbConnect();

session_start();

$jobId = $_POST['jobId'];

if(!isset($_SESSION['username']) || !isset($jobId))
{
    die();
}

$query  = "select collectionId, deliveryId from jobs where jobId = '$jobId'";
$result = mysql_query($query) or die(mysql_error());
$row            = mysql_fetch_array( $result );
$collectionId   = $row['collectionId'];
$deliveryId     = $row['deliveryId'];

$query  = "delete from jobs where jobId = '$jobId' limit 1";
$result = mysql_query($query) or die(mysql_error());

$query  = "delete from collections where collectionId = '$collectionId' limit 1";
$result = mysql_query($query) or die(mysql_error());

$query  = "delete from deliveries where deliveryId = '$deliveryId' limit 1";
$result = mysql_query($query) or die(mysql_error());

mysql_close($dbConnection);

?>