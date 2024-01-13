<?php
$serverName = "localhost";
$user = "root";
$password = "blanckman";
$dbname = "updateproduct";

try {
    // Create a new mysqli connection
    $connect = new mysqli($serverName, $user, $password, $dbname);

    // Check for connection errors
    if ($connect->connect_error) {
        throw new Exception("Error connecting to the database: " . $connect->connect_error);
    }
} catch (Exception $e) {
    // Handle the exception
    echo "Caught exception: " . $e->getMessage();
    // You might want to log the error or redirect the user to an error page
    exit();
}


