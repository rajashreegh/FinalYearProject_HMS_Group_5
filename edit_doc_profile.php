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
	<title>Edit Profile | CareVista</title>
	<link rel="shortcut icon" href="IMAGES/image/Logo.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/edit_doc_profile.css">
     
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.1.3/flatly/bootstrap.min.css">
   <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
     <!-- Fontawesome icons -->
    <script src="https://kit.fontawesome.com/9df1d0e6a4.js" crossorigin="anonymous"></script>
    

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,900&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@700&display=swap" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono:ital,wght@1,700&display=swap" rel="stylesheet">

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

    $query2 = "SELECT * FROM doctor_personal_info
    WHERE doctor_id = '$id'";
    $result2 = mysqli_query($conn,$query2);
    $row2 = mysqli_fetch_assoc($result2);

    $query3 = "SELECT * FROM doc_education_details
    WHERE doctor_id = '$id'";
    $result3 = mysqli_query($conn,$query3);
    $row3 = mysqli_fetch_assoc($result3);
?>

<div class="profile-section">
    <div id="heading">
        <h1>My Profile</h1>
    </div> 
    
    <div class="profile-pic-container">
    <div class="profile-pic">
         <img src="<?php echo $imageURL; ?>" id="photo">
     </div>
     <form action="update_doctor_dp.php" method="post" enctype="multipart/form-data">
     <div id="update-button">
     <input type="file" name="file">
     <input class="btn btn-primary" type="submit" name="submit" value="Upload">
     </div>
      </form>

    </div>
     
   
  <div class="side-image">
      <img src="IMAGES/image/doctor_image2.png" width="500px" height="500px" alt="">
    </div>
</div>



 

    <div class="container">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="personal-tab" data-toggle="tab" href="#personal" role="tab" aria-controls="personal" aria-selected="true">My Personal Information</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="education-tab" data-toggle="tab" href="#education" role="tab" aria-controls="education" aria-selected="false">My Education/Qualifications</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="cert-tab" data-toggle="tab" href="#cert" role="tab" aria-controls="cert" aria-selected="false">My Certification/Researches</a>
        </li>
      </ul>
      <div class="content">
      <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab">
       <div class="details">
        <form>
           <div class="form-group">
                 <label class="form-heading" for="inputname">Full Name</label>
                 <input type="text" class="form-control" id="inputname" value="<?php echo $name; ?>" readonly>
            </div>
           <div class="form-group">
                <label class="form-heading" for="inputemail">Email</label>
                <input type="email" class="form-control" id="inputemail" value="<?php echo $mail; ?>" readonly>
            </div>
            
          <div class="form-group">
                <label class="form-heading" > Gender : </label> 
                <input type="radio" name="gender"  value="Male"
                <?php
                if($row2['gender']== 'Male')
                          echo "checked";
                ?>
                >Male
                <input type="radio" name="gender"  value="Female"
                <?php
                if($row2['gender']== 'Female')
                          echo "checked";
                ?>
                >Female 
               
         </div>
           
          <div class="form-row">
                 <div class="form-group col-md-6">
                   <label class="form-heading" for="inputcontact">Contact Number</label>
                   <input  class="form-control" type="text" id="inputcontact" name="contact_no" placeholder="Enter your mobile number" value="<?php echo $row2['contact_no'] ;?>">
                 </div>
                 <div class="form-group col-md-6">
                 <label class="form-heading" for="inputdob">Date Of Birth</label>
                 <input class="form-control" id="inputdob" type="date" name="DOB" value="<?php echo $row2['DOB']; ?>" >
                 </div>
            </div>

            <div class="form-row">
                 <div class="form-group col-md-6">
                     <label class="form-heading" for="inputcity">City</label>
                     <input type="text" class="form-control" id="inputcity" name="city" placeholder="Enter your City" value="<?php echo $row2['city']; ?>">
                 </div>
                 <div class="form-group col-md-6">
                    <label class="form-heading" for="inputpin">Pin Code</label>
                    <input type="text" class="form-control" id="inputpin" name="pincode" placeholder="Enter your pincode" value="<?php echo $row2['pincode']; ?>">
                  </div>
            </div>
           <div class="form-row">
               <div class="form-group col-md-6">
               <label class="form-heading" for="inputstate">State</label>
                     <input type="text" class="form-control" id="inputstate" name="state" placeholder="Enter your State" value="<?php echo $row2['state']; ?>">
               </div>
            <div class="form-group col-md-6">
                  <label class="form-heading" for="inputcountry">Country</label>
                  <select id="inputcountry"  name="country" class="form-control">
                  <option value="<?php echo $row2['country']; ?>"><?php echo $row2['country']; ?></option>
                  <option value="United Kingdom">United Kingdom</option>
                  <option value="Bangladesh">Bangladesh</option>
                  <option value="China">China</option>
                  <option value="India">India</option>
                  <option value="Australia">Australia</option>
                  <option value="United states of America">United states of America</option>
                  </select>
            </div>
        </div>

        <?php
	      require "db_config.php"; 
		      $query4="SELECT visit from doc_dep WHERE doc_id='$id'"; 
		      $result4=mysqli_query($conn,$query4);
		      $row4=mysqli_fetch_assoc($result4);
	      ?>

        <div class="form-row">
               <div class="form-group col-md-10">
               <label class="form-heading" for="fee">Consultation Fee : </label> 
               <input type="text"  value=" Rs." size="2/"  readonly>   
               <input type="number" name="phone" id="fee" value="<?php echo $row4['visit']; ?>" readonly > 
               </div>
        </div>
   
    <button class="btn btn-primary nextbtn" type="button" >Next <i class="fas fa-chevron-circle-right btn"></i></button>
   
 </form>
 </div>
</div>
  
    <?php
	      require "db_config.php"; 
		  $query5="SELECT d1.qualification,d3.dept_name FROM doctor_details d1 INNER JOIN doc_dep d2 ON d1.doc_id=d2.doc_id INNER JOIN departments d3 ON d2.dept_id=d3.dept_id WHERE d1.doc_id='$id'"; 
		  $result5=mysqli_query($conn,$query5);
		  $row5=mysqli_fetch_assoc($result5);
	  ?>                
<div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">
    <div class="details">
        <form id="myform">
        <div class="form-row">
                 <div class="form-group col-md-6">
                   <label class="form-heading" for="qualification">Qualification</label>
                   <input  class="form-control" type="text" id="qualification"  value="<?php echo $row5['qualification']; ?>" readonly>
                 </div>
                 <div class="form-group col-md-6">
                 <label class="form-heading" for="speciality">Speciality</label>
              <input class="form-control" id="speciality" type="text"  value="<?php echo $row5['dept_name']; ?>" readonly >
                 </div>
       </div>  
           <div class="form-group">
                 <label class="form-heading" for="institutes">Educational Institutes</label>
                 <input type="text" class="form-control" id="institutes" name="Institutes" placeholder="Enter Your instititues with respective degrees obtained" value="<?php echo $row3['Institutes']; ?>" >
                </div>
            <div class="form-group col-md-4">
                 <label class="form-heading" for="Experience">Your Experience</label>
                 <input type="text" class="form-control" id="Experience" name="Experience" placeholder="in years" value="<?php echo $row3['Experience']; ?>">
            </div>
          
            <div class="form-row">
            <div class="form-group col-md-12">
                <label class="form-heading" for="practice">About Your Practices(Clinics)</label>
                <input type="text" class="form-control" id="practice"  name="practice" placeholder="Enter your Practice Clinics with your  designation and duration" value="<?php echo $row3['practice']; ?>">
            </div>
            </div>
    
            <button class="btn btn-primary nextbtn" type="button" >Next<i class="fas fa-chevron-circle-right btn"></i></button>
 </form>
 </div>
  </div>
  <div class="tab-pane fade" id="cert" role="tabpanel" aria-labelledby="cert-tab">
    <div class="details">
        <form  id="myform" action='doctor_profile_landing_page.php' method="POST">
          <div class="form-group">
                 <label class="form-heading" for="certificate">My Certifications/Achievements</label>
                 <input type="text" class="form-control" id="certificate" name="certification" placeholder="Enter Your medical Certifications" value="<?php echo $row3['certification']; ?>" >
          </div>
        <div class="form-group">
                 <label  class="form-heading" for="research">My Ongoing Researches</label>
                 <input type="text" class="form-control" id="research" name="research" placeholder="Enter Your Ongoing research works" value="<?php  echo $row3['research']; ?>">
        </div>
           
        <button class="btn btn-primary" type="submit" id="submit-button">Save Changes</button>
        </form>
     </div>
    </div>
 </div>
  <div class="image-content">
    <img src="IMAGES/image/doctor-logo.png" width="400px" height="400px" alt="">
  </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	
<script src="js/navigation_tab.js"></script>
<script src="js/update_doctor_details.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>




</body>
</html>