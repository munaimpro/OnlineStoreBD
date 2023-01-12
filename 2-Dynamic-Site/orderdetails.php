<?php include'inc/header.php';?>
<?php
	$login = Session::get("custlogin");
	if($login != true){
		header("location:login.php");
	}
?>
<?php
$cmrId = Session::get('cmrId');
$getOrder = $ct->getOrderedProduct($cmrId);
if(!$getOrder){
	header("location:index.php");
}
?>
<?php
if(isset($_GET['action']) && $_GET['action'] == "confirm"){
	$cmrId = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['cmrId']);
	$proid = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['proid']);
	$shift = $ct->confirmShifted($cmrId, $proid);
}
?>	
<div class="main">
	<div class="content">
		<div class="section group">
			<div class="order">
				<h2>Your Order Details</h2>
				<table class="tblone">
					<tr>
						<th>No</th>
						<th>Product Name</th>
						<th>Image</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Date</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				<?php
					$cmrId = Session::get('cmrId');
					$getOrder = $ct->getOrderedProduct($cmrId);
					if($getOrder){
							$i = 0;
						while($result = $getOrder->fetch_assoc()){ 
							$i++;
				?>
					<tr>
						<td><?php echo $i;?></td>
						<td><?php echo $result['productName'];?></td>
						<td><img src="admin/<?php echo $result['image'];?>" alt=""/></td>
						<td><?php echo $result['quantity'];?></td>
						<td><?php echo $result['price'];?></td>
						<td><?php echo $fm->formatDate($result['date']);?></td>
						<td>
							<?php
								if($result['status'] == '0'){
									echo"Pending";
								} else{
									echo"Shifted";
								}
							?>
						</td>
						<td>
							<?php
								if($result['status'] == '0'){
									echo"N/A";
								} elseif($result['status'] == '1'){ ?>
									<a onclick="return confirm('Are you sure to confirm purchase?')" href="?action=confirm&&cmrId=<?php echo $result['cmrId'];?>&&proid=<?php echo $result['productId'];?>">Confirm</a>
							<?php } else{ ?>
									Confirmed
							<?php } ?>
						</td>
					</tr>
				<?php } } ?>
				</table>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>
<?php include'inc/footer.php';?>