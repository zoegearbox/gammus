<?php
declare(strict_types=1); // nilai 1 kode harus valid

class db{
	private $server_name = "localhost",
	        $db_name     = "nkit_sms_santri", 
	        $user_name   = "root", 
	        $password    = "";
	
	public $table_name = null;
	public $fields     = array();
	public $where      = null;
	public $values     = null;
	public $limit      = 10;
	public $offset     = 0;
	public $column     = null;
	public $order      = null;
	
	public function get_server(){
		return $this->server_name;
	}
	
	public function get_db_name(){
		return $this->db_name;
	}
	
	public function get_user(){
		return $this->user_name;
	}
	
	public function get_password(){
		return $this->password;
	}
	
	
	public function QueryInsert(string $table, array $fields, array $values): string
	{
		$kunci = null;
		$values_insert = null;
		$sql = "INSERT INTO $table ";
		foreach($fields as $value)
		{
			 $kunci .= ", " .$value;
		}
		foreach($values as $content_values)
		{
			 $values_insert .= ", " .$content_values;
		}

		$sql .= "(" .substr($kunci,1) .")";
		$sql .= " VALUES" ."(" .substr($values_insert,1) .") ";
		
		return $sql;
	}
}

?>