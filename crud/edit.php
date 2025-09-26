<?php 
include 'koneksi.php'; 
include 'function.php'; 

// Ambil ID dari URL
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $sql   = "SELECT * FROM buku WHERE id = $id";
  $query = mysqli_query($conn, $sql);
  $buku  = mysqli_fetch_assoc($query);
}

if (isset($_POST['simpan'])) {
  $judul    = $_POST['judul'];
  $penulis  = $_POST['penulis'];
  $penerbit = $_POST['penerbit'];
  $tahun    = $_POST['tahun'];

  if (updateBuku($conn, $id, $judul, $penulis, $penerbit, $tahun)) {
    header("Location: ../data-buku.php");
    exit;
  } else {
    echo "Gagal mengupdate buku: " . mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Buku</title>
  <link rel="stylesheet" href="../asset/css/tambah-buku.css">
</head>
<body>
  <div class="container">
    <h2>Edit Data Buku</h2>
    <form method="POST">
      <div class="form-group">
        <label>Judul</label>
        <input type="text" name="judul" value="<?= $buku['judul']; ?>" required>
      </div>
      <div class="form-group">
        <label>Penulis</label>
        <input type="text" name="penulis" value="<?= $buku['penulis']; ?>" required>
      </div>
      <div class="form-group">
        <label>Penerbit</label>
        <input type="text" name="penerbit" value="<?= $buku['penerbit']; ?>" required>
      </div>
      <div class="form-group">
        <label>Tahun</label>
        <input type="number" name="tahun" min="1000" max="2025" value="<?= $buku['tahun']; ?>" required>
      </div>
      <div class="button-group">
        <button type="submit" name="simpan" class="btn btn-simpan">Simpan</button>
        <a href="../data-buku.php" class="btn btn-batal">Batal</a>
      </div>
    </form>
  </div>
</body>
</html>
