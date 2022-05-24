<?php
    require "db_config.php";
    $booking_id = $_POST['bid'];
    $query = "UPDATE `vaccination_bookings` 
              SET `payment_status` = 'COMPLETE' 
              WHERE `vaccination_bookings`.`unique_id` LIKE '$booking_id'";
              
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
?>