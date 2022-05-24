<?php

require 'db_config.php';

$sname=$_POST['sname'];
$scategory=$_POST['scategory'];
$stype=$_POST['stype'];
$coverage=$_POST['coverage'];
$prem=$_POST['prem'];

$query="INSERT INTO health_card_schemes(scheme_name,scheme_category,scheme_type,
		coverage,premium_yearly) VALUES ('$sname','$scategory','$stype','$coverage',$prem)";

if(mysqli_query($conn,$query)){
	header('Location:add_health_card_schemes_dashboard.php');
}

?>