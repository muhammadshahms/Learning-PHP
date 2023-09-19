<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
        <label for="age">Age</label>
        <input type="text" name="age" id="age">
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
        <input type="submit" name="submit" value="Submit">
    </form>
</body>

<?php
if (isset($_POST['submit'])) {
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $age = filter_input(INPUT_POST, "age", FILTER_VALIDATE_INT);
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);

    if (empty($username) || empty($age) || empty($email)) {
        echo "Please fill in all fields";
    } else {
        echo "Thank you";
    }
}


?>


<?php
$array =array(1,2,3,4,5);
foreach ($array as $key => $value) {
    echo $value."<br>";
}
?>
<!-- Filter Sanitize -->
<!-- https://www.php.net/manual/en/filter.filters.sanitize.php -->

</html>
