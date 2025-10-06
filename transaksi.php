<?php
include './crud/koneksi.php';
include './crud/function.php';
require_once 'header.php';

$transaksi = tampilkanTransaksi($conn);
?>

<link rel="stylesheet" href="./asset/css/data-buku.css">
<div class="content">
  <h1 style="margin-left: 20px;">📖 Data Transaksi</h1>
  <div class="toolbar">
    <a href="./crud/tambah-transaksi.php" class="btn">+ Tambah Transaksi</a>
  </div>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama Anggota</th>
        <th>Judul Buku</th>
        <th>Tgl Pinjam</th>
        <th>Tgl Kembali</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($transaksi as $t): ?>
        <tr>
          <td><?= $t['id']; ?></td>
          <td><?= $t['nama_anggota']; ?></td>
          <td><?= $t['judul_buku']; ?></td>
          <td><?= $t['tgl_pinjam']; ?></td>
          <td><?= $t['tgl_kembali']; ?></td>
          <td><?= $t['status']; ?></td>
          <td class="aksi">
            <a href="./crud/edit-transaksi.php?id=<?= $t['id']; ?>" class="edit">Edit</a>
            <a href="./crud/hapus-transaksi.php?id=<?= $t['id']; ?>" class="hapus"
               onclick="return confirm('Yakin ingin menghapus transaksi ini?')">Hapus</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
</div>
</body>
</html>
