<?php 
	session_start();
	if (!isset($_SESSION['user'])) {
		header("location:index.php");

	}else{
		// header("Refresh:30");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Dashboard</title>
	<style type="text/css">
		.rating {
		  display: inline-block;
		  position: relative;
		  height: 50px;
		  line-height: 50px;
		  font-size: 50px;
		}

		.rating label {
		  position: absolute;
		  top: 0;
		  left: 0;
		  height: 100%;
		  cursor: pointer;
		}

		.rating label:last-child {
		  position: static;
		}

		.rating label:nth-child(1) {
		  z-index: 5;
		}

		.rating label:nth-child(2) {
		  z-index: 4;
		}

		.rating label:nth-child(3) {
		  z-index: 3;
		}

		.rating label:nth-child(4) {
		  z-index: 2;
		}

		.rating label:nth-child(5) {
		  z-index: 1;
		}

		.rating label input {
		  position: absolute;
		  top: 0;
		  left: 0;
		  opacity: 0;
		}

		.rating label .icon {
		  float: left;
		  color: transparent;
		}

		.rating label:last-child .icon {
		  color: #000;
		}

		.rating:not(:hover) label input:checked ~ .icon,
		.rating:hover label:hover input ~ .icon {
		  color: #09f;
		}

		.rating label input:focus:not(:checked) ~ .icon:last-child {
		  color: #000;
		  text-shadow: 0 0 5px #09f;
		}
	</style>
	<script type="text/javascript">
		$(':radio').change(function() {
		  console.log('New star rating: ' + this.value);
		});
	</script>
</head>
<body>
	<?php include("logInNav.php"); ?>
		<div class="container">
		<div class="row mt-5">
			<table class="table">
				<thead class="thead-dark">
				    <tr>
						<th scope="col">#</th>
						<th scope="col">Total</th>
						<th scope="col"><center>Time</center></th>
						<th scope="col"><center>Dish Detail</center></th>
						<th scope="col"><center>Status</center></th>
						<th scope="col"><center>Delivery Man And Mobile No</center></th>
						
						<th scope="col"><center>Feedback</center></th>
						
					</tr>
				</thead>
				<tbody>
					<?php 
						
						
						$uid = $_SESSION['user'];
						$count = 0;
						$itemCount = 1;
						$con = mysqli_connect("localhost","root","","dbtyproject");
						$res = mysqli_query($con,"SELECT * FROM `order` WHERE `uid` = '$uid' ORDER BY `id` DESC");

						while ($data = @mysqli_fetch_array($res)) {
							$itemCount = 1;
							$count++;
							echo "
								<tr>
									<th scope='row'>$count</th>
									<td>$data[3]</td>
									<td align='center'>$data[4]</td>
									<td align='center'>";
									$dishItem = mysqli_query($con,"select * from `order_detail`,`product` where `order_detail`.`o_id` = $data[0] AND `product`.`id` = `order_detail`.`d_id`");

							echo "<table>";
							while ($dishName = @mysqli_fetch_array($dishItem)) 
							{
								echo "<tr>
										<td class='p-1'>$itemCount)</td>
										<td class='p-1'>$dishName[6] * $dishName[4]</td>
									</tr>";
								$itemCount++;
							}
							echo "</table>";

							$status = $data[6];
							if ($data[6] == 'order') {
								$status = "Waiting for Confirmation....";
							}
							echo "</td>
									<td align='center'>$status</td>
									<td>";

						if($status == "Delivered" || $status == "On The Way" ){

							$delivery_person_detail = mysqli_query($con,"SELECT * FROM accepted,delivery_person WHERE accepted.o_id =".$data[0]." AND accepted.delivery_man = delivery_person.email;");
							$delivery_person_detail_data = mysqli_fetch_array($delivery_person_detail);

							echo "Name : $delivery_person_detail_data[6]<br>Mobile No : $delivery_person_detail_data[11]";

							echo "</td>";
						}
							if($status == "Delivered"){
							echo "	<td align='center'>
										<button class='text-success border-0 bg-white fa fa-motorcycle' style='cursor:pointer' data-toggle = 'modal' data-target='#FeedbackDelivery' onclick='deliveryDetail(".$delivery_person_detail_data[2].")'></button>
										<button class='text-danger border-0 bg-white fa fa-h-square' style='cursor:pointer' data-toggle = 'modal' data-target='#FeedbackHotel' onclick='hotelDetail(".$delivery_person_detail_data[2].")'></button>
									</td>
								</tr>
							";
						}
						}
					?>
				</tbody>
			</table>
		</div>
	</div>	
	<div class="modal fade" tabindex="-1" role="dialog" id="FeedbackDelivery">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Rating For Delivery Man</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <form action="FeedbackDe.php" method="post">
		<div class="modal-body">
			<div class="rating">
				<label>
					<input type="radio" name="stars" value="1" />
					<span class="icon">★</span>
				</label>
				<label>
					<input type="radio" name="stars" value="2" />
					<span class="icon">★</span>
					<span class="icon">★</span>
				</label>
				<label>
					<input type="radio" name="stars" value="3" />
					<span class="icon">★</span>
					<span class="icon">★</span>
					<span class="icon">★</span>   
				</label>
				<label>
					<input type="radio" name="stars" value="4" />
					<span class="icon">★</span>
					<span class="icon">★</span>
					<span class="icon">★</span>
					<span class="icon">★</span>
				</label>
				<label>
					<input type="radio" name="stars" value="5" />
					<span class="icon">★</span>
					<span class="icon">★</span>
					<span class="icon">★</span>
					<span class="icon">★</span>
					<span class="icon">★</span>
				</label>
			</div>
			<div class="mb-4">
				<b><p style="font-size: 20px;">Feedback For Delivery Man</p></b>
				<textarea class="from-control border p-3 rounded" cols="30" rows="5" style="font-size: 20px;line-height: 22px;font-family: 'Cambria'" name="feedback"></textarea>
				<input type="hidden" name="dfe" id="dfe">
			</div>
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-primary">Give Feedback</button>
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		</div>
		</form>
	    </div>
	  </div>
	</div>


	<div class="modal fade" tabindex="-1" role="dialog" id="FeedbackHotel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Rating For Hotel</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
		<form action="FeedbackHo.php" method="post">
		<div class="modal-body">
			<div class="rating">
				<label>
					<input type="radio" name="hstars" value="1" />
					<span class="icon">★</span>
				</label>
				<label>
					<input type="radio" name="hstars" value="2" />
					<span class="icon">★</span>
					<span class="icon">★</span>
				</label>
				<label>
					<input type="radio" name="hstars" value="3" />
					<span class="icon">★</span>
					<span class="icon">★</span>
					<span class="icon">★</span>   
				</label>
				<label>
					<input type="radio" name="hstars" value="4" />
					<span class="icon">★</span>
					<span class="icon">★</span>
					<span class="icon">★</span>
					<span class="icon">★</span>
				</label>
				<label>
					<input type="radio" name="hstars" value="5" />
					<span class="icon">★</span>
					<span class="icon">★</span>
					<span class="icon">★</span>
					<span class="icon">★</span>
					<span class="icon">★</span>
				</label>
			</div>
			<div class="mb-4">
				<b><p style="font-size: 20px;">Feedback For Hotel</p></b>
				<textarea class="from-control border p-3 rounded" cols="30" rows="5" style="font-size: 20px;line-height: 22px;font-family: 'Cambria'" name="hfeedback"></textarea>
				<input type="hidden" name="hfe" id="hfe">
			</div>
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-primary">Give Feedback</button>
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		</div>
		</form>
	    </div>
	  </div>
	</div>
</body>
<script type="text/javascript">
	function deliveryDetail(id){
		document.getElementById('dfe').value = id;
	}
	function hotelDetail(id){
		document.getElementById('hfe').value = id;
	}
</script>
</html>
