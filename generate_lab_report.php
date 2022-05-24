<?php

session_start();

$name=$_SESSION['admin_name'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Generate LabReport | CareVista</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/generate_lab_report.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Passions+Conflict&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@600&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@1,600&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Redressed&display=swap" rel="stylesheet">


	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
</head>
<body>

	<?php include 'includes/admin_navbar.php'?>

	<a href="view_prev_test_report_admin.php" class="btn btn-info" style="float: right;margin-top: 2%;margin-right: -5%;
    margin-bottom: 3%;">View previous labtest reports</a>

	<table style="width:85%; margin: auto;margin-top: 3%;margin-bottom: 1%;">
		<thead>
			<tr>
				<th>Booking ID</th>
				<th>Patient Name</th>
				<th>Contact No.</th>
				<th>Test Name</th>
				<th>Details</th>
				<th>Generate Report</th>
			</tr>	
		</thead>
		<tbody>
			<?php

			require 'db_config.php';

			$query="SELECT * FROM test_bookings t INNER JOIN labtest l 
					ON t.test_id=l.id WHERE t.booking_id 
					IN (SELECT booking_id FROM test_bookings WHERE booking_id 
						NOT IN (SELECT booking_id FROM labtest_report_ba) AND 
						booking_id NOT IN (SELECT booking_id FROM labtest_report_di));";
			$result=mysqli_query($conn,$query);

			while($row=mysqli_fetch_assoc($result)){
				echo '<tr>
						<td>'.$row['booking_id'].'</td>
						<td>'.$row['booking_done_by'].'</td>
						<td>'.$row['patient_contact_number'].'</td>
						<td>'.$row['test_name'].'</td>
						<td><i class="fas fa-eye action_icons view" data-toggle="modal" data-target="#viewTestBookingDetailsModal" data-id="'.$row['booking_id'].'"></i></td>';

						if($row['category'] == 'Blood Analysis'){
							echo '<td>
										<button class="btn btn-warning ba_btn" data-toggle="modal" data-target="#testReportBAModal" data-id="'.$row['booking_id'].'">
											Generate labtest report</button>
									</td>';
						}else if($row['category'] == 'Diagonistic Imaging'){
							echo '<td><button class="btn btn-warning di_btn" data-toggle="modal" data-target="#testReportDIModal" 
								data-id="'.$row['booking_id'].'">Generate labtest report</button></td>';
						}
						
			 echo   '</tr>';
			}

			?>

		</tbody>
	</table>



	<div class="modal fade" id="viewTestBookingDetailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Patient Booking Details :</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body" id="booking_details"></div>
		    </div>
	  </div>
	</div>

	<div class="modal fade" id="testReportBAModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Lab Test Report :</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<form action="add_labtest_report_ba.php" method="POST">
		        	<div class="form-group">
				    	<label for="b_id">Booking ID</label>
				    	<input type="text" class="form-control" name="b_id" id="b_id" value="" readonly>
				  	</div>
				  	<div class="form-row">
				    	<div class="form-group col-md-6">
				      		<label for="rep_val">Enter the numeric value of the test</label>
				    		<input type="number" class="form-control" name="rep_val" id="rep_val" step="any" placeholder="<2.00 / 5.0167 / 10>">
				    	</div>
				    	<div class="form-group col-md-6">
				      		<label for="rep_result">Result</label>
				      		<input type="text" class="form-control" name="rep_result" 
				      			id="rep_result" readonly>
				    	</div>
				  	</div>
				  	<div class="form-group">
				      	<label for="remarks">Any remarks to add:</label>
				      	<input type="text" class="form-control" name="remarks" id="remarks"> 	
				  	</div>
					
					<?php
						date_default_timezone_set('Asia/Kolkata');
						$g_date = date('Y-m-d H:i:s');
					?>
					
					<input type="hidden" name="g_date" value="<?php echo $g_date ; ?>">

				  <input type="submit" name="" class="btn btn-block btn-dark" value="Save Changes" style="margin-top:4%;" id="save_ba_report">

				</form>
		      </div>
		    </div>
	  </div>
	</div>


	<div class="modal fade" id="testReportDIModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Lab Test Report :</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<form action="add_labtest_report_di.php" method="POST" enctype="multipart/form-data">
		        	<div class="form-group">
				    	<label for="b_id_di">Booking ID</label>
				    	<input type="text" class="form-control" name="b_id_di" id="b_id_di" value="" readonly>
				  	</div>
				  	<div class="form-row">
				    	<div class="form-group col-md-3">
				      		<label for="field_name_1">Enter the field-1 name</label>
				    		<input type="text" class="form-control" name="field_name_1" id="field_name_1" placeholder="<Liver/Kidney/Heart>">
				    	</div>
				    	<div class="form-group col-md-9">
				      		<label for="field_remarks_1">Enter the field-1 remarks</label>
				      		<input type="text" class="form-control" name="field_remarks_1" 
				      			id="field_remarks_1">
				    	</div>
				  	</div>
				  	<div class="form-row">
				    	<div class="form-group col-md-3">
				      		<label for="field_name_2">Enter the field-2 name</label>
				    		<input type="text" class="form-control" name="field_name_2" id="field_name_2" placeholder="<Liver/Kidney/Heart>">
				    	</div>
				    	<div class="form-group col-md-9">
				      		<label for="field_remarks_2">Enter the field-2 remarks</label>
				      		<input type="text" class="form-control" name="field_remarks_2" 
				      			id="field_remarks_2">
				    	</div>
				  	</div>
				  	<div class="form-row">
				    	<div class="form-group col-md-3">
				      		<label for="field_name_3">Enter the field-3 name</label>
				    		<input type="text" class="form-control" name="field_name_3" id="field_name_3" placeholder="<Liver/Kidney/Heart>">
				    	</div>
				    	<div class="form-group col-md-9">
				      		<label for="field_remarks_3">Enter the field-3 remarks</label>
				      		<input type="text" class="form-control" name="field_remarks_3" 
				      			id="field_remarks_3">
				    	</div>
				  	</div>
				  	<div class="form-row">
				    	<div class="form-group col-md-3">
				      		<label for="field_name_4">Enter the field-4 name</label>
				    		<input type="text" class="form-control" name="field_name_4" id="field_name_4" placeholder="<Liver/Kidney/Heart>">
				    	</div>
				    	<div class="form-group col-md-9">
				      		<label for="field_remarks_4">Enter the field-4 remarks</label>
				      		<input type="text" class="form-control" name="field_remarks_4" 
				      			id="field_remarks_4">
				    	</div>
				  	</div>
				  	<div class="form-group">
				      	<label for="di_test_docs">Attach the pdf of the documents [pdf version]</label>
				      	<input type="file" accept=".pdf" class="form-control" name="di_test_docs" id="di_test_docs" required=""> 	
				  	</div>

					<?php
						date_default_timezone_set('Asia/Kolkata');
						$g_date = date('Y-m-d H:i:s');
					?>
					
					<input type="hidden" name="g_date" value="<?php echo $g_date ; ?>">

				  <input type="submit" name="" class="btn btn-block btn-dark" value="Save Changes" style="margin-top:4%;">

				</form>
		      </div>
		    </div>
	  </div>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<script type="text/javascript" src="js/generate_lab_report.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://code.iconify.design/2/2.1.2/iconify.min.js"></script>

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