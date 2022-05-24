<?php


require "db_config.php";
session_start();

 if(isset($_POST['add_bed']))
 {
     $bno=$_POST['bed_number'];
     $rno=$_POST['room_number'];
     $query = "INSERT INTO beds VALUES (NULL,'$bno',(SELECT  room_id FROM rooms WHERE room_number = '$rno'),0)";
     $result= mysqli_query($conn,$query);

     if($result)
     {
         $_SESSION['status1'] = "Bed Details Added Successfully";
         $_SESSION['status_code1'] = "success";
         header('Location:admit_patient.php');

     }
     else
     {
        $_SESSION['status1'] = "Failed Adding bed details";
        $_SESSION['status_code1'] = "error";
        header('Location:admit_patient.php');
     }
     
 }



?>