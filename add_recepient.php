<?php
require "db_config.php";
session_start();

$recepient_name = $_POST['recepient_name'];
$recepient_DOB = $_POST['recepient_DOB'];
$recepient_parent = $_POST['recepient_parent'];
$recepient_BG = $_POST['recepient_BG'];
$recepient_occupation = $_POST['recepient_occupation'];
$recepient_gender = $_POST['recepient_gender'];
$recepient_reg_id = uniqid("ODR");
$recepient_reg_date = date("Y-m-d"); 

$recepient_phone = $_POST['recepient_phone'];
$recepient_mail = $_POST['recepient_mail'];
$recepient_address = $_POST['recepient_address'];
$recepient_address = $_POST['recepient_address'];
$recepient_city = $_POST['recepient_city'];
$recepient_state = $_POST['recepient_state'];
$recepient_district = $_POST['recepient_district'];
$recepient_pincode = $_POST['recepient_pincode'];

$recepient_emer_name = $_POST['recepient_emer_name'];
$recepient_emer_phone = $_POST['recepient_emer_phone'];
$recepient_emer_mail = $_POST['recepient_emer_mail'];
$recepient_emer_address = $_POST['recepient_emer_address'];

$medical_condition = $_POST['medical_condition'];
$doctor_name = $_POST['doctor_name'];

$recepient_id = $_POST['recepient_id'];

$prescription = basename($_FILES['prescription']['name']);
$targetFilePath = "Recepient_Documents/Prescription/". $prescription;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$allowTypes = array('pdf','PDF');
if(in_array($fileType, $allowTypes)){
    move_uploaded_file($_FILES['prescription']['tmp_name'], $targetFilePath);
}

$cardName = basename($_FILES['adhaar_file']['name']);
$targetFilePath = "Recepient_Documents/adhaar_card/". $cardName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$allowTypes = array('pdf','PDF');
if(in_array($fileType, $allowTypes)){
    move_uploaded_file($_FILES['adhaar_file']['tmp_name'], $targetFilePath);
}

$photoName = basename($_FILES['photo_file']['name']);
$targetFilePath = "Recepient_Documents/passport_photo/". $photoName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$allowTypes = array('jpg','png','jpeg','JPG','JPEG','PNG');
if(in_array($fileType, $allowTypes)){
    move_uploaded_file($_FILES['photo_file']['tmp_name'], $targetFilePath);
}
if($recepient_DOB>=$recepient_reg_date){
    $_SESSION['status'] = "FAILED";
    $_SESSION['status_code'] = "error";
    $_SESSION['status_text'] = "Sorry!! Please provide a correct Date of Birth";
    header('Location:organ_recepient_reg.php');
}

if(!isset($_POST['organ']) && !isset($_POST['tissue'])){
    $_SESSION['status'] = "FAILED";
    $_SESSION['status_code'] = "error";
    $_SESSION['status_text'] = "Sorry!! Please select atleast one organ or one tissue";
   header('Location:organ_recepient_reg.php');
}
else{
    $receive_organ='';
    $receive_tissue='';
    if(isset($_POST['organ'])){
        $organs = $_POST['organ'];
        if($organs!=''){
            foreach ($organs as $organ){ 
                $receive_organ.= $organ.", ";
            }
        }
    }
    if(isset($_POST['tissue'])){
        $tissues = $_POST['tissue'];
        if($tissues!=''){
            foreach ($tissues as $tissue){ 
            $receive_tissue.= $tissue.", ";
            }
        }
    }
    $rec_reg_query = "INSERT INTO recepient_reg VALUES('$recepient_reg_id','$recepient_name','$recepient_id','$recepient_reg_date',NULL,'$cardName','$photoName')";
    $rec_personal_query = "INSERT INTO recepient_personal VALUES('$recepient_reg_id','$recepient_DOB','$recepient_BG','$recepient_parent',
                            '$recepient_occupation','$recepient_gender')";
    $rec_contact_query = "INSERT INTO recepient_contact VALUES('$recepient_reg_id','$recepient_phone','$recepient_mail','$recepient_address',
                            '$recepient_city','$recepient_district','$recepient_state','$recepient_pincode')";
    $rec_emergency_query = "INSERT INTO recepient_emergency VALUES('$recepient_reg_id','$recepient_emer_name','$recepient_emer_phone','$recepient_emer_mail','$recepient_emer_address')";
    $rec_medical_query = "INSERT INTO recepient_medical_info VALUES('$recepient_reg_id','$receive_organ','$receive_tissue','$medical_condition','$doctor_name','$prescription')";
    if(mysqli_query($conn,$rec_reg_query)){
        if(mysqli_query($conn,$rec_personal_query) && mysqli_query($conn,$rec_contact_query) && mysqli_query($conn,$rec_emergency_query) && mysqli_query($conn,$rec_medical_query)){
            $_SESSION['status'] = "Thank You ".$recepient_name;
            $_SESSION['status_code'] = "success";
            $_SESSION['status_text'] = "You will be contacted.";
            header('Location:organ_donation_dashboard.php');
        }else{
            $_SESSION['status'] = "FAILED";
            $_SESSION['status_code'] = "error";
            $_SESSION['status_text'] = "Sorry!! Something went wrong. Fill the details correctly.";
            header('Location:organ_recepient_reg.php');
        }
        
    }else{
        $_SESSION['status'] = "FAILED";
        $_SESSION['status_code'] = "error";
        $_SESSION['status_text'] = "Sorry!! Something went wrong. Fill the details correctly.";
        header('Location:organ_donation_dashboard.php');
    }
}
?>
