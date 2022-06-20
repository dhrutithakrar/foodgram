 <?php
	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];

	$username = stripcslashes($username);
	$password = stripcslashes($password);
	
	$con=mysqli_connect("localhost","root","","dbtyproject");
	$username = mysqli_real_escape_string($con,$_POST['username']);
	$password = mysqli_real_escape_string($con,$_POST['password']);

	$query = "select * from client where `email` = '$username' and `password` = '$password'";
	$result = mysqli_query($con,$query) or die(mysqli_error($con));

	$row = mysqli_fetch_array($result);
	if ($row['email'] == $username && $row['password'] == $password) {
		echo "hello done";
		header("location: ../dashboard.php");
		$_SESSION['client'] = $row['email'];

	} else {
		echo "hello fail";
		header("location: ../index.php");
	}
?>