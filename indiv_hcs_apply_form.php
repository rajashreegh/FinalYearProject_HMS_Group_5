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
	<title>Apply for Individual scheme | CareVista</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/blood_donor_form.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Outfit:wght@400;500&family=Roboto+Slab:wght@400;500&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Luxurious+Roman&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Dongle:wght@400;700&display=swap" rel="stylesheet">

	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
</head>


<style type="text/css">

body{
	background-color: white;
}
#donor_form_box{
	height: 70vh;
	margin-top: 4%;
	background-color: rgb(238, 230, 214);
	color: black;
}
#donor_form_box h2{
	margin-bottom: 35px;
}

</style>


<body>

	<?php include 'includes/patient_navbar.php';?>

	<div id="donor_form_box">
		<h2>Apply for Scheme</h2>
		<form id="donor_form" method="POST" action="add_applicants_hcs.php">

			<label for="donor_name">Name</label>
		    <input class="inpt-frmt" type="text" name="name" id="donor_name" 
		    		value="<?php echo $name; ?>" readonly><br>

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

		    <input type="submit" name="" value="Submit" class="btn btn-dark" id="donor_details_sbmt_btn">

		    <input type="" name="s_id" hidden value="<?php echo $s_id; ?>">
		    <input type="" name="p_id" hidden value="<?php echo $p_id; ?>">
			
		</form>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>