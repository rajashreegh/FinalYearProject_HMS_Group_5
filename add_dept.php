<?php
require "db_config.php";
session_start();

$dept_name = $_POST['dept-name'];

$check_query = "SELECT * FROM departments
                WHERE dept_name = '$dept_name'";
$result = mysqli_query($conn,$check_query);
if(mysqli_num_rows($result)==0){
    $query = "INSERT INTO departments VALUES(NULL,'$dept_name')";

    if(mysqli_query($conn,$query)){
        $_SESSION['status'] = "SUCCESSFUL";
        $_SESSION['status_code'] = "success";
        $_SESSION['status_text'] = "DEPARTMENT ".$dept_name." added successfully";
        header('Location:add_view_department.php');
    }
    else{
        $_SESSION['status'] = "FAILED";
        $_SESSION['status_code'] = "error";
        $_SESSION['status_text'] = "Depatment cannot be added";
        header('Location:add_view_department.php');
    }
}else{
    $_SESSION['status'] = "FAILED!!";
    $_SESSION['status_code'] = "warning";
    $_SESSION['status_text'] = "Depatment already present";
    header('Location:add_view_department.php');
}

?>