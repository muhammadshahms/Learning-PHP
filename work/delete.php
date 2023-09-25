<?php 
include './connection.php';
$delete = mysqli_query($con, "DELETE FROM users WHERE id=" . $_GET['id']);
header("Location: table.php");
?>