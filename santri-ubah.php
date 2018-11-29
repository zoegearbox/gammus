<?php
include_once 'header.php'; 

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

include_once 'includes/santri.inc.php';
$eks = new Santri($db);

$eks->id = $id;

$eks->readOne();

if($_POST){

	$eks->id = $_POST['id']; 
	$eks->nis = $_POST['nis'];
	$eks->nm = $_POST['nm'];
	$eks->ta = $_POST['ta'];
	$eks->sta = $_POST['sta'];

	if($eks->update()){ 
		echo "<meta http-equiv='refresh' content='2; url=santri.php'>";
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
				    <label for="nis">Nomor Induk Santri</label>
				    <input type="text" class="form-control" id="nis" name="nis" value="<?php echo $eks->nis; ?>">
				  </div>
 
				  <div class="form-group">
				    <label for="nm">Nama Santri</label>
				    <input type="text" class="form-control" id="nm" name="nm" value="<?php echo $eks->nm; ?>">
				  </div>
				  <div class="form-group">
				    <label for="ta">Tahun Akademik</label>
				    <input type="text" class="form-control" id="ta" name="ta" value="<?php echo $eks->ta; ?>">
				  </div> 
				  <div class="form-group">
				    <label for="sta">Status Santri</label>
				    <input type="text" class="form-control" id="sta" name="sta" value="<?php echo $eks->sta; ?>">
				  </div> 

 

				  <button type="submit" class="btn btn-primary">Ubah</button>
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
