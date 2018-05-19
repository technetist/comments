<?php
if(!isset($_SESSION)) {
    session_start();
}
include "db.php";
include "functions.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comment App</title>
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
    <link rel="stylesheet"
          href="assets/css/custom.css">
    <script
        src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body>
<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
    <a class="navbar-brand" href="./">Comments</a>
    <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
        <li class="dropdown order-1">
            <?php if(!isset($_SESSION['username'])): ?>
            <button type="button"
                    id="dropdownMenu"
                    data-toggle="dropdown"
                    class="btn btn-outline-secondary dropdown-toggle">
                Login <span class="caret"></span></button>
            <ul class="dropdown-menu dropdown-menu-right mt-2">
                <li class="px-3 py-2">
                    <form role="form" class="form" action="includes/login.php" method="post">
                        <div class="form-group">
                            <input id="username"
                                   name="username"
                                   placeholder="username"
                                   class="form-control form-control-sm"
                                   type="text" required>
                        </div>
                        <div class="form-group">
                            <input id="password"
                                   name="password"
                                   placeholder="password"
                                   class="form-control form-control-sm"
                                   type="password" required>
                        </div>
                        <div class="form-group">
                            <button type="submit"
                                    name="login"
                                    class="btn btn-primary btn-block">Login</button>
                        </div>
                        <div class="form-group text-center">
                            <small><a href="register.php">New User?</a></small>
                        </div>
                        <div class="form-group text-center">
                            <small><a href="#"
                                      data-toggle="modal"
                                      data-target="#passwordModal">Forgot password?</a></small>
                        </div>
                    </form>
                </li>
            </ul>
            <?php else: ?>
            <form role="form" action="includes/logout.php" method="post">
                <button type="submit"
                        name="logout"
                        class="btn btn-outline-secondary">Logout</button>
            </form>
            <?php endif ?>
        </li>
    </ul>
</nav>
