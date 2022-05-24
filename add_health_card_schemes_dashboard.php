<?php

session_start();

$name=$_SESSION['admin_name'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add Health Schemes Dashboard| Admin</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/add_hcs_dashboard.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Passions+Conflict&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@600;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+P+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@1,500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Supermercado+One&display=swap" rel="stylesheet">

	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
</head>
<body>

	<?php include 'includes/admin_navbar.php'?>

	<button class="btn btn-primary" id="add_scheme_btn" data-toggle="modal" data-target="#addSchemeModal">Add New Scheme</button>

	<a href="view_hcs_schemes.php" class="btn btn-warning" id="view_scheme_btn">View Schemes</a>

	<a href="active_hcs_users.php" class="btn btn-info" id="active_users_btn">Active Users</a>

	<div id="side_nav">
		<div id="side_list">
			<button class="mybutton active-btn" id="ind">Individual</button>
			<button class="mybutton" id="fam">Family</button>
			<button class="mybutton" id="sen">Senior Citizen</button>
			<button class="mybutton" id="cri">Critical Care</button>		
		</div>
	</div>

	<div class="content_block" id="ind_block">
		
		<table style="width:100%">
			<tr>
				<th>Patient ID</th>
				<th>Name</th>
				<th>Gender</th>
				<th>Age</th>
				<th>Email-id</th>
				<th>Mobile</th>
				<th>City</th>
				<th>Scheme Name</th>
				<th style="width: 17%;">Actions</th>
			</tr>

			<?php

			require "db_config.php";

			$query="SELECT * FROM applicants_hcs a INNER JOIN health_card_schemes h
					ON a.s_id = h.scheme_id 
					WHERE status LIKE 'Pending' AND h.scheme_category LIKE 'Individual'";

			$result=mysqli_query($conn,$query);
			while($row=mysqli_fetch_assoc($result)){
				echo '<tr>
				<td>'.$row['id'].'</td>
				<td>'.$row['name'].'</td>
				<td>'.$row['gender'].'</td>
				<td>'.$row['age'].'</td>
				<td>'.$row['email'].'</td>
				<td>'.$row['phone_no'].'</td>
				<td>'.$row['city'].'</td>
				<td>'.$row['scheme_name'].'</td>
				<td>
					<a href="approve_hcs.php?app_id='.$row['application_id'].'" class="btn btn-success">Approve</a>
					<a href="reject_hcs.php?app_id='.$row['application_id'].'" class="btn btn-danger">Reject</a>
				</td>
			</tr>';
			}

			?>
		</table>

	</div>


	<div class="content_block hide" id="fam_block">
		
		<table style="width:100%">
			<tr>
				<th>Patient ID</th>
				<th>Name</th>
				<th>Gender</th>
				<th>Age</th>
				<th>Email-id</th>
				<th>Mobile</th>
				<th>City</th>
				<th>Scheme Name</th>
				<th>View</th>
				<th style="width: 17%;">Actions</th>
			</tr>

			<?php

			require "db_config.php";

			$query="SELECT * FROM applicants_hcs a INNER JOIN health_card_schemes h
					ON a.s_id = h.scheme_id 
					WHERE status LIKE 'Pending' AND h.scheme_category LIKE 'Family'";

			$result=mysqli_query($conn,$query);
			while($row=mysqli_fetch_assoc($result)){
				echo '<tr>
				<td>'.$row['id'].'</td>
				<td>'.$row['name'].'</td>
				<td>'.$row['gender'].'</td>
				<td>'.$row['age'].'</td>
				<td>'.$row['email'].'</td>
				<td>'.$row['phone_no'].'</td>
				<td>'.$row['city'].'</td>
				<td>'.$row['scheme_name'].'</td>
				<td><a href="view_fam_membrs_hcs.php?p_id='.$row['id'].'&page=1" id="fam_members"><i class="fas fa-eye"></i></a></td>
				<td>
					<a href="approve_hcs.php?app_id='.$row['application_id'].'" class="btn btn-success">Approve</a>
					<a href="reject_hcs.php?app_id='.$row['application_id'].'" class="btn btn-danger">Reject</a>
				</td>
			</tr>';
			}

			?>
		</table>

	</div>

	<div class="content_block hide" id="sen_block">
		
		<table style="width:100%">
			<tr>
				<th>Patient ID</th>
				<th>Name</th>
				<th>Gender</th>
				<th>Age</th>
				<th>Email-id</th>
				<th>Mobile</th>
				<th>City</th>
				<th>Scheme Name</th>
				<th style="width: 17%;">Actions</th>
			</tr>

			<?php

			require "db_config.php";

			$query="SELECT * FROM applicants_hcs a INNER JOIN health_card_schemes h
					ON a.s_id = h.scheme_id 
					WHERE status LIKE 'Pending' AND h.scheme_category LIKE 'Senior Citizen'";

			$result=mysqli_query($conn,$query);
			while($row=mysqli_fetch_assoc($result)){
				echo '<tr>
				<td>'.$row['id'].'</td>
				<td>'.$row['name'].'</td>
				<td>'.$row['gender'].'</td>
				<td>'.$row['age'].'</td>
				<td>'.$row['email'].'</td>
				<td>'.$row['phone_no'].'</td>
				<td>'.$row['city'].'</td>
				<td>'.$row['scheme_name'].'</td>
				<td>
					<a href="approve_hcs.php?app_id='.$row['application_id'].'" class="btn btn-success">Approve</a>
					<a href="reject_hcs.php?app_id='.$row['application_id'].'" class="btn btn-danger">Reject</a>
				</td>
			</tr>';
			}

			?>
		</table>

	</div>

	<div class="content_block hide" id="cri_block">
		
		<table style="width:100%">
			<tr>
				<th>Patient ID</th>
				<th>Name</th>
				<th>Gender</th>
				<th>Age</th>
				<th>Email-id</th>
				<th>Mobile</th>
				<th>City</th>
				<th>Scheme Name</th>
			</tr>

			<?php

			require "db_config.php";

			$query="SELECT * FROM applicants_hcs a INNER JOIN health_card_schemes h
					ON a.s_id = h.scheme_id 
					WHERE h.scheme_category LIKE 'Critical Care' AND current_status LIKE 'Active'";

			$result=mysqli_query($conn,$query);
			while($row=mysqli_fetch_assoc($result)){
				echo '<tr>
				<td>'.$row['id'].'</td>
				<td>'.$row['name'].'</td>
				<td>'.$row['gender'].'</td>
				<td>'.$row['age'].'</td>
				<td>'.$row['email'].'</td>
				<td>'.$row['phone_no'].'</td>
				<td>'.$row['city'].'</td>
				<td>'.$row['scheme_name'].'</td>
			</tr>';
			}

			?>
		</table>

	</div>

	<div class="modal fade" id="addSchemeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header bgclr">
		        <h5 class="modal-title text-white" id="exampleModalLabel">Add New Health Schemes</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form action="add_hc_schemes.php" method="POST">

			        <label for="sname">Scheme Name</label>
		    		<input class="inpt-frmt" type="text" name="sname" id="sname" placeholder="Name of the Scheme" required><br>

		    		<label for="scategory">Scheme Catogory</label>
		    		<select name="scategory" id="scategory" class="inpt-frmt" required>
						<option value="none" selected disabled hidden>
							Select the scheme category
						</option>
						<option value="Individual">Individual</option>
						<option value="Family">Family</option>
						<option value="Senior Citizen">Senior Citizen</option>
						<option value="Critical Care">Critical Care</option>
					</select>


		    		<label for="stype">Scheme Type</label>
		    		<select name="stype" id="stype" class="inpt-frmt" required>
						<option value="none" selected disabled hidden>Select the scheme type</option>
						<option value="Premium">Premium</option>
						<option value="Non-premium">Non-premium</option>
					</select>

		        	<label for="coverage">Total Coverage</label>
		    		<input class="inpt-frmt" type="text" name="coverage" id="coverage" placeholder="3 lakh" required><br>

		    		<label for="prem">Annual Premium</label>
		    		<input class="inpt-frmt" type="number" name="prem" id="prem" required><br>

		        	<input type="submit" name="" class="btn btn-dark btn-block" value="Add">

		        </form>
		      </div>
		    </div>
	  </div>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<script type="text/javascript" src="js/add_hcs_dashboard.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>