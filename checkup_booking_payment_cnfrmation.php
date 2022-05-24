<?php

session_start();

$name = $_SESSION['patient_name'];
$patient_id = $_SESSION['patient_id'];

$booking_id=$_POST['b_id'];
$p_mode=$_POST['x'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Payment Confirmation | CareVista</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/checkup_booking_success.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Outfit:wght@400;500&family=Roboto+Slab:wght@400;500&display=swap" rel="stylesheet">
	
	<link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Quintessential&display=swap" rel="stylesheet">

	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
</head>
<body>

	<?php include 'includes/patient_navbar.php';?>	

	<?php

	require "db_config.php";

	$query="SELECT * FROM checkup_bookings WHERE booking_id LIKE '$booking_id'";
	$result=mysqli_query($conn,$query);
	$fetched_result=mysqli_fetch_assoc($result);

	$visit=$fetched_result['visit'];
	$p_num=$fetched_result['patient_number'];

	?>
	
	<div id="p_cnfrm_box">
		<div id="upper">
			<h3>Booking ID: <br><span id="b-id"><?php echo "$booking_id"; ?></span></h3>
			<div id="upper-right">
				<h2><?php echo "$name"; ?></h2>
				<h4>Mobile: <?php echo "$p_num"; ?></h4>
			</div>
		</div>
		<div id="middle-box">
			<h2>Mode of Payment: <span class="highlight" id="p_mode"><?php echo "$p_mode"; ?></span></h2>
			<h5>On rescheduling entire amount will be adjusted</h5>
		</div>
		<div id="lower-box">
			<h2>Amount to pay : Rs. <span class="highlight"><?php echo "$visit"; ?> /-</span></h2>
			<a href="checkup_payment_success.php?b_id=<?php echo "$booking_id"; ?>" class="btn btn-dark" id="p_cnfrm_btn">Confirm</a>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<script type="text/javascript" src="js/checkup_payment_success.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>