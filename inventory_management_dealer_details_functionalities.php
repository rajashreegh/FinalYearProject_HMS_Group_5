<?php
include "./db_config.php";
session_start();

if(isset($_GET['delete'])){
  $sno = $_GET['delete'];
  
  $sql = "DELETE FROM `inventory_management_dealer_list` WHERE `dealer_id` = $sno";
  $result = mysqli_query($conn, $sql);
  $_SESSION['inventory_dealer_delete_item']=true;
      header("location:inventory_management_dealer_details.php");
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
if (isset( $_POST['snoEdit'])){
  // Update the record
    $sno = $_POST["snoEdit"];
    $dealer_name = $_POST["dealer_name_edit"];
    $dealer_email = $_POST["dealer_email_edit"];
    $dealer_contact = $_POST["dealer_contact_edit"];
    $dealer_item_type = $_POST["dealer_item_type_edit"];
    

  // Sql query to be executed
  $sql = "UPDATE `inventory_management_dealer_list` SET `dealer_name` = '$dealer_name', `dealer_email` = '$dealer_email', `dealer_contact` = '$dealer_contact', `dealer_item_type` = '$dealer_item_type' WHERE `inventory_management_dealer_list`.`dealer_id` = $sno";
  $result = mysqli_query($conn, $sql);
  if($result){
    $_SESSION['inventory_dealer_update_item']=true;
    header("location:inventory_management_dealer_details.php");
}     
else{
    echo "We could not update the record successfully";
}
}
else{
    $dealer_name = $_POST["dealer_name"];
    $dealer_email = $_POST["dealer_email"];
    $dealer_contact = $_POST["dealer_contact"];
    $dealer_item_type = $_POST["dealer_item_type"];
    $sql="SELECT * FROM `inventory_management_dealer_list` WHERE `dealer_email` LIKE '%$dealer_email%'";
    $result = mysqli_query($conn, $sql);
    $fetched_result = mysqli_fetch_assoc($result);
    $num_rows = mysqli_num_rows($result);
    if($num_rows==0){

  // Sql query to be executed
  $sql = "INSERT INTO `inventory_management_dealer_list` (`dealer_name`, `dealer_email`, `dealer_contact`, `dealer_item_type`) VALUES ('$dealer_name', '$dealer_email', '$dealer_contact', '$dealer_item_type');";
  $result = mysqli_query($conn, $sql);
  if($result){ 
      $_SESSION['inventory_dealer_insert_item']=true;
      header("location:inventory_management_dealer_details.php");
  }
  else{
      echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
  } 
}
else{
  $_SESSION['inventory_dealer_repeat_item']=true;
    header("location:inventory_management_dealer_details.php");
}
}
}
?>