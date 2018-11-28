<?php
include_once 'header.php';
// include_once 'includes/nilai.inc.php';
// $pgn = new Nilai($db);

	// include_once 'includes/kriteria.inc.php';
	// $pro = new Komoditas($db);
// $stmt = $pro->readSpe();
// $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
if($_POST){
	
	include_once 'includes/komoditas.inc.php';
	$eks = new Komoditas($db);
// $baru= $_POST['jm'];
$stmt = $eks->readSpe();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
 
	$eks->ta = $_POST['ta']; 
	
	if($eks->insert()){
?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Berhasil Tambah Data!</strong> Tambah lagi atau <a href="komoditas.php">lihat semua data</a>.
</div>
<?php
	}
	
	else{
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Gagal Tambah Data!</strong> Terjadi kesalahan, coba sekali lagi.
</div>
<?php
	}

}
?>
		<div class="row">
		  <div class="col-xs-12 col-sm-12 col-md-8">
		  	<div class="page-header">
			  <h5>Tambah Komoditas</h5>  
			</div>
			
			    <form method="post">
				  <div class="form-group">
				    <label for="ta">Tahun Akademik</label>
				    <input type="text" class="form-control" id="ta" name="ta" onkeyup="validAngka(this)" pattern="[0-9]{4}" maxlength="50" autofocus required/>
				  </div>
				  
				  <button type="submit" class="btn btn-primary">Simpan</button>
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