<?php
    session_start();
    if(!isset($_SESSION['admin'])){
        header("location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include("nav.php"); 
    ?>

    <div class="container">
		<div class="row mt-5">
			<table class="table">
				<thead class="thead-dark">
				    <tr>
						<th scope="col">#</th>
						<th scope="col">User Id</th>
						<th scope="col">Email</th>
						<th scope="col">Mobile No</th>
						<th scope="col">Address</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$count = 0;

						$con = mysqli_connect("localhost","root","","dbtyproject");
						$res = mysqli_query($con,"select * from `users`") or die(mysqli_error($con));
						
						while ($data = @mysqli_fetch_array($res)) {
							$count++;
							echo "
								<tr>
									<th scope='row'>$count</th>
									<td>$data[1]</td>
									<td>$data[3]</td>
									<td>$data[4]</td>
									<td>$data[5]</td>
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