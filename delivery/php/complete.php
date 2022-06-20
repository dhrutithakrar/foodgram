<?php 
	$id = $_GET['id'];

	$con = mysqli_connect("localhost","root","","dbtyproject");

	mysqli_query($con,"update `ondelivery` set `status` = 'Delivered' where `o_id` = $id") or die(mysqli_error($con));
	mysqli_query($con,"update `order` set `status` = 'Delivered' where `id` = $id") or die(mysqli_error($con));
	mysqli_query($con,"update `accepted` set `status` = 'Delivered',`delivered at` = now() where `o_id` = $id") or die(mysqli_error($con));
	
	echo "
			<script type='text/javascript'>
				alert('You Complete The Order..');
				window.location.replace(\"../dashboard.php\");
			</script>
		";
?>