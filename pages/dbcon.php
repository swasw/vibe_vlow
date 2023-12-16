<?php
$host = 'localhost';
$usernamedt = 'root'; 
$password = ''; 
$database = 'vibevlow'; 

$connection = new mysqli($host, $usernamedt, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>