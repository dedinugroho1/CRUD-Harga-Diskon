<!DOCTYPE html>

<html>
<head>
	<style>
	   	 .heading { 
	   	 	color: #FF0000;
	   	 	text-align: center; 
	   	 }
  	</style>
	<title>UJK Junior Web Programmer</title>
	<h1 class="heading">UJK Junior Web Programmer</h1>

	<link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="assets/css/simple-sidebar.css" rel="stylesheet">

</head>
<body>


	<table align="center" style="width:40%">
	  <tr>
	    <td><div>Nama : Dedi Nugroho</div></td>
	  </tr>
	  <tr>
	    <td><div>NIM : 150101062</div></td>
	  </tr>
	  <tr>
	    <td><br></td>
	  </tr>
	  <tr>
	  	<td>
			<form action="simpan.php" method="post">
		  		<table border="2px" style="width: 100%">
		  			<tr >
						<td colspan="3" align="center">FORM INPUT TRANSAKSI</td>
					</tr>
					<tr>
						<td>Kode Transaksi</td>
						<td>:</td>
						<td>
							<div class="form-group">
								<input type="text" style="width: 60%" name="kode_transaksi" class="form-control"  id="kode_transaksi" required>
							</div>
						</td>
					</tr>
					<tr>
						<td>Nama Barang</td>
						<td>:</td>
						<td><input type="text" style="width: 90%" name="nama_barang" class="form-control"  id="nama_barang" required></td>
					</tr>
					<tr>
						<td>Harga</td>
						<td>:</td>
						<td><input type="text" style="width: 60%" name="harga" class="form-control"  id="harga" required></td>
					</tr>
					<tr>
						<td colspan="3" align="center"><input type="submit" name="add" value="Simpan" class="btn btn-success "></button></td>
					</tr>
		  		</table>
		  	</form>
	  	</td>
	  </tr>
	</table>

<?php
require_once "koneksi.php";
?>
	<div><br></div>
	<div><br></div>
	<div class="box col-lg-12" >
		<h4>
			<small>Data Transaksi</small>
		</h4>
		<div style="margin-bottom: 20px">
			<form class="form-inline" action="" method="post">
				<div class="form_group">
					<input type="text" name="pencarian" class="form-control" placeholder="Pencarian">
					<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
				</div>
			</form>

		</div>
		<div class="table-responsive" style="width: 80%" align="center">
			<table class= "table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Kode Transaksi</th>
						<th>Nama Barang</th>
						<th>Harga</th>
						<th>Diskon</th>
						<th>Total</th>
						
						<th><i class="glyphicon glyphicon-cog "></i></th>
					</tr>
				</thead>
				<tbody>
					<?php

					$batas =10;
					$hal = @$_GET['hal'];
					if(empty($hal)){
						$posisi = 0;
						$hal	=1;
					} else {
						$posisi =($hal -1) * $batas;
					}

					if($_SERVER['REQUEST_METHOD'] == "POST"){
						$pencarian = trim(mysqli_real_escape_string($con, $_POST['pencarian'])); if($pencarian != ''){
							$sql = "SELECT * FROM transaksi WHERE kode_transaksi LIKE '%$pencarian%' OR nama_barang LIKE '%$pencarian%'";
							$query = $sql;
							$queryJml = $sql;

						}else {
							$query = "SELECT * FROM transaksi LIMIT $posisi, $batas";
							$queryJml = "SELECT * FROM transaksi";
						}
					} else {
							$query = "SELECT * FROM transaksi LIMIT $posisi, $batas";
							$queryJml = "SELECT * FROM transaksi";
					}


						$sql_transaksi = mysqli_query($con, $query) or die( mysqli_error($con));
						if (mysqli_num_rows($sql_transaksi) >0) 
							while ($data= mysqli_fetch_array($sql_transaksi)) { ?>
								<tr>
									<td><?=$data['kode_transaksi']?></td>
									<td><?=$data['nama_barang']?></td>
									<td><?=$data['harga']?></td>
									<td><?=$data['diskon']?></td>
									<td><?=$data['total']?></td>
									<td class="text-center">
										<a href="edit.php?id=<?=$data['kode_transaksi']?>" class ="btn btn-warning btn-xs"><i  class="glyphicon glyphicon-edit"></i></a>
										<a href="hapus.php?id=<?=$data['kode_transaksi']?>" onclick="return confirm('Yakin Akan Menghapus Data Ini? ')" class ="btn btn-danger btn-xs"><i  class="glyphicon glyphicon-trash"></i></a>
									</td>
								</tr>
							<?php 
							} else {
								echo "<tr><td colspan=\"9\" align=\"center\">Data Tidak Ditemukan</td></tr>";
							}

					?>

				</tbody>
			</table>
			<?php 
			if(isset($_POST['pencarian'] )){
				echo "<div style=\"float:left;\">";
				$jml = mysqli_num_rows(mysqli_query($con, $queryJml));
				echo "Data Hasil Pencarian : <b> $jml </b>";
				echo "</div>";

			}	else{ ?>
			<div style="float:left;">
				<?php
				$jml = mysqli_num_rows(mysqli_query($con, $queryJml));
				echo "Jumlah Data : <b>$jml</b>";
				?>
			</div>
			<div style="float:right;">
				<ul class="pagination pagination-sm" style="margin: 0">
				<?php	
				$jml_hal = ceil($jml/ $batas);
				for ($i=1; $i <= $jml_hal; $i++){
					if($i != $hal){
						echo "<li><a href=\"?hal=$i\">$i</a></li>";
					}else {
						echo "<li class=\"active\"><a>$i</a></li>";
					} 
				}
				?>
				</ul>
				<?php
			}		
			?>

		</div>
	</div>

</div>
</body>
</html>


