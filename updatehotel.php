<?php
require_once('connect.php'); 
	if(isset($_POST['su'])) {
		$hotel_id=$_POST['hid'];
		$hotel_name = $_POST['hotel_name'];
		$hotel_address = $_POST['hotel_address'];
		$hotel_city = $_POST['hotel_city'];
		$hotel_country = $_POST['hotel_country'];
		$hotel_zip = $_POST['hotel_zip'];
		$hotel_phone = $_POST['hotel_phone'];
		$hotel_email = $_POST['hotel_email'];
		$hotel_website = $_POST['hotel_website'];
		$hotel_rating = $_POST['rating'];


		$q1="UPDATE Hotel SET hotel_name = '$hotel_name', hotel_address = '$hotel_address', 
		hotel_city = '$hotel_city', hotel_zip = '$hotel_zip' ,hotel_phone = '$hotel_phone',hotel_email = '$hotel_email',hotel_website = '$hotel_website',hotel_rating = '$hotel_rating' where hotel_id = '$hotel_id'";
		$result1=$mysqli->query($q1);
		if(!$result1){
			echo "INSERT failed. Error: ".$mysqli->error ;
			return false;
			}
		header("Location: admin.php");
	}
?>