<?php

require "db_config.php";

if ($_SERVER['REQUEST_METHOD']=='GET') {
	echo "INVALID URL";
	exit();
}

session_start();

$doc_name = $_POST['name'];
$doc_email=$_POST['email'];
$doc_pswrd=$_POST['password'];

$qualification = $_POST['qualification'];
$dept = $_POST['department'];

$visit = $_POST['visit'];
$floor = $_POST['floor'];

$day_1 = $_POST['day1'];
$time_1 = $_POST['time1'];
$day_2 = '';
$time_2 = '';
$day_3 = '';
$time_3 = '';
if(isset($_POST['day2']) && isset($_POST['time2'])){
    $day_2 = $_POST['day2'];
    $time_2 = $_POST['time2'];
}
if(isset($_POST['day3']) && isset($_POST['time3'])){
    $day_3 = $_POST['day3'];
    $time_3 = $_POST['time3'];
}

$login_query = "INSERT INTO doctor_login VALUES(NULL,'$doc_name','$doc_email','$doc_pswrd')";
if(mysqli_query($conn,$login_query)){

    $query = "SELECT * FROM doctor_login WHERE doctor_email LIKE '$doc_email' AND doctor_pswrd LIKE '$doc_pswrd'";
	$result = mysqli_query($conn,$query);
	$fetched_result = mysqli_fetch_assoc($result);
    $doc_id = $fetched_result['doctor_id'];

    $quali_query = "INSERT INTO doctor_details VALUES(NULL,'$doc_id','$qualification')";
    $dept_query = "INSERT INTO doc_dep VALUES(NULL,'$doc_id','$dept','$visit','$floor')";
    $schedule_query = "INSERT INTO doc_day_time VALUES(NULL,'$doc_id','$day_1','$time_1',3,'$day_2','$time_2',NULL,'$day_3','$time_3',NULL)";
    $personal_query = "INSERT INTO doctor_personal_info VALUES('$doc_id',NULL,NULL,NULL,NULL,NULL,NULL,NULL)";
    $edu_query = "INSERT INTO doc_education_details VALUES('$doc_id',NULL,NULL,NULL,NULL,NULL)";
    $dp_query = "INSERT INTO doctor_profile_pic VALUES('$doc_id','doctor_dp.png')";

    if(mysqli_query($conn,$quali_query) && mysqli_query($conn,$dept_query) && mysqli_query($conn,$schedule_query) && mysqli_query($conn,$personal_query) && mysqli_query($conn,$edu_query) && mysqli_query($conn,$dp_query)){
        $_SESSION['status'] = "SUCCESSFUL";
        $_SESSION['status_code'] = "success";
        $_SESSION['status_text'] = "Dr. ".$doc_name." added";
        header('Location:add_view_update_dctr_details.php');
    
    }
    else{
        $_SESSION['status'] = "FAILED";
        $_SESSION['status_code'] = "error";
        $_SESSION['status_text'] = "Something went wrong. Please try later";
        header('Location:add_view_update_dctr_details.php');
    }
}else{
        $_SESSION['status'] = "FAILED";
        $_SESSION['status_code'] = "error";
        $_SESSION['status_text'] = "Dr. ".$doc_name." cannot be added";
        header('Location:add_view_update_dctr_details.php');
    }




?>