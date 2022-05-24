<?php

session_start();

$name = $_SESSION['patient_name'];
$p_id = $_SESSION['patient_id'];

require 'db_config.php';
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>My Blood Analysis Reports</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/my_report_ba.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Outfit:wght@400;500&family=Roboto+Slab:wght@400;500&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@1,600&family=Righteous&family=Secular+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@600&display=swap" rel="stylesheet">


	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
</head>
<body>

	<?php include 'includes/patient_navbar.php';?>

	<?php

	$query="SELECT * FROM labtest_report_ba l INNER JOIN test_bookings t 
			ON l.booking_id=t.booking_id 
			INNER JOIN labtest b ON t.test_id=b.id
			WHERE t.booker_id='$p_id'";
	$result=mysqli_query($conn,$query);

	while($row=mysqli_fetch_assoc($result)){
		echo '<div class="box">
					<div class="test">
						<div class="card test_left border-info">
							<h2>Booking ID: '.$row['booking_id'].'</h2>
							<h3>'.$row['test_name'].'</h3>';

							$date_frmttd=date("d-m-Y", strtotime($row['date']));
					echo	'<h4>Date: '.$date_frmttd.'</h4>';

					echo	'<i class="fas fa-eye view"></i>
						</div>
						<div class="test_right card text-white bg-info hidden">
							<h3>Email: '.$row['patient_mail_id'].'</h3>
							<h3>Contact No. : '.$row['patient_contact_number'].'</h3>
							<h2>Amount: Rs. '.$row['amount'].'/-</h2>
							<h1>Report: <a href="download_ba_report.php?b_id='.$row['booking_id'].'"> View your report </a></h1>
							<i class="fas fa-times cross"></i>
						</div>
					</div>
				</div>';
	}

	?>
	

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<script type="text/javascript" src="js/my_report_ba.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>