<?php
//tambah data buku
function tambahBuku($conn, $judul, $penulis, $penerbit, $tahun)
{
  $sql = "INSERT INTO buku (judul, penulis, penerbit, tahun) 
          VALUES ('$judul', '$penulis', '$penerbit', '$tahun')";
  mysqli_query($conn, $sql);
}

function tampilkan($conn)
{
  $sql = "SELECT * FROM buku ORDER BY id ASC";
  $nyambung = mysqli_query($conn, $sql);
  $data = [];
  while ($isi = mysqli_fetch_assoc($nyambung)) {
    $data[] = $isi;
  }
  return $data;
}

//hapus
function hapusBuku($conn, $id)
{
  $sql = "DELETE FROM buku WHERE id = $id";
  return mysqli_query($conn, $sql);
}

//edit
function updateBuku($conn, $id, $judul, $penulis, $penerbit, $tahun)
{
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
function tambahAnggota($conn, $nama, $nik, $kontak)
{
  $sql = "INSERT INTO anggota (nama, nik, kontak) 
          VALUES ('$nama', '$nik', '$kontak')";
  mysqli_query($conn, $sql);
}

function tampilkanAnggota($conn)
{
  $sql = "SELECT * FROM anggota ORDER BY id ASC";
  $nyambung = mysqli_query($conn, $sql);
  $data = [];
  while ($isi = mysqli_fetch_assoc($nyambung)) {
    $data[] = $isi;
  }
  return $data;
}

//hapus
function hapusAnggota($conn, $id)
{
  $sql = "DELETE FROM anggota WHERE id = $id";
  return mysqli_query($conn, $sql);
}

//edit
function updateAnggota($conn, $id, $nama, $nik, $kontak)
{
  $sql = "UPDATE anggota SET 
            nama    = '$nama', 
            nik  = '$nik', 
            kontak = '$kontak'
          WHERE id = $id";
  return mysqli_query($conn, $sql);
}

?>

<?php
// ================== TRANSAKSI ==================

function tambahTransaksi($conn, $anggota_id, $buku_id, $tgl_pinjam, $tgl_kembali, $status)
{
  $sql = "INSERT INTO transaksi (anggota_id, buku_id, tgl_pinjam, tgl_kembali, status)
          VALUES ('$anggota_id', '$buku_id', '$tgl_pinjam', '$tgl_kembali', '$status')";
  mysqli_query($conn, $sql);
}

function tampilkanTransaksi($conn)
{
  $sql = "SELECT t.id, a.nama AS nama_anggota, b.judul AS judul_buku, 
                 t.tgl_pinjam, t.tgl_kembali, t.status
          FROM transaksi t  
          JOIN anggota a ON t.anggota_id = a.id
          JOIN buku b ON t.buku_id = b.id
          ORDER BY t.id DESC";
  $result = mysqli_query($conn, $sql);
  $data = [];
  while ($isi = mysqli_fetch_assoc($result)) {
    $data[] = $isi;
  }
  return $data;
}

function hapusTransaksi($conn, $id)
{
  $sql = "DELETE FROM transaksi WHERE id = $id";
  return mysqli_query($conn, $sql);
}

function updateTransaksi($conn, $id, $anggota_id, $buku_id, $tgl_pinjam, $tgl_kembali, $status)
{
  $sql = "UPDATE transaksi SET 
            anggota_id = '$anggota_id',
            buku_id    = '$buku_id',
            tgl_pinjam = '$tgl_pinjam',
            tgl_kembali = '$tgl_kembali',
            status     = '$status'
          WHERE id = $id";
  return mysqli_query($conn, $sql);
}
?>
