<?php


require "db_config.php";
session_start();

 if(isset($_POST['add_bed_allotments']))
 {
     $pname=$_POST['patient_name']; 
     $bno=$_POST['bed_number'];
     $health=$_POST['health_issue'];
     $doc_name=$_POST['doctor_name'];
     $admit_date=$_POST['admitted_date'];
     
    //  Retrieving Bed Id
     $query1="SELECT bed_id from beds where bed_number='$bno'";
     $result1= mysqli_query($conn,$query1);
     $row1=mysqli_fetch_assoc($result1);
     $bid=$row1['bed_id'];
    //  Retrieving Doctor Id
     $query2="SELECT doctor_id from doctor_login where doctor_name='$doc_name'";
     $result2= mysqli_query($conn,$query2);
     $row2=mysqli_fetch_assoc($result2);
     $doc_id=$row2['doctor_id'];
     
     //  Retrieving Patient Id
     $query5="SELECT patient_id from patient_login where patient_name='$pname'";
     $result5= mysqli_query($conn,$query5);
     $row5=mysqli_fetch_assoc($result5);
     $pid=$row5['patient_id'];

     $query3 = "INSERT INTO bed_allotments VALUES (NULL,'$pid', '$bid', '$health', '$doc_id', '$admit_date')";
     $result3= mysqli_query($conn,$query3);

     if($result3)
     {
         $query4 ="UPDATE beds SET bed_assigned_status = 1 WHERE bed_id= '$bid'";
         $result4= mysqli_query($conn,$query4); 
         $_SESSION['status2'] = "Patient is Admitted Successfully";
         $_SESSION['status_code2'] = "success";
         header('Location:admit_patient.php');

     }
     else
     {
        $_SESSION['status2'] = "Failed Admitting Patient";
        $_SESSION['status_code2'] = "error";
        header('Location:admit_patient.php');
     }
     
 }



?>