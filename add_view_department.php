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
    <link rel="stylesheet" type="text/css" href="css/add_view_dept.css">

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


    <!-- ########################################################### FRONT-END ################################################################# -->
	
    <?php include 'includes/admin_navbar.php'?>


    <div style="margin:15px;">
            <table id="myTable" class="table table-dark table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">DEPARTMENT ID</th>
                        <th scope="col">DEPARTMENT NAME</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        require "db_config.php";
                        $query = "SELECT * FROM departments";
                        $result=mysqli_query($conn,$query);
                        while($row=mysqli_fetch_assoc($result)){

                            echo '<tr>
                                    <td scope="row">'.$row['dept_id'].'</td>
                                    <td>'.$row['dept_name'].'</td>
                                    </tr>';
                        }
                    ?>
                </tbody>
            </table>
    </div>
    <div class="buttons">
        <a href="" class="btn btn-warning text-white" data-toggle="modal" data-target="#addDeptModal"><i class="fa fa-plus" aria-hidden="true"></i>  ADD DEPARTMENT</a>
    </div>
    <br>

    <!-- ############################################################################################################################################ -->

    <div class="modal fade" id="addDeptModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header bgclr text-white text-center">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="add_dept.php" method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="dept-name">Department Name <span class="required">*</span></label>
                            <input class="inpt-frmt" type="text" name="dept-name" id="dept-name" placeholder="Department Name" required><br>
                        </div>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" >Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
            </div>
            </div>
        </div>
    </div>
    <!-- ###################################################################### SCRIPTS ################################################################################################################ -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/dataTables.bootstrap4.min.js"></script>

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

    <!-- ################################################################################################################################################################################## -->
</body>
</html>