<?php

session_start();

$name = $_SESSION['doctor_name'];
$doc_id=$_SESSION['doctor_id'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Discharged Patients | CareVista</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/dctr_check_update_pdetails.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>

	<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,600&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500;600&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
</head>
<body>

	<?php include 'includes/doctor_navbar.php'?>

	<div id="wrapper" style="margin-top: 8%;">

		<?php

		require 'db_config.php';

		$query="SELECT DISTINCT(d.patient_id) FROM discharge_bed d WHERE d.doctor_id='$doc_id'";
		$result=mysqli_query($conn,$query);

		if(mysqli_num_rows($result)==0){
			echo '<h1 style="margin: auto;">Sorry!!! No records to display as of now..Visit again soon...</h1>';
		}else{
			$query1="SELECT * FROM discharge_bed d INNER JOIN patient_login pl 
					ON d.patient_id=pl.patient_id INNER JOIN patient_personal_info pi 
					ON d.patient_id=pi.patient_id INNER JOIN patient_dp pd 
					ON d.patient_id=pd.patient_id INNER JOIN patient_contact_info pc
					ON d.patient_id=pc.patient_id WHERE d.doctor_id='$doc_id'";
			$result1=mysqli_query($conn,$query1);
			while($row=mysqli_fetch_assoc($result1)){
				echo '<a href="view_dschrgd_patient_details.php?p_id='.$row['patient_id'].'">
						<div class="patient">
							<div class="dp">
								<img src="patient_dp_uploads/'.$row['file_name'].'">
							</div>
							<div class="detail">
								<h1>'.$row['patient_name'].'</h1>';

								$date_default = "0000-00-00";
								$today_date = date('Y-m-d');

								if($row['DOB']!=$date_default){
								
				  				$dateOfBirth = $row['DOB'];
				  				$diff = date_diff(date_create($dateOfBirth), date_create($today_date));
				  				$age = $diff->format('%y');
				  				
				  				echo '<h3>Age: '.$age.'</h3>';

								}else{
								echo '<h3>Age: --</h3>';
								}
								
								if($row['Gender']!=NULL){
									$sex=strtoupper($row['Gender'][0]);
									echo '<h3>Sex: '.$sex.'</h3>';
								}else{
									echo '<h3>Sex: --</h3>';
								}
								
								if($row['contact_number']!=NULL){
									echo	'<h2>'.$row['contact_number'].'</h2>';
								}else{
									echo '<h3>Contact No.: --</h3>';
								}
							
					echo	'</div>
						</div>
					</a>';
			}
		}

		?>
		
		
	</div>
	<a href="dctr_check_update_pdetails.php"><i class="fas fa-chevron-circle-left" id="back_arrrow"></i></a>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>