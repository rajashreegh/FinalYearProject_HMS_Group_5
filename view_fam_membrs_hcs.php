<?php

session_start();

$name=$_SESSION['admin_name'];
$p_id = $_GET['p_id'];
$page=$_GET['page'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Family Members</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/view_fam_membrs_hcs.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Passions+Conflict&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@600;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@600&display=swap" rel="stylesheet">

	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
</head>
<body>

	<?php include 'includes/admin_navbar.php'?>

	<h2 id="title">Family Members covered under this scheme:</h2>

	<div id="table_box">
		<table style="width:100%">
			<thead>
				<tr>
					<th>Relation</th>
					<th>Name</th>
					<th>Gender</th>
					<th>Age</th>
				</tr>	
			</thead>
			<tbody>

				<?php

				require "db_config.php";

				$query="SELECT * FROM family_hcs_plan_details WHERE p_id='$p_id'";
				$result=mysqli_query($conn,$query);
				while($row=mysqli_fetch_assoc($result)){
					if($row['sp_name']!=NULL){
						echo '<tr>
									<th>SPOUSE</th>
									<td>'.$row['sp_name'].'</td>
									<td>'.$row['sp_gender'].'</td>
									<td>'.$row['sp_age'].'</td>
							</tr>';
					}
					if($row['ch1_name']!=NULL){
						echo '<tr>
									<th>CHILD 1</th>
									<td>'.$row['ch1_name'].'</td>
									<td>'.$row['ch1_gender'].'</td>
									<td>'.$row['ch1_age'].'</td>
							</tr>';
					}
					if($row['ch2_name']!=NULL){
						echo '<tr>
									<th>CHILD 2</th>
									<td>'.$row['ch2_name'].'</td>
									<td>'.$row['ch2_gender'].'</td>
									<td>'.$row['ch2_age'].'</td>
							</tr>';
					}

				}

				?>

			</tbody>
		</table>
	</div>

	<?php 

	if($page == 1){
		echo '<a href="add_health_card_schemes_dashboard.php"><i class="fas fa-chevron-circle-left" id="back_arrrow"></i></a>';
	}else if($page == 2){
		echo '<a href="active_hcs_user_details.php?card_id=2"><i class="fas fa-chevron-circle-left" id="back_arrrow"></i></a>';
	}

	?>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>