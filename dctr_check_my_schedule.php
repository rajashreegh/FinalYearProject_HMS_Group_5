<?php

session_start();

$name = $_SESSION['doctor_name'];
$doc_id=$_SESSION['doctor_id'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Doctor Schedules | CareVista</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/dctr_check_my_schedule.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>

	<link href="https://fonts.googleapis.com/css2?family=Quintessential&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@600&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Rowdies&display=swap" rel="stylesheet">


	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>

</head>
<body>

	<?php include 'includes/doctor_navbar.php'?>

	<div id="wrapper">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
	  		<li class="nav-item">
	    		<a class="nav-link active" id="prev_tab" data-toggle="tab" href="#prev_schedule" role="tab" aria-controls="prev_schedule" aria-selected="true">Previous Schedules</a>
	  		</li>
	  		<li class="nav-item">
	    		<a class="nav-link" id="ongoing_tab" data-toggle="tab" href="#ongoing_schedule" role="tab" aria-controls="ongoing_schedule" aria-selected="false">Ongoing Schedules</a>
	  		</li>
	  		<li class="nav-item">
	    		<a class="nav-link" id="upcoming_tab" data-toggle="tab" href="#upcoming_schedule" role="tab" aria-controls="upcoming_schedule" aria-selected="false">Upcoming Schedules</a>
	  		</li>
		</ul>

		<?php

		require "db_config.php";
		date_default_timezone_set('Asia/Calcutta');
		$today_date = date('Y-m-d');

		?>

		<div class="tab-content" id="myTabContent">
	  		<div class="tab-pane fade show active" id="prev_schedule" role="tabpanel" aria-labelledby="prev_tab">
	  			
	  			<table style="width:100%">
					<thead>

						<?php

						$query="SELECT * FROM checkup_bookings c INNER JOIN 
								patient_personal_info p ON c.booker_id=p.patient_id 
								WHERE doc_id='$doc_id' 
								AND c.status='Complete'";
						$result=mysqli_query($conn,$query);

						if(mysqli_num_rows($result) == 0){
							echo '<h1 id="no_appointment"> No previous appointments to show...</h1>';
						}else{

							echo '<tr>
									<th>Booking ID</th>
									<th>Patient Name</th>
									<th>Contact No.</th>
									<th>Gender</th>
									<th>Age</th>
									<th>Date</th>
								</tr>	
							</thead>
							<tbody>';
							
						while($row=mysqli_fetch_assoc($result)){
							echo '<tr>
									<td>'.$row['booking_id'].'</td>
									<td>'.$row['booking_done_by'].'</td>
									<td>'.$row['patient_number'].'</td>';

							if($row['Gender']!=NULL){
								echo '<td>'.$row['Gender'].'</td>';
							}else{
								echo '<td>---</td>';
							}

							$date_default = "0000-00-00";

							if($row['DOB']!=$date_default){
								
				  				$dateOfBirth = $row['DOB'];
				  				$diff = date_diff(date_create($dateOfBirth), date_create($today_date));
				  				$age = $diff->format('%y');
				  				
				  				echo '<td>'.$age.'</td>';

							}else{
								echo '<td>---</td>';
							}
							
							$date_got=$row['date'];
							$date_frmttd=date("d-m-Y", strtotime($date_got));

							echo	'<td>'.$date_frmttd.'</td>
									</tr>';

						}
					}

						?>
						
					</tbody>
				</table>

	  		</div>
	  		
	  		<div class="tab-pane fade" id="ongoing_schedule" role="tabpanel" aria-labelledby="ongoing_tab">
	  			
	  			<table style="width:100%">
					<thead>

						<?php

						$query="SELECT * FROM checkup_bookings c INNER JOIN 
								patient_personal_info p ON c.booker_id=p.patient_id 
								WHERE date = '$today_date' AND doc_id='$doc_id' 
								AND c.status='Incomplete'";
						$result=mysqli_query($conn,$query);

						if(mysqli_num_rows($result) == 0){
							echo '<h1 id="no_appointment"> No appointments to show...</h1>';
						}else{

							echo '<tr>
									<th>Booking ID</th>
									<th>Patient Name</th>
									<th>Contact No.</th>
									<th>Gender</th>
									<th>Age</th>
									<th>Height</th>
									<th>Weight</th>
									<th>Date</th>
									<th>Payment Status</th>
									<th>Actions</th>
								</tr>	
							</thead>
							<tbody>';
							
						while($row=mysqli_fetch_assoc($result)){
							echo '<tr>
									<td>'.$row['booking_id'].'</td>
									<td>'.$row['booking_done_by'].'</td>
									<td>'.$row['patient_number'].'</td>';

							if($row['Gender']!=NULL){
								echo '<td>'.$row['Gender'].'</td>';
							}else{
								echo '<td>---</td>';
							}

							$date_default = "0000-00-00";

							if($row['DOB']!=$date_default){
								
				  				$dateOfBirth = $row['DOB'];
				  				$diff = date_diff(date_create($dateOfBirth), date_create($today_date));
				  				$age = $diff->format('%y');
				  				
				  				echo '<td>'.$age.'</td>';

							}else{
								echo '<td>---</td>';
							}

							if($row['Height']!=0){
								echo '<td>'.$row['Height'].'</td>';
							}else{
								echo '<td>---</td>';
							}

							if($row['Weight']!=0){
								echo '<td>'.$row['Weight'].'</td>';
							}else{
								echo '<td>---</td>';
							}
							
							$date_got=$row['date'];
							$date_frmttd=date("d-m-Y", strtotime($date_got));

							echo	'<td>'.$date_frmttd.'</td>';

							if($row['payment_status']=='Complete'){
								echo '<td><button class="btn btn-success disabled" style="color:black; font-weight:bold; ">Complete</button></td>';
							}else if ($row['payment_status']==NULL){
								echo '<td><button class="btn btn-danger disabled" style="color:black; font-weight:bold; ">Incomplete</button></td>';
							}
									
							echo	'<td>
										<i class="fas fa-check-circle mark_as_done_btn" 
											data-id="'.$row['booking_id'].'"></i>
										<i class="fas fa-times-circle cancel_appointment_btn" 
											data-id="'.$row['booking_id'].'"></i>
									</td>
							</tr>';
						}
					}

						?>
						
					</tbody>
				</table>

	  		</div>

	  		<div class="tab-pane fade" id="upcoming_schedule" role="tabpanel" aria-labelledby="upcoming_tab">
	  			<table style="width:100%">
					<thead>

						<?php

						$query="SELECT * FROM checkup_bookings c INNER JOIN 
								patient_personal_info p ON c.booker_id=p.patient_id 
								WHERE date > '$today_date' AND doc_id='$doc_id' 
								AND c.status='Incomplete'";
						$result=mysqli_query($conn,$query);

						if(mysqli_num_rows($result) == 0){
							echo '<h1 id="no_appointment"> No appointments to show...</h1>';
						}else{

							echo '<tr>
									<th>Booking ID</th>
									<th>Patient Name</th>
									<th>Contact No.</th>
									<th>Gender</th>
									<th>Age</th>
									<th>Height</th>
									<th>Weight</th>
									<th>Date</th>
									<th>Payment Status</th>
								</tr>	
							</thead>
							<tbody>';

						while($row=mysqli_fetch_assoc($result)){
							echo '<tr>
									<td>'.$row['booking_id'].'</td>
									<td>'.$row['booking_done_by'].'</td>
									<td>'.$row['patient_number'].'</td>';

							if($row['Gender']!=NULL){
								echo '<td>'.$row['Gender'].'</td>';
							}else{
								echo '<td>---</td>';
							}

							$date_default = "0000-00-00";

							if($row['DOB']!=$date_default){
								
				  				$dateOfBirth = $row['DOB'];
				  				$diff = date_diff(date_create($dateOfBirth), date_create($today_date));
				  				$age = $diff->format('%y');
				  				
				  				echo '<td>'.$age.'</td>';

							}else{
								echo '<td>---</td>';
							}

							if($row['Height']!=0){
								echo '<td>'.$row['Height'].'</td>';
							}else{
								echo '<td>---</td>';
							}

							if($row['Weight']!=0){
								echo '<td>'.$row['Weight'].'</td>';
							}else{
								echo '<td>---</td>';
							}
							
							$date_got=$row['date'];
							$date_frmttd=date("d-m-Y", strtotime($date_got));

							echo	'<td>'.$date_frmttd.'</td>';

							if($row['payment_status']=='Complete'){
								echo '<td><button class="btn btn-success disabled" style="color:black; font-weight:bold; ">Complete</button></td>';
							}else if ($row['payment_status']==NULL){
								echo '<td><button class="btn btn-danger disabled" style="color:black; font-weight:bold; ">Incomplete</button></td>';
							}
									
							echo '</tr>';
						}
					}

						?>
						
					</tbody>
				</table>
	  		</div>

		</div>
	</div>


	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<script type="text/javascript" src="js/dctr_check_schedule.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>