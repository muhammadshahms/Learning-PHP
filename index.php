<?php 
session_start()
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="index.php" method="post">
        <label for="username">username</label>
        <input type="text" name="username" id="username">
        <label for="email">email</label>
        <input type="text" name="email" id="username">
        <label for="password">password</label>
        <input type="text" name="password" id="username">
        <button type="submit" name="login">submit</button>
    </form>
</body>
<?php
// $_POST Super global variable

// foreach ($_POST as $key => $value) {
//     echo $key . " : " . $value . "<br>";
// }

if (isset($_POST['login'])) {
      $username = $_POST["username"];
      $password = $_POST["password"];

      if (empty($username)) {
        echo "username is missing";
      }
      else {
        header("Location: home.php");
        // echo "hello $username";
      }
    }
?>

</html>