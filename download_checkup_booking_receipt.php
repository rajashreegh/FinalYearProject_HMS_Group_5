<?php

require "db_config.php";
require "vendor/autoload.php";

$b_id=$_GET['b_id'];

$query="SELECT * FROM checkup_bookings c INNER JOIN doc_dep d ON c.doc_id=d.doc_id 
		INNER JOIN doctor_login l ON c.doc_id=l.doctor_id
		WHERE booking_id LIKE '$b_id'";
$result=mysqli_query($conn,$query);

while($row = mysqli_fetch_assoc($result)){
	$html='<div id="upper" class="col12">
			<img src="IMAGES/img2/Logo.png" style="width:80px;height:80px;" class="col6-1">
			<div class="col6-2">
				<h1 id="patient_name">'.$row['booking_done_by'].'</h1>
				<h3 id="patient_number">'.$row['patient_number'].'</h3>
			</div>
		</div>';
	$html.='<hr>';
	$html.='<h1 id="title">Checkup Booking Receipt</h1>';
	$html.='<div id="details">
				<h1 style="font-size: 2.5rem; ">Doctor: <span class="highlight">'.$row['doctor_name'].'</span></h1>
				<h3>Date: <span class="highlight">'.$row['date'].'</span></h3>
				<h3>Time: <span class="highlight">'.$row['time'].'</span></h3>
				<h3>Floor No: <span class="highlight">'.$row['floor'].'</span></h3>
			</div>';
	$html.='<h1 style="margin-top:10%; font-size:3rem;text-align:center; color:darkgreen; ">
				Payment Status: Complete </h1>';
	$html.='<div id="footer">
				<h4 style="font-size:1.5rem; padding-top: -2%">CareVista</h4>
				<h4 style="">225-336-336</h4>
			</div>';
}

$mpdf = new \Mpdf\Mpdf();
$stylesheet = file_get_contents('css/checkup_booking_receipt_pdf.css'); // external css
$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML($html,2);
$file=$b_id.'.pdf';
$query = "UPDATE checkup_bookings
          SET bill_doc='$file'
          WHERE booking_id ='$b_id'";
    mysqli_query($conn,$query);
    $checkup_bill = "regular_checkup_bill/".$file;
    $mpdf->Output($checkup_bill,'F');

?>