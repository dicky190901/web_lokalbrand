<?php
include 'koneksi.php';
include 'editkategori_controller.php';
if(isset($_GET['nama_kategori'])) {
    $edit_data = mysqli_query($conn, "SELECT * FROM kategori WHERE nama_kategori = '".$_GET['nama_kategori']."'");
    $result = mysqli_fetch_assoc($edit_data);
} else {
    // berikan pesan kesalahan atau redirect ke halaman lain
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="data" style="width: 50%; margin: auto; margin-top: 100px;" >
        <form action="" method="POST">
            <div class="form-group">
                <label for="exampleInputPassword1">Jenis Produk</label>
                <input type="text" name="nama_kategori" class="form-control" value="<?php if(isset($result)) { echo $result['nama_kategori']; } ?>" required>
            </div>
            <button type="submit" value="submit" name="edit" class="btn btn-primary">Edit</button>
            <a href="kategori.php"><button type="button" class="btn btn-primary">Kembali</button></a>
        </form>
    </div>

    <script src="js/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
