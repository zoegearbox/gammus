<?php
include_once 'header.php'; 

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

include_once 'includes/kelas.inc.php';
$eks = new Kelas($db);

$eks->id = $id;

$eks->readOne();

if($_POST){

	$eks->id = $_POST['id'];
	$eks->nk = $_POST['nk'];
	$eks->ket = $_POST['ket'];
	$eks->id_ta = $_POST['id_ta'];

	if($eks->update()){ 
		echo "<meta http-equiv='refresh' content='2; url=kelas.php'>";
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
			  <h5>Ubah Kelas</h5>
			</div>

			    <form method="post"> 
							<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $eks->id; ?>">
 
				  <div class="form-group">
				    <label for="nk">Nama Kelas</label>
				    <input type="text" class="form-control" id="nk" name="nk" value="<?php echo $eks->nk; ?>">
				  </div>
				  <div class="form-group">
				    <label for="ket">Keterangan Kellas</label>
				    <input type="text" class="form-control" id="ket" name="ket" value="<?php echo $eks->ket; ?>">
				  </div>
				  <div class="form-group">
				    <label for="id_ta">Tahun Akademik</label>
				    <input type="text" class="form-control" id="id_ta" name="id_ta" value="<?php echo $eks->id_ta; ?>">
				  </div>

 

				  <button type="submit" class="btn btn-primary">Ubah</button>
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
