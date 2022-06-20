<?php 

	$type = $_GET['type'];
	$id = $_GET['id'];
	$hid = $_GET['hid'];
	$con = mysqli_connect("localhost","root","","dbtyproject");
	mysqli_query($con,"delete from `$type` where `id`= $id") or die(mysqli_error($con));
	
	header("location:../$type.php?id=$hid");
?>