<?php
include_once 'header.php'; 
 
if($_POST){
	
	include_once 'includes/kelas_santri.inc.php';
	$eks = new KelasSantri($db); 
$stmt = $eks->readAll();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
    
	$eks->id_s = $_POST['id_s']; 
	$eks->id_k = $_POST['id_k']; 
	
	if($eks->insert()){
?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Berhasil Tambah Data!</strong> Tambah lagi atau <a href="kelas_santri.php">lihat semua data</a>.
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
			  <h5>Tambah Samtri ke Kelas</h5>  
			</div>
			
			    <form method="post">
				  <div class="form-group">
				    <label for="id_s">Pilih Santri</label>
				    <input type="text" class="form-control" id="id_s" name="id_s"  maxlength="50" autofocus required/>
				  </div>
				  <div class="form-group">
				    <label for="id_k">Pilih Kelas</label>
				    <input type="text" class="form-control" id="id_k" name="id_k"  maxlength="50" autofocus required/>
				  </div> 
				  
				  <button type="submit" class="btn btn-primary">Simpan</button>
				  <button type="button" onclick="location.href='kelas_santri.php'" class="btn btn-success">Kembali</button>
				</form>
			  
		  </div>
		  <div class="col-xs-12 col-sm-12 col-md-4">
		  	<?php include_once 'sidebar.php'; ?>
		  </div>
		</div>
		<?php
include_once 'footer.php';
?>