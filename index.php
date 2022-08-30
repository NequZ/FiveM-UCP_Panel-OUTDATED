<?php
include 'config.php';
include 'css/style.css';
session_start();
 try {
        $db = new PDO('mysql:host=localhost;dbname=fivem', 'root', '');
        echo '<div class="alert alert-success">MySQL is connected</div>';
    } catch (PDOException $e) {
        echo '<div class="alert alert-danger">MySQL is not connected</div>';
    }

// check if username and password exist in database and if yes, then login
if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = $db->prepare("SELECT * FROM cp_user WHERE username = :username AND password = :password");
    $query->bindParam(':username', $username);
    $query->bindParam(':password', $password);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $rank = $result['rank'];
    if($result) {
        header( "Refresh:3; url='login.php'");
        echo '<div class="alert alert-success">Login Successful</div>';
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['rank'] = $rank;

// write in logfile when someone

        $logfile = fopen('log.txt', 'a');
        $log = date('d.m.Y H:i:s') . ' - ' . $username . ' logged in successfully';
        fwrite($logfile, $log . PHP_EOL);
        fclose($logfile);

    } else {
        echo '<div class="alert alert-danger">Login Failed</div>';

        $logfile = fopen('log.txt', 'a');
        $log = date('d.m.Y H:i:s') . ' - ' . $username . ' couldnt log in';
        fwrite($logfile, $log . PHP_EOL);
        fclose($logfile);

    }
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
<form action="index.php" method="post">
    <input class="border-index" type="text" name="username" placeholder="Username">
    <input class="border-index" type="password" name="password" placeholder="Password">
    <input class ="btn-success" type="submit" value="Login">

</form>


</div>
</body>
</html>
