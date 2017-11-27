<!DOCTYPE>
<?php

include("includes/db.php");

?>

<html>
	<head>
	<title>Inserting Product</title>
	</head>
	
<body bgcolor="skyblue">
	<form action="insert_product.php" method="post" enctype="multipart/form-data">
		<table align="center" width="700px" border="2" bgcolor="orange">
		<tr align="center">
			<td colspan="7"><h2>Insert New Product Here</h2></td>
		</tr>
		<tr>
			<td align="right">Product Title:</td>
			<td><input type="text" name="product_title" /></td>
		</tr>
		<tr>
			<td align="right">Product Category:</td>
			<td>
			<select name="product_cat">
				<option>Select a category</option>
			<?php
			$get_cats="select * from categories";
	
			$run_cats=mysqli_query($con,$get_cats);
	
			while ($row_cats=mysqli_fetch_array($run_cats)){
				$cat_id=$row_cats['cat_id'];
				$cat_title=$row_cats['cat_title'];
	
			echo "<option value='$cat_id'>$cat_title</option>"; 
	
	}
	?>
			</select>
			</td>
		</tr>
		<tr>
			<td align="right">Product Brand:</td>
			<td>
			<select name="product_brand">
				<option>Select a brand</option>
			<?php
			$get_brands="select * from brands";
	
			$run_brands=mysqli_query($con,$get_brands);
	
			while ($row_brands=mysqli_fetch_array($run_brands)){
				$brand_id=$row_brands['brand_id'];
				$brand_title=$row_brands['brand_title'];
	
			echo "<option value='$brand_id'>$brand_title</option>"; 
	
			}
			?>
			</select>
			</td>
		</tr>
		
		<tr>
			<td align="right">Product Image:</td>
			<td><input type="file" name="product_image" /></td>
		</tr>
		<tr>
			<td align="right">Product Price:</td>
			<td><input type="text" name="product_price" /></td>
		</tr>
		<tr>
			<td align="right">Product Description:</td>
			<td><textarea name="product_desc" cols=20 rows=10></textarea></td>
		</tr>
		<tr>
			<td align="right">Product Keywords:</td>
			<td><input type="text" name="product_keywords" /></td>
		</tr>
		<tr align="center">
			<td colspan="8"><input type="submit" name="insert_post" value="Insert Product Now"/></td>
		</tr>
		
		</table>
	
</body>
</html>