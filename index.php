<?php

include 'css/style.css';
include 'config.php';
session_start();

// connect to mysql
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);




// show some debug informations when debug = true in config



if ($debugmode == 'true') {
    echo "<div class='dbc'> <tr><td>MySQL Version: " . $mysqli->server_info . "</td></tr> </div>";
}
if ($debugmode == 'true') {
    if ($mysqli->host_info){
    echo "<div class='dbc'>
         <tr><td>Successfully connected to MySQL!</td></tr>       
            </div>";

    } else {
        echo "<div class='dbw'>
         <tr><td>Error: $mysqli->connect_error</td></tr>       
            </div>";
    }
}
if ($debugmode == 'true') {
    echo "<div class='dbc'>
         <tr><td>Current Panel Version: $currentversion</td></tr>       
            </div>";
}

// end of debug information



if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo "<div class='dbc'>
         <tr><td>You are logged in already. You will be redirect shorty</td></tr>
         </div>";
header("refresh:3;url=ucp.php");
}
?>
<br>
<link rel="stylesheet" href="css/style.css">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fivem UCP</title>
</head>
<body>
<form action="index.php" method="post">
    <div class='dbi'>
<input type="text" class="dbinput" name="firstname" placeholder="Firstname">
<input type="text" class="dbinput" name="lastname" placeholder="Lastname">
<input type="submit" class="dbinput" value="Submit">
</form>
</div>
</body>
</html>

<?php

// mysql check if firstname and lastname exist in database and if they do, display welcome message
if (isset($_POST['firstname']) && isset($_POST['lastname'])) {
     $firstname = $_POST['firstname'];
     $lastname = $_POST['lastname'];
     $sql = "SELECT * FROM users WHERE firstname = '$firstname' AND lastname = '$lastname'";

    $_SESSION["sessionfirstname"] = $firstname;
    $_SESSION["sessionlasttname"] = $lastname;
    $result = $mysqli->query($sql);
if ($result->num_rows > 0) {
        $_SESSION['loggedin'] = true;
    header("Location: ucp.php");

    } else {
        echo "<div class='dbw'>
         <tr><td>No user found with that name!</td></tr>
         </div>";
    }
    // post $firstname and $lastname on next file

}


?>

