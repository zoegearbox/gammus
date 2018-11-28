<?php
include_once 'header.php'; 

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

include_once 'includes/tahun_akademik.inc.php';
$eks = new Tahun_akademik($db);

$eks->id = $id;

$eks->readOne();

if($_POST){

	$eks->ta = $_POST['ta']; 
	
	if($eks->update()){  
		?>
		<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Berhasil Ubah Data!</strong>.
</div>
<meta http-equiv='refresh' content='1; url=tahun_akademik.php'>
		
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
			  <h5>Ubah Tahun Akademik</h5>
			</div>
			
			    <form method="post">
				  <div class="form-group">
				    <label for="ta">Tahun Akademik</label>
				    <input type="text" class="form-control" id="ta" name="ta" value="<?php echo $eks->ta; ?>">
				  </div>
				   
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