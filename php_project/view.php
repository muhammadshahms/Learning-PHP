<?php

require 'connection.php';
if (!isset($_GET["id"])) {
    header("location:users.php");
} else {
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
     View 
        </h1>
        <form action="" method="post" enctype="multipart/form-data">
            <?php
            require 'connection.php';
            $query1 = mysqli_query($connect, "SELECT * FROM `users` where id = " . $_GET["id"] . "");
            while ($users = mysqli_fetch_array($query1)) {
            ?>
                <input type="text" name="name" id="name" value="<?php echo $users["name"]; ?>" disabled>
                <br>
                <input type="email" name="email" id="email" value="<?php echo $users["email"]; ?>" disabled>
                <br>
                <?php $imagePath = "uploads/" . $users["image"];
                if (file_exists($imagePath)) {
                    echo "<img width='100px' height='100px' src='{$imagePath}' alt='Uploaded Image'>";
                } else {
                    echo "Image not found.";
                }
                ?>
            <?php } ?>
        </form>
    </body>

    </html>
<?php
}

?>