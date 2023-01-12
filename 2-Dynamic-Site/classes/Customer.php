<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
?>

<?php
class Customer{
	private $db;
	private $fm;
	
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	
	public function CustomerRegistration($data){
		$Name     = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['Name']));
		$City     = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['City']));
		$Zip      = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['Zip']));
		$EMail    = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['EMail']));
		$Address  = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['Address']));
		$Country  = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['Country']));
		$Phone    = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['Phone']));
		$Password = mysqli_real_escape_string($this->db->link, $this->fm->validation(md5($data['Password'])));
		
		if(empty($Name) || empty($City) || empty($Zip) || empty($EMail) || empty($Address) || empty($Country) || empty($Phone) || empty($Password)){
			$msg = "Fields must not be empty!";
			return $msg;
		}
		$mailquery = "SELECT * FROM tbl_customer WHERE email = '$EMail' LIMIT 1";
		$mailchk   = $this->db->select($mailquery);
		if($mailchk != false){
			$msg = "E-mail allready exist!";
			return $msg;
		} else{
			$query = "INSERT INTO tbl_customer(name, address, city, country, zip, phone, email, pass) VALUES('$Name','$Address','$City','$Country','$Zip','$Phone','$EMail','$Password')";
			$inserted_row = $this->db->insert($query);
			if($inserted_row){
				$msg = "Registration completed successfully!";
				return $msg;
			} else{
				$msg = "Something went wrong";
				return $msg;
			}
		}
	}
	
	public function CustomerLogin($data){
		$Email    = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['Email']));
		$Password = mysqli_real_escape_string($this->db->link, $this->fm->validation(md5($data['Password'])));
		
		if(empty($Email) || empty($Password)){
			$msg = "Fields must not be empty!";
			return $msg;
		}
		$chkMail = "SELECT * FROM tbl_customer WHERE email = '$Email' AND pass = '$Password'";
		$result = $this->db->select($chkMail);
		if($result != false){
			$value = $result->fetch_assoc();
			Session::set("custlogin", true);
			Session::set("cmrId", $value['id']);
			Session::set("cmrName", $value['name']);
			header("Location:cart.php");
		} else{
			$msg = "Email or Password not matched!";
			return $msg;
		}
	}
	
	public function getCustomerData($id){
		$query = "SELECT * FROM tbl_customer WHERE id = '$id'";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function customerUpdate($data, $cmrId){
		$Name     = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['Name']));
		$City     = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['City']));
		$Zip      = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['Zip']));
		$EMail    = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['EMail']));
		$Address  = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['Address']));
		$Country  = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['Country']));
		$Phone    = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['Phone']));
		
		if(empty($Name) || empty($City) || empty($Zip) || empty($EMail) || empty($Address) || empty($Country) || empty($Phone)){
			$msg = "Fields must not be empty!";
			return $msg;
		} else{
			$query = "UPDATE tbl_customer
					  SET
					  name    = '$Name',
					  address = '$Address',
					  city    = '$City',
					  country = '$Country',
					  zip 	  = '$Zip',
					  phone   = '$Phone',
					  email   = '$EMail' WHERE
					  id	  = '$cmrId'";
			$updated_row = $this->db->update($query);
			if($updated_row){
				$msg = "Profile updated successfully!";
				return $msg;
			} else{
				$msg = "Something went wrong";
				return $msg;
			}
		}
	}
}
?>