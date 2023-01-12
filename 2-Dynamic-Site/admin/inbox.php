<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
$filepath = realpath(dirname(__FILE__));
include($filepath.'/../classes/Cart.php');
$ct = new Cart();
$fm = new Format();
?>
<?php
if(isset($_GET['action']) && $_GET['action'] == "shift"){
	$cmrId = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['cmrId']);
	$proid = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['proid']);
	$shift = $ct->productShifted($cmrId, $proid);
}

if(isset($_GET['action']) && $_GET['action'] == "remove"){
	$cmrId = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['cmrId']);
	$proid = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['proid']);
	$shift = $ct->removeShiftedProduct($cmrId, $proid);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>ID</th>
							<th>Order Time</th>
							<th>Product</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Address</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$getOrder = $ct->getAllOrderdProduct();
						if($getOrder){
							$i = 0;
							while($result = $getOrder->fetch_assoc()){ 
							$i++;
					?>	
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $fm->formatDate($result['date']);?></td>
							<td><?php echo $result['productName'];?></td>
							<td><?php echo $result['quantity'];?></td>
							<td>$<?php echo $result['price'];?></td>
							<td><a href="customer.php?cmrId=<?php echo $result['cmrId'];?>">View Details</a></td>
						<?php
							if($result['status'] == '0'){ ?>
							<td><a onclick="return confirm('Are you sure to make it shifted?')" href="?action=shift&&cmrId=<?php echo $result['cmrId'];?>&&proid=<?php echo $result['productId'];?>">Shifted</a></td>	
						<?php } else { ?>
							<td><a onclick="return confirm('Are you sure to remove order?')" href="?action=remove&&cmrId=<?php echo $result['cmrId'];?>&&proid=<?php echo $result['productId'];?>">Remove</a></td>	
						<?php } ?>
						</tr>
					<?php } } ?>	
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
