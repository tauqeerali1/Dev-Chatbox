<?php
$servername   = "localhost";
$database = "userregistration";
$username = "root";
$password = "9636463361";

// Create connection
$con = new mysqli($servername, $username, $password, $database);
// Check connection
if ($con->connect_error) {
   die("Connection failed: " . $con->connect_error);
}
?>