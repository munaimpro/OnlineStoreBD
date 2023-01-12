<?php include'../classes/Category.php';?>
<?php include'../classes/Product.php';?>
<?php //include'../helpers/Format.php';?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
$pd = new Product();
$fm = new Format();

if(isset($_GET['delpro'])){
	$id = preg_replace('/^a-zA-Z0-9/', '', $_GET['delpro']);
	$delproduct = $pd->delProductById($id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Product List</h2>
        <div class="block">
		<?php
			if(isset($delproduct)){
				echo $delproduct;
			}
		?>
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>SL</th>
					<th>Product Name</th>
					<th>Description</th>
					<th>Category</th>
					<th>Brand</th>
					<th>Price</th>
					<th>Image</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$getProduct = $pd->getAllProduct();
				if($getProduct){
						$i = 0;
					while($result = $getProduct->fetch_assoc()){
						$i++;
					?>
				<tr class="odd gradeX">
					<td><?php echo $i;?></td>
					<td><?php echo $result['productName'];?></td>
					<td><?php echo $fm->textShorten($result['body'], 50);?></td>
					<td class="center"><?php echo $result['catName'];?></td>
					<td><?php echo $result['brandName'];?></td>
					<td><?php echo $result['price'];?></td>
					<td><img src="<?php echo $result['image'];?>" alt="product img" height="40px" width="60px"/></td>
					<td class="center">
						<?php 
							if($result['type'] == 0){
								echo"Featured";
							} else{
								echo"General";
							}?>
					</td>
					<td><a href="productedit.php?proid=<?php echo $result['productId'];?>">Edit</a> || <a onclick="return confirm('Are you sure to delete?')" href="?delpro=<?php echo $result['productId'];?>">Delete</a></td>
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
