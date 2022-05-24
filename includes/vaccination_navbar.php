<?php
  session_start();
  $name = $_SESSION['vaccination_name'];
  ?>
  <link rel="shortcut icon" href="./IMAGES/img2/Logo.png" type="image/x-icon">
<style>
* {
    margin: 0;
    padding: 0;
    z-index: 1;
    /* box-sizing: border-box; */
  
  }
.navbar{
    background-color:rgba(236, 100, 100, 0.678);
    position: relative;
    z-index: 10;
   
}
.navbar li{
    list-style: none;
    float: left;
    padding: 1%;
}
.navbar li a{
    text-decoration: none;
    font-size: 20px;
    color: black;
    font-weight: bold;
    text-align: center;
}
.navbar ul{
    overflow:auto;
}
.button{
    float: right;
    appearance: none;
    background-color:#dc3545;
    border: 2px solid #dc3545;
    border-radius: 15px;
    color: white;
    cursor: pointer;
    font-family: Roobert,-apple-system,BlinkMacSystemFont,"Segoe UI",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
    font-size: 16px;
    font-weight: 600;
    margin: 12px 25px;
    min-width: 0;
    outline: none;
    padding: 8px 5px;
    text-align: center;
    text-decoration: none;
    transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
    width: 7%;
    will-change: transform;
  }
  .button:hover {
      background-color: white;
      color: black;
  }

  .button1{
    float: right;
    appearance: none;
    background-color: #0062cc;
    border: 2px solid #005cbf;
    border-radius: 15px;
    color: white;
    cursor: pointer;
    font-family: Roobert,-apple-system,BlinkMacSystemFont,"Segoe UI",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
    font-size: 16px;
    font-weight: 600;
    margin: 12px 25px;
    min-width: 0;
    outline: none;
    padding: 8px 5px;
    text-align: center;
    text-decoration: none;
    transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
    width: 7%;
    will-change: transform;
  }
  .button1:hover {
      background-color: white;
      color: black;
  }
  </style>
    <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
<nav class="navbar">
        <img src="IMAGES/img3/login.png" alt="" width="70px" height="70px" style="float:left;margin-left: 15px;
        margin-right: 10px;">
        <ul>
           
          <li style="font-size:250%;letter-spacing: 2px; font-family:Aclonica;"><b>Welcome <?php echo "$name"; ?></b></li>
          <a href="logout.php" class="button">Logout</a> 
          <a href="vaccination_dashboard.php" class="button1">Home</a>

        </ul>
        
</nav>