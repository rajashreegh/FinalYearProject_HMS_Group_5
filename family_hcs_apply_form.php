<?php

session_start();

$name = $_SESSION['patient_name'];
$p_email=$_SESSION['patient_email'];
$p_id=$_SESSION['patient_id'];
$s_id=$_GET['s_id'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Family Scheme Apply Form | CareVista</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="css/blood_donor_form.css">
	<link rel="stylesheet" type="text/css" href="css/family_hcs_apply_form.css">
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Outfit:wght@400;500&family=Roboto+Slab:wght@400;500&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Luxurious+Roman&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Dongle:wght@400;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Teko:wght@500&display=swap" rel="stylesheet">

	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
</head>
<body>

	<?php include 'includes/patient_navbar.php';?>

	<div id="form_box">
		<div id="form1">
			<label for="donor_name">Name</label>
		    <input class="inpt-frmt" type="text" name="name" id="donor_name" 
		    		value="<?php echo $name; ?>" readonly><br>

		    <p style="display:inline-block;margin-right: 30px;font-family: 'Dongle', sans-serif;
					font-size: 1.8rem;font-weight: bold;letter-spacing: 2px;">Select your gender</p>
		    <input type="radio" id="male" name="gender" value="male">
			<label for="male" style="margin-right: 13px;">Male</label>
			<input type="radio" id="female" name="gender" value="female">
			<label for="female" style="margin-right: 13px;">Female</label>
			<input type="radio" id="others" name="gender" value="others">
			<label for="others" style="margin-right: 13px;">Others</label>
			<br>

			<label for="age">Enter your age</label>
			

			<?php 

			require "db_config.php";

			$query="SELECT p.DOB,c.town,c.contact_number FROM patient_contact_info c 
					INNER JOIN 	patient_personal_info p ON c.patient_id = p.patient_id 
					WHERE c.patient_id=$p_id";

			$result=mysqli_query($conn,$query);
			$fetched_result=mysqli_fetch_assoc($result);

			$date_default = "0000-00-00";

			if($fetched_result['DOB']!=$date_default){
				
  				$dateOfBirth = $fetched_result['DOB'];
  				$today = date("Y-m-d");
  				$diff = date_diff(date_create($dateOfBirth), date_create($today));
  				$age = $diff->format('%y');
  				

  				echo '<input type="number" id="age" name="age" min="18" max="59" class="inpt-frmt" value="'.$age.'" readonly>';

			}else{
				echo '<input type="number" id="age" name="age" min="18" max="59" class="inpt-frmt" placeholder="<Your current age>">';
			}

			echo '<br>';
			echo '<label for="city">Enter your city</label>';

			if($fetched_result['town']!=NULL){
				echo '<input class="inpt-frmt" type="text" name="city" id="city" 
						value="'.$fetched_result['town'].'" readonly><br>';
			}else{
				echo '<input class="inpt-frmt" type="text" name="city" id="city" placeholder="<Kolkata>"><br>';
			}

			echo '<label for="number">Contact Number</label>';

			if($fetched_result['contact_number']!=NULL){
				echo '<input class="inpt-frmt" type="number" name="number" id="number" 
		    			value="'.$fetched_result['contact_number'].'" readonly><br>';
		    	}else{
		    		echo '<input class="inpt-frmt" type="number" name="number" id="number" placeholder="Type in contact number" required maxlength="10"><br>';
		    	}

			?>
			

			<label for="donor_mail">Email</label>
		    <input class="inpt-frmt" type="email" name="email" id="donor_mail" 
		    		value="<?php echo $p_email; ?>" readonly><br>

		    <label for="sp_name">Spouse Name</label>
		    <input class="inpt-frmt" type="text" name="sp_name" id="sp_name" placeholder="<First Name><Second Name>"><br>

		    <p style="display:inline-block;margin-right: 30px;font-family: 'Dongle', sans-serif;
					font-size: 1.8rem;font-weight: bold;letter-spacing: 2px;">Select your spouse's gender</p>
		    <input type="radio" id="sp_male" name="sp_gender" value="male">
			<label for="sp_male" style="margin-right: 13px;">Male</label>
			<input type="radio" id="sp_female" name="sp_gender" value="female">
			<label for="sp_female" style="margin-right: 13px;">Female</label>
			<input type="radio" id="sp_others" name="sp_gender" value="others">
			<label for="sp_others" style="margin-right: 13px;">Others</label>
			<br>

		    <label for="sp_age">Enter your spouse's age</label>
			<input type="number" id="sp_age" name="sp_age" min="18" max="59" class="inpt-frmt" placeholder="<spouse current age>"><br>

		    <input type="" id="s_id" hidden value="<?php echo $s_id; ?>">
		    <input type="" id="p_id" hidden value="<?php echo $p_id; ?>">

		    <input type="checkbox" name="" id="chck-box" style="margin-right: 3%;">
		    <label for="chck-box">
		    	I want to add my children under this scheme
		    </label>

		    <a href="hcs_scheme_applied_scss.php" class="btn btn-dark" id="family_plan_apply_btn1">Apply</a>

		</div>

		<div id="form2" class="hide">
			<i class="fas fa-times" id="cross"></i>

			<h4>1<sup>st</sup> Child Details</h4>

			<label for="ch1_name">Child1 Name</label>
		    <input class="inpt-frmt" type="text" name="ch1_name" id="ch1_name" placeholder="<First Name><Second Name>"><br>

		    <p style="display:inline-block;margin-right: 30px;font-family: 'Dongle', sans-serif;
					font-size: 1.8rem;font-weight: bold;letter-spacing: 2px;">Select your child's gender</p>
		    <input type="radio" id="ch1_male" name="ch1_gender" value="male">
			<label for="ch1_male" style="margin-right: 13px;">Male</label>
			<input type="radio" id="ch1_female" name="ch1_gender" value="female">
			<label for="ch1_female" style="margin-right: 13px;">Female</label>
			<input type="radio" id="ch1_others" name="ch1_gender" value="others">
			<label for="ch1_others" style="margin-right: 13px;">Others</label>
			<br>

		    <label for="ch1_age">Enter your child's age</label>
			<input type="number" id="ch1_age" name="ch1_age" max="17" class="inpt-frmt" placeholder="<child's current age>"><br>


			<h4 style="margin-top: 4%;">2<sup>nd</sup> Child Details</h4>

			<label for="ch2_name">Child2 Name</label>
		    <input class="inpt-frmt" type="text" name="ch2_name" id="ch2_name" placeholder="<First Name><Second Name>"><br>

		    <p style="display:inline-block;margin-right: 30px;font-family: 'Dongle', sans-serif;
					font-size: 1.8rem;font-weight: bold;letter-spacing: 2px;">Select your child's gender</p>
		    <input type="radio" id="ch2_male" name="ch2_gender" value="male">
			<label for="ch2_male" style="margin-right: 13px;">Male</label>
			<input type="radio" id="ch2_female" name="ch2_gender" value="female">
			<label for="ch2_female" style="margin-right: 13px;">Female</label>
			<input type="radio" id="ch2_others" name="ch2_gender" value="others">
			<label for="ch2_others" style="margin-right: 13px;">Others</label>
			<br>

		    <label for="ch2_age">Enter your child's age</label>
			<input type="number" id="ch2_age" name="ch2_age" max="17" class="inpt-frmt" placeholder="<child's current age>"><br>

			<a href="hcs_scheme_applied_scss.php" class="btn btn-dark" id="family_plan_apply_btn2">Apply</a>
		</div>

	</div>


	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<script type="text/javascript" src="js/family_hcs_apply_form_1.js"></script>
	<script type="text/javascript" src="js/family_hcs_apply_form_2.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>