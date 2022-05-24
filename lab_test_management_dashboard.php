<?php

session_start();

$name=$_SESSION['admin_name'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Lab Test Management | Admin</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/ltm_dashboard.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Passions+Conflict&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@600;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@600&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&display=swap" rel="stylesheet">

	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
</head>
<body>


	<?php include 'includes/admin_navbar.php'?>

	<button class="btn btn-warning" id="add_labtest_btn" data-toggle="modal" data-target="#addNewLabtestModal">Add New Labtest</button>

	<table style="width:95%; margin: auto;margin-top: 6%;margin-bottom: 1%;">
			<thead>
				<tr>
					<th style="width:15%;">Category</th>
					<th style="width:30%;">Name</th>
					<th>Rate</th>
					<th>Room No</th>
					<th>Date</th>
					<th>Range</th>
					<th style="width:15%;">Actions</th>
				</tr>	
			</thead>
			<tbody>

				<?php 

					require 'db_config.php';

					$query1 = "SELECT DISTINCT(category) FROM labtest";
					$result1= mysqli_query($conn,$query1);
					while($row=mysqli_fetch_assoc($result1)){
						
						$query2= "SELECT COUNT(id) AS num,category 
									FROM labtest 
									WHERE category LIKE '".$row['category']."'
									GROUP BY category";
						$result2=mysqli_query($conn,$query2);
						$fetched_result2=mysqli_fetch_assoc($result2);
						$var = $fetched_result2['num'];

						$query3="SELECT * FROM labtest 
									WHERE category LIKE '".$row['category']."' 
									ORDER BY id LIMIT 1;";
						$result3=mysqli_query($conn,$query3);
						$fetched_result3=mysqli_fetch_assoc($result3);

						$var1 = $fetched_result3['id'];

						echo '<tr>
      							<th rowspan="'.$var.'" scope="rowgroup">'.$row['category'].'</th>
      							<td scope="row">'.$fetched_result3['test_name'].'</td>
      							<td>'.$fetched_result3['rate'].'</td>
      							<td>'.$fetched_result3['room_no'].'</td>';

      							$date_frmttd=date("d-m-Y", strtotime($fetched_result3['test_date']));
      					echo	'<td>'.$date_frmttd.'</td>';

      							if($row['category']!='Diagonistic Imaging'){
      								echo '<td><a href="labtest_normal_range.php?test_id='.$var1.'">Range</a></td>';
      							}else{
      								echo '<td class="text-muted">Range</td>';
      							}

      					echo	'<td>
      								<i class="far fa-calendar-alt action_icons schedule" data-toggle="modal" data-target="#scheduleLabtestModal" data-id="'.$var1.'"></i>
      								<i class="fas fa-edit action_icons edit" data-toggle="modal" data-target="#editLabtestModal" data-id="'.$var1.'"></i>
      								<a href="delete_labtest.php?test_id='.$var1.'" id="restore_tag"><i class="fas fa-trash-alt action_icons delete"></i></a>
      							</td>
    						</tr>';


    					$query4="SELECT * FROM labtest 
    								WHERE category LIKE '".$row['category']."' 
    								AND id != '$var1'";
    					$result4=mysqli_query($conn,$query4);
    					while($row1=mysqli_fetch_assoc($result4)){
    						echo '<tr>
      								<td scope="row">'.$row1['test_name'].'</td>
	      							<td>'.$row1['rate'].'</td>
	      							<td>'.$row1['room_no'].'</td>';

	      							$date_frmttd=date("d-m-Y", strtotime($row1['test_date']));
	      					echo	'<td>'.$date_frmttd.'</td>';

	      							if($row['category']!='Diagonistic Imaging'){
      									echo '<td>
      											<a href="labtest_normal_range.php?test_id='.$row1['id'].'">Range</a>
      										</td>';
      								}else{
      									echo '<td class="text-muted">Range</td>';
      								}


	      					echo	'<td>
	      								<i class="far fa-calendar-alt action_icons schedule" data-toggle="modal" data-target="#scheduleLabtestModal" data-id="'.$row1['id'].'"></i>
	      								<i class="fas fa-edit action_icons edit" data-toggle="modal" data-target="#editLabtestModal" 
	      									data-id="'.$row1['id'].'"></i>
	      								<a href="delete_labtest.php?test_id='.$row1['id'].'" id="restore_tag"><i class="fas fa-trash-alt action_icons delete"></i></a>	
	      							</td>
    							</tr>';
    					}

					}	

				?>
					
			</tbody>
		</table>

		<h2 id="heading" style="margin-top: 5%;">Lab Test Not Available Currently :</h2>
			
				<?php

				$query5="SELECT * FROM deleted_labtest";
				$result5=mysqli_query($conn,$query5);

				if(mysqli_num_rows($result5) == 0){
					echo '<h2 id="nothing">--- Nothing to display ---</h2>';
				}else{
					echo '<table style="width:50%; margin: auto;margin-top: 4%;margin-bottom: 1%;">
					<thead>
							<tr>
								<th>Name</th>
								<th>Category</th>
								<th>Restore</th>
							</tr>	
					</thead>
					<tbody>';
					while($row2=mysqli_fetch_assoc($result5)){
						echo '<tr>
									<th style="font-style:italic;">'.$row2['test_name'].'</th>
									<td>'.$row2['category'].'</td>
									<td><a href="restore_labtest.php?test_id='.$row2['id'].'" id="restore_tag"><i class="fas fa-trash-restore action_icons restore"></i></a></td>
							</tr>';
					}
				}
				?>
			</tbody>
		</table>

	<div class="modal fade" id="scheduleLabtestModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header bgclr">
		        <h5 class="modal-title text-white" id="exampleModalLabel">Schedule Next Slot :</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">

		        <form action="schedule_labtest_date.php" method="POST">

		        	<input type="hidden" name="labtestid" id="labtestid">

		        	<i class="far fa-calendar-alt icon-design"></i><label for="date">Choose the next date</label><br>
		        	<input class="inpt-frmt" type="date" name="date" id="date"><br>

		        	<input type="submit" name="" class="btn btn-dark btn-block" value="Save">

		        </form>
		      </div>
		    </div>
	  </div>
	</div>


	<div class="modal fade" id="editLabtestModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Edit Labtest Details :</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body" id="edit_labtest_details_modal"></div>
		    </div>
	  </div>
	</div>


	<div class="modal fade" id="addNewLabtestModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Add New LabTest :</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body" id="">
		      	<form action="add_new_labtest.php" method="POST">
		        	<div class="form-group">
				    	<label for="test_name">Test Name</label>
				    	<input type="text" class="form-control" name="test_name" id="test_name" placeholder="<Test Name>">
				  	</div>
				  	<div class="form-row">
				    	<div class="form-group col-md-6">
				      		<label for="category">Select the Category</label>
				      		<select name="category" id="category" class="form-control">
				      			<option value="none">--- Select category ---</option>
							  <option value="Blood Analysis">Blood Analysis</option>
							  <option value="Diagonistic Imaging">Diagonistic Imaging</option>
							</select>
				    	</div>
				    	<div class="form-group col-md-6">
				      		<label for="date">Next Date</label>
				      		<input type="date" class="form-control" name="date" id="date">
				    	</div>
				  	</div>
				  	<div class="form-row">
				    	<div class="form-group col-md-6">
				      		<label for="rate">Rate</label>
				      		<input type="text" class="form-control" name="rate" id="rate" placeholder="Rs. 500">
				    	</div>
				    	<div class="form-group col-md-6">
				      		<label for="room">Room No.</label>
				      		<input type="text" class="form-control" name="room" id="room" placeholder="Room number where test will be performed">
				    	</div>
				  	</div>
				  	<div class="form-row">
				    	<div class="form-group col-md-3">
				      		<label for="male_min">Minimum [Male]</label>
				      		<input type="number" class="form-control" name="male_min" id="male_min"  step="any" placeholder="accepted range">
				    	</div>
				    	<div class="form-group col-md-3">
				      		<label for="male_max">Maximum [Male]</label>
				      		<input type="number" class="form-control" name="male_max" id="male_max"  step="any" placeholder="accepted range">
				    	</div>
				    	<div class="form-group col-md-3">
				      		<label for="female_min">Minimum [Female]</label>
				      		<input type="number" class="form-control" name="female_min" id="female_min" step="any" placeholder="accepted range">
				    	</div>
				    	<div class="form-group col-md-3">
				      		<label for="female_max">Maximum [Female]</label>
				      		<input type="number" class="form-control" name="female_max" id="female_max" step="any" placeholder="accepted range">
				    	</div>
				  	</div>
				  	<div class="form-group">
				    	<label for="test_unit">Test Unit</label>
				    	<input type="text" class="form-control" name="test_unit" id="test_unit" placeholder="<Test Unit (mg/dl, mIU/mL,...)>">
				  	</div>
				  <input type="submit" name="" class="btn btn-block btn-dark" value="Save Changes" style="margin-top:4%;">
				</form>
		      </div>
		    </div>
	  </div>
	</div>


	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<script type="text/javascript" src="js/ltm_dashboard.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>