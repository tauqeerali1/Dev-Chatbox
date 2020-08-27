<?php
session_start();
header('location:signup.html');
$con=mysqli_connect('', '', '', '');
if($con){
	echo "connection successful";
}else{
	echo "no connection";
}

$firstname = $_POST['First_Name'];
$lastname = $_POST['Last_Name'];
$email = $_POST['Email'];
$user = $_POST['username'];
$password = $_POST['password'];
$gender = $_POST['gender'];

$q = "select * from userregistration  where User = '$user' && Password = '$password'";

$result = mysqli_query($con, $q);

$num = mysqli_num_rows($result);

if($num ==1){
	echo "Duplicate data";
}else{
	$qy = "insert into userregistration(First , Last , Email , User , Password , Gender) values ('$firstname' , '$lastname' , '$email' , '$user' , '$password' , '$gender')";
	mysqli_query($con, $qy);
}

?>
