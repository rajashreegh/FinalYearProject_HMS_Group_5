<?php

session_start();

$name = $_SESSION['patient_name'];
$patient_id = $_SESSION['patient_id'];

$dept_id = $_GET['dept_id'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Doctors | CareVista</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/departmental_dctrs.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	
	<link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Estonia&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">

	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>

</head>
<body>

	<?php include 'includes/patient_navbar.php';?>

	<img src="IMAGES/img4/decor1.jpg" id="decor1">
	<img src="IMAGES/img4/decor2.png" id="decor2">

	<div id="dctr-box">
		<h2 id="heading"><i class="fas fa-calendar-week" style="margin-right:20px"></i>Book your appointment</h2>
		<div class="box">

			<?php

			require "db_config.php";

			$query="SELECT l.doctor_id,l.doctor_name,l.doctor_email,d.dept_id,
					d.visit,s.dept_name,m.qualification, n.pic_file_name FROM doctor_login l 
					INNER JOIN doc_dep d ON l.doctor_id=d.doc_id
					INNER JOIN departments s ON d.dept_id=s.dept_id
					INNER JOIN doctor_details m ON l.doctor_id=m.doc_id
					INNER JOIN doctor_profile_pic n ON l.doctor_id=n.doctor_id
					WHERE d.dept_id='$dept_id'";

			$result=mysqli_query($conn,$query);
			while ($row=mysqli_fetch_assoc($result)) {
				$imageURL = 'Doctor_dp_uploads/'.$row["pic_file_name"];
				echo '<div class="wrapper">
						<div class="dctr">
							<img src="'.$imageURL.'" class="dctr_profile">
							<div class="content">		
								<h4 class="consultant">Designation: <br>Consultant - <span class="spclty">'.$row['dept_name'].'</span></h4>
								<p class="deg">'.$row['qualification'].'</p>
								<h4 class="visit">Visit: '.$row['visit'].'</h4>
							</div>
						</div>
					<h3 class="name">Name: Dr. '.$row['doctor_name'].'</h3>
					<a href="checkup_book.php?dept_id='.$dept_id.'&doc_id='.$row['doctor_id'].'" class="btn btn-dark btn-block mt-3">Book Now</a>
				</div>';
			}

			?>
			
		</div>
	</div>


	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>