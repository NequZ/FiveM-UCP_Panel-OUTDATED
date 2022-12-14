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

if (isset($_POST['btn-add'])) {
    header( "Refresh:1; url='addnewuser.php'");
}

if (isset($_POST['btn-delete'])) {
    $username = $_POST['username'];
    $sql = "DELETE FROM cp_user WHERE username = '$username'";
    $db->exec($sql);
    echo '<div class="alert alert-success">User deleted</div>';
    header( "Refresh:1; url='admin.php'");

    // Log
    $log = "User ".$_SESSION['username']." deleted user ".$username."\n";
    $logfile = fopen('log.txt', 'a');
    fwrite($logfile, $log);
    fclose($logfile);

}

echo '<div class="topnav" id="myTopnav">

    <a href="index.php"><i class="fa fa-home"></i> Home</a>
    <a href="https://github.com/NequZ"><i class="fa fa-github"></i> Contact Me</a>
    <a href="aboutus.php"><i class="fa fa-user-plus"></i> About Us</a>
    <a href="news.php"><i class="fa fa-file"></i> News</a>
</div>';
echo '<div class="border-index02">';
echo  '<title>Admin Panel</title>';
echo '<h3>Admin Panel</h3>';
echo '<h4>Show and Manage your Team</h4>';

echo '<form action="addnewuser.php" method="post">';
echo '<input type="submit" class="btn btn-blue" name="btn-add" value="Add New User">';
echo '</form>';
echo '<form action="ucp.php" method="post">';
echo '<button type="submit" class="btn btn-info" name="btn-backkk" value="Back">Back to UCP</button>';
echo '</form>';

echo '</div>';
echo '<br>';

// show table with all cp_user
$username = $_SESSION['username'];
$sql = "SELECT * FROM cp_user";
$result = $db->query($sql);
if ($result->rowCount() > 0) {
    echo '<div class="border-index02">';
    echo '<table class="table">';
    echo '<thead>';
    echo '<th>Username</th>';
    echo '<th>Rank</th>';
    echo '<th>Manage</th>';
    echo '</thead>';

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $username = $row['username'];  // here you can add new data which you want to show in the table
        $rank = $row['rank'];
        echo '<thbody>';
        echo '<tr>';
        echo '<td>' . $username . '</td>';
        echo '<br>';
        echo '<td>' . $rank . '</td>';
        // button to manage user
        echo '<td>';
        echo '<br>';
        echo '<form method="post">';
        echo '<input type="hidden" name="username" value="' . $username . '">';
        echo '<input class="btn-logout" type="submit" name="btn-delete" value="Delete">';
        echo '</form>';
        echo '</td>';
        echo '<tr>';
        echo '<thbody>';
}} else {
    echo '<div class="alert alert-danger">No Data found</div>';
}
echo '</table>';

