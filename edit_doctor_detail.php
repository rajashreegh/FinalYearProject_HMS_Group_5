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
	<title>Update Doctor Details</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> -->
    <link rel="stylesheet" type="text/css" href="css/edit_doctor_details.css">
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

        $visit_query = "SELECT * FROM doc_dep
                        WHERE doc_id='$doctor_id'";
        $row2 = mysqli_query($conn,$visit_query);
        $visit_row = mysqli_fetch_assoc($row2);

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
        <div class="row">
            <div class="col-md-12">
                <div class="p-3 mb-2 bg-dark text-white"><i class="fas fa-edit icon"></i>  EDIT DOCTOR DETAILS</div>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body text-center profile-pic">
                        <img class="img-account-profile rounded-circle mb-2" src="<?php echo $imageURL; ?>" alt="">
                        <p class="h4">Dr. <?php echo $login_row['doctor_name'] ?></p>
                        <div class="h5 font-italic text-muted">DOCTOR ID: <?php echo $login_row['doctor_id']; ?></div><br>
                        <p class="h6">Department of <?php echo $dept_row['dept_name']; ?></p>
                    </div>
                    <form class="col-md-12">
                        <div class="form-group">
                            <label for="doc_mail">E-mail ID</label>
                            <input type="text" class="form-control" id="doc_mail" placeholder="abc@example.com" value="<?php echo $login_row['doctor_email']; ?>">
                        </div>   
                        <div class="form-group"> 
                            <label for="doc_pswrd">Password</label>
                            <input type="text" class="form-control" id="doc_pswrd" placeholder="abcd@1234" value="<?php echo $login_row['doctor_pswrd']; ?>">
                        </div>
                    </form>
                </div>

            </div>
            <div class="col-md-8">
                <div class="card mb-4">
                <div class="card-body card-bg">
                <form action='add_view_update_dctr_details.php'>

                    <div class="form-group">
                        <label for="doc_quali">Qualification</label>
                        <input type="text" class="form-control" id="doc_quali" placeholder="Qualification" value="<?php echo $qualification_row['qualification']; ?>">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="doc_visit">Visit</label>
                        <input type="text" class="form-control" id="doc_visit" placeholder="in Rs." value="<?php echo $visit_row['visit']; ?>">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="doc_floor">Floor</label>
                        <input type="number" class="form-control" id="doc_floor" placeholder=">Floor (1,2,3,etc.)" value="<?php echo $visit_row['floor']; ?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="day_1">Day-1</label>
                            <select id="day_1" name="day1" class="form-control">
                                    <option value="<?php echo $schedule_row['day1']; ?>"><?php echo $schedule_row['day1']; ?></option>
                                    <option value="Sunday">Sunday</option>
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                    <option value="Saturday">Saturday</option>
                        </div>
                        <div class="col-md-2"><input type="text"  hidden></div>
                        <div class="form-group col-md-6">
                            <label for="time_1">Time-1</label>
                                <input class="inpt-frmt" type="time" name="time1" id="time_1" placeholder="XX:YY(am/pm)-XX:YY(am/pm)" value="<?php echo $schedule_row['time1']; ?>"><br>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="day_2">Day-2</label>
                            <select id="day_2" name="day2" class="form-control">
                                    <option value="<?php echo $schedule_row['day2']; ?>"><?php echo $schedule_row['day2']; ?></option>
                                    <option value="Sunday">Sunday</option>
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                    <option value="Saturday">Saturday</option>
                        </div>
                        <div class="col-md-2"><input type="text" id="doc_name" value="<?php echo $login_row['doctor_name']; ?>" hidden></div>
                        <div class="form-group col-md-6">
                            <label for="time_2">Time-2</label>
                            <input class="inpt-frmt" type="time" name="time2" id="time_2" placeholder="XX:YY(am/pm)-XX:YY(am/pm)" value="<?php echo $schedule_row['time2']; ?>"><br>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="day_3">Day-3</label>
                            <select id="day_3" name="day3" class="form-control">
                                    <option value="<?php echo $schedule_row['day3']; ?>"><?php echo $schedule_row['day3']; ?></option>
                                    <option value="Sunday">Sunday</option>
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                    <option value="Saturday">Saturday</option>
                        </div>
                        <div class="col-md-2"><input type="text" id="doc_id" value="<?php echo $doctor_id; ?>" hidden></div>
                        <div class="form-group col-md-6">
                            <label for="time_3">Time-3</label>
                            <input class="inpt-frmt" type="time" name="time3" id="time_3" placeholder="XX:YY(am/pm)-XX:YY(am/pm)" value="<?php echo $schedule_row['time3']; ?>"><br>
                        </div>
                    </div>
                    <div class="text-center"><button type="submit" class="btn btn-primary" id="save-doctor-btn">Save Changes</button></div>
                </form>
                </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	
    <script type="text/javascript" src="js/save_doctor_details.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>