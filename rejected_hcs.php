<?php

session_start();

$name = $_SESSION['patient_name'];
$p_id=$_SESSION['patient_id'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Rejected Health Card Schemes</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/applied_hcs.css">
	<link rel="stylesheet" type="text/css" href="css/view_fam_membrs_hcs.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Outfit:wght@400;500&family=Roboto+Slab:wght@400;500&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Quintessential&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500;600&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@1,600&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">


	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
</head>
<body>

	<?php include 'includes/patient_navbar.php';?>

	<?php

	require 'db_config.php';

	$query="SELECT * FROM applicants_hcs a INNER JOIN health_card_schemes h 
			ON a.s_id=h.scheme_id 
			WHERE a.id = $p_id AND a.status='Rejected'";
	$result=mysqli_query($conn,$query);

	$rowcount=mysqli_num_rows($result);

	if($rowcount>0){
		while($row=mysqli_fetch_assoc($result)){
			echo '<div id="scheme_box" style="width:55%; ">
						<div class="sc_name" style="padding-left: 3%; padding-right: 3%;">
							<h2>'.$row['scheme_name'].'</h2>
							<h2 id="a_id">'.$row['application_id'].'</h2>
						</div>
						<div class="sc_details">
							<h5>Premium Yearly: '.$row['premium_yearly'].'</h5>
							<h5>Coverage: '.$row['coverage'].'</h5>
							<h5>Category: '.$row['scheme_category'].'</h5>
							<h5>Type: '.$row['scheme_type'].'</h5>
							<h5>Premium paid for: '.$row['premium_paid'].'</h5>
						</div>
					</div>';
		}
	}else{
		echo '<div class="no_approved_scheme">
				<h1>None of your schemes has been rejected yet...</h1>
			</div>';
	}

	?>

	<a href="applied_hcs.php"><i class="fas fa-chevron-circle-left" id="back_arrrow"></i></a>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>