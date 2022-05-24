<?php

session_start();
$id = $_SESSION['doctor_id'];
$name= $_SESSION['doctor_name'];
$mail = $_SESSION['doctor_email'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Doctor Profile | CareVista</title>
	<link rel="shortcut icon" href="IMAGES/image/Logo.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/doctor_profile.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700&display=swap" rel="stylesheet"> 
    <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@700&display=swap" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono:ital,wght@1,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css2?family=Luxurious+Roman&display=swap" rel="stylesheet">  
	<link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+P+One&display=swap" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital@1&display=swap" rel="stylesheet"> 

	<script src="https://kit.fontawesome.com/9df1d0e6a4.js" crossorigin="anonymous"></script>
	

</head>
<body>
<?php include 'includes/doctor_navbar.php';?>

<?php
			require "db_config.php";
			$query1 = "SELECT * FROM doctor_profile_pic
					  WHERE doctor_id='$id'";
			$result1=mysqli_query($conn,$query1);
			$row1=mysqli_fetch_assoc($result1);
			$imageURL = 'Doctor_dp_uploads/'.$row1["pic_file_name"];
?>

<?php
	      require "db_config.php"; 
		  $query2="SELECT d1.doc_id,d1.qualification,d3.dept_id,d3.dept_name FROM doctor_details d1 INNER JOIN doc_dep d2 ON d1.doc_id=d2.doc_id INNER JOIN departments d3 ON d2.dept_id=d3.dept_id WHERE d1.doc_id='$id'"; 
		  $result2=mysqli_query($conn,$query2);
		  $row2=mysqli_fetch_assoc($result2);
?>
<div class="bg">
         <img src="IMAGES/image/profile_bg.jpeg">
        <h1>Welcome To Your Profile</h1>
        <h4>Making health care better together</h5>
</div>
<div class="box">
	<div class="left-content">
	    <p><i class="fas fa-id-badge"></i>  <span>My Doctor Id: <?php echo "$id"; ?> </span></p>
		<p><i class="fas fa-envelope"></i> <span> My Email Id: <?php echo "$mail"; ?> </span> </p>
	</div>
	<div class="mid-content">
	  <div class="profile-pic-div">
	 
		<img src="<?php echo $imageURL; ?>" id="photo">
     </div>
	 
	  <div class="about">
	        <h3> Dr. <?php echo "$name"; ?></h3>
            <p id="deg"><?php echo $row2['qualification'];?> </p>
			<p id="dep"> <?php echo $row2['dept_name'];?> Specialist </p>
	  </div>
    </div>

	
	<div class="right-content">
	
	<a href="edit_doc_profile.php"><button class="update-button" ><i class="fas fa-user-edit"></i>Update Profile</button></a>

	   <div class="upper-image">
			 <img src="IMAGES/image/doctor_logo1.png" width="300px" height="300px"alt="">
		 </div>
	</div>
</div>

<div class="line-break"></div>


<div id="heading">
	<h1>About You</h1>
	<i class="fa fa-hand-o-down" aria-hidden="true"></i>
</div>

<?php
	      require "db_config.php"; 
		  $query3="SELECT * from doctor_personal_info WHERE doctor_id='$id'"; 
		  $result3=mysqli_query($conn,$query3);
		  $row3=mysqli_fetch_assoc($result3);

		  $query4="SELECT * from doc_education_details WHERE doctor_id='$id'"; 
		  $result4=mysqli_query($conn,$query4);
		  $row4=mysqli_fetch_assoc($result4);
 ?>

 
  <div class="profile-tab">
	<div class="btn-box">
		<button  id="btn1" onclick="infoDetails1()">
			<i class="fas fa-user-md"></i> <br>
			My Personal Information
		</button>
		<button id="btn2" onclick="infoDetails2()"><i class="fas fa-graduation-cap"></i> <br>
		My Education/Qualification</button>
		<button id="btn3" onclick="infoDetails3()"><i class="fas fa-award"></i> <br>
		My Certifications/Researches</button>
		
	</div>
	
	<div id="content1" class="tabPanel">
		
	    <div class="info">
		    <h5>Gender</h5>
			<hr class="line">
		    <p> <?php echo $row3['gender'];?></p>
		</div>
	    <div class="info">
		    <h5> Contact No</h5>
			<hr class="line">
		    <p><?php echo $row3['contact_no'];?></p>
		</div>
		<div class="info">
		    <h5> Date of Birth</h5>
			<hr class="line">
		    <p><?php echo $row3['DOB'];?></p>
		</div>
		<div class="info">
		    <h5> City</h5>
			<hr class="line">
		    <p><?php echo $row3['city'];?></p>
		</div>
		<div class="info">
		   <h5> Pincode</h5>
		   <hr class="line">
		   <p><?php echo $row3['pincode'];?></p>
		</div>
		<div class="info">
		     <h5> State</h5>
			 <hr class="line">
		     <p><?php echo $row3['state'];?></p>
		</div>
		<div class="info">
		    <h5> Country</h5>
			<hr class="line">
		    <p><?php echo $row3['country'];?></p>
		</div>
		
    </div>
    
	<div id="content2" class="tabPanel">
	     
	    <div class="info">
		    <h5> Department</h5>
			<hr class="line">
		    <p><?php echo $row2['dept_name'];?></p>
        </div>
		<div class="info">
		    <h5> Qualifications</h5>
			<hr class="line">
		    <p><?php echo $row2['qualification'];?></p>
        </div>
	   
		<div class="info">
		    <h5> Educational Institutions</h5>
			<hr class="line">
		    <p><?php echo $row4['Institutes'];?></p>
        </div>
		
		<div class="info">
		    <h5> Your Experience</h5>
			<hr class="line">
		    <p><?php echo $row4['Experience'];?></p>
        </div>
		<div class="info">
		    <h5> About Your Practices</h5>
			<hr class="line">
		    <p><?php echo $row4['practice'];?></p>
        </div>
		
		
	</div>
    <div id="content3" class="tabPanel">
	    <div class="info">
		    <h5> Medical Certifications/Achievements</h5>
			<hr class="line">
		    <p><?php echo $row4['certification'];?></p>
        </div>
		<div class="info">
		    <h5> Ongoing Researches</h5>
			<hr class="line">
		    <p><?php echo $row4['research'];?></p>
        </div>
		
	</div>
</div>
  

	
<footer class="footer">
        <div class="fcontainer">
            <div class="fitems"><img src="IMAGES/image/Logo.png" alt="logo image" width="80px" height="70px" style="margin-top: 10px;"></div>
            <div class="fitems"> <p style="text-align: center; font-size: 40px; font-weight: bold; margin-top: 20px; color: white;margin-left: 20px;">careVista</p></div>
        </div>
</footer>


<script src="js/profile_tab.js"></script>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
