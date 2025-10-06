<?php include 'koneksi.php'; ?>
<?php include 'function.php'; ?>
<?php


// jika tombol simpan ditekan
if (isset($_POST['simpan'])) {
  $nama    = $_POST['nama'];
  $nik  = $_POST['nik'];
  $kontak = $_POST['kontak'];

  tambahAnggota($conn, $nama, $nik, $kontak);
  header("Location: ../data-anggota.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Anggota</title>
  <link rel="stylesheet" href="../asset/css/tambah-buku.css">
</head>
<body>
  <div class="container">
    <h2>Tambah Data Anggota</h2>
    <form method="POST">
      <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" required>
      </div>
      <div class="form-group">
        <label>NIK</label>
        <input type="number" name="nik" required>
      </div>
      <div class="form-group">
        <label>Kontak</label>
        <input type="number" name="kontak" required>
      </div>
      <div class="button-group">
        <button type="submit" name="simpan" class="btn btn-simpan">Simpan</button>
        <a href="../data-anggota.php" class="btn btn-batal">Batal</a>
      </div>
    </form>
  </div>
</body>
</html>
