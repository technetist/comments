<?php
session_start();
include 'db.php';
include 'functions.php';

if(isset($_POST['delete_comment'])) {
    $comment_id = $_POST['comment_id'];

    $query = "UPDATE comments SET deleted_at = now() WHERE id = {$comment_id}";
    $delete_comment_query = mysqli_query($connection, $query);
    if ($delete_comment_query) {
        $_SESSION['message'] = "<h4 class='text-center text-white bg-success'>Comment Deleted</h4>";
        header("Location: ../index.php");
    } else {
        die("QUERY Failed". mysqli_error($connection));
    }
}