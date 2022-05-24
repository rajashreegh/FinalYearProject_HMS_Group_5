<?php

require "db_config.php";

if(isset($_POST['submit'])){
	$req_id=uniqid();
	$name=$_POST['name'];
	$gender=$_POST['gender'];
	$age=$_POST['age'];
	$city=$_POST['city'];
	$b_group=$_POST['b_group'];
	$unit=$_POST['unit'];
	$mail=$_POST['mail'];
	$number=$_POST['number'];

	$pdf = $_FILES['presc']['name'];
	$pdf_type = $_FILES['presc']['type'];
	$pdf_size = $_FILES['presc']['size'];
	$pdf_tem_loc = $_FILES['presc']['tmp_name'];
	$pdf_store="blood_request_prescription/".$pdf;

	move_uploaded_file($pdf_tem_loc, $pdf_store);

	$query="SELECT * FROM blood_groups WHERE blood_group LIKE '$b_group'";
	$result = mysqli_query($conn,$query);
	$fetched_result=mysqli_fetch_assoc($result);

	if($unit <= $fetched_result['present_units']){

		$updated_unit = $fetched_result['present_units'] - $unit;

		$query1 = "INSERT INTO blood_requests VALUES ('$req_id','$name','$gender',$age,
					'$mail','$number','$city','$b_group',$unit,'$pdf','Approved')";
		mysqli_query($conn,$query1);


		$query2="UPDATE blood_groups SET present_units = '$updated_unit' 
					WHERE blood_group LIKE '$b_group'";
		mysqli_query($conn,$query2);

		header('Location:blood_requistion_final_msg.php?code=1');
	}else{

		$query3 = "INSERT INTO blood_requests VALUES ('$req_id','$name','$gender',$age,
					'$mail','$number','$city','$b_group',$unit,'$pdf','Insufficient Stock')";
		mysqli_query($conn,$query3);

		header('Location:blood_requistion_final_msg.php?code=2');
	}
}

?>