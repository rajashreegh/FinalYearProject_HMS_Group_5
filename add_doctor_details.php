<?php

session_start();
require "db_config.php";

$id = $_SESSION['doctor_id'];
$name= $_SESSION['doctor_name'];
$mail = $_SESSION['doctor_email'];

$doc_gender = $_GET['gender'];
$doc_contact = $_GET['contact'];
$doc_dob = $_GET['dob'];
$doc_city = $_GET['city'];
$doc_pincode = $_GET['pincode'];
$doc_state = $_GET['state'];
$doc_country= $_GET['country'];
$doc_institute = $_GET['institute'];
$doc_Experience= $_GET['Experience'];
$doc_practice= $_GET['practice'];
$doc_certificate = $_GET['certificate'];
$doc_research = $_GET['research'];






$query1 = "UPDATE doctor_personal_info SET gender ='$doc_gender',contact_no = '$doc_contact',DOB = '$doc_dob',city ='$doc_city',pincode='$doc_pincode',state='$doc_state',country ='$doc_country' WHERE doctor_id= '$id'";
$query2="UPDATE doc_education_details SET Institutes = '$doc_institute', Experience = '$doc_Experience', practice = '$doc_practice', certification = '$doc_certificate', research = '$doc_research' where doctor_id = '$id'";            

if(mysqli_query($conn,$query1) && mysqli_query($conn,$query2) )
{
	echo("Your Profile is Updated Successfully");
	
	
}else
{
	echo("Failed Updating Your Profile");
	
	
}

?>