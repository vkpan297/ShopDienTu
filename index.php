<?php
	include 'inc/header.php';
	include 'inc/slider.php';
?>
<style>

.grid_1_of_4:first-child {
    margin-left: 7px;
}
.grid_1_of_4 {
    margin: 10px 7px;
	height: 350.94px;
}
a.phantrang {
    border: 1px solid #ddd;
    padding: 10px;
    background: #414045;
    color: #fff;
    cursor: pointer;
   
}
a.phantrang:hover {
    background: blue;
}
</style>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Feature Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
			<?php
				$getProductType=$product->getTypeProduct();
				if($getProductType){
					while($resultTypeProduct=$getProductType->fetch_assoc()){
			?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="detail.php?id=<?php echo $resultTypeProduct['id'] ?>"><img src="admin/upload/<?php echo $resultTypeProduct['image']?>" alt="" width="150px"/></a>
					 <h2><?php echo $resultTypeProduct['product_Name']?></h2>
					 <p><?php echo $fm->textShorten($resultTypeProduct['product_desc'],30)?></p>
					 <p><span class="price"><?php echo number_format($resultTypeProduct['price'])?></span></p>
				     <div class="button"><span><a href="detail.php?id=<?php echo $resultTypeProduct['id'] ?>" class="details">Details</a></span></div>
				</div>
			<?php
				}
				}
			?>
			</div>
			<div class="">
			<?php
				if(isset($_GET['index'])){
					$trang = $_GET['index'];
				}else{
					$trang = 1;
				}
				$product_all=$product->get_all_type_product();
				$product_count=mysqli_num_rows($product_all);
				$product_btn=ceil($product_count/4);
				$i=0;
				for($i=1;$i<=$product_btn;$i++){
					?>
					<a class="phantrang" <?php if($i==$trang){ echo 'style="background:orange"';} ?> style="margin:0px 10px;" href="index.php?index=<?php echo $i ?>"><?php echo $i ?></a>	
					<?php
				}
			?>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
			<?php
				$get_new_product=$product->getNewProduct();
				if($get_new_product){
					while($result_new_product=$get_new_product->fetch_assoc()){
			?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="detail.php?id=<?php echo $result_new_product['id'] ?>"><img src="admin/upload/<?php echo $result_new_product['image']?>" alt="" width="150px"/></a>
					 <h2><?php echo $result_new_product['product_Name']?></h2>
					 <p><span class="price"><?php echo number_format($result_new_product['price'])?></span></p>
				     <div class="button"><span><a href="detail.php?id=<?php echo $result_new_product['id'] ?>" class="details">Details</a></span></div>
				</div>
				
			<?php
				}
				}
			?>
			</div>
			<div class="">
			<?php
				if(isset($_GET['trang'])){
					$trang = $_GET['trang'];
				}else{
					$trang = 1;
				}
				$product_all=$product->get_all_product();
				$product_count=mysqli_num_rows($product_all);
				$product_btn=ceil($product_count/4);
				$i=1;
				for($i=1;$i<=$product_btn;$i++){
					?>
					<a class="phantrang" <?php if($i==$trang){ echo 'style="background:orange"';} ?> style="margin:0 10px;" href="index.php?trang=<?php echo $i ?>"><?php echo $i ?></a>	
					<?php
				}
			?>
			</div>
    </div>
 </div>
<?php
	include 'inc/footer.php';
?>
