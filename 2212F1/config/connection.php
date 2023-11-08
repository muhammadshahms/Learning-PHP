<?php

$domain = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "php_db";

try {
    // Create a database connection
    $con = mysqli_connect($domain, $dbusername, $dbpassword, $dbname);

    // Check if the connection was successful
    if (!$con) {
        throw new Exception("Connection failed: " . mysqli_connect_error());
    }
    
    // Perform database operations here


} catch (Exception $e) {
    // Handle the exception
    echo "MYSQL Error: " . $e->getMessage();
}

?>