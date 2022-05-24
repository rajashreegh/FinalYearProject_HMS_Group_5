<style type="text/css">
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}


#nav{
	width: 100%;
	height: 11vh;
	background-color: rgba(39, 125, 136, 0.5);
	display: flex;
	align-items: center;
	justify-content: space-between;
}
#left-nav{
	display: flex;
    align-items: center;
    flex-basis: 55%;
}
#left-nav img{
	width: 70px;
    height: 70px;
    margin-right: 25px;
    margin-left: 30px;
   
}
#left-nav h2{
	font-family: "Aclonica","Sofia", sans-serif;
	font-size: 3rem;
	padding-top: 15px;	
    letter-spacing: 2px;
}
#right-nav{
	display: flex;
    flex-basis: 15%;
    align-items: center;
    justify-content: space-evenly;
    margin-right: 30px;
   
}
#right-nav a{
	text-decoration: none;
}
.btn-txt
{
    font-weight: 900;
    font-family:Verdana, Geneva, Tahoma, sans-serif;
    margin-right: 8%;
}
</style>
<div id="nav">
		<div id="left-nav">
			<img src="IMAGES/image/login.png">
			<h2><b><?php echo "$name"; ?></b></h2>
		</div>
		<div id="right-nav">
			<a href="doctor_dashboard.php" class="btn btn-lg btn-dark btn-txt">Home</a>
			<a href="logout.php" class="btn btn-lg btn-danger btn-txt">Logout</a>
		</div>
</div>