<?php
class DB
{
    private static $_instance = null; #Static instance variable to hold the singleton instance of the class
    private $_pdo, #Stores a PDO instance
    $_query, #Stores the query to be executed
    $_error = false, #Stores the error status of the last operation
    $_results, #Stores the result set of the last query
    $_count = 0; #Stores the number of rows affected by the last query

    private function __construct()
    {
        try { #Creates a new PDO instance with the database connection details obtained from the Config class
            $this->_pdo = new PDO('mysql:host=' . Config::get('mysql/host') . ';dbname=' . Config::get('mysql/db'), Config::get('mysql/username'));
        } catch (PDOException $e) {
            die($e->getMessage()); #If the connection fails, output the error message and exit
        }
    }

    public static function getInstance()
    {
        if (!isset(self::$_instance)) { #If the instance does not exist
            self::$_instance = new DB(); #Creates a new instance
        }
        return self::$_instance;
    }
}