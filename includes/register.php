<?php
if(!isset($_SESSION)) {
    session_start();
}
include 'db.php';
include 'functions.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (!empty($username) && !empty($password)) {
        $sanitized_username = escape($username);
        $sanitized_password = escape($password);
        $email = escape($_POST['email']) ?? null;
        $password = password_hash($sanitized_password, PASSWORD_BCRYPT, array('cost' => 12));
        $message = "<h4 class='text-center bg-success'>Your registration has been submitted</h4>";
        $query = "INSERT INTO users (username, password, email) ";
        $query .= "VALUES('{$sanitized_username}', '{$password}', '{$email}')";
        $register_user_query = mysqli_query($connection, $query);
        if (!$register_user_query) {
            die("Query Failed " . mysqli_error($connection) . ' ' . mysqli_errno($connection) . ' ' . $query);
        } else {
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
            $_SESSION['user_id'] = $db_user_id;
            $_SESSION['username'] = $db_username;
            session_write_close();
            header("Location: ../index.php");
            exit();
        }
    } else {
        $_SESSION['message'] = "<h4 class='text-center bg-warning'>Fields must not be left empty</h4>";
        header("Location: ../register.php");
    }

} else {
    $_SESSION['message'] = "<h4 class='text-center bg-danger'>Something went wrong with the submission...</h4>";
    header("Location: ../register.php");
}
