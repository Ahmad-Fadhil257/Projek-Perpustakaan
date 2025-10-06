<?php
include 'koneksi.php'; 
include 'function.php';

// cek apakah ada id di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (hapusTransaksi($conn, $id)) {
        header("Location: ../transaksi.php");
        exit;
    } else {
        echo "Gagal menghapus buku: " . mysqli_error($conn);
    }
} else {
    echo "ID tidak ditemukan!";
}
?>