<!DOCTYPE html>
<html>
<head>
	<title>Account</title>
</head>
<body>
	<?php session_start();include("logInNav.php"); ?>
	<div class="container">
		<div class="row mt-5">
			<div class="col-md-3"></div>
			<div class="col-md-6 mt-2">
				<?php 
						$con = mysqli_connect("localhost","root","","dbtyproject");
						$res = mysqli_query($con,"select * from users where `username` = '".$_SESSION['user']."'");
						$data = mysqli_fetch_array($res);						
					?>

				<form class="bg-light p-3 rounded" action="php/editProfile.php" method="post" enctype="multipart/form-data">
					<div align="center" class="mb-5" style="font-weight: bold; font-size: 24px;">ACCOUNT DETAIL</div>
						  
				  <div class="form-group">
				    <label>Username</label>
				    <input type="text" class="form-control" name="username" readonly value="<?php echo $data[1] ?>">
				  </div>
				  <div class="form-group">
				    <label>Email</label>
				    <input type="text" class="form-control" name="email" readonly value="<?php echo $data[3] ?>">
				  </div>
				  <div class="form-group">
				    <label>Mobile No</label>
				    <input type="text" class="form-control" name="mobile" readonly value="<?php echo $data[4] ?>">
				  </div>
				  <div class="form-group">
				    <label>Address</label>
				    <input type="text" class="form-control" name="address" readonly value="<?php echo $data[5] ?>">

				  </div>
				  <button type="submit" class="btn btn-danger" name="submit">Edit Profile</button>
				  <a href="logout.php" class="btn btn-secondary">logout</a>
				</form>
			</div>
			
		</div>
	</div>
	
</body>
</html>
