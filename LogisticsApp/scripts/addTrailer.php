<?php

require_once('../conf/libDB.php');

$dbConnection = dbConnect();

session_start();

$trailerReg       = mysql_real_escape_string($_POST['reg']);
$trailerType      = mysql_real_escape_string($_POST['type']);
$trailerStatus    = mysql_real_escape_string($_POST['status']);
$trailerYear      = mysql_real_escape_string($_POST['year']);

if(!isset($_SESSION['username']))
{
    die();
}


$query = "insert into vehicles values ('$trailerReg',
                                    '$trailerYear',
                                    '$trailerStatus')";

$result = mysql_query($query) or die(mysql_error());


$query = "insert into trailers values ('$trailerReg',
                                    '$trailerType')";

$result = mysql_query($query) or die(mysql_error());


mysql_close($dbConnection);

?>