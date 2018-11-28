<?php
include_once 'includes/config.php';

$config = new Config();
$db = $config->getConnection();
	
if($_POST){
	
	include_once 'includes/login.inc.php';
	$login = new Login($db);

	$login->userid = $_POST['username'];
	$login->passid = md5($_POST['password']);
	
	if($login->login()){
		echo "<script>location.href='index.php'</script>";
	}
	
	else{
		echo "<script>alert('Gagal Total')</script>";
	}
}
?>
<?php include "header-user.php"; ?>
    <div class="container">
		<div class="row">
		  <div class="col-xs-12 col-sm-12 col-md-8">&nbsp;
		  <div class="page-header">
			  
			  <h5>Info Perizinan dan Layanan pada Dinas Penanaman Modal dan PTSP</h5>
			</div>
		  <div class="panel panel-default" >
		  <div class="panel-body">
		  
		  	<p> Aplikasi SMS GATEWAY ini adalah bentuk pelayanan terpadu dari Dinas Penanaman Modal dan PTSP Kabupaten Balangan. Untuk mengetahui informasi pengajuan perizinan maupun berbagai informasi kegiatan usaha dan masalah perizinan di daerah Kabupaten Balangan.</p><p>Untuk Mengetahui informasi pengajuan Perizinan yang telah diajukan, dapat menggunakan sintak sms = IZIN&lt;spasi&gt;Nomor Pengajuan. Contoh = IZIN 0913231 kirim ke +62852 5190 6905. Untuk informasi lainnya terkait Dinas Penanaman Modal dan PTSP dapat menggunakan sintak sms = INFO&lt;spasi&gt;Pertanyaan, contoh INFO Ada rumah sarang walet di jl.Keruing, suaranya mengganggu kami. apakah sudah ada izinnya? kirim ke +62852 5190 6905.</p>
		  
		  </div>
		  </div> 
		  </div> 
		  <div class="col-xs-12 col-sm-12 col-md-4">
		  	<div class="page-header">
			  <h5>Access Login</h5>
			</div>
		  	<div  class="panel panel-default"><div class="panel-body"> 
		  		<form method="post">
				  <div class="form-group">
				    <label for="InputUsername1">Username</label>
				    <input type="text" class="form-control" name="username"  id="InputUsername1" placeholder="Username">
				  </div>
				  <div class="form-group">
				    <label for="InputPassword1">Password</label>
				    <input type="password" class="form-control" name="password" id="InputPassword1" placeholder="Password">
				  </div>
				  <!--<p><small style="color:#999;">Username: admin dan Password: admin</small></p> -->
				  <button type="submit" class="btn btn-primary">Login</button>
				</form>
		  	</div></div>
		  	
		  </div>
		</div>
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>