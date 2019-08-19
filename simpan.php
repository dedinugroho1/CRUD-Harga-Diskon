<!DOCTYPE html>
<html>
<head>
	<title>Membuat CRUD Dengan PHP Dan MySQL - Menampilkan data dari database</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="judul">		
		<h1>UJK Junior Web Programmer</h1> <br>
		<h2>Nama : Dedi Nugroho</h2>
		<h2>NIM : 150101062</h2>
	</div>
	<br/>

<center>
	<?php 
	if(isset($_GET['pesan'])){
		$pesan = $_GET['pesan'];
		if($pesan == "input"){
			echo "Data berhasil di input.";
		}
	}
	?>
</center>

	<br/>

	<h3 align="center">Data UJK</h3>
	<table border="1" class="table" align="center">
		<tr>
			<th>No</th>
			<th>Kode Transaksi</th>
			<th>Nama Barang</th>
			<th>Harga</th>
			<th>Diskon</th>		
			<th>Total</th>		
		</tr>
		<?php 
		include "koneksi.php";
		$query_mysql = mysql_query("SELECT * FROM transaksi")or die(mysql_error());
		$nomor = 1;
		while($data = mysql_fetch_array($query_mysql)){
		?>
		<tr>
			<td><?php echo $nomor++; ?></td>
			<td><?php echo $data['kode_transaksi']; ?></td>
			<td><?php echo $data['nama_barang']; ?></td>
			<td>Rp. <?php echo number_format ($data['harga']); ?></td>
			<td><?php echo number_format ($data['diskon']); ?> </td>
			<td>Rp. <?php echo number_format ($data['total']); ?></td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>