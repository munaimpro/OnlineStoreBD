<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
?>

<?php
Class Brand{
	private $db;
	private $fm;
	
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	
	public function brandInsert($brandName){
		$brandName = $this->fm->validation($brandName);
		$brandName = mysqli_real_escape_string($this->db->link, $brandName);
		
		if(empty($brandName)){
			$msg = "Brand name must not be empty!";
			return $msg;
		} else{
			$query = "INSERT INTO tbl_brand(brandName) VALUES('$brandName')";
			$brandinsert = $this->db->insert($query);
			if($brandinsert){
				$msg = "<span class='success'>Brand inserted successfully!</span>";
				return $msg;
			} else{
				$msg = "<span class='error'>Brand not inserted</span>";
				return $msg;
			}
		}
	}
	
	public function getAllBrand(){
		$query = "SELECT * FROM tbl_brand ORDER BY brandId DESC";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function getBrandById($id){
		$query = "SELECT * FROM tbl_brand WHERE brandId = '$id'";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function brandUpdate($brandName, $id){
		$brandName = $this->fm->validation($brandName);
		$id        = $this->fm->validation($id);
		$brandName = mysqli_real_escape_string($this->db->link, $brandName);
		
		if(empty($brandName)){
			$msg = "Brand name must not be empty!";
			return $msg;
		} else{
			$query = "UPDATE tbl_brand
					  SET
					  brandName = '$brandName' WHERE
					  brandId = '$id'";
			$updatebrand = $this->db->update($query);
			if($updatebrand){
				$msg = "Brand name updated successfully!";
				return $msg;
			} else{
				$msg = "Brand name not updated";
				return $msg;
			}
		}
	}
	
	public function delBrandById($id){
		$query = "DELETE FROM tbl_brand WHERE brandId = '$id'";
		$deldata = $this->db->delete($query);
		if($deldata){
			$msg = "Brand name deleted successfully!";
			return $msg;
		} else{
			$msg = "Brand name not deleted";
			return $msg;
		}
	}
}
?>