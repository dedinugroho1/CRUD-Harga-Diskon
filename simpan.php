<?php
require_once "koneksi.php";

$batas_harga=$_POST['harga'];

if ($batas_harga >= 100000) {
	$diskon=0.1;
	$diskon2=(($batas_harga*10)/100);
	$total=($batas_harga-$diskon2);
}
else {
	$diskon2=(($batas_harga*5)/100);
	$diskon=0.05;
	$total=($batas_harga-$diskon2);
}

		$kode_transaksi = trim(mysqli_real_escape_string($con, $_POST['kode_transaksi']));
		$nama_barang = trim(mysqli_real_escape_string($con, $_POST['nama_barang']));
		$harga = trim(mysqli_real_escape_string($con, $_POST['harga']));

	if(isset($_POST['add'])){
		$sql_cek_identitas = mysqli_query($con, "SELECT * FROM transaksi WHERE kode_transaksi = '$kode_transaksi'") or die (mysql_error($con));
		if (mysqli_num_rows($sql_cek_identitas) > 0) {
			echo "<script>alert('NISN Siswa pernah diinput!'); window.location='add.php';</script>";
		} else {
			mysqli_query($con, "INSERT INTO transaksi (kode_transaksi, nama_barang, harga, diskon, total) VALUES('$kode_transaksi', '$nama_barang', '$batas_harga', '$diskon', '$total')") or die (mysqli_error($con));
			echo "<script>window.location='index.php';</script>";
		}

	}else if(isset($_POST['edit'])){
		$id = $_POST['kode_transaksi'];
		mysqli_query($con, "UPDATE transaksi SET  nama_barang='$nama_barang',harga='$harga',diskon='$diskon',total='$total' WHERE kode_transaksi='$kode_transaksi' ") or die (mysqli_error($con));
		echo "<script>window.location='index.php';</script>";
	}
?>