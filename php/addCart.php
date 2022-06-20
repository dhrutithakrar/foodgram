<?php 
	session_start();
	if (!isset($_SESSION['user'])) {
		echo "
			<script type='text/javascript'>
				alert('You Need To Login For Add Product');
				 window.location.replace(\"../login.php\");
			</script>		
		";
	}else{
		$hid = $_POST['hid'];
		$uid=$_POST['uid'];
		$pid=$_POST['pid'];
		$qun = $_POST['qun'];

		$con = mysqli_connect("localhost","root","","dbtyproject");
		$resdish = mysqli_query($con,"select * from cart where `h_id` = '$hid' and `u_id` = '$uid' and `p_id` = '$pid'");
		
		if (@mysqli_num_rows($resdish) == 1) {
			$data = mysqli_fetch_array($resdish);
			$qun = $data[4];	
			$qun += 1;
			mysqli_query($con,"update `cart` set `p_quntity` = $qun where `p_id` = '$pid'");	
		}else{
			mysqli_query($con,"insert into `cart` (`h_id`, `u_id`, `p_id`, `p_quntity`) values ('$hid','$uid','$pid',$qun)");	
		}
		echo "
			<script type='text/javascript'>
				 window.location.replace(\"../order.php?id=$hid\");
			</script>
		";		
	}
?>