<?php
session_start();
function userMiddlewareAuth() {
    if (!(isset($_SESSION["id"]) || $_SESSION["role"] === "user")) {
        header("Location: login.php");
        exit();
    }
}

function adminMiddlewareAuth() {
    if (!(isset($_SESSION["id"]) || $_SESSION["role"] === "admin")) {
        header("Location: ../login.php");
        exit();
    }
}

