<?php
// database connection parameters
$host = '127.0.0.1';
$username = 'root';
$password = '';
$database = 'patversme';

// create database connection
$con = mysqli_connect($host, $username, $password, $database);

// check connection
if (mysqli_connect_errno()) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
}
?>