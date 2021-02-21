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

 Date: 21/02/2021 20:07:05
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
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_admin
-- ----------------------------
INSERT INTO `tbl_admin` VALUES (2, 'Chandra 2', 'chandra@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Admin', '2021-02-21 20:03:54', '2021-02-21 19:39:16');
INSERT INTO `tbl_admin` VALUES (3, 'Jason', 'jason@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Admin', NULL, NULL);
INSERT INTO `tbl_admin` VALUES (4, 'Testing Pemilik', 'pemilik@flash.co.id', '827ccb0eea8a706c4c34a16891f84e7b', 'Pemilik_laundry', '2021-02-21 19:39:20', '2021-02-21 19:39:47');

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
  `biaya_pengantaran` decimal(20, 0) NOT NULL DEFAULT 0,
  `id_pemilik` int(11) NOT NULL,
  `is_recommend` tinyint(1) NOT NULL DEFAULT 0,
  `create_date` datetime(0) NOT NULL,
  `update_date` datetime(0) NOT NULL,
  PRIMARY KEY (`id_laundry`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_laundry
-- ----------------------------
INSERT INTO `tbl_laundry` VALUES ('3b1484cc-e3b9-4d38-af48-f10c18f302aa', 'Laundry ABC 12345', '089121212', '08:00:00', '15:00:00', 'Jl. Lembo', 'testung aja', '3b1484cc-e3b9-4d38-af48-f10c18f302aa.jpg', 60000, 2, 1, '2021-02-11 12:49:38', '2021-02-11 12:50:05');
INSERT INTO `tbl_laundry` VALUES ('65678b8f-14f9-4d6c-9a0f-e8da79b93640', 'Laundry ABC', '08931231', '08:00:00', '15:00:00', 'apa saja lah', 'testing', '65678b8f-14f9-4d6c-9a0f-e8da79b93640.jpg', 100000, 2, 1, '2021-01-30 03:27:49', '2021-01-30 03:48:49');
INSERT INTO `tbl_laundry` VALUES ('780bbfba-8e57-4301-8268-efb5a12a9478', 'Testing Laundry ABC 1234', '08123123', '08:30:00', '16:00:00', 'Lembo', 'Apa saja lah yah yang penting testing', '780bbfba-8e57-4301-8268-efb5a12a9478.jpg', 50000, 4, 0, '2021-02-18 04:45:38', '2021-02-18 04:47:56');

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
  `biaya_pengantaran` decimal(20, 0) NOT NULL DEFAULT 0,
  `total` decimal(30, 2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `tgl_konfirmasi` datetime(0) NULL DEFAULT NULL,
  `tgl_status` datetime(0) NULL DEFAULT NULL,
  `tgl_selesai` datetime(0) NULL DEFAULT NULL,
  `catatan_order` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id_pesanan`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_pemesan
-- ----------------------------
INSERT INTO `tbl_pemesan` VALUES ('2c0a7d63-520b-4c3b-9ea2-64868833ac8b', 'INV-20210211001', 'c93777fe-3e01-402d-8876-75cf0d54cb21', '65678b8f-14f9-4d6c-9a0f-e8da79b93640', '2021-02-11 07:58:53', 100000, 139000.00, 2, '2021-02-11 20:50:24', '2021-02-11 20:50:36', '2021-02-11 20:50:36', NULL);
INSERT INTO `tbl_pemesan` VALUES ('2d3b79d2-876a-4d19-9244-d52f46ab24fa', 'INV-20210202002', 'c93777fe-3e01-402d-8876-75cf0d54cb21', '65678b8f-14f9-4d6c-9a0f-e8da79b93640', '2021-02-02 08:37:27', 0, 39000.00, 3, NULL, '2021-02-18 12:04:29', NULL, NULL);
INSERT INTO `tbl_pemesan` VALUES ('be3fb093-d55c-4984-986c-ecda68976fb3', 'INV-20210131001', 'c93777fe-3e01-402d-8876-75cf0d54cb21', '65678b8f-14f9-4d6c-9a0f-e8da79b93640', '2021-01-31 01:00:52', 0, 39000.00, 3, '2021-02-02 12:46:37', '2021-02-02 08:12:08', '2021-02-02 12:46:43', NULL);
INSERT INTO `tbl_pemesan` VALUES ('e6f7f2d2-30f5-4ffa-96b4-818468ac31f0', 'INV-20210202003', 'c93777fe-3e01-402d-8876-75cf0d54cb21', '65678b8f-14f9-4d6c-9a0f-e8da79b93640', '2021-02-02 08:37:35', 0, 39000.00, 2, '2021-02-18 12:04:20', '2021-02-18 12:04:22', '2021-02-18 12:04:22', NULL);
INSERT INTO `tbl_pemesan` VALUES ('eb016410-3d03-4672-9ca9-9eb255a7fc25', 'INV-20210202001', 'c93777fe-3e01-402d-8876-75cf0d54cb21', '65678b8f-14f9-4d6c-9a0f-e8da79b93640', '2021-02-02 08:37:14', 0, 39000.00, 2, '2021-02-09 19:33:56', '2021-02-09 19:33:58', '2021-02-09 19:33:58', NULL);

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
INSERT INTO `tbl_pemesan_detail` VALUES ('ba994c58-dacd-415f-9094-c6a778570034', 'fe5e10ec-2e85-42b1-9e2a-1203d72f9b08', 3, 6000.00, 18000.00);
INSERT INTO `tbl_pemesan_detail` VALUES ('ba994c58-dacd-415f-9094-c6a778570034', '44d93641-19a4-470e-bc70-b2dd6b08da1a', 3, 7000.00, 21000.00);
INSERT INTO `tbl_pemesan_detail` VALUES ('aad8571c-6665-400e-9abb-5928ad08e9f4', 'fe5e10ec-2e85-42b1-9e2a-1203d72f9b08', 3, 6000.00, 18000.00);
INSERT INTO `tbl_pemesan_detail` VALUES ('aad8571c-6665-400e-9abb-5928ad08e9f4', '44d93641-19a4-470e-bc70-b2dd6b08da1a', 3, 7000.00, 21000.00);
INSERT INTO `tbl_pemesan_detail` VALUES ('3ea7ba0c-48ba-4cea-84f8-d17da36d919a', 'fe5e10ec-2e85-42b1-9e2a-1203d72f9b08', 3, 6000.00, 18000.00);
INSERT INTO `tbl_pemesan_detail` VALUES ('3ea7ba0c-48ba-4cea-84f8-d17da36d919a', '44d93641-19a4-470e-bc70-b2dd6b08da1a', 3, 7000.00, 21000.00);
INSERT INTO `tbl_pemesan_detail` VALUES ('280de6bd-acf6-446b-8c38-7e6f4d71185d', 'fe5e10ec-2e85-42b1-9e2a-1203d72f9b08', 3, 6000.00, 18000.00);
INSERT INTO `tbl_pemesan_detail` VALUES ('280de6bd-acf6-446b-8c38-7e6f4d71185d', '44d93641-19a4-470e-bc70-b2dd6b08da1a', 3, 7000.00, 21000.00);
INSERT INTO `tbl_pemesan_detail` VALUES ('fc7d3479-d7be-4bca-aaad-5898ac8c7807', 'fe5e10ec-2e85-42b1-9e2a-1203d72f9b08', 3, 6000.00, 18000.00);
INSERT INTO `tbl_pemesan_detail` VALUES ('fc7d3479-d7be-4bca-aaad-5898ac8c7807', '44d93641-19a4-470e-bc70-b2dd6b08da1a', 3, 7000.00, 21000.00);
INSERT INTO `tbl_pemesan_detail` VALUES ('0162ed9a-4f7d-4641-92a7-ef717bbaf5a9', 'fe5e10ec-2e85-42b1-9e2a-1203d72f9b08', 3, 6000.00, 18000.00);
INSERT INTO `tbl_pemesan_detail` VALUES ('0162ed9a-4f7d-4641-92a7-ef717bbaf5a9', '44d93641-19a4-470e-bc70-b2dd6b08da1a', 3, 7000.00, 21000.00);
INSERT INTO `tbl_pemesan_detail` VALUES ('fba331db-0faf-42a7-a39c-d756776fe655', 'fe5e10ec-2e85-42b1-9e2a-1203d72f9b08', 3, 6000.00, 18000.00);
INSERT INTO `tbl_pemesan_detail` VALUES ('fba331db-0faf-42a7-a39c-d756776fe655', '44d93641-19a4-470e-bc70-b2dd6b08da1a', 3, 7000.00, 21000.00);
INSERT INTO `tbl_pemesan_detail` VALUES ('d0d58fac-f718-4389-ac10-ab4af72c40f8', 'fe5e10ec-2e85-42b1-9e2a-1203d72f9b08', 3, 6000.00, 18000.00);
INSERT INTO `tbl_pemesan_detail` VALUES ('d0d58fac-f718-4389-ac10-ab4af72c40f8', '44d93641-19a4-470e-bc70-b2dd6b08da1a', 3, 7000.00, 21000.00);
INSERT INTO `tbl_pemesan_detail` VALUES ('b01294fa-c98c-4c66-8e9b-93039dd47d77', 'fe5e10ec-2e85-42b1-9e2a-1203d72f9b08', 3, 6000.00, 18000.00);
INSERT INTO `tbl_pemesan_detail` VALUES ('b01294fa-c98c-4c66-8e9b-93039dd47d77', '44d93641-19a4-470e-bc70-b2dd6b08da1a', 3, 7000.00, 21000.00);
INSERT INTO `tbl_pemesan_detail` VALUES ('d6177abc-0037-4de9-9fae-8467b343da15', 'fe5e10ec-2e85-42b1-9e2a-1203d72f9b08', 3, 6000.00, 18000.00);
INSERT INTO `tbl_pemesan_detail` VALUES ('d6177abc-0037-4de9-9fae-8467b343da15', '44d93641-19a4-470e-bc70-b2dd6b08da1a', 3, 7000.00, 21000.00);
INSERT INTO `tbl_pemesan_detail` VALUES ('eb016410-3d03-4672-9ca9-9eb255a7fc25', 'fe5e10ec-2e85-42b1-9e2a-1203d72f9b08', 3, 6000.00, 18000.00);
INSERT INTO `tbl_pemesan_detail` VALUES ('eb016410-3d03-4672-9ca9-9eb255a7fc25', '44d93641-19a4-470e-bc70-b2dd6b08da1a', 3, 7000.00, 21000.00);
INSERT INTO `tbl_pemesan_detail` VALUES ('2d3b79d2-876a-4d19-9244-d52f46ab24fa', 'fe5e10ec-2e85-42b1-9e2a-1203d72f9b08', 3, 6000.00, 18000.00);
INSERT INTO `tbl_pemesan_detail` VALUES ('2d3b79d2-876a-4d19-9244-d52f46ab24fa', '44d93641-19a4-470e-bc70-b2dd6b08da1a', 3, 7000.00, 21000.00);
INSERT INTO `tbl_pemesan_detail` VALUES ('e6f7f2d2-30f5-4ffa-96b4-818468ac31f0', 'fe5e10ec-2e85-42b1-9e2a-1203d72f9b08', 3, 6000.00, 18000.00);
INSERT INTO `tbl_pemesan_detail` VALUES ('e6f7f2d2-30f5-4ffa-96b4-818468ac31f0', '44d93641-19a4-470e-bc70-b2dd6b08da1a', 3, 7000.00, 21000.00);
INSERT INTO `tbl_pemesan_detail` VALUES ('2c0a7d63-520b-4c3b-9ea2-64868833ac8b', 'fe5e10ec-2e85-42b1-9e2a-1203d72f9b08', 3, 6000.00, 18000.00);
INSERT INTO `tbl_pemesan_detail` VALUES ('2c0a7d63-520b-4c3b-9ea2-64868833ac8b', '44d93641-19a4-470e-bc70-b2dd6b08da1a', 3, 7000.00, 21000.00);

-- ----------------------------
-- Table structure for tbl_promosi
-- ----------------------------
DROP TABLE IF EXISTS `tbl_promosi`;
CREATE TABLE `tbl_promosi`  (
  `id` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `create_date` datetime(0) NULL DEFAULT NULL,
  `update_date` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_promosi
-- ----------------------------
INSERT INTO `tbl_promosi` VALUES ('1f0caafb-371a-4df8-95e5-c4d1ae7aa915', '1f0caafb-371a-4df8-95e5-c4d1ae7aa915.jpg', 'Promo Pertama dibulan februari', '2021-02-02', '2021-02-04', '2021-02-02 03:34:28', NULL);
INSERT INTO `tbl_promosi` VALUES ('8afe5f4c-fcfb-4677-bc4c-b910e90fc239', '8afe5f4c-fcfb-4677-bc4c-b910e90fc239.jpg', 'Promo kedua dibulan februari', '2021-02-02', '2021-02-06', '2021-02-02 03:34:53', NULL);

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
