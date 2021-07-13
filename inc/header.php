<?php
include 'lib/session.php';
Session::init();
?>
<?php include_once 'classes/web/cart.php' ?>
<?php include_once 'classes/web/user.php' ?>
<?php include_once 'classes/web/category.php' ?>
<?php include_once 'classes/web/product.php' ?>
<?php include_once 'classes/web/customer.php' ?>
<?php include_once 'classes/web/brand.php' ?>
<?php
include_once 'lib/database.php';
include_once 'helpers/format.php';
$db=new Database();
$fm=new Format();
$cart=new cart();
$user=new user();
$cat=new category();
$cs=new customer();
$product=new product();
$br=new brand();
?>

<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>

<!DOCTYPE HTML>
<head>
<title>Store Website</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
  <div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/logo.png" alt="" /></a>
			</div>
			  <div class="header_top_right">
			  	<div class="search_box">
				    <form action="search.php" method="post">
				    	<input type="text" placeholder="Tìm kiếm sản phẩm" name="tukhoa">
				    	<input type="submit" name="search_product" value="Tìm kiếm"> 
				    </form>
			    </div>
			    <div class="shopping_cart">
					<div class="cart">
						<a href="#" title="View my shopping cart" rel="nofollow">
								<span class="cart_title">Cart</span>
								<span class="no_product">
								<?php
								$check_cart=$cart->check_cart();
								if($check_cart){
									$sum=Session::get("sum");
									$qty=Session::get("qty");
									echo $sum.' '.'đ'.'/'.'Qty: '.$qty;
								}else{
									echo "Empty";
								}
									
								?>
								</span>
							</a>
						</div>
			      </div>
			<?php
			if(isset($_GET['customerId'])){
				Session::destroy();
			}
			?>
		   <div class="login">
		   <?php
		   $login_check=Session::get("customer_login");
		   if($login_check==false){
			   echo '<a href="login.php">Login</a></div>';
		   }else{
				echo '<a href="?customerId='.Session::get("customer_id").'">Logout</a></div>';
		   }
		   ?>
		   
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
 
<div class="menu">
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
		<ul id="dc_mega-menu-orange" class="dc_mm-orange navbar-nav mr-auto nav">
				<li><a href="index.php">Home</a></li>
				
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						Thương hiệu
					<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<?php
						$brand=$br->show_brand_home();
						if($brand){
							while($result_brand=$brand->fetch_assoc()){
						?>
						<li>
							<a href="topbrands.php?brandid=<?php echo $result_brand['id'] ?>"><?php echo $result_brand['brand_Name'] ?></a>
						</li>
						<?php
						}
						}
						?>
					</ul>
				</li>
				<li><a href="cart.php">Cart</a></li>
				<?php
					$check_order=$cart->check_order();
					if($check_order==true){
							echo '<li><a href="orderdetails.php">Ordered</a> </li>';
					}else{
							echo '';
					}
				?>
				<?php
					$login_check=Session::get("customer_login");
					if($login_check==false){
						echo '';
					}else{
							echo '<li><a href="profile.php">Profile</a> </li>';
					}
				?>
				<?php
					$customerId=Session::get("customer_id");
					if($customerId==false){
						echo '';
					}else{
							echo '<li><a href="compare.php">Compare</a> </li>';
					}
				?>
				<?php
					$customerId=Session::get("customer_id");
					if($customerId==false){
						echo '';
					}else{
							echo '<li><a href="wishlist.php">Your WishList</a> </li>';
					}
				?>
				<li><a href="contact.php">Contact</a> </li>
				
				<div class="clear"></div>
			</ul>
			
		</div>
	</nav>
</div>