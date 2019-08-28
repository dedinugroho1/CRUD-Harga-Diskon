<?php include_once('koneksi.php');?>
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/simple-sidebar.css" rel="stylesheet">

<div>
  <h1>Edit Transaksi</h1>
    <h4>
      <small> Edit Data Transaksi</small>
      <div class="pull-right">
        
        <a href="index.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left "></i>Kembali</a>
      </div>
    </h4>
    <div class="row">
      <div class="col-lg-6 col-lg-offset-3">
          <?php
           $id = @$_GET['id'];
           $sql_transaksi = mysqli_query($con, " SELECT * FROM transaksi WHERE kode_transaksi ='$id' ") or die (mysqli_error($con));
           $data = mysqli_fetch_array($sql_transaksi);

          ?>
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
                <input type="text" style="width: 60%" value="<?=$data['kode_transaksi'] ?>" name="kode_transaksi" class="form-control"  id="kode_transaksi" required>
              </div>
            </td>
          </tr>
          <tr>
            <td>Nama Barang</td>
            <td>:</td>
            <td>
              <input type="text" style="width: 90%" value="<?=$data['nama_barang'] ?>" name="nama_barang" class="form-control"  id="nama_barang" required>
            </td>
          </tr>
          <tr>
            <td>Harga</td>
            <td>:</td>
            <td><input type="text" style="width: 60%" value="<?=$data['harga'] ?>" name="harga" class="form-control"  id="harga" required></td>
          </tr>
          <tr>
            <td colspan="3" align="center"><input type="submit" name="edit" value="simpan" class="btn btn-success "></td>
          </tr>
          </table>
        </form>
      </div>

    </div>

</div>