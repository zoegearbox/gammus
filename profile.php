	<?php
include_once 'includes/config.php';
$config = new Config();
$db = $config->getConnection();
include_once 'includes/nilai.inc.php';
$pro3 = new Nilai($db);
$stmt3 = $pro3->readAll();
include_once 'includes/alternatif.inc.php';
$pro1 = new Alternatif($db);
$stmt1 = $pro1->readAll();
$stmt4 = $pro1->readAll();
include_once 'includes/kriteria.inc.php';
$pro2 = new Kriteria($db);
$stmt2 = $pro2->readAll();
?>
<?php include "header-user.php"; ?>
    <div class="container">
		<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-8">
		  	<div class="page-header">
			  <h5> SMS GATEWAY Dinas Penanaman Modal dan PTSP</h5>
			</div>
			<div class="panel panel-default">
			  <div class="panel-body">
			    <p> Aplikasi SMS GATEWAY ini adalah bentuk pelayanan terpadu dari Dinas Penanaman Modal dan PTSP Kabupaten Balangan. Untuk mengetahui informasi pengajuan perizinan maupun berbagai informasi kegiatan usaha dan masalah perizinan di daerah Kabupaten Balangan.</p><p>Untuk Mengetahui informasi pengajuan Perizinan yang telah diajukan, dapat menggunakan sintak sms = IZIN&lt;spasi&gt;Nomor Pengajuan. Contoh = IZIN 0913231 kirim ke +62852 5190 6905. Untuk informasi lainnya terkait Dinas Penanaman Modal dan PTSP dapat menggunakan sintak sms = INFO&lt;spasi&gt;Pertanyaan, contoh INFO Ada rumah sarang walet di jl.Keruing, suaranya mengganggu kami. apakah sudah ada izinnya? kirim ke +62852 5190 6905.</p>
			  </div>
			</div>
			</div>
	 
		 <div class="col-xs-12 col-sm-4 col-md-4">
		  	<div class="page-header">
			  <h5>SMS GATEWAY</h5>
			</div>
		  	<div  class="panel panel-default"><div class="panel-body"> 
			<div class="text-center"><h4>DISKAN BALANGAN</h4></div>
		  	<div class="text-center">  <img    class="img3" src="images/balangan.png" width="80%"> 
		  	</div>
			</div>
			</div>
		  	
		  </div>
		   
		</div>
		   
		</div>
	 
		
		 
	</div> 
 
	</body>
</html>