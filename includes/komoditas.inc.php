<?php
class Komoditas{

	private $conn;
	private $table_name = "t_tahun_akademik";

	public $id;
	public $ta;

	public function __construct($db){
		$this->conn = $db;
	}

	function insert(){

		$query = "insert into ".$this->table_name." (status,tahun_akademik)values('1',?)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->ta); ;

		if($stmt->execute()){
			return true;
		}else{
			return false;
		}

	}

	function readAll(){

		$query = "SELECT * FROM ".$this->table_name." ORDER BY updated_at ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}
	//test
	function readSpe(){

		$query = "SELECT SUM(harga) AS total FROM ".$this->table_name." ";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}

	// used when filling up the update product form
	function readOne(){

		$query = "SELECT * FROM " . $this->table_name . " WHERE id=? LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->id);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->id = $row['id'];
		$this->ta = $row['tahun_akademik'];
	}

	// update the product
	function update(){

		$query = "UPDATE
					" . $this->table_name . "
				SET
					tahun_akademik = :ta
				WHERE
					id = :id";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':ta', $this->ta);
		$stmt->bindParam(':id', $this->id);

		// execute the query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}

	// delete the product
	function delete(){

		$query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

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
