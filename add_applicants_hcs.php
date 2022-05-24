<?php

require "db_config.php";

$name=$_POST['name'];
$gender=$_POST['gender'];
$age=$_POST['age'];
$city=$_POST['city'];
$email=$_POST['email'];
$number=$_POST['number'];
$s_id=$_POST['s_id'];
$p_id=$_POST['p_id'];

$app_id=uniqid('HCS_APP');

$query="INSERT INTO applicants_hcs(application_id,id,name,gender,age,email,phone_no,city,s_id,status) 
		VALUES ('$app_id',$p_id,'$name','$gender',$age,'$email','$number','$city',$s_id,'Pending')";

if(mysqli_query($conn,$query)){
	header('Location:hcs_scheme_applied_scss.php');
}
	

?>