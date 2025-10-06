<?php 
include 'koneksi.php'; 
include 'function.php'; 

// Ambil ID dari URL
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $sql   = "SELECT * FROM anggota WHERE id = $id";
  $query = mysqli_query($conn, $sql);
  $anggota  = mysqli_fetch_assoc($query);
}

if (isset($_POST['simpan'])) {
  $nama    = $_POST['nama'];
  $nik  = $_POST['nik'];
  $kontak = $_POST['kontak'];

  if (updateAnggota($conn, $id, $nama, $nik, $kontak)) {
    header("Location: ../data-anggota.php");
    exit;
  } else {
    echo "Gagal mengupdate Anggota: " . mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Anggota</title>
  <link rel="stylesheet" href="../asset/css/tambah-buku.css">
</head>
<body>
  <div class="container">
    <h2>Edit Data Anggota</h2>
    <form method="POST">
      <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" value="<?= $anggota['nama']; ?>" required>
      </div>
      <div class="form-group">
        <label>NIK</label>
        <input type="text" name="nik" value="<?= $anggota['nik']; ?>" required>
      </div>
      <div class="form-group">
        <label>Kontak</label>
        <input type="text" name="kontak" value="<?= $anggota['kontak']; ?>" required>
      </div>
      <div class="button-group">
        <button type="submit" name="simpan" class="btn btn-simpan">Simpan</button>
        <a href="../data-anggota.php" class="btn btn-batal">Batal</a>
      </div>
    </form>
  </div>
</body>
</html>
