<?php
include "./includes/vaccination_navbar.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./css/vaccination_booking.css"> -->

    <title>Book Vaccination</title>

    
  
	<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
 
 
    <!-- 

GRADIENT BANNER DESIGN BY SIMON LURWER ON DRIBBBLE:
https://dribbble.com/shots/14101951-Banners

-->
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      
      .body {
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica,
          Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
      }
      
      .main-container {
        padding: 20px;
      }
      
      /* HEADING */
      
      .heading {
        text-align: center;
      }
      
      .heading__title {
        font-weight: 600;
      }
      
      .heading__credits {
        margin: 10px 0px;
        color: #888888;
        font-size: 25px;
        transition: all 0.5s;
      }
      
      .heading__link {
        text-decoration: none;
      }
      
      .heading__credits .heading__link {
        color: inherit;
      }
      
      /* CARDS */
      
      .cards {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
      }
      
      .card {
        margin: 10px;
        padding: 10px;
        width: 300px;
        min-height: 200px;
        display: grid;
        grid-template-rows: 20px 50px 1fr 50px;
        border-radius: 10px;
        box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.25);
        transition: all 0.2s;
        
      }
      
      .card:hover {
        box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.4);
        transform: scale(1.01);
      }
      
      .card__link,
      .card__exit,
      .card__icon {
        position: relative;
        text-decoration: none;
        color: rgba(255, 255, 255, 0.9);
      }
      
      .card__link::after {
        position: absolute;
        top: 25px;
        left: 0;
        content: "";
        width: 0%;
        height: 3px;
        background-color: rgba(255, 255, 255, 0.6);
        transition: all 0.5s;
      }
      
      .card__link:hover::after {
        width: 100%;
      }
      
      .card__exit {
        grid-row: 1/2;
        justify-self: end;
      }
      
      .card__icon {
        grid-row: 2/3;
        font-size: 30px;
      }
      
      .card__title {
        grid-row: 3/4;
        font-weight: 800;
        color: #ffffff;
        text-align: center;
      }
      
      .card__apply {
        grid-row: 4/5;
        align-self: center;
      }
      
      /* CARD BACKGROUNDS */
      
      .card-1 {
        background: radial-gradient(#1fe4f5, #3fbafe);
      }
      
      .card-2 {
        background: radial-gradient(#fbc1cc, #fa99b2);
      }
      
      .card-3 {
        background: radial-gradient(#76b2fe, #b69efe);
      }
      
      .card-4 {
        background: radial-gradient(#60efbc, #58d5c9);
      }
      
      .card-0 {
        background: radial-gradient(#f588d8, #c0a3e5);
      }
      .dpts{
	width: 100%;
	height: 100vh;
	display: flex;
	justify-content: space-evenly;
	align-items: center;
	flex-wrap: wrap;
}
      
       RESPONSIVE
      
      @media (max-width: 1600px) {
        .cards {
          justify-content: center;
        } 
      }
      
</style>
</head>
<body>
    <div>
        <h2 style=" text-align: center;
    font-size: 50px;
    font-family: 'Pacifico', cursive;
    padding-top: 25px;
    background: #F0B7A1;
    background: -webkit-linear-gradient(to right, #F0B7A1 10%, #8C3310 40%, #752201 51%, #BF6E4E 100%);
    background: -moz-linear-gradient(to right, #F0B7A1 0%, #8C3310 50%, #752201 51%, #BF6E4E 100%);
    background: linear-gradient(to right, #F0B7A1 0%, #8C3310 50%, #752201 51%, #BF6E4E 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;">Available Vaccine Services</h2>
    </div>
      <div class="dpts">
    <?php
    $n=0;
    $num=0;
			require "db_config.php";

			$query="SELECT * FROM vaccination_disease";
			$result=mysqli_query($conn,$query);
			while($row=mysqli_fetch_assoc($result)){
                $num=$row['disease_id'];
                $n=$num%5;
				echo '<div class="main-container body ">
                

                <div class="cards">
                  <div class="card card-'.$n.'">
                    <div class="card__icon"><i class="fas fa-bolt"></i></div>
                    <p class="card__exit"><i class="fas fa-times"></i></p>
                    <h2 class="card__title"><a href="disease_vaccination_select.php?disease_id='.$row['disease_id'].'" style="cursor:pointer;text-decoration:none;color:white;">'.$row['disease_name'].'</a></h2>
                    <p class="card__apply">
                     
                    </p>
                  </div>
                </div>
              </div>
              ';
			}

	?>
    </div>
   
</body>
</html>