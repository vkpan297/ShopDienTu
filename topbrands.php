<?php
include 'inc/header.php';
?>
<?php
	if(!isset($_GET['brandid']) || $_GET['brandid']==NULL){
       echo "<script>window.location ='404.php'</script>";
    }else{
        $id = $_GET['brandid']; 
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
    	<?php
	     	 $name_brand = $br->get_name_by_brand($id);
	      	 if($name_brand){
	      	 	while($result_name = $name_brand->fetch_assoc()){
	      	?>
    	<div class="content_top">
    		
    		<div class="heading">	
    		<h3>Thương hiệu : <?php echo $result_name['brand_Name'] ?></h3>
    		</div>
    		
    		<div class="clear"></div>

    	</div>
    	<?php
			}}
			?>
	      <div class="section group">
	      	<?php
	      	 $brandpr = $br->get_product_by_brand($id);
	      	 if($brandpr){
	      	 	while($result = $brandpr->fetch_assoc()){
	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="detail.php?id=<?php echo $result['id'] ?>"><img src="admin/upload/<?php echo $result['image'] ?>" width="150px" alt="" /></a>
					 <h2><?php echo $result['product_Name'] ?></h2>
					 <p><?php echo $fm->textShorten($result['product_desc'],50); ?></p>
					 <p><span class="price"><?php echo number_format($result['price'])." "."VNĐ" ?></span></p>
				     <div class="button"><span><a href="detail.php?id=<?php echo $result['id'] ?>" class="details">Chi tiết</a></span></div>
				</div>
			<?php
			}

		}else{
			echo 'Thương hiệu hiện tại chưa có sản phẩm';
		}
			?>
			</div>

	
	
    </div>
 </div>
<?php 
	include 'inc/footer.php';
 ?>

