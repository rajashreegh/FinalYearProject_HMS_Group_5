<?php
require "db_config.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Organ Recepient Registration | CareVista</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/organ_recepient.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Passions+Conflict&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+P+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@1,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Neonderthaw&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quintessential&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yellowtail&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Redressed&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include 'includes/organ_donation_navbar.php'; ?>
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <div class="navbar-brand"></div>
        <h5 class="mb-0 h1 font-head"><i class="fas fa-user-plus mx-4"></i>RECEPIENT REGISTRATION FORM</h5>
        <div class="my-2 my-lg-0"></div>
    </nav>
    
    <div class="container-fluid mb-4">
        <form action="add_recepient.php" method="POST" enctype="multipart/form-data">
            <div class="row mt-4">
                <div class="col-md-6 mx-4">
                    <div class="card mx-4">
                        <div class="card-header bg-dark text-white"><i class="fas fa-address-card mr-3"></i>Personal details</div>
                        <div class="card-body personal-bg">
                            <div class="form-group">
                                <label for="recepient_name" class=" text-white">Full Name(As per Government issued ID Card)<span class="required">*</span></label>
                                <input type="name" class="form-control" id="recepient_name" name="recepient_name" placeholder="<First Name><Middle Name><Last Name>" required>
                            </div>
                            <div class="form-group">
                                <label for="recepient_DOB" class=" text-white">Date of Birth(As per Government issued ID)<span class="required">*</span></label>
                                <input type="date" class="form-control" id="recepient_DOB" name="recepient_DOB" required>
                            </div>
                            <div class="form-group">
                                <label for="recepient_parent" class=" text-white">Father's/Mother's Name<span class="required">*</span></label>
                                <input type="name" class="form-control" id="recepient_parent" name="recepient_parent" placeholder="<First Name><Middle Name><Last Name>" required>
                            </div>
                            <div class="form-group">
                                <label for="recepient_BG" class=" text-white">Blood Group<span class="required">*</span></label>
                                <select class="custom-select form-control" id="recepient_BG" name="recepient_BG" required>
                                    <option value="none" selected disabled hidden>--SELECT--</option>
                                    <option value="A RhD positive (A+)">A RhD positive (A+)</option>
                                    <option value="A RhD negative (A-)">A RhD negative (A-)</option>
                                    <option value="B RhD positive (B+)">B RhD positive (B+)</option>
                                    <option value="B RhD negative (B-)">B RhD negative (B-)</option>
                                    <option value="O RhD positive (O+)">O RhD positive (O+)</option>
                                    <option value="O RhD negative (O-)">O RhD negative (O-)</option>
                                    <option value="AB RhD positive (AB+)">AB RhD positive (AB+)</option>
                                    <option value="AB RhD negative (AB-)">AB RhD negative (AB-)</option>
                            </div>
                            <div class="row"><input type="text"  hidden></div>
                            <div class="form-group">
                                <label for="recepient_occupation" class=" text-white">Occupation<span class="required">*</span></label>
                                <select class="custom-select form-control" id="recepient_occupation" name="recepient_occupation" required>
                                    <option value="none" selected disabled hidden>--SELECT--</option>
                                    <option value="Student">Student</option>
                                    <option value="Business">Business</option>
                                    <option value="Professional">Professional</option>
                                    <option value="Self-Employed">Self-Employed</option>
                                    <option value="Government Employee">Government Employee</option>
                                    <option value="Armed Forces">Armed Forces</option>
                                    <option value="Retired">Retired</option>
                                    <option value="Homemaker">Homemaker</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="recepient_gender" class=" text-white">Gender<span class="required">*</span></label>
                                <select class="custom-select form-control" id="recepient_gender" name="recepient_gender" required>
                                    <option value="none" selected disabled hidden>--SELECT--</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row  mt-4">
                <div class="col-md-6 mx-4">
                    <div class="card mx-4">
                        <div class="card-header bg-dark text-white"><i class="fas fa-phone-alt mr-3"></i>Contact Details</div>
                        <div class="card-body contact-bg">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="recepient_phone" class=" text-white">Contact Number<span class="required">*</span></label>
                                        <input type="text" class="form-control" id="recepient_phone" name="recepient_phone" placeholder="10 Digit mobile Number" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="recepient_mail" class=" text-white">E-Mail ID<span class="required">*</span></label>
                                        <input type="email" class="form-control" id="recepient_mail" name="recepient_mail" placeholder="abc@example.com" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="recepient_address" class=" text-white">Current Resedential Address<span class="required">*</span></label>
                                <input type="text" class="form-control" id="recepient_address" name="recepient_address" placeholder="House Number/ Flat number, Society Name, Street Address, Landmark" required>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="recepient_city" class=" text-white">City<span class="required">*</span></label>
                                        <input type="text" class="form-control" id="recepient_city" name="recepient_city" placeholder="City" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="recepient_state" class=" text-white">State<span class="required">*</span></label>
                                        <input type="text" class="form-control" id="recepient_state" name="recepient_state" placeholder="State" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="recepient_district" class=" text-white">District<span class="required">*</span></label>
                                        <input type="text" class="form-control" id="recepient_district" name="recepient_district" placeholder="District" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="recepient_pincode" class=" text-white">Pincode<span class="required">*</span></label>
                                        <input type="text" class="form-control" id="recepient_pincode" name="recepient_pincode" placeholder="Pincode" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mr-4">
                        <div class="card-header bg-dark text-white"><i class="fas fa-clinic-medical mr-3"></i>Emergency Contact Information</div>
                        <div class="card-body emergency-bg">
                            <div class="form-group">
                                <label for="recepient_emer_name" class=" text-white">Emergency Contact Name<span class="required">*</span></label>
                                <input type="name" class="form-control" id="recepient_emer_name" name="recepient_emer_name" placeholder="<First Name><Middle Name><Last Name>" required>
                            </div>
                            <div class="form-group">
                                <label for="recepient_emer_phone" class=" text-white">Emergency Contact Number<span class="required">*</span></label>
                                <input type="text" class="form-control" id="recepient_emer_phone" name="recepient_emer_phone" placeholder="10 Digit mobile Number" required>
                            </div>
                            <div class="form-group">
                                <label for="recepient_emer_mail" class=" text-white">Emergency E-Mail ID<span class="required">*</span></label>
                                <input type="email" class="form-control" id="recepient_emer_mail" name="recepient_emer_mail" placeholder="abc@example.com" required>
                            </div>
                            <div class="form-group">
                                <label for="recepient_emer_address" class=" text-white">Emergency Contact Address<span class="required">*</span></label>
                                <input type="text" class="form-control" id="recepient_emer_address" name="recepient_emer_address" placeholder="House Number/ Flat number, Society Name, Street Address, Landmark," required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col mx-4">
                    <div class="card mx-4">
                        <div class="card-header bg-dark text-white"><i class="fa fa-regular fa-hand-holding-medical mr-3"></i>Medical information and ID Proof</div>
                        <div class="card-body medical-bg">
                            <div class="form-group">
                                <label for="medical_condition">Brief your Medical Condition<span class="required">*</span></label>
                                <textarea class="form-control" id="medical_condition" name="medical_condition" maxlength="255" rows="3" required>Write here...</textarea>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <div class="form-group">
                                        <label for="doctor_name">Referrer Doctor Name<span class="required">*</span></label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Dr. </div>
                                            </div>
                                            <input type="name" class="form-control" id="doctor_name" name="doctor_name" placeholder="<First Name><Middle Name><Last Name>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="prescription">Upload Your Prescription<span class="required">*</span></label>
                                        <input type="file" class="form-control-file" id="prescription" name="prescription" required>
                                        <small class="form-text text-danger">less than 5 MB (pdf format only)</small>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="mr-4"><b>Organs I need:</b><span class="required">*</span></label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="organAll" name="organAll" value="All Organs">
                                    <label class="form-check-label" for="organAll"><b>Select All</b></label>
                                    <?php
                                        $query = "SELECT * FROM living_organ";
                                        $result=mysqli_query($conn,$query);
                                        while($row=mysqli_fetch_assoc($result)){
                                            echo  
                                            '<input class="form-check-input organ-options ml-4" type="checkbox" name="organ[]" value="'.$row['organ_name'].'">
                                            <label class="form-check-label">'.$row['organ_name'].'</label>';
                                        }
                                        $query = "SELECT * FROM deceased_organ";
                                        $result=mysqli_query($conn,$query);
                                        while($row=mysqli_fetch_assoc($result)){
                                            echo  
                                            '<input class="form-check-input organ-options ml-4" type="checkbox" name="organ[]" value="'.$row['organ_name'].'">
                                            <label class="form-check-label">'.$row['organ_name'].'</label>';
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="mr-4"><b>Tissues I need:</b></label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="tissueAll" name="tissueAll" value="All Tissues">
                                    <label class="form-check-label" for="tissueAll"><b>Select All</b></label>
                                    <?php
                                        $query = "SELECT * FROM living_tissue";
                                        $result=mysqli_query($conn,$query);
                                        while($row=mysqli_fetch_assoc($result)){
                                            echo  
                                            '<input class="form-check-input tissue-options ml-4" type="checkbox" name="tissue[]" value="'.$row['tissue_name'].'">
                                            <label class="form-check-label">'.$row['tissue_name'].'</label>';
                                        }
                                        $query = "SELECT * FROM deceased_tissue";
                                        $result=mysqli_query($conn,$query);
                                        while($row=mysqli_fetch_assoc($result)){
                                            echo  
                                            '<input class="form-check-input tissue-options ml-4" type="checkbox" name="tissue[]" value="'.$row['tissue_name'].'">
                                            <label class="form-check-label">'.$row['tissue_name'].'</label>';
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="recepient_id">Enter Adhaar Card Number<span class="required">*</span></label>
                                        <input class="form-control" id="recepient_id" name="recepient_id" type="text" placeholder="XXXX XXXX XXXX" required minlength="12" maxlength="12">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="adhaar_file">Upload Adhaar Card<span class="required">*</span></label><br>
                                        <input type="file" name="adhaar_file" id="adhaar_file" required>
                                        <small class="form-text text-danger">less than 5 MB (pdf format only)</small>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="photo_file">Upload Passport Size Photograph<span class="required">*</span></label><br>
                                        <input type="file" name="photo_file" id="photo_file" required>
                                        <small class="form-text text-danger">4.5 cm X 3.5 cm, less than 2 MB (jpg,jpeg,png format)</small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-4">
                                <input type="checkbox" id="agree" name="agree" value="Agree" required>
                                <label for="agree"><b>I Declare thet I am a citizen of Indian Origin</b><span class="required">*</span></label><br>
                            </div>
                            <div class="row mt-4 mx-4">
                                <div class="col-md-12 text-center">
                                    <input type="submit" class="btn btn-primary" value="SUBMIT" id="declaration-btn" style="width:100%;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script type="text/javascript">
        var today = new Date();
        today.setDate(today.getDate() - 1)
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();
        
        if (dd < 10) {
           dd = '0' + dd;
        }
        
        if (mm < 10) {
           mm = '0' + mm;
        } 
            
        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById("recepient_DOB").setAttribute("max", today);
    </script>
    <?php
        if(isset($_SESSION['status']) && $_SESSION['status']!='')
        {
    ?>
            <script type="text/javascript">
                swal({
                    title: "<?php echo $_SESSION['status'];?>",
                    icon: "<?php echo $_SESSION['status_code'];?>",
                    text: "<?php echo $_SESSION['status_text'];?>",
                    button: "OK",
                });
            </script>
    <?php
        unset($_SESSION['status']);
        }
    ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#organAll').on("click",function(){
                $('.organ-options').prop('checked',this.checked);
            });
        });
        $(document).ready(function(){
            $('#tissueAll').on("click",function(){
                $('.tissue-options').prop('checked',this.checked);
            });
        });
    </script>
</body>
</html>