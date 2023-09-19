<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="./checkBox.php" method="POST">
        pizza
        <input type="checkbox" name="foods[]" value="pizza">
        cheese
        <input type="checkbox" name="foods[]" value="cheese">
        hot dog
        <input type="checkbox" name="foods[]" value="hotdog">

        <input type="submit" value="submit" name="submit">
    </form>
</body>

<?php
if (isset($_POST['submit'])) {
    $selectedFoods = $_POST["foods"];
    if (in_array("pizza", $selectedFoods) && in_array("cheese", $selectedFoods)) {
        foreach ($selectedFoods as $food) {
            echo "Selected food: " . $food . "<br>";
        }
    } else {
        echo "Invalid input";
    }
} else {
    echo "No data";
}
?>


</html>