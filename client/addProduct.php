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
	<title>Category</title>
	<style>
		.edit{
			cursor: pointer;
		}
	</style>
</head>
<body>
	<?php include("nav.php"); ?>
	<div class="container">
		<div class="row mt-3">
			<div class="col-md-3"></div>
			<div class="col-md-6 mt-5">
				<form class="bg-light p-3 rounded" action="php/addProduct.php" method="post" enctype="multipart/form-data">
					<div align="center" class="mb-5" style="font-weight: bold; font-size: 24px;">Product Detail</div>
				  <div class="form-group">
				    <label>Product Name</label>
				    <input type="text" class="form-control"  name="name">
				  </div>
				  <div class="form-group">
				    <label>Select Category</label>
				    <select class="form-control" name="category">
				      <?php 					
						$con = mysqli_connect("localhost","root","","dbtyproject");
						$res = mysqli_query($con,"select * from `category` where `u_id` = '".$_SESSION['client']."'") or die(mysqli_error($con));
						while ($data = @mysqli_fetch_array($res)) {
							echo "<option>$data[1]</option>";
						}
					?>
				    </select>
				  </div>
				  <div class="form-group">
				    <label>Product Price</label>
				    <input type="text" class="form-control" name="price">
				  </div>
				  <div class="form-group">
				    <label>Product Image</label>
				    <input type="file" name="fileToUpload" class="form-control" id="fileToUpload">
				  </div>
				  <button type="submit" class="btn btn-danger" name="submit">Add Product</button>
				  <button type="reset" class="btn btn-secondary">Reset Product</button>
				</form>
			</div>
			
		</div>
	</div>

</body>
</html>
