<?php
class Rooms{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='db_wbapp';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}
	
	public function create_new_rooms($room_no,$room_price,$room_status, $room_vacancy){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$data = [
			[$room_no,$room_price,$room_status, $room_vacancy],
		];
		$stmt = $this->conn->prepare("INSERT INTO tbl_rooms (room_no, room_price, room_status, room_vacancy) VALUES (?,?,?,?)");
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

	public function update_rooms($room_no,$room_price,$room_status, $room_vacancy){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$sql = "UPDATE tbl_rooms SET room_number=:room_number,room_price=:room_price,room_status=:room_status, room_vacancy=:room_vacancy WHERE room_no=:room_no";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':room_number'=>$room_no, ':room_price'=>$room_price,':room_status'=>$room_status, 'room_vacancy'=>$room_vacancy));
		return true;
	}

	public function list_rooms(){
		$sql="SELECT * FROM tbl_rooms";
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

	function get_room_no($room_no){
		$sql="SELECT room_no FROM tbl_rooms WHERE room_no = :room_no";	
		$q = $this->conn->prepare($sql);
		$q->execute(['room_no' => $room_no]);
		$room_no = $q->fetchColumn();
		return $room_no;
	}
	function get_room_price($room_no){
		$sql="SELECT room_price FROM tbl_rooms WHERE room_no = :room_no";	
		$q = $this->conn->prepare($sql);
		$q->execute(['room_no' => $room_no]);
		$room_price = $q->fetchColumn();
		return $room_price;
	}
	function get_room_status($room_no){
		$sql="SELECT room_status FROM tbl_rooms WHERE room_no = :room_no";	
		$q = $this->conn->prepare($sql);
		$q->execute(['room_no' => $room_no]);
		$room_status = $q->fetchColumn();
		return $room_status;
	}
	function get_room_vacancy($room_no){
		$sql="SELECT room_vacancy FROM tbl_rooms WHERE room_no = :room_no";	
		$q = $this->conn->prepare($sql);
		$q->execute(['room_no' => $room_no]);
		$room_vacancy = $q->fetchColumn();
		return $room_vacancy;
	}
	
}