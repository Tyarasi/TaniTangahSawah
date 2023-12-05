-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Agu 2023 pada 20.55
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tanitangahsawah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `barang_id` int(11) NOT NULL,
  `kode_barang` varchar(150) DEFAULT NULL,
  `nama_barang` varchar(150) DEFAULT NULL,
  `nama_kategori` varchar(150) NOT NULL,
  `stok_barang` int(11) DEFAULT NULL,
  `nama_satuan` varchar(150) NOT NULL,
  `harga_beli` int(20) DEFAULT NULL,
  `harga_jual` int(20) NOT NULL,
  `biaya_pesan` varchar(150) NOT NULL,
  `biaya_simpan` varchar(150) NOT NULL,
  `lead_time` int(11) NOT NULL,
  `safety_stock` int(11) DEFAULT NULL,
  `eoq` int(11) NOT NULL,
  `rop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`barang_id`, `kode_barang`, `nama_barang`, `nama_kategori`, `stok_barang`, `nama_satuan`, `harga_beli`, `harga_jual`, `biaya_pesan`, `biaya_simpan`, `lead_time`, `safety_stock`, `eoq`, `rop`) VALUES
(33, 'BRGSP-753', 'Sprayer NAYA 2in1', 'Sprayer', 0, 'PCS', 430000, 450000, '1500', '1000', 2, 8, 32, 64),
(34, 'BRG-982', 'Sprayer Alibaba 2in1', 'Sprayer', 0, 'PCS', 420000, 440000, '1000', '1500', 2, 8, 18, 50),
(35, 'BRGPT-986', 'Roundup 1L', 'Pestisida', 152, 'PCS', 72000, 95000, '1000', '1000', 2, 26, 42, 170),
(36, 'BRGPT-805', 'Gramoxone 20L', 'Pestisida', 67, 'PCS', 990000, 1500000, '1500', '1500', 3, 31, 30, 147),
(37, 'BRGPT-690', 'Starlon 665 100ML', 'Pestisida', 1, 'PCS', 40000, 48000, '500', '1000', 2, 15, 24, 112),
(38, 'BRGPT-829', 'Roundup 20L', 'Pestisida', 134, 'PCS', 2275000, 2400000, '1500', '1500', 3, 59, 47, 330),
(39, 'BRGPU-374', 'NPK Booster 50KG', 'Pupuk', 70, 'PCS', 1480000, 1650000, '1500', '1500', 2, 15, 37, 130),
(40, 'BRGPU-120', 'Meroke SOP 25kg', 'Pupuk', 37, 'PCS', 450000, 465000, '1000', '1000', 3, 21, 39, 213),
(41, 'BRGPU-331', 'KCL Mahkota 50KG', 'Pupuk', 47, 'PCS', 485000, 550000, '1000', '1500', 2, 18, 33, 156),
(42, 'BRGPT-830', 'Garlon 1L', 'Pestisida', 102, 'PCS', 190000, 205000, '1000', '1000', 2, 18, 41, 160);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `kode_pembelian` varchar(150) DEFAULT NULL,
  `nama_barang` varchar(150) DEFAULT NULL,
  `jumlah_barang` int(11) DEFAULT NULL,
  `nama_satuan` varchar(20) DEFAULT NULL,
  `harga_beli` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`kode_pembelian`, `nama_barang`, `jumlah_barang`, `nama_satuan`, `harga_beli`) VALUES
('PBL1692557919', 'Sprayer NAYA 2in1', 60, 'PCS', 430000),
('PBL1692558013', 'Sprayer NAYA 2in1', 75, 'PCS', 430000),
('PBL1692558111', 'Sprayer NAYA 2in1', 60, 'PCS', 430000),
('PBL1692558262', 'Sprayer NAYA 2in1', 70, 'PCS', 430000),
('PBL1692558367', 'Sprayer NAYA 2in1', 85, 'PCS', 430000),
('PBL1692558494', 'Sprayer NAYA 2in1', 77, 'PCS', 430000),
('PBL1692559934', 'Sprayer Alibaba 2in1', 65, 'PCS', 420000),
('PBL1692559949', 'Sprayer Alibaba 2in1', 77, 'PCS', 420000),
('PBL1692559965', 'Sprayer Alibaba 2in1', 85, 'PCS', 420000),
('PBL1692559982', 'Sprayer Alibaba 2in1', 76, 'PCS', 420000),
('PBL1692560491', 'Roundup 1L', 80, 'PCS', 72000),
('PBL1692560542', 'Roundup 1L', 110, 'PCS', 72000),
('PBL1692560625', 'Roundup 1L', 170, 'PCS', 72000),
('PBL1692560658', 'Roundup 1L', 195, 'PCS', 72000),
('PBL1692560701', 'Roundup 1L', 200, 'PCS', 72000),
('PBL1692560761', 'Roundup 1L', 197, 'PCS', 72000),
('PBL1692561039', 'Roundup 1L', 150, 'PCS', 72000),
('PBL1692561713', 'Gramoxone 20L', 65, 'PCS', 990000),
('PBL1692561781', 'Gramoxone 20L', 79, 'PCS', 990000),
('PBL1692561814', 'Gramoxone 20L', 95, 'PCS', 990000),
('PBL1692561896', 'Gramoxone 20L', 86, 'PCS', 990000),
('PBL1692561919', 'Gramoxone 20L', 98, 'PCS', 990000),
('PBL1692562172', 'Gramoxone 20L', 83, 'PCS', 990000),
('PBL1692562251', 'Gramoxone 20L', 120, 'PCS', 990000),
('PBL1692562516', 'Starlon 665 100ML', 70, 'PCS', 40000),
('PBL1692562573', 'Starlon 665 100ML', 80, 'PCS', 40000),
('PBL1692562618', 'Starlon 665 100ML', 79, 'PCS', 40000),
('PBL1692562647', 'Starlon 665 100ML', 86, 'PCS', 40000),
('PBL1692562692', 'Starlon 665 100ML', 98, 'PCS', 40000),
('PBL1692562717', 'Starlon 665 100ML', 85, 'PCS', 40000),
('PBL1692562738', 'Starlon 665 100ML', 87, 'PCS', 40000),
('PBL1692562993', 'Starlon 665 100ML', 89, 'PCS', 40000),
('PBL1692563311', 'Roundup 20L', 133, 'PCS', 2275000),
('PBL1692563339', 'Roundup 20L', 130, 'PCS', 2275000),
('PBL1692563362', 'Roundup 20L', 131, 'PCS', 2275000),
('PBL1692563400', 'Roundup 20L', 120, 'PCS', 2275000),
('PBL1692563421', 'Roundup 20L', 140, 'PCS', 2275000),
('PBL1692563446', 'Roundup 20L', 148, 'PCS', 2275000),
('PBL1692563475', 'Roundup 20L', 139, 'PCS', 2275000),
('PBL1692563660', 'Roundup 20L', 147, 'PCS', 2275000),
('PBL1692563697', 'Roundup 20L', 155, 'PCS', 2275000),
('PBL1692563846', 'Roundup 20L', 134, 'PCS', 2275000),
('PBL1692564136', 'NPK Booster 50KG', 88, 'PCS', 1480000),
('PBL1692564164', 'NPK Booster 50KG', 90, 'PCS', 1480000),
('PBL1692564252', 'NPK Booster 50KG', 87, 'PCS', 1480000),
('PBL1692564278', 'NPK Booster 50KG', 92, 'PCS', 1480000),
('PBL1692564311', 'NPK Booster 50KG', 95, 'PCS', 1480000),
('PBL1692564332', 'NPK Booster 50KG', 98, 'PCS', 1480000),
('PBL1692564358', 'NPK Booster 50KG', 100, 'PCS', 1480000),
('PBL1692564578', 'NPK Booster 50KG', 119, 'PCS', 1480000),
('PBL1692564619', 'NPK Booster 50KG', 105, 'PCS', 1480000),
('PBL1692564871', 'Meroke SOP 25kg', 90, 'PCS', 450000),
('PBL1692565066', 'Meroke SOP 25kg', 88, 'PCS', 450000),
('PBL1692565095', 'Meroke SOP 25kg', 89, 'PCS', 450000),
('PBL1692565122', 'Meroke SOP 25kg', 77, 'PCS', 450000),
('PBL1692565187', 'Meroke SOP 25kg', 88, 'PCS', 450000),
('PBL1692565216', 'Meroke SOP 25kg', 90, 'PCS', 450000),
('PBL1692565242', 'Meroke SOP 25kg', 95, 'PCS', 450000),
('PBL1692565266', 'Meroke SOP 25kg', 87, 'PCS', 450000),
('PBL1692565467', 'Meroke SOP 25kg', 110, 'PCS', 450000),
('PBL1692565542', 'Meroke SOP 25kg', 115, 'PCS', 450000),
('PBL1692565890', 'KCL Mahkota 50KG', 90, 'PCS', 485000),
('PBL1692565910', 'KCL Mahkota 50KG', 88, 'PCS', 485000),
('PBL1692565934', 'KCL Mahkota 50KG', 91, 'PCS', 485000),
('PBL1692565956', 'KCL Mahkota 50KG', 85, 'PCS', 485000),
('PBL1692565982', 'KCL Mahkota 50KG', 88, 'PCS', 485000),
('PBL1692566003', 'KCL Mahkota 50KG', 90, 'PCS', 485000),
('PBL1692566023', 'KCL Mahkota 50KG', 91, 'PCS', 485000),
('PBL1692566049', 'KCL Mahkota 50KG', 95, 'PCS', 485000),
('PBL1692566078', 'KCL Mahkota 50KG', 98, 'PCS', 485000),
('PBL1692566103', 'KCL Mahkota 50KG', 100, 'PCS', 485000),
('PBL1692566307', 'KCL Mahkota 50KG', 95, 'PCS', 485000),
('PBL1692566749', 'Garlon 1L', 80, 'PCS', 190000),
('PBL1692566823', 'Garlon 1L', 98, 'PCS', 190000),
('PBL1692566857', 'Garlon 1L', 78, 'PCS', 190000),
('PBL1692566887', 'Garlon 1L', 85, 'PCS', 190000),
('PBL1692566912', 'Garlon 1L', 96, 'PCS', 190000),
('PBL1692566941', 'Garlon 1L', 97, 'PCS', 190000),
('PBL1692566973', 'Garlon 1L', 87, 'PCS', 190000),
('PBL1692566999', 'Garlon 1L', 202, 'PCS', 190000),
('PBL1692567026', 'Garlon 1L', 105, 'PCS', 190000),
('PBL1692567057', 'Garlon 1L', 98, 'PCS', 190000),
('PBL1692567085', 'Garlon 1L', 80, 'PCS', 190000),
('PBL1692601452', 'Garlon 1L', 42, 'PCS', 190000),
('PBL1692603111', 'TES', 6, 'PCS', 50000),
('PBL1692699694', 'Roundup 1L', 42, 'PCS', 72000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `kode_penjualan` varchar(25) DEFAULT NULL,
  `nama_barang` varchar(150) DEFAULT NULL,
  `jumlah_barang` int(11) DEFAULT NULL,
  `nama_satuan` varchar(20) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `expired_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`kode_penjualan`, `nama_barang`, `jumlah_barang`, `nama_satuan`, `harga_jual`, `expired_date`) VALUES
('PJL1692557957', 'Sprayer NAYA 2in1', 32, 'PCS', 450000, '0000-00-00'),
('PJL1692557981', 'Sprayer NAYA 2in1', 28, 'PCS', 450000, '0000-00-00'),
('PJL1692558036', 'Sprayer NAYA 2in1', 30, 'PCS', 450000, '0000-00-00'),
('PJL1692558087', 'Sprayer NAYA 2in1', 30, 'PCS', 450000, '0000-00-00'),
('PJL1692558169', 'Sprayer NAYA 2in1', 27, 'PCS', 450000, '0000-00-00'),
('PJL1692558195', 'Sprayer NAYA 2in1', 26, 'PCS', 450000, '0000-00-00'),
('PJL1692558298', 'Sprayer NAYA 2in1', 23, 'PCS', 450000, '0000-00-00'),
('PJL1692558316', 'Sprayer NAYA 2in1', 25, 'PCS', 450000, '0000-00-00'),
('PJL1692558337', 'Sprayer NAYA 2in1', 32, 'PCS', 450000, '0000-00-00'),
('PJL1692558388', 'Sprayer NAYA 2in1', 25, 'PCS', 450000, '0000-00-00'),
('PJL1692558416', 'Sprayer NAYA 2in1', 31, 'PCS', 450000, '0000-00-00'),
('PJL1692558432', 'Sprayer NAYA 2in1', 29, 'PCS', 450000, '0000-00-00'),
('PJL1692558520', 'Sprayer NAYA 2in1', 30, 'PCS', 450000, '0000-00-00'),
('PJL1692558547', 'Sprayer NAYA 2in1', 23, 'PCS', 450000, '0000-00-00'),
('PJL1692559997', 'Sprayer Alibaba 2in1', 20, 'PCS', 440000, '0000-00-00'),
('PJL1692560020', 'Sprayer Alibaba 2in1', 18, 'PCS', 440000, '0000-00-00'),
('PJL1692560033', 'Sprayer Alibaba 2in1', 25, 'PCS', 440000, '0000-00-00'),
('PJL1692560047', 'Sprayer Alibaba 2in1', 22, 'PCS', 440000, '0000-00-00'),
('PJL1692560057', 'Sprayer Alibaba 2in1', 19, 'PCS', 440000, '0000-00-00'),
('PJL1692560095', 'Sprayer Alibaba 2in1', 23, 'PCS', 440000, '0000-00-00'),
('PJL1692560125', 'Sprayer Alibaba 2in1', 22, 'PCS', 440000, '0000-00-00'),
('PJL1692560147', 'Sprayer Alibaba 2in1', 17, 'PCS', 440000, '0000-00-00'),
('PJL1692560164', 'Sprayer Alibaba 2in1', 20, 'PCS', 440000, '0000-00-00'),
('PJL1692560182', 'Sprayer Alibaba 2in1', 24, 'PCS', 440000, '0000-00-00'),
('PJL1692560200', 'Sprayer Alibaba 2in1', 18, 'PCS', 440000, '0000-00-00'),
('PJL1692560214', 'Sprayer Alibaba 2in1', 22, 'PCS', 440000, '0000-00-00'),
('PJL1692560226', 'Sprayer Alibaba 2in1', 24, 'PCS', 440000, '0000-00-00'),
('PJL1692560243', 'Sprayer Alibaba 2in1', 20, 'PCS', 440000, '0000-00-00'),
('PJL1692560523', 'Roundup 1L', 66, 'PCS', 95000, '2024-01-03'),
('PJL1692560599', 'Roundup 1L', 70, 'PCS', 95000, '2024-01-03'),
('PJL1692560814', 'Roundup 1L', 68, 'PCS', 95000, '2023-12-19'),
('PJL1692560834', 'Roundup 1L', 70, 'PCS', 95000, '2023-12-19'),
('PJL1692560849', 'Roundup 1L', 82, 'PCS', 95000, '2023-12-19'),
('PJL1692560866', 'Roundup 1L', 71, 'PCS', 95000, '2024-01-06'),
('PJL1692560889', 'Roundup 1L', 75, 'PCS', 95000, '2024-04-08'),
('PJL1692560905', 'Roundup 1L', 85, 'PCS', 95000, '2024-04-08'),
('PJL1692560922', 'Roundup 1L', 69, 'PCS', 95000, '2024-09-10'),
('PJL1692560943', 'Roundup 1L', 67, 'PCS', 95000, '2024-09-10'),
('PJL1692560959', 'Roundup 1L', 68, 'PCS', 95000, '2024-09-10'),
('PJL1692560977', 'Roundup 1L', 74, 'PCS', 95000, '2024-09-13'),
('PJL1692560994', 'Roundup 1L', 66, 'PCS', 95000, '2024-09-13'),
('PJL1692561078', 'Roundup 1L', 60, 'PCS', 95000, '2024-09-13'),
('PJL1692561947', 'Gramoxone 20L', 40, 'PCS', 1500000, '2023-02-01'),
('PJL1692561968', 'Gramoxone 20L', 38, 'PCS', 1500000, '2023-02-01'),
('PJL1692561986', 'Gramoxone 20L', 42, 'PCS', 1500000, '2023-07-15'),
('PJL1692562003', 'Gramoxone 20L', 37, 'PCS', 1500000, '2023-07-15'),
('PJL1692562017', 'Gramoxone 20L', 45, 'PCS', 1500000, '2023-09-12'),
('PJL1692562032', 'Gramoxone 20L', 37, 'PCS', 1500000, '2023-09-12'),
('PJL1692562048', 'Gramoxone 20L', 35, 'PCS', 1500000, '2023-10-09'),
('PJL1692562063', 'Gramoxone 20L', 46, 'PCS', 1500000, '2023-10-09'),
('PJL1692562078', 'Gramoxone 20L', 32, 'PCS', 1500000, '2023-10-09'),
('PJL1692562092', 'Gramoxone 20L', 33, 'PCS', 1500000, '2023-12-08'),
('PJL1692562114', 'Gramoxone 20L', 30, 'PCS', 1500000, '2023-12-08'),
('PJL1692562217', 'Gramoxone 20L', 49, 'PCS', 1500000, '2023-12-08'),
('PJL1692562295', 'Gramoxone 20L', 50, 'PCS', 1500000, '2024-02-07'),
('PJL1692562309', 'Gramoxone 20L', 45, 'PCS', 1500000, '2024-03-08'),
('PJL1692562769', 'Starlon 665 100ML', 55, 'PCS', 48000, '2023-07-08'),
('PJL1692562791', 'Starlon 665 100ML', 50, 'PCS', 48000, '2023-07-08'),
('PJL1692562805', 'Starlon 665 100ML', 45, 'PCS', 48000, '2023-08-19'),
('PJL1692562818', 'Starlon 665 100ML', 47, 'PCS', 48000, '2023-11-19'),
('PJL1692562834', 'Starlon 665 100ML', 56, 'PCS', 48000, '2023-11-19'),
('PJL1692562848', 'Starlon 665 100ML', 50, 'PCS', 48000, '2023-12-12'),
('PJL1692562866', 'Starlon 665 100ML', 49, 'PCS', 48000, '2023-12-12'),
('PJL1692562882', 'Starlon 665 100ML', 53, 'PCS', 48000, '2024-01-05'),
('PJL1692562896', 'Starlon 665 100ML', 43, 'PCS', 48000, '2024-01-05'),
('PJL1692562922', 'Starlon 665 100ML', 45, 'PCS', 48000, '2024-02-18'),
('PJL1692562942', 'Starlon 665 100ML', 47, 'PCS', 48000, '2024-02-18'),
('PJL1692562959', 'Starlon 665 100ML', 44, 'PCS', 48000, '2024-07-23'),
('PJL1692563045', 'Starlon 665 100ML', 40, 'PCS', 48000, '2024-07-23'),
('PJL1692563058', 'Starlon 665 100ML', 42, 'PCS', 48000, '2024-08-07'),
('PJL1692563501', 'Roundup 20L', 80, 'PCS', 2400000, '2023-11-09'),
('PJL1692563516', 'Roundup 20L', 84, 'PCS', 2400000, '2023-11-09'),
('PJL1692563529', 'Roundup 20L', 92, 'PCS', 2400000, '2024-01-05'),
('PJL1692563545', 'Roundup 20L', 99, 'PCS', 2400000, '2024-01-05'),
('PJL1692563558', 'Roundup 20L', 110, 'PCS', 2400000, '2024-01-09'),
('PJL1692563574', 'Roundup 20L', 86, 'PCS', 2400000, '2024-04-08'),
('PJL1692563587', 'Roundup 20L', 97, 'PCS', 2400000, '2024-05-04'),
('PJL1692563601', 'Roundup 20L', 85, 'PCS', 2400000, '2024-05-04'),
('PJL1692563612', 'Roundup 20L', 79, 'PCS', 2400000, '2024-08-17'),
('PJL1692563624', 'Roundup 20L', 88, 'PCS', 2400000, '2024-09-11'),
('PJL1692563723', 'Roundup 20L', 89, 'PCS', 2400000, '2024-08-28'),
('PJL1692563737', 'Roundup 20L', 96, 'PCS', 2400000, '2024-08-28'),
('PJL1692563752', 'Roundup 20L', 88, 'PCS', 2400000, '2024-09-11'),
('PJL1692563763', 'Roundup 20L', 70, 'PCS', 2400000, '2024-11-10'),
('PJL1692564399', 'NPK Booster 50KG', 54, 'PCS', 1650000, '2023-01-08'),
('PJL1692564416', 'NPK Booster 50KG', 57, 'PCS', 1650000, '2023-01-08'),
('PJL1692564429', 'NPK Booster 50KG', 46, 'PCS', 1650000, '2023-03-03'),
('PJL1692564443', 'NPK Booster 50KG', 63, 'PCS', 1650000, '2023-03-03'),
('PJL1692564454', 'NPK Booster 50KG', 55, 'PCS', 1650000, '2023-05-08'),
('PJL1692564467', 'NPK Booster 50KG', 58, 'PCS', 1650000, '2023-05-08'),
('PJL1692564480', 'NPK Booster 50KG', 65, 'PCS', 1650000, '2023-06-18'),
('PJL1692564491', 'NPK Booster 50KG', 63, 'PCS', 1650000, '2023-08-25'),
('PJL1692564502', 'NPK Booster 50KG', 57, 'PCS', 1650000, '2023-10-23'),
('PJL1692564514', 'NPK Booster 50KG', 51, 'PCS', 1650000, '2023-10-23'),
('PJL1692564526', 'NPK Booster 50KG', 62, 'PCS', 1650000, '2023-12-22'),
('PJL1692564647', 'NPK Booster 50KG', 58, 'PCS', 1650000, '2023-12-22'),
('PJL1692564661', 'NPK Booster 50KG', 55, 'PCS', 1650000, '2024-12-12'),
('PJL1692564671', 'NPK Booster 50KG', 60, 'PCS', 1650000, '2024-12-12'),
('PJL1692565297', 'Meroke SOP 25kg', 62, 'PCS', 465000, '2023-01-08'),
('PJL1692565313', 'Meroke SOP 25kg', 67, 'PCS', 465000, '2023-01-08'),
('PJL1692565327', 'Meroke SOP 25kg', 57, 'PCS', 465000, '2023-03-18'),
('PJL1692565339', 'Meroke SOP 25kg', 70, 'PCS', 465000, '2023-06-08'),
('PJL1692565351', 'Meroke SOP 25kg', 71, 'PCS', 465000, '2023-06-08'),
('PJL1692565363', 'Meroke SOP 25kg', 69, 'PCS', 465000, '2023-06-23'),
('PJL1692565374', 'Meroke SOP 25kg', 58, 'PCS', 465000, '2023-06-24'),
('PJL1692565386', 'Meroke SOP 25kg', 65, 'PCS', 465000, '2023-08-10'),
('PJL1692565400', 'Meroke SOP 25kg', 61, 'PCS', 465000, '2023-08-10'),
('PJL1692565413', 'Meroke SOP 25kg', 59, 'PCS', 465000, '2023-12-22'),
('PJL1692565424', 'Meroke SOP 25kg', 63, 'PCS', 465000, '2024-03-19'),
('PJL1692565492', 'Meroke SOP 25kg', 66, 'PCS', 465000, '2024-03-19'),
('PJL1692565571', 'Meroke SOP 25kg', 64, 'PCS', 465000, '2025-03-06'),
('PJL1692565588', 'Meroke SOP 25kg', 60, 'PCS', 465000, '2025-05-28'),
('PJL1692566126', 'KCL Mahkota 50KG', 70, 'PCS', 550000, '2023-01-02'),
('PJL1692566139', 'KCL Mahkota 50KG', 72, 'PCS', 550000, '2023-01-02'),
('PJL1692566153', 'KCL Mahkota 50KG', 66, 'PCS', 550000, '2023-03-10'),
('PJL1692566166', 'KCL Mahkota 50KG', 63, 'PCS', 550000, '2023-05-10'),
('PJL1692566177', 'KCL Mahkota 50KG', 62, 'PCS', 550000, '2023-07-18'),
('PJL1692566189', 'KCL Mahkota 50KG', 78, 'PCS', 550000, '2023-07-18'),
('PJL1692566202', 'KCL Mahkota 50KG', 77, 'PCS', 550000, '2023-09-27'),
('PJL1692566213', 'KCL Mahkota 50KG', 73, 'PCS', 550000, '2023-11-18'),
('PJL1692566224', 'KCL Mahkota 50KG', 68, 'PCS', 550000, '2024-01-11'),
('PJL1692566237', 'KCL Mahkota 50KG', 62, 'PCS', 550000, '2024-03-16'),
('PJL1692566253', 'KCL Mahkota 50KG', 71, 'PCS', 550000, '2024-03-16'),
('PJL1692566264', 'KCL Mahkota 50KG', 64, 'PCS', 550000, '2024-05-27'),
('PJL1692566278', 'KCL Mahkota 50KG', 70, 'PCS', 550000, '2024-07-10'),
('PJL1692566333', 'KCL Mahkota 50KG', 68, 'PCS', 550000, '2024-07-10'),
('PJL1692567170', 'Garlon 1L', 66, 'PCS', 205000, '2023-09-16'),
('PJL1692567190', 'Garlon 1L', 58, 'PCS', 205000, '2023-09-16'),
('PJL1692567211', 'Garlon 1L', 76, 'PCS', 205000, '2023-12-19'),
('PJL1692567229', 'Garlon 1L', 72, 'PCS', 205000, '2024-01-12'),
('PJL1692567255', 'Garlon 1L', 79, 'PCS', 205000, '2024-02-18'),
('PJL1692567272', 'Garlon 1L', 80, 'PCS', 205000, '2024-02-18'),
('PJL1692567291', 'Garlon 1L', 64, 'PCS', 205000, '2024-04-05'),
('PJL1692567311', 'Garlon 1L', 69, 'PCS', 205000, '2024-04-16'),
('PJL1692567327', 'Garlon 1L', 72, 'PCS', 205000, '2024-05-22'),
('PJL1692567351', 'Garlon 1L', 76, 'PCS', 205000, '2024-05-30'),
('PJL1692567379', 'Garlon 1L', 70, 'PCS', 205000, '2024-08-17'),
('PJL1692567394', 'Garlon 1L', 69, 'PCS', 205000, '2024-08-17'),
('PJL1692567409', 'Garlon 1L', 71, 'PCS', 205000, '2024-08-22'),
('PJL1692567438', 'Garlon 1L', 70, 'PCS', 205000, '2024-12-12'),
('PJL1692601840', 'Sprayer Alibaba 2in1', 8, 'PCS', 440000, '0000-00-00'),
('PJL1692602081', 'Starlon 665 100ML', 7, 'PCS', 48000, '2024-08-07'),
('PJL1692602701', 'Garlon 1L', 50, 'PCS', 205000, '2024-01-21'),
('PJL1692602872', 'Garlon 1L', 4, 'PCS', 205000, '2024-12-12'),
('PJL1692605628', 'Roundup 1L', 1, 'PCS', 95000, '2024-12-03'),
('PJL1692605628', 'Sprayer NAYA 2in1', 2, 'PCS', 450000, '0000-00-00'),
('PJL1692700688', 'Sprayer NAYA 2in1', 14, 'PCS', 450000, '0000-00-00'),
('PJL1692700757', 'Sprayer Alibaba 2in1', 1, 'PCS', 440000, '0000-00-00');

--
-- Trigger `detail_penjualan`
--
DELIMITER $$
CREATE TRIGGER `eoq` BEFORE INSERT ON `detail_penjualan` FOR EACH ROW update barang set barang.eoq =  SQRT((SELECT (SUM(dela.jumlah_barang)) AS jumlah_barang FROM detail_penjualan dela, penjualan_barang jb, (SELECT YEAR(max(jb.tanggal_penjualan)) - 1 as tanggal from penjualan_barang jb, detail_penjualan dela where jb.kode_penjualan = dela.kode_penjualan AND dela.nama_barang = NEW.nama_barang ) md WHERE YEAR(jb.tanggal_penjualan) = md.tanggal AND dela.nama_barang = NEW.nama_barang AND jb.kode_penjualan = dela.kode_penjualan GROUP BY dela.nama_barang asc)*2*(SELECT barang.biaya_pesan / barang.biaya_simpan from barang WHERE nama_barang = NEW.nama_barang)) WHERE barang.nama_barang = NEW.nama_barang
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `rop` BEFORE INSERT ON `detail_penjualan` FOR EACH ROW UPDATE barang as bar set bar.rop = ((SELECT (AVG(dela.jumlah_barang)) AS jumlah_barang FROM detail_penjualan dela, penjualan_barang jb, (SELECT YEAR(max(jb.tanggal_penjualan)) - 1 as tanggal from penjualan_barang jb, detail_penjualan dela where jb.kode_penjualan = dela.kode_penjualan AND dela.nama_barang = NEW.nama_barang ) md WHERE YEAR(jb.tanggal_penjualan) = md.tanggal AND dela.nama_barang = NEW.nama_barang AND jb.kode_penjualan = dela.kode_penjualan GROUP BY dela.nama_barang asc)*(SELECT barang.lead_time from barang where nama_barang = NEW.nama_barang))+((SELECT (MAX(dela.jumlah_barang)-AVG(dela.jumlah_barang)) AS jumlah_barang FROM detail_penjualan dela, penjualan_barang jb, (SELECT YEAR(max(jb.tanggal_penjualan)) - 1 as tanggal from penjualan_barang jb, detail_penjualan dela where jb.kode_penjualan = dela.kode_penjualan AND dela.nama_barang = NEW.nama_barang ) md WHERE YEAR(jb.tanggal_penjualan) = md.tanggal AND dela.nama_barang = NEW.nama_barang AND jb.kode_penjualan = dela.kode_penjualan GROUP BY dela.nama_barang asc)*(SELECT barang.lead_time from barang where nama_barang = NEW.nama_barang)) WHERE bar.nama_barang = NEW.nama_barang
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `safety_stock` BEFORE INSERT ON `detail_penjualan` FOR EACH ROW UPDATE barang as bar set bar.safety_stock = (SELECT(MAX(d.jumlah_barang)-AVG(d.jumlah_barang)) AS jumlah_barang FROM detail_penjualan d, penjualan_barang jb, (SELECT YEAR(max(jb.tanggal_penjualan)) - 1 as tanggal from penjualan_barang jb, detail_penjualan d where jb.kode_penjualan = d.kode_penjualan AND d.nama_barang = NEW.nama_barang ) md WHERE YEAR(jb.tanggal_penjualan) = md.tanggal AND d.nama_barang = NEW.nama_barang AND jb.kode_penjualan = d.kode_penjualan GROUP BY d.nama_barang asc)*(SELECT barang.lead_time from barang where nama_barang = NEW.nama_barang)  WHERE bar.nama_barang = NEW.nama_barang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `distributor`
--

CREATE TABLE `distributor` (
  `distributor_id` int(11) NOT NULL,
  `kode_distributor` varchar(150) NOT NULL,
  `nama_distributor` varchar(150) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `no_hp` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `distributor`
--

INSERT INTO `distributor` (`distributor_id`, `kode_distributor`, `nama_distributor`, `alamat`, `no_hp`) VALUES
(14, 'DIST414', 'PT. Mitra Agrindo', 'JL. Soekarno Hatta No.30', ' 07617865077'),
(15, 'DIST49', 'PT. Bangun Sahabat Tani', 'Jl. Garuda Sakti', '0216520222'),
(16, 'DIST258', 'PT. Inti Agro Tani', 'Jl. Arengka', '0761589088'),
(17, 'DIST356', 'PT. Panca Agro', 'Jl. Riau Pergudangan Siak 2', '02518313070'),
(18, 'DIST13', 'PT. Galatta Lestari', 'Jl. Lintas Sumatera', '0761676756');

-- --------------------------------------------------------

--
-- Struktur dari tabel `expired_barang`
--

CREATE TABLE `expired_barang` (
  `id` int(11) NOT NULL,
  `kode_pembelian` varchar(255) DEFAULT NULL,
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `expired_barang` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `expired_barang`
--

INSERT INTO `expired_barang` (`id`, `kode_pembelian`, `id_barang`, `kode_barang`, `stok_barang`, `expired_barang`) VALUES
(21, 'PBL1692561039', 35, 'BRGPT-986', 110, '2024-12-03'),
(28, 'PBL1692562251', 36, 'BRGPT-805', 67, '2024-03-08'),
(36, 'PBL1692562993', 37, 'BRGPT-690', 1, '2024-08-07'),
(46, 'PBL1692563846', 38, 'BRGPT-829', 134, '2024-10-08'),
(55, 'PBL1692564619', 39, 'BRGPU-374', 70, '2025-02-17'),
(65, 'PBL1692565542', 40, 'BRGPU-120', 37, '2025-05-28'),
(76, 'PBL1692566307', 41, 'BRGPU-331', 47, '2024-11-27'),
(84, 'PBL1692566999', 42, 'BRGPT-830', 102, '2024-12-12'),
(88, NULL, 43, 'BRGPT-670', 0, '2023-11-23'),
(90, NULL, 44, 'BRGPT-980', 0, '2023-08-14'),
(91, 'PBL1692603111', 44, 'BRGPT-980', 6, '2023-12-31'),
(92, 'PBL1692699694', 35, 'BRGPT-986', 42, '2023-08-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `karyawan_id` int(11) NOT NULL,
  `kode_karyawan` varchar(150) DEFAULT NULL,
  `nama_karyawan` varchar(150) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`karyawan_id`, `kode_karyawan`, `nama_karyawan`, `no_hp`, `username`, `password`) VALUES
(6, 'KYW-87', 'Dermala Sari', '082214466674', 'adminmala', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `nama_kategori`) VALUES
(1, 'Pestisida'),
(2, 'Sprayer'),
(4, 'Pupuk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_barang`
--

CREATE TABLE `pembelian_barang` (
  `pembelian_id` int(11) NOT NULL,
  `kode_pembelian` varchar(25) DEFAULT NULL,
  `tanggal_pembelian` date DEFAULT NULL,
  `jam_pembelian` time DEFAULT NULL,
  `nama_distributor` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembelian_barang`
--

INSERT INTO `pembelian_barang` (`pembelian_id`, `kode_pembelian`, `tanggal_pembelian`, `jam_pembelian`, `nama_distributor`) VALUES
(1, 'PBL1692557919', '2022-01-01', '01:58:39', 'PT. Mitra Agrindo'),
(2, 'PBL1692558013', '2022-02-28', '02:00:13', 'PT. Mitra Agrindo'),
(3, 'PBL1692558111', '2022-04-24', '02:01:51', 'PT. Mitra Agrindo'),
(4, 'PBL1692558262', '2022-06-22', '02:04:22', 'PT. Mitra Agrindo'),
(5, 'PBL1692558367', '2022-09-02', '02:06:07', 'PT. Mitra Agrindo'),
(6, 'PBL1692558494', '2022-12-19', '02:08:14', 'PT. Mitra Agrindo'),
(11, 'PBL1692559934', '2022-01-02', '02:32:14', 'PT. Mitra Agrindo'),
(12, 'PBL1692559949', '2022-03-19', '02:32:29', 'PT. Mitra Agrindo'),
(13, 'PBL1692559965', '2022-06-20', '02:32:45', 'PT. Mitra Agrindo'),
(14, 'PBL1692559982', '2022-10-09', '02:33:02', 'PT. Mitra Agrindo'),
(15, 'PBL1692560491', '2022-01-03', '02:41:31', 'PT. Bangun Sahabat Tani'),
(16, 'PBL1692560542', '2022-02-05', '02:42:22', 'PT. Bangun Sahabat Tani'),
(17, 'PBL1692560625', '2022-03-08', '02:43:45', 'PT. Bangun Sahabat Tani'),
(18, 'PBL1692560658', '2022-06-04', '02:44:18', 'PT. Bangun Sahabat Tani'),
(19, 'PBL1692560701', '2022-08-18', '02:45:01', 'PT. Bangun Sahabat Tani'),
(20, 'PBL1692560761', '2022-09-09', '02:46:01', 'PT. Bangun Sahabat Tani'),
(21, 'PBL1692561039', '2022-11-10', '02:50:39', 'PT. Bangun Sahabat Tani'),
(22, 'PBL1692561713', '2022-01-07', '03:01:53', 'PT. Inti Agro Tani'),
(23, 'PBL1692561781', '2022-02-11', '03:03:01', 'PT. Inti Agro Tani'),
(24, 'PBL1692561814', '2022-04-02', '03:03:34', 'PT. Inti Agro Tani'),
(25, 'PBL1692561845', '2022-05-17', '03:04:05', 'PT. Inti Agro Tani'),
(26, 'PBL1692561896', '2022-05-17', '03:04:56', 'PT. Inti Agro Tani'),
(27, 'PBL1692561919', '2022-07-22', '03:05:19', 'PT. Inti Agro Tani'),
(28, 'PBL1692562172', '2022-12-24', '03:09:32', 'PT. Inti Agro Tani'),
(29, 'PBL1692562251', '2023-01-04', '03:10:51', 'PT. Inti Agro Tani'),
(30, 'PBL1692562516', '2022-01-07', '03:15:16', 'PT. Panca Agro'),
(31, 'PBL1692562573', '2022-02-11', '03:16:13', 'PT. Panca Agro'),
(32, 'PBL1692562618', '2022-04-02', '03:16:58', 'PT. Panca Agro'),
(33, 'PBL1692562647', '2022-05-17', '03:17:27', 'PT. Panca Agro'),
(34, 'PBL1692562692', '2022-07-22', '03:18:12', 'PT. Panca Agro'),
(35, 'PBL1692562717', '2022-10-24', '03:18:37', 'PT. Panca Agro'),
(36, 'PBL1692562738', '2022-12-01', '03:18:58', 'PT. Panca Agro'),
(37, 'PBL1692562993', '2023-01-05', '03:23:13', 'PT. Panca Agro'),
(38, 'PBL1692563311', '2022-01-03', '03:28:31', 'PT. Galatta Lestari'),
(39, 'PBL1692563339', '2022-02-18', '03:28:59', 'PT. Galatta Lestari'),
(40, 'PBL1692563362', '2022-04-20', '03:29:22', 'PT. Galatta Lestari'),
(41, 'PBL1692563400', '2022-06-03', '03:30:00', 'PT. Galatta Lestari'),
(42, 'PBL1692563421', '2022-07-09', '03:30:21', 'PT. Galatta Lestari'),
(43, 'PBL1692563446', '2022-09-18', '03:30:46', 'PT. Galatta Lestari'),
(44, 'PBL1692563475', '2022-10-20', '03:31:15', 'PT. Galatta Lestari'),
(45, 'PBL1692563660', '2022-11-22', '03:34:20', 'PT. Galatta Lestari'),
(46, 'PBL1692563697', '2022-12-28', '03:34:57', 'PT. Galatta Lestari'),
(47, 'PBL1692563846', '2023-01-14', '03:37:26', 'PT. Galatta Lestari'),
(48, 'PBL1692564136', '2022-01-03', '03:42:16', 'PT. Bangun Sahabat Tani'),
(49, 'PBL1692564164', '2022-02-05', '03:42:44', 'PT. Bangun Sahabat Tani'),
(50, 'PBL1692564252', '2022-03-08', '03:44:12', 'PT. Bangun Sahabat Tani'),
(51, 'PBL1692564278', '2022-08-18', '03:44:38', 'PT. Bangun Sahabat Tani'),
(52, 'PBL1692564311', '2022-09-09', '03:45:11', 'PT. Bangun Sahabat Tani'),
(53, 'PBL1692564332', '2022-11-10', '03:45:32', 'PT. Bangun Sahabat Tani'),
(54, 'PBL1692564358', '2022-04-18', '03:45:58', 'PT. Bangun Sahabat Tani'),
(55, 'PBL1692564578', '2022-12-20', '03:49:38', 'PT. Bangun Sahabat Tani'),
(56, 'PBL1692564619', '2023-01-19', '03:50:19', 'PT. Bangun Sahabat Tani'),
(57, 'PBL1692564871', '2022-01-03', '03:54:31', 'PT. Inti Agro Tani'),
(58, 'PBL1692565066', '2022-02-05', '03:57:46', 'PT. Inti Agro Tani'),
(59, 'PBL1692565095', '2022-03-08', '03:58:15', 'PT. Inti Agro Tani'),
(60, 'PBL1692565122', '2022-08-18', '03:58:42', 'PT. Inti Agro Tani'),
(61, 'PBL1692565187', '2022-09-09', '03:59:47', 'PT. Inti Agro Tani'),
(62, 'PBL1692565216', '2022-11-10', '04:00:16', 'PT. Inti Agro Tani'),
(63, 'PBL1692565242', '2022-04-18', '04:00:42', 'PT. Inti Agro Tani'),
(64, 'PBL1692565266', '2022-12-02', '04:01:06', 'PT. Inti Agro Tani'),
(65, 'PBL1692565467', '2023-01-19', '04:04:27', 'PT. Inti Agro Tani'),
(66, 'PBL1692565542', '2023-02-13', '04:05:42', 'PT. Inti Agro Tani'),
(67, 'PBL1692565890', '2022-01-13', '04:11:30', 'PT. Galatta Lestari'),
(68, 'PBL1692565910', '2022-02-11', '04:11:50', 'PT. Galatta Lestari'),
(69, 'PBL1692565934', '2022-03-02', '04:12:14', 'PT. Galatta Lestari'),
(70, 'PBL1692565956', '2022-04-15', '04:12:36', 'PT. Galatta Lestari'),
(71, 'PBL1692565982', '2022-05-18', '04:13:02', 'PT. Galatta Lestari'),
(72, 'PBL1692566003', '2022-07-20', '04:13:23', 'PT. Galatta Lestari'),
(73, 'PBL1692566023', '2022-08-01', '04:13:43', 'PT. Galatta Lestari'),
(74, 'PBL1692566049', '2022-09-17', '04:14:09', 'PT. Galatta Lestari'),
(75, 'PBL1692566078', '2022-10-13', '04:14:38', 'PT. Galatta Lestari'),
(76, 'PBL1692566103', '2022-11-20', '04:15:03', 'PT. Galatta Lestari'),
(77, 'PBL1692566307', '2022-12-05', '04:18:27', 'PT. Galatta Lestari'),
(78, 'PBL1692566749', '2022-01-13', '04:25:49', 'PT. Inti Agro Tani'),
(79, 'PBL1692566823', '2022-02-11', '04:27:03', 'PT. Inti Agro Tani'),
(80, 'PBL1692566857', '2022-03-02', '04:27:37', 'PT. Inti Agro Tani'),
(81, 'PBL1692566887', '2022-04-15', '04:28:07', 'PT. Inti Agro Tani'),
(82, 'PBL1692566912', '2022-05-18', '04:28:32', 'PT. Inti Agro Tani'),
(83, 'PBL1692566941', '2022-07-02', '04:29:01', 'PT. Inti Agro Tani'),
(84, 'PBL1692566973', '2022-08-01', '04:29:33', 'PT. Inti Agro Tani'),
(85, 'PBL1692566999', '2022-09-17', '04:29:59', 'PT. Inti Agro Tani'),
(86, 'PBL1692567026', '2022-10-13', '04:30:26', 'PT. Inti Agro Tani'),
(87, 'PBL1692567057', '2022-11-20', '04:30:57', 'PT. Inti Agro Tani'),
(88, 'PBL1692567085', '2022-12-05', '04:31:25', 'PT. Inti Agro Tani'),
(89, 'PBL1692601452', '2023-08-21', '14:04:12', 'PT. Bangun Sahabat Tani'),
(90, 'PBL1692603111', '2023-08-21', '14:31:51', 'PT. Bangun Sahabat Tani'),
(91, 'PBL1692699694', '2023-08-22', '17:21:34', 'PT. Bangun Sahabat Tani');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilik`
--

CREATE TABLE `pemilik` (
  `pemilik_id` int(11) NOT NULL,
  `nama_toko` varchar(150) NOT NULL,
  `nama_pemilik` varchar(150) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemilik`
--

INSERT INTO `pemilik` (`pemilik_id`, `nama_toko`, `nama_pemilik`, `alamat`, `username`, `password`) VALUES
(1, 'Tani Tangah Sawah', 'Ricky Iwanda', 'Jl. Kartama 1', 'ownertts', 'ownertts');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_barang`
--

CREATE TABLE `penjualan_barang` (
  `penjualan_id` int(11) NOT NULL,
  `kode_penjualan` varchar(25) DEFAULT NULL,
  `tanggal_penjualan` date DEFAULT NULL,
  `jam_penjualan` time DEFAULT NULL,
  `expired_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penjualan_barang`
--

INSERT INTO `penjualan_barang` (`penjualan_id`, `kode_penjualan`, `tanggal_penjualan`, `jam_penjualan`, `expired_date`) VALUES
(1, 'PJL1692557957', '2022-01-02', '01:59:17', NULL),
(2, 'PJL1692557981', '2022-02-11', '01:59:41', NULL),
(3, 'PJL1692558036', '2022-03-17', '02:00:36', NULL),
(4, 'PJL1692558087', '2022-04-23', '02:01:27', NULL),
(5, 'PJL1692558169', '2022-05-14', '02:02:49', NULL),
(6, 'PJL1692558195', '2022-06-21', '02:03:15', NULL),
(7, 'PJL1692558298', '2022-07-19', '02:04:58', NULL),
(8, 'PJL1692558316', '2022-08-27', '02:05:16', NULL),
(9, 'PJL1692558337', '2022-09-01', '02:05:37', NULL),
(10, 'PJL1692558388', '2022-10-08', '02:06:28', NULL),
(11, 'PJL1692558416', '2022-11-12', '02:06:56', NULL),
(12, 'PJL1692558432', '2022-12-18', '02:07:12', NULL),
(13, 'PJL1692558520', '2023-01-03', '02:08:40', NULL),
(14, 'PJL1692558547', '2023-02-07', '02:09:07', NULL),
(30, 'PJL1692559997', '2022-01-03', '02:33:17', NULL),
(31, 'PJL1692560020', '2022-02-07', '02:33:40', NULL),
(32, 'PJL1692560033', '2022-03-18', '02:33:53', NULL),
(33, 'PJL1692560047', '2022-04-15', '02:34:07', NULL),
(34, 'PJL1692560057', '2022-05-23', '02:34:17', NULL),
(35, 'PJL1692560095', '2022-06-16', '02:34:55', NULL),
(36, 'PJL1692560125', '2022-07-27', '02:35:25', NULL),
(37, 'PJL1692560147', '2022-08-18', '02:35:47', NULL),
(38, 'PJL1692560164', '2022-09-09', '02:36:04', NULL),
(39, 'PJL1692560182', '2022-10-08', '02:36:22', NULL),
(40, 'PJL1692560200', '2022-11-30', '02:36:40', NULL),
(41, 'PJL1692560214', '2022-12-19', '02:36:54', NULL),
(42, 'PJL1692560226', '2023-01-04', '02:37:06', NULL),
(43, 'PJL1692560243', '2023-02-09', '02:37:23', NULL),
(44, 'PJL1692560523', '2022-01-04', '02:42:03', NULL),
(45, 'PJL1692560599', '2022-02-07', '02:43:19', NULL),
(46, 'PJL1692560814', '2022-03-06', '02:46:54', NULL),
(47, 'PJL1692560834', '2022-04-14', '02:47:14', NULL),
(48, 'PJL1692560849', '2022-05-20', '02:47:29', NULL),
(49, 'PJL1692560866', '2022-06-17', '02:47:46', NULL),
(50, 'PJL1692560889', '2022-07-11', '02:48:09', NULL),
(51, 'PJL1692560905', '2022-08-23', '02:48:25', NULL),
(52, 'PJL1692560922', '2022-09-29', '02:48:42', NULL),
(53, 'PJL1692560943', '2022-10-01', '02:49:03', NULL),
(54, 'PJL1692560959', '2022-11-09', '02:49:19', NULL),
(55, 'PJL1692560977', '2022-12-19', '02:49:37', NULL),
(56, 'PJL1692560994', '2023-01-05', '02:49:54', NULL),
(57, 'PJL1692561078', '2023-02-14', '02:51:18', NULL),
(58, 'PJL1692561947', '2022-01-14', '03:05:47', NULL),
(59, 'PJL1692561968', '2022-02-07', '03:06:08', NULL),
(60, 'PJL1692561986', '2022-03-18', '03:06:26', NULL),
(61, 'PJL1692562003', '2022-04-19', '03:06:43', NULL),
(62, 'PJL1692562017', '2022-05-08', '03:06:57', NULL),
(63, 'PJL1692562032', '2022-06-20', '03:07:12', NULL),
(64, 'PJL1692562048', '2022-07-11', '03:07:28', NULL),
(65, 'PJL1692562063', '2022-08-06', '03:07:43', NULL),
(66, 'PJL1692562078', '2022-09-27', '03:07:58', NULL),
(67, 'PJL1692562092', '2022-10-29', '03:08:12', NULL),
(68, 'PJL1692562114', '2022-11-30', '03:08:34', NULL),
(69, 'PJL1692562217', '2022-12-25', '03:10:17', NULL),
(70, 'PJL1692562295', '2023-01-03', '03:11:35', NULL),
(71, 'PJL1692562309', '2023-02-09', '03:11:49', NULL),
(72, 'PJL1692562769', '2022-01-10', '03:19:29', NULL),
(73, 'PJL1692562791', '2022-02-07', '03:19:51', NULL),
(74, 'PJL1692562805', '2022-03-13', '03:20:05', NULL),
(75, 'PJL1692562818', '2022-04-04', '03:20:18', NULL),
(76, 'PJL1692562834', '2022-05-20', '03:20:34', NULL),
(77, 'PJL1692562848', '2022-06-22', '03:20:48', NULL),
(78, 'PJL1692562866', '2022-07-25', '03:21:06', NULL),
(79, 'PJL1692562882', '2022-08-28', '03:21:22', NULL),
(80, 'PJL1692562896', '2022-09-27', '03:21:36', NULL),
(81, 'PJL1692562922', '2022-10-30', '03:22:02', NULL),
(82, 'PJL1692562942', '2022-11-28', '03:22:22', NULL),
(83, 'PJL1692562959', '2022-12-30', '03:22:39', NULL),
(84, 'PJL1692563045', '2023-01-03', '03:24:05', NULL),
(85, 'PJL1692563058', '2023-02-07', '03:24:18', NULL),
(86, 'PJL1692563501', '2022-01-10', '03:31:41', NULL),
(87, 'PJL1692563516', '2022-02-07', '03:31:56', NULL),
(88, 'PJL1692563529', '2022-03-18', '03:32:09', NULL),
(89, 'PJL1692563545', '2022-04-23', '03:32:25', NULL),
(90, 'PJL1692563558', '2022-05-25', '03:32:38', NULL),
(91, 'PJL1692563574', '2022-06-27', '03:32:54', NULL),
(92, 'PJL1692563587', '2022-07-28', '03:33:07', NULL),
(93, 'PJL1692563601', '2022-08-30', '03:33:21', NULL),
(94, 'PJL1692563612', '2022-09-25', '03:33:32', NULL),
(95, 'PJL1692563624', '2022-10-23', '03:33:44', NULL),
(96, 'PJL1692563723', '2022-11-20', '03:35:23', NULL),
(97, 'PJL1692563737', '2022-12-18', '03:35:37', NULL),
(98, 'PJL1692563752', '2023-01-08', '03:35:52', NULL),
(99, 'PJL1692563763', '2023-02-10', '03:36:03', NULL),
(100, 'PJL1692564399', '2022-01-10', '03:46:39', NULL),
(101, 'PJL1692564416', '2022-02-07', '03:46:56', NULL),
(102, 'PJL1692564429', '2022-03-06', '03:47:09', NULL),
(103, 'PJL1692564443', '2022-04-14', '03:47:23', NULL),
(104, 'PJL1692564454', '2022-05-20', '03:47:34', NULL),
(105, 'PJL1692564467', '2022-06-17', '03:47:47', NULL),
(106, 'PJL1692564480', '2022-07-23', '03:48:00', NULL),
(107, 'PJL1692564491', '2022-08-14', '03:48:11', NULL),
(108, 'PJL1692564502', '2022-09-26', '03:48:22', NULL),
(109, 'PJL1692564514', '2022-10-28', '03:48:34', NULL),
(110, 'PJL1692564526', '2022-11-15', '03:48:46', NULL),
(111, 'PJL1692564647', '2022-12-18', '03:50:47', NULL),
(112, 'PJL1692564661', '2023-01-20', '03:51:01', NULL),
(113, 'PJL1692564671', '2023-02-24', '03:51:11', NULL),
(114, 'PJL1692565297', '2022-01-10', '04:01:37', NULL),
(115, 'PJL1692565313', '2022-02-07', '04:01:53', NULL),
(116, 'PJL1692565327', '2022-03-06', '04:02:07', NULL),
(117, 'PJL1692565339', '2022-04-14', '04:02:19', NULL),
(118, 'PJL1692565351', '2022-05-20', '04:02:31', NULL),
(119, 'PJL1692565363', '2022-06-17', '04:02:43', NULL),
(120, 'PJL1692565374', '2022-07-23', '04:02:54', NULL),
(121, 'PJL1692565386', '2022-08-24', '04:03:06', NULL),
(122, 'PJL1692565400', '2022-09-26', '04:03:20', NULL),
(123, 'PJL1692565413', '2022-10-28', '04:03:33', NULL),
(124, 'PJL1692565424', '2022-11-15', '04:03:44', NULL),
(125, 'PJL1692565492', '2022-12-18', '04:04:52', NULL),
(126, 'PJL1692565571', '2023-01-20', '04:06:11', NULL),
(127, 'PJL1692565588', '2023-02-24', '04:06:28', NULL),
(128, 'PJL1692566126', '2022-01-14', '04:15:26', NULL),
(129, 'PJL1692566139', '2022-02-07', '04:15:39', NULL),
(130, 'PJL1692566153', '2022-03-18', '04:15:53', NULL),
(131, 'PJL1692566166', '2022-04-20', '04:16:06', NULL),
(132, 'PJL1692566177', '2022-05-25', '04:16:17', NULL),
(133, 'PJL1692566189', '2022-06-23', '04:16:29', NULL),
(134, 'PJL1692566202', '2022-07-18', '04:16:42', NULL),
(135, 'PJL1692566213', '2022-08-05', '04:16:53', NULL),
(136, 'PJL1692566224', '2022-09-19', '04:17:04', NULL),
(137, 'PJL1692566237', '2022-10-28', '04:17:17', NULL),
(138, 'PJL1692566253', '2022-11-30', '04:17:33', NULL),
(139, 'PJL1692566264', '2022-12-13', '04:17:44', NULL),
(140, 'PJL1692566278', '2023-01-20', '04:17:58', NULL),
(141, 'PJL1692566333', '2023-02-19', '04:18:53', NULL),
(142, 'PJL1692567108', '2022-01-14', '04:31:48', NULL),
(143, 'PJL1692567170', '2022-01-14', '04:32:50', NULL),
(144, 'PJL1692567190', '2022-02-07', '04:33:10', NULL),
(145, 'PJL1692567211', '2022-03-18', '04:33:31', NULL),
(146, 'PJL1692567229', '2022-04-20', '04:33:49', NULL),
(147, 'PJL1692567255', '2022-05-25', '04:34:15', NULL),
(148, 'PJL1692567272', '2022-06-23', '04:34:32', NULL),
(149, 'PJL1692567291', '2022-07-18', '04:34:51', NULL),
(150, 'PJL1692567311', '2022-08-05', '04:35:11', NULL),
(151, 'PJL1692567327', '2022-09-19', '04:35:27', NULL),
(152, 'PJL1692567351', '2022-10-28', '04:35:51', NULL),
(153, 'PJL1692567379', '2022-11-30', '04:36:19', NULL),
(154, 'PJL1692567394', '2022-12-13', '04:36:34', NULL),
(155, 'PJL1692567409', '2023-01-20', '04:36:49', NULL),
(156, 'PJL1692567438', '2023-02-19', '04:37:18', NULL),
(157, 'PJL1692601840', '2023-08-21', '14:10:40', NULL),
(158, 'PJL1692602081', '2023-08-21', '14:14:41', NULL),
(159, 'PJL1692602701', '2023-08-21', '14:25:01', NULL),
(160, 'PJL1692602872', '2023-08-21', '14:27:52', NULL),
(161, 'PJL1692605628', '2023-08-21', '15:13:48', NULL),
(162, 'PJL1692700688', '2022-02-02', '17:38:08', NULL),
(163, 'PJL1692700757', '2023-08-22', '17:39:17', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `satuan_id` int(11) NOT NULL,
  `nama_satuan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`satuan_id`, `nama_satuan`) VALUES
(1, 'PCS');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barang_id`);

--
-- Indeks untuk tabel `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`distributor_id`);

--
-- Indeks untuk tabel `expired_barang`
--
ALTER TABLE `expired_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`karyawan_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `pembelian_barang`
--
ALTER TABLE `pembelian_barang`
  ADD PRIMARY KEY (`pembelian_id`),
  ADD KEY `kode_pembelian` (`kode_pembelian`);

--
-- Indeks untuk tabel `pemilik`
--
ALTER TABLE `pemilik`
  ADD PRIMARY KEY (`pemilik_id`);

--
-- Indeks untuk tabel `penjualan_barang`
--
ALTER TABLE `penjualan_barang`
  ADD PRIMARY KEY (`penjualan_id`),
  ADD KEY `kode_penjualan` (`kode_penjualan`);

--
-- Indeks untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`satuan_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `barang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `distributor`
--
ALTER TABLE `distributor`
  MODIFY `distributor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `expired_barang`
--
ALTER TABLE `expired_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `karyawan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pembelian_barang`
--
ALTER TABLE `pembelian_barang`
  MODIFY `pembelian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT untuk tabel `pemilik`
--
ALTER TABLE `pemilik`
  MODIFY `pemilik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `penjualan_barang`
--
ALTER TABLE `penjualan_barang`
  MODIFY `penjualan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT untuk tabel `satuan`
--
ALTER TABLE `satuan`
  MODIFY `satuan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
