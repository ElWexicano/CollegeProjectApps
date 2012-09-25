<?php

require_once('../conf/libDB.php');

$dbConnection = dbConnect();

session_start();

$name       = mysql_real_escape_string($_POST['customerName']);
$email      = mysql_real_escape_string($_POST['email']);
$address    = mysql_real_escape_string($_POST['address']);
$telephone1 = mysql_real_escape_string($_POST['telephone1']);
$telephone2 = mysql_real_escape_string($_POST['telephone2']);

if(!isset($_SESSION['username']))
{
    die();
}


$query = "insert into customers (customerName, 
                                    customerEmail, 
                                    customerAddress, 
                                    customerTelephone1, 
                                    customerTelephone2) 
                                    values ('$name',
                                        '$email',
                                        '$address',
                                        '$telephone1',
                                        '$telephone2')";


$result = mysql_query($query) or die(mysql_error());


mysql_close($dbConnection);

?>