<?php
include_once 'header.php';
include_once 'includes/pesantren.inc.php';
$eks = new Pesantren($db);  
$eks->readReal();

if($_POST){

    $eks->nmp = $_POST['nmp'];
    $eks->almt = $_POST['almt'];
    $eks->komp = $_POST['komp'];
    $eks->sms = $_POST['sms'];
    
    if($eks->update()){
?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Berhasil!</strong> Anda telah mengubah profil Pondok Pesantren.
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
              <h5>Profil Pondok Pesantren</h5>  
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
                    <label for="sms">No SMS Gateway</label>
                    <input type="text" class="form-control" id="sms" name="sms" value="<?php echo $eks->sms; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="komp">Kode Validasi</label>
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