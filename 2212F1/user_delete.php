<?php 
require "connection.php";
$query = "delete from users where id = '" .$_GET["id"]. "'";
$result = mysqli_query($con, $query);
echo "<script>alert('Do you want to delete')</script>";
echo "<script>window.location.href='user_table.php'</script>";
?>