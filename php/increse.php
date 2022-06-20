<?php 	
	$qun = $_GET['qun'];
	$id = $_GET['id'];
	$hid = $_GET['hid'];
	$qun++;
	$con = mysqli_connect("localhost","root","","dbtyproject");
	mysqli_query($con,"update `cart` set `p_quntity` = $qun where `id` = $id") or die(mysqli_error($con));
	header("location:../cart.php?id=$hid");
?>