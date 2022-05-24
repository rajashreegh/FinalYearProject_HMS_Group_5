<?php

require 'db_config.php';

$p_id = $_GET['p_id'];
$s_id = $_GET['s_id'];

$name = $_GET['name'];
$gender = $_GET['gender'];
$age = $_GET['age'];
$city = $_GET['city'];
$number = $_GET['number'];
$mail = $_GET['mail'];

$sp_name = $_GET['sp_name'];
$sp_gender = $_GET['sp_gender'];
$sp_age = $_GET['sp_age'];

$ch1_name = $_GET['ch1_name'];
$ch1_gender = $_GET['ch1_gender'];
$ch1_age = $_GET['ch1_age'];

$ch2_name = $_GET['ch2_name'];
$ch2_gender = $_GET['ch2_gender'];
$ch2_age = $_GET['ch2_age'];

$query="INSERT INTO applicants_hcs(id,name,gender,age,email,phone_no,city,s_id,status) 
		VALUES ($p_id,'$name','$gender',$age,'$mail','$number','$city',$s_id,'Pending')";
mysqli_query($conn,$query);

if($ch2_name == '' && $ch2_gender == 'undefined' && $ch2_age == ''){

	$query1="INSERT INTO family_hcs_plan_details(p_id,sp_name,sp_gender,sp_age,ch1_name,ch1_gender,
			ch1_age) 
			VALUES ($p_id,'$sp_name','$sp_gender',$sp_age,'$ch1_name','$ch1_gender',$ch1_age)";
	mysqli_query($conn,$query1);

} else{

	$query2="INSERT INTO family_hcs_plan_details(p_id,sp_name,sp_gender,sp_age,ch1_name,ch1_gender,
			ch1_age,ch2_name,ch2_gender,ch2_age) 
			VALUES ($p_id,'$sp_name','$sp_gender',$sp_age,'$ch1_name','$ch1_gender',$ch1_age,
			'$ch2_name','$ch2_gender',$ch2_age)";
	mysqli_query($conn,$query2);

}




?>