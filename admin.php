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
}


echo  '<title>Admin Panel</title>';
echo '<h3>Admin Panel</h3>';
echo '<h4>Show and Manage your Team</h4>';
echo '<br>';

echo '<form action="addnewuser.php" method="post">';
echo '<input type="submit" class="btn btn-blue" name="btn-add" value="Add New User">';
echo '</form>';
echo '<form action="ucp.php" method="post">';
echo '<button type="submit" class="btn btn-info" name="btn-backkk" value="Back">Back to UCP</button>';
echo '</form>';
// show table with all cp_user
$username = $_SESSION['username'];
$sql = "SELECT * FROM cp_user";
$result = $db->query($sql);
if ($result->rowCount() > 0) {
    echo '<div class="border-index">';
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
?>

