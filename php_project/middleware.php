<?php
session_start();

// Check if the user is already logged in. If not, redirect them to the login page.
if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit;
}

// You can add additional middleware logic here, such as role-based access control, etc.
?>
