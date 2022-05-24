<?php

require 'db_config.php';


$b_id=$_POST['b_id'];
$rep_val=$_POST['rep_val'];
$rep_result=$_POST['rep_result'];
$remarks=$_POST['remarks'];
$generation_date=$_POST['g_date'];

$query="INSERT INTO labtest_report_ba VALUES ('$b_id',$rep_val,'$rep_result','$remarks','$generation_date',NULL)";

if(mysqli_query($conn,$query)){
	header('Location:mail_labtest_report.php?b_id='.$b_id);
}else{
	$_SESSION['status'] = "FAILURE";
    $_SESSION['status_code'] = "error";
    $_SESSION['status_text'] = "Sorry!!! Something went wrong. Retry !!";
    header('Location:generate_lab_report.php');
}

?>