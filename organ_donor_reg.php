<?php
require "db_config.php";
$donation_type=$_GET['donation_type'];
session_start();

if($donation_type=='Living'){
    $organ_table_name = 'living_organ';
    $tissue_table_name = 'living_tissue';
}
else{
    $organ_table_name = 'deceased_organ';
    $tissue_table_name = 'deceased_tissue';
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $donation_type;?> Oragn Donor Form</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/living_organ_donor.css">

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
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@200&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>

</head>
<body>
    <?php include 'includes/organ_donation_navbar.php'; ?>
    <div class="container-xl px-4 mt-4">
        <div class="mt-2 mb-2 text-center heading">

            <?php echo $donation_type;?> Donor Registration Form
        </div>
        <div class="row h-100 mt-4  text-center">
            <div class="col">
                <div class="card card-body border-success tab active" id="read_tab" onclick="showRead()"><i class="fas fa-info-circle mb-2" id="read-icon"></i><b><u>STEP 1:</u><br> Read the Instructions</b></div>
            </div>
            <div class="col">
                <div class="card card-body border-success tab" id="personal_tab" onclick="showPersonal()"><i class="fas fa-info-circle mb-2" id="personal-icon"></i><b><u>STEP 2:</u><br> Personal Information</b></div>
            </div>
            <div class="col">
                <div class="card card-body border-success tab" id="contact_tab" onclick="showContact()"><i class="fas fa-info-circle mb-2" id="contact-icon"></i><b><u>STEP 3:</u><br> Contact Details</b></div>
            </div>
            <div class="col">
                <div class="card card-body border-success tab" id="emergency_tab" onclick="showEmergency()"><i class="fas fa-info-circle mb-2" id="emergency-icon"></i><b><u>STEP 4:</u><br> Emergency Contact</b></div>
            </div>
            <div class="col">
                <div class="card card-body border-success tab" id="declaration_tab" onclick="showDeclaration()"><i class="fas fa-info-circle mb-2" id="read-icon"></i><b><u>STEP 5:</u><br> Declaration</b></div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <div class="line"></div>
            </div>
        </div>
        <div class="row mt-3" id="read_section">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">Read the Instructions Carefully</div>
                    <div class="card-body">
                        <div class="row mx-4">
                            <div class="col-md-12 text-center">
                                <div class="row mt-4">
                                    <div class="col">
                                        <div class="card instruction-card">
                                            <div class="card-header">INSTRUCTION: 1</div>
                                            <div class="card-body">
                                                All fields are <b>mandatory</b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card instruction-card">
                                            <div class="card-header">INSTRUCTION: 2</div>
                                            <div class="card-body">
                                                <b>Incorrect Identity details</b> will lead to <b>rejection</b> of your application
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card instruction-card">
                                            <div class="card-header">INSTRUCTION: 3</div>
                                            <div class="card-body">
                                                Please upload your <b>Adhaar Card in PDF (.pdf) Format</b> only. Size should not exceed <b>5 MB</b>.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4 mb-4">
                                    <div class="col">
                                        <div class="card instruction-card">
                                            <div class="card-header">INSTRUCTION: 4</div>
                                            <div class="card-body">
                                                Please upload your <b>Passport Size Photo in JPEG/PNG (.jpg,.jpej,.png) Format</b> only. Size should not exceed <b>2 MB</b>.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card instruction-card">
                                            <div class="card-header">INSTRUCTION: 5</div>
                                            <div class="card-body">
                                                You have to select <b>atleast 1 organ or atleast 1 tissue</b> for donation.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card instruction-card">
                                            <div class="card-header">INSTRUCTION: 6</div>
                                            <div class="card-body">
                                                After submission of your form, you will <b>receive updates within 7 Working days</b>. If you change your mind after registration <b>you can unpledge your donation from our website</b>.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <button type="button" class="btn btn-primary" id="read-btn" style="width:100%;" onclick="showPersonal()">PROCEED</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form action="living_donor_reg.php" method="POST" enctype="multipart/form-data">
        <div class="row mt-3 sections" id="personal_section">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">Personal Information</div>
                    <div class="card-body form-bg">
                            <div class="row mt-2 mx-4">
                                <div class="col-md-12">
                                    <label for="donor_name"><b>Full Name (As it appears on Government issued ID Card)</b><span class="required">*</span></label>
                                    <input class="form-control personal-sec" id="donor_name" name="donor_name" type="text" placeholder="<First_Name> <Middle_Name> <Last_name>" required>
                                </div>
                            </div>
                            <div class="row mt-4 mx-4">
                                <div class="col-md-6">
                                    <label for="donor_DOB"><b>Date Of Birth (As it appears on Government issued ID Card)</b><span class="required">*</span></label>
                                    <input class="form-control personal-sec" id="donor_DOB" name="donor_DOB" type="date"  required>
                                </div>
                                <div class="col-md-6">
                                    <label for="donor_parent_name"><b>Father's Name/ Mother's Name</b><span class="required">*</span></label>
                                    <input class="form-control personal-sec" id="donor_parent_name" name="donor_parent_name" type="text" placeholder="<First_Name> <Middle_Name> <Last_name>"  required>
                                </div>
                                
                            </div>
                            <div class="row mt-4 mx-4">
                                <div class="col-md-4">
                                    <label for="donorBloodGroup"><b>Blood Group</b><span class="required">*</span></label><br>
                                    <select id="donorBloodGroup" name="bloodgroup" class="personal-sec"  required>
                                    <option value="none" selected disabled hidden>--SELECT--</option>
                                    <option value="A RhD positive (A+))">A RhD positive (A+)</option>
                                    <option value="A RhD negative (A-)">A RhD negative (A-)</option>
                                    <option value="B RhD positive (B+)">B RhD positive (B+)</option>
                                    <option value="B RhD negative (B-)">B RhD negative (B-)</option>
                                    <option value="O RhD positive (O+)">O RhD positive (O+)</option>
                                    <option value="O RhD negative (O-)">O RhD negative (O-)</option>
                                    <option value="AB RhD positive (AB+)">AB RhD positive (AB+)</option>
                                    <option value="AB RhD negative (AB-)">AB RhD negative (AB-)</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-4">
                                    <label for="donorOccupation"><b>Occupation</b><span class="required">*</span></label><br>
                                    <select id="donorOccupation" name="occupation" class="personal-sec" required>
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
                                <div class="col-md-4">
                                    <label for="donorGender"><b>Gender</b><span style="color:red;">*</span></label><br>
                                    <select id="donorGender" name="gender" class="personal-sec" required>
                                    <option value="none" selected disabled hidden>--SELECT--</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="col-md-4"><input type="text" name="donation_type" value="<?php echo $donation_type; ?>" hidden></div>
                            </div>
                            <div class="row mt-4 mx-4">
                                <div class="col-md-12 text-center">
                                        <button type="button" class="btn btn-primary" id="personal-btn" style="width:100%;" onclick="showContact()" disabled>Save and Next</button>
                                </div>
                            </div>
                       
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3 sections" id="contact_section">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">Contact Information</div>
                    <div class="card-body form-bg">
                        
                            <div class="row mt-2 mx-4">
                                <div class="col-md-6">
                                    <label for="donor_phone"><b>Contact Number</b><span class="required">*</span></label>
                                    <input class="form-control contact-sec" id="donor_phone" name="donor_phone" type="text" placeholder="10 Digit mobile Number" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="donor_mail"><b>E-MAIL ID</b><span class="required">*</span></label>
                                    <input class="form-control contact-sec" id="donor_mail" type="email" name="donor_mail" placeholder="abc@example.com" required>
                                </div>
                            </div>
                            <div class="row mt-4 mx-4">
                                <div class="col-md-12">
                                    <label for="donor_address"><b>Current Resedential Address</b><span class="required">*</span></label>
                                    <input class="form-control contact-sec" id="donor_address"  name="donor_address" type="text" placeholder="House Numbe/ Flat number, Society Name, Street Address, Landmark," required>
                                </div>
                            </div>
                            <div class="row mt-4 mx-4">
                                <div class="col-md-6">
                                    <label for="donor_city"><b>City</b><span class="required">*</span></label>
                                    <input class="form-control contact-sec" id="donor_city" name="donor_city" type="text" placeholder="City" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="donor_district"><b>District</b><span class="required">*</span></label>
                                    <input class="form-control contact-sec" id="donor_district" name="donor_district" type="text" placeholder="District" required>
                                </div>
                            </div>
                            <div class="row mt-4 mx-4">
                                <div class="col-md-6">
                                    <label for="donor_state"><b>State</b><span class="required">*</span></label>
                                    <input class="form-control contact-sec" id="donor_state" name="donor_state" type="text" placeholder="State" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="donor_pincode"><b>PINCODE</b><span class="required">*</span></label>
                                    <input class="form-control contact-sec" id="donor_pincode" name="donor_pincode" type="text" placeholder="PINCODE" required>
                                </div>
                            </div>
                            <div class="row mt-4 mx-4">
                                <div class="col-md-12 text-center">
                                        <button type="button" class="btn btn-primary" id="contact-btn" style="width:100%;" onclick="showEmergency()" disabled>Save and Next</button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3 sections" id="emergency_section">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">Emergency Contact details</div>
                    <div class="card-body emergency-bg form-bg">
                            <div class="row mt-4 mx-4">
                                <div class="col-md-12">
                                    <label for="donor_emergency_name"><b>Emergency Name</b><span class="required">*</span></label>
                                    <input class="form-control emergency-sec" id="donor_emergency_name" name="donor_emergency_name" type="text" placeholder="<First_Name> <Middle_Name> <Last_name>" required>
                                </div>
                            </div>
                            <div class="row mt-4 mx-4">
                                <div class="col-md-6">
                                    <label for="donor_emergency_phone"><b>Emergency Contact Number</b><span class="required">*</span></label>
                                    <input class="form-control emergency-sec" id="donor_emergency_phone" name="donor_emergency_phone" type="text" placeholder="10 Digit mobile Number" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="donor_emergency_mail"><b>Emergency E-MAIL ID</b><span class="required">*</span></label>
                                    <input class="form-control emergency-sec" id="donor_emergency_mail" name="donor_emergency_mail" type="email" placeholder="abc@example.com" required>
                                </div>
                            </div>
                            <div class="row mt-4 mx-4">
                                <div class="col-md-12">
                                    <label for="donor_emergency_address"><b>Emergency Contact Address</b><span class="required">*</span></label>
                                    <input class="form-control emergency-sec" id="donor_emergency_address" name="donor_emergency_address" type="text" placeholder="House Numbe/ Flat number, Society Name, Street Address, Landmark," required>
                                </div>
                            </div>
                            <div class="row mt-4 mx-4">
                                <div class="col-md-12 text-center">
                                    <button type="button" class="btn btn-primary" id="emergency-btn" style="width:100%;" onclick="showDeclaration()" disabled>Save and Next</button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3 sections" id="declaration_section">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">Declaration Form</div>
                    <div class="card-body form-bg">
                            <div class="row mt-4 mx-4">
                                <div class="col">
                                    <label><b>Organs I wish to donate</b><span class="required">*</span></label><br>
                                    <input type="checkbox" id="organAll" name="organAll" value="All Organs">
                                    <label for="organAll"> <b>Select All</b></label><br>
                                    <?php
                                        $query = "SELECT * FROM $organ_table_name";
                                        $result=mysqli_query($conn,$query);
                                        while($row=mysqli_fetch_assoc($result)){

                                            echo  
                                            '<input type="checkbox" name="organ[]" class="organ-options" value="'.$row['organ_name'].'">
                                            <label>'.$row['organ_name'].'</label><br>';
                                        }
                                    ?>
                                </div>

                                <div class="col">
                                    <label><b>Tissues I wish to donate</b><span class="required">*</span></label><br>
                                    <input type="checkbox" id="tissueAll" name="tissueAll" value="All Tissues">
                                    <label for="tissueAll"> <b>Select All</b></label><br>
                                    <?php
                                        $query = "SELECT * FROM $tissue_table_name";
                                        $result=mysqli_query($conn,$query);
                                        while($row=mysqli_fetch_assoc($result)){

                                            echo  
                                            '<input type="checkbox" name="tissue[]" class="tissue-options" value="'.$row['tissue_name'].'">
                                            <label>'.$row['tissue_name'].'</label><br>';
                                        }
                                    ?>
                                </div>
                                <div class="col">
                                    <label><b>Any Diseases you have among these</b><span class="required">*</span></label><br>
                                    <input type="checkbox" id="diseaseNone" name="disease[]" value="None">
                                    <label><b>None</b></label><br>
                                    <input type="checkbox" id="diseaseAll" name="diseaseAll" value="All Diseases">
                                    <label> <b>Select All</b></label><br>
                                    <input type="checkbox" name="disease[]" class="disease-options" value="Alzheimer disease and dementia">
                                    <label class="form-check-label"> Alzheimer disease and dementia</label><br>
                                    <input type="checkbox" name="disease[]" class="disease-options" value="Asthma">
                                    <label class="form-check-label"> Asthma</label><br>
                                    <input type="checkbox" name="disease[]" class="disease-options" value="Arthritis">
                                    <label class="form-check-label"> Arthritis</label><br>
                                    <input type="checkbox" name="disease[]" class="disease-options" value="Cancer">
                                    <label class="form-check-label"> Cancer</label><br>
                                    <input type="checkbox" name="disease[]" class="disease-options" value="Diabetes">
                                    <label class="form-check-label"> Diabetes</label><br>
                                    <input type="checkbox" name="disease[]" class="disease-options" value="Heart disease">
                                    <label class="form-check-label"> Heart disease</label><br>
                                    <input type="checkbox" name="disease[]" class="disease-options" value="HIV/AIDS">
                                    <label class="form-check-label"> HIV/AIDS</label><br>
                                    <input type="checkbox" name="disease[]" class="disease-options" value="Epilepsy">
                                    <label class="form-check-label"> Epilepsy</label><br>
                                </div>
                                
                            </div>
                            <div class="row mt-4 mx-4">
                                <div class="col-md-4">
                                    <label for="donor_id"><b>Enter Adhaar Card Number</b><span class="required">*</span></label>
                                    <input class="form-control" id="donor_id" name="donor_id" type="text" placeholder="XXXX XXXX XXXX" required minlength="12" maxlength="12">
                                </div>
                                <div class="col-md-4">
                                    <label for="adhaar_file"><b>Upload Adhaar Card</b><span class="required">*</span></label><br>
                                    <input type="file" name="adhaar_file" id="adhaar_file" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="photo_file"><b>Upload Passport Size Photograph</b><span class="required">*</span></label><br>
                                    <input type="file" name="photo_file" id="photo_file" required>
                                </div>
                            </div>
                            <br><br>
                            <div class="row mt-4 mx-4">
                                <div class="col-md-12">
                                    <input type="checkbox" id="agree" name="agree" value="Agree" required>
                                    <label for="agree"><b>I Declare thet I am a citizen of India and above 18 years of age</b></label><br>
                                </div>
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
        document.getElementById("donor_DOB").setAttribute("max", today);
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
    
    <script type="text/javascript" src="js/living_donor_class_toggle.js"></script>
    
</body>
</html>