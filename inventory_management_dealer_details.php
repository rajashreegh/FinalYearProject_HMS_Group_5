<?php  
session_start();
include "./db_config.php";
$name=$_SESSION['admin_name'];
$insert = $_SESSION['inventory_dealer_insert_item'];
$update = $_SESSION['inventory_dealer_update_item'];
$delete = $_SESSION['inventory_dealer_delete_item'];
$repeat = $_SESSION['inventory_dealer_repeat_item'];
?>
<?php include 'includes/admin_navbar.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
  
	<title>Admin | Inventory Management | Dealer Details | CareVista</title>
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
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/6f842bd7b8.js" crossorigin="anonymous"></script>
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
          <h5 class="modal-title" id="editModalLabel">Edit dealer details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="inventory_management_dealer_details_functionalities.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="snoEdit" id="snoEdit">
            
            <div class="form-group">
        <label for="name">Dealer Name</label>
        <input type="text" class="form-control" id="dealer_name_edit" name="dealer_name_edit" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label for="name">Dealer email</label>
        <input type="text" class="form-control" id="dealer_email_edit" name="dealer_email_edit" aria-describedby="emailHelp">
      </div>

      <div class="form-group">
        <label for="name">Contact No.</label>
        <input type="text" class="form-control" id="dealer_contact_edit" name="dealer_contact_edit" aria-describedby="emailHelp">
      </div>
      
      <div class="form-group">
        <label for="stock">Type of item it delivers</label>
        <select class="form-control" name="dealer_item_type_edit" id="dealer_item_type_edit">
         <option value="">---Select Item type---</option>
        <option value="Medicine">Medicine</option>
        <option value="Surgery Equipment">Surgery Equipment</option>
        <option value="Lab Test Device">Lab Test Device</option>
        <option value="Wheel chair">Wheel chair</option>
        <option value="Ambulance">Ambulance</option>
        <option value="Syringe">Syringe</option>
        <option value="Other">Other</option>
        </select>
      </div>

    <div class="modal-footer d-block mr-auto">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
  if($insert){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> New Dealer record has been inserted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  $_SESSION['inventory_dealer_insert_item']=false;
  }
  ?>
  <?php
  if($delete){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Dealer record has been deleted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  $_SESSION['inventory_dealer_delete_item']=false;
  }
  ?>
  <?php
  if($update){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Dealer record has been updated successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  $_SESSION['inventory_dealer_update_item']=false;
  }
  ?>
    <?php
  if($repeat){
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Error!</strong> Dealer record is already in the database
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  $_SESSION['inventory_dealer_repeat_item']=false;
  }
  ?>
  <div class="container my-4">
    <h2 style="text-align:center;text-decoration:none"><i class="fa-solid fa-house-chimney-medical"></i>&nbsp; Add new Dealer &nbsp;<i class="fa-solid fa-house-chimney-medical"></i></h2>
    <form action="inventory_management_dealer_details_functionalities.php" method="POST">
    <div class="form-group">
        <label for="name">Dealer name</label>
        <input type="text" class="form-control" id="dealer_name" name="dealer_name" aria-describedby="emailHelp">
      </div>

      <div class="form-group">
        <label for="name">Dealer email</label>
        <input type="text" class="form-control" id="dealer_email" name="dealer_email" aria-describedby="emailHelp">
      </div>

      <div class="form-group">
        <label for="name">Contact No.</label>
        <input type="text" class="form-control" id="dealer_contact" name="dealer_contact" aria-describedby="emailHelp">
      </div>

      <div class="form-group">
        <label for="stock">Type of item it delivers</label>
        <select class="form-control" name="dealer_item_type" id="dealer_item_type">
         <option value="">---Select Item type---</option>
        <option value="Medicine">Medicine</option>
        <option value="Surgery Equipment">Surgery Equipment</option>
        <option value="Lab Test Device">Lab Test Device</option>
        <option value="Wheel chair">Wheel chair</option>
        <option value="Ambulance">Ambulance</option>
        <option value="Syringe">Syringe</option>
        <option value="Other">Other</option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary">Add Dealer</button>
    </form>
  </div>

  <div class="container my-4">


    <table class="table" id="myTable">
      <thead>
        <tr>
          <th scope="col">S.No</th>
          <th scope="col">Dealer name</th>
          <th scope="col">Dealer email</th>
          <th scope="col">Contact</th>
          <th scope="col">Item Type</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $sql = "SELECT * FROM `inventory_management_dealer_list`";
          $result = mysqli_query($conn, $sql);
          $sno = 0;
          while($row = mysqli_fetch_assoc($result)){
            $sno = $sno + 1;
            echo "<tr>
            <th scope='row'>". $sno . "</th>
            <td>". $row['dealer_name'] . "</td>
            <td>". $row['dealer_email'] . "</td>
            <td>". $row['dealer_contact'] . "</td>
            <td>". $row['dealer_item_type'] . "</td>
            <td> <button class='edit btn btn-sm btn-primary m-1' id=".$row['dealer_id'].">Edit</button> <button class='delete btn btn-sm btn-danger m-1' id=d".$row['dealer_id'].">Delete</button>  </td>
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
        dealer_name = tr.getElementsByTagName("td")[0].innerText;
        dealer_email = tr.getElementsByTagName("td")[1].innerText;
        dealer_contact = tr.getElementsByTagName("td")[2].innerText;
        dealer_item_type = tr.getElementsByTagName("td")[3].innerText;
        console.log(dealer_name,dealer_email,dealer_contact,dealer_item_type);
        dealer_name_edit.value = dealer_name;
        dealer_email_edit.value = dealer_email;
        dealer_contact_edit.value = dealer_contact;
        dealer_item_type_edit.value = dealer_item_type;
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
          window.location = `inventory_management_dealer_details_functionalities.php?delete=${sno}`;
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