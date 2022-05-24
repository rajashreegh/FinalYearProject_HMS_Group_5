<?php

require "db_config.php";

// this url on direct hitting should not respond. It is built to handle the form sbmssn
// $_SERVER['REQUEST_METHOD']=='POST' incase of form sbmssn

if ($_SERVER['REQUEST_METHOD']=='GET') {
	echo "INVALID URL";
	exit();
}

session_start();

$doctor_email=$_POST['email'];
$doctor_pswrd=$_POST['password'];

$query = "SELECT * FROM doctor_login WHERE doctor_email LIKE '$doctor_email' AND doctor_pswrd LIKE '$doctor_pswrd'";

$result = mysqli_query($conn,$query);

$fetched_result = mysqli_fetch_assoc($result);

$num_rows = mysqli_num_rows($result);

if($num_rows==1){
	$_SESSION['doctor_id'] = $fetched_result['doctor_id'];
    $_SESSION['doctor_name'] = $fetched_result['doctor_name'];
	$_SESSION['doctor_email'] = $fetched_result['doctor_email'];
	$_SESSION['doctor_pswrd'] = $fetched_result['doctor_pswrd'];

	header('Location:doctor_dashboard.php');
}else{
	header('Location:index.php?err=3');
}

?>