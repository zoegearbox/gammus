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
			  
			  <h5>SMS GATEWAY HAFIZ SANTRI INDONESIA</h5>
			</div>
		  <div class="panel panel-default" >
		  <div class="panel-body">
		  
		  	<p> Aplikasi SMS GATEWAY ini adalah bentuk pelayanan terpadu dari Pondok Pesantren juga sebagai bentuk inovasi teknologi yang telah diterapkan di Pondok Pesantren. Untuk mengetahui informasi hafalan yang telah dicapai oleh santri dan juga progress yang sedang dilakukan oleh santri untuk menjadi tahfiz Qur'an.</p>
			<p>Untuk Mengetahui informasi hafalan santri yang ada pada database, dapat menggunakan sintak sms= HAFALAN&lt;spasi&gt;Nomor Induk Santri. Contoh = HAFALAN 17930001 kirim ke +62877 2070 9099. Untuk informasi lainnya terkait kegiatan Pesantren dapat menggunakan sintak sms = INFO&lt;spasi&gt;Pertanyaan, contoh INFO kapan penerimaan santri baru dimulai?. kirim ke +62877 2070 9099.</p>
			<p> Aplikasi SMS SANTRI dipersembahkan oleh <a href="teknobara.co.id" target="_blank">CV.TEKNOBARA</a> sebagai bagian dari Tanggung jawab Sosial Perusahaan atau Corporate Social Responsibility (CSR) terhadap pendidikan dan teknologi di masyarakat Indonesia.</p>
		  
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
				    <input type="text" class="form-control" name="username"  id="InputUsername1" placeholder="Username" autofocus/>
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