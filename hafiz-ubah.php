<?php
include_once 'header.php'; 

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

include_once 'includes/hafiz.inc.php';
$eks = new Hafiz($db);

$eks->id = $id;

$eks->readOne();

if($_POST){

	$eks->id = $_POST['id'];
	$eks->id_s = $_POST['id_s'];
	$eks->th = $_POST['th'];
	$eks->bln = $_POST['bln'];
	$eks->cap = $_POST['cap'];
	$eks->nam = $_POST['nam'];

	if($eks->update()){ 
		echo "<meta http-equiv='refresh' content='2; url=hafiz.php'>";
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
			  <h5>Ubah Hafiz Santri</h5>
			</div>

			    <form method="post"> 
							<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $eks->id; ?>">
 
				  <div class="form-group">
				    <label for="id_s">Santri</label>
				    <input type="text" class="form-control" id="id_s" name="id_s" value="<?php echo $eks->id_s; ?>">
				  </div>
				  <div class="form-group">
				    <label for="th">Tahun</label>
				    <input type="text" class="form-control" id="th" name="th" value="<?php echo $eks->th; ?>">
				  </div>
				  <div class="form-group">
				    <label for="bln">Bulan</label>
				    <input type="text" class="form-control" id="bln" name="bln" value="<?php echo $eks->th; ?>">
				  </div>
				  <div class="form-group">
				    <label for="cap">Pencapaian Hafalan</label>
				    <input type="text" class="form-control" id="cap" name="cap" value="<?php echo $eks->cap; ?>">
				  </div>
				  <div class="form-group">
				    <label for="nam">Penambahan Hafalan</label>
				    <input type="text" class="form-control" id="nam" name="nam" value="<?php echo $eks->nam; ?>">
				  </div>

 

				  <button type="submit" class="btn btn-primary">Ubah</button>
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
