<?php
include './crud/koneksi.php';
include './crud/function.php';
require_once 'header.php';
$buku = tampilkan($conn);
?>

<link rel="stylesheet" href="./asset/css/data-buku.css">
<div class="content">
  <h1 style="margin-left: 20px;">📚 Data Buku</h1>
  <div class="toolbar">
    <a href="./crud/tambah-buku.php" class="btn">+ Tambah Buku</a>
    <div class="search-box">
      <form method="GET">
        <input type="text" name="cari" placeholder="Cari buku...">
        <button type="submit" class="btn">Cari</button>
      </form>
    </div>
  </div>

  <table>
    <thead>
      <tr>
        <th class="id">ID</th>
        <th>Judul Buku</th>
        <th>Penulis</th>
        <th>Penerbit</th>
        <th>Tahun</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php if (count($buku) > 0): ?>
        <?php foreach ($buku as $isi): ?>
          <tr>
            <td class="id"><?= $isi['id']; ?></td>
            <td><?= $isi['judul']; ?></td>
            <td><?= $isi['penulis']; ?></td>  
            <td><?= $isi['penerbit']; ?></td>
            <td><?= $isi['tahun']; ?></td>
            <td class="aksi">
              <a href="./crud/edit-buku.php?id=<?= $isi['id']; ?>" class="edit">Edit</a>
              <a href="./crud/hapus-buku.php?id=<?= $isi['id']; ?>" class="hapus" 
                 onclick="return confirm('Yakin mau hapus buku ini?')">Hapus</a>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</div>
</div>
</body>

</html>