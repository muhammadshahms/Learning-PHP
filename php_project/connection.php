<?php

$domain = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "php_db";

try {
    // Create a database connection
    $connect = mysqli_connect($domain, $dbusername, $dbpassword, $dbname);

    // Check if the connection was successful
    if (!$connect) {
        throw new Exception("Connection failed: " . mysqli_connect_error());
    }

    // Your database operations go here

} catch (Exception $e) {
    // Handle the exception
    echo "Database Error: " . $e->getMessage();
}

?>