<?php
include_once 'header.php';  
include_once 'includes/santri.inc.php';
$pgn1 = new Santri($db); 

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

include_once 'includes/wali.inc.php';
$eks = new Wali($db);

$eks->id = $id;

$eks->readOne(); 

$id_s = isset($_POST['id_s']) ? $_POST['id_s'] : $eks->id_s;

if($_POST){

	$eks->id = $_POST['id']; 
	$eks->id_s = $_POST['id_s'];
	$eks->namaw = $_POST['namaw']; 
	$eks->nohp = $_POST['nohp'];

	if($eks->update()){ 
		echo "<meta http-equiv='refresh' content='2; url=wali.php'>";
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
			  <h5>Ubah Wali Santri</h5>
			</div>

			    <form method="post"> 
					<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $eks->id; ?>">
 
				  <div class="form-group">
				    <label for="id_s">Nama Santri</label>
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
				    <label for="namaw">Nama Wali</label>
				    <input type="text" class="form-control" id="namaw" name="namaw" value="<?php echo $eks->namaw; ?>">
				  </div> 
 
				  <div class="form-group">
				    <label for="nohp">No HP Wali</label>
				    <input type="text" class="form-control" id="nohp" name="nohp" value="<?php echo $eks->nohp; ?>">
				  </div> 
				  
				  <button type="submit" class="btn btn-primary">Ubah</button>
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
