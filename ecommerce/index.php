<!DOCTYPE>
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
				<li><a href="#">Laptops</a></li>
				<li><a href="#">Computers</a></li>
				<li><a href="#">Cell Phones</a></li>
				<li><a href="#">Cameras</a></li>
				<li><a href="#">Tablets</a></li>
			
			<ul>
			
			<div id="sidebar_title">Brands</div>
			
			<ul id="cats">
				<li><a href="#">Apple</a></li>
				<li><a href="#">Asus</a></li>
				<li><a href="#">Dell</a></li>
				<li><a href="#">HP</a></li>
				<li><a href="#">Lenovo</a></li>
				<li><a href="#">Samsung</a></li>
			
			<ul>
			
			
		</div>
		
		
		<div id="content_area">This is content area</div>
	</div>
	<div id="footer">This is the footbar</div>
	
	</div><!--Main Container ends here-->
	
</body>
</html>