<?php
session_start();
include 'css/style.css';
include 'config.php';

if(!isset($_SESSION['username'])) {
    echo '<div class="alert alert-danger">You are not logged in</div>';
    header( "Refresh:1; url='index.php'");
}
if (isset($_POST['btn-logout'])) {
    header( "Refresh:1; url='logout.php'");
}
if (isset($_POST['btn-back'])) {
    header( "Refresh:1; url='ucp.php'");
}

?>
<html>
<head>
    <title>UCP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="topnav" id="myTopnav">

    <a href="index.php"><i class="fa fa-home"></i> Home</a>
    <a href="https://github.com/NequZ"><i class="fa fa-github"></i> Contact Me</a>
    <a href="aboutus.php"><i class="fa fa-user-plus"></i> About Us</a>
    <a href="news.php"><i class="fa fa-file"></i> News</a>
</div>

<div class="panel-body">
    <form method="post">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="search">
            <div class="input-group-btn">
                <input class="btn btn-default" type="submit" name="searchbtn" value="Search">
            </div>
        </div>
        <br>
        <input class="btn-logout" type="submit" name="btn-logout" value="Logout">
        <input class="btn-blue" type="submit" name="btn-back" value="Back to Mainmenu">
    </form>
</div>

<?php

if (isset($_POST['searchbtn'])) {
    $search = $_POST['search'];
    $sql = "SELECT * FROM user WHERE firstname or lastname LIKE '%$search%'";
    $result = $db->query($sql);
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $firstname = $row['firstname'];  // here you can add new data which you want to show in the table
            $lastname = $row['lastname'];
            $job = $row['job'];
            $lastlogin = $row['lastlogin'];
            $ban = $row['ban'];
            $whitelist = $row['whitelist'];
            if ($ban == 1) {
                $ban = "Yes";
            } else {
                $ban = "No";
            }
            if ($whitelist == 1) {
                $whitelist = "Yes";
            } else {
                $whitelist = "No";
            }


            echo '<div class="panel-body">
            <div class="well">
                <div class="media">
                    <div class="media-body">
                        <h4 class="media-heading"><strong>Name</strong>: '.$firstname.' '.$lastname.'</h4>
                        <h4 class="media-heading"><strong>Current Job</strong>: '.$job.'</h4>
                        <h4 class="media-heading"><strong>Last Login</strong>: '.$lastlogin.'</h4>
                        <h4 class="media-heading"><strong>Ban</strong>: '.$ban.'</h4>
                        <h4 class="media-heading"><strong>Whitelist</strong>: '.$whitelist.'</h4>
                    </div>                   
                </div>
            </div>              
        </div>';
        }

        // log search
        $log = "User: ".$_SESSION['username']." searched for: ".$search;
        $logfile = fopen('log.txt', 'a');
        fwrite($logfile, $log."\n");
        fclose($logfile);

    } else {
        echo '<div class="alert alert-danger">No Result Found</div>';

        // log search
        $log = "User: ".$_SESSION['username']." searched for: ".$search;
        $logfile = fopen('log.txt', 'a');
        fwrite($logfile, $log."\n");
        fclose($logfile);

    }}



?>