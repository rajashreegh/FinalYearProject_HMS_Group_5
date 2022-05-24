<?php

session_start();

$name = $_SESSION['patient_name'];
$patient_id = $_SESSION['patient_id'];
$email=$_SESSION['patient_email'];

$dept_id = $_GET['dept_id'];
$doc_id=$_GET['doc_id'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Checkup Booking | CareVista</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/checkup_book.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Outfit:wght@400;500&family=Roboto+Slab:wght@400;500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Teko:wght@600;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Acme&family=Secular+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&display=swap" rel="stylesheet">

	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
</head>
<body>

	<?php include 'includes/patient_navbar.php';?>

	<?php

	require "db_config.php";

	$query="SELECT * FROM doc_day_time WHERE doc_id='$doc_id'";
	$result=mysqli_query($conn,$query);
	$fetched_result=mysqli_fetch_assoc($result);
	
	$day1=$fetched_result['day1'];
	$time1=$fetched_result['time1'];
	$date1=date('Y-m-d', strtotime($day1));
	$newDate1 = date("d-m-Y", strtotime($date1));
	
	$day2=$fetched_result['day2'];
	$time2=$fetched_result['time2'];
	$date2=date('Y-m-d', strtotime($day2));
	$newDate2 = date("d-m-Y", strtotime($date2));
	
	$day3=$fetched_result['day3'];
	$time3=$fetched_result['time3'];
	$date3=date('Y-m-d', strtotime($day3));
	$newDate3 = date("d-m-Y", strtotime($date3));
	
	$booking_id=uniqid();

	?>

	<div id="dsply-time-options">
		<h2 id="schedule">Schedule:</h2>

		<?php
			if($day1!=NULL && $time1!=NULL){
				echo '<h4 class="timings">'.$day1.': '.$time1.'</h4>';
			}
			if($day2!=NULL && $time2!=NULL){
				echo '<h4 class="timings">'.$day2.': '.$time2.'</h4>';
			}
			if($day3!=NULL && $time3!=NULL){
				echo '<h4 class="timings">'.$day3.': '.$time3.'</h4>';
			}
		?>

	</div>

	<div id="date-time-box">
		<h2 id="date-heading"><i class="fas fa-clock" style="margin-right: 15px;"></i>Choose your date and time </h2>
		<div id="form-box">			
				<div style="margin-bottom: 40px;">
					<label for="days" style="font-family: 'Secular One', sans-serif;font-size: 1.2rem;">Choose a day :</label>
					<select id="days" name="days" required>
						<option value="" selected disabled hidden>Select the day</option>

						<?php

							if($day1!=NULL && $time1!=NULL){
								echo '<option value="'.$day1.'">'.$day1.'';
								echo '  [';
								echo ($newDate1);
								echo '] </option>';
							}
							if($day2!=NULL && $time2!=NULL){
								echo '<option value="'.$day2.'">'.$day2.'';
								echo '  [';
								echo ($newDate2);
								echo '] </option>';
							}
							if($day3!=NULL && $time3!=NULL){
								echo '<option value="'.$day3.'">'.$day3.'';
								echo '  [';
								echo ($newDate3);
								echo '] </option>';
							}

						?>

					</select>
				</div>

				<i class="far fa-user icon-design"></i><label for="patient_name">Name</label><br>
		        <input class="inpt-frmt" type="text" name="name" id="patient_name" placeholder="<First_name> <Second_name>" value="<?php echo "$name"; ?>" readonly><br>

		        <i class="fas fa-envelope-open-text icon-design"></i><label for="mail">Email</label><br>
		        <input class="inpt-frmt" type="email" name="email" id="patient_mail" placeholder="xyz@gmail.com" value="<?php echo "$email"; ?>"><br>

		        <i class="fas fa-mobile-alt icon-design"></i><label for="number">Contact Number</label><br>

		        <?php

		        $query1="SELECT * FROM patient_contact_info WHERE patient_id=$patient_id";

				$result1=mysqli_query($conn,$query1);
				$fetched_result1=mysqli_fetch_assoc($result1);

		        if($fetched_result1['contact_number']!=NULL){
		        	echo '<input class="inpt-frmt" type="number" name="number" id="number" value="'.$fetched_result1['contact_number'].'" required maxlength="10"><br>';
		        }else{
		        	echo '<input class="inpt-frmt" type="number" name="number" id="number" placeholder="Type in contact number" required maxlength="10"><br>';
		        }

		        ?>
		        

		        <input type="text" id="doc_id" value="<?php echo "$doc_id"; ?>" hidden>
		        <input type="text" id="dept_id" value="<?php echo "$dept_id"; ?>" hidden>
		        <input type="text" id="booking_id" value="<?php echo "$booking_id"; ?>" hidden>

		        <a href="checkup_booking_success_msg.php?bkng_id=<?php echo "$booking_id"; ?>" 
		        	id="sbmt-btn" class="btn btn-warning" style="float:right">Submit</a>

		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	
	<script type="text/javascript" src="js/checkup_book.js"></script>


	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>