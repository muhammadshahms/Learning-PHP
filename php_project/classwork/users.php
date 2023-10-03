<?php
include '../template/header.php';
include 'connection.php';
?>

<div class="table-responsive">

    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">Name </th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM `users`";
            $result = mysqli_query($con, $query);
            while ($users = mysqli_fetch_array($result)) {
            ?>
                <td><?php echo $users["name"]; ?></td>
                <td><?php echo $users["email"]; ?></td>
                <td><a href="user_edit.php?id=<?php echo $users["id"]; ?>" class="btn btn-warning">Edit</a>
                    <a href="" class="btn btn-danger">Delete</a>
                </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php
include '../template/footer.php';

?>