<?php 
session_start();
require "connection.php";
if (!isset($_GET["id"])) {
    header("location:admin_table.php");
    if(!isset($_SESSION["id"])){
        header("location:login.php");
    }
}else{
$query = "delete from users where id = '" .$_GET["id"]. "'";
$result = mysqli_query($con, $query);
if ($result) {
    echo "<script>alert('deleted')</script>";
    echo "<script>window.location.href='admin_table.php'</script>";
}
}
?>