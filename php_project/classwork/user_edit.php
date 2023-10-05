<?php
include "connection.php";
include "../template/header.php";
?> 

<?php
$query = "SELECT * FROM `users` where id = " . $_GET["id"] . "";
$result = mysqli_query($con,$query);
while ($a = mysqli_fetch_array($result)) {
?>
  <form method="post">
    <div class="mb-3">

          <label for="" class="form-label">name</label>
          <input type="text" class="form-control" name="name" id="" aria-describedby="nameHelpId" placeholder="Enter your name" value="<?php echo $a["name"]?>">
          <small id="nameHelpId" class="form-text text-muted">Help text</small>
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Email</label>
          <input type="email" class="form-control" name="email" id="" aria-describedby="emailHelpId" placeholder="abc@mail.com" value="<?php echo $a["email"]?>">
          <small id="emailHelpId" class="form-text text-muted">Help text</small>
        </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
<?php }?>
<?php 
include "../template/footer.php";
if(isset($_POST["submit"])) {
    $update_user="UPDATE `users` SET `name` = '" . $_POST["name"] . "', `email` = '" . $_POST["email"] . "', `updated_at` = '" .date("Y-m-d H:i:s"). "' WHERE id = " . $_GET["id"] . "";
    $query = mysqli_query($con, $update_user);
    if($query){
        echo "<script>alert('user updated')</script>";
        echo "<script>window.location.assign('users.php')</script>";
    }
}

?>