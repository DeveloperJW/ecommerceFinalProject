<!DOCTYPE>
<?php

include("includes/db.php");

?>

<html>
	<head>
	<title>Inserting Product</title>
	</head>
<!--Text area js format-->	
<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>
        tinymce.init({selector:'textarea'});
</script>

<body bgcolor="skyblue">
	<form action="insert_product.php" method="post" enctype="multipart/form-data">
		<table align="center" width="700px" border="2" bgcolor="orange">
		<tr align="center">
			<td colspan="7"><h2>Insert New Product Here</h2></td>
		</tr>
		<tr>
			<td align="right">Product Title:</td>
			<td><input type="text" name="product_title" size="50" required/></td>
		</tr>
		
		<tr>
			<td align="right">Product Category:</td>
			<td>
			<select name="product_cat" required>
				<option>Select a category</option>
			<?php
			$get_cats="select * from categories";
	
			$run_cats=mysqli_query($con, $get_cats);
	
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
			<select name="product_brand" required>
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
			<td><input type="text" name="product_price" required/></td>
		</tr>
		<tr>
			<td align="right">Product Description:</td>
			<td><textarea name="product_desc" cols=20 rows=10></textarea></td>
		</tr>
		<tr>
			<td align = "right">Existed Keywords:</td>
			<?php
			$get_keys="select `key` from Keyword";
	
			$run_keys=mysqli_query($con, $get_keys);?>
			<td>
			<table>
	
			<?php while ($row_keys=mysqli_fetch_array($run_keys)):
			?>
		
			<span><?php echo $row_keys['key']; ?></span>
			<input type="checkbox" name="keywords[]" value = "<?php echo $row_keys['key']; ?>"/>
			<?php endwhile; ?>
			</table>
			</td>
		</tr>
						
		<tr>
			<td align="right">Product Keywords:</td>
			<td><input type="text" name="product_keywords" size="50" required/></td>
		</tr>
		<tr align="center">
			<td colspan="7"><input type="submit" name="insert_post" value="Insert Product Now"/></td>
		</tr>
		
		</table>
		</form>
	
</body>
</html>
<?php 
	if(isset($_POST['insert_post'])){
	//getting the text data from the fields
	$product_title=$_POST['product_title'];
	$product_cat=$_POST['product_cat'];
	$product_brand=$_POST['product_brand'];
	$product_price=$_POST['product_price'];
	$product_desc=$_POST['product_desc'];
	$product_keywords=$_POST['product_keywords'];
	$product_existedKey=$_POST['keywords'];

	//getting the image from the fields
	$product_image=$_FILES['product_image']['name'];
	$product_image_tmp=$_FILES['product_image']['tmp_name'];
	
	move_uploaded_file($product_image_tmp,"product_images/$product_image");
	
	//insert into products
	$productID = "SELECT COUNT(*) as ProductCount FROM products";
	$num = 1;
	
	//$newProductId = $productID + $num;
	$prodID = mysqli_query($con,$productID);
	$product_ID = mysqli_fetch_assoc($prodID);
	$newProductID = $product_ID['ProductCount'] + $num;
	
	$insert_product = "insert into `products`
	(`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`) values
	('$newProductID', '$product_cat', '$product_brand', '$product_title', '$product_price', '$product_desc', '$product_image')";
	
	$insert_pro=mysqli_query($con,$insert_product);
	
	//inserting into Keyword
	if(isset($product_keywords) || !($product_keywords) == '') {
		$proKey = explode(',', $product_keywords);
		$num = 1;
		$productID = "SELECT product_id from products where product_title = $product_title";
		foreach($proKey as $pro_key){
			//This will give new ProductKeyID
			$ProductKey = "SELECT COUNT(*) as TotalProdKeyIDCount FROM ProductKey";
			$prodKeyID = mysqli_query($con, $ProductKey);
			$productKeyID = mysqli_fetch_assoc($prodKeyID);
			$newProd_KeyID = $productKeyID['TotalProdKeyIDCount'] + $num;
			
			
			//This will give new Key_Value
			$KeyCount = "SELECT COUNT(*) as TotalKey FROM Keyword";
			$key_Count = mysqli_query($con, $KeyCount);
			$keyCount = mysqli_fetch_assoc($key_Count);
			$newKey_Count = $keyCount['TotalKey'] + $num;

			//This will insert into Keyword table
			$insert_keyword = "insert into Keyword (`KeyValue`, `Key`) values ('$newKey_Count', '$pro_key')";
			$insert_key = mysqli_query($con, $insert_keyword);

			//This will insert into ProductKey Table
			$insert_ProductKey = "INSERT INTO `ProductKey`(`ProductKeyID`, `Product_ID`, `Key_Value`) VALUES ('$newProd_KeyID', '$newProductID', '$newKey_Count')";
			$insert_prodKey = mysqli_query($con, $insert_ProductKey);

		}

		foreach($product_existedKey as $prodKey){
			//This will give new ProductID
			$ProdKey = "SELECT COUNT(*) as TotalProdKeyID FROM ProductKey";
			$productKeyID = mysqli_query($con, $ProdKey);
			$product_KeyID = mysqli_fetch_assoc($productKeyID);
			$value = 1;
			$newProduct_KeyID = $product_KeyID['TotalProdKeyID'] + $value;
			
			

			//This will give KeyValue for the respective existedKey
			$key_val = "Select keyValue from Keyword where `key` = ('$prodKey')";
			$Key_V = mysqli_query($con, $key_val);
			$Key_Value = mysqli_fetch_assoc($Key_V);
			$KeyValue = $Key_Value['keyValue'];
							
				
			//This will insert into the ProductKeyTable
			$insert_Product_key = "INSERT INTO `ProductKey`(`ProductKeyID`, `Product_ID`, `Key_Value`) VALUES ('$newProduct_KeyID', '$newProductID', '$KeyValue')";
			$insert_prodKey = mysqli_query($con, $insert_Product_key);
		}
	  }
	
	
	if($insert_pro || $insert_key || $insert_prodKey){
	
		echo "<script>alert('Product has been inserted!')</script>";
		echo "<script>window.open('insert_product.php','_self')</script>";
	}
	
	
	
	
	}
?>
