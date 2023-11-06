<?php
require "connection.php";
include './templates/header.php';
session_start();
if (isset($_SESSION["id"]) && $_SESSION["role"] === "admin") {
    if (!isset($_GET["id"])) {
        echo "<script>window.location.assign('admin_table.php')</script>";
    } else {
?>
        <div class="container d-flex flex-column mb-1">
            <h1 class="display-3">create user</h1>
            <form method="POST" class="border shadow p-3 rounded">
                <div class="container">
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="" aria-describedby="nameHelpId" placeholder="Enter your name" required>

                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="" aria-describedby="emailHelpId" placeholder="abc@mail.com" required>

                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="" aria-describedby="passwordHelpId" placeholder="Create your Password" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Select your role</label>
                        <select class="form-select form-select-lg" name="role" id="role" aria-label="Small select example">
                            <option value="user" selected>user</option>
                            <!-- <option value="admin">admin</option> -->
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>

            </form>
        </div>
    <?php
    }
} else {
    header("location:login.php");
    ?>


<?php
    include './templates/footer.php';
}
if (isset($_POST["submit"])) {
    $query = "INSERT INTO `users`(`role`,`name`, `email`, `password`) VALUES ('" . $_POST["role"] . "','" . $_POST["name"] . "','" . $_POST["email"] . "','" . md5($_POST["password"]) . "')";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo "<script>alert('inserted')</script>";
        echo "<script>window.location.href='admin_table.php'</script>";
    } else {
        echo "not inserted";
    }
}

?>