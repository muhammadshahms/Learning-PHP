<?php
require "connection.php";
require "./templates/header.php";
if (!isset($_GET["id"])) {
    echo "<script>window.location.assign('user_table.php')</script>";
} else {
?>

    <form>
        <div class="container">
            <?php
            $select_query = "SELECT * FROM `users` WHERE id='" . $_GET["id"] . "'";
            $select_result = mysqli_query($con, $select_query);
            while ($row = mysqli_fetch_array($select_result)) {
            ?>
                <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="" value="<?php echo $row["name"]; ?>" aria-describedby="nameHelpId" placeholder="Enter your name" disabled>
                    <small id="emailHelpId" class="form-text text-muted"></small>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="" value="<?php echo $row["email"]; ?>" aria-describedby="emailHelpId" placeholder="abc@mail.com" disabled>
                    <small id="emailHelpId" class="form-text text-muted"></small>
                </div>
        </div>
    <?php
            }
    ?>

    </form>

<?php
}
?>
