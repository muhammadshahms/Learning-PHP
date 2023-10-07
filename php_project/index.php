<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
include('connection.php');
if (isset($_POST["btn_saved"])) {
    $originalFilename = $_FILES["file"]["name"];
        $extension = pathinfo($originalFilename, PATHINFO_EXTENSION); // Get the file extension
        
        // Generate a unique filename using the current date and time
        $newFilename = date("YmdHis") . "." . $extension;
    $query = mysqli_query($connect, "INSERT INTO `users`( `name`, `email`, `password`, `image`, `created_at`) VALUES ('" . $_POST["name"] . "','" . $_POST["email"] . "','" . md5($_POST["password"]) . "','" . $newFilename . "',now())");
    if ($query) {
        print_r($newFilename);
        $destinationPath = "uploads/" . $newFilename;
        move_uploaded_file($_FILES["file"]["tmp_name"], $destinationPath);
        echo "<script>alert('user saved')</script>";
        echo "<script>window.location.assign('users.php')</script>";
        
        // header("location:login.php");
    } else {
        echo "<script>alert('user not saved')</script>";
    }
}
?>
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
        <?php //echo "<img src='$destinationPath' alt='Uploaded Image'>"; ?>
        <br>
        <button type="submit" name="btn_saved">Save</button>
    </form>
</body>
</html>


<!-- 

$originalFilename = $_FILES["file"]["name"];
$extension = pathinfo($originalFilename, PATHINFO_EXTENSION); // Get the file extension

// Generate a unique filename using the current date and time
$newFilename = date("YmdHis") . "." . $extension;

$destinationPath = "uploads/" . $newFilename;
move_uploaded_file($_FILES["file"]["tmp_name"], $destinationPath); -->