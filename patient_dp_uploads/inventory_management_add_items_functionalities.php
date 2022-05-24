<?php
include "./db_config.php";
session_start();

if(isset($_GET['delete'])){
  $sno = $_GET['delete'];
  
  $sql = "DELETE FROM `inventory_management_item_list` WHERE `item_number` = $sno";
  $result = mysqli_query($conn, $sql);
  $_SESSION['inventory_delete_item']=true;
      header("location:inventory_management_add_items.php");
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
if (isset( $_POST['snoEdit'])){
  // Update the record
    $sno = $_POST["snoEdit"];
    $item_name = $_POST["item_name_edit"];
    $item_type = $_POST["item_type_edit"];
    $stock = $_POST["stock_edit"];
    $stock_value = $_POST["stock_value"];
    $desc = $_POST["desc_edit"];
    
  if($stock<=$stock_value){
  // Sql query to be executed
  $sql = "UPDATE `inventory_management_item_list` SET `item_name` = '$item_name', `item_type` = '$item_type', `stock` = '$stock', `description` = '$desc' WHERE `inventory_management_item_list`.`item_number` = $sno";
  $result = mysqli_query($conn, $sql);
  if($result){
    $_SESSION['inventory_update_item']=true;
    header("location:inventory_management_add_items.php");
}     
else{
    echo "We could not update the record successfully";
}
}
else{
$_SESSION['inventory_stock_error_item']=true;
header("location:inventory_management_add_items.php");

}

}
else{
    $item_name = $_POST["item_name"];
    $item_type = $_POST["item_type"];
    $description = $_POST["desc"];
    $sql="SELECT * FROM `inventory_management_item_list` WHERE `item_name` LIKE '%$item_name%' AND `item_type` LIKE '%$item_type%'";
    $result = mysqli_query($conn, $sql);
    $fetched_result = mysqli_fetch_assoc($result);
    $num_rows = mysqli_num_rows($result);
    if($num_rows==0){

  // Sql query to be executed
  $sql = "INSERT INTO `inventory_management_item_list` (`item_name`, `item_type`, `stock`, `description`) VALUES ('$item_name', '$item_type', '$stock', '$description')";
  $result = mysqli_query($conn, $sql);
  if($result){ 
      $_SESSION['inventory_insert_item']=true;
      header("location:inventory_management_add_items.php");
  }
  else{
      echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
  } 
}
else{
  $_SESSION['inventory_repeat_item']=true;
    header("location:inventory_management_add_items.php");
}
}
}
?>