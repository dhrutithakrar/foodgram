<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Registration</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="User Profile Form A Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link href="css/Rstyle.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="css/Rfont-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<!-- //css files -->
<!-- online-fonts -->
<link href="//fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<!--//online-fonts -->
</head>

<body class="pt-0">
	<?php 
	  include("nav.php");
	?>
	<div class="w3-main mt-5" style="width: 40%;">
		<div class="form-w3l">
			<div class="img">
				<img src="images/profile.png" alt="image">
				<h2>signup here</h2>
			</div>	
			<form action="php/regidtration.php" method="post">
				<div class="w3l-user">
					<span><i class="fa fa-user-circle-o w3l-1" aria-hidden="true"></i></span>
					<input type="text" name="username" placeholder="username" required=""/>
					<div class="clear"></div>
				</div>
				
				<div class="w3l-password">
					<span><i class="fa fa-lock w3l-2" aria-hidden="true"></i></span>
					<input type="password" name="password" placeholder="password" required=""/>
					<div class="clear"></div>
				</div>
				
				<div class="w3l-email">
					<span><i class="fa fa-envelope-o w3l-3" aria-hidden="true"></i></span>
					<input type="email" name="email" placeholder="e-mail" required=""/>
					<div class="clear"></div>
				</div>
				
				<div class="w3l-phone">	
					<span><i class="fa fa-mobile w3l-4" aria-hidden="true"></i></span>
					<input type="text" name="mobile" placeholder="+91" required=""/>
					<div class="clear"></div>
				</div>

				<div class="w3l-email">
					<span><i class="fa fa-envelope-o w3l-3" aria-hidden="true"></i></span>
					<input type="text" name="address" placeholder="Address(Optional)" />
					<div class="clear"></div>
				</div>
				
				<div class="w3l-btn">
					<input type="submit" name="button" value="sign up"/>
				</div>
			</form>
		</div>
	</div>
	
</body>
</html>