<?php
$servername   = "";
$database = "";
$username = "";
$Password = "";

// Create connection
$con = new mysqli($servername, $username, $Password, $database);
// Check connection
if ($con->connect_error) {
   die("Connection failed: " . $con->connect_error);
}
?>
