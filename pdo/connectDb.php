<?php

// initialize base variables for PDO connection
$host = 'localhost';
$user = 'root';
$password = 'bobi1996';
$dbname = 'pdolab';

$conn="";
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}