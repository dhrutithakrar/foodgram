<?php 
	session_start();
	$id = $_GET["id"];
	$con = mysqli_connect("localhost","root","","dbtyproject");
	$res = mysqli_query($con,"update `order` set `status` = 'Sorry Your Order Is Rejected...' where `id` = $id") or die(mysqli_error($con));
	
	echo "
		<script type='text/javascript'>
			alert('Order Rejected');
			window.location.replace(\"../dashboard.php\");
		</script>		
	";	
?>