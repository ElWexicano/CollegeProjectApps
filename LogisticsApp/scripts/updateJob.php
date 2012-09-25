<?php

require_once('../conf/libDB.php');

$dbConnection = dbConnect();

session_start();

$customerName           = mysql_real_escape_string($_POST['customerName']);
$cost                   = mysql_real_escape_string($_POST['cost']);
$trailer                = mysql_real_escape_string($_POST['trailerReg']);
$truck                  = mysql_real_escape_string($_POST['truckReg']);
$collectionAddress      = mysql_real_escape_string($_POST['collectionAddress']);
$collectionDate         = mysql_real_escape_string($_POST['collectionDate']);
$deliveryAddress        = mysql_real_escape_string($_POST['deliveryAddress']);
$deliveryDate           = mysql_real_escape_string($_POST['deliveryDate']);
$deliveryStatus         = mysql_real_escape_string($_POST['deliveryStatus']);
$collectionStatus       = mysql_real_escape_string($_POST['collectionStatus']);
$jobStatus              = mysql_real_escape_string($_POST['jobStatus']);
$jobId                  = mysql_real_escape_string($_POST['jobId']);


if(!isset($_SESSION['username']) || !isset($jobId))
{
    die();
}

$query = "select customerId from customers where customerName = \"$customerName\"";


$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array( $result );
$customerId = $row['customerId'];

$query = "update jobs j 
                    left join 
                    collections c on j.collectionId = c.collectionId
                    left join
                    deliveries d on j.deliveryId = d.deliveryId
                    set
                    j.jobCost = $cost,
                    j.trailerReg = '$trailer',
                    j.truckReg = '$truck',
                    j.jobStatus = '$jobStatus',
                    j.customerId = '$customerId',
                    c.collectionDate = '$collectionDate',
                    c.collectionAddress = '$collectionAddress',
                    c.collectionStatus = '$collectionStatus',
                    d.deliveryDate = '$deliveryDate',
                    d.deliveryAddress = '$deliveryAddress',
                    d.deliveryStatus = '$deliveryStatus'
                    where jobId = '$jobId'
                    ";


$result = mysql_query($query) or die(mysql_error());

mysql_close($dbConnection);

?>