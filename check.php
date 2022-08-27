<?php

include 'css/style.css';
session_start();

echo "<div class='dbi'> <tr><td>UCP is checking if your Logged in correctly</td></tr> </div>";
?>
    <div class="loader"></div>


<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    header("refresh:3;url=maincp.php");
}
?>