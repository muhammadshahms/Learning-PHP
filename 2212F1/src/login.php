<?php
require '../config/connection.php';
include '../template/bootstrap/cdn.php';
session_start();
if (isset($_POST["btn_login"])) {
            $query = "SELECT * FROM users WHERE email = '" . $_POST["email"] . "' AND password = '" . md5($_POST["password"]) . "'";
            $result = mysqli_query($con, $query);
            if (mysqli_num_rows($result) > 0) {
                if ($session = mysqli_fetch_array($result)) {
                    $_SESSION["email"] = $session["email"];
                    $_SESSION["id"] = $session["id"];
                    $_SESSION["name"] = $session["name"];
                    $_SESSION["role"] = $session["role"];
                    if ($_SESSION["role"] == "admin") {
                        header("Location: admin/admin_table.php");
                        exit();
                    }
                    else {
                        header("Location: user/user_table.php");
                    }
                    exit();
                }
            } else {
                header("Location: login.php?error=Invalid login credentials");
                exit();
            }
        }
?>
<div class="container d-flex flex-column justify-content-center align-items-center" style="min-height: 100vh">
    <h1 class="display-3">Login</h1>
    <form class="border shadow p-3 rounded" method="post" style="width: 450px;">
        <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_GET['error']; ?>
            </div>
        <?php } ?>
        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input type="text" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="Enter your email">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="" aria-describedby="helpId" placeholder="Enter your Password">
        </div>
        <input class="btn btn-success" type="submit" value="Login" name="btn_login">
        <a href="register.php" class="d-flex flex-row justify-content-end text-decoration-none text-primary ">register now</a>
    </form>
</div>