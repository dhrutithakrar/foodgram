<?php
	session_start();
	$id = $_GET['id'];
	$user = $_GET['user'];

	$name = $_SESSION['deliveryUser'];

	$con = mysqli_connect("localhost","root","","dbtyproject");
	$res = mysqli_query($con,"select * from `accepted` where `delivery_man` = '$name' and `status` = 'Not Delivered'") or die(mysqli_error($con));
	if (@mysqli_num_rows($res) > 0) 
	{
		echo "
			<script type='text/javascript'>
				alert('First You Complete This Order After that You Take New Order');
				window.location.replace(\"../acceptedOrder.php\");
			</script>
		";
	}
	else
	{
		mysqli_query($con,"update `ondelivery` set `delivery_man` = '$name',`status` = 'On The Way' where `o_id` = $id");
		mysqli_query($con,"update `order` set `status` = 'On The Way' where `id` = $id");
		mysqli_query($con,"insert into `accepted` (`delivery_man`,`o_id`,`status`) values('$name','$id','Not Delivered')");		
	
		echo "
			<script type='text/javascript'>
				alert('You Accept The Order..');
				window.location.replace(\"../acceptedOrder.php\");
			</script>
		";
	}
?>