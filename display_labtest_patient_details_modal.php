<?php

require 'db_config.php';

$b_id=$_GET['b_id'];

$query="SELECT * FROM labtest l INNER JOIN test_bookings t ON l.id=t.test_id 
		WHERE t.booking_id LIKE '$b_id'";

if($result=mysqli_query($conn,$query)){
	$fetched_result=mysqli_fetch_assoc($result);
	echo '<div>
		      		<h3>Mail: '.$fetched_result['patient_mail_id'].'</h3>
		      		<hr>
		      		<h5>Amount: '.$fetched_result['amount'].'</h5>';

		      		$newDate = date("d-m-Y", strtotime($fetched_result['date']));
		    echo  	'<h5 id="date">Date: '.$newDate.'</h5>';

		      		if($fetched_result['billing_status'] == 'Complete'){
		      			echo '<h4>Billing Status: <span class="text-success">'.$fetched_result['billing_status'].'</span</h4>';
		      		}else{
		      			echo '<h4>Billing Status: <span class="text-danger">'.$fetched_result['billing_status'].'</span</h4>';
		      		}
		   echo   '</div>';
}

?>