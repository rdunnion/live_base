<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$servername = "localhost";
$MySQLusername = "PHP";
$password = "Password01";
$db = "live_base";

/* Attempt to connect to MySQL database */
$conn = new mysqli($servername, $MySQLusername, $password, $db);

// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
