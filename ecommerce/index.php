<!DOCTYPE>
<?php
include("functions/functions.php");

?>

<html>
	<head>
	<title>My Online Shop</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	</head>
	
<body>
	<!--Main Container starts here-->
	<div class="main_wrapper">
	
	
	<div class="header_wrapper">
	<img id="logo" src="images/logo.png"/>
	</div>
	<!--Header ends here-->
	<!--Navigation bar starts here-->
	<div class="menubar">
		<ul id="menu">
			<li><a href="#">Home</a></li>
			<li><a href="#">All Products</a></li>
			<li><a href="#">My Account</a></li>
			<li><a href="#">Sign Up</a></li>
			<li><a href="#">Shopping Carts</a></li>
			<li><a href="#">Contact Us</a></li>
		</ul>
		
		<div id="form">
			<form method="get" action="resuls.php" enctype="mutlpart/form-data">
				<input type="text" name="user_query" placeholder="Search for a Product"/>
				<input type="submit" name="search" value="Search"/>
			</form>
		</div><!--end of form div-->
		
	</div><!--navigation bar ends-->
	
	<div class="content_wrapper">
		<div id="sidebar">
			<div id="sidebar_title">Categories</div>
			<ul id="cats">
			
				<?php getCats(); ?>
			
			<ul>
			
			<div id="sidebar_title">Brands</div>
			
			<ul id="cats">
			
				<?php getBrands();?>
			
			<ul>
			
			
		</div>
		
		
		<div id="content_area">This is content area</div>
	</div>
	<div id="footer">
	<h2 style="text-align:center;padding-top:30px;">&copy; 2017 for Database Programing Final Project</h2>
	</div>
	
	</div><!--Main Container ends here-->
	
</body>
</html>