<?php

session_start();

$name = $_SESSION['patient_name'];
$patient_id = $_SESSION['patient_id'];

$b_id=$_GET['b_id'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Payment Success | CareVista</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/checkup_booking_success.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Outfit:wght@400;500&family=Roboto+Slab:wght@400;500&display=swap" rel="stylesheet">
	
	<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">

	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
</head>
<body>

	<?php include 'includes/patient_navbar.php';?>

	<div class="ch-booking-confirmation-page">
		<div class="ch-booking-confirmed">
			<i class="ch-booking-pace-icon text-success far fa-check-circle"></i>
			<h5>
				<i style="font-family: 'Dancing Script', cursive;font-size: 2.7rem;">Hey, <?php echo "$name"; ?></i>
			</h5>
			<h3 class="text-center" style="font-family: 'Cookie', cursive;font-size: 6.4rem;">
				Your Payment is Successful !!
			</h3>
			<p>
				<a href="download_checkup_booking_receipt.php?b_id=<?php echo "$b_id"; ?>" 
					target="_blank">
					Download your booking receipt
				</a>
			</p>
			<a href="patient_dashboard.php" class="btn btn-lg btn-success">Back to Dashboard</a>
			<p id="alert">** Carry your booking receipt on the day</p>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>