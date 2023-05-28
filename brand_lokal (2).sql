-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Bulan Mei 2023 pada 12.08
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brand_lokal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `brand`
--

CREATE TABLE `brand` (
  `id_brand` int(11) NOT NULL,
  `nama_brand` varchar(255) DEFAULT NULL,
  `deskripsi_brand` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `brand`
--

INSERT INTO `brand` (`id_brand`, `nama_brand`, `deskripsi_brand`) VALUES
(1, 'AeroStreet', ' Now Everyone Can Buy Good Shoes'),
(2, 'Erigo', 'Everywhere You Go. Renew your clothes right now with our cool and stylish collections.'),
(3, 'Compass', 'Komitmen & konsistensi yang kuat adalah peran utama dalam Compass dapat bangkit dari keterpurukan dan menjadi lebih maju di masa sekarang.'),
(5, 'Palomino', 'Tas Terbaik Lokal di Indonesia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Baju'),
(2, 'Celana'),
(3, 'Topi'),
(4, 'Sepatu'),
(5, 'Tas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_brand` int(11) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `nama_produk` varchar(255) DEFAULT NULL,
  `harga_produk` decimal(10,2) DEFAULT NULL,
  `stok_produk` enum('Tersedia','Kosong') DEFAULT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_brand`, `id_kategori`, `nama_produk`, `harga_produk`, `stok_produk`, `gambar`) VALUES
(1, 3, 4, 'Compass Gazelle Hi Black White', 438000.00, 'Tersedia', 'compas2.png'),
(2, 1, 1, 'T Shirt Miko Hitam Kaos T-Shirt Tshirt AACAA', 59900.00, 'Tersedia', 'aero1.jpg'),
(3, 2, 1, 'Kaos Unisex Erigo Basic Olive White', 69000.00, 'Tersedia', 'erigo1.jpg'),
(4, 3, 4, 'Gazelle Low Cream', 408000.00, 'Tersedia', 'compas1.jpg'),
(5, 5, 5, 'Palomino Amora Handbag - Ivory', 396750.00, 'Kosong', 'palomino1.jpg'),
(6, 1, 1, 'T Shirt Long Sleeve Live Fast Hijau Army OAAAA ', 79900.00, 'Tersedia', 'aero2.jpg'),
(7, 2, 1, 'Outerwear Corduroy Collar Lien Dark Blue', 264000.00, 'Tersedia', 'erigo2.jpg'),
(8, 5, 5, 'Palomino Nessa Handbag', 374250.00, 'Tersedia', 'palomino2.jpg'),
(9, 2, 3, ' Summer Cap Corvin Sage Green', 163000.00, 'Tersedia', 'erigo3.jpg'),
(11, 2, 2, ' Erigo Chino Short Noirobi Katun Grey ', 123000.00, 'Tersedia', 'erigo4.jpg'),
(12, 1, 2, 'Chinos Panjang Elvano Hitam ', 159900.00, 'Tersedia', 'aero3.jpg'),
(14, 1, 2, 'Chinos Panjang Elvano Krem', 159900.00, 'Tersedia', 'aero4.jpg'),
(15, 2, 2, 'Sweatpants Norris Capri Blue', 129000.00, 'Tersedia', 'erigo5.jpg'),
(16, 1, 4, 'Hoops Low Hitam Putih - Sepatu Sneakers Casual', 149000.00, 'Tersedia', 'aero5.jpg'),
(17, 1, 4, 'Comfy Hitam Gum Denim Slip On Pria Wanita', 119900.00, 'Kosong', 'aero6.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id_brand`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `produk_ibfk_1` (`id_brand`),
  ADD KEY `kategori_ibfk_1` (`id_kategori`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `brand`
--
ALTER TABLE `brand`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `kategori_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_brand`) REFERENCES `brand` (`id_brand`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
