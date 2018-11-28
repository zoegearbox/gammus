<?php
include_once 'header.php';
include_once 'includes/nilai.inc.php';
$pgn = new Nilai($db);

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

include_once 'includes/komoditas.inc.php';
$eks = new Komoditas($db);

$eks->id = $id;

$eks->readOne();

if($_POST){

	$eks->kt = $_POST['kt'];
	$eks->tp = $_POST['tp'];
	$eks->jm = $_POST['jm'];
	
	if($eks->update()){
		// echo "<script>location.href='komoditas.php'</script>";
		echo "<meta http-equiv='refresh' content='2; url=komoditas.php'>";
		?>
		<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Berhasil Ubah Data!</strong>.
</div>
		
		<?php
	} else{
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Gagal Ubah Data!</strong> Terjadi kesalahan, coba sekali lagi.
</div>
<?php
	}
}
?>
		<div class="row">
		  <div class="col-xs-12 col-sm-12 col-md-8">
		  	<div class="page-header">
			  <h5>Ubah Komoditas</h5>
			</div>
			
			    <form method="post">
				  <div class="form-group">
				    <label for="kt">Nama Komoditas</label>
				    <input type="text" class="form-control" id="kt" name="kt" value="<?php echo $eks->kt; ?>">
				  </div>
				  <div class="form-group">
				    <label for="tp">Harga Komoditas</label>
				   
		<input type="number" placeholder="10000" required class="form-control" id="tp" name="tp" min="1000" max="1000000" value="<?php echo $eks->tp; ?>">
				  </div>
				  
				   <input type="text" class="form-control" id="jm" name="jm" value="<?php echo date("Y-m-d"); ?>"/>
				   
				   
				  <button type="submit" class="btn btn-primary">Ubah</button>
				  <button type="button" onclick="location.href='komoditas.php'" class="btn btn-success">Kembali</button>
				</form>
			  
		  </div>
		  <div class="col-xs-12 col-sm-12 col-md-4">
		  	<?php include_once 'sidebar.php'; ?>
		  </div>
		</div>
		<?php
include_once 'footer.php';
?>