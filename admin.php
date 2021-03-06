<?php require_once('connect.php'); ?> 
<!DOCTYPE html>
<html>
<head>
<title>Admin Page</title>
<link rel="stylesheet" href="table.css">
</head>
<body>
<?php
if(isset($_POST['add_hotel'])){
	$name = $_POST['name'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$country = $_POST['country'];
	$zip = $_POST['zip'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$website = $_POST['website'];
	$rating = $_POST['rating'];
	$q="INSERT INTO Hotel (hotel_name, hotel_address, hotel_city, hotel_country, hotel_zip, hotel_phone, hotel_email, hotel_website, hotel_rating)
		VALUES ('$name', '$address', '$city', '$country', '$zip', '$phone', '$email', '$website', '$rating')";
	$result=$mysqli->query($q);
	if(!$result){
		echo "INSERT failed. Error: ".$mysqli->error;
		return false;
	}
}	
?>
<div> 
	<div>
		MakeMyTrip 
	</div>
	<div>
			<a href="register.php">Register</a>
			<a href="index.php">Login</a>
			<a href="hotel.php">Hotel List</a>
			<a href="add_review.php">Add Review</a>
			<a href="review.php">Show Review</a>
			<a href="admin.php">Admin</a>
			<a href="add_hotel.php">Add Hotel</a>		
	</div>
	<div>
		<div class="table-wrapper">
			<!--%%%%% Main block %%%%-->
			<h2>Hotels List</h2>			
			<table class="fl-table">
                <col width="10%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
				<col width="10%">
				<col width="10%">
				<col width="10%">
				<col width="10%">

                <tr>
                    <th>Hotel Code</th> 
                    <th>Hotel Name</th>
                    <th>City</th>
                    <th>Country</th>
					<th>Phone</th>
					<th>Email</th>
					<th>Website</th>
					<th>Rating</th>
                </tr>
				 <?php
				 	$q="select * from Hotel";
					$result=$mysqli->query($q);
					if(!$result){
						echo "Select failed. Error: ".$mysqli->error ;
						return false;
					}
				 while($row=$result->fetch_array()){ ?>
                 <tr>
                    <td><?=$row['hotel_id']?></td> 
                    <td><?=$row['hotel_name']?></td>
                    <td><?=$row['hotel_city']?></td>
					<td><?=$row['hotel_country']?></td>
					<td><?=$row['hotel_phone']?></td>
					<td><?=$row['hotel_email']?></td>
					<td><?=$row['hotel_website']?></td>
					<td><?=$row['hotel_rating']?></td>
                    <td><a href='edithotel.php?hid=<?=$row['hotel_id']?>'>Edit</a></td>
                    <td><a href='delinfo.php?hid=<?=$row['hotel_id']?>'>Delete</a></td>
                </tr>                               
				<?php } ?>

			<?php $count=$result->num_rows;
					echo "<tr><td colspan=6 align=right>Total $count records</td></tr>";
					$result->free();
			?>
            </table>
				 </div>
			<div class='table-wrapper'>
            <h2>Users List</h2>			
			<table class="fl-table">
                <col width="10%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
				<col width="10%">
				<col width="10%">
				<col width="10%">
				<col width="10%">

                <tr>
                    <th>User ID</th> 
                    <th>Title</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Password</th>
					<th>Phone</th>
					<th>Birthday</th>
					<th>Gender</th>
					<th>Country</th>
                </tr>
				 <?php
				 	$q="select * from User";
					$result=$mysqli->query($q);
					if(!$result){
						echo "Select failed. Error: ".$mysqli->error ;
						return false;
					}
				 while($row=$result->fetch_array()){ ?>
                 <tr>
                    <td><?=$row['user_id']?></td> 
                    <td><?=$row['title']?></td>
                    <td><?=$row['fname']?></td>
                    <td><?=$row['lname']?></td>
					<td><?=$row['email']?></td>
					<td><?=$row['password']?></td>
					<td><?=$row['phone_no']?></td>
					<td><?=$row['birthday']?></td>
					<td><?=$row['gender']?></td>
					<td><?=$row['country']?></td>
                    <td><a href='edituser.php?uid=<?=$row['user_id']?>'>Edit</a></td>
                    <td><a href='delinfo.php?uid=<?=$row['user_id']?>'>Delete</a></td>
                </tr>                               
				<?php } ?>

			<?php $count=$result->num_rows;
					echo "<tr><td colspan=6 align=right>Total $count records</td></tr>";
					$result->free();
			?>
            </table>
				 </div>
			<div class="table-wrapper">
            <h2>Booking List</h2>			
			<table class="fl-table">
                <col width="10%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
				<col width="10%">
				<col width="10%">
				<col width="10%">

                <tr>
                    <th>Booking ID</th> 
                    <th>User ID</th>
                    <th>Hotel ID</th>
                    <th>Adult</th>
                    <th>Children</th>
                    <th>Booking Date</th>
					<th>From</th>
					<th>To</th>
					<th>Request</th>
                </tr>
				 <?php
				 	$q="select * from Booking";
					$result=$mysqli->query($q);
					if(!$result){
						echo "Select failed. Error: ".$mysqli->error ;
						return false;
					}
				 while($row=$result->fetch_array()){ ?>
                 <tr>
                    <td><?=$row['booking_id']?></td> 
                    <td><?=$row['user_id']?></td>
                    <td><?=$row['hotel_id']?></td>
                    <td><?=$row['num_adult']?></td>
					<td><?=$row['num_children']?></td>
					<td><?=$row['booking_dt']?></td>
					<td><?=$row['from_date']?></td>
					<td><?=$row['to_date']?></td>
					<td><?=$row['request']?></td>
                    <td><a href='editbooking.php?bid=<?=$row['booking_id']?>'>Edit</a></td>
                    <td><a href='delinfo.php?bid=<?=$row['booking_id']?>'>Delete</a></td>
                </tr>                               
				<?php } ?>

			<?php $count=$result->num_rows;
					echo "<tr><td colspan=6 align=right>Total $count records</td></tr>";
					$result->free();
			?>
            </table>			
				
		</div> <!-- end div_content -->
		
	</div> <!-- end div_main -->

</div>
</body>
</html>


