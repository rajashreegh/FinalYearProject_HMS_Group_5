<?php

session_start();
require "db_config.php";

$booking_done_by=$_SESSION['patient_name'];
$booker_id=$_SESSION['patient_id'];

$day=$_GET['day'];
$date=date('Y-m-d', strtotime($day));

$p_name = $_GET['p_name'];
$p_mobile= $_GET['p_mobile'];
$p_mail= $_GET['p_mail'];

$doc_id= $_GET['doc_id'];
$dept_id= $_GET['dept_id'];

$booking_id=$_GET['booking_id'];

$query="SELECT d.doc_id,d.visit,c.day1,c.time1,c.day2,c.time2,c.day3,c.time3 
		FROM doc_dep d INNER JOIN doc_day_time c ON d.doc_id=c.doc_id 
		WHERE d.doc_id='$doc_id'";

$result=mysqli_query($conn,$query);
$fetched_result = mysqli_fetch_assoc($result);

$visit=$fetched_result['visit'];

if($day==$fetched_result['day1']){
	$time=$fetched_result['time1'];
}elseif($day==$fetched_result['day2']){
	$time=$fetched_result['time2'];
}else{
	$time=$fetched_result['time3'];
}

$query1="INSERT INTO checkup_bookings(booking_id,booking_done_by,booker_id,booking_done_for,
		patient_mail,patient_number,dept_id,date,time,doc_id,visit,status) 
		VALUES ('$booking_id','$booking_done_by',$booker_id,'$p_name','$p_mail',
		'$p_mobile',$dept_id,'$date','$time',$doc_id,$visit,'Incomplete')";

if(mysqli_query($conn,$query1)){
	echo("SUCCESS");
}else{
	echo("NOT SUCCESS");
}

?>