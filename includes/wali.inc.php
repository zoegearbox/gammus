<?php
class Wali{

	private $conn;
	private $table_name = "t_wali";

	public $id; 
	public $id_s; 
	public $namaw;
	public $nohp; 

	public function __construct($db){
		$this->conn = $db;
	}

	function insert(){

		$query = "insert into ".$this->table_name." (status,id_santri,nama_wali,no_hp)values('1',?,?,?)";
		$stmt = $this->conn->prepare($query); 
		$stmt->bindParam(1, $this->id_s); ;
		$stmt->bindParam(2, $this->namaw); ; 
		$stmt->bindParam(3, $this->nohp); ; 

		if($stmt->execute()){
			return true;
		}else{
			return false;
		}

	}

	function readAll(){

		$query = "SELECT ".$this->table_name.".*,t_santri.nama_santri FROM ".$this->table_name." 
		LEFT JOIN t_santri ON t_santri.id=".$this->table_name.".id_santri
		ORDER BY ".$this->table_name.".updated_at DESC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	} 
	//salah
	function readSpe(){

		$query = "SELECT t_wali.*,t_santri.nama_santri FROM t_wali 
		LEFT JOIN t_santri ON t_santri.id=t_wali.id_santri
		WHERE t_santri.id NOT IN (SELECT t_wali.id_santri from t_wali LEFT JOIN t_santri ON t_santri.id=t_wali.id_santri WHERE t_wali.id_santri=t_santri.id ) GROUP BY t_wali.id
		ORDER BY t_wali.updated_at DESC";
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
		$this->namaw = $row['nama_wali']; 
		$this->nohp = $row['no_hp']; 
	}

	// update the product
	function update(){

		$query = "UPDATE
					" . $this->table_name . "
				SET
					id_santri = :id_s, 
					nama_wali = :namaw, 
					no_hp = :nohp 
				WHERE
					id = :id";

		$stmt = $this->conn->prepare($query);
 
		$stmt->bindParam(':id_s', $this->id_s);
		$stmt->bindParam(':namaw', $this->namaw);
		$stmt->bindParam(':nohp', $this->nohp);
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
