<?php
include_once 'header.php';
include_once 'includes/inbox.inc.php';
$pro = new Inbox($db);
$stmt = $pro->readAll();
?>
	<div class="row">
		<div class="col-md-6 text-left">
			<h4>Data inbox SMS</h4>
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
                <th width="120">Tanggal Masuk</th>
                <th width="120">No Pengirim</th>
                <th width="480">Pesan</th>
               <th width="100px">Balas</th>
            </tr>
        </thead>

        <tfoot>
            <tr>
                <th>No</th>
                <th>Tanggal Masuk</th>
                <th>No Pengirim</th>
                <th>Pesan</th>
                <th>Balas</th>
            </tr>
        </tfoot>

        <tbody>
<?php
$no=1;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row['ReceivingDateTime'] ?></td>
                <td><?php echo $row['SenderNumber'] ?></td>
                <td><?php echo $row['TextDecoded'] ?></td>
                <td class="text-center">
					<a href="inbox-balas.php?id=<?php echo $row['SenderNumber'] ?>" class="btn btn-info"><span class="glyphicon glyphicon-check" aria-hidden="true"></span></a>
					<!-- <a href="alternatif-hapus.php?id=<?php echo $row['id_alternatif'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a> -->
			    </td>  
            </tr>
<?php
}
?>
        </tbody>

    </table>		
<?php
include_once 'footer.php';
?>