<?php
require_once('../conf/libDB.php');

date_default_timezone_set('Europe/Dublin');

$dbConnection = dbConnect();

if(isset($_GET['username']))
{
    $username = mysql_real_escape_string($_GET['username']);
}
if(isset($_GET['password']))
{
    $password = mysql_real_escape_string($_GET['password']);
}

$result = mysql_query("select username, 
                            password 
                            from users 
                            where username = '$username' 
                            and password = '$password' limit 1") or die(mysql_error());

if(mysql_num_rows($result)==1)
{
    session_start();
    $_SESSION['username']       = $username;
    $_SESSION['loginTime']      = date("d-m-Y H:i");
    $_SESSION['transactions']   = 0;
        
    echo json_encode(1);
}
else
{
    echo json_encode(0);
}

mysql_close($dbConnection);
?>