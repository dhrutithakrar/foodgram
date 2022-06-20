<?php 
	session_start();
	$id = $_GET["id"];
	$con = mysqli_connect("localhost","root","","dbtyproject");

	$res = mysqli_query($con,"update `order` set `status` = 'in progress' where `id` = $id") or die(mysqli_error($con));
			
	echo "
		<script type='text/javascript'>
			alert('Order Accepted');
			window.location.replace(\"../manageOrder.php\");
		</script>		
	";	
?>