<?php
class KelasSantri{

	private $conn;
	private $table_name = "t_kelas_santri";

	public $id; 
	public $id_s;
	public $id_k;

	public function __construct($db){
		$this->conn = $db;
	}

	function insert(){

		$query = "insert into ".$this->table_name." (status,id_santri,id_kelas)values('1',?,?)";
		$stmt = $this->conn->prepare($query); 
		$stmt->bindParam(1, $this->id_s); 
		$stmt->bindParam(2, $this->id_k); 

		if($stmt->execute()){
			return true;
		}else{
			return false;
		}

	}

	function readAll(){

		$query = "SELECT ".$this->table_name.".*,nama_santri,nama_kelas,t_tahun_akademik.tahun_akademik FROM ".$this->table_name." 
		LEFT JOIN t_santri ON t_santri.id=".$this->table_name.".id_santri 
		LEFT JOIN t_kelas ON t_kelas.id=".$this->table_name.".id_kelas 
		LEFT JOIN t_tahun_akademik ON t_tahun_akademik.id=t_kelas.id_tahun_akademik 
		ORDER BY ".$this->table_name.".updated_at DESC";
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
		$this->id_s = $row['id_santri']; 
		$this->id_k = $row['id_kelas']; 
	}

	// update the product
	function update(){

		$query = "UPDATE
					" . $this->table_name . "
				SET
					id_santri = :id_s,
					id_kelas = :id_k
				WHERE
					id = :id";

		$stmt = $this->conn->prepare($query);
 
		$stmt->bindParam(':id_s', $this->id_s);
		$stmt->bindParam(':id_k', $this->id_k);
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
