<?php
session_start();
require "connection.php";
require "./templates/header.php";
if (!isset($_SESSION["id"])) {
    echo "<script>window.location.assign('user_login.php')</script>";
} else {
?>

    <a href="user_insert.php" class="btn btn-success">create</a>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-borderless table-primary align-middle">
            <thead class="table-light">
                <tr>
                    <th>Serial No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">

                <?php
                $query = "SELECT * FROM `users`";
                $result = mysqli_query($con, $query);
                $serialNo = 1;

                while ($user = mysqli_fetch_array($result)) {
                ?>
                    <tr class="table-primary">
                        <td><?php echo $serialNo; ?></td>
                        <td><?php echo $user["name"]; ?></td>
                        <td><?php echo $user["email"]; ?></td>
                        <td>
                            <a href="user_view.php?id=<?php echo $user["id"]; ?>" class="btn btn-info">View</a>
                            <a href="user_edit.php?id=<?php echo $user["id"]; ?>" class="btn btn-warning">Edit</a>
                            <a href="user_delete.php?id=<?php echo $user["id"]; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php
                    $serialNo++;
                }
                ?>
            </tbody>
            <tfoot>
            </tfoot>
        </table>
    </div>

    <?php
}
    require "./templates/footer.php";
    ?>
