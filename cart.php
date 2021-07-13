<?php
include 'inc/header.php';
?>
<?php
if(isset($_GET['cartId'])){
    $cartId=$_GET['cartId'];
	$delCart=$cart->delete_cart($cartId);
}
if($_SERVER['REQUEST_METHOD'] === 'POST'  &&  isset($_POST['submit'])){
	$cartId=$_POST['cartId'];
	$quantity=$_POST['quantity'];
    $update_quantity_cart=$cart->update_quantity_cart($cartId,$quantity);
	if($quantity<=0){
		$delCart=$cart->delete_cart($cartId);
	}
}

?>
<?php
if(!isset($_GET['id'])){
	echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
}
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>
					<?php
					if(isset($update_quantity_cart)){
						echo $update_quantity_cart;
					}
					if(isset($delCart)){
						echo $delCart;
					}
					?>
						<table class="tblone">
							<tr>
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="25%">Quantity</th>
								<th width="20%">Total Price</th>
								<th width="10%">Action</th>
							</tr>
							<?php
								$get_product_cart=$cart->getCart();
								if($get_product_cart){
									$subTotal=0;
									$qty=0;
									while($result = $get_product_cart->fetch_assoc()){
							?>
							<tr>
								<td><?php echo $result['product_Name']?></td>
								<td><img src="admin/upload/<?php echo $result['image']?>" alt=""/></td>
								<td><?php echo number_format($result['price'])." "."VND"  ?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="cartId" min="0" value="<?php echo $result['id']?>"/>
										<input type="number" name="quantity" min="0" value="<?php echo $result['quanity']?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td><?php
								$total=$result['price']*$result['quanity'];
								 echo number_format($total)." "."VND";
								 ?></td>
								<td><a onclick="return confirm('Are you want to delete?')" href="?cartId=<?php echo $result['id']?>">X</a></td>
							</tr>
							<?php
							$subTotal+=$total;
							$qty=$qty+$result['quanity'];
							}
							}
							?>
						</table>
							<?php
								$get_product_cart=$cart->getCart();
								if($get_product_cart){
							?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td><?php
								echo number_format($subTotal)." "."VND";
								Session::set('sum',$subTotal);
								Session::set('qty',$qty);
								?></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>10%</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td><?php
								$vat=$subTotal*0.1;
								$gtotal=$subTotal+$vat;
								echo number_format($gtotal)." "."VND";
								?></td>
							</tr>
					   </table>
					   <?php
								}
						?>
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

