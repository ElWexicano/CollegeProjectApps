<?php

require_once('../conf/libDB.php');

$dbConnection = dbConnect();

session_start();

$customerId             = mysql_real_escape_string($_POST['customerId']);
$cost                   = mysql_real_escape_string($_POST['cost']);
$trailer                = mysql_real_escape_string($_POST['trailer']);
$truck                  = mysql_real_escape_string($_POST['truck']);
$collectionAddress      = mysql_real_escape_string($_POST['collectionAddress']);
$collectionDate         = mysql_real_escape_string($_POST['collectionDate']);
$deliveryAddress        = mysql_real_escape_string($_POST['deliveryAddress']);
$deliveryDate           = mysql_real_escape_string($_POST['deliveryDate']);


if(!isset($_SESSION['username']))
{
    die();
}


$query = "insert into collections (collectionAddress, 
                                    collectionDate) 
                                    values 
                                    ('$collectionAddress',
                                    '$collectionDate')";

$result = mysql_query($query) or die(mysql_error());
$collectionId = mysql_insert_id();



$query = "insert into deliveries (deliveryAddress, 
                                    deliveryDate) 
                                    values 
                                    ('$deliveryAddress',
                                    '$deliveryDate')";


$result = mysql_query($query) or die(mysql_error());
$deliveryId = mysql_insert_id();



$date = date('Y-m-d');

$query = "insert into jobs (jobCost, 
                            jobDate, 
                            collectionId, 
                            deliveryId, 
                            customerId, 
                            truckReg, 
                            trailerReg) 
                            values 
                            ($cost,
                            '$date',
                            '$collectionId',
                            '$deliveryId',
                            '$customerId',
                            '$truck',
                            '$trailer'
                            )";
$result = mysql_query($query) or die(mysql_error());


mysql_close($dbConnection);

?>