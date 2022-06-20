<?php
	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];

	$username = stripcslashes($username);
	$password = stripcslashes($password);
	
	$con=mysqli_connect("localhost","root","","dbtyproject");
	$username = mysqli_real_escape_string($con,$_POST['username']);
	$password = mysqli_real_escape_string($con,$_POST['password']);

	$query = "select * from `delivery_person` where `email` = '$username' and `password` = '$password'";
	$result = mysqli_query($con,$query) or die(mysqli_error($con));

	$row = mysqli_fetch_array($result);
	if ($row['email'] == $username && $row['password'] == $password) {
		$_SESSION['deliveryUser'] = $row['email'];
		
		header("location: ../dashboard.php");

	}
	else{
		header("location: ../index.php");
	}
?>