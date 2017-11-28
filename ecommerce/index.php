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
	<!--click the logo top left corner and direct to homepage-->
	<a href="index.php"><img id="logo" src="images/logo.png"/></a>
	</div>
	<!--Header ends here-->
	<!--Navigation bar starts here-->
	<div class="menubar">
		<ul id="menu">
			<li><a href="index.php">Home</a></li>
			<li><a href="all_products.php">All Products</a></li>
			<li><a href="customer/my_account.php">My Account</a></li>
			<li><a href="#">Sign Up</a></li>
			<li><a href="cart.php">Shopping Carts</a></li>
			<li><a href="#">Contact Us</a></li>
		</ul>
		
		<div id="form">
			<form method="get" action="results.php" enctype="mutlpart/form-data">
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
		
		
		<div id="content_area">
		<div id="shopping_cart">
			<span style="float:right;font-size:18px; padding: 5px; line-height:40px;">Welcome Guest!
			
			</span>
		</div>
			<div id="products_box">
			<?php getPro();?>
			<?php getCatPro();?>
			<?php getBrandPro();?>
			
			</div>
		
		</div>
	</div>
	<div id="footer">
	<h2 style="text-align:center;padding-top:30px;">&copy; 2017 for Database Programing Final Project</h2>
	</div>
	
	</div><!--Main Container ends here-->
	
</body>
</html>