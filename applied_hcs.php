<?php

session_start();

$name = $_SESSION['patient_name'];
$p_id=$_SESSION['patient_id'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>My Health Card Scheme</title>
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

	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
</head>
<body>

	<?php include 'includes/patient_navbar.php';?>

	<a href="rejected_hcs.php?p_id=<?php echo $p_id; ?>" class="btn btn-danger" id="rjct_btn">Rejected Schemes</a>

	<?php 

	require 'db_config.php';

	$query1="SELECT * FROM applicants_hcs a INNER JOIN health_card_schemes h 
			ON a.s_id=h.scheme_id 
			WHERE a.id = $p_id AND a.status='Pending'";
	$result1=mysqli_query($conn,$query1);

	$rowcount1=mysqli_num_rows($result1);

	if($rowcount1 != 0){
		echo '<div class="no_approved_scheme">
				<h1>Your request is pending ...<img src="IMAGES/img/loading1.gif"></h1>
				<h3>It will be approved once medical screening is done...</h3>
				<h3>To recheck your status 
					<a href="health_card_schemes_landing_page.php">Visit</a>
					again in a couple of days...</h3>
			</div>';
	}else{

	$query="SELECT * FROM applicants_hcs a INNER JOIN health_card_schemes h 
			ON a.s_id=h.scheme_id 
			WHERE a.id = $p_id AND a.status='Approved' AND a.current_status='Active'";
	$result=mysqli_query($conn,$query);

	$rowcount=mysqli_num_rows($result);

	if($rowcount > 0){
	$fetched_result=mysqli_fetch_assoc($result);
	$s_id=$fetched_result['s_id'];

	if($fetched_result['scheme_category'] != 'Family'){
		echo '<div id="scheme_box">
		<div class="sc_name">
			<h2>'.$fetched_result['scheme_name'].'</h2>
		</div>
		<div class="sc_details">
			<h5>Premium Yearly: '.$fetched_result['premium_yearly'].'</h5>
			<h5>Coverage: '.$fetched_result['coverage'].'</h5>
			<h5>Category: '.$fetched_result['scheme_category'].'</h5>
			<h5>Type: '.$fetched_result['scheme_type'].'</h5>
			<h5>Premium paid for: '.$fetched_result['premium_paid'].'</h5>
		</div>
		<div class="sc_cancel">
			<h5>Unsubscribe</h5>
			<a href="" class="dlt_btn"><i class="fas fa-trash-alt"></i></a>
		</div>
	</div>';
	} 
	else{
		echo '<div id="scheme_box">
		<div class="sc_name">
			<h2>'.$fetched_result['scheme_name'].'</h2>
		</div>
		<div class="sc_details">
			<h5>Premium Yearly: '.$fetched_result['premium_yearly'].'</h5>
			<h5>Coverage: '.$fetched_result['coverage'].'</h5>
			<h5>Category: '.$fetched_result['scheme_category'].'</h5>
			<h5>Type: '.$fetched_result['scheme_type'].'</h5>
			<h5>Premium paid for: '.$fetched_result['premium_paid'].'</h5>
		</div>
		<div class="sc_cancel">
			<h5>Unsubscribe</h5>
			<a href="" class="dlt_btn"><i class="fas fa-trash-alt"></i></a>
		</div>
	</div>';
		echo '<div id="table_box" style="margin-top:5%; margin-bottom:1%; ">
		<table style="width:100%">
			<thead>
				<tr>
					<th>Relation</th>
					<th>Name</th>
					<th>Gender</th>
					<th>Age</th>
				</tr>	
			</thead>
			<tbody>';

				$query1="SELECT * FROM family_hcs_plan_details WHERE p_id='$p_id'";
				$result1=mysqli_query($conn,$query1);
				while($row1=mysqli_fetch_assoc($result1)){
					if($row1['sp_name']!=NULL){
						echo '<tr>
									<th>SPOUSE</th>
									<td>'.$row1['sp_name'].'</td>
									<td>'.$row1['sp_gender'].'</td>
									<td>'.$row1['sp_age'].'</td>
							</tr>';
					}
					if($row1['ch1_name']!=NULL){
						echo '<tr>
									<th>CHILD 1</th>
									<td>'.$row1['ch1_name'].'</td>
									<td>'.$row1['ch1_gender'].'</td>
									<td>'.$row1['ch1_age'].'</td>
							</tr>';
					}
					if($row1['ch2_name']!=NULL){
						echo '<tr>
									<th>CHILD 2</th>
									<td>'.$row1['ch2_name'].'</td>
									<td>'.$row1['ch2_gender'].'</td>
									<td>'.$row1['ch2_age'].'</td>
							</tr>';
					}

				}

		echo '</tbody>
		</table>
	</div>';
	}
}
	else{ 

		
			echo '<div class="no_approved_scheme">
				<h1>You have not subscribed to any health scheme yet...</h1>
				<h3>To subscribe...<a href="health_card_schemes_landing_page.php">Visit</a></h3>
			</div>';
		
		
	}
}
	?>
	
	<a href="health_card_schemes_landing_page.php"><i class="fas fa-chevron-circle-left" id="back_arrrow"></i></a>

	<input type="hidden" name="" id="p_id" value="<?php echo $p_id; ?>">
	<input type="hidden" name="" id="s_id" value="<?php echo $s_id; ?>">

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<script type="text/javascript" src="js/applied_hcs.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>