<?php

session_start();

$name = $_SESSION['admin_name'];

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Page | Miscellaneous</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/admin_dashboard.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link href="https://fonts.googleapis.com/css2?family=Passions+Conflict&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Kings&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital@1&display=swap" rel="stylesheet">

	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>

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
						<h4>Blood Bank Management</h4>
						<a href="bbank_management.php" class="btn btn-dark">Visit</a>
					</div>
					<div class="functions" style="background-color: #f0efeb;">
						<h4>Vaccination Management</h4>
						<a href="vaccination_management.php" class="btn btn-dark">Visit</a>
					</div>
					<div class="functions" style="background-color: #f0efeb;">
						<h4>Organ Donation Management</h4>
						<a href="organ_donation_management.php" class="btn btn-dark">Visit</a>
					</div>
					<div class="functions" style="background-color: #f0efeb;">
						<h4>Inventory Management</h4>
						<a href="inventory_management_dashboard.php" class="btn btn-dark">Visit</a>
					</div>
					<div class="functions" style="background-color: #f0efeb;">
						<h4>Add Health Card Schemes</h4>
						<a href="add_health_card_schemes_dashboard.php" class="btn btn-dark">Visit</a>
					</div>
					<div class="functions" style="background-color: #f0efeb;">
						<h4>Lab Tests Management</h4>
						<a href="lab_test_management_dashboard.php" class="btn btn-dark">Visit</a>
					</div>
					<a href="admin_dashboard.php" class="btn btn-dark" style="position: absolute;
    					right: 114px;bottom: 73px;">
    					<i class="fas fa-chevron-circle-left" style="font-size:27px; "></i>
    				</a>
				</div>
			</div>
		</div>
	</div>



	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>