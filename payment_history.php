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
	<link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="css/payment_history.css">

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
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-3">
                <div class="nav flex-column nav-pills mt-4" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="regular_pay-tab" data-toggle="pill" href="#regular_pay" role="tab" aria-controls="regular_pay" aria-selected="true">Regular Check Up Payments<i class="fas fa-angle-double-right ml-4"></i></a>
                    <a class="nav-link" id="lab_pay-tab" data-toggle="pill" href="#lab_pay" role="tab" aria-controls="lab_pay" aria-selected="false">Labtest Payments<i class="fas fa-angle-double-right ml-4"></i></a>
                    <a class="nav-link" id="hospital_pay-tab" data-toggle="pill" href="#hospital_pay" role="tab" aria-controls="hospital_pay" aria-selected="false">Hospital Charges<i class="fas fa-angle-double-right ml-4"></i></a>
                </div>
            </div>
            <div class="col">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="regular_pay" role="tabpanel" aria-labelledby="regular_pay-tab">
                        <div class="row mt-4 text-center d-flex justify-content-center">
                            <h4>-: PAYMENT HISTORY FOR REGULAR CHECK-UP :-</h4>
                        </div>
                        <table id="myTable1" class="table table-light table-bordered table-hover mt-4">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">BOOKING ID</th>
                                    <th scope="col">DEPARTMENT</th>
                                    <th scope="col">DOCTOR NAME</th>
                                    <th scope="col">DATE OF APPOINTMENT</th>
                                    <th scope="col">AMOUNT</th>
                                    <th scope="col">PAYMENT MODE</th>
                                    <th scope="col">PAYMENT ID</th>
                                    <th scope="col">BILL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    require "db_config.php";
                                    $query = "SELECT a.booking_id, a.date, a.visit, a.payment_mode, a.payment_id, a.bill_doc, b.doctor_name, d.dept_name
                                                FROM checkup_bookings a INNER JOIN doctor_login b ON a.doc_id=b.doctor_id
                                                INNER JOIN doc_dep c ON b.doctor_id=c.doc_id 
                                                INNER JOIN departments d ON c.dept_id=d.dept_id
                                                WHERE a.booker_id=$id AND a.payment_status='Complete'";
                                    $result=mysqli_query($conn,$query);
                                    if(mysqli_num_rows($result)==0){
                                        echo '<tr>
                                                <td colspan=8 class="text-center">No payment is done yet</td>
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
                                                    <td>'.$row['payment_mode'].'</td>';
                                            if($row['payment_mode']=='Cash'){
                                                echo '<td>-------</td>';
                                            }else{
                                                echo '<td>'.$row['payment_id'].'</td>';
                                            }
                                            echo '<td><a href="regular_checkup_bill/'.$row['bill_doc'].'" target="_blank" >View Bill</a></td>
                                            </tr>';
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>

                    </div>

                    <div class="tab-pane fade" id="lab_pay" role="tabpanel" aria-labelledby="lab_pay-tab">
                        <div class="row mt-4 text-center d-flex justify-content-center">
                            <h4>-: PAYMENT HISTORY FOR LABTESTS :-</h4>
                        </div>
                            <table id="myTable2" class="table table-light table-bordered table-hover mt-4">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">BOOKING ID</th>
                                        <th scope="col">TEST NAME</th>
                                        <th scope="col">DATE OF TEST</th>
                                        <th scope="col">AMOUNT</th>
                                        <th scope="col">PAYMENT MODE</th>
                                        <th scope="col">PAYMENT ID</th>
                                        <th scope="col">BILL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        
                                        $query = "SELECT a.booking_id, a.date,a.amount,a.payment_mode,a.payment_id, b.test_name, c.bill_doc 
                                                  FROM test_bookings a INNER JOIN labtest b ON a.test_id=b.id 
                                                  INNER JOIN labtest_bill c ON a.booking_id=c.booking_id 
                                                  WHERE a.booker_id=$id AND ((a.payment_id IS NOT NULL) OR (a.payment_mode='Cash' AND a.date<=CURDATE()))";
                                        $result=mysqli_query($conn,$query);
                                        if(mysqli_num_rows($result)==0){
                                            echo '<tr>
                                                    <td colspan=7 class="text-center">No payment is done yet</td>
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
                                                        <td>'.$row['payment_mode'].'</td>';
                                                if($row['payment_mode']=='Cash'){
                                                    echo '<td>-------</td>';
                                                }else{
                                                    echo '<td>'.$row['payment_id'].'</td>';
                                                }
                                                echo '<td><a href="labtest bills/'.$row['bill_doc'].'" target="_blank" >View Bill</a></td>
                                                </tr>';
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        
                    </div>

                        <div class="tab-pane fade" id="hospital_pay" role="tabpanel" aria-labelledby="hospital_pay-tab">
                            <div class="row mt-4 text-center d-flex justify-content-center">
                                <h4>-: PAYMENT HISTORY FOR HOSPITAL CHARGES :-</h4>
                            </div>
                            <table id="myTable3" class="table table-light table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">DISCHARGE ID</th>
                                        <th scope="col">HEALTH ISSUE</th>
                                        <th scope="col">DATE OF ADMISSION</th>
                                        <th scope="col">DATE OF DISCHARGE</th>
                                        <th scope="col">AMOUNT</th>
                                        <th scope="col">PAYMENT MODE</th>
                                        <th scope="col">PAYMENT ID</th>
                                        <th scope="col">BILL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                    $query = "SELECT a.discharge_id, a.health_issue, a.admitted_date, a.discharge_date, a.payment_mode, a.payment_id, b.total_amount, b.bill_doc
                                              FROM discharge_bed a INNER JOIN discharge_bill b on a.patient_id=b.patient_id
                                              WHERE a.patient_id=$id AND (a.payment_mode='Cash' OR a.payment_id IS NOT NULL);";
                                    $result=mysqli_query($conn,$query);
                                    if(mysqli_num_rows($result)==0){
                                        echo '<tr>
                                                <td colspan=8 class="text-center">No payment is done yet</td>
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
                                                <td>'.$row['payment_mode'].'</td>';
                                            if($row['payment_mode']=='Cash'){
                                                echo '<td>-------</td>';
                                            }else{
                                                echo '<td>'.$row['payment_id'].'</td>';
                                            }
                                            echo '<td><a href="discharge bills/'.$row['bill_doc'].'" target="_blank" >View Bill</a></td>
                                            </tr>';
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>

                        </div>
                </div>
            </div>
        </div>
    </div>
    
    
    

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/dataTables.bootstrap4.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function(){
            $("#myTable1").DataTable({
                paging: true,
                sort: true,
                searching: true,
                lengthMenu: [[2,5,10,25, 100, -1], [2,5,10,25, 100, "All"]],
                pageLength: 5,
            });
            table.page.len(-1).draw();
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#myTable2").DataTable({
                
                paging: true,
                sort: true,
                searching: true,
                lengthMenu: [[2,5,10,25, 100, -1], [2,5,10,25, 100, "All"]],
                pageLength: 5,
            });
            table.page.len(-1).draw();
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#myTable3").DataTable({
                paging: true,
                sort: true,
                searching: true,
                lengthMenu: [[2,5,10,25, 100, -1], [2,5,10,25, 100, "All"]],
                pageLength: 5,
            });
            table.page.len(-1).draw();
        });
    </script>

</body>
</html>