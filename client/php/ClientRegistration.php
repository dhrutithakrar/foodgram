<?php 
	$username = $_POST['username'];
	$emailaddress = $_POST['EmailAddress'];
	$password = $_POST['password'];
	$cat = $_POST['cat'];
	$dTime = $_POST['dTime'];
	$address = $_POST['address'];

	$target_path = "../uploads/";  
	$target_path = $target_path.basename( $_FILES['fileToUpload']['name']);   
	$path = "client/uploads/".basename( $_FILES['fileToUpload']['name']);
	if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_path)) {  
	    echo "File uploaded successfully!";  
	} else{  
	    echo "Sorry, file not uploaded, please try again!";  
	}  
	$con = mysqli_connect("localhost","root","","dbtyproject");
	$res = mysqli_query($con,"insert into `client` (`hotel_name`,`email`,`password`,`category`,`delivery_time`,`img`,`address`) values('$username','$emailaddress','$password','$cat','$dTime','$path','$address')") or die(mysqli_error($con));
	
	header("location: ../index.php");
?>