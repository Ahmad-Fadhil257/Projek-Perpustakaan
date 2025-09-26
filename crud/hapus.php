<?php
include 'koneksi.php'; 
include 'function.php';

// cek apakah ada id di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (hapusBuku($conn, $id)) {
        header("Location: ../data-buku.php");
        exit;
    } else {
        echo "Gagal menghapus buku: " . mysqli_error($conn);
    }
} else {
    echo "ID tidak ditemukan!";
}
?>