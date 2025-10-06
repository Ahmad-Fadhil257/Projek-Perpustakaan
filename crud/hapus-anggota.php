<?php
include 'koneksi.php'; 
include 'function.php';

// cek apakah ada id di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (hapusAnggota($conn, $id)) {
        header("Location: ../data-anggota.php");
        exit;
    } else {
        echo "Gagal menghapus anggota: " . mysqli_error($conn);
    }
} else {
    echo "ID tidak ditemukan!";
}
?>