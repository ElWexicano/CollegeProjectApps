<?php
/**
 * This file is used to store the DatabaseConfig Class.
 * 
 * @author  : Shane Doyle
 * @date    : 25/09/2011
 */

class DatabaseConfig 
{
    private $server     = "localhost";
    private $userName   = "root";
    private $password   = "mysql8t";
    private $database   = "transport";

    function get_server() 
    {
        return $this->server;
    }

    function get_userName() 
    {
        return $this->userName;
    }

    function get_password() 
    {
        return $this->password;
    }

    function get_database() 
    {
        return $this->database;
    }

}

?>