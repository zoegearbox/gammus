<?php
include_once 'header.php';
include_once 'includes/hafalan.inc.php';
$pro = new Hafalan($db);
$stmt = $pro->readAll();
?>
	<div class="row">
		<div class="col-md-6 text-left">
			<h4>Data Hafalan</h4>
		</div>
		<div class="col-md-6 text-right">
			<button onclick="location.href='hafalan-baru.php'" class="btn btn-primary">Tambah Data</button>
		</div>
	</div>
	<br/>

	<table width="100%" class="table table-striped table-bordered" id="tabeldata">
        <thead>
            <tr>
                <th width="30px">No</th>
                <th>Juz </th>  
                <th>Surah </th>   
                <th width="100px">Aksi</th>
            </tr>
        </thead>

        <tfoot>
            <tr>
                <th>No</th>
                <th>Juz </th>  
                <th>Surah </th>  
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
                <td><?php echo $row['juz'] ?></td> 
                <td><?php echo $row['surah'] ?></td>   
                <td class="text-center">
					<a href="hafalan-ubah.php?id=<?php echo $row['id'] ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
					<a href="hafalan-hapus.php?id=<?php echo $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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