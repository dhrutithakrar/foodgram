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
	<?php
		session_start(); 
		include("logInNav.php");
		$order_id=$_GET['id'];
		$total=$_GET['total'];
	?>
	<div class="container">
		<div class="row mt-2">
			<div class="col-md-2"></div>
			<div class="col-12 col-md-8">
				<div class="alert alert-success" role="alert">
				  <h4 class="alert-heading">Order Placed!</h4>
				  <p>Your Order Has Been Successfully Placed.....</p>
				  <hr>
				  <p class="mb-0">Your Order ID : <?php echo "$order_id"; ?></p>
				  <p class="mb-0">Your Total Amount : <?php echo "$total"; ?></p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>