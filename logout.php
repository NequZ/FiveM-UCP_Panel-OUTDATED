<?php
include 'css/style.css';
session_start();
session_destroy();
header( "Refresh:3; url='index.php'");
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<div class="loader"></div>
<div class="alert alert-info">
    <p>Logout in Progress.</p>
</div>