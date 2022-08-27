
<?php
include 'css/style.css';
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {

    header("refresh:1;url=index.php");
    echo "Please log in first to see this page.";
}

?>
<meta http-equiv="refresh" content="900;url=logout.php" />
<br>
<style>
    body {
        background-image: url('img/brlogo_02.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
    }
</style>
<div class="mainheader">
    <h4>Welcome to the UCP from the Server [SERVERNAME]</h4>
 </div>

<div class="navbar">
    <style>"text-align:center;"</style>
    <button onclick="location.href='check.php'" value=".$firstname. && .$lastname." class="logout">UCP</button>
    <button onclick="location.href='logout.php'" class="logout">Logout</button>
    <button onclick="location.href='settings.php'" class="logout">Settings</button>

</div>



 </body>
