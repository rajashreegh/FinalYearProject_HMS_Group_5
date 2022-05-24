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


$query="INSERT INTO applicants_hcs(id,name,gender,age,email,phone_no,city,s_id,status) 
		VALUES ($p_id,'$name','$gender',$age,'$mail','$number','$city',$s_id,'Pending')";

mysqli_query($conn,$query);
	
?>