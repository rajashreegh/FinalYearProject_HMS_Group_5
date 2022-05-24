<?php

session_start();

$name = $_SESSION['admin_name'];

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Page</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/admin_dashboard.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link href="https://fonts.googleapis.com/css2?family=Passions+Conflict&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Kings&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital@1&display=swap" rel="stylesheet">

</head>
<body>
	<div id="bg-box">
		<div id="content-box">
			<div id="top-bar">
				<h2>Welcome !!! <?php echo "$name"; ?></h2>
				<a href="logout.php" class="btn btn-light">Logout</a>
			</div>
			<div id="lower-bar">
				<div id="side-bar">
					<h1>DASHBOARD</h1>
				</div>
				<div id="content-bar">
					<div class="functions" style="background-color: #f0efeb;">
						<h4>Add/View/Update <br> Doctor Details</h4>
						<a href="add_view_update_dctr_details.php" class="btn btn-dark">Visit</a>
					</div>
					<div class="functions" style="background-color: #f0efeb;">
						<h4>View Patient Details</h4>
						<a href="view_patient_details.php" class="btn btn-dark">Visit</a>
					</div>
					<div class="functions" style="background-color: #f0efeb;">
						<h4>Admit Patient</h4>
						<a href="admit_patient.php" class="btn btn-dark">Visit</a>
					</div>
					<div class="functions" style="background-color: #f0efeb;">
						<h4>Generate Bills</h4>
						<a href="generate_bills.php" class="btn btn-dark">Visit</a>
					</div>
					<div class="functions" style="background-color: #f0efeb;">
						<h4>Generate lab test report</h4>
						<a href="generate_lab_report.php" class="btn btn-dark">Visit</a>
					</div>
					<div class="functions" style="background-color: #f0efeb;">
						<h4>Miscellaneous</h4>
						<a href="admin_dashboard_2.php" class="btn btn-dark">Visit</a>
					</div>
				</div>
			</div>
		</div>
	</div>



	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>