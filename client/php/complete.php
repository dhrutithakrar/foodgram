<?php 
	session_start();
	$id = $_GET["id"];
	
	$con = mysqli_connect("localhost","root","","dbtyproject");
	mysqli_query($con,"update `order` set `status` = 'On Delivery' where `id` = $id") or die(mysqli_error($con));
	mysqli_query($con,"insert into `ondelivery` (`o_id`,`h_id`) values ($id,'".$_SESSION['client']."')") or die(mysqli_error($con));
	
	
	echo "
		<script type='text/javascript'>
			alert('Order On Delivery...');
			window.location.replace(\"../manageOrder.php\");
		</script>		
	";	
?>


