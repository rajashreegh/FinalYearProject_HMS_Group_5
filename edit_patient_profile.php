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
	<title>Edit Profile | CareVista Hospital</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/edit_patient_profile.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Outfit:wght@400;500&family=Roboto+Slab:wght@400;500&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
	<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Mochiy+Pop+P+One&family=Moon+Dance&family=The+Nautigal:wght@700&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include 'includes/patient_navbar.php';?>

    <?php
        require "db_config.php";
        $query = "SELECT * FROM patient_dp
					  WHERE patient_id='$id'";
		$result=mysqli_query($conn,$query);
		$row=mysqli_fetch_assoc($result);
		$imageURL = 'patient_dp_uploads/'.$row["file_name"];

        $query1 = "SELECT * FROM patient_personal_info
                   WHERE patient_id = '$id'";
        $result1 = mysqli_query($conn,$query1);
        $row1 = mysqli_fetch_assoc($result1);

        $query2 = "SELECT * FROM patient_contact_info
                   WHERE patient_id = '$id'";
        $result2 = mysqli_query($conn,$query2);
        $row2 = mysqli_fetch_assoc($result2);

        $query3 = "SELECT * FROM patient_emergency_info
                   WHERE patient_id = '$id'";
        $result3 = mysqli_query($conn,$query3);
        $row3 = mysqli_fetch_assoc($result3);
    ?>

    <div class="container-xl px-4 mt-4">
        <!-- Account page navigation-->
        <nav class="nav nav-borders">
            <a class="nav-link ms-0" target="__blank" onclick="showPersonal()">Personal Information</a>
            <a class="nav-link ms-0" target="__blank" onclick="showContact()">Contact Information</a>
            <a class="nav-link ms-0" target="__blank" onclick="showEmergency()">Emergency Information</a>
        </nav>
        <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card profile-pic mb-4 mb-xl-0">
                <div class="card-header bg-dark text-white">UPDATE PROFILE PICTURE</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" src="<?php echo $imageURL; ?>" alt="">
                    <div class="small font-italic text-muted mb-4">JPG, JPEG or PNG no larger than 5 MB</div>
                    
                    <form action="update_patient_dp.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="file">
                        <input class="btn btn-primary" type="submit" name="submit" value="Upload">
                    </form>

                </div>
            </div>
        </div>

        <div class="col-xl-8" id="personal_info_section">
            <!-- Personal details card-->
            <div class="card mb-4 card-bg">
                <div class="card-header bg-dark text-white">PERSONAL DETAILS</div>
                <div class="card-body">
                    <form>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="patientDOB">Date Of Birth</label>
                                <input class="form-control" id="patientDOB" type="date" placeholder="YYYY-MM-DD" value="<?php echo $row1['DOB']; ?>">
                            </div>
                        </div>

                        <div class="row gx-3 mb-3">                           
                            <div class="col-md-6">
                                <label for="patientBloodGroup">Blood Group</label>
                                <select id="patientBloodGroup" name="bloodgroup" class="custom-select">
						            <option value="<?php echo $row1['Blood_Group']; ?>"><?php echo $row1['Blood_Group']; ?></option>
                                    <option value="A RhD positive (A%2B)">A RhD positive (A+)</option>
                                    <option value="A RhD negative (A-)">A RhD negative (A-)</option>
                                    <option value="B RhD positive (B%2B)">B RhD positive (B+)</option>
                                    <option value="B RhD negative (B-)">B RhD negative (B-)</option>
                                    <option value="O RhD positive (O%2B)">O RhD positive (O+)</option>
                                    <option value="O RhD negative (O-)">O RhD negative (O-)</option>
                                    <option value="AB RhD positive (AB%2B)">AB RhD positive (AB+)</option>
                                    <option value="AB RhD negative (AB-)">AB RhD negative (AB-)</option>
                                </select>
                            </div>  
                            <div class="col-md-6">
                            <label for="patientGender">Gender</label>
                                <select id="patientGender" name="gender" class="custom-select">
                                    <option value="<?php echo $row1['Gender']; ?>"><?php echo $row1['Gender']; ?></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="patientHeight">Height</label>
                                <input class="form-control" id="patientHeight" type="text" placeholder="in ft" value="<?php echo $row1['Height'] ;?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="patientWeight">Weight</label>
                                <input class="form-control" id="patientWeight" type="text" placeholder="in kg" value="<?php echo $row1['Weight'] ;?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary" type="button" onclick="showContact()" id='personal-sbmt-btn'>Save and Next</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-xl-8" id="contact_info_section">
            <!-- Contact details card-->
            <div class="card mb-4 card-bg">
                <div class="card-header bg-dark text-white">CONTACT DETAILS</div>
                <div class="card-body">
                    <form>
                        <!-- Form Group (username)-->
                        <div class="mb-3 row">
                            <div class="col-md-12">
                                <label for="patientContactnumber">Contact Number</label>
                                <input class="form-control" id="patientContactnumber" type="text" placeholder="10 digit mobile number" value="<?php echo $row2['contact_number'] ;?>">
                            </div>
                        </div>
                        <!-- Form Row-->
                        <div class="mb-3 row">
                            <div class="col-md-12">
                                <label for="patientAddress">Address</label>
                                <input class="form-control" id="patientAddress" type="text" placeholder="House No., Street No., House Name, Street Name, etc." value="<?php echo $row2['address'] ;?>">
                            </div>
                        </div>
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (organization name)-->
                            <div class="col-md-6">
                                <label for="patientCountry">Country</label>
                                <input class="form-control" id="patientCountry" type="text" placeholder="Country" value="<?php echo $row2['country'] ;?>">
                            </div>
                            <!-- Form Group (location)-->
                            <div class="col-md-6">
                                <label for="patientState">State</label>
                                <input class="form-control" id="patientState" type="text" placeholder="State" value="<?php echo $row2['state'] ;?>">
                            </div>
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label for="patientCity">City</label>
                                <input class="form-control" id="patientCity" type="text" placeholder="City/Town" value="<?php echo $row2['town'] ;?>">
                            </div>
                            <div class="col-md-6">
                                <label for="patientPincode">Pincode</label>
                                <input class="form-control" id="patientPincode" type="text" placeholder="Pincode" value="<?php echo $row2['pincode'] ;?>">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary" type="button" onclick="showEmergency()" id='contact-sbmt-btn'>Save and Next</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="col-xl-8" id="emergency_info_section">
            <!-- Contact details card-->
            <div class="card mb-4 card-bg">
                <div class="card-header bg-dark text-white">EMERGENCY DETAILS</div>
                <div class="card-body">
                    <form action='patient_profile_landing_page.php' method="POST">
                        <!-- Form Group (username)-->
                        <div class="mb-3 row">
                            <div class="col-md-12">
                                <label for="patientEmergencyName">Name</label>
                                <input class="form-control" id="patientEmergencyName" type="text" placeholder="<'First Name'> <'Middle Name'> <'Last Name'>" value="<?php echo $row3['name'] ;?>">
                            </div>
                        </div>
                        <!-- Form Row-->
                        <div class="mb-3 row">
                            <div class="col-md-12">
                                <label for="patientRelation">Relationship with the person</label>
                                <input class="form-control" id="patientRelation" type="text" placeholder="Eg: Spouse/Parent/Friend/Relative etc." value="<?php echo $row3['relationship'] ;?>">
                            </div>
                        </div>
                        <!-- Form Row        -->
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="patientEmergencyContact">Phone Number of Emergency Contact</label>
                                <input class="form-control" id="patientEmergencyContact" type="text" placeholder="10-digit mobile number" value="<?php echo $row3['contact_number'] ;?>">
                            </div>
                            <div class="col-md-6">
                                <label for="patientEmergencyEmail">Email address</label>
                                <input class="form-control" id="patientEmergencyEmail" type="text" placeholder="name@example.com" value="<?php echo $row3['mail_id'] ;?>">
                            </div>
                        </div>
                        <!-- Form Row-->
                        <div class="mb-3 row">
                            <div class="col-md-12">
                                <label for="patientEmergencyAddress">Address</label>
                                <input class="form-control" id="patientEmergencyAddress" type="text" placeholder="House No., Street No., House Name, Street Name, City, State, Pincode,etc." value="<?php echo $row3['address'] ;?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary" id='info-sbmt-btn'>Save changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
    <script type="text/javascript">
		function showPersonal(){
			document.getElementById("personal_info_section").style.display="block";
			document.getElementById("contact_info_section").style.display="none";
			document.getElementById("emergency_info_section").style.display="none";
		}

		function showContact(){
			document.getElementById("personal_info_section").style.display="none";
			document.getElementById("contact_info_section").style.display="block";
			document.getElementById("emergency_info_section").style.display="none";
		}

		function showEmergency(){
			document.getElementById("personal_info_section").style.display="none";
			document.getElementById("contact_info_section").style.display="none";
			document.getElementById("emergency_info_section").style.display="block";
		}
	</script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	
    <script type="text/javascript" src="js/update_patient_details.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>