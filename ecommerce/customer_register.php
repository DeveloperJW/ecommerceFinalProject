<!DOCTYPE>
<?php 
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
				<li><a href="cart.php">Shopping Cart</a></li>
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
					
					<span style="float:right; font-size:18px; padding:5px; line-height:40px;">
					
					Welcome Guest! <b style="color:black">Shopping Cart -</b> Total Items: <?php total_items();?> Total Price: <?php total_price(); ?> 
					<a href="cart.php" style="color:orange">Go to Cart</a>
					
					</span>
			</div>
			
				<form action="customer_register.php" method="post" enctype="multipart/form-data">
					
					<table align="center" width="750">
						
						<tr align="center">
							<td colspan="6"><h2>Create an Account</h2></td>
						</tr>
						
						<tr>
							<td align="right">Enter Your Name:</td>
							<td><input type="text" name="c_name" required/></td>
						</tr>
						
						<tr>
							<td align="right">Enter Your Email:</td>
							<td><input type="text" name="c_email" required/></td>
						</tr>
						
						<tr>
							<td align="right">Enter Your Password:</td>
							<td><input type="password" name="c_pass" required/></td>
						</tr>
							
						<tr>
							<td align="right">Select a Country:</td>
							<td>
							<select name="c_country">
								<option>Select a Country</option>
								<option>China</option>
								<option>India</option>
								<option>Nepal</option>
								<option>United States</option>
							</select>
							
							</td>
						</tr>
						<tr>
							<td align="right">Enter Your Address:</td>
							<td><textarea name="c_address" required></textarea></td>
						</tr>
						<tr>
							<td align="right">City:</td>
							<td><input type="text" name="c_city" required/></td>
						</tr>
						
						<tr>
							<td align="right">State:</td>
							<td><input type="text" name="c_state" required/></td>
						</tr>
						
						<tr>
							<td align="right">Zipcode:</td>
							<td><input type="text" name="c_zip" required/></td>
						</tr>
						
						<tr>
							<td align="right"> Contact Phone Number:</td>
							<td><input type="text" name="c_contact" required/></td>
						</tr>
						
						
						
					<tr align="center">
						<td colspan="6"><input type="submit" name="register" value="Create Account" /></td>
					</tr>
					
					
					
					</table>
				
				</form>
			
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
<?php 
	if(isset($_POST['register'])){
	
		
		$ip = getIp();
		
		$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_pass = $_POST['c_pass'];
		$c_country = $_POST['c_country'];	
		$c_address = $_POST['c_address'];
		$c_city = $_POST['c_city'];
		$c_state=$_POST['c_state'];
		$c_zip=$_POST['c_zip'];
		$c_contact = $_POST['c_contact'];
	

		$insert_c = "insert into customers (customer_ip,customer_name,customer_email,customer_pass,
		customer_country,customer_city,customer_address,customer_contact,customer_state, customer_zip) 
		values ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_address','$c_contact',
		'$c_state','$c_zip')";
	
		$run_c = mysqli_query($con, $insert_c); 
		
		$sel_cart = "select * from cart where ip_add='$ip'";
		
		$run_cart = mysqli_query($con, $sel_cart); 
		
		$check_cart = mysqli_num_rows($run_cart); 
		
		if($check_cart==0){
		
		$_SESSION['customer_email']=$c_email; 
		
		echo "<script>alert('Account has been created successfully, Thanks!')</script>";
		echo "<script>window.open('customer/my_account.php','_self')</script>";
		
		}
		else {
		
		$_SESSION['customer_email']=$c_email; 
		
		echo "<script>alert('Account has been created successfully, Thanks!')</script>";
		
		echo "<script>window.open('cart.php','_self')</script>";
		
		
		}
	}





?>










