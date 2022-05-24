<?php

session_start();

$name = $_SESSION['admin_name'];

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
    <link rel="stylesheet" type="text/css" href="css/view_registered_donor.css">

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
    <div class="row w-100 mb-4 mt-4">
        <div class="col text-right">
            <a href="organ_donation_management.php"><i class="fa fa-angle-double-left mr-2"></i>Go Back to Organ Donation Dashboard</a>
        </div>
    </div>
    <div style="margin:15px;">
            <table id="myTable1" class="table table-dark table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th colspan="7" class="bg-info text-white">LIVING DONOR DETAILS</th>
                    </tr>
                    <tr>
                        <th scope="col">S.NO</th>
                        <th scope="col">DONOR PHOTO</th>
                        <th scope="col">DONOR REGISTRATION NUMBER</th>
                        <th scope="col">DONOR NAME</th>
                        <th scope="col">ADHAAR CARD NUMBER</th>
                        <th scope="col">VIEW ADHAAR CARD</th>
                        <th scope="col">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $s_no=1;
                        require "db_config.php";
                        $query = "SELECT * FROM living_donor_reg WHERE status='Approved'";
                        $result=mysqli_query($conn,$query);
                        while($row=mysqli_fetch_assoc($result)){
                            $imageURL = 'Donor_Documents/passport_photo/'.$row["photo"];
                            $cardURL = 'Donor_Documents/adhaar_card/'.$row["adhaar_card"];
                            echo '<tr>
                                    <td>'.$s_no.'</td>
                                    <td scope="row"><img src="'.$imageURL.'" class="donor-dp"></td>
                                    <td>'.$row['Donor_Registration_Num'].'</td>
                                    <td>'.$row['donor_name'].'</td>
                                    <td>'.$row['adhaar_no'].'</td>
                                    <td><a href="'.$cardURL.'"  target="_blank">View Adhaar Card</a></td>
                                    <td>
                                        <a href="view_all_donor_details.php?donor_reg_num='.$row['Donor_Registration_Num'].'&donation_type=Living" data-toggle="tooltip" data-placement="bottom" title="VIEW ALL DETAILS"><i class="fas fa-eye icon-size mr-4"></i></a>
                                        <a class="addbtn" data-toggle="tooltip" data-placement="bottom" title="ADD DONATION DETAILS"><i class="fas fa-plus icon-size"></i></a>
                                    </td>
                                    </tr>';
                            $s_no++;
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <div style="margin:15px;">
            <table id="myTable2" class="table table-dark table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th colspan="7" class="bg-info text-white">DECEASED DONOR DETAILS</th>
                    </tr>
                    <tr>
                        <th scope="col">S.NO</th>
                        <th scope="col">DONOR PHOTO</th>
                        <th scope="col">DONOR REGISTRATION NUMBER</th>
                        <th scope="col">DONOR NAME</th>
                        <th scope="col">ADHAAR CARD NUMBER</th>
                        <th scope="col">VIEW ADHAAR CARD</th>
                        <th scope="col">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $s_no=1;
                        require "db_config.php";
                        $query = "SELECT * FROM deceased_donor_reg WHERE status='Approved'";
                        $result=mysqli_query($conn,$query);
                        while($row=mysqli_fetch_assoc($result)){
                            $imageURL = 'Donor_Documents/passport_photo/'.$row["photo"];
                            $cardURL = 'Donor_Documents/adhaar_card/'.$row["adhaar_card"];
                            echo '<tr>
                                    <td>'.$s_no.'</td>
                                    <td><img src="'.$imageURL.'" class="donor-dp"></td>
                                    <td>'.$row['Donor_Registration_Num'].'</td>
                                    <td>'.$row['donor_name'].'</td>
                                    <td>'.$row['adhaar_no'].'</td>
                                    <td><a href="'.$cardURL.'">View Adhaar Card</a></td>
                                    <td>
                                        <a href="view_all_donor_details.php?donor_reg_num='.$row['Donor_Registration_Num'].'&donation_type=Deceased" data-toggle="tooltip" data-placement="bottom" title="VIEW ALL DETAILS"><i class="fas fa-eye icon-size mr-4"></i></a>
                                        <a class="addbtn" data-toggle="tooltip" data-placement="bottom" title="ADD DONATION DETAILS"><i class="fas fa-plus icon-size"></i></a>
                                    </td>
                                    </tr>';
                            $s_no++;
                        }
                    ?>
                </tbody>
            </table>
        </div>
        
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="addDonationModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-blue">
                    <h5 class="modal-title text-white">ADD DONATION DETAILS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action = "add_donation_details.php" method = "POST">
                <div class="modal-body add-donation">
                    <input type = "hidden" name="add_id" id="add_id">
                    <div class="form-group">
                        <label for="recepient_reg_id"><b>Recepient Registration Number</b><span class="required">*</span></label>
                            <select class="custom-select form-control" id="recepient_reg_id" name="recepient_reg_id" required>
                                <option value="none" selected disabled hidden>--SELECT--</option>
                                <?php
                                    $query = "SELECT * FROM recepient_reg";
                                    $result=mysqli_query($conn,$query);
                                    while($row=mysqli_fetch_assoc($result)){
                                        echo '<option value="'.$row['Recepient_reg_num'].'">'.$row['Recepient_reg_num'].'</option>';
                                    }
                                ?>
                            </select>
                    </div>
                    
                                <div class="form-group">
                                    <label for="recepient_reg_name"><b>Recepient Name</b><span class="required">*</span></label>
                                    <!-- <select class="custom-select form-control" id="recepient_reg_name" name="recepient_reg_name" required>
                                            <option value="none" selected disabled hidden>--SELECT--</option>
                                            <?php
                                                $query = "SELECT * FROM recepient_reg";
                                                $result=mysqli_query($conn,$query);
                                                while($row=mysqli_fetch_assoc($result)){
                                                    echo '<option value="'.$row['recepient_name'].'">'.$row['recepient_name'].'</option>';
                                                }
                                            ?>
                                        </select> -->
                                        <input type="name" class="form-control" id="recepient_reg_name" name="recepient_reg_name" readonly>
                                </div>
                    <div class="row">
                        <div class="col-md-12 two-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="organs_donated" class="mr-4"><b>Organs Donated</b><span class="required">*</span></label><br>
                                        <input class="form-check-input ml-2 mr-2" type="checkbox" id="organNone" name="organ[]" value="None">
                                        <label class="form-check-label ml-4" for="organNone"><b>None</b></label><br>
                                            <?php
                                                $query = "SELECT * FROM living_organ";
                                                $result=mysqli_query($conn,$query);
                                                while($row=mysqli_fetch_assoc($result)){
                                                    echo  
                                                    '<input class="form-check-input organ-options ml-2 mr-2" type="checkbox" name="organ[]" value="'.$row['organ_name'].'">
                                                    <label class="form-check-label ml-4">'.$row['organ_name'].'</label><br>';
                                                }
                                                $query = "SELECT * FROM deceased_organ";
                                                $result=mysqli_query($conn,$query);
                                                while($row=mysqli_fetch_assoc($result)){
                                                    echo  
                                                    '<input class="form-check-input organ-options ml-2 mr-2" type="checkbox" name="organ[]" value="'.$row['organ_name'].'">
                                                    <label class="form-check-label ml-4">'.$row['organ_name'].'</label><br>';
                                                }
                                            ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="mr-4"><b>Tissues Donated</b><span class="required">*</span></label><br>
                                        <input class="form-check-input ml-2 mr-2" type="checkbox" id="tissueNone" name="tissue[]" value="None">
                                            <label class="form-check-label ml-4" for="tissueNone"><b>None</b></label><br>
                                            <?php
                                                $query = "SELECT * FROM living_tissue";
                                                $result=mysqli_query($conn,$query);
                                                while($row=mysqli_fetch_assoc($result)){
                                                    echo  
                                                        '<input class="form-check-input tissue-options ml-2 mr-2" type="checkbox" name="tissue[]" value="'.$row['tissue_name'].'">
                                                        <label class="form-check-label ml-4">'.$row['tissue_name'].'</label><br>';
                                                }
                                                $query = "SELECT * FROM deceased_tissue";
                                                $result=mysqli_query($conn,$query);
                                                while($row=mysqli_fetch_assoc($result)){
                                                    echo  
                                                        '<input class="form-check-input tissue-options ml-2 mr-2" type="checkbox" name="tissue[]" value="'.$row['tissue_name'].'">
                                                        <label class="form-check-label ml-4">'.$row['tissue_name'].'</label><br>';
                                                }
                                            ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="donation_type"><b>Donation Type</b><span class="required">*</span></label>
                        <select class="custom-select form-control" id="donation_type" name="donation_type" required>
                            <option value="none" selected disabled hidden>--SELECT--</option>
                            <option value="Living">Living</option>
                            <option value="Deceased">Deceased</option>
                        </select>                            
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="doctor_name"><b>Referrer Doctor Name</b><span class="required">*</span></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Dr. </div>
                                        </div>
                                        <input type="name" class="form-control" id="doctor_name" name="doctor_name" placeholder="<First Name><Middle Name><Last Name>" required>
                                    </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="hospital_name"><b>Hospital Name</b><span class="required">*</span></label>
                                    <input type="name" class="form-control" id="hospital_name" name="hospital_name" placeholder="Hospital Name" required>
                                    
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="hospital_address"><b>Hospital Address</b><span class="required">*</span></label>
                        <input type="text" class="form-control" id="hospital_address" name="hospital_address" placeholder="Street Address, Landmark, City, District, State, Pincode" required>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i>ADD DETAILS</button>
                </div>
                </form>
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
        
        <script>
            $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
            });
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
                $("#myTable1").DataTable({
                    language: {
                        searchPlaceholder: "Search by ID, Name, Mail, Department..."
                    }
                });
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function(){
                $("#myTable2").DataTable({
                    language: {
                        searchPlaceholder: "Search by ID, Name, Mail, Department..."
                    }
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.addbtn').on('click',function(){
                    $('#addDonationModal').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function(){
                        return $(this).text();
                    }).get();

                    console.log(data[2]);

                    $('#add_id').val(data[2]);
                })
            });
        </script>
    <script type="text/javascript">
        $('#recepient_reg_id').change(function(){
            var rec_reg_id = $('#recepient_reg_id').val();
            $.ajax({
                url:'registered_recepient_name.php?rec_reg_id='+rec_reg_id,
                success:function(data){
				$('#recepient_reg_name').attr("value",data);
			}
        });
        })
    </script>
</body>
</html>