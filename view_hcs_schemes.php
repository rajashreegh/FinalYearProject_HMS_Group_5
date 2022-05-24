<?php

session_start();

$name=$_SESSION['admin_name'];
require 'db_config.php';

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Health Schemes | CareVista</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/view_hcs_schemes.css">

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

	<h2 id="title">Health Card Schemes available:</h2>

	<div id="table_box">
		<table style="width:100%">
			<thead>
				<tr>
					<th>Category</th>
					<th>Type</th>
					<th>Scheme_ID</th>
					<th>Name</th>
					<th>Cverage</th>
					<th>Premium / yearly</th>
				</tr>	
			</thead>
			<tbody>

				<?php 

					$query1 = "SELECT DISTINCT(scheme_category) FROM health_card_schemes";
					$result1= mysqli_query($conn,$query1);
					while($row=mysqli_fetch_assoc($result1)){
						
						$query2= "SELECT COUNT(scheme_id) AS num,scheme_category 
									FROM health_card_schemes 
									WHERE scheme_category LIKE '".$row['scheme_category']."'
									GROUP BY scheme_category";
						$result2=mysqli_query($conn,$query2);
						$fetched_result2=mysqli_fetch_assoc($result2);
						$var = $fetched_result2['num'];

						$query3="SELECT * FROM health_card_schemes 
									WHERE scheme_category LIKE '".$row['scheme_category']."' 
									ORDER BY scheme_id LIMIT 1;";
						$result3=mysqli_query($conn,$query3);
						$fetched_result3=mysqli_fetch_assoc($result3);

						$var1 = $fetched_result3['scheme_id'];

						echo '<tr>
      							<th rowspan="'.$var.'" scope="rowgroup">'.$row['scheme_category'].'</th>
      							<td scope="row">'.$fetched_result3['scheme_type'].'</td>
      							<td>'.$fetched_result3['scheme_id'].'</td>
      							<td>'.$fetched_result3['scheme_name'].'</td>
      							<td>'.$fetched_result3['coverage'].'</td>
      							<td>'.$fetched_result3['premium_yearly'].'</td>
    						</tr>';


    					$query4="SELECT * FROM health_card_schemes 
    								WHERE scheme_category LIKE '".$row['scheme_category']."' 
    								AND scheme_id != '$var1'";
    					$result4=mysqli_query($conn,$query4);
    					while($row1=mysqli_fetch_assoc($result4)){
    						echo '<tr>
      								<td scope="row">'.$row1['scheme_type'].'</td>
      							<td>'.$row1['scheme_id'].'</td>
      							<td>'.$row1['scheme_name'].'</td>
      							<td>'.$row1['coverage'].'</td>
      							<td>'.$row1['premium_yearly'].'</td>
    							</tr>';
    					}

					}	

				?>
					
			</tbody>
		</table>
	</div>

	<a href="add_health_card_schemes_dashboard.php"><i class="fas fa-chevron-circle-left" id="back_arrrow"></i></a>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>