<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Blood Requisition Form | CareVista</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/blood_requisition_form.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link href="https://fonts.googleapis.com/css2?family=Luxurious+Roman&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Dongle:wght@400;700&display=swap" rel="stylesheet">

	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
</head>
<body>

	<?php include 'includes/blood_navbar.php';?>

	<div id="box">
		<div id="box_l"></div>
		<div id="box_r">
			<form method="POST" action="add_blood_request_details.php" enctype="multipart/form-data">

			<label for="name">Name</label>
		    <input class="inpt-frmt" type="text" name="name" id="name" required placeholder="<First Name><Second Name>"><br>

		    <p style="display:inline-block;margin-right: 30px;font-family: 'Dongle', sans-serif;
					font-size: 1.8rem;font-weight: bold;letter-spacing: 2px;">Select your gender</p>
		    <input type="radio" id="male" name="gender" value="male" required>
			<label for="male">Male</label>
			<input type="radio" id="female" name="gender" value="female">
			<label for="female">Female</label>
			<input type="radio" id="others" name="gender" value="others">
			<label for="others">Others</label>
			<br>

			<label for="age">Enter your age</label>
			<input type="number" id="age" name="age" class="inpt-frmt" placeholder="<Your current age>" required>
			<br>

			<label for="city">Enter your city</label>
		    <input class="inpt-frmt" type="text" name="city" id="city" required placeholder="<Kolkata>"><br>

			<label for="b_groups">Choose your blood group:</label>
			<select name="b_group" id="b_groups" class="inpt-frmt" required>
				<option value="none" selected disabled hidden>Select the blood group</option>
				<?php

					require "db_config.php";

					$query = "SELECT * FROM blood_groups";
					$result=mysqli_query($conn,$query);
					while($row=mysqli_fetch_assoc($result)){
						echo '<option value="'.$row['blood_group'].'">'.$row['blood_group'].'</option>';
					}

				?>
			</select>
			<br>

			<label for="unit">Unit of blood required</label>
		    <input class="inpt-frmt" type="number" name="unit" id="unit"required><br>

			<label for="mail">Email</label>
		    <input class="inpt-frmt" type="email" name="mail" id="mail" placeholder="xyz@gmail.com"><br>

		    <label for="number">Contact Number</label>
		    <input class="inpt-frmt" type="number" name="number" id="number" placeholder="Type in contact number" required maxlength="10"><br>

		    <label for="presc">Prescription [.pdf format]</label>
		    <input class="inpt-frmt" type="file" name="presc" id="presc" required 
		    		accept=".pdf" style="margin-bottom: -3px;"><br>

		    <input type="submit" name="submit" value="Submit" class="btn btn-warning" id="recipient_details_sbmt_btn">
		    </form>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>