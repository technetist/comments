<?php
session_start();
if(!isset($_SESSION['username'])):
include 'includes/header.php';
?>

<div class="container">
    <?php if(isset($_SESSION['message'])){ echo "<div class='row'><div class='col-sm-12'>". $_SESSION['message'] ."</div></div>"; }
    unset($_SESSION['message']); ?>
    <div class="row">
        <div class="col-sm-12 my-5">
            <form role="form" action="includes/register.php"  method="post">
                <div class="form-group">
                    <label for="email" class="required-field">Username</label>
                    <input type="text"
                           class="form-control"
                           name="username"
                           placeholder="username">
                </div>
                <div class="form-group">
                    <label for="password" class="required-field">Password</label>
                    <input type="password"
                           class="form-control"
                           name="password"
                           placeholder="password">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email"
                           class="form-control"
                           id="email"
                           name="email"
                           aria-describedby="emailInfo"
                           placeholder="john@example.com">
                    <small id="emailInfo"
                           class="form-text text-muted">
                        We'll only use your email to send you notifications and reset your password.
                    </small>
                </div>
                <button type="submit"
                        class="btn btn-primary"
                        name="submit">
                    Submit
                </button>
            </form>
        </div>
    </div>
</div>

<?php
include 'includes/footer.php';
else:
    header("Location: ./index.php");
endif;
?>
