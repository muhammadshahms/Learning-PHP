<?php
include './template/header.php';
session_start();
if (!isset($_SESSION['id'])) {
    echo "<script>window.location.href='login.php'</script>";
} else {
?>
    <main>
        <table class="table">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            <tbody>
                <?php
                include './connection.php';
                $get = mysqli_query($con, "SELECT * FROM users");
                while ($row = mysqli_fetch_assoc($get)) {
                ?>

                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                            <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                        </td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
    </main>

<?php
}
include './template/footer.php';
?>