<?php

require "db_config.php";
require "vendor/autoload.php";

$b_id=$_GET['b_id'];

$query="SELECT * FROM labtest_report_ba l INNER JOIN test_bookings t 
		ON l.booking_id=t.booking_id 
		INNER JOIN labtest b ON t.test_id=b.id WHERE l.booking_id LIKE '$b_id'";
$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_assoc($result)){
	$html='<div id="heading">
			<img src="IMAGES/img2/Logo.png" style="width: 10%;height: 10%;">
			<h1>CareVista Superspeciality Hospital</h1>
		</div>
		<hr>
		<h1 id="labtest">Lab Test Report</h1>
		<div id="p_detail">
			<h2 class="subheading">------------------------------Patient Details------------------------------</h2>
			<h3>Name: '.$row['booking_done_by'].'</h3>
			<h3>Gender: '.$row['p_gender'].'</h3>
			<h3>Email-id: '.$row['patient_mail_id'].'</h3>
			<h3>Contact No. : '.$row['patient_contact_number'].'</h3>
		</div>
		<div id="test_detail">
			<h2 class="subheading">------------------------------Booking Details------------------------------</h2>
			<h3>Test Name: '.$row['test_name'].'</h3>
			<h3>Booking ID: '.$row['booking_id'].'</h3>';

			$date_frmttd=date("d-m-Y", strtotime($row['date']));
			$date_frmttd1=date("d-m-Y h:m:s", strtotime($row['generation_date']));

	$html.='<h3>Date: '.$date_frmttd.'</h3>';

	$html.='<h3>Amount: '.$row['amount'].'</h3>
			<h3>Report Genrated On: '.$date_frmttd1.'</h3>
		</div>
		<div id="test_detail">
			<h2 class="subheading">---------------------------------Test Report---------------------------------</h2>
			<h1 id="value">Value: '.$row['report_value'].' '.$row['unit'].'</h1>
			<h2>Result: '.$row['result'].'</h2>
			<h2>Remarks: <span style="font-size:2rem; font-style:italic;">'.$row['report_remarks'].'</span></h2>
		</div>
		<div id="footer">
			<h4 style="font-size:1.5rem; padding-top: -2%">CareVista</h4>
			<h4 style="">225-336-336</h4>
		</div>
		<div style="margin-top:200px;">
			<h2 class="subheading">Acceptable Range:</h2>
			<table id="nrml_range_table">
				<tr>
					<th colspan="2">MALE</th>
					<th colspan="2">FEMALE</th>
					<th rowspan="2">UNIT</th>
				</tr>
				<tr>
					<th>Minimum</th>
					<th>Maximum</th>
					<th>Minimum</th>
					<th>Maximum</th>
				</tr>
				<tr>
					<td>'.$row['male_min'].'</td>
					<td>'.$row['male_max'].'</td>
					<td>'.$row['female_min'].'</td>
					<td>'.$row['female_max'].'</td>
					<td>'.$row['unit'].'</td>
				</tr>
			</table>
		</div>
		<div style="margin-top:80px;">
			<h2>-------------------</h2>
			<h2>Signature</h2>
		</div>
		<div id="footer">
			<h4 style="font-size:1.5rem; padding-top: -2%">CareVista</h4>
			<h4 style="">225-336-336</h4>
		</div>';
}



$mpdf = new \Mpdf\Mpdf();
$stylesheet = file_get_contents('css/download_ba_report.css'); // external css
$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML($html,2);
$file=$b_id.'.pdf';
$mpdf->output($file,'I');
?>
