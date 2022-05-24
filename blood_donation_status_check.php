<?php

require "db_config.php";

$name=$_POST['name'];
$mail=$_POST['email'];
$number=$_POST['number'];
$quest=$_POST['quest'];

if($quest === 'Y'){
	$query="SELECT * FROM emergency_blood_donor_details WHERE donor_name LIKE '$name' 
			AND email LIKE '$mail' AND phone_no LIKE '$number'";

	$result = mysqli_query($conn,$query);
	$fetched_result=mysqli_fetch_assoc($result);
	$req_status=$fetched_result['req_status'];
	$remarks=$fetched_result['remarks'];

	header("Location:blood_donation_status_display.php?st=.'$req_status'.&rem=.'$remarks'");
} 
else if($quest === 'N'){
	$query="SELECT * FROM blood_don_details WHERE donor_name LIKE '$name' 
			AND email LIKE '$mail' AND phone_no LIKE '$number'";

	$result = mysqli_query($conn,$query);
	$fetched_result=mysqli_fetch_assoc($result);
	$req_status=$fetched_result['req_status'];
	$remarks=$fetched_result['remarks'];

	header("Location:blood_donation_status_display.php?st=.'$req_status'.&rem=.'$remarks'");
}

?>