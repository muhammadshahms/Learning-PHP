<?php 
include './connection.php';
$delete = mysqli_query($con, "DELETE FROM users WHERE id=" . $_GET['id']);
if($delete){
    echo "<script>alert('Data Deleted')</script>";
    echo "<script>window.location.href='home.php'</script>";
}
?>