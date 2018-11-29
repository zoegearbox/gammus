<?php
include_once 'header.php'; 
 
if($_POST){
	
	include_once 'includes/hafalan.inc.php';
	$eks = new Hafalan($db); 
$stmt = $eks->readAll();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
 
	$eks->juz = $_POST['juz'];   
	$eks->sr = $_POST['sr'];  
	
	if($eks->insert()){
?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Berhasil Tambah Data!</strong> Tambah lagi atau <a href="hafalan.php">lihat semua data</a>.
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
			  <h5>Tambah Hafalan</h5>  
			</div>
			
			    <form method="post">
				  <div class="form-group">
				    <label for="juz">Juz</label>
				    <input type="text" class="form-control" id="juz" name="juz"  maxlength="50" autofocus required/>
				  </div> 
				  <div class="form-group">
				    <label for="sr">Nama Surah</label>
				    <input type="text" class="form-control" id="sr" name="sr"  maxlength="50" autofocus required/>
				  </div> 
				   
				  
				  <button type="submit" class="btn btn-primary">Simpan</button>
				  <button type="button" onclick="location.href='hafalan.php'" class="btn btn-success">Kembali</button>
				</form>
			  
		  </div>
		  <div class="col-xs-12 col-sm-12 col-md-4">
		  	<?php include_once 'sidebar.php'; ?>
		  </div>
		</div>
		<?php
include_once 'footer.php';
?>