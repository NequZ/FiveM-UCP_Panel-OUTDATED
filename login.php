<?php
include 'css/style.css';
session_start();
header( "Refresh:3; url='ucp.php'");
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<div class="loader"></div>
<br>
<div class="alert alert-info">
    <h3>Welcome <?php echo $_SESSION['username']; ?></h3>
    <p>UCP is checking your Connection. Give it a Moment.</p>
</div>