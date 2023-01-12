<?php include'inc/header.php';?>
<?php
$login = Session::get("custlogin");
if($login == false){
	header("location:login.php");
}
?>
	
<div class="main">
	<div class="content">
		<div class="section group">
			<div class="success">
				<h2>Success</h2>
			<?php
				$cmrId = Session::get("cmrId");
				$amount = $ct->paybleAmount($cmrId);
				if($amount){
					$sum = 0;
					while($result = $amount->fetch_assoc()){
						$price = $result['price'];
						$sum = $sum+$price;
			} ?>
				
				<p>Total payble amount (Including Vat): $
					<?php 
						$vat = $sum*0.1;
						$total = $sum + $vat;
						echo $total;
					?>
				</p>
				<p>Thanks for purchase. Received your order successfully. We will contuct you ASAP with delivery details. Here is your order details...<a href="orderdetails.php">Visit Here</a>.</p>
			<?php } else{ header("location:index.php"); } ?>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>

<?php include'inc/footer.php';?>