<?php
include 'koneksi.php';

if(isset($_POST['kirim'])) {
    
    $nama_brand = $_POST["nama_brand"];
    $deskripsi_brand = $_POST["deskripsi_brand"];

    $sql = "INSERT INTO brand (nama_brand, deskripsi_brand) 
            VALUES ('$nama_brand', '$deskripsi_brand')";

if(mysqli_query($conn, $sql)) {
    echo "Data berhasil disimpan";
} else {
    echo "Terjadi kesalahan: " . mysqli_error($conn);
}        
    
  }


  
?>
