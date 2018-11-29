<?php
include_once 'header.php'; 
 
if($_POST){
	
	include_once 'includes/santri.inc.php';
	$eks = new Santri($db); 
$stmt = $eks->readAll();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
 
	$eks->nis = $_POST['nis'];   
	$eks->nm = $_POST['nm']; 
	$eks->ta = $_POST['ta']; 
	$eks->sta = $_POST['sta']; 
	
	if($eks->insert()){
?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Berhasil Tambah Data!</strong> Tambah lagi atau <a href="santri.php">lihat semua data</a>.
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
				    <label for="nis">Nomor Induk Santri</label>
				    <input type="text" class="form-control" id="nis" name="nis"  maxlength="50" autofocus required/>
				  </div> 
				  <div class="form-group">
				    <label for="nm">Nama Santri</label>
				    <input type="text" class="form-control" id="nm" name="nm"  maxlength="50" autofocus required/>
				  </div> 
				  <div class="form-group">
				    <label for="ta">Tahun Akademik</label>
				    <input type="text" class="form-control" id="ta" name="ta"  maxlength="50" autofocus required/>
				  </div> 
				  <div class="form-group">
				    <label for="sta">Status Santri</label>
				    <input type="text" class="form-control" id="sta" name="sta"  maxlength="50" autofocus required/>
				  </div> 
				  
				  <button type="submit" class="btn btn-primary">Simpan</button>
				  <button type="button" onclick="location.href='santri.php'" class="btn btn-success">Kembali</button>
				</form>
			  
		  </div>
		  <div class="col-xs-12 col-sm-12 col-md-4">
		  	<?php include_once 'sidebar.php'; ?>
		  </div>
		</div>
		<?php
include_once 'footer.php';
?>