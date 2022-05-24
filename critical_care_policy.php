<?php

session_start();

$name = $_SESSION['patient_name'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Critical Care Policy | CareVista</title>
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
	height: 95vh;
}
hr{
	top: 71%;
}
#exclusions{
	width: 70%;
	height: 65vh;
}
#diseases{
	width: 70%;
	height: 58vh;
	padding-top: 2%;
    font-size: 1.2rem;
	margin: auto;
	margin-top: 5%;
	font-family: 'Kanit', sans-serif;
	color: white;
	background-image: linear-gradient(to top left, green, rgba(0,0,0,0.4));
	border-radius: 50px;
}
#diseases h3{
	text-align: center;
	margin-bottom: 4%;
    text-decoration: underline;
}
#dis_names{
	margin-top: 2%;
	display: flex;
	justify-content: space-evenly;
	align-items: center;
}
</style>


<body>

	<?php include 'includes/patient_navbar.php';?>

	<div id="box">
		<div id="key_features">
			<div id="common_pts">
				<i class="fas fa-hand-point-right"></i>This kind of health insurance for individuals offers cover for the INDIVIDUAL concerned. [NO AGE LIMIT]<br>
				<i class="fas fa-hand-point-right"></i>Critical Illness Coverage- Coverage is provided for up to 36 major critical illnesses such as a tumour, cancer, kidney failure, heart ailments etc.<br>
				<i class="fas fa-hand-point-right"></i>Hospitalization- Any medical expenses incurred on hospitalization due to an illness or accidental injury is covered.<br>
				<i class="fas fa-hand-point-right"></i>Lump-sum Payment- The insurer provides the lump sum payment for the treatment of covered illnesses.<br>
				<i class="fas fa-hand-point-right"></i>Tax deductions under section 80D of the Income Tax act.<br>
				<i class="fas fa-hand-point-right"></i>Covers surgery costs, room rent, physician’s fee and laboratory tests.<br>
				<i class="fas fa-hand-point-right"></i>Easy Claim Processing- The claim can be easily processed based on the diagnosis report(s).<br>
				<i class="fas fa-hand-point-right"></i>Waiting Period- Usually, the coverage is provided after the end of the waiting period.<br>
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

	<div id="diseases">
		<h3>Illnesses Covered in Critical Care Health Scheme:</h3>
		<div id="dis_names">
			<div id="dis_names_left">
				<ul>
					<li>Cancer up to specified stage</li>
					<li>Heart attack (first time)</li>
					<li>Open heart coronary artery bypass grafting</li>
					<li>Open heart replacement or repair of heart valves</li>
					<li>Coma of specified severity</li>
					<li>Kidney failure that requires regular dialysis</li>
					<li>Stroke</li>
					<li>Major organ transplant</li>
					<li>Bone marrow transplant</li>
					<li>Permanent paralysis of limbs</li>
				</ul>
			</div>
			<div id="dis_names_right">
				<ul>
					<li>Multiple sclerosis</li>
					<li>Aplastic anaemia</li>
					<li>Bacterial meningitis</li>
					<li>Loss of speech</li>
					<li>End-stage liver disease</li>
					<li>Deafness</li>
					<li>End-stage lung disease</li>
					<li>Fulminant viral hepatitis</li>
					<li>Major burns</li>
					<li>Muscular dystrophy</li>
				</ul>
			</div>	
		</div>
	</div>

	<div id="exclusions">
		<h3>Points to keep in mind - [EXCLUSIONS] </h3>
		<i class="fas fa-exclamation-circle"></i>Can be claimed once a year for each member.<br>
		<i class="fas fa-exclamation-circle"></i>30% of the ICU charges can be cleared from this policy. Rest of the amount incurred from the ICU, has to be paid.<br>
		<i class="fas fa-exclamation-circle"></i>Pre-medical screening NOT required.<br>
		<i class="fas fa-exclamation-circle"></i>Covered critical illness diagnosed within the waiting period<br>
		<i class="fas fa-exclamation-circle"></i>Death within 30 days of diagnosis of critical illness or surgery<br>
		<i class="fas fa-exclamation-circle"></i>Critical illness developed due to smoking, tobacco, alcohol or drug intake<br>
		<i class="fas fa-exclamation-circle"></i>Pregnancy or childbirth-related critical condition and Infertility treatment/ treatment to assist reproduction. <br>
		<i class="fas fa-exclamation-circle"></i>Illness caused/ developed due to war, terrorism, civil war, navy or military operations.<br>
		<i class="fas fa-exclamation-circle"></i>Hormone replacement treatment or treatment outside INDIA.<br>
		<i class="fas fa-exclamation-circle"></i>Any dental care, cosmetic surgery or HIV-AIDS.<br>
	</div>

	<div id="policy">

		<?php

		require "db_config.php";

		$query="SELECT * FROM health_card_schemes WHERE scheme_category LIKE 'Critical Care'";
		$result=mysqli_query($conn,$query);
		while($row=mysqli_fetch_assoc($result)){
			echo '<div class="scheme">
						<h3>'.$row['scheme_name'].'</h3>
						<h5>Covers upto '.$row['coverage'].' <br><span style="color:red;">'.$row['scheme_type'].'</span> </h5>
						<h2>Rs. <span style="font-style: italic;color: darkgreen;">'.$row['premium_yearly'].'</span> annually</h2>
						<a href="critical_hcs_apply_form.php?s_id='.$row['scheme_id'].'" class="btn btn-dark btn-block">Apply</a>
				</div>';
		}

		?>
		
	</div>


	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>