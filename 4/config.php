<?php
$host = "localhost";
$dbname = "db";
$username = "root";
$password = "password";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $pe) {
    die("Unable to connect to database $dbname: " . $pe->getMessage());
}
