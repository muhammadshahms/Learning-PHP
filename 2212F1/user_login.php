<?php
require 'connection.php';
include './templates/Bootstrap/cdn.php';
session_start();
?>
<div 
    class="container d-flex justify-content-center align-items-center" 
    style="min-height: 100vh">
    <form class="border shadow p-3 rounded" method="post" style="width: 450px;">
        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input type="text" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="Enter your email">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="" aria-describedby="helpId" placeholder="Enter your Password">
        </div>
        <input class="btn btn-success" type="submit" value="Login" name="btn_login">
    </form>
</div>
<?php

if (isset($_POST["btn_login"])) {
    $query = "select * from users where email = '" . $_POST["email"] . "' and password = '" . md5($_POST["password"]) . "'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        if ($q = mysqli_fetch_array($result)) {
            // $_SESSION["email"] = $q["email"];
            $_SESSION["id"] = $q["id"];
            // $_SESSION["name"] = $q["name"];   
            echo "<script>window.location.assign('user_table.php')</script>";
        }
    } else {
        echo "<script>alert('Login Failed')</script>";
    }
}

?>