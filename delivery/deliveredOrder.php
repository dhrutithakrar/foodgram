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
	<title>Orders</title>
	<style>
		.edit{
			cursor: pointer;
		}
	</style>
</head>
<body>
	<?php include("nav.php"); ?>
	<div class="container">
		<div class="row mt-5">
			<table class="table">
				<thead class="thead-dark">
				    <tr>
						<th scope="col">#</th>
						<th scope="col">Order Id</th>
						<th scope="col">Customer Name</th>
						<th scope="col">Total</th>
						<th scope="col">Address</th>
						<th scope="col">Delivered At</th>
						<th scope="col">Rating</th>
						<th scope="col">Feedback</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						
						$count = 0;
						$name = $_SESSION['deliveryUser'];
						$con = mysqli_connect("localhost","root","","dbtyproject");
						$res = mysqli_query($con,"SELECT `order`.`id`,`users`.`username`,`order`.`total`,`users`.`address`,`accepted`.`delivered at`,`order`.`h_id` FROM `order`,`users`,`accepted` WHERE `accepted`.`o_id` = `order`.`id` AND `accepted`.`delivery_man` = '$name' AND `order`.`uid`=`users`.`username` AND `accepted`.`status` = 'Delivered' order by `id` desc") or die(mysqli_error($con));
							
						while ($data = @mysqli_fetch_array($res)) {
							$count++;
							echo "
								<tr>
									<th scope='row'>$count</th>
									<td>$data[0]</td>
									<td>$data[1]</td>
									<td>$data[2]</td>
									<td>$data[3]</td>
									<td>$data[4]</td>
									";

								$resFeedback = mysqli_query($con,"SELECT * FROM `order`,`feedback` WHERE `order`.`id` = `feedback`.`o_id` AND `feedback`.`type` = 'delivery' AND `order`.`id` = $data[0];");
								$resDataFeedbacck = mysqli_fetch_array($resFeedback);
								echo "

									<td>$resDataFeedbacck[8]</td>									
									<td>$resDataFeedbacck[10]</td>	
								</tr>
							";
							
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>
