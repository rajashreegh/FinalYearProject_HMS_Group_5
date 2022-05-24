<?php

session_start();

$name=$_SESSION['admin_name'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Active Health Scheme Users</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/active_hcs_users.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Passions+Conflict&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@600&display=swap" rel="stylesheet">

	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
</head>
<body>

	<?php include 'includes/admin_navbar.php'?>

	<?php

	require 'db_config.php';

	$query1="SELECT COUNT(*) AS num FROM applicants_hcs a INNER JOIN health_card_schemes h 
			ON a.s_id = h.scheme_id 
			WHERE h.scheme_category LIKE 'Individual' 
			AND a.status LIKE 'Approved' AND a.current_status LIKE 'Active'";
	$fetched_result1=mysqli_fetch_assoc(mysqli_query($conn,$query1));
	$individual = $fetched_result1['num'];

	$query2="SELECT COUNT(*) AS num FROM applicants_hcs a INNER JOIN health_card_schemes h 
			ON a.s_id = h.scheme_id 
			WHERE h.scheme_category LIKE 'Family' 
			AND a.status LIKE 'Approved' AND a.current_status LIKE 'Active'";
	$fetched_result2=mysqli_fetch_assoc(mysqli_query($conn,$query2));
	$family = $fetched_result2['num'];

	$query3="SELECT COUNT(*) AS num FROM applicants_hcs a INNER JOIN health_card_schemes h 
			ON a.s_id = h.scheme_id 
			WHERE h.scheme_category LIKE 'Senior Citizen' 
			AND a.status LIKE 'Approved' AND a.current_status LIKE 'Active'";
	$fetched_result3=mysqli_fetch_assoc(mysqli_query($conn,$query3));
	$senior = $fetched_result3['num'];

	$query4="SELECT COUNT(*) AS num FROM applicants_hcs a INNER JOIN health_card_schemes h 
			ON a.s_id = h.scheme_id 
			WHERE h.scheme_category LIKE 'Critical Care' 
			AND a.current_status LIKE 'Active'";
	$fetched_result4=mysqli_fetch_assoc(mysqli_query($conn,$query4));
	$critical = $fetched_result4['num'];

	?>
	<div id="category_box">
		<div class="category">
			<h3>Individual Plan</h3>
			<h1><?php echo $individual; ?></h1>
			<a href="active_hcs_user_details.php?card_id=1"><i class="fas fa-hand-point-up"></i></a>
		</div>
		<div class="category">
			<h3>Famliy Plan</h3>
			<h1><?php echo $family; ?></h1>
			<a href="active_hcs_user_details.php?card_id=2"><i class="fas fa-hand-point-up"></i></a>
		</div>
		<div class="category" style="margin-left:23%; ">
			<h3>Senior Citizen Plan</h3>
			<h1><?php echo $senior; ?></h1>
			<a href="active_hcs_user_details.php?card_id=3"><i class="fas fa-hand-point-up"></i></a>
		</div>
		<div class="category">
			<h3>Critical Care Plan</h3>
			<h1><?php echo $critical; ?></h1>
			<a href="active_hcs_user_details.php?card_id=4"><i class="fas fa-hand-point-up"></i></a>
		</div>
	</div>

	<a href="add_health_card_schemes_dashboard.php"><i class="fas fa-chevron-circle-left" id="back_arrrow"></i></a>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>