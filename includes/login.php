<?php
session_start();
include 'db.php';
include 'functions.php';

if (isset($_POST['login'])) {
    $username=$_POST['username'];
    $password=$_POST['password'];
    $sanitized_username = escape($username);
    $sanitized_password = escape($password);
    $query = "SELECT * FROM users WHERE username = '{$sanitized_username}'";

    $select_user_query = mysqli_query($connection, $query);
    if (!$select_user_query) {
        die("QUERY Failed". mysqli_error($connection));
    }
    while ($row = mysqli_fetch_array($select_user_query)) {
        $db_user_id = escape($row['id']);
        $db_username = escape($row['username']);
        $db_user_password = escape($row['password']);
    }
    if (isset($db_user_password) && password_verify($sanitized_password, $db_user_password)) {
        $_SESSION['user_id'] = $db_user_id;
        $_SESSION['username'] = $db_username;
        session_write_close();
        header("Location: ../index.php");
        exit();
    }
    else {
        $_SESSION['message'] = "<h4 class='text-center bg-warning'>Login Failed</h4>";
        header("Location: ../index.php");
    }
}