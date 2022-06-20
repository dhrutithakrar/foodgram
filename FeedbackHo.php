<?php 
	session_start();
	
	if (!isset($_SESSION['user'])) {
		header("location:index.php");

	}else{
		$feedback = $_POST['hfeedback'];
		$sNo = @$_POST['hstars'];
		$type = "hotel";
		if($sNo == "")
		{
			$sNo = 0;
		}
		$con = mysqli_connect("localhost","root","","dbtyproject");
		include("logInNav.php");

		$query = "SELECT * FROM `feedback` WHERE `feedback`.`o_id` = ".$_POST['hfe']." AND `feedback`.`type` = 'hotel'";
		$res = mysqli_query($con,$query);
		
		if(mysqli_num_rows($res) > 0)
		{
			echo "<center><h1>You Already Gave Hotel Feedback</h1></center>";
			
		}else{
			mysqli_query($con,"insert into `feedback` (`stars`,`o_id`,`feedback`,`type`) values($sNo,".$_POST['hfe'].",'$feedback','$type')");	
			echo "<center><h1>Hotel Feedback Send Successfully</h1></center>";
		}
		 
	}
?>