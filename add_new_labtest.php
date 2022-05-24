<?php

require 'db_config.php';

$test_name=$_POST['test_name'];
$category=$_POST['category'];
$date=$_POST['date'];
$rate=$_POST['rate'];
$room=$_POST['room'];
$male_min=$_POST['male_min'];
$male_max=$_POST['male_max'];
$female_min=$_POST['female_min'];
$female_max=$_POST['female_max'];
$test_unit=$_POST['test_unit'];

$date_frmttd=date("Y-m-d", strtotime($date));

if($category == 'Blood Analysis'){
	$query="INSERT INTO labtest(test_name,category,male_min,male_max,female_min,female_max,unit,rate,room_no,test_date) VALUES ('$test_name','$category',$male_min,$male_max,$female_min,$female_max,'$test_unit',$rate,$room,'$date_frmttd')";

	if(mysqli_query($conn,$query)){
		header('Location:lab_test_management_dashboard.php');
	}
}else if($category == 'Diagonistic Imaging'){
	$query1="INSERT INTO labtest(test_name,category,rate,room_no,test_date) VALUES ('$test_name','$category',$rate,$room,'$date_frmttd')";

	if(mysqli_query($conn,$query1)){
		header('Location:lab_test_management_dashboard.php');
	}
}


?>