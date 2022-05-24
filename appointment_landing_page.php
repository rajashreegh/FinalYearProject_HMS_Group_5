<?php

session_start();

$name = $_SESSION['patient_name'];

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Apppointment Landing Page | CareVista Hospital</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/appointment_lp.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Outfit:wght@400;500&family=Roboto+Slab:wght@400;500&display=swap" rel="stylesheet">

	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
</head>
<body>
	<?php include 'includes/patient_navbar.php';?>

	<div id="checkup-block">
		<div class="box">
			<img src="IMAGES/img4/checkup.jpg">
			<div class="content">
				<h4>Regular Checkup</h4>
				<p class="lines">Regular checkups and treatment can keep you healthy forever!</p>
			</div>
		</div>
		<div class="click">
			<a href="departments.php"><img src="IMAGES/img4/clickme.jpg"></a>
		</div>
	</div>


	<div id="labtest-block">
		<div class="box" style="float:right;">
			<img src="IMAGES/img4/labtest.jpg">
			<div class="content">
				<h4>Book your LabTest</h4>
				<p class="lines">Get yourself tested at regular intervals..!!</p>
			</div>
		</div>
		<div class="click">
			<a href="labtest_available.php"><img src="IMAGES/img4/clickme.jpg"></a>
		</div>
	</div>

	<div id="footer">
		<div id="footer-info">
			<h5><i class="fas fa-phone-alt"></i> 225-336-336</h5>
			<h5><i class="fas fa-at"></i> carevista@gmail.com</h5>
		</div>
	</div>


	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>