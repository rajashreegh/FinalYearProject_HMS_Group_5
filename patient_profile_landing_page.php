<?php

session_start();

$name = $_SESSION['patient_name'];
$id = $_SESSION['patient_id'];
$mail = $_SESSION['patient_email'];
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Patient Profile | CareVista Hospital</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/patient_profile_lp.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Outfit:wght@400;500&family=Roboto+Slab:wght@400;500&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
	<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Mochiy+Pop+P+One&family=Moon+Dance&family=The+Nautigal:wght@700&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include 'includes/patient_navbar.php';?>

	<div class="section-1">
		<img src="IMAGES/img5/bg_final.jpg" class="bg">
		<?php
			require "db_config.php";
			$query = "SELECT * FROM patient_dp
					  WHERE patient_id='$id'";
			$result=mysqli_query($conn,$query);
			$row=mysqli_fetch_assoc($result);
			$imageURL = 'patient_dp_uploads/'.$row["file_name"];
		?>
		<img src="<?php echo $imageURL; ?>" class="dp">
		<div class="patient-mail-id">
			<p>My Patient ID: <?php echo "$id"; ?> </p>
			<p>My Email ID: <?php echo "$mail"; ?> </p>
		</div>
	</div>

	<div class="heading">
		<h1>WELCOME</h1><br>
		<h3>Update Your Profile, Help us know you better...</h3>
	</div>

	<button class="edit-btn" onclick="window.location.href='edit_patient_profile.php';"><i class="fas fa-edit"></i>  Edit Profile</button>

	<div class="line-break"></div>

	<div class="profile-menu-bar">
		<nav>
            <ul id="menuList">
                <li><a onclick="showPersonal()">My Personal Information</a></li>
                <li><a onclick="showContact()">My Contact Information</a></li>
                <li><a onclick="showEmergency()">My Emergency Contact</a></li>
            </ul>
        </nav>
	</div>

	<div class="patient-info-section" id="personal_info_section">

		<?php

			require "db_config.php";
			$query1 = "SELECT * FROM patient_personal_info
					  WHERE patient_id='$id'";
			$result1=mysqli_query($conn,$query1);
			$row1=mysqli_fetch_assoc($result1);
			echo '<div class="sub-sections">
					<h2>NAME: </h2>
					<div class="line"></div>
					<p>'.$name.'</p>
				</div>
				<div class="sub-sections">
					<h2>DATE OF BIRTH: </h2>
					<div class="line"></div>
					<p>'.$row1['DOB'].'</p>
				</div>
				<div class="sub-sections">
					<h2>GENDER: </h2>
					<div class="line"></div>
					<p>'.$row1['Gender'].'</p>
				</div>
				<div class="sub-sections">
					<h2>BLOOD GROUP: </h2>
					<div class="line"></div>
					<p>'.$row1['Blood_Group'].'</p>
				</div>
				<div class="sub-sections">
					<h2>HEIGHT: </h2>
					<div class="line"></div>
					<p>'.$row1['Height'].'  feet</p>
				</div>
				<div class="sub-sections">
					<h2>WEIGHT: </h2>
					<div class="line"></div>
					<p>'.$row1['Weight'].'   Kg</p>
				</div>'
		?>

	</div>


	<div class="patient-info-section" id="contact_info_section">

		<?php
			require "db_config.php";
			$query2 = "SELECT * FROM patient_contact_info
					  WHERE patient_id='$id'";
			$result2=mysqli_query($conn,$query2);
			$row2=mysqli_fetch_assoc($result2);

			echo '<div class="sub-sections">
					<h2>CONTACT NUMBER: </h2>
					<div class="line"></div>
					<p>'.$row2['contact_number'].'</p>
				</div>
				<div class="sub-sections">
					<h2>ADDRESS: </h2>
					<div class="line"></div>
					<p>'.$row2['address'].'</p>
				</div>
				<div class="sub-sections">
					<h2>COUNTRY: </h2>
					<div class="line"></div>
					<p>'.$row2['country'].'</p>
				</div>
				<div class="sub-sections">
					<h2>STATE: </h2>
					<div class="line"></div>
					<p>'.$row2['state'].'</p>
				</div>
				<div class="sub-sections">
					<h2>CITY / TOWN: </h2>
					<div class="line"></div>
					<p>'.$row2['town'].'</p>
				</div>
				<div class="sub-sections">
					<h2>PINCODE: </h2>
					<div class="line"></div>
					<p>'.$row2['pincode'].'</p>
				</div>'

		?>
	</div>


	<div class="patient-info-section" id="emergency_info_section">

		<?php
			require "db_config.php";
			$query3 = "SELECT * FROM patient_emergency_info
					  WHERE patient_id='$id'";
			$result3=mysqli_query($conn,$query3);
			$row3=mysqli_fetch_assoc($result3);

			echo '<div class="sub-sections">
					<h2>NAME: </h2>
					<div class="line"></div>
					<p>'.$row3['name'].'</p>
				</div>
				<div class="sub-sections">
					<h2>RELATIONSHIP: </h2>
					<div class="line"></div>
					<p>'.$row3['relationship'].'</p>
				</div>
				<div class="sub-sections">
					<h2>CONTACT NUMBER: </h2>
					<div class="line"></div>
					<p>'.$row3['contact_number'].'</p>
				</div>
				<div class="sub-sections">
					<h2>E-MAIL ID: </h2>
					<div class="line"></div>
					<p>'.$row3['mail_id'].'</p>
				</div>
				<div class="sub-sections">
					<h2>ADDRESS: </h2>
					<div class="line"></div>
					<p>'.$row3['address'].'</p>
				</div>'

		?>
	</div>
	
	<img class="patient_pic" src="IMAGES/img5/patient.jpg">

	<footer class="footer">
        <div class="fcontainer">
            <div class="fitems"  style="margin-top: 0px">
                <img src="IMAGES/img3/logo_new.png" alt="logo image" width="80px" height="70px" style="margin-top: 10px;";>
            </div>
            <div class="fitems" style="margin-right: 80px;">
                <p>careVista</p>
            </div>
            <div class="fitems">
                <p>call us - 225-336-336</p>
            </div>
            <div class="fitems" style="margin-left: 30px;">
                <p>email us- carevista@gmail.com</p>
            </div>
        </div>
    </footer>



	<script type="text/javascript">
		function showPersonal(){
			document.getElementById("personal_info_section").style.display="block";
			document.getElementById("contact_info_section").style.display="none";
			document.getElementById("emergency_info_section").style.display="none";
		}

		function showContact(){
			document.getElementById("personal_info_section").style.display="none";
			document.getElementById("contact_info_section").style.display="block";
			document.getElementById("emergency_info_section").style.display="none";
		}

		function showEmergency(){
			document.getElementById("personal_info_section").style.display="none";
			document.getElementById("contact_info_section").style.display="none";
			document.getElementById("emergency_info_section").style.display="block";
		}
	</script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>