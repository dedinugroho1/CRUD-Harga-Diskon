<?php
require_once "koneksi.php";
	

	mysqli_query($con, "DELETE FROM transaksi WHERE kode_transaksi = '$_GET[id]' ") or die (mysqli_error($con));
echo "<script>window.location='index.php';</script>";

?>