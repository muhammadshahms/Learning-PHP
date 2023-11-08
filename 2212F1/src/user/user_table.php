<?php
require "../../config/connection.php";
require "../../template/header.php";
require "../../middleware/user_auth_middleware.php";
?>
        <div class="table-responsive p-3 mt-3 d-flex ">
            <table class="table table-striped table-hover table-borderless table-primary align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">

                    <?php
                    $query = "SELECT * FROM `users` WHERE role = 'user'";
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
require "../../template/footer.php";
?>