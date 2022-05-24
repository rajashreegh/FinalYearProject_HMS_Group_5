<?php

session_start();

$name = $_SESSION['doctor_name'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor dashboard | Carevista Hospital</title>
    <link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/styles_doctor.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
    <style></style>
    <nav class="navbar">
        <img src="IMAGES/img3/login.png" alt="" width="70px" height="70px" style="float:left;margin-left: 20px;
        margin-right: 15px;">
        <ul>
           
          <li style="font-size:250%;letter-spacing: 2px;"><b>Welcome <?php echo "$name"; ?></b></li> 
          <a href="logout.php" class="button">Logout</a>
        </ul>
        
    </nav>
</head>
<body >
    <div style="margin-bottom: 3%;"></div>
    <h1><span class="" style="font-weight:bold;font-size:60px;margin-top:8%">DASHBOARD</span></h1>
    <div style="height:80px; width:100%; clear:both;"></div>
    
   <div class="fcontainer">
       <div class="fitems">
        <p class="rcorners1" ><b>Check schedules<br></b>
            <!-- HTML !-->
            <br><br>
            <a href="dctr_check_my_schedule.php" class="button-18" role="button" 
                        style="text-decoration: none;">click here</a>
        </p>
       </div>
       <div class="fitems">
        <p class="rcorners1"><b>Check and Update <br>patient details</b>
            <!-- HTML !-->
            <br><br>
            <a href="dctr_check_update_pdetails.php" class="button-18" role="button" 
                        style="text-decoration: none;">click here</a>
        </p>
       </div>
       <div class="fitems">
        <p class="rcorners1"><b>My profile<br></b>
            <!-- HTML !-->
            <br><br>
            <a href="doctor_profile_landing_page.php" class="button-18" role="button" 
                        style="text-decoration: none;">click here</a>
        </p>
       </div>
   </div>
    
           
    </div>
    <br style="clear: both;">

  

 
    <footer class="footer">
        <div class="fcontainer">
            <div class="fitems"><img src="IMAGES/img3/logo_new.png" alt="logo image" width="80px" height="70px" style="margin-top: 10px;"></div>
            <div class="fitems"> <p style="text-align: center; font-size: 30px; font-weight: bold; margin-top: 31px; color: white;margin-left: 20px;">careVista</p></div>
        </div>
      
      
    </footer>
    
</body>
</html>