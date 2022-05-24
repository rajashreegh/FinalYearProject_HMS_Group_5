<?php include "./includes/vaccination_navbar.php";

$name = $_SESSION['vaccination_name'];
$disease_id = $_GET['disease_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./css/vaccination_booking.css"> -->


	<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

    <title>Select your vaccine | careVista Hospital</title>
    <!-- 

GRADIENT BANNER DESIGN BY SIMON LURWER ON DRIBBBLE:
https://dribbble.com/shots/14101951-Banners

-->
<style>
@import url("https://fonts.googleapis.com/css?family=Montserrat:400,400i,700");
.body {
  font-size: 16px;
  color: #404040;
  font-family: Montserrat, sans-serif;
  background-image: linear-gradient(to bottom right, #ff9eaa 0% 65%, #e860ff 95% 100%);
  background-position: center;
  background-attachment: fixed;
  margin: 0;
  padding: 2rem 0;
  display: grid;
  place-items: center;
  box-sizing: border-box;
}
.card {
  background-color: #fff;
  width: 375px;
  display: flex;
  flex-direction: column;
  overflow: hidden;
  border-radius: 2rem;
  box-shadow: 0px 1rem 1.5rem rgba(0,0,0,0.5);
}
.card .banner {
  
  background-image: url("./IMAGES/img3/vaccine_image.jpeg");
  background-position:40% 40%;
  background-repeat: no-repeat;
  background-size: cover;
  height: 11rem;
  display: flex;
  align-items: flex-end;
  justify-content: center;
  box-sizing: border-box;
}
.card .banner svg {
  background-color: #fff;
  width: 8rem;
  height: 8rem;
  box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.3);
  border-radius: 50%;
  transform: translateY(50%);
  transition: transform 200ms cubic-bezier(0.18, 0.89, 0.32, 1.28);
}
.card .banner svg:hover {
  transform: translateY(50%) scale(1.3);
}
.card .menu {
  width: 100%;
  height: 2rem;
  padding: 1rem;
  display: flex;
  align-items: flex-start;
  justify-content: flex-end;
  position: relative;
  box-sizing: border-box;
}
.card .menu .opener {
  width: 2.5rem;
  height: 2.5rem;
  position: relative;
  border-radius: 50%;
  transition: background-color 100ms ease-in-out;
}
.card .menu .opener:hover {
  background-color: #f2f2f2;
}
.card .menu .opener span {
  background-color: #404040;
  width: 0.4rem;
  height: 0.4rem;
  position: absolute;
  top: 0;
  left: calc(50% - 0.2rem);
  border-radius: 50%;
}
.card .menu .opener span:nth-child(1) {
  top: 0.45rem;
}
.card .menu .opener span:nth-child(2) {
  top: 1.05rem;
}
.card .menu .opener span:nth-child(3) {
  top: 1.65rem;
}
.card h2.name {
  text-align: center;
  padding: 0 2rem 0.5rem;
  margin-top: 10px;

}
.card .title {
  color: #a0a0a0;
  font-size: 0.85rem;
  text-align: center;
  font-size: 25px;
  padding: 0 2rem 1.2rem;
}
.card .actions {
  padding: 0 2rem 1.2rem;
  display: flex;
  flex-direction: column;
  order: 99;
}
.card .actions .follow-info {
  padding: 0 0 1rem;
  display: flex;
  justify-content: center;
}
.card .actions .follow-info h2 {
  text-align: center;
  width: 50%;
  margin: 0;
  box-sizing: border-box;
}
.card .actions .follow-info h2 a {
  font-size:25px;
  text-decoration: none;
  padding: 0.8rem;
  display: flex;
  flex-direction: column;
  border-radius: 0.8rem;
  transition: background-color 100ms ease-in-out;
  cursor: auto;
}
.card .actions .follow-info h2 a span {
  color: #1c9eff;
  font-weight: bold;
  transform-origin: bottom;
  transform: scaleY(1.3);
  transition: color 100ms ease-in-out;
}
.card .actions .follow-info h2 a small {
  color: #afafaf;
  font-size: 0.85rem;
  font-weight: normal;
}
.card .actions .follow-info h2 a:hover {
  background-color: #f2f2f2;
}
.card .actions .follow-info h2 a:hover span {
  color: #007ad6;
}
.card .actions .follow-btn button {
  color: inherit;
  font: inherit;
  font-size:150%;
  font-weight: bold;
  background-color: #ffd01a;
  width: 100%;
  border: none;
  padding: 1rem;
  outline: none;
  box-sizing: border-box;
  border-radius: 1.5rem/50%;
  transition: background-color 100ms ease-in-out, transform 200ms cubic-bezier(0.18, 0.89, 0.32, 1.28);
  cursor: pointer;
}
.card .actions .follow-btn button:hover {
  background-color: #efb10a;
  transform: scale(1.1);
}
.card .actions .follow-btn button:active {
  background-color: #e8a200;
  transform: scale(1);
}
.card .desc {
  text-align: justify;
  padding: 0 2rem 2.5rem;
  order: 100;
}
.dpts{
	width: 100%;
	height: 10vh;
	display: flex;
	justify-content: space-evenly;
	align-items: center;
	flex-wrap: wrap;
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
    -webkit-text-fill-color: transparent; margin-bottom:30px">Select your vaccine</h2>
    </div>
      <div class="dpts">
    <?php
    
			require "db_config.php";

			$query="SELECT l.disease_id,l.vaccine_id,l.vaccine_name,l.vaccine_cost,d.disease_name 
      FROM vaccine_list l INNER JOIN vaccination_disease d 
      ON l.disease_id=d.disease_id WHERE l.disease_id='$disease_id' ";
			$result=mysqli_query($conn,$query);
			while($row=mysqli_fetch_assoc($result)){
               
				echo '<div class="card">
        <div class="banner">
        </div>

        <h2 class="name">'.$row['vaccine_name'].'</h2>
        <div class="title">'.$row['disease_name'].'</div>
        <div class="actions">
            <div class="follow-info">
    
                <h2><a href="#"><span>₹ '.$row['vaccine_cost'].'</span><small>Price</small></a></h2>
            </div>
            <div class="follow-btn" ><button> <a href="./vaccine_book.php?vaccine_id='.$row['vaccine_id'].'" style="text-decoration:none; color:black;">Book now</a></button></div>
        </div>
        </div>
              ';
			}

	?>
    </div>

</body>
</html>