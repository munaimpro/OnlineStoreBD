<?php include'../classes/Category.php';?>
<?php include'../classes/Brand.php';?>
<?php include'../classes/Product.php';?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
if(!isset($_GET['proid']) || $_GET['proid'] == NULL){
	header("Location:productlist.php");
} else{
	$id = preg_replace('[^-a-zA-Z0-9_]', '', $_GET['proid']);
}

$pd = new Product();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$updateProduct = $pd->productUpdate($id, $_POST, $_FILES);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Product</h2>
        <div class="block">
		<?php
			if(isset($updateProduct)){
				echo $updateProduct;
			}
		?>
		<?php
			$getProduct = $pd->getProductById($id);
			if($getProduct){
				while($product = $getProduct->fetch_assoc()){ ?>
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="productName" value="<?php echo $product['productName'];?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="catId">
                            <option>Select Category</option>
						<?php
							$cat = new Category();
							$getCat = $cat->getAllCat();
							if($getCat){
								while($result = $getCat->fetch_assoc()){?>
                            <option
							<?php
								if($result['catId'] == $product['catId']){
									echo"selected";
								}
							?> value="<?php echo $result['catId'];?>"><?php echo $result['catName'];?></option>
						<?php } } ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="brandId">
                            <option>Select Brand</option>
						<?php
							$brand = new Brand();
							$getBrand = $brand->getAllBrand();
							if($getBrand){
								while($result = $getBrand->fetch_assoc()){?>
                            <option 
							<?php
								if($result['brandId'] == $product['brandId']){
									echo"selected";
								}
							?> value="<?php echo $result['brandId']; ?>"><?php echo $result['brandName']; ?></option>
						<?php } } ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea name="body" class="tinymce"><?php echo $product['body'];?></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name="price" value="<?php echo $product['price'];?>" class="medium" />
                    </td>
                </tr>
				<tr>
					<td></td>
					<td>
						<img src="<?php echo $product['image'];?>" alt="product img" height="160px" width="200px"/>
					</td>
				</tr>
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input type="file" name="image"/>
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
						<?php if($product['type'] == 0){ ?>
                            <option selected="selected" value="0">Featured</option>
							<option value="1">General</option>
						<?php } else{ ?>
							<option value="0">Featured</option>
                            <option selected="selected" value="1">General</option>
						<?php } ?>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
		<?php } } ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


