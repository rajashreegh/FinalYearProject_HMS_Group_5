<?php

session_start();

$name=$_SESSION['admin_name'];
require 'db_config.php';

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Previous labtest bookings</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/view_prev_test_report_admin.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Passions+Conflict&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Roboto+Serif:ital,wght@0,500;1,500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@600&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@600&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,600;1,600&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">



	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
</head>
<body>

	<?php include 'includes/admin_navbar.php'?>

	<?php

	$query="SELECT COUNT(*) AS no_total_bookings FROM test_bookings";
	$result=mysqli_query($conn,$query);
	$fetched_result=mysqli_fetch_assoc($result);
	$no_total_bookings=$fetched_result['no_total_bookings'];

	$query1="SELECT COUNT(*) AS t1 FROM labtest_report_ba";
	$result1=mysqli_query($conn,$query1);
	$fetched_result1=mysqli_fetch_assoc($result1);
	$t1=$fetched_result1['t1'];

	$query2="SELECT COUNT(*) AS t2 FROM labtest_report_di";
	$result2=mysqli_query($conn,$query2);
	$fetched_result2=mysqli_fetch_assoc($result2);
	$t2=$fetched_result2['t2'];
	
	$t=$t1+$t2;

	?>

	<div id="first">
		<h1 class="heading" style="font-size: 3.2rem;">Total labtest bookings till date: <?php echo $no_total_bookings; ?></h1>
		<h2 class="heading" style="font-size: 2.7rem;">Total reports generated: <?php echo $t; ?></h2>
	</div>

	<div id="filter_opts"></div>

	<div id="filter">
		<button style="border: none;cursor: pointer;" data-toggle="modal" data-target="#filterModal"><img src="IMAGES/img/filter.png"></button>
		<span>Filter</span>
	</div>


	<div id="search_box">
		<i class="fas fa-search" id="search_icon"></i>
		<hr>
		<i class="fas fa-times" id="dlt_search"></i>
		<input type="search" name="" id="search_topic" placeholder="<booking-id/name/date>">
	</div>

	<table style="width:95%; margin:auto;margin-bottom: 1%;">
		<thead>
			<tr>
				<th>Booking ID</th>
				<th>Patient Name</th>
				<th>Test Name</th>
				<th>Date</th>
				<th>Amount</th>
				<th>Reports</th>
				<th>Document</th>
			</tr>
		</thead>
		<tbody id="table_body">
			<?php

			$query3="SELECT * FROM labtest_report_ba b INNER JOIN test_bookings t 
					ON b.booking_id=t.booking_id INNER JOIN labtest l ON t.test_id=l.id";
			$result3=mysqli_query($conn,$query3);
			while($row=mysqli_fetch_assoc($result3)){
				echo '<tr>

							<td>'.$row['booking_id'].'</td>
							<td>'.$row['booking_done_by'].'</td>
							<td>'.$row['test_name'].'</td>';
							$newDate = date("d-m-Y", strtotime($row['date']));
					echo	'<td>'.$newDate.'</td>
							<td>'.$row['amount'].'</td>
							<td><a href="download_ba_report.php?b_id='.$row['booking_id'].'" target="_blank">View Report</a></td>
							<td>---</td>
					</tr>';
			}

			$query4="SELECT * FROM labtest_report_di d INNER JOIN test_bookings t 
					ON d.booking_id=t.booking_id INNER JOIN labtest l ON t.test_id=l.id";
			$result4=mysqli_query($conn,$query4);
			while($row=mysqli_fetch_assoc($result4)){
				echo '<tr>

							<td>'.$row['booking_id'].'</td>
							<td>'.$row['booking_done_by'].'</td>
							<td>'.$row['test_name'].'</td>';
							$newDate = date("d-m-Y", strtotime($row['date']));
					echo	'<td>'.$newDate.'</td>
							<td>'.$row['amount'].'</td>
							<td><a href="download_di_report.php?b_id='.$row['booking_id'].'" target="_blank">View Report</a></td>
							<td><a href="diagonistic_imaging_documents/'.$row['docs'].'" target="_blank">'.$row['docs'].'</a></td>
					</tr>';
			}

			?>
		</tbody>
	</table>

	<a href="generate_lab_report.php"><i class="fas fa-chevron-circle-left" id="back_arrrow"></i></a>

	<div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Choose the filters to apply: :</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">

		      		<div class="form-row">
				    	<div class="form-group col-md-6">
				      		<input type="checkbox" id="ba" name="ba" value="Blood Analysis">
							<label for="ba"> Blood Analysis</label><br>
				    	</div>
				    	<div class="form-group col-md-6">
				      		<input type="checkbox" id="di" name="di" value="Diagonistic Imaging">
							<label for="di"> Diagonistic Imaging</label><br>
				    	</div>
				  	</div>

		      		<?php

		      		$arr=array();

		      		$query_0="SELECT test_name FROM labtest";
		      		$result_0=mysqli_query($conn,$query_0);
		      		$total=mysqli_num_rows($result_0);
		      		$total=$total-2;

		      		$query_1="SELECT test_name FROM labtest LIMIT 2";
		      		$result_1=mysqli_query($conn,$query_1);

		      		echo '<div class="form-row">';

		      		while($row=mysqli_fetch_assoc($result_1)){
		      			$arr[]=$row['test_name'];
		      			echo '<div class="form-group col-md-6">
							      	<input type="checkbox" id="'.$row['test_name'].'" name="'.$row['test_name'].'" value="'.$row['test_name'].'">
									<label for="'.$row['test_name'].'"> '.$row['test_name'].'</label><br>
							    </div>';
		      		}
		      		echo	'</div>';

		      		for($i=0;$i<($total/2);$i++){
		      			echo '<div class="form-row">';

		      			$query_2="SELECT test_name FROM labtest WHERE test_name NOT IN ( '" . implode( "', '" , $arr ) . "' ) LIMIT 2";
		      			$result_2=mysqli_query($conn,$query_2);
		      			while($row=mysqli_fetch_assoc($result_2)){
		      				$arr[]=$row['test_name'];
			      			echo '<div class="form-group col-md-6">
								      	<input type="checkbox" id="'.$row['test_name'].'" name="'.$row['test_name'].'" value="'.$row['test_name'].'">
										<label for="'.$row['test_name'].'"> '.$row['test_name'].'</label><br>
								    </div>';
		      			}
		      			echo	'</div>';
		      		}

		      		?>
		      		
		      		<button class="btn btn-primary" id="apply_filter_btn">Apply</button>
		      </div>
		    </div>
	  </div>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<script type="text/javascript" src="js/view_prev_test_report_admin.js"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>