<!DOCTYPE>
<?php 
//to keep the quantity box showing quantity number
session_start(); 

include("functions/functions.php");

include("includes/db.php");
?>
<html>
	<head>
		<title>My Online Shop</title>
		
		
	<link rel="stylesheet" href="styles/style.css" media="all" /> 
	</head>
	
<body>
	
	<!--Main Container starts here-->
	<div class="main_wrapper">
	
		<!--Header starts here-->
		<div class="header_wrapper">
		
			<a href="index.php"><img id="logo" src="images/logo.png" /> </a>
			<div id="form">
			<form method="get" action="results.php" enctype="mutlpart/form-data">
				<input type="text" name="user_query" placeholder="Search for a Product"/>
				<input type="submit" name="search" value="Search"/>
			</form>
		</div><!--end of form div-->
		</div>
		<!--Header ends here-->
		
		<!--Navigation Bar starts-->
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
			
		</div>
		<!--Navigation Bar ends-->
	
		<!--Content wrapper starts-->
		<div class="content_wrapper">
		
			<div id="sidebar">
			
				<div id="sidebar_title">Categories</div>
				
				<ul id="cats">
				
				<?php getCats(); ?>
				
				<ul>
					
				<div id="sidebar_title">Brands</div>
				
				<ul id="cats">
					
					<?php getBrands(); ?>
				
				<ul>
			
			
			</div>
		
			<div id="content_area">
			
			<?php cart(); ?>
			
			<div id="shopping_cart"> 
					
					<span style="float:right; font-size:17px; padding:5px; line-height:40px;">
					
					<?php 
					if(isset($_SESSION['customer_email'])){
					echo "<b>Welcome:</b>" . $_SESSION['customer_email'];
					}
					else {
					echo "<b>Welcome Guest:</b>";
					}
					?>
					
					<a href="index.php" style="color:orange">Back to Shop</a>
					
					<?php 
					if(!isset($_SESSION['customer_email'])){
					
					echo "<a href='checkout.php' style='color:orange;'>Login</a>";
					
					}
					else {
					echo "<a href='logout.php' style='color:orange;'>Logout</a>";
					}
					
					
					
					?>
					
					</span>
			</div>
			
				<div id="products_box">
				
			<form action="wish.php" method="post" enctype="multipart/form-data">
			
			<table align="center" width="700px" border="2" bgcolor="orange">
		<tr align="center">
			<td colspan="7"><h2>Search your friends' wish lists here</h2></td>
		</tr>
		<tr>
			<td align="right">Enter the email address of your friend:</td>
			<td><input type="text" name="user_query" size="50" required/></td>
		</tr>
		<tr align="center">
		<td colspan="2"><input type="submit" name="search" value="Search"/></td>
		</tr>
			
			</form>

				
				</div>
			
			</div>
		</div>
		<!--Content wrapper ends-->
		
		
	
	
	
	
	
	
	</div> 
<!--Main Container ends here-->


</body>
</html>