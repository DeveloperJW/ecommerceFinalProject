<!DOCTYPE>
<?php
session_start();
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
			<li><a href="my_account.php">My Account</a></li>
			<li><a href="customer_register.php">Sign Up</a></li>
			<li><a href="cart.php">Shopping Carts</a></li>
			<li><a href="wish.php">Wish List</a></li>
			<li><a href="friends.php">Find Friends</a></li>
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
		<?php cart();?>
		<?php wish();?>
		<div id="shopping_cart">
			<span style="float:right;font-size:17px; padding: 5px; line-height:40px;">
		<?php 
			if(isset($_SESSION['customer_email'])){
			echo "<b>Welcome:</b>" . $_SESSION['customer_email'] ;
			}
		else{
			echo"<b>Welcome Guest:</b>";
			}
		?>
		
		<?php
		if(!isset($_SESSION['customer_email'])){
		echo "<a href='checkout.php' style='color:orange'>Login</a>";
		}
		else{
			echo"<a href='logout.php' style='color:orange'>Logout</a>";
			}
		?>
		
		<b style="color:yellow">Shopping Cart -</b> 
		Total Items: <?php total_items()?> 
		Total Price: <?php total_price()?>
		<a href="cart.php" style="color:yellow">Go to Cart</a>
			
			</span>
		</div><!--end of shopping cart bar-->
		
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