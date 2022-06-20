<?php 
	session_start();
	if (!isset($_SESSION['deliveryUser'])) {
		header("location:index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Dashboard</title>
	<style>
		.card{
			min-height: 290px;
		}
	</style>
</head>
<body>
	<?php include("nav.php"); ?>
	<div class="container">
		
	<div align="center" style="font-size: 30px;">Available Orders</div>
		<div class="row">
			<?php 
				$con = mysqli_connect("localhost","root","","dbtyproject");
				$res = mysqli_query($con,"SELECT * FROM `ondelivery`,`order` WHERE `ondelivery`.`o_id` = `order`.`id` and `ondelivery`.`status` = ''") or die(mysqli_error($con));
				
				while ($data = @mysqli_fetch_array($res)) 
				{
				
					$resdata = mysqli_query($con,"select * from `client` where `email` = '$data[2]'") or die(mysqli_error($con));
					$rdata = mysqli_fetch_array($resdata);
					echo "<div class='col-sm-6 col-md-4 col-xl-3 mt-3'>
							<div class='card bg-light mb-3' style='max-width: 18rem;' align='center'>
							  <div class='card-header'>Id : $data[1]</div>
								  <div class='card-body'>
									<b><p class='card-title'>Hotel Name : $rdata[1]</p></b>
									<p class='card-text'>Hotel Address : $rdata[7]</p>
									<h5 class='card-title'>Customer id: $data[6]</h5>
									<a class='btn btn-primary text-light' href='php/acceptOrder.php?id=$data[1]&user=$data[6]'>Accept Order</a>
								  </div>
							  </div>
							</div>";
				}
			?>
		</div>	
	</div>
</body>
</html>
