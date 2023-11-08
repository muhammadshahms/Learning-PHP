<?php
require "../../config/connection.php";
require "../../template/header.php";
require "../../middleware/auth_middleware.php";
userMiddlewareAuth();
if (!isset($_GET["id"])) {
    header("location:user_table.php");
} else {
?>

    <form method="POST">
        <div class="container">
            <?php
            $select_query = "SELECT * FROM `users` WHERE id='" . $_GET["id"] . "'";
            $select_result = mysqli_query($con, $select_query);
            while ($row = mysqli_fetch_array($select_result)) {
            ?>
                <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="" value="<?php echo $row["name"]; ?>" aria-describedby="nameHelpId" placeholder="Enter your name" required>
                    <small id="emailHelpId" class="form-text text-muted"></small>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="" value="<?php echo $row["email"]; ?>" aria-describedby="emailHelpId" placeholder="abc@mail.com" required>
                    <small id="emailHelpId" class="form-text text-muted"></small>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </div>
    <?php
            }
    ?>

    </form>

<?php
}
?>

<?php

require "../../template/footer.php";
if (isset($_POST["submit"])) {
    $edit_query = "UPDATE `users` SET `name`='" . $_POST["name"] . "',`email`='" . $_POST["email"] . "' WHERE id='" . $_GET["id"] . "'";
    $result = mysqli_query($con, $edit_query);
    if ($result) {
        echo "<script>alert('updated')</script>";
        echo "<script>window.location.href='user_table.php'</script>";
    }
}

?>