<?php require_once('connect.php'); ?> 
<!DOCTYPE html>
<html>
<head>
<title>Reviews</title>
</head>
<body>
<div> 
	<div>
		Makemytrip 
	</div>
	<div>
			<a href="register.html">Register</a>
			<a href="index.php">Login</a>
			<a href="hotel.php">Hotel List</a>
			<a href="add_review.html">Add Review</a>
			<a href="review.php">Show Review</a>
			<a href="admin.php">Admin</a>		
	</div>
	<div>
		<div>
			<!--%%%%% Main block %%%%-->
			<?php 
				if(isset($_POST['submit'])) {
					$groupcode = $_POST['groupcode'];
					$groupname = $_POST['groupname'];
					$remark = $_POST['remark'];
					$url = $_POST['url'];

					$q="INSERT INTO USERGROUP(USERGROUP_CODE,USERGROUP_NAME,USERGROUP_REMARK,USERGROUP_URL) VALUES ('$groupcode','$groupname','$remark','$url');";
					$result=$mysqli->query($q);
					if(!$result){
						echo "INSERT failed. Error: ".$mysqli->error ;
						return false;
					}
				}
			?>
			<h2>Reviews</h2>			
			<table>
                <col width="12.5%">
                <col width="12.5%">
                <col width="12.5%">
                <col width="12.5%">
                <col width="12.5%">
                <col width="12.5%">
				<col width="12.5%">
				<col width="12.5%">
                <tr>
                    <th>Hotel Code</th> 
                    <th>Hotel Name</th>
                    <th>Reviewer Name</th>
                    <th>Rating</th>
                    <th>Header</th>
                    <th>Body</th>
                    <th>Date</th>
                    <th>Traveller Type</th>
                </tr>
				 <?php
				 	$q="select h.hotel_name,r.* from review as r, hotel as h where h.hotel_id=r.hotel_id";
					$result=$mysqli->query($q);
					if(!$result){
						echo "Select failed. Error: ".$mysqli->error ;
						return false;
					}
				 while($row=$result->fetch_array()){ ?>
                 <tr>
                    <td><?=$row['hotel_id']?></td> 
                    <td><?=$row['hotel_name']?></td>
                    <td><?=$row['reviewer_name']?></td>
                    <td><?=$row['rating']?></td>
					<td><?=$row['head']?></td>
					<td><?=$row['body']?></td>
					<td><?=$row['review_dt']?></td>
					<td><?=$row['traveller_type']?></td>
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

