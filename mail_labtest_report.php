<?php

session_start();

require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/SMTP.php";
require "PHPMailer/src/Exception.php";
require "db_config.php";

$b_id = $_GET['b_id'];


$query="SELECT * FROM test_bookings t INNER JOIN labtest l 
        ON t.test_id=l.id WHERE booking_id LIKE '$b_id'";

$result=mysqli_query($conn,$query);
$fetched_result=mysqli_fetch_assoc($result);
$date_frmttd=date("d-m-Y", strtotime($fetched_result['date']));

    $mail = new PHPMailer\PHPMailer\PHPMailer();
                        
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'carevista8@gmail.com';                   
    $mail->Password   = 'carevista@123';                            
    $mail->SMTPSecure = 'tls';            
    $mail->Port       = 587;                                   

    
    $mail->setFrom('carevista8@gmail.com', 'CareVista Superspeciality Hospital');
    $mail->addAddress($fetched_result['patient_mail_id'], $fetched_result['booking_done_by']);  
    $mail->addReplyTo('no-reply@gmail.com', 'No-reply');
    $mail->addCC('sweetmom.2k@gmail.com');
    $mail->addBCC('sweetmom.2k@gmail.com');

    
    $mail->isHTML(true);                                  
    $mail->CharSet = 'UTF-8';
    $mail->Subject = 'LabTest Report Generated | CareVista Superspeciality Hospital';
    $mail->Body    = '<b>Hello '.$fetched_result['booking_done_by'].', </b><br>
                      This is to inform you that your labtest report has been generated successfully.<br><br>
                      <b>Booking ID: </b>'.$fetched_result['booking_id'].'<br>
                      <b>Test Name: </b>'.$fetched_result['test_name'].'<br>
                      <b>Date: </b> '.$date_frmttd.'<br><br>
                      To access the soft copy of your report follow the path: <br><br>
                      <b>Your dashboard</b> -> <b>My Reports</b> -> <b>Category of your test</b> -> 
                      <b>Choose the mentioned test</b><br><br>
                      <p style="font-style:italic; ">Collect the hard copies of your report from CareVista labtest department in 2 weeks time.</p><br><br>
                      For any query contact 225-336-337 or mail to: carevista8@gmail.com';

    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if($mail->send()){
        $_SESSION['status'] = "SUCCESSFUL";
        $_SESSION['status_code'] = "success";
        $_SESSION['status_text'] = "Report generated !! Mail sent to ".$fetched_result['booking_done_by'];
        header('Location:generate_lab_report.php');
    
    }
    else{
        $_SESSION['status'] = "FAILED";
        $_SESSION['status_code'] = "error";
        $_SESSION['status_text'] = "Mail could not be sent!! Report generated.";
        header('Location:generate_lab_report.php');
    }
?>