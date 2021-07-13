<?php
include 'inc/header.php';
?>

<?php
	$login_check=Session::get("customer_login");
	if($login_check){
	   header('Location:index.php');
	}
?>

<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'  &&  isset($_POST['submit'])){
    $insertCustomer=$cs->insert_customer($_POST);
}
?>
<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'  &&  isset($_POST['login'])){
    $loginCustomer=$cs->login_customer($_POST);
}
?>
 <div class="main">
    <div class="content">
    	<div class="login_panel">
        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
			<?php
			if(isset($loginCustomer)){
				echo $loginCustomer;
			}
			?>
        	<form action="" method="POST" id="member">
                	<input name="email" type="text" class="field" placeholder="Enter Email...">
                    <input name="password" type="password" class="field" placeholder="Enter Password...">
                 
                <p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
                    <div class="buttons"><div><input type="submit" name="login" class="grey" value="Sign In"></div></div>
			</form>
        </div>
		
    	<div class="register_account">
    		<h3>Register New Account</h3>
			<?php
			if(isset($insertCustomer)){
				echo $insertCustomer;
			}
			?>
    		<form action="" method="POST">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Enter Name...">
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="Enter City...">
							</div>
							
							<div>
								<input type="text" name="zipcode" placeholder="Enter ZipCode...">
							</div>
							<div>
								<input type="text" name="email" placeholder="Enter Email...">
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="Enter Address...">
						</div>
		    		<div>
						<select id="country" name="country" onchange="change_country(this.value)" class="frm-field required">
							<option value="null">Select a Country</option>         
							<option value="hcm">TP HCM</option>
							<option value="hn">Hà Nội</option>
							<option value="dn">Đà Nẵng</option>
							<option value="hp">Hải Phòng</option>
							<option value="na">Nghệ An</option>

		         </select>
				 </div>		        
	
		           <div>
		          <input type="text" name="phone" placeholder="Enter Your Phone...">
		          </div>
				  
				  <div>
					<input type="text" name="password" placeholder="Enter Password...">
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
			<style>
			.grey{
				padding: 10px 15px;
				font-size: 15px;
				font-weight: bold;
				color: #fff;
				text-shadow: 0 1px 0 rgba(0, 0, 0 ,0.4);
				border: 1px solid #303030;
				background: #3f4040;
				border-radius: 3px;
				box-shadow: 0 1px rgba(255 ,255, 255,  0.2) inset, 0 2px 2px -1px rgba(0, 0, 0, 0.3);
				cursor: pointer;
			}
			</style>
		   <div class="search"><div><input type="submit" name="submit" class="grey" value="Create Account"></div></div>
		    <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php
include 'inc/footer.php';
?>

