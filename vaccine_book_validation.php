<?php

require "db_config.php";

// this url on direct hitting should not respond. It is built to handle the form sbmssn
// $_SERVER['REQUEST_METHOD']=='POST' incase of form sbmssn

if ($_SERVER['REQUEST_METHOD']=='GET') {
	echo "INVALID URL";
	exit();
}
$vaccine_id=$_POST['vaccine_id'];
session_start();
$query="SELECT * FROM vaccine_day_time WHERE vaccine_id='$vaccine_id'";
$result=mysqli_query($conn,$query);
$fetched_result=mysqli_fetch_assoc($result);

$day1=$fetched_result['day1'];
$time1=$fetched_result['time1'];
$date1=date('Y-m-d', strtotime($day1));
$newDate1 = date("d-m-Y", strtotime($date1));

$day2=$fetched_result['day2'];
$time2=$fetched_result['time2'];
$date2=date('Y-m-d', strtotime($day2));
$newDate2 = date("d-m-Y", strtotime($date2));

$day3=$fetched_result['day3'];
$time3=$fetched_result['time3'];
$date3=date('Y-m-d', strtotime($day3));
$newDate3 = date("d-m-Y", strtotime($date3));

$day4=$fetched_result['day4'];
$time4=$fetched_result['time4'];
$date4=date('Y-m-d', strtotime($day4));
$newDate4 = date("d-m-Y", strtotime($date4));

$day5=$fetched_result['day5'];
$time5=$fetched_result['time5'];
$date5=date('Y-m-d', strtotime($day5));
$newDate5 = date("d-m-Y", strtotime($date5));

$day6=$fetched_result['day6'];
$time6=$fetched_result['time6'];
$date6=date('Y-m-d', strtotime($day6));
$newDate6 = date("d-m-Y", strtotime($date6));

$day7=$fetched_result['day7'];
$time7=$fetched_result['time7'];
$date7=date('Y-m-d', strtotime($day7));
$newDate7 = date("d-m-Y", strtotime($date7));
$time="";
$days=$_POST['days'];
if($days==$day1){
	$time=$time1;
}
else if($days==$day2){
	$time=$time2;
}
else if($days==$day3){
	$time=$time3;
}
else if($days==$day4){
	$time=$time4;
}
else if($days==$day5){
	$time=$time5;
}
else if($days==$day6){
	$time=$time6;
}
else {
	$time=$time7;
}

$newDate = date("d-m-Y", strtotime($days));


$name=$_POST['txt'];
$email=$_POST['email'];
$contact=$_POST['contact'];

$booking_id=$_POST['booking_id'];
$vaccination_booker_name=$_POST['vaccination_booker_name'];
$vaccination_booker_id=$_POST['vaccination_booker_id'];

$status="INCOMPLETE";



$query = "INSERT INTO `vaccination_bookings` (`unique_id`, `vaccine_id`, `vaccination_booker_id`, `vaccination_booker_name`, `name`, `email`, `contact_no`, `day`, `date`, `time`, `vaccination_status`) VALUES ('$booking_id', '$vaccine_id', '$vaccination_booker_id', '$vaccination_booker_name', '$name ', '$email', '$contact', '$days', '$newDate', '$time', '$status')";

$result = mysqli_query($conn,$query);
header('Location:vaccination_booking_success.php?booking_id='.$booking_id.'');

?>