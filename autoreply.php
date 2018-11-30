<?php

//koneksi ke mysql dan db nya
// mysql_connect("dbhost", "dbuser", "dbpass");
// mysql_select_db("dbname");
// mysql_connect("localhost", "root", "");
// mysql_select_db("nkit_gammu");

// Variabel koneksi
$myHost	= "localhost";
$myUser	= "root";
$myPass	= "";
$myDbs	= "nkit_sms_santri";

// Konek ke MySQL Server 
$koneksidb	= mysqli_connect($myHost, $myUser, $myPass, $myDbs);
if (! $koneksidb) {
  echo "Failed Connection !";
}
function format_angka($angka) {
	$hasil =  number_format($angka,0, ",",",");
	return $hasil;
}
function IndonesiaTgl($tanggal){
	$tgl=substr($tanggal,8,2);
	$bln=substr($tanggal,5,2);
	$thn=substr($tanggal,0,4);
	$tanggal="$tgl-$bln-$thn";
	return $tanggal;
}
// require_once 'includes/koneksis.php';
// require_once 'includes/class_sms.php'; 

// query untuk membaca SMS yang belum diproses
$query = "SELECT * FROM inbox WHERE Processed = 'false'";
$hasil = mysqli_query($koneksidb, $query);
if($hasil) { echo "!!!";}
while ($data = mysqli_fetch_array($hasil))
{
  // membaca ID SMS
  $id = $data['ID'];

  // membaca no pengirim
  $noPengirim = $data['SenderNumber'];

  // membaca pesan SMS dan mengubahnya menjadi kapital
  $msg = strtoupper($data['TextDecoded']);

  // proses parsing 

  // memecah pesan berdasarkan karakter
  $pecah = explode(" ", $msg);

  // jika kata terdepan dari SMS adalah 'NILAI' maka cari nilai Kalkulus
  if ($pecah[0] == "HAFALAN")
  {
     // baca NIM dari pesan SMS
     $nis = $pecah[1];

     // cari nilai kalkulus berdasar NIM
     $query2 = "SELECT t_hafiz.id,t_hafiz.tahun,t_hafiz.bulan,t_santri.nama_santri,t_santri.nis, t1.surah AS cap_surah, t1.juz AS cap_juz , t2.surah AS nam_surah, t2.juz AS nam_juz FROM t_hafiz  
		LEFT JOIN t_santri ON t_santri.id=t_hafiz.id_santri 
		LEFT JOIN t_hafalan AS t1 ON t1.id=t_hafiz.pencapaian_hafalan
		LEFT JOIN t_hafalan AS t2 ON t2.id=t_hafiz.penambahan_hafalan
        WHERE t_santri.nis='".$nis."'        
		ORDER BY t_hafiz.updated_at DESC";
     $hasil2 = mysqli_query($koneksidb, $query2);

     // cek bila data nilai tidak ditemukan
     if (mysqli_num_rows($hasil2) == 0) $reply = "Maaf Belum ada data hafalan dengan NIS tersebut.";
     else
     {
        // bila nilai ditemukan
        $data2 = mysqli_fetch_array($hasil2);
        $tahun = $data2['tahun'];
        $bulan = $data2['bulan'];
        $nama_santri = $data2['nama_santri'];
        $nis = $data2['nis'];
        $cap_juz = $data2['cap_juz']; 
        $cap_surah = $data2['cap_surah'];
        $nam_juz = $data2['nam_juz']; 
        $nam_surah = $data2['nam_surah'];  
        $reply = "Santri ".$nama_santri." pada bulan ".$bulan." telah mencapai ".$cap_surah." (".$cap_juz.") dan sedang menghafal  ".$nam_surah." (".$nam_juz.") ";
     }
  }
  elseif ($pecah[0] == "INFO"){
	  $reply = "Terima Kasih telah menggunakan layanan kami, mohon tunggu 1x24 jam kami akan membalas pertanyaan Anda.";
  }
  else $reply = "Maaf perintah salah, gunakan= HAFALAN(spasi)Nomor Induk Santri atau INFO(spasi)isi pertanyaan.";

  // membuat SMS balasan

  $query3 = "INSERT INTO outbox(DestinationNumber, TextDecoded, CreatorID) VALUES ('$noPengirim', '$reply', 'nKIT')";
  $hasil3 = mysqli_query($koneksidb, $query3);

  // ubah nilai 'processed' menjadi 'true' untuk setiap SMS yang telah diproses

  $query3 = "UPDATE inbox SET Processed = 'true' WHERE ID = '$id'";
  $hasil3 = mysqli_query($koneksidb, $query3);
}
?>