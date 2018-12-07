<?php
include_once 'header.php'; 
include_once 'includes/tahun_akademik.inc.php';
$pgn2 = new Tahun_akademik($db);

$id_ta	= isset($_POST['id_ta']) ?  $_POST['id_ta'] : '';
 
if($_POST){ 
include_once 'includes/kelas.inc.php';
$eks = new Kelas($db); 
$stmt = $eks->readAll(); 
$row = $stmt->fetch(PDO::FETCH_ASSOC);
    
	$eks->id_s = $_POST['id_s']; 
	$eks->id_k = $_POST['id_k']; 
	
	if($eks->insert()){
?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Berhasil Tambah Data!</strong> Tambah lagi atau <a href="kelas.php">lihat semua data</a>.
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
			  <h5>Tambah Kelas</h5>  
			</div>
			
			    <form method="post">
				  <div class="form-group">
				    <label for="nk">Nama Kelas</label>
				    <input type="text" class="form-control" id="nk" name="nk"  maxlength="50" autofocus required/>
				  </div>
				  <div class="form-group">
				    <label for="ket">Keterangan Kelas</label>
				    <input type="text" class="form-control" id="ket" name="ket"  maxlength="50" autofocus required/>
				  </div> 
				  <div class="form-group">
				    <label for="id_ta">Tahun Ajar</label>
				    <select class="form-control" id="id_ta" name="id_ta">
				    	<?php
						$stmt2 = $pgn2->readAll();
						while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
							extract($row2);
							if ($id_ta ==$id) {
											$cek = "selected";
										} else { $cek=""; }
							echo "<option value='{$id}' $cek>{$tahun_akademik}</option>";
						}
					    ?>
				    </select>
				  </div> 
				  
				  <button type="submit" class="btn btn-primary">Simpan</button>
				  <button type="button" onclick="location.href='kelas.php'" class="btn btn-success">Kembali</button>
				</form>
			  
		  </div>
		  <div class="col-xs-12 col-sm-12 col-md-4">
		  	<?php include_once 'sidebar.php'; ?>
		  </div>
		</div>
		<?php
include_once 'footer.php';
?>