<?php
include 'koneksi.php';
include 'function.php';

// Ambil data anggota dan buku untuk dropdown
$anggota = tampilkanAnggota($conn);
$buku = tampilkan($conn);

// Simpan data transaksi
if (isset($_POST['simpan'])) {
  $anggota_id = $_POST['anggota_id'];
  $buku_id = $_POST['buku_id'];
  $tgl_pinjam = $_POST['tgl_pinjam'];
  $tgl_kembali = $_POST['tgl_kembali'];
  $status = $_POST['status'];

  tambahTransaksi($conn, $anggota_id, $buku_id, $tgl_pinjam, $tgl_kembali, $status);
  header("Location: ../transaksi.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Transaksi</title>
  <link rel="stylesheet" href="../asset/css/tambah-transaksi.css">
</head>
<body>
  <div class="container">
    <h2>Tambah Pinjaman Buku</h2>
    <form method="POST">
      <div class="form-group">
        <label>Nama Anggota</label>
        <select name="anggota_id" required>
          <option value="">-- Pilih Anggota --</option>
          <?php foreach ($anggota as $a): ?>
            <option value="<?= $a['id']; ?>"><?= $a['nama']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="form-group">
        <label>Judul Buku</label>
        <select name="buku_id" required>
          <option value="">-- Pilih Buku --</option>
          <?php foreach ($buku as $b): ?>
            <option value="<?= $b['id']; ?>"><?= $b['judul']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="form-group">
        <label>Tanggal Pinjam</label>
        <input type="date" name="tgl_pinjam" required>
      </div>

      <div class="form-group">
        <label>Tanggal Kembali</label>
        <input type="date" name="tgl_kembali" required>
      </div>

      <div class="form-group">
        <label>Status</label>
        <select name="status" required>
          <option value="dipinjam">Pinjam</option>
        </select>
      </div>

      <div class="button-group">
        <button type="submit" name="simpan" class="btn btn-simpan">Simpan</button>
        <a href="../transaksi.php" class="btn btn-batal">Batal</a>
      </div>
    </form>
  </div>
</body>
</html>
