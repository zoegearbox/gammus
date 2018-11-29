<?php
include_once 'header.php';
// include_once 'includes/nilai.inc.php';
// $pgn = new Nilai($db);

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

include_once 'includes/komoditas.inc.php';
$eks = new Komoditas($db);

$eks->id = $id;

$eks->readOne();

if($_POST){

	$eks->id = $_POST['id'];
	$eks->ta = $_POST['ta'];

	if($eks->update()){
		// echo "<script>location.href='komoditas.php'</script>";
		echo "<meta http-equiv='refresh' content='2; url=komoditas.php'>";
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
			  <h5>Ubah Tahun</h5>
			</div>

			    <form method="post">
						<div class="form-group">
					    <label for="tp">ID Tahun</label>
							<input type="text" class="form-control" id="id" name="id" value="<?php echo $eks->id; ?>">

					  </div>
				  <div class="form-group">
				    <label for="kt">Tahun Akademik</label>
				    <input type="text" class="form-control" id="ta" name="ta" value="<?php echo $eks->ta; ?>">
				  </div>


				   <input type="text" class="form-control" id="jm" name="jm" value="<?php echo date("Y-m-d"); ?>"/>


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
