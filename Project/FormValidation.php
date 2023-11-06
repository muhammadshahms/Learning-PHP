<form action="" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
        <label for="age">Age</label>
        <input type="text" name="age" id="age">
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
        <input type="SUBMIT" name="submit" value="Submit">
    </form>
</body>

<?php

print_r($_POST);
// echo $_POST['username'];
// echo $_POST['age'];
// echo $_POST['email'];
