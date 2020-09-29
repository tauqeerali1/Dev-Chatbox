<?php
$Servername   = "";
$database = "";
$username = "";
$password = "";

// Create connection
$con = new mysqli($Servername, $username, $password, $database);
// Check connection
if ($con->connect_error) {
   die("Connection failed: " . $con->connect_error);
}
?>
