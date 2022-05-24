<?php

require "db_config.php";
require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/SMTP.php";
require "PHPMailer/src/Exception.php";
require_once __DIR__ . '/vendor/autoload.php';
session_start();

$donor_reg_id=$_GET['donor_reg_num'];
$donation_type = $_GET['donation_type'];
if($donation_type == 'Living'){
    $reg_table_name = 'living_donor_reg';
    $message = "Living Donor";
    $heading = "LIVING";
}else{
    $reg_table_name = 'deceased_donor_reg';
    $message = "Deceased Donor after my death(Brain Stem/Cardiac)";
    $heading = "DECEASED";
}
$reg_query = "SELECT * FROM $reg_table_name
            WHERE Donor_Registration_Num = '$donor_reg_id'";
$result = mysqli_query($conn,$reg_query);
$reg_row = mysqli_fetch_assoc($result);

$imageURL = 'Donor_Documents/passport_photo/'.$reg_row["photo"];


$personal_query = "SELECT * FROM donor_personal
                    WHERE Donor_Registration_Num = '$donor_reg_id'";
$result = mysqli_query($conn,$personal_query);
$personal_row = mysqli_fetch_assoc($result);

$contact_query = "SELECT * FROM donor_contact
                    WHERE Donor_Registration_Num = '$donor_reg_id'";
$result = mysqli_query($conn,$contact_query);
$contact_row = mysqli_fetch_assoc($result);

$emergency_query = "SELECT * FROM donor_emergency
                    WHERE Donor_Registration_Num = '$donor_reg_id'";
$result = mysqli_query($conn,$emergency_query);
$emergency_row = mysqli_fetch_assoc($result);

$declaration_query = "SELECT * FROM donor_declaration
                    WHERE Donor_Registration_Num = '$donor_reg_id'";
$result = mysqli_query($conn,$declaration_query);
$declaration_row = mysqli_fetch_assoc($result);

$from = new DateTime($personal_row['Donor_DOB']);
$to   = new DateTime('today');
$age = $from->diff($to)->y;



$query = "UPDATE $reg_table_name
         SET status='Approved'
         WHERE Donor_Registration_Num = '$donor_reg_id'";
if(mysqli_query($conn,$query)){
    
    
    $html = '<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
            <link rel="stylesheet" type="text/css" href="css/donor_card.css">
    
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+P+One&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Passions+Conflict&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Kings&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital@1&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Quintessential&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@300&display=swap" rel="stylesheet">
            <script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
    
        </head>
    
        <body>
            <div class="container-fluid-1 mt-2 mb-4">
                <div class="row">
                    <div class="header ml-4">
                        <div class="row">
                            <div class="col-md-1">
                                <div class="logo">
                                    <img src="IMAGES/img1/logo.png" class="logo-pic">
                                    <div class="hospital_name">
                                    <div><span class="hosp_name">CareVista Superspeciality Hospital</span><br>
                                        Contact Number: 2233-0404/0808<br>
                                        Email Us @careVista@gmail.com<br>
                                        Kolkata, WB, India</div>
                                </div>
                                </div>
                            </div>
                            <br>

                            <div class="bg-clr text-center text-white">'.$heading.' DONOR CARD</div><br>
                            <div class="col">
                                <img src="IMAGES/organ_donation/ashok_stambh.png" class="ashok_stambh">
                            </div>
                            <div class="col text-right">
                                Directed By General of Health Services<br>
                                Ministry of Family Welfare<br>
                                Govt. Of India
                            </div>
                        </div>
                    </div>
                </div>
            </div><br><br><br><br><br><br><br><br><br><br><br>
            <div class="container-fluid mt-4 mb-4"> 
                    <div class="header-2 ml-4">
                        <div class="bg-clr text-center text-white page-2-head">DONOR DETAILS</div><br>
                        <div class="row-new">
                            <div class="col-25">
                                <img src="'.$imageURL.'" class="donor_dp">
                            </div>
                            <div class="col-75">
                                <div class="row-new">
                                    <div class="col-25 date_reg">
                                        <b>Date: </b><u>'.date("d-m-Y",strtotime($reg_row['date_of_reg'])).'</u>
                                    </div>
                                    <div class="col-25"></div>
                                    <div class="col-75 date_reg align-right">
                                        <b>Donor Registration Number: </b><u>'.$donor_reg_id.'</u>
                                    </div>
                                </div>
                                <div class="row-new text-center text-body text-left">
                                    I, <span class="data mx-4">'.$reg_row['donor_name'].'</span>,  S/O, D/O
                                    <span class="data mx-4">'.$personal_row['Donor_guardian'].',</span> <br>
                                    Age <span class="data">'.$age.' years</span>, hereby pledge to donate the following from my body for therapeutic purpose as a '.$message.'.<br><br>
                                    <span class="data">Organ(s): </span>'.$declaration_row['organs'].'<br>
                                    <span class="data">Tissue(s): </span>'.$declaration_row['tissues'].'
                                </div>
                                
                            </div>     
                        </div>
                        <div class="row-new margin-20 foot">
                            <div class="col-50 text-body">
                                <b>Blood Group: </b><u>'.$personal_row['Donor_BG'].'</u>
                            </div>
                            <div class="col-50 align-right">
                                <b>Adhaar Card Number: </b><u>'.$reg_row['adhaar_no'].'</u>
                            </div>
                            <div class="col-50">
                                <b>Contact Number: </b><u>'.$contact_row['contact_num'].'</u>
                            </div>
                            <div class="col-50 align-right">
                                <b>E-mail ID: </b><u>'.$contact_row['email'].'</u>
                            </div>
                            <div class="col-50">
                                <b>Emergency Contact Name: </b><u>'.$emergency_row['name'].'</u>
                            </div>
                            <div class="col-50 align-right">
                                <b>Emergency Contact Number: </b><u>'.$emergency_row['contact_num'].'</u>
                            </div>
                        
                        </div>
                        
                    </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
        </body>
    </html>
    ';
   
    $mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8',
        'format' => 'A4-L',
        'orientation' => 'L'
    ]);
    $stylesheet = file_get_contents("css/donor_card.css");
    $mpdf->WriteHTML($stylesheet,1);
    $mpdf->WriteHTML($html,2);
    $donor_card_name = $donor_reg_id.".pdf";
    $card_query = "UPDATE $reg_table_name
                SET donor_card='$donor_card_name'
                WHERE Donor_Registration_Num ='$donor_reg_id'";
    mysqli_query($conn,$card_query);
    $donor_card = "Donor_Documents/donor_card/".$donor_card_name;
    $mpdf->Output($donor_card,'F');

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();                                           
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'carevista8@gmail.com';                    
    $mail->Password   = 'carevista@123';                             
    $mail->SMTPSecure = 'tls';   
    $mail->Port       = 587;    

    //Recipients
    $mail->setFrom('carevista8@gmail.com', 'CareVista Superspeciality Hospital');
    $mail->addAddress($contact_row['email'], $reg_row['donor_name']);     //Add a recipient
    $mail->addReplyTo('no-reply@gmail.com', 'No-reply');
    $mail->addCC('ghoshrajashree358@gmail.com');
    $mail->addBCC('ghoshrajashree358@gmail.com');

    // Attachments
    $mail->addAttachment("Donor_Documents/donor_card/".$donor_card_name);         

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->CharSet = 'UTF-8';
    $mail->Subject = 'Donor Card | CareVista Superspeciality Hospital';
    $mail->Body    = '<b>Welcome To CareVista Superspeciality Hospital</b><br>
                        Dear '.$reg_row['donor_name'].',<br><br>Thank you for pledging yourself as an organ donor.
                        Your contribution can save upto 8 lives.Please find your Donor Card attached below.<br><br>
                        <b>NOTE:</b> If you do not want to become an organ donor then you can unpledge yourself as a donor from our website.<br><br>
                        <b><i>Thank You</i></b><br>
                        <b><i>CareVista Superspeciality Hospital</i></b><br>';
    
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                        if($mail->send()){
                            $_SESSION['status'] = "SUCCESSFUL";
                            $_SESSION['status_code'] = "success";
                            $_SESSION['status_text'] = "Donor Card Mailed to ".$reg_row['donor_name'];
                            header('Location:view_pending_donors.php');
                        
                        }
                        else{
                            $_SESSION['status'] = "FAILED";
                            $_SESSION['status_code'] = "error";
                            $_SESSION['status_text'] = "Donor Card cannot be Mailed to ".$reg_row['donor_name'];
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


