<?php

require_once('../conf/libDB.php');

$dbConnection = dbConnect();

session_start();

$truckReg       = mysql_real_escape_string($_POST['reg']);
$truckMake      = mysql_real_escape_string($_POST['make']);
$truckYear      = mysql_real_escape_string($_POST['year']);
$truckStatus    = mysql_real_escape_string($_POST['status']);
$truckDOE       = mysql_real_escape_string($_POST['doe']);
$truckTaxed     = mysql_real_escape_string($_POST['taxed']);
$truckInsured   = mysql_real_escape_string($_POST['insured']);

if(!isset($_SESSION['username']))
{
    die();
}


$query = "insert into vehicles values ('$truckReg',
                                    '$truckYear',
                                    '$truckStatus')";

$result = mysql_query($query) or die(mysql_error());


$query = "insert into trucks values ('$truckReg',
                                    '$truckMake',
                                    $truckDOE,
                                    $truckTaxed,
                                    $truckInsured)";

$result = mysql_query($query) or die(mysql_error());


mysql_close($dbConnection);

?>