<?php 
	session_start();
	if (!isset($_SESSION['user'])) {
		header("location: index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Cart</title>
	<style>
		.edit{
			cursor: pointer;
		}
	</style>
</head>
<body>
	<?php include("loginNav.php"); ?>
	<div class="container">
		<div class="row mt-2">
			<table class="table">
				<thead class="thead-dark">
				    <tr>
						<th scope="col">#</th>
						<th scope="col"></th>
						<th scope="col">Product Name</th>
						<th scope="col">Quntity</th>
						<th scope="col">Price</th>
						<th scope="col">Total</th>						
						<th scope="col"></th>						
					</tr>
				</thead>
				<tbody>
					<?php 
						$count = 0;
						$hid = @$_GET['id'];
						$con = mysqli_connect("localhost","root","","dbtyproject");
						$res = mysqli_query($con,"select product.name,cart.p_quntity,product.price,cart.id,product.img from cart,product where cart.h_id='$hid' and cart.u_id = '".$_SESSION['user']."' and `cart`.`p_id` = `product`.`id`");
						$total=0;
						$temptotal=0;
						while ($data = @mysqli_fetch_array($res)) {
							$count++;
							echo "
								<tr>
									<td scope='row'>$count</td>
									<td align='right'><img src='client/$data[4]' width='64' height='64'></td>
									<td>$data[0]</td>
									<td>
										<ul class='pagination'>
											<a href='php/decrese.php?id=$data[3]&qun=$data[1]&hid=$hid' class='page-item page-link bg-dark border border-primary btn rounded-0'>
												-
											</a>
											
											<a class='page-item page-link text-dark'>
												$data[1]
											</a>
											
											<a href='php/increse.php?id=$data[3]&qun=$data[1]&hid=$hid' class='page-item page-link bg-dark border border-primary' style='cursor: pointer;'>
												+
											</a>
										</ul>
									</td>
									<td>$data[2]</td>
									<td>".($temptotal = $data[1]*$data[2])."</td>
									<td><a href='php/delete.php?type=cart&id=$data[3]&hid=$hid' class='fa fa-trash text-danger'></a></td>
								</tr>
							";
							$total += $temptotal;
						}
						echo "<tr align='left'>
								<td colspan='5'></td>
								<td>Total : $total</td>
								<td></td>
							</tr>
						";			
					?>
				</tbody>
			</table>
		</div>
		<div align="center">
			<a class="btn btn-danger mt-3 mb-5 text-light" href="placeOrder.php?id=<?php echo $hid ?>&total=<?php echo $total ?>">Place Order <?php echo "Rs.$total"; ?></a>
		</div>
	</div>
</body>
</html>
