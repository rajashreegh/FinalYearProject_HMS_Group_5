<?php


require "db_config.php";
session_start();

 if(isset($_POST['discharge-patient']))
 {
     $pname=$_POST['patient_name']; 
     $bno=$_POST['bed_number'];
     $dis_date=$_POST['discharge_date'];
     $booking_id=uniqid();
     $query1="SELECT bed_id from beds where bed_number='$bno'";
     $result1= mysqli_query($conn,$query1);
     $row1=mysqli_fetch_assoc($result1);
     $bid=$row1['bed_id'];
     
     //  Retrieving Patient Id
     $query6="SELECT patient_id from patient_login where patient_name='$pname'";
     $result6= mysqli_query($conn,$query6);
     $row6=mysqli_fetch_assoc($result6);
     $pid=$row6['patient_id'];

     $query2 = "SELECT health_issue,doctor_id,admitted_date from bed_allotments where patient_id='$pid' AND bed_id= '$bid' ";
     $result2= mysqli_query($conn,$query2);
     $row2=mysqli_fetch_assoc($result2);
     $health=$row2['health_issue'];
     $doc_id=$row2['doctor_id'];
     $admit_date=$row2['admitted_date'];
     
      

     $query3 = "DELETE from bed_allotments where patient_id='$pid' AND bed_id= '$bid' ";
     $result3= mysqli_query($conn,$query3);
     

     if($result3)
     {
        $query4 = "INSERT INTO discharge_bed VALUES ('$booking_id','$pid', '$bid','$health', '$doc_id', '$admit_date', '$dis_date','Incomplete',NULL,NULL)";
        $result4= mysqli_query($conn,$query4); 
        $query5 ="UPDATE beds SET bed_assigned_status = 0 WHERE bed_id= '$bid'";
         $result5= mysqli_query($conn,$query5); 
         $_SESSION['status3'] = "Patient is Discharged Successfully";
         $_SESSION['status_code3'] = "success";
         header('Location:admit_patient.php');

     }
     else
     {
        $_SESSION['status3'] = "Failed Discharging  Patient";
        $_SESSION['status_code3'] = "error";
        header('Location:admit_patient.php');
     }
     
 }



?>