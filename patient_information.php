<?php

session_start();

$name=$_SESSION['admin_name'];
$patient_id = $_GET['pid'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Patient Details</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

   
   
	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	
	<link href="https://fonts.googleapis.com/css2?family=Passions+Conflict&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@800&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Quintessential&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+P+One&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display+SC:wght@900&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">    
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Display:wght@900&display=swap" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css2?family=Supermercado+One&display=swap" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet"> 
    
  
    <link rel="stylesheet" href="css/patient_information_style.css">
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   
    <script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
    
 </head>
<body>
<div id="top-bar">
	<h2>Welcome !!! <?php echo "$name"; ?></h2>
	<div id="buttons">
		<a href="admin_dashboard.php" class="btn btn-default">Home</a>
		<a href="logout.php" class="btn btn-default">Logout</a>
	</div>	
</div>

<a href="view_patient_details.php"><button class=" mybtn"><i class="fas fa-angle-double-left"></i>Back to Main Page</button></a>
<div class="navbar">
        <ul>
            <li class="list-item active" id="personal">
               
                <a>
                <i class="fas fa-user-tie"></i>
                   Patient's Personal Details
                </a>
            </li>
            <li class="list-item" id="appointment">
               
                <a>
                <i class="fas fa-calendar-check"></i>
                   Appointment Booking Details
                </a>
            </li>
            <li class="list-item" id="labtest">
              
                <a>
                <i class="fas fa-microscope"></i>
                    Labtest Booking Details
                </a>
            </li>
            <li class="list-item" id="admission">
               
                <a>
                <i class="fas fa-procedures"></i>
                Patient's Admission Details
                </a>
            </li>
            <li class="list-item" id="discharge">
               
               <a>
               <i class="fas fa-procedures"></i>
               Patient's Discharge Details
               </a>
           </li>
        </ul>
    </div>
   

    <?php

        require "db_config.php";
        $query1 = "SELECT patient_id,patient_name,patient_email FROM patient_login where patient_id='$patient_id'";
        $result1=mysqli_query($conn,$query1);
        $row1=mysqli_fetch_assoc($result1);
        $query2 = "SELECT * FROM patient_dp WHERE patient_id='$patient_id'";
		$result2=mysqli_query($conn,$query2);
		$row2=mysqli_fetch_assoc($result2);
		$imageURL = 'patient_dp_uploads/'.$row2["file_name"];
       
        $query3 = "SELECT * FROM patient_personal_info WHERE patient_id='$patient_id'";
        $result3=mysqli_query($conn,$query3);
        $row3=mysqli_fetch_assoc($result3);
        $query4 = "SELECT * FROM patient_contact_info WHERE patient_id='$patient_id'";
		$result4=mysqli_query($conn,$query4);
		$row4=mysqli_fetch_assoc($result4);
        $query5 = "SELECT * FROM patient_emergency_info WHERE patient_id='$patient_id'";
		$result5=mysqli_query($conn,$query5);
		$row5=mysqli_fetch_assoc($result5);
    ?>  
    <div class="profile-card">
        <div class="card-image"> </div>
        <div class="profile-image">
        <img src="<?php echo $imageURL; ?>" id="photo">
        </div>
        <p id="info1"><?php echo $row1['patient_name']?></p>
         <div class="profile-info">
          <p class="info2">ID : <?php echo $row1['patient_id']?> </p>
          <p class="info2">EMAIL : <?php echo $row1['patient_email']?></p>
         </div>
    </div>

     <div id="content1">
         <p id="header1">Personal Information</p>
         <div class="info3">
         <div class="details">
             <p>Gender : <?php echo $row3['Gender'] ;?></p>
             <p>Town :   <?php echo $row4['town'] ;?> </p>
             <p>State : <?php echo $row4['state'] ; ?></p>
        </div>
         <div class="details">
             <p>Contact : <?php echo $row4['contact_number'] ;?></p>
             <p>Pincode : <?php echo $row4['pincode'] ;?></p>
             <p>Country : <?php echo $row4['country'] ; ?></p>
         </div>
         </div>
         <p id="header2">Emergency Contact Details</p>
         <div class="info4">
         <div class="details">
             <p>Name : <?php echo $row5['name'] ;?></p>
             <p>Email-ID : <?php echo$row5['mail_id'] ;?></p>
            
        </div>
         <div class="details">
             <p>Relationship : <?php echo $row5['relationship'] ;?></p>
             <p>Contact : <?php echo $row5['contact_number']; ?></p>
             
         </div>
         </div>
    </div>


    <div class="hide"  id="content2">
      <div class="box1">
          <div class="box-contents">
          <p>Previous Appointments History</p>
          <button class="checkup-btn" id="previous">Click Here to check</button>
          <p>Upcoming Scheduled Appointments</p>
          <button class="checkup-btn" id="upcoming">Click Here to check</button>
          </div>
       
     </div>	
     <div  class="box2">
         <img src="IMAGES/image/appointment.png" width="350px" height="350px"  id="checkup" alt="">
     </div>
    </div>
    
    <?php
           require "db_config.php";
           $query6= "SELECT a.booking_id,a.date,a.time,a.payment_status,a.payment_mode,a.issue,b.doctor_name,d.dept_name 
                    from checkup_bookings a inner join doctor_login b on a.doc_id=b.doctor_id 
                    inner join doc_dep c on b.doctor_id=c.doc_id 
                    inner join departments d on c.dept_id=d.dept_id 
                    where a.booker_id='$patient_id' and a.status='Complete'";
           $result6=mysqli_query($conn,$query6);
           $rowcount1=mysqli_num_rows($result6);
           if($rowcount1==0)
           {
            $query6= "SELECT a.booking_id,a.date,a.time,a.payment_status,a.payment_mode,a.issue,b.doctor_name,d.dept_name 
                      from checkup_bookings a inner join left_doctors b on a.doc_id=b.doctor_id 
                      inner join doc_dep c on b.doctor_id=c.doc_id 
                      inner join departments d on c.dept_id=d.dept_id 
                      where a.booker_id='$patient_id' and a.status='Complete'";
            $result6=mysqli_query($conn,$query6);
            $rowcount1=mysqli_num_rows($result6);
           }
           $query7= "SELECT a.booking_id,a.date,a.time,b.doctor_name,d.dept_name 
                     from checkup_bookings a inner join doctor_login b on a.doc_id=b.doctor_id 
                     inner join doc_dep c on b.doctor_id=c.doc_id 
                     inner join departments d on c.dept_id=d.dept_id 
                     where a.booker_id='$patient_id' and a.status='Incomplete'";
           $result7=mysqli_query($conn,$query7);
           $rowcount2=mysqli_num_rows($result7);
           if($rowcount2==0)
           {
            $query7= "SELECT a.booking_id,a.date,a.time,b.doctor_name,d.dept_name 
                      from checkup_bookings a inner join left_doctors b on a.doc_id=b.doctor_id 
                      inner join doc_dep c on b.doctor_id=c.doc_id 
                      inner join departments d on c.dept_id=d.dept_id 
                      where a.booker_id='$patient_id'  and a.status='Incomplete'";
            $result7=mysqli_query($conn,$query7);
            $rowcount2=mysqli_num_rows($result7);  
           }
       
    ?>
    <div class="hide"  id="content5">
    <i class="fas fa-arrow-circle-left back" id="back-btn1"></i>
      <div class="wrapper">
      <?php
          if($rowcount1!=0)
          {
             while($row6=mysqli_fetch_assoc($result6))
             {
                $prevdate=$row6['date'];
                $newDate1 = date("d-m-Y", strtotime($prevdate));
                echo '<div class="mybox3">
               <div class="heading1">
               <p>Previous Appointments </p>
               </div> 
               <div class="appointments-info">
               <p>Booking ID: '.$row6['booking_id'].' </p>
               <p>Doctor Name: '.$row6['doctor_name'].'</p>
               <p>Department: '.$row6['dept_name'].'</p>
               <p>Date: '. $newDate1.'</p>
               <p>Time: '.$row6['time'].'</p>
               <p>Health Issue: '.$row6['issue'].'</p>
               <p>Payment Status: '.$row6['payment_status'].'</p>
               <p>Payment Mode: '.$row6['payment_mode'].'</p>
             </div>
             </div>';  
             }
          }
          else
          {
         
          echo  '<div class="mybox3">
                 <img src="IMAGES/image/appointment1.png" id="icon3" width="150px" height="150px">
                <div id="message3">
               <p>No Previous Appointment Records Found</p>
               </div>
               </div>';
          }
         ?>
     </div>
    </div>


    <div class="hide"  id="content6">
    <i class="fas fa-arrow-circle-left back" id="back-btn2"></i>
     
     <div class="wrapper">
      <?php
          if($rowcount2!=0)
          {
             while($row7=mysqli_fetch_assoc($result7))
             {
                $nextdate=$row7['date'];
                $newDate2 = date("d-m-Y", strtotime($nextdate));
                echo '<div class="mybox4">
               <div class="heading1">
               <p>Upcoming Appointments </p>
               </div> 
               <div class="appointments-info1">
               <p>Booking ID: '.$row7['booking_id'].' </p>
               <p>Doctor Name: '.$row7['doctor_name'].'</p>
               <p>Department: '.$row7['dept_name'].'</p>
               <p>Date: '.$newDate2.'</p>
               <p>Time: '.$row7['time'].'</p>
              
             </div>
             </div>';  
             }
          }
          else
          {
         
          echo  '<div class="mybox4">
                 <img src="IMAGES/image/appointment1.png" id="icon3" width="150px" height="150px">
                <div id="message3">
               <p>No Upcoming Appointment Records Found</p>
               </div>
               </div>';
          }
         ?>
     </div>
    </div>
    
    <?php
           require "db_config.php";
           $query8= "SELECT a.booking_id,a.date,a.amount,a.payment_mode,a.payment_id,b.test_name,b.category 
                     from test_bookings a inner join labtest b on a.test_id=b.id 
                     WHERE a.booker_id='$patient_id'";
           $result8=mysqli_query($conn,$query8);
           $rowcount3=mysqli_num_rows($result8);
           $today_date = date('Y-m-d');
       
    ?>

    <div class="hide" id="content3"> 
          
        
       <?php
          if($rowcount3!=0)
          {
             while($row8=mysqli_fetch_assoc($result8))
             {
                $testdate=$row8['date'];
                $newDate3 = date("d-m-Y", strtotime($testdate));
                $today_date = date('Y-m-d');
                $message="";
                if(($row8['payment_id']!=NULL) || ($row8['payment_mode']=='Cash' && $row8['date']<=$today_date))
                {
                   $message="Complete";
                }
                else{
                    $message="Incomplete";
                }
               
                echo '<div class="mybox1">
               <img src="IMAGES/image/labtest-img.png" id="icon1" width="200px" height="150px" alt=""> 
               <div class="labtest-info">
               <p>Booking ID: '.$row8['booking_id'].' </p>
               <p>Test Type: '.$row8['category'].'</p>
               <p>Test Name: '.$row8['test_name'].'</p>
               <p>Test Amount: '.$row8['amount'].'</p>
               <p>Booking Date: '.$newDate3.'</p>
               <p>Payment Status: '. $message.'</p>
               <p>Payment Mode: '.$row8['payment_mode'].'</p>

             </div>
             </div>';  
             }
          }
          else
          {
         
          echo  '<div class="mybox1">
                <img src="IMAGES/image/labtest-img.png" id="icon1" width="200px" height="150px" alt=""> 
                <div id="message1">
               <p>No Labtest Booking Records Found</p>
               </div>
               </div>';
          }
         ?>
           
           
     </div>

     <?php
           require "db_config.php";
           $query9= "SELECT a.health_issue,a.admitted_date,b.doctor_name,c.bed_number,d.room_number,d.ward_type 
                     from bed_allotments a inner join doctor_login b on a.doctor_id=b.doctor_id 
                     inner join beds c on a.bed_id=c.bed_id 
                     inner join rooms d on c.room_id=d.room_id 
                     where a.patient_id='$patient_id'"; 
           $result9=mysqli_query($conn,$query9);
           $rowcount4=mysqli_num_rows($result9);
           if($rowcount4==0)
           {
            $query9= "SELECT a.health_issue,a.admitted_date,b.doctor_name,c.bed_number,d.room_number,d.ward_type 
                      from bed_allotments a inner join left_doctors b on a.doctor_id=b.doctor_id 
                      inner join beds c on a.bed_id=c.bed_id 
                      inner join rooms d on c.room_id=d.room_id 
                      where a.patient_id='$patient_id'"; 
            $result9=mysqli_query($conn,$query9);
            $rowcount4=mysqli_num_rows($result9);  
           }
       
         
    ?>

    <div class="hide" id="content4">
    <?php
          
          if($rowcount4!=0)
             {
                $row9=mysqli_fetch_assoc($result9);
                $admitdate=$row9['admitted_date'];
                $newDate4 = date("d-m-Y", strtotime($admitdate));
               
                echo  '<div class="mybox2">
                <img src="IMAGES/image/admitted-patient.png" id="icon2" width="200px" height="120px" alt="">
                <div class="heading">
                <p> ADMITTED </p>
                 </div>
                <div class="admit-info">
                <p>Bed No: '.$row9['bed_number'].' </p>
                <p>Room No: '.$row9['room_number'].'</p>
                <p>Ward Name: '.$row9['ward_type'].'</p>
                <p>Doctor-in-charge: '.$row9['doctor_name'].'</p>
                <p>Health Issue: '.$row9['health_issue'].'</p>
                <p>Admitted Date: '.  $newDate4.'</p>
                </div>
                </div>';
             }
            
             else
             {
                 echo '<div class="mybox2">
                 <img src="IMAGES/image/admitted-patient.png" id="icon2" width="200px" height="120px" alt="">
                 <div id="message2">
                 <p>No Admission Records Found</p>
                 </div>
                 </div>';
                 
                 
             }
        
             
         ?>
         </div>    
     

     <?php
       $query10="SELECT a.health_issue,a.admitted_date,a.discharge_date,a.billing_status,a.payment_mode,b.doctor_name,c.bed_number,d.room_number,d.ward_type 
                 from discharge_bed a inner join doctor_login b on a.doctor_id=b.doctor_id 
                 inner join beds c on a.bed_id=c.bed_id 
                 inner join rooms d on c.room_id=d.room_id 
                 where a.patient_id='$patient_id'";
       $result10=mysqli_query($conn,$query10);
       $rowcount5=mysqli_num_rows($result10);
       if($rowcount5==0)
       {
        $query10="SELECT a.health_issue,a.admitted_date,a.discharge_date,b.doctor_name,c.bed_number,d.room_number,d.ward_type 
                 from discharge_bed a inner join left_doctors b on a.doctor_id=b.doctor_id 
                 inner join beds c on a.bed_id=c.bed_id 
                 inner join rooms d on c.room_id=d.room_id 
                 where a.patient_id='$patient_id'";
        $result10=mysqli_query($conn,$query10);
        $rowcount5=mysqli_num_rows($result10);
       }
     ?>

     <div class="hide" id="content7">
         <?php
        if($rowcount5!=0)
             {
                while($row10=mysqli_fetch_assoc($result10))
                {
                  
                    $admitdate=$row10['admitted_date'];
                    $newDate5 = date("d-m-Y", strtotime($admitdate));
                    $disdate=$row10['discharge_date'];
                    $newDate6 = date("d-m-Y", strtotime($disdate));
                echo  '<div class="mybox5">
                <img src="IMAGES/image/admitted-patient.png" id="icon4" width="200px" height="120px" alt="">
                <div class="heading2">
                <p> DISCHARGED </p>
                 </div>
                <div class="discharge-info">
                <p>Bed No: '.$row10['bed_number'].' </p>
                <p>Room No: '.$row10['room_number'].'</p>
                <p>Ward Name: '.$row10['ward_type'].'</p>
                <p>Doctor-in-charge: '.$row10['doctor_name'].'</p>
                <p>Health Issue: '.$row10['health_issue'].'</p>
                <p>Admitted Date: '.$newDate5.'</p>
                <p>Discharged Date: '.$newDate6.'</p>
                <p>Payment Status: '.$row10['billing_status'].'</p>
                <p>Payment Mode: '.$row10['payment_mode'].'</p>
                </div>
                </div>';
                }
                
             }
        else
             {
                 echo '<div class="mybox5">
                 <img src="IMAGES/image/admitted-patient.png" id="icon4" width="200px" height="120px" alt="">
                 <div id="msg">
                 <p>No Discharge Records Found</p>
                 </div>
                 </div>';
                 
                 
            }
    ?>

    </div>



 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

 <script>
        $(function () {
            $("li").click(function (e) {
                e.preventDefault();
                $("li").removeClass("active");
                $(this).addClass("active");
            });
        });
    </script>
    <script src="js/patient-content.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>