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

$query="INSERT INTO applicants_hcs(id,name,gender,age,email,phone_no,city,s_id,status,current_status) 
		VALUES ($p_id,'$name','$gender',$age,'$email','$number','$city',$s_id,'Approved','Active')";

if(mysqli_query($conn,$query)){
	header('Location:hcs_critical_scheme_applied_scss.php');
}
	

?>