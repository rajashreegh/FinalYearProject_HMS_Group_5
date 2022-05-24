<?php

session_start();

$name = $_SESSION['patient_name'];
$id = $_SESSION['patient_id'];
$mail = $_SESSION['patient_email'];
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Patient History | CareVista Hospital</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="css/patient_history.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Passions+Conflict&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+P+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Supermercado+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Serif:wght@500&display=swap" rel="stylesheet"> 

    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@800&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Quintessential&display=swap" rel="stylesheet"> 
   
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display+SC:wght@900&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">    
   
	<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Display:wght@900&display=swap" rel="stylesheet"> 
	 
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet"> 

	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
</head>
<body>
   <div id="top-bar">
	<h2>Welcome !!! <?php echo "$name"; ?></h2>
	<div id="buttons">
		<a href="patient_dashboard.php" class="btn btn-default">Home</a>
		<a href="logout.php" class="btn btn-default">Logout</a>
	</div>	
   </div>

    <div class="navbar">
        <ul>
            <li class="list-item active" id="previous">
               
                <a>
                <i class="fas fa-calendar-check"></i>
                    Previous Appointments History
                </a>
            </li>
            <li class="list-item" id="upcoming">
               
                <a>
                <i class="fas fa-calendar-alt"></i>
                  Upcoming Appointments History
                </a>
            </li>
            <li class="list-item" id="labtest">
               
               <a>
               <i class="fas fa-microscope"></i>
                 Labtest Booking History
               </a>
           </li>
            <li class="list-item" id="admission">
              
                <a>
                <i class="fas fa-procedures"></i>
                    Your Admission History
                </a>
            </li>
            <li class="list-item" id="discharge">
              
              <a>
              <i class="fas fa-procedures"></i>
                  Your Discharge History
              </a>
          </li>
           
        </ul>
    </div>
    <?php
        require "db_config.php";
        $query1= "SELECT a.booking_id,a.date,a.time,a.issue,b.doctor_name,d.dept_name from checkup_bookings a inner join doctor_login b on a.doc_id=b.doctor_id inner join doc_dep c on b.doctor_id=c.doc_id inner join departments d on c.dept_id=d.dept_id where a.booker_id='$id' and a.status='Complete'";
        $result1=mysqli_query($conn,$query1);
        $rowcount1=mysqli_num_rows($result1);
        if($rowcount1==0)
        {
         $query1= "SELECT a.booking_id,a.date,a.time,a.issue,b.doctor_name,d.dept_name from checkup_bookings a inner join left_doctors b on a.doc_id=b.doctor_id inner join doc_dep c on b.doctor_id=c.doc_id inner join departments d on c.dept_id=d.dept_id where a.booker_id='$id' and a.status='Complete'";
         $result1=mysqli_query($conn,$query1);
         $rowcount1=mysqli_num_rows($result1);
        }

    ?>
    <div  id="content1">
    <?php
          if($rowcount1!=0)
          {
             while($row1=mysqli_fetch_assoc($result1))
             {
               
                $prevdate=$row1['date'];
                $newDate1 = date("d-m-Y", strtotime($prevdate));
               echo  '<div class="card-box">
                        <div class="card-box-front">
                            <div class="pic">
                            <img src="IMAGES/image/doctor-examining-patient-clinic.jpg">
                            </div>
                            <div class="details">
                                <p><b>Booking ID :</b> <span> '.$row1['booking_id'].'</span> </p>
                                <p><b>Date :</b> <span> '.$newDate1.' </span></p>
                                <p><b>Time :</b> <span> '.$row1['time'].' </span> </p>
                                <p><b>Consultant Doctor :</b> <span> '.$row1['doctor_name'].' </span></p>
                                <p><b>Department :</b> <span> '.$row1['dept_name'].' </span></p>
                                <p><b>Diagnosis :</b> <span> '.$row1['issue'].' </span></p>
                                <div class="text-right">
                                    <i class="fa fa-solid fa-arrows-rotate"></i>
                                </div>
                            </div>
                        </div>
                 	<div class="card-box-back">
		            <div class="card-box-back-in">
			         <p>View Your Prescription</p>
                     <a href="prescription-pdf.php?bid='.$row1['booking_id'].'&pid='.$id.'&pname='.$name.'" target="_blank"><button class="pescription-btn" id="previous">Click Here to check</button></a>
		           </div>
	               </div>
                    </div>';
             }
            }
            else{
                echo '<div class="message">
                <p>No Previous Appointment Records Found</p>
                </div>';
            }
            ?>
   </div>

   <?php
   $query5= "SELECT a.booking_id,a.date,a.time,b.doctor_name,d.dept_name from checkup_bookings a inner join doctor_login b on a.doc_id=b.doctor_id inner join doc_dep c on b.doctor_id=c.doc_id inner join departments d on c.dept_id=d.dept_id where a.booker_id='$id'  and a.status='Incomplete'";
   $result5=mysqli_query($conn,$query5);
   $rowcount5=mysqli_num_rows($result5);
   if($rowcount5==0)
    {
     $query5= "SELECT a.booking_id,a.date,a.time,b.doctor_name,d.dept_name from checkup_bookings a inner join left_doctors b on a.doc_id=b.doctor_id inner join doc_dep c on b.doctor_id=c.doc_id inner join departments d on c.dept_id=d.dept_id where a.booker_id='$id'  and a.status='Incomplete'";
    $result5=mysqli_query($conn,$query5);
    $rowcount5=mysqli_num_rows($result5);  
    }

    ?>


   <div class="hide" id="content2">
       <?php
       if($rowcount5!=0)
          {
             while($row5=mysqli_fetch_assoc($result5))
             {
                $nextdate=$row5['date'];
                $newDate6 = date("d-m-Y", strtotime($nextdate));
               echo  '<div class="card-wrapper">
	                  <div class="card">
                      <div class="pic">
                      <img src="IMAGES/image/doctor-examining-patient-clinic.jpg">
                      </div>
                      <div class="details">
		              <p><b>Booking ID :</b> <span> '.$row5['booking_id'].'</span> </p>
                      <p><b>Date :</b> <span> '.$newDate6.' </span></p>
                      <p><b>Time :</b> <span> '.$row5['time'].' </span> </p>
                      <p><b>Consultant Doctor :</b> <span> '.$row5['doctor_name'].' </span></p>
                      <p><b>Department :</b> <span> '.$row5['dept_name'].' </span></p>
                     </div>
	                  </div>
                      </div>';  
             }
          }
          else{
            echo '<div class="message">
            <p>No Upcoming Appointment Records Found</p>
            </div>';
           }
         ?>
     </div>

   

   <?php
        require "db_config.php";
        $query2= "SELECT a.booking_id,a.date,b.test_name,a.amount,b.category from test_bookings a inner join labtest b on a.test_id=b.id WHERE a.booker_id='$id'";
        $result2=mysqli_query($conn,$query2);
        $rowcount2=mysqli_num_rows($result2);

    ?>

   <div class="hide" id="content3">

   <?php
          if($rowcount2!=0)
          {
             while($row2=mysqli_fetch_assoc($result2))
             {
                $testdate=$row2['date'];
                $newDate3 = date("d-m-Y", strtotime($testdate));
    echo '<div class="wrapper">
     <div class="pic1">
          <img src="IMAGES/image/labtest-microscope.jpg">
     </div>
    <div class="details1">
		 <p><b>Booking ID :</b> <span> '.$row2['booking_id'].'</span> </p>
         <p><b>Test Type :</b> <span> '.$row2['category'].' </span></p>
         <p><b>Test Name:</b> <span> '.$row2['test_name'].' </span> </p>
         <p><b>Test Date:</b> <span>  '. $newDate3.' </span></p>
         <p><b>Rate :</b> <span> '.$row2['amount'].' </span></p>
        
       </div>
      </div>';
             }
         }
         else 
         {
            echo '<div class="message">
            <p>No Labtest Booking Records Found</p>
            </div>';
         }

     ?>
     </div>

   
     <?php
           require "db_config.php";
           $query3= "SELECT a.health_issue,a.admitted_date,b.doctor_name,d.dept_name,e.bed_number,f.room_number,f.ward_type from bed_allotments a inner join doctor_login b on a.doctor_id=b.doctor_id inner join doc_dep c on b.doctor_id=c.doc_id inner join departments d on c.dept_id=d.dept_id inner join beds e on a.bed_id=e.bed_id inner join rooms f on e.room_id=f.room_id where a.patient_id='$id'"; 
           $result3=mysqli_query($conn,$query3);
           $rowcount3=mysqli_num_rows($result3);
           if($rowcount3==0)
           {
            $query3= "SELECT a.health_issue,a.admitted_date,b.doctor_name,d.dept_name,e.bed_number,f.room_number,f.ward_type from bed_allotments a inner join left_doctors b on a.doctor_id=b.doctor_id inner join doc_dep c on b.doctor_id=c.doc_id inner join departments d on c.dept_id=d.dept_id inner join beds e on a.bed_id=e.bed_id inner join rooms f on e.room_id=f.room_id where a.patient_id='$id'";  
            $result3=mysqli_query($conn,$query3);
            $rowcount3=mysqli_num_rows($result3);  
           }
           

    ?>

   <div class="hide" id="content4">

   <?php
          
          if($rowcount3!=0)
             {
                $row3=mysqli_fetch_assoc($result3);
                $admitdate=$row3['admitted_date'];
                $newDate4 = date("d-m-Y", strtotime($admitdate));

             echo '<div class="status">
             <p> You Are Admitted in our Hospital </p>
             </div>
             <div class="wrapper1">
             <div class="pic2">
             <img src="IMAGES/image/doctor-talking-to-patient-in-hospital-ward.jpg">
             </div>
            <div class="details2">
		    <p><b>Admission Category :</b> <span> '.$row3['ward_type'].' </span> </p>
            <p><b>Room No/Bed No :</b> <span> '.$row3['room_number'].' / '.$row3['bed_number'].' </span> </p>
            <p><b>Health Issue:</b> <span> '.$row3['health_issue'].' </span></p>
            <p><b>Doctor-in-charge:</b> <span>'.$row3['doctor_name'].'</span> </p>
            <p><b>Department:</b> <span>'.$row3['dept_name'].'</span> </p>
            <p><b>Admitted Date:</b> <span>  '.$newDate4.' </span></p>
            </div>
            </div>';
             }
             else 
             {
                echo '<div class="message1">
                <p> No Admission Records Found</p>
                </div>';
             }
    ?>
    </div>
   

    <?php

    $query4="SELECT a.health_issue,a.admitted_date,a.discharge_date,b.doctor_name,d.dept_name,f.ward_type from discharge_bed a inner join doctor_login b on a.doctor_id=b.doctor_id inner join doc_dep c on b.doctor_id=c.doc_id inner join departments d on c.dept_id=d.dept_id inner join beds e on a.bed_id=e.bed_id inner join rooms f on e.room_id=f.room_id where a.patient_id='$id'";
           $result4=mysqli_query($conn,$query4);
           $rowcount4=mysqli_num_rows($result4);
           if($rowcount4==0)
           {
            $query4="SELECT a.health_issue,a.admitted_date,a.discharge_date,b.doctor_name,d.dept_name,f.ward_type from discharge_bed a inner join left_doctors b on a.doctor_id=b.doctor_id inner join doc_dep c on b.doctor_id=c.doc_id inner join departments d on c.dept_id=d.dept_id inner join beds e on a.bed_id=e.bed_id inner join rooms f on e.room_id=f.room_id where a.patient_id='$id'";
            $result4=mysqli_query($conn,$query4);
            $rowcount4=mysqli_num_rows($result4);
           }
    ?>
    <div class="hide" id="content5">
        <?php
            
             if($rowcount4!=0)
             {
                echo '<div class="status1">
                <p> You were Discharged from our Hospital </p>
                </div>';
                while($row4=mysqli_fetch_assoc($result4))
                {
                $admitdate=$row4['admitted_date'];
                $newDate4 = date("d-m-Y", strtotime($admitdate));
                $disdate=$row4['discharge_date'];
                $newDate5 = date("d-m-Y", strtotime($disdate));
                echo '<div class="wrapper2">
                <div class="pic2">
                <img src="IMAGES/image/doctor-talking-to-patient-in-hospital-ward.jpg">
                </div>
               <div class="details2">
               <p><b>Admission Category :</b> <span> '.$row4['ward_type'].' </span> </p>
               <p><b>Health Issue:</b> <span> '.$row4['health_issue'].' </span></p>
               <p><b>Doctor-in-charge:</b> <span>'.$row4['doctor_name'].'</span> </p>
               <p><b>Department:</b> <span>'.$row4['dept_name'].'</span> </p>
               <p><b>Admitted Date:</b> <span>  '.$newDate4.' </span></p>
               <p><b>Discharged Date:</b> <span>  '.$newDate5.' </span></p>
               </div>
               </div>';
               
                }
             }
         else 
         {
            echo '<div class="message">
            <p> No Discharge Records Found</p>
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

    <script src="js/patient-history.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>