<?php session_start();
include "db.php";

if(isset($_POST['logout'])) {
    $_SESSION['user_id'] = null;
    $_SESSION['username'] = null;
    $_SESSION['firstname'] = null;
    $_SESSION['lastname'] = null;
    $_SESSION['role'] = null;
    session_destroy();
    header("Location: ../index.php");
}
?>