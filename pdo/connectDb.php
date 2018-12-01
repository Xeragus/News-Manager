<?php

// initialize base variables for PDO connection
$host = 'localhost';
$user = 'root';
$password = '{enter your password here}';
$dbname = 'pdolab';

$conn="";
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}
