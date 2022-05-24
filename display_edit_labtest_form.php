<?php

require 'db_config.php';

$test_id=$_GET['test_id'];
$query="SELECT * FROM labtest WHERE id='$test_id'";

$result=mysqli_query($conn,$query);
$fetched_result=mysqli_fetch_assoc($result);

echo '<form action="edit_labtest_details.php" method="POST">
		        	<div class="form-group">
				    	<label for="test_name">Test Name</label>
				    	<input type="text" class="form-control" name="test_name" id="test_name" value="'.$fetched_result['test_name'].'" readonly>
				  	</div>
				  	<div class="form-row" style="margin-bottom: 3%;">
				    	<div class="form-group col-md-6">
				      		<label for="rate">Rate</label>
				      		<input type="text" class="form-control" name="rate" id="rate" value="'.$fetched_result['rate'].'">
				    	</div>
				    	<div class="form-group col-md-6">
				      		<label for="room">Room No.</label>
				      		<input type="text" class="form-control" name="room" id="room" value="'.$fetched_result['room_no'].'">
				    	</div>
				  	</div>
				  	<div class="form-row">
				    	<div class="form-group col-md-3">
				      		<label for="male_min">Minimum [Male]</label>
				      		<input type="number" class="form-control" name="male_min" id="male_min" value="'.$fetched_result['male_min'].'" step="any">
				    	</div>
				    	<div class="form-group col-md-3">
				      		<label for="male_max">Maximum [Male]</label>
				      		<input type="number" class="form-control" name="male_max" id="male_max" value="'.$fetched_result['male_max'].'" step="any">
				    	</div>
				    	<div class="form-group col-md-3">
				      		<label for="female_min">Minimum [Female]</label>
				      		<input type="number" class="form-control" name="female_min" id="female_min" value="'.$fetched_result['female_min'].'" step="any">
				    	</div>
				    	<div class="form-group col-md-3">
				      		<label for="female_max">Maximum [Female]</label>
				      		<input type="number" class="form-control" name="female_max" id="female_max" value="'.$fetched_result['female_max'].'" step="any">
				    	</div>
				  	</div>
				  
				  	<input type="hidden" name="test_id" value="'.$test_id.'">

				  <input type="submit" name="" class="btn btn-block btn-dark" value="Save Changes" style="margin-top:4%;">
				</form>';

?>