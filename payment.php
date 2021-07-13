<?php
include 'inc/header.php';
?>
<?php
	$login_check=Session::get("customer_login");
	if($login_check==false){
	   header('Location:login.php');
	}
?>
<?php
// if(!isset($_GET['id']) && $_GET['id'] == null){
//     echo "<script>window.location='404.php'</script>";
// }else{
//     $productId=$_GET['id'];
// }
// if($_SERVER['REQUEST_METHOD'] === 'POST'  &&  isset($_POST['submit'])){
// 	$quantity=$_POST['quanity'];
//     $addCart=$cart->addCart($productId,$quantity);
// }
?>
<style>
.payment{
    text-align: center;
    font-size: 20px;
    font-weight: bold;
    text-decoration: underline;
}
.wrapper_method{
    width: 550px;
    margin: 0 auto;
    border: 1px solid #666;
    padding: 20px;
    background: cornsilk;
}
.wrapper_method p{
    text-align: center;
    border:1px solid #818181;
    margin: 10px;
    background: burlywood;
    padding: 10px;
}
.payment_href{
    color: #000;
    font-size: 17px;
    font-weight: bold;
}

</style>
 <div class="main">
    <div class="content">
    	<div class="section group">
            <div class="content_top">
                <div class="heading">
                    <h3>Payment method</h3>
                </div>
                
                <div class="clear"></div>
                <div class="wrapper_method">
                    <h3 class="payment">Choose your method payment</h3>
                    <p><a class="payment_href" href="offlinepayment.php">Offline Payment</a></p>
                    <p><a class="payment_href" href="onlinepayment.php">Online Payment</a></p>
                    <p><a class="payment_href" href="cart.php"><< Previous</a></p>
                </div>
            </div>
            
 		</div>
 	</div>
<?php
include 'inc/footer.php';
?>
