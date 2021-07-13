<?php
include 'inc/header.php';
?>
<?php
if(isset($_GET['orderId']) && $_GET['orderId'] == 'order'){
    $customerId=Session::get("customer_id");
    $insertOrder=$cart->insert_order($customerId);
    $delCart=$cart->del_all_data_cart();
    header('Location:success.php');
}
// if($_SERVER['REQUEST_METHOD'] === 'POST'  &&  isset($_POST['submit'])){
// 	$quantity=$_POST['quanity'];
//     $addCart=$cart->addCart($productId,$quantity);
// }
?>
<style>
    .box_left {
        width: 47%;
        border: 1px solid #666;
        float: left;
        margin-top: 30px;
        padding: 10px;
    }
    .box_right {
        width: 47%;
        border: 1px solid #666;
        float: right;
        margin-top: 30px;
        padding: 10px;
    }
    .tblone th {
        background: #666 none repeat scroll 0 0;
        color: #fff;
        font-size: 13px;
        padding: 5px 8px;
        text-align: center;
    }
    .tblone td {
        padding: 10px;
        text-align: center;
        font-size: 15px;
    }
    .order{
        padding: 10px 50px;
        border: navajowhite;
        background: red;
        font-size: 21px;
        color: #fff;
        border-radius: 5%;
        margin: 10px;
        cursor: pointer;
    }
    center{
        padding: 20px;
    }

</style>
<form action="" method="POST">
 <div class="main">
    <div class="content">
    	<div class="section group">
            <div class="content_top">
                <div class="heading">
                    <h3>Offline Payment</h3>
                </div>
                
                <div class="clear"></div>
                <div class="box_left">
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
                                <th width="5%">ID</th>
								<th width="20%">Product Name</th>
								<th width="27%">Price</th>
								<th width="20%">Quantity</th>
								<th width="28%">Total Price</th>
							</tr>
							<?php
								$get_product_cart=$cart->getCart();
								if($get_product_cart){
									$subTotal=0;
									$qty=0;
                                    $i=0;
									while($result = $get_product_cart->fetch_assoc()){
                                        $i++;
							?>
							<tr>
                                <td><?php echo $i?></td>
								<td><?php echo $result['product_Name']?></td>
								<td><?php echo number_format($result['price']).' '.'VND'  ?></td>
								<td>
                                    <?php echo $result['quanity']?>
								</td>
								<td><?php
								$total=$result['price']*$result['quanity'];
								 echo number_format($total).' '.'VND';
								 ?></td>
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
						<table style="float:right;text-align:left;font-size: 14px;" width="40%">
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
								<td>10% (<?php echo $vat=number_format($subTotal*0.1).' '.'VND' ?>)</td>
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
                </div>
                <div class="box_right">
                        <div class="heading">
                            <h3>Profile Customer</h3>
                        </div>
                    <table class="tblone">
                        <?php
                        $id=Session::get("customer_id");
                        $get_customer=$cs->show_customer($id);
                        if($get_customer){
                            while($result=$get_customer->fetch_assoc()){
                        ?>
                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td><?php echo $result['name']?></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>:</td>
                            <td><?php echo $result['address']?></td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>:</td>
                            <td><?php echo $result['city']?></td>
                        </tr>
                        <tr>
                            <td>Zipcode</td>
                            <td>:</td>
                            <td><?php echo $result['zipcode']?></td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>:</td>
                            <td><?php echo $result['phone']?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?php echo $result['email']?></td>
                        </tr>
                        <tr>
                            <td colspan="3"><a href="editprofile.php">Update Profile</a></td>
                        </tr>
                        <?php
                        }
                        }
                        ?>
                    </table>
                </div>
            </div>
            
        </div>
 	</div>
     <center><a href="?orderId=order" class="order">Order</a></center>
 </div>
 </form>    
<?php
include 'inc/footer.php';
?>
