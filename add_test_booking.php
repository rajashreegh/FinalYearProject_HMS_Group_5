<?php

require "db_config.php";

session_start();

$test_id = $_GET['id'];
$booking_id=uniqid();
$booking_done_by = $_SESSION['patient_name'];
$booker_id = $_SESSION['patient_id'];

$query = "SELECT * FROM labtest WHERE id LIKE '$test_id'";
$result = mysqli_query($conn,$query);
$fetched_result = mysqli_fetch_assoc($result);

$amt = $fetched_result['rate'];
$date = $fetched_result['test_date'];

$query1 = "INSERT INTO test_bookings VALUES('$booking_id','$booking_done_by',$booker_id,NULL,NULL,
		NULL,NULL,$test_id,$amt,'$date','Incomplete','Incomplete',NULL,NULL)";

if(mysqli_query($conn,$query1)){
	echo("SUCCESS");
}else{
	echo("NOT SUCCESS");
}

?>