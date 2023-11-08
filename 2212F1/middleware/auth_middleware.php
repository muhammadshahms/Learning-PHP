<?php
session_start();
function userMiddlewareAuth() {
    // Check if the user is not logged in or the role is not 'user'
    if (!isset($_SESSION["id"]) || $_SESSION["role"] !== "user") {
        header("Location: login.php");
        exit();
    }
}

function adminMiddlewareAuth() {
    if (!(isset($_SESSION["id"]) && $_SESSION["role"] === "admin")) {
        header("Location: ../login.php");
        exit();
    }
}

