<?php include'inc/header.php';?>
<?php
	$login = Session::get("custlogin");
	if($login != true){
		header("location:login.php");
	}
?>
	
<div class="main">
	<div class="content">
		<div class="section group">
			<div class="payment">
			<h2>Coose Payment Option</h2>
				<a href="paymentoffline.php">Offline Payment</a>
				<a href="paymentonline.php">Online Payment</a>
			</div>
			
			<div class="back">
				<a href="cart.php">Previous</a>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>

<?php include'inc/footer.php';?>