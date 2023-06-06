<?php
class Payments{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='db_wbapp';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}
	
	public function create_new_payments($payment_ID,$FName, $LName, $AmountDue, $payment_status){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$data = [
			[$payment_ID,$FName,$LName,$AmountDue, $payment_status],
		];
		$stmt = $this->conn->prepare("INSERT INTO tbl_payments (payment_ID, FName, LName, AmountDue, payment_status) VALUES (?,?,?,?,?)");
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

	public function update_payments($payment_ID,$FName,$LName,$AmountDue, $payment_status){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$sql = "UPDATE tbl_payments SET payment_ID=:payment_ID,FName=:FName,LName=:LName, AmountDue=:AmountDue, payment_status=:payment_status WHERE payment_ID=:payment_ID";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':payment_ID'=>$payment_ID, ':FName'=>$FName,':LName'=>$LName, 'AmountDue'=>$AmountDue, 'payment_status'=>$payment_status));
		return true;
	}

	public function list_payments(){
		$sql="SELECT * FROM tbl_payments";
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

	function get_payment_ID($payment_ID){
		$sql="SELECT payment_ID FROM tbl_payments WHERE payment_ID = :payment_ID";	
		$q = $this->conn->prepare($sql);
		$q->execute(['payment_ID' => $payment_ID]);
		$payment_ID = $q->fetchColumn();
		return $payment_ID;
	}
	function get_FName($payment_ID){
		$sql="SELECT FName FROM tbl_payments WHERE payment_ID = :payment_ID";	
		$q = $this->conn->prepare($sql);
		$q->execute(['payment_ID' => $payment_ID]);
		$FName = $q->fetchColumn();
		return $FName;
	}
	function get_LName($payment_ID){
		$sql="SELECT LName FROM tbl_payments WHERE payment_ID = :payment_ID";	
		$q = $this->conn->prepare($sql);
		$q->execute(['payment_ID' => $payment_ID]);
		$LName= $q->fetchColumn();
		return $LName;
	}
	function get_AmountDue($payment_ID){
		$sql="SELECT AmountDue FROM tbl_payments WHERE payment_ID = :payment_ID";	
		$q = $this->conn->prepare($sql);
		$q->execute(['payment_ID' => $payment_ID]);
		$AmountDue = $q->fetchColumn();
		return $AmountDue;
	}

    function get_payment_status($payment_ID){
		$sql="SELECT payment_status FROM tbl_payments WHERE payment_ID = :payment_ID";	
		$q = $this->conn->prepare($sql);
		$q->execute(['payment_ID' => $payment_ID]);
		$payment_status = $q->fetchColumn();
		return $payment_status;
	}
	
	
}