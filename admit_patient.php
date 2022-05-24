<?php

session_start();

$name=$_SESSION['admin_name'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin | Admit Patient | CareVista</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   
	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Passions+Conflict&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Sedgwick+Ave&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">  
	<link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+P+One&display=swap" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Display:ital,wght@1,500&display=swap" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css2?family=Supermercado+One&display=swap" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet"> 

	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/admit_patient.css">

	
	
</head>
<body>

<div id="top-bar">
	<h2>Welcome !!! <?php echo "$name"; ?></h2>
	<div id="buttons">
		<a href="admin_dashboard.php" class="btn btn-default">Home</a>
		<a href="logout.php" class="btn btn-default">Logout</a>
	</div>	
</div>
	<nav class="sidebar">
      <div class="text">Patient Admission</div>
      <ul>
        
	    <li class="active">
          <a href="#" onclick="showDashboard()">
		  <i class="fas fa-columns"></i>Dashboard</a>
        <li>
          <a href="#" class="bed-btn">
		  <i class="fas fa-procedures"></i>Bed Management
            <span class="fas fa-caret-down first"></span>
          </a>
          <ul class="bed-show">
            <li><a onclick="showBeds()">View all Beds</a></li>
            <li><a onclick="showRooms()">View all Rooms</a></li>
          </ul>
        </li>
        <li>
          <a href="#" class="admit-btn"><i class="fas fa-sign-in-alt"></i>Admit Patient
            <span class="fas fa-caret-down second"></span>
          </a>
          <ul class="admit-show">
            <li><a onclick="showAllotments()">View Bed Allotments</a></li>
          </ul>
        </li>
		<li>
          <a href="#" class="discharge-btn"> <i class="fas fa-sign-out-alt"></i> Discharge Patients
            <span class="fas fa-caret-down third"></span>
          </a>
          <ul class="discharge-show">
            <li><a onclick="showDischarged()">View Discharged Patients</a></li>
			<li><a onclick="showDischarged1()">Unassign Bed and Discharge</a></li>
          </ul>
		 
        </li>
       
      </ul>
    </nav>
       
      
	  <?php
	      require "db_config.php"; 
		  $query_result1=mysqli_query($conn,"SELECT COUNT(ward_id) FROM wards");
		  $fetched_row1=mysqli_fetch_row($query_result1);
		  $query_result2=mysqli_query($conn,"SELECT COUNT(room_id) FROM rooms");
		  $fetched_row2=mysqli_fetch_row($query_result2);
		  $query_result3=mysqli_query($conn,"SELECT COUNT(bed_id) FROM beds");
		  $fetched_row3=mysqli_fetch_row($query_result3);
		  $query_result4=mysqli_query($conn,"SELECT COUNT(bed_id) FROM beds where bed_assigned_status=1");
		  $fetched_row4=mysqli_fetch_row($query_result4);
		  $query_result5=mysqli_query($conn,"SELECT COUNT(bed_id) FROM beds where bed_assigned_status=0");
		  $fetched_row5=mysqli_fetch_row($query_result5);
		  $query_result6=mysqli_query($conn,"SELECT COUNT(patient_id) FROM patient_login");
		  $fetched_row6=mysqli_fetch_row($query_result6);
		  $query_result7=mysqli_query($conn,"SELECT COUNT(allotment_id) FROM bed_allotments");
		  $fetched_row7=mysqli_fetch_row($query_result7);
		  $query_result8=mysqli_query($conn,"SELECT COUNT(discharge_id) FROM discharge_bed");
		  $fetched_row8=mysqli_fetch_row($query_result8);
		  
		   
      ?>

	  <div class="outer-container" id="content1">
		  <div class="dashboard-box">
		  <img src="IMAGES/image/dashboard-icon1.jpg" alt="">
		  <p>DASHBOARD</p>
		  <img src="IMAGES/image/dashboard-icon2.jpg" alt="">
		  </div>
		  <div class="info-box">
			  <div class="info-content">
				
                <h2>Rooms And Wards</h2>
				<img src="IMAGES/image/ward.jpg"  width="100px" height="100px" id="wardicon" alt="">
				<p>Total Wards :   <?php echo $fetched_row1[0];?> </p>
				<p>Total Rooms :   <?php echo $fetched_row2[0];?></p>
			  </div>
			  <div class="info-content">
			    <h2> Beds </h2>
				<img src="IMAGES/image/bed.png" width="150px" height="100px" class="imgicon" alt="">
				<p>Total Beds :     <?php echo $fetched_row3[0];?></p>
				<p>Occupied Beds :  <?php echo $fetched_row4[0];?> </p>
				<p>Vacant Beds :    <?php echo $fetched_row5[0];?></p>
			  </div>
			  <div class="info-content">
			  <h2> Patients </h2>
			  <img src="IMAGES/image/patient.png" width="150px" height="100px" class="imgicon" alt="">
				<p>Total Patients :       <?php echo $fetched_row6[0];?> </p>
				<p>Admitted Patients :   <?php echo $fetched_row7[0];?></p>
				<p>Discharged Patients:  <?php echo $fetched_row8[0];?></p>  
			  </div>
		  </div>
     </div>
	  <!--Beds table -->
	  <div class="content-box" id="content2">
        
         <div class="header">
	    <h3>List of All Beds</h3>
		<button class="btn btn-primary" id="create_new" data-toggle="modal" data-target="#add_bed"><span class="fas fa-plus"></span>  Add New Bed</button>
		</div>
		<div class="line-break"></div> 

       
	  <table >
        <tr id="row-header">
		   <th>Bed Number</th>
		   <th>Room Number</th>
		   <th>Ward Type</th>
		   <th>Bed Status</th>
           
           
        </tr>
		<?php

			require "db_config.php";

			$query1="select b.bed_number,b.bed_assigned_status,r.room_number,r.ward_type from beds b inner join rooms r on b.room_id=r.room_id order by b.bed_number";
			$result1=mysqli_query($conn,$query1);
			
									
			while($row1=mysqli_fetch_assoc($result1))
			{
				
				$message="";
			    if($row1['bed_assigned_status']==0)
			     { 
				  $message="Available"; 
			     }
			     elseif($row1['bed_assigned_status']==1)
				 {
				   $message="Allotted";
				 }
				echo '<tr>
				<td>'.$row1['bed_number'].'</td>
				<td>'.$row1['room_number'].'</td>
				<td>'.$row1['ward_type'].'</td>
				<td> '.$message.'</td>
				
				</tr>';
			}
		
		?>                       
    </table>
	</div>
     
	<!--Add new Bed Modal -->

	<div class="modal fade" id="add_bed" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header bg-info">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title text-light bg-dark">Add New Bed</h3>
        </div>
        <div class="modal-body">
		 
		<form action="add_bed_details.php" method="POST">

		<i class="fas fa-bed icon"></i><label for="inputbedno">Bed Number</label><br>
        <input class="form-control input-box" type="text" name="bed_number" id="inputbedno" placeholder="For eg:- <B10>" required><br>

		<i class="fas fa-hospital-alt icon"></i><label for="inputwardtype">Ward Type</label><br>
		  <select id="inputwardtype"  name="ward_type" class=" form-control input-box" required>
		          <option value=" " selected hidden>Select the Ward Type</option>
                  <?php

					require "db_config.php";

					$query5 = "SELECT * FROM wards";
					$result5=mysqli_query($conn,$query5);
					while($row5=mysqli_fetch_assoc($result5))
					{
						echo '<option value="'.$row5['ward_name'].'">'.$row5['ward_name'].'</option>';
					}

				?>
			</select>
		  <i class="far fa-hospital icon"></i><label for="inputroom">Room Number</label><br>
		  <select name="room_number" id="inputroom" class=" form-control input-box" required>
		  <option value=" " hidden>Select Ward First</option>
			</select>
			<input type="submit" name="add_bed" class="btn btn-info save-btn" value="Save">

		  </form>
        </div>
        
      </div>
      
    </div>
  </div>
  

	<!--Rooms table -->
	<div class="content-box" id="content3">
        
		<div class="header">
	   <h3>List of All Rooms</h3>
	   <button class="btn btn-primary" id="create_new" data-toggle="modal" data-target="#add_room"  ><span class="fas fa-plus">      </span>  Add New Room</button>
	   </div>
	   <div class="line-break"></div>

	  
	 <table>
	   <tr id="row-header">
	        <th>Room Number</th>
            <th>Ward Type</th>
            <th>Description</th>
            
		  
	   </tr>
	   <?php

		   require "db_config.php";

		   $query2="select room_number,ward_type,description from rooms order by room_number";
		   $result2=mysqli_query($conn,$query2);
		   
								   
		   while($row2=mysqli_fetch_assoc($result2))
		   {
			   
			   
			   echo '<tr>
			   <td>'.$row2['room_number'].'</td>
			   <td>'.$row2['ward_type'].'</td>
			   <td>'.$row2['description'].'</td>
			  
			   
			   </tr>';
		   }
	   
	   ?>                       
   </table>
   </div>

   <!--Add new Room Modal -->
	
	<div class="modal fade" id="add_room" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header bg-info">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title text-light bg-dark">Add New Room</h3>
        </div>
        <div class="modal-body">
		 
		<form action="add_room_details.php" method="POST">

		<i class="fas fa-bed icon"></i><label for="inputroomno">Room Number</label><br>
        <input class="form-control input-box" type="text" name="room_number" id="inputroomno" placeholder="For eg:- <R500>" required>

		<i class="fas fa-hospital-alt icon"></i><label for="inputward">Ward Type</label><br>
		  <select id="inputward"  name="ward_type" class=" form-control input-box" required>
		          <option value=" " selected hidden>Select the Ward Type</option>
				  <?php
				     require "db_config.php";
                     $query5 = "SELECT * FROM wards";
					 $result5=mysqli_query($conn,$query5);
                    while($row5=mysqli_fetch_assoc($result5))
                       {
	                      echo '<option value="'.$row5['ward_name'].'">'.$row5['ward_name'].'</option>';
                       }

                  ?>
		  </select>
		  <i class="fas fa-file-medical icon"></i><label for="inputdesc">Description</label><br>
		  <input class="form-control input-box" type="text" name="description" id="inputdesc" placeholder="Enter the purpose of the selected room" required>
			<input type="submit" name="add_room" class="btn btn-info save-btn" value="Save">

		  </form>
        </div>
        
      </div>
      
    </div>
  </div>
       <!--Bed Allotments table -->
	  <div class="content-box" id="content4">
        
		<div class="header">
	   <h3>List of All Admitted Patients</h3>
	   <button class="btn btn-primary" id="create_new" data-toggle="modal" data-target="#admit_patient"><span class="fas fa-plus"></span>  Admit New Patient</button>
	   </div>
	   <div class="line-break"></div> 

	  
	 <table >
	   <tr id="row-header">
		  <th>Patient Id</th>
		  <th>Patient Name</th>
		  <th>Ward Type</th>
		  <th>Room Number</th>
		  <th>Bed Number</th>
		  <th>Admitted Date</th>
	   </tr>
	   <?php

		   require "db_config.php";

		   $query4="select p.patient_id,p.patient_name,b.bed_number,r.room_number,r.ward_type,ba.admitted_date from patient_login p inner join bed_allotments ba on p.patient_id=ba.patient_id inner join beds b on ba.bed_id=b.bed_id inner join rooms r on b.room_id=r.room_id";
		   $result4=mysqli_query($conn,$query4);
		   
								   
		   while($row4=mysqli_fetch_assoc($result4))
		   {
			   
			  
			   echo '<tr>
			   <td>'.$row4['patient_id'].'</td>
			   <td>'.$row4['patient_name'].'</td>
			   <td>'.$row4['ward_type'].'</td>
			   <td>'.$row4['room_number'].'</td>
			   <td>'.$row4['bed_number'].'</td>
			   <td>'.$row4['admitted_date'].'</td>
			  
			   
			   </tr>';
		   }
	   
	   ?>                       
   </table>
   </div>

    <!--Admit Patient Modal -->
	
	<div class="modal fade" id="admit_patient" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header bg-info">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title text-light bg-dark">Admit New Patient</h3>
        </div>
        <div class="modal-body">
		 
		<form action="add_bed_allotment_details.php" method="POST">

		<i class="fas fa-user-tie icon"></i><label for="inputpatient">Patient Name</label><br>
        <input class="form-control input-box" type="text" name="patient_name" id="inputpatient" placeholder="Enter Patient to be Admitted" required>
		<i class="fas fa-hospital-alt icon"></i><label for="ward">Ward Type</label><br>
        <select id="ward"  name="ward_type" class=" form-control input-box">
		          <option value=" " selected hidden>Select the Ward Type</option>
				  <?php
				     require "db_config.php";
                     $query5 = "SELECT * FROM wards";
					 $result5=mysqli_query($conn,$query5);
                    while($row5=mysqli_fetch_assoc($result5))
                       {
	                      echo '<option value="'.$row5['ward_name'].'">'.$row5['ward_name'].'</option>';
                       }

                  ?>
		  </select>
		  <i class="far fa-hospital icon"></i><label for="room">Room Number</label><br>
		  <select name="room_number" id="room" class=" form-control input-box" required>
		  <option value=" " hidden>Select Ward First</option>
		 
		</select>

			<i class="fas fa-bed icon"></i><label for="bed">Bed Number</label><br>
			<select name="bed_number" id="bed" class=" form-control input-box" required>
			<option value=" " hidden>Select Room First</option>
			 </select>
	  
		<i class="fas fa-medkit icon"></i><label for="inputissue">Health Issue of the Patient </label><br>
		<input class="form-control input-box" type="text" name="health_issue" id="inputissue" placeholder="Mention the Health Issue Patient is admitted for" required>
		
		<i class="fas fa-user-md icon"></i><label for="inputdoc"> Doctor In-Charge </label><br>
		<input class="form-control input-box" type="text" name="doctor_name" id="inputdoc" placeholder="Mention the doctor under whom patient is to be admitted" required>

		<i class="fas fa-calendar-alt icon"></i><label for="admit_date">Admitted Date</label><br>
		  <input class="form-control input-box" type="date" name="admitted_date" id="admit_date" placeholder="Enter date when the patient is getting admitted" required>
			<input type="submit" name="add_bed_allotments" class="btn btn-info save-btn" value="Save">

		  </form>
        </div>
        
      </div>
      
    </div>
  </div>

    <!--Discharged Patients table -->
	<div class="content-box" id="content5">
        
		<div class="header">
	   <h3>List of All Discharged Patients</h3>
		</div>
	   <div class="line-break"></div> 

	  
	 <table >
	   <tr id="row-header">
		  <th>Patient Id</th>
		  <th>Patient Name</th>
		  <th>Ward Type</th>
		  <th>Room Number</th>
		  <th>Bed Number</th>
		  <th>Admitted Date</th>
		  <th>Discharged Date</th>
	   </tr>
	   <?php

		   require "db_config.php";

		   $query6="select p.patient_id,p.patient_name,b.bed_number,r.room_number,r.ward_type,db.admitted_date,db.discharge_date from patient_login p inner join discharge_bed db on p.patient_id=db.patient_id inner join beds b on db.bed_id=b.bed_id inner join rooms r on b.room_id=r.room_id";
		   $result6=mysqli_query($conn,$query6);
		   
								   
		   while($row6=mysqli_fetch_assoc($result6))
		   {
			   
			  
			   echo '<tr>
			   <td>'.$row6['patient_id'].'</td>
			   <td>'.$row6['patient_name'].'</td>
			   <td>'.$row6['ward_type'].'</td>
			   <td>'.$row6['room_number'].'</td>
			   <td>'.$row6['bed_number'].'</td>
			   <td>'.$row6['admitted_date'].'</td>
			   <td>'.$row6['discharge_date'].'</td>
			  
			   
			   </tr>';
		   }
	   
	   ?>                       
   </table>
   </div>

    <!-- Discharge Patient Form -->

	<div class="content-box" id="content6">
      
	<div class="outer-div">
        <div class="logo">
            <img src="IMAGES/image/discharge-icon.png" width="150px" height="150px" alt="">
        </div>
        
        <div class="fields">
          <form action="discharge_patient_details.php" method="POST">
            
            <i class="fas fa-user-tie icon"></i><label for="inputpatient1">Patient Name</label><br><br>
            <input class="form-control form-input-box" type="text" name="patient_name" id="inputpatient1" placeholder="Enter Patient To be Discharged" required> <br>
            <i class="fas fa-bed icon"></i><label for="bedno">Bed Number </label><br><br>
            <input class="form-control form-input-box" type="text" name="bed_number" id="bedno" placeholder="For eg:- B10,B11" required><br>
            <i class="fas fa-calendar-alt icon"></i><label for="disc_date">Discharge Date</label><br><br>
		  <input class="form-control form-input-box" type="date" name="discharge_date" id="disc_date" placeholder="Enter date when the patient is getting discharged" required>

          <input type="submit" name="discharge-patient" class="discharge-button" value="Discharge Patient">
            
        </form>
       </div>
        
    </div>

	</div>
	
	
    <script>
    
      $('.bed-btn').click(function(){
        $('nav ul .bed-show').toggleClass("show");
        $('nav ul .first').toggleClass("rotate");
      });
      $('.admit-btn').click(function(){
        $('nav ul .admit-show').toggleClass("show1");
        $('nav ul .second').toggleClass("rotate");
      });
	  $('.discharge-btn').click(function(){
        $('nav ul .discharge-show').toggleClass("show2");
        $('nav ul .third').toggleClass("rotate");
      });
      $('nav ul li').click(function(){
        $(this).addClass("active").siblings().removeClass("active");
      });
    </script>
<script>
$(document).ready(function() {

/* Selecting Room number based on Ward Type */
$('#inputwardtype').on('change', function() {
var selected_wardtype = this.value;
$.ajax({
url: "room-by-wardtype.php",
type: "POST",
data: {
selected_wardtype : selected_wardtype
},
success: function(data){
$("#inputroom").html(data);
}
});
});	

/* Selecting Room number based on Ward Type */
$('#ward').on('change', function() {
var selected_ward = this.value;
$.ajax({
url: "room-by-ward.php",
type: "POST",
data: {
selected_ward : selected_ward
},
success: function(data){
$("#room").html(data);
}
});
});	
	
/* Selecting Bed number based on Room Number */
$('#room').on('change', function() {
var selected_room = this.value;
$.ajax({
url: "bed-by-room.php",
type: "POST",
data: {
selected_room : selected_room
},
success: function(data){
$("#bed").html(data);

}
});
});



});
</script>
    <!-- SweetAlert Popup -->
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

      <!-- for adding room -->
	 <?php
	 if(isset($_SESSION['status']) && $_SESSION['status'] !='')
	 {
        ?>
        <script>
		swal({
               title: "<?php echo $_SESSION['status'];?>",
               //text: "You clicked the button!",
               icon: "<?php echo $_SESSION['status_code'];?>",
               button: "Ok..Done!",
            });
		</script>
	<?php
	
	unset($_SESSION['status']);
	 }
	?>
	<!-- for adding bed -->
	<?php
	 if(isset($_SESSION['status1']) && $_SESSION['status1'] !='')
	 {
        ?>
        <script>
		swal({
               title: "<?php echo $_SESSION['status1'];?>",
               //text: "You clicked the button!",
               icon: "<?php echo $_SESSION['status_code1'];?>",
               button: "Ok..Done!",
            });
		</script>
	<?php
	
	unset($_SESSION['status1']);
	 }
	?>
	<!-- for admitting patient -->
	<?php
	 if(isset($_SESSION['status2']) && $_SESSION['status2'] !='')
	 {
        ?>
        <script>
		swal({
               title: "<?php echo $_SESSION['status2'];?>",
               //text: "You clicked the button!",
               icon: "<?php echo $_SESSION['status_code2'];?>",
               button: "Ok..Done!",
            });
		</script>
	<?php
	
	unset($_SESSION['status2']);
	 }
	?>
	<!-- for discharging patient -->
	<?php
	 if(isset($_SESSION['status3']) && $_SESSION['status3'] !='')
	 {
        ?>
        <script>
		swal({
               title: "<?php echo $_SESSION['status3'];?>",
               //text: "You clicked the button!",
               icon: "<?php echo $_SESSION['status_code3'];?>",
               button: "Ok..Done!",
            });
		</script>
	<?php
	
	unset($_SESSION['status3']);
	 }
	?>

	 
     
    <script src="js/admit_patient_tables.js"></script>
	
	 <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>
</html>
