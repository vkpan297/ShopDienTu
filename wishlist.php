<?php
include 'inc/header.php';
?>
<?php
// if(isset($_GET['cartId'])){
//     $cartId=$_GET['cartId'];
// 	$delCart=$cart->delete_cart($cartId);
// }
// if($_SERVER['REQUEST_METHOD'] === 'POST'  &&  isset($_POST['submit'])){
// 	$cartId=$_POST['cartId'];
// 	$quantity=$_POST['quantity'];
//     $update_quantity_cart=$cart->update_quantity_cart($cartId,$quantity);
// 	if($quantity<=0){
// 		$delCart=$cart->delete_cart($cartId);
// 	}
// }

?>
<?php

if(isset($_GET['wishListId'])){
    $wishListId=$_GET['wishListId'];
	$delete_wishlist=$product->delete_wishlist($wishListId);
}
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2 style="width: 262px;">WishList Product</h2>
						<table class="tblone">
							<tr>
								<th width="5%">ID</th>
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="10%">Action</th>
							</tr>
							<?php
								$customerId=Session::get("customer_id");
                                $get_wishList=$product->show_wishList($customerId);
								if($get_wishList){
									$i=0;
									while($result = $get_wishList->fetch_assoc()){
										$i++;
							?>
							<tr>
								<td><?php echo $i?></td>
								<td><?php echo $result['product_Name']?></td>
								<td><img src="admin/upload/<?php echo $result['image']?>" alt=""/></td>
								<td><?php echo number_format($result['price'])." "."VND"  ?></td>
								<td style="vertical-align: middle;">
									<a href="detail.php?id=<?php echo $result['product_Id'] ?>">View</a> || 
									<a onclick="return confirm('Are you want to delete?')" href="?wishListId=<?php echo $result['id']?>">Delete</a>
									
								</td>
							</tr>
							<?php
							}
							}
							?>
						</table>
							
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<?php
							$login_check=Session::get("customer_login");
							if($login_check==false){
								echo '<a href="login.php"> <img src="images/check.png" alt="" /></a>';
							}else{
								echo '<a href="payment.php"> <img src="images/check.png" alt="" /></a>';
							}
							?>
							
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php
include 'inc/footer.php';
?>

