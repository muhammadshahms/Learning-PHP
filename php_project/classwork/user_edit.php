<?php
include "connection.php";
include "../template/header.php";
?> 


<form method="post">
    <div class="mb-3">

          <label for="" class="form-label">name</label>
          <input type="text" class="form-control" name="name" id="" aria-describedby="nameHelpId" placeholder="Enter your name">
          <small id="nameHelpId" class="form-text text-muted">Help text</small>
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Email</label>
          <input type="email" class="form-control" name="email" id="" aria-describedby="emailHelpId" placeholder="abc@mail.com">
          <small id="emailHelpId" class="form-text text-muted">Help text</small>
        </div>

        <div class="mb-3">
          <label for="" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" id="" placeholder="">
        </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>


<?php 
include "../template/footer.php";
if(isset($_POST["submit"])) {
    $update_user="UPDATE `users` SET `name` = '" . $_POST["name"] . "', `email` = '" . $_POST["email"] . "' WHERE id = " . $_GET["id"] . "";
    $query = mysqli_query($con, $update_user);
    if($query){
        echo "<script>alert('user updated')</script>";
    }
}

?>