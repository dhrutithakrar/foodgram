<?php 

	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$address = $_POST['address'];
	
	$con = mysqli_connect("localhost","root","","dbtyproject");
	$emailquery = "select * from users where `username` = '$username'";
	$email_res = mysqli_query($con,$emailquery) or die (mysqli_error());
	if (mysqli_num_rows($email_res) > 0 ) 
	{
		echo "
			<script type='text/javascript'>
				alert('This Email is Already taken');
				window.location.replace(\"../registration.php\");
			</script>
			";
	}
	else
	{
		$query = "insert into users (`username`,`password`,`email`,`mobile`,`address`) values('$username','$password','$email','$mobile','$address');";
		$res = mysqli_query($con,$query) or die(mysqli_error($con));	
		header("location:../login.php");
	}
?>