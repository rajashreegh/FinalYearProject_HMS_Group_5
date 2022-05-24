<?php

session_start();

$name=$_SESSION['admin_name'];

$doctor_id = $_GET['doc_id'];
$dept_id = $_GET['dept_id'];

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>View Doctor Details</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> -->
    <link rel="stylesheet" type="text/css" href="css/view_doctor_profile.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Passions+Conflict&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+P+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@1,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,300&display=swap" rel="stylesheet">

	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
</head>
<body>

	<?php include 'includes/admin_navbar.php'?>

    <?php
        require "db_config.php";
        $query = "SELECT * FROM doctor_profile_pic
					  WHERE doctor_id='$doctor_id'";
		$result=mysqli_query($conn,$query);
		$row=mysqli_fetch_assoc($result);
		$imageURL = 'Doctor_dp_uploads/'.$row["pic_file_name"];

        $login_query = "SELECT * FROM doctor_login
                        WHERE doctor_id='$doctor_id'";
        $row1 = mysqli_query($conn,$login_query);
        $login_row = mysqli_fetch_assoc($row1);
        $href = 'add_view_update_dctr_details.php';
        if(empty($login_row)){
            $login_query = "SELECT * FROM left_doctors
                        WHERE doctor_id='$doctor_id'";
            $row1 = mysqli_query($conn,$login_query);
            $login_row = mysqli_fetch_assoc($row1);
            $href = 'view_deleted_doctor_details.php';
        }

        $visit_query = "SELECT * FROM doc_dep
                        WHERE doc_id='$doctor_id'";
        $row2 = mysqli_query($conn,$visit_query);
        $visit_row = mysqli_fetch_assoc($row2);

        $personal_query = "SELECT * FROM doctor_personal_info
                           WHERE doctor_id='$doctor_id'";
        $row3 = mysqli_query($conn,$personal_query);
        $personal_row = mysqli_fetch_assoc($row3);

        $education_query = "SELECT * FROM doc_education_details
                                WHERE doctor_id='$doctor_id'";
        $row4 = mysqli_query($conn,$education_query);
        $education_row = mysqli_fetch_assoc($row4);

        $schedule_query = "SELECT * FROM doc_day_time
                           WHERE doc_id='$doctor_id'";
        $row5 = mysqli_query($conn,$schedule_query);
        $schedule_row = mysqli_fetch_assoc($row5);

        $dept_query = "SELECT * FROM departments
                       WHERE dept_id='$dept_id'";
        $row6 = mysqli_query($conn,$dept_query);
        $dept_row = mysqli_fetch_assoc($row6);

        $qualification_query = "SELECT * FROM doctor_details
                                WHERE doc_id='$doctor_id'";
        $row7 = mysqli_query($conn,$qualification_query);
        $qualification_row = mysqli_fetch_assoc($row7);
    ?>

    <div class="container-xl px-4 mt-4">
        <!-- Account page navigation-->
        <nav class="nav nav-borders">
            <a class="nav-link ms-0" target="__blank" onclick="showPersonal()">Personal Information</a>
            <a class="nav-link ms-0" target="__blank" onclick="showSchedules()">Schedules</a>
        </nav>
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-md-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0 profile-pic">
                    <div class="card-header bg-dark text-white">Login Credentials</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img class="img-account-profile rounded-circle mb-2" src="<?php echo $imageURL; ?>" alt="">
                        <p class="h4">Dr. <?php echo $login_row['doctor_name'] ?></p>
                        <div class="h5 font-italic text-muted">DOCTOR ID: <?php echo $login_row['doctor_id'] ?></div><br>
                        <p class="h6">Department of <?php echo $dept_row['dept_name'] ?></p>
                        <p class="h6"><?php echo $qualification_row['qualification'] ?></p>
                    </div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4 text-muted" style="margin-left:20px;">E-MAIL ID</dt>
                            <dd class="col-sm-6 text-muted">:<?php echo $login_row['doctor_email'] ?></dd>
                            <dt class="col-sm-4 text-muted" style="margin-left:20px;">PASSWORD</dt>
                            <dd class="col-sm-6  text-muted">:<?php echo $login_row['doctor_pswrd'] ?></dd>
                            <br><br>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="col-md-8" id="personal_info_section">
                <div class="card mb-4">
                    <div class="card-header bg-dark text-white">Personal and Contact Details</div>
                    <div class="card-body card-bg">
                            <div class="mb-3">
                                <dl class="row">
                                    <dt class="col-md-3 text-muted" style="margin-left:20px;">GENDER</dt>
                                    <dd class="col-md-6 text-muted">:<?php echo $personal_row['gender'] ?></dd>
                                    <dt class="col-md-3 text-muted" style="margin-left:20px;">DOB</dt>
                                    <dd class="col-md-6  text-muted">:<?php echo $personal_row['DOB'] ?></dd>
                                    <dt class="col-md-3 text-muted" style="margin-left:20px;">CONTACT NUMBER</dt>
                                    <dd class="col-md-6 text-muted">:<?php echo  $personal_row['contact_no'] ?></dd>
                                    <dt class="col-md-3 text-muted" style="margin-left:20px;">COUNTRY</dt>
                                    <dd class="col-md-6 text-muted">:<?php echo  $personal_row['country'] ?></dd>
                                    <dt class="col-md-3 text-muted" style="margin-left:20px;">STATE</dt>
                                    <dd class="col-md-6 text-muted">:<?php echo  $personal_row['state'] ?></dd>
                                    <dt class="col-md-3 text-muted" style="margin-left:20px;">CITY</dt>
                                    <dd class="col-md-6 text-muted">:<?php echo  $personal_row['city'] ?></dd>
                                    <dt class="col-md-3 text-muted" style="margin-left:20px;">PINCODE</dt>
                                    <dd class="col-md-6 text-muted">:<?php echo  $personal_row['pincode'] ?></dd>
                                </dl>
                            </div>
                    </div>
                    <div class="card-header bg-dark text-white">Appointment Requisites</div>
                    <div class="card-body card-bg">
                            <div class="mb-3">
                                <dl class="row">
                                    <dt class="col-sm-3 text-muted" style="margin-left:20px;">VISIT</dt>
                                    <dd class="col-sm-6 text-muted">:Rs. <?php echo $visit_row['visit'] ?></dd>
                                    <dt class="col-sm-3 text-muted" style="margin-left:20px;">FLOOR</dt>
                                    <dd class="col-sm-6 text-muted">:<?php echo $visit_row['floor'] ?></dd>
                                </dl>
                            </div>
                            <div class="text-center"><button class="btn btn-primary" type="button" onclick="showSchedules()">Next</button></div>
                    </div>
                </div>
            </div>
            <div class="col-md-8" id="schedule_section">
                <div class="card mb-4">
                    <div class="card-header bg-dark text-white">Qualification and Schedules</div>
                    <div class="card-body card-bg">
                            <div class="mb-3">
                                <dl class="row">
                                    <dt class="col-md-3 text-muted" style="margin-left:20px;">INSTITUTE</dt>
                                    <dd class="col-md-6 text-muted">:<?php echo $education_row['Institutes'] ?></dd>
                                    <dt class="col-md-3 text-muted" style="margin-left:20px;">EXPERIENCE  (in years)</dt>
                                    <dd class="col-md-6  text-muted">:<?php echo $education_row['Experience'] ?></dd>
                                    <dt class="col-md-3 text-muted" style="margin-left:20px;">PRACTICE</dt>
                                    <dd class="col-md-6 text-muted">:<?php echo  $education_row['practice'] ?></dd>
                                    <dt class="col-md-3 text-muted" style="margin-left:20px;">CERTIFICATION</dt>
                                    <dd class="col-md-6 text-muted">:<?php echo  $education_row['certification'] ?></dd>
                                    <dt class="col-md-3 text-muted" style="margin-left:20px;">RESEARCH AREA</dt>
                                    <dd class="col-md-6 text-muted">:<?php echo  $education_row['research'] ?></dd>
                                </dl>
                                
                            </div>
                    </div>
                    <div class="card-header bg-dark text-white">Weekly Schedules</div>
                    <div class="card-body card-bg">
                            <div class="mb-3">
                                <table class="table table-sm table-hover table-bordered" style="width:90%;">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">DAY</th>
                                            <th scope="col">TIMING</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $schedule_row['day1']?></td>
                                            <td><?php echo $schedule_row['time1']?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo $schedule_row['day2']?></td>
                                            <td><?php echo $schedule_row['time2']?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo $schedule_row['day3']?></td>
                                            <td><?php echo $schedule_row['time3']?></td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                                <div class="text-center"><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#check_schedule"><i class="fa fa-calendar" aria-hidden="true"></i>    Check Appointments</button></div>
          
                            </div>
                            <div class="text-center"><button class="btn btn-primary" onclick="window.location.href='<?php echo $href; ?>';" id='sbmt-btn' style="width:100%;">Go Back to Home Page</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal bd-example-modal-lg" id="check_schedule">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header bg-info text-white">
                <h4 class="modal-title">Appointment Details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <table class="table table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th>Booking ID</th>
                        <th>Patient ID</th>
                        <th>Patient Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Visit</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php

                            require "db_config.php";
                            $query_appt = "SELECT * FROM checkup_bookings
                                    WHERE doc_id='$doctor_id'";
                            $result_appt=mysqli_query($conn,$query_appt);
                            if(mysqli_num_rows($result_appt)==0){
                                echo '<tr>
                                        <td colspan=7 class="text-center">No Appointment Scheduled</td>
                                    </tr>';
                            }
                            else{
                                while($row_appt=mysqli_fetch_assoc($result_appt)){
                                    $newDate = date("d-m-Y", strtotime($row_appt['date']));
                                    echo '<tr>
                                            <td scope="row">'.$row_appt['booking_id'].'</td>
                                            <td>'.$row_appt['booker_id'].'</td>
                                            <td>'.$row_appt['booking_done_for'].'</td>
                                            <td>'.$newDate.'</td>
                                            <td>'.$row_appt['time'].'</td>
                                            <td>Rs. '.$row_appt['visit'].'</td>
                                            <td>'.$row_appt['status'].'</td>
                                        </tr>';
                                }
                            }
                            
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

            </div>
        </div>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script type="text/javascript">
		function showPersonal(){
			document.getElementById("personal_info_section").style.display="block";
			document.getElementById("schedule_section").style.display="none";
		}

		function showSchedules(){
			document.getElementById("personal_info_section").style.display="none";
			document.getElementById("schedule_section").style.display="block";
		}
	</script>
</body>
</html>