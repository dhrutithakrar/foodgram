<?php 
	session_start();	
?>
<html lang="en">
<head>
	<title>Delivery Man Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../client/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="../client/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../client/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../client/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="../client/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="../client/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="../client/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="../client/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="../client/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="../client/css/util.css">
	<link rel="stylesheet" type="text/css" href="../client/css/main.css">
	<style>
		a:hover{
			color: gray;
			text-decoration:underline;
		}
	</style>
</head>
<body>
	<?php 
		if (isset($_SESSION['client']))
		{
			// header("location:dashboard.php");
		}
	 ?>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('../food/bgwaiterlogin.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Account Login For Delivery 
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" action="php/login.php" method="post">
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="User name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>
					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
					<div align="center">
						<a href="registrationD.php">Create New Account</a>	
					</div>
					
				</form>
			</div>
		</div>
	</div>

	<div id="dropDownSelect1"></div>
	<script src="../client/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="../client/vendor/animsition/js/animsition.min.js"></script>
	<script src="../client/vendor/bootstrap/js/popper.js"></script>
	<script src="../client/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../client/vendor/select2/select2.min.js"></script>
	<script src="../client/vendor/daterangepicker/moment.min.js"></script>
	<script src="../client/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="../client/vendor/countdowntime/countdowntime.js"></script>
	<script src="../client/js/main.js"></script>
</body>
</html>