<?php
require "db_config.php";
session_start();

$name=$_SESSION['admin_name'];

$did=$_GET['did'];
$pid=$_GET['pid'];
$pname=$_GET['pname'];
$ward=$_GET['ward'];
$room=$_GET['room'];
$bed=$_GET['bed'];
$admitdate=$_GET['admitdate'];
$newDate1 = date("d-m-Y", strtotime($admitdate));
$disdate=$_GET['disdate'];
$newDate2 = date("d-m-Y", strtotime($disdate));
$health_issue=$_GET['health'];

$diff=date_diff(date_create($admitdate),date_create($disdate));
$days= $diff->format('%a')+1;


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Discharge Bill</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   
	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	
	<link href="https://fonts.googleapis.com/css2?family=Passions+Conflict&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet"> 

    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@800&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Quintessential&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+P+One&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@800&display=swap" rel="stylesheet">  

    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">  
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Display:ital,wght@1,500&display=swap" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css2?family=Supermercado+One&display=swap" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
	
  

    <script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/discharge_bills.css">

</head>
<body>
              <?php include 'includes/admin_navbar.php'?>
   
              <h1 id="header">Discharge Summary</h1>

              <div class="details">
                  <p><b>Patient ID :</b> <?php echo $pid;?></p>
                  <p><b>Patient Name :</b> <?php echo $pname;?></p></p>
                  <p><b>Health Issue :</b> <?php echo $health_issue;?></p></p>
                  <p><b>Ward Catgory :</b> <?php echo $ward;?></p></p>
                  <p><b>Room / Bed No :</b> <?php echo $room.' / '.$bed;?></p></p>
                  <p><b>Admitted Date :</b> <?php echo $newDate1;?></p>
                  <p><b>Discharged Date :</b>  <?php echo $newDate2;?></p>
                  <p><b>No Of Days Spent :</b> <?php echo $days.' days';?></p>
              </div>
    <?php
    
    // ward charge
    $query1="SELECT * from wards where ward_name='$ward'";
    $result1=mysqli_query($conn,$query1);
    $row1 = mysqli_fetch_assoc($result1);
    // retrieving bed id
    $query2="SELECT bed_id from beds where bed_number='$bed'";
    $result2=mysqli_query($conn,$query2);
    $row2 = mysqli_fetch_assoc($result2);
    $bid=$row2['bed_id'];
    // doctor fees
    $query3= "select b.visit from discharge_bed a inner join doc_dep b on a.doctor_id=b.doc_id where a.patient_id='$pid' and
     a.bed_id='$bid'";
    $result3=mysqli_query($conn,$query3);
    $row3 = mysqli_fetch_assoc($result3);


    ?>
    <div class="myform">
    <form method="POST" action="discharge-bill-pdf.php">
            <div class="form-group">
                 <label class="form-heading" for="mode_of_payment">Mode of Payment :</label>
                 <select class="custom-select form-control inpt-box" id="mode_of_payment" name="mode_of_payment" required>
                    <option value="none" selected disabled hidden>--SELECT--</option>
                    <option value="Cash">Cash</option>
                    <option value="Online">Online</option>
                 </select>
            </div>
           <div class="form-group">
                 <label class="form-heading" for="bed_charge">Bed Charge Per Day :</label>
                 <input type="number" class="form-control inpt-box" id="bed_charge" name="bed_charge" value="<?php echo $row1['charges per day']; ?>" readonly>
            </div>
            <div class="form-group">
                 <label class="form-heading" for="doc_charge">Doctor Consultation Fee(Visit):</label>
                 <input type="number" class="form-control inpt-box" id="doc_charge" name="doc_charge" value="<?php echo $row3['visit']; ?>" readonly>
            </div>
            <div class="form-group">
                 <label class="form-heading" for="nurse_charge">Nursing Fees(per day):</label>
                 <input type="number" class="form-control inpt-box" id="nurse_charge" name="nurse_charge"  required>
            </div>
            <div class="form-group">
                 <label class="form-heading" for="med_cost">Medicine Cost(per day):</label>
                 <input type="number" class="form-control inpt-box" id="med_cost" name="med_cost" required>
            </div>
            <div class="form-group">
                 <label class="form-heading" for="consume">Consumables cost(per day):</label>
                 <input type="number" class="form-control inpt-box" id="consume" name="consumables" required>
            </div>

            <fieldset class="form-group border p-3 field_set">
                                <legend class="w-auto px-2 form-heading" style="width:auto">Operation Theatre:</legend>
                                <div class="form-group">
                                    <label class="form-heading" for="surgery">Surgeon Fees:</label>
                                    <input type="number" class="form-control inpt-box" id="surgery"  name="surgery" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-heading" for="anst">Anaesthesia Fees:</label>
                                    <input type="number" class="form-control inpt-box" id="anst" name="anst_charge" required >
                                </div>
                                <div class="form-group">
                                    <label class="form-heading" for="OT_charge">OT charges:</label>
                                    <input type="number" class="form-control inpt-box" id="OT_charge" name="OT_charge" required>
                                </div>
             </fieldset>

             <input type="text" name="patient_id" value="<?php echo "$pid"; ?>" hidden>
		     <input type="text" name="patient_name" value="<?php echo "$pname"; ?>" hidden>
             <input type="text" name="discharge_id" value="<?php echo "$did"; ?>" hidden>
		    <input type="text" name="ward_name" value="<?php echo "$ward"; ?>" hidden>
            <input type="text" name="room_no" value="<?php echo "$room"; ?>" hidden>
            <input type="text" name="bed_no" value="<?php echo "$bed"; ?>" hidden>
            <input type="text" name="admit_date" value="<?php echo "$admitdate"; ?>" hidden>
            <input type="text" name="discharge_date" value="<?php echo "$disdate"; ?>" hidden>
            <input type="text" name="bed_id" value="<?php echo "$bid"; ?>" hidden>
            <input type="text" name="health" value="<?php echo "$health_issue"; ?>" hidden>
            

             <button type="submit" class="btn btn-primary mybtn mb-4"><i class="fas fa-file-invoice"></i>Generate Bill</button>

    </form>
    
    </div>



 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>