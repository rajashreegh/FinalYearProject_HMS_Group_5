<style type="text/css">
#top-bar{
	width: 100%;
	height: 12vh;
	background-color: #2d3436;
	background-image: linear-gradient(315deg, #2d3436 0%, #d3d3d3 74%);
	}
#top-bar h2{
	font-family: 'Passions Conflict', cursive;
	font-weight: bold;
    font-size: 3.5rem;
    letter-spacing: 3px;
    margin-left: 82px;
    display: inline-block;
}
#top-bar a{
    margin-top: 18px;
    margin-right: 12px;
}
#buttons{
	width: 13%;
	height: 100%;
	float: right;
	margin-top: 2px;
}
</style>
<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">

<div id="top-bar">
	<h2>Welcome !!! <?php echo "$name"; ?></h2>
	<div id="buttons">
		<a href="admin_dashboard.php" class="btn btn-light">Home</a>
		<a href="logout.php" class="btn btn-light">Logout</a>
	</div>	
</div>