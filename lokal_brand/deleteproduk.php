<?php
include('koneksi.php');

if (isset($_GET['nama_produk'])) {
    $nama_produk = $_GET['nama_produk'];

    $query = "DELETE FROM produk WHERE nama_produk = '$nama_produk'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION['pesan'] = "Data berhasil dihapus!";
        header("Location: produk.php");
        exit();
    } else {
        $_SESSION['pesan'] = "Data gagal dihapus!";
        header("Location: produk.php");
        exit();
    }
}
?>
