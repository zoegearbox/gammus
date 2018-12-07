<?php
include_once 'header.php'; 
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');


include_once 'includes/inbox.inc.php';
$eks = new Inbox($db);

$eks->id = $id;

$eks->readOne();


?>
<div class="container">
		<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-8">
		  	<div class="page-header">
			  <h5>Kirim Pesan SMS</h5>
			</div>
			<div class="panel panel-default">
			  <div class="panel-body">
		
 <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>">
				  <div class="form-group">
				    <label for="pesan"><?php echo $eks->by; ?></label>
				    <input type="text" class="form-control" id="pesan" name="pesan" value="<?php echo $eks->sms; ?>" readonly/>
				  </div> 
				    <input type="hidden" class="form-control" id="hp" name="nohp" value="<?php echo $eks->by; ?>" required readonly/> 
				  <div class="form-group">
				    <label for="ms">Balas Pesan</label>
				    <input type="text" class="form-control" id="ms" name="pesan" required>
				  </div>
				  <button type="submit" name="button" class="btn btn-primary">Kirim</button>
				  <button type="button" onclick="location.href='index.php'" class="btn btn-success">Kembali</button>
				</form>
	 
			  </div>
			</div>
			</div>
	 
		 <div class="col-xs-12 col-sm-4 col-md-4">
		  	 <?php include_once 'sidebar.php'; ?>
		  	
		  </div>
		   
		</div>
	 
		
		 
	</div> 
	
	 
<?php
if(isset($_POST['button']))
{
require_once 'includes/koneksis.php';
require_once 'includes/class_sms.php'; 

$obj_db  = new db;
$obj_sms = new sms;

$obj_sms->no_hp  = $_POST['nohp'];
$obj_sms->isi_sms = $_POST['pesan'];

try {

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$obj_db->table_name = "outbox";
$obj_db->fields     = array("DestinationNumber","TextDecoded");
$obj_db->values     = array(":no_hp",":isi_sms");
$doQuery            = $obj_db->QueryInsert($obj_db->table_name, $obj_db->fields, $obj_db->values);

$stmt = $conn->prepare($doQuery);

$stmt->bindParam(':no_hp', $obj_sms->no_hp);
$stmt->bindParam(':isi_sms', $obj_sms->isi_sms);

$stmt->execute();

echo "<script>alert('sukses kirim sms, lihat sentbox untuk memastikan terkirim')</script>";

$conn = null;
}
catch(PDOException $e)
{
echo "Gagal Kirim, ada Kesalahan, hubungi Administrator"; 
die();
}
}
?>
		
<?php
include_once 'footer.php';
?>