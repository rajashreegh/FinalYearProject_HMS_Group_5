<?php
require "db_config.php";
session_start();

$name = $_SESSION['admin_name'];
$donor_reg_id=$_GET['donor_reg_num'];
$donation_type = $_GET['donation_type'];
if($donation_type == 'Living'){
    $reg_table_name = 'living_donor_reg';
    $heading = "LIVING";
}else{
    $reg_table_name = 'deceased_donor_reg';
    $heading = "DECEASED";
}
$reg_query = "SELECT * FROM $reg_table_name
            WHERE Donor_Registration_Num = '$donor_reg_id'";
$result = mysqli_query($conn,$reg_query);
$reg_row = mysqli_fetch_assoc($result);

$imageURL = 'Donor_Documents/passport_photo/'.$reg_row["photo"];
$cardURL = 'Donor_Documents/adhaar_card/'.$reg_row["adhaar_card"];
$donorCard = 'Donor_Documents/donor_card/'.$reg_row["donor_card"];

$personal_query = "SELECT * FROM donor_personal
                    WHERE Donor_Registration_Num = '$donor_reg_id'";
$result = mysqli_query($conn,$personal_query);
$personal_row = mysqli_fetch_assoc($result);

$contact_query = "SELECT * FROM donor_contact
                    WHERE Donor_Registration_Num = '$donor_reg_id'";
$result = mysqli_query($conn,$contact_query);
$contact_row = mysqli_fetch_assoc($result);

$emergency_query = "SELECT * FROM donor_emergency
                    WHERE Donor_Registration_Num = '$donor_reg_id'";
$result = mysqli_query($conn,$emergency_query);
$emergency_row = mysqli_fetch_assoc($result);

$declaration_query = "SELECT * FROM donor_declaration
                    WHERE Donor_Registration_Num = '$donor_reg_id'";
$result = mysqli_query($conn,$declaration_query);
$declaration_row = mysqli_fetch_assoc($result);

$from = new DateTime($personal_row['Donor_DOB']);
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
    <link rel="stylesheet" type="text/css" href="css/view_all_donor_details.css">

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
                <div class="card-header heading bg-dark text-white text-center"><?php echo $heading?> DONOR DETAILS</div>
                <div class="card-header bg-warning text-white sub-heading">Peronal and Identity Details:- </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 image-col">
                        <img src="<?php echo $imageURL; ?>" class="donor_dp">
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-5 text-left data">
                                <b>Registration Date: </b><?php echo date("d-m-Y",strtotime($reg_row['date_of_reg']));?>
                            </div>
                            <div class="col-md-7 text-right  data">
                                <b>Donor Registration Number: </b><?php echo $donor_reg_id; ?>
                            </div>
                        </div>
                        <div class="row data">
                            <div class="col-md-6">
                                <b>Name of Donor:  </b><?php echo $reg_row['donor_name'];?>
                            </div>
                            <div class="col-md-6 text-right">
                                <b>Type of Donor:  </b><?php echo $donation_type;?>
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
                                <b>Date Of Birth:  </b><?php echo date("d-m-Y", strtotime($personal_row['Donor_DOB'] ));?>
                            </div>
                            <div class="col-md-12">
                                <b>Age:  </b><?php echo $age;?> Years   
                            </div>
                            <div class="col-md-12">
                                <b>Blood Group:  </b><?php echo $personal_row['Donor_BG'] ;?>
                            </div>
                            <div class="col-md-12">
                                <b>Gender:  </b><?php echo $personal_row['Donor_Gender'] ;?>
                            </div>
                            <div class="col-md-12">
                                <b>Father's/Mother's Name:  </b><?php echo $personal_row['Donor_guardian'];?>
                            </div>
                            <div class="col-md-12">
                                <b>Occupation:  </b><?php echo $personal_row['Donor_occupation'] ;?>
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
                    <div class="card-header bg-warning text-white sub-heading" style="width:100%;">Donation Details:- </div>
                </div>
                <div class="card-body">
                    <div class="row data">
                        <div class="col-md-12">
                            <b>Organs:  </b><?php echo $declaration_row['organs'];?>
                        </div>
                        <div class="col-md-12">
                            <b>Tissues:  </b><?php echo $declaration_row['tissues'];?>
                        </div>
                        <div class="col-md-12">
                            <b>Donor Card:  </b><a href="<?php echo $donorCard; ?>"  target="_blank">View Donor Card</a>
                        </div>
                        <div class="col-md-12">
                            <?php
                                if($reg_row['donation_status']==''){
                                    echo '<b>Donation Status:  </b>Not yet donated';
                                }else{
                                    echo '<b>Donation Status:  </b>'.$reg_row['donation_status'].'
                                            <a href="view_donation_details.php" >(Click Here to Check Donation Details)</a>';
                                }
                            ?>
                        </div>
                        <div class="col-md-12">
                            <b>Diseases:  </b><?php echo $declaration_row['diseases']; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4 text-center">
                <div class="col-md-12 text-center">
                    <a class="btn btn-info back-btn" href="view_registered_donors.php">GO BACK TO MAIN PAGE</a>
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