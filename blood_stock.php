<?php

session_start();

$name=$_SESSION['admin_name'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Blood Stock | CareVista</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/blood_pending_req.css">
	<link rel="stylesheet" type="text/css" href="css/blood_stock.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Passions+Conflict&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500&display=swap" rel="stylesheet">

	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
</head>
<body>

	<?php include 'includes/admin_navbar.php'?>

	<div class="table-box">
		<table style="width:50%; margin: auto; ">
			<tr>
				<th>Blood Group</th>
				<th>Present Units</th>
			</tr>

			<?php

			require "db_config.php";

			$query="SELECT * FROM blood_groups";
			$result=mysqli_query($conn,$query);
			while($row=mysqli_fetch_assoc($result)){
				echo '<tr>
				<td>'.$row['blood_group'].'</td>
				<td>'.$row['present_units'].'</td>
			</tr>';
			}

			?>
		</table>
	</div>


	<div id="add_box">
		<h3>Add Blood Units</h3>
		<button class="btn btn-warning" data-toggle="modal" data-target="#addUnitModal"><i class="fas fa-plus-square"></i></button>
	</div>

	<a href="bbank_management.php"><i class="fas fa-chevron-circle-left" id="back_arrrow"></i></a>

	<div class="modal fade" id="addUnitModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header bgclr">
		        <h5 class="modal-title text-white" id="exampleModalLabel">Add Unit</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form action="add_blood_unit.php" method="POST">

			        <label for="b_groups">Choose your blood group:</label>
					<select name="b_group" id="b_groups" class="inpt-frmt" required>
					<option value="none" selected disabled hidden>Select the blood group</option>
						<?php

							require "db_config.php";

							$query = "SELECT * FROM blood_groups";
							$result=mysqli_query($conn,$query);
							while($row=mysqli_fetch_assoc($result)){
								echo '<option value="'.$row['blood_group'].'">'.$row['blood_group'].'</option>';
							}

						?>
				</select>
				<br>

		        	<label for="unit">Unit of blood required</label>
		    		<input class="inpt-frmt" type="number" name="unit" id="unit"required><br>

		        	<input type="submit" name="" class="btn btn-dark btn-block" value="Add">

		        </form>
		      </div>
		    </div>
	  </div>
	</div>
   
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>