-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2026 at 04:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warmindo25`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('admin','kitchen','owner') NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '123456', 'admin'),
(2, 'kitchen', '123456', 'kitchen'),
(3, 'owner', '123456', 'owner');

-- --------------------------------------------------------

--
-- Table structure for table `kitchen_staff`
--

CREATE TABLE `kitchen_staff` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `status` enum('Aktif','Nonaktif') DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kitchen_staff`
--

INSERT INTO `kitchen_staff` (`id`, `nama`, `username`, `password`, `status`) VALUES
(1, 'Andi', 'andi', '123456', 'Aktif'),
(2, 'Budi', 'budi', '123456', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `badge` varchar(30) DEFAULT NULL,
  `status` enum('Tersedia','Habis') DEFAULT 'Tersedia',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama_menu`, `kategori`, `deskripsi`, `harga`, `gambar`, `badge`, `status`, `created_at`) VALUES
(1, 'Indomie Goreng Original', 'Mie Goreng', NULL, 15000, 'indomie-original.jpg', NULL, '', '2026-06-26 03:02:11'),
(2, 'Indomie Rendang Special', 'Mie Goreng', NULL, 18000, 'rendang.jpg', NULL, '', '2026-06-26 03:02:11'),
(3, 'Indomie Soto Lamongan', 'Mie Kuah', NULL, 16000, 'soto.jpg', NULL, '', '2026-06-26 03:02:11'),
(4, 'Es Teh Jumbo', 'Minuman', NULL, 5000, 'esteh.jpg', NULL, '', '2026-06-26 03:02:11'),
(5, 'Indomie Goreng Original', 'indomie', 'Indomie goreng original dengan telur', 15000, 'indomie-original.jpg', 'Populer', 'Tersedia', '2026-06-26 07:28:27'),
(6, 'Indomie Goreng Rendang', 'indomie', 'Indomie goreng rasa rendang', 18000, 'indomie-rendang.jpg', 'Favorit', 'Tersedia', '2026-06-26 07:28:27'),
(7, 'Indomie Goreng Aceh', 'indomie', 'Indomie goreng pedas khas Aceh', 18000, 'indomie-aceh.jpg', NULL, 'Tersedia', '2026-06-26 07:28:27'),
(8, 'Indomie Soto Lamongan', 'indomie', 'Indomie kuah soto lamongan', 16000, 'indomie-soto.jpg', NULL, 'Tersedia', '2026-06-26 07:28:27'),
(9, 'Indomie Kari Ayam', 'indomie', 'Indomie kuah kari ayam', 16000, 'indomie-kari.jpg', NULL, 'Tersedia', '2026-06-26 07:28:27'),
(10, 'Indomie Ayam Bawang', 'indomie', 'Indomie kuah ayam bawang', 15000, 'indomie-ayambawang.jpg', NULL, 'Tersedia', '2026-06-26 07:28:27'),
(11, 'Indomie Seblak', 'indomie', 'Indomie dengan bumbu seblak pedas', 19000, 'indomie-seblak.jpg', 'Best Seller', 'Tersedia', '2026-06-26 07:28:27'),
(12, 'Indomie Carbonara', 'indomie', 'Indomie creamy carbonara', 22000, 'indomie-carbonara.jpg', 'Premium', 'Tersedia', '2026-06-26 07:28:27'),
(13, 'Indomie Geprek', 'indomie', 'Indomie dengan ayam geprek', 25000, 'indomie-geprek.jpg', 'Populer', 'Tersedia', '2026-06-26 07:28:27'),
(14, 'Indomie Double', 'indomie', 'Dua bungkus indomie + telur', 25000, 'indomie-double.jpg', 'Jumbo', 'Tersedia', '2026-06-26 07:28:27'),
(15, 'Es Teh Jumbo', 'minuman', 'Es teh manis jumbo', 5000, 'esteh.jpg', NULL, 'Tersedia', '2026-06-26 07:28:34'),
(16, 'Teh Hangat', 'minuman', 'Teh hangat manis', 4000, 'teh-hangat.jpg', NULL, 'Tersedia', '2026-06-26 07:28:34'),
(17, 'Es Jeruk', 'minuman', 'Jeruk segar dingin', 7000, 'esjeruk.jpg', 'Segar', 'Tersedia', '2026-06-26 07:28:34'),
(18, 'Jeruk Hangat', 'minuman', 'Jeruk hangat', 6000, 'jerukhangat.jpg', NULL, 'Tersedia', '2026-06-26 07:28:34'),
(19, 'Es Milo', 'minuman', 'Milo dingin', 10000, 'esmilo.jpg', 'Favorit', 'Tersedia', '2026-06-26 07:28:34'),
(20, 'Milo Hangat', 'minuman', 'Milo hangat', 10000, 'milohangat.jpg', NULL, 'Tersedia', '2026-06-26 07:28:34'),
(21, 'Es Coklat', 'minuman', 'Minuman coklat dingin', 12000, 'escoklat.jpg', NULL, 'Tersedia', '2026-06-26 07:28:34'),
(22, 'Es Kopi Susu', 'minuman', 'Kopi susu gula aren', 15000, 'eskopisusu.jpg', 'Best Seller', 'Tersedia', '2026-06-26 07:28:34'),
(23, 'Air Mineral', 'minuman', 'Air mineral botol', 5000, 'airmineral.jpg', NULL, 'Tersedia', '2026-06-26 07:28:34'),
(24, 'Lemon Tea', 'minuman', 'Lemon tea segar', 10000, 'lemontea.jpg', NULL, 'Tersedia', '2026-06-26 07:28:34'),
(25, 'Kentang Goreng', 'snack', 'Kentang goreng crispy', 12000, 'kentang.jpg', 'Populer', 'Tersedia', '2026-06-26 07:28:38'),
(26, 'Sosis Bakar', 'snack', 'Sosis bakar saus BBQ', 12000, 'sosis.jpg', NULL, 'Tersedia', '2026-06-26 07:28:38'),
(27, 'Nugget Ayam', 'snack', 'Nugget ayam crispy', 15000, 'nugget.jpg', NULL, 'Tersedia', '2026-06-26 07:28:38'),
(28, 'Cireng Isi', 'snack', 'Cireng isi ayam', 12000, 'cireng.jpg', NULL, 'Tersedia', '2026-06-26 07:28:38'),
(29, 'Siomay Goreng', 'snack', 'Siomay goreng renyah', 10000, 'siomay.jpg', NULL, 'Tersedia', '2026-06-26 07:28:38'),
(30, 'Bakso Goreng', 'snack', 'Bakso goreng crispy', 12000, 'baksogoreng.jpg', NULL, 'Tersedia', '2026-06-26 07:28:38'),
(31, 'Tempura', 'snack', 'Tempura goreng', 15000, 'tempura.jpg', NULL, 'Tersedia', '2026-06-26 07:28:38'),
(32, 'Dimsum Ayam', 'snack', 'Dimsum ayam isi 4', 18000, 'dimsum.jpg', 'Favorit', 'Tersedia', '2026-06-26 07:28:38'),
(33, 'Otak-Otak Bakar', 'snack', 'Otak-otak ikan bakar', 15000, 'otakotak.jpg', NULL, 'Tersedia', '2026-06-26 07:28:38'),
(34, 'Chicken Popcorn', 'snack', 'Chicken popcorn crispy', 18000, 'popcornchicken.jpg', 'Best Seller', 'Tersedia', '2026-06-26 07:28:38'),
(35, 'Telur', 'topping', 'Tambah telur', 5000, 'telur.jpg', NULL, 'Tersedia', '2026-06-26 07:28:43'),
(36, 'Keju', 'topping', 'Tambah keju', 5000, 'keju.jpg', NULL, 'Tersedia', '2026-06-26 07:28:43'),
(37, 'Sosis', 'topping', 'Tambah sosis', 6000, 'sosis-top.jpg', NULL, 'Tersedia', '2026-06-26 07:28:43'),
(38, 'Kornet', 'topping', 'Tambah kornet sapi', 7000, 'kornet.jpg', NULL, 'Tersedia', '2026-06-26 07:28:43'),
(39, 'Bakso', 'topping', 'Tambah bakso', 6000, 'bakso.jpg', NULL, 'Tersedia', '2026-06-26 07:28:43');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `stock` int(11) DEFAULT 100,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `name`, `description`, `category`, `price`, `image`, `stock`, `created_at`) VALUES
(1, 'Indomie Goreng Original', 'Classic with Egg & Shallots', 'Mie Goreng', 15000, 'assets/images/indomie-original.jpg', 100, '2026-06-25 15:16:14'),
(2, 'Indomie Rendang Special', 'Rich Spices & Beef Bits', 'Mie Goreng', 18000, 'assets/images/indomie-rendang.jpg', 100, '2026-06-25 15:16:14'),
(3, 'Indomie Soto Lamongan', 'Classic Lime & Koya', 'Mie Kuah', 16000, 'assets/images/indomie-soto.jpg', 100, '2026-06-25 15:16:14'),
(4, 'Es Teh Jumbo', 'Refreshing Sweet Tea', 'Minuman', 5000, 'assets/images/es-teh.jpg', 100, '2026-06-25 15:16:14');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `table_id` int(11) DEFAULT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `total` int(11) DEFAULT 0,
  `status` enum('Menunggu Pembayaran','Pending','Diproses','Disajikan','Selesai') DEFAULT 'Menunggu Pembayaran',
  `payment_method` varchar(50) DEFAULT NULL,
  `order_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `cooking_start` datetime DEFAULT NULL,
  `cooking_finish` datetime DEFAULT NULL,
  `actual_minutes` int(11) DEFAULT NULL,
  `eta_minutes` int(11) DEFAULT 10,
  `eta_result` enum('Tepat Waktu','Lebih Cepat','Terlambat') DEFAULT NULL,
  `payment_status` enum('Belum Dibayar','Sudah Dibayar') NOT NULL DEFAULT 'Belum Dibayar',
  `kitchen_id` int(11) DEFAULT NULL,
  `owner_note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `table_id`, `customer_name`, `total`, `status`, `payment_method`, `order_time`, `cooking_start`, `cooking_finish`, `actual_minutes`, `eta_minutes`, `eta_result`, `payment_status`, `kitchen_id`, `owner_note`) VALUES
(1, 1, 'Guest', 18500, 'Selesai', 'qris', '2026-06-26 13:42:39', NULL, NULL, NULL, 10, NULL, 'Belum Dibayar', NULL, NULL),
(4, 1, 'Guest', 35000, 'Selesai', 'qris', '2026-06-26 15:24:35', NULL, NULL, NULL, 10, NULL, 'Belum Dibayar', NULL, NULL),
(5, 1, 'Guest', 7500, 'Selesai', 'bank', '2026-06-26 16:06:08', NULL, NULL, NULL, 10, NULL, 'Belum Dibayar', NULL, NULL),
(6, 1, 'Guest', 29500, 'Selesai', 'cash', '2026-06-26 16:06:50', NULL, NULL, NULL, 10, NULL, 'Belum Dibayar', NULL, NULL),
(7, 1, 'Guest', 19600, 'Selesai', 'bank', '2026-06-26 16:07:38', NULL, NULL, NULL, 10, NULL, 'Belum Dibayar', NULL, NULL),
(8, 1, 'Guest', 29500, 'Selesai', 'bank', '2026-06-26 16:08:22', NULL, NULL, NULL, 10, NULL, 'Belum Dibayar', NULL, NULL),
(9, 1, 'Guest', 29500, 'Selesai', 'qris', '2026-06-26 16:08:45', NULL, NULL, NULL, 10, NULL, 'Belum Dibayar', NULL, NULL),
(10, 1, 'Guest', 29500, 'Selesai', 'qris', '2026-06-26 16:08:52', NULL, NULL, NULL, 10, NULL, 'Belum Dibayar', NULL, NULL),
(11, 1, 'Guest', 29500, 'Selesai', 'qris', '2026-06-26 16:08:59', NULL, NULL, NULL, 10, NULL, 'Belum Dibayar', NULL, NULL),
(12, 1, 'Guest', 7500, 'Selesai', 'bank', '2026-06-26 16:09:14', NULL, NULL, NULL, 10, NULL, 'Belum Dibayar', NULL, NULL),
(13, 1, 'Guest', 26200, 'Selesai', 'qris', '2026-06-27 00:58:37', NULL, NULL, NULL, 10, NULL, 'Belum Dibayar', NULL, NULL),
(14, 1, 'Guest', 35000, 'Selesai', 'qris', '2026-06-27 04:34:30', NULL, NULL, NULL, 10, NULL, 'Belum Dibayar', NULL, NULL),
(15, 7, 'Guest', 18500, 'Selesai', 'qris', '2026-07-07 15:44:50', NULL, NULL, NULL, 10, NULL, 'Belum Dibayar', NULL, NULL),
(16, 7, 'Guest', 35000, 'Selesai', 'bank', '2026-07-07 16:11:21', NULL, NULL, NULL, 10, NULL, 'Belum Dibayar', NULL, NULL),
(17, 3, 'Guest', 107600, 'Selesai', 'qris', '2026-07-15 05:13:20', NULL, NULL, NULL, 10, NULL, 'Belum Dibayar', NULL, NULL),
(18, 5, 'Guest', 18500, 'Selesai', 'bank', '2026-07-15 06:01:07', NULL, NULL, NULL, 10, NULL, 'Belum Dibayar', NULL, NULL),
(19, 1, 'Guest', 101000, 'Selesai', 'cash', '2026-07-15 06:01:30', NULL, NULL, NULL, 10, NULL, 'Belum Dibayar', NULL, NULL),
(20, 9, 'Guest', 19600, 'Selesai', 'bank', '2026-07-15 06:09:54', NULL, NULL, NULL, 10, NULL, 'Belum Dibayar', NULL, NULL),
(21, 9, 'Guest', 29500, 'Selesai', 'qris', '2026-07-16 02:38:50', NULL, NULL, NULL, 10, NULL, 'Belum Dibayar', NULL, NULL),
(22, 9, 'Guest', 18500, 'Selesai', 'qris', '2026-07-17 04:19:28', NULL, NULL, NULL, 10, NULL, 'Belum Dibayar', NULL, NULL),
(23, 7, 'Guest', 26200, 'Selesai', 'qris', '2026-07-17 05:08:15', NULL, NULL, NULL, 10, NULL, 'Belum Dibayar', NULL, NULL),
(25, 5, 'Guest', 18500, 'Selesai', 'qris', '2026-07-17 05:12:28', NULL, NULL, NULL, 10, NULL, 'Belum Dibayar', NULL, NULL),
(26, 2, 'Guest', 22900, 'Selesai', 'cash', '2026-07-17 05:31:02', NULL, NULL, NULL, 10, NULL, 'Belum Dibayar', NULL, NULL),
(28, 1, 'Guest', 29500, 'Selesai', 'bank', '2026-07-17 05:44:34', NULL, NULL, NULL, 10, NULL, 'Belum Dibayar', NULL, NULL),
(29, 1, 'Guest', 18500, 'Selesai', 'bank', '2026-07-17 05:54:01', NULL, NULL, NULL, 10, NULL, 'Belum Dibayar', NULL, NULL),
(30, 1, 'Guest', 19600, 'Selesai', 'qris', '2026-07-17 05:57:27', NULL, NULL, NULL, 10, NULL, 'Belum Dibayar', NULL, NULL),
(31, 1, 'budi', 18500, 'Selesai', 'qris', '2026-07-17 06:05:42', '2026-07-17 13:17:35', '2026-07-17 13:17:35', 0, 10, NULL, 'Belum Dibayar', NULL, NULL),
(32, 1, 'Miselia', 101000, 'Selesai', 'qris', '2026-07-17 06:26:33', '2026-07-17 13:27:22', '2026-07-17 13:27:26', 0, 10, NULL, 'Belum Dibayar', NULL, NULL),
(33, 1, 'dodol', 51500, '', 'cash', '2026-07-17 06:43:26', NULL, NULL, NULL, 10, NULL, 'Belum Dibayar', NULL, NULL),
(34, 1, 'nana', 26200, 'Selesai', 'cash', '2026-07-17 07:00:45', '2026-07-17 14:28:12', '2026-07-18 21:12:44', 1844, 10, NULL, 'Belum Dibayar', NULL, NULL),
(35, 1, 'nana', 29500, 'Selesai', 'qris', '2026-07-17 07:07:53', '2026-07-17 14:28:11', '2026-07-18 21:12:43', 1844, 10, NULL, 'Belum Dibayar', NULL, NULL),
(36, 1, 'Miselia', 18500, 'Selesai', 'bank', '2026-07-17 07:11:02', '2026-07-17 14:28:10', '2026-07-18 21:12:43', 1844, 10, NULL, 'Belum Dibayar', NULL, NULL),
(37, 1, 'ss', 26200, 'Selesai', 'qris', '2026-07-17 07:39:22', '2026-07-18 21:12:48', '2026-07-18 21:12:48', 0, 10, NULL, 'Belum Dibayar', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `menu_id`, `quantity`, `price`, `subtotal`) VALUES
(5, 5, 23, 1, 5000, 5000),
(6, 6, 14, 1, 25000, 25000),
(7, 7, 8, 1, 16000, 16000),
(8, 8, 14, 1, 25000, 25000),
(9, 9, 14, 1, 25000, 25000),
(10, 10, 14, 1, 25000, 25000),
(11, 11, 14, 1, 25000, 25000),
(12, 12, 15, 1, 5000, 5000),
(13, 13, 24, 0, 10000, 0),
(14, 13, 30, 0, 12000, 0),
(15, 14, 10, 1, 15000, 15000),
(16, 14, 23, 1, 5000, 5000),
(17, 14, 24, 1, 10000, 10000),
(18, 15, 10, 1, 15000, 15000),
(19, 16, 21, 1, 12000, 12000),
(20, 16, 34, 1, 18000, 18000),
(21, 17, 12, 1, 22000, 22000),
(22, 17, 14, 1, 25000, 25000),
(23, 17, 13, 1, 25000, 25000),
(24, 17, 11, 1, 19000, 19000),
(25, 17, 23, 1, 5000, 5000),
(26, 18, 10, 1, 15000, 15000),
(27, 19, 12, 3, 22000, 66000),
(28, 19, 21, 2, 12000, 24000),
(29, 20, 21, 1, 12000, 12000),
(30, 20, 16, 1, 4000, 4000),
(31, 21, 14, 1, 25000, 25000),
(32, 22, 10, 1, 15000, 15000),
(33, 23, 12, 1, 22000, 22000),
(34, 25, 10, 1, 15000, 15000),
(35, 26, 11, 1, 19000, 19000),
(36, 28, 13, 1, 25000, 25000),
(37, 29, 10, 1, 15000, 15000),
(38, 30, 8, 1, 16000, 16000),
(39, 31, 10, 1, 15000, 15000),
(40, 32, 10, 6, 15000, 90000),
(41, 33, 10, 3, 15000, 45000),
(42, 34, 12, 1, 22000, 22000),
(43, 35, 13, 1, 25000, 25000),
(44, 36, 10, 1, 15000, 15000),
(45, 37, 12, 1, 22000, 22000);

-- --------------------------------------------------------

--
-- Table structure for table `owner_statistics`
--

CREATE TABLE `owner_statistics` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `pendapatan` decimal(12,2) DEFAULT 0.00,
  `total_order` int(11) DEFAULT 0,
  `rata_rata_eta` decimal(5,2) DEFAULT 0.00,
  `tepat_waktu` int(11) DEFAULT 0,
  `terlambat` int(11) DEFAULT 0,
  `lebih_cepat` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `receipt_number` varchar(30) DEFAULT NULL,
  `payment_status` enum('Unpaid','Paid') DEFAULT 'Unpaid',
  `paid_at` timestamp NULL DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receipts`
--

INSERT INTO `receipts` (`id`, `order_id`, `receipt_number`, `payment_status`, `paid_at`, `total`) VALUES
(1, 1, 'WRM00001', 'Paid', NULL, 18500),
(2, 4, 'WRM00004', 'Paid', NULL, 35000),
(3, 5, 'WRM00005', 'Paid', NULL, 7500),
(4, 6, 'WRM00006', 'Paid', NULL, 29500),
(5, 7, 'WRM00007', 'Paid', NULL, 19600),
(6, 8, 'WRM00008', 'Paid', NULL, 29500),
(7, 9, 'WRM00009', 'Paid', NULL, 29500),
(8, 10, 'WRM00010', 'Paid', NULL, 29500),
(9, 11, 'WRM00011', 'Paid', NULL, 29500),
(10, 12, 'WRM00012', 'Paid', NULL, 7500),
(11, 13, 'WRM00013', 'Paid', NULL, 26200),
(12, 14, 'WRM00014', 'Paid', NULL, 35000),
(13, 15, 'WRM00015', 'Paid', NULL, 18500),
(14, 16, 'WRM00016', 'Paid', NULL, 35000),
(15, 17, 'WRM00017', 'Paid', NULL, 107600),
(16, 18, 'WRM00018', 'Paid', NULL, 18500),
(17, 19, 'WRM00019', 'Paid', NULL, 101000),
(18, 20, 'WRM00020', 'Paid', NULL, 19600),
(19, 21, 'WRM00021', 'Paid', NULL, 29500),
(20, 22, 'WRM00022', 'Paid', NULL, 18500),
(21, 23, 'WRM00023', 'Paid', NULL, 26200),
(22, 25, 'WRM00025', 'Paid', NULL, 18500),
(23, 26, 'WRM00026', 'Paid', NULL, 22900),
(24, 28, 'WRM00028', 'Paid', NULL, 29500),
(25, 29, 'WRM00029', 'Paid', NULL, 18500),
(26, 30, 'WRM00030', 'Paid', NULL, 19600),
(27, 31, 'WRM00031', 'Paid', NULL, 18500),
(28, 32, 'WRM00032', 'Paid', NULL, 101000),
(29, 33, 'WRM00033', 'Paid', NULL, 51500),
(30, 34, 'WRM00034', 'Paid', NULL, 26200),
(31, 35, 'WRM00035', 'Paid', NULL, 29500),
(32, 36, 'WRM00036', 'Paid', NULL, 18500),
(33, 37, 'WRM00037', 'Paid', NULL, 26200);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `nama_restoran` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(30) DEFAULT NULL,
  `pajak` decimal(5,2) DEFAULT NULL,
  `service` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `nama_restoran`, `alamat`, `telepon`, `pajak`, `service`) VALUES
(1, 'Warmindo', 'Jl. Contoh No.1', '08123456789', 10.00, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` int(11) NOT NULL,
  `nomor_meja` int(11) NOT NULL,
  `status` enum('Kosong','Terisi') NOT NULL DEFAULT 'Kosong',
  `qr_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `nomor_meja`, `status`, `qr_code`, `created_at`) VALUES
(1, 1, 'Kosong', 'meja1.png', '2026-06-25 15:16:14'),
(2, 2, 'Kosong', 'meja2.png', '2026-06-25 15:16:14'),
(3, 3, 'Kosong', 'meja3.png', '2026-06-25 15:16:14'),
(4, 4, 'Kosong', 'meja4.png', '2026-06-25 15:16:14'),
(5, 5, 'Kosong', 'meja5.png', '2026-06-25 15:16:14'),
(6, 6, 'Kosong', 'meja6.png', '2026-06-25 15:16:14'),
(7, 7, 'Kosong', 'meja7.png', '2026-06-25 15:16:14'),
(8, 8, 'Kosong', 'meja8.png', '2026-06-25 15:16:14'),
(9, 9, 'Kosong', 'meja9.png', '2026-06-25 15:16:14'),
(10, 10, 'Kosong', 'meja10.png', '2026-06-25 15:16:14'),
(22, 11, 'Kosong', NULL, '2026-06-26 13:57:28'),
(23, 12, 'Kosong', NULL, '2026-06-26 13:57:28');

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) DEFAULT NULL,
  `tipe` enum('Persen','Nominal') DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `aktif` enum('Ya','Tidak') DEFAULT 'Ya'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `kitchen_staff`
--
ALTER TABLE `kitchen_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `table_id` (`table_id`),
  ADD KEY `fk_orders_kitchen` (`kitchen_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `order_items_ibfk_2` (`menu_id`);

--
-- Indexes for table `owner_statistics`
--
ALTER TABLE `owner_statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `table_number` (`nomor_meja`),
  ADD UNIQUE KEY `nomor_meja` (`nomor_meja`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kitchen_staff`
--
ALTER TABLE `kitchen_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `owner_statistics`
--
ALTER TABLE `owner_statistics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_kitchen` FOREIGN KEY (`kitchen_id`) REFERENCES `kitchen_staff` (`id`),
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`table_id`) REFERENCES `tables` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`);

--
-- Constraints for table `receipts`
--
ALTER TABLE `receipts`
  ADD CONSTRAINT `receipts_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
