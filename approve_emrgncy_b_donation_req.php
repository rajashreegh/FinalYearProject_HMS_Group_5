<?php

$d_id=$_GET['d_id'];

require "db_config.php";

$query="UPDATE emergency_blood_donor_details SET req_status = 'Approved', 
		remarks = 'You will be contacted in 2 days time' 
		WHERE donor_id = '$d_id'";

if(mysqli_query($conn,$query)){
	header('Location:blood_pending_req.php');
}

?>