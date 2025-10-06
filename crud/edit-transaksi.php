<?php
include 'koneksi.php';
include 'function.php';

// Ambil ID transaksi dari URL
if (!isset($_GET['id'])) {
  header("Location: ../transaksi.php");
  exit;
}
$id = $_GET['id'];

// Ambil data anggota dan buku untuk dropdown
$anggota = tampilkanAnggota($conn);
$buku = tampilkan($conn);

// Ambil data transaksi yang akan diedit
$sql = "SELECT * FROM transaksi WHERE id = $id";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

if (!$data) {
  echo "<script>alert('Data transaksi tidak ditemukan!'); window.location='../transaksi.php';</script>";
  exit;
}

// Jika tombol simpan ditekan
if (isset($_POST['update'])) {
  $anggota_id = $_POST['anggota_id'];
  $buku_id = $_POST['buku_id'];
  $tgl_pinjam = $_POST['tgl_pinjam'];
  $tgl_kembali = $_POST['tgl_kembali'];
  $status = $_POST['status'];

  updateTransaksi($conn, $id, $anggota_id, $buku_id, $tgl_pinjam, $tgl_kembali, $status);
  header("Location: ../transaksi.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Transaksi</title>
  <link rel="stylesheet" href="../asset/css/tambah-transaksi.css">
</head>
<body>
  <div class="container">
    <h2>Edit Data Transaksi</h2>
    <form method="POST">
      <div class="form-group">
        <label>Nama Anggota</label>
        <select name="anggota_id" required>
          <option value="">-- Pilih Anggota --</option>
          <?php foreach ($anggota as $a): ?>
            <option value="<?= $a['id']; ?>" <?= ($a['id'] == $data['anggota_id']) ? 'selected' : ''; ?>>
              <?= $a['nama']; ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="form-group">
        <label>Judul Buku</label>
        <select name="buku_id" required>
          <option value="">-- Pilih Buku --</option>
          <?php foreach ($buku as $b): ?>
            <option value="<?= $b['id']; ?>" <?= ($b['id'] == $data['buku_id']) ? 'selected' : ''; ?>>
              <?= $b['judul']; ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="form-group">
        <label>Tanggal Pinjam</label>
        <input type="date" name="tgl_pinjam" value="<?= $data['tgl_pinjam']; ?>" required>
      </div>

      <div class="form-group">
        <label>Tanggal Kembali</label>
        <input type="date" name="tgl_kembali" value="<?= $data['tgl_kembali']; ?>" required>
      </div>

      <div class="form-group">
        <label>Status</label>
        <select name="status" required>
          <option value="dipinjam" <?= ($data['status'] == 'dipinjam') ?>>Dipinjam</option>
          <option value="tersedia" <?= ($data['status'] == 'tersedia') ?>>Kembali</option>
        </select>
      </div>

      <div class="button-group">
        <button type="submit" name="update" class="btn btn-simpan">Perbarui</button>
        <a href="../transaksi.php" class="btn btn-batal">Batal</a>
      </div>
    </form>
  </div>
</body>
</html>
