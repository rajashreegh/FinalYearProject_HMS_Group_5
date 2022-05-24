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
	<title>Patient Details</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/dctr_patient_records.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>

	<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,600&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500;600&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500&family=Redressed&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Redressed&display=swap" rel="stylesheet">

	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
</head>
<body>

	<?php include 'includes/doctor_navbar.php'?>

	<?php

	require 'db_config.php';

	$query="SELECT * FROM patient_login WHERE patient_id='$p_id'";
	$result=mysqli_query($conn,$query);
	$fetched_result=mysqli_fetch_assoc($result);
	$p_name=$fetched_result['patient_name'];

	?>

	<h1 id="name"><?php echo $p_name; ?></h1>
	<h3 id="ID">Patient ID: <?php echo $p_id; ?></h3>

	<?php

	$query1="SELECT * FROM checkup_bookings WHERE doc_id='$doc_id' AND booker_id='$p_id'";
	$result1=mysqli_query($conn,$query1);
	while($row=mysqli_fetch_assoc($result1)){
		if($row['status']=='Complete' && $row['issue']==NULL && $row['remarks']==NULL){
			$b_id=$row['booking_id'];
			echo '<div class="booking">
					<div class="left">
						<h2>Booking ID: '.$row['booking_id'].'</h2>';

						$date_got=$row['date'];
						$date_frmttd=date("d/m/Y", strtotime($date_got));

				echo	'<h2>Date: '.$date_frmttd.'</h2>';

			echo	'</div>
					<div class="right">
						<h2><span id="heading">Issue:</span> NA</h2>
						<h2><span id="heading">Remarks:</span> NA</h2>
					</div>
					<button class="btn btn-info" id="add_pdetails_btn" data-toggle="modal" data-target="#addPatientDetailsModal">Add Details</button>
				</div>';
		}else if($row['status']=='Complete' && $row['issue']!=NULL && $row['remarks']!=NULL){
			echo '<div class="booking">
						<div class="left">
							<h2>Booking ID: '.$row['booking_id'].'</h2>';

							$date_got=$row['date'];
							$date_frmttd=date("d/m/Y", strtotime($date_got));

					echo	'<h2>Date: '.$date_frmttd.'</h2>';

				echo	'</div>
						<div class="right">
							<h2><span id="heading">Issue:</span> '.$row['issue'].'</h2>
							<h2><span id="heading">Remarks:</span> <br> '.$row['remarks'].'</h2>
						</div>
				</div>';
		}
	}

	?>

	<a href="dctr_check_update_pdetails.php"><i class="fas fa-chevron-circle-left" id="back_arrrow"></i></a>

	<div class="modal fade" id="addPatientDetailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		      <div class="modal-header bgclr">
		        <h5 class="modal-title text-dark" id="exampleModalLabel">Add Deatils for <?php echo $p_name; ?></h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">

		        <form action="dctr_update_issue_remarks.php" method="POST">

		        	<i class="fas fa-hand-holding-medical icon-design"></i><label for="issue">Health Issue</label><br>
		        	<input class="inpt-frmt" type="text" name="issue" id="issue" placeholder="Prominent health issue"><br>

		        	<i class="fas fa-hand-holding-medical icon-design"></i><label for="remarks">Remarks</label><br>
		        	<input class="inpt-frmt" type="text" name="remarks" id="remarks" placeholder="Reamrks/Medicines/Doses..."><br>
					
		        	<input type="submit" name="" class="btn btn-dark" value="Save Changes" id="save_changes_btn">

		        	<input type="hidden" name="doc_id" value="<?php echo $doc_id; ?>">
		        	<input type="hidden" name="p_id" value="<?php echo $p_id; ?>">
		        	<input type="hidden" name="b_id" value="<?php echo $b_id; ?>">

		        </form>

		      </div>
		    </div>
	  </div>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>