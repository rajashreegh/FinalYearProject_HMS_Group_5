<?php

session_start();

$name = $_SESSION['patient_name'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Success Message | CareVista</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Outfit:wght@400;500&family=Roboto+Slab:wght@400;500&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">

	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
</head>

<style type="text/css">
	body{
		background-color: whitesmoke;
	}
	#scss_msg_box{
		width: 35%;
		height: 50vh;
		margin: auto;
		margin-top: 10%;
		display: flex;
		flex-direction: column;
		justify-content: space-evenly;
		align-items: center;
		background-image: linear-gradient(to top left,#800080,black);
		color: white;
		font-family: 'Acme', sans-serif;
		text-align: center;
		padding: 0px 20px;
	}
	#scss_msg_box i{
		font-size: 3rem;
	}
	#scss_msg_box h2{
		font-size: 2.5rem;
	}
	#scss_msg_box h5{
		font-size: 1.5rem;
		letter-spacing: 1px;
	}
	span{
		font-style: italic;
		margin-left: 10px;
		font-size: 2rem;
	}
</style>

<body>

	<?php include 'includes/patient_navbar.php';?>

	<div id="scss_msg_box">
		<i class="fas fa-check-circle"></i>
		<h2>Applied Successfully !!!</h2>
		<h4>For any assitstance call <span>225-336-336</span></h4>
		<a href="health_card_schemes_landing_page.php" class="btn btn-light btn-block">OK</a>
	</div>


	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>