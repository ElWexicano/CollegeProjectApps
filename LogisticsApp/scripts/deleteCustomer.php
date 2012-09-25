<?php
require_once('../conf/libDB.php');

$dbConnection = dbConnect();

session_start();

$customerId = $_POST['customerId'];

if(!isset($_SESSION['username']) || !isset($customerId))
{
    die();
}

$query = "delete from customers where customerId = '$customerId' limit 1";

$result = mysql_query($query) or die(mysql_error());

$_SESSION['transactions']++;

mysql_close($dbConnection);

?>