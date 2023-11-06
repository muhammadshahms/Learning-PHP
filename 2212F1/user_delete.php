<?php 
require "connection.php";
if (!isset($_GET["id"])) {
    echo "<script>window.location.assign('user_login.php')</script>";
}else{
$query = "delete from users where id = '" .$_GET["id"]. "'";
$result = mysqli_query($con, $query);
if ($result) {
    echo "<script>alert('deleted')</script>";
    echo "<script>window.location.href='user_table.php'</script>";
}
}
?>