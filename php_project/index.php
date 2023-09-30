<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>
        Form
    </h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="name" id="name">
        <br>
        <input type="email" name="email" id="email">
        <br>
        <input type="password" name="password" id="password">
        <br>
        <input type="file" name="file" id="file">
        <br>
        <button type="submit" name="btn_saved">Save</button>
    </form>
</body>
</html>

<?php
include('connection.php');
if (isset($_POST["btn_saved"])) {
    $query = mysqli_query($connect, "INSERT INTO `users`( `name`, `email`, `password`) VALUES ('" . $_POST["name"] . "','" . $_POST["email"] . "','" . md5($_POST["password"]) . "')");
    if ($query) {
        // move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/" . $_FILES["file"]["name"]);
        echo "<script>alert('user saved')</script>";
        header("location:login.php");
    } else {
        echo "<script>alert('user not saved')</script>";
    }
}
?>
<!-- 

$originalFilename = $_FILES["file"]["name"];
$extension = pathinfo($originalFilename, PATHINFO_EXTENSION); // Get the file extension

// Generate a unique filename using the current date and time
$newFilename = date("YmdHis") . "." . $extension;

$destinationPath = "uploads/" . $newFilename;
move_uploaded_file($_FILES["file"]["tmp_name"], $destinationPath); -->