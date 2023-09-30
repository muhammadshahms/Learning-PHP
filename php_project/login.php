<?php 
session_start();
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

    <label for="email">email</label>
    <input type="email" name="email">
    <label for="password">password</label>
    <input type="password" name="password">
    <input type="submit" value="login" name="btn_saved">

</form> 
    
</body>
<?php 
require 'connection.php';
if (isset($_POST["btn_saved"])) {
    $query = mysqli_query($connect, "select * from users where email = '" . $_POST["email"] . "' and password = '" . md5($_POST["password"]) . "'");
    if (mysqli_num_rows($query) > 0) {
        if($q=mysqli_fetch_array($query)){
        $_SESSION["email"] = $q["email"];
        $_SESSION["id"] = $q["id"];
        $_SESSION["name"] = $q["name"];
        
        echo "<script>alert('user found')</script>";
        echo "<script>window.location.assign('users.php')</script>";
        }
    }
}

?>
</html>