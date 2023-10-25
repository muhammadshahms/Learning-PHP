<?php
require "connection.php";
require "./templates/header.php";

?>


<form method="POST">
    <div class="container">
        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="" aria-describedby="nameHelpId" placeholder="Enter your name" required>
            <small id="emailHelpId" class="form-text text-muted"></small>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="" aria-describedby="emailHelpId" placeholder="abc@mail.com" required>
            <small id="emailHelpId" class="form-text text-muted"></small>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="" aria-describedby="passwordHelpId" placeholder="Create your Password" required>
            <small id="emailHelpId" class="form-text text-muted"></small>
        </div>

        <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
    </div>

</form>


<?php
require "./templates/footer.php";
if(isset($_POST["submit"])){
    $query = "INSERT INTO `users`(`name`, `email`, `password`) VALUES ('". $_POST["name"] ."','". $_POST["email"] ."','". md5($_POST["password"]) ."')";
    $result = mysqli_query($con, $query);
    if($result){
        echo "inserted";
    }
    else{
        echo "not inserted";
    }
}

?>