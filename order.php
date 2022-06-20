<!DOCTYPE html>
<html>
<head>
	<title>Add Product</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		.productName{
			font-weight: normal;
			font-size: 20px;
		}
		.productPrice{
			font-weight: bold;
			font-size: 14px;
		}
		.img{
			max-height: 150px;
			width: 100%;
		}
		.main-card{
			min-height: 150px;
		}
	</style>
</head>
<body>
	<?php 
		session_start();
		if (isset($_SESSION['user'])) {
			include("logInNav.php");
			$uid = $_SESSION['user'];
		}else{
			include("nav.php");
			$uid='';
		}
	?>
	<div class="container"> 
		<div class="row my-4">
			<?php 
				$id = $_GET['id'];
					
					$count = 0; 
					$con = mysqli_connect("localhost","root","","dbtyproject");
					$res = mysqli_query($con,"select * from `product` where `u_id` = '$id'") or die(mysqli_error($con));
					if (@mysqli_num_rows($res) > 0) {
						while ($data = mysqli_fetch_array($res)) {
							echo "
								<div class='col-6 col-sm-4 col-md-4 col-lg-3 mt-2'>
									<div class='border border-dark px-1 main-card'>
										<div class='main-card'>
											<img src='client/$data[5]' class='img-fluid rounded mt-1 img'>	
										</div>
										<div class='mt-sm-4 productName' align='center'>$data[1]</div>
										<div class='productPrice text-danger' align='center'>RS. $data[4]</div>
										<div align='center' class='mt-1 mb-1'>
											<form action='php/addCart.php' method='post'>
												<input type='hidden' name='hid' value='$id'>
												<input type='hidden' name='uid' value='$uid'>
												<input type='hidden' name='pid' value='$data[0]'>
												<input type='hidden' name='qun' value='1'>
												<input type='submit' name='submit' class='btn btn-primary' value='Add To Cart'>
											</form>											
										</div>
									</div>
								</div>
							";
						}
					}
					else{
						echo "No Dishes Available Please Check Another Resturant";
					}
			?>	
		</div>
	</div>
</body>
</html>