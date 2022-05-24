<?php

require "db_config.php";
require 'razorpay-php/razorpay-php/Razorpay.php';
use Razorpay\Api\Api;
session_start();

if(isset($_POST['payment_id']) && isset($_POST['bid']) && isset($_POST['payment_type'])){
    

    $payment_type = $_POST['payment_type'];
    $payment_id = $_POST['payment_id'];
    $booking_id = $_POST['bid'];

    $api = new Api('rzp_test_mE9XDNP376RHLY', 'fWJwX5sGmbGbyoA2DoRF9Ucq');
    $payment =  $api->payment->fetch($payment_id);
    $payment_method = strtoupper($payment->method);
    if($payment_type==1){
        $query = "UPDATE checkup_bookings
                SET payment_id = '$payment_id',payment_mode='$payment_method',payment_status='Complete'
                WHERE booking_id='$booking_id'";
        if(mysqli_query($conn,$query)){
            $_SESSION['status'] = "SUCCESSFUL";
            $_SESSION['status_code'] = "success";
            $_SESSION['status_text'] = "Download your receipt from Payment History Dashboard";
            header('Location:download_checkup_booking_receipt.php?b_id='.$booking_id.'');
        
        }
        else{
            $_SESSION['status'] = "FAILURE";
            $_SESSION['status_code'] = "error";
            $_SESSION['status_text'] = "Payment cannot be completed";
            header('Location:payment_gateway.php?payment_type=1');
        }
    }
    if($payment_type==2){
        $query = "UPDATE test_bookings
                SET payment_id = '$payment_id', payment_mode = '$payment_method'
                WHERE booking_id='$booking_id'";
        if(mysqli_query($conn,$query)){
            $_SESSION['status'] = "SUCCESSFUL";
            $_SESSION['status_code'] = "success";
            $_SESSION['status_text'] = "Payment Successful";
        
        }
        else{
            $_SESSION['status'] = "FAILURE";
            $_SESSION['status_code'] = "error";
            $_SESSION['status_text'] = "Payment cannot be completed";
  
        }
    }
    if($payment_type==3){
        $query = "UPDATE discharge_bed
                  SET payment_id ='$payment_id', payment_mode = '$payment_method'
                  WHERE discharge_id= '$booking_id'";
        if(mysqli_query($conn,$query)){
            $_SESSION['status'] = "SUCCESSFUL";
            $_SESSION['status_code'] = "success";
            $_SESSION['status_text'] = "Payment Successful";
        
        }
        else{
            $_SESSION['status'] = "FAILURE";
            $_SESSION['status_code'] = "error";
            $_SESSION['status_text'] = "Payment cannot be completed";
        }
    }
    
}

?>