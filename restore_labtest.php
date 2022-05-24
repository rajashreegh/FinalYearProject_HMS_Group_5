<?php

require 'db_config.php';

$test_id=$_GET['test_id'];

$query1="INSERT INTO labtest SELECT * FROM deleted_labtest WHERE id='$test_id'";
$query2="DELETE FROM deleted_labtest WHERE id='$test_id'";

if(mysqli_query($conn,$query1) && mysqli_query($conn,$query2)){
	header('Location:lab_test_management_dashboard.php');
}

?>