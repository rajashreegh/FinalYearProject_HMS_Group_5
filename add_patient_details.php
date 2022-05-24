<?php

session_start();
require "db_config.php";

$patient_name = $_SESSION['patient_name'];
$patient_id = $_SESSION['patient_id'];
$patient_mail = $_SESSION['patient_email'];

$p_dob = $_GET['dob'];
$p_bloodgroup = $_GET['blood_grp'];
$p_gender = $_GET['gender'];
$p_height = $_GET['height'];
$p_weight = $_GET['weight'];

$p_contactnumber = $_GET['contact_num'];
$p_address = $_GET['address'];
$p_country = $_GET['country'];
$p_state = $_GET['state'];
$p_city = $_GET['city'];
$p_pincode = $_GET['pincode'];

$p_emergency_name = $_GET['emer_name'];
$p_emergency_relation = $_GET['emer_relation'];
$p_emergency_contact = $_GET['emer_contact'];
$p_emergency_email = $_GET['emer_email'];
$p_emergency_address = $_GET['emer_address'];


$query1 = "UPDATE patient_personal_info
           SET DOB = '$p_dob', Blood_Group = '$p_bloodgroup', Height = '$p_height', Weight = '$p_weight', Gender = '$p_gender'
           WHERE patient_id = '$patient_id'" ;

$query2 = "UPDATE patient_contact_info
           SET contact_number = '$p_contactnumber', address = '$p_address', state = '$p_state', country = '$p_country', town = '$p_city', pincode = '$p_pincode'
           WHERE patient_id = '$patient_id'" ;

$query3 = "UPDATE patient_emergency_info
           SET name = '$p_emergency_name', relationship = '$p_emergency_relation', mail_id = '$p_emergency_email', contact_number = '$p_emergency_contact', address = '$p_emergency_address'
           WHERE patient_id = '$patient_id'" ;

if(mysqli_query($conn,$query1) && mysqli_query($conn,$query2) && mysqli_query($conn,$query3)){
	echo("PROFILE UPDATED SUCCESSFULLY");
    // header('Location: patient_profile_landing_page.php');
}else{
	echo("NOT SUCCESS");
}


?>