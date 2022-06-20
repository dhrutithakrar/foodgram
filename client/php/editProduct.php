<?php
	$name = $_POST['name'];
	$category = $_POST['category'];
	$price = $_POST['price'];
	$id = $_POST['id'];

	$con = mysqli_connect("localhost","root","","dbtyproject");
	
	$target_path = "../productimg/";
	if (basename($_FILES['fileToUpload']['name']) == '') {
		mysqli_query($con,"update `product` set `name` = '$name',`category` = '$category',`price`= $price where `id` = $id") or die(mysqli_error($con));
	}
	else{
		$target_path = $target_path.basename($_FILES['fileToUpload']['name']);
		$path = "productimg/".basename($_FILES['fileToUpload']['name']);
		if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_path))
		{
		    echo "File uploaded successfully!";  
		}
		$res = mysqli_query($con,"update `product` set `name` = '$name',`category` = '$category',`price`=$price,`img`='$path' where `id` = $id") or die(mysqli_error($con));
	}
						
	echo "
			<script type='text/javascript'>
				alert('$res');
			</script>		
		";
	header("location:../Product.php");
?>