<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1><?php echo $_SESSION["name"]; ?></h1>
    <h1>
        Form
    </h1>
    <form action="" method="post">
        <input type="text" name="name" id="name">
        <br>
        <input type="email" name="email" id="email">
        <br>
        <input type="password" name="password" id="password">
        <br>
        <button type="submit" name="btn_saved">Save</button>
    </form>
</body>
</html>

<?php
require 'connection.php';
if (isset($_POST["btn_saved"])) {
    $query = mysqli_query($connect, "INSERT INTO `users`( `name`, `email`, `password`) VALUES ('" . $_POST["name"] . "','" . $_POST["email"] . "','" . md5($_POST["password"]) . "')");
    if ($query) {
        echo "<script>alert('user saved')</script>";
    } else {
        echo "<script>alert('user not saved')</script>";
    }
}
?>