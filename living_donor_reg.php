<?php

require "db_config.php";
session_start();

$donation_type = $_POST['donation_type'];

if($donation_type == 'Living'){
    $reg_table_name = 'living_donor_reg';
    $donor_reg_id = uniqid("ODL");
}else{
    $reg_table_name = 'deceased_donor_reg';
    $donor_reg_id = uniqid("ODD");
}
$donor_name = $_POST['donor_name'];
$donor_DOB = $_POST['donor_DOB'];
$donor_parent = $_POST['donor_parent_name'];
$donor_BG = $_POST['bloodgroup'];
$donor_occupation = $_POST['occupation'];
$donor_gender = $_POST['gender'];
$donor_reg_date = date("Y-m-d");   

$donor_contact_num = $_POST['donor_phone'];
$donor_mail = $_POST['donor_mail'];
$donor_address = $_POST['donor_address'];
$donor_city = $_POST['donor_city'];
$donor_district = $_POST['donor_district'];
$donor_state = $_POST['donor_state'];
$donor_pincode = $_POST['donor_pincode'];

$emer_name = $_POST['donor_emergency_name'];
$emer_contact = $_POST['donor_emergency_phone'];
$emer_mail = $_POST['donor_emergency_mail'];
$emer_address = $_POST['donor_emergency_address'];

$adhaarcard = $_POST['donor_id'];

$cardName = basename($_FILES['adhaar_file']['name']);
$targetFilePath = "Donor_Documents/adhaar_card/". $cardName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$allowTypes = array('pdf','PDF');
if(in_array($fileType, $allowTypes)){
    move_uploaded_file($_FILES['adhaar_file']['tmp_name'], $targetFilePath);
}

$photoName = basename($_FILES['photo_file']['name']);
$targetFilePath = "Donor_Documents/passport_photo/". $photoName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$allowTypes = array('jpg','png','jpeg','JPG','JPEG','PNG');
if(in_array($fileType, $allowTypes)){
    move_uploaded_file($_FILES['photo_file']['tmp_name'], $targetFilePath);
}
$all_disease='';
if(isset($_POST['disease'])){
    $diseases = $_POST['disease'];
    if($diseases!=''){
        foreach ($diseases as $disease){ 
        $all_disease.= $disease.", ";
        }
    }
}else{
    $all_disease='None';
}

if($donor_DOB>=$donor_reg_date){
    $_SESSION['status'] = "FAILED";
    $_SESSION['status_code'] = "error";
    $_SESSION['status_text'] = "Sorry!! Please provide a correct Date of Birth";
    header('Location:organ_donor_reg.php?donation_type='.$donation_type);
}
else if(!isset($_POST['organ']) && !isset($_POST['tissue'])){
    $_SESSION['status'] = "FAILED";
    $_SESSION['status_code'] = "error";
    $_SESSION['status_text'] = "Sorry!! Please select atleast one organ or one tissue";
    header('Location:organ_donor_reg.php?donation_type='.$donation_type);
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
    $donor_reg_query = "INSERT INTO $reg_table_name VALUES('$donor_reg_id','$donor_name','$adhaarcard','$donor_reg_date',NULL,'$cardName','$photoName','Pending',NULL)";

    $donor_personal_query = "INSERT INTO donor_personal VALUES('$donor_reg_id','$donor_DOB','$donor_BG','$donor_parent',
                                                        '$donor_occupation','$donor_gender')";

    $donor_contact_query = "INSERT INTO donor_contact VALUES('$donor_reg_id','$donor_contact_num','$donor_mail','$donor_address',
                                                                '$donor_city','$donor_district','$donor_state','$donor_pincode')";
        

    $donor_emergency_query = "INSERT INTO donor_emergency VALUES('$donor_reg_id','$emer_name','$emer_contact','$emer_mail','$emer_address')";
        
    $donor_declaration_query = "INSERT INTO donor_declaration VALUES('$donor_reg_id','$donate_organ','$donate_tissue','$all_disease')";
        
    if(mysqli_query($conn,$donor_reg_query)){
        if(mysqli_query($conn,$donor_personal_query) && mysqli_query($conn,$donor_contact_query) && mysqli_query($conn,$donor_emergency_query) && mysqli_query($conn,$donor_declaration_query)){
            $_SESSION['status'] = "THANK YOU ".$donor_name;
            $_SESSION['status_code'] = "success";
            $_SESSION['status_text'] = "You will Be Contacted within 7 working days. Check your mail for registration status and updates";
            header('Location:organ_donation_dashboard.php');
        }
        else{
            $_SESSION['status'] = "FAILED";
            $_SESSION['status_code'] = "error";
            $_SESSION['status_text'] = "Sorry!! Please fill the form once again correctly";
            header('Location:organ_donor_reg.php?donation_type='.$donation_type);
        }
    }else{
        $_SESSION['status'] = "FAILED";
        $_SESSION['status_code'] = "error";
        $_SESSION['status_text'] = "Sorry!! You have already registered youself as a ".$donation_type." Donor";
        header('Location:organ_donation_dashboard.php');
    }
}


    

?>