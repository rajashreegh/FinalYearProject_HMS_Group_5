<?php

session_start();

$name = $_SESSION['patient_name'];
$patient_id = $_SESSION['patient_id'];

$booking_id=$_GET['b_id'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Payment options | CareVista</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/checkup_booking_success.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Outfit:wght@400;500&family=Roboto+Slab:wght@400;500&display=swap" rel="stylesheet">
	
	<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Satisfy&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Teko:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Dongle&display=swap" rel="stylesheet">

	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
</head>
<body>

	<?php include 'includes/patient_navbar.php';?>	

	<div class="payment-page">
		<h3 style="font-family: 'Permanent Marker', cursive;font-size: 2.3rem;margin-bottom: 22px;">Mode of Payment :</h3>

		<form action="checkup_booking_payment_cnfrmation.php" method="POST">
			
			<div class="modes">
				<input type="radio" name="x" value="credit card" id="cc"><label for="cc" class="bold">Credit Card</label><i class="icon fas fa-credit-card"></i><hr>
				<input type="radio" name="x" value="debit card" id="dc"><label for="dc" class="bold">Debit Card</label><i class="icon fab fa-cc-visa"></i><hr>
				<input type="radio" name="x" value="UPI" id="upi"><label for="upi" class="bold">UPI</label><i class="icon fab fa-cc-paypal"></i><hr>
				<input type="radio" name="x" value="Amazon pay" id="ap"><label for="ap" class="bold">Amazon Pay</label><i class="icon fab fa-cc-amazon-pay"></i><hr>
				<input type="radio" name="x" value="Net Banking" id="nb"><label for="nb" class="bold">Net Banking</label><i class="icon fas fa-money-check-alt"></i><hr>
			</div>

			<!-- so that we can retrieve the value of order id on the next page -->
			<input type="hidden" name="b_id" value="<?php echo $booking_id; ?>" id="b_id">
			
			<input type="submit" class="btn btn-primary btn-block" value="Proceed" id="payment_proceed_btn">

		</form>
	</div>


	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>