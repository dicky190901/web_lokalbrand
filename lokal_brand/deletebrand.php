<?php
include('koneksi.php');

if (isset($_GET['nama_brand'])) {
    $nama_brand = $_GET['nama_brand'];

    $query = "DELETE FROM brand WHERE nama_brand = '$nama_brand'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION['pesan'] = "Data berhasil dihapus!";
        header("Location: brand.php");
        exit();
    } else {
        $_SESSION['pesan'] = "Data gagal dihapus!";
        header("Location: brand.php");
        exit();
    }
}
?>
