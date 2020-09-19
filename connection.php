<?php
$servername   = "";
$Database = "";
$username = "";
$password = "";

// Create connection
$con = new mysqli($servername, $username, $password, $Database);
// Check connection
if ($con->connect_error) {
   die("Connection failed: " . $con->connect_error);
}
?>
