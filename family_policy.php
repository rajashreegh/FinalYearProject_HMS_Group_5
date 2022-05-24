<?php

session_start();

$name = $_SESSION['patient_name'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Family Policy | CareVista</title>
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


<style type="text/css">
	
#box{
	height: 105vh;
}
hr{
	top: 78%;
}
#exclusions{
	width: 70%;
	height: 65vh;
}
.scheme{
	width: 32%;
    height: 75%;
}

</style>


<body>

	<?php include 'includes/patient_navbar.php';?>

	<div id="box">
		<div id="key_features">
			<div id="common_pts">
				<i class="fas fa-hand-point-right"></i>This kind of health insurance for individuals offers cover for all the family members registered. [MAXIMUM 4]<br>
				<i class="fas fa-hand-point-right"></i>This scheme includes the person who is buying the policy, his/her spouse, 2 children <br>(AGE LESS THAN 18)<br>
				<i class="fas fa-hand-point-right"></i>Hospitalization- Any medical expenses incurred on hospitalization due to an illness or accidental injury is covered.<br>
				<i class="fas fa-hand-point-right"></i>Maternity Cover– Most family health insurance plans come with maternity cover that covers pregnancy-related expenses and newborn baby expenses.<br>
				<i class="fas fa-hand-point-right"></i>Tax deductions under section 80D of the Income Tax act.<br>
				<i class="fas fa-hand-point-right"></i>Covers surgery costs, room rent, physician’s fee and laboratory tests.<br>
				<i class="fas fa-hand-point-right"></i>Mental Illness Cover– Most family health insurance plans provide coverage for mental diseases, such as depression, anxiety, schizophrenia, etc.<br>
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
					<i class="fas fa-hand-point-right"></i>Full body checkup [ADULTS ONLY] for free after paying premium for 3 years.<br>
				</div>
			</div>
		</div>
	</div>


	<div id="exclusions">
		<h3>Points to keep in mind - [EXCLUSIONS] </h3>
		<i class="fas fa-exclamation-circle"></i>Can be claimed once a year for each member.<br>
		<i class="fas fa-exclamation-circle"></i>25% of the ICU charges can be cleared from this policy. Rest of the amount incurred from the ICU, has to be paid.<br>
		<i class="fas fa-exclamation-circle"></i>Pre-medical screening required for all the members before availing this policy. Once found, you can go for CRITICAL CARE PLAN.<br>
		<i class="fas fa-exclamation-circle"></i>Treatment that was taken overseas will not be paid unless it is included in the plan.<br>
		<i class="fas fa-exclamation-circle"></i>Any illness or injury resulting due to war conditions, nuclear reaction, etc. is not included.<br>
		<i class="fas fa-exclamation-circle"></i>Injury or illness due to participation in unethical or criminal activities will not be covered.<br>
		<i class="fas fa-exclamation-circle"></i>Pregnancy or childbirth-related complications are not covered (unless mentioned in the plan)like voluntary termination of pregnancy, miscarriage or abortion, etc. <br>
		<i class="fas fa-exclamation-circle"></i>OPD treatments and routine medical check-ups ARE NOT COVERED.<br>
		<i class="fas fa-exclamation-circle"></i>Expenses incurred on any aesthetic treatment or plastic surgeries will not be paid.<br>
	</div>

	<div id="policy">

		<?php

		require "db_config.php";

		$query="SELECT * FROM health_card_schemes WHERE scheme_category LIKE 'Family'";
		$result=mysqli_query($conn,$query);
		while($row=mysqli_fetch_assoc($result)){
			echo '<div class="scheme">
						<h3>'.$row['scheme_name'].'</h3>
						<h5>Covers upto '.$row['coverage'].' <br><span style="color:red;">'.$row['scheme_type'].'</span> </h5>
						<h2>Rs. <span style="font-style: italic;color: darkgreen;">'.$row['premium_yearly'].'</span> annually</h2>
						<a href="family_hcs_apply_form.php?s_id='.$row['scheme_id'].'" 
							class="btn btn-dark btn-block">Apply</a>
				</div>';
		}

		?>
		
	</div>


	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>