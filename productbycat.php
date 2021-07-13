<?php
include 'inc/header.php';
?>
<?php
if(!isset($_GET['catId']) && $_GET['catId'] != null){
    echo "<script>window.location='404.php'</script>";
}else{
    $catId=$_GET['catId'];
}
?>
<style>

.grid_1_of_4:first-child {
    margin-left: 7px;
}
.grid_1_of_4 {
    margin: 10px 7px;
	height: 350.94px;
}

</style>
 <div class="main">
    <div class="content">
    	<div class="content_top">
			<?php
				$name_cat=$cat->get_name_by_cat($catId);
				if($name_cat){
					while($result_name=$name_cat->fetch_assoc()){
			?>
				<div class="heading">
					<h3>Category : <?php echo $result_name['cate_Name']?></h3>
				</div>
			<?php
				}
				}
		  	?>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
			<?php
				$getProductByCatId=$cat->get_product_by_cat($catId);
				if($getProductByCatId){
					while($result=$getProductByCatId->fetch_assoc()){
			?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="detail.php?id=<?php echo $result['id'] ?>"><img src="admin/upload/<?php echo $result['image'] ?>" alt="" width="150px"/></a>
					 <h2><?php echo $result['product_Name'] ?></h2>
					 <?php echo $fm->textShorten($result['product_desc'],100)?>
					 <p><span class="price"><?php echo number_format($result['price']).' '.'VND' ?></span></p>
				     <div class="button"><span><a href="detail.php?id=<?php echo $result['id'] ?>">Details</a></span></div>
				</div>
			<?php
				}
				}
		  	?>
			</div>

	
	
    </div>
 </div>
 <?php
include 'inc/footer.php';
?>

