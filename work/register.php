<?php
session_start();
include 'template/header.php';
?>
    <form method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="Enter your name">
            <small id="helpId"></small>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="" aria-describedby="emailHelpId" placeholder="Enter your email">
            <small id="emailHelpId"></small>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Email address</label>
            <input type="password" class="form-control" name="password" id="" aria-describedby="passwordHelpId" placeholder="Enter your password">
            <small id="passwordHelpId"></small>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>

<?php
include 'template/footer.php';
?>

<?php
include 'connection.php';

if (isset($_POST['submit'])) {
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($name) || empty($email) || empty($password)) {
        if (empty($name)) {
            echo "<script>document.getElementById('helpId').innerHTML='Please insert you name'</script>";
        }
        if (empty($email)) {
            echo "<script>document.getElementById('emailHelpId').innerHTML='Please insert your email'</script>";
        }
        if (empty($password)) {
            echo "<script>document.getElementById('passwordHelpId').innerHTML='Please insert your password'</script>";
        }
    } else {
        // Hash the password securely before storing it in the database

        // Check if the email already exists in the database
        $checkQuery = "SELECT email FROM users WHERE email = '".$_POST['email']."'";
        $result = mysqli_query($con, $checkQuery);

        if (mysqli_num_rows($result) > 0) {
            
            echo "<script>alert('Email already exists. Please use a different email.');</script>";
        } else {
            // Email doesn't exist, proceed with the insertion
            $query = "INSERT INTO users (name, email, password) VALUES ('".$_POST['name']."', '".$_POST['email']."', '".md5($_POST['password'])."')";
            $exec =  mysqli_query($con, $query);

            if ($exec) {
                echo "<script>alert('User Registered Successfully');</script>";
                echo "<script>window.location.href='login.php'</script>";
            } else {
                echo "<script>alert('Data Not Inserted');</script>";
            }
        }
    }
}

?>