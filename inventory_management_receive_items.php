<?php  
session_start();
$name=$_SESSION['admin_name'];
$insert =  $_SESSION['inventory_receive_insert_item'];
$delete = $_SESSION['inventory_receive_delete_item'];
include "./db_config.php";
if(!isset($_POST['item_type']))
{
  $item_type="Select item type";
}

?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

  $item_type = $_POST["item_type"];
}
?>
<?php include 'includes/admin_navbar.php'?>
<!doctype html>
<html lang="en">

<head>
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
  <script src="https://kit.fontawesome.com/ff656ede77.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">


  <title>Admin | Inventory Management | Receive Items | CareVista</title>
<style>
    *{
        font-family: 'Lobster', cursive;
    }
</style>
</head>

<body>


  <?php
  if($insert){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Item has been received successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  $_SESSION['inventory_receive_insert_item']=false;
  ?>
  <?php
  if($delete){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Record has been deleted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  $_SESSION['inventory_receive_delete_item']=false;
  ?>
  <div class="container my-4">
    <h2 style="text-align:center;text-decoration:underline">Update the stock</h2>
    <form action="inventory_management_receive_items.php" method="POST">
    <div class="form-group">
        <label for="stock">Type of item it delivers</label>
        <select class="form-control" name="item_type" id="dealer_item_type" onchange="this.form.submit();">
         <option value=""><?php echo "$item_type" ?></option>
        <option value="Medicine">Medicine</option>
        <option value="Surgery Equipment">Surgery Equipment</option>
        <option value="Lab Test Device">Lab Test Device</option>
        <option value="Wheel chair">Wheel chair</option>
        <option value="Ambulance">Ambulance</option>
        <option value="Syringe">Syringe</option>
        <option value="Other">Other</option>
        </select>
      </div>
      </form>
    <form action="inventory_management_receive_items_functionalities.php" method="POST">
    
      <div class="form-group">
    <label for="department">Item name</label>
    <select class="form-control selectpicker" id="item_name" name="item_name" data-live-search="true">
    <?php
    $query = "select * from `inventory_management_item_list` WHERE `item_type` LIKE '%$item_type%'";
    $result = mysqli_query($conn,$query);

    while ($rows = mysqli_fetch_assoc($result)){ 
    
    echo'
    <option value="'.$rows['item_name'].'">'.$rows['item_name'].'</option>';
    
    } 
    ?>
    </select>
  </div>

  <div class="form-group selectpicker">
    <label for="department">Dealer name</label>
    <select class="form-control selectpicker" id="dealer_name" name="dealer_name" data-live-search="true">
    <?php
    $query = "select * from `inventory_management_dealer_list` WHERE `dealer_item_type` LIKE '%$item_type%'";
    $result = mysqli_query($conn,$query);

    while ($rows = mysqli_fetch_assoc($result)){ 
    ?>
    <option value="<?php echo $rows['dealer_name'];?>"><?php echo $rows['dealer_name'];?></option>

    <?php
    } 
    ?>
    </select>
  </div>
  <div class="form-group">
        <label for="name">Stock</label>
        <input type="text" class="form-control" id="stock" name="stock" aria-describedby="emailHelp">
      </div>
      <button type="submit" class="btn btn-primary">Update stock</button>
    </form>
  </div>
  

  <div class="container my-4">


    <table class="table" id="myTable">
      <thead>
        <tr>
          <th scope="col">S.No</th>
          <th scope="col">Item name</th>
          <th scope="col">Dealer name</th>
          <th scope="col">Date of issue</th>
          <th scope="col">Stock</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $sql = "SELECT * FROM `inventory_management_receive_item_list`";
          $result = mysqli_query($conn, $sql);
          $sno = 0;
          while($row = mysqli_fetch_assoc($result)){
            $sno = $sno + 1;
            echo "<tr>
            <th scope='row'>". $sno . "</th>
            <td>". $row['item_name'] . "</td>
            <td>". $row['dealer_name'] . "</td>
            <td>". $row['date_of_issue'] . "</td>
            <td>". $row['stock'] . "</td>
            <td><button class='delete btn btn-sm btn-danger' id=d".$row['id'].">Delete</button>  </td>
          </tr>";
        } 
          ?>


      </tbody>
    </table>
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>

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
        name = tr.getElementsByTagName("td")[0].innerText;
        department = tr.getElementsByTagName("td")[1].innerText;
        email = tr.getElementsByTagName("td")[2].innerText;
        console.log(name, department,email);
        nameEdit.value = name;
        departmentEdit.value = department;
        emailEdit.value = email;
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
          window.location = `inventory_management_receive_items_functionalities.php?delete=${sno}`;
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })
  </script>
   <a href="inventory_management_dashboard.php" > <i class="fas fa-arrow-circle-left fa-5x" style="width:100%;text-align:center;color:black"></i></a>
</body>

</html>
