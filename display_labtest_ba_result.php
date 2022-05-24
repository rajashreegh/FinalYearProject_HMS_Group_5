<?php

require 'db_config.php';

$b_id=$_GET['b_id'];
$value=$_GET['value'];

$query="SELECT * FROM labtest l INNER JOIN test_bookings t ON l.id=t.test_id 
		WHERE t.booking_id LIKE '$b_id'";

$result=mysqli_query($conn,$query);
$fetched_result=mysqli_fetch_assoc($result);

if($fetched_result['p_gender'] == 'Male'){
	if($value < $fetched_result['male_min']){
		echo 'Abnormal';
	}else if($value==$fetched_result['male_min']){
		echo 'At minimum borderline';
	}else if($value > $fetched_result['male_min'] && $value < $fetched_result['male_max']){
		echo 'Normal';
	}else if($value == $fetched_result['male_max']){
		echo 'At maximum borderline';
	}else if($value > $fetched_result['male_max']){
		echo 'Abnormal';
	}
}else if($fetched_result['p_gender'] == 'Female'){
	if($value < $fetched_result['female_min']){
		echo 'Abnormal';
	}else if($value==$fetched_result['female_min']){
		echo 'At minimum borderline';
	}else if($value > $fetched_result['female_min'] && $value < $fetched_result['female_max']){
		echo 'Normal';
	}else if($value == $fetched_result['female_max']){
		echo 'At maximum borderline';
	}else if($value > $fetched_result['female_max']){
		echo 'Abnormal';
	}
}



?>