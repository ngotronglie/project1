<?php

$host = 'localhost';
$dbname = "project1";
$username = 'root';
$password = "";
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($conn == true) {
    echo "Connected";
} else {
    echo "Not connected";
}
