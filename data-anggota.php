<?php
include './crud/koneksi.php';
include './crud/function.php';
require_once 'header.php';
$anggota = tampilkanAnggota($conn);
?>

<link rel="stylesheet" href="./asset/css/data-anggota.css">
<div class="content">
  <h1 style="margin-left: 20px;"> 👨‍👩‍👧 Data Anggota</h1>
  <div class="toolbar">
    <a href="./crud/tambah-anggota.php" class="btn">+ Tambah Anggota</a>
    <div class="search-box">
      <form method="GET">
        <input type="text" name="cari" placeholder="Cari Nama Anggota...">
        <button type="submit" class="btn">Cari</button>
      </form>
    </div>
  </div>

  <table>
    <thead>
      <tr>
        <th class="id">ID</th>
        <th>Nama</th>
        <th>NIK</th>
        <th>Kontak</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php if (count($anggota) > 0): ?>
        <?php foreach ($anggota as $isi): ?>
          <tr>
            <td class="id"><?= $isi['id']; ?></td>
            <td><?= $isi['nama']; ?></td>
            <td><?= $isi['nik']; ?></td>
            <td><?= $isi['kontak']; ?></td>
            <td class="aksi">
              <a href="./crud/edit-anggota.php?id=<?= $isi['id']; ?>" class="edit">Edit</a>
              <a href="./crud/hapus-anggota.php?id=<?= $isi['id']; ?>" class="hapus" 
                 onclick="return confirm('Yakin mau hapus anggota ini?')">Hapus</a>
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