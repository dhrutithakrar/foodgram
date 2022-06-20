<?php
	session_start();
	if (!isset($_SESSION['user']))
	{
		header("location:index.php");
	}
	else
	{
		$con = mysqli_connect("localhost","root","","dbtyproject");
		$uid = $_SESSION['user'];
		$hid = @$_GET['id'];
		$total = $_GET['total'];
		$time = date('Y-m-d H:i:s',time());
		$query = "select `address` from `users` where `username`='$uid'";
		$res = mysqli_query($con,$query);
		$data = mysqli_fetch_array($res);
		$mno = $_SESSION['mno'];
		if ($data[0] == '')
		{
			echo "
			<script type='text/javascript'>
				alert('Please Add Address');
				window.location.replace(\"account.php\");
			</script>
			";
		}
		else
		{
			$query = "insert into `order`(`uid`, `h_id`, `total`, `time`, `mobile_no`, `status`) values('$uid','$hid','$total','$time','$mno','order');";
			$res = mysqli_query($con,$query) or die(mysqli_error($con));
			
			$query = "select `id` from `order` where `uid` = '$uid' and `time` = '$time'";
			$res = mysqli_query($con,$query) or die(mysqli_error($con));
			$data = mysqli_fetch_array($res);
			$order_id = $data[0];

			$query = "select * from `cart` where `h_id`='$hid' and `u_id`='$uid'";
			$res = mysqli_query($con,$query) or die(mysqli_error($con));
			while ($data = mysqli_fetch_array($res))
			{
				$did = $data[3];	
				$qun = $data[4];	
				$query = "insert into `order_detail`(`h_id`, `o_id`, `d_id`, `qun`) values('$hid',$order_id,$did,$qun);";
				$res1 = mysqli_query($con,$query) or die(mysqli_error($con));
			}
			
			$query = "delete from `cart` where `u_id`='$uid' and `h_id`='$hid'";
			$res = mysqli_query($con,$query) or die(mysqli_error($con));
			header("location:finalShow.php?id=$order_id&total=$total");
		}
	}
?>
