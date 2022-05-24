<?php

session_start();

$name=$_SESSION['admin_name'];
$delete_doc_id = 0;
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


    <!-- ########################################################### FRONT-END ################################################################# -->
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
                                FROM doctor_login a INNER JOIN doc_dep b on a.doctor_id=b.doc_id 
                                INNER JOIN departments c on b.dept_id = c.dept_id";
                        $result=mysqli_query($conn,$query);
                        while($row=mysqli_fetch_assoc($result)){

                            echo '<tr>
                                    <td scope="row">'.$row['doctor_id'].'</td>
                                    <td>'.$row['doctor_name'].'</td>
                                    <td>'.$row['doctor_email'].'</td>
                                    <td>'.$row['dept_name'].'</td>
                                    <td>
                                        <a href="edit_doctor_detail.php?doc_id='.$row['doctor_id'].'&dept_id='.$row['dept_id'].'" data-toggle="tooltip" data-placement="bottom" title="UPDATE"><i class="fas fa-edit icon" style="color: rgb(143, 201, 143);"></i></a>
                                        <a href="view_doctor_detail.php?doc_id='.$row['doctor_id'].'&dept_id='.$row['dept_id'].'" data-toggle="tooltip" data-placement="bottom" title="VIEW"><i class="fas fa-eye icon" style="color: rgb(147, 194, 212);"></i></a>
                                        <a class="deletebtn" data-toggle="tooltip" data-placement="bottom" title="DELETE"><i class="fa fa-trash icon" style="color: rgb(187, 97, 97);"></i></a>
                                        <a href="mail_doc_details.php?doc_id='.$row['doctor_id'].'&dept_id='.$row['dept_id'].'" data-toggle="tooltip" data-placement="bottom" title="MAIL LOGIN CREDENTIALS"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                                    </td>
                                    </tr>';
                        }
                    ?>
                </tbody>
            </table>
    </div>
    <div class="buttons">
        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#doctorRegisterModal"><i class="fa fa-plus" aria-hidden="true"></i>  ADD DOCTOR</a>
        <a href="add_view_department.php" class="btn btn-warning text-white"><i class="fas fa-eye icon"></i>  ADD/VIEW DEPARTMENT</a>
        <a href="view_deleted_doctor_details.php" class="btn btn-danger"><i class="fas fa-eye icon"></i>  VIEW DELETED DOCTOR DETAILS</a>
    </div>
    <br>
    <!-- ################################################################################################################################################################################################################################################################################### -->
    
    
    
    
    
    <!-- ###################################################### MODAL FOR ADDING DOCTORS ################################################################################### -->
    
    <div class="modal fade bd-example-modal-lg" id="doctorRegisterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		      <div class="modal-header bgclr">
		        <h5 class="modal-title text-white" id="exampleModalLabel">Add Doctor</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<p id="doctor_reg_error" class="text-danger"></p>
		        <form action="doctor_reg_validation.php" method="POST">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="p-3 mb-2 bg-dark text-white" style="width:100%;"><i class="fa fa-sign-in" aria-hidden="true"></i>   LOGIN CREDENTIALS</div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="reg-name">Username <span class="required">*</span></label>
                                <input class="inpt-frmt" type="text" name="name" id="doctor_reg-name" placeholder="<First_name> <Second_name>" required><br>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="reg-mail">Email <span class="required">*</span></label>
                                <input class="inpt-frmt" type="email" name="email" id="doctor_reg-mail" placeholder="xyz@gmail.com" required><br>
                            </div>
                            <div class="col-md-6">
                                <label for="reg-pswrd">Password <span class="required">*</span></label>
                                <input class="inpt-frmt" type="password" name="password" id="doctor_reg-pswrd" placeholder="Abc@_$234" required><br>
                            </div>
                        </div>

                        <div class="row">
                            <div class="p-3 mb-2 bg-dark text-white" style="width:100%;"><i class="fas fa-graduation-cap"></i>  EDUCATIONAL DETAILS</div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="reg-quali">Qualification <span class="required">*</span></label>
                                <input class="inpt-frmt" type="text" name="qualification" id="doctor_reg-quali" placeholder="Qualification" required><br>
                            </div>
                            <div class="col-md-6">
                                <label for="reg-dept">Department <span class="required">*</span></label><br>
                                <select id="doctor_reg-dept" name="department" required>
                                        <option value="none" selected disabled hidden>Select Department</option>
                                        <?php
                                            require "db_config.php";
                                            $query1 = "SELECT * FROM departments";
                                            $result1=mysqli_query($conn,$query1);
                                            while($row1=mysqli_fetch_assoc($result1)){
                                                echo '<option value='.$row1['dept_id'].'>'.$row1['dept_name'].'</option>';
                                            }
                                        ?>
                            </div>
                        </div>
                        

                        <div class="row">
                            <div class="col-md-12">
                                <input type="text"  hidden><br><br>
                            </div>
                        </div>

                        
                        <div class="row">
                            <div class="p-3 mb-2 bg-dark text-white" style="width:100%;"><i class="fas fa-money-check-alt"></i>   APPOINTMENT REQUISITES</div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-md-6">
                                </i><label for="visit">Visit <span class="required">*</span></label>
                                <input class="inpt-frmt" type="text" name="visit" id="doctor_visit" placeholder="Visit (in Rs.)" required><br>
                            </div>
                            <div class="col-md-6">
                                </i><label for="floor">Floor <span class="required">*</span></label><br>
                                <select id="doctor_reg-floor" name="floor" required>
                                    <option value="none" selected disabled hidden>Select Floor</option>
                                    <option value="0">Ground</option>
                                    <option value="1">1st Floor</option>
                                    <option value="2">2nd Floor</option>
                                    <option value="3">3rd Floor</option>
                                    <option value="4">4th Floor</option>
                                    <option value="5">5th Floor</option>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <input type="text"  hidden><br><br>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="p-3 mb-2 bg-dark text-white" style="width:100%;"><i class="fa fa-calendar" aria-hidden="true"></i>    WEEKLY SCHEDULES</div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="day_1">Day-1 <span class="required">*</span></label><br>
                                <select id="doctor_day1" name="day1" required>
                                    <option value="none" selected disabled hidden>Select Day-1</option>
                                    <option value="Sunday">Sunday</option>
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                    <option value="Saturday">Saturday</option>
                                <input type="text"  hidden><br><br>
                            </div>
                            <div class="col-md-9">
                                <label for="time_1">Time-1 <span class="required">*</span></label><br>
                                <input class="inpt-frmt" type="time" name="time1" id="doctor_time1" placeholder="XX:YY(am/pm)-XX:YY(am/pm)" required><br>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="day_2">Day-2</label><br>
                                <select id="doctor_day2" name="day2">
                                    <option value="none" selected disabled hidden>Select Day-2</option>
                                    <option value="Sunday">Sunday</option>
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                    <option value="Saturday">Saturday</option>
                                <input type="text"  hidden><br><br>
                            </div>
                            <div class="col-md-9">
                                <label for="time_2">Time-2</label><br>
                                <input class="inpt-frmt" type="time" name="time2" id="doctor_time2" placeholder="XX:YY(am/pm)-XX:YY(am/pm)"><br>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="day_3">Day-3</label><br>
                                <select id="doctor_day3" name="day3">
                                    <option value="none" selected disabled hidden>Select Day-3</option>
                                    <option value="Sunday">Sunday</option>
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                    <option value="Saturday">Saturday</option>
                                <input type="text"  hidden><br><br>
                            </div>
                            <div class="col-md-9">
                                <label for="time_3">Time-3</label><br>
                                <input class="inpt-frmt" type="time" name="time3" id="doctor_time3" placeholder="XX:YY(am/pm)-XX:YY(am/pm)"><br>
                            </div>
                        </div>

                        
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text"  hidden><br><br>
                            </div>
                        </div>

                        <input type="submit" name="reg-btn" class="btn btn-dark btn-block bgclr" value="ADD">
                    </div>
		        </form>
		      </div>
		    </div>
	  </div>
	</div>
    <!-- ##################################################################################################################################################################### -->

    <!-- ################################################################# MODAL FOR DELETING DOCTORS ############################################################################# -->
    
    <div class="modal" tabindex="-1" role="dialog" id="doctorDeleteModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Doctor Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action = "delete_doctor_details.php" method = "POST">
            <div class="modal-body">
                <input type = "hidden" name="delete_id" id="delete_id">
                <p>Are you sure you want to delete the Doctor details?</p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i>  YES</button>
                <a href="add_view_update_dctr_details.php" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>   NO</a>
            </div>
            </form>
            </div>
        </div>
    </div>

    <!-- ####################################################################################################################################################################################### -->


    <!-- ###################################################################### SCRIPTS ################################################################################################################ -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/dataTables.bootstrap4.min.js"></script>


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
             $('.deletebtn').on('click',function(){
                 $('#doctorDeleteModal').modal('show');

                 $tr = $(this).closest('tr');

                 var data = $tr.children("td").map(function(){
                     return $(this).text();
                 }).get();

                 console.log(data);

                 $('#delete_id').val(data[0]);
             })
         });
    </script>

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