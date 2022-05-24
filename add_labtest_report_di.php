<?php

require 'db_config.php';
session_start();

$b_id_di=$_POST['b_id_di'];
$generation_date=$_POST['g_date'];

if(!empty($_POST['field_name_1']) && !empty($_POST['field_remarks_1'])){
	$field_name_1=$_POST['field_name_1'];
	$field_remarks_1=$_POST['field_remarks_1'];
}else{
	$field_name_1=NULL;
	$field_remarks_1=NULL;
}

if(!empty($_POST['field_name_2']) && !empty($_POST['field_remarks_2'])){
	$field_name_2=$_POST['field_name_2'];
	$field_remarks_2=$_POST['field_remarks_2'];
}else{
	$field_name_2=NULL;
	$field_remarks_2=NULL;
}

if(!empty($_POST['field_name_3']) && !empty($_POST['field_remarks_3'])){
	$field_name_3=$_POST['field_name_3'];
	$field_remarks_3=$_POST['field_remarks_3'];
}else{
	$field_name_3=NULL;
	$field_remarks_3=NULL;
}

if(!empty($_POST['field_name_4']) && !empty($_POST['field_remarks_4'])){
	$field_name_4=$_POST['field_name_4'];
	$field_remarks_4=$_POST['field_remarks_4'];
}else{
	$field_name_4=NULL;
	$field_remarks_4=NULL;
}


$pdf = $_FILES['di_test_docs']['name'];
$pdf_type = $_FILES['di_test_docs']['type'];
$pdf_size = $_FILES['di_test_docs']['size'];
$pdf_tem_loc = $_FILES['di_test_docs']['tmp_name'];
$pdf_store="diagonistic_imaging_documents/".$pdf;

move_uploaded_file($pdf_tem_loc, $pdf_store);

$query="INSERT INTO labtest_report_di VALUES ('$b_id_di','$field_name_1','$field_remarks_1','$field_name_2','$field_remarks_2','$field_name_3','$field_remarks_3','$field_name_4','$field_remarks_4','$pdf','$generation_date')";

if(mysqli_query($conn,$query)){
	header('Location:mail_labtest_report.php?b_id='.$b_id_di);
}else{
	$_SESSION['status'] = "FAILURE";
    $_SESSION['status_code'] = "error";
    $_SESSION['status_text'] = "Sorry!!! Something went wrong. Retry !!";
    header('Location:generate_lab_report.php');
}


?>