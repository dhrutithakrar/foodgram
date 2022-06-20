<?php
 	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];

	$username = stripcslashes($username);
	$password = stripcslashes($password);
	
	$con=mysqli_connect("localhost","root","","dbtyproject");
	$username = mysqli_real_escape_string($con,$_POST['username']);
	$password = mysqli_real_escape_string($con,$_POST['password']);

	$query = "select * from users where username = '$username' and password = '$password'";
	$result = mysqli_query($con,$query) or die(mysqli_error($con));

	$row = mysqli_fetch_array($result);
	if ($row['username'] == $username && $row['password'] == $password) {
		$_SESSION['user'] = "$username";
		$_SESSION['mno'] = $row[4];
		$_SESSION['id'] = $row[0];
		header("location:../index.php");
	} else {
		echo "
			<script type='text/javascript'>
				alert('Username Or Password Is Wrong');
				window.location.replace(\"../login.php\");
			</script>
			";
	}
?>