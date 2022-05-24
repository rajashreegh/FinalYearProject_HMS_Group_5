<?php

session_start();

$name = $_SESSION['patient_name'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Individual Policy | CareVista</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/individual_policy.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Outfit:wght@400;500&family=Roboto+Slab:wght@400;500&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,500;1,500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+P+One&family=Signika+Negative:wght@600&display=swap" rel="stylesheet">

	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
</head>
<body>

	<?php include 'includes/patient_navbar.php';?>

	<div id="box">
		<div id="key_features">
			<div id="common_pts">
				<i class="fas fa-hand-point-right"></i>This kind of health insurance for individuals offers cover only for the insured individual [Age: 18 - 59].<br>
				<i class="fas fa-hand-point-right"></i>The insurance provider covers certain medical costs of the insured based on the premium paid.<br>
				<i class="fas fa-hand-point-right"></i>Hospitalization- The policy covers hospitalization charges.<br>
				<i class="fas fa-hand-point-right"></i>Lifetime renewal.<br>
				<i class="fas fa-hand-point-right"></i>Tax deductions under section 80D of the Income Tax act.<br>
				<i class="fas fa-hand-point-right"></i>Covers surgery costs, room rent, physician’s fee and laboratory tests.<br>
				<i class="fas fa-hand-point-right"></i>The insured has to pay a predetermined amount for certain health care services. This is called co-payment.<br>
				<i class="fas fa-hand-point-right"></i>Pre and post hospitalization expenses are covered under this plan.<br>
			</div>
			<div id="diff">
				<div id="non_premium">
					<h3>Non-Premium</h3>
					<i class="fas fa-hand-point-right"></i>Covid-19 is not included.<br>
					<i class="fas fa-hand-point-right"></i>No extra facilities<br>
				</div>
				<hr>
				<div id="premium">
					<h3>Premium</h3>
					<i class="fas fa-hand-point-right"></i>Covid-19 is included.<br>
					<i class="fas fa-hand-point-right"></i>10% discount on all medicines brought from us after paying premium for 1 year.<br>
					<i class="fas fa-hand-point-right"></i>Full body checkup for free after paying premium for 3 years.<br>
				</div>
			</div>
		</div>
	</div>


	<div id="exclusions">
		<h3>Points to keep in mind - [EXCLUSIONS] </h3>
		<i class="fas fa-exclamation-circle"></i>Can be claimed once a year.<br>
		<i class="fas fa-exclamation-circle"></i>25% of the ICU charges can be cleared from this policy. Rest of the amount incurred from the ICU, has to be paid.<br>
		<i class="fas fa-exclamation-circle"></i>Pre-medical screening required before availing this policy. Once found, you can go for CRITICAL CARE PLAN.<br>
	</div>

	<div id="policy">

		<?php

		require "db_config.php";

		$query="SELECT * FROM health_card_schemes WHERE scheme_category LIKE 'Individual'";
		$result=mysqli_query($conn,$query);
		while($row=mysqli_fetch_assoc($result)){
			echo '<div class="scheme">
						<h3>'.$row['scheme_name'].'</h3>
						<h5>Covers upto '.$row['coverage'].' <br><span style="color:red;">'.$row['scheme_type'].'</span> </h5>
						<h2>Rs. <span style="font-style: italic;color: darkgreen;">'.$row['premium_yearly'].'</span> annually</h2>
						<a href="indiv_hcs_apply_form.php?s_id='.$row['scheme_id'].'" class="btn btn-dark btn-block">Apply</a>
				</div>';
		}

		?>
		
	</div>


	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>