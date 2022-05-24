<?php

require "db_config.php";

$b_id=$_GET['b_id'];
$p_mode=$_GET['p_mode'];


$query="UPDATE checkup_bookings SET payment_mode = '$p_mode',payment_status = 'Complete'
		WHERE booking_id LIKE '$b_id'";

(mysqli_query($conn,$query));
	


?>