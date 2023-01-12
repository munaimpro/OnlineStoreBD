<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
?>

<?php
class Cart{
	private $db;
	private $fm;
	
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	
	public function addToCart($quantity, $id){
		$quantity  = $this->fm->validation($quantity);
		$quantity  = mysqli_real_escape_string($this->db->link, $quantity);
		$productId = mysqli_real_escape_string($this->db->link, $id);
		$sId       = session_id();
		
		$squery = "SELECT * FROM tbl_product WHERE productId = '$productId'";
		$result = $this->db->select($squery)->fetch_assoc();
		
		$productName = $result['productName'];
		$price		 = $result['price'];
		$image		 = $result['image'];
		
		$query = "SELECT * FROM tbl_cart WHERE productId = '$productId' AND sId = '$sId'";
		$getPro = $this->db->select($query);
		if($getPro){
			$msg = "Product Already Added!";
			return $msg;
		} else{
			$query = "INSERT INTO tbl_cart(sId, productId, productName, price, quantity, image) VALUES('$sId','$productId','$productName','$price','$quantity','$image')";
			$inserted_row = $this->db->insert($query);
			if($inserted_row){
				header('location:cart.php');
			} else{
				header('location:404.php');
			}
		}
	}
	
	public function getCartProduct(){
		$sId = session_id();
		$query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function UpdateCart($quantity, $cartId){
		$quantity = $this->fm->validation($quantity);
		$quantity = mysqli_real_escape_string($this->db->link, $quantity);
		$cartId   = $this->fm->validation($cartId);
		$cartId   = mysqli_real_escape_string($this->db->link, $cartId);
		
		$query = "UPDATE tbl_cart
				  SET
				  quantity = '$quantity' WHERE
				  cartId   = '$cartId'";
		$update_row = $this->db->update($query);
		return $update_row;
	}
	
	public function delProductByCard($delid){
		$delid = mysqli_real_escape_string($this->db->link, $delid);
		
		$query = "DELETE FROM tbl_cart WHERE cartId = '$delid'";
		return $result = $this->db->delete($query);
	}
	
	public function chkCartTable(){
		$sId = session_id();
		$query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function delCustomerCart(){
		$sId = session_id();
		$query = "DELETE FROM tbl_cart WHERE sId = '$sId'";
		$result = $this->db->delete($query);
		return $result;
	}
	
	public function orderProduct($cmrId){
		$sId = session_id();
		$query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
		$getPro = $this->db->select($query);
		if($getPro){
			while($result    = $getPro->fetch_assoc()){
				$productId   = $result['productId'];
				$productName = $result['productName'];
				$quantity    = $result['quantity'];
				$price 		 = $result['price'] * $quantity;
				$image 		 = $result['image'];
				
				$query = "INSERT INTO tbl_order(cmrId, productId, productName, quantity, price, image) VALUES('$cmrId', '$productId', '$productName', '$quantity', '$price', '$image')";
				$inserted_row = $this->db->insert($query);
			}
		}
	}
	
	public function paybleAmount($cmrId){
		$query = "SELECT price FROM tbl_order WHERE cmrId = '$cmrId' AND date = now()";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function getOrderedProduct($cmrId){
		$query = "SELECT * FROM tbl_order WHERE cmrId = '$cmrId'";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function getAllOrderdProduct(){
		$query = "SELECT * FROM tbl_order ORDER BY date";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function productShifted($cmrId, $proid){
		$cmrId = $this->fm->validation($cmrId);
		$cmrId = mysqli_real_escape_string($this->db->link, $cmrId);
		$proid = $this->fm->validation($proid);
		$proid = mysqli_real_escape_string($this->db->link, $proid);
		
		$query = "UPDATE tbl_order
				  SET
				  status    = '1' WHERE
				  cmrId     = '$cmrId' AND 
				  productId = '$proid'";
		$shifted = $this->db->update($query);
		return $shifted;
	}
	
	public function removeShiftedProduct($cmrId, $proid){
		$query = "DELETE FROM tbl_order WHERE cmrId='$cmrId' AND productId='$proid'";
		$result = $this->db->delete($query);
		return $result;
	}
	
	public function confirmShifted($cmrId, $proid){
		$cmrId = $this->fm->validation($cmrId);
		$cmrId = mysqli_real_escape_string($this->db->link, $cmrId);
		$proid = $this->fm->validation($proid);
		$proid = mysqli_real_escape_string($this->db->link, $proid);
		
		$query = "UPDATE tbl_order
				  SET
				  status    = '2' WHERE
				  cmrId     = '$cmrId' AND 
				  productId = '$proid'";
		$confirm = $this->db->update($query);
		return $confirm;
	}
}
?>