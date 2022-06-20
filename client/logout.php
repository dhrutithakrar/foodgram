<?php 
	session_start();
	unset($_SESSION['client']);
	session_unset();
	session_destroy();
	header("location:index.php")
?>