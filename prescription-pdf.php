<?php

$patient_name=$_GET['pname'];
$patient_id=$_GET['pid'];
$booking_id=$_GET['bid'];
require "vendor/autoload.php";
require "db_config.php";

$query1="SELECT DOB,Gender from patient_personal_info where patient_id='$patient_id'";
$result1=mysqli_query($conn,$query1);
$row1 = mysqli_fetch_assoc($result1);

$today =date("Y-m-d");
$date1=date_create($today);
$dateOfBirth = $row1['DOB'];
$date2=date_create($dateOfBirth);
$diff=date_diff($date1,$date2);
$age = $diff->format('%y yrs');



$query2= "SELECT a.date,a.issue,a.remarks,a.doc_id,b.doctor_name,d.dept_name,e.qualification from checkup_bookings a inner join doctor_login b on a.doc_id=b.doctor_id inner join doc_dep c on b.doctor_id=c.doc_id inner join departments d on c.dept_id=d.dept_id INNER JOIN
 doctor_details e ON b.doctor_id=e.doc_id where a.booking_id='$booking_id'";
$result2=mysqli_query($conn,$query2);
$row2 = mysqli_fetch_assoc($result2);
$rowcount2=mysqli_num_rows($result2);
$doctor_id=$row2['doc_id'];
if($rowcount2==0)
  {
    $query2= "SELECT a.issue,a.remarks,b.doctor_name,d.dept_name,e.qualification from checkup_bookings a inner join left_doctors b
    on a.doc_id=b.doctor_id inner join doc_dep c on b.doctor_id=c.doc_id inner join departments d on c.dept_id=d.dept_id INNER JOIN doctor_details e ON b.doctor_id=e.doc_id where a.booking_id='$booking_id'";
   $result2=mysqli_query($conn,$query2);
   $row2 = mysqli_fetch_assoc($result2);
   $rowcount2=mysqli_num_rows($result2);
   $doctor_id=$row2['doc_id'];
  }
  $booking_date=$row2['date'];
  $newDate = date("d-m-Y", strtotime($booking_date));

  $query3="SELECT * FROM doc_day_time WHERE doc_id='$doctor_id'";
	$result3=mysqli_query($conn,$query3);
	$row3=mysqli_fetch_assoc($result3);

  $day1=$row3['day1'];
	$time1=$row3['time1'];
  $day2=$row3['day2'];
	$time2=$row3['time2'];
  $day3=$row3['day3'];
	$time3=$row3['time3'];
	
  if($day1!=NULL && $time1!=NULL){
    $timing1=$day1.' : '.$time1;
    
  }
  if($day2!=NULL && $time2!=NULL){
    $timing2=$day2.' : '.$time2;
  }
  if($day3!=NULL && $time3!=NULL){
    $timing3=$day3.' : '.$time3;
  }
  if($day3==NULL && $time3==NULL){
      $timing3='';
  }


 $html='<div class="icon1">
 <img src="IMAGES/image/heartwave.png" >
 </div>
 <div class="part1">
 <div class="info">
 <h3> Dr. '.$row2['doctor_name'].'</h3>
 <div class="line"></div>
 <p>'.$row2['qualification'].' </p>
 <p id="dept"> Specialist in '.$row2['dept_name'].'</p>
 </div>
 </div>
  
 <div class="part2">
 <div class="icon2">
 <img src="IMAGES/image/Logo.png" >
 </div>
 
 <div class="title">
 <h1> careVista Superciality Hospital </h1>
 </div>
 </div>
 <div class="content-box">
 <div class="upper-box">
 <div class="details">
 <p> <b> Date: </b> '.$newDate.' </p>
 <p> <b> Patient Name: </b> '.$patient_name.'</p>
 <p> <b> Gender:  </b> '.$row1['Gender'].'</p>
 <p> <b> Age:  </b> '.$age.' </p>
 </div>
 <div class="icon3">
 <img src="IMAGES/image/prescription2.png">
 </div>
 </div>
 <img src="IMAGES/image/watermark.png" id="watermark">
 </div>
 <div class="lower-box">
 <img src="IMAGES/image/RX_symbol.png" id="icon4">
 <div class="diagnosis">
 <p> <b> Diagnosis: </b>  '.$row2['issue'].' </p>
 </div>
 <div class="medicine">
 <p> <b>Medicines Prescribed: </b>'.$row2['remarks'].' </p>
 </div>
 <div class="timing">
 <p> '.$timing1.'</p>
 <p>'.$timing2.'</p>
 <p>'.$timing3.'</p>
 
 </div>
 </div>
  <div id="footer">
 <p>Contact no: 225-336-336</p>
 <p>Website: www.carevista.com</p>
 <p>Email: carevista@gmail.com</p>
 </div>';
       
       
	      $location ="doctor_checkup_prescriptions/";
        $mpdf = new \Mpdf\Mpdf();
        $stylesheet = file_get_contents('css/prescription_pdf_style.css'); 
        $mpdf->WriteHTML($stylesheet,1);
        $mpdf->WriteHTML($html,2);
        $file=$booking_id.'.pdf';
        $mpdf->output($file,'I');
        $mpdf->Output($location.$file, \Mpdf\Output\Destination::FILE);

       
        
        
?>






