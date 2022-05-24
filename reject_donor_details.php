<?php
require "db_config.php";
require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/SMTP.php";
require "PHPMailer/src/Exception.php";

session_start();

$donor_reg_id=$_GET['donor_reg_num'];
$donation_type = $_GET['donation_type'];
if($donation_type == 'Living'){
    $reg_table_name = 'living_donor_reg';
}else{
    $reg_table_name = 'deceased_donor_reg';
}
$name_query = "SELECT * FROM $reg_table_name
               WHERE Donor_Registration_Num = '$donor_reg_id'";
$result=mysqli_query($conn,$name_query);
$row = mysqli_fetch_assoc($result);
$donor_name = $row['donor_name'];

$contact_query = "SELECT * FROM donor_contact
                    WHERE Donor_Registration_Num = '$donor_reg_id'";
$result = mysqli_query($conn,$contact_query);
$contact_row = mysqli_fetch_assoc($result);


$query = "DELETE FROM $reg_table_name
            WHERE Donor_Registration_Num = '$donor_reg_id'";
if(mysqli_query($conn,$query)){
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();                                           
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'carevista7@gmail.com';                    
    $mail->Password   = 'CareVista@2022';                             
    $mail->SMTPSecure = 'tls';   
    $mail->Port       = 587;    

    //Recipients
    $mail->setFrom('carevista7@gmail.com', 'CareVista Superspeciality Hospital');
    $mail->addAddress($contact_row['email'], $donor_name);     //Add a recipient
    $mail->addReplyTo('no-reply@gmail.com', 'No-reply');
    $mail->addCC('ghoshrajashree358@gmail.com');
    $mail->addBCC('ghoshrajashree358@gmail.com');

    // Attachments        

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->CharSet = 'UTF-8';
    $mail->Subject = 'Application Rejected| CareVista Superspeciality Hospital';
    $mail->Body    = '<b>Welcome To CareVista Superspeciality Hospital</b><br>
                        Dear '.$donor_name.',<br><br>Thank you for showing interest.
                        However, your identity documents are incorrect/does not meet our requirement criteria. So your application cannot be registered with our organisation.
                        <br><br>
                        <b><i>Thank You</i></b><br>
                        <b><i>CareVista Superspeciality Hospital</i></b><br>';
    $mail->SMTPOptions = array(
                            'ssl' => array(
                                'verify_peer' => false,
                                'verify_peer_name' => false,
                                'allow_self_signed' => true
                            )
                       );
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if($mail->send()){
        $_SESSION['status'] = "SUCCESSFUL";
        $_SESSION['status_code'] = "success";
        $_SESSION['status_text'] = "Application of ".$donor_name." rejected";
        header('Location:view_pending_donors.php');
    }
    else{
        $_SESSION['status'] = "FAILED";
        $_SESSION['status_code'] = "error";
        $_SESSION['status_text'] = "Rejection Mail to ".$donor_name;
        header('Location:view_pending_donors.php');
    }
}
else{
    $_SESSION['status'] = "FAILED";
    $_SESSION['status_code'] = "error";
    $_SESSION['status_text'] = "Something went wrong!!! please try again.";
    header('Location:view_pending_donors.php');
}
?>