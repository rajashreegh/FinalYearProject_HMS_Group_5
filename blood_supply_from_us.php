<?php

session_start();

$name=$_SESSION['admin_name'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Blood Pending Request</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/blood_pending_req.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Passions+Conflict&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+P+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@1,500&display=swap" rel="stylesheet">

	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
</head>
<body>

	<?php include 'includes/admin_navbar.php'?>

	<div class="table-box">
		<table style="width:100%">
			<tr>
				<th>Request ID</th>
				<th>Name</th>
				<th>Gender</th>
				<th>Age</th>
				<th>Email-id</th>
				<th>Mobile</th>
				<th>City</th>
				<th>Blood Group</th>
				<th>Unit Required</th>
				<th>Prescription</th>
				<th>Status</th>
			</tr>

			<?php

			require "db_config.php";

			$query="SELECT * FROM blood_requests";
			$result=mysqli_query($conn,$query);
			while($row=mysqli_fetch_assoc($result)){
				echo '<tr>
				<td>'.$row['req_id'].'</td>
				<td>'.$row['recipient_name'].'</td>
				<td>'.$row['gender'].'</td>
				<td>'.$row['age'].'</td>
				<td>'.$row['email'].'</td>
				<td>'.$row['phone_no'].'</td>
				<td>'.$row['city'].'</td>
				<td>'.$row['blood_group'].'</td>
				<td>'.$row['unit_req'].'</td>
				<td><a href="blood_request_prescription/'.$row['prescription'].'" target="_blank">
					'.$row['prescription'].'</a></td>';

				if($row['req_status'] == 'Approved'){
					echo '<td style="color: #00563B; ">'.$row['req_status'].'</td>
							</tr>';
				}else{
					echo '<td style="color: darkred; ">'.$row['req_status'].'</td>
							</tr>';
				}
				
			}

			?>
		</table>
	</div>

	<a href="bbank_management.php"><i class="fas fa-chevron-circle-left" id="back_arrrow"></i></a>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>