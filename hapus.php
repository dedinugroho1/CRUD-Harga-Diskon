
<?php 
include 'koneksi.php';

mysql_query("DELETE FROM transaksi WHERE kode_transaksi = '$_GET[id]'");
 
header("location:simpan2.php?pesan=hapus");
?>