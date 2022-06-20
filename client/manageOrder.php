<?php 
	session_start();
	if (!isset($_SESSION['client'])) {
		header("location:index.php");
	}else{
		header("Refresh:30");
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
						<th scope="col">User Id</th>
						<th scope="col">Total</th>
						<th scope="col">Time</th>
						<th scope="col">Mobile No</th>
						<th scope="col">Status</th>
						<th scope="col"></th>
					</tr>
				</thead>
				<tbody>
					<?php 
						
						$hid = $_SESSION['client'];
						$count = 0;

						$con = mysqli_connect("localhost","root","","dbtyproject");
						$res = mysqli_query($con,"select * from `order` where `h_id` = '".$hid."' and `status` = 'in progress'") or die(mysqli_error($con));
						
						while ($data = @mysqli_fetch_array($res)) {
							$count++;
							echo "
								<tr>
									<th scope='row'>$count</th>
									<td>$data[1]</td>
									<td>$data[3]</td>
									<td>$data[4]</td>
									<td>$data[5]</td>
									<td>$data[6]</td>

									<td><a href='php/complete.php?type=product&id=$data[0]' class='fa fa-check text-danger'></a></td>
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
