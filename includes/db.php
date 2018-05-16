<?php
$server = "localhost";
$user = "root";
$password = "";

$conn = mysqli_connect($server, $user, $password);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";