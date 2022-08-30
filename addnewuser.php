<?php
session_start();
include 'css/style.css';
include 'config.php';
if(!isset($_SESSION['username'])) {
    echo '<div class="alert alert-danger">You are not logged in</div>';
    header( "Refresh:1; url='index.php'");
}

if ($_SESSION['rank'] != 'Administrator' && $_SESSION['rank'] != 'Superadministrator') {
    echo '<div class="alert-danger">You are not allowed to access this page</div>';
    header( "Refresh:1; url='ucp.php'");
}