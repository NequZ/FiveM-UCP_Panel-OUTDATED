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

//if create button is pressed add new user to database and redirect to admin.php
if (isset($_POST['btn-createnewuser'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $rank = $_POST['rank'];
    // check if username already exists
    $sql = "SELECT * FROM cp_user WHERE username = '$username'";
    $result = $db->query($sql);

if ($rank != 'Administrator' && $rank != 'Superadministrator' && $rank != 'Support') {
    echo '<div class="alert alert-danger">That Rank is invalid. Please try again</div>';
    header( "Refresh:1; url='addnewuser.php'");}

    elseif ($result->rowCount() > 0) {
        echo '<div class="alert alert-danger">Username already exists</div>';
        header("Refresh:1; url='addnewuser.php'");
    }
    else {
        $sql = "INSERT INTO cp_user (username, password, rank) VALUES ('$username', '$password', '$rank')";
        $db->exec($sql);
        echo '<div class="alert alert-success">User added</div>';
        header("Refresh:1; url='addnewuser.php'");
    }

}

?>
<title>Add New User</title>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div className="dashboard__container">
                <h1><span><?php echo $panelname;?></span></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="border-index">
                    <div class="panel-heading">
                    </div>
                    <div class="panel-body"></div>
                    <?php echo $paneldescription;?>
                </div>
            </div>
        </div>
        <br>
        <form action="addnewuser.php" method="post">
            <input class="border-index" type="text" name="username" placeholder="Username">
            <input class="border-index" type="password" name="password" placeholder="Password">
            <input class="border-index" type="text" name="rank" placeholder="Rank">
            <input class ="btn-blue" type="submit" name='btn-createnewuser' value="Create">
        </form>
        <form action="admin.php" method="post">
            <input class ="btn-info" type="submit" name='btn-back' value="Back">
        </form>
    </div>
</div>