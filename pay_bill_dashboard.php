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
	<title>Pay Bill | CareVista Hospital</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/pay_bill_dashboard.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Outfit:wght@400;500&family=Roboto+Slab:wght@400;500&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link href="https://fonts.googleapis.com/css2?family=Ultra&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
    <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
	<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Mochiy+Pop+P+One&family=Moon+Dance&family=The+Nautigal:wght@700&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include 'includes/patient_navbar.php';?>
    <div class="container-fluid mt-3">
        <div class="row mt-4 d-flex justify-content-center">
            <div class="card mr-4 text-center card-1">
                <div class="card-body d-flex flex-column">
                    Pay for Check Up Bookings
                    <a href="payment_gateway.php?payment_type=1"><i class="fas fa-arrow-circle-right"></i></a>
                </div>
             </div>
            <div class="card mr-4 card-2">
                <div class="card-body d-flex flex-column">
                    Pay for Labtest Bookings
                    <a href="payment_gateway.php?payment_type=2"><i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row mt-4 d-flex justify-content-center">
            <div class="card mr-4 card-3">
                <div class="card-body d-flex flex-column">
                    Pay for Hospital Charges
                    <a href="payment_gateway.php?payment_type=3"><i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="card mr-4 card-4">
                <div class="card-body d-flex flex-column">
                    View Payment History
                    <a href="payment_history.php?pid=<?php echo $id;?>"><i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>