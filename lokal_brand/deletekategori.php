<?php
include('koneksi.php');

if (isset($_GET['nama_kategori'])) {
    $nama_kategori = $_GET['nama_kategori'];

    $query = "DELETE FROM kategori WHERE nama_kategori = '$nama_kategori'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION['pesan'] = "Data berhasil dihapus!";
        header("Location: kategori.php");
        exit();
    } else {
        $_SESSION['pesan'] = "Data gagal dihapus!";
        header("Location: kategori.php");
        exit();
    }
}
?>
