<?php
include './crud/koneksi.php';
require_once 'header.php';


// Hitung total data
$total_buku = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM buku"));
$total_anggota = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM anggota"));
$total_pinjam = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM transaksi WHERE status='Dipinjam'"));

// Ambil beberapa data
$buku = mysqli_query($conn, "SELECT * FROM buku ORDER BY id ASC LIMIT 3");
$anggota = mysqli_query($conn, "SELECT * FROM anggota ORDER BY id ASC LIMIT 3");
$transaksi = mysqli_query($conn, "
  SELECT t.*, a.nama, b.judul 
  FROM transaksi t
  JOIN anggota a ON t.anggota_id = a.id
  JOIN buku b ON t.buku_id = b.id
  ORDER BY t.id DESC LIMIT 3
");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>📚 Dashboard Perpustakaan</title>
  <link rel="stylesheet" href="./asset/css/dashboard.css">
</head>
<body>
  <div class="dashboard">
    <h1>📚 SISTEM INFORMASI PERPUSTAKAAN</h1>
    <div class="summary">
      <div>Total Buku : <span><?= $total_buku ?></span></div>
      <div>Total Anggota : <span><?= $total_anggota ?></span></div>
      <div>Buku Dipinjam : <span><?= $total_pinjam ?></span></div>
    </div>

    <div class="row">
      <div class="table-box">
        <h2>📖 DATA BUKU</h2>
        <table>
          <tr><th>ID</th><th>Judul Buku</th><th>Tahun</th></tr>
          <?php while ($b = mysqli_fetch_assoc($buku)): ?>
            <tr>
              <td><?= $b['id'] ?></td>
              <td><?= $b['judul'] ?></td>
              <td><?= $b['tahun'] ?></td>
            </tr>
          <?php endwhile; ?>
        </table>
      </div>

      <div class="table-box">
        <h2>👥 DATA ANGGOTA</h2>
        <table>
          <tr><th>ID</th><th>Nama Anggota</th><th>Kontak</th></tr>
          <?php while ($a = mysqli_fetch_assoc($anggota)): ?>
            <tr>
              <td><?= $a['id'] ?></td>
              <td><?= $a['nama'] ?></td>
              <td><?= $a['kontak'] ?></td>
            </tr>
          <?php endwhile; ?>
        </table>
      </div>
    </div>

    <div class="transaksi">
      <h2>🔁 TRANSAKSI TERBARU</h2>
      <table>
        <tr>
          <th>No</th><th>Nama Anggota</th><th>Judul Buku</th>
          <th>Tgl Pinjam</th><th>Tgl Kembali</th><th>Status</th>
        </tr>
        <?php $no=1; while ($t = mysqli_fetch_assoc($transaksi)): ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= $t['nama'] ?></td>
            <td><?= $t['judul'] ?></td>
            <td><?= $t['tgl_pinjam'] ?></td>
            <td><?= $t['tgl_kembali'] ?></td>
            <td><?= $t['status'] ?></td>
          </tr>
        <?php endwhile; ?>
      </table>
    </div>
  </div>
</body>
</html>
