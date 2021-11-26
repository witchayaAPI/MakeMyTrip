<?php require_once('connect.php'); ?>
<html>
<head>
<title>Book hotel</title>
<link rel="stylesheet" href="table.css">

</head>
<body>
<?php
    $hotel_id = $_GET['hid'];
    $user_id = $_GET['uid'];
?>
<h1>MakeMyTrip</h1>
<h2>Book hotel</h2>
<div class="table-wrapper">
<form action="confirm_book.php" method="post">
<div>
<label for="adult">Number of adult: </label>
</div>
<div>
<select id="adult" name="adult">
<option value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
</select>
</div>
<div>
<label for="children">Number of children</label>
</div>
<div>
<select id="children" name="children">
<option value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
</select>
</div>
<div>
<label for="fromdate">From date: </label>
</div>
<div>
<input type="date" id="fromdate" name="fromdate">
</div>
<div>
<label for="todate">To date: </label>
</div>
<div>
<input type="date" id="todate" name="todate">
</div>
<div>
<label for="request">Request: </label>
</div>
<div>
<input type="text" id="request" name="request">
</div>
<?php
$today = date("y.m.d");
?>
<input type="hidden" id="user_id" name="uid" value=<?=$user_id?>>
<input type="hidden" id="hotel_id" name="hid" value=<?=$hotel_id?>>
<input type="hidden" id="booking_dt" name="booking_dt" value=<?=$today?>>
<div>
<input type="submit" value="Book new" id="book" name="book">
</div>
</div>
</form>
</body>
</html>