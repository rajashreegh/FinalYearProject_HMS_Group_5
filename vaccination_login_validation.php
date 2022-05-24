<?php

require "db_config.php";

// this url on direct hitting should not respond. It is built to handle the form sbmssn
// $_SERVER['REQUEST_METHOD']=='POST' incase of form sbmssn

if ($_SERVER['REQUEST_METHOD']=='GET') {
	echo "INVALID URL";
	exit();
}

session_start();

$vaccination_email=$_POST['email'];
$vaccination_pswrd=$_POST['password'];

$query = "SELECT * FROM vaccination_login WHERE vaccination_email LIKE '$vaccination_email' AND vaccination_pswrd LIKE '$vaccination_pswrd'";

$result = mysqli_query($conn,$query);

$fetched_result = mysqli_fetch_assoc($result);

$num_rows = mysqli_num_rows($result);

if($num_rows==1){
	$_SESSION['vaccination_name'] = $fetched_result['vaccination_name'];
	$_SESSION['vaccination_id'] = $fetched_result['vaccination_id'];
	$_SESSION['vaccination_email'] = $fetched_result['vaccination_email'];
	$_SESSION['vaccination_pswrd'] = $fetched_result['vaccination_pswrd'];

	header('Location:vaccination_dashboard.php');
}else{
	header('Location:index.php?err=7');
}

?>