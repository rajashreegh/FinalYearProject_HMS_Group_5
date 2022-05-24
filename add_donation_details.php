<?php
require "db_config.php";
session_start();

$donor_reg_id = $_POST['add_id'];
$rec_reg_id = $_POST['recepient_reg_id'];
$rec_name = $_POST['recepient_reg_name'];
$donor_type = $_POST['donation_type'];
$doctor_name = $_POST['doctor_name'];
$hospital_name = $_POST['hospital_name'];
$hospital_address = $_POST['hospital_address'];
$donation_date =  date("Y-m-d");  

if($donor_type == 'Living'){
    $reg_table_name = 'living_donor_reg';
}else{
    $reg_table_name = 'deceased_donor_reg';
}
$query = "SELECT * FROM $reg_table_name
            WHERE Donor_Registration_Num='$donor_reg_id' ";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
$donor_name = $row['donor_name'];

if(!isset($_POST['organ']) && !isset($_POST['tissue'])){
    $_SESSION['status'] = "FAILED";
    $_SESSION['status_code'] = "error";
    $_SESSION['status_text'] = "Sorry!! Please select atleast one organ or one tissue";
   header('Location:view_registered_donors.php');
}
else{
    $donate_organ='';
    $donate_tissue='';
    if(isset($_POST['organ'])){
        $organs = $_POST['organ'];
        if($organs!=''){
            foreach ($organs as $organ){ 
                $donate_organ.= $organ.", ";
            }
        }
    }
    if(isset($_POST['tissue'])){
        $tissues = $_POST['tissue'];
        if($tissues!=''){
            foreach ($tissues as $tissue){ 
            $donate_tissue.= $tissue.", ";
            }
        }
    }
    $insert_details = "INSERT INTO donation_details VALUES(NULL,'$donor_reg_id','$donor_name','$donor_type',
                                                            '$rec_reg_id','$rec_name','$donate_organ','$donate_tissue','$donation_date',
                                                            '$doctor_name','$hospital_name','$hospital_address')";
    $update_query1 = "UPDATE $reg_table_name
                    SET donation_status = 'Donated'
                    WHERE 	Donor_Registration_Num = '$donor_reg_id'";
    $update_query2 = "UPDATE recepient_reg
                      SET donation_status = 'Received'
                      WHERE Recepient_reg_num = '$rec_reg_id'";
    if(mysqli_query($conn,$insert_details) && mysqli_query($conn,$update_query1) && mysqli_query($conn,$update_query2) ){
        $_SESSION['status'] = "SUCCESS";
        $_SESSION['status_code'] = "success";
        $_SESSION['status_text'] = "Donation details added successfully";
        header('Location:view_donation_details.php');
    }else{
        $_SESSION['status'] = "FAILED";
        $_SESSION['status_code'] = "error";
        $_SESSION['status_text'] = "Sorry!! Something went wrong";
        header('Location:view_registered_donors.php');
    }
}

?>