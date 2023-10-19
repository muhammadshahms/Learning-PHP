<?php 
require 'connection.php';
if(!isset($_GET["id"])) {
    header("location:users.php");
}
else {
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
    <h1>
        Form
    </h1>
    <form action="" method="post" enctype="multipart/form-data">
        <?php
        require 'connection.php';
        $query1 = mysqli_query($connect, "SELECT * FROM `users` where id = " . $_GET["id"] . "");
        while ($users = mysqli_fetch_array($query1)) {
        ?>
            <input type="text" name="name" id="name" value="<?php echo $users["name"]; ?>">
            <br>
            <input type="email" name="email" id="email" value="<?php echo $users["email"]; ?>">
            <br>
            <input type="file" name="file" id="file" value="<?php echo $users["image"]; ?>">
            <?php $imagePath = "uploads/" . $users["image"];
            if (file_exists($imagePath)) {
                echo "<img width='100px' height='100px' src='{$imagePath}' alt='Uploaded Image'>";
            } else {
                echo "Image not found.";
            }
            ?>
        <?php } ?>
        <button type="submit" name="btn_saved">Save</button>
    </form>
</body>

</html>

<?php
}
if (isset($_POST["btn_saved"])) {
    $originalFilename = $_FILES["file"]["name"];
    $extension = pathinfo($originalFilename, PATHINFO_EXTENSION); // Get the file extension
    // Generate a unique filename using the current date and time
    $newFilename = date("YmdHis") . "." . $extension;

    $query = mysqli_query($connect, "UPDATE `users` SET `name` = '" . $_POST["name"] . "', `email` = '" . $_POST["email"] . "' , `image` = '" . $newFilename . "' WHERE id = " . $_GET["id"] . "");
    $destinationPath = "uploads/" . $newFilename;


    move_uploaded_file($_FILES["file"]["tmp_name"], $destinationPath);




    if ($query) {
        echo "<script>alert('user updated')</script>";
        echo "<script>window.location.assign('users.php')</script>";
    } else {
        echo "<script>alert('user not updated')</script>";
    }
}
?>