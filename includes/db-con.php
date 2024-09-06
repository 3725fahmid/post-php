<?php

$dbServer = 'localhost';
$dbUsername = 'konok';
$dbPassword = 'pass372';
$dbName = 'post-php';

try {
    $conn = mysqli_connect($dbServer, $dbUsername, $dbPassword, $dbName);
    // echo 'You are connected ..!!!';
} catch (Exception $e) {
    echo "<strong>Failed to Connect:</strong> " . $e->getMessage();
}