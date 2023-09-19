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
    <form action="./home.php" method="post">
        <label for="username">username</label>
        <input type="text" name="username">
        <label for="password">Password</label>
        <input type="password" name="password">
        <input type="submit" name="submit" value="login" id="formSubmit">
    </form>
</body>

<?php
if (isset($_POST["submit"])) {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $_SESSION["username"] = $_POST["username"];
        $_SESSION["password"] = $_POST["password"];
        echo $_SESSION["username"] . "<br>";
        echo $_SESSION["password"] . "<br>";
    }
    else {
        echo "not set";
    }   
}

?>

<!-- <script>
document.getElementById("formSubmit").addEventListener("click", function(event){
  event.preventDefault()
});
</script> -->


</html>