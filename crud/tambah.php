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

}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Tambah Buku</title>
  <link rel="stylesheet" href="../asset/css/adminlte.min.css">
</head>

<body class="p-3">
  <form method="POST" class="card p-3">
    <h3>Tambah Buku</h3>
    <div class="mb-2">
      <label>Judul</label>
      <input type="text" name="judul" class="form-control" required>
    </div>
    <div class="mb-2">
      <label>Penulis</label>
      <input type="text" name="penulis" class="form-control" required>
    </div>
    <div class="mb-2">
      <label>Penerbit</label>
      <input type="text" name="penerbit" class="form-control" required>
    </div>
    <div class="mb-2">
      <label>Tahun</label>
      <input type="number" name="tahun" class="form-control" min="1000" max="2025" step="1" placeholder="tahun 1000 - 2025" required>
    </div>
    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
    <a href="../data-buku.php" class="btn btn-secondary">Batal</a>
  </form>
</body>

</html>