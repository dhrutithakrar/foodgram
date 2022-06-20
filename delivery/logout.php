<?php 
	session_start();
	unset($_SESSION['deliveryUser']);
	header("location:index.php");
?>