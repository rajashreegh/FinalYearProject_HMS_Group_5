<?php

require "db_config.php";
require "vendor/autoload.php";

$bid=$_GET['bid'];
$pid=$_GET['pid'];
$pname=$_GET['pname'];
$type=$_GET['type'];
$test=$_GET['test'];
$date=$_GET['date'];
$newDate = date("d-m-Y", strtotime($date));

$query="SELECT * from test_bookings where booking_id='$bid'";
$result=mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
$query1="SELECT DOB,Gender from patient_personal_info where patient_id='$pid'";
$result1=mysqli_query($conn,$query1);
$row1 = mysqli_fetch_assoc($result1);
$query2="SELECT contact_number,address,town from patient_contact_info where patient_id='$pid'";
$result2=mysqli_query($conn,$query2);
$row2 = mysqli_fetch_assoc($result2);

$today =date("Y-m-d");
$date1=date_create($today);
$dateOfBirth = $row1['DOB'];
$date2=date_create($dateOfBirth);
$diff=date_diff($date1,$date2);
$age = $diff->format('%y yrs');


$code=rand(1,9999);
$bill_no="LB".$code;


$currentdate = date('d/m/Y');


$html='<div class="upper">
			<div class="title">
				<h1>careVista Superspeciality Hospital</h1>
			</div>
            <img src="IMAGES/image/Logo.png" style="width:100px;height:100px;" class="icon">
            <h1 class="header"> Labtest Bill </h1>
		</div>
        <div class="container">
        <div class="row">
        <div class="col1">
        <p><b>Patient ID:</b>  '.$pid.'</p>
        </div>
        <div class="col2">
        <p><b>Bill No:</b>  '.$bill_no.'</p>
        </div>
        </div>
        <div class="row">
        <div class="col1">
        <p><b>Patient Name:</b>  '.$pname.'</p>
        </div>
        <div class="col2">
        <p><b>Billing Date:</b>  '.$currentdate.'</p>
        </div>
        </div>
        <div class="row">
        <div class="col1">
        <p><b>Gender / Age:</b>  '.$row1['Gender'].' / '.$age.'</p>
        </div>
        <div class="col2">
        <p><b>Test Type:</b>  '.$type.'</p>
        </div>
        </div>
        <div class="row">
        <div class="col1">
        <p><b>Contact No:</b>  '.$row2['contact_number'].'</p>
        </div>
        <div class="col2">
        <p><b>Testing Date:</b>  '.$newDate.'</p>
        </div>
        </div>
        <div class="row">
        <p><b>Address:</b>  '.$row2['address'].','.$row2['town'].'</p>
        </div>
        </div>
        <table style="width:100%">
            <tr class="header-bg">
                <th>Test Name</th>
                <th>Rate</th>
            </tr>
            <tr>
                <td>'.$test.'</td>
                <td>'.$row['amount'].'</td>
            </tr>
        </table>
        <div class="amount">
        <p>Total Amount:Rs. '.$row['amount'].' </p>
        </div>
        <div class="statement">
        <p> All Patient records are confidential and are revealed to the patient or his/her authorized representative only.</p>
        </div>
        <div id="footer">
				<p>Contact no: 225-336-336</p>
                <p>Website: www.carevista.com</p>
                <p>Email: carevista@gmail.com</p>

			</div>';
       
	    $location ="labtest bills/";
        $mpdf = new \Mpdf\Mpdf();
        $stylesheet = file_get_contents('css/lab_billing.css'); 
        $mpdf->WriteHTML($stylesheet,1);
        $mpdf->WriteHTML($html,2);
        $file=time().'.pdf';
        $mpdf->output($file,'I');
        $mpdf->Output($location.$file, \Mpdf\Output\Destination::FILE);

        $query3 = "INSERT INTO labtest_bill VALUES ('$bid','$pid','$file')";
        mysqli_query($conn,$query3);
        
        $query4 = "UPDATE test_bookings SET billing_status= 'Complete' WHERE booking_id='$bid'";
        mysqli_query($conn,$query4);
        
        
?>






