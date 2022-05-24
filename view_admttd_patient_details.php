<?php

session_start();

$name = $_SESSION['doctor_name'];
$doc_id=$_SESSION['doctor_id'];
$p_id=$_GET['p_id'];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admitted Patient Details</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/view_admttd_patient_details.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>

	<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,600&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500;600&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">


	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
</head>
<body>

	<?php include 'includes/doctor_navbar.php'?>

	<div id="wrapper">

		<?php

		require 'db_config.php';

		$query="SELECT * FROM bed_allotments ba INNER JOIN beds b ON ba.bed_id=b.bed_id INNER JOIN rooms r ON b.room_id=r.room_id WHERE patient_id='$p_id' AND doctor_id='$doc_id'";
		$result=mysqli_query($conn,$query);
		while($row=mysqli_fetch_assoc($result)){
			echo '<div class="admit">
					<div class="allotment">
						<i class="fas fa-user-circle "></i>
					</div>
					<h2>Allotment Id: '.$row['allotment_id'].'</h2>	
					<h1>'.$row['health_issue'].'</h1>
					<div class="down">
						<div class="down_left">
							<i class="fas fa-hospital-user"></i>
							<div class="location_desc">
								<h4>Ward : '.$row['ward_type'].'</h4>
								<div class="bed_room">
									<h4>Bed : '.$row['bed_number'].'</h4>
									<h4>Room : '.$row['room_number'].'</h4>
								</div>
							</div>	
						</div>
						<div class="down_right">
							<i class="fas fa-calendar-alt"></i>';
							$date_frmttd = date("d-m-Y", strtotime($row['admitted_date']));
					echo	'<h4>Admitted on: '.$date_frmttd.'</h4>
						</div>
					</div>
				</div>';
		}

		?>
		
	</div>


	<a href="view_patient_admitted_under_me.php"><i class="fas fa-chevron-circle-left" id="back_arrrow"></i></a>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>