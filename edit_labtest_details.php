<?php

require 'db_config.php';

$test_id=$_POST['test_id'];
$test_name=$_POST['test_name'];
$rate=$_POST['rate'];
$room=$_POST['room'];
$male_min=$_POST['male_min'];
$male_max=$_POST['male_max'];
$female_min=$_POST['female_min'];
$female_max=$_POST['female_max'];

$query="UPDATE labtest SET rate='$rate', room_no='$room', male_min='$male_min', male_max='$male_max',
		female_min='$female_min', female_max='$female_max' WHERE id='$test_id'";

if(mysqli_query($conn,$query)){
	header('Location:lab_test_management_dashboard.php');
}

?>