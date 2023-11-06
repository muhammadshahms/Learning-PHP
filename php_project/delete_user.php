<?php

require "connection.php";


$query = mysqli_query($connect,"DELETE FROM `users` WHERE id = ".$_GET["id"]."");
if($query){
    echo "<script>alert('user deleted')</script>";
    echo "<script>window.location.assign('users.php')</script>";
}
else{
    echo "<script>alert('user not deleted')</script>";
}