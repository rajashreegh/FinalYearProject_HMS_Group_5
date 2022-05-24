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
    <link rel="stylesheet" type="text/css" href="css/view_donation_details.css">

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
            <table id="myTable" class="table table-dark table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th colspan="13" class="bg-info text-white">VIEW DONATION DETAILS</th>
                    </tr>
                    <tr>
                        <th scope="col">DONATION ID</th>
                        <th scope="col">DONOR REGISTRATION NUMBER</th>
                        <th scope="col">DONOR NAME</th>
                        <th scope="col">RECEPIENT REGISTRATION NUMBER</th>
                        <th scope="col">RECEPIENT NAME</th>
                        <th scope="col">ORGANS DONATED</th>
                        <th scope="col">TISSUES DONATED</th>
                        <th scope="col">TYPE OF DONATION</th>
                        <th scope="col">DATE OF DONATION</th>
                        <th scope="col">DOCTOR IN-CHARGE</th>
                        <th scope="col">HOSPITAL NAME</th>
                        <th scope="col">HOSPITAL ADDRESS</th>
                        <th scope="col">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require "db_config.php";
                        $query = "SELECT * FROM donation_details";
                        $result=mysqli_query($conn,$query);
                        while($row=mysqli_fetch_assoc($result)){
                            echo '<tr>
                                    <td>'.$row['donation_id'].'</td>
                                    <td>'.$row['Donor_Registration_Num'].'</td>
                                    <td>'.$row['donor_name'].'</td>
                                    <td>'.$row['Recepient_reg_num'].'</td>
                                    <td>'.$row['recepient_name'].'</td>
                                    <td>'.$row['organs_donated'].'</td>
                                    <td>'.$row['tissues_donated'].'</td>
                                    <td>'.$row['donor_type'].'</td>
                                    <td>'.date("d-m-Y",strtotime($row['date_of_donation'])).'</td>
                                    <td>'.$row['doctor_name'].'</td>
                                    <td>'.$row['hospital_name'].'</td>
                                    <td>'.$row['hospital_address'].'</td>
                                    <td>
                                        <a href="view_all_donor_details.php?donor_reg_num='.$row['Donor_Registration_Num'].'&donation_type='.$row['donor_type'].'">VIEW DONOR DETAILS</a><br><br>
                                        <a href="view_all_recepient_details.php?recepient_reg_num='.$row['Recepient_reg_num'].'">VIEW RECEPIENT DETAILS</a>
                                    </td>
                                    </tr>';
                        }
                    ?>
                </tbody>
            </table>
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
                $("#myTable").DataTable({
                    language: {
                        searchPlaceholder: "Search by ID, Name, Mail, Department..."
                    }
                });
            });
        </script>

</body>
</html>