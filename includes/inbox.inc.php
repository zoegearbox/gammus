<?php
class Inbox{
	
	private $conn;
	private $table_name = "inbox";
	
	public $ud;
	public $ni;
	public $kt;
	public $gol;
	public $jbt;
	
	public function __construct($db){
		$this->conn = $db;
	}
	
	function insert(){
		
		$query = "insert into ".$this->table_name." values('',?,?,?,?,'')";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->ni);
		$stmt->bindParam(2, $this->kt);
		$stmt->bindParam(3, $this->gol);
		$stmt->bindParam(4, $this->jbt);
		
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		
	}
	
	function readAll(){

		$query = "SELECT * FROM ".$this->table_name." ORDER BY ReceivingDateTime DESC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
	// function readAllAkhir(){

		// $query = "SELECT * FROM ".$this->table_name." ORDER BY hasil_alternatif DESC";
		// $stmt = $this->conn->prepare( $query );
		// $stmt->execute();
		
		// return $stmt;
	// }
	
	// function readAllAkhir4a(){

		// $query = "SELECT * FROM ".$this->table_name." WHERE golongan='IV/A' ORDER BY hasil_alternatif DESC";
		// $stmt = $this->conn->prepare( $query );
		// $stmt->execute();
		
		// return $stmt;
	// }
	
	 
	function readNew(){

		$query = "SELECT * FROM ".$this->table_name." ORDER BY ReceivingDateTime DESC LIMIT 3";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
	
	// used when filling up the update product form
	function readOne(){
		
		$query = "SELECT * FROM " . $this->table_name . " WHERE ID=? LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->id);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$this->id = $row['ID'];
		$this->sms = $row['TextDecoded'];
		$this->by = $row['SenderNumber'];
		$this->recieve = $row['ReceivingDateTime'];
		// $this->update = $row['UpdateInDB'];
	}
		
	// delete the product
	function delete(){
	
		$query = "DELETE FROM " . $this->table_name . " WHERE id_alternatif = ?";
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id);

		if($result = $stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
}
?>