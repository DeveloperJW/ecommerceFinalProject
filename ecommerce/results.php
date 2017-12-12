<!DOCTYPE>
<?php 
session_start();
include("functions/functions.php");

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
		</div>
		<!--Header ends here-->
		
		<!--Navigation Bar starts-->
		<div class="menubar">
			
			<ul id="menu">
				<li><a href="index.php">Home</a></li>
				<li><a href="all_products.php">All Products</a></li>
				<li><a href="my_account.php">My Account</a></li>
				<li><a href="#">Sign Up</a></li>
				<li><a href="cart.php">Shopping Cart</a></li>
				<li><a href="wish.php">Wish List</a></li>
				<li><a href="friends.php">Find Friends</a></li>
				<li><a href="#">Contact Us</a></li>
			
			</ul>
			
			<div id="form">
				<form method="get" action="results.php" enctype="multipart/form-data">
					<input type="text" name="user_query" placeholder="Search a Product"/ > 
					<input type="submit" name="search" value="Search" />
				</form>
			
			</div>
			
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
			
			<div id="shopping_cart"> 
					
					<span style="float:right; font-size:18px; padding:5px; line-height:40px;">
					<?php 
					if(isset($_SESSION['customer_email'])){
					echo "<b>Welcome:</b>" . $_SESSION['customer_email'] ;
						}
					else{
					echo"<b>Welcome Guest:</b>";
					}
		?>
					<b style="color:yellow">Shopping Cart -</b> 
					Total Items: <?php total_items()?> 
					Total Price: <?php total_price()?>
					<a href="cart.php" style="color:yellow">Go to Cart</a>
					
					
					
					</span>
			</div>
			
				<div id="products_box">
	<?php 
	//add search if statement 
	if(isset($_GET['search'])){
	
	$search_query=$_GET['user_query'];
	//find respective KeyValue
	$get_key_value = "SELECT `KeyValue` from `Keyword` where `key` like '%$search_query%'";
	$run_get_key_value = mysqli_query($con, $get_key_value);
	$row_keyValue = mysqli_fetch_assoc($run_get_key_value);
	$key_Value = $row_keyValue['KeyValue'];
	
	//Use KeyValue to find productIDs	
	
	$get_ProductIDs = "SELECT `Product_ID` FROM `ProductKey` WHERE `Key_Value` = '$key_Value'";	

	$run_pro = mysqli_query($con, $get_ProductIDs); 
	
	while($row_proID=mysqli_fetch_array($run_pro)){
		$row_productID = $row_proID['Product_ID'];
		$PROsql = "SELECT * FROM `products` where `product_id` = '$row_productID'";
		$runPROsql = mysqli_query($con, $PROsql);
		$row_pro = mysqli_fetch_array($runPROsql);
		$pro_id = $row_pro["product_id"];
		$pro_cat = $row_pro["product_cat"];
		$pro_brand = $row_pro["product_brand"];
		$pro_title = $row_pro["product_title"];
		$pro_price = $row_pro["product_price"];
		$pro_image = $row_pro["product_image"];
	
		echo "
				<div id='single_product'>
				
					<h3>$pro_title</h3>
					
					<img src='admin_area/product_images/$pro_image' width='180' height='180' />
					
					<p><b>$$pro_price</b></p>
					
					<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
					
					<a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</button></a>
				
				</div>
		
		
		";
	
		}
	}
	?>
				
				</div>
			
			</div>
		</div>
		<!--Content wrapper ends-->
		
		
		
		<div id="footer">
		
		<h2 style="text-align:center; padding-top:30px;">&copy; 2017 for Database Programing Final Project</h2>
		
		</div>
	
	
	
	
	
	
	</div> 
<!--Main Container ends here-->


</body>
</html>
