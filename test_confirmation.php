<?php

require "db_config.php";

session_start();

$name = $_SESSION['patient_name'];
$patient_id = $_SESSION['patient_id'];

$rcvd_name = $_POST['name'];
$rcvd_email = $_POST['email'];
$rcvd_nmbr = $_POST['number'];
$gender=$_POST['gender'];
$payment_mode = $_POST['payment_mode'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Patient Test Confirmation | CareVista</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/labtest_confirmation.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Outfit:wght@400;500&family=Roboto+Slab:wght@400;500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Yellowtail&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">

</head>
<body>

	<?php include 'includes/patient_navbar.php';?>

	<?php

	$query = "SELECT t.booking_id,t.amount,t.date,l.test_name,l.room_no,l.category
			  FROM test_bookings t INNER JOIN labtest l 
			  ON t.test_id=l.id 
			  WHERE t.booker_id LIKE '$patient_id' AND t.status LIKE 'Incomplete'";

	$result = mysqli_query($conn,$query);
	$fetched_result=mysqli_fetch_assoc($result);

	$booking_id=$fetched_result['booking_id'];
	$test_name=$fetched_result['test_name'];
	$room_no = $fetched_result['room_no'];
	$date = $fetched_result['date'];
	$amt = $fetched_result['amount'];

	$newDate = date("d-m-Y", strtotime($date));

	?>

	<div id="confirmation-box">
		<p id="mail-id" style="display:none;"><?php echo "$rcvd_email"; ?></p>
		<div id="content">
			<h3><span class="caption">Booking id: </span><span class="info" id="bkng-id"><?php echo "$booking_id"; ?></span></h3>
			<h3><span class="caption">Booking for: </span><span id="bkng-name" class="info"><?php echo "$rcvd_name"; ?></span></h3>
			<h4 id="test-name"><?php echo "$test_name"; ?></h4>
			<hr>
			<h4 class="date-room">Contact Number : <span id="mobile-nmbr"><?php echo "$rcvd_nmbr"; ?></span></h4>
			<h4 class="date-room">Date : <?php echo "$newDate"; ?></h4>
			<h5 class="date-room">Room No. : <?php echo "$room_no"; ?></h5>
			<h4 id="amount">Amount to be paid: <span id="money">Rs. <?php echo "$amt"; ?></span></h4>
			<h4 id="mode">Mode of Payment: <span id="p_mode"><?php echo "$payment_mode"; ?></span></h4>
			
			<a href="labtest_booking_success_msg.php?booking_id=<?php echo "$booking_id"; ?>" id="test-confirmation-btn" class="btn btn-warning btn-block">Confirm</a>
		</div>
		<input type="hidden" name="gender" id="gender" value="<?php echo "$gender"; ?>">
		<input type="hidden" name="payment_mode" id="payment_mode" value="<?php echo "$payment_mode"; ?>">
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script>
		console.log($('#payment_mode').val());
	</script>
	<script type="text/javascript" src="js/lab_test_confirmation.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>