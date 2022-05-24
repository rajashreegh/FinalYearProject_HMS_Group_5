<?php

session_start();

$name=$_SESSION['admin_name'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add | View | Update Doctor Details</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> -->
    <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="css/add_view_update_dctr.css">

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
    <div style="margin:15px;">
            <table id="myTable" class="table table-dark table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">DOCTOR ID</th>
                        <th scope="col">NAME</th>
                        <th scope="col">EMAIL-ID</th>
                        <th scope="col">DEPARTMENT</th>
                        <th scope="col">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        require "db_config.php";
                        $query = "SELECT a.doctor_id,a.doctor_name,a.doctor_email, b.dept_id,c.dept_name 
                                FROM left_doctors a INNER JOIN doc_dep b on a.doctor_id=b.doc_id 
                                INNER JOIN departments c on b.dept_id = c.dept_id";
                        $result=mysqli_query($conn,$query);
                        while($row=mysqli_fetch_assoc($result)){
                            echo '<tr>
                                    <td scope="row">'.$row['doctor_id'].'</td>
                                    <td>'.$row['doctor_name'].'</td>
                                    <td>'.$row['doctor_email'].'</td>
                                    <td>'.$row['dept_name'].'</td>
                                    <td>
                                        <a href="view_doctor_detail.php?doc_id='.$row['doctor_id'].'&dept_id='.$row['dept_id'].'" data-toggle="tooltip" data-placement="bottom" title="VIEW"><i class="fas fa-eye icon" style="color: rgb(147, 194, 212);"></i></a>
                                        <a href="restore_doctor_detail.php?doc_id='.$row['doctor_id'].'&dept_id='.$row['dept_id'].'" data-toggle="tooltip" data-placement="bottom" title="RESTORE"><i class="fas fa-trash-restore" style="color: rgb(143, 201, 143);"></i></a>
                                    </td>
                                    </tr>';
                        }
                    ?>
                </tbody>
            </table>
    </div>
    <div class="buttons">
        <a href="add_view_update_dctr_details.php" class="btn btn-primary">  GO BACK TO MAIN PAGE</a>
    </div>
    <br>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#myTable").DataTable({
                language: {
                    searchPlaceholder: "Search by ID, Name, Mail, Department..."
                }
            });
        });
    </script>
    <script>
        $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>

</body>
</html>