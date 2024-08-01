<?php
$host = "localhost";
$user = "root";  // Replace with your MySQL username
$password = "";           // Leave this empty if you don't want to use a password
$db_name = "deal_flow_dashboard";

$conn = mysqli_connect($host, $user, $password, $db_name);

if(mysqli_connect_errno()) {
    die("Failed to connect with MySQL: " . mysqli_connect_error());
}
?>