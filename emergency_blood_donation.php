<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Emergency Blood Donor Form | CareVista</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/blood_donor_form.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link href="https://fonts.googleapis.com/css2?family=Luxurious+Roman&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Dongle:wght@400;700&display=swap" rel="stylesheet">

	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
</head>
<body>

	<?php include 'includes/blood_navbar.php';?>

	<div id="donor_form_box">
		<h2>Blood Donation Form</h2>
		<div id="donor_form">

			<label for="donor_name">Name</label>
		    <input class="inpt-frmt" type="text" name="name" id="donor_name" placeholder="<First Name><Second Name>"><br>

		    <p style="display:inline-block;margin-right: 30px;font-family: 'Dongle', sans-serif;
					font-size: 1.8rem;font-weight: bold;letter-spacing: 2px;">Select your gender</p>
		    <input type="radio" id="male" name="gender" value="male">
			<label for="male">Male</label>
			<input type="radio" id="female" name="gender" value="female">
			<label for="female">Female</label>
			<input type="radio" id="others" name="gender" value="others">
			<label for="others">Others</label>
			<br>

			<label for="age">Enter your age</label>
			<input type="number" id="age" name="age" min="18" max="65" class="inpt-frmt" placeholder="<Your current age>">
			<br>

			<label for="city">Enter your city</label>
		    <input class="inpt-frmt" type="text" name="city" id="city" placeholder="<Kolkata>"><br>

			<label for="b_groups">Choose your blood group:</label>
			<select name="b_groups" id="b_groups" class="inpt-frmt">
				<option value="none" selected disabled hidden>Select the blood group</option>
				<?php

					require "db_config.php";

					$query = "SELECT * FROM blood_groups WHERE emergency_status LIKE 'Yes'";
					$result=mysqli_query($conn,$query);
					while($row=mysqli_fetch_assoc($result)){
						echo '<option value="'.$row['blood_group'].'">'.$row['blood_group'].'</option>';
					}

				?>
			</select>
			<br>

			<label for="donor_mail">Email</label>
		    <input class="inpt-frmt" type="email" name="email" id="donor_mail" placeholder="xyz@gmail.com"><br>

		    <label for="number">Contact Number</label>
		    <input class="inpt-frmt" type="number" name="number" id="number" placeholder="Type in contact number" required maxlength="10"><br>

		    <label for="disease">Type in any chronic diseases that you have:</label>
			<input class="inpt-frmt" type="text" name="disease" id="disease" placeholder="allergy, diabetes, cancer..." style="margin-bottom: 10px;"><br>

			<input id="unit" value="370" hidden>

			<a href="b_confrm_sbmttd_success.php" class="btn btn-warning" id="donor_details_sbmt_btn">Submit</a>
			
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<script type="text/javascript" src="js/emgncy_blood_donor_form.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>