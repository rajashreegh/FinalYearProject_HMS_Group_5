<?php

require "db_config.php";
session_start();
$name=$_SESSION['admin_name'];
require "vendor/autoload.php";


$payment_mode = $_POST['mode_of_payment'];
$bed_charge=$_POST['bed_charge'];
$doc_charge=$_POST['doc_charge'];
$nurse_charge=$_POST['nurse_charge'];
$med_cost=$_POST['med_cost'];
$consumables=$_POST['consumables'];
$surgery=$_POST['surgery'];
$anst_charge=$_POST['anst_charge'];
$OT_charge=$_POST['OT_charge'];
$pid=$_POST['patient_id'];
$pname=$_POST['patient_name'];
$ward=$_POST['ward_name'];
$room=$_POST['room_no'];
$bed=$_POST['bed_no'];
$bid=$_POST['bed_id'];
$did=$_POST['discharge_id'];
$admitdate=$_POST['admit_date'];
$newDate1 = date("d-m-Y", strtotime($admitdate));
$disdate=$_POST['discharge_date'];
$newDate2 = date("d-m-Y", strtotime($disdate));
$health_issue=$_POST['health'];


$query="SELECT b.doctor_name from discharge_bed a inner join doctor_login b on a.doctor_id=b.doctor_id where a.patient_id='$pid' and a.bed_id='$bid'";
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

$diff=date_diff(date_create($admitdate),date_create($disdate));
$Qty= $diff->format('%a')+1;

$price1=$bed_charge*$Qty;
$price2=$doc_charge*$Qty;
$price3=$nurse_charge*$Qty;
$price4=$med_cost*$Qty;
$price5=$consumables*$Qty;

$code=rand(1,9999);
$bill_no="DB".$code;
$total=$price1+$price2+$price3+$price4+$price5+$surgery+$anst_charge+$OT_charge;


date_default_timezone_set('Asia/Kolkata');
$currentdate = date('d/m/Y H:i:s');

$html='<div class="upper">
			<div class="title">
				<h1>careVista Superspeciality Hospital</h1>
			</div>
            <img src="IMAGES/image/Logo.png" style="width:100px;height:100px;" class="icon">
            <h1 class="header"> In-Patient Discharge Bill </h1>
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
        <p><b>Ward Category:</b>  '.$ward.'</p>
        </div>
        </div>
        <div class="row">
        <div class="col1">
        <p><b>Gender / Age:</b>  '.$row1['Gender'].' / '.$age.'</p>
        </div>
        <div class="col2">
        <p><b>Room No / Bed No :</b> '.$room.' / '.$bed.'</p>
        </div>
        </div>
        <div class="row">
        <div class="col1">
        <p><b>Contact No:</b>  '.$row2['contact_number'].'</p>
        </div>
        <div class="col2">
        <p><b>Admitted Date:</b>  '.$newDate1.'</p>
        </div>
        </div>
        <div class="row">
        <div class="col1">
        <p><b>Address:</b>  '.$row2['address'].','.$row2['town'].'</p>
        </div>
        <div class="col2">
        <p><b>Discharged Date:</b>  '.$newDate2.'</p>
        </div>
        </div>
        <div class="row">
        <div class="col1">
        <p><b>No of days Admitted:</b>  '.$Qty.' days </p>
        </div>
        <div class="col2">
        <p><b>Consultant Doctor:</b>'.$row['doctor_name'].'</p>
        </div>
        </div>
        </div>
        <div class="issue">
        <p><b>Purpose Of Medical Treatment:</b>  '.$health_issue.'</p>
        </div>
        <table style="width:100%">
        <tr class="header-bg">
            <th>Particulars</th>
            <th>Rate(Rs.)</th>
            <th>Quantity(Days)</th>
            <th>Total(Rs.)</th>
        </tr>
        <tr>
            <td>'.$ward.' Bed Charge</td>
            <td>'.$bed_charge.'</td>
            <td>'.$Qty.'</td>
            <td> '.$price1.'</td>
        </tr>
        <tr>
        <td>Doctor visit Charge</td>
        <td>'.$doc_charge.'</td>
        <td>'.$Qty.'</td>
        <td> '.$price2.'</td>
        </tr>
        <tr>
        <td>Nursing Fees</td>
        <td>'.$nurse_charge.'</td>
        <td>'.$Qty.'</td>
        <td> '.$price3.'</td>
        </tr>
        <tr>
        <td>Medicines Cost</td>
        <td>'.$med_cost.'</td>
        <td>'.$Qty.'</td>
        <td> '.$price4.'</td>
         </tr>
         <tr>
         <td>Consumables Cost</td>
         <td>'.$consumables.'</td>
         <td>'.$Qty.'</td>
         <td> '.$price5.'</td>
          </tr>
          <tr>
         <td>Surgeon Fees</td>
         <td>'.$surgery.'</td>
         <td>&#8212;</td>
         <td> '.$surgery.'</td>
         </tr>
         <tr>
         <td>Anaesthia Charges</td>
         <td>'.$anst_charge.'</td>
         <td>&#8212;</td>
         <td> '.$anst_charge.'</td>
         </tr>
         <tr>
         <td>OT charges</td>
         <td>'.$OT_charge.'</td>
         <td>&#8212;</td>
         <td>'.$OT_charge.'</td>
         </tr>
         </table>
         <div class="amount">
        <p>Total Amount:Rs. '.$total.'  </p>
        </div>
        <div class="info">
        <div class="row">
        <div class="col1">
        <p><b>Billing Date/Time:</b>  '.$currentdate.'</p>
        </div>
        <div class="col2">
        <p><b>Billing done by:</b>  '.$name.'</p>
        </div>
        </div>
        </div>
        <div class="statement">
        <p> All Patient records are confidential and are revealed to the patient or his/her authorized representative only.</p>
        </div>
        <div id="footer">
				<p>Contact no: 225-336-336</p>
                <p>Website: www.carevista.com</p>
                <p>Email: carevista@gmail.com</p>

		</div>';
        
        
         

      
       
       
	    $location ="discharge bills/";
        $mpdf = new \Mpdf\Mpdf();
        $stylesheet = file_get_contents('css/bed_billing.css'); 
        $mpdf->WriteHTML($stylesheet,1);
        $mpdf->WriteHTML($html,2);
        $file=time().'.pdf';
        $mpdf->output($file,'I');
        $mpdf->Output($location.$file, \Mpdf\Output\Destination::FILE);

        $query3 = "INSERT INTO discharge_bill VALUES ('$did','$pid','$total','$file')";
        mysqli_query($conn,$query3);

        if($payment_mode=='Cash'){
            $query4 = "UPDATE discharge_bed SET billing_status= 'Complete',payment_mode='Cash'
                       WHERE patient_id='$pid' and bed_id='$bid'";
            mysqli_query($conn,$query4);
        }
        else{
            $query4 = "UPDATE discharge_bed SET billing_status= 'Complete',payment_mode='Online'
                       WHERE patient_id='$pid' and bed_id='$bid'";
            mysqli_query($conn,$query4);
        }
        
        
        
        
?>







