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
    <label for="username">username</label>
    <input type="text" name="username" id="username">
    <label for="password">password</label>
    <input type="text" name="password" id="username">
    <button type="submit" name="login">submit</button>
  </form>
</body>
<?php
if (isset($_POST['login'])) {
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
      if (empty($username)) {
        echo "username is missing";
      }
      else {
        $_SESSION['username'] = $username;
        header("Location: home.php");

        // echo "hello $username";
      }
    }
?>
</html>