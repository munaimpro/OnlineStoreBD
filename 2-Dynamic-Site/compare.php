<?php include'inc/header.php';?>
<?php
$login = Session::get("custlogin");
if($login == false){
	header("location:login.php");
}
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Compare</h2>
						<table class="tblone">
							<tr>
								<th>SL</th>
								<th>Product Name</th>
								<th>Image</th>
								<th>Price</th>
								<th>Action</th>
							</tr>
						<?php
							$cmrId = Session::get("cmrId");
							$getPro = $pd->getCompareProduct($cmrId);
							if($getPro){
									$i = 0;
								while($result = $getPro->fetch_assoc()){
									$i++;
						?>	
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $result['productName'];?></td>
								<td><img style="height:90px; width:100px;" src="admin/<?php echo $result['image'];?>" alt=""/></td>
								<td>$<?php echo $result['price'];?></td>
								<td><a href="details.php?proid=<?php echo $result['productId'];?>">view</a></td>
							</tr>
						<?php } } else{ header("location:index.php"); }?>	
						</table>
					</div>
					<div class="shopping">
						<div class="shopleft" style="width: 100%; margin: 0 auto;">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php include'inc/footer.php';?>