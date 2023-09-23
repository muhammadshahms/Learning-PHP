<?php
$connect = mysqli_connect('localhost','root','','organi');
$q = mysqli_query($connect,"SELECT * FROM `dt_users`");
$row = mysqli_fetch_array($q);
echo $row["name"] ." ". $row["email"]." ". $row["password"];
?>