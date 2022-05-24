<?php

session_start();

$name = $_SESSION['patient_name'];
$p_id = $_SESSION['patient_id'];

require 'db_config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>My Reports | CareVista</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/my_reports_dashboard.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Outfit:wght@400;500&family=Roboto+Slab:wght@400;500&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:ital,wght@0,700;1,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@1,500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Signika+Negative&display=swap" rel="stylesheet">


	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
</head>
<body>

	<?php include 'includes/patient_navbar.php';?>

	<h1 id="heading" class="text-center mt-4 mb-3">My Reports</h1>

	<div id="box" class="container mt-5">
		<div class="row mt-4 justify-content-around">
			<div class="col-5">
				<div class="card text-white bg-dark mb-3">
			  		<div class="card-header text-center">Category-1</div>
			  		<div class="card-body">
			    		<h5 class="card-title text-center">Blood Analysis</h5>
			    		<p class="card-text">

			    			<?php

			    			$query="SELECT * FROM labtest WHERE category LIKE 'Blood Analysis'";
			    			$result=mysqli_query($conn,$query);
			    			while($row=mysqli_fetch_assoc($result)){
			    				echo '<i class="fas fa-file-prescription"></i>'.$row['test_name'].' <br>';
			    			}

			    			?>	

			    		</p>
			    		<a href="my_report_ba.php" class="btn btn-light button">View Yours</a>
			  		</div>
				</div>
			</div>
			<div class="col-5">
				<div class="card text-white bg-dark mb-3">
			  		<div class="card-header text-center">Category-2</div>
			  		<div class="card-body">
			    		<h5 class="card-title text-center">Diagonistic Imaging</h5>
			    		<p class="card-text">
			    			<?php

			    			$query1="SELECT * FROM labtest WHERE category LIKE 'Diagonistic Imaging'";
			    			$result1=mysqli_query($conn,$query1);
			    			while($row1=mysqli_fetch_assoc($result1)){
			    				echo '<i class="fas fa-file-prescription"></i>'.$row1['test_name'].' <br>';
			    			}

			    			?>	
			    		</p>
			    		<a href="my_report_di.php" class="btn btn-light button">View Yours</a>
			  		</div>
				</div>
			</div>
		</div>
	</div>

	


	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>