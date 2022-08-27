<?php
include 'css/style.css';
session_start();

echo "<div class='dbw'> <tr><td>Logout was Successfully. Redirecting...</td></tr> </div>";
$_SESSION['loggedin'] = false;
session_destroy();
header("refresh:3;url=index.php");
?>