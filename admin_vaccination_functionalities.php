<?php
include "db_config.php";
session_start();

$unique_id=$_GET['unique_id'];

?>
<?php
if(isset($_GET['approve'])){
    $query = "UPDATE `vaccination_bookings` SET `vaccination_status` = 'COMPLETE',  `payment_status` = 'COMPLETE' WHERE `vaccination_bookings`.`unique_id` = '$unique_id'";
    $result=mysqli_query($conn,$query);
    $_SESSION['approved']=true;
    header("location:admin_vaccination_upcoming_appointments.php");
}
?>
<?php
if(isset($_GET['cancel'])){
    $query = "UPDATE `vaccination_bookings` SET `vaccination_status` = 'CANCELLED',  `payment_status` = 'CANCELLED' WHERE `vaccination_bookings`.`unique_id` = '$unique_id'";
    $result=mysqli_query($conn,$query);
    $_SESSION['cancel']=true;
    header("location:admin_vaccination_upcoming_appointments.php");
}
?>
<?php
if(isset($_GET['pending'])){
    $query = "UPDATE `vaccination_bookings` SET `vaccination_status` = 'INCOMPLETE' WHERE `vaccination_bookings`.`unique_id` = '$unique_id'";
    $result=mysqli_query($conn,$query);
    $_SESSION['restored']=true;
    header("location:admin_vaccination_cancelled_appointments.php");
}
?>
<?php
if(isset($_GET['approved_restore'])){
    $query = "UPDATE `vaccination_bookings` SET `vaccination_status` = 'INCOMPLETE' WHERE `vaccination_bookings`.`unique_id` = '$unique_id'";
    $result=mysqli_query($conn,$query);
    $_SESSION['approved_restore']=true;
    header("location:admin_vaccination_approved_appointments.php");
}
?>
