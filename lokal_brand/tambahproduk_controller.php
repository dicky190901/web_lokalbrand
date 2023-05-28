<?php
include 'koneksi.php';

if(isset($_POST['kirim'])) {
    $id_brand = $_POST["id_brand"];
    $nama_produk = $_POST["nama_produk"];
    $harga_produk = $_POST["harga_produk"];
    $stok_produk = $_POST["stok_produk"];
    $gambar = $_POST["gambar"];

    // Periksa apakah id_brand dan id_kategori ada dalam tabel brand dan kategori
    if(isset($_POST["id_kategori"])) {
        $id_kategori = $_POST["id_kategori"];
        $check_query = "SELECT id_brand FROM brand WHERE id_brand = '$id_brand'";
        $check_query_kategori = "SELECT id_kategori FROM kategori WHERE id_kategori = '$id_kategori'";
        $check_result = mysqli_query($conn, $check_query);
        $check_result_kategori = mysqli_query($conn, $check_query_kategori);

        if(mysqli_num_rows($check_result) > 0 && mysqli_num_rows($check_result_kategori) > 0) {
            // id_brand dan id_kategori valid, lakukan operasi INSERT
            $sql = "INSERT INTO produk (id_brand, id_kategori, nama_produk, harga_produk, stok_produk, gambar)
                    VALUES ('$id_brand', '$id_kategori', '$nama_produk', '$harga_produk', '$stok_produk', '$gambar')";

            if(mysqli_query($conn, $sql)) {
                echo "Data berhasil disimpan";
            } else {
                echo "Terjadi kesalahan: " . mysqli_error($conn);
            }
        } else {
            echo "Terjadi kesalahan: id_brand atau id_kategori tidak valid";
        }
    } else {
        echo "Terjadi kesalahan: id_kategori tidak ditemukan dalam data yang dikirimkan";
    }
}


?>
