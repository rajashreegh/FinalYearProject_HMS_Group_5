<?php

require "db_config.php";

session_start();

if(!empty($_GET)){
	$err=$_GET['err'];
}else{
	$err=0;
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CareVista Superspeciality Hospital</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/home_contact.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link href="https://fonts.googleapis.com/css2?family=Arvo:ital,wght@0,700;1,400&family=Mochiy+Pop+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+P+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Moon+Dance&display=swap" rel="stylesheet">

	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>

</head>
<body>
	<div id="home">
		<nav id="navbar">
			<div id="icon">
				<img src="IMAGES/img/icon.jpg" alt="icon">
			</div>
			<div id="menu">
				<ul>
					<li><a href="">Home</a></li>
					<li><a href="about_us.php">About Us</a></li>
					<li><a href="services.php">Services</a></li>
					<li><a href="#contact">Contact Us</a></li>
				</ul>
			</div>
		</nav>
		<div id="body">
			<h2>Welcome to...</h2>
			<h1>CareVista Superspeciality Hospital</h1>
			<h4>The care you need. The compassion you deserve.</h4>
			<p>It's all about you !!!</p>
		</div>
	</div>


	<div id="modules" class="container">
		<h2>Dive in ... Choose yours !!</h2>
		<div id="module-box">
			<div class="module">
				<img src="IMAGES/img/admin.png" alt="admin">
				<h3>ADMIN</h3>
				<button class="btn btn-primary" data-toggle="modal" data-target="#adminLoginModal">Login</button>
			</div>
			<div class="module">
				<img src="IMAGES/img/doctor.jpg" alt="doctor">
				<h3>DOCTOR</h3>
				<button class="btn btn-primary" data-toggle="modal" data-target="#doctorLoginModal">Login</button>
			</div>
			<div class="module">
				<img src="IMAGES/img/patient.jpg" alt="patient">
				<h3>PATIENT</h3>
				<button class="btn btn-primary" data-toggle="modal" data-target="#patientLoginModal">Login</button>
			</div>
		</div>
	</div>

	<div id="extra_module">
		<h2><i class="fas fa-heartbeat heart" style="margin-right:20px; "></i>At your service<i class="fas fa-heartbeat heart" style="margin-left:20px; "></i></h2>
		<div id="em_content">
			<div id="em_left">
				<img src="IMAGES/img/d1.jpg">
			</div>
			<div id="em_right">
				<div class="ems">
					<img src="IMAGES/img/vaccine.jpg">
					<h3>Vaccination</h3>
					<a data-toggle="modal" data-target="#vaccinationLoginModal" style="cursor:pointer;"><i class="fas fa-hand-point-up click_btn"></i></a>
				</div>
				<div class="ems" style="margin-left:30%; ">
					<img src="IMAGES/img/Blood.jpg">
					<h3>Blood Bank</h3>
					<a href="blood_bank_dashboard.php"><i class="fas fa-hand-point-up click_btn"></i></a>
				</div>
				<div class="ems">
					<img src="IMAGES/img/organ.jpg">
					<h3>Organ Donation</h3>
					<a href="organ_donation_dashboard.php"><i class="fas fa-hand-point-up click_btn"></i></a>
				</div>
			</div>
		</div>
	</div>

	<div id="carousel-box">
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="IMAGES/img/c1.jpg" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h5 style="color:black;">Modern Technologies</h5>
                <p style="color:black;">We adapt to new innovations in medical field for benefit of our patients.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="IMAGES/img/c2.jpg" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
                <h5 style="color:white;">Our Patients</h5>
                <p style="color:white;">We are 24x7 into the care of our patients.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="IMAGES/img/c3.jpg" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
                <h5 style="color:black;">Renowned Doctors</h5>
                <p style="color:black;">We adapt to new innovations in medical field for benefit of our patients.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="IMAGES/img/c4.jpg" alt="Fourth slide">
            <div class="carousel-caption d-none d-md-block">
                <h5 style="color:white;">Top notch Facilities</h5>
                <p style="color:white;">We vow to provide our patients with all kinds of facilities.</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
	</div>
	</div>


	<div id="location">
		<h2><i class="fas fa-map-marker-alt"></i>  Locate Us</h2>
		<div id="map-box" class="container">
			<div id="locations">
				<ul>
					<li><i class="fas fa-map-marker"></i>Kolkata</li>
					<li><i class="fas fa-map-marker"></i>Delhi</li>
					<li><i class="fas fa-map-marker"></i>Chennai</li>
					<li><i class="fas fa-map-marker"></i>Mumbai</li>
					<li><i class="fas fa-map-marker"></i>Ahmedabad</li>
					<li><i class="fas fa-map-marker"></i>Nagpur</li>
					<li><i class="fas fa-map-marker"></i>Bengalore</li>
				</ul>
			</div>
			<div id="map">
				<iframe src="https://www.google.com/maps/d/u/0/embed?mid=1bR3UcitXRIYmX0YJWYSpOXbc7nHfYkg3" width="640" height="480"></iframe>
			</div>
		</div>
	</div>


	<div id="contact">
		<h2><i class="fas fa-headphones"></i>  Contact Us</h2>
		<div id="contact-info" class="container">
			<div id="contact-info-left">
				<h4>Always at your service...</h4><br>
				<img src="IMAGES/img/icon.jpg" alt="icon">
			</div>
			<div id="contact-info-right">
				<h4><i class="fas fa-envelope"></i>carevista@gmail.com</h4>
				<h4><i class="fas fa-phone-alt"></i>225-336-336</h4>
				<div id="social-media">
					<i class="fab fa-facebook"></i>
					<i class="fab fa-whatsapp-square"></i>
					<i class="fab fa-twitter-square"></i>
				</div>
			</div>
		</div>
		<img src="IMAGES/img/up-arrow.png" id="scroll_to_top_btn">
	</div>

    <!-- Admin Login -->

	<div class="modal fade" id="adminLoginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header bgclr">
		        <h5 class="modal-title text-white" id="exampleModalLabel">Login</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<p id="admin_login_error" class="text-danger"></p>
		        <form action="admin_login_validation.php" method="POST">

		        	<i class="fas fa-envelope-open-text icon-design"></i><label for="admin_mail">Email</label><br>
		        	<input class="inpt-frmt" type="email" name="email" id="admin_mail" placeholder="xyz@gmail.com"><br>

		        	<i class="fas fa-user-lock icon-design"></i><label for="admin_pswrd">Password</label><br>
		        	<input class="inpt-frmt" type="password" name="password" id="admin_pswrd" placeholder="Abc@_$234"><br>
					<span class="eye"  onclick="toggle1()">
					<i id="hide1" class="fas fa-eye"></i>
					<i id="hide2" class="fas fa-eye-slash"></i>
					</span>

		        	<input type="submit" name="" class="btn btn-dark btn-block" value="Login">

		        </form>
		      </div>
		    </div>
	  </div>
	</div>
   
	<!-- Doctor Login -->

	<div class="modal fade" id="doctorLoginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header bgclr">
		        <h5 class="modal-title text-white" id="exampleModalLabel">Login</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<p id="doctor_login_error" class="text-danger"></p>
		        <form action="doctor_login_validation.php" method="POST">

		        	<i class="fas fa-envelope-open-text icon-design"></i><label for="doc_mail">Email</label><br>
		        	<input class="inpt-frmt" type="email" name="email" id="doc_mail" placeholder="xyz@gmail.com"><br>

		        	<i class="fas fa-user-lock icon-design"></i><label for="doc_pswrd">Password</label><br>
		        	<input class="inpt-frmt" type="password" name="password" id="doc_pswrd" placeholder="Abc@_$234"><br>
					<span class="eye1"  onclick="toggle2()">
					<i id="hide3" class="fas fa-eye"></i>
					<i id="hide4" class="fas fa-eye-slash"></i>
					</span>

		        	<input type="submit" name="" class="btn btn-dark btn-block" value="Login">

		        </form>

		        <p class="mt-5 text-center">
		        	Not a Registered Doctor?? 
		        	<button class="btn btn-primary btn-sm" id="doctor_reg_btn">Please contact the hospital authority</button>
		        </p>
		      </div>
		    </div>
	  </div>
	</div>


	<!-- Patient Login -->

	<div class="modal fade" id="patientLoginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header bgclr">
		        <h5 class="modal-title text-white" id="exampleModalLabel">Login</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<p id="patient_login_error" class="text-danger"></p>
		        <form action="patient_login_validation.php" method="POST">

		        	<i class="fas fa-envelope-open-text icon-design"></i><label for="mail">Email</label><br>
		        	<input class="inpt-frmt" type="email" name="email" id="patient_mail" placeholder="xyz@gmail.com"><br>

		        	<i class="fas fa-user-lock icon-design"></i><label for="pswrd">Password</label><br>
		        	<input class="inpt-frmt" type="password" name="password" id="patient_pswrd" placeholder="Abc@_$234"><br>

		        	<span class="eye1"  onclick="toggle3()">
						<i id="hide5" class="fas fa-eye"></i>
						<i id="hide6" class="fas fa-eye-slash"></i>
					</span>

		        	<input type="submit" name="" class="btn btn-dark btn-block" value="Login">

		        </form>

		        <p class="mt-5 text-center">
		        	Not a Patient?? 
		        	<button class="btn btn-primary btn-sm" id="patient_reg_btn">Sign Up</button>
		        </p>
		      </div>
		    </div>
	  </div>
	</div>


	<!-- Patient Registration -->

	<div class="modal fade" id="patientRegisterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header bgclr">
		        <h5 class="modal-title text-white" id="exampleModalLabel">Sign Up</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<p id="patient_reg_error" class="text-danger"></p>
		        <form action="patient_reg_validation.php" method="POST">
		        	<i class="far fa-user icon-design"></i><label for="reg-name">Username</label><br>
		        	<input class="inpt-frmt" type="text" name="name" id="patient_reg-name" placeholder="<First_name> <Second_name>"><br>

		        	<i class="fas fa-envelope-open-text icon-design"></i><label for="reg-mail">Email</label><br>
		        	<input class="inpt-frmt" type="email" name="email" id="patient_reg-mail" placeholder="xyz@gmail.com"><br>

		        	<i class="fas fa-user-lock icon-design"></i><label for="reg-pswrd">Password</label><br>
		        	<input class="inpt-frmt" type="password" name="password" id="patient_reg-pswrd" placeholder="Abc@_$234"><br>

		        	<span class="eye2"  onclick="toggle4()">
						<i id="hide7" class="fas fa-eye"></i>
						<i id="hide8" class="fas fa-eye-slash"></i>
					</span>

		        	<input type="submit" name="reg-btn" class="btn btn-dark btn-block" value="Register">
		        </form>

		        <p class="mt-5 text-center">
		        	Already a Patient?? 
		        	<button class="btn btn-warning btn-sm" id="patient_login_btn">Login</button>
		        </p>
		      </div>
		    </div>
	  </div>
	</div>
	

    <!-- Vaccination Login -->

	<div class="modal fade" id="vaccinationLoginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header bgclr">
		        <h5 class="modal-title text-white" id="exampleModalLabel">Login</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<p id="vaccination_login_error" class="text-danger"></p>
		        <form action="vaccination_login_validation.php" method="POST">

		        	<i class="fas fa-envelope-open-text icon-design"></i><label for="mail">Email</label><br>
		        	<input class="inpt-frmt" type="email" name="email" placeholder="xyz@gmail.com"><br>

		        	<i class="fas fa-user-lock icon-design"></i><label for="pswrd">Password</label><br>
		        	<input class="inpt-frmt" id="vaccination_login_pswrd" type="password" name="password" placeholder="Abc@_$234"><br>

		        	<span class="eye1"  onclick="toggle7()">
						<i id="hide9" class="fas fa-eye"></i>
						<i id="hide10" class="fas fa-eye-slash"></i>
					</span>

		        	<input type="submit" name="" class="btn btn-dark btn-block" value="Login">

		        </form>

		        <p class="mt-5 text-center">
		        	Not yet registered?? 
		        	<button class="btn btn-primary btn-sm" id="vaccination_reg_btn">Sign Up</button>
		        </p>
		      </div>
		    </div>
	  </div>
	</div>


	<!-- Vaccination Registration -->

	<div class="modal fade" id="vaccinationRegisterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header bgclr">
		        <h5 class="modal-title text-white" id="exampleModalLabel">Sign Up</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<p id="vaccination_reg_error" class="text-danger"></p>
		        <form action="vaccination_reg_validation.php" method="POST">
		        	<i class="far fa-user icon-design"></i><label for="reg-name">Username</label><br>
		        	<input class="inpt-frmt" type="text" name="name" id="patient_reg-name" placeholder="<First_name> <Second_name>"><br>

		        	<i class="fas fa-envelope-open-text icon-design"></i><label for="reg-mail">Email</label><br>
		        	<input class="inpt-frmt" type="email" name="email" id="patient_reg-mail" placeholder="xyz@gmail.com"><br>

		        	<i class="fas fa-user-lock icon-design"></i><label for="reg-pswrd">Password</label><br>
		        	<input class="inpt-frmt" type="password" name="password" id="vaccination_signup_pswrd" placeholder="Abc@_$234"><br>

		        	<span class="eye2"  onclick="toggle8()">
						<i id="hide11" class="fas fa-eye"></i>
						<i id="hide12" class="fas fa-eye-slash"></i>
					</span>

		        	<input type="submit" name="reg-btn" class="btn btn-dark btn-block" value="Register">
		        </form>

		        <p class="mt-5 text-center">
		        	Registered user?? 
		        	<button class="btn btn-warning btn-sm" id="vaccination_login_btn">Login</button>
		        </p>
		      </div>
		    </div>
	  </div>
	</div>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

	<script type="text/javascript" src="js/modal_log_reg.js"></script>
	<script type="text/javascript" src="js/vaccination_log_reg.js"></script>
	<script type="text/javascript" src="js/scroll_to_top.js"></script>
	<script type="text/javascript" src="js/admin_password.js"></script>
	<script type="text/javascript" src="js/doc_password.js"></script>
	<script type="text/javascript" src="js/patient_password.js"></script>
	<script type="text/javascript" src="js/vaccination_password.js"></script>

	

	<script type="text/javascript">
		$(document).ready(function(){
			var err = '<?php echo $err; ?>';
			if(err === '1'){
				$('#admin_login_error').text('Incorrect email/password');
				$('#adminLoginModal').modal('show');
			}
			if(err === '3'){
				$('#doctor_login_error').text('Incorrect email/password');
				$('#doctorLoginModal').modal('show');
			}
			if(err === '5'){
				$('#patient_login_error').text('Incorrect email/password');
				$('#patientLoginModal').modal('show');
			}else if(err === '6'){
				$('#patient_reg_error').text('Some error occurred');
				$('#patientRegisterModal').modal('show');
			}
			if(err === '7'){
				$('#vaccination_login_error').text('Incorrect email/password');
				$('#vaccinationLoginModal').modal('show');
			}else if(err === '8'){
				$('#vaccination_reg_error').text('Some error occurred');
				$('#vaccinationRegisterModal').modal('show');
			}
		});
	</script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>