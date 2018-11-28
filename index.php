	<?php
include_once 'header.php';
include_once 'includes/sentbox.inc.php';
$pro3 = new Sentbox($db);
$stmt3 = $pro3->readNew();
include_once 'includes/inbox.inc.php';
$pro1 = new Inbox($db);
$stmt1 = $pro1->readNew();
$stmt4 = $pro1->readAll();
include_once 'includes/sentbox.inc.php';
$pro2 = new Sentbox($db);
$stmt2 = $pro2->readNew();
?>
		<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-6">
		  	<div class="page-header">
			  <h5> Inbox</h5>
			</div>
			<div class="panel panel-default">
			  <div class="panel-body">
			    <ol class="list-unstyled">
			    	<?php  $no=0;
					while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)){
					?>
				  	<li> <?php $no++; echo $no; ?>.  <?php echo $row1['TextDecoded'] ?> </li>
				  	<?php
					}
				  	?>
				</ol>
			  </div>
			</div>
		  </div>
		<!--   <div class="col-xs-12 col-sm-12 col-md-4">
		  	<div class="page-header">
			  <h5>Nilai Preferensi</h5>
			</div>
			<div class="panel panel-default">
			  <div class="panel-body">
			    <ol>
			    	<?php
					while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
					?>
				  	<li><?php echo $row3['DestinationNumber'] ?> (<?php echo $row3['TextDecoded'] ?>)</li>
				  	<?php
					}
				  	?>
				</ol>
			  </div>
			</div>
		  </div> -->
		  <div class="col-xs-12 col-sm-12 col-md-6">
		  	<div class="page-header">
			  <h5>Sentbox</h5>
			</div>
			<div class="panel panel-default">
			  <div class="panel-body">
			    <ol class="list-unstyled">
			    	<?php
					$no=0;
					while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
					?>
				  	<li><?php $no++; echo $no; ?>.  <?php echo $row2['TextDecoded'] ?></li>
				  	<?php
					}
				  	?>
				</ol>
			  </div>
			</div>
		  </div>
		  
		</div>
		  <div id="container2" style="min-width: 310px; height: 150px; margin: 0 auto"></div>
		 
		<footer class="text-center">Diskan Balangan &copy; 2017</footer>
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/highcharts.js"></script>
	<script src="js/exporting.js"></script>
	<!-- <script>
	var chart1; // globally available
	$(document).ready(function() {
	      chart1 = new Highcharts.Chart({
	         chart: {
	            renderTo: 'container2',
	            type: 'column'
	         },  
	         title: {
	            text: 'Grafik Perangkingan '
	         },
	         xAxis: {
	            categories: ['Alternatif']
	         },
	         yAxis: {
	            title: {
	               text: 'Jumlah Nilai'
	            }
	         },
	              series:            
	            [
	            <?php
	            while ($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)){
	                  ?>
	                 //data yang diambil dari database dimasukan ke variable nama dan data
	                 //
	                  {
	                      name: '<?php echo $row4['nama_alternatif'] ?>',
	                      data: [<?php echo $row4['hasil_alternatif'] ?>]
	                  },
	                  <?php } ?>
	            ]
	      });
	   });  
	   </script> -->
	</body>
</html>