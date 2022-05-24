<?php

$d_id=$_GET['d_id'];

require "db_config.php";

$query="UPDATE blood_donor_details SET req_status = 'Rejected',
		remarks = 'Sorry to inform you. Your request has been rejected'
		WHERE donor_id = '$d_id'";

if(mysqli_query($conn,$query)){
	header('Location:blood_pending_req.php');
}

?>