<?php
include_once 'header.php';
include_once 'includes/outbox.inc.php';
$pro = new Outbox($db);
$stmt = $pro->readAll();
?>
	<div class="row">
		<div class="col-md-6 text-left">
			<h4>Data Outbox SMS</h4>
		</div>
	<!--	<div class="col-md-6 text-right">
			<button onclick="location.href='alternatif-baru.php'" class="btn btn-primary">Tambah Data</button>
		</div> -->
	</div>
	<br/>

	<table width="100%" class="table table-striped table-bordered" id="tabeldata">
        <thead>
            <tr>
                <th width="30">No</th>
                <th width="120">Tanggal Kirim</th>
                <th width="120">No Tujuan</th>
                <th width="480">Pesan</th>
               <!--  <th width="100px">Aksi</th> -->
            </tr>
        </thead>

        <tfoot>
            <tr>
                <th>No</th>
                <th>Tanggal Kirim</th>
                <th>No Tujuan</th>
                <th>Pesan</th>
                <!-- <th>Aksi</th> -->
            </tr>
        </tfoot>

        <tbody>
<?php
$no=1;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row['SendingDateTime'] ?></td>
                <td><?php echo $row['DestinationNumber'] ?></td>
                <td><?php echo $row['TextDecoded'] ?></td>
                <!-- <td class="text-center">
					<a href="alternatif-ubah.php?id=<?php echo $row['id_alternatif'] ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
					<a href="alternatif-hapus.php?id=<?php echo $row['id_alternatif'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
			    </td> -->
            </tr>
<?php
}
?>
        </tbody>

    </table>		
<?php
include_once 'footer.php';
?>