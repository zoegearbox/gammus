<?php
include_once 'header.php'; 
include_once 'includes/santri.inc.php';
$pgn1 = new Santri($db); 
 
if($_POST){
	
include_once 'includes/wali.inc.php';
$eks = new Wali($db); 
$stmt = $eks->readAll();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
 
	$eks->id_s = $_POST['id_s'];   
	$eks->namaw = $_POST['namaw'];  
	$eks->nohp = $_POST['nohp'];  
	
	if($eks->insert()){
?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Berhasil Tambah Data!</strong> Tambah lagi atau <a href="wali.php">lihat semua data</a>.
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
			  <h5>Tambah Wali Santri</h5>  
			</div>
			
			    <form method="post">
				  <div class="form-group">
				    <label for="id_s">Nama Santri</label>
				  <select class="form-control" id="id_s" name="id_s">
				    	<?php
						$stmt1 = $pgn1->readWali();
						while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)){
							extract($row1);
							if ($eks->id_s==$id) {
											$cek = "selected";
										} else { $cek=""; }
							echo "<option value='{$id}' $cek>{$nama_santri} {$nama_kelas}</option>";
						}
					    ?>
				    </select> 
				  </div> 
				  <div class="form-group">
				    <label for="namaw">Nama Wali</label>
				    <input type="text" class="form-control" id="namaw" name="namaw"  maxlength="50" autofocus required/>
				  </div> 
				  <div class="form-group">
				    <label for="nohp">No HP Wali</label>
				    <input type="text" class="form-control" id="nohp" name="nohp"  maxlength="50" autofocus required/>
				  </div> 
				   
				  
				  <button type="submit" class="btn btn-primary">Simpan</button>
				  <button type="button" onclick="location.href='wali.php'" class="btn btn-success">Kembali</button>
				</form>
			  
		  </div>
		  <div class="col-xs-12 col-sm-12 col-md-4">
		  	<?php include_once 'sidebar.php'; ?>
		  </div>
		</div>
		<?php
include_once 'footer.php';
?>