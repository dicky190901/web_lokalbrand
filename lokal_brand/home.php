<?php 
include ('koneksi.php');
?>

<html lang="id_menu">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="home.css" />


  <title>Lokal Brand</title>
  <style>
    .mySlides {
      margin-left: -500px;
    }
    .new {
      top: 10px;
      right: 10px;
      background-color: #ff5050;
      color: white;
      font-size: 17px;
      padding: 4px 8px;
      border-radius: 4px;
    }

    .discount {
      top: 10px;
      right: 10px;
      background-color: #009933;
      color: white;
      font-size: 17px;
      padding: 4px 8px;
      border-radius: 4px;
    }

    
  </style>
</head>

<body>
  <section>
    <?php 
    
    ?>
  </section>

  <section>

    <div class="header">
      <div class="left">
        <h3 id="1"><a href="home.php" style="color: black; text-decoration: none;">LOKAL BRAND</a></h3>
        <h1><a href="about.php" style="text-decoration: none; font-size: 26px; color: grey;">About Store</a></h1>
      </div>
      <div class="mid">
        <div class="search-container">
          <input type="text" placeholder="Cari...">
          <button type="submit">Cari</button>
        </div>

      </div>
      <div class="right">
        <p>
          <?php date_default_timezone_set("Asia/Jakarta"); 
          echo date("l, d M Y")  ?>
        </p>
        <div>
          <a class="cancel" href="brand.php">
            Admin
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" class="logout">
              <rect width="256" height="256" fill="none" />
              <polyline fill="#none" stroke="#ec4646" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="24" points="174.011 86 216 128 174.011 170" />
              <line x1="104" x2="215.971" y1="128" y2="128" fill="none" stroke="#ec4646"
                stroke-linecap="round" stroke-linejoin="round" stroke-width="24" />
              <path fill="none" stroke="#ec4646" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="24" d="M104,216H48a8,8,0,0,1-8-8V48a8,8,0,0,1,8-8h56" />
            </svg>
          </a>
        </div>
      </div>
    </div>
  </section>

  <section style="margin: 0px 40px;">
    <div class="navbar">
      <a href="pakaian.php">Pakaian</a>
      <a href="celana.php">Celana</a>
      <a href="sepatu.php">Sepatu</a>
      <a href="topi.php">Topi</a>
      <a href="tas.php">Tas</a>
    </div>
    <div class="containerBig">
      <div class="container">
      <div class="w3-content w3-section" style="max-width:200px">
  <img class="mySlides" src="img/10035.jpg" style="width:100%">
  <img class="mySlides" src="img/10018.jpg" style="width:100%">
  <img class="mySlides" src="img/10043.jpg" style="width:100%">
</div>
        <div class="cards">
          <?php
          $query = mysqli_query($conn, 'SELECT produk.nama_produk, produk.harga_produk, produk.gambar, brand.nama_brand
        FROM produk
        JOIN brand ON produk.id_brand = brand.id_brand;');
          while ($data = mysqli_fetch_array($query)) {
            // Menghapus percabangan yang menggunakan $data['id_produk']
          ?>
            <div class="card">
            <?php
                    if ($data['harga_produk'] > 200000) {
                      echo '<span class="new">New</span>';
                    } elseif ($data['harga_produk'] < 100000) {
                      echo '<span class="discount">Discount</span>';
                    }
                    ?>
              <?php echo "<img src='img/" . $data['gambar'] . "' style='width:100%; height:45%; object-fit: cover; object-position: 100% 20%'>" ?>
              <div class="anu1">
                <h2><b> <?php echo $data['nama_produk'] ?> </b></h2>
                <br>
                <h3> <?php echo $data['nama_brand'] ?> </h3>
                <div class="anu">
                  <div>
                    <p>Harga</p>
                    <p class="num">Rp <?php echo number_format((string) $data['harga_produk'], 0, ".", ".") ?></p>
                    <a href="detail.php?nama_produk=<?php echo $data['nama_produk'] ?>" style="text-decoration: none; color: blue;">Detail</a>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>



      </div>
  </section>
  
  <footer>
    <div class="footer-container">
    
    </div>
    <div class="footer-bottom">
      <p>Hak Cipta &copy; <?php echo date('Y'); ?> Lokal Brand</p>
    </div>
  </footer>
  <script src="script.js"></script>
  <script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script></body>

</html>
