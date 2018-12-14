<?php
include_once 'header.php';
include_once 'includes/hafiz.inc.php';
$pro = new Hafiz($db);
$stmt2 = $pro->readBroadcast();
// $stmt2 = $pro->readAll();
// $test = $pro->jmlBroadcast();
if($_POST){

	//kirim sms
	require_once 'includes/koneksis.php';
	require_once 'includes/class_sms.php';

	$obj_db  = new db;
	$obj_sms = new sms;

	$jml=0;
	while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)){
	$nama = explode(" ",$row['nama_santri']);
	$namabaru = $nama[0]." ".$nama[1];

		$obj_sms->no_hp  = $row['no_hp'];
		$obj_sms->isi_sms = $row['nis']." ".$namabaru." pencapaian hafalan bulan ini ".$row['cap_surah']."(".$row['cap_juz'].") dan sedang menghafal ".$row['nam_surah']."(".$row['nam_juz'].")";

		$jml++;
		try {

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$obj_db->table_name = "outbox";
			$obj_db->fields     = array("DestinationNumber","TextDecoded");
			$obj_db->values     = array(":no_hp",":isi_sms");
			$doQuery            = $obj_db->QueryInsert($obj_db->table_name, $obj_db->fields, $obj_db->values);

			$stmt3 = $conn->prepare($doQuery);

			$stmt3->bindParam(':no_hp', $obj_sms->no_hp);
			$stmt3->bindParam(':isi_sms', $obj_sms->isi_sms);

			$stmt3->execute();


			// echo "<script>alert('sukses kirim sms, lihat sentbox untuk memastikan terkirim')</script>";

			// $conn = null;
		}
		catch(PDOException $e)
		{
			echo "Gagal Kirim, ada Kesalahan, hubungi Administrator";
			die();
		}
	}

	//panggil ulang koneksis
	$config2 = new Config();
	$db2 = $config2->getConnection();

	//simpan broadcast
	include_once 'includes/broadcast.inc.php';
	$eks = new Broadcast($db2);
	$stmt = $eks->readAll();

	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$eks->th = $_POST['th'];
	$eks->bl = $_POST['bl'];
	$eks->jml = $jml;

	if($eks->insert()){
		?>
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>Berhasil Tambah Data!</strong> Tambah lagi atau <a href="broadcast.php">lihat semua data</a>.
		</div>
		<?php
	}

	else{
		?>
		<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>Gagal Tambah Data!</strong> Terjadi kesalahan, coba sekali lagi.
		</div>
		<?php
	}
}
?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-8">
		<div class="page-header">
			<h5>Buat broadcast</h5>
		</div>

		<form method="post">
			<div class="form-group">
				<label for="th">Tahun</label>
				<input type="number" class="form-control" id="th" name="th"  maxlength="50" value="<?php echo date("Y");?>" autofocus required/>
			</div>
			<div class="form-group">
				<label for="bl">Bulan</label>
				<input type="number" class="form-control" id="bl" name="bl"  maxlength="50" value="<?php echo date("m");?>"  autofocus required/>
			</div>
			<table width="100%" class="table table-striped table-bordered" id="tabeldata">
				<thead>
					<tr>
						<th width="30px">No</th>
						<th>NIS </th>
						<th>Santri </th>
						<th>Wali </th>
						<th>No HP </th>
						<th>Tahun </th>
						<th>Bulan </th>
						<th>Pencapaian </th>
						<th>Penambahan </th>
					</tr>
				</thead>

				<tfoot>
					<tr>
						<th>No</th>
						<th>NIS </th>
						<th>Santri </th>
						<th>Wali </th>
						<th>No HP </th>
						<th>Tahun </th>
						<th>Bulan </th>
						<th>Pencapaian </th>
						<th>Penambahan </th>
					</tr>
				</tfoot>

				<tbody>
					<?php
					$no=1;
					while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)){
						?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $row['nis'] ?></td>
							<td><?php echo $row['nama_santri'] ?></td>
							<td><?php echo $row['nama_wali'] ?></td>
							<td><?php echo $row['no_hp'] ?></td>
							<td><?php echo $row['tahun'] ?></td>
							<td><?php echo $row['bulan'] ?></td>
							<td><?php echo $row['cap_surah'] ?> (<?php echo $row['cap_juz'] ?>)</td>
							<td> <?php echo $row['nam_surah'] ?> (<?php echo $row['nam_juz'] ?>)</td>
						</tr>
						<?php
					}

					?>
				</tbody>

			</table>

			<button type="submit" class="btn btn-primary">KIRIM </button>
			<button type="button" onclick="location.href='broadcast.php'" class="btn btn-success">Kembali</button>
		</form>

	</div>
	<div class="col-xs-12 col-sm-12 col-md-4">
		<?php include_once 'sidebar.php'; ?>
	</div>
</div>
<?php
include_once 'footer.php';
?>
