<!DOCTYPE html>
<html lang="en">
<head>
  <title>Homepage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
  	.card-main{
  		border-radius: 30px;max-height: 200px;min-height: 200px;
  	}
  	.hotel{
  		font-size: 23px;font-weight: bold;
  	}
  	.del{
  		font-size: 18px;font-weight: bold;
  	}
  	.link-button{
  		border-radius: 5px;text-decoration: none;background-color: lightblue;
  	}
  	.img-style{
  		border-radius: 15px;max-height: 180px;
  	}
  </style>
</head>

<body>

<?php 
	session_start();
	if (isset($_SESSION['user'])) {
		
		include("logInNav.php");
	}else{
	
		include("nav.php");
	}
?>

<div class="container-fluid">
	<div class='row mt-2'>

	<?php 
		$count = 0; 
		$con = mysqli_connect("localhost","root","","dbtyproject");
		$res = mysqli_query($con,"select * from `client`");
		while ($data = @mysqli_fetch_array($res)) {
			if ($count % 2== 0) {
				echo "<div class='col-md-1'></div>";
			}
			echo "
				<div class='col-md-5 ml-2 mt-2 card-main bg-light'>
					<div class='row'>
						<div class='col-5 col-md-5 mt-3 mb-3'>
							<img src='$data[6]' class='img-fluid img-style' >
						</div>
					
						<div class='col-7 col-md-7 mt-3'>
							<p class='hotel m-0'>$data[1]</p>
								$data[4]
							<p class='del m-0 mb-3'>Delivery in $data[5]min</p>
							<a href='order.php?id=$data[2]' class='p-2 link-button'>Order Now</a>
						</div>
					</div>
				</div>
			";
			$count++;
		}
	?>
		
	</div>
</div>
</body>
</html>

