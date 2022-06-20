<?php 
	if (isset($_POST["submit"])) 
	{
		session_start();
		$cname = $_POST["cname"];

		$con = mysqli_connect("localhost","root","","dbtyproject");
		$res = mysqli_query($con,"insert into category (`category_name`,`u_id`) values('$cname','".@$_SESSION['client']."')") or die(mysqli_error($con));

		
		echo "
			<script type='text/javascript'>
				alert('$res');
			</script>		
		";
		header("location:../category.php");
	}
?>
