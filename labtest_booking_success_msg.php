<?php

session_start();

$name = $_SESSION['patient_name'];
$patient_id = $_SESSION['patient_id'];

$booking_id=$_GET['booking_id'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>LabTest Booking Success | CareVista</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/labtest_bkng_success.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Outfit:wght@400;500&family=Roboto+Slab:wght@400;500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@1,700&display=swap" rel="stylesheet">

</head>
<body>

	<?php include 'includes/patient_navbar.php';?>

	<div id="msg-box">
		<img src="IMAGES/img4/schedule.png">
		<h3>Appointment Successfully Booked...</h3>
		<h4 id="thank-you">Thank You !!!</h4>
		<div id="bkng-info">
			<h5>Booking ID: <?php echo "$booking_id"; ?></h5>
			<h4>Call <span id="call-no">225-333-337</span> for booking time</h4>
		</div>
		<a href="patient_dashboard.php" class="btn btn-success btn-block" style="margin-top: 15px;">OK</a>
	</div>




	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>