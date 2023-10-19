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
        <?php 
        require 'connection.php';
        $query1 = mysqli_query($connect,"SELECT * FROM `users` where id = ".$_GET["id"]."");
        while($users = mysqli_fetch_array($query1)){
        ?>
        <input type="text" name="name" id="name" value="<?php echo $users["name"]; ?>">
        <br>
        <input type="email" name="email" id="email" value="<?php echo $users["email"]; ?>">
        <br>
        <input type="file" name="file" id="file" value="<?php echo $users["image"]; ?>">
        <?php echo "<img width='100px' height='100px' src='uploads/{$users["image"]}' alt='Uploaded Image'>"; ?>

        <?php } ?>
        <button type="submit" name="btn_saved">Save</button>
    </form>
</body>
</html>

<?php
require 'connection.php';
if (isset($_POST["btn_saved"])) {
    $query = mysqli_query($connect, "UPDATE `users` SET `name` = '" . $_POST["name"] . "', `email` = '" . $_POST["email"] . "' , `image` = '" . $_POST["image"] . "' WHERE id = " . $_GET["id"] . "");
    if ($query) {
        echo "<script>alert('user updated')</script>";
        echo "<script>window.location.assign('users.php')</script>";
    } else {
        echo "<script>alert('user not updated')</script>";
    }
}
?>