<?php

require "db_config.php";

session_start();

$name = $_SESSION['patient_name'];
$email=$_SESSION['patient_email'];
$patient_id = $_SESSION['patient_id'];

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>LabTests Available | CareVista</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/labtest.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Outfit:wght@400;500&family=Roboto+Slab:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Permanent+Marker&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Signika&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>

</head>
<body>

	<?php include 'includes/patient_navbar.php';?>

	<?php

		$query = "SELECT DISTINCT(category) AS CATEGORIES FROM labtest";
		$result = mysqli_query($conn,$query);
		while($row=mysqli_fetch_assoc($result)){
			echo '<div class="test-category-box">
					<div class="category">
						<h3>'.$row['CATEGORIES'].'</h3>
					</div>
					<div class="tests">';

			$category_name = $row['CATEGORIES'];

			$query1 = "SELECT * FROM labtest WHERE category LIKE '$category_name'";
			$result1 = mysqli_query($conn,$query1);
			while($row1=mysqli_fetch_assoc($result1)){

				$originalDate = $row1['test_date'];
				$newDate = date("d-m-Y", strtotime($originalDate));

				echo'<div class="box">
							<h4>'.$row1['test_name'].'</h4>
							<div class="content">
								<p style="margin-left:20px;">Rs. <b>'.$row1['rate'].'</b></p>
								<p>Room no.: <b>'.$row1['room_no'].'</b></p>
								<p>Date: <b>'.$newDate.'</b></p>
								<button class="btn btn-warning test-booking-btn" data-toggle="modal" data-target="#testConfirmationModal" data-id='.$row1['id'].'>Book now</button>
							</div>
						</div>';
			}
			
			echo '</div>';	
			echo '</div>';

			}

		
	?>
	<div class="modal fade" id="testConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header bgclr">
		        <h5 class="modal-title text-white" id="exampleModalLabel">Continue With...</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form action="test_confirmation.php" method="POST">

		        	<i class="far fa-user icon-design"></i><label for="patient_name">Name</label><br>
		        	<input class="inpt-frmt" type="text" name="name" id="patient_name" placeholder="<First_name> <Second_name>" value="<?php echo "$name"; ?>" readonly><br>

		        	<i class="fas fa-envelope-open-text icon-design"></i><label for="mail">Email</label><br>
		        	<input class="inpt-frmt" type="email" name="email" id="patient_mail" placeholder="xyz@gmail.com" value="<?php echo "$email"; ?>" readonly><br>

		        	<i class="fas fa-mobile-alt icon-design"></i><label for="number">Contact Number</label><br>

		        	<?php

			        $query1="SELECT * FROM patient_contact_info WHERE patient_id=$patient_id";

					$result1=mysqli_query($conn,$query1);
					$fetched_result1=mysqli_fetch_assoc($result1);

			        if($fetched_result1['contact_number']!=NULL){
			        	echo '<input class="inpt-frmt" type="number" name="number" id="number" value="'.$fetched_result1['contact_number'].'" required maxlength="10"><br>';
			        }else{
			        	echo '<input class="inpt-frmt" type="number" name="number" id="number" placeholder="Type in contact number" required maxlength="10"><br>';
			        }

			        ?>
		        	
			        <i class="fas fa-venus-mars icon-design"></i><label for="Gender">Gender</label>
			        <br>
			        <input type="radio" name="gender" value="Male" id="male"><label for="male" style="margin-right: 4%;">Male</label>
			        <input type="radio" name="gender" value="Female" id="female"><label for="female">Female</label><br>

					<i class="fa fa-credit-card icon-design" aria-hidden="true"></i><label for="payment_mode">Mode of Payment</label>
			        <br>
			        <select class="custom-select form-control" id="payment_mode" name="payment_mode" required>
						<option value="none" selected disabled hidden>--SELECT--</option>
						<option value="Cash">Cash</option>
						<option value="Online">Online</option>
					</select>

		        	<input type="submit" name="" class="btn btn-dark btn-block" value="Continue" style="margin-top:4%">

		        </form>
		      </div>
		    </div>
	  </div>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<script type="text/javascript" src="js/labtest.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>