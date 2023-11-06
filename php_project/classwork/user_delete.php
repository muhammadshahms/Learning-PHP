<?php 
require "connection.php";
$query = "DELETE from `users` where id = ".$_GET["id"]."";
$run = mysqli_query($con,$query);
if($run){
    echo "<script> alert('user deleted') </script>";
    echo "<script>window.location.assign('users.php')</script>";
}
?>