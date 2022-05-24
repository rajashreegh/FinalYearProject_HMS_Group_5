<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Blood Management Options | CareVista</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/blood_management_options.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link href="https://fonts.googleapis.com/css2?family=Luxurious+Roman&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Dongle:wght@400;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Rubik+Beastly&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Island+Moments&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Teko:wght@500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@1,500&display=swap" rel="stylesheet">

	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
</head>
<body>

	<?php include 'includes/blood_navbar.php';?>

	<div id="content">

		<div id="c_left">
			<div id="poster">
				<div id="p_left">
					<img src="IMAGES/img/poster1.png">
				</div>
				<div id="p_right">
					<img src="IMAGES/img/poster2.png">
					<h3 id="alrt">Emergency ALERT !!!</h3>
					<p style="font-family: 'Dongle', sans-serif;font-size: 1.7rem;">CareVista invites you to the...</p>
					<h1 id="drive">BLOOD DONATION DRIVE</h1>
					<hr>
					<h3 id="quote">Your droplets of blood may create an ocean of happiness.</h3>
					<a href="emergency_blood_donation.php" id="nxt">See More...<i class="fas fa-chevron-circle-right"></i></a>
					<div id="bottom">
						<div id="b1">
							<i class="fas fa-phone-alt"></i>
							<p>225-336-337</p>
						</div>
						<div id="b2">
							<i class="fas fa-at"></i>
							<p>carevistaBB@gmail.com</p> 
						</div>	
					</div>
				</div>
			</div>
		</div>

		<div id="c_right">
			<div id="c_right_box">
				<div id="donor">
					<img src="IMAGES/img/donate.png">
					<h5>Want to be a donor</h5>
					<a href="blood_donor_form.php" class="btn btn-dark btn-block">Visit</a>
				</div>
				<div id="need_blood">
					<img src="IMAGES/img/need.png">
					<h5>Request for blood</h5>
					<a href="blood_requisition_form.php" class="btn btn-dark btn-block">Visit</a>
				</div>
			</div>
		</div>

	</div>

	<div id="status_check">
		<h4 id="quest">Want to check the status of your donation request ???</h4>
		<button class="btn btn-light" data-toggle="modal" data-target="#statusCheckModal">Check Here</button>
	</div>



	<div class="modal fade" id="statusCheckModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		    <div class="modal-content" style="width:105%">
		      <div class="modal-header bgclr">
		        <h5 class="modal-title text-white" id="exampleModalLabel">Check Your Status</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<p id="patient_login_error" class="text-danger"></p>
		        <form action="blood_donation_status_check.php" method="POST">

		        	<i class="fas fa-user icon-design"></i><label for="donor_name">Name</label><br>
		    		<input class="inpt-frmt" type="text" name="name" id="donor_name" placeholder="<First Name><Second Name>" required><br>

		        	<i class="fas fa-envelope-open-text icon-design"></i><label for="mail">Email</label><br>
		        	<input class="inpt-frmt" type="email" name="email" id="mail" placeholder="xyz@gmail.com" required><br>

		        	<i class="fas fa-phone-square-alt icon-design"></i><label for="number">Contact Number</label><br>
		    		<input class="inpt-frmt" type="number" name="number" id="number" placeholder="Type in contact number" required maxlength="10"><br>

		    		<i class="fas fa-question-circle icon-design"></i><label for="quest">Did you apply under emergency blood donation drive?? [Y / N]</label><br>
		    		<input class="inpt-frmt" type="text" name="quest" id="quest" placeholder="Y / N" required><br>

		        	<input type="submit" name="" class="btn btn-dark btn-block" value="Check">

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