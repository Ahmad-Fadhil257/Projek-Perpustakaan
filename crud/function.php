<?php
//tambah data buku
function tambahBuku($conn, $judul, $penulis, $penerbit, $tahun) {
  $sql = "INSERT INTO buku (judul, penulis, penerbit, tahun) 
          VALUES ('$judul', '$penulis', '$penerbit', '$tahun')";
  mysqli_query($conn, $sql);
}

function tampilkan($conn) {
  $sql = "SELECT * FROM buku ORDER BY id ASC";
  $nyambung = mysqli_query($conn,$sql);
  $data = [];
  while ($isi = mysqli_fetch_assoc($nyambung)) {
    $data [] = $isi;
  }
  return $data;
}   

//hapus
function hapusBuku($conn, $id) {
  $sql = "DELETE FROM buku WHERE id = $id";
  return mysqli_query($conn, $sql);
}

//edit
function updateBuku($conn, $id, $judul, $penulis, $penerbit, $tahun) {
  $sql = "UPDATE buku SET 
            judul    = '$judul', 
            penulis  = '$penulis', 
            penerbit = '$penerbit', 
            tahun    = '$tahun' 
          WHERE id = $id";
  return mysqli_query($conn, $sql);
}
?>


<?php
//--DATA ANGGOTA--

//tambah data buku
function tambahAnggota($conn, $nama, $nik, $kontak) {
  $sql = "INSERT INTO anggota (nama, nik, kontak) 
          VALUES ('$nama', '$nik', '$kontak')";
  mysqli_query($conn, $sql);
}

function tampilkanAnggota($conn) {
  $sql = "SELECT * FROM anggota ORDER BY id ASC";
  $nyambung = mysqli_query($conn,$sql);
  $data = [];
  while ($isi = mysqli_fetch_assoc($nyambung)) {
    $data [] = $isi;
  }
  return $data;
}   

//hapus
function hapusAnggota($conn, $id) {
  $sql = "DELETE FROM anggota WHERE id = $id";
  return mysqli_query($conn, $sql);
}

//edit
function updateAnggota($conn, $id, $nama, $nik, $kontak) {
  $sql = "UPDATE anggota SET 
            nama    = '$nama', 
            nik  = '$nik', 
            kontak = '$kontak'
          WHERE id = $id";
  return mysqli_query($conn, $sql);
}

?>