<?php

require 'db_config.php';

$app_id=$_GET['app_id'];

$query = "UPDATE applicants_hcs SET status = 'Rejected' WHERE application_id = '$app_id'";

if(mysqli_query($conn,$query)){
	header('Location:add_health_card_schemes_dashboard.php');
}

?>