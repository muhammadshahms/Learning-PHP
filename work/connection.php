<?php

$domain="localhost";
$dbusername="root";
$dbpassword="";
$dbname="ecom_store";

$con = mysqli_connect($domain,$dbusername,$dbpassword,$dbname) or die("Connection failed: " . mysqli_connect_error());

?>