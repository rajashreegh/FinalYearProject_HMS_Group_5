<?php

session_start();

$name=$_SESSION['admin_name'];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>Generate Labtest Bills</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   
	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	
	<link href="https://fonts.googleapis.com/css2?family=Passions+Conflict&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Playfair+Display+SC:wght@900&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@800&display=swap" rel="stylesheet">  
    <link href="https://fonts.googleapis.com/css2?family=Supermercado+One&display=swap" rel="stylesheet"> 
	
     <script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/generate_bills.css">

</head>
<body>
              <?php include 'includes/admin_navbar.php'?>

			
	        <?php

		   require "db_config.php";

		   $query1= "SELECT a.booking_id,a.booking_done_by,a.booker_id,a.date,a.billing_status,b.test_name,b.category from test_bookings a inner join labtest b on a.test_id=b.id";
           $result1=mysqli_query($conn,$query1);
           $rowcount1=mysqli_num_rows($result1);
		   
		   if($rowcount1!=0)	
		   {	
			echo '<div class="billing-table">
			<table>
				<tr>
				   <th>Patient-ID</th>
				   <th>Patient Name</th>
				   <th>Booking ID</th>
				   <th>Test Category</th>
				   <th>Test Name</th>
				   <th>Date</th>
				   <th>Action</th>
		  
		
			   </tr>';			   
		   while($row1=mysqli_fetch_assoc($result1))
		   {
			   
			   if($row1['billing_status']=="Complete")
			   {
				$booking=$row1['booking_id'];
			    $query2= "SELECT bill_doc from labtest_bill where booking_id='$booking'";
                $result2=mysqli_query($conn,$query2);
				$row2=mysqli_fetch_assoc($result2);
          
				
			   echo '<tr>
			   <td>'.$row1['booking_done_by'].'</td>
			   <td>'.$row1['booker_id'].'</td>
			   <td>'.$row1['booking_id'].'</td>
			   <td>'.$row1['category'].'</td>
			   <td>'.$row1['test_name'].'</td>
			   <td>'.$row1['date'].'</td>
			   <td><a href="labtest bills/'.$row2['bill_doc'].'" target="_blank" class="btn btn-warning mybtn"><i class="fas fa-eye"></i>View Bill</a> </td>
			    </tr>';
		       }
			   else if($row1['billing_status']=="Incomplete")
			   {
				echo '<tr>
				<td>'.$row1['booking_done_by'].'</td>
				<td>'.$row1['booker_id'].'</td>
				<td>'.$row1['booking_id'].'</td>
				<td>'.$row1['category'].'</td>
				<td>'.$row1['test_name'].'</td>
				<td>'.$row1['date'].'</td>
			   <td><a href="labtest-bill-pdf.php?bid='.$row1['booking_id'].'&pid='.$row1['booker_id'].'&pname='.$row1['booking_done_by'].'&type='.$row1['category'].'&test='.$row1['test_name'].'&date='.$row1['date'].'" target="_blank" class="btn btn-danger mybtn"><i class="fas fa-file-invoice"></i>Generate Bill</a> </td>
			    </tr>';
		       }
		  }
		  echo '</table>
		  </div>';
 }
 else{
	 echo '<div class="message">
	 <p>No Records found</p>
	 </div>';
 }

?>       









<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>