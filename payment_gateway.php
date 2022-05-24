<?php

session_start();

$name = $_SESSION['patient_name'];
$id = $_SESSION['patient_id'];
$mail = $_SESSION['patient_email'];
$payment_type = $_GET['payment_type'];
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Pay Bill | CareVista Hospital</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/payment_gateway.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Outfit:wght@400;500&family=Roboto+Slab:wght@400;500&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link href="https://fonts.googleapis.com/css2?family=Ultra&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
    <link href="https://fonts.googleapis.com/css2?family=Tangerine:wght@700&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
	<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Mochiy+Pop+P+One&family=Moon+Dance&family=The+Nautigal:wght@700&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include 'includes/patient_navbar.php';?>
    
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-right">
                <a href="pay_bill_dashboard.php"><i class="fa fa-angle-double-left back-icon"></i></a>
            </div>
        </div>
        <div class="row mx-4 mt-4 table-row">
                <div class="col-md-8">

                            <?php
                                require "db_config.php";
                                if($payment_type==1){
                                    echo '<h4>Pending Payments for Regular Check-Up</h4>
                                    <table class="table table-dark table-bordered table-hover">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">BOOKING ID</th>
                                                <th scope="col">DEPARTMENT</th>
                                                <th scope="col">DOCTOR NAME</th>
                                                <th scope="col">DATE OF CHECK UP</th>
                                                <th scope="col">AMOUNT</th>
                                                <th scope="col">ACTIONS</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                                        $query = "SELECT a.booking_id, a.date, a.visit, b.doctor_name, d.dept_name
                                        FROM checkup_bookings a INNER JOIN doctor_login b ON a.doc_id=b.doctor_id
                                        INNER JOIN doc_dep c ON b.doctor_id=c.doc_id 
                                        INNER JOIN departments d ON c.dept_id=d.dept_id
                                        WHERE a.booker_id=$id AND a.payment_status IS NULL";
                                        $result=mysqli_query($conn,$query);
                                        if(mysqli_num_rows($result)==0){
                                            echo '<tr>
                                                    <td colspan=6 class="text-center">No payment is pending</td>
                                                </tr>';
                                        }
                                        else{
                                            while($row=mysqli_fetch_assoc($result)){
                                                $newDate = date("d-m-Y", strtotime($row['date']));
                                                echo '<tr>
                                                        <td scope="row">'.$row['booking_id'].'</td>
                                                        <td>'.$row['dept_name'].'</td>
                                                        <td>'.$row['doctor_name'].'</td>
                                                        <td>'.$newDate.'</td>
                                                        <td>Rs. '.$row['visit'].'</td>
                                                        <td><a href="procced_payment.php?payment_type='.$payment_type.'&booking_id='.$row['booking_id'].'" class="btn btn-success">Pay Now</a></td>
                                                    </tr>';
                                            }
                                        }
                                        echo '</tbody>
                                        </table>';
                                }
                                if($payment_type==2){
                                    echo '<h4>Pending Payments for Labtest Bookings</h4>
                                    <table class="table table-dark table-bordered table-hover">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">BOOKING ID</th>
                                                <th scope="col">TEST NAME</th>
                                                <th scope="col">DATE OF TEST</th>
                                                <th scope="col">AMOUNT</th>
                                                <th scope="col">BILL</th>
                                                <th scope="col">ACTIONS</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                                    
                                        $query = "SELECT a.booking_id, a.date,a.amount, b.test_name, c.bill_doc
                                        FROM test_bookings a INNER JOIN labtest b ON a.test_id=b.id 
                                        INNER JOIN labtest_bill c ON a.booking_id=c.booking_id
                                        WHERE a.booker_id=$id AND a.billing_status='Complete' AND a.payment_mode='Online' AND a.payment_id IS NULL";
                                        $result=mysqli_query($conn,$query);
                                        if(mysqli_num_rows($result)==0){
                                            echo '<tr>
                                                    <td colspan=6 class="text-center">No payment is pending</td>
                                                </tr>';
                                        }
                                        else{
                                            while($row=mysqli_fetch_assoc($result)){
                                                $newDate = date("d-m-Y", strtotime($row['date']));
                                                echo '<tr>
                                                        <td scope="row">'.$row['booking_id'].'</td>
                                                        <td>'.$row['test_name'].'</td>
                                                        <td>'.$newDate.'</td>
                                                        <td>Rs. '.$row['amount'].'</td>
                                                        <td><a href="labtest bills/'.$row['bill_doc'].'" target="_blank" >View Bill</a></td>
                                                        <td><a href="procced_payment.php?payment_type='.$payment_type.'&booking_id='.$row['booking_id'].'" class="btn btn-success">Pay Now</a></td>
                                                    </tr>';
                                            }
                                        }
                                        echo '</tbody>
                                        </table>';
                                }
                                if($payment_type==3){

                                    echo '<h4>Pending Hospital Charges</h4>
                                    <table class="table table-dark table-bordered table-hover">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">DISCHARGE ID</th>
                                                <th scope="col">HEALTH ISSUE</th>
                                                <th scope="col">DATE OF ADMISSION</th>
                                                <th scope="col">DATE OF DISCHARGE</th>
                                                <th scope="col">AMOUNT</th>
                                                <th scope="col">BILL</th>
                                                <th scope="col">ACTIONS</th>
                                            </tr>
                                        </thead>
                                        <tbody>';


                                    $query = "SELECT a.discharge_id, a.health_issue, a.admitted_date, a.discharge_date, b.total_amount, b.bill_doc
                                                FROM discharge_bed a INNER JOIN discharge_bill b on a.patient_id=b.patient_id
                                                WHERE a.patient_id=$id AND a.payment_mode='Online' AND a.payment_id IS NULL AND a.billing_status='Complete';";
                                    $result=mysqli_query($conn,$query);
                                    if(mysqli_num_rows($result)==0){
                                        echo '<tr>
                                                <td colspan=7 class="text-center">No payment is pending</td>
                                            </tr>';
                                    }
                                    else{
                                        while($row=mysqli_fetch_assoc($result)){
                                            $addDate = date("d-m-Y", strtotime($row['admitted_date']));
                                            $dischargeDate = date("d-m-Y", strtotime($row['discharge_date']));
                                            echo '<tr>
                                                    <td scope="row">'.$row['discharge_id'].'</td>
                                                    <td>'.$row['health_issue'].'</td>
                                                    <td>'.$addDate.'</td>
                                                    <td>'.$dischargeDate.'</td>
                                                    <td>Rs. '.$row['total_amount'].'</td>
                                                    <td><a href="discharge bills/'.$row['bill_doc'].'" target="_blank" >View Bill</a></td>
                                                    <td><a href="procced_payment.php?payment_type='.$payment_type.'&booking_id='.$row['discharge_id'].'" class="btn btn-success">Pay Now</a></td>
                                                </tr>';
                                        }
                                    }
                                    echo '</tbody>
                                    </table>';

                                }
                            
                            ?>
                    <img src="IMAGES/payment/secured_page.jpg" class="secured-pic">
                </div>
                <div class="col-md-4"></div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php
        if(isset($_SESSION['status']) && $_SESSION['status']!='')
        {
    ?>
            <script type="text/javascript">
                swal({
                    title: "<?php echo $_SESSION['status'];?>",
                    icon: "<?php echo $_SESSION['status_code'];?>",
                    text: "<?php echo $_SESSION['status_text'];?>",
                    button: "OK",
                });
            </script>
    <?php
        unset($_SESSION['status']);
        }
    ?> 

</body>
</html>