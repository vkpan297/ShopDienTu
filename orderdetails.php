<?php
include 'inc/header.php';
?>
<?php
$customerId=Session::get("customer_id");
if($customerId==false){
    header('Location:login.php');
 }
 if(isset($_GET['confirmId'])){
	$id=$_GET['confirmId'];
	$time=$_GET['time'];
	$price=$_GET['price'];
	$shifted_confirm=$cart->shifted_confirm($id,$time,$price);
}
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2 style="width: 300px;">Your Detail Ordered</h2>
						<table class="tblone">
							<tr>
                                <th width="5%">ID</th>
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="20%">Quantity</th>
                                <th width="10%">Status</th>
                                <th width="10%">Date</th>
								<th width="10%">Action</th>
							</tr>
							<?php
                                $customerId=Session::get("customer_id");
								$get_cart_order=$cart->get_cart_order($customerId);
								if($get_cart_order){
                                    $i=0;
									$qty=0;
									while($result = $get_cart_order->fetch_assoc()){
                                        $i++;
							?>
							<tr>
                                <td><?php echo $i?></td>
								<td><?php echo $result['product_Name']?></td>
								<td><img src="admin/upload/<?php echo $result['image']?>" alt=""/></td>
								<td><?php echo number_format($result['price'])." "."VND"  ?></td>
								<td>
                                    <?php echo $result['quantity']?>
								</td>
                                <td>
                                    <?php
                                    if($result['status']=='0'){
                                        echo 'Đang xử lí';
                                    }elseif($result['status']=='1'){
									?>
									<span>Đã vận chuyển</span>
									<?php
                                    }else{
										echo 'Đã nhận hàng';
									}
                                    ?>
                                </td>
                                <td><?php echo $fm->formatDate($result['date_order'])?></td>
                                <?php
                                if($result['status'] == '0'){
                                ?>
                                <td><?php echo 'N/A' ?></td>
                                <?php
                                }elseif($result['status'] == '1'){
                                ?>
								<td><a href="?confirmId=<?php echo $result['id'] ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['date_order'] ?>">Xác nhận</a></td>
								<?php
								}else{
								?>
                                <td><?php echo 'Đã nhận hàng';?></td>
                                <?php
                                }
                                ?>
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
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php
include 'inc/footer.php';
?>

