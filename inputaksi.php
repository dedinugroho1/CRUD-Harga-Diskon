
<?php 
include 'koneksi.php';
$kode_transaksi = $_POST['kode_transaksi'];
$nama_barang = $_POST['nama_barang'];


$harga = isset($_POST['harga'])?abs((int)$_POST['harga']):'';

if ($harga > 100000) {
	$diskon = $harga * 0.1 ;
	$total=$harga-$diskon;
}
else {
    $diskon = $harga * 0.05 ;
    $total=$harga- $diskon;
}

mysql_query("INSERT INTO transaksi VALUES('$kode_transaksi','$nama_barang','$harga','$diskon','$total')");
 
header("location:simpan2.php?pesan=input");
?>