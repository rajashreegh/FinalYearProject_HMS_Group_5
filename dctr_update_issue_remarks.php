<?php

require 'db_config.php';

$issue=$_POST['issue'];
$remarks=$_POST['remarks'];

$doc_id=$_POST['doc_id'];
$p_id=$_POST['p_id'];
$b_id=$_POST['b_id'];

$query="UPDATE checkup_bookings SET issue='$issue', remarks='$remarks' WHERE booking_id LIKE '$b_id'";
if(mysqli_query($conn,$query)){
	header('Location:dctr_patient_records.php?p_id='.$p_id);
}

?>