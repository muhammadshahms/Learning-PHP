<?php
error_reporting(E_ALL);  // Report all types of errors
ini_set('display_errors', 1);  // Display errors on the web page
include 'connection.php';
session_start();
?>


<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>

    <main>
        <form method="POST">
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="" aria-describedby="emailHelpId" placeholder="abc@mail.com">
                <small id="emailHelpId" class="form-text text-muted"></small>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="" placeholder="">
            </div>
            <button type="submit" class="btn btn-dark" name="submit">Submit</button>
        </form>
    </main>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
<?php
if (isset($_POST['submit'])) {

    $login_query = "SELECT * FROM users WHERE email = '" . $_POST['email'] . "' AND password = '" . md5($_POST['password']) . "'";
    $login_result = mysqli_query($con, $login_query);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    
    if ($login_result) {
        if (mysqli_num_rows($login_result) > 0) {
            $row = mysqli_fetch_array($login_result);
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            echo "<script>alert('Login Successful');</script>";
            // Redirect to the home page or another location
            // echo "<script>window.location.href='home.php'</script>";
        } else {
            echo "<script>alert('Login Failed. User not found');</script>";
            echo "Email: " . $email . "<br>";
    echo "Hashed Password: " . md5($password) . "<br>"; 

        }
    } else {
        echo "<script>alert('Query failed: " . mysqli_error($con) . "');</script>";
    }
}

?>