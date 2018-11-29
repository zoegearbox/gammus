<?php
class Kelas{

	private $conn;
	private $table_name = "t_kelas";

	public $id;
	public $nk;
	public $ket;
	public $id_ta;

	public function __construct($db){
		$this->conn = $db;
	}

	function insert(){

		$query = "insert into ".$this->table_name." (status,nama_kelas,keterangan,id_tahun_akademik)values('1',?,?,?)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->nk); ;
		$stmt->bindParam(2, $this->ket); ;
		$stmt->bindParam(3, $this->id_ta); ;

		if($stmt->execute()){
			return true;
		}else{
			return false;
		}

	}

	function readAll(){

		$query = "SELECT ".$this->table_name." .*,tahun_akademik FROM ".$this->table_name." 
		LEFT JOIN t_tahun_akademik ON t_tahun_akademik.id=".$this->table_name.".id_tahun_akademik ORDER BY updated_at ASC";
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
		$this->nk = $row['nama_kelas']; 
		$this->ket = $row['keterangan']; 
		$this->id_ta = $row['id_tahun_akademik']; 
	}

	// update the product
	function update(){

		$query = "UPDATE
					" . $this->table_name . "
				SET
					nama_kelas = :nk
					keterangan = :ket
					id_tahun_akademik = :id_ta
				WHERE
					id = :id";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':nk', $this->nk);
		$stmt->bindParam(':ket', $this->ket);
		$stmt->bindParam(':id_ta', $this->id_ta);
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
