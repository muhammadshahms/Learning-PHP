<?php 
session_destroy();
echo "<script>alert('Logout Successfully'); </script>";
echo "<script>location.href='login.php';</script>"; 
?>