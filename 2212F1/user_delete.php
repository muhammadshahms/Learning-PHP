<?php 
require "connection.php";
if (!isset($_GET["id"])) {
    echo "<script>window.location.assign('admin_table.php')</script>";
    if(!isset($_SESSION["id"])){
        echo "<script>window.location.assign('login.php')</script>";
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