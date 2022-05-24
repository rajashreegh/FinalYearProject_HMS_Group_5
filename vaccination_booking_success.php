<?php
include "./includes/vaccination_navbar.php";
$booking_id=$_GET['booking_id'];
?>
<style>
    * {
        margin: 0;
        padding: 0;
    }
    .body {
        height: 80vh;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-perspective: 1000px;
        perspective: 1000px;
        -webkit-transform-style: preserve-3d;
        transform-style: preserve-3d;
        position: relative;
        background-color: rgb(252, 249, 249);
        font-family: "Montserrat";
    }
    
    .container {
        min-width: 700px;
        min-height: 400px;
        border-radius: 20px;
        position: relative;
        -webkit-transition: 1.5s ease-in-out;
        transition: 1.5s ease-in-out;
        transform-style: preserve-3d;
    }
    
    .side {
        position: absolute;
        text-align: center;
        width: 100%;
        height: 100%;
        padding: 20px 50px;
        color: #fff;
        transform-style: preserve-3d;
        backface-visibility: hidden;
        border-radius: 20px;
    }
    .content {
        transform: translatez(70px) scale(0.8);
        line-height: 1.5em;
    }
    .content h1 {
        position: relative;
   
    }
    .content p {
        margin-top: 50px;
        line-height: 2em;
    }

    .front {
        z-index: 2;
        background-size: 100vh;
        background-size: cover;
        background-image: url(./IMAGES/img3/img4.jpg);
    }
    .back {
        background-color: #333;
        transform: rotateY(180deg);
        z-index: 0;
        padding-top: 10px;
        background-image: url(https://userscontent2.emaze.com/images/f9538183-0ff9-478f-b964-c8ab90421e3b/3d28e192fda5c17250f96a2779c84475.jpg);
    }
    .container:hover {
        -webkit-transform: rotateY(180deg);
        transform: rotateY(180deg);
    }
    .text-right{
        position: absolute;
        right:2%;
    }
    form {
        text-align: left;
    }
    .back h1 {
        margin: 0;
    }
    form label,
    form input {
        display: block;
    }
    form input,
    form textarea {
        background: transparent;
        border: 0;
        border-bottom: 2px solid #444;
        padding: 5px;
        width: 100%;
        color: #fff;
    }
    form label {
        margin: 15px 0;
    }
    form input[type="submit"] {
        display: block;
        width: auto;
        margin: 10px auto;
        padding: 5px 10px;
        border: 3px solid #555;
        border-radius: 4px;
        color: #fff;
        cursor: pointer;
    }
    /* my button style  */
    .white-mode {
  appearance: button;
  background-color: #4D4AE8;
  background-image: linear-gradient(180deg, rgba(255, 255, 255, .15), rgba(255, 255, 255, 0));
  border: 1px solid #4D4AE8;
  border-radius: 1rem;
  box-shadow: rgba(255, 255, 255, 0.15) 0 1px 0 inset,rgba(46, 54, 80, 0.075) 0 1px 1px;
  box-sizing: border-box;
  color: #FFFFFF;
  cursor: pointer;
  display: inline-block;
  font-family: Inter,sans-serif;
  font-size: 1.8rem;
  font-weight: 500;
  line-height:1;
  margin-left: 500px;
  padding: .4rem 1rem;
  text-align: center;
  text-transform: none;
  transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: middle;
  margin-bottom:60px;
 
}

.button-20:focus:not(:focus-visible),
.button-20:focus {
  outline: 0;
}

.white-mode:hover {
  background-color: #3733E5;
  border-color:

    }

    .cen{
        padding:10px;
        margin-left:140px;
        
    }
    
</style>
<title>Booking Success</title>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://code.iconify.design/2/2.1.1/iconify.min.js"></script>
<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
<div class="body">
<div>
<div class="container">
	<div class="front side">
		<div class="content">
      
			<h1 style="font-size:700%;font-weight:700; margin-top:40px;">
                <span class="iconify" data-icon="fxemoji:pray" style="color: orange;" data-width="70" data-height="70"></span>&nbsp; Success &nbsp;
                <span class="iconify" data-icon="fxemoji:pray" style="color: orange;" data-width="70" data-height="70"></span>
            </h1>
			<p style="font-size:300%;font-weight:400; margin-top:70px;">Booking Done Successfully !!!<br> 
                CALL - 225-336-336 for any query<br>
                
			</p>
		</div>
        <div class="text-right">
            <i class="fa fa-solid fa-arrows-rotate fa-2xl"></i>
        </div>
	</div>

    <input type="text" id="b_id" name="b_id" value="<?php echo $booking_id?>" hidden>;

	<div class="back side">
		<div class="content">
			<h2 style="font-size:300%;margin-bottom:15px;">Your booking details</h2>
            <div style="text-align:left; font-size:25px;">
                <?php
                    include "db_config.php";
                    
                    $query = "SELECT * FROM vaccination_bookings b
                            INNER JOIN vaccine_list l on l.vaccine_id=b.vaccine_id WHERE b.unique_id='$booking_id'";

                    $result = mysqli_query($conn,$query);

                    $fetched_result = mysqli_fetch_assoc($result);

                    $num_rows = mysqli_num_rows($result);

                    $v_name=$fetched_result['name'];
                    $v_email=$fetched_result['email'];
                    $v_num=$fetched_result['contact_no'];

                    $vaccine_name=$fetched_result['vaccine_name'];
                    $payment_status=$fetched_result['payment_status'];		
                    $date=$fetched_result['date'];
                    $day=$fetched_result['day'];
                    $newDate = date("d-m-Y", strtotime($date));
                    $time=$fetched_result['time'];
                    $cost=$fetched_result['vaccine_cost'];
                    $purpose="Payment for Vaccination - ".$vaccine_name;
                    echo'  <div class="cen"> Name: '.$v_name.'<br></div>';
                    echo ' <div class="cen"> Booking ID: '.$booking_id.'<br></div>';
                    echo ' <div class="cen">Email: '.$v_email.'<br></div>'; 
                    echo ' <div class="cen"> Contact Number: '.$v_num.'<br></div> ';
                    echo ' <div class="cen"> Vaccine name: '.$vaccine_name.'<br></div>';
                    echo ' <div class="cen"> Date: '.$newDate.'<br></div>';
                    echo ' <div class="cen"> Day: '.$day.'<br></div> ';
                    echo '  <div class="cen">Cost: '.$cost.'<br></div> ';
                    if($payment_status == 'INCOMPLETE'){
                    echo'<button class="white-mode" onclick="pay_now()">Pay Now</button>';
                    }
                    else{
                        echo '  <div class="cen">Payment status: COMPLETE<br></div> ';
                    }
                ?>
            </div>
		</div>
	</div>
</div>
</div>
</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        function pay_now(){
            var b_id = jQuery('#b_id').val();
            var options = {
            "key": "rzp_test_mE9XDNP376RHLY", // Enter the Key ID generated from the Dashboard
            "amount": "<?php echo $cost; ?>"*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
            "currency": "INR",
            "name": "CareVista Superspeciality Hospital",
            "description": "<?php echo $purpose;?>",
            "image": "IMAGES/img2/Logo.png",
            "handler": function (response){
                console.log(response);
                jQuery.ajax({
                    type:'post',
                    url: 'payment_vaccination_success.php',
                    data: "bid="+b_id,
                    success:function(result){
                        window.location.href="vaccination_scheduled_appointment_dashboard.php"
                    }
                })
                alert('Payment Successful');
                
            }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
        }
        
    </script>