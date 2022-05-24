<?php
require "db_config.php";

$b_group=$_POST['b_group'];
$unit=$_POST['unit'];

$query="SELECT * FROM blood_groups WHERE blood_group LIKE '$b_group'";
$result=mysqli_query($conn,$query);
$fetched_result=mysqli_fetch_assoc($result);
$old_unit=$fetched_result['present_units'];

$new_unit=$old_unit+$unit;

$query1 = "UPDATE blood_groups SET present_units = '$new_unit' WHERE blood_group LIKE '$b_group'";
if(mysqli_query($conn,$query1)){
	header('Location:blood_stock.php');
}
?>