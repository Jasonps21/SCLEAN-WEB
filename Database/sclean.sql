-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2021 at 08:39 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sclean`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` varchar(30) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_logout` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `nama`, `email`, `password`, `status`, `last_login`, `last_logout`) VALUES
(2, 'Chandra 2', 'chandra@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Admin', '2021-02-18 12:46:40', '2021-02-18 12:04:44'),
(3, 'Jason', 'jason@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Admin', NULL, NULL),
(4, 'Testing Pemilik', 'pemilik@flash.co.id', '827ccb0eea8a706c4c34a16891f84e7b', 'Pemilik_laundry', '2021-02-18 11:54:59', '2021-02-18 12:02:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id`, `nama_kategori`) VALUES
(1, 'Bunga 1'),
(2, 'Tangkai 1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_laundry`
--

CREATE TABLE `tbl_laundry` (
  `id_laundry` varchar(40) NOT NULL,
  `nama_laundry` varchar(50) NOT NULL,
  `nomor_telepon` varchar(14) DEFAULT NULL,
  `jam_buka` time NOT NULL,
  `jam_tutup` time NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `photo` varchar(100) NOT NULL,
  `biaya_pengantaran` decimal(20,0) NOT NULL DEFAULT 0,
  `id_pemilik` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_laundry`
--

INSERT INTO `tbl_laundry` (`id_laundry`, `nama_laundry`, `nomor_telepon`, `jam_buka`, `jam_tutup`, `alamat`, `deskripsi`, `photo`, `biaya_pengantaran`, `id_pemilik`, `create_date`, `update_date`) VALUES
('3b1484cc-e3b9-4d38-af48-f10c18f302aa', 'Laundry ABC 12345', '089121212', '08:00:00', '15:00:00', 'Jl. Lembo', 'testung aja', '3b1484cc-e3b9-4d38-af48-f10c18f302aa.jpg', '60000', 2, '2021-02-11 12:49:38', '2021-02-11 12:50:05'),
('65678b8f-14f9-4d6c-9a0f-e8da79b93640', 'Laundry ABC', '08931231', '08:00:00', '15:00:00', 'apa saja lah', 'testing', '65678b8f-14f9-4d6c-9a0f-e8da79b93640.jpg', '100000', 2, '2021-01-30 03:27:49', '2021-01-30 03:48:49'),
('780bbfba-8e57-4301-8268-efb5a12a9478', 'Testing Laundry ABC 1234', '08123123', '08:30:00', '16:00:00', 'Lembo', 'Apa saja lah yah yang penting testing', '780bbfba-8e57-4301-8268-efb5a12a9478.jpg', '50000', 4, '2021-02-18 04:45:38', '2021-02-18 04:47:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_layanan_laundry`
--

CREATE TABLE `tbl_layanan_laundry` (
  `id` varchar(40) NOT NULL,
  `id_laundry` varchar(40) NOT NULL,
  `nama_layanan` varchar(100) NOT NULL,
  `estimasi` smallint(5) NOT NULL,
  `harga` decimal(30,0) NOT NULL,
  `satuan` varchar(10) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_layanan_laundry`
--

INSERT INTO `tbl_layanan_laundry` (`id`, `id_laundry`, `nama_layanan`, `estimasi`, `harga`, `satuan`, `create_date`, `update_date`) VALUES
('fe5e10ec-2e85-42b1-9e2a-1203d72f9b08', '65678b8f-14f9-4d6c-9a0f-e8da79b93640', 'Cuci + Setrika', 6, '6000', 'Kg', '2021-01-30 04:53:00', '2021-01-30 05:28:35'),
('44d93641-19a4-470e-bc70-b2dd6b08da1a', '65678b8f-14f9-4d6c-9a0f-e8da79b93640', 'Cuci Kering', 5, '7000', 'Kg', '2021-01-30 05:33:56', '2021-01-30 05:34:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemesan`
--

CREATE TABLE `tbl_pemesan` (
  `id_pesanan` varchar(40) NOT NULL,
  `nomor_pesanan` varchar(30) NOT NULL,
  `id_user` varchar(40) NOT NULL,
  `id_laundry` varchar(40) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `biaya_pengantaran` decimal(20,0) NOT NULL DEFAULT 0,
  `total` decimal(30,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `tgl_konfirmasi` datetime DEFAULT NULL,
  `tgl_status` datetime DEFAULT NULL,
  `tgl_selesai` datetime DEFAULT NULL,
  `catatan_order` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_pemesan`
--

INSERT INTO `tbl_pemesan` (`id_pesanan`, `nomor_pesanan`, `id_user`, `id_laundry`, `tgl_pesan`, `biaya_pengantaran`, `total`, `status`, `tgl_konfirmasi`, `tgl_status`, `tgl_selesai`, `catatan_order`) VALUES
('2c0a7d63-520b-4c3b-9ea2-64868833ac8b', 'INV-20210211001', 'c93777fe-3e01-402d-8876-75cf0d54cb21', '65678b8f-14f9-4d6c-9a0f-e8da79b93640', '2021-02-11 07:58:53', '100000', '139000.00', 2, '2021-02-11 20:50:24', '2021-02-11 20:50:36', '2021-02-11 20:50:36', NULL),
('2d3b79d2-876a-4d19-9244-d52f46ab24fa', 'INV-20210202002', 'c93777fe-3e01-402d-8876-75cf0d54cb21', '65678b8f-14f9-4d6c-9a0f-e8da79b93640', '2021-02-02 08:37:27', '0', '39000.00', 3, NULL, '2021-02-18 12:04:29', NULL, NULL),
('be3fb093-d55c-4984-986c-ecda68976fb3', 'INV-20210131001', 'c93777fe-3e01-402d-8876-75cf0d54cb21', '65678b8f-14f9-4d6c-9a0f-e8da79b93640', '2021-01-31 01:00:52', '0', '39000.00', 3, '2021-02-02 12:46:37', '2021-02-02 08:12:08', '2021-02-02 12:46:43', NULL),
('e6f7f2d2-30f5-4ffa-96b4-818468ac31f0', 'INV-20210202003', 'c93777fe-3e01-402d-8876-75cf0d54cb21', '65678b8f-14f9-4d6c-9a0f-e8da79b93640', '2021-02-02 08:37:35', '0', '39000.00', 2, '2021-02-18 12:04:20', '2021-02-18 12:04:22', '2021-02-18 12:04:22', NULL),
('eb016410-3d03-4672-9ca9-9eb255a7fc25', 'INV-20210202001', 'c93777fe-3e01-402d-8876-75cf0d54cb21', '65678b8f-14f9-4d6c-9a0f-e8da79b93640', '2021-02-02 08:37:14', '0', '39000.00', 2, '2021-02-09 19:33:56', '2021-02-09 19:33:58', '2021-02-09 19:33:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemesan_detail`
--

CREATE TABLE `tbl_pemesan_detail` (
  `id_pemesanan` varchar(40) NOT NULL,
  `id_layanan` varchar(40) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` decimal(20,2) NOT NULL,
  `total` decimal(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_pemesan_detail`
--

INSERT INTO `tbl_pemesan_detail` (`id_pemesanan`, `id_layanan`, `qty`, `harga`, `total`) VALUES
('be3fb093-d55c-4984-986c-ecda68976fb3', 'fe5e10ec-2e85-42b1-9e2a-1203d72f9b08', 3, '6000.00', '18000.00'),
('be3fb093-d55c-4984-986c-ecda68976fb3', '44d93641-19a4-470e-bc70-b2dd6b08da1a', 3, '7000.00', '21000.00'),
('ba994c58-dacd-415f-9094-c6a778570034', 'fe5e10ec-2e85-42b1-9e2a-1203d72f9b08', 3, '6000.00', '18000.00'),
('ba994c58-dacd-415f-9094-c6a778570034', '44d93641-19a4-470e-bc70-b2dd6b08da1a', 3, '7000.00', '21000.00'),
('aad8571c-6665-400e-9abb-5928ad08e9f4', 'fe5e10ec-2e85-42b1-9e2a-1203d72f9b08', 3, '6000.00', '18000.00'),
('aad8571c-6665-400e-9abb-5928ad08e9f4', '44d93641-19a4-470e-bc70-b2dd6b08da1a', 3, '7000.00', '21000.00'),
('3ea7ba0c-48ba-4cea-84f8-d17da36d919a', 'fe5e10ec-2e85-42b1-9e2a-1203d72f9b08', 3, '6000.00', '18000.00'),
('3ea7ba0c-48ba-4cea-84f8-d17da36d919a', '44d93641-19a4-470e-bc70-b2dd6b08da1a', 3, '7000.00', '21000.00'),
('280de6bd-acf6-446b-8c38-7e6f4d71185d', 'fe5e10ec-2e85-42b1-9e2a-1203d72f9b08', 3, '6000.00', '18000.00'),
('280de6bd-acf6-446b-8c38-7e6f4d71185d', '44d93641-19a4-470e-bc70-b2dd6b08da1a', 3, '7000.00', '21000.00'),
('fc7d3479-d7be-4bca-aaad-5898ac8c7807', 'fe5e10ec-2e85-42b1-9e2a-1203d72f9b08', 3, '6000.00', '18000.00'),
('fc7d3479-d7be-4bca-aaad-5898ac8c7807', '44d93641-19a4-470e-bc70-b2dd6b08da1a', 3, '7000.00', '21000.00'),
('0162ed9a-4f7d-4641-92a7-ef717bbaf5a9', 'fe5e10ec-2e85-42b1-9e2a-1203d72f9b08', 3, '6000.00', '18000.00'),
('0162ed9a-4f7d-4641-92a7-ef717bbaf5a9', '44d93641-19a4-470e-bc70-b2dd6b08da1a', 3, '7000.00', '21000.00'),
('fba331db-0faf-42a7-a39c-d756776fe655', 'fe5e10ec-2e85-42b1-9e2a-1203d72f9b08', 3, '6000.00', '18000.00'),
('fba331db-0faf-42a7-a39c-d756776fe655', '44d93641-19a4-470e-bc70-b2dd6b08da1a', 3, '7000.00', '21000.00'),
('d0d58fac-f718-4389-ac10-ab4af72c40f8', 'fe5e10ec-2e85-42b1-9e2a-1203d72f9b08', 3, '6000.00', '18000.00'),
('d0d58fac-f718-4389-ac10-ab4af72c40f8', '44d93641-19a4-470e-bc70-b2dd6b08da1a', 3, '7000.00', '21000.00'),
('b01294fa-c98c-4c66-8e9b-93039dd47d77', 'fe5e10ec-2e85-42b1-9e2a-1203d72f9b08', 3, '6000.00', '18000.00'),
('b01294fa-c98c-4c66-8e9b-93039dd47d77', '44d93641-19a4-470e-bc70-b2dd6b08da1a', 3, '7000.00', '21000.00'),
('d6177abc-0037-4de9-9fae-8467b343da15', 'fe5e10ec-2e85-42b1-9e2a-1203d72f9b08', 3, '6000.00', '18000.00'),
('d6177abc-0037-4de9-9fae-8467b343da15', '44d93641-19a4-470e-bc70-b2dd6b08da1a', 3, '7000.00', '21000.00'),
('eb016410-3d03-4672-9ca9-9eb255a7fc25', 'fe5e10ec-2e85-42b1-9e2a-1203d72f9b08', 3, '6000.00', '18000.00'),
('eb016410-3d03-4672-9ca9-9eb255a7fc25', '44d93641-19a4-470e-bc70-b2dd6b08da1a', 3, '7000.00', '21000.00'),
('2d3b79d2-876a-4d19-9244-d52f46ab24fa', 'fe5e10ec-2e85-42b1-9e2a-1203d72f9b08', 3, '6000.00', '18000.00'),
('2d3b79d2-876a-4d19-9244-d52f46ab24fa', '44d93641-19a4-470e-bc70-b2dd6b08da1a', 3, '7000.00', '21000.00'),
('e6f7f2d2-30f5-4ffa-96b4-818468ac31f0', 'fe5e10ec-2e85-42b1-9e2a-1203d72f9b08', 3, '6000.00', '18000.00'),
('e6f7f2d2-30f5-4ffa-96b4-818468ac31f0', '44d93641-19a4-470e-bc70-b2dd6b08da1a', 3, '7000.00', '21000.00'),
('2c0a7d63-520b-4c3b-9ea2-64868833ac8b', 'fe5e10ec-2e85-42b1-9e2a-1203d72f9b08', 3, '6000.00', '18000.00'),
('2c0a7d63-520b-4c3b-9ea2-64868833ac8b', '44d93641-19a4-470e-bc70-b2dd6b08da1a', 3, '7000.00', '21000.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_promosi`
--

CREATE TABLE `tbl_promosi` (
  `id` varchar(40) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `create_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_promosi`
--

INSERT INTO `tbl_promosi` (`id`, `photo`, `keterangan`, `tgl_awal`, `tgl_akhir`, `create_date`, `update_date`) VALUES
('1f0caafb-371a-4df8-95e5-c4d1ae7aa915', '1f0caafb-371a-4df8-95e5-c4d1ae7aa915.jpg', 'Promo Pertama dibulan februari', '2021-02-02', '2021-02-04', '2021-02-02 03:34:28', NULL),
('8afe5f4c-fcfb-4677-bc4c-b910e90fc239', '8afe5f4c-fcfb-4677-bc4c-b910e90fc239.jpg', 'Promo kedua dibulan februari', '2021-02-02', '2021-02-06', '2021-02-02 03:34:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` varchar(40) NOT NULL,
  `nama_lengkap` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nomor_hp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `kota` varchar(50) NOT NULL,
  `kecamatan` varchar(60) NOT NULL,
  `kelurahan` varchar(60) NOT NULL,
  `kode_pos` varchar(5) NOT NULL,
  `keterangan_alamat` varchar(255) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_lengkap`, `email`, `password`, `nomor_hp`, `alamat`, `status`, `kota`, `kecamatan`, `kelurahan`, `kode_pos`, `keterangan_alamat`, `create_date`, `update_date`) VALUES
('c93777fe-3e01-402d-8876-75cf0d54cb21', 'Jason', 'jason@fic.com', '$2y$10$gdxseHQzBaSrnuwVqRbCEePkAC1AefSmoNCY0umyP.cAgdth6pFO2', '08977192121', 'Jl. lembo', 1, 'Makassar', 'Tallo', 'Lembo', '90213', 'pintu warna kuning', '2021-01-30 08:55:08', '2021-01-30 09:03:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_laundry`
--
ALTER TABLE `tbl_laundry`
  ADD PRIMARY KEY (`id_laundry`) USING BTREE;

--
-- Indexes for table `tbl_pemesan`
--
ALTER TABLE `tbl_pemesan`
  ADD PRIMARY KEY (`id_pesanan`) USING BTREE;

--
-- Indexes for table `tbl_promosi`
--
ALTER TABLE `tbl_promosi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
