<?php
$db = new PDO('mysql:host=localhost;dbname=fivem', 'root', ''); // Main Database String
$debug = true; // Show some Debug Information for Members, like Buttons for MySQL Check and so on
// END OF CONFIGURATION



// START OF Languagevariables ( here you can add new Variables for the Language if you want)



$panelname = 'FiveM UCP';
$paneldescription = 'This is a UCP for FiveM';



// create logfile if not exists

if (!file_exists('log.txt')) {
    $logfile = fopen('log.txt', 'w');
    fclose($logfile);
}