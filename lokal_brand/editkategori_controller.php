<?php
   if(isset($_POST['edit'])){
    $update = mysqli_query($conn, "UPDATE kategori SET 
    nama_kategori = '".$_POST['nama_kategori']."'
    WHERE nama_kategori = '".$_GET['nama_kategori']."'");
    
    if($update){
        echo 'Data berhasil di edit!';
    } else {
        echo 'Data gagal di edit!';
    }
}

    ?>