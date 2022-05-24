<?php

require "db_config.php";
session_start();

$name = $_SESSION['patient_name'];
$id = $_SESSION['patient_id'];
$mail = $_SESSION['patient_email'];
$payment_type = $_GET['payment_type'];
$booking_id = $_GET['booking_id'];

if($payment_type==1){
    $query = "SELECT * FROM checkup_bookings
              WHERE booking_id='$booking_id'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);
    $amount = $row['visit'];
    $purpose = 'Payment for Regular Check Up';
}
if($payment_type==2){
    $query = "SELECT * FROM test_bookings
              WHERE booking_id='$booking_id'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);
    $amount = $row['amount'];
    $purpose = 'Payment for Labtest Booking';
}
if($payment_type==3){
    $query = "SELECT b.total_amount 
              FROM discharge_bed a INNER JOIN discharge_bill b ON a.patient_id=b.patient_id
              WHERE a.discharge_id='$booking_id'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);
    $amount = $row['total_amount'];
    $purpose = 'Payment for Hospital Charges';
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Payment gateway | CareVista Hospital</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/proceed_payment.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Outfit:wght@400;500&family=Roboto+Slab:wght@400;500&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ultra&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
    <link href="https://fonts.googleapis.com/css2?family=Tangerine:wght@700&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
	<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Mochiy+Pop+P+One&family=Moon+Dance&family=The+Nautigal:wght@700&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include 'includes/patient_navbar.php';?>
    <div class="container-fluid text-center">
    <input type="text" id="payment_type" name="paymnet_type" value="<?php echo $payment_type; ?>" hidden>
    <input type="text" id="b_id" name="b_id" value="<?php echo $booking_id?>" hidden>
        <?php
            if($payment_type==1){
                echo '<div class="row">
                <div class="col-md-12 text-right">
                    <a href="payment_gateway.php?payment_type=1"><i class="fa fa-angle-double-left back-icon"></i></a>
                </div>
            </div>
            <div class="row row-2">
                <div class="col-md-7">
                    <div class="row head-row"></div>
                    <div class="row mt-4 content text-left mx-2">
                        Purpose: '.$purpose.'<br>
                        Amount to be Paid: Rs. '.$amount.'<br>
                    </div>
                    <div class="row mt-4">
                        <button class="btn btn-success" onclick="pay_now()">Pay Now</button>
                    </div>
                    <div class="row">
                        <img src="IMAGES/payment/secure_logo.png">
                    </div>
                </div>
                <div class="col-md-5"></div>
            </div>';
            }
            if($payment_type==2){
                echo '<div class="row">
                <div class="col-md-12 text-right">
                    <a href="payment_gateway.php?payment_type=2"><i class="fa fa-angle-double-left back-icon"></i></a>
                </div>
                </div>
                <div class="row row-2">
                    <div class="col-md-7">
                        <div class="row head-row"></div>
                        <div class="row mt-4 content text-left mx-2">
                            Purpose: '.$purpose.'<br>
                            Amount to be Paid: Rs. '.$amount.'<br>
                        </div>
                        <div class="row mt-4">
                            <button class="btn btn-success" onclick="pay_now()">Pay Now</button>
                        </div>
                        <div class="row">
                            <img src="IMAGES/payment/secure_logo.png">
                        </div>
                    </div>
                    <div class="col-md-5"></div>
                </div>';
                }
                if($payment_type==3){
                    echo '<div class="row">
                    <div class="col-md-12 text-right">
                        <a href="payment_gateway.php?payment_type=3"><i class="fa fa-angle-double-left back-icon"></i></a>
                    </div>
                    </div>
                    <div class="row row-2">
                        <div class="col-md-7">
                            <div class="row head-row"></div>
                            <div class="row mt-4 content text-left mx-2">
                                Purpose: '.$purpose.'<br>
                                Amount to be Paid: Rs. '.$amount.'<br>
                            </div>
                            <div class="row mt-4">
                                <button class="btn btn-success" onclick="pay_now()">Pay Now</button>
                            </div>
                            <div class="row">
                                <img src="IMAGES/payment/secure_logo.png">
                            </div>
                        </div>
                        <div class="col-md-5"></div>
                    </div>';
                }
        
        ?>
        
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        function pay_now(){
            var b_id = jQuery('#b_id').val();
            var payment_type = jQuery('#payment_type').val();
            console.log(b_id);
            var options = {
            "key": "rzp_test_mE9XDNP376RHLY", // Enter the Key ID generated from the Dashboard
            "amount": "<?php echo $amount; ?>"*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
            "currency": "INR",
            "name": "CareVista Superspeciality Hospital",
            "description": "<?php echo $purpose;?>",
            "image": "IMAGES/img2/Logo.png",
            "handler": function (response){
                console.log(response);
                jQuery.ajax({
                    type:'post',
                    url: 'payment_process.php',
                    data: "payment_id="+response.razorpay_payment_id+"&bid="+b_id+"&payment_type="+payment_type,
                    success:function(result){
                        window.location.href="payment_gateway.php?payment_type=<?php echo $payment_type;?>'"
                    }
                })
                alert('Payment Successful');
            }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
        }
        
    </script>
</body>
</html>