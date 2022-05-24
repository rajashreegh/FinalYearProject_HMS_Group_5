<?php

session_start();

$name = $_SESSION['vaccination_name'];

?>

<!DOCTYPE html>
<html lang="en">
<head style="width: 100%">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccination dashboard | Carevista Hospital</title>
    <link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/styles_vaccination.css">
    <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
    <nav class="navbar">
        <img src="IMAGES/img3/login.png" alt="" width="70px" height="70px" style="float:left;margin-left: 15px;
        margin-right: 10px;">
        <ul>
           
          <li style="font-size:250%;letter-spacing: 2px; font-family:Aclonica;"><b>Welcome <?php echo "$name"; ?></b></li> 
          <a href="logout.php" class="button">Logout</a>
        </ul>
        
    </nav>
</head>
<body>
    <div class="body">
<div class="container">
  <div class="card">
    <div class="box">
      <div class="content">
      <img src="./IMAGES/img3/book_appointment.png" alt="book appointment image" >
        <h3>Book New Appointment</h3>
        
        <a href="vaccination_booking_dashboard.php"><b>Click here</b></a>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="box">
      <div class="content">
      <img src="./IMAGES/img3/schedule_appointment.jpg" alt="schedule appointment image" width="190px" height="190px">
        <h3>Scheduled Appointment</h3>
        
        <a href="vaccination_scheduled_appointment_dashboard.php"><b>Click here</b></a>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="box">
      <div class="content">
      <img src="./IMAGES/img3/my_history.jpg" alt="my history image" width="200px" height="200px" >
        <h3><br>My History</h3>
        
        <a href="vaccination_myhistory_dashboard.php"><b>Click here</b></a>
      </div>
    </div>
  </div>
</div>
</div>
</body>