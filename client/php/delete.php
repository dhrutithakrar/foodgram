<?php 
	$type = $_GET['type'];
	$id = $_GET['id'];

	$con = mysqli_connect("localhost","root","","dbtyproject");
	$res = mysqli_query($con,"delete from $type where `id` = $id") or die(mysqli_error($con));
	
	
	echo "	<script type='text/javascript'>
				alert('$res');
			</script>		
		";
		header("location:../$type.php");
?>