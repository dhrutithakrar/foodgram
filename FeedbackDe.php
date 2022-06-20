<?php 
	session_start();
	
	if (!isset($_SESSION['user'])) {
		header("location:index.php");

	}else{
		$feedback = $_POST['feedback'];
		
		$sNo = @$_POST['stars'];
		$type = "delivery";
		if($sNo == "")
		{
			$sNo = 0;
		}
		$con = mysqli_connect("localhost","root","","dbtyproject");
		include("logInNav.php"); 

		$query = "SELECT * FROM `feedback` WHERE `feedback`.`o_id` = ".$_POST['dfe']." AND `feedback`.`type` = 'delivery'";
		$res = mysqli_query($con,$query);
		
		if(mysqli_num_rows($res) > 0)
		{
			echo "<center><h1>You Already Gave Delivery Man Feedback</h1></center>";
			
		}else{
			mysqli_query($con,"insert into `feedback` (`stars`,`o_id`,`feedback`,`type`) values($sNo,".$_POST['dfe'].",'$feedback','$type')");	
			echo "<center><h1>Delivery Man Feedback Send Successfully</h1></center>";
		}
		 
	}
?>