<?php 
session_start();
include ('koneksi.php');

// Cek apakah ada pesan hasil pencarian
if (isset($_SESSION['pesan'])) {
    echo '<div class="alert" role="alert">' . $_SESSION['pesan'] . '</div>';
    unset($_SESSION['pesan']);
}

// Query awal untuk menampilkan semua produk
$query = "SELECT produk.nama_produk, produk.harga_produk, produk.gambar, brand.nama_brand
FROM produk
JOIN brand ON produk.id_brand = brand.id_brand";

// Cek apakah ada input pencarian
if (isset($_GET['search'])) {
    $search = $_GET['search'];

    // Tambahkan kondisi pencarian ke query
    $query .= " WHERE produk.nama_produk LIKE '%$search%'
    OR brand.nama_brand LIKE '%$search%'";
}

$result = mysqli_query($conn, $query);
?>

<!-- Kode HTML lainnya -->

<div class="cards">
    <?php
    // Mengecek apakah ada hasil pencarian
    if (mysqli_num_rows($result) > 0) {
        while ($data = mysqli_fetch_array($result)) {
            // Menampilkan data produk
            // ...
        }
    } else {
        echo "<p>Tidak ditemukan hasil pencarian</p>";
    }
    ?>
</div>


<!-- Kode HTML lainnya -->
