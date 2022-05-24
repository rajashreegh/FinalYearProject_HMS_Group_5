<?php

session_start();

$name = $_SESSION['patient_name'];

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Health Card Schemes Landing Page | CareVista Hospital</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/health_card_landing_page.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Outfit:wght@400;500&family=Roboto+Slab:wght@400;500&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Acme&family=Patua+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Sedgwick+Ave&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@1,500&family=Pacifico&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@1,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Supermercado+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+P+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Quintessential&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Murecho:wght@500;600&display=swap" rel="stylesheet">

	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
</head>
<body>
	<?php include 'includes/patient_navbar.php';?>

	<div id="health_intro">
		<div id="health_intro_content">
			<div class="def">
				<h2>What are health schemes ??</h2>
				<p>Health card plans reimburse insured customers for their medical expenses, including treatments, surgeries, hospitalisation and the like which arise from injuries/illnesses, or directly pay out a certain pre-determined sum to the customer. It offers coverage for any future medical expenses of the customer.</p>
			</div>
			<div class="def">
				<h2>Why to choose one ??</h2>
				<div>
					<i class="fas fa-hand-point-right"></i>Covers future illnesses/medical treatments without depleting your savings<br>
					<i class="fas fa-hand-point-right"></i>Affording huge medical care becomes a problem during emergencies.<br>
					<i class="fas fa-hand-point-right"></i><span style="font-style: italic;">CASHLESS TREATMENT </span> is possible. <br>
					<i class="fas fa-hand-point-right"></i>Keeps you and your family worry free<br>
					<i class="fas fa-hand-point-right"></i>Coverage against a huge range of expenditure.<br>
				</div>
			</div>
		</div>
	</div>

	<h1 id="notice">All PREMIUM PLANS provide COVID 19 COVERAGE !!!</h1>

	<h3 id="only">EXCLUSIVE FOR <br> CareVista !!!</h3>

	<div id="plans">
		<div class="policy" id="policy1">
			<div class="p1"><img src="IMAGES/img/h_i.jpg"></div>
			<div class="p2">
				<h3>Individual Plan</h3>
				<p>These are basic health insurance plans, covering the costs of the PERSON insured</p>
				<a href="individual_policy.php">Learn More ...</a>
				<button  class="btn btn-primary" id="button1">Next</button>
			</div>
		</div>

		<div class="policy hide" id="policy2">
			<div class="p1"><img src="IMAGES/img/h_f.jpg"></div>
			<div class="p2">
				<h3 style="margin-bottom: 4%;">Family Plan</h3>
				<p style="margin-bottom: 3%;">These are health insurance plans where ALL FAMILY MEMBERS can be included in a single coverage model. In this case, a fixed sum assured is provided to any family member who falls ill</p>
				<h2 style="font-family: 'Kanit', sans-serif;margin-bottom: 10px;">MAXIMUM 4 MEMBERS</h2>
				<a href="family_policy.php">Learn More ...</a>
				<button  class="btn btn-primary" id="button2">Next</button>
			</div>
		</div>

		<div class="policy hide" id="policy3">
			<div class="p1"><img src="IMAGES/img/h_s.jpg"></div>
			<div class="p2">
				<h3>Senior Citizen Plan</h3>
				<p>These are special insurance policies designed to meet the needs of senior citizens who are ABOVE 60 years of age</p>
				<a href="senior_citizen_policy.php">Learn More ...</a>
				<button  class="btn btn-primary" id="button3">Next</button>
			</div>
		</div>

		<div class="policy hide" id="policy4">
			<div class="p1"><img src="IMAGES/img/h_c.jpg"></div>
			<div class="p2">
				<h3>Critical Care Plan</h3>
				<p>These plans cover specific CRITICAL ILLNESS such as kidney ailments, heart attacks and so on. CANCER insurance and other plans included in this section as well.</p>
				<a href="critical_care_policy.php">Learn More ...</a>
				<button  class="btn btn-primary" id="button4">Back</button>
			</div>
		</div>
	</div>

	<div id="highlights">
		<i class="fas fa-star"></i>All the plans can be claimed atleast after paying the premium for 2 years.<br>
		<i class="fas fa-star"></i>Premium must be paid in the period Jan - Jul. U can automate this process and link it with your bank account. For this, kindly <br>contact on <span class="cntct"><i class="fas fa-headset" style="margin:0px 11px; "></i>225-336-337 </span>or 
		<br> mail to  <span class="cntct"><i class="fas fa-at" style="margin:0px 11px; "></i>carevista_hcs@gmail.com</span><br>
	</div>

	<div id="my_scheme_box">
		<div id="quote">
			<i class="fas fa-quote-left"></i>
			<h3>Health is Wealth</h3>
			<p>Rich or not <br> We all have got <br>Chances in lifetime 
				<br> To live quite sublime</p>
			<hr>
			<i class="fas fa-heart" id="heart"></i>
		</div>
		<div id="my_scheme">
			<h3>My Schemes</h3>
			<a href="applied_hcs.php"><i class="fas fa-arrow-circle-right"></i></a>
		</div>
	</div>

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

    
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<script type="text/javascript" src="js/health_card_landing_page.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>