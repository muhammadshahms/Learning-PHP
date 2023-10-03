<?php
session_start();
if (isset($_SESSION['username'])) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post">
        <button type="submit" name="logout">Logout</button>
    </form>
</body>
<?php
<<<<<<< HEAD
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: form.php");
}
?>
</html>
<?php
} else {
    header("Location: form.php");
}
=======
session_start();
$username=$_SESSION["username"];
$email = $_SESSION["email"];
echo $email;    

>>>>>>> 7daab18a58e6c7db9fce0fd6c23721561d0b0c0f
?>
