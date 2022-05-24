<?php
    include "./includes/vaccination_navbar.php";
    $vaccination_id=$_SESSION['vaccination_id'];
?>
<style>
   @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Bree+Serif&family=EB+Garamond:ital,wght@0,500;1,800&display=swap');


  body {
  background: #DFC2F2;
    background-image: linear-gradient( to right, #ffffb3,#ffe6e6);
    background-attachment: fixed;	
    background-size: cover;
    
    }

  #container{
    box-shadow: 0 15px 30px 1px grey;
    background: rgba(255, 255, 255, 0.90);
    text-align: center;
    border-radius: 5px;
    margin: 5em auto;
    height: 380px;
    width: 600px;
  }



  .product-details {
    position: relative;
    text-align: left;
    overflow: hidden;
    padding: 20px;
    height: 100%;
    float: left;
    width: 40%;
    
  }

  #container .product-details h1{
    font-family: 'Bebas Neue', cursive;
    display: inline-block;
    position: relative;
    font-size: 30px;
    color: #344055;
    margin-top: 20px;
    
  }



  .hint-star {
    display: inline-block;
    margin-left: 0.5em;
    color: gold;
    width: 50%;
  }


  #container .product-details > p {
  font-family: 'EB Garamond', serif;
    text-align: center;
    font-size: 18px;
    color: #7d7d7d;
    
  }
  .control{
    position: absolute;
    bottom: 17.5%;
    left: 50%;
    
  }
  .btn {

    transform: translateY(0px);
    transition: 0.3s linear;
    background:  #809fff;
    border-radius: 5px;
    position: relative;
    overflow: hidden;
    cursor: pointer;
    outline: none;
    border: none;
    color: #eee;
    padding: 0;
    margin-top: 10;
    
  }

  .btn:hover{transform: translateY(-6px);
    background: #1a66ff;}

  .btn span {
    font-family: 'Farsan', cursive;
    transition: transform 0.3s;
    display: inline-block;
    padding: 10px 20px;
    font-size: 1.2em;
    margin:0;
    
  }
  .btn .price, .shopping-cart{
    background: #333;
    border: 0;
    margin: 0;
  }

  .btn .price {
    transform: translateX(-10%); padding-right: 15px;
  }

  .btn .shopping-cart {
    transform: translateX(-100%);
    position: absolute;
    background: #333;
    z-index: 1;
    left: 0;
    top: 0;
  }

  .btn .buy {z-index: 3; font-weight: bolder;}

  .btn:hover .price {transform: translateX(-110%);}

  .btn:hover .shopping-cart {transform: translateX(0%);}



  .product-image {
    transition: all 0.3s ease-out;
    display: inline-block;
    position: relative;
    overflow: hidden;
    height: 100%;
    float: right;
    width: 50%;
    display: inline-block;
  }

  #container img {
    width: 100%;height: 100%;
  }

  .info {
      background: rgba(27, 26, 26, 0.9);
      font-family: 'Bree Serif', serif;
      transition: all 0.3s ease-out;
      transform: translateX(-100%);
      position: absolute;
      line-height: 1.8;
      text-align: left;
      font-size: 105%;
      cursor: no-drop;
      color: #FFF;
      height: 100%;
      width: 100%;
      left: 0px;
      top: 0;
  }
  .dpts{
    width: 100%;
    height: 30vh;
    display: flex;
    justify-content: space-evenly;
    align-items: center;
    flex-wrap: wrap;
  }

  .info h2 {text-align: center}
  .product-image:hover .info{transform: translateX(0);}

  .info ul li{transition: 0.3s ease; margin:20px 20px 20px 20px; font-size:125%; list-style:none;}
  .info ul li:hover{transform: translateX(50px) scale(1.3);}

  .product-image:hover img {transition: all 0.3s ease-out;}
  .product-image:hover img {transform: scale(1.2, 1.2);}
</style>


<title>Scheduled Appointments | careVista Hospital</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<h1 style="text-align:center; font-size=300%; margin:14px 0 0 8px; font-family: 'Pacifico', cursive;   background: #F0B7A1;
    background: -webkit-linear-gradient(to right, #F0B7A1 10%, #8C3310 40%, #752201 51%, #BF6E4E 100%);
    background: -moz-linear-gradient(to right, #F0B7A1 0%, #8C3310 50%, #752201 51%, #BF6E4E 100%);
    background: linear-gradient(to right, #F0B7A1 0%, #8C3310 50%, #752201 51%, #BF6E4E 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;">Your Scheduled Appointments</h1>

<div class="body html">
  <section class="hero-section">

    <div class="card-grid dpts ">
    
      <?php
        $n=0;
        $num=0;
        require "db_config.php";

        $query="SELECT * FROM vaccination_bookings b INNER JOIN vaccine_list l ON l.vaccine_id=b.vaccine_id
                WHERE b.vaccination_booker_id='$vaccination_id' AND b.vaccination_status LIKE 'INCOMPLETE'";
        $result=mysqli_query($conn,$query);
        while($row=mysqli_fetch_assoc($result)){
          $date=$row['date'];
          $newDate = date("d-m-Y", strtotime($date));
          $n=$num%5;
          $num=$num+1;
          echo '<div id="container" >
                  <div class="product-details">
                    <h1><i class="fas fa-user"></i> &nbsp;'.$row['name'].'</h1>
                    <h1><i class="fas fa-crutch"></i> &nbsp;'.$row['vaccine_name'].'</h1><br>
                    <h1><i class="fas fa-rupee-sign"></i> &nbsp;'.$row['vaccine_cost'].'</h1><br>
                    <h1><i class="fas fa-times-circle"></i> &nbsp;'.$row['vaccination_status'].'</h1>  
                    <div class="control">
                      <button class="btn">
                        <a href="./vaccination_booking_success.php?booking_id='.$row['unique_id'].'" style="text-decoration:none; color:white;"><span class="buy">Click here</span></a>
                      </button>
                    </div>   
                  </div>
                  <div class="product-image">
                    <img src="./IMAGES/img3/img6.jpg">
                    <div class="info">
                      <h2> Appointment Details</h2>
                      <ul>
                        <li><strong><i class="fas fa-calendar-alt"></i> &nbsp;'.$newDate.' </strong></li>
                        <li><strong><i class="fas fa-calendar-day"></i> &nbsp;'.$row['day'].'</strong></li>
                        <li><strong><i class="fas fa-clock"></i> &nbsp;'.$row['time'].'</strong></li>
                        <li><strong><i class="fas fa-id-badge"></i> &nbsp;Id : '.$row['unique_id'].' </strong></li>
                        
                      </ul>
                    </div>
                  </div>
                </div>';	
          }
      ?> 
    </div>
  </section>
</div>


	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php
        if(isset($_SESSION['status']) && $_SESSION['status']!='')
        {
    ?>
            <script type="text/javascript">
                swal({
                    title: "<?php echo $_SESSION['status'];?>",
                    icon: "<?php echo $_SESSION['status_code'];?>",
                    text: "<?php echo $_SESSION['status_text'];?>",
                    button: "OK",
                });
            </script>
    <?php
        unset($_SESSION['status']);
        }
    ?> 
