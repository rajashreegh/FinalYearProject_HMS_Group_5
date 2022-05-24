<?php

$d_id=$_GET['d_id'];

require "db_config.php";

$query="UPDATE blood_donor_details SET req_status = 'Approved', 
		remarks = 'You will be contacted when needed' 
		WHERE donor_id = '$d_id'";

if(mysqli_query($conn,$query)){
	header('Location:blood_pending_req.php');
}

?>