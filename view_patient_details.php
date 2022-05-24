<?php

session_start();

$name=$_SESSION['admin_name'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin | View Patient Details | CareVista</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   
	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	
	<link href="https://fonts.googleapis.com/css2?family=Passions+Conflict&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@800&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Quintessential&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+P+One&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@800&display=swap" rel="stylesheet">  

    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">  
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Display:ital,wght@1,500&display=swap" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css2?family=Supermercado+One&display=swap" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet"> 
  

	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/view_patient.css">

    <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
 

</head>
<body>
              <?php include 'includes/admin_navbar.php'?>

            <div class="bg">
            <div style="margin:50px;margin-left:300px;">
            <table id="myTable" class="table table-info table-striped table-bordered table-hover" style="width:80%">
            <thead class="header-bg">
                    <tr>
                        <th scope="col">PATIENT ID</th>
                        <th scope="col">PATIENT NAME</th>
                        <th scope="col">PATIENT EMAIL-ID</th>
                        <th scope="col">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        require "db_config.php";
                        $query = "SELECT patient_id,patient_name,patient_email FROM patient_login";
                        $result=mysqli_query($conn,$query);
                        while($row=mysqli_fetch_assoc($result)){

                            echo '<tr>
                                    <td scope="row">'.$row['patient_id'].'</td>
                                    <td>'.$row['patient_name'].'</td>
                                    <td>'.$row['patient_email'].'</td>
                                    <td>
                                    <a href="patient_information.php?pid='.$row['patient_id'].'" class="btn btn-dark mybtn"><i class="fas fa-eye"></i>View</a>
                                    </td>
                                    </tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div> 


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#myTable").DataTable({
                language: {
                    searchPlaceholder: "Filter Records by ID, Name, Email"
                }
            });
        });
    </script>
</body>
</html>