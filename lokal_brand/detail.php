<?php
include('koneksi.php');

// Periksa apakah parameter id_produk ada di URL
if (isset($_GET['nama_produk'])) {
  $nama_produk = $_GET['nama_produk'];

  // Query untuk mengambil data produk berdasarkan nama_produk
  $query = mysqli_query($conn, "SELECT produk.*, brand.nama_brand, brand.deskripsi_brand FROM produk JOIN brand ON produk.id_brand = brand.id_brand WHERE produk.nama_produk = '$nama_produk'");
  $data = mysqli_fetch_assoc($query);

  // Periksa apakah produk dengan nama_produk yang diberikan ditemukan
  if ($data) {
?>

    <html lang="id_menu">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="detail.css" />
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <title>Detail Produk</title>
    </head>

    <body>
        <section>
            <center>
            <a href="home.php" class="btn">Home</a>
            </center>
        </section>

        <br><br><br><br><br><br><br>

        <section>
            <div class="container">
                <div class="product-image">
                   
                    <div class="w3-content" style="max-width:900px;">
  <img class="mySlides" src="img/<?php echo $data['gambar']; ?>" style="width:50%;display:none ">
  <img class="mySlides" src="img/<?php echo $data['gambar']; ?>" style="width:50%">
  <img class="mySlides" src="img/<?php echo $data['gambar']; ?>" style="width:50%;display:none">

  <div class="w3-row-padding w3-section">
    <div class="w3-col s4">
      <img class="demo w3-opacity w3-hover-opacity-off" src="img/<?php echo $data['gambar']; ?>" style="width:50%;cursor:pointer" onclick="currentDiv(1)">
    </div>
    <div class="w3-col s4">
      <img class="demo w3-opacity w3-hover-opacity-off" src="img/<?php echo $data['gambar']; ?>" style="width:50%;cursor:pointer" onclick="currentDiv(2)">
    </div>
    <div class="w3-col s4">
      <img class="demo w3-opacity w3-hover-opacity-off" src="img/<?php echo $data['gambar']; ?>" style="width:50%;cursor:pointer" onclick="currentDiv(3)">
    </div>
  </div>
</div>

                </div>
                <div class="product-details">
                    <h1><?php echo $data['nama_produk']; ?></h1>
                    <h3><?php echo $data['nama_brand']; ?></h3>
                    <p class="price">Rp <?php echo number_format($data['harga_produk'], 0, ".", "."); ?> <?php
                    if ($data['harga_produk'] < 100000) {
                        echo '<span class="discount">Discount</span>';
                    } elseif ($data['harga_produk'] > 200000) {
                        echo '<span class="new">New</span>';
                    }
                    ?></p>
                    <p style=" border: 1px solid #c1c1c1; width: 12%; padding: 5px; color: black;"> <?php echo $data['stok_produk']; ?></p>
                    <p><?php echo $data['deskripsi_brand']; ?></p>
                    <a href="#" class="btn">Beli Sekarang</a>
                </div>
            </div>
        </section>
    </body>

    </html>

<?php
  } else {
    echo "Produk tidak ditemukan.";
  }
} else {
  echo "Parameter nama_produk tidak ditemukan.";
}
?>
