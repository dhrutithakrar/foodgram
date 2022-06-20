<?php 

	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$address = trim($_POST['address']);
	$id = $_POST['id'];
	$con = mysqli_connect("localhost","root","","dbtyproject");
	mysqli_query($con,"update `users` set `email` = '$email',`mobile` = '$mobile',`address`='$address' where `id` = '$id'") or die(mysqli_error($con));
	echo "
			<script type='text/javascript'>
				alert('RECORD UPDATED SUCCESSFULLY');
				window.location.replace(\"../account.php\");
			</script>		
		";
?>