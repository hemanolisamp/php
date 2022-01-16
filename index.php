<?php 

// koneksi
include "koneksi.php";

if (isset($_POST['submit'])) {
 $date1 = $_POST['date1'];
 $date2 = $_POST['date2'];

 if (!empty($date1) && !empty($date2)) {
  // perintah tampil data berdasarkan range tanggal
  $q = mysqli_query($conn, "SELECT * FROM tb_barang WHERE tanggal BETWEEN '$date1' and '$date2'"); 
 } else {
  // perintah tampil semua data
  $q = mysqli_query($conn, "SELECT * FROM tb_barang"); 
 }
} else {
 // perintah tampil semua data
 $q = mysqli_query($conn, "SELECT * FROM tb_barang");
}

?>

<!DOCTYPE html>
<html>
<head>
 <title>Tutorial PHP</title>

 <!-- Bootstrap -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
 
 <div class="container mt-5 mx-auto">
  <center>
   <h1>Menampilkan data berdasarkan periode tanggal dengan PHP</h1>
  </center>

  <div class="card mt-5">
   <div class="card-body mx-auto">
    <form method="POST" action="" class="form-inline mt-3">
     <label for="date1">Tanggal mulai </label>
     <input type="date" name="date1" id="date1" class="form-control mr-2">
     <label for="date2">sampai </label>
     <input type="date" name="date2" id="date2" class="form-control mr-2">
     <button type="submit" name="submit" class="btn btn-primary">Cari</button>
    </form>

    <table class="table table-bordered mt-5">
     <tr>
      <th>No</th>
      <th>Nama Barang</th>
      <th>Harga Satuan</th>
      <th>Tanggal</th>
     </tr>

     <?php
     
     $no = 1;

     while ($r = $q->fetch_assoc()) {
     ?>

     <tr>
      <td><?= $no++ ?></td>
      <td><?= ucwords($r['nama']) ?></td>
      <td><?= $r['harga'] ?></td>
      <td><?= date('d-M-Y', strtotime($r['tanggal'])) ?></td>
     </tr>

     <?php   
     }
     ?>

    </table>
   </div>
  </div>
 </div>

</body>
</html>