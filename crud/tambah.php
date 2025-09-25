<?php include 'koneksi.php'; ?>
<?php include 'function.php'; ?>
<?php


// jika tombol simpan ditekan
if (isset($_POST['simpan'])) {
  $judul    = $_POST['judul'];
  $penulis  = $_POST['penulis'];
  $penerbit = $_POST['penerbit'];
  $tahun    = $_POST['tahun'];

  tambahBuku($conn, $judul, $penulis, $penerbit, $tahun);
  header("Location: ../data-buku.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Buku</title>
  <link rel="stylesheet" href="../asset/css/tambah-buku.css">
</head>
<body>
  <div class="container">
    <h2>Tambah Data Buku</h2>
    <form method="POST">
      <div class="form-group">
        <label>Judul</label>
        <input type="text" name="judul" required>
      </div>
      <div class="form-group">
        <label>Penulis</label>
        <input type="text" name="penulis" required>
      </div>
      <div class="form-group">
        <label>Penerbit</label>
        <input type="text" name="penerbit" required>
      </div>
      <div class="form-group">
        <label>Tahun</label>
        <input type="number" name="tahun" min="1000" max="2025" required>
      </div>
      <div class="button-group">
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        <a href="../data-buku.php" class="btn btn-secondary">Batal</a>
      </div>
    </form>
  </div>
</body>
</html>
