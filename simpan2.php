<!DOCTYPE html>
<html>
<head>
	<title>Membuat CRUD Dengan PHP Dan MySQL - Menampilkan data dari database</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="aset/bower_components/jquery/dist/jquery.min.js">
	<link rel="stylesheet" href="aset/bower_components/bootstrap/dist/css/bootstrap.min.css">
  	<link rel="stylesheet" href="aset/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css">

</head>
<body>
	<div class="judul">		
		<h1>UJK Junior Web Programmer</h1> <br>
		<h2>Nama : Dedi Nugroho</h2>
		<h2>NIM : 150101062</h2>
	</div>
	<br/>

<center> <h3><b>
	<?php 
	if(isset($_GET['pesan'])){
		$pesan = $_GET['pesan'];
		if($pesan == "input"){
			echo "Data berhasil di input.";
		}
			elseif($pesan == "hapus"){
			echo "Data berhasil di hapus.";
		}
	}
	?>
</center>

	<br/>

<div class="container-fluid">
	<a href="index.php" class="btn btn-primary">Kembali Ke Form Input</a>
	<h3 align="center">Data UJK</h3>
	
	<table id="example" class="table table-bordered table-striped" align="center">
         <thead>
              <tr>
                <th style="text-align: center">No.</th>
                <th style="text-align: center">Kode Transaksi</th>
                <th style="text-align: center">Nama Barang</th>
                <th style="text-align: center">Harga</th>
                <th style="text-align: center">Diskon</th>
                <th style="text-align: center">Total</th>
                <th style="text-align: center">Aksi</th>
              </tr>
        </thead>
        <tbody>
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
				<td>
					<a href="hapus.php?id=<?=$data['kode_transaksi']?>" 
						onclick="return confirm('Yakin Akan Menghapus Data Ini? ')" 
						class ="btn btn-danger btn-xs">
						<i class="glyphicon glyphicon-trash"></i>
					</a>
				</td>

              </tr>
        </tbody>
        <?php } ?>
    </table>

	

</div>

</body>

    <script src="aset/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>

		<script>
		 $(document).ready(function() {
		    $('#example').DataTable( {
		        
		    } );
		} );
		</script>

</html>