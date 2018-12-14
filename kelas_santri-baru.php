<?php
include_once 'header.php'; 
include_once 'includes/santri.inc.php';
$pgn1 = new Santri($db); 
include_once 'includes/kelas.inc.php';
$pgn2 = new Kelas($db);
 
if($_POST){
	
	include_once 'includes/kelas_santri.inc.php';
	$eks = new KelasSantri($db); 
$stmt = $eks->readAll();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
    
	$eks->id_s = $_POST['id_s']; 
	$eks->id_k = $_POST['id_k'];
	
	// var_dump($eks->id_s);
	// var_dump($eks->id_k); 
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
			  <h5>Tambah Santri ke Kelas</h5>  
			</div>
			
			    <form method="post">
				  <div class="form-group">
				    <label for="id_s">Pilih Santri</label>
				    <select class="form-control" id="id_s" name="id_s">
				    	<?php
						$stmt1 = $pgn1->readKelas();
						while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)){
							extract($row1);
							// if ($id_s ==$id) {
											// $cek = "selected";
										// } else { $cek=""; }
							echo "<option value='{$id}' >{$nama_santri} {$nama_kelas}</option>";
						}
					    ?>
				    </select>
				  </div>
				  <div class="form-group">
				    <label for="id_k">Pilih Kelas</label>
				    <select class="form-control" id="id_k" name="id_k">
				    	<?php
						$stmt2 = $pgn2->readAll();
						while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
							extract($row2);
							// if ($id_k ==$id) {
											// $cek = "selected";
										// } else { $cek=""; }
							echo "<option value='{$id}' >{$nama_kelas}</option>";
						}
					    ?>
				    </select>
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