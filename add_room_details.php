<?php


require "db_config.php";
session_start();

 if(isset($_POST['add_room']))
 {
     $rno=$_POST['room_number'];
     $wname=$_POST['ward_type'];
     $desc=$_POST['description'];
     $query = "INSERT INTO rooms VALUES (NULL,'$rno','$wname','$desc')";
     $result= mysqli_query($conn,$query);

     if($result)
     {
         $_SESSION['status'] = "Room Details Added Successfully";
         $_SESSION['status_code'] = "success";
         header('Location:admit_patient.php');

     }
     else
     {
        $_SESSION['status'] = "Failed Adding room details";
        $_SESSION['status_code'] = "error";
        header('Location:admit_patient.php');
     }
     
 }



?>