<?php
   if(isset($_POST['edit'])){
    $update = mysqli_query($conn, "UPDATE brand SET 
    nama_brand = '".$_POST['nama_brand']."',
    deskripsi_brand = '".$_POST['deskripsi_brand']."'
    WHERE nama_brand = '".$_GET['nama_brand']."'");
    
    if($update){
        echo 'Data berhasil di edit!';
    } else {
        echo 'Data gagal di edit!';
    }
}

    ?>