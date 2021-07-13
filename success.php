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
    .success{
        text-align: center;
        color: red !important;
        font-size: 28px;
    }
    p{
        text-align: center;
        margin: 10px;
        font-size: 19px;
    }
</style>
 <div class="main">
    <div class="content">
    	<div class="section group">
            <h2 class="success">Success Order</h2>
            <p>We will contact as soon as possiable.Please see your order details here <a href="orderdetails.php">Click here</a></p>
        </div>
 	</div>
 </div>
<?php
include 'inc/footer.php';
?>
