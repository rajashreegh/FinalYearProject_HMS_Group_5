<?php

require 'db_config.php';

$date=$_POST['date'];
$testid=$_POST['labtestid'];

$date_frmttd=date("Y-m-d", strtotime($date));

$query="UPDATE labtest SET test_date = '$date_frmttd' WHERE id='$testid'";
if(mysqli_query($conn,$query)){
	header('Location:lab_test_management_dashboard.php');
}

?>