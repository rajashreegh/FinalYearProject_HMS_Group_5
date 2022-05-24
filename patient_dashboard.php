<?php

session_start();

$name = $_SESSION['patient_name'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient dashboard | Carevista Hospital</title>
    <link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/styles_patient.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
    <style></style>
    <nav class="navbar">
        <img src="IMAGES/img3/login.png" alt="" width="70px" height="70px" style="float:left;margin-left: 15px;
        margin-right: 10px;">
        <ul>
           
          <li style="font-size:250%;letter-spacing: 2px;"><b>Welcome <?php echo "$name"; ?></b></li> 
          <a href="logout.php" class="button">Logout</a>
        </ul>
        
    </nav>
</head>
<body>
    <h1><span class="head1"></span></h1>
    <div class="con">
        <div class="leftelement">
            <img src="IMAGES/img3/img5.png" style="" alt="">
        </div>
        <div class="rightelement">
            <div class="fcontainer">
                <div class="fitems1">
                    <p class="rcorners1" style=""><b>Make appointment</b>
                        <!-- HTML !-->
                        <br><br>
                        <a href="appointment_landing_page.php" class="button-18" role="button" 
                        style="text-decoration: none;">click here</a>    
                    </p>
                </div>

                <div class="fitems1">
                    <p class="rcorners1"><b>Pay bill<br></b>
                        <!-- HTML !-->
                        <br><br>
                        <a href="pay_bill_dashboard.php" class="button-18" role="button" 
                        style="text-decoration: none;">click here</a> 
                    </p>
                </div>
                <div class="fitems1">
                    <p class="rcorners1"><b>My history<br></b>
                        <!-- HTML !-->
                        <br><br>
                        <a href="my_history_dashboard.php" class="button-18" role="button" 
                        style="text-decoration: none;">click here</a> 
                    </p>
                </div>
            </div>
            <div class="fcontainer">
                <div class="fitems1">
                    <p class="rcorners1" style=""><b>My reports<br></b>
                        <!-- HTML !-->
                        <br><br>
                        <a href="my_reports_dashboard.php" class="button-18" role="button" 
                        style="text-decoration: none;">click here</a> 
                    </p>
                </div>
                <div class="fitems1">
                    <p class="rcorners1" style=""><b>My profile<br></b>
                        <!-- HTML !-->
                        <br><br>
                        <a href="patient_profile_landing_page.php" class="button-18" role="button" 
                        style="text-decoration: none;">click here</a> 
                    </p>
                </div>
                <div class="fitems1">
                    <p class="rcorners1" style="font-size: 120%;"><b>View / Apply <br> health card schemes<br></b>
                        <!-- HTML !-->
                        <br>
                        <a href="health_card_schemes_landing_page.php" class="button-18" role="button" 
                        style="text-decoration: none;">click here</a> 
                    </p>
                </div>
            </div>           
        </div>
    </div>
    
    
    <footer class="footer">
        <div class="fcontainer">
            <div class="fitems"  style="margin-top: 0px">
                <img src="IMAGES/img3/logo_new.png" alt="logo image" width="80px" height="70px" style="margin-top: 10px;";>
            </div>
            <div class="fitems" style="margin-right: 80px;">
                <p>careVista</p>
            </div>
            <div class="fitems">
                <p>call us - 225-336-336</p>
            </div>
            <div class="fitems" style="margin-left: 30px;">
                <p>email us- carevista@gmail.com</p>
            </div>
        </div>
       
    </footer>
    
</body>
</html>