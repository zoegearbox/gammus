<?php
class Broadcast{

	private $conn;
	private $table_name = "t_broadcast";

	public $id;
	public $th;
	public $bl;
	public $jml;

	public function __construct($db){
		$this->conn = $db;
	}

	function insert(){

		$query = "insert into t_broadcast (status,tahun,bulan,jumlah_kirim) values('1',?,?,?)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->th);
		$stmt->bindParam(2, $this->bl);
		$stmt->bindParam(3, $this->jml);

		if($stmt->execute()){
			return true;
		}else{
			return false;
		}

	}


	function readAll(){

		$query = "SELECT ".$this->table_name.".* FROM ".$this->table_name."
		ORDER BY ".$this->table_name.".updated_at DESC";
		$stmt = $this->conn->prepare($query);
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
		$this->th = $row['tahun'];
		$this->bl = $row['bulan'];
		$this->jml = $row['jumlah_kirim'];
	}

	// update the product
	function update(){

		$query = "UPDATE
					" . $this->table_name . "
				SET
					tahun = :th,
					bulan = :bl,
					jumlah_kirim = :jml
				WHERE
					id = :id";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':th', $this->th);
		$stmt->bindParam(':bl', $this->bl);
		$stmt->bindParam(':jml', $this->jml);
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
