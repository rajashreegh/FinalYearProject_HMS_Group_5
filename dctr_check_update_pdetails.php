<?php

session_start();

$name = $_SESSION['doctor_name'];
$doc_id=$_SESSION['doctor_id'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Patient History | CareVista</title>
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

	<?php

	require 'db_config.php';

	$query="SELECT COUNT(*) AS total_a FROM bed_allotments WHERE doctor_id='$doc_id'";
	$result=mysqli_query($conn,$query);
	$fetched_result=mysqli_fetch_assoc($result);
	$total=$fetched_result['total_a'];

	$query1="SELECT COUNT(*) AS total_d FROM discharge_bed WHERE doctor_id='$doc_id'";
	$result1=mysqli_query($conn,$query1);
	$fetched_result1=mysqli_fetch_assoc($result1);
	$total1=$fetched_result1['total_d'];

	?>

	<div id="ad_box">
			<div id="admit" class="box-design">
				<h3 style="color: #008080">Admitted Patient</h3>
				<i class="fas fa-caret-down" id="show_admttd" style="color: #008080"></i>
				<div id="admit_content" class="content">
					<h3> <?php echo $total; ?> patients</h3>
					<a href="view_patient_admitted_under_me.php" style="text-decoration: none;color: white;">
						<i class="fas fa-caret-right"></i>
					</a>
					
				</div>
			</div>
			<div id="discharge" class="box-design">
				<h3 style="color: #008080">Discharged Patient</h3>
				<i class="fas fa-caret-down" id="show_dschrgd" style="color: #008080"></i>
				<div id="discharge_content" class="content">
					<h3> <?php echo $total1; ?> patients</h3>
					<a href="view_patient_discharged_from_me.php" style="text-decoration: none;color: white;">
						<i class="fas fa-caret-right"></i>
					</a>
				</div>
			</div>
	</div>

	<div id="wrapper">

		<?php

		require 'db_config.php';

		$query="SELECT DISTINCT(c.booking_done_by),c.booker_id,c.patient_number,p.DOB,p.Gender,
				d.file_name FROM checkup_bookings c INNER JOIN patient_personal_info p 
				ON c.booker_id=p.patient_id INNER JOIN patient_dp d ON c.booker_id=d.patient_id 
				WHERE doc_id='$doc_id'";
		$result=mysqli_query($conn,$query);

		if(mysqli_num_rows($result)==0){
			echo '<h1 style="margin: auto;">Sorry!!! No records to display as of now..Visit again soon...</h1>';
		}else{
			while($row=mysqli_fetch_assoc($result)){
				echo '<a href="dctr_patient_records.php?p_id='.$row['booker_id'].'">
						<div class="patient">
							<div class="dp">
								<img src="patient_dp_uploads/'.$row['file_name'].'">
							</div>
							<div class="detail">
								<h1>'.$row['booking_done_by'].'</h1>';

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
								

							echo	'<h2>'.$row['patient_number'].'</h2>
							</div>
						</div>
					</a>';
			}
		}

		?>
		
		
	</div>


	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<script type="text/javascript" src="js/dctr_check_update_pdetails.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>