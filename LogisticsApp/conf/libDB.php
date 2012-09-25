<?php
/**
 * This file is used to store any database functions.
 * 
 * @author  : Shane Doyle
 * @date    : 25/09/2011
 */

require_once('dbConfig.php');

function dbConnect()
{
    $dbConfig = new DatabaseConfig();

    $connection = mysql_connect($dbConfig->get_server(),
                                $dbConfig->get_userName(),
                                $dbConfig->get_password()
                               ) or die('Conn Error: '.  mysql_error());

    $db = mysql_select_db($dbConfig->get_database(),$connection) 
                                or die('DB Error: '.  mysql_error());

    return $connection;
}

?>