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
		<div class="row">
			<div class="col-md-6 mt-2">
				<form action="php/addCategory.php" method="post" id="myForm">
					<div class="form-inline">
						<div class="form-group">
				    		<label>Add Category :</label>
							<input type="text" required name="cname" class="form-control ml-5" placeholder="Enter Category">
						</div>
						<button type="submit" name="submit" class="btn btn-danger ml-2">Add</button>	
					</div>	
				</form>
			</div>
			<div class="col-md-3"></div>
		</div>
		<div class="row mt-5">
			<table class="table">
				<thead class="thead-dark">
				    <tr>
						<th scope="col">#</th>
						<th scope="col">Category Name</th>
						<th scope="col"></th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$count = 0;
						$con = mysqli_connect("localhost","root","","dbtyproject");
						$res = mysqli_query($con,"select * from `category` where `u_id` = '".$_SESSION['client']."'") or die(mysqli_error($con));
						while ($data = @mysqli_fetch_array($res)) {
							$count++;
							echo "
								<tr>
									<th scope='row'>$count</th>
									<td>$data[1]</td>
									<td><a href='php/delete.php?type=category&id=$data[0]' class='fa fa-trash text-danger'></a></td>
								</tr>
							";
						}
					?>
				</tbody>
			</table>
		</div>
	</div>

	<!-- Button trigger modal -->


<div class="modal fade" id="editData" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
        	<div class="form-inline">
				<div class="form-group">
		    		<label>Edit Category :</label>
					<input type="text" required name="editCname" class="form-control ml-5" placeholder="Enter Category" value="<?php echo $_GET['name']?>">
				</div>
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
	<script>
		document.getElementById("myForm").reset();
	</script>
</body>
</html>
