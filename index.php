<html>
<head>
	<title>UJK WEB</title>

	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="aset/bower_components/jquery/dist/jquery.min.js">
	<link rel="stylesheet" href="aset/bower_components/bootstrap/dist/css/bootstrap.min.css">
  	<link rel="stylesheet" href="aset/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css">
	
	<style type="text/css" media="screen">
		h1{
			color: red;
			background: white;
			border: 1px;
			text-align: center;
			margin-top: 30px;
		}

		p{
			font-size: 15px;
			margin-left: 400px;

		}

		table{
			margin-left:400px;
		}
		
	</style>
</head>
<body>

<h1>UJK Junior Web Programmer</h1>

<br>

<p> Nama : Dedi Nugroho </p>

<p> NIM : 150101062 </p>


	<br/>


<form action="inputaksi.php" method="post">	

<table border="2" >
	<thead>
		<tr>
			<th colspan="3">FORM INPUT TRANSAKSI</th>
		</tr>
	</thead>
	<tbody >
		<tr>
			<td>Kode Transaksi</td>
			<td>:</td>
			<td><input type="text" name="kode_transaksi"></td>
		</tr>
		<tr>
			<td>Nama Barang</td>
			<td>:</td>
			<td><input type="text" name="nama_barang"></td>
		</tr>
		<tr>
			<td>Harga</td>
			<td>:</td>
			<td><input type="number" name="harga"></td>
		</tr>
		<tr>
			<td colspan="3"><center>
				<input type="submit" value="Simpan">
			</td>
		</tr>
	</tbody>
</table>

</form>

</body>
</html>