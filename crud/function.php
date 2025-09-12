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
?>