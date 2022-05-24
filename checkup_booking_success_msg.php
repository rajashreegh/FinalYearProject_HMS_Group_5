<?php

session_start();

$name = $_SESSION['patient_name'];
$patient_id = $_SESSION['patient_id'];

$booking_id=$_GET['bkng_id'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Checkup Booking Success | CareVista</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/checkup_booking_success.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Outfit:wght@400;500&family=Roboto+Slab:wght@400;500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Teko:wght@600&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">

	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
</head>
<body>

	<?php include 'includes/patient_navbar.php';?>

	<div id="main-box">
		<div class="success-box">
			<img src="IMAGES/img4/tick.png">
			<i class="fas fa-chevron-circle-right" id="right-btn"></i>
			<h3 id="success">SUCCESS !!!</h3>
			<h5 id="thanks"><i class="fas fa-praying-hands" style="margin-right:20px"></i>Thank You for choosing us<i class="fas fa-praying-hands" style="margin-left:20px"></i></h5>
			<h3 id="call">CALL - <span id="num">225-336-336</span> for any query</h3>
			<a href="patient_dashboard.php" class="btn btn-success btn-block">OK</a>

			<div class="info-box">

				<?php

				require "db_config.php";

				$query="SELECT * FROM checkup_bookings c 
						INNER JOIN doctor_login d ON c.doc_id=d.doctor_id 
						INNER JOIN departments e ON c.dept_id=e.dept_id 
						WHERE c.booking_id='$booking_id' AND c.status='Incomplete'";
				$result=mysqli_query($conn,$query);
				$fetched_result=mysqli_fetch_assoc($result);

				$bid=$fetched_result['booking_id'];
				$p_name=$fetched_result['booking_done_for'];
				$p_num=$fetched_result['patient_number'];

				$doc_name=$fetched_result['doctor_name'];
				$dept_name=$fetched_result['dept_name'];
				
				$date=$fetched_result['date'];
				$newDate = date("d-m-Y", strtotime($date));
				$time=$fetched_result['time'];
				$visit=$fetched_result['visit'];

				?>

				<div id="upper">
					<h3>Booking ID: <br><span id="b-id"><?php echo "$bid"; ?></span></h3>
					<div id="upper-right">
						<h2><?php echo "$p_name"; ?></h2>
						<h4>Mobile: <?php echo "$p_num"; ?></h4>
					</div>
				</div>
				<div id="middle">
					<h2><?php echo "$doc_name"; ?></h2>
					<h4>Consultant - <?php echo "$dept_name"; ?></h4>
				</div>
				<div id="lower">
					<h5>Date: <?php echo "$newDate"; ?></h5>
					<h5>Time: <?php echo "$time"; ?></h5>
					<h5>Visit: <?php echo "$visit"; ?></h5>
				</div>
				<a href="pay_bill_dashboard.php" 
					class="btn btn-primary" id="pay-btn">Pay Now</a>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<script type="text/javascript" src="js/checkup_booking_success_msg.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>