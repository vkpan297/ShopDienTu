<?php
include 'inc/header.php';
?>
<?php
$productId=$_GET['id'];
if($_SERVER['REQUEST_METHOD'] === 'POST'  &&  isset($_POST['submit'])){
	$quantity=$_POST['quanity'];
    $addCart=$cart->addCart($productId,$quantity);
}
$customerId=Session::get("customer_id");
if($_SERVER['REQUEST_METHOD'] === 'POST'  &&  isset($_POST['compare'])){
	$product_Id=$_POST['productId'];
    $insertCompare=$product->insertCompare($product_Id,$customerId);
}

if($_SERVER['REQUEST_METHOD'] === 'POST'  &&  isset($_POST['wistlist'])){
	$product_Id=$_POST['productId'];
    $insertWishList=$product->insertWishList($product_Id,$customerId);
}
?>
 <div class="main">
    <div class="content">
    	<div class="section group">
		<?php
			$get_detail_product=$product->getDetailProduct($productId);
			if($get_detail_product){
				while($result_detail = $get_detail_product->fetch_assoc()){
			
		?>
			<div class="cont-desc span_1_of_2">				
				<div class="grid images_3_of_2">
				<img src="admin/upload/<?php echo $result_detail['image']?>" alt=""/>
				</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result_detail['product_Name']?></h2>
					<p><?php echo $fm->textShorten($result_detail['product_desc'],150)?></p>					
					<div class="price">
						<p>Price: <span><?php echo number_format($result_detail['price'])." "."VND"?></span></p>
						<p>Category: <span><?php echo $result_detail['cate_Name']?></span></p>
						<p>Brand:<span><?php echo $result_detail['brand_Name']?></span></p>
					</div>
					<div class="add-cart">
						<form action="" method="post">
							<input type="number" class="buyfield" name="quanity" value="1" min="1" />
							<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
							
						</form>				
					</div>
					<?php
						if(isset($addCart)){
							echo '<span style="color:red;font-size:18px;">Sản phẩm đã được thêm vào giỏ hàng</span>';
						}
					?>
					<div class="add-cart">
						<form action="" method="POST">
							<input type="hidden" class="buysubmit" name="productId" value="<?php echo $result_detail['id'] ?>"/>		
							
							<?php
								$login_check=Session::get("customer_login");
								if($login_check==false){
									echo '';
								}else{
									echo '<input type="submit" class="buysubmit" name="compare" value="Compare Product"/>'.'  ';
									echo '<input type="submit" class="buysubmit" name="wistlist" value="Save to Wishlist"/>';
								}
							?>
							<br>
							<?php
							if(isset($insertCompare)){
								echo $insertCompare;
							}
							if(isset($insertWishList)){
								echo $insertWishList;
							}
							?>
						</form>
							
					</div>
				</div>
					<div class="product-desc">
					<h2>Product Details</h2>
					<?php echo $fm->textShorten($result_detail['product_desc'],150)?>
				</div>	
			</div>
		<?php
			}
			}
		?>
			<div class="rightsidebar span_3_of_1">
				<h2>CATEGORIES</h2>
				<ul>
				<?php
				$category=$cat->listCat();
				if($category){
					while($result=$category->fetch_assoc()){
				?>
			      <li><a href="productbycat.php?catId=<?php echo $result['id']?>"><?php echo $result['cate_Name']?></a></li>
				<?php
					}
					}
				?>
    			</ul>
    
 			</div>
 		</div>
 	</div>
<?php
include 'inc/footer.php';
?>
