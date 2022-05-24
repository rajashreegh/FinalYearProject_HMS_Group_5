<?php

require "db_config.php";

// this url on direct hitting should not respond. It is built to handle the form sbmssn
// $_SERVER['REQUEST_METHOD']=='POST' incase of form sbmssn

if ($_SERVER['REQUEST_METHOD']=='GET') {
	echo "INVALID URL";
	exit();
}

session_start();

$patient_email=$_POST['email'];
$patient_pswrd=$_POST['password'];

$query = "SELECT * FROM patient_login WHERE patient_email LIKE '$patient_email' AND patient_pswrd LIKE '$patient_pswrd'";

$result = mysqli_query($conn,$query);

$fetched_result = mysqli_fetch_assoc($result);

$num_rows = mysqli_num_rows($result);

if($num_rows==1){
	$_SESSION['patient_name'] = $fetched_result['patient_name'];
	$_SESSION['patient_id'] = $fetched_result['patient_id'];
	$_SESSION['patient_email'] = $fetched_result['patient_email'];
	$_SESSION['patient_pswrd'] = $fetched_result['patient_pswrd'];

	header('Location:patient_dashboard.php');
}else{
	header('Location:index.php?err=5');
}

?>