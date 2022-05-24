<?php

session_start();

$name=$_SESSION['admin_name'];

include 'includes/admin_navbar.php';

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add | View | Update Doctor Details</title>
    <style>
        .table-bordered td, .table-bordered th{
             border-color: black !important; 
        }
        *{
    font-family: 'Quintessential', cursive;
    font-weight:bold;
}

    </style>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quintessential&display=swap" rel="stylesheet">

	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
</head>
<body>
<?php
  if($_SESSION['approved']){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Appointment has been approved successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
    
  </div>";
  $_SESSION['approved']=false;
  }
  ?>
<?php
  if($_SESSION['cancel']){
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Appointment has been cancelled successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
    
  </div>";
  $_SESSION['cancel']=false;
  }
  ?>
    <h1 style="text-align:center;text-decoration:underline;MARGIN-TOP:10PX;">PENDING APPOINTMENTS</h1>

    <!-- ########################################################### FRONT-END ################################################################# -->

    <div style="margin:15px;">
            <table id="myTable" class="table table-light table-bordered table-hover">
                <thead CLASS="thead-dark">
                    <tr>
                        <th scope="col">S.no.</th>
                        <th scope="col">NAME</th>
                        <th scope="col">VACCINE NAME</th>
                        <th scope="col">DATE</th>
                        <th scope="col">TIME</th>
                        <th scope="col">PAYMENT STATUS</th>
                        <th scope="col">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        require "db_config.php";
                        $query = "SELECT * FROM vaccination_bookings b
                                  INNER JOIN vaccine_list l on l.vaccine_id=b.vaccine_id WHERE vaccination_status='INCOMPLETE'";
                        $result=mysqli_query($conn,$query);
                        $n=0;
                        while($row=mysqli_fetch_assoc($result)){
                            $n=$n+1;

                            echo '<tr class="table-info">
                                    <td scope="row">'.$n.'</td>
                                    <td>'.$row['name'].'</td>
                                    <td>'.$row['vaccine_name'].'</td>
                                    <td>'.$row['date'].'</td>
                                    <td>'.$row['time'].'</td>
                                    <td>'.$row['payment_status'].'</td>
                                    <td>
                                        <a href="admin_vaccination_functionalities.php?unique_id='.$row['unique_id'].'&approve=true" data-toggle="tooltip" data-placement="bottom" title="APPROVED"><i class="fas fa-check-circle" style="color:green"></i></a>
                                        <a href="admin_vaccination_functionalities.php?unique_id='.$row['unique_id'].'&cancel=true" data-toggle="tooltip" data-placement="bottom" title="cancel"><i class="fas fa-times-circle" style="color:red"></i></a>
                                       
                                        
                                    </td>
                                    
                                    </tr>';
                        }
                    ?>
                </tbody>
            </table>
    </div>
   
    <br>
    <a href="vaccination_management.php" > <i class="fas fa-arrow-circle-left fa-5x" style="width:100%;text-align:center;color:black"></i></a>
    <!-- ################################################################################################################################################################################################################################################################################### -->
    


    <!-- ###################################################################### SCRIPTS ################################################################################################################ -->

    <link rel="stylesheet" type="text/css"  href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" />
<link rel="stylesheet" type="text/css"  href="https://cdn.datatables.net/buttons/1.4.0/css/buttons.dataTables.min.css" />

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.4.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.print.min.js"></script>
    

    <script>
    $(document).ready(function() {
    $('#myTable').DataTable( {
      "order": [[ 0, "desc" ]],
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ]
        
    } );

} );


  </script>
    
    <!-- ################################################################################################################################################################################## -->


    
</body>
</html>