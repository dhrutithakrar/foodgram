<?php 
	session_start();
	if (!isset($_SESSION['client'])) {
		header("location:index.php");
	}else{
		//header("Refresh:30");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Dashboard</title>
</head>
<body>
	<?php include("nav.php"); ?>
		<div class="container">
		<div class="row mt-5">
			<table class="table">
				<thead class="thead-dark">
				    <tr>
						<th scope="col">#</th>
						<th scope="col">User Id</th>
						<th scope="col">Total</th>
						<th scope="col"><center>Time</center></th>
						<th scope="col"><center>Dish Detail</center></th>					
						<th scope="col"></th>
						<th scope="col"></th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$hid = $_SESSION['client'];
						$count = 0;
						$itemCount = 1;
						
						$con = mysqli_connect("localhost","root","","dbtyproject");
						$res = mysqli_query($con,"select * from `order` where `h_id` = '".$hid."' and `status` = 'order'") or die(mysqli_error($con));
							
						while ($data = @mysqli_fetch_array($res)) {
							$itemCount = 1;
							$count++;
							echo "
								<tr>
									<th scope='row'>$count</th>
									<td>$data[1]</td>
									<td>$data[3]</td>
									<td align='center'>$data[4]</td>
									<td align='center'>";
							$dishItem = mysqli_query($con,"select * from `order_detail`,`product` where `order_detail`.`o_id` = $data[0] AND `product`.`id` = `order_detail`.`d_id`") or die(mysqli_error($con));
							echo "<table>";
							while ($dishName = @mysqli_fetch_array($dishItem)) 
							{
								echo "<tr>
										<td class='p-1'>$itemCount)</td>
										<td class='p-1'>$dishName[6] * $dishName[4]</td>
									</tr>";
								$itemCount++;
							}
							echo "</table>";
							echo "</td>
									<td><a href='php/accept.php?id=$data[0]' class='fa fa-check text-success'></a></td>
									<td><a href='php/reject.php?id=$data[0]' class='fa fa-trash text-danger'></a></td>
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
