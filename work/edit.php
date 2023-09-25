<?php
include './template/header.php';
?>

<main>
    <?php
    include './connection.php';

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];

        // Update the user's information in the database
        $query = "UPDATE users SET name='$name', email='$email' WHERE id=" . $_GET['id'];
        $result = mysqli_query($con, $query);

        if ($result) {
            // Update successful
            echo "<script>alert('User information updated.');</script>";
            header("Location: table.php");
            // Redirect to a different page or display a success message
        } else {
            // Update failed
            echo "<script>alert('Error updating user information.');</script>";
        }
    }

    // Retrieve the user's information for displaying in the form
    $getUser = mysqli_query($con, "SELECT * FROM users WHERE id=" . $_GET['id']);

    if (mysqli_num_rows($getUser) > 0) {
        $row = mysqli_fetch_assoc($getUser);
    ?>
        <form method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" value="<?php echo $row['name']; ?>">
                <small id="helpId"></small>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="" aria-describedby="emailHelpId" value="<?php echo $row['email']; ?>">
                <small id="emailHelpId"></small>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    <?php
    } else {
        echo "<p>User not found.</p>";
    }
    ?>
</main>

<?php
include './template/footer.php';
?>