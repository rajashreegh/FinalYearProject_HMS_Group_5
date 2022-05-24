<?php

session_start();
$name=$_SESSION['admin_name'];

require 'db_config.php';
$test_id=$_GET['test_id'];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Normal Range</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/ltm_dashboard.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Passions+Conflict&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@600;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@600&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&display=swap" rel="stylesheet">
	

	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
</head>
<body>

	<?php include 'includes/admin_navbar.php'?>

	<?php

	$query="SELECT * FROM labtest WHERE id='$test_id'";
	$result=mysqli_query($conn,$query);
	$fetched_result=mysqli_fetch_assoc($result);
	$test_name=$fetched_result['test_name'];
	$male_min=$fetched_result['male_min'];
	$male_max=$fetched_result['male_max'];
	$female_min=$fetched_result['female_min'];
	$female_max=$fetched_result['female_max'];
	$test_unit=$fetched_result['unit'];

	?>

	<h2 id="heading">Normal Range for <?php echo $test_name; ?>: </h2>

	<table id="nrml_range_table">
		<tr>
			<th colspan="2">MALE</th>
			<th colspan="2">FEMALE</th>
			<th rowspan="2">Unit</th>
		</tr>
		<tr>
			<th>Minimum</th>
			<th>Maximum</th>
			<th>Minimum</th>
			<th>Maximum</th>
		</tr>
		<tr>
			<td><?php echo $male_min; ?></td>
			<td><?php echo $male_max; ?></td>
			<td><?php echo $female_min; ?></td>
			<td><?php echo $female_max; ?></td>
			<td><?php echo $test_unit; ?></td>
		</tr>
	</table>

	<a href="lab_test_management_dashboard.php"><i class="fas fa-chevron-circle-left" id="back_arrrow"></i></a>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>