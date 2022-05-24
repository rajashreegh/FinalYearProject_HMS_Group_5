<?php

session_start();

$name=$_SESSION['admin_name'];

require "db_config.php";

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Active Health Scheme Users</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/active_hcs_user_details.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Passions+Conflict&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@600&display=swap" rel="stylesheet">

	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
</head>
<body>

	<?php include 'includes/admin_navbar.php'?>

	<?php

	$card_id=$_GET['card_id'];

	if($card_id == 1){
		echo '<table>
			<thead>
				<tr>
					<th>Patient ID</th>
					<th>Name</th>
					<th>Email-id</th>
					<th>Gender</th>
					<th>Age</th>
					<th>Scheme Name</th>
					<th>Type</th>
				</tr>	
			</thead>
			<tbody>';

		$query1="SELECT * FROM applicants_hcs a INNER JOIN health_card_schemes h 
			ON a.s_id = h.scheme_id 
			WHERE h.scheme_category LIKE 'Individual' 
			AND a.status LIKE 'Approved' AND a.current_status LIKE 'Active'";
		$result1 = mysqli_query($conn,$query1);

		while($row=mysqli_fetch_assoc($result1)){
			echo '
				<tr>
					<td>'.$row['id'].'</td>
					<td>'.$row['name'].'</td>
					<td>'.$row['email'].'</td>
					<td>'.$row['gender'].'</td>
					<td>'.$row['age'].'</td>
					<td>'.$row['scheme_name'].'</td>
					<td>'.$row['scheme_type'].'</td>
				</tr>
			';
		}
			
		echo '</tbody>
		</table>';
		}

		else if($card_id == 2){
		echo '<table>
			<thead>
				<tr>
					<th>Patient ID</th>
					<th>Name</th>
					<th>Email-id</th>
					<th>Gender</th>
					<th>Age</th>
					<th>Scheme Name</th>
					<th>Type</th>
				</tr>	
			</thead>
			<tbody>';

		$query2="SELECT * FROM applicants_hcs a INNER JOIN health_card_schemes h 
			ON a.s_id = h.scheme_id 
			WHERE h.scheme_category LIKE 'Family' 
			AND a.status LIKE 'Approved' AND a.current_status LIKE 'Active'";
		$result2 = mysqli_query($conn,$query2);

		while($row=mysqli_fetch_assoc($result2)){
			echo '
				<tr>
					<td>'.$row['id'].'</td>
					<td><a href="view_fam_membrs_hcs.php?p_id='.$row['id'].'&page=2">'.$row['name'].'</a></td>
					<td>'.$row['email'].'</td>
					<td>'.$row['gender'].'</td>
					<td>'.$row['age'].'</td>
					<td>'.$row['scheme_name'].'</td>
					<td>'.$row['scheme_type'].'</td>
				</tr>
			';
		}
			
		echo '</tbody>
		</table>';
		}

		else if($card_id == 3){
		echo '<table>
			<thead>
				<tr>
					<th>Patient ID</th>
					<th>Name</th>
					<th>Email-id</th>
					<th>Gender</th>
					<th>Age</th>
					<th>Scheme Name</th>
					<th>Type</th>
				</tr>	
			</thead>
			<tbody>';

		$query3="SELECT * FROM applicants_hcs a INNER JOIN health_card_schemes h 
			ON a.s_id = h.scheme_id 
			WHERE h.scheme_category LIKE 'Senior Citizen' 
			AND a.status LIKE 'Approved' AND a.current_status LIKE 'Active'";
		$result3 = mysqli_query($conn,$query3);

		while($row=mysqli_fetch_assoc($result3)){
			echo '
				<tr>
					<td>'.$row['id'].'</td>
					<td>'.$row['name'].'</td>
					<td>'.$row['email'].'</td>
					<td>'.$row['gender'].'</td>
					<td>'.$row['age'].'</td>
					<td>'.$row['scheme_name'].'</td>
					<td>'.$row['scheme_type'].'</td>
				</tr>
			';
		}
			
		echo '</tbody>
		</table>';
		}

		else if($card_id == 4){
		echo '<table>
			<thead>
				<tr>
					<th>Patient ID</th>
					<th>Name</th>
					<th>Email-id</th>
					<th>Gender</th>
					<th>Age</th>
					<th>Scheme Name</th>
					<th>Type</th>
				</tr>	
			</thead>
			<tbody>';

		$query4="SELECT * FROM applicants_hcs a INNER JOIN health_card_schemes h 
			ON a.s_id = h.scheme_id 
			WHERE h.scheme_category LIKE 'Critical Care' 
			AND a.current_status LIKE 'Active'";
		$result4 = mysqli_query($conn,$query4);

		while($row=mysqli_fetch_assoc($result4)){
			echo '
				<tr>
					<td>'.$row['id'].'</td>
					<td>'.$row['name'].'</td>
					<td>'.$row['email'].'</td>
					<td>'.$row['gender'].'</td>
					<td>'.$row['age'].'</td>
					<td>'.$row['scheme_name'].'</td>
					<td>'.$row['scheme_type'].'</td>
				</tr>
			';
		}
			
		echo '</tbody>
		</table>';
		}
	
	?>

	<a href="active_hcs_users.php"><i class="fas fa-chevron-circle-left" id="back_arrrow"></i></a>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>