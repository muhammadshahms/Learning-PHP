<?php
session_start();
require "connection.php";
require "./templates/header.php";
if (!isset($_SESSION["id"]) && $_SESSION["role"] != "admin") {
    echo "<script>window.location.assign('login.php')</script>";
} else {
?>
<div class="p-3 d-flex flex-column mb-1 justify-content-center align-items-start">
<a href="create_user.php?id=<?php echo $_SESSION["id"]; ?>" class="btn btn-success">create</a>
</div>
    <div class="table-responsive p-3 mt-3 d-flex ">
    
        <table class="table table-striped table-hover table-borderless table-primary align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
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
                        <td><?php echo $user["role"]; ?></td>
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
