<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<?php
				$getLatestDell=$product->getLatestDell();
				if($getLatestDell){
					while($result_dell=$getLatestDell->fetch_assoc()){
				?>
					<div class="listview_1_of_2 images_1_of_2">
						<div class="listimg listimg_2_of_1">
							<a href="detail.php?id=<?php echo $result_dell['id'] ?>"> <img src="admin/upload/<?php echo $result_dell['image']?>" alt="" /></a>
						</div>
						<div class="text list_2_of_1">
							<h2>DELL</h2>
							<p><?php echo $result_dell['product_Name']?></p>
							<div class="button"><span><a href="detail.php?id=<?php echo $result_dell['id'] ?>">Add to cart</a></span></div>
					</div>
				</div>	
				<?php 
				}
				}
				?>		
				<?php
				$getLatestOppo=$product->getLatestOppo();
				if($getLatestOppo){
					while($result_oppo=$getLatestOppo->fetch_assoc()){
				?>
					<div class="listview_1_of_2 images_1_of_2">
						<div class="listimg listimg_2_of_1">
							<a href="detail.php?id=<?php echo $result_oppo['id'] ?>"> <img src="admin/upload/<?php echo $result_oppo['image']?>" alt="" /></a>
						</div>
						<div class="text list_2_of_1">
							<h2>OPPO</h2>
							<p><?php echo $result_oppo['product_Name']?></p>
							<div class="button"><span><a href="detail.php?id=<?php echo $result_oppo['id'] ?>">Add to cart</a></span></div>
					</div>
				</div>	
				<?php 
				}
				}
				?>	
			</div>
			<div class="section group">
				<?php
				$getLatestSamsung=$product->getLatestSamsung();
				if($getLatestSamsung){
					while($result_ss=$getLatestSamsung->fetch_assoc()){
				?>
					<div class="listview_1_of_2 images_1_of_2">
						<div class="listimg listimg_2_of_1">
							<a href="detail.php?id=<?php echo $result_ss['id'] ?>"> <img src="admin/upload/<?php echo $result_ss['image']?>" alt="" /></a>
						</div>
						<div class="text list_2_of_1">
							<h2>SAMSUNG</h2>
							<p><?php echo $result_ss['product_Name']?></p>
							<div class="button"><span><a href="detail.php?id=<?php echo $result_ss['id'] ?>">Add to cart</a></span></div>
					</div>
				</div>	
				<?php 
				}
				}
				?>				
				<?php
				$getLatestHuawei=$product->getLatestHuawei();
				if($getLatestHuawei){
					while($result_huawei=$getLatestHuawei->fetch_assoc()){
				?>
					<div class="listview_1_of_2 images_1_of_2">
						<div class="listimg listimg_2_of_1">
							<a href="detail.php?id=<?php echo $result_huawei['id'] ?>"> <img src="admin/upload/<?php echo $result_huawei['image']?>" alt="" /></a>
						</div>
						<div class="text list_2_of_1">
							<h2>HUAWEI</h2>
							<p><?php echo $result_huawei['product_Name']?></p>
							<div class="button"><span><a href="detail.php?id=<?php echo $result_huawei['id'] ?>">Add to cart</a></span></div>
					</div>
				</div>	
				<?php 
				}
				}
				?>	
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
					<?php
					$get_slider=$product->getSlider();
					if($get_slider){
						while($result=$get_slider->fetch_assoc()){
					
					?>
						<li><img src="admin/upload/<?php echo $result['image']?>" alt=""/></li>
					<?php
					}
					}
					?>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>	