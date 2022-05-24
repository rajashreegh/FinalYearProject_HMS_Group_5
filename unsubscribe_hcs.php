<?php 

require "db_config.php";

$p_id=$_GET['p_id'];
$s_id=$_GET['s_id'];

$query="UPDATE applicants_hcs SET current_status = 'Deactivated' WHERE id = $p_id AND s_id = $s_id";

if(mysqli_query($conn,$query)){
	header('Location:applied_hcs.php');
}

?>