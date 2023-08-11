<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// modify these settings according to the account on your database server.
//$host = "localhost";
//$port = "3306";
//$username = "root";
//$user_pass = "root";
//$database_in_use = "jokesdb";


$host = "n4m3x5ti89xl6czh.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$port = "3306";
$username = "jf1mwibua5u1vdu0";
$user_pass = "iry680nyu33gjndd";
$database_in_use = "g2qpsnk0zp3m6lt2";

$mysqli = new mysqli($host, $username, $user_pass, $database_in_use);
if ($mysqli->connect_error) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "<br>";

?>