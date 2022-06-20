<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Delivery Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="../client/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="../client/css/registrationC.css">
		<style>
			a{
				color: black;
				text-decoration: none;
			}
			a:hover{
				color: gray;
				text-decoration: underline;
			}
		</style>
	</head>

	<body>

		<div class="wrapper" style="background-image: url('../food/signupbg.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="../images/delivery.jpg" alt="" style="height: 100%;">
				</div>
				<form action="php/RegistrationD.php" method="post" enctype="multipart/form-data">
					<h3>Registration Form For Delivery</h3>
					
					<div class="form-wrapper">
						<input type="text" name="username" placeholder="Delivery Person" class="form-control">
						<i class="zmdi zmdi-account"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" name="EmailAddress" placeholder="Email Address" class="form-control">
						<i class="zmdi zmdi-email"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" name="cat" placeholder="City" class="form-control">
						<i class="zmdi zmdi-cutlery"></i>
					</div>
					<!-- <div class="form-wrapper">
						<input type="text" name="dTime" placeholder="Delivery Time" class="form-control">
						<i class="zmdi zmdi-car"></i>
					</div> -->
					<div class="form-wrapper">
						<input type="file" name="fileToUpload" class="form-control" id="fileToUpload">
						<i class="zmdi zmdi-image"></i>
					</div>
					
					<div class="form-wrapper">
						<input type="password" name="password" placeholder="Password" class="form-control">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<div class="form-wrapper">
						<input type="tel" name="tel" placeholder="Mobile No" class="form-control">
						<i class="zmdi zmdi-lock"></i>
					</div>
					
					<button>Register
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
					<div align="center">
						<a href="index.php">Sign in</a>	
					</div>
				</form>
			</div>
		</div>
		
	</body>
</html>