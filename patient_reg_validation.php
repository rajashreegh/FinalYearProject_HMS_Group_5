<?php

require "db_config.php";

// this url on direct hitting should not respond. It is built to handle the form sbmssn
// $_SERVER['REQUEST_METHOD']=='POST' incase of form sbmssn

if ($_SERVER['REQUEST_METHOD']=='GET') {
	echo "INVALID URL";
	exit();
}

session_start();

$patient_name=$_POST['name'];
$patient_email=$_POST['email'];
$patient_pswrd=$_POST['password'];

$query = "INSERT INTO patient_login VALUES (NULL,'$patient_name','$patient_email','$patient_pswrd')";

if(mysqli_query($conn,$query)) {

	$query1 = "SELECT * FROM patient_login WHERE patient_email LIKE '$patient_email' AND patient_pswrd LIKE '$patient_pswrd'";
	$result1 = mysqli_query($conn,$query1);

	$fetched_result = mysqli_fetch_assoc($result1);

	$_SESSION['patient_name'] = $fetched_result['patient_name'];
	$_SESSION['patient_id'] = $fetched_result['patient_id'];
	$_SESSION['patient_email'] = $fetched_result['patient_email'];
	$_SESSION['patient_pswrd'] = $fetched_result['patient_pswrd'];

	$patient_id=$_SESSION['patient_id'] ;

	$query2 = "INSERT INTO patient_personal_info VALUES ('$patient_id','0000-00-00','--SELECT--',0,0,'--SELECT--')";
	mysqli_query($conn,$query2);

	$query3 = "INSERT INTO patient_contact_info VALUES ('$patient_id',NULL,NULL,NULL,NULL,NULL,NULL)";
	mysqli_query($conn,$query3);

	$query4 = "INSERT INTO patient_emergency_info VALUES ('$patient_id',NULL,NULL,NULL,NULL,NULL)";
	mysqli_query($conn,$query4);

	$query5 = "INSERT INTO patient_dp VALUES ('$patient_id','dp.png')";
	mysqli_query($conn,$query5);

	header('Location:patient_dashboard.php');

}else{
	header('Location:index.php?err=6');
}

?>