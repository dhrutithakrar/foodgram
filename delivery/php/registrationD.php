<?php 
	
	$username = $_POST['username'];
	$emailaddress = $_POST['EmailAddress'];
	$password = $_POST['password'];
	$cat = $_POST['cat'];
	$tel = $_POST['tel'];

	$con = mysqli_connect("localhost","root","","dbtyproject");
	$res = mysqli_query($con,"select * from `delivery_person` where `email` = '$emailaddress'") or die(mysqli_error($con));
	if (mysqli_num_rows($res) > 0 ) 
	{
		echo "
			<script type='text/javascript'>
				alert('This Email already Taken');
				 window.location.replace(\"../registrationD.php\");
			</script>
			";
	}
	else
	{
		$target_path = "../DeliveryProfilePic/";  
		$target_path = $target_path.basename( $_FILES['fileToUpload']['name']);   
		$path = "delivery/DeliveryProfilePic/".basename( $_FILES['fileToUpload']['name']);
		if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_path)) {  
		    echo "File uploaded successfully!";  
		} else{  
		    echo "Sorry, file not uploaded, please try again!";  
		}  

		mysqli_query($con,"insert into `delivery_person` (`person_name`,`email`,`password`,`city`,`img`,`mobile`) values('$username','$emailaddress','$password','$cat','$path','$tel')") or die(mysqli_error($con));
		header("location: ../index.php");
	}
?>