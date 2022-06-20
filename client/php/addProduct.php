<?php 
	if (isset($_POST["submit"])) 
	{
		session_start();
		
		$name = $_POST["name"];
		$category = $_POST["category"];
		$price = $_POST["price"];

		$target_path = "../productimg/";  
		$target_path = $target_path.basename($_FILES['fileToUpload']['name']);   
		$path = "productimg/".basename( $_FILES['fileToUpload']['name']);
		if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_path)) {  
		    echo "File uploaded successfully!";  
		} else{  
		    echo "Sorry, file not uploaded, please try again!";  
		}  

		$con = mysqli_connect("localhost","root","","dbtyproject");
		$res = mysqli_query($con,"insert into `product` (`name`,`u_id`,`category`,`price`,`img`) values('$name','".$_SESSION['client']."','$category','$price','$path')") or die(mysqli_error($con));
			
		echo "
			<script type='text/javascript'>
				alert('$res');
			</script>		
		";
		header("location:../addProduct.php");
	}
?>

