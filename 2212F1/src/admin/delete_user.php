<?php 
session_start();
require "../../middleware/auth_middleware.php";
adminMiddlewareAuth();
if (!isset($_GET["id"])) {
    header("location:admin_table.php");
}else{
$query = "delete from users where id = '" .$_GET["id"]. "'";
$result = mysqli_query($con, $query);
if ($result) {
    echo "<script>alert('deleted')</script>";
    echo "<script>window.location.href='admin_table.php'</script>";
}
}
