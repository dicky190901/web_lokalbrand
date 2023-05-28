<?php
include 'koneksi.php';

if(isset($_POST['kirim'])) {
    
    $nama_kategori= $_POST["nama_kategori"];
    $sql = "INSERT INTO kategori (nama_kategori) 
            VALUES ('$nama_kategori')";

if(mysqli_query($conn, $sql)) {
    echo "Data berhasil disimpan";
} else {
    echo "Terjadi kesalahan: " . mysqli_error($conn);
}        
    
  }


  
?>
