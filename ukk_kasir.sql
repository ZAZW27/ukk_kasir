-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2024 at 02:18 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukk_kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `CouponID` int(11) NOT NULL,
  `NamaCoupon` varchar(255) NOT NULL,
  `mulai_dari` date NOT NULL,
  `berakhir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deleteprodukrequest`
--

CREATE TABLE `deleteprodukrequest` (
  `DPRID` int(11) NOT NULL,
  `ProdukID` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `accepted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deleteprodukrequest`
--

INSERT INTO `deleteprodukrequest` (`DPRID`, `ProdukID`, `created_at`, `accepted`) VALUES
(1, 2, '2024-01-29 14:13:23', 1),
(2, 9, '2024-01-29 14:12:48', 0);

-- --------------------------------------------------------

--
-- Table structure for table `detailpenjualan`
--

CREATE TABLE `detailpenjualan` (
  `DetailID` int(11) NOT NULL,
  `PenjualanID` int(11) NOT NULL,
  `ProdukID` int(11) NOT NULL,
  `JumlahProduk` int(11) NOT NULL,
  `SubTotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detailpenjualan`
--

INSERT INTO `detailpenjualan` (`DetailID`, `PenjualanID`, `ProdukID`, `JumlahProduk`, `SubTotal`) VALUES
(9, 9, 4, 6, 306000.00),
(10, 9, 7, 3, 126000.00),
(11, 9, 10, 6, 12000.00),
(12, 10, 1, 10, 240000.00),
(13, 11, 3, 1, 26000.00),
(14, 11, 7, 1, 42000.00),
(15, 13, 3, 1, 26000.00),
(16, 14, 9, 1, 6000.00),
(17, 15, 5, 4, 28000.00),
(18, 16, 4, 1, 51000.00),
(19, 16, 8, 1, 25000.00),
(20, 16, 7, 1, 42000.00),
(21, 16, 3, 1, 26000.00),
(22, 16, 2, 1, 9000.00),
(23, 17, 3, 4, 104000.00),
(24, 18, 4, 2, 102000.00),
(25, 18, 6, 1, 22000.00),
(26, 18, 7, 1, 42000.00),
(27, 18, 8, 1, 25000.00),
(28, 19, 3, 5, 130000.00),
(29, 19, 4, 5, 255000.00),
(30, 20, 2, 5, 45000.00),
(31, 20, 3, 1, 26000.00),
(32, 21, 6, 1, 22000.00),
(33, 22, 6, 10, 220000.00),
(34, 22, 13, 1, 7000.00);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `PelangganID` int(11) NOT NULL,
  `NamaPelanggan` varchar(255) NOT NULL,
  `Alamat` text NOT NULL,
  `NomorTelepon` varchar(15) NOT NULL,
  `status` enum('biasa','member','vip','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`PelangganID`, `NamaPelanggan`, `Alamat`, `NomorTelepon`, `status`) VALUES
(7, 'Satria ', 'muliawan', '1209381201', 'biasa'),
(9, 'Zhar', '1', '1987397931', 'biasa'),
(12, 'Zharif Aziz Zulkarnain Widodo', 'WOW', '0895704176762', 'biasa'),
(13, 'Hadriawan', 'hadri', '081273813', 'biasa'),
(14, '', '', '', 'biasa');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `PenjualanID` int(11) NOT NULL,
  `TanggalPenjualan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `TotalHarga` decimal(10,2) NOT NULL,
  `PelangganID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`PenjualanID`, `TanggalPenjualan`, `TotalHarga`, `PelangganID`) VALUES
(9, '2024-01-23 15:04:57', 444000.00, 7),
(10, '2024-01-23 15:09:15', 240000.00, 8),
(11, '2024-01-23 15:09:42', 68000.00, 9),
(12, '2024-01-23 15:14:36', 0.00, 11),
(13, '2024-01-23 15:15:41', 26000.00, 7),
(14, '2024-01-23 15:16:40', 6000.00, 9),
(15, '2024-01-23 15:17:48', 28000.00, 9),
(16, '2024-01-23 23:53:18', 153000.00, 12),
(17, '2024-01-23 23:53:46', 104000.00, 12),
(18, '2024-01-24 00:19:23', 191000.00, 12),
(19, '2024-01-25 11:47:38', 385000.00, 12),
(20, '2024-01-25 11:49:55', 71000.00, 13),
(21, '2024-01-27 06:49:33', 22000.00, 14),
(22, '2024-01-28 01:40:07', 227000.00, 12);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `ProdukID` int(11) NOT NULL,
  `NamaProduk` varchar(255) NOT NULL,
  `Harga` decimal(30,2) NOT NULL,
  `Stok` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `JenisProduk` enum('minuman','makanan','sabun','saus','pengharum','pokok','other','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`ProdukID`, `NamaProduk`, `Harga`, `Stok`, `image`, `JenisProduk`) VALUES
(1, 'batre alkalin', 1000.00, 100, 'alkaline.png', 'other'),
(2, 'Beras lele', 9000.00, 95, 'beras.png', 'pokok'),
(3, 'Counter pain', 26000.00, 94, 'counterPaint.png', 'other'),
(4, 'sosis fiesta', 51000.00, 95, 'fiestaSausage.jpeg', 'makanan'),
(5, 'Fresh tea', 7000.00, 100, 'freshTea.png', 'minuman'),
(6, 'kecap sedap', 22000.00, 89, 'kecapSedap.png', 'saus'),
(7, 'kenzler', 42000.00, 100, 'kenzler.png', 'makanan'),
(8, 'Marjan', 25000.00, 100, 'marjan.png', 'pokok'),
(9, 'Ultramilk', 6000.00, 400, 'ultramilk.png', 'minuman'),
(10, 'Milkita', 2000.00, 100, 'milkitaHijau.png', 'makanan'),
(13, 'Citato', 7000.00, 99, 'citato.png', 'makanan'),
(14, 'bygone', 11000.00, 100, 'bygone.png', 'other'),
(15, 'Honda CRV', 200000000.00, 5, 'honda crc.png', 'other'),
(16, 'Frozen fish', 30000.00, 100, 'ikan.jpg', 'makanan'),
(17, 'Kentang Perancis', 20000.00, 100, 'kenatngperancis.jpg', 'makanan'),
(18, 'Siomay', 32000.00, 0, 'siomay.jpeg', 'makanan'),
(19, 'Pepperoni', 40000.00, 100, 'pepperoni.png', 'makanan'),
(20, 'Kepiting', 100000.00, 20, 'kepiting.png', 'makanan'),
(21, 'Le mineral', 6000.00, 0, 'lemineral.png', 'minuman'),
(22, 'American Airlines Flight 11', 8000000000000.00, 1, 'American Airlines Flight 11.png', 'other'),
(23, 'United Airlines Flight 175', 99999999999999999.00, 1, 'United Airlines Flight 175.png', 'other'),
(24, 'helicopter', 70000000.00, 2, 'helicopter.png', 'other'),
(25, 'yacht', 600000000.00, 4, 'yacht.png', 'other');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `NamaUser` varchar(255) NOT NULL,
  `Level` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `Nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `NamaUser`, `Level`, `password`, `status`, `Nama`) VALUES
(1, 'arya', 'kasir', 'c4ca4238a0b923820dcc509a6f75849b', 1, 'Arya Satria Muliawan'),
(2, 'yusuf', 'petugas', 'dd2eb170076a5dec97cdbbbbff9a4405', 1, 'Muhammad Yusuf Pratama'),
(3, 'zhar', 'administrator', 'c962fc507f0f1a8089b0e00efeef5e18', 1, 'Zharif Aziz Zulkarnain Widodo'),
(4, 'hadri', 'raja', '1', 0, 'Hadriawan Kurniawantussalman al-alim pertama pratama primary'),
(7, 'Deril', 'administrator', '4bca24304861acde5770fdbe3cc2503b', 1, 'Dheril Seven Justian');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`CouponID`);

--
-- Indexes for table `deleteprodukrequest`
--
ALTER TABLE `deleteprodukrequest`
  ADD PRIMARY KEY (`DPRID`);

--
-- Indexes for table `detailpenjualan`
--
ALTER TABLE `detailpenjualan`
  ADD PRIMARY KEY (`DetailID`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`PelangganID`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`PenjualanID`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`ProdukID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `CouponID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deleteprodukrequest`
--
ALTER TABLE `deleteprodukrequest`
  MODIFY `DPRID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `detailpenjualan`
--
ALTER TABLE `detailpenjualan`
  MODIFY `DetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `PelangganID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `PenjualanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `ProdukID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
