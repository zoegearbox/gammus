<?php
class Hafalan{

	private $conn;
	private $table_name = "t_hafalan";

	public $id; 
	public $juz;
	public $sr; 

	public function __construct($db){
		$this->conn = $db;
	}

	function insert(){

		$query = "insert into ".$this->table_name." (status,juz,surah)values('1',?,?)";
		$stmt = $this->conn->prepare($query); 
		$stmt->bindParam(1, $this->juz); ;
		$stmt->bindParam(2, $this->sr); ; 

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
	
	function readBroadcast(){

		$query = "SELECT ".$this->table_name.".* FROM ".$this->table_name."  
		ORDER BY updated_at DESC";
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
		$this->juz = $row['juz']; 
		$this->sr = $row['surah']; 
	}

	// update the product
	function update(){

		$query = "UPDATE
					" . $this->table_name . "
				SET
					juz = :juz, 
					surah = :sr 
				WHERE
					id = :id";

		$stmt = $this->conn->prepare($query);
 
		$stmt->bindParam(':juz', $this->juz);
		$stmt->bindParam(':sr', $this->sr);
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
