<?php include('./connection.php');
include('../template/header.php')
?>
  <main>

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


  </main>
  <?php include('../template/footer.php') ?>
  <?php 
  include('connection.php');
  if(isset($_POST['submit'])) {
    $query = "INSERT INTO `users`(`name`, `email`, `password`) VALUES ('" . $_POST["name"] . "','" . $_POST["email"] . "','" . md5($_POST["password"]). "')";
    $result = mysqli_query($con,$query);
    if($result) {
    echo "<script>alert('Data Inserted');</script>";
    echo "<script>window.location.assign('users.php')</script>";
      
    } else {
      echo "<script>alert('Data not Inserted');</script>";

    }
}
  ?>
