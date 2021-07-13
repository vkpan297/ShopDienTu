<?php 
	include 'inc/header.php';
?>

 <div class="main">
    <div class="content">
    	<?php
	     	    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			        $tukhoa = $_POST['tukhoa'];
			        $search_product = $product->search_product($tukhoa);
			        
			    }
	      	?>
    	<div class="content_top">
    		
    		<div class="heading">	
    		<h3>Từ khóa tìm kiếm : <?php echo $tukhoa ?></h3>
    		</div>
    		
    		<div class="clear"></div>

    	</div>
    	
	      <div class="section group">
	      	<?php
	      	
	      	 if($search_product){
	      	 	while($result = $search_product->fetch_assoc()){
	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="detail.php?id=<?php echo $result['id'] ?>"><img src="admin/upload/<?php echo $result['image'] ?>" width="200px" alt="" /></a>
					 <h2><?php echo $result['product_Name'] ?></h2>
					 <p><?php echo $fm->textShorten($result['product_desc'],50); ?></p>
					 <p><span class="price"><?php echo number_format($result['price'])." "."VNĐ" ?></span></p>
				     <div class="button"><span><a href="detail.php?id=<?php echo $result['id'] ?>" class="details">Details</a></span></div>
				</div>
			<?php
			}

		}else{
			echo 'Category Not Avaiable';
		}
			?>
			</div>

	
	
    </div>
 </div>
<?php 
	include 'inc/footer.php';
	
 ?>
