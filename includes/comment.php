<?php
session_start();
include 'db.php';
include 'functions.php';

if (isset($_POST['add_comment'])) {
    $comment_author = escape($_SESSION['user_id']);
    $comment_content= escape($_POST['comment_content']);
    $query = "INSERT INTO comments (user_id, comment, created_at) ";
    $query .= "VALUES({$comment_author}, '{$comment_content}', now()) ";

    $add_comment_query = mysqli_query($connection, $query);
    if (!$add_comment_query) {
        die("QUERY Failed". mysqli_error($connection));
    }
    $_SESSION['message'] = "<h4 class='text-center text-white bg-success'>Comment Posted!</h4>";
    header("Location: ../index.php");
} else {
    echo "Something happened";

    die("QUERY Failed". mysqli_error($connection));
}