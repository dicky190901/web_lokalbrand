<?php
   if(isset($_POST['edit'])){
    $update = mysqli_query($conn, "UPDATE produk SET 
    id_kategori = '".$_POST['id_kategori']."',
    id_brand = '".$_POST['id_brand']."',
    nama_produk = '".$_POST['nama_produk']."',
    harga_produk = '".$_POST['harga_produk']."',
    stok_produk = '".$_POST['stok_produk']."',
    gambar = '".$_POST['gambar']."'
    WHERE nama_produk = '".$_GET['nama_produk']."'");
    
    if($update){
        echo 'Data berhasil di edit!';
    } else {
        echo 'Data gagal di edit!';
    }
}

    ?>