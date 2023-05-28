<?php
include 'koneksi.php';
include 'editproduk_controller.php';
if(isset($_GET['nama_produk'])) {
    $edit_data = mysqli_query($conn, "SELECT * FROM produk WHERE nama_produk = '".$_GET['nama_produk']."'");
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
                <label for="exampleInputPassword1">Nama Produk</label>
                <input type="text" name="nama_produk" class="form-control" value="<?php if(isset($result)) { echo $result['nama_produk']; } ?>" required>
            </div>
            <div class="form-group">
    <label for="id_brand">Brand Produk:</label>
    <select id="id_brand" name="id_brand" required>
        <?php
        // Query untuk mengambil data brand dari tabel brand
        $query = "SELECT id_brand, nama_brand FROM brand";
        $result_brand = mysqli_query($conn, $query);
    
        // Periksa apakah query berhasil dieksekusi
        if ($result_brand && mysqli_num_rows($result_brand) > 0) {
            // Looping untuk menampilkan setiap brand dalam dropdown
            while ($row = mysqli_fetch_assoc($result_brand)) {
                $id_brand = $row['id_brand'];
                $nama_brand = $row['nama_brand'];
            
                // Tampilkan setiap brand sebagai pilihan dalam dropdown
                echo "<option value=\"$id_brand\"";
                if(isset($result) && $id_brand == $result['id_brand']) {
                    echo " selected";
                }
                echo ">$nama_brand</option>";
            }
        } else {
            echo "<option value=''>Tidak ada brand tersedia</option>";
        }
        ?>
    </select>
</div>

<div class="form-group">
    <label for="id_kategori">Jenis Produk:</label>
    <select id="id_kategori" name="id_kategori" required>
        <?php
        // Query untuk mengambil data kategori dari tabel kategori
        $query = "SELECT id_kategori, nama_kategori FROM kategori";
        $result_kategori = mysqli_query($conn, $query);
    
        // Periksa apakah query berhasil dieksekusi
        if ($result_kategori && mysqli_num_rows($result_kategori) > 0) {
            // Looping untuk menampilkan setiap kategori dalam dropdown
            while ($row = mysqli_fetch_assoc($result_kategori)) {
                $id_kategori = $row['id_kategori'];
                $nama_kategori = $row['nama_kategori'];
            
                // Tampilkan setiap kategori sebagai pilihan dalam dropdown
                echo "<option value=\"$id_kategori\"";
                if(isset($result) && $id_kategori == $result['id_kategori']) {
                    echo " selected";
                }
                echo ">$nama_kategori</option>";
            }
        } else {
            echo "<option value=''>Tidak ada kategori tersedia</option>";
        }
        ?>
    </select>
</div>

            <div class="form-group">
                <label for="exampleInputPassword1">Harga Produk</label>
                <input type="text" name="harga_produk" class="form-control" value="<?php if(isset($result)) { echo $result['harga_produk']; } ?>" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Stok Produk</label>
                <select id="stok_produk" name="stok_produk" required>
  <option value="tersedia" <?php if(isset($result) && $result['stok_produk'] == 'tersedia') { echo 'selected'; } ?>>Tersedia</option>
  <option value="kosong" <?php if(isset($result) && $result['stok_produk'] == 'kosong') { echo 'selected'; } ?>>Kosong</option>
</select><br><br>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Gambar</label>
                <input type="file" name="gambar" class="form-control" value="<?php if(isset($result)) { echo $result['gambar']; } ?>" required>
            </div>
            <button type="submit" value="submit" name="edit" class="btn btn-primary">Edit</button>
            <a href="produk.php"><button type="button" class="btn btn-primary">Kembali</button></a>
        </form>
    </div>

    <script src="js/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
