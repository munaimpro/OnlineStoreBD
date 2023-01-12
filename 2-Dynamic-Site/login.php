<?php include'inc/header.php';?>
<?php
	$login = Session::get("custlogin");
	if($login == true){
		header("location:order.php");
	}
?>
<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['custlogin'])){
		$custLogin = $cmr->CustomerLogin($_POST);
	}
?> 

<div class="main">
    <div class="content">
    	<div class="login_panel">
		<?php
			if(isset($custLogin)){
				echo $custLogin;
			}
		?>
        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
        	<form action="" method="post">
                <input name="Email" placeholder="Email" type="text"/>
                <input name="Password" type="password" placeholder="Password" />
				<div class="buttons"><div><button name="custlogin" class="grey">Sign In</button></div></div>
			</form>
        </div>
<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){
		$customerReg = $cmr->CustomerRegistration($_POST);
	}
?>
    	<div class="register_account">
    		<h3>Register New Account</h3>
		<?php
			if(isset($customerReg)){
				echo $customerReg;
			}
		?>
			<form action="" method="post">
		   		<table>
		   			<tbody>
					<tr>
						<td>
							<div>
							<input type="text" placeholder="Name" name="Name"/>
							</div>
							
							<div>
							   <input type="text" placeholder="City" name="City"/>
							</div>
							
							<div>
								<input type="text" placeholder="Zip-Code" name="Zip"/>
							</div>
							<div>
								<input type="text" placeholder="EMail" name="EMail"/>
							</div>
		    			</td>
		    			<td>
							<div>
								<input type="text" placeholder="Address" name="Address"/>
							</div>
							<div>
								<input type="text" placeholder="Country" name="Country"/>
							</div>
							<div>
								<input type="text" placeholder="Phone" name="Phone"/>
							</div>
							<div>
								<input type="text" placeholder="Password" name="Password"/>
							</div>
						</td>
					</tr> 
					</tbody>
				</table> 
				<div class="search"><div><button name="register" class="grey">Create Account</button></div></div>
				<p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
				<div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php include'inc/footer.php';?>