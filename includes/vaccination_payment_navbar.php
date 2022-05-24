<style type="text/css">
*{
	margin: 0;
	padding: 0;
}
#nav{
	width: 100%;
	height: 12vh;
	background-color: rgba(221, 136, 247, 0.5);
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
	font-family: 'Roboto Slab', serif;
	font-size: 2.5rem;
}
#right-nav{
	display: flex;
    flex-basis: 13%;
    align-items: center;
    justify-content: space-evenly;
    margin-right: 30px;
}
#right-nav a{
	text-decoration: none;
}
</style>


<div id="nav">
		<div id="left-nav">
			<img src="IMAGES/img3/login.png">
			<h2><?php echo "$name"; ?></h2>
		</div>
		<div id="right-nav">
			<a href="vaccination_dashboard.php" class="btn btn-info">Home</a>
			<a href="logout.php" class="btn btn-danger">Logout</a>
		</div>
</div>