<?php  
session_start();
include "./db_config.php";
$name=$_SESSION['admin_name'];
$insert = $_SESSION['inventory_insert_item'];
$update = $_SESSION['inventory_update_item'];
$delete = $_SESSION['inventory_delete_item'];
$repeat = $_SESSION['inventory_repeat_item'];
$stock=$_SESSION['inventory_stock_error_item'];
?>

<?php include 'includes/admin_navbar.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
  
	<title>Admin | Inventory Management | Add Items | CareVista</title>
  
	<!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Passions+Conflict&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+P+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@1,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,300&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quintessential&display=swap" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  
	<script src="https://kit.fontawesome.com/6f842bd7b8.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
<style>
  *{
    font-family: 'Lobster', cursive;
  }
</style>
</head>
<body>
     <!-- Edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit item details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="inventory_management_add_items_functionalities.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="snoEdit" id="snoEdit">
            
            <div class="form-group">
        <label for="name">Item Name</label>
        <input type="text" class="form-control" id="item_name_edit" name="item_name_edit" aria-describedby="emailHelp">
      </div>
      
      <div class="form-group">
        <label for="stock">Item type</label>
        <select class="form-control" name="item_type_edit" id="item_type_edit">
         <option value="">---Select Item type---</option>
        <option value="Medicine">Medicine</option>
        <option value="Surgery Equipment">Surgery Equipment</option>
        <option value="Lab Test Device">Lab Test Devices</option>
        <option value="Wheel Chair">Wheel chair</option>
        <option value="Ambulance">Ambulances</option>
        <option value="Syringe">Syringes</option>
        <option value="Other">Others</option>
        </select>
      </div>
      <div class="form-group">
        <label for="name">Stock</label>
        <input type="number" class="form-control" id="stock_edit" name="stock_edit" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <input type="hidden" class="form-control" id="stock_value" name="stock_value"  aria-describedby="emailHelp">
      </div>
      <div class="form-group">
              <label for="desc">Description</label>
              <textarea class="form-control" id="desc_edit" name="desc_edit" rows="2"></textarea>
      </div>

           
          </div>
          <div class="modal-footer d-block mr-auto">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>

<?php
  if($insert){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your item has been inserted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  $_SESSION['inventory_insert_item']=false;
  }
  ?>
  <?php
  if($delete){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your item record has been deleted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  $_SESSION['inventory_delete_item']=false;
  }
  ?>
  <?php
  if($update){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your item has been updated successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  $_SESSION['inventory_update_item']=false;
  }
  ?>
    <?php
  if($repeat){
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Error!</strong> Item is already in the database
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  $_SESSION['inventory_repeat_item']=false;
  }
  ?>
    <?php
  if($stock){
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Error!</strong> Updated stock exceed the current stock
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  $_SESSION['inventory_stock_error_item']=false;
  }
  ?>
  <div class="container my-4">
    <h2 style="text-align:center;text-decoration:none"><i class="fa-solid fa-house-chimney-medical"></i>&nbsp; Add new Item &nbsp;<i class="fa-solid fa-house-chimney-medical"></i></h2>
    <form action="inventory_management_add_items_functionalities.php" method="POST">
      <div class="form-group">
        <label for="name">Item Name</label>
        <input type="text" class="form-control" id="item_name" name="item_name" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label for="stock">Item type</label>
        <select class="form-control" name="item_type">
         <option value="">---Select Item type---</option>
         <option value="Medicine">Medicine</option>
        <option value="Surgery Equipment">Surgery Equipment</option>
        <option value="Lab Test Device">Lab Test Device</option>
        <option value="Wheel Chair">Wheel chair</option>
        <option value="Ambulance">Ambulance</option>
        <option value="Syringe">Syringe</option>
        <option value="Other">Other</option>

        </select>
      </div>
      <div class="form-group">
              <label for="desc">Description</label>
              <textarea class="form-control" id="desc" name="desc" rows="2"></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Add Item</button>
    </form>
  </div>

  <div class="container my-4">


    <table class="table" id="myTable">
      <thead>
        <tr>
          <th scope="col">S.No</th>
          <th scope="col">Item name</th>
          <th scope="col">Item type</th>
          <th scope="col">Stock</th>
          <th scope="col">Description</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $sql = "SELECT * FROM `inventory_management_item_list`";
          $result = mysqli_query($conn, $sql);
          $sno = 0;
          while($row = mysqli_fetch_assoc($result)){
            $sno = $sno + 1;
            echo "<tr>
            <th scope='row'>". $sno . "</th>
            <td>". $row['item_name'] . "</td>
            <td>". $row['item_type'] . "</td>
            <td>". $row['stock'] . "</td>
            <td>". $row['description'] . "</td>
            <td> <button class='edit btn btn-sm btn-primary m-1' id=".$row['item_number'].">Edit</button> <button class='delete btn btn-sm btn-danger m-1' id=d".$row['item_number'].">Delete</button>  </td>
          </tr>";
        } 
          ?>


      </tbody>
    </table>
    <a href="inventory_management_dashboard.php" > <i class="fas fa-arrow-circle-left fa-5x" style="width:100%;text-align:center;color:black"></i></a>
  </div>
  <hr>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();

    });
  </script>
  
  <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        tr = e.target.parentNode.parentNode;
        item_name = tr.getElementsByTagName("td")[0].innerText;
        item_type = tr.getElementsByTagName("td")[1].innerText;
        stock = tr.getElementsByTagName("td")[2].innerText;
        desc = tr.getElementsByTagName("td")[3].innerText;
        console.log(item_name,item_type,stock,desc);
        item_name_edit.value = item_name;
        item_type_edit.value = item_type;
        stock_edit.value = stock;
        desc_edit.value = desc;
        stock_value.value = stock;
        snoEdit.value = e.target.id;
        console.log(e.target.id)
        $('#editModal').modal('toggle');
      })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        sno = e.target.id.substr(1);

        if (confirm("Are you sure you want to delete this record!")) {
          console.log("yes");
          window.location = `inventory_management_add_items_functionalities.php?delete=${sno}`;
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })
  </script>
</body>

</html>