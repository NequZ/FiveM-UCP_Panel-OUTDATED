<?php
session_start();
include 'css/style.css';
include 'config.php';

if(!isset($_SESSION['username'])) {
    echo '<div class="alert alert-danger">You are not logged in</div>';
    header( "Refresh:1; url='index.php'");
}
// if rank is not admin or superadministrator redirect to ucp.php
if ($_SESSION['rank'] != 'Administrator' && $_SESSION['rank'] != 'Superadministrator') {
    echo '<div class="alert-danger">You are not allowed to access this page</div>';
    header( "Refresh:1; url='ucp.php'");

    // Log
    $logfile = fopen('log.txt', 'a');
    $log = date('d.m.Y H:i:s') . ' - ' . $_SESSION['username'] . ' tried to access the admin panel';
    fwrite($logfile, $log . PHP_EOL);
    fclose($logfile);

}
?>

<html>
<head>
    <title>News</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div class="topnav" id="myTopnav">

    <a href="index.php"><i class="fa fa-home"></i> Home</a>
    <a href="https://github.com/NequZ"><i class="fa fa-github"></i> Contact Me</a>
    <a href="aboutus.php"><i class="fa fa-user-plus"></i> About Us</a>
    <a href="news.php"><i class="fa fa-file"></i> News</a>
</div>

<?php
$sql = "SELECT * FROM cp_news ORDER BY id DESC LIMIT 5"; // Change "LIMIT 1 to any number you want to show
$result = $db->query($sql);
if ($result->rowCount() > 0) {
    while ($row = $result->fetch()) {

        echo '<div class="news_main">
                <br>
                <div class="panel-heading">' . $row['news'] . '</div>
                <div class="panel-footer">Your '. $row['author'] .'</div>
              </div>';
    }
}
?>