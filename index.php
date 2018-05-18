<?php
include 'includes/header.php';
?>

<?php if(isset($_SESSION['message'])){ echo "<div class='row'><div class='col-sm-12'>". $_SESSION['message'] ."</div></div>"; }
unset($_SESSION['message']); ?>
<h1>Comments</h1>

<?php
include 'includes/footer.php';
