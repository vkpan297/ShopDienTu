<?php
	include '../classes/admin/adminlogin.php';
?>

<?php
	$class=new adminlogin();
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$admin_User=$_POST['admin_User'];
		$admin_Pass=md5($_POST['admin_Pass']);

		$loginCheck=$class->login_admin($admin_User,$admin_Pass);
	}
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<span><?php 
				if(isset($loginCheck)){
					echo $loginCheck;
				}
			?></span>
			<div>
				<input type="text" placeholder="Username" required="" name="admin_User"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="admin_Pass"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>