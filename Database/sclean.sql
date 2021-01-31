/*
 Navicat Premium Data Transfer

 Source Server         : locahost
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : sclean

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 31/01/2021 08:52:36
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_admin
-- ----------------------------
DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE `tbl_admin`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `last_login` datetime(0) NULL DEFAULT NULL,
  `last_logout` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_admin
-- ----------------------------
INSERT INTO `tbl_admin` VALUES (2, 'Chandra 2', 'chandra@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Admin', '2021-01-30 16:04:16', '2021-01-30 09:17:13');
INSERT INTO `tbl_admin` VALUES (3, 'Jason', 'jason@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Admin', NULL, NULL);

-- ----------------------------
-- Table structure for tbl_kategori
-- ----------------------------
DROP TABLE IF EXISTS `tbl_kategori`;
CREATE TABLE `tbl_kategori`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_kategori
-- ----------------------------
INSERT INTO `tbl_kategori` VALUES (1, 'Bunga 1');
INSERT INTO `tbl_kategori` VALUES (2, 'Tangkai 1');

-- ----------------------------
-- Table structure for tbl_laundry
-- ----------------------------
DROP TABLE IF EXISTS `tbl_laundry`;
CREATE TABLE `tbl_laundry`  (
  `id_laundry` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_laundry` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nomor_telepon` varchar(14) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jam_buka` time(0) NOT NULL,
  `jam_tutup` time(0) NOT NULL,
  `alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `deskripsi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `photo` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `create_date` datetime(0) NOT NULL,
  `update_date` datetime(0) NOT NULL,
  PRIMARY KEY (`id_laundry`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_laundry
-- ----------------------------
INSERT INTO `tbl_laundry` VALUES ('65678b8f-14f9-4d6c-9a0f-e8da79b93640', 'Laundry ABC', '08931231', '08:00:00', '15:00:00', 'apa saja lah', 'testing', '65678b8f-14f9-4d6c-9a0f-e8da79b93640.jpg', '2021-01-30 03:27:49', '2021-01-30 03:48:49');

-- ----------------------------
-- Table structure for tbl_layanan_laundry
-- ----------------------------
DROP TABLE IF EXISTS `tbl_layanan_laundry`;
CREATE TABLE `tbl_layanan_laundry`  (
  `id` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_laundry` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_layanan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estimasi` smallint(5) NOT NULL,
  `harga` decimal(30, 0) NOT NULL,
  `satuan` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `create_date` datetime(0) NULL DEFAULT NULL,
  `update_date` datetime(0) NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_layanan_laundry
-- ----------------------------
INSERT INTO `tbl_layanan_laundry` VALUES ('fe5e10ec-2e85-42b1-9e2a-1203d72f9b08', '65678b8f-14f9-4d6c-9a0f-e8da79b93640', 'Cuci + Setrika', 6, 6000, 'Kg', '2021-01-30 04:53:00', '2021-01-30 05:28:35');
INSERT INTO `tbl_layanan_laundry` VALUES ('44d93641-19a4-470e-bc70-b2dd6b08da1a', '65678b8f-14f9-4d6c-9a0f-e8da79b93640', 'Cuci Kering', 5, 7000, 'Kg', '2021-01-30 05:33:56', '2021-01-30 05:34:33');

-- ----------------------------
-- Table structure for tbl_pemesan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_pemesan`;
CREATE TABLE `tbl_pemesan`  (
  `id_pesanan` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nomor_pesanan` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_user` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_laundry` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_pesan` datetime(0) NOT NULL,
  `total` decimal(30, 2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `tgl_bayar` datetime(0) NULL DEFAULT NULL,
  `tgl_status` datetime(0) NULL DEFAULT NULL,
  `tgl_pengantaran` datetime(0) NULL DEFAULT NULL,
  `catatan_order` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id_pesanan`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_pemesan
-- ----------------------------
INSERT INTO `tbl_pemesan` VALUES ('be3fb093-d55c-4984-986c-ecda68976fb3', 'INV-20210131001', 'c93777fe-3e01-402d-8876-75cf0d54cb21', '65678b8f-14f9-4d6c-9a0f-e8da79b93640', '2021-01-31 01:00:52', 39000.00, 0, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for tbl_pemesan_detail
-- ----------------------------
DROP TABLE IF EXISTS `tbl_pemesan_detail`;
CREATE TABLE `tbl_pemesan_detail`  (
  `id_pemesanan` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_layanan` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` decimal(20, 2) NOT NULL,
  `total` decimal(20, 2) NOT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_pemesan_detail
-- ----------------------------
INSERT INTO `tbl_pemesan_detail` VALUES ('be3fb093-d55c-4984-986c-ecda68976fb3', 'fe5e10ec-2e85-42b1-9e2a-1203d72f9b08', 3, 6000.00, 18000.00);
INSERT INTO `tbl_pemesan_detail` VALUES ('be3fb093-d55c-4984-986c-ecda68976fb3', '44d93641-19a4-470e-bc70-b2dd6b08da1a', 3, 7000.00, 21000.00);

-- ----------------------------
-- Table structure for tbl_user
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user`  (
  `id_user` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_lengkap` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nomor_hp` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `kota` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kecamatan` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kelurahan` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kode_pos` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `keterangan_alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `create_date` datetime(0) NULL DEFAULT NULL,
  `update_date` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO `tbl_user` VALUES ('c93777fe-3e01-402d-8876-75cf0d54cb21', 'Jason', 'jason@fic.com', '$2y$10$gdxseHQzBaSrnuwVqRbCEePkAC1AefSmoNCY0umyP.cAgdth6pFO2', '08977192121', 'Jl. lembo', 1, 'Makassar', 'Tallo', 'Lembo', '90213', 'pintu warna kuning', '2021-01-30 08:55:08', '2021-01-30 09:03:07');

SET FOREIGN_KEY_CHECKS = 1;
