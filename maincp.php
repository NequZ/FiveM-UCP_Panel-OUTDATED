<?php

include 'css/style.css';
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {

    header("refresh:1;url=index.php");
    echo "Please log in first to see this page.";
} ?>


<meta http-equiv="refresh" content="900;url=logout.php" />
<!DOCTYPE html>
<html>
<meta http-equiv="refresh" content="900;url=logout.php" />
<head>
    <title>Main UCP</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
    </style>
</head>

<div class="mainheader">
    <h4>Welcome back</h4>
</div>
<br>
<body class="w3-light-grey">


<div class="maintable">

    <div class="left">
        <img src="img/brlogo.png" alt="logo" width="100" height="100">
    </div>
    <table class="w3-table-all w3-hoverable">
        <tr>
            <th><?php echo $_SESSION["sessionfirstname"];?></th>
            <th><?php echo $_SESSION["sessionlasttname"];?></th>
            <th><?php echo $_SESSION["sessionjob"];?></th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Admin</th>
            <th>Last Login</th>
        </tr>
    </table>
</div>
</body>
</html>