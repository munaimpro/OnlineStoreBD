<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
?>
<?php
Class Product{
	private $db;
	private $fm;
	
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	
	public function productInsert($data, $files){
		$productName = $this->fm->validation($data['productName']);
		$productName = mysqli_real_escape_string($this->db->link, $productName);
		
		$catId = $this->fm->validation($data['catId']);
		$catId = mysqli_real_escape_string($this->db->link, $catId);
		
		$brandId = $this->fm->validation($data['brandId']);
		$brandId = mysqli_real_escape_string($this->db->link, $brandId);
		
		$body = mysqli_real_escape_string($this->db->link, $data['body']);
		
		$price = $this->fm->validation($data['price']);
		$price = mysqli_real_escape_string($this->db->link, $price);
		
		$type = $this->fm->validation($data['type']);
		$type = mysqli_real_escape_string($this->db->link, $type);
		
		$permitted = array('jpg','jpeg','png','gif');
		$file_name = $files['image']['name'];
		$file_size = $files['image']['size'];
		$file_temp = $files['image']['tmp_name'];
		
		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
		$uploaded_image = "upload/".$unique_image;
		
		if($productName == "" || $catId == "" || $brandId == "" || $body == "" || $price == "" || $type == "" || $file_name ==""){
			$msg = "Fields must not be empty!";
			return $msg;
		} else{
			move_uploaded_file($file_temp, $uploaded_image);
			$query = "INSERT INTO tbl_product(productName, catId, brandId, body, price, image, type) VALUES('$productName', '$catId', '$brandId', '$body', '$price', '$uploaded_image', '$type')";
			$productinsert = $this->db->insert($query);
			if($productinsert){
				$msg = "Product added successfully!";
				return $msg;
			} else{
				$msg = "Product not added";
				return $msg;
			}
		}
	}
	
	public function getAllProduct(){
		$query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName FROM tbl_product 
		INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
		INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId
		ORDER BY tbl_product.productId DESC";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function getProductById($id){
		$query = "SELECT * FROM tbl_product WHERE productId = '$id'";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function productUpdate($id, $data, $files){
		$id = $this->fm->validation($id);
		$id = mysqli_real_escape_string($this->db->link, $id);
		
		$productName = $this->fm->validation($data['productName']);
		$productName = mysqli_real_escape_string($this->db->link, $productName);
		
		$catId = $this->fm->validation($data['catId']);
		$catId = mysqli_real_escape_string($this->db->link, $catId);
		
		$brandId = $this->fm->validation($data['brandId']);
		$brandId = mysqli_real_escape_string($this->db->link, $brandId);
		
		$body = mysqli_real_escape_string($this->db->link, $data['body']);
		
		$price = $this->fm->validation($data['price']);
		$price = mysqli_real_escape_string($this->db->link, $price);
		
		$type = $this->fm->validation($data['type']);
		$type = mysqli_real_escape_string($this->db->link, $type);
		
		$permitted = array('jpg','jpeg','png','gif');
		$file_name = $files['image']['name'];
		$file_size = $files['image']['size'];
		$file_temp = $files['image']['tmp_name'];
		
		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
		$uploaded_image = "upload/".$unique_image;
		
		if($productName == "" || $catId == "" || $brandId == "" || $body == "" || $price == "" || $type == ""){
			$msg = "Fields must not be empty!";
			return $msg;
		} else{
			if(!empty($file_name)){
				move_uploaded_file($file_temp, $uploaded_image);
				$query = "UPDATE tbl_product
						  SET
						  productName = '$productName',
						  catId       = '$catId',
						  brandId 	  = '$brandId',
						  body   	  = '$body',
						  price   	  = '$price',
						  image   	  = '$uploaded_image',
						  type 		  = '$type' WHERE
						  productId   = '$id'";
				$productinsert = $this->db->update($query);
				if($productinsert){
					$msg = "Product updated successfully!";
					return $msg;
				} else{
					$msg = "Product not updated";
					return $msg;
				}
			} else{
				$query = "UPDATE tbl_product
						  SET
						  productName = '$productName',
						  catId       = '$catId',
						  brandId 	  = '$brandId',
						  body   	  = '$body',
						  price   	  = '$price',
						  type 		  = '$type' WHERE
						  productId   = '$id'";
				$productinsert = $this->db->update($query);
				if($productinsert){
					$msg = "Product updated successfully!";
					return $msg;
				} else{
					$msg = "Product not updated";
					return $msg;
				}
			}
		}
	}
	
	public function delProductById($id){
		$query = "DELETE FROM tbl_product WHERE productId = '$id'";
		$deldata = $this->db->delete($query);
		if($deldata){
			$msg = "Product deleted successfully!";
			return $msg;
		} else{
			$msg = "Product not deleted";
			return $msg;
		}
	}
	
	public function getFeaturedProduct(){
		$query = "SELECT * FROM tbl_product WHERE type='0' ORDER BY productId DESC LIMIT 4";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function getNewProduct(){
		$query = "SELECT * FROM tbl_product ORDER BY productId DESC LIMIT 4";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function getSingleProduct($id){
		$query = "SELECT p.*, c.catName, b.brandName FROM tbl_product as p, tbl_category as c, tbl_brand as b WHERE p.catId = c.catId AND p.brandId = b.brandId AND p.productId = '$id'";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function latestFromIphone(){
		$query = "SELECT * FROM tbl_product WHERE brandId = 1 ORDER BY productId LIMIT 1";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function latestFromSamsung(){
		$query = "SELECT * FROM tbl_product WHERE brandId = 2 ORDER BY productId LIMIT 1";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function latestFromAcer(){
		$query = "SELECT * FROM tbl_product WHERE brandId = 3 ORDER BY productId LIMIT 1";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function latestFromCanon(){
		$query = "SELECT * FROM tbl_product WHERE brandId = 4 ORDER BY productId LIMIT 1";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function productByCat($id){
		$id = mysqli_real_escape_string($this->db->link, $id);
		$query = "SELECT * FROM tbl_product WHERE catId = '$id'";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function addToCompare($cmrId, $id){
		$cmrId	     = mysqli_real_escape_string($this->db->link, $cmrId);
		$id    	     = mysqli_real_escape_string($this->db->link, $id);
		
		$query = "SELECT * FROM tbl_product WHERE productId = '$id'";
		$result = $this->db->select($query)->fetch_assoc();
		
		if($result){
			$productId   = $result['productId'];
			$productName = $result['productName'];
			$price 		 = $result['price'];
			$image 		 = $result['image'];
			
			$chkquery = "SELECT * FROM tbl_compare WHERE productId='$productId' AND cmrId = '$cmrId'";
			$chkCompare = $this->db->select($chkquery);
			if($chkCompare){
				$msg = "<span style='color:red; font-size:18px'>Already added!</span>";
				return $msg;
			} else{
				$query = "INSERT INTO tbl_compare(cmrId, productId, productName, price, image) VALUES('$cmrId', '$productId', '$productName', '$price', '$image')";
				$compare = $this->db->insert($query);
				if($compare){
					$msg = "<span style='color:green; font-size:18px'>Added to compare</span>";
					return $msg;
				} else{
					$msg = "<span style='color:red; font-size:18px'>Something went wrong!</span>";
					return $msg;
				}
			}
		}
	}
	
	public function getCompareProduct($cmrId){
		$cmrId = mysqli_real_escape_string($this->db->link, $cmrId);
		$query = "SELECT * FROM tbl_compare WHERE cmrId = '$cmrId'";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function delCompData($cmrId){
		$cmrId = mysqli_real_escape_string($this->db->link, $cmrId);
		$query = "DELETE FROM tbl_compare WHERE cmrId = '$cmrId'";
		$result = $this->db->delete($query);
		return $result;
	}
	
	public function addToWishlist($cmrId, $id){
		$cmrId	     = mysqli_real_escape_string($this->db->link, $cmrId);
		$id    	     = mysqli_real_escape_string($this->db->link, $id);
		
		$query = "SELECT * FROM tbl_product WHERE productId = '$id'";
		$result = $this->db->select($query)->fetch_assoc();
		
		if($result){
			$productId   = $result['productId'];
			$productName = $result['productName'];
			$price 		 = $result['price'];
			$image 		 = $result['image'];
			
			$chkquery = "SELECT * FROM tbl_wlist WHERE productId='$productId' AND cmrId = '$cmrId'";
			$chkCompare = $this->db->select($chkquery);
			if($chkCompare){
				$msg = "<span style='color:red; font-size:18px'>Already added!</span>";
				return $msg;
			} else{
				$query = "INSERT INTO tbl_wlist(cmrId, productId, productName, price, image) VALUES('$cmrId', '$productId', '$productName', '$price', '$image')";
				$compare = $this->db->insert($query);
				if($compare){
					$msg = "<span style='color:green; font-size:18px'>Added to wishlist</span>";
					return $msg;
				} else{
					$msg = "<span style='color:red; font-size:18px'>Something went wrong!</span>";
					return $msg;
				}
			}
		}
	}
	
	public function getWlistProduct($cmrId){
		$cmrId = mysqli_real_escape_string($this->db->link, $cmrId);
		$query = "SELECT * FROM tbl_wlist WHERE cmrId = '$cmrId'";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function delWishlistData($cmrId, $id){
		$cmrId = mysqli_real_escape_string($this->db->link, $cmrId);
		$id    = mysqli_real_escape_string($this->db->link, $id);
		
		$query = "DELETE FROM tbl_wlist WHERE productId = '$id' AND cmrId = '$cmrId'";
		$result = $this->db->delete($query);
		return $result;
	}
}
?>