<?php
session_start();
include('koneksi.php');
?>

<html lang="id_menu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css" />
    <title>Lokal Brand</title>
</head>

<body>
    <section>
        <?php
        if (isset($_SESSION['pesan'])) {
            echo '<div class="alert" role="alert">' . $_SESSION['pesan'] . '</div>';
            unset($_SESSION['pesan']);
        }
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
                <p><?php echo date("l, d M Y") ?></p>
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
                                stroke-width="24"
                                d="M104,216H48a8,8,0,0,1-8-8V48a8,8,0,0,1,8-8h56" />
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
                <section class="carousel" style="width: 70%;  margin-right: 40px; margin-top: -40px">
                    <div class="carousel-container" style="width:30%; margin: auto;">
                        <div class="carousel-item">
                            <img src="img/10004.jpg" alt="Carousel 1">
                            <h1 style="margin-top: -20px;">ERIGO</h1>
                            <p>Rp.179.000</p>
                        </div>
                        <div class="carousel-item">
                            <img src="img/10035.jpg" alt="Carousel 2">
                            <h1 style="margin-top: -20px;">ERIGO</h1>
                            <p>Rp.179.000</p>
                        </div>
                        <div class="carousel-item">
                            <img src="img/10037.jpg" alt="Carousel 3">
                            <h1 style="margin-top: -20px;">ERIGO</h1>
                            <p>Rp.179.000</p>
                        </div>
                    </div>
                </section>
                <div class="cards">
                    <?php
                    $query = mysqli_query($conn, 'SELECT produk.nama_produk, produk.harga_produk, produk.gambar, brand.nama_brand
                    FROM produk
                    JOIN brand ON produk.id_brand = brand.id_brand
                    JOIN kategori ON produk.id_kategori = kategori.id_kategori
                    WHERE kategori.nama_kategori = "Topi";');

                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <div class="card">
                            <img src='img/<?php echo $data['gambar'] ?>' style='width:100%; height:45%; object-fit: cover; object-position: 100% 20%'>
                            <div class="anu1">
                                <h2><b><?php echo $data['nama_produk'] ?></b></h2>
                                <br>
                                <h3><?php echo $data['nama_brand'] ?></h3>
                                <div class="anu">
                                    <div>
                                        <p>Harga</p>
                                        <p class="num">Rp <?php echo number_format((string)$data['harga_produk'], 0, ".", ".") ?></p>
                                        <a href="detail.php?nama_produk=<?php echo $data['nama_produk'] ?>" style="text-decoration: none; color: blue;">Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
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
        document.addEventListener("DOMContentLoaded", function() {
            const carouselItems = document.querySelectorAll(".carousel-item");
            let currentIndex = 0;

            function showItem(index) {
                carouselItems.forEach(function(item) {
                    item.classList.remove("active");
                });

                carouselItems[index].classList.add("active");
            }

            function nextSlide() {
                currentIndex++;
                if (currentIndex >= carouselItems.length) {
                    currentIndex = 0;
                }
                showItem(currentIndex);
            }

            // Ganti slide setiap 3 detik
            setInterval(nextSlide, 3000);
        });
    </script>
</body>

</html>
