<?php 
	session_start();
	if (!isset($_SESSION['client'])) {
		header("location:index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Product</title>
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
						<th scope="col">Product Name</th>
						<th scope="col">Category Name</th>
						<th scope="col">Price</th>
						<th scope="col">Image</th>
						<th scope="col"></th>
						<th scope="col"></th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$count = 0;
						$con = mysqli_connect("localhost","root","","dbtyproject");
						$res = mysqli_query($con,"select * from `product` where u_id = '".$_SESSION['client']."'") or die(mysqli_error($con));
						
						while ($data = @mysqli_fetch_array($res)) {
							$count++;
							echo "
								<tr>
									<th scope='row'>$count</th>
									<td>$data[1]</td>
									<td>$data[3]</td>
									<td>$data[4]</td>
									<td><img src='$data[5]' width='60' height='60'></td>
									<td><a href='editProduct.php?type=product&id=$data[0]&name=$data[1]&category=$data[3]&price=$data[4]' class='fa fa-pencil text-success'></a></td>
									<td><a href='php/delete.php?type=product&id=$data[0]' class='fa fa-trash text-danger'></a></td>
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
