<?php
session_start();
function userAuthMiddleware() {
    // Check if the user is not logged in or the role is not 'user'
    if (!isset($_SESSION["id"]) || $_SESSION["role"] !== "user") {
        header("Location: login.php");
        exit();
    }
}

// Call this function wherever you want to perform the authentication check
userAuthMiddleware();
