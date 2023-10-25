<?php 
require "connection.php";
require "./templates/header.php";
?>

<div class="table-responsive">
    <table class="table table-striped
    table-hover	
    table-borderless
    table-primary
    align-middle">
        <thead class="table-light">

            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">

<?php 
$query = "SELECT * FROM `users`";
$result = mysqli_query($con, $query);
while($user=mysqli_fetch_array($result)){
?>
                <tr class="table-primary" >
                    <td><?php echo $user["name"]; ?></td>
                    <td><?php echo $user["email"]; ?></td>
                    <td>
                <a href="" class="btn btn-warning">Edit</a>
                <a href="" class="btn btn-danger">Delete</a>   
                </td>
                </tr>

<?php
}
?>
            </tbody>
            <tfoot> 
            </tfoot>
    </table>
</div>






<?php 
require "./templates/footer.php";
?>