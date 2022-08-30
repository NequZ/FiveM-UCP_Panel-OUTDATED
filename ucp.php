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
} else if (isset($_POST['btn-mysql'])) {
    try {
        $fivem = new PDO('mysql:host=localhost;dbname=fivem', 'root', ''); // Change that to your FiveM Database String, like in the config.php
        echo '<div class="alert alert-success">MySQL is connected</div>';

        $logfile = fopen('log.txt', 'a');
        $log = date('d.m.Y H:i:s') . ' - ' . $_SESSION['username'] . ' Started a MYSQL Check. It was successful';
        fwrite($logfile, $log . PHP_EOL);
        fclose($logfile);

    } catch (PDOException $e) {
        echo '<div class="alert alert-danger">MySQL is not connected</div>';

        $logfile = fopen('log.txt', 'a');
        $log = date('d.m.Y H:i:s') . ' - ' . $_SESSION['username'] . ' Started a MYSQL Check. It failed';
        fwrite($logfile, $log . PHP_EOL);
        fclose($logfile);

    }
} else if (isset($_POST['btn-success'])) {

    header( "Refresh:1; url='main.php'");
    // log
    $logfile = fopen('log.txt', 'a');
    $log = date('d.m.Y H:i:s') . ' - ' . $_SESSION['username'] . ' opened the UCP';
    fwrite($logfile, $log . PHP_EOL);
    fclose($logfile);

}
else if (isset($_POST['btn-adminpanel'])) {

    header( "Refresh:1; url='admin.php'");

    $logfile = fopen('log.txt', 'a');
    $log = date('d.m.Y H:i:s') . ' - ' . $_SESSION['username'] . ' opened the Admin Panel';
    fwrite($logfile, $log . PHP_EOL);
    fclose($logfile);

}



?>

<html>
<head>
    <title>Panel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>UCP</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Hello <span><?php echo $_SESSION['username']; ?></span></h3>
                    <h4 class="panel-title">Your Current Rank is <b><?php echo $_SESSION['rank']; ?></b></h4>
                </div>
                <div class="panel-body">
                    <p><?php echo $paneldescription; ?></p>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form method="post">
                <input class="btn-success" type="submit" name="btn-success" value="UCP">
                <input class="btn-logout" type="submit" name="btn-logout" value="Logout">
                <?php if ($_SESSION['rank'] == 'Administrator' || $_SESSION['rank'] == 'Superadministrator') { ?> <!-- Change that to your ranks to show the Admin Panel -->
                    <input class="btn-info" type="submit" name="btn-adminpanel" value="Admin Panel">
                    <input class="btn-info" type="submit" name="btn-mysql" value="Check FiveM Database Connection">
                <?php } ?>
            </form>
        </div>
</body>


