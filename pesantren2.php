<?php
include_once 'header.php';
include_once 'includes/pesantren.inc.php';
$eks = new Pesantren($db);
$a = gethostbyaddr($_SERVER['REMOTE_ADDR']); 
$date = "2018-12-14"; 
$a1 = base64_encode($date." ".$a); 
$a2 = substr($a1,0,35); 
$b = base64_decode($a1); 
$b1 = explode(" ",$b);
$b2 = $b1[1];
if($a!=$b2) {
	echo " Maaf Salah Kamar";
} else { echo " Oke doki"; }

// $eks->id = 1; 
$eks->readReal();

if($_POST){

    $eks->nmp = $_POST['nmp'];
    $eks->almt = $_POST['almt'];
    $eks->komp = $_POST['komp'];
    
    if($eks->update()){
?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Berhasil!</strong> Anda telah mengubah profil sendiri.
</div>
<?php
    } else{
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Gagal Ubah Profil!</strong> Terjadi kesalahan, coba sekali lagi.
</div>
<?php
    }
}
?>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-8">
            <div class="page-header">
              <h5>Profil Anda <?php echo $a; ?></h5> 
              <h5>Profil Anda <?php echo $a1; ?></h5>
              <h5>Profil Anda <?php echo $a2; ?></h5>
              <h5>Profil Anda <?php echo $b; ?></h5> 
              <h5>Profil Anda <?php echo $b2; ?></h5>
            </div>
            
                <form method="post">
                  <div class="form-group">
                    <label for="nmp">Nama Pondok Pesantren</label>
                    <input type="text" class="form-control" id="nmp" name="nmp" value="<?php echo $eks->nmp; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="almt">Alamat Lengkap</label>
                    <input type="text" class="form-control" id="almt" name="almt" value="<?php echo $eks->almt; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="komp">Kode Komputer</label>
                    <input type="password" class="form-control" id="komp" name="komp" value="<?php echo $eks->komp; ?>" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Ubah</button>
                </form>
              
          </div>
          <div class="col-xs-12 col-sm-12 col-md-4">
            <?php include_once 'sidebar.php'; ?>
          </div>
        </div>
        <?php
include_once 'footer.php';
?>