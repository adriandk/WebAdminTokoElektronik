-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 30, 2025 at 12:07 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bnsp`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `produk` text DEFAULT NULL,
  `harga` decimal(20,2) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `kategori`, `produk`, `harga`, `thumbnail`, `created_at`, `updated_at`) VALUES
(5, 'Elektronik', 'Samsung A17', '100000.00', NULL, '2025-10-29 21:51:01', '2025-10-30 01:20:36'),
(6, 'Makanan', 'Makanan Bayi', '10000.00', NULL, '2025-10-29 23:55:51', '2025-10-29 23:55:51'),
(7, 'Kesehatan', 'Obat batuk', '5000.00', NULL, '2025-10-29 23:56:16', '2025-10-29 23:56:16'),
(8, 'Elektronik', 'Iphone 12', '5000000.00', NULL, '2025-10-29 23:56:36', '2025-10-29 23:56:36'),
(9, 'Kendaraan', 'Mobil F1', '100000.00', NULL, '2025-10-29 23:57:16', '2025-10-29 23:57:16'),
(10, 'Elektronik', 'Kulkas', '345678.00', NULL, '2025-10-29 23:57:36', '2025-10-29 23:57:36'),
(12, 'Elektronik', 'Oven', '987654.00', NULL, '2025-10-30 01:20:51', '2025-10-30 01:20:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
