<?php
include_once 'header.php';
include_once 'includes/komoditas.inc.php';
$pro = new Komoditas($db);
$stmt = $pro->readAll();
?>
	<div class="row">
		<div class="col-md-6 text-left">
			<h4>Data Tahun Akademik</h4>
		</div>
		<div class="col-md-6 text-right">
			<button onclick="location.href='komoditas-baru.php'" class="btn btn-primary">Tambah Data</button>
		</div>
	</div>
	<br/>

	<table width="100%" class="table table-striped table-bordered" id="tabeldata">
        <thead>
            <tr>
                <th width="30px">No</th>
                <th>Tahun Akademik </th> 
                <th width="100px">Aksi</th>
            </tr>
        </thead>

        <tfoot>
            <tr>
                <th>No</th>
                <th>Tahun Akademik </th> 
                <th>Aksi</th>
            </tr>
        </tfoot>

        <tbody>
<?php
$no=1;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row['tahun_akademik'] ?></td>
                 
                <td class="text-center">
					<a href="komoditas-ubah.php?id=<?php echo $row['id'] ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
					<a href="komoditas-hapus.php?id=<?php echo $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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