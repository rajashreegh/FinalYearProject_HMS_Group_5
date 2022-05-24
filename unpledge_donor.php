<?php
require "db_config.php";
session_start();
$donation_type = $_POST['donation_type'];
$donor_reg_id = $_POST['donor_reg_id'];
$unpledge_reason = $_POST['unpledge_reason'];
$unpledge_date = date("Y-m-d");   

if($donation_type == 'Living'){
    $reg_table_name = 'living_donor_reg';
}else{
    $reg_table_name = 'deceased_donor_reg';
}

$update_query = "UPDATE $reg_table_name
                SET status='Unpledged'
                WHERE Donor_Registration_Num = '$donor_reg_id'";

$insert_table = "INSERT INTO unpledged_donor VALUES('$donor_reg_id','$unpledge_reason','$unpledge_date')";

if(mysqli_query($conn,$update_query) && mysqli_query($conn,$insert_table)){
    $_SESSION['status'] = "SUCCESSFUL";
    $_SESSION['status_code'] = "success";
    $_SESSION['status_text'] = "You have unpledged yourself as a ".$donation_type." organ donor";
    header('Location:organ_donation_dashboard.php');
}
else{
    $_SESSION['status'] = "FAILURE";
    $_SESSION['status_code'] = "error";
    $_SESSION['status_text'] = "Sorry!!! Something went wrong. Please try again";
    header('Location:organ_donation_dashboard.php');
}
?>