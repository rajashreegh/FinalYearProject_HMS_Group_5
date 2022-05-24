<?php

session_start();
require "db_config.php";

$doc_id = $_GET['doc_id'];

$doc_quali = $_GET['qualification'];
$doc_visit = $_GET['visit'];
$doc_floor = $_GET['floor'];

$day_1 = $_GET['day_1'];
$time_1 = $_GET['time_1'];
$day_2 = $_GET['day_2'];
$time_2 = $_GET['time_2'];
$day_3 = $_GET['day_3'];
$time_3 = $_GET['time_3'];

$doc_name = $_GET['doc_name'];
$doc_mail = $_GET['doc_mail'];
$doc_pwd = $_GET['doc_pwd'];

$login_query = "UPDATE doctor_login
                SET doctor_email = '$doc_mail', doctor_pswrd = '$doc_pwd'
                WHERE doctor_id = '$doc_id'";

$quali_query = "UPDATE doctor_details
                SET qualification = '$doc_quali'
                WHERE doc_id = '$doc_id'";


$visit_query = "UPDATE doc_dep
                SET visit = '$doc_visit', floor = '$doc_floor'
                WHERE doc_id = '$doc_id'";

$visit_query_2 = "UPDATE checkup_bookings
                  SET visit = '$doc_visit'
                  WHERE doc_id = '$doc_id'";

$schedule_query = "UPDATE doc_day_time
                   SET day1 = '$day_1', time1 = '$time_1', day2 = '$day_2', time2 = '$time_2', day3 = '$day_3', time3 = '$time_3'
                   WHERE doc_id = '$doc_id'";


if(mysqli_query($conn,$login_query) && mysqli_query($conn,$quali_query) && mysqli_query($conn,$visit_query) && mysqli_query($conn,$schedule_query) && mysqli_query($conn,$visit_query_2))
{
	$_SESSION['status'] = "SUCCESSFUL";
    $_SESSION['status_code'] = "success";
    $_SESSION['status_text'] = "Details of Dr. ".$doc_name." updated";
    header('Location:add_view_update_dctr_details.php');
	
	
}else
{
	$_SESSION['status'] = "FAILURE";
    $_SESSION['status_code'] = "error";
    $_SESSION['status_text'] = "Details of Dr. ".$doc_name." cannot be updated";
    header('Location:add_view_update_dctr_details.php');
	
	
}

?>