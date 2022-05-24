<?php

require "db_config.php";

// this url on direct hitting should not respond. It is built to handle the form sbmssn
// $_SERVER['REQUEST_METHOD']=='POST' incase of form sbmssn

if ($_SERVER['REQUEST_METHOD']=='GET') {
	echo "INVALID URL";
	exit();
}

session_start();

$admin_email=$_POST['email'];
$admin_pswrd=$_POST['password'];

$query = "SELECT * FROM admin WHERE admin_email LIKE '$admin_email' AND admin_pswrd LIKE '$admin_pswrd'";

$result = mysqli_query($conn,$query);

$fetched_result = mysqli_fetch_assoc($result);

$num_rows = mysqli_num_rows($result);

if($num_rows==1){
	$_SESSION['admin_name'] = $fetched_result['admin_name'];
	$_SESSION['admin_id'] = $fetched_result['admin_id'];
	$_SESSION['admin_email'] = $fetched_result['admin_email'];
	$_SESSION['admin_pswrd'] = $fetched_result['admin_pswrd'];
	$_SESSION['approved']=false;
	$_SESSION['cancel']=false;
	$_SESSION['restored']=false;
	$_SESSION['approved_restore']=false;
	$_SESSION['inventory_insert_item']=false;
	$_SESSION['inventory_update_item']=false;
	$_SESSION['inventory_delete_item']=false;
	$_SESSION['inventory_repeat_item']=false;
	$_SESSION['inventory_dealer_insert_item']=false;
	$_SESSION['inventory_dealer_update_item']=false;
	$_SESSION['inventory_dealer_delete_item']=false;
	$_SESSION['inventory_dealer_repeat_item']=false;
	$_SESSION['inventory_receive_insert_item']=false;
	$_SESSION['inventory_receive_delete_item']=false;
	$_SESSION['inventory_stock_error_item']=false;

	header('Location:admin_dashboard.php');
}else{
	header('Location:index.php?err=1');
}

?>