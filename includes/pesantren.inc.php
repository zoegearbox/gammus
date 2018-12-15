<?php
class Pesantren{

	private $conn;
	private $table_name = "t_pesantren";

	public $id;
	public $nmp;
	public $almt;
	public $komp;
	public $sms;

	public function __construct($db){
		$this->conn = $db;
	}

	function insert(){

		$query = "insert into t_broadcast (status,nama_pondok,alamat_pondok,komputer_pondok,no_sms_gateway) values('1',?,?,?,?)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->nmp);
		$stmt->bindParam(2, $this->almt);
		$stmt->bindParam(3, $this->komp);
		$stmt->bindParam(4, $this->sms);

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
		$this->nmp = $row['nama_pondok'];
		$this->almt = $row['alamat_pondok'];
		$this->komp = $row['komputer_pondok'];
		$this->sms = $row['no_sms_gateway'];
	}
	
	// read only real id
	function readReal(){ 
		$query = "SELECT * FROM " . $this->table_name . " WHERE id=1 LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->id);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->id = $row['id'];
		$this->nmp = $row['nama_pondok'];
		$this->almt = $row['alamat_pondok'];
		$this->komp = $row['komputer_pondok'];
		$this->sms = $row['no_sms_gateway'];
	}

	// update the product
	function update(){

		$query = "UPDATE
					" . $this->table_name . "
				SET
					nama_pondok = :nmp,
					alamat_pondok = :almt,
					komputer_pondok = :komp,
					no_sms_gateway = :sms
				WHERE
					id = :id";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':nmp', $this->nmp);
		$stmt->bindParam(':almt', $this->almt);
		$stmt->bindParam(':komp', $this->komp);
		$stmt->bindParam(':sms', $this->sms);
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
