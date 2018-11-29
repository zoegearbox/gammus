<?php
include_once 'header.php'; 

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

include_once 'includes/hafalan.inc.php';
$eks = new Hafalan($db);

$eks->id = $id;

$eks->readOne();

if($_POST){

	$eks->id = $_POST['id']; 
	$eks->juz = $_POST['juz'];
	$eks->sr = $_POST['sr']; 

	if($eks->update()){ 
		echo "<meta http-equiv='refresh' content='2; url=hafalan.php'>";
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
			  <h5>Ubah Santri di Kelas</h5>
			</div>

			    <form method="post"> 
					<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $eks->id; ?>">
 
				  <div class="form-group">
				    <label for="juz">Juz</label>
				    <input type="text" class="form-control" id="juz" name="juz" value="<?php echo $eks->juz; ?>">
				  </div>
 
				  <div class="form-group">
				    <label for="sr">Nama Surah</label>
				    <input type="text" class="form-control" id="sr" name="sr" value="<?php echo $eks->sr; ?>">
				  </div> 
				  <button type="submit" class="btn btn-primary">Ubah</button>
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
