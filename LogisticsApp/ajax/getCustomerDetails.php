<?php

require_once('../conf/libDB.php');

if(!isset($_GET['customerId']))
{
    echo "Unable to get Customer Details";
    die();
}

$customerId = $_GET['customerId'];

$dbConnection = dbConnect();
$result = mysql_query("select customerName, 
                                customerEmail, 
                                customerAddress, 
                                customerTelephone1, 
                                customerTelephone2 
                                from customers 
                                where customerId = '$customerId'") 
                                or die("Cant get Customer Details");  

$row = mysql_fetch_array( $result );

echo json_encode($row);

mysql_close($dbConnection);
?>
