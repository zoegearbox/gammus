<?php
include_once 'header.php'; 
include_once 'includes/santri.inc.php';
$pgn1 = new Santri($db); 
include_once 'includes/hafalan.inc.php';
$pgn2 = new Hafalan($db); 
 
if($_POST){
	
	include_once 'includes/hafiz.inc.php';
	$eks = new Hafiz($db);
// $baru= $_POST['jm'];
$stmt = $eks->readAll();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
 
	$eks->id_s = $_POST['id_s']; 
	$eks->th = $_POST['th']; 
	$eks->bln = $_POST['bln']; 
	$eks->cap = $_POST['cap']; 
	$eks->nam = $_POST['nam']; 
	
	if($eks->insert()){
?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Berhasil Tambah Data!</strong> Tambah lagi atau <a href="hafiz.php">lihat semua data</a>.
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
			  <h5>Tambah Hafiz</h5>  
			</div>
			
			    <form method="post">
				  <div class="form-group">
				    <label for="id_s">Pilih Santri</label>
				    <select class="form-control" id="id_s" name="id_s">
				    	<?php
						$stmt1 = $pgn1->readAll();
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
				    <label for="th">Tahun</label>
				    <input type="text" class="form-control" id="th" name="th" onkeyup="validAngka(this)" pattern="[0-9]{4}" maxlength="50" value="<?php echo date('Y'); ?>" autofocus required/>
				  </div>
				  <div class="form-group">
				    <label for="bln">Bulan</label>
				    <input type="text" class="form-control" id="bln" name="bln"  maxlength="50" value="<?php echo date('m'); ?>" autofocus required/>
				  </div>
				  <div class="form-group">
				    <label for="cap">Pencapaian hafalan</label>
				     <select class="form-control" id="cap" name="cap" data-show-subtext="true" data-live-search="true">
				    	<?php
						$stmt2 = $pgn2->readAll();
						while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
							extract($row2);
							if ($eks->cap==$id) {
											$cek = "selected";
										} else { $cek=""; }
							echo "<option value='{$id}' $cek>{$surah} {$juz}</option>";
						}
					    ?>
				    </select>
				  </div>
				  <div class="form-group">
				    <label for="nam">Penambahan hafalan</label>
				    <select class="form-control" id="nam" name="nam">
				    	<?php
						$stmt2 = $pgn2->readAll();
						while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
							extract($row2);
							if ($eks->cap==$id) {
											$cek = "selected";
										} else { $cek=""; }
							echo "<option value='{$id}' $cek>{$surah} {$juz}</option>";
						}
					    ?>
				    </select>
				  </div>
				  
				  <button type="submit" class="btn btn-primary">Simpan</button>
				  <button type="button" onclick="location.href='hafiz.php'" class="btn btn-success">Kembali</button>
				</form>
			  
		  </div>
		  <div class="col-xs-12 col-sm-12 col-md-4">
		  	<?php include_once 'sidebar.php'; ?>
		  </div>
		</div>
		<?php
include_once 'footer.php';
?>