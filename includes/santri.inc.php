<?php
class Santri{

	private $conn;
	private $table_name = "t_santri";

	public $id; 
	public $nis;
	public $nm;
	public $ta;
	public $sta;

	public function __construct($db){
		$this->conn = $db;
	}

	function insert(){

		$query = "insert into ".$this->table_name." (status,nis,nama_santri,tahun_akademik,status_santri)values('1',?,?,?,?)";
		$stmt = $this->conn->prepare($query); 
		$stmt->bindParam(1, $this->nis); ;
		$stmt->bindParam(2, $this->nm); ;
		$stmt->bindParam(3, $this->ta); ;
		$stmt->bindParam(4, $this->sta); ;

		if($stmt->execute()){
			return true;
		}else{
			return false;
		}

	}

	function readAll(){

		$query = "SELECT ".$this->table_name.".* FROM ".$this->table_name."  
		ORDER BY updated_at DESC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	} 
	 

	function readWali(){

		$query = "SELECT ".$this->table_name.".* FROM ".$this->table_name." WHERE ".$this->table_name.".id NOT IN (SELECT t_wali.id_santri from t_wali LEFT JOIN ".$this->table_name." ON ".$this->table_name.".id=t_wali.id_santri WHERE t_wali.id_santri=".$this->table_name.".id) GROUP BY ".$this->table_name.".id
		ORDER BY ".$this->table_name.".updated_at ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	} 

	function readKelas(){

		$query = "SELECT ".$this->table_name.".*,t_kelas.nama_kelas FROM ".$this->table_name."
		LEFT JOIN t_kelas_santri ON t_kelas_santri.id_santri=".$this->table_name.".id
		LEFT JOIN t_kelas ON t_kelas.id=t_kelas_santri.id_kelas
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
		$this->nis = $row['nis']; 
		$this->nm = $row['nama_santri']; 
		$this->ta = $row['tahun_akademik']; 
		$this->sta = $row['status_santri']; 
	}

	// update the product
	function update(){

		$query = "UPDATE
					" . $this->table_name . "
				SET
					nis = :nis, 
					nama_santri = :nm,
					tahun_akademik = :ta,
					status_santri = :sta
				WHERE
					id = :id";

		$stmt = $this->conn->prepare($query);
 
		$stmt->bindParam(':nis', $this->nis);
		$stmt->bindParam(':nm', $this->nm);
		$stmt->bindParam(':ta', $this->ta);
		$stmt->bindParam(':sta', $this->sta);
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
