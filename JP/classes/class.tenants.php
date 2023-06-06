<?php
class Tenants{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='db_wbapp';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}
	public function list_tenants_search($keyword){
		
		//$keyword = "%".$keyword."%";

		$q = $this->conn->prepare('SELECT * FROM tbl_tenants WHERE RoomNumber LIKE ?');
		$q->bindValue(1, "%$keyword%", PDO::PARAM_STR);
		$q->execute();

		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]= $r;
		}
		if(empty($data)){
		   return false;
		}else{
			return $data;	
		}
	}
	
	public function create_new_tenants($RoomNumber, $FName,$LName, $HomeAddress, $Age, $Contact){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$data = [
			[$RoomNumber,$FName,$LName, $HomeAddress, $Age, $Contact],
		];
		$stmt = $this->conn->prepare("INSERT INTO tbl_tenants (RoomNumber, Fname, Lname, HomeAddress, Age, Contact) VALUES (?,?,?,?,?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row)
			{
				$stmt->execute($row);
			}
			$this->conn->commit();
		}catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}

		return true;

	}

	public function update_tenants($RoomNumber, $FName,$LName, $HomeAddress, $Age, $Contact){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$sql = "UPDATE tbl_tenants SET RoomNumber=:RoomNumber, FName=:FName, LName=:LName, HomeAddress=:HomeAddress, Age=:Age, Contact=:Contact WHERE FName=:FName ";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':RoomNumber'=>$RoomNumber, ':FName'=>$FName,':LName'=>$LName, 'HomeAddress'=>$HomeAddress, 'Age'=>$Age, 'Contact'=>$Contact, ));
		return true;
	}

	public function list_tenants(){
		$sql="SELECT * FROM tbl_tenants";
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		if(empty($data)){
		   return false;
		}else{
			return $data;	
		}
}

	function get_Tenant_ID($ID){
		$sql="SELECT Tenant_ID FROM tbl_tenants WHERE Tenant_ID = :Tenant_ID";	
		$q = $this->conn->prepare($sql);
		$q->execute(['Tenant_ID' => $ID]);
		$ID = $q->fetchColumn();
		return $ID;
	}
	function get_FName($ID){
		$sql="SELECT FName FROM tbl_tenants WHERE Tenant_ID = :Tenant_ID";	
		$q = $this->conn->prepare($sql);
		$q->execute(['Tenant_ID' => $ID]);
		$FName = $q->fetchColumn();
		return $FName;
	}
	function get_LName($ID){
		$sql="SELECT LName FROM tbl_tenants WHERE Tenant_ID = :Tenant_ID";	
		$q = $this->conn->prepare($sql);
		$q->execute(['Tenant_ID' => $ID]);
		$LName = $q->fetchColumn();
		return $LName;
	}
	function get_HomeAddress($ID){
		$sql="SELECT room_vacancy FROM tbl_tenants WHERE Tenant_ID = :Tenant_ID";	
		$q = $this->conn->prepare($sql);
		$q->execute(['Tenant_ID' => $ID]);
		$HomeAddress = $q->fetchColumn();
		return $HomeAddress;
	}
    function get_Age($ID){
		$sql="SELECT Age FROM tbl_tenants WHERE Tenant_ID = :Tenant_ID";	
		$q = $this->conn->prepare($sql);
		$q->execute(['Tenant_ID' => $ID]);
		$Age = $q->fetchColumn();
		return $Age;
	}
    function get_Contact($ID){
		$sql="SELECT Contact FROM tbl_tenants WHERE Tenant_ID = :Tenant_ID";	
		$q = $this->conn->prepare($sql);
		$q->execute(['Tenant_ID' => $ID]);
		$Contact = $q->fetchColumn();
		return $Contact;
	}

	function get_RoomNumber($ID){
		$sql="SELECT RoomNumber FROM tbl_tenants WHERE Tenant_ID = :Tenant_ID";	
		$q = $this->conn->prepare($sql);
		$q->execute(['Tenant_ID' => $ID]);
		$RoomNumber = $q->fetchColumn();
		return $RoomNumber;
	}
	
}