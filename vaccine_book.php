<?php
include "./includes/vaccination_navbar.php";
include "db_config.php";
$name = $_SESSION['vaccination_name'];
$email=$_SESSION['vaccination_email'];
$id=$_SESSION['vaccination_id'];

$vaccine_id = $_GET['vaccine_id'];

$query="SELECT * FROM vaccine_day_time WHERE vaccine_id='$vaccine_id'";
$result=mysqli_query($conn,$query);
$fetched_result=mysqli_fetch_assoc($result);

$day1=$fetched_result['day1'];
$time1=$fetched_result['time1'];
$date1=date('Y-m-d', strtotime($day1));
$newDate1 = date("d-m-Y", strtotime($date1));

$day2=$fetched_result['day2'];
$time2=$fetched_result['time2'];
$date2=date('Y-m-d', strtotime($day2));
$newDate2 = date("d-m-Y", strtotime($date2));

$day3=$fetched_result['day3'];
$time3=$fetched_result['time3'];
$date3=date('Y-m-d', strtotime($day3));
$newDate3 = date("d-m-Y", strtotime($date3));

$day4=$fetched_result['day4'];
$time4=$fetched_result['time4'];
$date4=date('Y-m-d', strtotime($day4));
$newDate4 = date("d-m-Y", strtotime($date4));

$day5=$fetched_result['day5'];
$time5=$fetched_result['time5'];
$date5=date('Y-m-d', strtotime($day5));
$newDate5 = date("d-m-Y", strtotime($date5));

$day6=$fetched_result['day6'];
$time6=$fetched_result['time6'];
$date6=date('Y-m-d', strtotime($day6));
$newDate6 = date("d-m-Y", strtotime($date6));

$day7=$fetched_result['day7'];
$time7=$fetched_result['time7'];
$date7=date('Y-m-d', strtotime($day7));
$newDate7 = date("d-m-Y", strtotime($date7));


$booking_id=uniqid();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccination Date Booking | careVista Hospital</title>
  
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Luxurious+Roman&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
    <style>
  .body1{
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 85vh;
    font-family: 'Jost', sans-serif;
  }

  .main{
    width: 400px;
    height: 400px;
    background: red;
    overflow: hidden;
   background-color:white;
    border-radius: 10px;
    box-shadow: 5px 20px 50px #000;
    margin-right:80px ;
    background-color: #FAACA8;
background-image: linear-gradient(19deg, #FAACA8 0%, #DDD6F3 100%);

  }
  .main1{
    width: 500px;
    height: 550px;
    background: red;
    overflow: hidden;
   background-color:white;
    border-radius: 10px;
    box-shadow: 5px 20px 50px #000;
    margin-left:80px ;
    background-color: #A9C9FF;
background-image: linear-gradient(180deg, #A9C9FF 0%, #FFBBEC 100%);


  }
  #chk{
    display: none;
  }
  .signup{
    position: relative;
    width:100%;
    height: 100%;
  }
  label{
    color: #fff;
    font-size: 2.3em;
    justify-content: center;
    display: flex;
    margin: 30px;
    font-weight: bold;
    cursor: pointer;
    transition: .5s ease-in-out;
  }
  input{
    width: 75%;
    height: 40px;
    background: white;
    justify-content: center;
    display: flex;
    margin: 5px auto;
    padding: 10px;
    border: none;
    outline: none;
    border-radius: 5px;
  }
  button{
    width: 60%;
    height: 40px;
    margin: 10px auto;
    justify-content: center;
    display: block;
    color: #fff;
    background: #573b8a;
    font-size: 1em;
    font-weight: bold;
    margin-top: 20px;
    outline: none;
    border: none;
    border-radius: 5px;
    transition: .2s ease-in;
    cursor: pointer;
  }
  button:hover{
    background: #6d44b8;
  }
  .login{
    height: 460px;
    background: #eee;
    border-radius: 60% / 10%;
    transform: translateY(-180px);
    transition: .8s ease-in-out;
  }
  .login label{
    color: #573b8a;
    transform: scale(.6);
  }
  
  #chk:checked ~ .login{
    transform: translateY(-500px);
  }
  #chk:checked ~ .login label{
    transform: scale(1);	
  }
  #chk:checked ~ .signup label{
    transform: scale(.6);
  }
  body{
	width: 100%;
	height: 100%;
	background-image: linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)),url("./IMAGES/img/hospital.jpg");
	background-position: center;
	background-size: cover;
  z-index: -1;
}
 i{
   margin:10px 0px 0px 50px;
   font-size:135%;
 } 

#days{
	width: 300px;
    height: 35px;
    padding: 5px 5px;
    margin-left: 60px;
    margin-top: 10px;
    border: 4px solid black;
    border-radius: 13px;
    cursor: pointer;
    font-family: 'Acme', sans-serif;
    font-size: 90%;
}
#display{
  font-size:180%;
  text-align:center;
  margin: 70px 30px 30px 30px;
  font-family: 'Luxurious Roman', cursive;
}

</style>
</head>
<body>
  
    <div class="body1">
    <div class="main" style="margin-right: 150px;"> 
    <div id="display">
		<h2 id="schedule" style="text-decoration:underline;">Schedule:</h2>
    <br>
		<?php
			if($day1!=NULL && $time1!=NULL){
				echo '<h4 class="timings">'.$day1.': '.$time1.'</h4>';
			}
			if($day2!=NULL && $time2!=NULL){
				echo '<h4 class="timings">'.$day2.': '.$time2.'</h4>';
			}
			if($day3!=NULL && $time3!=NULL){
				echo '<h4 class="timings">'.$day3.': '.$time3.'</h4>';
			}
      if($day4!=NULL && $time4!=NULL){
				echo '<h4 class="timings">'.$day4.': '.$time4.'</h4>';
			}
      if($day5!=NULL && $time5!=NULL){
				echo '<h4 class="timings">'.$day5.': '.$time5.'</h4>';
			}
      if($day6!=NULL && $time6!=NULL){
				echo '<h4 class="timings">'.$day6.': '.$time6.'</h4>';
			}
      if($day7!=NULL && $time7!=NULL){
				echo '<h4 class="timings">'.$day7.': '.$time7.'</h4>';
			}
    
		?>
    

	</div>
            </div>
    <div class="main1">  
			<div class="signup">
        
				<form action="vaccine_book_validation.php" method="POST">
                    
				<label for="chk" aria-hidden="true" style="Color:black">Sign up</label>
        <i class="fas fa-clock"> Choose your date</i>
		  <div id="form-box">			
					<select id="days" name="days">
						<option value="none" selected disabled hidden>Select the day</option>

						<?php

							if($day1!=NULL && $time1!=NULL){
								echo '<option value="'.$day1.'">'.$day1.'';
								echo '  [';
								echo ($newDate1);
								echo '] </option>';
                
							}
							if($day2!=NULL && $time2!=NULL){
								echo '<option value="'.$day2.'">'.$day2.'';
								echo '  [';
								echo ($newDate2);
								echo '] </option>';
							}
							if($day3!=NULL && $time3!=NULL){
								echo '<option value="'.$day3.'">'.$day3.'';
								echo '  [';
								echo ($newDate3);
								echo '] </option>';
							}

              if($day4!=NULL && $time4!=NULL){
								echo '<option value="'.$day4.'">'.$day4.'';
								echo '  [';
								echo ($newDate4);
								echo '] </option>';
							}

              if($day5!=NULL && $time5!=NULL){
								echo '<option value="'.$day5.'">'.$day5.'';
								echo '  [';
								echo ($newDate5);
								echo '] </option>';
							}
              if($day6!=NULL && $time6!=NULL){
								echo '<option value="'.$day6.'">'.$day6.'';
								echo '  [';
								echo ($newDate6);
								echo '] </option>';
							}
              if($day7!=NULL && $time7!=NULL){
								echo '<option value="'.$day7.'">'.$day7.'';
								echo '  [';
								echo ($newDate7);
								echo '] </option>';
							}

						?>

					</select>
				</div>

        <i class="fas fa-user">&nbsp;Name:</i>
        <input type="text" name="txt" placeholder="User name" required="" id="name" value="<?php echo "$name"; ?>"> 
            
        <i class="fas fa-envelope-open-text">&nbsp;Email:</i>
				<input type="email" name="email" placeholder="Email" required="" value="<?php echo "$email"; ?>">

       <i class="fas fa-phone-square-alt">&nbsp;Contact:</i>
					<input type="tel" name="contact" placeholder="Contact Number" required="">
        
      <input type="hidden" name="vaccine_id" value="<?php echo "$vaccine_id"; ?>" hidden>
      <input type="hidden" name="booking_id" value="<?php echo "$booking_id"; ?>" hidden>
      <input type="hidden" name="vaccination_booker_name" value="<?php echo "$name"; ?>" hidden>
      <input type="hidden" name="vaccination_booker_id" value="<?php echo "$id"; ?>" hidden>
     
					<a href="./vaccination_booking_success.php"><button>Book now</button></a>
				</form>
			</div>


	</div>

    </div>

</body>
</html>