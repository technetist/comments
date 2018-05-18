<?php
$server = "localhost";
$user = "root";
$password = "";
$db = "app_test";

$connection = mysqli_connect($server, $user, $password, $db);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
