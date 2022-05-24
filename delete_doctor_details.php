<?php

session_start();
require "db_config.php";
$doctor_id = $_POST['delete_id'];

$query1 ="SELECT * FROM doctor_login
          WHERE doctor_id='$doctor_id'";
$result=mysqli_query($conn,$query1);
$row=mysqli_fetch_assoc($result);

$doctor_name = $row['doctor_name'];
$doctor_email = $row['doctor_email'];
$doctor_pswrd = $row['doctor_pswrd'];

$query2 = "INSERT INTO left_doctors VALUES('$doctor_id','$doctor_name','$doctor_email','$doctor_pswrd')";
mysqli_query($conn,$query2);

$query3 = "DELETE FROM doctor_login
          WHERE doctor_id='$doctor_id'";
if(mysqli_query($conn,$query3)){
    $_SESSION['status'] = "SUCCESSFUL";
    $_SESSION['status_code'] = "success";
    $_SESSION['status_text'] = "Details of Dr. ".$doctor_name." deleted";
    header('Location:add_view_update_dctr_details.php');

}
else{
    $_SESSION['status'] = "Doctor is not Deleted";
    $_SESSION['status_code'] = "error";
    $_SESSION['status_text'] = "Details of Dr. ".$doctor_name." not deleted";
    header('Location:add_view_update_dctr_details.php');
}


?>