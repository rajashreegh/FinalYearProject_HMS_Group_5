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
        <link rel="stylesheet" type="text/css" href="css/view_pending_donor.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+P+One&display=swap" rel="stylesheet">
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
                        $query = "SELECT * FROM living_donor_reg WHERE status='Pending'";
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
                                    <td><a href="'.$cardURL.'" target="_blank">View Adhaar Card</a></td>
                                    <td>
                                        <a href="approve_donor_details.php?donor_reg_num='.$row['Donor_Registration_Num'].'&donation_type=Living" class="btn btn-success">Approve</a>
                                        <a href="reject_donor_details.php?donor_reg_num='.$row['Donor_Registration_Num'].'&donation_type=Living" class="btn btn-danger">Reject</a>
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
                        $query = "SELECT * FROM deceased_donor_reg WHERE status='Pending'";
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
                                        <a href="approve_donor_details.php?donor_reg_num='.$row['Donor_Registration_Num'].'&donation_type=Deceased" class="btn btn-success">Approve</a>
                                        <a href="reject_donor_details.php?donor_reg_num='.$row['Donor_Registration_Num'].'&donation_type=Deceased" class="btn btn-danger">Reject</a>
                                    </td>
                                    </tr>';
                            $s_no++;
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

    </body>
</html>