<?php

session_start();

$name=$_SESSION['admin_name'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin | Vaccination Management | CareVista</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/bbank_management.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Passions+Conflict&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Neonderthaw&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@600&display=swap" rel="stylesheet">

	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
</head>
<body>

	<?php include 'includes/admin_navbar.php'?>

	<div id="box" style="margin-top: 6%;">
		<div class="req_box" style="width: 25%;">
			<i class="fas fa-pen-square" id="pen"></i>
			<h3>Upcoming<br> Appointments</h3>
			<a href="admin_vaccination_upcoming_appointments.php"><i class="fas fa-arrow-circle-right"></i></a>
		</div>
		<div class="req_box" style="width: 25%;">
			<i class="fas fa-check-circle" id="app"></i>
			<h3>Completed<br> Appointments</h3>
			<a href="admin_vaccination_approved_appointments.php"><i class="fas fa-arrow-circle-right"></i></a>
		</div>
		<div class="req_box" style="width: 25%;">
			<i class="fas fa-times-circle" id="rej"></i>
			<h3>Cancelled<br> Appointments</h3>
			<a href="admin_vaccination_cancelled_appointments.php"><i class="fas fa-arrow-circle-right"></i></a>
		</div>
	</div>



	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>