<?php 
session_start(); // Start the session

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

echo "<script>alert('Logout Successfully'); </script>";
echo "<script>location.href='login.php';</script>"; 
?>
