<?php
include "./db_config.php";
session_start();

if(isset($_GET['delete'])){
  $sno = $_GET['delete'];
  
  $sql = "DELETE FROM `inventory_management_receive_item_list` WHERE `id` = $sno";
  $result = mysqli_query($conn, $sql);
  $_SESSION['inventory_receive_delete_item']=true;
      header("location:inventory_management_receive_items.php");
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $item_name = $_POST["item_name"];
    $dealer_name = $_POST["dealer_name"];
    $stock = $_POST["stock"];
    $date = date("d-m-Y");
  // Sql query to be executed
  $sql = "INSERT INTO `inventory_management_receive_item_list` (`item_name`, `dealer_name`, `stock`, `date_of_issue`) VALUES ('$item_name', '$dealer_name', '$stock', '$date')";
  $result = mysqli_query($conn, $sql);
  if($result){ 
      $sql="UPDATE `inventory_management_item_list` SET `stock` = stock+$stock WHERE `item_name` LIKE '%$item_name%'";
      $result = mysqli_query($conn, $sql);
      $_SESSION['inventory_receive_insert_item']=true;
      header("location:inventory_management_receive_items.php");
  }
  else{
      echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
  } 
}
?>