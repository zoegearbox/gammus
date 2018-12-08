<?php
class Hafiz{

	private $conn;
	private $table_name = "t_hafiz";

	public $id;
	public $id_s;
	public $th;
	public $bln;
	public $cap;
	public $nam;

	public function __construct($db){
		$this->conn = $db;
	}

	function insert(){

		$query = "insert into ".$this->table_name." (status,id_santri,tahun,bulan,pencapaian_hafalan,penambahan_hafalan)values('1',?,?,?,?,?)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id_s); ;
		$stmt->bindParam(2, $this->th); ;
		$stmt->bindParam(3, $this->bln); ;
		$stmt->bindParam(4, $this->cap); ;
		$stmt->bindParam(5, $this->nam); ; 

		if($stmt->execute()){
			return true;
		}else{
			return false;
		}

	}

	function readAll(){

		$query = "SELECT ".$this->table_name.".id,tahun,bulan,nama_santri,t1.juz AS cap_juz,t1.surah AS cap_surah,t2.juz AS nam_juz,t2.surah AS nam_surah FROM ".$this->table_name."  
		LEFT JOIN t_santri ON t_santri.id=".$this->table_name.".id_santri 
		LEFT JOIN t_hafalan AS t1 ON t1.id=".$this->table_name.".pencapaian_hafalan
		LEFT JOIN t_hafalan AS t2 ON t2.id=".$this->table_name.".penambahan_hafalan
		ORDER BY ".$this->table_name.".updated_at DESC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}

	function readBroadcast(){

		$query = "SELECT tutama.id,tutama.tahun,tutama.bulan,t_santri.nis,t_santri.nama_santri,t_wali.nama_wali,t_wali.no_hp,t1.juz AS cap_juz,t1.surah AS cap_surah,t2.juz AS nam_juz,t2.surah AS nam_surah 
		FROM (SELECT MAX(id) AS maxi, t_hafiz.* FROM `t_hafiz` GROUP BY `t_hafiz`.`id_santri` DESC ) AS tutama   
		LEFT JOIN t_santri ON t_santri.id=tutama.id_santri 
		LEFT JOIN t_wali ON t_wali.id_santri=tutama.id_santri 
		LEFT JOIN t_hafalan AS t1 ON t1.id=tutama.pencapaian_hafalan
		LEFT JOIN t_hafalan AS t2 ON t2.id=tutama.penambahan_hafalan 
		ORDER BY t_santri.nis ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}
	
	//itung jumlah
	function jmlBroadcast() {
		$query= 'SELECT count(tutama.id) as jumlah FROM (SELECT MAX(updated_at) AS maxi, t_hafiz.* FROM `t_hafiz` GROUP BY `t_hafiz`.`id_santri` DESC ) AS tutama   
		LEFT JOIN t_santri ON t_santri.id=tutama.id_santri 
		LEFT JOIN t_hafalan AS t1 ON t1.id=tutama.pencapaian_hafalan
		LEFT JOIN t_hafalan AS t2 ON t2.id=tutama.penambahan_hafalan 
		ORDER BY t_santri.nis ASC';
		$atu = $this->conn->prepare( $query );
		$jml=$atu->fetchColumn(); 
		
		return $jml;
	}

	// //test
	// function readSpe(){

		// $query = "SELECT SUM(harga) AS total FROM ".$this->table_name." ";
		// $stmt = $this->conn->prepare( $query );
		// $stmt->execute();

		// return $stmt;
	// }

	// used when filling up the update product form
	function readOne(){

		$query = "SELECT * FROM " . $this->table_name . " WHERE id=? LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->id);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->id = $row['id'];
		$this->id_s = $row['id_santri'];
		$this->th = $row['tahun'];
		$this->bln = $row['bulan'];
		$this->cap = $row['pencapaian_hafalan'];
		$this->nam = $row['penambahan_hafalan'];
	}

	// update the product
	function update(){

		$query = "UPDATE
					" . $this->table_name . "
				SET
					id_santri = :id_s,
					tahun = :th,
					bulan = :bln,
					pencapaian_hafalan = :cap,
					penambahan_hafalan = :nam
				WHERE
					id = :id";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':id_s', $this->id_s);
		$stmt->bindParam(':th', $this->th);
		$stmt->bindParam(':bln', $this->bln);
		$stmt->bindParam(':cap', $this->cap);
		$stmt->bindParam(':nam', $this->nam);
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
