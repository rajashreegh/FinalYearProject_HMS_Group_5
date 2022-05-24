<?php

require "db_config.php";

$name=$_GET['name'];
$gender=$_GET['gender'];
$age=$_GET['age'];
$mail=$_GET['mail'];
$number=$_GET['number'];
$city=$_GET['city'];
$bgroup=$_GET['bgroup'];
$unit=$_GET['unit'];
$disease=$_GET['disease'];

if($bgroup[1]===' '){
	$bgroup=$bgroup[0].'+';
}

$query = "INSERT INTO blood_donor_details(donor_name,gender,age,email,phone_no,city,blood_group,unit_ml,disease,req_status,remarks) 
	VALUES ('$name','$gender',$age,'$mail','$number','$city','$bgroup',$unit,'$disease',
			'Pending',NULL)";

if(mysqli_query($conn,$query)){
	echo("SUCCESS");
}else{
	echo("NOT SUCCESS");
}

?>