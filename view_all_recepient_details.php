<?php
require "db_config.php";
session_start();

$name = $_SESSION['admin_name'];
$recepient_reg_id=$_GET['recepient_reg_num'];

$reg_query = "SELECT * FROM recepient_reg
            WHERE Recepient_reg_num= '$recepient_reg_id'";
$result = mysqli_query($conn,$reg_query);
$reg_row = mysqli_fetch_assoc($result);

$imageURL = 'Recepient_Documents/passport_photo/'.$reg_row["photo"];
$cardURL = 'Recepient_Documents/adhaar_card/'.$reg_row["adhaar_card"];


$personal_query = "SELECT * FROM recepient_personal
                    WHERE Recepient_reg_num= '$recepient_reg_id'";
$result = mysqli_query($conn,$personal_query);
$personal_row = mysqli_fetch_assoc($result);

$contact_query = "SELECT * FROM recepient_contact
                    WHERE Recepient_reg_num= '$recepient_reg_id'";
$result = mysqli_query($conn,$contact_query);
$contact_row = mysqli_fetch_assoc($result);

$emergency_query = "SELECT * FROM recepient_emergency
                    WHERE Recepient_reg_num= '$recepient_reg_id'";
$result = mysqli_query($conn,$emergency_query);
$emergency_row = mysqli_fetch_assoc($result);

$medical_query = "SELECT * FROM recepient_medical_info
                    WHERE Recepient_reg_num= '$recepient_reg_id'";
$result = mysqli_query($conn,$medical_query);
$medical_row = mysqli_fetch_assoc($result);
$prescription = 'Recepient_Documents/Prescription/'.$medical_row["prescription"];


$from = new DateTime($personal_row['recepient_DOB']);
$to   = new DateTime('today');
$age = $from->diff($to)->y;
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Page | Miscellaneous</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="css/view_all_recepient_details.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link href="https://fonts.googleapis.com/css2?family=Passions+Conflict&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Kings&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital@1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>

</head>
<body>
    <?php include 'includes/admin_navbar.php'?>

    <div class="container-fluid">
        <div class="card">
            <div class="col-md-12">
                <div class="card-header heading bg-dark text-white text-center">RECEPIENT DETAILS</div>
                <div class="card-header bg-warning text-white sub-heading">Peronal and Identity Details:- </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 image-col">
                        <img src="<?php echo $imageURL; ?>" class="recepient_dp">
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-5 text-left data">
                                <b>Registration Date: </b><?php echo date("d-m-Y",strtotime($reg_row['date_of_reg']));?>
                            </div>
                            <div class="col-md-7 text-right  data">
                                <b>Recepient Registration Number: </b><?php echo $recepient_reg_id; ?>
                            </div>
                        </div>
                        <div class="row data">
                            <div class="col-md-12">
                                <b>Name of Recepient:  </b><?php echo $reg_row['recepient_name'];?>
                            </div>
                        </div>
                        <div class="row data">
                            <div class="col-md-6">
                                <b>Adhaar Card Number:  </b><?php echo $reg_row['adhaar_no'];?>
                            </div>
                            <div class="col-md-6 text-right">
                                <b>View Adhaar Card:  </b><a href="<?php echo $cardURL; ?>"  target="_blank">View Adhaar Card</a>
                            </div>
                        </div>
                        <div class="row mt-4 mb-4 data">
                            <div class="col-md-12">
                                <b>Date Of Birth:  </b><?php echo date("d-m-Y", strtotime($personal_row['recepient_DOB'] ));?>
                            </div>
                            <div class="col-md-12">
                                <b>Age:  </b><?php echo $age;?> Years   
                            </div>
                            <div class="col-md-12">
                                <b>Blood Group:  </b><?php echo $personal_row['recepient_BG'] ;?>
                            </div>
                            <div class="col-md-12">
                                <b>Gender:  </b><?php echo $personal_row['recepient_gender'] ;?>
                            </div>
                            <div class="col-md-12">
                                <b>Father's/Mother's Name:  </b><?php echo $personal_row['recepient_guardian'];?>
                            </div>
                            <div class="col-md-12">
                                <b>Occupation:  </b><?php echo $personal_row['recepient_occupation'] ;?>
                            </div>
                        </div>
                    </div>
                
            </div>
            <div class="row">
                <div class="col-md-12 card-2">
                    <div class="col-6">
                        <div class="card-header bg-warning text-white sub-heading">Contact Details:- </div>
                        <div class="card-body">
                            <div class="row mt-4 data">
                                <div class="col-md-12 text-left">
                                    <b>Contact Number:  </b><?php echo $contact_row['contact_num'];?>
                                </div>
                                <div class="col-md-12 text-left">
                                    <b>E-Mail ID:  </b><?php echo $contact_row['email'] ;?>
                                </div>
                            
                                <div class="col-md-12 text-left">
                                    <b>Current Resedential Address:  </b><?php echo $contact_row['address'];?>
                                </div>
                                
                                        <div class="col-md-5 text-left">
                                            <b>City:  </b><?php echo $contact_row['city'];?>
                                        </div>
                                        <div class="col-md-7 text-left">
                                            <b>District:  </b><?php echo $contact_row['district'];?>
                                        </div>
                                
                                <div class="col-md-6 text-left">
                                    <b>State:  </b><?php echo $contact_row['state'] ;?>
                                </div>
                                
                                <div class="col-md-6 text-left">
                                    <b>Pincode:  </b><?php echo $contact_row['pincode'] ;?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card-header bg-warning text-white sub-heading">Emergency Contact Details:- </div>
                        <div class="card-body">
                            <div class="row mt-4 data">
                                <div class="col-md-12 text-left">
                                    <b>Emergency Contact Name:  </b><?php echo $emergency_row['name'] ;?>
                                </div>
                                
                                <div class="col-md-12 text-left">
                                    <b>Emergency Contact Number:  </b><?php echo $emergency_row['contact_num'] ;?>
                                </div>
                            </div>
                            <div class="row mt-4 data">
                                <div class="col-md-12 text-left">
                                    <b>Emergency Contact Address:  </b><?php echo $emergency_row['address'] ;?>
                                </div>
                                
                                <div class="col-md-12 text-left">
                                    <b>Emergency Contact E-Mail ID:  </b><?php echo $emergency_row['email'] ;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mx-2">
                <div class="col-md-12">
                    <div class="card-header bg-warning text-white sub-heading" style="width:100%;">Medical Information:- </div>
                </div>
                <div class="card-body">
                    <div class="row data">
                        <div class="col-md-12">
                            <b>Medical Condition:  </b><?php echo $medical_row['medical_condition'];?>
                        </div>
                        <div class="col-md-12">
                            <b>Organs needed:  </b><?php echo $medical_row['recepient_organs'];?>
                        </div>
                        <div class="col-md-12">
                            <b>Tissues needed:  </b><?php echo $medical_row['recepient_tissues'];?>
                        </div>
                        <div class="col-md-12">
                            <?php
                                if($reg_row['donation_status']==''){
                                    echo '<b>Donation Status:  </b>Not yet received';
                                }else{
                                    echo '<b>Donation Status:  </b>'.$reg_row['donation_status'].'
                                            <a href="view_donation_details.php" >(Click Here to Check Donation Details)</a>';
                                }
                            ?>
                        </div>
                        <div class="col-md-12">
                            <b>Doctor Referred:  </b><?php echo $medical_row['referrer'];?>
                        </div>
                        <div class="col-md-12">
                            <b>View Prescription:  </b><a href="<?php echo $prescription; ?>"  target="_blank">View Prescription</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4 text-center">
                <div class="col-md-12 text-center">
                    <a class="btn btn-info back-btn" href="view_registered_recepients.php">GO BACK TO MAIN PAGE</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/dataTables.bootstrap4.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
</body>
</html>