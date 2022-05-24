<?php

require "db_config.php";

$b_id=$_GET['b_id'];
$event=$_GET['event'];

if($event == 1){
	$query="SELECT * FROM checkup_bookings WHERE booking_id LIKE '$b_id'";
	$result=mysqli_query($conn,$query);
	$fetched_result=mysqli_fetch_assoc($result);

	if($fetched_result['payment_status']!=NULL){
		$query1="UPDATE checkup_bookings SET status = 'Complete' WHERE booking_id LIKE '$b_id'";
		mysqli_query($conn,$query1);
	}else{
		$query2="UPDATE checkup_bookings SET payment_mode = 'Cash', payment_status = 'Complete', 
				status = 'Complete' WHERE booking_id LIKE '$b_id'";
		mysqli_query($conn,$query2);
		header('Location:download_checkup_booking_receipt.php?b_id='.$b_id.'');
	}
}else if($event == 2){
	$query3="UPDATE checkup_bookings SET status = 'Cancelled' WHERE booking_id LIKE '$b_id'";
	mysqli_query($conn,$query3);
}




?>