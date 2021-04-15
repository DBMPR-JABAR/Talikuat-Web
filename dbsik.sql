/*
 Navicat Premium Data Transfer

 Source Server         : localDB
 Source Server Type    : MySQL
 Source Server Version : 100418
 Source Host           : localhost:3306
 Source Schema         : dbsik

 Target Server Type    : MySQL
 Target Server Version : 100418
 File Encoding         : 65001

 Date: 11/04/2021 17:37:39
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for absen
-- ----------------------------
DROP TABLE IF EXISTS `absen`;
CREATE TABLE `absen`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nik` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nama` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_pulang` time NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tanpa_absen_pulang` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `foto_masuk` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `foto_pulang` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nama_ppk` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 119 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of absen
-- ----------------------------
INSERT INTO `absen` VALUES (14, '123456789', 'PT. JASA MITRA MANUNGGAL', '11:29:00', '11:31:00', '2020-10-01', '', '0', '2610202011292220180223_072031.jpg', '2610202011311520180223_071837.jpg', 'PPK1');
INSERT INTO `absen` VALUES (15, '123456789', 'PT. JASA MITRA MANUNGGAL', '16:01:54', '16:01:54', '2020-10-02', '', '', '', '', 'PPK1');
INSERT INTO `absen` VALUES (17, '123344598', 'PT. JASA ', '14:55:44', '14:55:44', '2020-10-01', '', '', '', '', 'PPK2');

-- ----------------------------
-- Table structure for bahan_material
-- ----------------------------
DROP TABLE IF EXISTS `bahan_material`;
CREATE TABLE `bahan_material`  (
  `id_pek` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_mandor` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jenis_pekerjaan` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal` date NOT NULL,
  `rule` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_bahan1` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jum_bahan1` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `satuan1` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_bahan2` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jum_bahan2` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `satuan2` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_bahan3` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jum_bahan3` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `satuan3` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_bahan4` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jum_bahan4` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `satuan4` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_bahan5` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jum_bahan5` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `satuan5` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_bahan6` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jum_bahan6` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `satuan6` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_bahan7` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jum_bahan7` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `satuan7` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_bahan8` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jum_bahan8` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `satuan8` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_bahan9` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jum_bahan9` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `satuan9` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_bahan10` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jum_bahan10` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `satuan10` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_bahan11` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jum_bahan11` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `satuan11` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_bahan12` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jum_bahan12` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `satuan12` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_bahan13` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jum_bahan13` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `satuan13` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_bahan14` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jum_bahan14` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `satuan14` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_bahan15` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jum_bahan15` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `satuan15` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `uptd_id` int NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of bahan_material
-- ----------------------------

-- ----------------------------
-- Table structure for data_umum
-- ----------------------------
DROP TABLE IF EXISTS `data_umum`;
CREATE TABLE `data_umum`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `pemda` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `opd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `unor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_paket` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_kontrak` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_kontrak` date NOT NULL,
  `nilai_kontrak` decimal(20, 2) NOT NULL,
  `no_spmk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_spmk` date NOT NULL,
  `panjang_km` int NOT NULL,
  `lama_waktu` int NOT NULL,
  `ppk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `penyedia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `konsultan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_ppk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_se` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_gs` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_adendum` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_umum
-- ----------------------------
INSERT INTO `data_umum` VALUES (1, 'PEMERINTAH PROVINSI JAWA BARAT', 'DINAS BINA MARGA DAN PENATAAN RUANG', 'UPTD-II', 'Pembangunan', 'TES INPUT', 'sad231312', '2021-04-06', 12334123.00, 'wadawd', '2021-04-06', 20, 231, 'daasd', 'PT. SECON DWITUNGGAL PUTRA KSO PT.NUANSA GALAXY', 'PT. SEECONS , PT. PURI DIMENSI', 'Sonhaji, ST', 'wqeqwe', 'wqeqsdsad', 0, '2021-04-06 16:36:12', '2021-04-11 01:56:28');
INSERT INTO `data_umum` VALUES (2, 'PEMERINTAH PROVINSI JAWA BARAT', 'DINAS BINA MARGA DAN PENATAAN RUANG', 'UPTD-III', 'Pembangunan', 'TES INPUT AJAX', 'sad231312', '2021-04-06', 12334123.00, 'wadawd', '2021-04-06', 20, 21, 'daasd', 'PT .BINA INFRA', 'PT. SEECONS , PT. PURI DIMENSI', 'Ayi Gunari Arifin, ST. M.Si', 'wqeqwe', 'wqeqsdsad', 0, '2021-04-06 16:44:20', NULL);
INSERT INTO `data_umum` VALUES (3, 'PEMERINTAH PROVINSI JAWA BARAT', 'DINAS BINA MARGA DAN PENATAAN RUANG', 'UPTD-III', 'Pembangunan', 'TES INPUT', '123', '2021-04-06', 123123213123.00, 'wadawd', '2021-04-06', 20, 231, 'daasd', 'PT. AMBER HASYA', 'PT. SEECONS , PT. PURI DIMENSI', 'Maman Firmansyah, ST', 'wqeqwe', 'wqeqsdsad', 0, '2021-04-06 21:29:35', NULL);
INSERT INTO `data_umum` VALUES (4, 'PEMERINTAH PROVINSI JAWA BARAT', 'DINAS BINA MARGA DAN PENATAAN RUANG', 'UPTD-III', 'Pembangunan', 'TES INPUT', 'sad231312', '2021-04-07', 123122222.00, 'wadawd', '2021-04-07', 20, 231, 'daasd', 'LIKATAMA - MANGGALA KSO.', 'PT. WIN SOLUTION KONSUTAN, PT. GARIS PUTIH SEJAJAR, PT. EZZY ANUGRAH KSO', 'Rachmat Rustandi, ST', 'wqeqwe', 'wqeqsdsad', 1, '2021-04-07 10:15:26', NULL);
INSERT INTO `data_umum` VALUES (5, 'PEMERINTAH PROVINSI JAWA BARAT', 'DINAS BINA MARGA DAN PENATAAN RUANG', 'UPTD-III', 'Pembangunan', 'PEMBANGUNAN UPLOAD', 'sad231312', '2021-04-08', 1000000000.00, 'wadawd', '2021-04-08', 20, 231, 'daasd', 'PT. AMBER HASYA', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'Rachmat Rustandi, ST', 'wqeqwe', 'wqeqsdsad', 1, '2021-04-08 21:15:25', NULL);
INSERT INTO `data_umum` VALUES (6, 'PEMERINTAH PROVINSI JAWA BARAT', 'DINAS BINA MARGA DAN PENATAAN RUANG', 'UPTD-II', 'Pembangunan', 'REHAB UPLOAD', 'sad231312', '2021-04-08', 1234542.00, 'wadawd', '2021-04-08', 20, 231, 'daasd', 'LIKATAMA - MANGGALA KSO.', 'PT. WIN SOLUTION KONSUTAN, PT. GARIS PUTIH SEJAJAR, PT. EZZY ANUGRAH KSO', 'Ayi Gunari Arifin, ST. M.Si', 'awd', 'wqeqsdsad', 1, '2021-04-10 07:05:12', '2021-04-10 14:06:44');
INSERT INTO `data_umum` VALUES (8, 'PEMERINTAH PROVINSI JAWA BARAT', 'DINAS BINA MARGA DAN PENATAAN RUANG', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - II', 'Pembangunan', 'TES UPDATE', 'sad231312', '2021-04-10', 5555555555.00, 'wadawd', '2021-04-10', 20, 231, 'daasd', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'PT. SEECONS , PT. PURI DIMENSI', 'Dola Adrena Iskandar, ST, M.Si', 'wqeqwe', 'wqeqsdsad', 1, '2021-04-10 15:36:42', '2021-04-10 21:19:44');

-- ----------------------------
-- Table structure for data_umum_adendum
-- ----------------------------
DROP TABLE IF EXISTS `data_umum_adendum`;
CREATE TABLE `data_umum_adendum`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `pemda` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `opd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `unor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_paket` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_kontrak` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_kontrak` date NOT NULL,
  `nilai_kontrak` decimal(20, 2) NOT NULL,
  `no_spmk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_spmk` date NOT NULL,
  `panjang_km` int NOT NULL,
  `lama_waktu` int NOT NULL,
  `ppk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `penyedia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `konsultan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_ppk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_se` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_gs` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_data_umum` bigint NULL DEFAULT NULL,
  `is_adendum` bigint UNSIGNED NULL DEFAULT NULL,
  `adendum` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_umum_adendum
-- ----------------------------
INSERT INTO `data_umum_adendum` VALUES (1, 'PEMERINTAH PROVINSI JAWA BARAT', 'DINAS BINA MARGA DAN PENATAAN RUANG', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - II', 'Pembangunan', 'TES UPDATE', 'sad231312', '2021-04-10', 5555555555.00, 'wadawd', '2021-04-10', 20, 231, 'daasd', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'PT. SEECONS , PT. PURI DIMENSI', 'Dola Adrena Iskandar, ST, M.Si', 'wqeqwe', 'wqeqsdsad', '2021-04-10 18:15:48', NULL, 8, 1, 'Adendum 1');
INSERT INTO `data_umum_adendum` VALUES (2, 'PEMERINTAH PROVINSI JAWA BARAT', 'DINAS BINA MARGA DAN PENATAAN RUANG', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - II', 'Pembangunan', 'TES UPDATE', 'sad231312', '2021-04-10', 5555555555.00, 'wadawd', '2021-04-10', 20, 231, 'daasd', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'PT. SEECONS , PT. PURI DIMENSI', 'Dola Adrena Iskandar, ST, M.Si', 'wqeqwe', 'wqeqsdsad', '2021-04-10 18:46:05', NULL, 8, 1, 'Adendum 2');
INSERT INTO `data_umum_adendum` VALUES (3, 'PEMERINTAH PROVINSI JAWA BARAT', 'DINAS BINA MARGA DAN PENATAAN RUANG', 'UPTD-II', 'Pembangunan', 'REHAB UPLOAD', 'sad231312', '2021-04-08', 1234542.00, 'wadawd', '2021-04-08', 20, 231, 'daasd', 'LIKATAMA - MANGGALA KSO.', 'PT. WIN SOLUTION KONSUTAN, PT. GARIS PUTIH SEJAJAR, PT. EZZY ANUGRAH KSO', 'Ayi Gunari Arifin, ST. M.Si', 'awd', 'wqeqsdsad', '2021-04-11 07:27:12', NULL, 6, NULL, 'Adendum 1');
INSERT INTO `data_umum_adendum` VALUES (4, 'PEMERINTAH PROVINSI JAWA BARAT', 'DINAS BINA MARGA DAN PENATAAN RUANG', 'UPTD-III', 'Pembangunan', 'PEMBANGUNAN UPLOAD', 'sad231312', '2021-04-08', 1000000000.00, 'wadawd', '2021-04-08', 20, 231, 'daasd', 'PT. AMBER HASYA', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'Rachmat Rustandi, ST', 'wqeqwe', 'wqeqsdsad', '2021-04-11 10:14:05', NULL, 5, 1, 'Adendum 1');
INSERT INTO `data_umum_adendum` VALUES (5, 'PEMERINTAH PROVINSI JAWA BARAT', 'DINAS BINA MARGA DAN PENATAAN RUANG', 'UPTD-III', 'Pembangunan', 'PEMBANGUNAN UPLOAD', 'sad231312', '2021-04-08', 1000000000.00, 'wadawd', '2021-04-08', 20, 231, 'daasd', 'PT. AMBER HASYA', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'Rachmat Rustandi, ST', 'wqeqwe', 'wqeqsdsad', '2021-04-11 10:17:40', NULL, 5, NULL, 'Adendum 2');
INSERT INTO `data_umum_adendum` VALUES (6, 'PEMERINTAH PROVINSI JAWA BARAT', 'DINAS BINA MARGA DAN PENATAAN RUANG', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - II', 'Pembangunan', 'TES UPDATE', 'sad231312', '2021-04-10', 5555555555.00, 'wadawd', '2021-04-10', 20, 231, 'daasd', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'PT. SEECONS , PT. PURI DIMENSI', 'Dola Adrena Iskandar, ST, M.Si', 'wqeqwe', 'wqeqsdsad', '2021-04-11 10:27:24', NULL, 8, NULL, 'Adendum 3');
INSERT INTO `data_umum_adendum` VALUES (7, 'PEMERINTAH PROVINSI JAWA BARAT', 'DINAS BINA MARGA DAN PENATAAN RUANG', 'UPTD-III', 'Pembangunan', 'TES INPUT', 'sad231312', '2021-04-07', 123122222.00, 'wadawd', '2021-04-07', 20, 231, 'daasd', 'LIKATAMA - MANGGALA KSO.', 'PT. WIN SOLUTION KONSUTAN, PT. GARIS PUTIH SEJAJAR, PT. EZZY ANUGRAH KSO', 'Rachmat Rustandi, ST', 'wqeqwe', 'wqeqsdsad', '2021-04-11 10:29:40', NULL, 4, NULL, 'Adendum 1');

-- ----------------------------
-- Table structure for data_umum_ruas
-- ----------------------------
DROP TABLE IF EXISTS `data_umum_ruas`;
CREATE TABLE `data_umum_ruas`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_data_umum` bigint UNSIGNED NOT NULL,
  `ruas_jalan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `segment_jalan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat_awal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_awal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat_akhir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_akhir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 38 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_umum_ruas
-- ----------------------------
INSERT INTO `data_umum_ruas` VALUES (14, 2, '25913K', '123', '123', '123', '123', '123', '2021-04-06 16:44:20', NULL);
INSERT INTO `data_umum_ruas` VALUES (15, 3, 'Jl. Kapten Tendean (Subang) - 25913K - 1830', '123', '123', '123', '123', '123', '2021-04-06 21:29:35', NULL);
INSERT INTO `data_umum_ruas` VALUES (16, 4, 'Jl. Mesjid Agung (Subang) - 26112K - 430', '123', '123', '123', '123', '123', '2021-04-07 10:15:26', NULL);
INSERT INTO `data_umum_ruas` VALUES (17, 5, 'Jl. Kapten Tendean (Subang) - 25913K - 1830', '123', '123', '123', '123', '123', '2021-04-08 21:15:25', NULL);
INSERT INTO `data_umum_ruas` VALUES (18, 6, 'Jl. Raya Sagaranten (Sagaranten) - 19115K - 540', '123', '123', '123', '123', '123', '2021-04-08 21:20:40', NULL);
INSERT INTO `data_umum_ruas` VALUES (34, 8, 'Garut - Bts. Garut/Tasikmalaya - 345000 - 13350', '123', '123', '123', '123', '123', '2021-04-10 21:19:44', NULL);
INSERT INTO `data_umum_ruas` VALUES (35, 8, 'Garut - Bts. Garut/Tasikmalaya - 345000 - 13350', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', '2021-04-10 21:19:44', NULL);
INSERT INTO `data_umum_ruas` VALUES (37, 1, '19115K', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', '2021-04-11 01:56:28', NULL);

-- ----------------------------
-- Table structure for data_umum_ruas_adendum
-- ----------------------------
DROP TABLE IF EXISTS `data_umum_ruas_adendum`;
CREATE TABLE `data_umum_ruas_adendum`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_data_umum_adendum` bigint UNSIGNED NOT NULL,
  `ruas_jalan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `segment_jalan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat_awal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_awal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat_akhir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_akhir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `adendum` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_umum_ruas_adendum
-- ----------------------------
INSERT INTO `data_umum_ruas_adendum` VALUES (1, 8, 'Garut - Bts. Garut/Tasikmalaya - 345000 - 13350', '123', '123', '123', '123', '123', '2021-04-10 18:15:48', NULL, 'Adendum 1');
INSERT INTO `data_umum_ruas_adendum` VALUES (2, 8, 'Garut - Bts. Garut/Tasikmalaya - 345000 - 13350', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', '2021-04-10 18:15:48', NULL, 'Adendum 1');
INSERT INTO `data_umum_ruas_adendum` VALUES (3, 8, 'Garut - Bts. Garut/Tasikmalaya - 345000 - 13350', '123', '123', '123', '123', '123', '2021-04-10 18:46:05', NULL, 'Adendum 2');
INSERT INTO `data_umum_ruas_adendum` VALUES (4, 8, 'Garut - Bts. Garut/Tasikmalaya - 345000 - 13350', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', '2021-04-10 18:46:05', NULL, 'Adendum 2');
INSERT INTO `data_umum_ruas_adendum` VALUES (5, 6, 'Jl. Raya Sagaranten (Sagaranten) - 19115K - 540', '123', '123', '123', '123', '123', '2021-04-11 07:27:12', NULL, 'Adendum 1');
INSERT INTO `data_umum_ruas_adendum` VALUES (6, 5, 'Jl. Kapten Tendean (Subang) - 25913K - 1830', '123', '123', '123', '123', '123', '2021-04-11 10:14:05', NULL, 'Adendum 1');
INSERT INTO `data_umum_ruas_adendum` VALUES (7, 5, 'Jl. Kapten Tendean (Subang) - 25913K - 1830', '123', '123', '123', '123', '123', '2021-04-11 10:17:40', NULL, 'Adendum 2');
INSERT INTO `data_umum_ruas_adendum` VALUES (8, 8, 'Garut - Bts. Garut/Tasikmalaya - 345000 - 13350', '123', '123', '123', '123', '123', '2021-04-11 10:27:24', NULL, 'Adendum 3');
INSERT INTO `data_umum_ruas_adendum` VALUES (9, 8, 'Garut - Bts. Garut/Tasikmalaya - 345000 - 13350', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', '2021-04-11 10:27:24', NULL, 'Adendum 3');
INSERT INTO `data_umum_ruas_adendum` VALUES (10, 4, 'Jl. Mesjid Agung (Subang) - 26112K - 430', '123', '123', '123', '123', '123', '2021-04-11 10:29:40', NULL, 'Adendum 1');

-- ----------------------------
-- Table structure for detail_jadual
-- ----------------------------
DROP TABLE IF EXISTS `detail_jadual`;
CREATE TABLE `detail_jadual`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_jadual` int NOT NULL,
  `tgl` date NOT NULL,
  `nmp` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `uraian` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `satuan` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `harga_satuan` decimal(20, 3) NOT NULL,
  `volume` decimal(20, 3) NOT NULL,
  `jumlah_harga` decimal(20, 3) NOT NULL,
  `bobot` decimal(20, 3) NOT NULL,
  `koefisien` decimal(20, 3) NOT NULL,
  `nilai` decimal(20, 3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id`(`id_jadual`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of detail_jadual
-- ----------------------------
INSERT INTO `detail_jadual` VALUES (5, 4, '2019-08-01', '7.10.(2)', 'Mobilisasi', 'LS', 99370000.000, 1.000, 99370000.000, 3.950, 28.000, 0.141, '2021-04-09 02:48:16', NULL);
INSERT INTO `detail_jadual` VALUES (6, 4, '2019-08-02', '7.10.(2)', 'Mobilisasi', 'LS', 89270000.000, 1.000, 99370000.000, 4.000, 29.000, 0.152, '2021-04-09 02:48:16', NULL);
INSERT INTO `detail_jadual` VALUES (7, 4, '2019-08-03', '7.10.(2)', 'Pasangan Batu Kosong', 'M3', 99370000.000, 2.000, 99370000.000, 5.000, 30.000, 0.162, '2021-04-09 02:48:16', NULL);
INSERT INTO `detail_jadual` VALUES (8, 4, '2019-08-04', '7.10.(2)', 'Pasangan Batu kosong', 'M3', 89270000.000, 2.000, 99370000.000, 5.000, 28.000, 0.170, '2021-04-09 02:48:16', NULL);
INSERT INTO `detail_jadual` VALUES (9, 5, '2019-08-01', '7.10.(2)', 'Mobilisasi', 'LS', 99370000.000, 1.000, 99370000.000, 3.950, 28.000, 0.141, '2021-04-11 17:29:26', NULL);
INSERT INTO `detail_jadual` VALUES (10, 5, '2019-08-02', '7.10.(2)', 'Mobilisasi', 'LS', 89270000.000, 1.000, 99370000.000, 4.000, 29.000, 0.152, '2021-04-11 17:29:26', NULL);
INSERT INTO `detail_jadual` VALUES (11, 5, '2019-08-03', '7.10.(2)', 'Pasangan Batu Kosong', 'M3', 99370000.000, 2.000, 99370000.000, 5.000, 30.000, 0.162, '2021-04-11 17:29:26', NULL);
INSERT INTO `detail_jadual` VALUES (12, 5, '2019-08-04', '7.10.(2)', 'Pasangan Batu kosong', 'M3', 89270000.000, 2.000, 99370000.000, 5.000, 28.000, 0.170, '2021-04-11 17:29:26', NULL);

-- ----------------------------
-- Table structure for detail_laporan_harian_bahan
-- ----------------------------
DROP TABLE IF EXISTS `detail_laporan_harian_bahan`;
CREATE TABLE `detail_laporan_harian_bahan`  (
  `id_kegiatan` int NOT NULL,
  `no_trans` int NOT NULL,
  `bahan` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `volume` int NOT NULL,
  `satuan` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_kegiatan`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of detail_laporan_harian_bahan
-- ----------------------------
INSERT INTO `detail_laporan_harian_bahan` VALUES (2, 4, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (3, 5, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (4, 7, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (5, 8, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (6, 9, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (7, 10, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (8, 11, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (9, 12, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (10, 13, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (11, 14, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (12, 15, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (13, 16, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (14, 17, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (15, 18, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (16, 19, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (17, 20, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (18, 21, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (19, 22, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (20, 23, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (21, 24, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (22, 25, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (23, 26, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (24, 27, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (25, 28, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (26, 29, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (27, 30, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (28, 31, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (29, 32, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (30, 33, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (31, 34, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (32, 35, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (33, 36, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (34, 37, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (35, 38, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (36, 39, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (37, 40, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (38, 41, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (39, 42, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (40, 43, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (41, 44, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (42, 45, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (43, 46, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (44, 47, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (45, 48, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (46, 49, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (47, 50, '0', 0, '1');
INSERT INTO `detail_laporan_harian_bahan` VALUES (48, 50, '0', 0, '1');
INSERT INTO `detail_laporan_harian_bahan` VALUES (49, 50, '0', 0, '1');
INSERT INTO `detail_laporan_harian_bahan` VALUES (50, 50, '0', 0, '15');
INSERT INTO `detail_laporan_harian_bahan` VALUES (51, 51, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (52, 52, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (53, 53, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (54, 54, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (55, 54, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (56, 54, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (57, 55, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (58, 56, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (59, 56, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (60, 56, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (61, 57, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (62, 58, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (63, 59, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (64, 60, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (65, 60, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (66, 60, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (67, 61, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (70, 62, '', 0, '');
INSERT INTO `detail_laporan_harian_bahan` VALUES (71, 62, '', 0, '');
INSERT INTO `detail_laporan_harian_bahan` VALUES (72, 62, '', 0, '');
INSERT INTO `detail_laporan_harian_bahan` VALUES (73, 62, '', 0, '');
INSERT INTO `detail_laporan_harian_bahan` VALUES (74, 63, '', 0, '');
INSERT INTO `detail_laporan_harian_bahan` VALUES (75, 64, '123', 2, 'kg');
INSERT INTO `detail_laporan_harian_bahan` VALUES (76, 65, '', 0, '');
INSERT INTO `detail_laporan_harian_bahan` VALUES (77, 0, '', 0, '');
INSERT INTO `detail_laporan_harian_bahan` VALUES (78, 0, '', 0, '');
INSERT INTO `detail_laporan_harian_bahan` VALUES (79, 66, '', 0, '');
INSERT INTO `detail_laporan_harian_bahan` VALUES (80, 67, '', 0, '');
INSERT INTO `detail_laporan_harian_bahan` VALUES (81, 68, '', 0, '');
INSERT INTO `detail_laporan_harian_bahan` VALUES (82, 69, '', 0, '');
INSERT INTO `detail_laporan_harian_bahan` VALUES (83, 70, '', 0, '');
INSERT INTO `detail_laporan_harian_bahan` VALUES (84, 71, '', 0, '');
INSERT INTO `detail_laporan_harian_bahan` VALUES (85, 72, '', 0, '');
INSERT INTO `detail_laporan_harian_bahan` VALUES (86, 73, '1', 1, '11');
INSERT INTO `detail_laporan_harian_bahan` VALUES (87, 74, '1', 1, '1');
INSERT INTO `detail_laporan_harian_bahan` VALUES (88, 75, '', 0, '');
INSERT INTO `detail_laporan_harian_bahan` VALUES (89, 76, '', 0, '');
INSERT INTO `detail_laporan_harian_bahan` VALUES (90, 77, '', 0, '');
INSERT INTO `detail_laporan_harian_bahan` VALUES (91, 6, '1', 1, '1');
INSERT INTO `detail_laporan_harian_bahan` VALUES (92, 2, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (93, 78, '', 0, '');
INSERT INTO `detail_laporan_harian_bahan` VALUES (94, 79, '', 0, '');
INSERT INTO `detail_laporan_harian_bahan` VALUES (96, 4, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (97, 5, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (98, 7, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (99, 8, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (100, 9, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (101, 10, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (102, 11, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (103, 12, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (104, 13, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (105, 14, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (106, 15, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (107, 16, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (108, 17, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (109, 18, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (110, 19, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (111, 20, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (112, 21, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (113, 22, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (114, 23, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (115, 24, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (116, 25, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (117, 26, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (118, 27, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (119, 28, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (120, 29, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (121, 30, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (122, 31, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (123, 32, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (124, 33, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (125, 34, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (126, 35, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (127, 36, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (128, 37, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (129, 38, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (130, 39, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (131, 40, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (132, 41, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (133, 42, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (134, 43, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (135, 44, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (136, 45, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (137, 46, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (138, 47, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (139, 48, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (140, 49, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (141, 50, '0', 0, '1');
INSERT INTO `detail_laporan_harian_bahan` VALUES (142, 50, '0', 0, '1');
INSERT INTO `detail_laporan_harian_bahan` VALUES (143, 50, '0', 0, '1');
INSERT INTO `detail_laporan_harian_bahan` VALUES (144, 50, '0', 0, '15');
INSERT INTO `detail_laporan_harian_bahan` VALUES (145, 51, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (146, 52, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (147, 53, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (148, 54, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (149, 54, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (150, 54, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (151, 55, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (152, 56, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (153, 56, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (154, 56, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (155, 57, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (156, 58, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (157, 59, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (158, 60, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (159, 60, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (160, 60, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (161, 61, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (164, 62, '', 0, '');
INSERT INTO `detail_laporan_harian_bahan` VALUES (165, 62, '', 0, '');
INSERT INTO `detail_laporan_harian_bahan` VALUES (166, 62, '', 0, '');
INSERT INTO `detail_laporan_harian_bahan` VALUES (167, 62, '', 0, '');
INSERT INTO `detail_laporan_harian_bahan` VALUES (168, 63, '', 0, '');
INSERT INTO `detail_laporan_harian_bahan` VALUES (169, 64, '123', 2, 'kg');
INSERT INTO `detail_laporan_harian_bahan` VALUES (170, 65, '', 0, '');
INSERT INTO `detail_laporan_harian_bahan` VALUES (171, 0, '', 0, '');
INSERT INTO `detail_laporan_harian_bahan` VALUES (172, 0, '', 0, '');
INSERT INTO `detail_laporan_harian_bahan` VALUES (173, 66, '', 0, '');
INSERT INTO `detail_laporan_harian_bahan` VALUES (174, 67, '', 0, '');
INSERT INTO `detail_laporan_harian_bahan` VALUES (175, 68, '', 0, '');
INSERT INTO `detail_laporan_harian_bahan` VALUES (176, 69, '', 0, '');
INSERT INTO `detail_laporan_harian_bahan` VALUES (177, 70, '', 0, '');
INSERT INTO `detail_laporan_harian_bahan` VALUES (178, 71, '', 0, '');
INSERT INTO `detail_laporan_harian_bahan` VALUES (179, 72, '', 0, '');
INSERT INTO `detail_laporan_harian_bahan` VALUES (180, 73, '1', 1, '11');
INSERT INTO `detail_laporan_harian_bahan` VALUES (181, 74, '1', 1, '1');
INSERT INTO `detail_laporan_harian_bahan` VALUES (182, 75, '', 0, '');
INSERT INTO `detail_laporan_harian_bahan` VALUES (183, 76, '', 0, '');
INSERT INTO `detail_laporan_harian_bahan` VALUES (184, 77, '', 0, '');
INSERT INTO `detail_laporan_harian_bahan` VALUES (185, 6, '1', 1, '1');
INSERT INTO `detail_laporan_harian_bahan` VALUES (186, 2, '0', 0, '0');
INSERT INTO `detail_laporan_harian_bahan` VALUES (187, 78, '', 0, '');
INSERT INTO `detail_laporan_harian_bahan` VALUES (188, 79, '', 0, '');

-- ----------------------------
-- Table structure for detail_laporan_harian_beton
-- ----------------------------
DROP TABLE IF EXISTS `detail_laporan_harian_beton`;
CREATE TABLE `detail_laporan_harian_beton`  (
  `id_kegiatan` int NOT NULL,
  `no_trans` int NOT NULL,
  `bahan_beton` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `no_tm` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `waktu_datang` time NOT NULL,
  `waktu_curah` time NOT NULL,
  `slump_test` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `satuan` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ket` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  INDEX `id_kegiatan`(`id_kegiatan`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of detail_laporan_harian_beton
-- ----------------------------
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 4, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 5, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 7, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 8, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 9, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 10, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 11, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 12, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 13, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 14, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 15, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 16, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 17, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 18, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 19, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 20, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 21, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 22, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 23, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 24, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 25, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 26, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 27, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 28, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 29, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 30, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 31, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 32, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 33, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 34, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 35, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 36, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 37, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 38, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 39, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 40, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 41, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 42, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 43, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 44, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 45, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 46, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 47, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 48, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 49, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 50, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 51, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 52, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 53, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 54, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 55, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 56, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 57, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 58, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 59, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 60, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 61, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 62, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 62, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 62, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 62, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 63, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 65, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 0, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 0, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 66, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 67, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 68, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 69, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 70, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 71, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 72, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 73, '1', '1', '01:01:00', '01:01:00', '1', '1', '1');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 74, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 75, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 76, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 77, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 2, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 78, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 79, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 4, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 5, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 7, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 8, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 9, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 10, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 11, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 12, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 13, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 14, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 15, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 16, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 17, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 18, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 19, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 20, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 21, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 22, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 23, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 24, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 25, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 26, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 27, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 28, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 29, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 30, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 31, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 32, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 33, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 34, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 35, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 36, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 37, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 38, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 39, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 40, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 41, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 42, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 43, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 44, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 45, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 46, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 47, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 48, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 49, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 50, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 51, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 52, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 53, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 54, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 55, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 56, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 57, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 58, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 59, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 60, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 61, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 62, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 62, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 62, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 62, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 63, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 65, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 0, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 0, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 66, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 67, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 68, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 69, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 70, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 71, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 72, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 73, '1', '1', '01:01:00', '01:01:00', '1', '1', '1');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 74, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 75, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 76, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 77, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 2, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 78, '', '', '00:00:00', '00:00:00', '', '', '');
INSERT INTO `detail_laporan_harian_beton` VALUES (0, 79, '', '', '00:00:00', '00:00:00', '', '', '');

-- ----------------------------
-- Table structure for detail_laporan_harian_cuaca
-- ----------------------------
DROP TABLE IF EXISTS `detail_laporan_harian_cuaca`;
CREATE TABLE `detail_laporan_harian_cuaca`  (
  `id_kegiatan` int NOT NULL AUTO_INCREMENT,
  `no_trans` int NOT NULL,
  `cerah` decimal(10, 0) NOT NULL,
  `hujan_ringan` decimal(10, 0) NOT NULL,
  `hujan_lebat` decimal(10, 0) NOT NULL,
  `bencana_alam` decimal(10, 0) NOT NULL,
  `lain_lain` decimal(10, 0) NOT NULL,
  PRIMARY KEY (`id_kegiatan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 169 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of detail_laporan_harian_cuaca
-- ----------------------------
INSERT INTO `detail_laporan_harian_cuaca` VALUES (2, 4, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (3, 5, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (4, 7, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (5, 8, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (6, 9, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (7, 10, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (8, 11, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (9, 12, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (10, 13, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (11, 14, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (12, 15, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (13, 16, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (14, 17, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (15, 18, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (16, 19, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (17, 20, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (18, 21, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (19, 22, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (20, 23, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (21, 24, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (22, 25, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (23, 26, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (24, 27, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (25, 28, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (26, 29, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (27, 30, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (28, 31, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (29, 32, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (30, 33, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (31, 34, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (32, 35, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (33, 36, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (34, 37, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (35, 38, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (36, 39, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (37, 40, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (38, 41, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (39, 42, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (40, 43, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (41, 44, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (42, 45, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (43, 46, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (44, 47, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (45, 48, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (46, 49, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (47, 50, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (48, 51, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (49, 52, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (50, 53, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (51, 54, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (52, 55, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (53, 56, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (54, 57, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (55, 58, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (56, 59, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (57, 60, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (58, 61, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (60, 62, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (61, 62, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (62, 62, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (63, 62, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (64, 63, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (65, 65, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (66, 0, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (67, 0, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (68, 66, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (69, 67, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (70, 68, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (71, 69, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (72, 70, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (73, 71, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (74, 72, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (75, 73, 1, 1, 1, 1, 1);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (76, 74, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (77, 75, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (78, 76, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (79, 77, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (80, 2, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (81, 78, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (82, 79, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (84, 4, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (85, 5, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (86, 7, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (87, 8, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (88, 9, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (89, 10, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (90, 11, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (91, 12, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (92, 13, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (93, 14, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (94, 15, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (95, 16, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (96, 17, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (97, 18, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (98, 19, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (99, 20, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (100, 21, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (101, 22, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (102, 23, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (103, 24, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (104, 25, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (105, 26, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (106, 27, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (107, 28, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (108, 29, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (109, 30, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (110, 31, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (111, 32, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (112, 33, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (113, 34, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (114, 35, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (115, 36, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (116, 37, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (117, 38, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (118, 39, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (119, 40, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (120, 41, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (121, 42, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (122, 43, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (123, 44, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (124, 45, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (125, 46, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (126, 47, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (127, 48, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (128, 49, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (129, 50, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (130, 51, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (131, 52, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (132, 53, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (133, 54, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (134, 55, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (135, 56, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (136, 57, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (137, 58, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (138, 59, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (139, 60, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (140, 61, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (142, 62, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (143, 62, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (144, 62, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (145, 62, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (146, 63, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (147, 65, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (148, 0, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (149, 0, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (150, 66, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (151, 67, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (152, 68, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (153, 69, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (154, 70, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (155, 71, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (156, 72, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (157, 73, 1, 1, 1, 1, 1);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (158, 74, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (159, 75, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (160, 76, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (161, 77, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (162, 2, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (163, 78, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (164, 79, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (165, 1, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (166, 1, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (167, 3, 0, 0, 0, 0, 0);
INSERT INTO `detail_laporan_harian_cuaca` VALUES (168, 3, 0, 0, 0, 0, 0);

-- ----------------------------
-- Table structure for detail_laporan_harian_hotmix
-- ----------------------------
DROP TABLE IF EXISTS `detail_laporan_harian_hotmix`;
CREATE TABLE `detail_laporan_harian_hotmix`  (
  `id_kegiatan` int NOT NULL AUTO_INCREMENT,
  `no_trans` int NOT NULL,
  `bahan_hotmix` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `no_dt` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `waktu_datang` time NOT NULL,
  `waktu_hampar` time NOT NULL,
  `suhu_datang` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `suhu_hampar` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pro_p` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pro_i` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pro_t` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ket` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_kegiatan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 169 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of detail_laporan_harian_hotmix
-- ----------------------------
INSERT INTO `detail_laporan_harian_hotmix` VALUES (2, 4, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (3, 5, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (4, 7, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (5, 8, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (6, 9, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (7, 10, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (8, 11, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (9, 12, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (10, 13, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (11, 14, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (12, 15, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (13, 16, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (14, 17, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (15, 18, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (16, 19, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (17, 20, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (18, 21, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (19, 22, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (20, 23, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (21, 24, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (22, 25, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (23, 26, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (24, 27, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (25, 28, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (26, 29, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (27, 30, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (28, 31, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (29, 32, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (30, 33, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (31, 34, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (32, 35, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (33, 36, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (34, 37, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (35, 38, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (36, 39, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (37, 40, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (38, 41, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (39, 42, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (40, 43, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (41, 44, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (42, 45, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (43, 46, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (44, 47, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (45, 48, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (46, 49, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (47, 50, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (48, 51, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (49, 52, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (50, 53, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (51, 54, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (52, 55, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (53, 56, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (54, 57, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (55, 58, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (56, 59, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (57, 60, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (58, 61, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (60, 62, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (61, 62, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (62, 62, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (63, 62, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (64, 63, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (65, 65, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (66, 0, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (67, 0, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (68, 66, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (69, 67, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (70, 68, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (71, 69, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (72, 70, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (73, 71, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (74, 72, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (75, 73, '1', '1', '01:01:00', '01:01:00', '1', '1', '1', '', '1', '1');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (76, 74, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (77, 75, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (78, 76, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (79, 77, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (80, 2, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (81, 78, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (82, 79, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (84, 4, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (85, 5, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (86, 7, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (87, 8, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (88, 9, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (89, 10, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (90, 11, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (91, 12, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (92, 13, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (93, 14, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (94, 15, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (95, 16, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (96, 17, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (97, 18, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (98, 19, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (99, 20, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (100, 21, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (101, 22, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (102, 23, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (103, 24, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (104, 25, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (105, 26, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (106, 27, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (107, 28, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (108, 29, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (109, 30, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (110, 31, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (111, 32, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (112, 33, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (113, 34, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (114, 35, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (115, 36, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (116, 37, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (117, 38, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (118, 39, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (119, 40, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (120, 41, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (121, 42, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (122, 43, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (123, 44, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (124, 45, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (125, 46, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (126, 47, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (127, 48, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (128, 49, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (129, 50, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (130, 51, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (131, 52, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (132, 53, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (133, 54, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (134, 55, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (135, 56, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (136, 57, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (137, 58, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (138, 59, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (139, 60, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (140, 61, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (142, 62, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (143, 62, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (144, 62, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (145, 62, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (146, 63, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (147, 65, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (148, 0, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (149, 0, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (150, 66, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (151, 67, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (152, 68, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (153, 69, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (154, 70, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (155, 71, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (156, 72, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (157, 73, '1', '1', '01:01:00', '01:01:00', '1', '1', '1', '', '1', '1');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (158, 74, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (159, 75, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (160, 76, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (161, 77, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (162, 2, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (163, 78, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (164, 79, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (165, 1, 'ASPHALT', 'D1234D', '13:14:00', '14:00:00', '20', '21', '1', '', '1', 'OK');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (166, 1, 'ASPHALT', 'D1234D', '13:14:00', '14:00:00', '20', '21', '1', '', '1', 'OK');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (167, 3, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');
INSERT INTO `detail_laporan_harian_hotmix` VALUES (168, 3, '', '', '00:00:00', '00:00:00', '', '', '', '', '', '');

-- ----------------------------
-- Table structure for detail_laporan_harian_intruksi
-- ----------------------------
DROP TABLE IF EXISTS `detail_laporan_harian_intruksi`;
CREATE TABLE `detail_laporan_harian_intruksi`  (
  `id_kegiatan` int NOT NULL AUTO_INCREMENT,
  `no_trans` int NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `catatan` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_kegiatan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of detail_laporan_harian_intruksi
-- ----------------------------

-- ----------------------------
-- Table structure for detail_laporan_harian_pekerjaan
-- ----------------------------
DROP TABLE IF EXISTS `detail_laporan_harian_pekerjaan`;
CREATE TABLE `detail_laporan_harian_pekerjaan`  (
  `no_trans` int NOT NULL,
  `no_pekerjaan` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jenis_pekerjaan` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sta_awal` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sta_akhir` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ki_ka` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `satuan` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ket` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tgl` date NOT NULL,
  `volume` decimal(10, 0) NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of detail_laporan_harian_pekerjaan
-- ----------------------------
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (2, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '49+177', '49+169', 'Ka', 'M3', 'Terlaksana', '0000-00-00', 13);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (4, '6.3.(5a)', 'Laston Lapis Aus (AC-WC) ', 'Km.Bdg. 108+484', 'Km.Bdg. 108+684', 'ki', 'ton', '', '2020-11-02', 120);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (5, '7.15.(1)', 'Pembongkaran Pasangan Batu', '1+175', '1+148', 'ka', 'M3', 'terlaksana', '2020-08-24', 18);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (6, '7.15.(2)', 'Pembongkaran Beton', '1+175', '1+148', 'ka', 'M3', 'terlaksana', '2020-08-24', 4);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (7, '7.15.(9)', 'Pengangkutan Hasil Bongkaran yang melebihi 5 km', '1+175', '1+148', 'ka', 'M3', 'terlaksana', '2020-08-24', 21);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (8, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '', '', '', '', '', '2020-08-24', 0);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (9, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+148', '1+125', 'ka', 'bh', 'terlaksana', '2020-08-25', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (10, '7.15.(1)', 'Pembongkaran Pasangan Batu', '1+148', '1+125', 'ka', 'M3', 'terlaksana', '2020-08-25', 16);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (11, '7.15.(2)', 'Pembongkaran Beton', '1+148 ', '1+125', 'ka', 'M3', 'terlaksana', '2020-08-25', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (12, '7.15.(9)', 'Pengangkutan Hasil Bongkaran yang melebihi 5 km', '1+148', '1+125', 'ka', 'M3', 'terlaksana', '2020-08-25', 19);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (13, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+100', '1+060', 'ka', 'bh', 'terlaksana', '2020-08-29', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (14, '7.15.(1)', 'Pembongkaran Pasangan Batu', '1+100', '1+060', 'ka', 'M3', 'terlaksana', '2020-08-29', 27);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (15, '7.15.(2)', 'Pembongkaran Beton', '1+100', '1+060', 'ka', 'M3', 'terlaksana', '2020-08-29', 6);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (16, '7.15.(9)', 'Pengangkutan Hasil Bongkaran yang melebihi 5 km', '1+100', '1+060', 'ka', 'M3', 'terlaksana', '2020-08-29', 33);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (17, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+000', '0+875', 'Ka', 'bh', 'terlaksana', '2020-08-30', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (18, '7.15.(1)', 'Pembongkaran Pasangan Batu', '1+000', '0+875', 'ka', 'M3', 'terlaksana', '2020-08-30', 85);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (19, '7.15.(2)', 'Pembongkaran Beton', '1+000', '0+875', 'ka', 'M3', 'terlaksana', '2020-08-30', 18);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (20, '7.15.(9)', 'Pengangkutan Hasil Bongkaran yang melebihi 5 km', '1+000', '0+875', 'ka', 'M3', 'terlaksana', '2020-08-30', 103);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (21, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '0+875', '0+660', 'ka', 'bh', 'terlaksana', '2020-08-31', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (22, '7.15.(1)', 'Pembongkaran Pasangan Batu', '0+875', '0+660', 'ka', 'M3', 'terlaksana', '2020-08-31', 146);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (23, '7.15.(2)', 'Pembongkaran Beton', '0+875', '0+660', 'ka', 'M3', 'terlaksana', '2020-08-31', 30);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (24, '7.15.(9)', 'Pengangkutan Hasil Bongkaran yang melebihi 5 km', '0+875', '0+660', 'ka', 'M3', 'terlaksana', '2020-08-31', 176);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (25, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '0+660', '0+480', 'ka', 'bh', 'terlaksana', '2020-09-01', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (26, '7.15.(1)', 'Pembongkaran Pasangan Batu', '0+660', '0+480', 'ka', 'M3', 'terlaksana', '2020-09-01', 122);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (27, '7.15.(2)', 'Pembongkaran Beton', '0+660', '0+480', 'ka', 'M3', 'terlaksana', '2020-09-01', 25);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (28, '7.15.(9)', 'Pengangkutan Hasil Bongkaran yang melebihi 5 km', '0+660', '0+480', 'ka', 'M3', 'terlaksana', '2020-09-01', 148);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (29, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '0+480', '0+240', 'ka', 'bh', 'terlaksana', '2020-09-02', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (30, '7.15.(1)', 'Pembongkaran Pasangan Batu', '0+480', '0+240', 'ka', 'M3', 'terlaksana', '2020-09-02', 163);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (31, '7.15.(2)', 'Pembongkaran Beton', '0+480', '0+240', 'ka', 'M3', 'terlaksana', '2020-09-02', 34);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (32, '7.15.(9)', 'Pengangkutan Hasil Bongkaran yang melebihi 5 km', '0+480', '0+240', 'ka', 'M3', 'terlaksana', '2020-09-02', 197);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (33, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '0+240', '0+022', 'ka', 'bh', 'terlaksana', '2020-09-03', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (34, '7.15.(1)', 'Pembongkaran Pasangan Batu', '0+240', '0+022', 'ka', 'M3', 'terlaksana', '2020-09-03', 148);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (35, '7.15.(2)', 'Pembongkaran Beton', '0+240', '0+022', 'ka', 'M3', 'terlaksana', '2020-09-03', 31);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (36, '7.15.(9)', 'Pengangkutan Hasil Bongkaran yang melebihi 5 km', '0+240', '0+022', 'ka', 'M3', 'terlaksana', '2020-09-03', 179);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (37, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+173', '1+120', 'ka', 'bh', 'terlaksana', '2020-09-04', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (38, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '1+173', '1+120', 'ka', 'm3', 'terlaksana', '2020-09-04', 8);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (39, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '1+173', '1+120', 'ka', 'M3', 'terlaksana', '0000-00-00', 8);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (41, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+149.5', '1+137.5', 'ka', 'kg', 'terlaksana', '2020-09-07', 430);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (42, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+173', '1+149.5', 'ka', 'ls', 'terlaksana', '2020-09-06', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (40, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+173', '1+049.5', 'ka', 'kg', 'terlaksana', '0000-00-00', 1431);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (43, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+149.5', '1+137.5', 'ka', 'ls', 'terlaksana', '2020-09-07', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (45, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+137.5', '1+120', 'ka', 'ls', 'terlaksana', '2020-09-08', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (44, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+137.5', '1+120', 'ka', 'kg', 'terlaksana', '0000-00-00', 1120);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (46, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+173', '1+155', 'ka', 'm3', 'terlaksana', '2020-09-09', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (47, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+173', '1+155', 'ka', 'ls', 'terlaksana', '2020-09-09', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (48, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+155', '1+137', 'ka', 'ls', 'terlaksana', '2020-09-10', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (49, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+155', '1+137', 'ka', 'm3', 'terlaksana', '2020-09-10', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (50, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+137', ' 1+120', 'ka', 'ls', 'terlaksana', '0000-00-00', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (52, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+137 ', '1+120 ', 'ka', 'ls', 'terlaksana', '2020-09-11', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (53, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+137', '1+120', 'ka', 'm3', 'terlaksana', '2020-09-11', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (51, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+137', '1+120', 'ka', 'm3', 'terlaksana', '0000-00-00', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (54, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+120 ', '1+068', 'ka', 'ls', 'bh', '2020-09-11', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (55, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '1+120 ', '1+068', 'ka', 'm3', 'terlaksana', '2020-09-11', 5);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (56, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+173 ', '1+153', 'ka', 'ls', 'terlaksana', '2020-09-12', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (57, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+173', '1+153', 'ka', 'm3', 'terlaksana', '2020-09-12', 4);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (58, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+153', '1+128', 'ka', 'ls', 'terlaksana', '2020-09-13', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (59, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+153 ', '1+128', 'ka', 'm3', 'terlaksana', '2020-09-13', 5);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (60, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+128', '1+102', 'ka', 'ls', 'm3', '2020-09-14', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (61, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+128 ', '1+102', 'ka', 'm3', 'lantai', '0000-00-00', 5);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (62, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+173', '1+154', 'ka', 'm3', 'terlaksana (Dinding)', '2020-09-14', 10);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (63, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+102', '1+085', 'ka', 'm3', '(LANTAI)', '2020-09-15', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (64, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+102', ' 1+085', 'ka', 'ls', 'terlaksana', '2020-09-15', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (65, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+120', '1+068 ', 'ka', 'kg', 'terlaksana', '0000-00-00', 2204);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (66, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '1+010 ', '0+985', 'ka', 'M3', 'terlaksana', '2020-09-15', 16);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (67, '7.15.(2)', 'Pembongkaran Beton', '0+325', '0+567', 'ka', 'm3', 'terlaksana', '2020-09-15', 43);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (68, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+102', '1+060', 'ka', 'm3', 'LANTAI', '2020-09-16', 9);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (69, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+102', '1+060', 'ka', 'ls', 'terlaksana', '2020-09-16', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (70, '7.15.(2)', 'Pembongkaran Beton', '0+567', '0+789', 'ka', 'm3', 'terlaksana', '0000-00-00', 43);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (72, '7.15.(2)', 'Pembongkaran Beton', '0+789', '1+010', 'KI', 'M3', 'terlaksana', '2020-09-17', 43);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (73, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '0+789 ', '1+010 ', 'ka', 'ls', 'terlaksana', '2020-09-17', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (71, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+154', '1+120', 'ka', 'M3', 'terlaksana (DINDING)', '0000-00-00', 9);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (74, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '0+735', '0+695', 'ka', 'M3', 'terlaksana', '2020-09-18', 5);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (75, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '0+735', '0+695', 'ka', 'ls', 'terlaksana', '2020-09-18', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (76, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '735', '0+695', 'ka', 'M3', 'terlaksana', '2020-09-19', 5);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (77, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+125', '1+105', 'ka', 'M3', 'terlaksana (DINDING', '2020-09-19', 13);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (78, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+120', '1+105', 'KA', 'M3', 'terlaksana (DINDING)', '2020-09-19', 13);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (79, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+120', '1+105', 'ka', 'ls', 'terlaksana', '2020-09-19', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (80, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+105', '0+430', 'ka', 'ls', 'terlaksana', '2020-09-20', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (81, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+105', ' 1+085', 'ka', 'M3', 'terlaksana (DINDING)', '2020-09-20', 6);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (82, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '0+660', '0+575 ', 'ka', 'M3', 'terlaksana', '2020-09-20', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (83, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '0+430', '0+475 ', 'ka', 'M3', 'terlaksana', '0000-00-00', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (84, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+085', '1+079', 'ka', 'ls', 'terlaksana', '2020-09-21', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (85, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+085', '1+079', 'ka', 'M3', 'terlaksana (DINDING)', '2020-09-21', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (86, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+010', '0+375', 'ka', 'ls', 'terlaksana', '2020-09-22', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (87, '7.3 (1)', 'Baja Tulangan U24 Polos', '0+645', '0+660', 'ka', 'kg', 'terlaksana ', '0000-00-00', 551);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (88, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '0+410 ', '0+375', 'ka', 'M3', 'terlaksana', '2020-09-22', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (89, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '0+685', '0+675', 'ka', 'M3', 'terlaksana', '2020-09-22', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (90, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+085', '1+070', 'ka', 'M3', 'terlaksana', '2020-09-22', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (91, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+153', ' 1+167', 'ka', 'KG', 'terlaksana (Penutup)', '2020-09-22', 338);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (92, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+173', ' 0+650 ', 'ka', 'ls', 'terlaksana', '2020-09-23', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (93, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+085 ', '1+060', 'ka', 'M3', 'terlaksana', '2020-09-23', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (94, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+015', '1+000', 'ka', 'KG', 'terlaksana', '2020-09-23', 551);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (96, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '0+735', '0+720', 'ka', 'M3', 'terlaksana', '2020-09-23', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (97, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '1+010', '1+000', 'ka', 'M3', 'terlaksana', '2020-09-23', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (95, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+015', '1+000', 'ka', 'M3', 'terlaksana', '0000-00-00', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (98, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '0+665', '0+650', 'ka', 'M3', 'terlaksana', '2020-09-23', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (99, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+167', '1+160', 'ka', 'M3', 'terlaksana', '2020-09-23', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (100, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+157', '1+150', 'ka', 'M3', 'terlaksana', '2020-09-23', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (101, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+133', '1+123', 'ka', 'M3', 'terlaksana', '2020-09-24', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (102, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+133', '0+575', 'ka', 'ls', 'terlaksana', '2020-09-24', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (103, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+133', ' 1+123', 'ka', 'kg', 'terlaksana', '2020-09-23', 240);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (104, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+120', '1+110', 'ka', 'kg', 'terlaksana', '2020-09-24', 240);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (105, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '0+720', '0+650', 'ka', 'M3', 'terlaksana (LANTAI)', '2020-09-24', 14);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (106, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '0+375', '0+329 ', 'ka', 'M3', 'terlaksana', '2020-09-24', 4);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (107, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '0+635', '0+575', 'ka', 'M3', 'terlaksana', '2020-09-24', 12);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (108, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+010', '0+750', 'ka', 'ls', 'terlaksana', '2020-09-25', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (109, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+010', '1+120', 'ka', 'm3', 'terlaksana (TOP)', '2020-09-25', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (110, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+015', '1+000', 'ka', 'M3', 'terlaksana (DINDING)', '2020-09-25', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (111, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '0+750', '0+784', 'ka', 'M3', 'terlaksana', '2020-09-25', 6);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (2, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '49+177', '49+169', 'Ka', 'M3', 'Terlaksana', '0000-00-00', 13);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (4, '6.3.(5a)', 'Laston Lapis Aus (AC-WC) ', 'Km.Bdg. 108+484', 'Km.Bdg. 108+684', 'ki', 'ton', '', '2020-11-02', 120);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (5, '7.15.(1)', 'Pembongkaran Pasangan Batu', '1+175', '1+148', 'ka', 'M3', 'terlaksana', '2020-08-24', 18);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (6, '7.15.(2)', 'Pembongkaran Beton', '1+175', '1+148', 'ka', 'M3', 'terlaksana', '2020-08-24', 4);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (7, '7.15.(9)', 'Pengangkutan Hasil Bongkaran yang melebihi 5 km', '1+175', '1+148', 'ka', 'M3', 'terlaksana', '2020-08-24', 21);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (8, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '', '', '', '', '', '2020-08-24', 0);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (9, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+148', '1+125', 'ka', 'bh', 'terlaksana', '2020-08-25', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (10, '7.15.(1)', 'Pembongkaran Pasangan Batu', '1+148', '1+125', 'ka', 'M3', 'terlaksana', '2020-08-25', 16);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (11, '7.15.(2)', 'Pembongkaran Beton', '1+148 ', '1+125', 'ka', 'M3', 'terlaksana', '2020-08-25', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (12, '7.15.(9)', 'Pengangkutan Hasil Bongkaran yang melebihi 5 km', '1+148', '1+125', 'ka', 'M3', 'terlaksana', '2020-08-25', 19);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (13, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+100', '1+060', 'ka', 'bh', 'terlaksana', '2020-08-29', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (14, '7.15.(1)', 'Pembongkaran Pasangan Batu', '1+100', '1+060', 'ka', 'M3', 'terlaksana', '2020-08-29', 27);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (15, '7.15.(2)', 'Pembongkaran Beton', '1+100', '1+060', 'ka', 'M3', 'terlaksana', '2020-08-29', 6);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (16, '7.15.(9)', 'Pengangkutan Hasil Bongkaran yang melebihi 5 km', '1+100', '1+060', 'ka', 'M3', 'terlaksana', '2020-08-29', 33);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (17, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+000', '0+875', 'Ka', 'bh', 'terlaksana', '2020-08-30', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (18, '7.15.(1)', 'Pembongkaran Pasangan Batu', '1+000', '0+875', 'ka', 'M3', 'terlaksana', '2020-08-30', 85);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (19, '7.15.(2)', 'Pembongkaran Beton', '1+000', '0+875', 'ka', 'M3', 'terlaksana', '2020-08-30', 18);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (20, '7.15.(9)', 'Pengangkutan Hasil Bongkaran yang melebihi 5 km', '1+000', '0+875', 'ka', 'M3', 'terlaksana', '2020-08-30', 103);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (21, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '0+875', '0+660', 'ka', 'bh', 'terlaksana', '2020-08-31', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (22, '7.15.(1)', 'Pembongkaran Pasangan Batu', '0+875', '0+660', 'ka', 'M3', 'terlaksana', '2020-08-31', 146);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (23, '7.15.(2)', 'Pembongkaran Beton', '0+875', '0+660', 'ka', 'M3', 'terlaksana', '2020-08-31', 30);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (24, '7.15.(9)', 'Pengangkutan Hasil Bongkaran yang melebihi 5 km', '0+875', '0+660', 'ka', 'M3', 'terlaksana', '2020-08-31', 176);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (25, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '0+660', '0+480', 'ka', 'bh', 'terlaksana', '2020-09-01', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (26, '7.15.(1)', 'Pembongkaran Pasangan Batu', '0+660', '0+480', 'ka', 'M3', 'terlaksana', '2020-09-01', 122);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (27, '7.15.(2)', 'Pembongkaran Beton', '0+660', '0+480', 'ka', 'M3', 'terlaksana', '2020-09-01', 25);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (28, '7.15.(9)', 'Pengangkutan Hasil Bongkaran yang melebihi 5 km', '0+660', '0+480', 'ka', 'M3', 'terlaksana', '2020-09-01', 148);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (29, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '0+480', '0+240', 'ka', 'bh', 'terlaksana', '2020-09-02', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (30, '7.15.(1)', 'Pembongkaran Pasangan Batu', '0+480', '0+240', 'ka', 'M3', 'terlaksana', '2020-09-02', 163);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (31, '7.15.(2)', 'Pembongkaran Beton', '0+480', '0+240', 'ka', 'M3', 'terlaksana', '2020-09-02', 34);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (32, '7.15.(9)', 'Pengangkutan Hasil Bongkaran yang melebihi 5 km', '0+480', '0+240', 'ka', 'M3', 'terlaksana', '2020-09-02', 197);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (33, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '0+240', '0+022', 'ka', 'bh', 'terlaksana', '2020-09-03', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (34, '7.15.(1)', 'Pembongkaran Pasangan Batu', '0+240', '0+022', 'ka', 'M3', 'terlaksana', '2020-09-03', 148);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (35, '7.15.(2)', 'Pembongkaran Beton', '0+240', '0+022', 'ka', 'M3', 'terlaksana', '2020-09-03', 31);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (36, '7.15.(9)', 'Pengangkutan Hasil Bongkaran yang melebihi 5 km', '0+240', '0+022', 'ka', 'M3', 'terlaksana', '2020-09-03', 179);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (37, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+173', '1+120', 'ka', 'bh', 'terlaksana', '2020-09-04', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (38, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '1+173', '1+120', 'ka', 'm3', 'terlaksana', '2020-09-04', 8);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (39, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '1+173', '1+120', 'ka', 'M3', 'terlaksana', '0000-00-00', 8);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (41, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+149.5', '1+137.5', 'ka', 'kg', 'terlaksana', '2020-09-07', 430);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (42, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+173', '1+149.5', 'ka', 'ls', 'terlaksana', '2020-09-06', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (40, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+173', '1+049.5', 'ka', 'kg', 'terlaksana', '0000-00-00', 1431);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (43, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+149.5', '1+137.5', 'ka', 'ls', 'terlaksana', '2020-09-07', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (45, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+137.5', '1+120', 'ka', 'ls', 'terlaksana', '2020-09-08', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (44, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+137.5', '1+120', 'ka', 'kg', 'terlaksana', '0000-00-00', 1120);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (46, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+173', '1+155', 'ka', 'm3', 'terlaksana', '2020-09-09', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (47, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+173', '1+155', 'ka', 'ls', 'terlaksana', '2020-09-09', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (48, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+155', '1+137', 'ka', 'ls', 'terlaksana', '2020-09-10', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (49, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+155', '1+137', 'ka', 'm3', 'terlaksana', '2020-09-10', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (50, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+137', ' 1+120', 'ka', 'ls', 'terlaksana', '0000-00-00', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (52, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+137 ', '1+120 ', 'ka', 'ls', 'terlaksana', '2020-09-11', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (53, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+137', '1+120', 'ka', 'm3', 'terlaksana', '2020-09-11', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (51, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+137', '1+120', 'ka', 'm3', 'terlaksana', '0000-00-00', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (54, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+120 ', '1+068', 'ka', 'ls', 'bh', '2020-09-11', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (55, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '1+120 ', '1+068', 'ka', 'm3', 'terlaksana', '2020-09-11', 5);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (56, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+173 ', '1+153', 'ka', 'ls', 'terlaksana', '2020-09-12', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (57, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+173', '1+153', 'ka', 'm3', 'terlaksana', '2020-09-12', 4);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (58, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+153', '1+128', 'ka', 'ls', 'terlaksana', '2020-09-13', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (59, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+153 ', '1+128', 'ka', 'm3', 'terlaksana', '2020-09-13', 5);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (60, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+128', '1+102', 'ka', 'ls', 'm3', '2020-09-14', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (61, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+128 ', '1+102', 'ka', 'm3', 'lantai', '0000-00-00', 5);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (62, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+173', '1+154', 'ka', 'm3', 'terlaksana (Dinding)', '2020-09-14', 10);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (63, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+102', '1+085', 'ka', 'm3', '(LANTAI)', '2020-09-15', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (64, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+102', ' 1+085', 'ka', 'ls', 'terlaksana', '2020-09-15', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (65, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+120', '1+068 ', 'ka', 'kg', 'terlaksana', '0000-00-00', 2204);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (66, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '1+010 ', '0+985', 'ka', 'M3', 'terlaksana', '2020-09-15', 16);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (67, '7.15.(2)', 'Pembongkaran Beton', '0+325', '0+567', 'ka', 'm3', 'terlaksana', '2020-09-15', 43);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (68, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+102', '1+060', 'ka', 'm3', 'LANTAI', '2020-09-16', 9);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (69, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+102', '1+060', 'ka', 'ls', 'terlaksana', '2020-09-16', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (70, '7.15.(2)', 'Pembongkaran Beton', '0+567', '0+789', 'ka', 'm3', 'terlaksana', '0000-00-00', 43);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (72, '7.15.(2)', 'Pembongkaran Beton', '0+789', '1+010', 'KI', 'M3', 'terlaksana', '2020-09-17', 43);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (73, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '0+789 ', '1+010 ', 'ka', 'ls', 'terlaksana', '2020-09-17', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (71, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+154', '1+120', 'ka', 'M3', 'terlaksana (DINDING)', '0000-00-00', 9);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (74, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '0+735', '0+695', 'ka', 'M3', 'terlaksana', '2020-09-18', 5);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (75, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '0+735', '0+695', 'ka', 'ls', 'terlaksana', '2020-09-18', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (76, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '735', '0+695', 'ka', 'M3', 'terlaksana', '2020-09-19', 5);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (77, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+125', '1+105', 'ka', 'M3', 'terlaksana (DINDING', '2020-09-19', 13);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (78, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+120', '1+105', 'KA', 'M3', 'terlaksana (DINDING)', '2020-09-19', 13);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (79, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+120', '1+105', 'ka', 'ls', 'terlaksana', '2020-09-19', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (80, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+105', '0+430', 'ka', 'ls', 'terlaksana', '2020-09-20', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (81, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+105', ' 1+085', 'ka', 'M3', 'terlaksana (DINDING)', '2020-09-20', 6);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (82, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '0+660', '0+575 ', 'ka', 'M3', 'terlaksana', '2020-09-20', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (83, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '0+430', '0+475 ', 'ka', 'M3', 'terlaksana', '0000-00-00', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (84, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+085', '1+079', 'ka', 'ls', 'terlaksana', '2020-09-21', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (85, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+085', '1+079', 'ka', 'M3', 'terlaksana (DINDING)', '2020-09-21', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (86, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+010', '0+375', 'ka', 'ls', 'terlaksana', '2020-09-22', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (87, '7.3 (1)', 'Baja Tulangan U24 Polos', '0+645', '0+660', 'ka', 'kg', 'terlaksana ', '0000-00-00', 551);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (88, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '0+410 ', '0+375', 'ka', 'M3', 'terlaksana', '2020-09-22', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (89, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '0+685', '0+675', 'ka', 'M3', 'terlaksana', '2020-09-22', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (90, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+085', '1+070', 'ka', 'M3', 'terlaksana', '2020-09-22', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (91, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+153', ' 1+167', 'ka', 'KG', 'terlaksana (Penutup)', '2020-09-22', 338);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (92, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+173', ' 0+650 ', 'ka', 'ls', 'terlaksana', '2020-09-23', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (93, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+085 ', '1+060', 'ka', 'M3', 'terlaksana', '2020-09-23', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (94, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+015', '1+000', 'ka', 'KG', 'terlaksana', '2020-09-23', 551);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (96, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '0+735', '0+720', 'ka', 'M3', 'terlaksana', '2020-09-23', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (97, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '1+010', '1+000', 'ka', 'M3', 'terlaksana', '2020-09-23', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (95, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+015', '1+000', 'ka', 'M3', 'terlaksana', '0000-00-00', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (98, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '0+665', '0+650', 'ka', 'M3', 'terlaksana', '2020-09-23', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (99, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+167', '1+160', 'ka', 'M3', 'terlaksana', '2020-09-23', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (100, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+157', '1+150', 'ka', 'M3', 'terlaksana', '2020-09-23', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (101, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+133', '1+123', 'ka', 'M3', 'terlaksana', '2020-09-24', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (102, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+133', '0+575', 'ka', 'ls', 'terlaksana', '2020-09-24', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (103, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+133', ' 1+123', 'ka', 'kg', 'terlaksana', '2020-09-23', 240);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (104, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+120', '1+110', 'ka', 'kg', 'terlaksana', '2020-09-24', 240);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (105, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '0+720', '0+650', 'ka', 'M3', 'terlaksana (LANTAI)', '2020-09-24', 14);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (106, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '0+375', '0+329 ', 'ka', 'M3', 'terlaksana', '2020-09-24', 4);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (107, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '0+635', '0+575', 'ka', 'M3', 'terlaksana', '2020-09-24', 12);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (108, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+010', '0+750', 'ka', 'ls', 'terlaksana', '2020-09-25', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (109, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+010', '1+120', 'ka', 'm3', 'terlaksana (TOP)', '2020-09-25', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (110, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+015', '1+000', 'ka', 'M3', 'terlaksana (DINDING)', '2020-09-25', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (111, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '0+750', '0+784', 'ka', 'M3', 'terlaksana', '2020-09-25', 6);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (2, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '49+177', '49+169', 'Ka', 'M3', 'Terlaksana', '0000-00-00', 13);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (4, '6.3.(5a)', 'Laston Lapis Aus (AC-WC) ', 'Km.Bdg. 108+484', 'Km.Bdg. 108+684', 'ki', 'ton', '', '2020-11-02', 120);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (5, '7.15.(1)', 'Pembongkaran Pasangan Batu', '1+175', '1+148', 'ka', 'M3', 'terlaksana', '2020-08-24', 18);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (6, '7.15.(2)', 'Pembongkaran Beton', '1+175', '1+148', 'ka', 'M3', 'terlaksana', '2020-08-24', 4);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (7, '7.15.(9)', 'Pengangkutan Hasil Bongkaran yang melebihi 5 km', '1+175', '1+148', 'ka', 'M3', 'terlaksana', '2020-08-24', 21);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (8, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '', '', '', '', '', '2020-08-24', 0);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (9, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+148', '1+125', 'ka', 'bh', 'terlaksana', '2020-08-25', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (10, '7.15.(1)', 'Pembongkaran Pasangan Batu', '1+148', '1+125', 'ka', 'M3', 'terlaksana', '2020-08-25', 16);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (11, '7.15.(2)', 'Pembongkaran Beton', '1+148 ', '1+125', 'ka', 'M3', 'terlaksana', '2020-08-25', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (12, '7.15.(9)', 'Pengangkutan Hasil Bongkaran yang melebihi 5 km', '1+148', '1+125', 'ka', 'M3', 'terlaksana', '2020-08-25', 19);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (13, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+100', '1+060', 'ka', 'bh', 'terlaksana', '2020-08-29', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (14, '7.15.(1)', 'Pembongkaran Pasangan Batu', '1+100', '1+060', 'ka', 'M3', 'terlaksana', '2020-08-29', 27);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (15, '7.15.(2)', 'Pembongkaran Beton', '1+100', '1+060', 'ka', 'M3', 'terlaksana', '2020-08-29', 6);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (16, '7.15.(9)', 'Pengangkutan Hasil Bongkaran yang melebihi 5 km', '1+100', '1+060', 'ka', 'M3', 'terlaksana', '2020-08-29', 33);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (17, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+000', '0+875', 'Ka', 'bh', 'terlaksana', '2020-08-30', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (18, '7.15.(1)', 'Pembongkaran Pasangan Batu', '1+000', '0+875', 'ka', 'M3', 'terlaksana', '2020-08-30', 85);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (19, '7.15.(2)', 'Pembongkaran Beton', '1+000', '0+875', 'ka', 'M3', 'terlaksana', '2020-08-30', 18);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (20, '7.15.(9)', 'Pengangkutan Hasil Bongkaran yang melebihi 5 km', '1+000', '0+875', 'ka', 'M3', 'terlaksana', '2020-08-30', 103);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (21, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '0+875', '0+660', 'ka', 'bh', 'terlaksana', '2020-08-31', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (22, '7.15.(1)', 'Pembongkaran Pasangan Batu', '0+875', '0+660', 'ka', 'M3', 'terlaksana', '2020-08-31', 146);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (23, '7.15.(2)', 'Pembongkaran Beton', '0+875', '0+660', 'ka', 'M3', 'terlaksana', '2020-08-31', 30);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (24, '7.15.(9)', 'Pengangkutan Hasil Bongkaran yang melebihi 5 km', '0+875', '0+660', 'ka', 'M3', 'terlaksana', '2020-08-31', 176);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (25, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '0+660', '0+480', 'ka', 'bh', 'terlaksana', '2020-09-01', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (26, '7.15.(1)', 'Pembongkaran Pasangan Batu', '0+660', '0+480', 'ka', 'M3', 'terlaksana', '2020-09-01', 122);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (27, '7.15.(2)', 'Pembongkaran Beton', '0+660', '0+480', 'ka', 'M3', 'terlaksana', '2020-09-01', 25);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (28, '7.15.(9)', 'Pengangkutan Hasil Bongkaran yang melebihi 5 km', '0+660', '0+480', 'ka', 'M3', 'terlaksana', '2020-09-01', 148);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (29, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '0+480', '0+240', 'ka', 'bh', 'terlaksana', '2020-09-02', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (30, '7.15.(1)', 'Pembongkaran Pasangan Batu', '0+480', '0+240', 'ka', 'M3', 'terlaksana', '2020-09-02', 163);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (31, '7.15.(2)', 'Pembongkaran Beton', '0+480', '0+240', 'ka', 'M3', 'terlaksana', '2020-09-02', 34);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (32, '7.15.(9)', 'Pengangkutan Hasil Bongkaran yang melebihi 5 km', '0+480', '0+240', 'ka', 'M3', 'terlaksana', '2020-09-02', 197);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (33, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '0+240', '0+022', 'ka', 'bh', 'terlaksana', '2020-09-03', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (34, '7.15.(1)', 'Pembongkaran Pasangan Batu', '0+240', '0+022', 'ka', 'M3', 'terlaksana', '2020-09-03', 148);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (35, '7.15.(2)', 'Pembongkaran Beton', '0+240', '0+022', 'ka', 'M3', 'terlaksana', '2020-09-03', 31);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (36, '7.15.(9)', 'Pengangkutan Hasil Bongkaran yang melebihi 5 km', '0+240', '0+022', 'ka', 'M3', 'terlaksana', '2020-09-03', 179);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (37, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+173', '1+120', 'ka', 'bh', 'terlaksana', '2020-09-04', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (38, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '1+173', '1+120', 'ka', 'm3', 'terlaksana', '2020-09-04', 8);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (39, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '1+173', '1+120', 'ka', 'M3', 'terlaksana', '0000-00-00', 8);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (41, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+149.5', '1+137.5', 'ka', 'kg', 'terlaksana', '2020-09-07', 430);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (42, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+173', '1+149.5', 'ka', 'ls', 'terlaksana', '2020-09-06', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (40, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+173', '1+049.5', 'ka', 'kg', 'terlaksana', '0000-00-00', 1431);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (43, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+149.5', '1+137.5', 'ka', 'ls', 'terlaksana', '2020-09-07', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (45, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+137.5', '1+120', 'ka', 'ls', 'terlaksana', '2020-09-08', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (44, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+137.5', '1+120', 'ka', 'kg', 'terlaksana', '0000-00-00', 1120);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (46, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+173', '1+155', 'ka', 'm3', 'terlaksana', '2020-09-09', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (47, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+173', '1+155', 'ka', 'ls', 'terlaksana', '2020-09-09', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (48, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+155', '1+137', 'ka', 'ls', 'terlaksana', '2020-09-10', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (49, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+155', '1+137', 'ka', 'm3', 'terlaksana', '2020-09-10', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (50, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+137', ' 1+120', 'ka', 'ls', 'terlaksana', '0000-00-00', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (52, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+137 ', '1+120 ', 'ka', 'ls', 'terlaksana', '2020-09-11', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (53, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+137', '1+120', 'ka', 'm3', 'terlaksana', '2020-09-11', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (51, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+137', '1+120', 'ka', 'm3', 'terlaksana', '0000-00-00', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (54, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+120 ', '1+068', 'ka', 'ls', 'bh', '2020-09-11', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (55, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '1+120 ', '1+068', 'ka', 'm3', 'terlaksana', '2020-09-11', 5);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (56, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+173 ', '1+153', 'ka', 'ls', 'terlaksana', '2020-09-12', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (57, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+173', '1+153', 'ka', 'm3', 'terlaksana', '2020-09-12', 4);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (58, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+153', '1+128', 'ka', 'ls', 'terlaksana', '2020-09-13', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (59, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+153 ', '1+128', 'ka', 'm3', 'terlaksana', '2020-09-13', 5);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (60, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+128', '1+102', 'ka', 'ls', 'm3', '2020-09-14', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (61, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+128 ', '1+102', 'ka', 'm3', 'lantai', '0000-00-00', 5);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (62, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+173', '1+154', 'ka', 'm3', 'terlaksana (Dinding)', '2020-09-14', 10);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (63, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+102', '1+085', 'ka', 'm3', '(LANTAI)', '2020-09-15', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (64, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+102', ' 1+085', 'ka', 'ls', 'terlaksana', '2020-09-15', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (65, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+120', '1+068 ', 'ka', 'kg', 'terlaksana', '0000-00-00', 2204);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (66, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '1+010 ', '0+985', 'ka', 'M3', 'terlaksana', '2020-09-15', 16);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (67, '7.15.(2)', 'Pembongkaran Beton', '0+325', '0+567', 'ka', 'm3', 'terlaksana', '2020-09-15', 43);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (68, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+102', '1+060', 'ka', 'm3', 'LANTAI', '2020-09-16', 9);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (69, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+102', '1+060', 'ka', 'ls', 'terlaksana', '2020-09-16', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (70, '7.15.(2)', 'Pembongkaran Beton', '0+567', '0+789', 'ka', 'm3', 'terlaksana', '0000-00-00', 43);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (72, '7.15.(2)', 'Pembongkaran Beton', '0+789', '1+010', 'KI', 'M3', 'terlaksana', '2020-09-17', 43);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (73, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '0+789 ', '1+010 ', 'ka', 'ls', 'terlaksana', '2020-09-17', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (71, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+154', '1+120', 'ka', 'M3', 'terlaksana (DINDING)', '0000-00-00', 9);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (74, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '0+735', '0+695', 'ka', 'M3', 'terlaksana', '2020-09-18', 5);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (75, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '0+735', '0+695', 'ka', 'ls', 'terlaksana', '2020-09-18', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (76, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '735', '0+695', 'ka', 'M3', 'terlaksana', '2020-09-19', 5);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (77, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+125', '1+105', 'ka', 'M3', 'terlaksana (DINDING', '2020-09-19', 13);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (78, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+120', '1+105', 'KA', 'M3', 'terlaksana (DINDING)', '2020-09-19', 13);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (79, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+120', '1+105', 'ka', 'ls', 'terlaksana', '2020-09-19', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (80, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+105', '0+430', 'ka', 'ls', 'terlaksana', '2020-09-20', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (81, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+105', ' 1+085', 'ka', 'M3', 'terlaksana (DINDING)', '2020-09-20', 6);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (82, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '0+660', '0+575 ', 'ka', 'M3', 'terlaksana', '2020-09-20', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (83, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '0+430', '0+475 ', 'ka', 'M3', 'terlaksana', '0000-00-00', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (84, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+085', '1+079', 'ka', 'ls', 'terlaksana', '2020-09-21', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (85, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+085', '1+079', 'ka', 'M3', 'terlaksana (DINDING)', '2020-09-21', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (86, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+010', '0+375', 'ka', 'ls', 'terlaksana', '2020-09-22', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (87, '7.3 (1)', 'Baja Tulangan U24 Polos', '0+645', '0+660', 'ka', 'kg', 'terlaksana ', '0000-00-00', 551);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (88, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '0+410 ', '0+375', 'ka', 'M3', 'terlaksana', '2020-09-22', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (89, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '0+685', '0+675', 'ka', 'M3', 'terlaksana', '2020-09-22', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (90, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+085', '1+070', 'ka', 'M3', 'terlaksana', '2020-09-22', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (91, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+153', ' 1+167', 'ka', 'KG', 'terlaksana (Penutup)', '2020-09-22', 338);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (92, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+173', ' 0+650 ', 'ka', 'ls', 'terlaksana', '2020-09-23', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (93, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+085 ', '1+060', 'ka', 'M3', 'terlaksana', '2020-09-23', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (94, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+015', '1+000', 'ka', 'KG', 'terlaksana', '2020-09-23', 551);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (96, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '0+735', '0+720', 'ka', 'M3', 'terlaksana', '2020-09-23', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (97, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '1+010', '1+000', 'ka', 'M3', 'terlaksana', '2020-09-23', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (95, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+015', '1+000', 'ka', 'M3', 'terlaksana', '0000-00-00', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (98, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '0+665', '0+650', 'ka', 'M3', 'terlaksana', '2020-09-23', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (99, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+167', '1+160', 'ka', 'M3', 'terlaksana', '2020-09-23', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (100, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+157', '1+150', 'ka', 'M3', 'terlaksana', '2020-09-23', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (101, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+133', '1+123', 'ka', 'M3', 'terlaksana', '2020-09-24', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (102, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+133', '0+575', 'ka', 'ls', 'terlaksana', '2020-09-24', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (103, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+133', ' 1+123', 'ka', 'kg', 'terlaksana', '2020-09-23', 240);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (104, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+120', '1+110', 'ka', 'kg', 'terlaksana', '2020-09-24', 240);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (105, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '0+720', '0+650', 'ka', 'M3', 'terlaksana (LANTAI)', '2020-09-24', 14);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (106, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '0+375', '0+329 ', 'ka', 'M3', 'terlaksana', '2020-09-24', 4);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (107, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '0+635', '0+575', 'ka', 'M3', 'terlaksana', '2020-09-24', 12);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (108, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+010', '0+750', 'ka', 'ls', 'terlaksana', '2020-09-25', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (109, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+010', '1+120', 'ka', 'm3', 'terlaksana (TOP)', '2020-09-25', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (110, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+015', '1+000', 'ka', 'M3', 'terlaksana (DINDING)', '2020-09-25', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (111, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '0+750', '0+784', 'ka', 'M3', 'terlaksana', '2020-09-25', 6);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (2, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '49+177', '49+169', 'Ka', 'M3', 'Terlaksana', '0000-00-00', 13);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (4, '6.3.(5a)', 'Laston Lapis Aus (AC-WC) ', 'Km.Bdg. 108+484', 'Km.Bdg. 108+684', 'ki', 'ton', '', '2020-11-02', 120);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (5, '7.15.(1)', 'Pembongkaran Pasangan Batu', '1+175', '1+148', 'ka', 'M3', 'terlaksana', '2020-08-24', 18);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (6, '7.15.(2)', 'Pembongkaran Beton', '1+175', '1+148', 'ka', 'M3', 'terlaksana', '2020-08-24', 4);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (7, '7.15.(9)', 'Pengangkutan Hasil Bongkaran yang melebihi 5 km', '1+175', '1+148', 'ka', 'M3', 'terlaksana', '2020-08-24', 21);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (8, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '', '', '', '', '', '2020-08-24', 0);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (9, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+148', '1+125', 'ka', 'bh', 'terlaksana', '2020-08-25', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (10, '7.15.(1)', 'Pembongkaran Pasangan Batu', '1+148', '1+125', 'ka', 'M3', 'terlaksana', '2020-08-25', 16);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (11, '7.15.(2)', 'Pembongkaran Beton', '1+148 ', '1+125', 'ka', 'M3', 'terlaksana', '2020-08-25', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (12, '7.15.(9)', 'Pengangkutan Hasil Bongkaran yang melebihi 5 km', '1+148', '1+125', 'ka', 'M3', 'terlaksana', '2020-08-25', 19);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (13, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+100', '1+060', 'ka', 'bh', 'terlaksana', '2020-08-29', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (14, '7.15.(1)', 'Pembongkaran Pasangan Batu', '1+100', '1+060', 'ka', 'M3', 'terlaksana', '2020-08-29', 27);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (15, '7.15.(2)', 'Pembongkaran Beton', '1+100', '1+060', 'ka', 'M3', 'terlaksana', '2020-08-29', 6);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (16, '7.15.(9)', 'Pengangkutan Hasil Bongkaran yang melebihi 5 km', '1+100', '1+060', 'ka', 'M3', 'terlaksana', '2020-08-29', 33);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (17, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+000', '0+875', 'Ka', 'bh', 'terlaksana', '2020-08-30', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (18, '7.15.(1)', 'Pembongkaran Pasangan Batu', '1+000', '0+875', 'ka', 'M3', 'terlaksana', '2020-08-30', 85);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (19, '7.15.(2)', 'Pembongkaran Beton', '1+000', '0+875', 'ka', 'M3', 'terlaksana', '2020-08-30', 18);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (20, '7.15.(9)', 'Pengangkutan Hasil Bongkaran yang melebihi 5 km', '1+000', '0+875', 'ka', 'M3', 'terlaksana', '2020-08-30', 103);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (21, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '0+875', '0+660', 'ka', 'bh', 'terlaksana', '2020-08-31', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (22, '7.15.(1)', 'Pembongkaran Pasangan Batu', '0+875', '0+660', 'ka', 'M3', 'terlaksana', '2020-08-31', 146);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (23, '7.15.(2)', 'Pembongkaran Beton', '0+875', '0+660', 'ka', 'M3', 'terlaksana', '2020-08-31', 30);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (24, '7.15.(9)', 'Pengangkutan Hasil Bongkaran yang melebihi 5 km', '0+875', '0+660', 'ka', 'M3', 'terlaksana', '2020-08-31', 176);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (25, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '0+660', '0+480', 'ka', 'bh', 'terlaksana', '2020-09-01', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (26, '7.15.(1)', 'Pembongkaran Pasangan Batu', '0+660', '0+480', 'ka', 'M3', 'terlaksana', '2020-09-01', 122);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (27, '7.15.(2)', 'Pembongkaran Beton', '0+660', '0+480', 'ka', 'M3', 'terlaksana', '2020-09-01', 25);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (28, '7.15.(9)', 'Pengangkutan Hasil Bongkaran yang melebihi 5 km', '0+660', '0+480', 'ka', 'M3', 'terlaksana', '2020-09-01', 148);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (29, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '0+480', '0+240', 'ka', 'bh', 'terlaksana', '2020-09-02', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (30, '7.15.(1)', 'Pembongkaran Pasangan Batu', '0+480', '0+240', 'ka', 'M3', 'terlaksana', '2020-09-02', 163);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (31, '7.15.(2)', 'Pembongkaran Beton', '0+480', '0+240', 'ka', 'M3', 'terlaksana', '2020-09-02', 34);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (32, '7.15.(9)', 'Pengangkutan Hasil Bongkaran yang melebihi 5 km', '0+480', '0+240', 'ka', 'M3', 'terlaksana', '2020-09-02', 197);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (33, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '0+240', '0+022', 'ka', 'bh', 'terlaksana', '2020-09-03', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (34, '7.15.(1)', 'Pembongkaran Pasangan Batu', '0+240', '0+022', 'ka', 'M3', 'terlaksana', '2020-09-03', 148);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (35, '7.15.(2)', 'Pembongkaran Beton', '0+240', '0+022', 'ka', 'M3', 'terlaksana', '2020-09-03', 31);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (36, '7.15.(9)', 'Pengangkutan Hasil Bongkaran yang melebihi 5 km', '0+240', '0+022', 'ka', 'M3', 'terlaksana', '2020-09-03', 179);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (37, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+173', '1+120', 'ka', 'bh', 'terlaksana', '2020-09-04', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (38, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '1+173', '1+120', 'ka', 'm3', 'terlaksana', '2020-09-04', 8);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (39, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '1+173', '1+120', 'ka', 'M3', 'terlaksana', '0000-00-00', 8);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (41, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+149.5', '1+137.5', 'ka', 'kg', 'terlaksana', '2020-09-07', 430);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (42, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+173', '1+149.5', 'ka', 'ls', 'terlaksana', '2020-09-06', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (40, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+173', '1+049.5', 'ka', 'kg', 'terlaksana', '0000-00-00', 1431);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (43, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+149.5', '1+137.5', 'ka', 'ls', 'terlaksana', '2020-09-07', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (45, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+137.5', '1+120', 'ka', 'ls', 'terlaksana', '2020-09-08', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (44, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+137.5', '1+120', 'ka', 'kg', 'terlaksana', '0000-00-00', 1120);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (46, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+173', '1+155', 'ka', 'm3', 'terlaksana', '2020-09-09', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (47, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+173', '1+155', 'ka', 'ls', 'terlaksana', '2020-09-09', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (48, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+155', '1+137', 'ka', 'ls', 'terlaksana', '2020-09-10', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (49, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+155', '1+137', 'ka', 'm3', 'terlaksana', '2020-09-10', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (50, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+137', ' 1+120', 'ka', 'ls', 'terlaksana', '0000-00-00', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (52, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+137 ', '1+120 ', 'ka', 'ls', 'terlaksana', '2020-09-11', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (53, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+137', '1+120', 'ka', 'm3', 'terlaksana', '2020-09-11', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (51, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+137', '1+120', 'ka', 'm3', 'terlaksana', '0000-00-00', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (54, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+120 ', '1+068', 'ka', 'ls', 'bh', '2020-09-11', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (55, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '1+120 ', '1+068', 'ka', 'm3', 'terlaksana', '2020-09-11', 5);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (56, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+173 ', '1+153', 'ka', 'ls', 'terlaksana', '2020-09-12', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (57, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+173', '1+153', 'ka', 'm3', 'terlaksana', '2020-09-12', 4);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (58, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+153', '1+128', 'ka', 'ls', 'terlaksana', '2020-09-13', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (59, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+153 ', '1+128', 'ka', 'm3', 'terlaksana', '2020-09-13', 5);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (60, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+128', '1+102', 'ka', 'ls', 'm3', '2020-09-14', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (61, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+128 ', '1+102', 'ka', 'm3', 'lantai', '0000-00-00', 5);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (62, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+173', '1+154', 'ka', 'm3', 'terlaksana (Dinding)', '2020-09-14', 10);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (63, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+102', '1+085', 'ka', 'm3', '(LANTAI)', '2020-09-15', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (64, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+102', ' 1+085', 'ka', 'ls', 'terlaksana', '2020-09-15', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (65, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+120', '1+068 ', 'ka', 'kg', 'terlaksana', '0000-00-00', 2204);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (66, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '1+010 ', '0+985', 'ka', 'M3', 'terlaksana', '2020-09-15', 16);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (67, '7.15.(2)', 'Pembongkaran Beton', '0+325', '0+567', 'ka', 'm3', 'terlaksana', '2020-09-15', 43);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (68, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+102', '1+060', 'ka', 'm3', 'LANTAI', '2020-09-16', 9);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (69, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+102', '1+060', 'ka', 'ls', 'terlaksana', '2020-09-16', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (70, '7.15.(2)', 'Pembongkaran Beton', '0+567', '0+789', 'ka', 'm3', 'terlaksana', '0000-00-00', 43);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (72, '7.15.(2)', 'Pembongkaran Beton', '0+789', '1+010', 'KI', 'M3', 'terlaksana', '2020-09-17', 43);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (73, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '0+789 ', '1+010 ', 'ka', 'ls', 'terlaksana', '2020-09-17', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (71, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+154', '1+120', 'ka', 'M3', 'terlaksana (DINDING)', '0000-00-00', 9);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (74, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '0+735', '0+695', 'ka', 'M3', 'terlaksana', '2020-09-18', 5);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (75, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '0+735', '0+695', 'ka', 'ls', 'terlaksana', '2020-09-18', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (76, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '735', '0+695', 'ka', 'M3', 'terlaksana', '2020-09-19', 5);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (77, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+125', '1+105', 'ka', 'M3', 'terlaksana (DINDING', '2020-09-19', 13);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (78, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+120', '1+105', 'KA', 'M3', 'terlaksana (DINDING)', '2020-09-19', 13);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (79, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+120', '1+105', 'ka', 'ls', 'terlaksana', '2020-09-19', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (80, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+105', '0+430', 'ka', 'ls', 'terlaksana', '2020-09-20', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (81, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+105', ' 1+085', 'ka', 'M3', 'terlaksana (DINDING)', '2020-09-20', 6);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (82, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '0+660', '0+575 ', 'ka', 'M3', 'terlaksana', '2020-09-20', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (83, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '0+430', '0+475 ', 'ka', 'M3', 'terlaksana', '0000-00-00', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (84, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+085', '1+079', 'ka', 'ls', 'terlaksana', '2020-09-21', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (85, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+085', '1+079', 'ka', 'M3', 'terlaksana (DINDING)', '2020-09-21', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (86, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+010', '0+375', 'ka', 'ls', 'terlaksana', '2020-09-22', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (87, '7.3 (1)', 'Baja Tulangan U24 Polos', '0+645', '0+660', 'ka', 'kg', 'terlaksana ', '0000-00-00', 551);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (88, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '0+410 ', '0+375', 'ka', 'M3', 'terlaksana', '2020-09-22', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (89, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '0+685', '0+675', 'ka', 'M3', 'terlaksana', '2020-09-22', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (90, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+085', '1+070', 'ka', 'M3', 'terlaksana', '2020-09-22', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (91, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+153', ' 1+167', 'ka', 'KG', 'terlaksana (Penutup)', '2020-09-22', 338);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (92, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+173', ' 0+650 ', 'ka', 'ls', 'terlaksana', '2020-09-23', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (93, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+085 ', '1+060', 'ka', 'M3', 'terlaksana', '2020-09-23', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (94, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+015', '1+000', 'ka', 'KG', 'terlaksana', '2020-09-23', 551);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (96, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '0+735', '0+720', 'ka', 'M3', 'terlaksana', '2020-09-23', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (97, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '1+010', '1+000', 'ka', 'M3', 'terlaksana', '2020-09-23', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (95, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+015', '1+000', 'ka', 'M3', 'terlaksana', '0000-00-00', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (98, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '0+665', '0+650', 'ka', 'M3', 'terlaksana', '2020-09-23', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (99, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+167', '1+160', 'ka', 'M3', 'terlaksana', '2020-09-23', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (100, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+157', '1+150', 'ka', 'M3', 'terlaksana', '2020-09-23', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (101, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+133', '1+123', 'ka', 'M3', 'terlaksana', '2020-09-24', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (102, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+133', '0+575', 'ka', 'ls', 'terlaksana', '2020-09-24', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (103, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+133', ' 1+123', 'ka', 'kg', 'terlaksana', '2020-09-23', 240);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (104, '7.3 (1)', 'Baja Tulangan U24 Polos', '1+120', '1+110', 'ka', 'kg', 'terlaksana', '2020-09-24', 240);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (105, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '0+720', '0+650', 'ka', 'M3', 'terlaksana (LANTAI)', '2020-09-24', 14);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (106, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '0+375', '0+329 ', 'ka', 'M3', 'terlaksana', '2020-09-24', 4);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (107, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '0+635', '0+575', 'ka', 'M3', 'terlaksana', '2020-09-24', 12);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (108, 'SKH.1.19', 'Keselamataan dan Kesehatan Kerja', '1+010', '0+750', 'ka', 'ls', 'terlaksana', '2020-09-25', 1);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (109, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+010', '1+120', 'ka', 'm3', 'terlaksana (TOP)', '2020-09-25', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (110, '7.1 (7).a', 'Beton mutu sedang fcï¿½20 MPa ', '1+015', '1+000', 'ka', 'M3', 'terlaksana (DINDING)', '2020-09-25', 3);
INSERT INTO `detail_laporan_harian_pekerjaan` VALUES (111, '7.1 (10)', 'Beton mutu rendah fcï¿½ 10 Mpa', '0+750', '0+784', 'ka', 'M3', 'terlaksana', '2020-09-25', 6);

-- ----------------------------
-- Table structure for detail_laporan_harian_peralatan
-- ----------------------------
DROP TABLE IF EXISTS `detail_laporan_harian_peralatan`;
CREATE TABLE `detail_laporan_harian_peralatan`  (
  `no_trans` int NOT NULL,
  `id_kegiatan` int NOT NULL AUTO_INCREMENT,
  `jenis_peralatan` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jumlah` decimal(10, 0) NOT NULL,
  `satuan` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_kegiatan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2389 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of detail_laporan_harian_peralatan
-- ----------------------------
INSERT INTO `detail_laporan_harian_peralatan` VALUES (2, 4, 'Truck Mixer', 2, 'Unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (2, 5, 'Concrete Vibrator', 1, 'Unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (4, 8, 'Asphalat Mixing Plant', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (4, 9, 'Dump Truck', 12, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (4, 10, 'Asphalt Finisher', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (4, 11, 'Tandem Roller', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (4, 12, 'Tyre Roller', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (4, 13, 'Alat Bantu', 1, 'ls');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (5, 14, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (6, 15, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (7, 16, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (7, 17, 'dumtruck', 2, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (8, 18, 'thermogun ', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (8, 19, 'rambu rambu', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (8, 20, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (8, 21, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (8, 22, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (8, 23, 'tongkat pengatur lalu lintas', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (9, 24, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (9, 25, 'rambu rambu', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (9, 26, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (9, 27, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (9, 28, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (9, 29, 'tongkat pengatur lalu lintas', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (10, 30, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (11, 31, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (12, 32, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (12, 33, 'Dumtruck', 2, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (13, 34, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (13, 35, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (13, 36, 'rambu rambu', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (13, 37, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (13, 38, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (13, 39, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (13, 40, 'tongkat pengatur lalu lintas', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (13, 41, 'road barier', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (14, 42, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (14, 43, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (15, 44, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (15, 45, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (16, 46, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (16, 47, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (16, 48, 'dumtruck', 2, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (17, 49, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (17, 50, 'masker', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (17, 51, 'rambu rambu', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (17, 52, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (17, 53, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (17, 54, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (17, 55, 'tongkat pengatur lalu lintas', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (17, 56, 'road barier', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (17, 57, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (18, 58, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (18, 59, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (19, 60, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (19, 61, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (20, 62, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (20, 63, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (20, 64, 'dumtruck', 2, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (21, 65, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (21, 66, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (21, 67, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (21, 68, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (21, 69, 'rambu rambu', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (21, 70, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (21, 71, 'tongkat pengatur lalu lintas', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (21, 72, 'road barier', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (21, 73, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (22, 74, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (22, 75, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (23, 76, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (23, 77, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (24, 78, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (24, 79, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (24, 80, 'dumtruck', 2, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (25, 81, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (25, 82, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (25, 83, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (25, 84, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (25, 85, 'rambu rambu ', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (25, 86, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (25, 87, 'tongkat pengatur lalu lintas', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (25, 88, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (25, 89, 'road barier', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (26, 90, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (26, 91, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (27, 92, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (27, 93, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (28, 94, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (28, 95, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (28, 96, 'dumtruck', 2, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (29, 97, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (29, 98, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (29, 99, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (29, 100, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (29, 101, 'rambu rambu', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (29, 102, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (29, 103, 'tongkat pengatur lalu lintas', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (29, 104, 'road barier', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (29, 105, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (30, 106, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (30, 107, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (31, 108, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (31, 109, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (32, 110, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (32, 111, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (32, 112, 'dumtruck', 2, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (33, 113, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (33, 114, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (33, 115, 'rambu rambu', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (33, 116, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (33, 117, 'rompi ', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (33, 118, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (33, 119, 'tongkat pengatur lalu lintas', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (33, 120, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (33, 121, 'road barier', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (34, 122, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (34, 123, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (35, 124, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (35, 125, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (36, 126, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (36, 127, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (36, 128, 'dumtruck', 2, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (37, 129, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (37, 130, 'masker', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (37, 131, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (37, 132, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (37, 133, 'rambu rambu', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (37, 134, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (37, 135, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (38, 136, 'conc.mixer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (38, 137, 'water tanker', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (38, 138, 'alat bantu', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (39, 139, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (39, 140, 'cangkul', 4, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (39, 141, 'roskam', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (39, 142, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (41, 143, 'alat pembengkok', 3, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (41, 144, 'alat pemotong', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (41, 145, 'kunci penekuk', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (41, 146, 'gunting kawat', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (41, 147, 'meteran', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (41, 148, 'kapur', 1, 'ds');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (41, 149, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (42, 150, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (42, 151, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (42, 152, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (42, 153, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (42, 154, 'rompi', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (42, 155, 'helm proyek', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (42, 156, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (40, 157, 'alat pembengkok', 3, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (40, 158, 'alat pemotong ', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (40, 159, 'kunci penekuk', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (40, 160, 'gunting kawat', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (40, 161, 'meteran', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (40, 162, 'kapur', 1, 'ds');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (40, 163, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (43, 164, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (43, 165, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (43, 166, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (43, 167, 'helm proyek', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (43, 168, 'rompi', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (43, 169, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (43, 170, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (45, 171, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (45, 172, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (45, 173, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (45, 174, 'helm proyek', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (45, 175, 'rompi', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (45, 176, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (45, 177, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (44, 178, 'alat pembengkok', 3, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (44, 179, 'alat pemotong', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (44, 180, 'kunci penekuk', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (44, 181, 'gunting kawat', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (44, 182, 'meteran', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (44, 183, 'kapur', 1, 'ds');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (44, 184, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (46, 185, 'gergaji', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (46, 186, 'serut', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (46, 187, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (46, 188, 'linggis', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (46, 189, 'palu', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (46, 190, 'role meter', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (46, 191, 'kapak', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (46, 192, 'paku', 4, 'kg');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (47, 193, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (47, 194, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (47, 195, 'masker', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (47, 196, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (47, 197, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (47, 198, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (47, 199, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (48, 200, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (48, 201, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (48, 202, 'masker', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (48, 203, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (48, 204, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (48, 205, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (48, 206, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (49, 207, 'gergaji', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (49, 208, 'serut', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (49, 209, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (49, 210, 'linggis', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (49, 211, 'palu', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (49, 212, 'role meter', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (49, 213, 'kapak', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (49, 214, 'paku', 4, 'kg');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (50, 215, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (50, 216, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (50, 217, 'masker', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (50, 218, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (50, 219, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (50, 220, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (50, 221, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (52, 222, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (52, 223, 'posko covid 19', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (52, 224, 'masker', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (52, 225, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (52, 226, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (52, 227, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (52, 228, 'trafic cone ', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (53, 229, 'gergaji', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (53, 230, 'serut', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (53, 231, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (53, 232, 'linggis', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (53, 233, 'palu', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (53, 234, 'role meter', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (53, 235, 'kapak', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (53, 236, 'paku', 3, 'kg');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (51, 237, 'gergaji', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (51, 238, 'serut', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (51, 239, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (51, 240, 'linggis', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (51, 241, 'palu', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (51, 242, 'role meter', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (51, 243, 'kapak', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (51, 244, 'paku', 3, 'kg');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (54, 245, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (54, 246, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (54, 247, 'masker', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (54, 248, 'helm proyek', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (54, 249, 'rompi', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (54, 250, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (54, 251, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (55, 252, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (55, 253, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (55, 254, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (55, 255, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (55, 256, 'truck mixer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (56, 257, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (56, 258, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (56, 259, 'masker', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (56, 260, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (56, 261, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (56, 262, 'rambu rambu', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (56, 263, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (56, 264, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (57, 265, 'sekop ', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (57, 266, 'cangkul', 4, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (57, 267, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (57, 268, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (57, 269, 'gergaji', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (57, 270, 'serut', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (57, 271, 'palu', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (57, 272, 'kapak', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (57, 273, 'paku', 3, 'kg');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (57, 274, 'linggis', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (58, 275, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (58, 276, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (58, 277, 'masker', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (58, 278, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (58, 279, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (58, 280, 'rambu rambu', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (58, 281, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (58, 282, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (59, 283, 'sekop ', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (59, 284, 'cangkul', 4, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (59, 285, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (59, 286, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (59, 287, 'gergaji', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (59, 288, 'serut', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (59, 289, 'palu', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (59, 290, 'kapak', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (59, 291, 'paku', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (59, 292, 'linggis', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (60, 293, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (60, 294, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (60, 295, 'masker', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (60, 296, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (60, 297, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (60, 298, 'rambu rambu', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (60, 299, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (60, 300, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (61, 301, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (61, 302, 'cangkul', 4, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (61, 303, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (61, 304, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (61, 305, 'gergaji', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (61, 306, 'serut', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (61, 307, 'palu', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (61, 308, 'kapak', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (61, 309, 'paku', 3, 'kg');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (61, 310, 'linggis', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (62, 311, 'sekop ', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (62, 312, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (62, 313, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (62, 314, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (62, 315, 'vibrator beton', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (63, 316, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (63, 317, 'cangkul', 4, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (63, 318, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (63, 319, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (63, 320, 'gergaji', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (63, 321, 'serut', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (63, 322, 'palu', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (63, 323, 'kapak', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (63, 324, 'paku', 3, 'kg');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (63, 325, 'linggis', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (64, 326, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (64, 327, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (64, 328, 'masker', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (64, 329, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (64, 330, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (64, 331, 'rambu rambu', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (64, 332, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (64, 333, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (65, 334, 'alat pembengkok manual', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (65, 335, 'alat pemotong', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (65, 336, 'kunci penekuk', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (65, 337, 'gunting kawat', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (65, 338, 'meteran', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (65, 339, 'kapur', 1, 'ds');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (65, 340, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (66, 341, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (66, 342, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (66, 343, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (66, 344, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (67, 345, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (68, 346, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (68, 347, 'cangkul', 4, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (68, 348, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (68, 349, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (68, 350, 'gergaji', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (68, 351, 'serut', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (68, 352, 'palu', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (68, 353, 'kapak', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (68, 354, 'paku', 3, 'kg');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (68, 355, 'linggis', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (69, 356, 'posko covid', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (69, 357, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (69, 358, 'masker', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (69, 359, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (69, 360, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (69, 361, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (69, 362, 'rambu rambu', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (69, 363, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (70, 364, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (72, 365, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (73, 366, 'posko covid', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (73, 367, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (73, 368, 'masker', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (73, 369, 'helm proyek', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (73, 370, 'rompi proyek', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (73, 371, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (73, 372, 'rambu rambu', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (73, 373, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (71, 374, 'Sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (71, 375, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (71, 376, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (71, 377, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (71, 378, 'vibrator beton', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (74, 379, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (74, 380, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (74, 381, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (74, 382, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (75, 383, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (75, 384, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (75, 385, 'masker', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (75, 386, 'helm proyek', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (75, 387, 'rompi', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (75, 388, 'rambu rambu', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (75, 389, 'trafic cone', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (75, 390, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (76, 391, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (76, 392, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (76, 393, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (76, 394, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (77, 395, '', 0, '');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (78, 396, 'vibrator beton', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (78, 397, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (78, 398, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (78, 399, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (78, 400, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (79, 401, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (79, 402, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (79, 403, 'masker', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (79, 404, 'helm proyek', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (79, 405, 'rompi', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (79, 406, 'trafic cone', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (79, 407, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (79, 408, 'rambu rambu', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (80, 409, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (80, 410, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (80, 411, 'masker', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (80, 412, 'helm proyek', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (80, 413, 'rompi', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (80, 414, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (80, 415, 'trafic cone', 7, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (80, 416, 'rambu rambu', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (81, 417, 'vibrator beton', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (81, 418, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (81, 419, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (81, 420, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (81, 421, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (82, 422, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (82, 423, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (82, 424, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (82, 425, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (83, 426, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (83, 427, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (83, 428, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (83, 429, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (84, 430, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (84, 431, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (84, 432, 'masker', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (84, 433, 'helm proyek', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (84, 434, 'rompi', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (84, 435, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (84, 436, 'trafic cone', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (84, 437, 'rambu rambu', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (85, 438, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (85, 439, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (85, 440, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (85, 441, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (85, 442, 'vibrator beton', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (86, 443, 'posko civid 19 ', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (86, 444, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (86, 445, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (86, 446, 'helm proyek', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (86, 447, 'rompi', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (86, 448, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (86, 449, 'trafic cone', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (87, 450, 'alat pembengkok manual', 3, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (87, 451, 'alat pemotong ', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (87, 452, 'kunci penekuk ', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (87, 453, 'gunting kawat ', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (87, 454, 'meteran ', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (87, 455, 'kapur', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (88, 456, 'TM', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (88, 457, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (88, 458, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (88, 459, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (88, 460, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (89, 461, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (89, 462, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (89, 463, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (89, 464, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (89, 465, 'TM', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (90, 466, 'vibrator roler', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (90, 467, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (90, 468, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (90, 469, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (90, 470, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (90, 471, 'gergaji', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (90, 472, 'serut', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (90, 473, 'palu', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (90, 474, 'kapak', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (90, 475, 'paku', 4, 'kg');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (91, 476, 'alat pembengkok manual', 3, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (91, 477, 'alat pemotong ', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (91, 478, 'kunci penekuk ', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (91, 479, 'gunting kawat ', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (91, 480, 'meteran', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (91, 481, 'kapur', 1, 'ds');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (92, 482, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (92, 483, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (92, 484, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (92, 485, 'helm proyek', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (92, 486, 'rompi', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (92, 487, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (92, 488, 'trafic cone', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (93, 489, 'vibrator roler', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (93, 490, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (93, 491, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (93, 492, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (93, 493, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (94, 494, 'alat pembengkok manual', 3, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (94, 495, 'alat pemotong ', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (94, 496, 'kunci penekuk', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (94, 497, 'gunting kawat', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (94, 498, 'meteran', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (94, 499, 'kapur', 1, 'ds');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (96, 500, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (96, 501, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (96, 502, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (96, 503, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (97, 504, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (97, 505, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (97, 506, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (97, 507, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (95, 508, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (95, 509, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (95, 510, 'roskam', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (95, 511, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (95, 512, 'palu', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (95, 513, 'kapak', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (98, 514, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (98, 515, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (98, 516, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (98, 517, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (99, 518, 'Tm', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (99, 519, 'vibrator beton', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (99, 520, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (99, 521, 'cangkul', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (99, 522, 'roskam', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (99, 523, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (100, 524, 'vibrator beton', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (100, 525, 'Tm', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (100, 526, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (100, 527, 'cangkul', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (100, 528, 'roskam', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (100, 529, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (101, 530, 'vibrator roler', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (101, 531, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (101, 532, 'cangkul', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (101, 533, 'roskam', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (101, 534, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (101, 535, 'truck mixer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (102, 536, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (102, 537, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (102, 538, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (102, 539, 'helm proyek', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (102, 540, 'rompi', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (102, 541, 'trafic cone', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (102, 542, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (103, 543, 'alat pembengkok manual', 3, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (103, 544, 'alat pemotong', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (103, 545, 'kunci penekuk', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (103, 546, 'kunci penekuk', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (103, 547, 'meteran ', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (103, 548, 'kapur', 1, 'ds');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (104, 549, 'alat pembengkok manual', 3, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (104, 550, 'alat pemotong ', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (104, 551, 'kunci penekuk', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (104, 552, 'gunting kawat', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (104, 553, 'meteran', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (104, 554, 'kapur', 1, 'ds');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (105, 555, 'truck mixer', 2, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (105, 556, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (105, 557, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (105, 558, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (105, 559, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (106, 560, 'truck mixer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (106, 561, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (106, 562, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (106, 563, 'roskam', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (106, 564, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (107, 565, 'truck mixer', 2, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (107, 566, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (107, 567, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (107, 568, 'roskam', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (107, 569, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (108, 570, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (108, 571, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (108, 572, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (108, 573, 'helm proyek', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (108, 574, 'rompi', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (108, 575, 'trafic cone', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (109, 576, 'truck mixer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (109, 577, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (109, 578, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (109, 579, 'roskam', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (109, 580, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (109, 581, 'vibrator beton', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (110, 582, 'truck mixer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (110, 583, 'vibrator beton', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (110, 584, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (110, 585, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (110, 586, 'roskam', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (110, 587, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (111, 588, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (111, 589, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (111, 590, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (111, 591, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (111, 592, 'truck mixer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (2, 596, 'Truck Mixer', 2, 'Unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (2, 597, 'Concrete Vibrator', 1, 'Unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (4, 600, 'Asphalat Mixing Plant', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (4, 601, 'Dump Truck', 12, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (4, 602, 'Asphalt Finisher', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (4, 603, 'Tandem Roller', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (4, 604, 'Tyre Roller', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (4, 605, 'Alat Bantu', 1, 'ls');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (5, 606, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (6, 607, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (7, 608, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (7, 609, 'dumtruck', 2, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (8, 610, 'thermogun ', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (8, 611, 'rambu rambu', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (8, 612, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (8, 613, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (8, 614, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (8, 615, 'tongkat pengatur lalu lintas', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (9, 616, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (9, 617, 'rambu rambu', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (9, 618, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (9, 619, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (9, 620, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (9, 621, 'tongkat pengatur lalu lintas', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (10, 622, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (11, 623, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (12, 624, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (12, 625, 'Dumtruck', 2, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (13, 626, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (13, 627, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (13, 628, 'rambu rambu', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (13, 629, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (13, 630, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (13, 631, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (13, 632, 'tongkat pengatur lalu lintas', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (13, 633, 'road barier', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (14, 634, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (14, 635, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (15, 636, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (15, 637, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (16, 638, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (16, 639, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (16, 640, 'dumtruck', 2, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (17, 641, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (17, 642, 'masker', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (17, 643, 'rambu rambu', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (17, 644, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (17, 645, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (17, 646, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (17, 647, 'tongkat pengatur lalu lintas', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (17, 648, 'road barier', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (17, 649, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (18, 650, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (18, 651, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (19, 652, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (19, 653, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (20, 654, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (20, 655, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (20, 656, 'dumtruck', 2, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (21, 657, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (21, 658, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (21, 659, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (21, 660, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (21, 661, 'rambu rambu', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (21, 662, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (21, 663, 'tongkat pengatur lalu lintas', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (21, 664, 'road barier', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (21, 665, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (22, 666, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (22, 667, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (23, 668, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (23, 669, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (24, 670, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (24, 671, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (24, 672, 'dumtruck', 2, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (25, 673, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (25, 674, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (25, 675, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (25, 676, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (25, 677, 'rambu rambu ', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (25, 678, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (25, 679, 'tongkat pengatur lalu lintas', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (25, 680, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (25, 681, 'road barier', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (26, 682, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (26, 683, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (27, 684, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (27, 685, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (28, 686, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (28, 687, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (28, 688, 'dumtruck', 2, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (29, 689, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (29, 690, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (29, 691, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (29, 692, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (29, 693, 'rambu rambu', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (29, 694, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (29, 695, 'tongkat pengatur lalu lintas', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (29, 696, 'road barier', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (29, 697, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (30, 698, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (30, 699, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (31, 700, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (31, 701, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (32, 702, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (32, 703, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (32, 704, 'dumtruck', 2, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (33, 705, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (33, 706, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (33, 707, 'rambu rambu', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (33, 708, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (33, 709, 'rompi ', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (33, 710, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (33, 711, 'tongkat pengatur lalu lintas', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (33, 712, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (33, 713, 'road barier', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (34, 714, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (34, 715, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (35, 716, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (35, 717, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (36, 718, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (36, 719, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (36, 720, 'dumtruck', 2, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (37, 721, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (37, 722, 'masker', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (37, 723, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (37, 724, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (37, 725, 'rambu rambu', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (37, 726, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (37, 727, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (38, 728, 'conc.mixer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (38, 729, 'water tanker', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (38, 730, 'alat bantu', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (39, 731, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (39, 732, 'cangkul', 4, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (39, 733, 'roskam', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (39, 734, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (41, 735, 'alat pembengkok', 3, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (41, 736, 'alat pemotong', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (41, 737, 'kunci penekuk', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (41, 738, 'gunting kawat', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (41, 739, 'meteran', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (41, 740, 'kapur', 1, 'ds');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (41, 741, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (42, 742, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (42, 743, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (42, 744, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (42, 745, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (42, 746, 'rompi', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (42, 747, 'helm proyek', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (42, 748, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (40, 749, 'alat pembengkok', 3, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (40, 750, 'alat pemotong ', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (40, 751, 'kunci penekuk', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (40, 752, 'gunting kawat', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (40, 753, 'meteran', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (40, 754, 'kapur', 1, 'ds');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (40, 755, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (43, 756, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (43, 757, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (43, 758, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (43, 759, 'helm proyek', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (43, 760, 'rompi', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (43, 761, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (43, 762, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (45, 763, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (45, 764, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (45, 765, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (45, 766, 'helm proyek', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (45, 767, 'rompi', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (45, 768, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (45, 769, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (44, 770, 'alat pembengkok', 3, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (44, 771, 'alat pemotong', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (44, 772, 'kunci penekuk', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (44, 773, 'gunting kawat', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (44, 774, 'meteran', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (44, 775, 'kapur', 1, 'ds');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (44, 776, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (46, 777, 'gergaji', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (46, 778, 'serut', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (46, 779, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (46, 780, 'linggis', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (46, 781, 'palu', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (46, 782, 'role meter', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (46, 783, 'kapak', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (46, 784, 'paku', 4, 'kg');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (47, 785, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (47, 786, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (47, 787, 'masker', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (47, 788, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (47, 789, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (47, 790, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (47, 791, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (48, 792, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (48, 793, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (48, 794, 'masker', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (48, 795, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (48, 796, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (48, 797, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (48, 798, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (49, 799, 'gergaji', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (49, 800, 'serut', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (49, 801, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (49, 802, 'linggis', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (49, 803, 'palu', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (49, 804, 'role meter', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (49, 805, 'kapak', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (49, 806, 'paku', 4, 'kg');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (50, 807, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (50, 808, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (50, 809, 'masker', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (50, 810, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (50, 811, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (50, 812, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (50, 813, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (52, 814, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (52, 815, 'posko covid 19', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (52, 816, 'masker', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (52, 817, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (52, 818, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (52, 819, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (52, 820, 'trafic cone ', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (53, 821, 'gergaji', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (53, 822, 'serut', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (53, 823, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (53, 824, 'linggis', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (53, 825, 'palu', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (53, 826, 'role meter', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (53, 827, 'kapak', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (53, 828, 'paku', 3, 'kg');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (51, 829, 'gergaji', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (51, 830, 'serut', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (51, 831, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (51, 832, 'linggis', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (51, 833, 'palu', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (51, 834, 'role meter', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (51, 835, 'kapak', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (51, 836, 'paku', 3, 'kg');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (54, 837, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (54, 838, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (54, 839, 'masker', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (54, 840, 'helm proyek', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (54, 841, 'rompi', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (54, 842, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (54, 843, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (55, 844, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (55, 845, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (55, 846, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (55, 847, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (55, 848, 'truck mixer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (56, 849, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (56, 850, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (56, 851, 'masker', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (56, 852, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (56, 853, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (56, 854, 'rambu rambu', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (56, 855, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (56, 856, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (57, 857, 'sekop ', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (57, 858, 'cangkul', 4, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (57, 859, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (57, 860, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (57, 861, 'gergaji', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (57, 862, 'serut', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (57, 863, 'palu', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (57, 864, 'kapak', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (57, 865, 'paku', 3, 'kg');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (57, 866, 'linggis', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (58, 867, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (58, 868, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (58, 869, 'masker', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (58, 870, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (58, 871, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (58, 872, 'rambu rambu', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (58, 873, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (58, 874, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (59, 875, 'sekop ', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (59, 876, 'cangkul', 4, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (59, 877, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (59, 878, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (59, 879, 'gergaji', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (59, 880, 'serut', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (59, 881, 'palu', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (59, 882, 'kapak', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (59, 883, 'paku', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (59, 884, 'linggis', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (60, 885, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (60, 886, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (60, 887, 'masker', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (60, 888, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (60, 889, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (60, 890, 'rambu rambu', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (60, 891, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (60, 892, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (61, 893, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (61, 894, 'cangkul', 4, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (61, 895, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (61, 896, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (61, 897, 'gergaji', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (61, 898, 'serut', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (61, 899, 'palu', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (61, 900, 'kapak', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (61, 901, 'paku', 3, 'kg');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (61, 902, 'linggis', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (62, 903, 'sekop ', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (62, 904, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (62, 905, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (62, 906, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (62, 907, 'vibrator beton', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (63, 908, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (63, 909, 'cangkul', 4, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (63, 910, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (63, 911, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (63, 912, 'gergaji', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (63, 913, 'serut', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (63, 914, 'palu', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (63, 915, 'kapak', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (63, 916, 'paku', 3, 'kg');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (63, 917, 'linggis', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (64, 918, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (64, 919, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (64, 920, 'masker', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (64, 921, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (64, 922, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (64, 923, 'rambu rambu', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (64, 924, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (64, 925, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (65, 926, 'alat pembengkok manual', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (65, 927, 'alat pemotong', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (65, 928, 'kunci penekuk', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (65, 929, 'gunting kawat', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (65, 930, 'meteran', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (65, 931, 'kapur', 1, 'ds');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (65, 932, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (66, 933, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (66, 934, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (66, 935, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (66, 936, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (67, 937, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (68, 938, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (68, 939, 'cangkul', 4, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (68, 940, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (68, 941, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (68, 942, 'gergaji', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (68, 943, 'serut', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (68, 944, 'palu', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (68, 945, 'kapak', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (68, 946, 'paku', 3, 'kg');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (68, 947, 'linggis', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (69, 948, 'posko covid', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (69, 949, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (69, 950, 'masker', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (69, 951, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (69, 952, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (69, 953, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (69, 954, 'rambu rambu', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (69, 955, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (70, 956, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (72, 957, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (73, 958, 'posko covid', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (73, 959, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (73, 960, 'masker', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (73, 961, 'helm proyek', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (73, 962, 'rompi proyek', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (73, 963, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (73, 964, 'rambu rambu', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (73, 965, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (71, 966, 'Sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (71, 967, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (71, 968, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (71, 969, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (71, 970, 'vibrator beton', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (74, 971, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (74, 972, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (74, 973, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (74, 974, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (75, 975, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (75, 976, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (75, 977, 'masker', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (75, 978, 'helm proyek', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (75, 979, 'rompi', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (75, 980, 'rambu rambu', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (75, 981, 'trafic cone', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (75, 982, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (76, 983, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (76, 984, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (76, 985, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (76, 986, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (77, 987, '', 0, '');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (78, 988, 'vibrator beton', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (78, 989, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (78, 990, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (78, 991, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (78, 992, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (79, 993, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (79, 994, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (79, 995, 'masker', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (79, 996, 'helm proyek', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (79, 997, 'rompi', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (79, 998, 'trafic cone', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (79, 999, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (79, 1000, 'rambu rambu', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (80, 1001, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (80, 1002, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (80, 1003, 'masker', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (80, 1004, 'helm proyek', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (80, 1005, 'rompi', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (80, 1006, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (80, 1007, 'trafic cone', 7, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (80, 1008, 'rambu rambu', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (81, 1009, 'vibrator beton', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (81, 1010, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (81, 1011, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (81, 1012, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (81, 1013, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (82, 1014, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (82, 1015, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (82, 1016, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (82, 1017, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (83, 1018, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (83, 1019, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (83, 1020, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (83, 1021, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (84, 1022, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (84, 1023, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (84, 1024, 'masker', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (84, 1025, 'helm proyek', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (84, 1026, 'rompi', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (84, 1027, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (84, 1028, 'trafic cone', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (84, 1029, 'rambu rambu', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (85, 1030, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (85, 1031, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (85, 1032, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (85, 1033, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (85, 1034, 'vibrator beton', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (86, 1035, 'posko civid 19 ', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (86, 1036, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (86, 1037, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (86, 1038, 'helm proyek', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (86, 1039, 'rompi', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (86, 1040, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (86, 1041, 'trafic cone', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (87, 1042, 'alat pembengkok manual', 3, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (87, 1043, 'alat pemotong ', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (87, 1044, 'kunci penekuk ', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (87, 1045, 'gunting kawat ', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (87, 1046, 'meteran ', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (87, 1047, 'kapur', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (88, 1048, 'TM', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (88, 1049, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (88, 1050, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (88, 1051, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (88, 1052, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (89, 1053, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (89, 1054, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (89, 1055, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (89, 1056, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (89, 1057, 'TM', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (90, 1058, 'vibrator roler', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (90, 1059, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (90, 1060, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (90, 1061, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (90, 1062, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (90, 1063, 'gergaji', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (90, 1064, 'serut', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (90, 1065, 'palu', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (90, 1066, 'kapak', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (90, 1067, 'paku', 4, 'kg');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (91, 1068, 'alat pembengkok manual', 3, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (91, 1069, 'alat pemotong ', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (91, 1070, 'kunci penekuk ', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (91, 1071, 'gunting kawat ', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (91, 1072, 'meteran', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (91, 1073, 'kapur', 1, 'ds');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (92, 1074, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (92, 1075, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (92, 1076, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (92, 1077, 'helm proyek', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (92, 1078, 'rompi', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (92, 1079, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (92, 1080, 'trafic cone', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (93, 1081, 'vibrator roler', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (93, 1082, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (93, 1083, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (93, 1084, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (93, 1085, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (94, 1086, 'alat pembengkok manual', 3, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (94, 1087, 'alat pemotong ', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (94, 1088, 'kunci penekuk', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (94, 1089, 'gunting kawat', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (94, 1090, 'meteran', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (94, 1091, 'kapur', 1, 'ds');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (96, 1092, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (96, 1093, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (96, 1094, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (96, 1095, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (97, 1096, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (97, 1097, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (97, 1098, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (97, 1099, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (95, 1100, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (95, 1101, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (95, 1102, 'roskam', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (95, 1103, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (95, 1104, 'palu', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (95, 1105, 'kapak', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (98, 1106, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (98, 1107, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (98, 1108, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (98, 1109, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (99, 1110, 'Tm', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (99, 1111, 'vibrator beton', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (99, 1112, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (99, 1113, 'cangkul', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (99, 1114, 'roskam', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (99, 1115, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (100, 1116, 'vibrator beton', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (100, 1117, 'Tm', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (100, 1118, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (100, 1119, 'cangkul', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (100, 1120, 'roskam', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (100, 1121, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (101, 1122, 'vibrator roler', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (101, 1123, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (101, 1124, 'cangkul', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (101, 1125, 'roskam', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (101, 1126, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (101, 1127, 'truck mixer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (102, 1128, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (102, 1129, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (102, 1130, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (102, 1131, 'helm proyek', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (102, 1132, 'rompi', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (102, 1133, 'trafic cone', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (102, 1134, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (103, 1135, 'alat pembengkok manual', 3, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (103, 1136, 'alat pemotong', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (103, 1137, 'kunci penekuk', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (103, 1138, 'kunci penekuk', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (103, 1139, 'meteran ', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (103, 1140, 'kapur', 1, 'ds');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (104, 1141, 'alat pembengkok manual', 3, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (104, 1142, 'alat pemotong ', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (104, 1143, 'kunci penekuk', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (104, 1144, 'gunting kawat', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (104, 1145, 'meteran', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (104, 1146, 'kapur', 1, 'ds');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (105, 1147, 'truck mixer', 2, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (105, 1148, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (105, 1149, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (105, 1150, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (105, 1151, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (106, 1152, 'truck mixer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (106, 1153, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (106, 1154, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (106, 1155, 'roskam', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (106, 1156, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (107, 1157, 'truck mixer', 2, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (107, 1158, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (107, 1159, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (107, 1160, 'roskam', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (107, 1161, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (108, 1162, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (108, 1163, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (108, 1164, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (108, 1165, 'helm proyek', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (108, 1166, 'rompi', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (108, 1167, 'trafic cone', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (109, 1168, 'truck mixer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (109, 1169, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (109, 1170, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (109, 1171, 'roskam', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (109, 1172, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (109, 1173, 'vibrator beton', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (110, 1174, 'truck mixer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (110, 1175, 'vibrator beton', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (110, 1176, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (110, 1177, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (110, 1178, 'roskam', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (110, 1179, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (111, 1180, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (111, 1181, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (111, 1182, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (111, 1183, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (111, 1184, 'truck mixer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (2, 1188, 'Truck Mixer', 2, 'Unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (2, 1189, 'Concrete Vibrator', 1, 'Unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (4, 1192, 'Asphalat Mixing Plant', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (4, 1193, 'Dump Truck', 12, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (4, 1194, 'Asphalt Finisher', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (4, 1195, 'Tandem Roller', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (4, 1196, 'Tyre Roller', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (4, 1197, 'Alat Bantu', 1, 'ls');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (5, 1198, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (6, 1199, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (7, 1200, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (7, 1201, 'dumtruck', 2, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (8, 1202, 'thermogun ', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (8, 1203, 'rambu rambu', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (8, 1204, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (8, 1205, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (8, 1206, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (8, 1207, 'tongkat pengatur lalu lintas', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (9, 1208, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (9, 1209, 'rambu rambu', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (9, 1210, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (9, 1211, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (9, 1212, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (9, 1213, 'tongkat pengatur lalu lintas', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (10, 1214, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (11, 1215, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (12, 1216, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (12, 1217, 'Dumtruck', 2, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (13, 1218, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (13, 1219, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (13, 1220, 'rambu rambu', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (13, 1221, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (13, 1222, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (13, 1223, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (13, 1224, 'tongkat pengatur lalu lintas', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (13, 1225, 'road barier', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (14, 1226, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (14, 1227, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (15, 1228, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (15, 1229, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (16, 1230, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (16, 1231, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (16, 1232, 'dumtruck', 2, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (17, 1233, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (17, 1234, 'masker', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (17, 1235, 'rambu rambu', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (17, 1236, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (17, 1237, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (17, 1238, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (17, 1239, 'tongkat pengatur lalu lintas', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (17, 1240, 'road barier', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (17, 1241, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (18, 1242, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (18, 1243, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (19, 1244, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (19, 1245, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (20, 1246, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (20, 1247, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (20, 1248, 'dumtruck', 2, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (21, 1249, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (21, 1250, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (21, 1251, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (21, 1252, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (21, 1253, 'rambu rambu', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (21, 1254, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (21, 1255, 'tongkat pengatur lalu lintas', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (21, 1256, 'road barier', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (21, 1257, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (22, 1258, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (22, 1259, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (23, 1260, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (23, 1261, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (24, 1262, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (24, 1263, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (24, 1264, 'dumtruck', 2, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (25, 1265, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (25, 1266, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (25, 1267, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (25, 1268, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (25, 1269, 'rambu rambu ', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (25, 1270, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (25, 1271, 'tongkat pengatur lalu lintas', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (25, 1272, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (25, 1273, 'road barier', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (26, 1274, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (26, 1275, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (27, 1276, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (27, 1277, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (28, 1278, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (28, 1279, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (28, 1280, 'dumtruck', 2, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (29, 1281, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (29, 1282, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (29, 1283, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (29, 1284, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (29, 1285, 'rambu rambu', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (29, 1286, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (29, 1287, 'tongkat pengatur lalu lintas', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (29, 1288, 'road barier', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (29, 1289, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (30, 1290, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (30, 1291, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (31, 1292, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (31, 1293, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (32, 1294, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (32, 1295, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (32, 1296, 'dumtruck', 2, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (33, 1297, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (33, 1298, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (33, 1299, 'rambu rambu', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (33, 1300, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (33, 1301, 'rompi ', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (33, 1302, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (33, 1303, 'tongkat pengatur lalu lintas', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (33, 1304, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (33, 1305, 'road barier', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (34, 1306, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (34, 1307, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (35, 1308, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (35, 1309, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (36, 1310, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (36, 1311, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (36, 1312, 'dumtruck', 2, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (37, 1313, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (37, 1314, 'masker', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (37, 1315, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (37, 1316, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (37, 1317, 'rambu rambu', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (37, 1318, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (37, 1319, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (38, 1320, 'conc.mixer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (38, 1321, 'water tanker', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (38, 1322, 'alat bantu', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (39, 1323, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (39, 1324, 'cangkul', 4, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (39, 1325, 'roskam', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (39, 1326, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (41, 1327, 'alat pembengkok', 3, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (41, 1328, 'alat pemotong', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (41, 1329, 'kunci penekuk', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (41, 1330, 'gunting kawat', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (41, 1331, 'meteran', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (41, 1332, 'kapur', 1, 'ds');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (41, 1333, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (42, 1334, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (42, 1335, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (42, 1336, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (42, 1337, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (42, 1338, 'rompi', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (42, 1339, 'helm proyek', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (42, 1340, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (40, 1341, 'alat pembengkok', 3, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (40, 1342, 'alat pemotong ', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (40, 1343, 'kunci penekuk', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (40, 1344, 'gunting kawat', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (40, 1345, 'meteran', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (40, 1346, 'kapur', 1, 'ds');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (40, 1347, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (43, 1348, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (43, 1349, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (43, 1350, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (43, 1351, 'helm proyek', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (43, 1352, 'rompi', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (43, 1353, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (43, 1354, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (45, 1355, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (45, 1356, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (45, 1357, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (45, 1358, 'helm proyek', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (45, 1359, 'rompi', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (45, 1360, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (45, 1361, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (44, 1362, 'alat pembengkok', 3, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (44, 1363, 'alat pemotong', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (44, 1364, 'kunci penekuk', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (44, 1365, 'gunting kawat', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (44, 1366, 'meteran', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (44, 1367, 'kapur', 1, 'ds');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (44, 1368, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (46, 1369, 'gergaji', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (46, 1370, 'serut', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (46, 1371, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (46, 1372, 'linggis', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (46, 1373, 'palu', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (46, 1374, 'role meter', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (46, 1375, 'kapak', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (46, 1376, 'paku', 4, 'kg');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (47, 1377, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (47, 1378, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (47, 1379, 'masker', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (47, 1380, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (47, 1381, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (47, 1382, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (47, 1383, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (48, 1384, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (48, 1385, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (48, 1386, 'masker', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (48, 1387, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (48, 1388, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (48, 1389, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (48, 1390, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (49, 1391, 'gergaji', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (49, 1392, 'serut', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (49, 1393, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (49, 1394, 'linggis', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (49, 1395, 'palu', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (49, 1396, 'role meter', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (49, 1397, 'kapak', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (49, 1398, 'paku', 4, 'kg');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (50, 1399, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (50, 1400, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (50, 1401, 'masker', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (50, 1402, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (50, 1403, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (50, 1404, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (50, 1405, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (52, 1406, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (52, 1407, 'posko covid 19', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (52, 1408, 'masker', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (52, 1409, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (52, 1410, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (52, 1411, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (52, 1412, 'trafic cone ', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (53, 1413, 'gergaji', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (53, 1414, 'serut', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (53, 1415, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (53, 1416, 'linggis', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (53, 1417, 'palu', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (53, 1418, 'role meter', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (53, 1419, 'kapak', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (53, 1420, 'paku', 3, 'kg');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (51, 1421, 'gergaji', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (51, 1422, 'serut', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (51, 1423, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (51, 1424, 'linggis', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (51, 1425, 'palu', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (51, 1426, 'role meter', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (51, 1427, 'kapak', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (51, 1428, 'paku', 3, 'kg');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (54, 1429, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (54, 1430, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (54, 1431, 'masker', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (54, 1432, 'helm proyek', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (54, 1433, 'rompi', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (54, 1434, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (54, 1435, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (55, 1436, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (55, 1437, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (55, 1438, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (55, 1439, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (55, 1440, 'truck mixer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (56, 1441, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (56, 1442, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (56, 1443, 'masker', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (56, 1444, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (56, 1445, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (56, 1446, 'rambu rambu', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (56, 1447, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (56, 1448, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (57, 1449, 'sekop ', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (57, 1450, 'cangkul', 4, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (57, 1451, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (57, 1452, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (57, 1453, 'gergaji', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (57, 1454, 'serut', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (57, 1455, 'palu', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (57, 1456, 'kapak', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (57, 1457, 'paku', 3, 'kg');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (57, 1458, 'linggis', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (58, 1459, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (58, 1460, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (58, 1461, 'masker', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (58, 1462, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (58, 1463, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (58, 1464, 'rambu rambu', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (58, 1465, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (58, 1466, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (59, 1467, 'sekop ', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (59, 1468, 'cangkul', 4, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (59, 1469, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (59, 1470, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (59, 1471, 'gergaji', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (59, 1472, 'serut', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (59, 1473, 'palu', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (59, 1474, 'kapak', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (59, 1475, 'paku', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (59, 1476, 'linggis', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (60, 1477, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (60, 1478, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (60, 1479, 'masker', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (60, 1480, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (60, 1481, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (60, 1482, 'rambu rambu', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (60, 1483, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (60, 1484, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (61, 1485, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (61, 1486, 'cangkul', 4, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (61, 1487, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (61, 1488, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (61, 1489, 'gergaji', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (61, 1490, 'serut', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (61, 1491, 'palu', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (61, 1492, 'kapak', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (61, 1493, 'paku', 3, 'kg');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (61, 1494, 'linggis', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (62, 1495, 'sekop ', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (62, 1496, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (62, 1497, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (62, 1498, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (62, 1499, 'vibrator beton', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (63, 1500, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (63, 1501, 'cangkul', 4, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (63, 1502, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (63, 1503, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (63, 1504, 'gergaji', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (63, 1505, 'serut', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (63, 1506, 'palu', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (63, 1507, 'kapak', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (63, 1508, 'paku', 3, 'kg');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (63, 1509, 'linggis', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (64, 1510, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (64, 1511, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (64, 1512, 'masker', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (64, 1513, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (64, 1514, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (64, 1515, 'rambu rambu', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (64, 1516, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (64, 1517, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (65, 1518, 'alat pembengkok manual', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (65, 1519, 'alat pemotong', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (65, 1520, 'kunci penekuk', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (65, 1521, 'gunting kawat', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (65, 1522, 'meteran', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (65, 1523, 'kapur', 1, 'ds');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (65, 1524, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (66, 1525, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (66, 1526, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (66, 1527, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (66, 1528, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (67, 1529, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (68, 1530, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (68, 1531, 'cangkul', 4, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (68, 1532, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (68, 1533, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (68, 1534, 'gergaji', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (68, 1535, 'serut', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (68, 1536, 'palu', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (68, 1537, 'kapak', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (68, 1538, 'paku', 3, 'kg');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (68, 1539, 'linggis', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (69, 1540, 'posko covid', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (69, 1541, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (69, 1542, 'masker', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (69, 1543, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (69, 1544, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (69, 1545, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (69, 1546, 'rambu rambu', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (69, 1547, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (70, 1548, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (72, 1549, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (73, 1550, 'posko covid', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (73, 1551, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (73, 1552, 'masker', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (73, 1553, 'helm proyek', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (73, 1554, 'rompi proyek', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (73, 1555, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (73, 1556, 'rambu rambu', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (73, 1557, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (71, 1558, 'Sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (71, 1559, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (71, 1560, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (71, 1561, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (71, 1562, 'vibrator beton', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (74, 1563, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (74, 1564, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (74, 1565, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (74, 1566, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (75, 1567, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (75, 1568, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (75, 1569, 'masker', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (75, 1570, 'helm proyek', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (75, 1571, 'rompi', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (75, 1572, 'rambu rambu', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (75, 1573, 'trafic cone', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (75, 1574, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (76, 1575, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (76, 1576, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (76, 1577, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (76, 1578, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (77, 1579, '', 0, '');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (78, 1580, 'vibrator beton', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (78, 1581, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (78, 1582, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (78, 1583, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (78, 1584, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (79, 1585, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (79, 1586, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (79, 1587, 'masker', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (79, 1588, 'helm proyek', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (79, 1589, 'rompi', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (79, 1590, 'trafic cone', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (79, 1591, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (79, 1592, 'rambu rambu', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (80, 1593, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (80, 1594, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (80, 1595, 'masker', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (80, 1596, 'helm proyek', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (80, 1597, 'rompi', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (80, 1598, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (80, 1599, 'trafic cone', 7, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (80, 1600, 'rambu rambu', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (81, 1601, 'vibrator beton', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (81, 1602, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (81, 1603, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (81, 1604, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (81, 1605, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (82, 1606, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (82, 1607, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (82, 1608, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (82, 1609, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (83, 1610, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (83, 1611, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (83, 1612, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (83, 1613, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (84, 1614, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (84, 1615, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (84, 1616, 'masker', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (84, 1617, 'helm proyek', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (84, 1618, 'rompi', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (84, 1619, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (84, 1620, 'trafic cone', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (84, 1621, 'rambu rambu', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (85, 1622, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (85, 1623, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (85, 1624, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (85, 1625, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (85, 1626, 'vibrator beton', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (86, 1627, 'posko civid 19 ', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (86, 1628, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (86, 1629, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (86, 1630, 'helm proyek', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (86, 1631, 'rompi', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (86, 1632, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (86, 1633, 'trafic cone', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (87, 1634, 'alat pembengkok manual', 3, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (87, 1635, 'alat pemotong ', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (87, 1636, 'kunci penekuk ', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (87, 1637, 'gunting kawat ', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (87, 1638, 'meteran ', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (87, 1639, 'kapur', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (88, 1640, 'TM', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (88, 1641, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (88, 1642, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (88, 1643, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (88, 1644, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (89, 1645, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (89, 1646, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (89, 1647, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (89, 1648, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (89, 1649, 'TM', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (90, 1650, 'vibrator roler', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (90, 1651, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (90, 1652, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (90, 1653, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (90, 1654, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (90, 1655, 'gergaji', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (90, 1656, 'serut', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (90, 1657, 'palu', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (90, 1658, 'kapak', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (90, 1659, 'paku', 4, 'kg');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (91, 1660, 'alat pembengkok manual', 3, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (91, 1661, 'alat pemotong ', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (91, 1662, 'kunci penekuk ', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (91, 1663, 'gunting kawat ', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (91, 1664, 'meteran', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (91, 1665, 'kapur', 1, 'ds');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (92, 1666, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (92, 1667, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (92, 1668, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (92, 1669, 'helm proyek', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (92, 1670, 'rompi', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (92, 1671, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (92, 1672, 'trafic cone', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (93, 1673, 'vibrator roler', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (93, 1674, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (93, 1675, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (93, 1676, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (93, 1677, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (94, 1678, 'alat pembengkok manual', 3, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (94, 1679, 'alat pemotong ', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (94, 1680, 'kunci penekuk', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (94, 1681, 'gunting kawat', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (94, 1682, 'meteran', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (94, 1683, 'kapur', 1, 'ds');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (96, 1684, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (96, 1685, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (96, 1686, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (96, 1687, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (97, 1688, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (97, 1689, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (97, 1690, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (97, 1691, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (95, 1692, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (95, 1693, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (95, 1694, 'roskam', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (95, 1695, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (95, 1696, 'palu', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (95, 1697, 'kapak', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (98, 1698, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (98, 1699, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (98, 1700, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (98, 1701, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (99, 1702, 'Tm', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (99, 1703, 'vibrator beton', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (99, 1704, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (99, 1705, 'cangkul', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (99, 1706, 'roskam', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (99, 1707, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (100, 1708, 'vibrator beton', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (100, 1709, 'Tm', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (100, 1710, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (100, 1711, 'cangkul', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (100, 1712, 'roskam', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (100, 1713, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (101, 1714, 'vibrator roler', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (101, 1715, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (101, 1716, 'cangkul', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (101, 1717, 'roskam', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (101, 1718, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (101, 1719, 'truck mixer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (102, 1720, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (102, 1721, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (102, 1722, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (102, 1723, 'helm proyek', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (102, 1724, 'rompi', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (102, 1725, 'trafic cone', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (102, 1726, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (103, 1727, 'alat pembengkok manual', 3, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (103, 1728, 'alat pemotong', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (103, 1729, 'kunci penekuk', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (103, 1730, 'kunci penekuk', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (103, 1731, 'meteran ', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (103, 1732, 'kapur', 1, 'ds');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (104, 1733, 'alat pembengkok manual', 3, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (104, 1734, 'alat pemotong ', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (104, 1735, 'kunci penekuk', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (104, 1736, 'gunting kawat', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (104, 1737, 'meteran', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (104, 1738, 'kapur', 1, 'ds');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (105, 1739, 'truck mixer', 2, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (105, 1740, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (105, 1741, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (105, 1742, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (105, 1743, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (106, 1744, 'truck mixer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (106, 1745, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (106, 1746, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (106, 1747, 'roskam', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (106, 1748, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (107, 1749, 'truck mixer', 2, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (107, 1750, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (107, 1751, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (107, 1752, 'roskam', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (107, 1753, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (108, 1754, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (108, 1755, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (108, 1756, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (108, 1757, 'helm proyek', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (108, 1758, 'rompi', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (108, 1759, 'trafic cone', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (109, 1760, 'truck mixer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (109, 1761, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (109, 1762, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (109, 1763, 'roskam', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (109, 1764, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (109, 1765, 'vibrator beton', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (110, 1766, 'truck mixer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (110, 1767, 'vibrator beton', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (110, 1768, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (110, 1769, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (110, 1770, 'roskam', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (110, 1771, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (111, 1772, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (111, 1773, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (111, 1774, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (111, 1775, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (111, 1776, 'truck mixer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (2, 1780, 'Truck Mixer', 2, 'Unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (2, 1781, 'Concrete Vibrator', 1, 'Unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (4, 1784, 'Asphalat Mixing Plant', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (4, 1785, 'Dump Truck', 12, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (4, 1786, 'Asphalt Finisher', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (4, 1787, 'Tandem Roller', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (4, 1788, 'Tyre Roller', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (4, 1789, 'Alat Bantu', 1, 'ls');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (5, 1790, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (6, 1791, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (7, 1792, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (7, 1793, 'dumtruck', 2, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (8, 1794, 'thermogun ', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (8, 1795, 'rambu rambu', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (8, 1796, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (8, 1797, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (8, 1798, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (8, 1799, 'tongkat pengatur lalu lintas', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (9, 1800, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (9, 1801, 'rambu rambu', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (9, 1802, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (9, 1803, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (9, 1804, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (9, 1805, 'tongkat pengatur lalu lintas', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (10, 1806, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (11, 1807, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (12, 1808, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (12, 1809, 'Dumtruck', 2, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (13, 1810, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (13, 1811, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (13, 1812, 'rambu rambu', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (13, 1813, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (13, 1814, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (13, 1815, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (13, 1816, 'tongkat pengatur lalu lintas', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (13, 1817, 'road barier', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (14, 1818, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (14, 1819, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (15, 1820, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (15, 1821, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (16, 1822, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (16, 1823, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (16, 1824, 'dumtruck', 2, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (17, 1825, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (17, 1826, 'masker', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (17, 1827, 'rambu rambu', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (17, 1828, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (17, 1829, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (17, 1830, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (17, 1831, 'tongkat pengatur lalu lintas', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (17, 1832, 'road barier', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (17, 1833, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (18, 1834, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (18, 1835, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (19, 1836, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (19, 1837, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (20, 1838, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (20, 1839, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (20, 1840, 'dumtruck', 2, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (21, 1841, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (21, 1842, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (21, 1843, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (21, 1844, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (21, 1845, 'rambu rambu', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (21, 1846, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (21, 1847, 'tongkat pengatur lalu lintas', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (21, 1848, 'road barier', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (21, 1849, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (22, 1850, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (22, 1851, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (23, 1852, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (23, 1853, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (24, 1854, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (24, 1855, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (24, 1856, 'dumtruck', 2, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (25, 1857, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (25, 1858, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (25, 1859, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (25, 1860, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (25, 1861, 'rambu rambu ', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (25, 1862, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (25, 1863, 'tongkat pengatur lalu lintas', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (25, 1864, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (25, 1865, 'road barier', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (26, 1866, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (26, 1867, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (27, 1868, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (27, 1869, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (28, 1870, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (28, 1871, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (28, 1872, 'dumtruck', 2, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (29, 1873, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (29, 1874, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (29, 1875, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (29, 1876, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (29, 1877, 'rambu rambu', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (29, 1878, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (29, 1879, 'tongkat pengatur lalu lintas', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (29, 1880, 'road barier', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (29, 1881, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (30, 1882, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (30, 1883, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (31, 1884, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (31, 1885, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (32, 1886, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (32, 1887, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (32, 1888, 'dumtruck', 2, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (33, 1889, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (33, 1890, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (33, 1891, 'rambu rambu', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (33, 1892, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (33, 1893, 'rompi ', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (33, 1894, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (33, 1895, 'tongkat pengatur lalu lintas', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (33, 1896, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (33, 1897, 'road barier', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (34, 1898, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (34, 1899, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (35, 1900, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (35, 1901, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (36, 1902, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (36, 1903, 'jack hammer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (36, 1904, 'dumtruck', 2, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (37, 1905, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (37, 1906, 'masker', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (37, 1907, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (37, 1908, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (37, 1909, 'rambu rambu', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (37, 1910, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (37, 1911, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (38, 1912, 'conc.mixer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (38, 1913, 'water tanker', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (38, 1914, 'alat bantu', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (39, 1915, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (39, 1916, 'cangkul', 4, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (39, 1917, 'roskam', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (39, 1918, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (41, 1919, 'alat pembengkok', 3, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (41, 1920, 'alat pemotong', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (41, 1921, 'kunci penekuk', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (41, 1922, 'gunting kawat', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (41, 1923, 'meteran', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (41, 1924, 'kapur', 1, 'ds');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (41, 1925, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (42, 1926, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (42, 1927, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (42, 1928, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (42, 1929, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (42, 1930, 'rompi', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (42, 1931, 'helm proyek', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (42, 1932, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (40, 1933, 'alat pembengkok', 3, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (40, 1934, 'alat pemotong ', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (40, 1935, 'kunci penekuk', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (40, 1936, 'gunting kawat', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (40, 1937, 'meteran', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (40, 1938, 'kapur', 1, 'ds');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (40, 1939, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (43, 1940, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (43, 1941, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (43, 1942, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (43, 1943, 'helm proyek', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (43, 1944, 'rompi', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (43, 1945, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (43, 1946, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (45, 1947, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (45, 1948, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (45, 1949, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (45, 1950, 'helm proyek', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (45, 1951, 'rompi', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (45, 1952, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (45, 1953, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (44, 1954, 'alat pembengkok', 3, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (44, 1955, 'alat pemotong', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (44, 1956, 'kunci penekuk', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (44, 1957, 'gunting kawat', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (44, 1958, 'meteran', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (44, 1959, 'kapur', 1, 'ds');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (44, 1960, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (46, 1961, 'gergaji', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (46, 1962, 'serut', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (46, 1963, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (46, 1964, 'linggis', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (46, 1965, 'palu', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (46, 1966, 'role meter', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (46, 1967, 'kapak', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (46, 1968, 'paku', 4, 'kg');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (47, 1969, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (47, 1970, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (47, 1971, 'masker', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (47, 1972, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (47, 1973, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (47, 1974, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (47, 1975, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (48, 1976, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (48, 1977, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (48, 1978, 'masker', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (48, 1979, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (48, 1980, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (48, 1981, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (48, 1982, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (49, 1983, 'gergaji', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (49, 1984, 'serut', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (49, 1985, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (49, 1986, 'linggis', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (49, 1987, 'palu', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (49, 1988, 'role meter', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (49, 1989, 'kapak', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (49, 1990, 'paku', 4, 'kg');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (50, 1991, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (50, 1992, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (50, 1993, 'masker', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (50, 1994, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (50, 1995, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (50, 1996, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (50, 1997, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (52, 1998, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (52, 1999, 'posko covid 19', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (52, 2000, 'masker', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (52, 2001, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (52, 2002, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (52, 2003, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (52, 2004, 'trafic cone ', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (53, 2005, 'gergaji', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (53, 2006, 'serut', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (53, 2007, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (53, 2008, 'linggis', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (53, 2009, 'palu', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (53, 2010, 'role meter', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (53, 2011, 'kapak', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (53, 2012, 'paku', 3, 'kg');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (51, 2013, 'gergaji', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (51, 2014, 'serut', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (51, 2015, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (51, 2016, 'linggis', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (51, 2017, 'palu', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (51, 2018, 'role meter', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (51, 2019, 'kapak', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (51, 2020, 'paku', 3, 'kg');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (54, 2021, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (54, 2022, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (54, 2023, 'masker', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (54, 2024, 'helm proyek', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (54, 2025, 'rompi', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (54, 2026, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (54, 2027, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (55, 2028, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (55, 2029, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (55, 2030, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (55, 2031, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (55, 2032, 'truck mixer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (56, 2033, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (56, 2034, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (56, 2035, 'masker', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (56, 2036, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (56, 2037, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (56, 2038, 'rambu rambu', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (56, 2039, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (56, 2040, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (57, 2041, 'sekop ', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (57, 2042, 'cangkul', 4, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (57, 2043, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (57, 2044, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (57, 2045, 'gergaji', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (57, 2046, 'serut', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (57, 2047, 'palu', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (57, 2048, 'kapak', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (57, 2049, 'paku', 3, 'kg');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (57, 2050, 'linggis', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (58, 2051, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (58, 2052, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (58, 2053, 'masker', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (58, 2054, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (58, 2055, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (58, 2056, 'rambu rambu', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (58, 2057, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (58, 2058, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (59, 2059, 'sekop ', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (59, 2060, 'cangkul', 4, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (59, 2061, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (59, 2062, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (59, 2063, 'gergaji', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (59, 2064, 'serut', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (59, 2065, 'palu', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (59, 2066, 'kapak', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (59, 2067, 'paku', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (59, 2068, 'linggis', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (60, 2069, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (60, 2070, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (60, 2071, 'masker', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (60, 2072, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (60, 2073, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (60, 2074, 'rambu rambu', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (60, 2075, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (60, 2076, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (61, 2077, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (61, 2078, 'cangkul', 4, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (61, 2079, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (61, 2080, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (61, 2081, 'gergaji', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (61, 2082, 'serut', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (61, 2083, 'palu', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (61, 2084, 'kapak', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (61, 2085, 'paku', 3, 'kg');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (61, 2086, 'linggis', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (62, 2087, 'sekop ', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (62, 2088, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (62, 2089, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (62, 2090, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (62, 2091, 'vibrator beton', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (63, 2092, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (63, 2093, 'cangkul', 4, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (63, 2094, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (63, 2095, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (63, 2096, 'gergaji', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (63, 2097, 'serut', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (63, 2098, 'palu', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (63, 2099, 'kapak', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (63, 2100, 'paku', 3, 'kg');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (63, 2101, 'linggis', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (64, 2102, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (64, 2103, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (64, 2104, 'masker', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (64, 2105, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (64, 2106, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (64, 2107, 'rambu rambu', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (64, 2108, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (64, 2109, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (65, 2110, 'alat pembengkok manual', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (65, 2111, 'alat pemotong', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (65, 2112, 'kunci penekuk', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (65, 2113, 'gunting kawat', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (65, 2114, 'meteran', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (65, 2115, 'kapur', 1, 'ds');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (65, 2116, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (66, 2117, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (66, 2118, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (66, 2119, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (66, 2120, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (67, 2121, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (68, 2122, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (68, 2123, 'cangkul', 4, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (68, 2124, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (68, 2125, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (68, 2126, 'gergaji', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (68, 2127, 'serut', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (68, 2128, 'palu', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (68, 2129, 'kapak', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (68, 2130, 'paku', 3, 'kg');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (68, 2131, 'linggis', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (69, 2132, 'posko covid', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (69, 2133, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (69, 2134, 'masker', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (69, 2135, 'helm proyek', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (69, 2136, 'rompi', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (69, 2137, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (69, 2138, 'rambu rambu', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (69, 2139, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (70, 2140, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (72, 2141, 'excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (73, 2142, 'posko covid', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (73, 2143, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (73, 2144, 'masker', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (73, 2145, 'helm proyek', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (73, 2146, 'rompi proyek', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (73, 2147, 'trafic cone', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (73, 2148, 'rambu rambu', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (73, 2149, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (71, 2150, 'Sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (71, 2151, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (71, 2152, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (71, 2153, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (71, 2154, 'vibrator beton', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (74, 2155, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (74, 2156, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (74, 2157, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (74, 2158, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (75, 2159, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (75, 2160, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (75, 2161, 'masker', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (75, 2162, 'helm proyek', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (75, 2163, 'rompi', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (75, 2164, 'rambu rambu', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (75, 2165, 'trafic cone', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (75, 2166, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (76, 2167, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (76, 2168, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (76, 2169, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (76, 2170, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (77, 2171, '', 0, '');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (78, 2172, 'vibrator beton', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (78, 2173, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (78, 2174, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (78, 2175, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (78, 2176, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (79, 2177, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (79, 2178, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (79, 2179, 'masker', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (79, 2180, 'helm proyek', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (79, 2181, 'rompi', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (79, 2182, 'trafic cone', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (79, 2183, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (79, 2184, 'rambu rambu', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (80, 2185, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (80, 2186, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (80, 2187, 'masker', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (80, 2188, 'helm proyek', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (80, 2189, 'rompi', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (80, 2190, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (80, 2191, 'trafic cone', 7, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (80, 2192, 'rambu rambu', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (81, 2193, 'vibrator beton', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (81, 2194, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (81, 2195, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (81, 2196, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (81, 2197, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (82, 2198, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (82, 2199, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (82, 2200, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (82, 2201, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (83, 2202, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (83, 2203, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (83, 2204, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (83, 2205, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (84, 2206, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (84, 2207, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (84, 2208, 'masker', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (84, 2209, 'helm proyek', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (84, 2210, 'rompi', 10, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (84, 2211, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (84, 2212, 'trafic cone', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (84, 2213, 'rambu rambu', 5, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (85, 2214, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (85, 2215, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (85, 2216, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (85, 2217, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (85, 2218, 'vibrator beton', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (86, 2219, 'posko civid 19 ', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (86, 2220, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (86, 2221, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (86, 2222, 'helm proyek', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (86, 2223, 'rompi', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (86, 2224, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (86, 2225, 'trafic cone', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (87, 2226, 'alat pembengkok manual', 3, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (87, 2227, 'alat pemotong ', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (87, 2228, 'kunci penekuk ', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (87, 2229, 'gunting kawat ', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (87, 2230, 'meteran ', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (87, 2231, 'kapur', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (88, 2232, 'TM', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (88, 2233, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (88, 2234, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (88, 2235, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (88, 2236, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (89, 2237, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (89, 2238, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (89, 2239, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (89, 2240, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (89, 2241, 'TM', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (90, 2242, 'vibrator roler', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (90, 2243, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (90, 2244, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (90, 2245, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (90, 2246, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (90, 2247, 'gergaji', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (90, 2248, 'serut', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (90, 2249, 'palu', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (90, 2250, 'kapak', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (90, 2251, 'paku', 4, 'kg');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (91, 2252, 'alat pembengkok manual', 3, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (91, 2253, 'alat pemotong ', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (91, 2254, 'kunci penekuk ', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (91, 2255, 'gunting kawat ', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (91, 2256, 'meteran', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (91, 2257, 'kapur', 1, 'ds');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (92, 2258, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (92, 2259, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (92, 2260, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (92, 2261, 'helm proyek', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (92, 2262, 'rompi', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (92, 2263, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (92, 2264, 'trafic cone', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (93, 2265, 'vibrator roler', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (93, 2266, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (93, 2267, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (93, 2268, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (93, 2269, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (94, 2270, 'alat pembengkok manual', 3, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (94, 2271, 'alat pemotong ', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (94, 2272, 'kunci penekuk', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (94, 2273, 'gunting kawat', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (94, 2274, 'meteran', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (94, 2275, 'kapur', 1, 'ds');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (96, 2276, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (96, 2277, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (96, 2278, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (96, 2279, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (97, 2280, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (97, 2281, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (97, 2282, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (97, 2283, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (95, 2284, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (95, 2285, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (95, 2286, 'roskam', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (95, 2287, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (95, 2288, 'palu', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (95, 2289, 'kapak', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (98, 2290, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (98, 2291, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (98, 2292, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (98, 2293, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (99, 2294, 'Tm', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (99, 2295, 'vibrator beton', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (99, 2296, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (99, 2297, 'cangkul', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (99, 2298, 'roskam', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (99, 2299, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (100, 2300, 'vibrator beton', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (100, 2301, 'Tm', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (100, 2302, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (100, 2303, 'cangkul', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (100, 2304, 'roskam', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (100, 2305, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (101, 2306, 'vibrator roler', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (101, 2307, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (101, 2308, 'cangkul', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (101, 2309, 'roskam', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (101, 2310, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (101, 2311, 'truck mixer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (102, 2312, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (102, 2313, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (102, 2314, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (102, 2315, 'helm proyek', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (102, 2316, 'rompi', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (102, 2317, 'trafic cone', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (102, 2318, 'tolo tolo', 50, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (103, 2319, 'alat pembengkok manual', 3, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (103, 2320, 'alat pemotong', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (103, 2321, 'kunci penekuk', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (103, 2322, 'kunci penekuk', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (103, 2323, 'meteran ', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (103, 2324, 'kapur', 1, 'ds');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (104, 2325, 'alat pembengkok manual', 3, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (104, 2326, 'alat pemotong ', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (104, 2327, 'kunci penekuk', 3, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (104, 2328, 'gunting kawat', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (104, 2329, 'meteran', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (104, 2330, 'kapur', 1, 'ds');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (105, 2331, 'truck mixer', 2, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (105, 2332, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (105, 2333, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (105, 2334, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (105, 2335, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (106, 2336, 'truck mixer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (106, 2337, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (106, 2338, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (106, 2339, 'roskam', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (106, 2340, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (107, 2341, 'truck mixer', 2, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (107, 2342, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (107, 2343, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (107, 2344, 'roskam', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (107, 2345, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (108, 2346, 'posko covid 19', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (108, 2347, 'thermogun', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (108, 2348, 'masker', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (108, 2349, 'helm proyek', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (108, 2350, 'rompi', 20, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (108, 2351, 'trafic cone', 8, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (109, 2352, 'truck mixer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (109, 2353, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (109, 2354, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (109, 2355, 'roskam', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (109, 2356, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (109, 2357, 'vibrator beton', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (110, 2358, 'truck mixer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (110, 2359, 'vibrator beton', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (110, 2360, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (110, 2361, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (110, 2362, 'roskam', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (110, 2363, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (111, 2364, 'sekop', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (111, 2365, 'cangkul', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (111, 2366, 'roskam', 2, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (111, 2367, 'cetok', 1, 'bh');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (111, 2368, 'truck mixer', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (1, 2369, 'Excavator', 1, 'Unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (1, 2370, 'Dump Truck', 2, 'Unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (1, 2371, 'Alat Bantu', 1, 'Ls');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (1, 2372, 'Excavator', 1, 'Unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (1, 2373, 'Dump Truck', 2, 'Unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (1, 2374, 'Alat Bantu', 1, 'Ls');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (1, 2375, 'Excavator', 1, 'Unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (1, 2376, 'Dump Truck', 2, 'Unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (1, 2377, 'Alat Bantu', 1, 'Ls');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (1, 2378, 'Excavator', 1, 'Unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (1, 2379, 'Dump Truck', 2, 'Unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (1, 2380, 'Alat Bantu', 1, 'Ls');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (3, 2381, 'Excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (3, 2382, 'Dump Truck', 2, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (3, 2383, 'Excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (3, 2384, 'Dump Truck', 2, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (3, 2385, 'Excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (3, 2386, 'Dump Truck', 2, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (3, 2387, 'Excavator', 1, 'unit');
INSERT INTO `detail_laporan_harian_peralatan` VALUES (3, 2388, 'Dump Truck', 2, 'unit');

-- ----------------------------
-- Table structure for detail_laporan_harian_tkerja
-- ----------------------------
DROP TABLE IF EXISTS `detail_laporan_harian_tkerja`;
CREATE TABLE `detail_laporan_harian_tkerja`  (
  `id_kegiatan` int NOT NULL AUTO_INCREMENT,
  `no_trans` int NOT NULL,
  `tenaga_kerja` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jumlah` int NOT NULL,
  PRIMARY KEY (`id_kegiatan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1757 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of detail_laporan_harian_tkerja
-- ----------------------------
INSERT INTO `detail_laporan_harian_tkerja` VALUES (5, 2, 'Mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (6, 2, 'Tukang', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (7, 2, 'Pekerja', 8);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (11, 4, 'Mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (12, 4, 'Operator', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (13, 4, 'Pekerja', 13);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (14, 5, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (15, 5, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (16, 5, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (17, 6, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (18, 6, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (19, 6, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (20, 7, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (21, 7, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (22, 7, 'supir Dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (23, 7, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (24, 7, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (25, 8, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (26, 8, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (27, 8, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (28, 8, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (29, 8, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (30, 9, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (31, 9, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (32, 9, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (33, 9, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (34, 9, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (35, 10, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (36, 10, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (37, 10, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (38, 11, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (39, 11, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (40, 11, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (41, 12, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (42, 12, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (43, 12, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (44, 12, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (45, 12, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (46, 13, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (47, 13, 'operator jack hammer', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (48, 13, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (49, 13, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (50, 13, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (51, 13, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (52, 14, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (53, 14, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (54, 14, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (55, 14, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (56, 14, 'pengatur lau lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (57, 15, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (58, 15, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (59, 15, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (60, 15, 'pekerja ', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (61, 15, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (62, 16, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (63, 16, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (64, 16, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (65, 16, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (66, 16, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (67, 16, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (68, 17, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (69, 17, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (70, 17, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (71, 17, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (72, 17, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (73, 17, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (74, 18, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (75, 18, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (76, 18, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (77, 18, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (78, 18, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (79, 19, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (80, 19, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (81, 19, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (82, 19, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (83, 19, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (84, 20, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (85, 20, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (86, 20, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (87, 20, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (88, 20, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (89, 20, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (90, 21, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (91, 21, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (92, 21, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (93, 21, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (94, 21, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (95, 21, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (96, 22, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (97, 22, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (98, 22, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (99, 22, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (100, 22, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (101, 23, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (102, 23, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (103, 23, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (104, 23, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (105, 23, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (106, 24, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (107, 24, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (108, 24, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (109, 24, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (110, 24, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (111, 24, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (112, 25, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (113, 25, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (114, 25, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (115, 25, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (116, 25, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (117, 25, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (118, 26, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (119, 26, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (120, 26, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (121, 26, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (122, 26, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (123, 27, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (124, 27, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (125, 27, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (126, 27, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (127, 27, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (128, 28, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (129, 28, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (130, 28, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (131, 28, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (132, 28, 'pekerja ', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (133, 28, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (134, 29, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (135, 29, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (136, 29, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (137, 29, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (138, 29, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (139, 29, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (140, 30, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (141, 30, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (142, 30, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (143, 30, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (144, 30, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (145, 31, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (146, 31, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (147, 31, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (148, 31, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (149, 31, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (150, 32, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (151, 32, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (152, 32, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (153, 32, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (154, 32, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (155, 32, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (156, 33, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (157, 33, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (158, 33, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (159, 33, 'supir dumtruck ', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (160, 33, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (161, 33, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (162, 34, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (163, 34, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (164, 34, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (165, 34, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (166, 34, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (167, 35, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (168, 35, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (169, 35, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (170, 35, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (171, 35, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (172, 36, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (173, 36, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (174, 36, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (175, 36, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (176, 36, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (177, 36, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (178, 37, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (179, 37, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (180, 37, 'pekerja', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (181, 38, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (182, 38, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (183, 38, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (184, 39, 'mandor ', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (185, 39, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (186, 39, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (187, 41, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (188, 41, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (189, 41, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (190, 42, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (191, 42, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (192, 42, 'tukang ', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (193, 42, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (194, 40, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (195, 40, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (196, 40, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (197, 43, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (198, 43, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (199, 43, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (200, 43, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (201, 45, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (202, 45, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (203, 45, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (204, 45, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (205, 44, 'mador', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (206, 44, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (207, 44, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (208, 46, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (209, 46, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (210, 46, 'pekerja ', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (211, 47, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (212, 47, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (213, 47, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (214, 47, 'pekerja', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (215, 48, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (216, 48, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (217, 48, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (218, 48, 'pekerja', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (219, 49, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (220, 49, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (221, 49, 'pekerja', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (222, 50, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (223, 50, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (224, 50, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (225, 50, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (226, 52, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (227, 52, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (228, 52, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (229, 52, 'petugas', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (230, 53, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (231, 53, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (232, 53, 'pekerja', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (233, 51, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (234, 51, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (235, 51, 'pekerja', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (236, 54, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (237, 54, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (238, 54, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (239, 54, 'pekerja', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (240, 55, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (241, 55, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (242, 55, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (243, 56, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (244, 56, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (245, 56, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (246, 56, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (247, 57, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (248, 57, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (249, 57, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (250, 58, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (251, 58, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (252, 58, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (253, 58, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (254, 59, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (255, 59, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (256, 59, 'pekerja ', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (257, 60, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (258, 60, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (259, 60, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (260, 60, 'tukang ', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (261, 61, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (262, 61, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (263, 61, 'peakerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (264, 62, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (265, 62, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (266, 62, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (267, 63, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (268, 63, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (269, 63, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (270, 64, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (271, 64, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (272, 64, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (273, 64, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (274, 65, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (275, 65, 'tukang ', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (276, 65, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (277, 66, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (278, 66, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (279, 66, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (280, 67, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (281, 67, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (282, 67, 'pekerja ', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (283, 68, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (284, 68, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (285, 68, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (286, 69, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (287, 69, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (288, 69, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (289, 69, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (290, 70, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (291, 70, 'excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (292, 70, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (293, 72, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (294, 72, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (295, 72, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (296, 73, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (297, 73, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (298, 73, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (299, 73, 'pekerja', 8);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (300, 71, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (301, 71, 'tukang ', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (302, 71, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (303, 74, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (304, 74, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (305, 74, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (306, 75, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (307, 75, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (308, 75, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (309, 75, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (310, 76, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (311, 76, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (312, 76, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (313, 77, '', 0);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (314, 78, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (315, 78, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (316, 78, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (317, 79, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (318, 79, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (319, 79, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (320, 79, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (321, 80, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (322, 80, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (323, 80, 'pekerja', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (324, 81, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (325, 81, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (326, 81, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (327, 82, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (328, 82, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (329, 82, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (330, 83, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (331, 83, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (332, 83, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (333, 84, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (334, 84, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (335, 84, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (336, 84, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (337, 85, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (338, 85, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (339, 85, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (340, 86, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (341, 86, 'tukang cor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (342, 86, 'pekerja cor', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (343, 86, 'tukang besi', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (344, 86, 'pekerja besi', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (345, 87, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (346, 87, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (347, 87, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (348, 88, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (349, 88, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (350, 88, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (351, 88, 'supir tm', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (352, 89, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (353, 89, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (354, 89, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (355, 89, 'supir tm', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (356, 90, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (357, 90, 'tukang cor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (358, 90, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (359, 90, 'tukang bekisting', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (360, 90, 'pekerja', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (361, 91, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (362, 91, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (363, 91, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (364, 92, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (365, 92, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (366, 92, 'pekerja', 30);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (367, 93, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (368, 93, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (369, 93, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (370, 94, 'mandor ', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (371, 94, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (372, 94, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (373, 96, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (374, 96, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (375, 96, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (376, 96, 'supir TM', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (377, 97, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (378, 97, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (379, 97, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (380, 95, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (381, 95, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (382, 95, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (383, 98, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (384, 98, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (385, 98, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (386, 98, 'operator TM', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (387, 99, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (388, 99, 'supir TM', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (389, 99, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (390, 99, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (391, 100, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (392, 100, 'supir tm', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (393, 100, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (394, 100, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (395, 101, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (396, 101, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (397, 101, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (398, 101, 'supir tm', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (399, 102, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (400, 102, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (401, 102, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (402, 102, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (403, 103, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (404, 103, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (405, 103, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (406, 104, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (407, 104, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (408, 104, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (409, 105, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (410, 105, 'pekerja', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (411, 105, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (412, 106, 'mandor ', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (413, 106, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (414, 106, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (415, 106, 'supir truck mixer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (416, 107, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (417, 107, 'supir truck mixer', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (418, 107, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (419, 107, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (420, 108, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (421, 108, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (422, 108, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (423, 109, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (424, 109, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (425, 109, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (426, 110, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (427, 110, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (428, 110, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (429, 110, 'supir tm', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (430, 111, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (431, 111, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (432, 111, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (437, 2, 'Mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (438, 2, 'Tukang', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (439, 2, 'Pekerja', 8);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (443, 4, 'Mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (444, 4, 'Operator', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (445, 4, 'Pekerja', 13);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (446, 5, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (447, 5, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (448, 5, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (449, 6, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (450, 6, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (451, 6, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (452, 7, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (453, 7, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (454, 7, 'supir Dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (455, 7, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (456, 7, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (457, 8, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (458, 8, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (459, 8, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (460, 8, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (461, 8, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (462, 9, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (463, 9, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (464, 9, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (465, 9, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (466, 9, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (467, 10, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (468, 10, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (469, 10, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (470, 11, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (471, 11, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (472, 11, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (473, 12, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (474, 12, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (475, 12, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (476, 12, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (477, 12, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (478, 13, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (479, 13, 'operator jack hammer', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (480, 13, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (481, 13, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (482, 13, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (483, 13, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (484, 14, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (485, 14, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (486, 14, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (487, 14, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (488, 14, 'pengatur lau lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (489, 15, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (490, 15, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (491, 15, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (492, 15, 'pekerja ', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (493, 15, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (494, 16, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (495, 16, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (496, 16, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (497, 16, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (498, 16, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (499, 16, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (500, 17, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (501, 17, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (502, 17, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (503, 17, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (504, 17, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (505, 17, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (506, 18, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (507, 18, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (508, 18, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (509, 18, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (510, 18, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (511, 19, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (512, 19, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (513, 19, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (514, 19, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (515, 19, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (516, 20, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (517, 20, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (518, 20, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (519, 20, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (520, 20, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (521, 20, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (522, 21, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (523, 21, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (524, 21, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (525, 21, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (526, 21, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (527, 21, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (528, 22, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (529, 22, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (530, 22, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (531, 22, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (532, 22, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (533, 23, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (534, 23, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (535, 23, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (536, 23, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (537, 23, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (538, 24, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (539, 24, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (540, 24, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (541, 24, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (542, 24, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (543, 24, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (544, 25, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (545, 25, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (546, 25, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (547, 25, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (548, 25, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (549, 25, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (550, 26, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (551, 26, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (552, 26, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (553, 26, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (554, 26, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (555, 27, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (556, 27, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (557, 27, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (558, 27, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (559, 27, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (560, 28, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (561, 28, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (562, 28, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (563, 28, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (564, 28, 'pekerja ', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (565, 28, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (566, 29, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (567, 29, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (568, 29, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (569, 29, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (570, 29, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (571, 29, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (572, 30, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (573, 30, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (574, 30, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (575, 30, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (576, 30, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (577, 31, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (578, 31, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (579, 31, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (580, 31, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (581, 31, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (582, 32, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (583, 32, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (584, 32, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (585, 32, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (586, 32, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (587, 32, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (588, 33, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (589, 33, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (590, 33, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (591, 33, 'supir dumtruck ', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (592, 33, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (593, 33, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (594, 34, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (595, 34, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (596, 34, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (597, 34, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (598, 34, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (599, 35, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (600, 35, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (601, 35, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (602, 35, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (603, 35, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (604, 36, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (605, 36, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (606, 36, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (607, 36, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (608, 36, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (609, 36, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (610, 37, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (611, 37, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (612, 37, 'pekerja', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (613, 38, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (614, 38, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (615, 38, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (616, 39, 'mandor ', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (617, 39, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (618, 39, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (619, 41, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (620, 41, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (621, 41, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (622, 42, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (623, 42, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (624, 42, 'tukang ', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (625, 42, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (626, 40, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (627, 40, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (628, 40, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (629, 43, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (630, 43, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (631, 43, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (632, 43, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (633, 45, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (634, 45, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (635, 45, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (636, 45, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (637, 44, 'mador', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (638, 44, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (639, 44, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (640, 46, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (641, 46, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (642, 46, 'pekerja ', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (643, 47, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (644, 47, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (645, 47, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (646, 47, 'pekerja', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (647, 48, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (648, 48, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (649, 48, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (650, 48, 'pekerja', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (651, 49, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (652, 49, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (653, 49, 'pekerja', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (654, 50, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (655, 50, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (656, 50, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (657, 50, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (658, 52, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (659, 52, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (660, 52, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (661, 52, 'petugas', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (662, 53, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (663, 53, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (664, 53, 'pekerja', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (665, 51, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (666, 51, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (667, 51, 'pekerja', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (668, 54, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (669, 54, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (670, 54, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (671, 54, 'pekerja', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (672, 55, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (673, 55, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (674, 55, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (675, 56, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (676, 56, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (677, 56, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (678, 56, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (679, 57, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (680, 57, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (681, 57, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (682, 58, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (683, 58, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (684, 58, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (685, 58, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (686, 59, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (687, 59, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (688, 59, 'pekerja ', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (689, 60, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (690, 60, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (691, 60, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (692, 60, 'tukang ', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (693, 61, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (694, 61, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (695, 61, 'peakerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (696, 62, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (697, 62, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (698, 62, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (699, 63, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (700, 63, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (701, 63, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (702, 64, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (703, 64, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (704, 64, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (705, 64, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (706, 65, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (707, 65, 'tukang ', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (708, 65, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (709, 66, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (710, 66, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (711, 66, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (712, 67, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (713, 67, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (714, 67, 'pekerja ', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (715, 68, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (716, 68, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (717, 68, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (718, 69, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (719, 69, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (720, 69, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (721, 69, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (722, 70, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (723, 70, 'excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (724, 70, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (725, 72, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (726, 72, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (727, 72, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (728, 73, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (729, 73, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (730, 73, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (731, 73, 'pekerja', 8);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (732, 71, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (733, 71, 'tukang ', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (734, 71, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (735, 74, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (736, 74, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (737, 74, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (738, 75, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (739, 75, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (740, 75, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (741, 75, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (742, 76, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (743, 76, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (744, 76, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (745, 77, '', 0);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (746, 78, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (747, 78, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (748, 78, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (749, 79, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (750, 79, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (751, 79, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (752, 79, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (753, 80, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (754, 80, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (755, 80, 'pekerja', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (756, 81, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (757, 81, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (758, 81, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (759, 82, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (760, 82, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (761, 82, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (762, 83, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (763, 83, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (764, 83, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (765, 84, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (766, 84, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (767, 84, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (768, 84, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (769, 85, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (770, 85, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (771, 85, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (772, 86, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (773, 86, 'tukang cor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (774, 86, 'pekerja cor', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (775, 86, 'tukang besi', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (776, 86, 'pekerja besi', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (777, 87, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (778, 87, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (779, 87, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (780, 88, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (781, 88, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (782, 88, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (783, 88, 'supir tm', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (784, 89, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (785, 89, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (786, 89, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (787, 89, 'supir tm', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (788, 90, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (789, 90, 'tukang cor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (790, 90, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (791, 90, 'tukang bekisting', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (792, 90, 'pekerja', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (793, 91, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (794, 91, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (795, 91, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (796, 92, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (797, 92, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (798, 92, 'pekerja', 30);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (799, 93, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (800, 93, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (801, 93, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (802, 94, 'mandor ', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (803, 94, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (804, 94, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (805, 96, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (806, 96, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (807, 96, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (808, 96, 'supir TM', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (809, 97, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (810, 97, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (811, 97, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (812, 95, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (813, 95, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (814, 95, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (815, 98, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (816, 98, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (817, 98, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (818, 98, 'operator TM', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (819, 99, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (820, 99, 'supir TM', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (821, 99, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (822, 99, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (823, 100, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (824, 100, 'supir tm', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (825, 100, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (826, 100, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (827, 101, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (828, 101, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (829, 101, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (830, 101, 'supir tm', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (831, 102, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (832, 102, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (833, 102, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (834, 102, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (835, 103, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (836, 103, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (837, 103, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (838, 104, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (839, 104, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (840, 104, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (841, 105, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (842, 105, 'pekerja', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (843, 105, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (844, 106, 'mandor ', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (845, 106, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (846, 106, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (847, 106, 'supir truck mixer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (848, 107, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (849, 107, 'supir truck mixer', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (850, 107, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (851, 107, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (852, 108, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (853, 108, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (854, 108, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (855, 109, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (856, 109, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (857, 109, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (858, 110, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (859, 110, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (860, 110, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (861, 110, 'supir tm', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (862, 111, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (863, 111, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (864, 111, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (869, 2, 'Mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (870, 2, 'Tukang', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (871, 2, 'Pekerja', 8);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (875, 4, 'Mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (876, 4, 'Operator', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (877, 4, 'Pekerja', 13);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (878, 5, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (879, 5, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (880, 5, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (881, 6, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (882, 6, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (883, 6, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (884, 7, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (885, 7, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (886, 7, 'supir Dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (887, 7, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (888, 7, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (889, 8, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (890, 8, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (891, 8, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (892, 8, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (893, 8, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (894, 9, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (895, 9, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (896, 9, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (897, 9, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (898, 9, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (899, 10, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (900, 10, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (901, 10, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (902, 11, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (903, 11, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (904, 11, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (905, 12, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (906, 12, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (907, 12, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (908, 12, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (909, 12, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (910, 13, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (911, 13, 'operator jack hammer', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (912, 13, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (913, 13, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (914, 13, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (915, 13, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (916, 14, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (917, 14, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (918, 14, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (919, 14, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (920, 14, 'pengatur lau lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (921, 15, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (922, 15, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (923, 15, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (924, 15, 'pekerja ', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (925, 15, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (926, 16, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (927, 16, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (928, 16, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (929, 16, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (930, 16, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (931, 16, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (932, 17, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (933, 17, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (934, 17, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (935, 17, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (936, 17, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (937, 17, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (938, 18, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (939, 18, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (940, 18, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (941, 18, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (942, 18, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (943, 19, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (944, 19, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (945, 19, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (946, 19, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (947, 19, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (948, 20, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (949, 20, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (950, 20, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (951, 20, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (952, 20, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (953, 20, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (954, 21, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (955, 21, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (956, 21, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (957, 21, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (958, 21, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (959, 21, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (960, 22, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (961, 22, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (962, 22, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (963, 22, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (964, 22, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (965, 23, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (966, 23, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (967, 23, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (968, 23, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (969, 23, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (970, 24, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (971, 24, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (972, 24, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (973, 24, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (974, 24, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (975, 24, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (976, 25, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (977, 25, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (978, 25, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (979, 25, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (980, 25, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (981, 25, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (982, 26, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (983, 26, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (984, 26, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (985, 26, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (986, 26, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (987, 27, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (988, 27, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (989, 27, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (990, 27, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (991, 27, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (992, 28, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (993, 28, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (994, 28, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (995, 28, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (996, 28, 'pekerja ', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (997, 28, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (998, 29, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (999, 29, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1000, 29, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1001, 29, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1002, 29, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1003, 29, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1004, 30, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1005, 30, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1006, 30, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1007, 30, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1008, 30, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1009, 31, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1010, 31, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1011, 31, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1012, 31, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1013, 31, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1014, 32, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1015, 32, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1016, 32, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1017, 32, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1018, 32, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1019, 32, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1020, 33, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1021, 33, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1022, 33, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1023, 33, 'supir dumtruck ', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1024, 33, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1025, 33, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1026, 34, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1027, 34, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1028, 34, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1029, 34, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1030, 34, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1031, 35, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1032, 35, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1033, 35, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1034, 35, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1035, 35, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1036, 36, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1037, 36, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1038, 36, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1039, 36, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1040, 36, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1041, 36, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1042, 37, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1043, 37, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1044, 37, 'pekerja', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1045, 38, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1046, 38, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1047, 38, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1048, 39, 'mandor ', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1049, 39, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1050, 39, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1051, 41, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1052, 41, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1053, 41, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1054, 42, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1055, 42, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1056, 42, 'tukang ', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1057, 42, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1058, 40, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1059, 40, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1060, 40, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1061, 43, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1062, 43, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1063, 43, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1064, 43, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1065, 45, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1066, 45, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1067, 45, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1068, 45, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1069, 44, 'mador', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1070, 44, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1071, 44, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1072, 46, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1073, 46, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1074, 46, 'pekerja ', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1075, 47, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1076, 47, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1077, 47, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1078, 47, 'pekerja', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1079, 48, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1080, 48, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1081, 48, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1082, 48, 'pekerja', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1083, 49, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1084, 49, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1085, 49, 'pekerja', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1086, 50, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1087, 50, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1088, 50, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1089, 50, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1090, 52, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1091, 52, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1092, 52, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1093, 52, 'petugas', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1094, 53, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1095, 53, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1096, 53, 'pekerja', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1097, 51, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1098, 51, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1099, 51, 'pekerja', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1100, 54, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1101, 54, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1102, 54, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1103, 54, 'pekerja', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1104, 55, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1105, 55, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1106, 55, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1107, 56, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1108, 56, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1109, 56, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1110, 56, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1111, 57, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1112, 57, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1113, 57, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1114, 58, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1115, 58, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1116, 58, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1117, 58, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1118, 59, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1119, 59, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1120, 59, 'pekerja ', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1121, 60, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1122, 60, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1123, 60, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1124, 60, 'tukang ', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1125, 61, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1126, 61, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1127, 61, 'peakerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1128, 62, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1129, 62, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1130, 62, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1131, 63, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1132, 63, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1133, 63, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1134, 64, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1135, 64, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1136, 64, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1137, 64, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1138, 65, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1139, 65, 'tukang ', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1140, 65, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1141, 66, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1142, 66, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1143, 66, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1144, 67, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1145, 67, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1146, 67, 'pekerja ', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1147, 68, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1148, 68, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1149, 68, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1150, 69, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1151, 69, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1152, 69, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1153, 69, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1154, 70, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1155, 70, 'excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1156, 70, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1157, 72, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1158, 72, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1159, 72, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1160, 73, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1161, 73, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1162, 73, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1163, 73, 'pekerja', 8);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1164, 71, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1165, 71, 'tukang ', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1166, 71, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1167, 74, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1168, 74, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1169, 74, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1170, 75, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1171, 75, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1172, 75, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1173, 75, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1174, 76, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1175, 76, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1176, 76, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1177, 77, '', 0);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1178, 78, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1179, 78, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1180, 78, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1181, 79, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1182, 79, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1183, 79, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1184, 79, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1185, 80, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1186, 80, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1187, 80, 'pekerja', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1188, 81, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1189, 81, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1190, 81, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1191, 82, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1192, 82, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1193, 82, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1194, 83, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1195, 83, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1196, 83, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1197, 84, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1198, 84, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1199, 84, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1200, 84, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1201, 85, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1202, 85, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1203, 85, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1204, 86, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1205, 86, 'tukang cor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1206, 86, 'pekerja cor', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1207, 86, 'tukang besi', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1208, 86, 'pekerja besi', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1209, 87, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1210, 87, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1211, 87, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1212, 88, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1213, 88, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1214, 88, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1215, 88, 'supir tm', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1216, 89, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1217, 89, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1218, 89, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1219, 89, 'supir tm', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1220, 90, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1221, 90, 'tukang cor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1222, 90, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1223, 90, 'tukang bekisting', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1224, 90, 'pekerja', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1225, 91, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1226, 91, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1227, 91, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1228, 92, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1229, 92, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1230, 92, 'pekerja', 30);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1231, 93, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1232, 93, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1233, 93, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1234, 94, 'mandor ', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1235, 94, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1236, 94, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1237, 96, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1238, 96, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1239, 96, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1240, 96, 'supir TM', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1241, 97, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1242, 97, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1243, 97, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1244, 95, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1245, 95, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1246, 95, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1247, 98, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1248, 98, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1249, 98, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1250, 98, 'operator TM', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1251, 99, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1252, 99, 'supir TM', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1253, 99, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1254, 99, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1255, 100, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1256, 100, 'supir tm', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1257, 100, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1258, 100, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1259, 101, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1260, 101, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1261, 101, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1262, 101, 'supir tm', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1263, 102, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1264, 102, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1265, 102, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1266, 102, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1267, 103, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1268, 103, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1269, 103, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1270, 104, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1271, 104, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1272, 104, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1273, 105, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1274, 105, 'pekerja', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1275, 105, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1276, 106, 'mandor ', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1277, 106, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1278, 106, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1279, 106, 'supir truck mixer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1280, 107, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1281, 107, 'supir truck mixer', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1282, 107, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1283, 107, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1284, 108, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1285, 108, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1286, 108, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1287, 109, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1288, 109, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1289, 109, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1290, 110, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1291, 110, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1292, 110, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1293, 110, 'supir tm', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1294, 111, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1295, 111, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1296, 111, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1301, 2, 'Mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1302, 2, 'Tukang', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1303, 2, 'Pekerja', 8);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1307, 4, 'Mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1308, 4, 'Operator', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1309, 4, 'Pekerja', 13);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1310, 5, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1311, 5, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1312, 5, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1313, 6, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1314, 6, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1315, 6, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1316, 7, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1317, 7, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1318, 7, 'supir Dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1319, 7, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1320, 7, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1321, 8, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1322, 8, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1323, 8, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1324, 8, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1325, 8, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1326, 9, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1327, 9, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1328, 9, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1329, 9, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1330, 9, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1331, 10, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1332, 10, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1333, 10, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1334, 11, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1335, 11, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1336, 11, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1337, 12, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1338, 12, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1339, 12, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1340, 12, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1341, 12, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1342, 13, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1343, 13, 'operator jack hammer', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1344, 13, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1345, 13, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1346, 13, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1347, 13, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1348, 14, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1349, 14, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1350, 14, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1351, 14, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1352, 14, 'pengatur lau lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1353, 15, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1354, 15, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1355, 15, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1356, 15, 'pekerja ', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1357, 15, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1358, 16, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1359, 16, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1360, 16, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1361, 16, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1362, 16, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1363, 16, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1364, 17, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1365, 17, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1366, 17, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1367, 17, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1368, 17, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1369, 17, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1370, 18, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1371, 18, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1372, 18, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1373, 18, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1374, 18, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1375, 19, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1376, 19, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1377, 19, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1378, 19, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1379, 19, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1380, 20, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1381, 20, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1382, 20, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1383, 20, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1384, 20, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1385, 20, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1386, 21, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1387, 21, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1388, 21, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1389, 21, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1390, 21, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1391, 21, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1392, 22, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1393, 22, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1394, 22, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1395, 22, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1396, 22, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1397, 23, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1398, 23, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1399, 23, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1400, 23, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1401, 23, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1402, 24, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1403, 24, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1404, 24, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1405, 24, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1406, 24, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1407, 24, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1408, 25, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1409, 25, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1410, 25, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1411, 25, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1412, 25, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1413, 25, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1414, 26, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1415, 26, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1416, 26, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1417, 26, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1418, 26, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1419, 27, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1420, 27, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1421, 27, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1422, 27, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1423, 27, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1424, 28, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1425, 28, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1426, 28, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1427, 28, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1428, 28, 'pekerja ', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1429, 28, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1430, 29, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1431, 29, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1432, 29, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1433, 29, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1434, 29, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1435, 29, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1436, 30, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1437, 30, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1438, 30, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1439, 30, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1440, 30, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1441, 31, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1442, 31, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1443, 31, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1444, 31, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1445, 31, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1446, 32, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1447, 32, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1448, 32, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1449, 32, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1450, 32, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1451, 32, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1452, 33, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1453, 33, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1454, 33, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1455, 33, 'supir dumtruck ', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1456, 33, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1457, 33, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1458, 34, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1459, 34, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1460, 34, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1461, 34, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1462, 34, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1463, 35, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1464, 35, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1465, 35, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1466, 35, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1467, 35, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1468, 36, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1469, 36, 'operator jack hammer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1470, 36, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1471, 36, 'supir dumtruck', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1472, 36, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1473, 36, 'pengatur lalu lintas', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1474, 37, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1475, 37, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1476, 37, 'pekerja', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1477, 38, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1478, 38, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1479, 38, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1480, 39, 'mandor ', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1481, 39, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1482, 39, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1483, 41, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1484, 41, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1485, 41, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1486, 42, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1487, 42, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1488, 42, 'tukang ', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1489, 42, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1490, 40, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1491, 40, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1492, 40, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1493, 43, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1494, 43, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1495, 43, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1496, 43, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1497, 45, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1498, 45, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1499, 45, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1500, 45, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1501, 44, 'mador', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1502, 44, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1503, 44, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1504, 46, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1505, 46, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1506, 46, 'pekerja ', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1507, 47, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1508, 47, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1509, 47, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1510, 47, 'pekerja', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1511, 48, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1512, 48, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1513, 48, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1514, 48, 'pekerja', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1515, 49, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1516, 49, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1517, 49, 'pekerja', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1518, 50, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1519, 50, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1520, 50, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1521, 50, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1522, 52, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1523, 52, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1524, 52, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1525, 52, 'petugas', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1526, 53, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1527, 53, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1528, 53, 'pekerja', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1529, 51, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1530, 51, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1531, 51, 'pekerja', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1532, 54, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1533, 54, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1534, 54, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1535, 54, 'pekerja', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1536, 55, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1537, 55, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1538, 55, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1539, 56, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1540, 56, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1541, 56, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1542, 56, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1543, 57, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1544, 57, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1545, 57, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1546, 58, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1547, 58, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1548, 58, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1549, 58, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1550, 59, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1551, 59, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1552, 59, 'pekerja ', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1553, 60, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1554, 60, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1555, 60, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1556, 60, 'tukang ', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1557, 61, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1558, 61, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1559, 61, 'peakerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1560, 62, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1561, 62, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1562, 62, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1563, 63, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1564, 63, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1565, 63, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1566, 64, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1567, 64, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1568, 64, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1569, 64, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1570, 65, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1571, 65, 'tukang ', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1572, 65, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1573, 66, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1574, 66, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1575, 66, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1576, 67, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1577, 67, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1578, 67, 'pekerja ', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1579, 68, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1580, 68, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1581, 68, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1582, 69, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1583, 69, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1584, 69, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1585, 69, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1586, 70, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1587, 70, 'excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1588, 70, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1589, 72, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1590, 72, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1591, 72, 'pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1592, 73, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1593, 73, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1594, 73, 'operator excavator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1595, 73, 'pekerja', 8);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1596, 71, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1597, 71, 'tukang ', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1598, 71, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1599, 74, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1600, 74, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1601, 74, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1602, 75, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1603, 75, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1604, 75, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1605, 75, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1606, 76, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1607, 76, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1608, 76, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1609, 77, '', 0);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1610, 78, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1611, 78, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1612, 78, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1613, 79, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1614, 79, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1615, 79, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1616, 79, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1617, 80, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1618, 80, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1619, 80, 'pekerja', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1620, 81, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1621, 81, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1622, 81, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1623, 82, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1624, 82, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1625, 82, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1626, 83, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1627, 83, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1628, 83, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1629, 84, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1630, 84, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1631, 84, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1632, 84, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1633, 85, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1634, 85, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1635, 85, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1636, 86, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1637, 86, 'tukang cor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1638, 86, 'pekerja cor', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1639, 86, 'tukang besi', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1640, 86, 'pekerja besi', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1641, 87, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1642, 87, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1643, 87, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1644, 88, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1645, 88, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1646, 88, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1647, 88, 'supir tm', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1648, 89, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1649, 89, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1650, 89, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1651, 89, 'supir tm', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1652, 90, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1653, 90, 'tukang cor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1654, 90, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1655, 90, 'tukang bekisting', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1656, 90, 'pekerja', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1657, 91, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1658, 91, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1659, 91, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1660, 92, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1661, 92, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1662, 92, 'pekerja', 30);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1663, 93, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1664, 93, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1665, 93, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1666, 94, 'mandor ', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1667, 94, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1668, 94, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1669, 96, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1670, 96, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1671, 96, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1672, 96, 'supir TM', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1673, 97, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1674, 97, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1675, 97, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1676, 95, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1677, 95, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1678, 95, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1679, 98, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1680, 98, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1681, 98, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1682, 98, 'operator TM', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1683, 99, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1684, 99, 'supir TM', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1685, 99, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1686, 99, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1687, 100, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1688, 100, 'supir tm', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1689, 100, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1690, 100, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1691, 101, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1692, 101, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1693, 101, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1694, 101, 'supir tm', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1695, 102, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1696, 102, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1697, 102, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1698, 102, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1699, 103, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1700, 103, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1701, 103, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1702, 104, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1703, 104, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1704, 104, 'pekerja', 7);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1705, 105, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1706, 105, 'pekerja', 5);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1707, 105, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1708, 106, 'mandor ', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1709, 106, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1710, 106, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1711, 106, 'supir truck mixer', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1712, 107, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1713, 107, 'supir truck mixer', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1714, 107, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1715, 107, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1716, 108, 'petugas k3', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1717, 108, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1718, 108, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1719, 109, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1720, 109, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1721, 109, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1722, 110, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1723, 110, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1724, 110, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1725, 110, 'supir tm', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1726, 111, 'mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1727, 111, 'tukang', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1728, 111, 'pekerja', 4);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1729, 1, 'Mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1730, 1, 'Pekerja', 10);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1731, 1, 'Sopir', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1732, 1, 'Operator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1733, 1, 'Mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1734, 1, 'Pekerja', 10);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1735, 1, 'Sopir', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1736, 1, 'Operator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1737, 1, 'Mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1738, 1, 'Pekerja', 10);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1739, 1, 'Sopir', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1740, 1, 'Operator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1741, 1, 'Mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1742, 1, 'Pekerja', 10);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1743, 1, 'Sopir', 2);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1744, 1, 'Operator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1745, 3, 'Mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1746, 3, 'Operator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1747, 3, 'Pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1748, 3, 'Mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1749, 3, 'Operator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1750, 3, 'Pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1751, 3, 'Mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1752, 3, 'Operator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1753, 3, 'Pekerja', 3);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1754, 3, 'Mandor', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1755, 3, 'Operator', 1);
INSERT INTO `detail_laporan_harian_tkerja` VALUES (1756, 3, 'Pekerja', 3);

-- ----------------------------
-- Table structure for detail_request_bahan
-- ----------------------------
DROP TABLE IF EXISTS `detail_request_bahan`;
CREATE TABLE `detail_request_bahan`  (
  `id` int NOT NULL,
  `bahan` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `volume` decimal(10, 2) NOT NULL,
  `satuan` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of detail_request_bahan
-- ----------------------------
INSERT INTO `detail_request_bahan` VALUES (2, '', 0.00, '');
INSERT INTO `detail_request_bahan` VALUES (3, 'semen', 2.00, 'zak');
INSERT INTO `detail_request_bahan` VALUES (3, 'bata', 100.00, 'buah');
INSERT INTO `detail_request_bahan` VALUES (4, 'agregat', 10.00, 'ton');
INSERT INTO `detail_request_bahan` VALUES (5, '1', 1.00, '1');
INSERT INTO `detail_request_bahan` VALUES (6, '234', 222.00, '222');
INSERT INTO `detail_request_bahan` VALUES (6, '123', 111.00, '111');
INSERT INTO `detail_request_bahan` VALUES (8, '1', 1.00, '1');
INSERT INTO `detail_request_bahan` VALUES (9, '', 0.00, '');
INSERT INTO `detail_request_bahan` VALUES (10, '1', 1.00, '1');
INSERT INTO `detail_request_bahan` VALUES (2, '', 0.00, '');
INSERT INTO `detail_request_bahan` VALUES (3, 'semen', 2.00, 'zak');
INSERT INTO `detail_request_bahan` VALUES (3, 'bata', 100.00, 'buah');
INSERT INTO `detail_request_bahan` VALUES (4, 'agregat', 10.00, 'ton');
INSERT INTO `detail_request_bahan` VALUES (5, '1', 1.00, '1');
INSERT INTO `detail_request_bahan` VALUES (6, '234', 222.00, '222');
INSERT INTO `detail_request_bahan` VALUES (6, '123', 111.00, '111');
INSERT INTO `detail_request_bahan` VALUES (8, '1', 1.00, '1');
INSERT INTO `detail_request_bahan` VALUES (9, '', 0.00, '');
INSERT INTO `detail_request_bahan` VALUES (10, '1', 1.00, '1');
INSERT INTO `detail_request_bahan` VALUES (1, 'aspal', 2.00, 'ton');
INSERT INTO `detail_request_bahan` VALUES (1, 'aspal', 2.00, 'ton');

-- ----------------------------
-- Table structure for detail_request_peralatan
-- ----------------------------
DROP TABLE IF EXISTS `detail_request_peralatan`;
CREATE TABLE `detail_request_peralatan`  (
  `id` int NOT NULL,
  `jenis_peralatan` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jumlah` int NOT NULL,
  `satuan` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of detail_request_peralatan
-- ----------------------------
INSERT INTO `detail_request_peralatan` VALUES (2, '', 0, '');
INSERT INTO `detail_request_peralatan` VALUES (3, 'dumptruck', 1, 'unit');
INSERT INTO `detail_request_peralatan` VALUES (3, 'motor', 1, 'unit');
INSERT INTO `detail_request_peralatan` VALUES (4, '', 0, '');
INSERT INTO `detail_request_peralatan` VALUES (5, '2', 2, '2');
INSERT INTO `detail_request_peralatan` VALUES (5, '2', 23, '3');
INSERT INTO `detail_request_peralatan` VALUES (6, '1', 1, '1');
INSERT INTO `detail_request_peralatan` VALUES (8, '1', 1, '1');
INSERT INTO `detail_request_peralatan` VALUES (9, '', 0, '');
INSERT INTO `detail_request_peralatan` VALUES (10, '1', 1, '1');
INSERT INTO `detail_request_peralatan` VALUES (2, '', 0, '');
INSERT INTO `detail_request_peralatan` VALUES (3, 'dumptruck', 1, 'unit');
INSERT INTO `detail_request_peralatan` VALUES (3, 'motor', 1, 'unit');
INSERT INTO `detail_request_peralatan` VALUES (4, '', 0, '');
INSERT INTO `detail_request_peralatan` VALUES (5, '2', 2, '2');
INSERT INTO `detail_request_peralatan` VALUES (5, '2', 23, '3');
INSERT INTO `detail_request_peralatan` VALUES (6, '1', 1, '1');
INSERT INTO `detail_request_peralatan` VALUES (8, '1', 1, '1');
INSERT INTO `detail_request_peralatan` VALUES (9, '', 0, '');
INSERT INTO `detail_request_peralatan` VALUES (10, '1', 1, '1');
INSERT INTO `detail_request_peralatan` VALUES (1, 'dumptruck', 12, 'bh');
INSERT INTO `detail_request_peralatan` VALUES (1, 'dumptruck', 12, 'bh');

-- ----------------------------
-- Table structure for detail_request_tkerja
-- ----------------------------
DROP TABLE IF EXISTS `detail_request_tkerja`;
CREATE TABLE `detail_request_tkerja`  (
  `id` int NOT NULL,
  `tenaga_kerja` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jumlah` int NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of detail_request_tkerja
-- ----------------------------
INSERT INTO `detail_request_tkerja` VALUES (2, '', 0);
INSERT INTO `detail_request_tkerja` VALUES (3, 'mandor', 1);
INSERT INTO `detail_request_tkerja` VALUES (3, 'pekerja', 4);
INSERT INTO `detail_request_tkerja` VALUES (4, '', 0);
INSERT INTO `detail_request_tkerja` VALUES (5, '1', 1);
INSERT INTO `detail_request_tkerja` VALUES (6, '22', 22);
INSERT INTO `detail_request_tkerja` VALUES (6, '22', 22);
INSERT INTO `detail_request_tkerja` VALUES (8, '1', 1);
INSERT INTO `detail_request_tkerja` VALUES (9, '', 0);
INSERT INTO `detail_request_tkerja` VALUES (10, '1', 1);
INSERT INTO `detail_request_tkerja` VALUES (2, '', 0);
INSERT INTO `detail_request_tkerja` VALUES (3, 'mandor', 1);
INSERT INTO `detail_request_tkerja` VALUES (3, 'pekerja', 4);
INSERT INTO `detail_request_tkerja` VALUES (4, '', 0);
INSERT INTO `detail_request_tkerja` VALUES (5, '1', 1);
INSERT INTO `detail_request_tkerja` VALUES (6, '22', 22);
INSERT INTO `detail_request_tkerja` VALUES (6, '22', 22);
INSERT INTO `detail_request_tkerja` VALUES (8, '1', 1);
INSERT INTO `detail_request_tkerja` VALUES (9, '', 0);
INSERT INTO `detail_request_tkerja` VALUES (10, '1', 1);
INSERT INTO `detail_request_tkerja` VALUES (1, 'mandor', 1);
INSERT INTO `detail_request_tkerja` VALUES (1, 'pekerja', 4);
INSERT INTO `detail_request_tkerja` VALUES (1, 'mandor', 1);
INSERT INTO `detail_request_tkerja` VALUES (1, 'pekerja', 4);

-- ----------------------------
-- Table structure for disposisi
-- ----------------------------
DROP TABLE IF EXISTS `disposisi`;
CREATE TABLE `disposisi`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `disposisi_code` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `dari` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `perihal` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tgl_surat` date NOT NULL,
  `no_surat` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tanggal_penyelesaian` datetime NOT NULL,
  `status` int NULL DEFAULT NULL,
  `file` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `parent_disposisi` int NULL DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `updated_date` datetime NULL DEFAULT NULL,
  `updated_by` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of disposisi
-- ----------------------------
INSERT INTO `disposisi` VALUES (1, '200111', 'Fulan', 'Perbaikan jalan dan pembersihan jiwa petugas lapangan perbaikan jalan', '2021-01-11', 'ASU345/AC', '2021-01-30 00:00:00', 1, '', NULL, '2021-01-11 21:59:05', '1', '0000-00-00 00:00:00', '');

-- ----------------------------
-- Table structure for disposisi_approved
-- ----------------------------
DROP TABLE IF EXISTS `disposisi_approved`;
CREATE TABLE `disposisi_approved`  (
  `id` int NOT NULL,
  `disposisi_id` int NOT NULL,
  `user_id` int NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of disposisi_approved
-- ----------------------------

-- ----------------------------
-- Table structure for disposisi_history
-- ----------------------------
DROP TABLE IF EXISTS `disposisi_history`;
CREATE TABLE `disposisi_history`  (
  `id` int NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `disposisi_id` int NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of disposisi_history
-- ----------------------------

-- ----------------------------
-- Table structure for disposisi_jenis_instruksi
-- ----------------------------
DROP TABLE IF EXISTS `disposisi_jenis_instruksi`;
CREATE TABLE `disposisi_jenis_instruksi`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `disposisi_code` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `disposisi_instruksi_id` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of disposisi_jenis_instruksi
-- ----------------------------
INSERT INTO `disposisi_jenis_instruksi` VALUES (1, '200111', 3);

-- ----------------------------
-- Table structure for disposisi_penanggung_jawab
-- ----------------------------
DROP TABLE IF EXISTS `disposisi_penanggung_jawab`;
CREATE TABLE `disposisi_penanggung_jawab`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `disposisi_code` int NOT NULL,
  `user_role_id` int NOT NULL,
  `status` int NULL DEFAULT NULL,
  `level` int NULL DEFAULT NULL,
  `pemberi_disposisi` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of disposisi_penanggung_jawab
-- ----------------------------
INSERT INTO `disposisi_penanggung_jawab` VALUES (1, 200111, 4, 1, 1, 1);
INSERT INTO `disposisi_penanggung_jawab` VALUES (2, 200111, 3, 1, 1, 1);

-- ----------------------------
-- Table structure for disposisi_tindak_lanjut
-- ----------------------------
DROP TABLE IF EXISTS `disposisi_tindak_lanjut`;
CREATE TABLE `disposisi_tindak_lanjut`  (
  `id` int NOT NULL,
  `disposisi_id` int NOT NULL,
  `tindak_lanjut` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` int NOT NULL,
  `persentase` int NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `file` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int NOT NULL,
  `level` int NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of disposisi_tindak_lanjut
-- ----------------------------

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for file_dkh
-- ----------------------------
DROP TABLE IF EXISTS `file_dkh`;
CREATE TABLE `file_dkh`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_data_umum` bigint UNSIGNED NOT NULL,
  `dkh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of file_dkh
-- ----------------------------

-- ----------------------------
-- Table structure for file_dkh_update
-- ----------------------------
DROP TABLE IF EXISTS `file_dkh_update`;
CREATE TABLE `file_dkh_update`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `id_data_umum` int NOT NULL,
  `file_dkh_update` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of file_dkh_update
-- ----------------------------
INSERT INTO `file_dkh_update` VALUES (1, 1, 'file_unmerge\\1618083549_Penawaran Bpk. Slamet.pdf', NULL);
INSERT INTO `file_dkh_update` VALUES (2, 1, 'file_unmerge\\1618085159_Penawaran Bpk. Slamet.pdf', NULL);

-- ----------------------------
-- Table structure for file_jaminan
-- ----------------------------
DROP TABLE IF EXISTS `file_jaminan`;
CREATE TABLE `file_jaminan`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_data_umum` bigint UNSIGNED NOT NULL,
  `jaminan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of file_jaminan
-- ----------------------------

-- ----------------------------
-- Table structure for file_jaminan_update
-- ----------------------------
DROP TABLE IF EXISTS `file_jaminan_update`;
CREATE TABLE `file_jaminan_update`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_data_umum` bigint UNSIGNED NOT NULL,
  `file_jaminan_update` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of file_jaminan_update
-- ----------------------------

-- ----------------------------
-- Table structure for file_jpp
-- ----------------------------
DROP TABLE IF EXISTS `file_jpp`;
CREATE TABLE `file_jpp`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_data_umum` bigint UNSIGNED NOT NULL,
  `jpp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of file_jpp
-- ----------------------------

-- ----------------------------
-- Table structure for file_jpp_update
-- ----------------------------
DROP TABLE IF EXISTS `file_jpp_update`;
CREATE TABLE `file_jpp_update`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_data_umum` bigint UNSIGNED NOT NULL,
  `file_jpp_update` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of file_jpp_update
-- ----------------------------

-- ----------------------------
-- Table structure for file_kontrak
-- ----------------------------
DROP TABLE IF EXISTS `file_kontrak`;
CREATE TABLE `file_kontrak`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_data_umum` bigint UNSIGNED NOT NULL,
  `kontrak` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of file_kontrak
-- ----------------------------

-- ----------------------------
-- Table structure for file_kontrak_update
-- ----------------------------
DROP TABLE IF EXISTS `file_kontrak_update`;
CREATE TABLE `file_kontrak_update`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `id_data_umum` int NOT NULL,
  `file_kontrak_update` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of file_kontrak_update
-- ----------------------------
INSERT INTO `file_kontrak_update` VALUES (1, 1, 'file_unmerge\\1618089156_Penawaran Bpk. Slamet.pdf', NULL);

-- ----------------------------
-- Table structure for file_rencana
-- ----------------------------
DROP TABLE IF EXISTS `file_rencana`;
CREATE TABLE `file_rencana`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_data_umum` bigint UNSIGNED NOT NULL,
  `rencana` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of file_rencana
-- ----------------------------

-- ----------------------------
-- Table structure for file_rencana_update
-- ----------------------------
DROP TABLE IF EXISTS `file_rencana_update`;
CREATE TABLE `file_rencana_update`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_data_umum` bigint UNSIGNED NOT NULL,
  `file_rencana_update` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of file_rencana_update
-- ----------------------------

-- ----------------------------
-- Table structure for file_spek_umum
-- ----------------------------
DROP TABLE IF EXISTS `file_spek_umum`;
CREATE TABLE `file_spek_umum`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_data_umum` bigint UNSIGNED NOT NULL,
  `spek_umum` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of file_spek_umum
-- ----------------------------

-- ----------------------------
-- Table structure for file_spek_umum_update
-- ----------------------------
DROP TABLE IF EXISTS `file_spek_umum_update`;
CREATE TABLE `file_spek_umum_update`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_data_umum` bigint UNSIGNED NOT NULL,
  `file_spek_umum_update` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of file_spek_umum_update
-- ----------------------------

-- ----------------------------
-- Table structure for file_spkmp
-- ----------------------------
DROP TABLE IF EXISTS `file_spkmp`;
CREATE TABLE `file_spkmp`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_data_umum` bigint UNSIGNED NOT NULL,
  `spkmp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of file_spkmp
-- ----------------------------

-- ----------------------------
-- Table structure for file_spkmp_update
-- ----------------------------
DROP TABLE IF EXISTS `file_spkmp_update`;
CREATE TABLE `file_spkmp_update`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_data_umum` bigint UNSIGNED NOT NULL,
  `file_spkmp_update` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of file_spkmp_update
-- ----------------------------

-- ----------------------------
-- Table structure for file_spl
-- ----------------------------
DROP TABLE IF EXISTS `file_spl`;
CREATE TABLE `file_spl`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_data_umum` bigint UNSIGNED NOT NULL,
  `spl` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of file_spl
-- ----------------------------

-- ----------------------------
-- Table structure for file_spl_update
-- ----------------------------
DROP TABLE IF EXISTS `file_spl_update`;
CREATE TABLE `file_spl_update`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_data_umum` bigint UNSIGNED NOT NULL,
  `file_spl_update` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of file_spl_update
-- ----------------------------

-- ----------------------------
-- Table structure for file_spmk
-- ----------------------------
DROP TABLE IF EXISTS `file_spmk`;
CREATE TABLE `file_spmk`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_data_umum` bigint UNSIGNED NOT NULL,
  `spmk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of file_spmk
-- ----------------------------

-- ----------------------------
-- Table structure for file_spmk_update
-- ----------------------------
DROP TABLE IF EXISTS `file_spmk_update`;
CREATE TABLE `file_spmk_update`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_data_umum` bigint UNSIGNED NOT NULL,
  `file_spmk_update` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of file_spmk_update
-- ----------------------------

-- ----------------------------
-- Table structure for file_sppbj
-- ----------------------------
DROP TABLE IF EXISTS `file_sppbj`;
CREATE TABLE `file_sppbj`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_data_umum` bigint UNSIGNED NOT NULL,
  `sppbj` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of file_sppbj
-- ----------------------------

-- ----------------------------
-- Table structure for file_sppbj_update
-- ----------------------------
DROP TABLE IF EXISTS `file_sppbj_update`;
CREATE TABLE `file_sppbj_update`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_data_umum` bigint UNSIGNED NOT NULL,
  `file_sppbj_update` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of file_sppbj_update
-- ----------------------------

-- ----------------------------
-- Table structure for file_syarat_khusus
-- ----------------------------
DROP TABLE IF EXISTS `file_syarat_khusus`;
CREATE TABLE `file_syarat_khusus`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_data_umum` bigint UNSIGNED NOT NULL,
  `syarat_khusus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of file_syarat_khusus
-- ----------------------------

-- ----------------------------
-- Table structure for file_syarat_khusus_update
-- ----------------------------
DROP TABLE IF EXISTS `file_syarat_khusus_update`;
CREATE TABLE `file_syarat_khusus_update`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_data_umum` bigint UNSIGNED NOT NULL,
  `file_syarat_khusus_update` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of file_syarat_khusus_update
-- ----------------------------

-- ----------------------------
-- Table structure for file_syarat_umum
-- ----------------------------
DROP TABLE IF EXISTS `file_syarat_umum`;
CREATE TABLE `file_syarat_umum`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_data_umum` bigint UNSIGNED NOT NULL,
  `syarat_umum` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of file_syarat_umum
-- ----------------------------

-- ----------------------------
-- Table structure for file_syarat_umum_update
-- ----------------------------
DROP TABLE IF EXISTS `file_syarat_umum_update`;
CREATE TABLE `file_syarat_umum_update`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_data_umum` bigint UNSIGNED NOT NULL,
  `file_syarat_umum_update` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of file_syarat_umum_update
-- ----------------------------

-- ----------------------------
-- Table structure for history_log
-- ----------------------------
DROP TABLE IF EXISTS `history_log`;
CREATE TABLE `history_log`  (
  `id_history` int NOT NULL AUTO_INCREMENT,
  `id_login` int NOT NULL,
  `ip_user` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `login_time` date NOT NULL,
  PRIMARY KEY (`id_history`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 76 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of history_log
-- ----------------------------
INSERT INTO `history_log` VALUES (1, 1, '124.81.122.131', '2021-03-06');
INSERT INTO `history_log` VALUES (2, 5, '124.81.122.131', '2021-03-06');
INSERT INTO `history_log` VALUES (3, 6, '124.81.122.131', '2021-03-06');
INSERT INTO `history_log` VALUES (4, 3, '124.81.122.131', '2021-03-06');
INSERT INTO `history_log` VALUES (5, 1, '124.81.122.131', '2021-03-06');
INSERT INTO `history_log` VALUES (6, 1, '124.81.122.131', '2021-03-06');
INSERT INTO `history_log` VALUES (7, 1, '124.81.122.131', '2021-03-06');
INSERT INTO `history_log` VALUES (8, 1, '124.81.122.131', '2021-03-06');
INSERT INTO `history_log` VALUES (9, 1, '124.81.122.131', '2021-03-06');
INSERT INTO `history_log` VALUES (10, 1, '124.81.122.131', '2021-03-07');
INSERT INTO `history_log` VALUES (11, 1, '124.81.122.131', '2021-03-08');
INSERT INTO `history_log` VALUES (12, 1, '124.81.122.131', '2021-03-08');
INSERT INTO `history_log` VALUES (13, 1, '124.81.122.131', '2021-03-08');
INSERT INTO `history_log` VALUES (14, 1, '124.81.122.131', '2021-03-09');
INSERT INTO `history_log` VALUES (15, 1, '124.81.122.131', '2021-03-09');
INSERT INTO `history_log` VALUES (16, 1, '124.81.122.131', '2021-03-09');
INSERT INTO `history_log` VALUES (17, 1, '124.81.122.131', '2021-03-09');
INSERT INTO `history_log` VALUES (18, 1, '124.81.122.131', '2021-03-09');
INSERT INTO `history_log` VALUES (19, 1, '124.81.122.131', '2021-03-09');
INSERT INTO `history_log` VALUES (20, 1, '124.81.122.131', '2021-03-09');
INSERT INTO `history_log` VALUES (21, 1, '124.81.122.131', '2021-03-10');
INSERT INTO `history_log` VALUES (22, 1, '124.81.122.131', '2021-03-10');
INSERT INTO `history_log` VALUES (23, 1, '124.81.122.131', '2021-03-10');
INSERT INTO `history_log` VALUES (24, 1, '124.81.122.131', '2021-03-10');
INSERT INTO `history_log` VALUES (25, 1, '124.81.122.131', '2021-03-11');
INSERT INTO `history_log` VALUES (26, 1, '124.81.122.131', '2021-03-15');
INSERT INTO `history_log` VALUES (27, 2, '124.81.122.131', '2021-03-15');
INSERT INTO `history_log` VALUES (28, 3, '124.81.122.131', '2021-03-15');
INSERT INTO `history_log` VALUES (29, 5, '124.81.122.131', '2021-03-15');
INSERT INTO `history_log` VALUES (30, 1, '124.81.122.131', '2021-03-15');
INSERT INTO `history_log` VALUES (31, 1, '124.81.122.131', '2021-03-15');
INSERT INTO `history_log` VALUES (32, 1, '124.81.122.131', '2021-03-15');
INSERT INTO `history_log` VALUES (33, 1, '124.81.122.131', '2021-03-15');
INSERT INTO `history_log` VALUES (34, 1, '124.81.122.131', '2021-03-15');
INSERT INTO `history_log` VALUES (35, 1, '127.0.0.1', '2021-03-15');
INSERT INTO `history_log` VALUES (36, 1, '124.81.122.131', '2021-03-15');
INSERT INTO `history_log` VALUES (37, 1, '124.81.122.131', '2021-03-15');
INSERT INTO `history_log` VALUES (38, 1, '::1', '2021-03-16');
INSERT INTO `history_log` VALUES (39, 1, '::1', '2021-03-16');
INSERT INTO `history_log` VALUES (40, 1, '::1', '2021-03-16');
INSERT INTO `history_log` VALUES (41, 1, '::1', '2021-03-16');
INSERT INTO `history_log` VALUES (42, 1, '::1', '2021-03-17');
INSERT INTO `history_log` VALUES (43, 1, '::1', '2021-03-17');
INSERT INTO `history_log` VALUES (44, 1, '::1', '2021-03-17');
INSERT INTO `history_log` VALUES (45, 1, '::1', '2021-03-17');
INSERT INTO `history_log` VALUES (46, 1, '::1', '2021-03-17');
INSERT INTO `history_log` VALUES (47, 1, '::1', '2021-03-17');
INSERT INTO `history_log` VALUES (48, 1, '::1', '2021-03-18');
INSERT INTO `history_log` VALUES (49, 1, '::1', '2021-03-18');
INSERT INTO `history_log` VALUES (50, 1, '::1', '2021-03-18');
INSERT INTO `history_log` VALUES (51, 1, '::1', '2021-03-18');
INSERT INTO `history_log` VALUES (52, 1, '::1', '2021-03-22');
INSERT INTO `history_log` VALUES (53, 1, '::1', '2021-03-22');
INSERT INTO `history_log` VALUES (54, 1, '::1', '2021-03-22');
INSERT INTO `history_log` VALUES (55, 1, '127.0.0.1', '2021-03-24');
INSERT INTO `history_log` VALUES (56, 1, '127.0.0.1', '2021-03-24');
INSERT INTO `history_log` VALUES (57, 1, '::1', '2021-03-25');
INSERT INTO `history_log` VALUES (58, 1, '::1', '2021-03-25');
INSERT INTO `history_log` VALUES (59, 1, '::1', '2021-03-26');
INSERT INTO `history_log` VALUES (60, 1, '::1', '2021-03-29');
INSERT INTO `history_log` VALUES (61, 1, '::1', '2021-03-29');
INSERT INTO `history_log` VALUES (62, 1, '127.0.0.1', '2021-03-29');
INSERT INTO `history_log` VALUES (63, 1, '::1', '2021-03-30');
INSERT INTO `history_log` VALUES (64, 1, '127.0.0.1', '2021-03-30');
INSERT INTO `history_log` VALUES (65, 1, '127.0.0.1', '2021-03-30');
INSERT INTO `history_log` VALUES (66, 1, '::1', '2021-03-30');
INSERT INTO `history_log` VALUES (67, 1, '::1', '2021-03-31');
INSERT INTO `history_log` VALUES (68, 1, '::1', '2021-03-31');
INSERT INTO `history_log` VALUES (69, 1, '::1', '2021-03-31');
INSERT INTO `history_log` VALUES (70, 1, '::1', '2021-03-31');
INSERT INTO `history_log` VALUES (71, 1, '::1', '2021-04-01');
INSERT INTO `history_log` VALUES (72, 1, '::1', '2021-04-06');
INSERT INTO `history_log` VALUES (73, 1, '::1', '2021-04-06');
INSERT INTO `history_log` VALUES (74, 1, '::1', '2021-04-06');
INSERT INTO `history_log` VALUES (75, 1, '::1', '2021-04-06');

-- ----------------------------
-- Table structure for item_bahan
-- ----------------------------
DROP TABLE IF EXISTS `item_bahan`;
CREATE TABLE `item_bahan`  (
  `no` int NOT NULL,
  `nama_item` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `satuan` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of item_bahan
-- ----------------------------

-- ----------------------------
-- Table structure for item_pekerjaan
-- ----------------------------
DROP TABLE IF EXISTS `item_pekerjaan`;
CREATE TABLE `item_pekerjaan`  (
  `no` int NOT NULL,
  `nama_item` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of item_pekerjaan
-- ----------------------------

-- ----------------------------
-- Table structure for item_satuan
-- ----------------------------
DROP TABLE IF EXISTS `item_satuan`;
CREATE TABLE `item_satuan`  (
  `no` int NOT NULL,
  `satuan` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of item_satuan
-- ----------------------------

-- ----------------------------
-- Table structure for jadual
-- ----------------------------
DROP TABLE IF EXISTS `jadual`;
CREATE TABLE `jadual`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_data_umum` int NOT NULL,
  `nmp` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user` int NOT NULL,
  `unor` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_sup` int NULL DEFAULT NULL,
  `nm_paket` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ruas_jalan` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `lama_waktu` int NOT NULL,
  `panjang_km` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ppk` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nm_ppk` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `penyedia` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `konsultan` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` date NULL DEFAULT NULL,
  `updated_at` date NULL DEFAULT NULL,
  `harga_satuan` float(20, 2) NOT NULL,
  `volume` int NOT NULL,
  `satuan` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nilai_kontrak` decimal(20, 2) NOT NULL,
  `jumlah_harga` decimal(20, 2) NOT NULL,
  `bobot` decimal(10, 2) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jadual
-- ----------------------------
INSERT INTO `jadual` VALUES (4, 6, '7.10.(2)', 1, 'UPTD-II', NULL, 'REHAB UPLOAD', 'Jl. Kapten Tendean (Subang) - 25913K - 1830', 231, '20', 'daasd', 'Ayi Gunari Arifin, ST. M.Si', 'LIKATAMA - MANGGALA KSO.', 'PT. WIN SOLUTION KONSUTAN, PT. GARIS PUTIH SEJAJAR, PT. EZZY ANUGRAH KSO', '2021-04-09', NULL, 99370000.00, 1, 'LS', 1234542.00, 99370000.00, 3.95);
INSERT INTO `jadual` VALUES (5, 4, '7.10.(2)', 1, 'UPTD-III', NULL, 'TES INPUT', 'Jl. Kapten Tendean (Subang) - 25913K - 1830', 231, '20', 'daasd', 'Rachmat Rustandi, ST', 'LIKATAMA - MANGGALA KSO.', 'PT. WIN SOLUTION KONSUTAN, PT. GARIS PUTIH SEJAJAR, PT. EZZY ANUGRAH KSO', '2021-04-11', NULL, 99370000.00, 1, 'LS', 123122222.00, 99370000.00, 3.95);

-- ----------------------------
-- Table structure for kantor
-- ----------------------------
DROP TABLE IF EXISTS `kantor`;
CREATE TABLE `kantor`  (
  `id_kantor` int NOT NULL AUTO_INCREMENT,
  `nama_kantor` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nama_lengkap` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `alamat_kantor` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `telp` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_kantor`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 72 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of kantor
-- ----------------------------
INSERT INTO `kantor` VALUES (1, 'UPTD-I', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - I', 'Cianjur', '', '', 'k1');
INSERT INTO `kantor` VALUES (2, 'UPTD-II', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - II', 'Sukabumi', '', '', 'k2');
INSERT INTO `kantor` VALUES (3, 'UPTD-III', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - III', 'Bandung', '', '', 'k3');
INSERT INTO `kantor` VALUES (4, 'UPTD-IV', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', 'Sumedang', '', '', 'k4');
INSERT INTO `kantor` VALUES (5, 'UPTD-V', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - V', 'Tasikmalaya', '', '', 'k5');
INSERT INTO `kantor` VALUES (6, 'UPTD-VI', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - VI', 'Cirebon', '', '', 'k6');
INSERT INTO `kantor` VALUES (7, 'Pusat', 'DINAS BINA MARGA DAN PENATAAN RUANG PROVINSI JAWA BARAT', 'JL. Asia Afrika No 79', '022-', '', 'k0');
INSERT INTO `kantor` VALUES (8, 'BIDANG HARBANG', 'BIDANG PEMELIHARAAN DAN PEMBANGUNAN JALAN DAN JEMBATAN ', 'JL. Asia Afrika No 79', '', '', 'k01');

-- ----------------------------
-- Table structure for kategori_paket
-- ----------------------------
DROP TABLE IF EXISTS `kategori_paket`;
CREATE TABLE `kategori_paket`  (
  `id` int NOT NULL,
  `nama_kategori` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of kategori_paket
-- ----------------------------
INSERT INTO `kategori_paket` VALUES (1, 'pembangunan');
INSERT INTO `kategori_paket` VALUES (2, 'peningkatan');
INSERT INTO `kategori_paket` VALUES (3, 'rehabilitasi');

-- ----------------------------
-- Table structure for kemandoran
-- ----------------------------
DROP TABLE IF EXISTS `kemandoran`;
CREATE TABLE `kemandoran`  (
  `id_pek` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal` date NOT NULL,
  `nama_mandor` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sup` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ruas_jalan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jenis_pekerjaan` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `paket` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `lokasi` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `panjang` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `peralatan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jumlah_pekerja` int NOT NULL,
  `foto_awal` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `foto_sedang` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `foto_akhir` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tglreal` datetime NOT NULL,
  `id_session` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ket` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `lat` float(10, 6) NOT NULL,
  `lng` float(10, 6) NOT NULL,
  `video` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `file` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_spp` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `kategori` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `rule` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `uptd_id` int NOT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of kemandoran
-- ----------------------------

-- ----------------------------
-- Table structure for login
-- ----------------------------
DROP TABLE IF EXISTS `login`;
CREATE TABLE `login`  (
  `id_login` int NOT NULL AUTO_INCREMENT,
  `user` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pass` char(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_member` int NOT NULL,
  `level` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_sesi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_login`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 47 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of login
-- ----------------------------
INSERT INTO `login` VALUES (1, 'admin', '250cf8b51c773f3f8dc8b4be867a9a02', 1, 'ADMINISTRATOR', 'fc9p7ieslclrjo1uvs6hp0fi2l');
INSERT INTO `login` VALUES (2, 'kontraktor', '202cb962ac59075b964b07152d234b70', 2, 'KONTRAKTOR', '1452bqpduqpt65uopq0pbbtakj');
INSERT INTO `login` VALUES (3, 'konsultan', '202cb962ac59075b964b07152d234b70', 3, 'KONSULTAN', 'lqa5lq0hmm5n3lalqvhda22apg');
INSERT INTO `login` VALUES (5, 'admin1', '250cf8b51c773f3f8dc8b4be867a9a02', 5, 'ADMIN-UPTD', 'hb2k29l4kbcvcr7m6gnmi98gsm');
INSERT INTO `login` VALUES (6, 'ppk', '202cb962ac59075b964b07152d234b70', 5, 'PPK', 'es678tfvmrsk2i69or90opviq2');
INSERT INTO `login` VALUES (45, '123123', '202cb962ac59075b964b07152d234b70', 8, 'ADMIN-UPTD', '');
INSERT INTO `login` VALUES (46, '123123', '202cb962ac59075b964b07152d234b70', 10, 'USER', '');

-- ----------------------------
-- Table structure for master_bahan
-- ----------------------------
DROP TABLE IF EXISTS `master_bahan`;
CREATE TABLE `master_bahan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_bahan` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `satuan` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tgl_input` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tgl_update` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of master_bahan
-- ----------------------------
INSERT INTO `master_bahan` VALUES (2, 'emulsi', 'drum', '', '');
INSERT INTO `master_bahan` VALUES (9, 'Pasir Beton ', 'M3', '', '');
INSERT INTO `master_bahan` VALUES (10, 'Asphalt Pen. 60/70', 'KG', '', '');
INSERT INTO `master_bahan` VALUES (11, 'Batu Belah', 'M3', '', '');
INSERT INTO `master_bahan` VALUES (12, 'Batu Pecah/Batu Split 1-2', 'M3', '', '');
INSERT INTO `master_bahan` VALUES (13, 'Batu Pecah/Batu Split 2-3', 'M3', '', '');
INSERT INTO `master_bahan` VALUES (14, 'Beton Precast U-Ditch DS.2', 'PCS', '', '');
INSERT INTO `master_bahan` VALUES (15, 'Beton Ready Mix', 'M3', '', '');
INSERT INTO `master_bahan` VALUES (16, 'Aggregate Base Klas S', '#', '', '');
INSERT INTO `master_bahan` VALUES (17, 'Material Pilihan (Granular)', 'M3', '', '');
INSERT INTO `master_bahan` VALUES (18, 'Kerb Beton', '#', '', '');
INSERT INTO `master_bahan` VALUES (19, 'Aggregate Base Klas B', 'M3', '', '');

-- ----------------------------
-- Table structure for master_disposisi_instruksi
-- ----------------------------
DROP TABLE IF EXISTS `master_disposisi_instruksi`;
CREATE TABLE `master_disposisi_instruksi`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenis_instruksi` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of master_disposisi_instruksi
-- ----------------------------
INSERT INTO `master_disposisi_instruksi` VALUES (1, 'Menghadap Saya', '');
INSERT INTO `master_disposisi_instruksi` VALUES (2, 'Untuk Diketahui', '');
INSERT INTO `master_disposisi_instruksi` VALUES (3, 'Untuk Ditindak lanjuti', '');
INSERT INTO `master_disposisi_instruksi` VALUES (4, 'Konsep jawaban', '');
INSERT INTO `master_disposisi_instruksi` VALUES (5, 'Untuk Menjadi Pemeriksa', '');
INSERT INTO `master_disposisi_instruksi` VALUES (6, 'Untuk Bahan Seperlunya', '');
INSERT INTO `master_disposisi_instruksi` VALUES (7, 'Saran / Usul / Telaah', '');
INSERT INTO `master_disposisi_instruksi` VALUES (8, 'Koordinasikan / Konfirmasi dengan YBS / Instansi Terkait', '');
INSERT INTO `master_disposisi_instruksi` VALUES (9, 'Sesuai dengan Rencana', '');
INSERT INTO `master_disposisi_instruksi` VALUES (10, 'Jawaban / Klarifikasi pada yang bersangkutan', '');
INSERT INTO `master_disposisi_instruksi` VALUES (11, 'Siapkan Pointer / Sambutan / Bahan', '');
INSERT INTO `master_disposisi_instruksi` VALUES (12, 'Difoto Copy', '');
INSERT INTO `master_disposisi_instruksi` VALUES (13, 'File / Diarsipkan', '');
INSERT INTO `master_disposisi_instruksi` VALUES (17, 'Kepada Bersangkutan', '');

-- ----------------------------
-- Table structure for master_jenis_pekerjaan
-- ----------------------------
DROP TABLE IF EXISTS `master_jenis_pekerjaan`;
CREATE TABLE `master_jenis_pekerjaan`  (
  `id` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jenis_pekerjaan` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `satuan` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tgl_input` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tgl_update` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of master_jenis_pekerjaan
-- ----------------------------
INSERT INTO `master_jenis_pekerjaan` VALUES ('1.17', 'Pengamanan Lingkungan Hidup', 'LS', '', '24 September 2020');
INSERT INTO `master_jenis_pekerjaan` VALUES ('1.18.(1)', 'Manajemen dan Keselamatan Lalu Lintas ', 'LS', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('1.18.(2)', 'Jembatan Sementara', 'LS', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('1.2', 'Mobilisasi', 'LS', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('1.20 (1)', 'Pengeboran, termasuk SPT dan Laporan ', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('1.20 (2)', 'Sondir termasuk Laporan', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('1.21', 'Manajemen Mutu ', 'LS', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('10.1 (1)', 'Pemeliharaan Rutin Perkerasan ', 'LS', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('10.1 (4)', 'Pemeliharaan Rutin Perlengkapan Jalan', 'LS', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('10.1 (5)', 'Pemeliharaan Rutin Jembatan', 'LS', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('10.1.(2)', 'Pemeliharaan Rutin Bahu Jalan', 'LS', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('10.1.(3)', 'Pemeliharaan Rutin Selokan, Saluran Air, Galian dan Timbunan', 'LS', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('2.1.(1)', 'Galian untuk Selokan Drainase dan Saluran Air ', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('2.2.(1)', 'Pasangan Batu dengan Mortar', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('2.3 (1)', 'Gorong-gorong Pipa Beton Bertulang, diameter dalam 35-45 cm', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('2.3 (11)', 'Saluran berbentuk U Tipe DS 3', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('2.3 (12)', 'Beton K250 (fc’ 20) untuk struktur drainase beton minor', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('2.3 (13)', 'Baja Tulangan untuk struktur drainase beton minor', 'Kg', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('2.3 (14)', 'Pasangan Batu tanpa Adukan (Aanstamping) ', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('2.3 (15)', 'Gorong-gorong Persegi (Box Culvert) Beton Bertulang Tipe Single 80 cm x 80 cm', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('2.3 (16)', 'Gorong-gorong Persegi (Box Culvert) Beton Bertulang Tipe Single 100 cm x 100 cm', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('2.3 (17)', 'Gorong-gorong Persegi (Box Culvert) Beton Bertulang Tipe Single 200 cm x 200 cm', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('2.3 (2)', 'Gorong-gorong  Pipa  Beton  Bertulang, diameter 55 - 65 cm', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('2.3 (3)', 'Gorong-gorong Pipa Beton Bertulang, diameter dalam 75 - 85 cm', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('2.3 (4)', 'Gorong-gorong Pipa Beton Bertulang, diameter dalam 85-105 cm', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('2.3 (5)', 'Gorong2 Pipa Baja Bergelombang', 'Ton', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('2.3 (6)', 'Gorong-gorong Pipa Beton Tanpa Tulangan diameter dalam 20 cm', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('2.3 (7)', 'Gorong-gorong Pipa Beton Tanpa Tulangan diameter dalam 25 cm', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('2.3 (8)', 'Gorong-gorong Pipa Beton Tanpa Tulangan diameter dalam 30 cm', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('2.3 (9)', 'Saluran berbentuk U Tipe DS 1', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('2.3. (10)', 'Saluran berbentuk U Tipe DS 2', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('2.4 (2)', 'Anyaman Filter Plastik', 'M2', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('2.4 (3)', 'Pipa Berlubang Banyak (Perforated Pipe) untuk Pekerjaan Drainase Bawah Permukaan ', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('2.4.(1)', 'Bahan Porous untuk Bahan Penyaring (Filter)', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('4.2 (1)', 'Lapis Pondasi Agregat Kelas A', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('4.2 (10)', 'Laston Lapis Antara Modifikasi (AC-BC Mod)', 'Ton', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('4.2 (11)', 'Laston Lapis Pondasi (AC-Base)', 'Ton', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('4.2 (12)', 'Laston Lapis Pondasi Modifikasi (AC-Base Mod)', 'Ton', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('4.2 (13)', 'Bahan Anti Pengelupasan', 'Kg Meter', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('4.2 (14)', 'Perkerasan Beton Semen', 'Kubik Meter', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('4.2 (15)', 'Perkerasan Beton Semen dengan Anyaman Tulangan Tunggal', 'Kubik', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('4.2 (16)', 'Lapis Pondasi Bawah Beton Kurus', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('4.2 (3)', 'Semen Untuk Lapis Pondasi Semen Tanah', 'Ton', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('4.2 (4)', 'Lapis Pondasi Semen Tanah', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('4.2 (5)', 'Agregat Penutup BURTU', 'M2', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('4.2 (6)', 'Bahan Aspal untuk Pekerjaan Pelaburan', 'Liter', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('4.2 (7)', 'Lapis Resap Pengikat', 'Liter', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('4.2 (8)', 'Lapis Resap Perekat', 'Liter', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('4.2 (9)', 'Laston Lapis Antara (AC-BC)', 'Ton', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('4.2.(2a)', 'Lapis Pondasi Agregat Kelas B', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('4.2.(2b)', 'Lapis Pondasi Agregat Kelas S', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('5.1 (1)', 'Lapis Pondasi Agregat Kelas A', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('5.1 (2)', 'Lapis Pondasi Agregat Kelas B', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('5.2 (1)', 'Lapis Permukaan Agregat Tanpa Penutup Aspal', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('5.2 (2)', 'Lapis Pondasi Agregat Tanpa Penutup Aspal', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('5.3.(1)', 'Perkerasan Beton Semen ', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('5.3.(2)', 'Perkerasan Beton Semen dengan Anyaman Tulangan Tunggal ', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('5.3.(3)', 'Lapis Pondasi bawah Beton Kurus', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('5.4.(1)', 'Semen untuk Lapis Pondasi Semen Tanah', 'Ton', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('5.4.(2)', 'Lapis Pondasi Semen Tanah', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('5.5 (1)', 'Lapis Pondasi Agregat Semen Kelas A (Cement Treated Base)(CTB)', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('5.5 (2)', 'Lapis Pondasi Agregat Semen Kelas B (Cement Treated Sub-Base)(CTSB)', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('5.6 (1)', 'Lapis Beton Semen Pondasi Bawah(Cement Treated Sub Base (CTSB)Trated Base)(CTB)', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('5.6 (2)', 'Lapis Pondasi Agregat Dengan Cement Treated Base (CTB)', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('6.1 (1a)', 'Lapis Resap Pengikat - Aspal Cair', 'Liter', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('6.1 (1b)', 'Lapis Resap Pengikat - Aspal Emulsi', 'Liter', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('6.1 (2a)', 'Lapis Perekat - Aspal Cair', 'Liter', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('6.1 (2c)', 'Lapis Perekat - Aspal Emulsi Modifikasi', 'Liter', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('6.1.(2b)', 'Lapis Perekat - Aspal Emulsi', 'Liter', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('6.2 (1)', 'Agregat Penutup BURTU', 'M2', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('6.2 (2)', 'Agregat Penutup BURDA', 'M2', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('6.2 (3a)', 'Bahan Aspal untuk Pekerjaan Pelaburan', 'Liter', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('6.2 (3b)', 'Bahan Aspal Modifikasi untuk Pekerjaan Pelaburan', 'Liter', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('6.2 (4a)', 'Aspal Emulai Cair untuk Precoated', 'Liter', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('6.2 (4b)', 'Aspal Emulai untuk Precoated', 'Liter', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('6.2 (4c)', 'Aspal Emulai Modifikasi untuk Precoated', 'Liter', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('6.2 (4d)', 'Bahan anti pengelupasan', 'Liter', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('6.3  (2)', 'Latasir Kelas B (SS-B)', 'Ton', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('6.3 (1)', 'Latasir Kelas A (SS-A)', 'Ton', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('6.3 (3a)', 'Lataston Lapis Aus (HRS-WC) (gradasi senjang/semi senjang)', 'Ton', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('6.3 (3b)', 'Lataston Lapis Aus Perata (HRS-WC(L)) (gradasi senjang/semi senjang)', 'Ton', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('6.3 (4a)', 'Lataston Lapis Pondasi (HRS-Base) (gradasi senjang/semi senjang)', 'Ton', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('6.3 (4b)', 'Lataston Lapis Pondasi Perata (HRS-Base(L)) (gradasi senjang/semi senjang)', 'Ton', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('6.3 (5b)', 'Laston Lapis Aus Modifikasi (AC-WC Mod)', 'Ton', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('6.3 (5c)', 'Laston Lapis Aus Perata (AC-WC(L))', 'Ton', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('6.3 (5d)', 'Laston Lapis Aus Modifikasi Perata (AC-WC(L)Mod)', 'Ton', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('6.3 (6b)', 'Laston Lapis Antara Modifikasi (AC-BC Mod)', 'Ton', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('6.3 (6d)', 'Laston Lapis Antara Modifikasi Perata (AC-BC(L)Mod) Levelling', 'Ton', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('6.3 (7a)', 'Laston Lapis Pondasi (AC-Base) ', 'Ton', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('6.3 (7b)', 'Laston Lapis Pondasi Modifikasi (AC-Base Mod) ', 'Ton', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('6.3 (7c)', 'Laston Lapis Pondasi Perata (AC-Base(L))', 'Ton', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('6.3 (7d)', 'Laston Lapis Pondasi Modifikasi Perata (AC-Base(L)Mod)', 'Ton', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('6.3.(5a)', 'Laston Lapis Aus (AC-WC) ', 'Ton', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('6.3.(6a)', 'Laston Lapis Antara (AC-BC) ', 'Ton', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('6.3.(6c)', 'Laston Lapis Antara Perata (AC-BC(L)) ', 'Ton', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('6.3.(8)', 'Bahan Anti Pengelupasan', 'Kg', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('6.5 (1)', 'Campuran Aspal Dingin untuk Pelapisan', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('6.6.(1)', 'Lapis Permukaan Penetrasi Macadam ', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('6.6.(2)', 'Lapis Pondasi/Perata Penetrasi Macadam', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.1 (1)', 'Beton mutu tinggi, fc’ 50 Mpa', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.1 (10)', 'Beton mutu rendah fc’ 10 Mpa', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.1 (2)', 'Beton mutu tinggi, fc’45 Mpa', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.1 (3).a', 'Beton mutu tinggi, fc’40 MPa dengan traveler', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.1 (3).b', 'Beton mutu tinggi, fc’40 MPa perancah ', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.1 (4)', 'Beton mutu sedang, fc’35 Mpa', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.1 (5).a', 'Beton mutu sedang, fc’30 MPa Lantai Jembatan ', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.1 (5).b', 'Beton mutu sedang, fc’30 MPa untuk …………….. ', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.1 (6)', 'Beton mutu sedang fc’25 MPa ', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.1 (7).a', 'Beton mutu sedang fc’20 MPa ', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.1 (7).b', 'Beton mutu sedang fc 20 MPa yang dilaksanakan dia air', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.1 (8)', 'Beton mutu rendah  fc’15 Mpa', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.1 (9)', 'Beton Siklop fc’ 15 MPa ', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.10.(1)', 'Pasangan Batu Kosong yang Diisi Adukan', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.10.(2)', 'Pasangan Batu Kosong', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.10.(3) a', 'Bronjong dengan kawat yang dilapisi galvanis', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.10.(3) b', 'Bronjong dengan kawat yang dilapisi PVC ', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.10.(3) c', 'Tambahan Biaya untuk Anyaman Penulangan Tanah dengan Kawat yang Dilapisi PVC', 'M2', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.11.(1a)', 'Expansion Joint Tipe Asphaltic Plug, Fixed', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.11.(1b)', 'Expansion Joint Tipe Asphaltic Plug, Movable', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.11.(2)', 'Expansion Joint Tipe Rubber 1', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.11.(3)', 'Expansion Joint Tipe Rubber 2', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.11.(4)', 'Expansion Joint Tipe Rubber 3', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.11.(5)', 'Joint Filler untuk Sambungan Konstruksi', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.11.(6)', 'Expansion Joint Tipe Baja Bersudut ', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.11.(7)', 'Expansion Joint Type Modular, lebar ……', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.12.(1a)', 'Perletakan Logam Tipe Fixed 150 Ton ', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.12.(1b)', 'Perletakan Logam Tipe Moveable 150 Ton ', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.12.(1c)', 'Perletakan Logam Tipe …..', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.12.(2)', 'Perletakan Elastomerik Alam Ukuran …… mm x ……. mm x ……. mm', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.12.(3)', 'Perletakan Elastomerik Sintetis Ukuran …… mm x ……. mm x ……. mm', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.12.(4)', 'Perletakan Strip', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.13.(1)', 'Sandaran (Railing)', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.14.(1)', 'Papan Nama Jembatan', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.15.(1)', 'Pembongkaran Pasangan Batu', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.15.(2)', 'Pembongkaran Beton', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.15.(3)', 'Pembongkaran Beton Pratekan', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.15.(4)', 'Pembongkaran Bangunan Gedung', 'M2', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.15.(5)', 'Pembongkaran Rangka Baja', 'M2', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.15.(6)', 'Pembongkaran Balok Baja (Steel Stringers)', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.15.(7)', 'Pembongkaran Lantai Jembatan Kayu', 'M2', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.15.(8)', 'Pembongkaran Jembatan Kayu', 'M2', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.15.(9)', 'Pengangkutan Hasil Bongkaran yang melebihi 5 km', 'M3 / Km', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.16.(1)', 'Deck drain', 'Unit ', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.16.(2).a', 'Pipa Drainase Baja diameter 75 mm', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.16.(2).b', 'Pipa Drainase Baja diameter ….. Mm', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.16.(3).a', 'Pipa Drainase PVC diameter 75 mm', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.16.(3).b', 'Pipa Drainase PVC diameter …. mm', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.16.(4)', 'Pipa Penyalur PVC', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.2 (1).a', 'Penyediaan Unit Pracetak Gelagar Tipe I bentang 16 meter', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.2 (1).b', 'Penyediaan Unit Pracetak Gelagar Tipe I bentang 25 meter', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.2 (1).c', 'Penyediaan Unit Pracetak Gelagar Tipe I bentang …. Meter', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.2 (10)', 'Beton Diafragma fc’ 30 MPa termasuk pekerjaan penegangan setelah pengecoran (post tension)', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.2 (11).a', 'Penyediaan Balok Gelagar Tee Beam bentang 60 m', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.2 (11).b', 'Pemasangan Balok Gelagar Tee Beam bentang 60 m', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.2 (12).a', 'Penyediaan Panel Full Depth Slab', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.2 (12).b', 'Pemasangan Panel Full Depth Slab', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.2 (2).a', 'Pemasangan Unit Pracetak Gelagar Tipe I bentang 16 meter', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.2 (2).b', 'Pemasangan Unit Pracetak Gelagar Tipe I bentang 25 meter', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.2 (2).c', 'Pemasangan Unit Pracetak Gelagar Tipe I bentang …. Meter', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.2 (3).a', 'Penyediaan Unit Pracetak Gelagar Tipe U bentang 16 meter', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.2 (3).b', 'Penyediaan Unit Pracetak Gelagar Tipe U bentang ….  meter', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.2 (4).a', 'Pemasangan Unit Pracetak Gelagar Tipe U bentang 16 meter', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.2 (4).b', 'Pemasangan Unit Pracetak Gelagar Tipe U bentang …. meter', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.2 (5)', 'Penyediaan Unit Pracetak Gelagar Box bentang...meter lebar... Meter', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.2 (6)', 'Pemasangan Unit Pracetak Gelagar Box bentang...meter lebar... Meter', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.2 (7)', 'Baja Prategang', 'Kg', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.2 (8)', 'Penyediaan Pelat Berongga (Voided Slab) Pracetak bentang ………..meter', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.2 (9)', 'Pemasangan Pelat Berongga (Voided Slab) Pracetak bentang ………..meter', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.3 (1)', 'Baja Tulangan U24 Polos', 'Kg', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.3 (2)', 'Baja Tulangan U32 Polos', 'Kg', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.3 (3)', 'Baja Tulangan U32 Ulir', 'Kg', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.3 (4)', 'Baja Tulangan U39 Ulir', 'Kg', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.3 (5)', 'Baja Tulangan U48 Ulir', 'Kg', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.3 (6)', 'Anyaman Kawat Yang Dilas (Welded Wire Mesh)', 'Kg', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.4 (1).a', 'Penyediaan Baja Struktur BJ 34 (Titik Leleh 210 MPa).', 'Kg', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.4 (1).b', 'Penyedian Baja Struktur BJ 37 (Titik Leleh 240 MPa).', 'Kg', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.4 (1).c', 'Penyediaan Baja Struktur BJ …. (Titik Leleh ….. MPa).', 'Kg', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.4 (2).a', 'Pemasangan Baja Struktur BJ 34 (Titik Leleh 210 MPa).', 'Kg', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.4 (2).b', 'Pemasangan Baja Struktur BJ 37 (Titik Leleh 240 MPa).', 'Kg', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.4 (2).c', 'Pemasangan Baja Struktur BJ …. (Titik Leleh ….. MPa).', 'Kg', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.4 (3).a', 'Penyediaan Struktur Jembatan Rangka Baja Standar Panjang 40 m, Lebar 9 m', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.4 (3).b', 'Penyediaan Struktur Jembatan Rangka Baja Standar Panjang 50 m, Lebar 9 m', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.4 (3).c', 'Penyediaan Struktur Jembatan Rangka Baja Standar Panjang 60 m, Lebar 9 m', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.4 (3).d', 'Penyediaan Struktur Jembatan Rangka Baja Standar Panjang ... m, Lebar ... m', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.4 (4).a', 'Pemasangan Jembatan Rangka Baja Standar panjang 40 m, lebar 9 m ', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.4 (4).b', 'Pemasangan Struktur Jembatan Rangka Baja Standar Panjang 50 m, Lebar 9 m', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.4 (4).c', 'Pemasangan Struktur Jembatan Rangka Baja Standar Panjang 60 m, Lebar 9 m', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.4 (4).d', 'Pemasangan Struktur Jembatan Rangka Baja Standar Panjang ... m, Lebar ... m', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.5 (1)', 'Pemasangan jembatan baja standar', 'Kg', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.5 (2)', 'Pengangkutan Bahan Jembatan Baja Standar ', 'Kg', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.6 (1)', 'Fondasi Cerucuk, Penyediaan dan Pemancangan', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.6 (2)', 'Dinding Turap Kayu Tanpa Pengawetan.', 'M2', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.6 (24)', 'Tiang Uji jenis …ukuran .....', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.6 (25).a', 'Pengujian Pembebanan Statis pada Tiang ukuran / diameter .... dengan beban hidrolik Cara Beban Siklik', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.6 (25).b', 'Pengujian Pembebanan Statis pada Tiang ukuran / diameter .... dengan beban hidrolik Cara Beban Bertahap', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.6 (26).a', 'Pengujian Pembebanan Statis pada Tiang ukuran / diameter .... dengan meja beban statis Cara Beban Siklik', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.6 (26).b', 'Pengujian Pembebanan Statis pada Tiang ukuran / diameter .... dengan meja beban statis Cara Beban Bertahap', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.6 (27).a', 'Pengujian Crosshole Sonic Logging (CSL) pada Tiang Bor Beton diameter ...', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.6 (27).b', 'Pengujian Pembebanan Dinamis Jenis PDLT (Pile Dynamic Load Testing) pada Tiang ukuran / diameter ....', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.6 (28)', 'Pengujian Keutuhan Tiang dengan Pile Integrity Test (PIT)', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.6 (3)', 'Dinding Turap Kayu Dengan Pengawetan.', 'M2', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.6 (4)', 'Dinding Turap Baja', 'M2', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.6 (5)', 'Dinding Turap Beton', 'M2', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.6 (6)', 'Penyediaan Tiang Pancang Kayu Tanpa Pengawetan Ukuran ……. mm', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.6 (7)', 'Penyediaan Tiang Pancang Kayu Dengan Pengawetan Ukuran ……. mm', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.6.(10).a', 'Penyediaan Tiang Pancang Beton Bertulang Pracetak ukuran 350 mm x 350 mm', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.6.(10).b', 'Penyediaan Tiang Pancang Beton Bertulang Pracetak ukuran ..... mm x ...... mm', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.6.(11).a', 'Penyediaan Tiang Pancang Beton Pratekan Pracetak ukuran 400 mm x 400 mm', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.6.(11).b', 'Penyediaan Tiang Pancang Beton Pratekan Pracetak ukuran …..mm x ….. mm', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.6.(12).a', 'Penyediaan Tiang Pancang Beton Pratekan Pracetak diameter 450 mm', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.6.(12).b', 'Penyediaan Tiang Pancang Beton Pratekan Pracetak diameter ….. mm', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.6.(13) ', 'Pemancangan Tiang Pancang Kayu Ukuran ….. mm', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.6.(14).a', 'Pemancangan Tiang Pancang Baja Diameter 500 mm', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.6.(14).b', 'Pemancangan Tiang Pancang Baja Diameter …… mm', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.6.(15).a', 'Pemancangan Tiang Pancang Baja H BeamUkuran 300 mm x 300 mm x 10 mm x 15 mm', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.6.(15).b', 'Pemancangan Tiang Pancang Baja H Beam Ukuran ... mm x ... mm x ... mm x ... mm', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.6.(16).a', 'Pemancangan Tiang Pancang Beton Bertulang Pracetak ukuran 350 mm x 350 mm', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.6.(16).b', 'Pemancangan Tiang Pancang Beton Bertulang Pracetak ukuran ..... mm x ...... mm', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.6.(17).a', 'Pemancangan Tiang Pancang Beton Pratekan Pracetak ukuran 400 mm x 400 mm', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.6.(17).b', 'Pemancangan Tiang Pancang Beton Pratekan Pracetak ukuran …..mm x ….. mm', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.6.(18).a', 'Pemancangan Tiang Pancang Beton Pratekan Pracetak diameter 450 mm', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.6.(18).b', 'Pemancangan Tiang Pancang Beton Pratekan Pracetak diameter ….. mm', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.6.(19).a', 'Tiang Bor Beton, diameter 800 mm', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.6.(19).b', 'Tiang Bor Beton, diameter ….. mm', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.6.(20)', 'Tambahan Biaya untuk Nomor Mata Pembayaran 7.6.(13) s/d 7.6.(18) bila Tiang Pancang dikerjakan di Tempat Yang Berair.', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.6.(21)', 'Tambahan Biaya untuk Nomor Mata Pembayaran 7.6.(19) bila Tiang Bor Beton dikerjakan di Tempat Yang Berair.', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.6.(22)', 'Pengujian Pembebanan Pada Tiang Dengan Diameter sampai 600 mm.', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.6.(23)', 'Pengujian Pembebanan Pada Tiang Dengan Diameter di atas 600 mm.', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.6.(8).a', 'Penyediaan Tiang Pancang Baja Diameter 500 mm tebal 10 mm', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.6.(8).b', 'Penyediaan Tiang Pancang Baja Diameter 500 mm tebal ..... mm', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.6.(8).c', 'Penyediaan Tiang Pancang Baja Diameter .... mm tebal ..... mm', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.6.(9).a', 'Penyediaan Tiang Pancang Baja H Beam Ukuran 300 mm x 300 mm x 10 mm x 15 mm', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.6.(9).b', 'Penyediaan Tiang Pancang Baja H Beam Ukuran ... mm x ... mm x ... mm x ... mm', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.7.(1)', 'Dinding Sumuran Silinder terpasang, Diameter ....................', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('7.9.(1)', 'Pasangan Batu', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.1 (2)', 'Lapis Pondasi Agregat Kelas B utk Pekerjaan Minor', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.1 (3)', 'Agregat untuk Perkerasan Tanpa Penutup Aspal untuk Pekerjaan Minor', 'M3 (vol. gembur)', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.1 (4)', 'Waterbound Macadam untuk Pekerjaan Minor', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.1 (6)', 'Lasbutag atau Latasbusir untuk Pekerjaan Minor', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.1 (7)', 'Penetrasi Macadam untuk Pekerjaan Minor', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.1 (8)', 'Campuran Aspal Dingin untuk Pekerjaan Minor', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.1 (9)', 'Residu Bitumen untuk Pekerjaan Minor', 'Liter', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.1.(1)', 'Lapis Pondasi Agregat Kelas A utk Pekerjaan Minor', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.1.(5)', 'Campuran Aspal Panas untuk Pekerjaan Minor', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.2 (1)  ', 'Galian untuk Bahu Jalan dan Pekerjaan Minor Lainnya', 'M3', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.3 (2) ', 'Semak / Perdu Jenis ……', 'M2', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.3 (3) ', 'Pohon, Jenis …..', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.3.(1a)', 'Stabilisasi dengan Tanaman', 'M2', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.3.(1b)', 'Stabilisasi dengan Tanaman VS ', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.4 (2) ', 'Marka Jalan Bukan Termoplastik', 'M2', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.4.(1) ', 'Marka Jalan Termoplastik', 'M2', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.4.(10a)', 'Kerb Pracetak Jenis 1 (Peninggi/Mountable)', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.4.(10b)', 'Kerb Pracetak Jenis 2 (Penghalang/Barrier)', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.4.(10c)', 'Kerb Pracetak Jenis 3 (Kerb Berparit/Gutter)', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.4.(10d)', 'Kerb Pracetak Jenis 4 (Penghalang Berparit / Barrier Gutter) t = 20 cm', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.4.(10e)', 'Kerb Pracetak Jenis 5 (Penghalang Berparit / Barrier Gutter) t = 30 cm', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.4.(10f)', 'Kerb Pracetak Jenis 6 (Kerb dengan Bukaan)', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.4.(10g)', 'Kerb Pracetak Jenis 7a (Kerb pada Pelandaian Trotoar)', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.4.(10h)', 'Kerb Pracetak Jenis 7b (Kerb pada Pelandaian Trotoar)', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.4.(10i)', 'Kerb Pracetak Jenis 7c (Kerb pada Pelandaian Trotoar)', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.4.(11)', 'Kerb yang digunakan kembali', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.4.(12)', 'Perkerasan Blok Beton pada Trotoar dan Median', 'M2', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.4.(13)', 'Beton Pemisah Jalur (Concrete Barrier)', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.4.(14)', 'Unit Lampu Penerangan Jalan Lengan Tunggal, Tipe LED', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.4.(15)', 'Unit Lampu Penerangan Jalan Lengan Ganda, Tipe LED', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.4.(16)', 'Unit Lampu Penerangan Jalan Lengan Tunggal, Tipe Merkuri 250 Watt', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.4.(17)', 'Unit Lampu Penerangan Jalan Lengan Ganda, Tipe Merkuri 250 Watt', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.4.(18)', 'Unit Lampu Penerangan Jalan Lengan Tunggal, Tipe Merkuri 400 Watt', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.4.(19)', 'Unit Lampu Penerangan Jalan Lengan Ganda, Tipe Merkuri 400 Watt', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.4.(20)', 'Pagar Pemisah Pedestrian Carbon Steel', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.4.(21)', 'Pagar Pemisah Pedestrian Galvanized', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.4.(3a)', 'Rambu Jalan Tunggal dengan Permukaan Pemantul Engineer Grade', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.4.(3b)', 'Rambu Jalan Ganda dengan Permukaan Pemantul Engineer Grade', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.4.(4a)', 'Rambu Jalan Tunggal dengan Pemantul High Intensity Grade', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.4.(4b)', 'Rambu Jalan Ganda dengan Pemantul High Intensity Grade', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.4.(5) ', 'Patok Pengarah', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.4.(6a)', 'Patok Kilometer', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.4.(6b)', 'Patok Hektometer', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.4.(7) ', 'Rel Pengaman', 'M1', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.4.(8) ', 'Paku Jalan ', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.4.(9) ', 'Mata Kucing ', 'Buah', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.5(1)', 'Pengembalian Kondisi Lantai Jembatan Beton', 'M2', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.5(2)', 'Pengembalian Kondisi Lantai Jembatan Kayu', 'M2', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('8.5(3)', 'Pengembalian Kondisi Pelapisan Permukaan Baja Struktur', 'M2', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('9.1.(1)', 'Mandor', 'Jam', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('9.1.(10)', 'Loader Roda Berantai 75 - 100 PK', 'Jam', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('9.1.(11)', 'Alat Penggali (Excavator) 80 - 140 PK', 'Jam', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('9.1.(12)', 'Crane 10 - 15 Ton', 'Jam', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('9.1.(13)', 'Penggilas Roda Besi 6 - 9 Ton', 'Jam', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('9.1.(14)', 'Penggilas Bervibrasi  5 - 8  Ton', 'Jam', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('9.1.(15)', 'Pemadat Bervibrasi 1.5 - 3.0 PK', 'Jam', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('9.1.(16)', 'Penggilas Roda Karet 8 - 10 Ton', 'Jam', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('9.1.(17)', 'Kompresor 4000 - 6500 Ltr/mnt', 'Jam', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('9.1.(18)', 'Beton Pengaduk (Molen) 0.3 - 0.6 M3', 'Jam', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('9.1.(19)', 'Pompa Air 70 - 100 mm', 'Jam', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('9.1.(2)', 'Pekerja Biasa', 'Jam', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('9.1.(20)', 'Jack Hammer', 'Jam', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('9.1.(3)', 'Tukang Kayu, Tukang Batu, dsb', 'Jam', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('9.1.(4a)', 'Dump Truck,  3-4 m³', 'Jam', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('9.1.(4b)', 'Dump Truck 6 - 8 m³', 'Jam', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('9.1.(5a)', 'Truk Bak Datar 3 - 4 m³', 'Jam', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('9.1.(5b)', 'Truk Bak Datar 6 - 8 m³', 'Jam', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('9.1.(6)', 'Truk Tangki 3000 - 4500 Liter', 'Jam', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('9.1.(7)', 'Bulldozer 100 - 150 PK Motor', 'Jam', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('9.1.(8)', 'Grader Min.100 PK Loader', 'Jam', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('9.1.(9)', 'Loader Roda Karet 1.0 - 1.6 M3', 'Jam', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('SKH 7.11 (3)', 'Formed Plastic Sheet, t = 10 mm', 'm²', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('SKH 7.17 (1)', 'Shotcrete Struktur', 'M2', '', '');
INSERT INTO `master_jenis_pekerjaan` VALUES ('SKH 7.2 (8.b)', 'Penegangan dan Pemasangan Unit Pracetak Gelegar Tipe I , L = 50 m t = 2,1 m', 'buah', '', '');

-- ----------------------------
-- Table structure for master_kondisi_jalan
-- ----------------------------
DROP TABLE IF EXISTS `master_kondisi_jalan`;
CREATE TABLE `master_kondisi_jalan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `ruas_jalan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nama_kota` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `km_asal` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `panjang_km` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `dari_km` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sampai_km` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `lebar_rata_rata` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jenis_permukaan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `koordinat_jalan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kondisi` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sb_lokasi` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sb_panjang` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `b_lokasi` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `b_panjang` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jlk_lokasi` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jlk__panjang` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `parah_lokasi` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `parah_panjang` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sp_lokasi` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sp_panjang` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `hancur_lokasi` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `hancur_panjang` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `keterangan` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of master_kondisi_jalan
-- ----------------------------

-- ----------------------------
-- Table structure for master_konsultan
-- ----------------------------
DROP TABLE IF EXISTS `master_konsultan`;
CREATE TABLE `master_konsultan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `alamat` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nama_direktur` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `se` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ie` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tgl_update` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of master_konsultan
-- ----------------------------
INSERT INTO `master_konsultan` VALUES (1, 'PT. SECON DWITUNGGAL PUTRA KSO PT.NUANSA GALAXY', 'Jalan Desa No.26c Kiaracondong Bandung', '22', '22', '222', '15 June 2020, 23:36');
INSERT INTO `master_konsultan` VALUES (2, 'PT. WIN SOLUTION KONSUTAN, PT. GARIS PUTIH SEJAJAR, PT. EZZY ANUGRAH KSO', '-', '-', '-', '-', '');
INSERT INTO `master_konsultan` VALUES (4, 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'JAKARTA', 'ISNAINI SYAWIK, ST', 'BAMBANG ISWAHYUDI', 'PRADHANA', '2 July 2020, 10:07');
INSERT INTO `master_konsultan` VALUES (5, 'PT. SEECONS , PT. PURI DIMENSI', 'Komplek Muara Sari, Jl. Muara Sari III No. 10 Bandung, Jl. Gading Utama A III No. 3 Bandung', 'Pandu Arryoko Sumadyo. SE.MBA, Ir. Sutrisno', 'Dicky Lazuardy', 'Dicky Lazuardy', '28 August 2020');

-- ----------------------------
-- Table structure for master_laporan_harian
-- ----------------------------
DROP TABLE IF EXISTS `master_laporan_harian`;
CREATE TABLE `master_laporan_harian`  (
  `no_trans` int NOT NULL AUTO_INCREMENT,
  `real_date` timestamp NOT NULL DEFAULT current_timestamp,
  `user` int NOT NULL,
  `kegiatan` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `unor` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ruas_jalan` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `segmen_jalan` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ket` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `gambar` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `no_request` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tgl_input` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tgl_update` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kontraktor` int NOT NULL,
  `konsultan` int NOT NULL,
  `ppk` int NOT NULL,
  `gk1` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `gk2` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `gp1` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nama_kontraktor` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nama_ppk` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nama_konsultan` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `aksi1` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `aksi2` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `aksi3` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `catatan_ppk` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `catatan_konsultan` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tolak` int NOT NULL,
  `foto_konsultan` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `foto_ppk` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `volume` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `satuan` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nmp` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`no_trans`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 112 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of master_laporan_harian
-- ----------------------------
INSERT INTO `master_laporan_harian` VALUES (1, '2020-07-29 02:27:55', 22, '1 Km Pelebaran Jalan Menuju BIJB Tahap 2', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - VI', 'Kadipaten - Bts. Mjlk/Indramayu', '2020-07-24', 'KM CN 62+600', '', '', '290720201627551.JPG', '2', '29 July 2020, 16:27', '', 0, 1, 1, '<a href=\"#\"><span class=\"glyphicon glyphicon-ok-circle\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"glyphicon glyphicon-ok-circle\" style=\"color:green;font-size:18px\"  title=\"Sudah di Setujui\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"glyphicon glyphicon-ok-circle\" style=\"color:green;font-size:18px\"  title=\"Sudah di Setujui\">&nbsp;</span></a>', 'PT. BERKAH BUMI CIHERANG', 'Prasetio Wibowo, ST. MT', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', '', '', '', 0, '2.JPG', '3.JPG', '500.00', 'M3', '2.1.(1)');
INSERT INTO `master_laporan_harian` VALUES (2, '2020-08-14 00:32:35', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-14', 'Km.Bdg 49+177', '', '', '14082020143235G1111.jpg', '4', '14 August 2020, 14:32', '14 August 2020, 15:07', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '13.00', 'M3', '7.1 (7).a');
INSERT INTO `master_laporan_harian` VALUES (3, '2020-08-25 00:30:26', 36, '1 KM PENINGKATAN JALAN RUAS JALAN SUKABUMI (BAROS) - SAGARANTEN (3,10 KM)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - II', 'Sukabumi (Baros)- Sagaranten', '2020-08-17', 'Km.Bdg. 118+275 s.d Km.Bdg. 118+315', '', '', '25082020143026typical tpt.jpg', '01', '25 August 2020, 14:30', '', 0, 0, 0, '', '', '', 'PT .BINA INFRA', 'Rachmat Rustandi, ST', 'PT. SEECONS , PT. PURI DIMENSI', '', 'disabled', 'disabled', '', '', 0, '', '', '98.00', 'm3', '3.1.(3)');
INSERT INTO `master_laporan_harian` VALUES (4, '2020-08-25 01:02:14', 36, '1 KM PENINGKATAN JALAN RUAS JALAN SUKABUMI (BAROS) - SAGARANTEN (3,10 KM)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - II', 'Sukabumi (Baros)- Sagaranten', '2020-11-02', 'Km.Bdg. 108+484 s.d Km.Bdg. 109+609', '', '', '25082020150214typical ac-wc.jpg', '6', '25 August 2020, 15:02', '', 1, 1, 1, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Sudah di Setujui\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Sudah di Setujui\">&nbsp;</span></a>', 'PT .BINA INFRA', 'Rachmat Rustandi, ST', 'PT. SEECONS , PT. PURI DIMENSI', '', 'disabled', '', 'Ok', 'ok', 0, 'IMG_20200811_150619.jpg', 'STA 0 + 000 c.JPG', '1539.00', 'ton', '6.3.(5a)');
INSERT INTO `master_laporan_harian` VALUES (5, '2020-08-27 20:13:03', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-08-24', '1+175 s/d 1+148 Km.Bdg', '', '', '28082020101303detail-1.jpg', '25', '28 August 2020, 10:13', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '17.00', 'M3', '7.15.(1)');
INSERT INTO `master_laporan_harian` VALUES (6, '2020-08-27 20:18:41', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-08-24', '1+175 s/d 1+148', '', '', '28082020101841detail-1.jpg', '26', '28 August 2020, 10:18', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '3.50', 'M3', '7.15.(2)');
INSERT INTO `master_laporan_harian` VALUES (7, '2020-08-27 20:23:06', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-08-24', '1+175 s/d 1+148', '', '', '28082020102306', '27', '28 August 2020, 10:23', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '20.50', 'M3', '7.15.(9)');
INSERT INTO `master_laporan_harian` VALUES (8, '2020-08-27 20:26:43', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-08-24', '1+175 s/d 1+148', '', '', '28082020102643', '28', '28 August 2020, 10:26', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '1.00', 'Ls', 'SKH.1.19');
INSERT INTO `master_laporan_harian` VALUES (9, '2020-08-27 20:38:31', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-08-25', '1+148 s/d 1+125', '', '', '28082020103831', '29', '28 August 2020, 10:38', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '0.00', 'Ls', 'SKH.1.19');
INSERT INTO `master_laporan_harian` VALUES (10, '2020-08-27 20:50:33', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-08-25', '1+148 s/d 1+125 Km.BDG', '', '', '28082020105033detail-1.jpg', '30', '28 August 2020, 10:50', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '15.64', 'M3', '7.15.(1)');
INSERT INTO `master_laporan_harian` VALUES (11, '2020-08-27 20:55:35', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-08-25', '1+148 s/d 1+125 Km.Bdg', '', '', '28082020105535detail-1.jpg', '31', '28 August 2020, 10:55', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '3.22', 'M3', '7.15.(2)');
INSERT INTO `master_laporan_harian` VALUES (12, '2020-08-27 21:02:52', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-08-25', '1+148 s/d 1+125', '', '', '28082020110252', '32', '28 August 2020, 11:02', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '20.90', 'M3', '7.15.(9)');
INSERT INTO `master_laporan_harian` VALUES (13, '2020-08-30 00:41:25', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-08-29', '1+100 s/d 1+060 Km.Bdg', '', '', '30082020144125', '37', '30 August 2020, 14:41', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '1.00', 'Ls', 'SKH.1.19');
INSERT INTO `master_laporan_harian` VALUES (14, '2020-08-30 00:49:56', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', '0', '2020-08-29', '1+100 s/d 1+060 Km.Bdg', '', '', '30082020144956detail-1.jpg', '38', '30 August 2020, 14:49', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '17.00', 'M3', '7.15.(1)');
INSERT INTO `master_laporan_harian` VALUES (15, '2020-08-30 00:55:13', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', '0', '2020-08-29', '1+100 s/d 1+060 Km.Bdg', '', '', '30082020145513detail-1.jpg', '39', '30 August 2020, 14:55', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '3.50', 'M3', '7.15.(2)');
INSERT INTO `master_laporan_harian` VALUES (16, '2020-08-30 01:03:37', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-08-29', '1+100 s/d 1+060 Km.Bdg', '', '', '30082020150337', '40', '30 August 2020, 15:03', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '20.50', 'M3', '7.15.(9)');
INSERT INTO `master_laporan_harian` VALUES (17, '2020-09-06 19:51:59', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-08-30', '1+000 s/d 0+875 Km.Bdg', '', '', '07092020095159', '52', '7 September 2020, 9:51', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '1.00', 'Ls', 'SKH.1.19');
INSERT INTO `master_laporan_harian` VALUES (18, '2020-09-06 19:56:08', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-08-30', '1+000 s/d 0+875 Km.Bdg', '', '', '07092020095608detail-1.jpg', '53', '7 September 2020, 9:56', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '85.00', 'M3', '7.15.(1)');
INSERT INTO `master_laporan_harian` VALUES (19, '2020-09-06 20:00:49', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-08-30', '1+000 s/d 0+875 Km.Bdg', '', '', '07092020100049detail-1.jpg', '54', '7 September 2020, 10:00', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '17.50', 'M3', '7.15.(2)');
INSERT INTO `master_laporan_harian` VALUES (20, '2020-09-06 20:04:12', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-08-30', '1+000 s/d 0+875', '', '', '07092020100412detail-1.jpg', '55', '7 September 2020, 10:04', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '102.50', 'M3', '7.15.(9)');
INSERT INTO `master_laporan_harian` VALUES (21, '2020-09-06 20:09:39', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-08-31', '0+875 s/d 0+660 Km.Bdg', '', '', '07092020100939', '56', '7 September 2020, 10:09', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '1.00', 'Ls', 'SKH.1.19');
INSERT INTO `master_laporan_harian` VALUES (22, '2020-09-06 20:15:06', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-08-31', '0+875 s/d 0+660 Km.Bdg ', '', '', '07092020101506detail-1.jpg', '57', '7 September 2020, 10:15', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '146.20', 'M3', '7.15.(1)');
INSERT INTO `master_laporan_harian` VALUES (23, '2020-09-06 20:18:52', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-08-31', '0+875 s/d 0+660 Km.Bdg', '', '', '07092020101852detail-1.jpg', '58', '7 September 2020, 10:18', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '30.10', 'M3', '7.15.(2)');
INSERT INTO `master_laporan_harian` VALUES (24, '2020-09-06 20:22:39', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-08-31', '0+875 s/d 0+660 Km.Bdg', '', '', '07092020102239', '59', '7 September 2020, 10:22', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '176.30', 'M3', '7.15.(9)');
INSERT INTO `master_laporan_harian` VALUES (25, '2020-09-06 20:32:14', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-01', '0+660 s/d 0+480 Km.Bdg', '', '', '07092020103214', '60', '7 September 2020, 10:32', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '1.00', 'Ls', 'SKH.1.19');
INSERT INTO `master_laporan_harian` VALUES (26, '2020-09-06 20:37:11', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-01', '0+660 s/d 0+480 Km.Bdg', '', '', '07092020103711detail-1.jpg', '61', '7 September 2020, 10:37', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '122.40', 'M3', '7.15.(1)');
INSERT INTO `master_laporan_harian` VALUES (27, '2020-09-06 20:41:13', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-01', '0+660 s/d 0+480 Km.Bdg', '', '', '07092020104113detail-1.jpg', '62', '7 September 2020, 10:41', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '25.20', 'M3', '7.15.(2)');
INSERT INTO `master_laporan_harian` VALUES (28, '2020-09-06 20:47:11', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-01', '0+660 s/d 0+480 Km.Bdg', '', '', '07092020104711', '63', '7 September 2020, 10:47', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '147.60', 'M3', '7.15.(9)');
INSERT INTO `master_laporan_harian` VALUES (29, '2020-09-06 20:54:59', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-02', '0+480 s/d 0+240 Km.bdg', '', '', '07092020105459', '64', '7 September 2020, 10:54', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '1.00', 'Ls', 'SKH.1.19');
INSERT INTO `master_laporan_harian` VALUES (30, '2020-09-06 20:59:30', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-02', '0+480 s/d 0+240 Km.Bdg', '', '', '07092020105930detail-1.jpg', '65', '7 September 2020, 10:59', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '163.20', 'M3', '7.15.(1)');
INSERT INTO `master_laporan_harian` VALUES (31, '2020-09-06 21:05:12', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', '0', '2020-09-02', '0+480 s/d 0+240 Km.Bdg', '', '', '07092020110512detail-1.jpg', '66', '7 September 2020, 11:05', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '33.60', 'M3', '7.15.(2)');
INSERT INTO `master_laporan_harian` VALUES (32, '2020-09-06 21:30:05', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-02', '0+480 s/d 0+240 Km.Bdg', '', '', '07092020113005', '67', '7 September 2020, 11:30', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '196.80', 'M3', '7.15.(9)');
INSERT INTO `master_laporan_harian` VALUES (33, '2020-09-06 21:55:18', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', '0', '2020-09-03', '0+240 s/d 0+022 Km.Bdg', '', '', '07092020115518', '68', '7 September 2020, 11:55', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '1.00', 'Ls', 'SKH.1.19');
INSERT INTO `master_laporan_harian` VALUES (34, '2020-09-06 22:03:53', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-03', '0+240 s/d 0+022 Km.Bdg', '', '', '07092020120353detail-1.jpg', '69', '7 September 2020, 12:03', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '148.24', 'M3', '7.15.(1)');
INSERT INTO `master_laporan_harian` VALUES (35, '2020-09-06 22:12:53', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-03', '0+240 s/d 0+022 Km.Bdg', '', '', '07092020121253detail-1.jpg', '70', '7 September 2020, 12:12', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '30.52', 'M3', '7.15.(2)');
INSERT INTO `master_laporan_harian` VALUES (36, '2020-09-06 22:26:04', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-03', '0+240 s/d 0+022 Km.Bdg', '', '', '07092020122604', '71', '7 September 2020, 12:26', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '178.76', 'M3', '7.15.(9)');
INSERT INTO `master_laporan_harian` VALUES (37, '2020-09-07 03:11:03', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-04', '1+173 s/d 1+120 Km.Bdg', '', '', '07092020171103', '73', '7 September 2020, 17:11', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '1.00', 'Ls', 'SKH.1.19');
INSERT INTO `master_laporan_harian` VALUES (38, '2020-09-07 03:21:12', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-04', '1+173 s/d 1+120 Km.Bdg', '', '', '07092020172112123-1.jpg', '72', '7 September 2020, 17:21', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '7.95', 'M3', '7.1 (10)');
INSERT INTO `master_laporan_harian` VALUES (39, '2020-09-08 21:33:57', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-04', '1+173 s/d 1+120 Km.Bdg', '', '', '09092020113357123-1.jpg', '74', '9 September 2020, 11:33', '9 September 2020, 11:44', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '7.95', 'M3', '7.1 (10)');
INSERT INTO `master_laporan_harian` VALUES (40, '2020-09-13 21:27:00', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-06', '1+173 s/d 1+149..5 Km.Bdg', '', '', '14092020112700TYPEE3-1.jpg', '75', '14 September 2020, 11:27', '14 September 2020, 11:42', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '298064.00', 'KG', '7.3 (1)');
INSERT INTO `master_laporan_harian` VALUES (41, '2020-09-13 21:35:35', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-07', '1+149.5 s/d 1+137.5 Km.Bdg', '', '', '14092020113535TYPEE3-1.jpg', '75', '14 September 2020, 11:35', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '298064.00', 'KG', '7.3 (1)');
INSERT INTO `master_laporan_harian` VALUES (42, '2020-09-13 21:42:18', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-06', '1+173 s/d 1+149.5 Km.Bdg', '', '', '14092020114218', '76', '14 September 2020, 11:42', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '1.00', 'Ls', 'SKH.1.19');
INSERT INTO `master_laporan_harian` VALUES (43, '2020-09-13 21:48:32', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-07', '1+149.5 s/d 1+137.5 Km.Bdg', '', '', '14092020114832', '76', '14 September 2020, 11:48', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '1.00', 'Ls', 'SKH.1.19');
INSERT INTO `master_laporan_harian` VALUES (44, '2020-09-13 21:58:14', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-08', '1+137.5 s/d 1+120 Km.Bdg', '', '', '14092020115814TYPEE3-1.jpg', '75', '14 September 2020, 11:58', '14 September 2020, 12:03', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '298064.00', 'KG', '7.3 (1)');
INSERT INTO `master_laporan_harian` VALUES (45, '2020-09-13 22:02:55', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-08', '1+137.5 s/d 1+120 Km.Bdg', '', '', '14092020120255', '76', '14 September 2020, 12:02', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '1.00', 'Ls', 'SKH.1.19');
INSERT INTO `master_laporan_harian` VALUES (46, '2020-09-13 22:39:10', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-09', '1+173 s/d 1+155 Km.Bdg', '', '', '14092020123910TYPEE3-1.jpg', '75', '14 September 2020, 12:39', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '298064.00', 'KG', '7.3 (1)');
INSERT INTO `master_laporan_harian` VALUES (47, '2020-09-13 22:46:06', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-09', '1+173 s/d 1+155 Km.Bdg', '', '', '14092020124606', '76', '14 September 2020, 12:46', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '1.00', 'Ls', 'SKH.1.19');
INSERT INTO `master_laporan_harian` VALUES (48, '2020-09-13 22:50:45', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-10', '1+155 s/d 1+137 Km.Bdg', '', '', '14092020125045', '76', '14 September 2020, 12:50', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '1.00', 'Ls', 'SKH.1.19');
INSERT INTO `master_laporan_harian` VALUES (49, '2020-09-13 22:57:35', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-10', '1+155 s/d 1+137 Km.Bdg', '', '', '14092020125735TYPEE3-1.jpg', '75', '14 September 2020, 12:57', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '298064.00', 'KG', '7.3 (1)');
INSERT INTO `master_laporan_harian` VALUES (50, '2020-09-13 23:03:48', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-10', '1+137 s/d 1+120 Km.Bdg', '', '', '14092020130348', '76', '14 September 2020, 13:03', '14 September 2020, 13:33', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '1.00', 'Ls', 'SKH.1.19');
INSERT INTO `master_laporan_harian` VALUES (51, '2020-09-13 23:08:25', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-10', '1+137 s/d 1+120 Km.Bdg', '', '', '14092020130825TYPEE3-1.jpg', '75', '14 September 2020, 13:08', '14 September 2020, 15:27', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '298064.00', 'KG', '7.3 (1)');
INSERT INTO `master_laporan_harian` VALUES (52, '2020-09-13 23:48:04', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-11', '1+137 s/d 1+120 Km.Bdg', '', '', '14092020134804', '76', '14 September 2020, 13:48', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '1.00', 'Ls', 'SKH.1.19');
INSERT INTO `master_laporan_harian` VALUES (53, '2020-09-14 01:24:59', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-11', '1+137 s/d 1+120 Km.Bdg', '', '', '14092020152459U 24 polos.jpg', '75', '14 September 2020, 15:24', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '298064.00', 'KG', '7.3 (1)');
INSERT INTO `master_laporan_harian` VALUES (54, '2020-09-14 01:49:45', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-11', '1+120 s/d 1+068 Km.Bdg', '', '', '14092020154945', '78', '14 September 2020, 15:49', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '1.00', 'Ls', 'SKH.1.19');
INSERT INTO `master_laporan_harian` VALUES (55, '2020-09-14 01:58:39', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-11', '1+120 s/d 1+068', '', '', '14092020155839FC 10.jpg', '77', '14 September 2020, 15:58', '', 1, 0, 0, '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', 'disabled', '', '', '', '', 0, '', '', '5.00', 'M3', '7.1 (10)');
INSERT INTO `master_laporan_harian` VALUES (56, '2020-09-19 22:25:07', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-12', '1+173 s/d 1+153 Km.Bdg', '', '', '20092020122507', '79', '20 September 2020, 12:25', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '1.00', 'Ls', 'SKH.1.19');
INSERT INTO `master_laporan_harian` VALUES (57, '2020-09-19 22:48:22', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-12', '1+173 s/d 1+153 Km.Bdg', '', '', '20092020124822FC 20.jpg', '80', '20 September 2020, 12:48', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '50.00', 'M3', '7.1 (7).a');
INSERT INTO `master_laporan_harian` VALUES (58, '2020-09-19 23:19:56', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-13', '1+153 s/d 1+128 Km.Bdg', '', '', '20092020131956', '79', '20 September 2020, 13:19', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '1.00', 'Ls', 'SKH.1.19');
INSERT INTO `master_laporan_harian` VALUES (59, '2020-09-19 23:29:05', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-13', '1+153 s/d 1+128 Km.Bdg', '', '', '20092020132905FC 20.jpg', '80', '20 September 2020, 13:29', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '50.00', 'M3', '7.1 (7).a');
INSERT INTO `master_laporan_harian` VALUES (60, '2020-09-20 00:14:45', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-14', '1+128 s/d 1+102 Km.Bdg', '', '', '20092020141445', '79', '20 September 2020, 14:14', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '1.00', 'Ls', 'SKH.1.19');
INSERT INTO `master_laporan_harian` VALUES (61, '2020-09-20 00:23:38', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-14', '1+128 s/d 1+102 Km.Bdg', '', '', '20092020142338FC 20.jpg', '80', '20 September 2020, 14:23', '20 September 2020, 15:05', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '50.00', 'M3', '7.1 (7).a');
INSERT INTO `master_laporan_harian` VALUES (62, '2020-09-20 01:31:51', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-14', '1+173 s/d 1+154 Km.Bdg', '', '', '20092020153151FC 20.jpg', '80', '20 September 2020, 15:31', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '50.00', 'M3', '7.1 (7).a');
INSERT INTO `master_laporan_harian` VALUES (63, '2020-09-20 02:23:06', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-15', '1+102 s/d 1+085 Km.Bdg', '', '', '20092020162306FC 20.jpg', '80', '20 September 2020, 16:23', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '50.00', 'M3', '7.1 (7).a');
INSERT INTO `master_laporan_harian` VALUES (64, '2020-09-20 02:29:20', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-15', '1+102 s/d 1+085 Km.Bdg', '', '', '20092020162920', '79', '20 September 2020, 16:29', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '1.00', 'Ls', 'SKH.1.19');
INSERT INTO `master_laporan_harian` VALUES (65, '2020-09-20 03:02:07', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-12', '1+120 s/d 1+068 Km.Bdg', '', '', '20092020170207U 24 polos.jpg', '82', '20 September 2020, 17:02', '20 September 2020, 17:03', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '22038.00', 'KG', '7.3 (1)');
INSERT INTO `master_laporan_harian` VALUES (66, '2020-09-20 09:31:01', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-15', '1+010 s/d 0+985 Km.Bdg', '', '', '20092020233101FC 10.jpg', '81', '20 September 2020, 23:31', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '50.00', 'M3', '7.1 (10)');
INSERT INTO `master_laporan_harian` VALUES (67, '2020-09-20 09:53:10', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-15', '0+345 s/d 0+567 Km.Bdg', '', '', '20092020235310detail-1.jpg', '83', '20 September 2020, 23:53', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '129.68', 'M3', '7.15.(2)');
INSERT INTO `master_laporan_harian` VALUES (68, '2020-09-20 10:19:38', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-16', '1+102 s/d 1+060 Km.Bdg', '', '', '21092020001938FC 20.jpg', '80', '21 September 2020, 0:19', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '50.00', 'M3', '7.1 (7).a');
INSERT INTO `master_laporan_harian` VALUES (69, '2020-09-20 10:25:13', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-16', '1+102 s/d 1+060 Km.Bdg', '', '', '21092020002513', '79', '21 September 2020, 0:25', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '1.00', 'Ls', 'SKH.1.19');
INSERT INTO `master_laporan_harian` VALUES (70, '2020-09-20 10:37:50', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-16', '0+567 s/d 0+789 Km.Bdg', '', '', '21092020003750detail-1.jpg', '83', '21 September 2020, 0:37', '21 September 2020, 0:44', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '129.68', 'M3', '7.15.(2)');
INSERT INTO `master_laporan_harian` VALUES (71, '2020-09-23 19:43:01', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-17', '1+154 s/d 1+120 Km.Bdg', '', '', '24092020094301FC 20.jpg', '80', '24 September 2020, 9:43', '24 September 2020, 12:13', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '50.00', 'M3', '7.1 (7).a');
INSERT INTO `master_laporan_harian` VALUES (72, '2020-09-23 19:51:37', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-17', '0+789 s/d 1+010 Km.Bdg', '', '', '24092020095137detail-1.jpg', '83', '24 September 2020, 9:51', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '129.68', 'M3', '7.15.(2)');
INSERT INTO `master_laporan_harian` VALUES (73, '2020-09-23 19:57:23', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-17', '0+789 s/d 1+010 Km.Bdg', '', '', '24092020095723', '79', '24 September 2020, 9:57', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '1.00', 'Ls', 'SKH.1.19');
INSERT INTO `master_laporan_harian` VALUES (74, '2020-09-24 00:19:48', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-18', '0+735 s/d 0+695 Km.Bdg', '', '', '24092020141948FC 10.jpg', '81', '24 September 2020, 14:19', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '50.00', 'M3', '7.1 (10)');
INSERT INTO `master_laporan_harian` VALUES (75, '2020-09-24 00:23:44', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-18', '0+735 s/d 0+695 Km.Bdg', '', '', '24092020142344', '84', '24 September 2020, 14:23', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '1.00', 'Ls', 'SKH.1.19');
INSERT INTO `master_laporan_harian` VALUES (76, '2020-09-24 00:42:23', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-19', '0+735 s/d 0+695 Km.Bdg', '', '', '24092020144223FC 10.jpg', '81', '24 September 2020, 14:42', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '50.00', 'M3', '7.1 (10)');
INSERT INTO `master_laporan_harian` VALUES (77, '2020-09-24 00:47:46', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-19', '1+125 s/d 1+105 Km.Bdg', '', '', '24092020144746FC 20.jpg', '85', '24 September 2020, 14:47', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '50.00', 'M3', '7.1 (7).a');
INSERT INTO `master_laporan_harian` VALUES (78, '2020-09-24 00:54:02', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-19', '1+120 s/d 1+105 Km.Bdg', '', '', '24092020145402FC 20.jpg', '85', '24 September 2020, 14:54', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '50.00', 'M3', '7.1 (7).a');
INSERT INTO `master_laporan_harian` VALUES (79, '2020-09-24 01:01:11', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-19', '1+120 s/d 1+105 Km.Bdg', '', '', '24092020150111', '84', '24 September 2020, 15:01', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '1.00', 'Ls', 'SKH.1.19');
INSERT INTO `master_laporan_harian` VALUES (80, '2020-09-24 01:06:38', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-20', '1+105 s/d 0+430 Km.Bdg', '', '', '24092020150638', '84', '24 September 2020, 15:06', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '1.00', 'Ls', 'SKH.1.19');
INSERT INTO `master_laporan_harian` VALUES (81, '2020-09-24 01:12:04', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-20', '1+105 s/d 1+085 Km.Bdg', '', '', '24092020151204FC 20.jpg', '85', '24 September 2020, 15:12', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '50.00', 'M3', '7.1 (7).a');
INSERT INTO `master_laporan_harian` VALUES (82, '2020-09-24 01:19:14', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-20', '0+660 s/d 0+575 Km.Bdg', '', '', '24092020151914FC 10.jpg', '81', '24 September 2020, 15:19', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '50.00', 'M3', '7.1 (10)');
INSERT INTO `master_laporan_harian` VALUES (83, '2020-09-24 01:19:14', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-20', '0+430 s/d 0+475 Km.Bdg', '', '', '24092020151914FC 10.jpg', '81', '24 September 2020, 15:19', '24 September 2020, 15:21', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '50.00', 'M3', '7.1 (10)');
INSERT INTO `master_laporan_harian` VALUES (84, '2020-09-24 01:34:22', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-21', '1+085 s/d 1+079 Km.Bdg', '', '', '24092020153422', '84', '24 September 2020, 15:34', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '1.00', 'Ls', 'SKH.1.19');
INSERT INTO `master_laporan_harian` VALUES (85, '2020-09-24 01:40:30', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-21', '1+085 s/d 1+079 Km.Bdg', '', '', '24092020154030FC 20.jpg', '85', '24 September 2020, 15:40', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '50.00', 'M3', '7.1 (7).a');
INSERT INTO `master_laporan_harian` VALUES (86, '2020-09-25 04:54:20', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-22', '1+010 s/d 0+375 Km.Bdg', '', '', '25092020185420', '84', '25 September 2020, 18:54', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '1.00', 'Ls', 'SKH.1.19');
INSERT INTO `master_laporan_harian` VALUES (87, '2020-09-25 05:00:44', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-22', '0+645 s/d 0+660 Km.Bdg', '', '', '25092020190044U 24 polos.jpg', '86', '25 September 2020, 19:00', '25 September 2020, 19:01', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '20000.00', 'KG', '7.3 (1)');
INSERT INTO `master_laporan_harian` VALUES (88, '2020-09-25 05:06:54', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-22', '0+410 s/d 0+375 Km.Bdg', '', '', '25092020190654FC 10.jpg', '81', '25 September 2020, 19:06', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '50.00', 'M3', '7.1 (10)');
INSERT INTO `master_laporan_harian` VALUES (89, '2020-09-25 05:10:14', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-22', '0+685 s/d 0+675 Km.Bdg', '', '', '25092020191014FC 10.jpg', '81', '25 September 2020, 19:10', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '50.00', 'M3', '7.1 (10)');
INSERT INTO `master_laporan_harian` VALUES (90, '2020-09-25 06:09:56', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-22', '1+085 s/d 1+070 Km.Bdg', '', '', '25092020200956FC 20.jpg', '85', '25 September 2020, 20:09', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '50.00', 'M3', '7.1 (7).a');
INSERT INTO `master_laporan_harian` VALUES (91, '2020-09-25 06:22:35', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-22', '1+153 s/d 1+167 Km.Bdg', '', '', '25092020202235penutup-1.jpg', '86', '25 September 2020, 20:22', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '20000.00', 'KG', '7.3 (1)');
INSERT INTO `master_laporan_harian` VALUES (92, '2020-09-25 06:28:17', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-23', '1+173 s/d 0+650  Km.Bdg', '', '', '25092020202817', '84', '25 September 2020, 20:28', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '1.00', 'Ls', 'SKH.1.19');
INSERT INTO `master_laporan_harian` VALUES (93, '2020-09-25 06:32:31', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-23', '1+085 s/d 1+060 Km.Bdg', '', '', '25092020203231FC 20.jpg', '85', '25 September 2020, 20:32', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '50.00', 'M3', '7.1 (7).a');
INSERT INTO `master_laporan_harian` VALUES (94, '2020-09-25 06:36:21', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-23', '1+015 s/d 1+000 Km.Bdg', '', '', '25092020203621U 24 polos.jpg', '86', '25 September 2020, 20:36', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '20000.00', 'KG', '7.3 (1)');
INSERT INTO `master_laporan_harian` VALUES (95, '2020-09-25 06:41:30', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-23', '1+015 s/d 1+000 Km.Bdg', '', '', '25092020204130FC 20.jpg', '85', '25 September 2020, 20:41', '25 September 2020, 20:53', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '50.00', 'M3', '7.1 (7).a');
INSERT INTO `master_laporan_harian` VALUES (96, '2020-09-25 06:45:19', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-23', '0+735 s/d 0+720 Km.Bdg', '', '', '25092020204519FC 20.jpg', '85', '25 September 2020, 20:45', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '50.00', 'M3', '7.1 (7).a');
INSERT INTO `master_laporan_harian` VALUES (97, '2020-09-25 06:53:11', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-23', '1+010 s/d 1+000 Km.Bdg', '', '', '25092020205311FC 10.jpg', '81', '25 September 2020, 20:53', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '50.00', 'M3', '7.1 (10)');
INSERT INTO `master_laporan_harian` VALUES (98, '2020-09-25 06:57:16', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-23', '0+665 s/d 0+650 Km.Bdg', '', '', '25092020205716FC 10.jpg', '81', '25 September 2020, 20:57', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '50.00', 'M3', '7.1 (10)');
INSERT INTO `master_laporan_harian` VALUES (99, '2020-09-25 07:04:07', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-23', '1+167 s/d 1+160 KM.Bdg ', '', '', '25092020210407penutup-1.jpg', '85', '25 September 2020, 21:04', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '50.00', 'M3', '7.1 (7).a');
INSERT INTO `master_laporan_harian` VALUES (100, '2020-09-25 07:08:54', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-23', '1+157 s/d 1+150 Km.Bdg', '', '', '25092020210854penutup-1.jpg', '85', '25 September 2020, 21:08', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '50.00', 'M3', '7.1 (7).a');
INSERT INTO `master_laporan_harian` VALUES (101, '2020-09-25 07:14:01', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-24', '1+133 s/d 1+123 Km.Bdg', '', '', '25092020211401penutup-1.jpg', '85', '25 September 2020, 21:14', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '50.00', 'M3', '7.1 (7).a');
INSERT INTO `master_laporan_harian` VALUES (102, '2020-09-25 07:19:08', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-24', '1+133 s/d 0+575 Km.Bdg', '', '', '25092020211908penutup-1.jpg', '84', '25 September 2020, 21:19', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '1.00', 'Ls', 'SKH.1.19');
INSERT INTO `master_laporan_harian` VALUES (103, '2020-09-25 07:26:42', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-23', '1+133 s/d 1+123 Km.Bdg', '', '', '25092020212642penutup-1.jpg', '86', '25 September 2020, 21:26', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '20000.00', 'KG', '7.3 (1)');
INSERT INTO `master_laporan_harian` VALUES (104, '2020-09-25 07:32:19', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-24', '1+120 s/d 1+110 Km.Bdg', '', '', '25092020213219penutup-1.jpg', '86', '25 September 2020, 21:32', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '20000.00', 'KG', '7.3 (1)');
INSERT INTO `master_laporan_harian` VALUES (105, '2020-09-25 07:40:32', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-24', '0+720 s/d 0+650 Km.Bdg', '', '', '25092020214032FC 20.jpg', '85', '25 September 2020, 21:40', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '50.00', 'M3', '7.1 (7).a');
INSERT INTO `master_laporan_harian` VALUES (106, '2020-09-25 07:44:49', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-24', '0+375 s/d 0+329 Km.Bdg', '', '', '25092020214449FC 10.jpg', '81', '25 September 2020, 21:44', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '50.00', 'M3', '7.1 (10)');
INSERT INTO `master_laporan_harian` VALUES (107, '2020-09-25 07:51:21', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-24', '0+635 s/d 0+575 Km.Bdg', '', '', '25092020215121FC 20.jpg', '85', '25 September 2020, 21:51', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '50.00', 'M3', '7.1 (7).a');
INSERT INTO `master_laporan_harian` VALUES (108, '2020-09-25 07:55:22', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-25', '1+010 s/d 0+750 Km.Bdg', '', '', '25092020215522', '84', '25 September 2020, 21:55', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '1.00', 'Ls', 'SKH.1.19');
INSERT INTO `master_laporan_harian` VALUES (109, '2020-09-25 07:58:52', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-25', '1+010 s/d 1+120 Km.Bdg', '', '', '25092020215852penutup-1.jpg', '85', '25 September 2020, 21:58', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '50.00', 'M3', '7.1 (7).a');
INSERT INTO `master_laporan_harian` VALUES (110, '2020-09-25 08:03:46', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-25', '1+015 s/d 1+000 Km.Bdg', '', '', '25092020220346FC 20.jpg', '85', '25 September 2020, 22:03', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '50.00', 'M3', '7.1 (7).a');
INSERT INTO `master_laporan_harian` VALUES (111, '2020-09-25 08:07:12', 32, '1M PEKERJAAN PEMBUATAN SALURAN RUAS JALAN BTS.BANDUNG/GARUT-GARUT KM.BDG.48+600 (2000M)', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', ' BTS. BANDUNG/GARUT - GARUT  ', '2020-09-25', '0+750 s/d 0+784 Km.Bdg', '', '', '25092020220712FC 10.jpg', '81', '25 September 2020, 22:07', '', 0, 0, 0, '', '', '', 'CV. AREMCO', 'Rossa Ruhtipa Memet,ST', 'PT WINSOLUSI KONSULTAN, PT GARIS PUTIH SEJAJAR, PT ANUGRAH EZZY PERKASA (KSO)', '', 'disabled', 'disabled', '', '', 0, '', '', '50.00', 'M3', '7.1 (10)');

-- ----------------------------
-- Table structure for master_penyedia_jasa
-- ----------------------------
DROP TABLE IF EXISTS `master_penyedia_jasa`;
CREATE TABLE `master_penyedia_jasa`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `alamat` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nama_direktur` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nama_gs` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `npwp` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `telp` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `bank` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `no_rek` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tgl_update` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 35 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of master_penyedia_jasa
-- ----------------------------
INSERT INTO `master_penyedia_jasa` VALUES (1, 'LIKATAMA - MANGGALA KSO.', 'JL. TULIP RAYA No. 26, KOMPLEK SURAPATI CORE, KOTA BANDUNG 40192', 'Drs. IKA RAHMAT KOMARA', 'MARYANTO, ST.', '21.070.826.9-423.000', '022 - 87242662', 'BANK BJB CABANG CIMAHI', '0102774574001', '28 August 2020');
INSERT INTO `master_penyedia_jasa` VALUES (2, 'LIKATAMA - MANGGALA KSO.', 'JL. TULIP RAYA No. 26, KOMPLEK SURAPATI CORE, KOTA BANDUNG 40192', 'Drs. IKA RAHMAT KOMARA', 'MARYANTO, ST.', '21.070.826.9-423.000', '022 - 87242662', 'BANK BJB CABANG CIMAHI', '0102774574001', '28 August 2020');
INSERT INTO `master_penyedia_jasa` VALUES (3, 'CV. ALAM MEKAR', 'Jl. Jend. A. Yani No. 111 Desa Pagaden Kec. Pagaden Kabupaten Subang', 'Bambang Arief Tantriadi', 'Dedi Librianto, ST', '012423919439000', '08127740128', 'Bank BJB Cabang Subang', '0080010009921', '');
INSERT INTO `master_penyedia_jasa` VALUES (4, 'PT. SARANA SEJA IBADAH KSO PT. GURKY PUTERA MANDIRI', 'Jln. Saturnus Ujung VI No. 4', 'Drs. Asep Gumelar, ST. MM', 'Dody Sugiantara, ST', '494818966408000', '081222397920', 'BANK JABAR BANTEN', '0058632961002', '14 August 2020');
INSERT INTO `master_penyedia_jasa` VALUES (5, 'PT. AMBER HASYA', 'Jl. Sarijadi Raya No.111 Kota Bandung', 'BAMBANG NURMUHAMAD ISYA HADI', 'Ranto Sandwiadji, ST', '01.836.844.9-428.000', '022 2010307', 'BANK NEGARA INDONESIA (PERSERO) TBK', '0706240271', '25 July 2020, 13:18');
INSERT INTO `master_penyedia_jasa` VALUES (6, 'PT. BERKAH BUMI CIHERANG', 'Kp. Jalancagak Ds. Jalancagak Kec. Jalancagak Kab. Subang', 'H. HERDIS SUDANA', 'Ir. Denny Risana', '31.357.924.5-439.000', '(0260) 411242', 'BJB Cabang Subang', '0056418350001', '');
INSERT INTO `master_penyedia_jasa` VALUES (8, 'PT .BINA INFRA', '-', '-', '', '-', '-', '-', '-', '');
INSERT INTO `master_penyedia_jasa` VALUES (9, 'PT. SEECONS , PT. PURI DIMENSI', '-', '-', '', '-', '-', '-', '-', '25 August 2020');
INSERT INTO `master_penyedia_jasa` VALUES (11, 'PT. SEECONS', 'KOmplek Muara Sari, Jl. Muara Sari III No. 10 Bandung', 'Pandu Arryoko Sumadyo. SE.MBA', '', '011278041441000', '022-5211106', 'BJB Cabang Utama Bandung', '0001614886001', '');
INSERT INTO `master_penyedia_jasa` VALUES (12, 'PT. PURI DIMENSI', 'Jl. Gading Utama A III No.3 Bandung', 'Ir. Sutrisno', '', '018227900429000', '022-7319822', 'BJB Cabang Utama Bandung', '0010010228534', '');
INSERT INTO `master_penyedia_jasa` VALUES (13, 'PT .BINA INFRA', 'Jl. Cemerlang Cijambe Pakusan No. 45 Kel.Sukakarya Kec. Warungdoyong Sukabumi', 'Andi Budian Jayamanggala', '', '020387205405', '-', 'Bank Mandiri ( Persero ) Tbk. Cabang Sukabumi', '1320014999826', '');

-- ----------------------------
-- Table structure for master_ppk
-- ----------------------------
DROP TABLE IF EXISTS `master_ppk`;
CREATE TABLE `master_ppk`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `alamat` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tgl_update` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 105 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of master_ppk
-- ----------------------------
INSERT INTO `master_ppk` VALUES (1, 'Maman Firmansyah, ST', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WIL. PELAYANAN I, Jalan Raya Ciranjang, Km.52.000 (Bdg) - Cianjur (43282)', '28 August 2020');
INSERT INTO `master_ppk` VALUES (2, 'Ayi Gunari Arifin, ST. M.Si', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WIL. PELAYANAN I, Jalan Raya Ciranjang, Km.52.000 (Bdg) - Cianjur (43282)', '19 May 2020, 11:30');
INSERT INTO `master_ppk` VALUES (3, 'Rachmat Rustandi, ST', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WIL. PELAYANAN II, Jalan Bhayangkara No.209 - Sukabumi (43114)', '19 May 2020, 12:57');
INSERT INTO `master_ppk` VALUES (4, 'Dola Adrena Iskandar, ST, M.Si', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WIL. PELAYANAN II, Jalan Bhayangkara No.209 - Sukabumi (43114)', '19 May 2020, 13:00');
INSERT INTO `master_ppk` VALUES (5, 'Eris Kusdhianto, ST', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WIL. PELAYANAN III, Jalan. Soekarno-Hatta No. 609 Bandung (40286)', '19 May 2020, 11:03');
INSERT INTO `master_ppk` VALUES (6, 'Emon Taryaman, ST, SE, M.Si', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WIL. PELAYANAN III, Jalan. Soekarno-Hatta No. 609 Bandung (40286)', '26 June 2020, 14:53');
INSERT INTO `master_ppk` VALUES (7, 'Rossa Ruhtipa Memet, ST', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WIL. PELAYANAN IV, Jalan Raya Paseh No. 140 - 142 Km.Bdg 55+900 Paseh Sumedang (45381)ng (40286)', '18 August 2020');
INSERT INTO `master_ppk` VALUES (8, 'Deni Junjunan, ST', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WIL. PELAYANAN IV, Jalan Raya Paseh No. 140 - 142 Km.Bdg 55+900 Paseh Sumedang (45381)ng (40286)', '19 May 2020, 11:12');
INSERT INTO `master_ppk` VALUES (9, 'Didi, ST', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WIL. PELAYANAN V, Jalan Raya Ciamis, Km.Bdg 108.600 Karangresik - Ciamis (46286) ', '19 May 2020, 11:18');
INSERT INTO `master_ppk` VALUES (10, 'Sonhaji, ST', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WIL. PELAYANAN V, Jalan Raya Ciamis, Km.Bdg 108.600 Karangresik - Ciamis (46286)', '19 May 2020, 11:24');
INSERT INTO `master_ppk` VALUES (11, 'Prasetio Wibowo, ST. MT', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WIL. PELAYANAN VI, Jalan P. Cakrabuana No. 102 Sumber - Cirebon (321005)', '19 May 2020, 12:42');
INSERT INTO `master_ppk` VALUES (12, 'Herry Hermawan, ST. MT', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WIL. PELAYANAN VI, Jalan P. Cakrabuana No. 102 Sumber - Cirebon (321005)', '19 May 2020, 12:46');

-- ----------------------------
-- Table structure for master_ruas_jalan
-- ----------------------------
DROP TABLE IF EXISTS `master_ruas_jalan`;
CREATE TABLE `master_ruas_jalan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_ruas_jalan` char(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_ruas_jalan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sup` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lokasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `panjang` int NULL DEFAULT NULL,
  `sta_awal` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sta_akhir` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lat_awal` double(53, 17) NULL DEFAULT NULL,
  `long_awal` double(53, 17) NULL DEFAULT NULL,
  `lat_akhir` double(53, 17) NULL DEFAULT NULL,
  `long_akhir` double(53, 17) NULL DEFAULT NULL,
  `L` double(53, 17) NULL DEFAULT NULL,
  `kab_kota` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kd_sppjj` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nm_sppjj` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lat_ctr` double(53, 17) NULL DEFAULT NULL,
  `long_ctr` double(53, 17) NULL DEFAULT NULL,
  `wil_uptd` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `uptd_id` int NULL DEFAULT NULL,
  `created_date` datetime NULL DEFAULT NULL,
  `created_by` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_date` datetime NULL DEFAULT NULL,
  `updated_by` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_ruas_jalan`(`id_ruas_jalan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 308 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of master_ruas_jalan
-- ----------------------------
INSERT INTO `master_ruas_jalan` VALUES (1, '345000', 'Garut - Bts. Garut/Tasikmalaya', NULL, NULL, 13350, '66280.0', '79630.0', -7.23698000000000000, 107.90745600000000000, -7.33096300000000000, 107.94587100000000000, NULL, 'Kabupaten Garut', '4_1', 'SPP GARUT 1', -7.28653600000000000, 107.92037600000000000, 'UPTD IV Sumedang', 4, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (3, '285000', 'Wado (Sp. Kirisik) - Bts. Sumedang/Majalengka (Kirisik)', NULL, NULL, 11310, '75607.0', '86917.0', -6.94517700000000000, 108.09266500000000000, -6.97058500000000000, 108.17122900000000000, NULL, 'Kabupaten Sumedang', '4_6', 'SPP SUMEDANG 2', -6.94949000000000000, 108.13757700000000000, 'UPTD IV Sumedang', 4, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (4, '345000', 'Garut - Bts. Garut/Tasikmalaya', NULL, NULL, 13350, '66280.0', '79630.0', -7.23698000000000000, 107.90745600000000000, -7.33096300000000000, 107.94587100000000000, NULL, 'Kabupaten Garut', '4_1', 'SPP GARUT 1', -7.28653600000000000, 107.92037600000000000, 'UPTD IV Sumedang', 4, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (5, '28811K', 'Jl. Cipeucang (Talaga)', NULL, NULL, 550, '76440.0', '76990.0', -6.98279900000000000, 108.31109900000000000, -6.98611300000000000, 108.31255000000000000, NULL, 'Kabupaten Majalengka', '6_4', 'SPP MAJALENGKA 2', -6.98507200000000000, 108.31101900000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (6, '285000', 'Wado (Sp. Kirisik) - Bts. Sumedang/Majalengka (Kirisik)', NULL, NULL, 11310, '75607.0', '86917.0', -6.94517700000000000, 108.09266500000000000, -6.97058500000000000, 108.17122900000000000, NULL, 'Kabupaten Sumedang', '4_6', 'SPP SUMEDANG 2', -6.94949000000000000, 108.13757700000000000, 'UPTD IV Sumedang', 4, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (7, '09713K', 'Jl. Siliwangi (Bekasi)', NULL, NULL, 11100, '36582.0', '47682.0', -6.25941500000000000, 106.99506900000000000, -6.35283400000000000, 106.97623800000000000, NULL, 'Kota Bekasi', '1_5', 'SPP BEKASI', -6.30646300000000000, 106.98356100000000000, 'UPTD I Cianjur', 1, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (8, '25913K', 'Jl. Kapten Tendean (Subang)', NULL, NULL, 1830, '145875.0', '147705.0', -6.55032100000000000, 107.73941000000000000, -6.55210500000000000, 107.75363000000000000, NULL, 'Kabupaten Subang', '3_5', 'SPP KAB SUBANG 2', -6.55388200000000000, 107.74658900000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (9, '37800K', 'Jl. Ahmad Yani (Sp. Laswi - Sp. Supratman) Kota Bandung', NULL, NULL, 535, '0.0', '535.0', -6.91573900000000000, 107.63008600000000000, -6.91336000000000000, 107.63426700000000000, NULL, 'Kota Bandung', '3_1', 'SPP KOTA BANDUNG', -6.91460100000000000, 107.63220600000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (10, '401000', 'Sp.3 Panenjoan - Sawahbera (Sp.3 Cijapati)', NULL, NULL, 5230, '33000.0', '38230.0', -7.01426100000000000, 107.80283100000000000, -6.97951800000000000, 107.83370400000000000, NULL, 'Kabupaten Bandung', '3_2', 'SPP KAB BANDUNG', -6.99715300000000000, 107.81909500000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:09', NULL);
INSERT INTO `master_ruas_jalan` VALUES (11, '19115K', 'Jl. Raya Sagaranten (Sagaranten)', NULL, NULL, 540, '148000.0', '148540.0', -7.21467900000000000, 106.88396400000000000, -7.21893700000000000, 106.88553600000000000, NULL, 'Kabupaten Sukabumi', '2_3', 'SPP SUKABUMI 3', -7.21699400000000000, 106.88438200000000000, 'UPTD II Sukabumi', 2, NULL, NULL, '2021-03-22 16:10:09', NULL);
INSERT INTO `master_ruas_jalan` VALUES (12, '37700K', 'Jl. Laswi (Bandung)', NULL, NULL, 1171, '2000.0', '3171.0', -6.91573900000000000, 107.63008600000000000, -6.92454300000000000, 107.62778100000000000, NULL, 'Kota Bandung', '3_1', 'SPP KOTA BANDUNG', -6.92070400000000000, 107.63095200000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:09', NULL);
INSERT INTO `master_ruas_jalan` VALUES (13, '17011K', 'Jl. Gatot Subroto (Cimahi)', NULL, NULL, 2220, '9590.0', '11810.0', -6.87603300000000000, 107.54608000000000000, -6.89248300000000000, 107.53673600000000000, NULL, 'Kota Cimahi', '3_3', 'SPP KAB CIMAHI', -6.88373900000000000, 107.54022000000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (14, '288000', 'Talaga - Cikijing', NULL, NULL, 5770, '76990.0', '82760.0', -6.98611300000000000, 108.31255000000000000, -7.01125300000000000, 108.35360400000000000, NULL, 'Kabupaten Majalengka', '6_4', 'SPP MAJALENGKA 2', -7.00267500000000000, 108.32956900000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:09', NULL);
INSERT INTO `master_ruas_jalan` VALUES (15, '352000', 'Cikajang - Pameungpeuk', NULL, NULL, 55320, '91420.0', '146740.0', -7.36846000000000000, 107.81515200000000000, -7.63960700000000000, 107.73464200000000000, NULL, 'Kabupaten Garut', '4_2', 'SPP GARUT 2', -7.50816500000000000, 107.82470600000000000, 'UPTD IV Sumedang', 4, NULL, NULL, '2021-03-22 16:10:09', NULL);
INSERT INTO `master_ruas_jalan` VALUES (16, '258000', 'Sadang - Bts. Purwakarta/Subang', NULL, NULL, 12240, '107900.0', '120140.0', -6.50870500000000000, 107.46067600000000000, -6.50122700000000000, 107.56009600000000000, NULL, 'Kabupaten Purwakarta', '3_6', 'SPP KAB PURWAKARTA', -6.49639400000000000, 107.50716200000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (17, '163000', 'Pangalengan - Cukul (Bts. Bandung/Garut)', NULL, NULL, 14830, '40470.0', '55300.0', -7.17724100000000000, 107.56907600000000000, -7.25142500000000000, 107.53451300000000000, NULL, 'Kabupaten Bandung', '3_2', 'SPP KAB BANDUNG', -7.21172500000000000, 107.54170400000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (18, '257000', 'Jl. Cagak - Bts. Subang/Sumedang (Cikaramas)', NULL, NULL, 22510, '166320.0', '188830.0', -6.67842800000000000, 107.68902100000000000, -6.76613000000000000, 107.83752700000000000, NULL, 'Kabupaten Subang', '3_4', 'SPP KAB SUBANG 1', -6.72106600000000000, 107.76986100000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (19, '162000', 'Banjaran - Pangalengan', NULL, NULL, 20390, '19560.0', '39950.0', -7.05328700000000000, 107.57311000000000000, -7.17623700000000000, 107.57123600000000000, NULL, 'Kabupaten Bandung', '3_2', 'SPP KAB BANDUNG', -7.13097600000000000, 107.56000600000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (20, '19211K', 'Jl. Gudang (Sagaranten)', NULL, NULL, 560, '148550.0', '149110.0', -7.21893700000000000, 106.88553600000000000, -7.21914000000000000, 106.88050700000000000, NULL, 'Kabupaten Sukabumi', '2_3', 'SPP SUKABUMI 3', -7.21913900000000000, 106.88302500000000000, 'UPTD II Sukabumi', 2, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (21, '250010', 'Lembang - Maribaya', NULL, NULL, 5750, '16600.0', '22350.0', -6.81447700000000000, 107.62295900000000000, -6.82986300000000000, 107.65789800000000000, NULL, 'Kabupaten Bandung Barat', '3_3', 'SPP KAB CIMAHI', -6.82464000000000000, 107.64053400000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (22, '171000', 'Nanjung - Patrol', NULL, NULL, 5610, '15000.0', '20610.0', -6.91777900000000000, 107.53750300000000000, -6.95259900000000000, 107.52359400000000000, NULL, 'Kabupaten Bandung', '3_2', 'SPP KAB BANDUNG', -6.94090500000000000, 107.53779000000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (23, '20412K', 'Jl. Lawang Gintung (Bogor)', NULL, NULL, 1004, '63101.0', '64105.0', -6.61879600000000000, 106.80686500000000000, -6.62010900000000000, 106.81456700000000000, NULL, 'Kota Bogor', '1_3', 'SPP BOGOR I', -6.62445200000000000, 106.81004400000000000, 'UPTD I Cianjur', 1, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (24, '26112K', 'Jl. Mesjid Agung (Subang)', NULL, NULL, 430, '176990.0', '177420.0', -6.56884500000000000, 107.76215200000000000, -6.57227800000000000, 107.76033800000000000, NULL, 'Kabupaten Subang', '3_4', 'SPP KAB SUBANG 1', -6.57057800000000000, 107.76123500000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (25, '347000', 'Singaparna - Tasikmalaya', NULL, NULL, 8690, '106940.0', '115630.0', -7.34527100000000000, 108.12800500000000000, -7.34317500000000000, 108.19697800000000000, NULL, 'Kabupaten Tasikmalaya', '5_1', 'SPP TASIKMALAYA 1', -7.34211100000000000, 108.16022700000000000, 'UPTD V Tasikmalaya', 5, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (26, '31012K', 'Jl. Merdeka Barat (Ciledug) (Jl. Jend. Suprapto)', NULL, NULL, 940, '69022.0', '69962.0', -6.90673900000000000, 108.73986900000000000, -6.90620800000000000, 108.74808100000000000, NULL, 'Kabupaten Cirebon', '6_5', 'SPP CIREBON', -6.90643100000000000, 108.74414200000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (27, '21014K', 'Jl. Kebon Pedes (Bogor)', NULL, NULL, 987, '54750.0', '55737.0', -6.56164000000000000, 106.80199000000000000, -6.56973500000000000, 106.79901300000000000, NULL, 'Kota Bogor', '1_3', 'SPP BOGOR I', -6.56597300000000000, 106.80144400000000000, 'UPTD I Cianjur', 1, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (28, '37100K', 'Jl. Pajajaran (Sp. Pasirkaliki - Sp. Cicendo) Kota Bandung', NULL, NULL, 650, '2925.0', '3575.0', -6.90649200000000000, 107.59750900000000000, -6.90716100000000000, 107.60442400000000000, NULL, 'Kota Bandung', '3_1', 'SPP KOTA BANDUNG', -6.90694200000000000, 107.60095400000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (29, '192000', 'Sagaranten - Tegalbuleud', NULL, NULL, 42440, '149112.0', '191552.0', -7.21914000000000000, 106.88050700000000000, -7.41833100000000000, 106.78287800000000000, NULL, 'Kabupaten Sukabumi', '2_3', 'SPP SUKABUMI 3', -7.33118700000000000, 106.83407000000000000, 'UPTD II Sukabumi', 2, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (30, '164010', 'Cukul (Bts. Bandung/Garut) - Sp. Genteng', NULL, NULL, 2950, '55250.0', '58200.0', -7.25142500000000000, 107.53451300000000000, -7.27194700000000000, 107.53773000000000000, NULL, 'Kabupaten Garut', '4_4', 'SPP GARUT 4', -7.26167200000000000, 107.53521900000000000, 'UPTD IV Sumedang', 4, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (31, '281000', 'Sumedang - Situraja', NULL, NULL, 11370, '47300.0', '58670.0', -6.84605100000000000, 107.93977700000000000, -6.83874700000000000, 108.01659100000000000, NULL, 'Kabupaten Sumedang', '4_6', 'SPP SUMEDANG 2', -6.84592900000000000, 107.98401400000000000, 'UPTD IV Sumedang', 4, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (32, '34513K', 'Jl. Jend. Sudirman (Garut)', NULL, NULL, 5580, '61190.0', '66770.0', -7.19249100000000000, 107.90414600000000000, -7.22714200000000000, 107.91124600000000000, NULL, 'Kabupaten Garut', '4_1', 'SPP GARUT 1', -7.20932500000000000, 107.91746600000000000, 'UPTD IV Sumedang', 4, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (33, '25311K', 'Jl. Basuki Rahmat (Purwakarta)', NULL, NULL, 710, '114360.0', '115070.0', -6.56075700000000000, 107.44397200000000000, -6.56279600000000000, 107.45008500000000000, NULL, 'Kabupaten Purwakarta', '3_6', 'SPP KAB PURWAKARTA', -6.56180100000000000, 107.44702100000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (34, '25312K', 'Jl. Kapten Halim (Purwakarta)', NULL, NULL, 1350, '115070.0', '116420.0', -6.56279600000000000, 107.45008500000000000, -6.56820900000000000, 107.45944200000000000, NULL, 'Kabupaten Purwakarta', '3_6', 'SPP KAB PURWAKARTA', -6.56661900000000000, 107.45446700000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:03', NULL);
INSERT INTO `master_ruas_jalan` VALUES (35, '10611K', 'Jl. Kopo (Sp. Jl. Peta - Bts. Kota/Kab. Bandung)', NULL, NULL, 3120, '3240.0', '6360.0', -6.93703000000000000, 107.59504000000000000, -6.96054400000000000, 107.57956200000000000, NULL, 'Kota Bandung', '3_1', 'SPP KOTA BANDUNG', -6.94891600000000000, 107.58750000000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:03', NULL);
INSERT INTO `master_ruas_jalan` VALUES (36, '311000', 'Ciledug - Losari (Jl. Let. Jen. D.I Panjaitan)', NULL, NULL, 10970, '70922.0', '81892.0', -6.89826500000000000, 108.75013500000000000, -6.84365100000000000, 108.80881500000000000, NULL, 'Kabupaten Cirebon', '6_5', 'SPP CIREBON', -6.87507600000000000, 108.78162900000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:03', NULL);
INSERT INTO `master_ruas_jalan` VALUES (37, '19117K', 'Jl. Sarasa (Sukabumi)', NULL, NULL, 2113, '93110.0', '95223.0', -6.93790700000000000, 106.95375500000000000, -6.95134700000000000, 106.94704400000000000, NULL, 'Kota Sukabumi', '2_1', 'SPP SUKABUMI 1', -6.94564500000000000, 106.95171500000000000, 'UPTD II Sukabumi', 2, NULL, NULL, '2021-03-22 16:10:04', NULL);
INSERT INTO `master_ruas_jalan` VALUES (38, '26511K', 'Jl. Kapten Hanafiah (Subang)', NULL, NULL, 1090, '175353.0', '176443.0', -6.55919000000000000, 107.77094300000000000, -6.56009400000000000, 107.78649200000000000, NULL, 'Kabupaten Subang', '3_4', 'SPP KAB SUBANG 1', -6.55999600000000000, 107.77864800000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:04', NULL);
INSERT INTO `master_ruas_jalan` VALUES (39, '251000', 'Lembang - Bts. Kab. Bandung/ Kab. Subang', NULL, NULL, 8850, '16630.0', '25480.0', -6.81447700000000000, 107.62295900000000000, -6.77388600000000000, 107.63620800000000000, NULL, 'Kabupaten Bandung Barat', '3_3', 'SPP KAB CIMAHI', -6.80324800000000000, 107.64979500000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:04', NULL);
INSERT INTO `master_ruas_jalan` VALUES (40, '37300K', 'Jl. Terusan Pasir Koja (Sp. Jamika - Sp. Soekarno-Hatta) Kota Bandung', NULL, NULL, 1120, '8200.0', '9320.0', -6.93046000000000000, 107.57601300000000000, -6.92675300000000000, 107.58559900000000000, NULL, 'Kota Bandung', '3_1', 'SPP KOTA BANDUNG', -6.92858800000000000, 107.58079700000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:04', NULL);
INSERT INTO `master_ruas_jalan` VALUES (41, '31013K', 'Jl. Merdeka Utara (Ciledug) (Jl. Ki Bledug Jaya)', NULL, NULL, 960, '69962.0', '70922.0', -6.90620800000000000, 108.74808100000000000, -6.89826500000000000, 108.75013500000000000, NULL, 'Kabupaten Cirebon', '6_5', 'SPP CIREBON', -6.90219900000000000, 108.74889700000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:04', NULL);
INSERT INTO `master_ruas_jalan` VALUES (42, '31011K', 'Jl. Siliwangi (Ciledug) (Jl. P. Walang Sungsang)', NULL, NULL, 3300, '65722.0', '69022.0', -6.91543200000000000, 108.71544700000000000, -6.90673900000000000, 108.73986900000000000, NULL, 'Kabupaten Cirebon', '6_5', 'SPP CIREBON', -6.91399800000000000, 108.73002900000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:04', NULL);
INSERT INTO `master_ruas_jalan` VALUES (43, '398010', 'Cikadu - Kebon Muncang - Bts. Kab. Bandung/Cianjur', NULL, NULL, 26050, '58770.0', '84820.0', -7.23795500000000000, 107.35164900000000000, -7.32442900000000000, 107.25446400000000000, NULL, 'Kabupaten Cianjur', '1_2', 'SPP CIANJUR II', -7.28459500000000000, 107.28448000000000000, 'UPTD I Cianjur', 1, NULL, NULL, '2021-03-22 16:10:04', NULL);
INSERT INTO `master_ruas_jalan` VALUES (44, '19114K', 'Jl. Raya Baros (Sukabumi)', NULL, NULL, 3680, '97284.0', '100964.0', -6.94662200000000000, 106.93473300000000000, -6.96918600000000000, 106.94864400000000000, NULL, 'Kota Sukabumi', '2_1', 'SPP SUKABUMI 1', -6.96246400000000000, 106.93509300000000000, 'UPTD II Sukabumi', 2, NULL, NULL, '2021-03-22 16:10:04', NULL);
INSERT INTO `master_ruas_jalan` VALUES (45, '404020', 'Warudoyong (Bts.Kab. Tasikmalaya/Ciamis) - Sp.3 Winduraja (Kawali)', NULL, NULL, 20500, '89675.0', '110175.0', -7.12526600000000000, 108.21761100000000000, -7.17767500000000000, 108.36410900000000000, NULL, 'Kabupaten Ciamis', '5_3', 'SPP CIAMIS-BANJAR-PANGANDARAN', -7.15299300000000000, 108.28766800000000000, 'UPTD V Tasikmalaya', 5, NULL, NULL, '2021-03-22 16:10:04', NULL);
INSERT INTO `master_ruas_jalan` VALUES (46, '17013K', 'Simpang Leuwigajah - Nanjung', NULL, NULL, 1770, '13230.0', '15000.0', -6.90346400000000000, 107.53504600000000000, -6.91777900000000000, 107.53750300000000000, NULL, 'Kota Cimahi', '3_3', 'SPP KAB CIMAHI', -6.90974800000000000, 107.53602700000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:05', NULL);
INSERT INTO `master_ruas_jalan` VALUES (47, '34512K', 'Jl. Merdeka (Garut)', NULL, NULL, 390, '60800.0', '61190.0', -7.19005800000000000, 107.90227100000000000, -7.19249100000000000, 107.90414600000000000, NULL, 'Kabupaten Garut', '4_1', 'SPP GARUT 1', -7.19094400000000000, 107.90339300000000000, 'UPTD IV Sumedang', 4, NULL, NULL, '2021-03-22 16:10:05', NULL);
INSERT INTO `master_ruas_jalan` VALUES (48, '38600K', 'Jl. Aria Jipang (Bandung)', NULL, NULL, 216, '0.0', '216.0', -6.90068100000000000, 107.61510000000000000, -6.89916600000000000, 107.61662400000000000, NULL, 'Kota Bandung', '3_1', 'SPP KOTA BANDUNG', -6.89986600000000000, 107.61580900000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:05', NULL);
INSERT INTO `master_ruas_jalan` VALUES (49, '283000', 'Sp. Kirisik (Wado) - Bts. Sumedang/Garut', NULL, NULL, 9540, '75900.0', '85440.0', -6.94517700000000000, 108.09266500000000000, -7.01346400000000000, 108.09888900000000000, NULL, 'Kabupaten Sumedang', '4_6', 'SPP SUMEDANG 2', -6.98200200000000000, 108.09532100000000000, 'UPTD IV Sumedang', 4, NULL, NULL, '2021-03-22 16:10:05', NULL);
INSERT INTO `master_ruas_jalan` VALUES (50, '234000', 'Selajambe - Cibogo - Cibeet', NULL, NULL, 28700, '53090.0', '81790.0', -6.80703400000000000, 107.23329400000000000, -6.64619300000000000, 107.16672200000000000, NULL, 'Kabupaten Cianjur', '1_1', 'SPP CIANJUR I', -6.71635200000000000, 107.20956000000000000, 'UPTD I Cianjur', 1, NULL, NULL, '2021-03-22 16:10:05', NULL);
INSERT INTO `master_ruas_jalan` VALUES (51, '33111K', 'Jl. Garuda (Tasikmalaya)', NULL, NULL, 5190, '109097.0', '114287.0', -7.33876800000000000, 108.24104200000000000, -7.35382500000000000, 108.28267600000000000, NULL, 'Kota Tasikmalaya', '5_1', 'SPP TASIKMALAYA 1', -7.35126300000000000, 108.25998800000000000, 'UPTD V Tasikmalaya', 5, NULL, NULL, '2021-03-22 16:10:05', NULL);
INSERT INTO `master_ruas_jalan` VALUES (52, '233000', 'Cileungsi - Cibeet', NULL, NULL, 44580, '53170.0', '97750.0', -6.40440400000000000, 106.96325500000000000, -6.64619300000000000, 107.16672200000000000, NULL, 'Kabupaten Bogor', '1_4', 'SPP BOGOR II', -6.48572700000000000, 107.10875200000000000, 'UPTD I Cianjur', 1, NULL, NULL, '2021-03-22 16:10:05', NULL);
INSERT INTO `master_ruas_jalan` VALUES (53, '301000', 'Parapatan - Leuwimunding', NULL, NULL, 5000, '25100.0', '30100.0', -6.70253400000000000, 108.36243800000000000, -6.74274800000000000, 108.34514600000000000, NULL, 'Kabupaten Majalengka', '6_3', 'SPP MAJALENGKA 1', -6.72190300000000000, 108.35329200000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:05', NULL);
INSERT INTO `master_ruas_jalan` VALUES (54, '16111K', 'Jl. Moh. Toha (Sp. Jl. BKR - Bts. Kota/Kab. Bandung)', NULL, NULL, 2740, '2450.0', '5190.0', -6.93742100000000000, 107.60623700000000000, -6.96102600000000000, 107.61367100000000000, NULL, 'Kota Bandung', '3_1', 'SPP KOTA BANDUNG', -6.94927900000000000, 107.60972100000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:05', NULL);
INSERT INTO `master_ruas_jalan` VALUES (55, '29411K', 'Jl. Siliwangi (Jatibarang)', NULL, NULL, 430, '49533.0', '49963.0', -6.47552900000000000, 108.30762300000000000, -6.47456900000000000, 108.30341700000000000, NULL, 'Kabupaten Indramayu', '6_1', 'SPP INDRAMAYU 1', -6.47469400000000000, 108.30569600000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:05', NULL);
INSERT INTO `master_ruas_jalan` VALUES (56, '341000', 'Jl. Gubernur Swaka (Tasikmalaya)', NULL, NULL, 3785, '107885.0', '111670.0', -7.34317500000000000, 108.19697800000000000, -7.36728800000000000, 108.21476800000000000, NULL, 'Kota Tasikmalaya', '5_1', 'SPP TASIKMALAYA 1', -7.35910000000000000, 108.20072300000000000, 'UPTD V Tasikmalaya', 5, NULL, NULL, '2021-03-22 16:10:05', NULL);
INSERT INTO `master_ruas_jalan` VALUES (57, '28912K', 'Jl. Raya Majalengka (Kadipaten )', NULL, NULL, 1430, '63015.0', '64445.0', -6.77819800000000000, 108.16991100000000000, -6.76544300000000000, 108.16815900000000000, NULL, 'Kabupaten Majalengka', '6_3', 'SPP MAJALENGKA 1', -6.77193500000000000, 108.16815100000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:05', NULL);
INSERT INTO `master_ruas_jalan` VALUES (58, '34311K', 'Jl. Perintis Kemerdekaan (Tasikmalaya)', NULL, NULL, 2090, '111050.0', '113140.0', -7.36728800000000000, 108.21476800000000000, -7.38374900000000000, 108.20712500000000000, NULL, 'Kota Tasikmalaya', '5_2', 'SPP TASIKMALAYA 2', -7.37573400000000000, 108.21132500000000000, 'UPTD V Tasikmalaya', 5, NULL, NULL, '2021-03-22 16:10:05', NULL);
INSERT INTO `master_ruas_jalan` VALUES (59, '164030', 'Sp. Talegong (Sukamulya) - Cisewu - Sukarame - Rancabuaya (Palembuhan)', NULL, NULL, 47200, '67260.0', '114460.0', -7.30581200000000000, 107.51526200000000000, -7.52792300000000000, 107.47818400000000000, NULL, 'Kabupaten Garut', '4_4', 'SPP GARUT 4', -7.39759600000000000, 107.52766400000000000, 'UPTD IV Sumedang', 4, NULL, NULL, '2021-03-22 16:10:05', NULL);
INSERT INTO `master_ruas_jalan` VALUES (60, '20414K', 'Jl. Empang - R. Saleh Sarief Bustaman (Bogor)', NULL, NULL, 250, '60357.0', '60607.0', -6.60453200000000000, 106.79682800000000000, -6.60774200000000000, 106.79506400000000000, NULL, 'Kota Bogor', '1_3', 'SPP BOGOR I', -6.60594400000000000, 106.79558800000000000, 'UPTD I Cianjur', 1, NULL, NULL, '2021-03-22 16:10:05', NULL);
INSERT INTO `master_ruas_jalan` VALUES (61, '314000', 'Luragung - Cibingbin', NULL, NULL, 15990, '51140.0', '67130.0', -7.01752900000000000, 108.63833600000000000, -7.05760400000000000, 108.75865500000000000, NULL, 'Kabupaten Kuningan', '5_4', 'SPP KUNINGAN 1', -7.03799600000000000, 108.70128900000000000, 'UPTD V Tasikmalaya', 5, NULL, NULL, '2021-03-22 16:10:05', NULL);
INSERT INTO `master_ruas_jalan` VALUES (62, '28711K', 'Jl. Kh. Abdul Halim (Majalengka)', NULL, NULL, 700, '51520.0', '52220.0', -6.83362700000000000, 108.24433000000000000, -6.83615700000000000, 108.25034900000000000, NULL, 'Kabupaten Majalengka', '6_3', 'SPP MAJALENGKA 1', -6.83489300000000000, 108.24733900000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:05', NULL);
INSERT INTO `master_ruas_jalan` VALUES (63, '240000', 'Rajamandala - Jbt. Citarum Lama', NULL, NULL, 2950, '36600.0', '39550.0', -6.83313300000000000, 107.34508400000000000, -6.84213200000000000, 107.32441700000000000, NULL, 'Kabupaten Bandung Barat', '3_3', 'SPP KAB CIMAHI', -6.83581600000000000, 107.33211200000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:05', NULL);
INSERT INTO `master_ruas_jalan` VALUES (64, '346010', 'Jl. Alternatif Kmp. Tenjowaringin (Salawu)', NULL, NULL, 40, '83000.0', '83040.0', -7.34395400000000000, 107.96422500000000000, -7.34397400000000000, 107.96469900000000000, NULL, 'Kabupaten Tasikmalaya', '5_1', 'SPP TASIKMALAYA 1', -7.34397900000000000, 107.96446100000000000, 'UPTD V Tasikmalaya', 5, NULL, NULL, '2021-03-22 16:10:05', NULL);
INSERT INTO `master_ruas_jalan` VALUES (65, '161000', 'Dayeuhkolot - Banjaran', NULL, NULL, 8330, '8710.0', '17040.0', -6.99137000000000000, 107.62635500000000000, -7.04620800000000000, 107.59268000000000000, NULL, 'Kabupaten Bandung', '3_2', 'SPP KAB BANDUNG', -7.01851200000000000, 107.60437300000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:05', NULL);
INSERT INTO `master_ruas_jalan` VALUES (66, '343000', 'Tasikmalaya - Karangnunggal', NULL, NULL, 41780, '113138.0', '154918.0', -7.38374900000000000, 108.20712500000000000, -7.63285800000000000, 108.12186000000000000, NULL, 'Kabupaten Tasikmalaya', '5_2', 'SPP TASIKMALAYA 2', -7.52255300000000000, 108.17476700000000000, 'UPTD V Tasikmalaya', 5, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (67, '26111K', 'Jl. S. Parman (Subang)', NULL, NULL, 200, '149598.0', '149798.0', -6.57155800000000000, 107.75883300000000000, -6.57227800000000000, 107.76033800000000000, NULL, 'Kabupaten Subang', '3_4', 'SPP KAB SUBANG 1', -6.57196300000000000, 107.75956300000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (68, '28611K', 'Jl. Jend. Sudirman (Talaga)', NULL, NULL, 690, '76727.0', '77417.0', -6.98279900000000000, 108.31109900000000000, -6.98261400000000000, 108.30590300000000000, NULL, 'Kabupaten Majalengka', '6_4', 'SPP MAJALENGKA 2', -6.98270700000000000, 108.30850100000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (69, '37600K', 'Jl. Pelajar Pejuang 45 (Bandung)', NULL, NULL, 1560, '3171.0', '4731.0', -6.92454300000000000, 107.62778100000000000, -6.93695900000000000, 107.62280700000000000, NULL, 'Kota Bandung', '3_1', 'SPP KOTA BANDUNG', -6.93120600000000000, 107.62609300000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (70, '36412K', 'Jl. Buah Batu (Sp.4 Pelajar Pejuang 45 - Sp.4 Soekarno Hatta)', NULL, NULL, 1700, '4690.0', '6390.0', -6.93695900000000000, 107.62280700000000000, -6.94799900000000000, 107.63342400000000000, NULL, 'Kota Bandung', '3_1', 'SPP KOTA BANDUNG', -6.94250900000000000, 107.62808400000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (71, '404010', 'Sp.3 Pamoyanan - Suryalaya - Warudoyong (Bts, Kab. Tasikmalaya/Ciamis)', NULL, NULL, 9500, '80175.0', '89675.0', -7.12501000000000000, 108.14558100000000000, -7.12526600000000000, 108.21761100000000000, NULL, 'Kabupaten Tasikmalaya', '5_2', 'SPP TASIKMALAYA 2', -7.11529600000000000, 108.18041100000000000, 'UPTD V Tasikmalaya', 5, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (72, '296000', 'Bts. Majalengka/Cirebon - Cigasong', NULL, NULL, 19530, '24072.0', '43602.0', -6.77819000000000000, 108.40028200000000000, -6.83615700000000000, 108.25034900000000000, NULL, 'Kabupaten Majalengka', '6_3', 'SPP MAJALENGKA 1', -6.79913600000000000, 108.32000600000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (73, '297000', 'Weru - Sumber/Jl. Fatahillah (Sumber)', NULL, NULL, 6350, '7883.0', '14233.0', -6.70558400000000000, 108.50746700000000000, -6.75878600000000000, 108.48767900000000000, NULL, 'Kabupaten Cirebon', '6_5', 'SPP CIREBON', -6.73232600000000000, 108.49768200000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (74, '19116K', 'Jl. Pembangunan (Sukabumi)', NULL, NULL, 2553, '90557.0', '93110.0', -6.91886900000000000, 106.95882200000000000, -6.93790700000000000, 106.95375500000000000, NULL, 'Kota Sukabumi', '2_1', 'SPP SUKABUMI 1', -6.92931800000000000, 106.95807100000000000, 'UPTD II Sukabumi', 2, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (75, '37500K', 'Jl. BKR (Bandung)', NULL, NULL, 2187, '4731.0', '6918.0', -6.93695900000000000, 107.62280700000000000, -6.93725200000000000, 107.60316300000000000, NULL, 'Kota Bandung', '3_1', 'SPP KOTA BANDUNG', -6.93779700000000000, 107.61310900000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (76, '38711K', 'Jl. Gasibu Barat (Bandung)', NULL, NULL, 205, '0.0', '205.0', -6.90131200000000000, 107.61810800000000000, -6.89936000000000000, 107.61806400000000000, NULL, 'Kota Bandung', '3_1', 'SPP KOTA BANDUNG', -6.90033500000000000, 107.61810400000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (77, '193120', 'Jl. Lingkar Sukabumi (Cibolang - Pelabuhan II)', NULL, NULL, 4500, '101950.0', '106450.0', -6.93156200000000000, 106.90127500000000000, -6.90573300000000000, 106.87241300000000000, NULL, 'Kabupaten Sukabumi', '2_1', 'SPP SUKABUMI 1', -6.91856700000000000, 106.88663300000000000, 'UPTD II Sukabumi', 2, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (78, '299010', 'Mandirancan - Pakembangan', NULL, NULL, 6600, '31750.0', '38350.0', -6.84152900000000000, 108.48591000000000000, -6.79678300000000000, 108.47578800000000000, NULL, 'Kabupaten Kuningan', '5_5', 'SPP KUNINGAN 2', -6.81547900000000000, 108.47210600000000000, 'UPTD V Tasikmalaya', 5, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (79, '34612K', 'Jl. Pasar (Singaparna)', NULL, NULL, 180, '104700.0', '104880.0', -7.35024500000000000, 108.11029300000000000, -7.34953800000000000, 108.11126600000000000, NULL, 'Kabupaten Tasikmalaya', '5_1', 'SPP TASIKMALAYA 1', -7.35018000000000000, 108.11099100000000000, 'UPTD V Tasikmalaya', 5, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (80, '19311K', 'Jl. Lingkar Sukabumi (Sukabumi)', NULL, NULL, 2200, '97350.0', '99550.0', -6.95003200000000000, 106.93420900000000000, -6.94769200000000000, 106.91621100000000000, NULL, 'Kota Sukabumi', '2_1', 'SPP SUKABUMI 1', -6.95139600000000000, 106.92485300000000000, 'UPTD II Sukabumi', 2, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (81, '346000', 'Bts. Garut/Tasikmalaya - Singaparna', NULL, NULL, 24610, '79704.0', '104314.0', -7.33096300000000000, 107.94587100000000000, -7.35026700000000000, 108.10674000000000000, NULL, 'Kabupaten Tasikmalaya', '5_1', 'SPP TASIKMALAYA 1', -7.36875900000000000, 108.02432900000000000, 'UPTD V Tasikmalaya', 5, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (82, '286000', 'Talaga - Bts. Majalengka/Sumedang (Kirisik)', NULL, NULL, 24060, '77417.0', '101477.0', -6.98261400000000000, 108.30590300000000000, -6.97058500000000000, 108.17122900000000000, NULL, 'Kabupaten Majalengka', '6_4', 'SPP MAJALENGKA 2', -6.95971100000000000, 108.23289200000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (83, '29211K', 'Jl. Jend. A. Yani (Jatibarang)', NULL, NULL, 230, '49963.0', '50193.0', -6.47456900000000000, 108.30341700000000000, -6.47259700000000000, 108.30279600000000000, NULL, 'Kabupaten Indramayu', '6_1', 'SPP INDRAMAYU 1', -6.47358400000000000, 108.30310400000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (84, '28111K', 'Jl. Prabu Taji Malela (Sumedang)', NULL, NULL, 1700, '46800.0', '48500.0', -6.83533700000000000, 107.93031800000000000, -6.84605100000000000, 107.93977700000000000, NULL, 'Kabupaten Sumedang', '4_6', 'SPP SUMEDANG 2', -6.84111900000000000, 107.93498000000000000, 'UPTD IV Sumedang', 4, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (85, '16113K', 'Jl. Raya Banjaran (Banjaran)', NULL, NULL, 2520, '17040.0', '19560.0', -7.04620800000000000, 107.59268000000000000, -7.05328700000000000, 107.57311000000000000, NULL, 'Kabupaten Bandung', '3_2', 'SPP KAB BANDUNG', -7.04761000000000000, 107.58270800000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (86, '395000', 'Rajamandala - Cipeundeuy - Cikalongwetan', NULL, NULL, 24800, '36240.0', '61040.0', -6.83289100000000000, 107.34788000000000000, -6.73492800000000000, 107.43808200000000000, NULL, 'Kabupaten Bandung Barat', '3_3', 'SPP KAB CIMAHI', -6.75198200000000000, 107.36169700000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (87, '26114K', 'Jl. Raya Sukamelang (Subang)', NULL, NULL, 1530, '172860.0', '174390.0', -6.53816200000000000, 107.78205700000000000, -6.55026400000000000, 107.77588500000000000, NULL, 'Kabupaten Subang', '3_5', 'SPP KAB SUBANG 2', -6.54395200000000000, 107.77837500000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (88, '16311K', 'Jl. Raya Cisewu (Pangalengan)', NULL, NULL, 520, '39950.0', '40470.0', -7.17623700000000000, 107.57123600000000000, -7.17724100000000000, 107.56907600000000000, NULL, 'Kabupaten Bandung', '3_2', 'SPP KAB BANDUNG', -7.17722100000000000, 107.57050100000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (89, '164020', 'Sp. Genteng - Sp. Talegong (Sukamulya)', NULL, NULL, 6960, '58200.0', '65160.0', -7.27194700000000000, 107.53773000000000000, -7.30581200000000000, 107.51526200000000000, NULL, 'Kabupaten Garut', '4_4', 'SPP GARUT 4', -7.28989100000000000, 107.52711600000000000, 'UPTD IV Sumedang', 4, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (90, '331000', 'Tasikmalaya - Manonjaya - Panaekan/Goler', NULL, NULL, 16630, '114287.0', '130917.0', -7.35382500000000000, 108.28267600000000000, -7.36973600000000000, 108.40710700000000000, NULL, 'Kabupaten Tasikmalaya', '5_2', 'SPP TASIKMALAYA 2', -7.35973100000000000, 108.34651600000000000, 'UPTD V Tasikmalaya', 5, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (91, '34515K', 'Jl. Ciledug (Garut)', NULL, NULL, 910, '65370.0', '66280.0', -7.22881200000000000, 107.90681700000000000, -7.23698000000000000, 107.90745600000000000, NULL, 'Kabupaten Garut', '4_1', 'SPP GARUT 1', -7.23288700000000000, 107.90693800000000000, 'UPTD IV Sumedang', 4, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (92, '193000', 'Sukabumi - Cikembar', NULL, NULL, 9720, '102716.0', '112436.0', -6.96526800000000000, 106.87484200000000000, -6.96231200000000000, 106.79655000000000000, NULL, 'Kabupaten Sukabumi', '2_2', 'SPP SUKABUMI 2', -6.97909700000000000, 106.83539500000000000, 'UPTD II Sukabumi', 2, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (93, '25313K', 'Jl. Wanayasa (Wanayasa)', NULL, NULL, 1510, '136590.0', '138100.0', -6.67837500000000000, 107.55553000000000000, -6.68162200000000000, 107.56610700000000000, NULL, 'Kabupaten Purwakarta', '3_6', 'SPP KAB PURWAKARTA', -6.68148500000000000, 107.55950100000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (94, '28112K', 'Jl. Raya Situraja (Situraja)', NULL, NULL, 1570, '58670.0', '60240.0', -6.83874700000000000, 108.01659100000000000, -6.84438500000000000, 108.02777800000000000, NULL, 'Kabupaten Sumedang', '4_6', 'SPP SUMEDANG 2', -6.84134700000000000, 108.02241000000000000, 'UPTD IV Sumedang', 4, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (95, '242000', 'Sp. Purwakarta - Jatiluhur', NULL, NULL, 6840, '115630.0', '122470.0', -6.56191300000000000, 107.43260100000000000, -6.52702800000000000, 107.39946600000000000, NULL, 'Kabupaten Purwakarta', '3_6', 'SPP KAB PURWAKARTA', -6.53835700000000000, 107.41950600000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (96, '36411K', 'Jl. Terusan Buah Batu (Sp.4 Soekarno Hatta - Bts. Kota/Kab. Bandung)', NULL, NULL, 2260, '6390.0', '8650.0', -6.94799900000000000, 107.63342400000000000, -6.96576700000000000, 107.63800600000000000, NULL, 'Kota Bandung', '3_1', 'SPP KOTA BANDUNG', -6.95585600000000000, 107.63930700000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (97, '292000', 'Pekandangan - Jatibarang', NULL, NULL, 11720, '50700.0', '62420.0', -6.46562000000000000, 108.29983200000000000, -6.36730600000000000, 108.32538100000000000, NULL, 'Kabupaten Indramayu', '6_1', 'SPP INDRAMAYU 1', -6.41196400000000000, 108.30103900000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (98, '230120', 'Mekarmukti - Lemahabang', NULL, NULL, 3800, '54850.0', '58650.0', -6.28944700000000000, 107.15262300000000000, -6.27028600000000000, 107.17909700000000000, NULL, 'Kabupaten Bekasi', '1_5', 'SPP BEKASI', -6.28005400000000000, 107.16605500000000000, 'UPTD I Cianjur', 1, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (99, '291000', 'Bts. Majalengka/Indramayu - Jatibarang', NULL, NULL, 17610, '72428.0', '90038.0', -6.62353000000000000, 108.27035900000000000, -6.48318500000000000, 108.29530600000000000, NULL, 'Kabupaten Indramayu', '6_1', 'SPP INDRAMAYU 1', -6.55804500000000000, 108.28137400000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (100, '274000', 'Cijelag - Bts. Sumedang/Indramayu', NULL, NULL, 20950, '74928.0', '95878.0', -6.76504900000000000, 108.12391800000000000, -6.64154600000000000, 108.03854300000000000, NULL, 'Kabupaten Sumedang', '4_5', 'SPP SUMEDANG 1', -6.70135900000000000, 108.09392300000000000, 'UPTD IV Sumedang', 4, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (101, '38200K', 'Jl. Cilamaya (Bandung)', NULL, NULL, 240, '0.0', '240.0', -6.90134500000000000, 107.61695000000000000, -6.90342100000000000, 107.61731900000000000, NULL, 'Kota Bandung', '3_1', 'SPP KOTA BANDUNG', -6.90244900000000000, 107.61696100000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (102, '312000', 'Ciledug - Bts. Jateng (Bantarsari) (Jl. Kapten P. Tendean)', NULL, NULL, 1210, '70922.0', '72132.0', -6.89826500000000000, 108.75013500000000000, -6.90443200000000000, 108.75850100000000000, NULL, 'Kabupaten Cirebon', '6_5', 'SPP CIREBON', -6.90051100000000000, 108.75487800000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (103, '394000', 'Patrol - Haurgeulis - Bantarwaru', NULL, NULL, 32080, '95050.0', '127130.0', -6.31391500000000000, 107.99092200000000000, -6.55993600000000000, 107.89606700000000000, NULL, 'Kabupaten Indramayu', '6_2', 'SPP INDRAMAYU 2', -6.43536200000000000, 107.94679100000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (104, '398020', 'Bts. Kab. Bandung/Cianjur - Pondok Datar', NULL, NULL, 900, '57900.0', '58800.0', -7.22654300000000000, 107.35401600000000000, -7.23795500000000000, 107.35164900000000000, NULL, 'Kabupaten Bandung', '3_2', 'SPP KAB BANDUNG', -7.23231300000000000, 107.35265900000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (105, '39000K', 'Jl. Sultan Agung (Sumber)', NULL, NULL, 1060, '11260.0', '12320.0', -6.75878600000000000, 108.48767900000000000, -6.75920900000000000, 108.47929000000000000, NULL, 'Kabupaten Cirebon', '6_5', 'SPP CIREBON', -6.75855000000000000, 108.48309200000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (106, '29213K', 'Jl. Ir. Sutami', NULL, NULL, 2100, '62420.0', '64520.0', -6.36730600000000000, 108.32538100000000000, -6.35274400000000000, 108.32420800000000000, NULL, 'Kabupaten Indramayu', '6_1', 'SPP INDRAMAYU 1', -6.36001600000000000, 108.32501700000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (107, '22411K', 'Jl. Ir. H. Juanda (Bekasi)', NULL, NULL, 1735, '31800.0', '33535.0', -6.23369000000000000, 106.99362400000000000, -6.24324900000000000, 107.00547800000000000, NULL, 'Kota Bekasi', '1_5', 'SPP BEKASI', -6.23756100000000000, 107.00031100000000000, 'UPTD I Cianjur', 1, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (108, '28712K', 'Jl. Jend A. Yani (Talaga)', NULL, NULL, 910, '75530.0', '76440.0', -6.97598600000000000, 108.31151700000000000, -6.98279900000000000, 108.31109900000000000, NULL, 'Kabupaten Majalengka', '6_4', 'SPP MAJALENGKA 2', -6.97870300000000000, 108.31137300000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (109, '298000', 'Sumber - Mandirancan (Jl. P. Kejaksan, Sumber)', NULL, NULL, 4570, '14584.0', '19154.0', -6.75963000000000000, 108.48586700000000000, -6.79678300000000000, 108.47578800000000000, NULL, 'Kabupaten Cirebon', '6_5', 'SPP CIREBON', -6.77795200000000000, 108.48263300000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (110, '16112K', 'Jl. Raya Dayeuh Kolot (Dayeuhkolot)', NULL, NULL, 3520, '5190.0', '8710.0', -6.96102600000000000, 107.61367100000000000, -6.99137000000000000, 107.62635500000000000, NULL, 'Kabupaten Bandung', '3_2', 'SPP KAB BANDUNG', -6.97799100000000000, 107.61944300000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (111, '230000', 'Jl. Akses Cikarang Dryport', NULL, NULL, 6330, '56900.0', '63230.0', -6.27951300000000000, 107.16672500000000000, -6.29410300000000000, 107.13106800000000000, NULL, 'Kabupaten Bekasi', '1_5', 'SPP BEKASI', -6.27413300000000000, 107.13975400000000000, 'UPTD I Cianjur', 1, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (112, '26113K', 'Jl. Oto Iskandardinata (Subang)', NULL, NULL, 2600, '174390.0', '176990.0', -6.55026400000000000, 107.77588500000000000, -6.56884500000000000, 107.76215200000000000, NULL, 'Kabupaten Subang', '3_4', 'SPP KAB SUBANG 1', -6.56018800000000000, 107.77003700000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (113, '34514K', 'Jl. Bratayuda (Garut)', NULL, NULL, 680, '66770.0', '67450.0', -7.22714200000000000, 107.91124600000000000, -7.22881200000000000, 107.90681700000000000, NULL, 'Kabupaten Garut', '4_1', 'SPP GARUT 1', -7.22915600000000000, 107.90977000000000000, 'UPTD IV Sumedang', 4, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (114, '19313K', 'Jl. Sejahtera (Sukabumi)', NULL, NULL, 1443, '98075.0', '99518.0', -6.95183600000000000, 106.91230400000000000, -6.94085200000000000, 106.90934500000000000, NULL, 'Kota Sukabumi', '2_1', 'SPP SUKABUMI 1', -6.94585000000000000, 106.91115100000000000, 'UPTD II Sukabumi', 2, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (115, '34312K', 'Jl. Raya Karangnunggal (Karangnunggal)', NULL, NULL, 940, '156000.0', '156940.0', -7.63285800000000000, 108.12186000000000000, -7.63129000000000000, 108.11401500000000000, NULL, 'Kabupaten Tasikmalaya', '5_2', 'SPP TASIKMALAYA 2', -7.63146600000000000, 108.11802200000000000, 'UPTD V Tasikmalaya', 5, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (116, '19118K', 'Jl. Garuda (Sukabumi)', NULL, NULL, 2400, '95225.0', '97625.0', -6.95134700000000000, 106.94704400000000000, -6.96481000000000000, 106.93947900000000000, NULL, 'Kota Sukabumi', '2_1', 'SPP SUKABUMI 1', -6.95845900000000000, 106.94622100000000000, 'UPTD II Sukabumi', 2, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (117, '230110', 'Cibarusah - Mekarmukti', NULL, NULL, 21400, '54850.0', '76250.0', -6.28944700000000000, 107.15262300000000000, -6.43586100000000000, 107.06585800000000000, NULL, 'Kabupaten Bekasi', '1_5', 'SPP BEKASI', -6.37055300000000000, 107.11411800000000000, 'UPTD I Cianjur', 1, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (118, '34411K', 'Jl. Raya Cipatujah (Cipatujah)', NULL, NULL, 1250, '179608.0', '180858.0', -7.74063200000000000, 108.01896500000000000, -7.74701500000000000, 108.01340600000000000, NULL, 'Kabupaten Tasikmalaya', '5_2', 'SPP TASIKMALAYA 2', -7.74432000000000000, 108.01637900000000000, 'UPTD V Tasikmalaya', 5, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (119, '193140', 'Jl. Lingkar Sukabumi (Baros - Jl. Pembangunan)', NULL, NULL, 4500, '101950.0', '106450.0', -6.93431900000000000, 106.95564000000000000, -6.95003200000000000, 106.93420900000000000, NULL, 'Kota Sukabumi', '2_1', 'SPP SUKABUMI 1', -6.94304300000000000, 106.94546200000000000, 'UPTD II Sukabumi', 2, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (120, '342000', 'Cisumur - Garuda (Let Jen Mashudi)', NULL, NULL, 6400, '111680.0', '118080.0', -7.36728800000000000, 108.21476800000000000, -7.33876800000000000, 108.24104200000000000, NULL, 'Kota Tasikmalaya', '5_1', 'SPP TASIKMALAYA 1', -7.36627600000000000, 108.23763500000000000, 'UPTD V Tasikmalaya', 5, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (121, '30600K', 'Jl. Nyi Mas Ganda Sari (Kota Cirebon)', NULL, NULL, 1035, '1795.0', '2830.0', -6.72508300000000000, 108.56128800000000000, -6.71611800000000000, 108.55825000000000000, NULL, 'Kota Cirebon', '6_5', 'SPP CIREBON', -6.72066600000000000, 108.55953300000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:06', NULL);
INSERT INTO `master_ruas_jalan` VALUES (122, '294000', 'Karangampel - Jatibarang', NULL, NULL, 17400, '32133.0', '49533.0', -6.46566200000000000, 108.45317200000000000, -6.47552900000000000, 108.30762300000000000, NULL, 'Kabupaten Indramayu', '6_1', 'SPP INDRAMAYU 1', -6.48290500000000000, 108.38227700000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (123, '348000', 'Kadungora (Leles) - Cibatu - Sasakbeusi', NULL, NULL, 19820, '49304.0', '69124.0', -7.11197400000000000, 107.89746100000000000, -7.04352000000000000, 107.98730400000000000, NULL, 'Kabupaten Garut', '4_1', 'SPP GARUT 1', -7.10619400000000000, 107.96751300000000000, 'UPTD IV Sumedang', 4, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (124, '397000', 'Sp. Pancuh Tilu - Cikadu', NULL, NULL, 18400, '84820.0', '103220.0', -7.32442900000000000, 107.25446400000000000, -7.43171500000000000, 107.18210300000000000, NULL, 'Kabupaten Cianjur', '1_2', 'SPP CIANJUR II', -7.37577200000000000, 107.21340500000000000, 'UPTD I Cianjur', 1, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (125, '18311K', 'Jl. Raya Sukanagara (Sukanagara)', NULL, NULL, 2070, '107740.0', '109810.0', -7.08944700000000000, 107.13668600000000000, -7.10293400000000000, 107.13013700000000000, NULL, 'Kabupaten Cianjur', '1_1', 'SPP CIANJUR I', -7.09652900000000000, 107.13171600000000000, 'UPTD I Cianjur', 1, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (126, '38400K', 'Jl. Depan LAN (Bandung)', NULL, NULL, 125, '0.0', '125.0', -6.90342200000000000, 107.62027400000000000, -6.90267700000000000, 107.62107000000000000, NULL, 'Kota Bandung', '3_1', 'SPP KOTA BANDUNG', -6.90306600000000000, 107.62068700000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (127, '391000', 'Waluran - Mareleng - Palangpang', NULL, NULL, 34850, '187000.0', '221850.0', -7.19860000000000000, 106.61419300000000000, -7.18787000000000000, 106.45583700000000000, NULL, 'Kabupaten Sukabumi', '2_4', 'SPP SUKABUMI 4', -7.23266100000000000, 106.52183700000000000, 'UPTD II Sukabumi', 2, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (128, '33212K', 'Jl. Raya Cimaragas/(Bts. Kota Banjar - Banjar)', NULL, NULL, 8330, '139045.0', '147375.0', -7.37913500000000000, 108.47206800000000000, -7.36956500000000000, 108.53583000000000000, NULL, 'Kota Banjar', '5_3', 'SPP CIAMIS-BANJAR-PANGANDARAN', -7.38486900000000000, 108.50564200000000000, 'UPTD V Tasikmalaya', 5, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (129, '19811K', 'Jl. Bhayangkara (Pelabuhan Ratu)', NULL, NULL, 3390, '147957.0', '151347.0', -6.96978400000000000, 106.56628100000000000, -6.98898000000000000, 106.55238100000000000, NULL, 'Kabupaten Sukabumi', '2_1', 'SPP SUKABUMI 1', -6.98315300000000000, 106.56526800000000000, 'UPTD II Sukabumi', 2, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (130, '30812K', 'Jl. Raya Ciawigebang (Ciawigebang)', NULL, NULL, 1730, '44933.0', '46663.0', -6.97320900000000000, 108.57752800000000000, -6.97434500000000000, 108.59043700000000000, NULL, 'Kabupaten Kuningan', '5_5', 'SPP KUNINGAN 2', -6.97213700000000000, 108.58318100000000000, 'UPTD V Tasikmalaya', 5, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (131, '35012K', 'Jl. Cimanuk (Garut)', NULL, NULL, 2460, '60740.0', '63200.0', -7.19954000000000000, 107.88802000000000000, -7.21584500000000000, 107.89928100000000000, NULL, 'Kabupaten Garut', '4_1', 'SPP GARUT 1', -7.20711000000000000, 107.89551400000000000, 'UPTD IV Sumedang', 4, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (132, '193130', 'Jl. Lingkar Sukabumi (Cibolang - Pelabuhan II)', NULL, NULL, 2400, '99550.0', '101950.0', -6.94769200000000000, 106.91621100000000000, -6.93156200000000000, 106.90127500000000000, NULL, 'Kota Sukabumi', '2_1', 'SPP SUKABUMI 1', -6.93931600000000000, 106.90909100000000000, 'UPTD II Sukabumi', 2, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (133, '392010', 'Sp.3 Loji (Tegalnyampai - Cibutun)', NULL, NULL, 7400, '154500.0', '161900.0', -7.04015900000000000, 106.56002200000000000, -7.07927800000000000, 106.52548600000000000, NULL, 'Kabupaten Sukabumi', '2_5', 'SPP SUKABUMI 5', -7.05774300000000000, 106.54492000000000000, 'UPTD II Sukabumi', 2, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (134, '396000', 'Simpang Muara Cikadu - Sp. Pancuh Tilu', NULL, NULL, 4100, '103220.0', '107320.0', -7.43171500000000000, 107.18210300000000000, -7.42112100000000000, 107.15589400000000000, NULL, 'Kabupaten Cianjur', '1_2', 'SPP CIANJUR II', -7.43111600000000000, 107.16702200000000000, 'UPTD I Cianjur', 1, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (135, '241000', 'Jbt. Citarum Lama - Cihaur Wangi/Cipeuyeum', NULL, NULL, 4060, '39520.0', '43580.0', -6.84213200000000000, 107.32441700000000000, -6.82539300000000000, 107.30592100000000000, NULL, 'Kabupaten Cianjur', '1_1', 'SPP CIANJUR I', -6.83270300000000000, 107.32049200000000000, 'UPTD I Cianjur', 1, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (136, '19312K', 'Jl. Raya Pelabuhan (Sukabumi)', NULL, NULL, 5291, '97425.0', '102716.0', -6.94769200000000000, 106.91621100000000000, -6.96526800000000000, 106.87484200000000000, NULL, 'Kota Sukabumi', '2_1', 'SPP SUKABUMI 1', -6.95895500000000000, 106.89703500000000000, 'UPTD II Sukabumi', 2, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (137, '344000', 'Karangnunggal - Cipatujah', NULL, NULL, 22800, '157000.0', '179800.0', -7.63129000000000000, 108.11401500000000000, -7.74063200000000000, 108.01896500000000000, NULL, 'Kabupaten Tasikmalaya', '5_2', 'SPP TASIKMALAYA 2', -7.67617600000000000, 108.05775500000000000, 'UPTD V Tasikmalaya', 5, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (138, '28812K', 'Jl. Kasturi ( Cikijing )', NULL, NULL, 1490, '82760.0', '84250.0', -7.01125300000000000, 108.35360400000000000, -7.01626600000000000, 108.36570200000000000, NULL, 'Kabupaten Majalengka', '6_4', 'SPP MAJALENGKA 2', -7.01352400000000000, 108.35975000000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (139, '29011K', 'Jl. Pasar Balong (Kadipaten)', NULL, NULL, 320, '49168.0', '49488.0', -6.76544300000000000, 108.16815900000000000, -6.76260400000000000, 108.16846400000000000, NULL, 'Kabupaten Majalengka', '6_3', 'SPP MAJALENGKA 1', -6.76401800000000000, 108.16826400000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (140, '273000', 'Lebakjati - Rancakalong - Selaawi', NULL, NULL, 18510, '29520.0', '48030.0', -6.89644900000000000, 107.82255500000000000, -6.81180600000000000, 107.86345200000000000, NULL, 'Kabupaten Sumedang', '4_5', 'SPP SUMEDANG 1', -6.85264400000000000, 107.83831000000000000, 'UPTD IV Sumedang', 4, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (141, '302000', 'Parapatan - Budur', NULL, NULL, 1500, '25100.0', '26600.0', -6.70253400000000000, 108.36243800000000000, -6.68909900000000000, 108.36256600000000000, NULL, 'Kabupaten Majalengka', '6_3', 'SPP MAJALENGKA 1', -6.69581400000000000, 108.36251000000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (142, '287000', 'Majalengka - Talaga', NULL, NULL, 23310, '52220.0', '75530.0', -6.83615700000000000, 108.25034900000000000, -6.97598600000000000, 108.31151700000000000, NULL, 'Kabupaten Majalengka', '6_4', 'SPP MAJALENGKA 2', -6.90389400000000000, 108.30250600000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (143, '28911K', 'Jl. Kh. Abdul Halim (Majalengka)', NULL, NULL, 5060, '51495.0', '56555.0', -6.83362700000000000, 108.24433000000000000, -6.82620300000000000, 108.20119500000000000, NULL, 'Kabupaten Majalengka', '6_3', 'SPP MAJALENGKA 1', -6.83413500000000000, 108.22174800000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (144, '29212K', 'Jl. Mayor Dasuki (Jatibarang)', NULL, NULL, 1880, '50100.0', '51980.0', -6.47259700000000000, 108.30279600000000000, -6.47113600000000000, 108.29264300000000000, NULL, 'Kabupaten Indramayu', '6_1', 'SPP INDRAMAYU 1', -6.46601800000000000, 108.29933400000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (145, '244000', 'Bts. Karawang/Purwakarta (Curug) - Purwakarta', NULL, NULL, 8030, '95950.0', '103980.0', -6.46911300000000000, 107.38749500000000000, -6.51692500000000000, 107.43039100000000000, NULL, 'Kabupaten Purwakarta', '3_6', 'SPP KAB PURWAKARTA', -6.49451800000000000, 107.40371200000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (146, '33211K', 'Jl. Perintis Kemerdekaan (Banjar)', NULL, NULL, 640, '147376.0', '148016.0', -7.36956500000000000, 108.53583000000000000, -7.36980300000000000, 108.54188900000000000, NULL, 'Kota Banjar', '5_3', 'SPP CIAMIS-BANJAR-PANGANDARAN', -7.36968300000000000, 108.53885900000000000, 'UPTD V Tasikmalaya', 5, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (147, '199000', 'Sp.Karanghawu - Bts. Prop. Banten (Cikotok)', NULL, NULL, 23770, '164683.0', '188453.0', -6.95603900000000000, 106.47944600000000000, -6.84249100000000000, 106.43315400000000000, NULL, 'Kabupaten Sukabumi', '2_5', 'SPP SUKABUMI 5', -6.88285800000000000, 106.46051700000000000, 'UPTD II Sukabumi', 2, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (148, '198000', 'Cibadak - Cikidang - Pelabuhan Ratu', NULL, NULL, 35810, '112180.0', '147990.0', -6.87754300000000000, 106.77664100000000000, -6.96978400000000000, 106.56628100000000000, NULL, 'Kabupaten Sukabumi', '2_1', 'SPP SUKABUMI 1', -6.89209700000000000, 106.65408100000000000, 'UPTD II Sukabumi', 2, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (149, '393000', 'Kalijati - Sukamandi', NULL, NULL, 22000, '135050.0', '157050.0', -6.52204600000000000, 107.67389500000000000, -6.34100400000000000, 107.66097300000000000, NULL, 'Kabupaten Subang', '3_5', 'SPP KAB SUBANG 2', -6.42874600000000000, 107.68635100000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (150, '351000', 'Garut - Cikajang', NULL, NULL, 23200, '64990.0', '88190.0', -7.23152700000000000, 107.90109400000000000, -7.34725700000000000, 107.80122700000000000, NULL, 'Kabupaten Garut', '4_1', 'SPP GARUT 1', -7.27336300000000000, 107.81300500000000000, 'UPTD IV Sumedang', 4, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (151, '289000', 'Majalengka - Kadipaten', NULL, NULL, 6460, '56555.0', '63015.0', -6.82620300000000000, 108.20119500000000000, -6.77819800000000000, 108.16991100000000000, NULL, 'Kabupaten Majalengka', '6_3', 'SPP MAJALENGKA 1', -6.80268700000000000, 108.18473800000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (152, '350000', 'Bts. Bandung/Garut - Garut', NULL, NULL, 14710, '42660.0', '57370.0', -7.05278600000000000, 107.89913900000000000, -7.17262800000000000, 107.89270000000000000, NULL, 'Kabupaten Garut', '4_1', 'SPP GARUT 1', -7.11598100000000000, 107.89647200000000000, 'UPTD IV Sumedang', 4, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (153, '247000', 'Bts. Cimahi - Cisarua - Lembang', NULL, NULL, 13770, '14275.0', '28045.0', -6.83919400000000000, 107.55174100000000000, -6.81901900000000000, 107.61154300000000000, NULL, 'Kabupaten Bandung Barat', '3_3', 'SPP KAB CIMAHI', -6.79757300000000000, 107.57814200000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (154, '315000', 'Cibingbin - Batas Jateng (Penanggapan)', NULL, NULL, 3430, '67185.0', '70615.0', -7.05760400000000000, 108.75865500000000000, -7.05520900000000000, 108.78584800000000000, NULL, 'Kabupaten Kuningan', '5_4', 'SPP KUNINGAN 1', -7.05887800000000000, 108.77280500000000000, 'UPTD V Tasikmalaya', 5, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (155, '203000', 'Bts. Tangerang/Bogor - Parung', NULL, NULL, 11740, '48286.0', '60026.0', -6.35889000000000000, 106.67580500000000000, -6.42167100000000000, 106.73272300000000000, NULL, 'Kabupaten Bogor', '1_3', 'SPP BOGOR I', -6.38181300000000000, 106.70258400000000000, 'UPTD I Cianjur', 1, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (156, '097010', 'Cileungsi - Cibinong (Citeureup)', NULL, NULL, 14130, '53470.0', '67600.0', -6.40440400000000000, 106.96325500000000000, -6.46544100000000000, 106.89128400000000000, NULL, 'Kabupaten Bogor', '1_4', 'SPP BOGOR II', -6.44976400000000000, 106.93554500000000000, 'UPTD I Cianjur', 1, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (157, '30811K', 'Jl. RE. Martadinata (Kuningan)', NULL, NULL, 3870, '33160.0', '37030.0', -6.96830800000000000, 108.48852300000000000, -6.97294900000000000, 108.52266600000000000, NULL, 'Kabupaten Kuningan', '5_4', 'SPP KUNINGAN 1', -6.97013200000000000, 108.50555100000000000, 'UPTD V Tasikmalaya', 5, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (158, '35011K', 'Jl. Otista (Garut)', NULL, NULL, 3370, '57370.0', '60740.0', -7.17262800000000000, 107.89270000000000000, -7.19954000000000000, 107.88802000000000000, NULL, 'Kabupaten Garut', '4_1', 'SPP GARUT 1', -7.18720600000000000, 107.88945400000000000, 'UPTD IV Sumedang', 4, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (159, '34012K', 'Jl. Brigjen Wasita Kusumah', NULL, NULL, 2206, '100700.0', '102906.0', -7.28304300000000000, 108.19816200000000000, -7.30085700000000000, 108.19298700000000000, NULL, 'Kota Tasikmalaya', '5_1', 'SPP TASIKMALAYA 1', -7.29146000000000000, 108.19326400000000000, 'UPTD V Tasikmalaya', 5, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (160, '332000', 'Panaekan/Goler - Cimaragas - Bts. Kota Banjar', NULL, NULL, 8130, '130920.0', '139050.0', -7.36973600000000000, 108.40710700000000000, -7.37913500000000000, 108.47206800000000000, NULL, 'Kabupaten Ciamis', '5_3', 'SPP CIAMIS-BANJAR-PANGANDARAN', -7.36768900000000000, 108.44004700000000000, 'UPTD V Tasikmalaya', 5, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (161, '38000K', 'Jl. W. R. Supratman (Bandung)', NULL, NULL, 1676, '3000.0', '4676.0', -6.91336000000000000, 107.63426700000000000, -6.90108000000000000, 107.62569800000000000, NULL, 'Kota Bandung', '3_1', 'SPP KOTA BANDUNG', -6.90698100000000000, 107.63012800000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (162, '36511K', 'Jl. Raya Laswi (Ciparay)', NULL, NULL, 3400, '20958.0', '24358.0', -7.03456900000000000, 107.70800900000000000, -7.04599300000000000, 107.73657000000000000, NULL, 'Kabupaten Bandung', '3_2', 'SPP KAB BANDUNG', -7.03876000000000000, 107.72284900000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (163, '309000', 'Ciawigebang - Bts. Cirebon/Kuningan (Waled)', NULL, NULL, 15650, '46667.0', '62317.0', -6.97434500000000000, 108.59043700000000000, -6.93664300000000000, 108.70069800000000000, NULL, 'Kabupaten Kuningan', '5_5', 'SPP KUNINGAN 2', -6.97099300000000000, 108.65667200000000000, 'UPTD V Tasikmalaya', 5, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (164, '308000', 'Kuningan - Ciawigebang', NULL, NULL, 7970, '37000.0', '44970.0', -6.97294900000000000, 108.52266600000000000, -6.97320900000000000, 108.57752800000000000, NULL, 'Kabupaten Kuningan', '5_4', 'SPP KUNINGAN 1', -6.98442000000000000, 108.55665900000000000, 'UPTD V Tasikmalaya', 5, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (165, '392000', 'Palangpang - Puncak Darma', NULL, NULL, 5200, '221850.0', '227050.0', -7.16721300000000000, 106.47172900000000000, -7.18787000000000000, 106.45583700000000000, NULL, 'Kabupaten Sukabumi', '2_5', 'SPP SUKABUMI 5', -7.17353300000000000, 106.46983700000000000, 'UPTD II Sukabumi', 2, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (166, '243000', 'Kesambi - Bts. Karawang/Purwakarta (Curug)', NULL, NULL, 11700, '84250.0', '95950.0', -6.37003500000000000, 107.37482300000000000, -6.46911300000000000, 107.38749500000000000, NULL, 'Kabupaten Karawang', '3_6', 'SPP KAB PURWAKARTA', -6.41994800000000000, 107.37748100000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (167, '38900K', 'Jl. Pangeran Cakrabuana (Sumber)', NULL, NULL, 4530, '6730.0', '11260.0', -6.74898300000000000, 108.52697100000000000, -6.75878600000000000, 108.48767900000000000, NULL, 'Kabupaten Cirebon', '6_5', 'SPP CIREBON', -6.75633000000000000, 108.50790400000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (168, '365000', 'Sp. Munjul - Ciparay (Jl. Sp. Munjul - Jl. Raya Laswi Ciparay)', NULL, NULL, 6970, '13988.0', '20958.0', -7.01624700000000000, 107.65169800000000000, -7.03456900000000000, 107.70800900000000000, NULL, 'Kabupaten Bandung', '3_2', 'SPP KAB BANDUNG', -7.02190100000000000, 107.67972200000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (169, '339000', 'Kalipucang - Majingklak', NULL, NULL, 6840, '195055.0', '201895.0', -7.64601000000000000, 108.75287900000000000, -7.67225300000000000, 108.79836900000000000, NULL, 'Kabupaten Pangandaran', '5_3', 'SPP CIAMIS-BANJAR-PANGANDARAN', -7.65786100000000000, 108.77503500000000000, 'UPTD V Tasikmalaya', 5, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (170, '195000', 'Cikembar - Jampang Tengah', NULL, NULL, 6910, '112400.0', '119310.0', -6.96231200000000000, 106.79655000000000000, -7.00136400000000000, 106.79712700000000000, NULL, 'Kabupaten Sukabumi', '2_2', 'SPP SUKABUMI 2', -6.98520200000000000, 106.79198300000000000, 'UPTD II Sukabumi', 2, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (171, '24912K', 'Jl. Sukajadi (Bandung)', NULL, NULL, 2530, '4000.0', '6530.0', -6.89677900000000000, 107.59732700000000000, -6.87412200000000000, 107.59584800000000000, NULL, 'Kota Bandung', '3_1', 'SPP KOTA BANDUNG', -6.88546400000000000, 107.59646500000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:09', NULL);
INSERT INTO `master_ruas_jalan` VALUES (172, '400000', 'Cipamokolan (Bts. Kota Bandung/Jbt. Tol) - Sp. Manirancan - Jl. Lingkar Luar Majalaya', NULL, NULL, 15120, '13980.0', '29100.0', -6.96871300000000000, 107.68630200000000000, -7.03573600000000000, 107.77888400000000000, NULL, 'Kabupaten Bandung', '3_2', 'SPP KAB BANDUNG', -7.01061800000000000, 107.72336400000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (173, '194000', 'Cikembar - Cikembang', NULL, NULL, 3510, '112400.0', '115910.0', -6.96231200000000000, 106.79655000000000000, -6.95345100000000000, 106.76822500000000000, NULL, 'Kabupaten Sukabumi', '2_2', 'SPP SUKABUMI 2', -6.96115500000000000, 106.78125000000000000, 'UPTD II Sukabumi', 2, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (174, '391020', 'Tegalloa (Loji) - Baged/Jagatamu (Bts. Kab. Karawang/Bogor)', NULL, NULL, 6720, '109720.0', '116440.0', -6.50874200000000000, 107.21767500000000000, -6.48583500000000000, 107.17419900000000000, NULL, 'Kabupaten Karawang', '3_7', 'SPP KAB KARAWANG', -6.49143000000000000, 107.19708000000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (175, '405000', 'Jl. Bandara Nusawiru', NULL, NULL, 2050, '233970.0', '236020.0', -7.72761600000000000, 108.47383000000000000, -7.72404300000000000, 108.48971900000000000, NULL, 'Kabupaten Pangandaran', '5_3', 'SPP CIAMIS-BANJAR-PANGANDARAN', -7.72938000000000000, 108.48264500000000000, 'UPTD V Tasikmalaya', 5, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (176, '232000', 'Tanjungpura - Batujaya (Bts. Bekasi/Karawang)', NULL, NULL, 35860, '69000.0', '104860.0', -6.26334700000000000, 107.27776400000000000, -6.06554500000000000, 107.16383600000000000, NULL, 'Kabupaten Karawang', '3_7', 'SPP KAB KARAWANG', -6.12945300000000000, 107.28422400000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (177, '293000', 'Jl. Letnan Joni (Jatibarang)', NULL, NULL, 1750, '46360.0', '48110.0', -6.48825000000000000, 108.30904400000000000, -6.47456900000000000, 108.30341700000000000, NULL, 'Kabupaten Indramayu', '6_1', 'SPP INDRAMAYU 1', -6.48151900000000000, 108.30589100000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (178, '24711K', 'Jl. Kolonel Masturi (Cimahi)', NULL, NULL, 3950, '10320.0', '14270.0', -6.87295100000000000, 107.54110000000000000, -6.83919400000000000, 107.55174100000000000, NULL, 'Kota Cimahi', '3_3', 'SPP KAB CIMAHI', -6.85596500000000000, 107.54607400000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (179, '19314K', 'Jl. Cemerlang (Sukabumi)', NULL, NULL, 3931, '99518.0', '103449.0', -6.94085200000000000, 106.90934500000000000, -6.91388800000000000, 106.90565600000000000, NULL, 'Kota Sukabumi', '2_1', 'SPP SUKABUMI 1', -6.92681400000000000, 106.90279700000000000, 'UPTD II Sukabumi', 2, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (180, '29511K', 'Jl. Dewi Sartika (Sumber)', NULL, NULL, 3500, '13488.0', '16988.0', -6.75878600000000000, 108.48767900000000000, -6.75734700000000000, 108.45714000000000000, NULL, 'Kabupaten Cirebon', '6_5', 'SPP CIREBON', -6.75832500000000000, 108.47269500000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (181, '402000', 'Parakan Muncang - Sp.3 Panenjoan', NULL, NULL, 1850, '38230.0', '40080.0', -6.97951800000000000, 107.83370400000000000, -6.96689000000000000, 107.82598400000000000, NULL, 'Kabupaten Bandung', '3_2', 'SPP KAB BANDUNG', -6.97290800000000000, 107.82960300000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (182, '299020', 'Pakembangan - Bojong (Jl. Linggarjati)', NULL, NULL, 8160, '23590.0', '31750.0', -6.88114300000000000, 108.49514000000000000, -6.84152900000000000, 108.48591000000000000, NULL, 'Kabupaten Kuningan', '5_5', 'SPP KUNINGAN 2', -6.87012600000000000, 108.47089200000000000, 'UPTD V Tasikmalaya', 5, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (183, '25211K', 'Jl. Jend. A. Yani (Subang)', NULL, NULL, 4540, '149666.0', '154206.0', -6.57155800000000000, 107.75883300000000000, -6.59785000000000000, 107.73459700000000000, NULL, 'Kabupaten Subang', '3_4', 'SPP KAB SUBANG 1', -6.58277900000000000, 107.74449600000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (184, '365020', 'Bojong Soang - Sp. Munjul (Jl. Siliwangi)', NULL, NULL, 5080, '10650.0', '15730.0', -6.98222800000000000, 107.63384300000000000, -7.01624700000000000, 107.65169800000000000, NULL, 'Kabupaten Bandung', '3_2', 'SPP KAB BANDUNG', -7.00506000000000000, 107.63142300000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (185, '18211K', 'Jl. Raya Cibeber (Cibeber)', NULL, NULL, 2620, '79000.0', '81620.0', -6.93424500000000000, 107.12160100000000000, -6.94516300000000000, 107.13477500000000000, NULL, 'Kabupaten Cianjur', '1_1', 'SPP CIANJUR I', -6.93951500000000000, 107.13119700000000000, 'UPTD I Cianjur', 1, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (186, '38500K', 'Jl. Cilaki (Bandung)', NULL, NULL, 200, '0.0', '200.0', -6.90267700000000000, 107.62107000000000000, -6.90126600000000000, 107.61972100000000000, NULL, 'Kota Bandung', '3_1', 'SPP KOTA BANDUNG', -6.90206700000000000, 107.62027000000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (187, '197000', 'Sp. Surade - Ujunggenteng', NULL, NULL, 23400, '207914.0', '231314.0', -7.33386400000000000, 106.57249700000000000, -7.37283100000000000, 106.40401000000000000, NULL, 'Kabupaten Sukabumi', '2_4', 'SPP SUKABUMI 4', -7.37082000000000000, 106.49105500000000000, 'UPTD II Sukabumi', 2, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (188, '355000', 'Sumadra - Bungbulang', NULL, NULL, 34990, '100840.0', '135830.0', -7.41235100000000000, 107.71774300000000000, -7.40890100000000000, 107.72008400000000000, NULL, 'Kabupaten Garut', '4_3', 'SPP GARUT 3', NULL, NULL, 'UPTD IV Sumedang', 4, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (189, '300000', 'Leuwimunding - Rajagaluh', NULL, NULL, 6300, '30100.0', '36400.0', -6.74274800000000000, 108.34514600000000000, -6.78380900000000000, 108.34602200000000000, NULL, 'Kabupaten Majalengka', '6_3', 'SPP MAJALENGKA 1', -6.76364600000000000, 108.33345700000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (190, '34611K', 'Jl. Raya Singaparna (Singaparna)', NULL, NULL, 2640, '104296.0', '106936.0', -7.35026700000000000, 108.10674000000000000, -7.34527100000000000, 108.12800500000000000, NULL, 'Kabupaten Tasikmalaya', '5_1', 'SPP TASIKMALAYA 1', -7.34963900000000000, 108.11822500000000000, 'UPTD V Tasikmalaya', 5, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (191, '22412K', 'Jl. Perjuangan (Kota Bekasi)', NULL, NULL, 7000, '32600.0', '39600.0', -6.23753700000000000, 107.00015700000000000, -6.20214000000000000, 107.03720600000000000, NULL, 'Kota Bekasi', '1_5', 'SPP BEKASI', -6.22225700000000000, 107.02309100000000000, 'UPTD I Cianjur', 1, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (192, '275000', 'Bts. Sumedang/Indramayu - Cikamurang', NULL, NULL, 610, '96075.0', '96685.0', -6.64154600000000000, 108.03854300000000000, -6.63621600000000000, 108.03875900000000000, NULL, 'Kabupaten Indramayu', '6_2', 'SPP INDRAMAYU 2', -6.63889100000000000, 108.03864300000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (193, '34011K', 'Jl. Ir. H. Juanda (Tasikmalaya)', NULL, NULL, 2850, '104985.0', '107835.0', -7.31806600000000000, 108.19886900000000000, -7.34317500000000000, 108.19697800000000000, NULL, 'Kota Tasikmalaya', '5_1', 'SPP TASIKMALAYA 1', -7.33061300000000000, 108.19800300000000000, 'UPTD V Tasikmalaya', 5, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (194, '216000', 'Pondok Rajeg - Jl. Harapan Jaya (Cibinong)', NULL, NULL, 5210, '48459.0', '53669.0', -6.46056700000000000, 106.82574200000000000, -6.48258900000000000, 106.81775000000000000, NULL, 'Kabupaten Bogor', '1_3', 'SPP BOGOR I', -6.47451900000000000, 106.82955200000000000, 'UPTD I Cianjur', 1, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (195, '38300K', 'Jl. Cimandiri (Bandung)', NULL, NULL, 345, '0.0', '345.0', -6.90342100000000000, 107.61731900000000000, -6.90342200000000000, 107.62027400000000000, NULL, 'Kota Bandung', '3_1', 'SPP KOTA BANDUNG', -6.90371300000000000, 107.61879700000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (196, '29512K', 'Jl. Nyi. Ageng Serang (Sumber)', NULL, NULL, 200, '16988.0', '17188.0', -6.75734700000000000, 108.45714000000000000, -6.75857400000000000, 108.45584400000000000, NULL, 'Kabupaten Cirebon', '6_5', 'SPP CIREBON', -6.75786600000000000, 108.45641900000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (197, '215000', 'Sp. Jl. Tole Iskandar - Pondok Rajeg (Bts. Depok/Bogor)', NULL, NULL, 8590, '39869.0', '48459.0', -6.40393100000000000, 106.83847100000000000, -6.46056700000000000, 106.82574200000000000, NULL, 'Kota Depok', '1_3', 'SPP BOGOR I', -6.43280600000000000, 106.82181000000000000, 'UPTD I Cianjur', 1, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (198, '246000', 'Padalarang (Sp.3 Stasion) - Sp. Cisarua', NULL, NULL, 7900, '16960.0', '24860.0', -6.81676400000000000, 107.55518700000000000, -6.84450700000000000, 107.49810000000000000, NULL, 'Kabupaten Bandung Barat', '3_3', 'SPP KAB CIMAHI', -6.82627700000000000, 107.52526700000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (199, '245000', 'Sp. Orion - Cihaliwung', NULL, NULL, 2150, '16400.0', '18550.0', -6.85141500000000000, 107.49705900000000000, -6.83646400000000000, 107.48879200000000000, NULL, 'Kabupaten Bandung Barat', '3_3', 'SPP KAB CIMAHI', -6.84250100000000000, 107.49629400000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (200, '183000', 'Cibeber - Sukanagara', NULL, NULL, 26120, '81620.0', '107740.0', -6.94516300000000000, 107.13477500000000000, -7.08944700000000000, 107.13668600000000000, NULL, 'Kabupaten Cianjur', '1_1', 'SPP CIANJUR I', -7.01267600000000000, 107.14251200000000000, 'UPTD I Cianjur', 1, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (201, '193150', 'Jl. Lingkar Mesjid Raudatul Irvan (Cisaat, Cibolang, Sukabumi)', NULL, NULL, 210, '106240.0', '106450.0', -6.90769100000000000, 106.87348300000000000, -6.90561000000000000, 106.87385800000000000, NULL, 'Kota Sukabumi', '2_1', 'SPP SUKABUMI 1', -6.90663000000000000, 106.87358200000000000, 'UPTD II Sukabumi', 2, NULL, NULL, '2021-03-22 16:10:07', NULL);
INSERT INTO `master_ruas_jalan` VALUES (202, '182000', 'Sp3. Perintis Kemerdekaan (Pasir Hayam) - Cibeber', NULL, NULL, 10560, '68440.0', '79000.0', -6.84974300000000000, 107.12991400000000000, -6.93424500000000000, 107.12160100000000000, NULL, 'Kabupaten Cianjur', '1_1', 'SPP CIANJUR I', -6.88896700000000000, 107.12469200000000000, 'UPTD I Cianjur', 1, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (203, '231000', 'Cibarusah - Cibucil', NULL, NULL, 1400, '76250.0', '77650.0', -6.43586100000000000, 107.06585800000000000, -6.44124800000000000, 107.05591200000000000, NULL, 'Kabupaten Bogor', '1_4', 'SPP BOGOR II', -6.44044100000000000, 107.06174000000000000, 'UPTD I Cianjur', 1, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (204, '353000', 'Kiarakohok (Sp. Cilauteureun) - Cilauteureun', NULL, NULL, 2162, '151956.0', '154118.0', -7.64398800000000000, 107.69398900000000000, -7.66130600000000000, 107.68725600000000000, NULL, 'Kabupaten Garut', '4_2', 'SPP GARUT 2', -7.65286900000000000, 107.69096400000000000, 'UPTD IV Sumedang', 4, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (205, '305000', 'Tegalgubug - Arjawinangun - Jagapura (Bts. Cirebon/Indramayu (Gopala))', NULL, NULL, 16940, '26657.0', '43597.0', -6.64091700000000000, 108.39373000000000000, -6.52062300000000000, 108.43016200000000000, NULL, 'Kabupaten Cirebon', '6_5', 'SPP CIREBON', -6.59406400000000000, 108.42816500000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (206, '391010', 'Palumbonsari - Johar - Tegalloa (Loji)', NULL, NULL, 35620, '74100.0', '109720.0', -6.29928300000000000, 107.32799500000000000, -6.50874200000000000, 107.21767500000000000, NULL, 'Kabupaten Karawang', '3_7', 'SPP KAB KARAWANG', -6.37136600000000000, 107.22367200000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (207, '304000', 'Mundu - Gopala (Mundu - Bts. Indramayu/Cirebon)', NULL, NULL, 6100, '43600.0', '49700.0', -6.52062300000000000, 108.43016200000000000, -6.46639200000000000, 108.42932600000000000, NULL, 'Kabupaten Indramayu', '6_1', 'SPP INDRAMAYU 1', -6.49371700000000000, 108.42417000000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (208, '392030', 'Balewer - Puncak Darma', NULL, NULL, 3000, '178300.0', '181300.0', -7.15672900000000000, 106.47662300000000000, -7.16721300000000000, 106.47172900000000000, NULL, 'Kabupaten Sukabumi', '2_5', 'SPP SUKABUMI 5', -7.16134900000000000, 106.46931600000000000, 'UPTD II Sukabumi', 2, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (209, '18411K', 'Jl. Raya Sukanagara (Sindangbarang)', NULL, NULL, 1260, '172920.0', '174180.0', -7.44260700000000000, 107.13946700000000000, -7.45134600000000000, 107.13512000000000000, NULL, 'Kabupaten Cianjur', '1_2', 'SPP CIANJUR II', -7.44776400000000000, 107.13908400000000000, 'UPTD I Cianjur', 1, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (210, '367000', 'Majalaya (Sp.3 Jl. Cikareo/Jl. Tengah) - Sawahbera (Sp.3 Cijapati) - Bts. Bdg/Garut (Cijapati)', NULL, NULL, 13660, '29488.0', '43148.0', -7.03341000000000000, 107.78174900000000000, -7.06052600000000000, 107.84873800000000000, NULL, 'Kabupaten Bandung', '3_2', 'SPP KAB BANDUNG', -7.03919500000000000, 107.81126200000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (211, '21312K', 'Jl. Dewi Sartika (Depok)', NULL, NULL, 667, '43233.0', '43900.0', -6.39902300000000000, 106.81349100000000000, -6.39998500000000000, 106.81907300000000000, NULL, 'Kota Depok', '1_3', 'SPP BOGOR I', -6.39966900000000000, 106.81627000000000000, 'UPTD I Cianjur', 1, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (212, '30711K', 'Jl. Ariodinoto (Kota Cirebon)', NULL, NULL, 200, '655.0', '855.0', -6.72390900000000000, 108.57317400000000000, -6.72426900000000000, 108.57149800000000000, NULL, 'Kota Cirebon', '6_5', 'SPP CIREBON', -6.72428200000000000, 108.57238700000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (213, '196000', 'Jampang Tengah - Kiaradua', NULL, NULL, 45890, '119280.0', '165170.0', -7.00136400000000000, 106.79712700000000000, -7.13129000000000000, 106.62219900000000000, NULL, 'Kabupaten Sukabumi', '2_2', 'SPP SUKABUMI 2', -7.11311400000000000, 106.75230000000000000, 'UPTD II Sukabumi', 2, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (214, '097000', 'Narogong - Cileungsi', NULL, NULL, 6040, '47430.0', '53470.0', -6.35283400000000000, 106.97623800000000000, -6.40440400000000000, 106.96325500000000000, NULL, 'Kabupaten Bogor', '1_4', 'SPP BOGOR II', -6.37942300000000000, 106.96851400000000000, 'UPTD I Cianjur', 1, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (215, '184000', 'Sukanagara - Sindangbarang', NULL, NULL, 62460, '109800.0', '172260.0', -7.10293400000000000, 107.13013700000000000, -7.44260700000000000, 107.13946700000000000, NULL, 'Kabupaten Cianjur', '1_2', 'SPP CIANJUR II', NULL, NULL, 'UPTD I Cianjur', 1, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (216, '392020', 'Cibutun - Balewer', NULL, NULL, 16400, '161900.0', '178300.0', -7.07927800000000000, 106.52548600000000000, -7.15672900000000000, 106.47662300000000000, NULL, 'Kabupaten Sukabumi', '2_5', 'SPP SUKABUMI 5', -7.11619300000000000, 106.48167600000000000, 'UPTD II Sukabumi', 2, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (217, '295000', 'Sumber - Bts. Majalengka/Cirebon (Jl. Imam Bonjol)', NULL, NULL, 6880, '17188.0', '24068.0', -6.75857400000000000, 108.45584400000000000, -6.77819000000000000, 108.40028200000000000, NULL, 'Kabupaten Cirebon', '6_5', 'SPP CIREBON', -6.76443100000000000, 108.42795700000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (218, '24911K', 'Jl. Pasir Kaliki (Sp. Pasteur - Sp. Sukajadi/Eykman) Kota Bandung', NULL, NULL, 340, '3660.0', '4000.0', -6.90033100000000000, 107.59740600000000000, -6.89677900000000000, 107.59732700000000000, NULL, 'Kota Bandung', '3_1', 'SPP KOTA BANDUNG', -6.89855800000000000, 107.59737600000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (219, '38712K', 'Jl. Sentot Alibasyah (Bandung)', NULL, NULL, 202, '0.0', '202.0', -6.90127300000000000, 107.61941700000000000, -6.89931100000000000, 107.61931000000000000, NULL, 'Kota Bandung', '3_1', 'SPP KOTA BANDUNG', -6.90029100000000000, 107.61937800000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (220, '38800K', 'Jl. Kalitanjung (Kota Cirebon)', NULL, NULL, 1930, '4800.0', '6730.0', -6.74432200000000000, 108.54341700000000000, -6.74898300000000000, 108.52697100000000000, NULL, 'Kota Cirebon', '6_5', 'SPP CIREBON', -6.74727300000000000, 108.53547200000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (221, '290000', 'Kadipaten (Jl. Pasar Balong) - Bts. Majalengka/Indramayu', NULL, NULL, 22750, '49488.0', '72238.0', -6.76260400000000000, 108.16846400000000000, -6.62353000000000000, 108.27035900000000000, NULL, 'Kabupaten Majalengka', '6_3', 'SPP MAJALENGKA 1', -6.67689500000000000, 108.18942700000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (222, '34013K', 'Jl. Letnan Harun', NULL, NULL, 2032, '102906.0', '104938.0', -7.30085700000000000, 108.19298700000000000, -7.31806600000000000, 108.19886900000000000, NULL, 'Kota Tasikmalaya', '5_1', 'SPP TASIKMALAYA 1', -7.30944100000000000, 108.19595500000000000, 'UPTD V Tasikmalaya', 5, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (223, '36512K', 'Jl. Raya Laswi (sd. Sp.3 Jl. Cikareo/Jl. Tengah), Majalaya', NULL, NULL, 5130, '24358.0', '29488.0', -7.04599300000000000, 107.73657000000000000, -7.03341000000000000, 107.78174900000000000, NULL, 'Kabupaten Bandung', '3_2', 'SPP KAB BANDUNG', -7.04909600000000000, 107.76078000000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (224, '266000', 'Cikamurang - Bantarwaru (Bts. Kab. Subang/Indramayu)', NULL, NULL, 30600, '107367.0', '137967.0', -6.63621600000000000, 108.03875900000000000, -6.57047100000000000, 107.85617400000000000, NULL, 'Kabupaten Indramayu', '6_2', 'SPP INDRAMAYU 2', -6.60959700000000000, 107.93745200000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (225, '36900K', 'Jl. Cicendo (Sp. Pajajaran - Sp. Kebon Kawung) Kota Bandung', NULL, NULL, 640, '0.0', '640.0', -6.90716100000000000, 107.60442400000000000, -6.91263400000000000, 107.60397700000000000, NULL, 'Kota Bandung', '3_1', 'SPP KOTA BANDUNG', -6.90988400000000000, 107.60421000000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (226, '26011K', 'Jl. H. Ikhsan (Pamanukan)', NULL, NULL, 400, '140460.0', '140860.0', -6.28333200000000000, 107.82073500000000000, -6.28707300000000000, 107.82061700000000000, NULL, 'Kabupaten Subang', '3_5', 'SPP KAB SUBANG 2', -6.28519800000000000, 107.82063900000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (227, '252000', 'Subang - Bts. Kab. Bandung/ Kab. Subang', NULL, NULL, 26960, '154203.0', '181163.0', -6.59785000000000000, 107.73459700000000000, -6.77388600000000000, 107.63620800000000000, NULL, 'Kabupaten Subang', '3_4', 'SPP KAB SUBANG 1', -6.68524300000000000, 107.67794900000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (228, '365010', 'Jl. Terusan Buahbatu (Bts. Kota/Kab. Bandung - Bojongsoang', NULL, NULL, 2000, '8650.0', '10650.0', -6.96576700000000000, 107.63800600000000000, -6.98222800000000000, 107.63384300000000000, NULL, 'Kabupaten Bandung', '3_2', 'SPP KAB BANDUNG', -6.97400300000000000, 107.63590500000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (229, '21411K', 'Jl. Siliwangi (Depok)', NULL, NULL, 1280, '37529.0', '38809.0', -6.39915700000000000, 106.81986400000000000, -6.40086100000000000, 106.83111000000000000, NULL, 'Kota Depok', '1_3', 'SPP BOGOR I', -6.40001900000000000, 106.82556200000000000, 'UPTD I Cianjur', 1, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (230, '260000', 'Pamanukan - Pagaden', NULL, NULL, 19050, '141950.0', '161000.0', -6.29699900000000000, 107.82071600000000000, -6.45111500000000000, 107.79845200000000000, NULL, 'Kabupaten Subang', '3_5', 'SPP KAB SUBANG 2', -6.37660800000000000, 107.79972700000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (231, '24411K', 'Jl. Pahlawan (Purwakarta)', NULL, NULL, 3170, '103980.0', '107150.0', -6.51692500000000000, 107.43039100000000000, -6.54105800000000000, 107.44381400000000000, NULL, 'Kabupaten Purwakarta', '3_6', 'SPP KAB PURWAKARTA', -6.52955600000000000, 107.43617100000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (232, '391030', 'Cariu - Jagatamu/Baged (Bts. Kab. Bogor/Karawang)', NULL, NULL, 6573, '78700.0', '85273.0', -6.50186100000000000, 107.13026700000000000, -6.48583500000000000, 107.17419900000000000, NULL, 'Kabupaten Bogor', '1_4', 'SPP BOGOR II', -6.48981200000000000, 107.15012100000000000, 'UPTD I Cianjur', 1, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (233, '20211K', 'Jl. Moch. Toha (Parung Panjang)', NULL, NULL, 1500, '53855.0', '55355.0', -6.33957200000000000, 106.57469900000000000, -6.34414100000000000, 106.56373000000000000, NULL, 'Kabupaten Bogor', '1_3', 'SPP BOGOR I', -6.34167600000000000, 106.56949500000000000, 'UPTD I Cianjur', 1, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (234, '24914K', 'Jl. Sukawangi (Bandung)', NULL, NULL, 180, '5770.0', '5950.0', -6.87839200000000000, 107.59626000000000000, -6.87827600000000000, 107.59776300000000000, NULL, 'Kota Bandung', '3_1', 'SPP KOTA BANDUNG', -6.87832900000000000, 107.59701200000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (235, '216010', 'Jl. Harapan Jaya (Cibinong) -Bts. Kota Bogor (Kedunghalang)', NULL, NULL, 7420, '53669.0', '61089.0', -6.48258900000000000, 106.81775000000000000, -6.54373700000000000, 106.80596700000000000, NULL, 'Kabupaten Bogor', '1_3', 'SPP BOGOR I', -6.51265100000000000, 106.80717000000000000, 'UPTD I Cianjur', 1, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (236, '202000', 'Parungpanjang - Bunar', NULL, NULL, 26820, '55355.0', '82175.0', -6.34414100000000000, 106.56373000000000000, -6.51942400000000000, 106.49896100000000000, NULL, 'Kabupaten Bogor', '1_3', 'SPP BOGOR I', -6.42795300000000000, 106.54070800000000000, 'UPTD I Cianjur', 1, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (237, '30911K', 'Ciawigebang - Jalaksana', NULL, NULL, 12595, '27850.0', '40445.0', -6.92237300000000000, 108.48730100000000000, -6.97078400000000000, 108.57845300000000000, NULL, 'Kabupaten Kuningan', '5_5', 'SPP KUNINGAN 2', -6.94074700000000000, 108.53347000000000000, 'UPTD V Tasikmalaya', 5, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (238, '37400K', 'Jl. Peta (Bandung)', NULL, NULL, 2457, '7000.0', '9457.0', -6.93725200000000000, 107.60316300000000000, -6.92675300000000000, 107.58559900000000000, NULL, 'Kota Bandung', '3_1', 'SPP KOTA BANDUNG', -6.93547000000000000, 107.59258300000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (239, '35111K', 'Jl. Cimanuk (Garut)', NULL, NULL, 1790, '63200.0', '64990.0', -7.21584500000000000, 107.89928100000000000, -7.23152700000000000, 107.90109400000000000, NULL, 'Kabupaten Garut', '4_1', 'SPP GARUT 1', -7.22367000000000000, 107.90064500000000000, 'UPTD IV Sumedang', 4, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (240, '23211K', 'Jl. Proklamasi (Karawang)', NULL, NULL, 1630, '67370.0', '69000.0', -6.27465600000000000, 107.27083300000000000, -6.26334700000000000, 107.27776400000000000, NULL, 'Kabupaten Karawang', '3_7', 'SPP KAB KARAWANG', -6.27027000000000000, 107.27640200000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (241, '106010', 'Bandung (Kopo) - Soreang', NULL, NULL, 10140, '6360.0', '16500.0', -6.96054400000000000, 107.57956200000000000, -7.02389600000000000, 107.53085700000000000, NULL, 'Kabupaten Bandung', '3_2', 'SPP KAB BANDUNG', -6.99064900000000000, 107.55654200000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (242, '38100K', 'Jl. P. Diponegoro (Bandung)', NULL, NULL, 1369, '4676.0', '6045.0', -6.90108000000000000, 107.62569800000000000, -6.90068100000000000, 107.61510000000000000, NULL, 'Kota Bandung', '3_1', 'SPP KOTA BANDUNG', -6.90124800000000000, 107.62028200000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (243, '21011K', 'Jl. Ir. H. Juanda (Bogor)', NULL, NULL, 1771, '58680.0', '60451.0', -6.59300100000000000, 106.79727700000000000, -6.60453200000000000, 106.79682800000000000, NULL, 'Kota Bogor', '1_3', 'SPP BOGOR I', -6.59818800000000000, 106.79418200000000000, 'UPTD I Cianjur', 1, NULL, NULL, '2021-03-22 16:10:09', NULL);
INSERT INTO `master_ruas_jalan` VALUES (244, '303000', 'Budur - Susukan - Tegalgubug', NULL, NULL, 7600, '26500.0', '34100.0', -6.68909900000000000, 108.36256600000000000, -6.63109500000000000, 108.38443600000000000, NULL, 'Kabupaten Cirebon', '6_5', 'SPP CIREBON', -6.65739300000000000, 108.37223600000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (245, '40011K', 'Jl. Gedebage Selatan (Rel KA - Sp. Derwati - Bts Kota Bandung/Jbt.Tol)', NULL, NULL, 3400, '13900.0', '17300.0', -6.94154200000000000, 107.69185500000000000, -6.96871300000000000, 107.68630200000000000, NULL, 'Kota Bandung', '3_1', 'SPP KOTA BANDUNG', -6.95383600000000000, 107.68645100000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (246, '30713K', 'Jl. Pulasaren (Kota Cirebon)', NULL, NULL, 730, '855.0', '1585.0', -6.72394100000000000, 108.56984200000000000, -6.72469200000000000, 108.56326400000000000, NULL, 'Kota Cirebon', '6_5', 'SPP CIREBON', -6.72426600000000000, 108.56654600000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (247, '191000', 'Sukabumi (Baros) - Sagaranten', NULL, NULL, 46420, '101057.0', '147477.0', -6.96918600000000000, 106.94864400000000000, -7.21467900000000000, 106.88396400000000000, NULL, 'Kabupaten Sukabumi', '2_3', 'SPP SUKABUMI 3', -7.05750500000000000, 106.89146100000000000, 'UPTD II Sukabumi', 2, NULL, NULL, '2021-03-22 16:10:09', NULL);
INSERT INTO `master_ruas_jalan` VALUES (248, '254000', 'Wanayasa - Bts. Purwakarta/Subang', NULL, NULL, 4790, '138100.0', '142890.0', -6.68162200000000000, 107.56610700000000000, -6.66820300000000000, 107.59815500000000000, NULL, 'Kabupaten Purwakarta', '3_6', 'SPP KAB PURWAKARTA', -6.67818800000000000, 107.58290700000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:09', NULL);
INSERT INTO `master_ruas_jalan` VALUES (249, '24800K', 'Jl. Pajajaran (Akses Bandara Husein Satranegara) Kota Bandung', NULL, NULL, 1000, '4090.0', '5090.0', -6.90678200000000000, 107.58774700000000000, -6.90421500000000000, 107.57996900000000000, NULL, 'Kota Bandung', '3_1', 'SPP KOTA BANDUNG', -6.90538000000000000, 107.58389800000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:09', NULL);
INSERT INTO `master_ruas_jalan` VALUES (250, '24913K', 'Jl. Setiabudi (Bandung)', NULL, NULL, 4980, '5950.0', '10930.0', -6.87827600000000000, 107.59776300000000000, -6.84201600000000000, 107.59723400000000000, NULL, 'Kota Bandung', '3_1', 'SPP KOTA BANDUNG', -6.85913400000000000, 107.59488100000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:09', NULL);
INSERT INTO `master_ruas_jalan` VALUES (251, '284000', 'Malangbong - Bts. Garut/Sumedang', NULL, NULL, 8500, '68100.0', '76600.0', -7.06069100000000000, 108.08686400000000000, -7.01346400000000000, 108.09888900000000000, NULL, 'Kabupaten Garut', '4_1', 'SPP GARUT 1', -7.02749500000000000, 108.08512500000000000, 'UPTD IV Sumedang', 4, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (252, '354000', 'Cikajang - Sumadra', NULL, NULL, 12660, '88180.0', '100840.0', -7.34725700000000000, 107.80122700000000000, -7.37865000000000000, 107.72423300000000000, NULL, 'Kabupaten Garut', '4_3', 'SPP GARUT 3', -7.36935400000000000, 107.76382200000000000, 'UPTD IV Sumedang', 4, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (253, '26013K', 'Jl. Jend. A. Yani (Pagaden)', NULL, NULL, 1700, '161000.0', '162700.0', -6.45111500000000000, 107.79845200000000000, -6.45546800000000000, 107.81298300000000000, NULL, 'Kabupaten Subang', '3_5', 'SPP KAB SUBANG 2', -6.45368200000000000, 107.80553900000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (254, '25912K', 'Jl. Arief Rahman Hakim (Subang)', NULL, NULL, 970, '147705.0', '148675.0', -6.55210500000000000, 107.75363000000000000, -6.55612100000000000, 107.76110200000000000, NULL, 'Kabupaten Subang', '3_5', 'SPP KAB SUBANG 2', -6.55408200000000000, 107.75737500000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:09', NULL);
INSERT INTO `master_ruas_jalan` VALUES (255, '09712K', 'Jl. Mayor Oking (Citeureup)', NULL, NULL, 3610, '67600.0', '71210.0', -6.46544100000000000, 106.89128400000000000, -6.48582300000000000, 106.87485600000000000, NULL, 'Kabupaten Bogor', '1_4', 'SPP BOGOR II', -6.47923900000000000, 106.88252200000000000, 'UPTD I Cianjur', 1, NULL, NULL, '2021-03-22 16:10:09', NULL);
INSERT INTO `master_ruas_jalan` VALUES (256, '19111K', 'Jl. Jend. A. Yani (Sukabumi)', NULL, NULL, 170, '93304.0', '93474.0', -6.92314700000000000, 106.93545500000000000, -6.92302200000000000, 106.93401800000000000, NULL, 'Kota Sukabumi', '2_1', 'SPP SUKABUMI 1', -6.92312600000000000, 106.93473500000000000, 'UPTD II Sukabumi', 2, NULL, NULL, '2021-03-22 16:10:09', NULL);
INSERT INTO `master_ruas_jalan` VALUES (257, '25011K', 'Jl. Raya Lembang (Lembang)', NULL, NULL, 2030, '14600.0', '16630.0', -6.81901900000000000, 107.61154300000000000, -6.81447700000000000, 107.62295900000000000, NULL, 'Kabupaten Bandung Barat', '3_3', 'SPP KAB CIMAHI', -6.81232700000000000, 107.61591200000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (258, '21611K', 'Bts. Kota Bogor (Kedunghalang) - Sp.3.Kedunghalang; Jl. Raya Pemda', NULL, NULL, 2170, '61089.0', '63259.0', -6.54373700000000000, 106.80596700000000000, -6.56027500000000000, 106.81307500000000000, NULL, 'Kota Bogor', '1_3', 'SPP BOGOR I', -6.55309500000000000, 106.80782300000000000, 'UPTD I Cianjur', 1, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (259, '21313K', 'Jl. Margonda Raya (Depok)', NULL, NULL, 133, '37529.0', '37662.0', -6.39915700000000000, 106.81986400000000000, -6.39998500000000000, 106.81907300000000000, NULL, 'Kota Depok', '1_3', 'SPP BOGOR I', -6.39958200000000000, 106.81948100000000000, 'UPTD I Cianjur', 1, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (260, '355010', 'Bungbulang - Sukarame', NULL, NULL, 15080, '135830.0', '150910.0', -7.45703200000000000, 107.60130500000000000, -7.43994300000000000, 107.53023100000000000, NULL, 'Kabupaten Garut', '4_3', 'SPP GARUT 3', -7.44368700000000000, 107.56509400000000000, 'UPTD IV Sumedang', 4, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (261, '30712K', 'Jl. Kasepuhan (Kota Cirebon)', NULL, NULL, 200, '455.0', '655.0', -6.72426900000000000, 108.57149800000000000, -6.72394100000000000, 108.56984200000000000, NULL, 'Kota Cirebon', '6_5', 'SPP CIREBON', -6.72401400000000000, 108.57068600000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (262, '368000', 'Kadungora (Leles) - Bts. Bandung/Garut (Cijapati)', NULL, NULL, 8600, '45745.0', '54345.0', -7.07761600000000000, 107.89875900000000000, -7.06052600000000000, 107.84873800000000000, NULL, 'Kabupaten Garut', '4_1', 'SPP GARUT 1', -7.08418700000000000, 107.87058200000000000, 'UPTD IV Sumedang', 4, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (263, '403000', 'Parakan Muncang - Warung Simpang', NULL, NULL, 9100, '27550.0', '36650.0', -6.96677300000000000, 107.82670200000000000, -6.89451400000000000, 107.83243400000000000, NULL, 'Kabupaten Sumedang', '4_6', 'SPP SUMEDANG 2', -6.92902500000000000, 107.82693700000000000, 'UPTD IV Sumedang', 4, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (264, '37000K', 'Jl. Kebon Kawung (Sp. Cicendo - Sp. Pasirkaliki) Kota Bandung', NULL, NULL, 639, '0.0', '639.0', -6.91263400000000000, 107.60397700000000000, -6.91237400000000000, 107.59807600000000000, NULL, 'Kota Bandung', '3_1', 'SPP KOTA BANDUNG', -6.91246600000000000, 107.60102800000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (265, '259000', 'Bts. Purwakarta/Subang - Subang', NULL, NULL, 25130, '120100.0', '145230.0', -6.50122700000000000, 107.56009600000000000, -6.54515400000000000, 107.73377100000000000, NULL, 'Kabupaten Subang', '3_5', 'SPP KAB SUBANG 2', -6.51972100000000000, 107.65447400000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:09', NULL);
INSERT INTO `master_ruas_jalan` VALUES (266, '30700K', 'Jl. Kesambi (Kota Cirebon)', NULL, NULL, 2240, '1795.0', '4035.0', -6.72508300000000000, 108.56128800000000000, -6.73951700000000000, 108.54817600000000000, NULL, 'Kota Cirebon', '6_5', 'SPP CIREBON', -6.73246800000000000, 108.55496200000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:09', NULL);
INSERT INTO `master_ruas_jalan` VALUES (267, '20411K', 'Jl. Siliwangi (Bogor)', NULL, NULL, 225, '64105.0', '64330.0', -6.62010900000000000, 106.81456700000000000, -6.62179000000000000, 106.81675700000000000, NULL, 'Kota Bogor', '1_3', 'SPP BOGOR I', -6.62097600000000000, 106.81564300000000000, 'UPTD I Cianjur', 1, NULL, NULL, '2021-03-22 16:10:09', NULL);
INSERT INTO `master_ruas_jalan` VALUES (268, '26012K', 'Jl. Ion Martasasmita (Pamanukan)', NULL, NULL, 1090, '140860.0', '141950.0', -6.28707300000000000, 107.82061700000000000, -6.29699900000000000, 107.82071600000000000, NULL, 'Kabupaten Subang', '3_5', 'SPP KAB SUBANG 2', -6.29203300000000000, 107.82066500000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:09', NULL);
INSERT INTO `master_ruas_jalan` VALUES (269, '09711K', 'Jl. Kartini (Bekasi)', NULL, NULL, 2120, '34462.0', '36582.0', -6.24324900000000000, 107.00547800000000000, -6.25941500000000000, 106.99506900000000000, NULL, 'Kota Bekasi', '1_5', 'SPP BEKASI', -6.25094100000000000, 106.99980400000000000, 'UPTD I Cianjur', 1, NULL, NULL, '2021-03-22 16:10:09', NULL);
INSERT INTO `master_ruas_jalan` VALUES (270, '25911K', 'Jl. Mayjen. Sutoyo (Subang)', NULL, NULL, 1120, '148675.0', '149795.0', -6.55612100000000000, 107.76110200000000000, -6.55919000000000000, 107.77094300000000000, NULL, 'Kabupaten Subang', '3_5', 'SPP KAB SUBANG 2', -6.55773700000000000, 107.76599400000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:09', NULL);
INSERT INTO `master_ruas_jalan` VALUES (271, '310000', 'Bts. Cirebon/Kuningan (Waled) - Ciledug (Jl. Dewi Sartika)', NULL, NULL, 3360, '62362.0', '65722.0', -6.93664300000000000, 108.70069800000000000, -6.91543200000000000, 108.71544700000000000, NULL, 'Kabupaten Cirebon', '6_5', 'SPP CIREBON', -6.92288800000000000, 108.70294900000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:09', NULL);
INSERT INTO `master_ruas_jalan` VALUES (272, '250000', 'Bts. Kota Bandung - Lembang', NULL, NULL, 3670, '10930.0', '14600.0', -6.84201600000000000, 107.59723400000000000, -6.81901900000000000, 107.61154300000000000, NULL, 'Kabupaten Bandung Barat', '3_3', 'SPP KAB CIMAHI', -6.83214100000000000, 107.60548000000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:09', NULL);
INSERT INTO `master_ruas_jalan` VALUES (273, '09112K', 'Jl. Siliwangi (Kuningan)', NULL, NULL, 1750, '30970.0', '32720.0', -6.95423900000000000, 108.48887400000000000, -6.96830800000000000, 108.48852300000000000, NULL, 'Kabupaten Kuningan', '5_4', 'SPP KUNINGAN 1', -6.96132400000000000, 108.49078700000000000, 'UPTD V Tasikmalaya', 5, NULL, NULL, '2021-03-22 16:10:09', NULL);
INSERT INTO `master_ruas_jalan` VALUES (274, '21013K', 'Jl. Pemuda (Bogor)', NULL, NULL, 1309, '55737.0', '57046.0', -6.56973500000000000, 106.79901300000000000, -6.58127900000000000, 106.79668000000000000, NULL, 'Kota Bogor', '1_3', 'SPP BOGOR I', -6.57511000000000000, 106.79652500000000000, 'UPTD I Cianjur', 1, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (275, '265000', 'Subang - Bantarwaru (Bts. Kab. Subang/Indramayu)', NULL, NULL, 10210, '176443.0', '186653.0', -6.56009400000000000, 107.78649200000000000, -6.57047100000000000, 107.85617400000000000, NULL, 'Kabupaten Subang', '3_4', 'SPP KAB SUBANG 1', -6.55433500000000000, 107.82678800000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (276, '267000', 'Jangga - Cikamurang', NULL, NULL, 34980, '72545.0', '107525.0', -6.39725000000000000, 108.16802800000000000, -6.63621600000000000, 108.03875900000000000, NULL, 'Kabupaten Indramayu', '6_2', 'SPP INDRAMAYU 2', -6.53173200000000000, 108.11803000000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (277, '21412K', 'Jl. Tole Iskandar (Depok)', NULL, NULL, 1060, '38809.0', '39869.0', -6.40086100000000000, 106.83111000000000000, -6.40393100000000000, 106.83847100000000000, NULL, 'Kota Depok', '1_3', 'SPP BOGOR I', -6.40386900000000000, 106.83377500000000000, 'UPTD I Cianjur', 1, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (278, '37200K', 'Jl. Pasir Kaliki (Sp. Kebonkawung - Sp. Pajajaran) Kota Bandung', NULL, NULL, 660, '0.0', '660.0', -6.91237400000000000, 107.59807600000000000, -6.90649200000000000, 107.59750900000000000, NULL, 'Kota Bandung', '3_1', 'SPP KOTA BANDUNG', -6.90943200000000000, 107.59779900000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (279, '35212K', 'Jl. Raya Pameungpeuk (Pameungpeuk)', NULL, NULL, 750, '146740.0', '147490.0', -7.63960700000000000, 107.73464200000000000, -7.64426700000000000, 107.73100500000000000, NULL, 'Kabupaten Garut', '4_2', 'SPP GARUT 2', -7.64141800000000000, 107.73244100000000000, 'UPTD IV Sumedang', 4, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (280, '30714K', 'Jl. Lawanggada (Kota Cirebon)', NULL, NULL, 210, '1585.0', '1795.0', -6.72469200000000000, 108.56326400000000000, -6.72508300000000000, 108.56128800000000000, NULL, 'Kota Cirebon', '6_5', 'SPP CIREBON', -6.72484700000000000, 108.56226800000000000, 'UPTD VI Cirebon', 6, NULL, NULL, '2021-03-22 16:10:09', NULL);
INSERT INTO `master_ruas_jalan` VALUES (281, '253000', 'Purwakarta - Wanayasa', NULL, NULL, 20170, '116420.0', '136590.0', -6.56820900000000000, 107.45944200000000000, -6.67837500000000000, 107.55553000000000000, NULL, 'Kabupaten Purwakarta', '3_6', 'SPP KAB PURWAKARTA', -6.62021300000000000, 107.50752500000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:09', NULL);
INSERT INTO `master_ruas_jalan` VALUES (282, '282000', 'Situraja - Darmaraja', NULL, NULL, 10840, '60240.0', '71080.0', -6.84438500000000000, 108.02777800000000000, -6.91748400000000000, 108.06903400000000000, NULL, 'Kabupaten Sumedang', '4_6', 'SPP SUMEDANG 2', -6.88812400000000000, 108.03821100000000000, 'UPTD IV Sumedang', 4, NULL, NULL, '2021-03-22 16:10:09', NULL);
INSERT INTO `master_ruas_jalan` VALUES (283, '19113K', 'Jl. Rh. Didi Sukardi (Sukabumi)', NULL, NULL, 1920, '95357.0', '97277.0', -6.93146600000000000, 106.93251900000000000, -6.94662200000000000, 106.93473300000000000, NULL, 'Kota Sukabumi', '2_1', 'SPP SUKABUMI 1', -6.93999900000000000, 106.93130100000000000, 'UPTD II Sukabumi', 2, NULL, NULL, '2021-03-22 16:10:09', NULL);
INSERT INTO `master_ruas_jalan` VALUES (284, '25013K', 'Jl. Grand Hotel (Lembang)', NULL, NULL, 1000, '15300.0', '16300.0', -6.81494900000000000, 107.61423900000000000, -6.81742000000000000, 107.62229700000000000, NULL, 'Kabupaten Bandung Barat', '3_3', 'SPP KAB CIMAHI', -6.81577600000000000, 107.61823100000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:09', NULL);
INSERT INTO `master_ruas_jalan` VALUES (285, '21012K', 'Jl. Jend. Sudirman (Bogor)', NULL, NULL, 1303, '57377.0', '58680.0', -6.58127900000000000, 106.79668000000000000, -6.59300100000000000, 106.79727700000000000, NULL, 'Kota Bogor', '1_3', 'SPP BOGOR I', -6.58713800000000000, 106.79703400000000000, 'UPTD I Cianjur', 1, NULL, NULL, '2021-03-22 16:10:09', NULL);
INSERT INTO `master_ruas_jalan` VALUES (286, '313000', 'Oleced - Luragung', NULL, NULL, 8370, '42560.0', '50930.0', -6.99244100000000000, 108.56794100000000000, -7.01773400000000000, 108.63679900000000000, NULL, 'Kabupaten Kuningan', '5_4', 'SPP KUNINGAN 1', -7.01071300000000000, 108.60062000000000000, 'UPTD V Tasikmalaya', 5, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (287, '256000', 'Sumedang - Bts. Sumedang/Subang (Cikaramas)', NULL, NULL, 20910, '40980.0', '61890.0', -6.86338500000000000, 107.89733000000000000, -6.76613000000000000, 107.83752700000000000, NULL, 'Kabupaten Sumedang', '4_5', 'SPP SUMEDANG 1', -6.80949400000000000, 107.86090300000000000, 'UPTD IV Sumedang', 4, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (288, '31311K', 'Jl. Raya Luragung (Luragung)', NULL, NULL, 210, '50930.0', '51140.0', -7.01773400000000000, 108.63679900000000000, -7.01752900000000000, 108.63833600000000000, NULL, 'Kabupaten Kuningan', '5_4', 'SPP KUNINGAN 1', -7.01797400000000000, 108.63774100000000000, 'UPTD V Tasikmalaya', 5, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (289, '349000', 'Nagreg - Bts. Bandung/Garut', NULL, NULL, 2330, '40100.0', '42430.0', -7.03635200000000000, 107.90740800000000000, -7.05278600000000000, 107.89913900000000000, NULL, 'Kabupaten Bandung', '3_2', 'SPP KAB BANDUNG', -7.04492300000000000, 107.90436800000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (290, '255000', 'Jl. Cagak - Bts. Purwakarta/Subang', NULL, NULL, 13710, '167150.0', '180860.0', -6.67753600000000000, 107.68266000000000000, -6.66820300000000000, 107.59815500000000000, NULL, 'Kabupaten Subang', '3_4', 'SPP KAB SUBANG 1', -6.66774100000000000, 107.64554800000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:08', NULL);
INSERT INTO `master_ruas_jalan` VALUES (291, '09714K', 'Jl. Mayor Oking (Cibinong)', NULL, NULL, 3790, '71210.0', '75000.0', -6.48582300000000000, 106.87485600000000000, -6.46546600000000000, 106.85560900000000000, NULL, 'Kabupaten Bogor', '1_4', 'SPP BOGOR II', -6.47839100000000000, 106.86346400000000000, 'UPTD I Cianjur', 1, NULL, NULL, '2021-03-22 16:10:09', NULL);
INSERT INTO `master_ruas_jalan` VALUES (292, '25914K', 'Jl. Dangdeur (Subang)', NULL, NULL, 950, '144925.0', '145875.0', -6.54515400000000000, 107.73377100000000000, -6.55032100000000000, 107.73941000000000000, NULL, 'Kabupaten Subang', '3_5', 'SPP KAB SUBANG 2', -6.54699500000000000, 107.73751700000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:09', NULL);
INSERT INTO `master_ruas_jalan` VALUES (293, '261000', 'Pagaden - Subang', NULL, NULL, 8670, '164190.0', '172860.0', -6.46872400000000000, 107.80979100000000000, -6.53816200000000000, 107.78205700000000000, NULL, 'Kabupaten Subang', '3_5', 'SPP KAB SUBANG 2', -6.50645100000000000, 107.80402300000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:09', NULL);
INSERT INTO `master_ruas_jalan` VALUES (294, '17012K', 'Jl. Baros (Cimahi)', NULL, NULL, 1420, '11810.0', '13230.0', -6.89248300000000000, 107.53673600000000000, -6.90346400000000000, 107.53504600000000000, NULL, 'Kota Cimahi', '3_3', 'SPP KAB CIMAHI', -6.89854200000000000, 107.53654800000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:09', NULL);
INSERT INTO `master_ruas_jalan` VALUES (295, '34511K', 'Jl. Suherman (Garut)', NULL, NULL, 1370, '59430.0', '60800.0', -7.19031700000000000, 107.88951100000000000, -7.19005800000000000, 107.90227100000000000, NULL, 'Kabupaten Garut', '4_1', 'SPP GARUT 1', -7.19046000000000000, 107.89588000000000000, 'UPTD IV Sumedang', 4, NULL, NULL, '2021-03-22 16:10:09', NULL);
INSERT INTO `master_ruas_jalan` VALUES (296, '35211K', 'Jl. Raya Cikajang (Cikajang)', NULL, NULL, 3230, '88190.0', '91420.0', -7.34725700000000000, 107.80122700000000000, -7.36846000000000000, 107.81515200000000000, NULL, 'Kabupaten Garut', '4_2', 'SPP GARUT 2', -7.35701600000000000, 107.80813000000000000, 'UPTD IV Sumedang', 4, NULL, NULL, '2021-03-22 16:10:09', NULL);
INSERT INTO `master_ruas_jalan` VALUES (297, '20413K', 'Jl. Pahlawan (Bogor)', NULL, NULL, 2140, '60607.0', '62747.0', -6.60774200000000000, 106.79506400000000000, -6.61879600000000000, 106.80686500000000000, NULL, 'Kota Bogor', '1_3', 'SPP BOGOR I', -6.61216200000000000, 106.80198400000000000, 'UPTD I Cianjur', 1, NULL, NULL, '2021-03-22 16:10:09', NULL);
INSERT INTO `master_ruas_jalan` VALUES (298, '26014K', 'Jl. Raya Kamarung (Pagaden)', NULL, NULL, 1490, '162700.0', '164190.0', -6.45546800000000000, 107.81298300000000000, -6.46872400000000000, 107.80979100000000000, NULL, 'Kabupaten Subang', '3_5', 'SPP KAB SUBANG 2', -6.46182300000000000, 107.81038400000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:09', NULL);
INSERT INTO `master_ruas_jalan` VALUES (299, '19112K', 'Jl. Oto Iskandardinata (Sukabumi)', NULL, NULL, 950, '94405.0', '95355.0', -6.92302200000000000, 106.93401800000000000, -6.93146600000000000, 106.93251900000000000, NULL, 'Kota Sukabumi', '2_1', 'SPP SUKABUMI 1', -6.92726900000000000, 106.93341500000000000, 'UPTD II Sukabumi', 2, NULL, NULL, '2021-03-22 16:10:09', NULL);
INSERT INTO `master_ruas_jalan` VALUES (300, '25012K', 'Jl. Panorama (Lembang)', NULL, NULL, 300, '16300.0', '16600.0', -6.81742000000000000, 107.62229700000000000, -6.81447700000000000, 107.62295900000000000, NULL, 'Kabupaten Bandung Barat', '3_3', 'SPP KAB CIMAHI', -6.81596900000000000, 107.62273600000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:09', NULL);
INSERT INTO `master_ruas_jalan` VALUES (304, 'A2', 'Asia Afrika - Naripan', NULL, NULL, 1000, '9000.0', '10000.0', -6.92203243930110000, 107.61489293910000000, -6.92060348569380000, 107.61530399677000000, NULL, 'Kota Bandung', '3_1', 'SPP Kota Bandung', -6.92195600000000000, 107.61359600000000000, 'UPTD III Bandung', 3, NULL, NULL, '2021-03-22 16:10:09', NULL);
INSERT INTO `master_ruas_jalan` VALUES (306, '191K16', 'Jalan Pembangunan (Sukabumi)', '6', 'SUKABUMI', 2553, 'KM.BDG 90+557', 'KM.BDG. 93+110', -6.91884864759500000, 106.95882060680000000, -6.92844749891680000, 106.95854568038000000, NULL, 'KOTA SUKABUMI', '2-1', 'SUKABUMI 1', -6.93788906328350000, 106.95378744159000000, 'WILAYAH PELAYANAN II', 2, '2021-03-04 13:44:31', '1', '2021-03-04 13:51:24', '1');
INSERT INTO `master_ruas_jalan` VALUES (307, '190k', 'Jalan sukabumi', '6', 'Km Bdg 1+100', 1000, 'Km Bdg 1+100', 'Km Bdg 2+000', -6.91102430776879700, 106.89880886230320000, -6.90386686051504600, 106.86722316894387000, NULL, 'Sukabumi', 'sppj', 'sukabumi 5', -6.90352602699213500, 106.88438930663915000, 'UPTD II', 2, '2021-03-18 15:07:17', '428', NULL, NULL);

-- ----------------------------
-- Table structure for master_uptd
-- ----------------------------
DROP TABLE IF EXISTS `master_uptd`;
CREATE TABLE `master_uptd`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of master_uptd
-- ----------------------------
INSERT INTO `master_uptd` VALUES (1, 'UPTD-I');
INSERT INTO `master_uptd` VALUES (2, 'UPTD-II');
INSERT INTO `master_uptd` VALUES (3, 'UPTD-III');
INSERT INTO `master_uptd` VALUES (4, 'UPTD-IV');
INSERT INTO `master_uptd` VALUES (5, 'UPTD-V');
INSERT INTO `master_uptd` VALUES (6, 'UPTD-VI');

-- ----------------------------
-- Table structure for master_user
-- ----------------------------
DROP TABLE IF EXISTS `master_user`;
CREATE TABLE `master_user`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pass` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of master_user
-- ----------------------------
INSERT INTO `master_user` VALUES (1, 'admin', 'a@m.com', '123');

-- ----------------------------
-- Table structure for member
-- ----------------------------
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member`  (
  `id_member` int NOT NULL AUTO_INCREMENT,
  `nm_member` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_lengkap` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `akses` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jabatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat_member` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `telp` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `gambar` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nik` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `level` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kantor_id` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `perusahaan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `unit` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_input` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_update` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_member`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of member
-- ----------------------------
INSERT INTO `member` VALUES (1, 'Admin', 'Administrator', 'ADMINISTRATOR', 'ADMINISTRATOR', 'Tes', '0896', '123@gmail.com', 'apple1.png', '1990112233', 'admin', 'k01', '', 'DINAS BINA MARGA DAN PENATAAN RUANG PROVINSI JAWA BARAT', '', '12 August 2020');
INSERT INTO `member` VALUES (2, 'kontraktor', 'PT. ERA TATA BUANA', 'KONTRAKTOR', 'KONTRAKTOR', '', '', '', '06072020224602d.png', '', 'user', 'k2', 'PT. ERA TATA BUANA', 'UPTD-II', '', '');
INSERT INTO `member` VALUES (3, 'konsultan', 'PT. JASA MITRA MANUNGGAL', 'KONSULTAN', 'KONSULTAN', '', '', '', 'apple.png', '', 'user', 'k3', 'PT. JASA MITRA MANUNGGAL', 'UPTD-III', '', '');
INSERT INTO `member` VALUES (4, 'PPK', 'Maman Suparman, ST. MT', 'PPK', 'PPK', '', '', '', 'dd.png', '', 'user', 'k1', '', 'UPTD-I', '', '');
INSERT INTO `member` VALUES (5, 'admin_uptd', 'Admin UPTD', 'ADMIN-UPTD', 'ADMIN_UPTD', '', '', '', '', '', 'user', 'k4', '', 'UPTD-IV', '', '');
INSERT INTO `member` VALUES (8, 'tes123 cek update 123', 'tes1234', 'ADMIN-UPTD', 'DIREKTUR', 'aw', '08219372189', 'email@mai.com', '', '123123', '', '', 'LIKATAMA - MANGGALA KSO.', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - I', '', '17 March 2021');
INSERT INTO `member` VALUES (9, 'tes123', 'tes1234', 'ADMIN-UPTD', 'DIREKTUR', 'aw', '08219372189', 'email@mai.com', '', '123123', '', '', 'LIKATAMA - MANGGALA KSO.', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - I', '', '');
INSERT INTO `member` VALUES (10, 'user1', 'tes1234', 'USER', 'DIREKTUR', 'aw', '08219372189', 'email@mai.com', '', '123123', '', '', 'PT .BINA INFRA', 'BIDANG PEMELIHARAAN DAN PEMBANGUNAN JALAN DAN JEMBATAN ', '', '');

-- ----------------------------
-- Table structure for menu_log
-- ----------------------------
DROP TABLE IF EXISTS `menu_log`;
CREATE TABLE `menu_log`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_login_user` int NOT NULL,
  `catatan_menu` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jam` time NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1189 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of menu_log
-- ----------------------------
INSERT INTO `menu_log` VALUES (1, 1, 'Dashboard', '03:10:22');
INSERT INTO `menu_log` VALUES (2, 1, 'Logout', '03:10:30');
INSERT INTO `menu_log` VALUES (3, 5, 'Dashboard', '03:11:19');
INSERT INTO `menu_log` VALUES (4, 5, 'Logout', '03:14:00');
INSERT INTO `menu_log` VALUES (5, 6, 'Dashboard', '03:14:29');
INSERT INTO `menu_log` VALUES (6, 6, 'Dashboard', '03:14:36');
INSERT INTO `menu_log` VALUES (7, 6, 'Logout', '03:14:40');
INSERT INTO `menu_log` VALUES (8, 3, 'Dashboard', '03:15:28');
INSERT INTO `menu_log` VALUES (9, 3, 'Logout', '15:15:30');
INSERT INTO `menu_log` VALUES (10, 1, 'Dashboard', '03:35:58');
INSERT INTO `menu_log` VALUES (11, 1, 'Catatan Log', '03:40:09');
INSERT INTO `menu_log` VALUES (12, 1, 'Edit User', '04:43:59');
INSERT INTO `menu_log` VALUES (13, 1, 'Catatan Log', '04:44:01');
INSERT INTO `menu_log` VALUES (14, 1, 'Logout', '16:44:42');
INSERT INTO `menu_log` VALUES (15, 1, 'Dashboard', '04:44:47');
INSERT INTO `menu_log` VALUES (16, 1, 'Catatan Log', '04:44:50');
INSERT INTO `menu_log` VALUES (17, 1, 'Logout', '16:45:22');
INSERT INTO `menu_log` VALUES (18, 1, 'Dashboard', '04:45:41');
INSERT INTO `menu_log` VALUES (19, 1, 'Catatan Log', '04:45:50');
INSERT INTO `menu_log` VALUES (20, 1, 'Logout', '16:46:13');
INSERT INTO `menu_log` VALUES (21, 1, 'Dashboard', '05:53:13');
INSERT INTO `menu_log` VALUES (22, 1, 'Data Umum', '05:53:23');
INSERT INTO `menu_log` VALUES (23, 1, 'Buat Data Umum', '05:53:24');
INSERT INTO `menu_log` VALUES (24, 1, 'Dashboard', '06:18:49');
INSERT INTO `menu_log` VALUES (25, 1, 'Data Umum', '06:18:54');
INSERT INTO `menu_log` VALUES (26, 1, 'Buat Data Umum', '06:18:55');
INSERT INTO `menu_log` VALUES (27, 1, 'Data Umum', '06:18:56');
INSERT INTO `menu_log` VALUES (28, 1, 'Jadual', '06:19:00');
INSERT INTO `menu_log` VALUES (29, 1, 'Data Umum', '06:19:01');
INSERT INTO `menu_log` VALUES (30, 1, 'Buat Data Umum', '06:19:05');
INSERT INTO `menu_log` VALUES (31, 1, 'Dashboard', '10:14:43');
INSERT INTO `menu_log` VALUES (32, 1, 'Data Umum', '10:14:51');
INSERT INTO `menu_log` VALUES (33, 1, 'Jadual', '10:14:56');
INSERT INTO `menu_log` VALUES (34, 1, 'Data Umum', '10:15:03');
INSERT INTO `menu_log` VALUES (35, 1, 'Jadual', '10:15:06');
INSERT INTO `menu_log` VALUES (36, 1, 'Request', '10:15:07');
INSERT INTO `menu_log` VALUES (37, 1, 'Jadual', '10:15:21');
INSERT INTO `menu_log` VALUES (38, 1, 'Data Umum', '10:26:16');
INSERT INTO `menu_log` VALUES (39, 1, 'Dashboard', '10:26:26');
INSERT INTO `menu_log` VALUES (40, 1, 'Dashboard', '10:07:28');
INSERT INTO `menu_log` VALUES (41, 1, 'Dashboard', '10:49:32');
INSERT INTO `menu_log` VALUES (42, 1, 'Laporan Pekerjaan', '11:02:29');
INSERT INTO `menu_log` VALUES (43, 1, 'Dashboard', '01:58:35');
INSERT INTO `menu_log` VALUES (44, 1, 'Dashboard', '10:53:23');
INSERT INTO `menu_log` VALUES (45, 1, 'Dashboard', '10:53:30');
INSERT INTO `menu_log` VALUES (46, 1, 'Catatan Log', '10:53:54');
INSERT INTO `menu_log` VALUES (47, 1, 'Dashboard', '11:04:05');
INSERT INTO `menu_log` VALUES (48, 1, 'Dashboard', '11:44:00');
INSERT INTO `menu_log` VALUES (49, 1, 'Data Umum', '11:44:06');
INSERT INTO `menu_log` VALUES (50, 1, 'Request', '11:44:08');
INSERT INTO `menu_log` VALUES (51, 1, 'Jadual', '11:44:09');
INSERT INTO `menu_log` VALUES (52, 1, 'Data Umum', '11:44:09');
INSERT INTO `menu_log` VALUES (53, 1, 'Buat Data Umum', '11:44:10');
INSERT INTO `menu_log` VALUES (54, 1, 'Jadual', '11:44:16');
INSERT INTO `menu_log` VALUES (55, 1, 'Edit Jadual', '11:44:18');
INSERT INTO `menu_log` VALUES (56, 1, 'Dashboard', '12:11:47');
INSERT INTO `menu_log` VALUES (57, 1, 'Dashboard', '12:11:54');
INSERT INTO `menu_log` VALUES (58, 1, 'Dashboard', '12:12:00');
INSERT INTO `menu_log` VALUES (59, 1, 'Dashboard', '02:01:00');
INSERT INTO `menu_log` VALUES (60, 1, 'Dashboard', '02:01:20');
INSERT INTO `menu_log` VALUES (61, 1, 'Laporan Pekerjaan', '02:01:24');
INSERT INTO `menu_log` VALUES (62, 1, 'Laporan Pekerjaan', '02:24:52');
INSERT INTO `menu_log` VALUES (63, 1, 'Perencanaan Konsultan', '02:25:00');
INSERT INTO `menu_log` VALUES (64, 1, 'Data Umum', '02:43:58');
INSERT INTO `menu_log` VALUES (65, 1, 'Buat Data Umum', '02:44:29');
INSERT INTO `menu_log` VALUES (66, 1, 'Buat Data Umum', '02:46:10');
INSERT INTO `menu_log` VALUES (67, 1, 'Data Umum', '02:46:12');
INSERT INTO `menu_log` VALUES (68, 1, 'Edit Data Umum', '02:46:19');
INSERT INTO `menu_log` VALUES (69, 1, 'Data Umum', '02:46:26');
INSERT INTO `menu_log` VALUES (70, 1, 'Buat Data Umum', '02:46:28');
INSERT INTO `menu_log` VALUES (71, 1, 'Data Umum', '02:46:34');
INSERT INTO `menu_log` VALUES (72, 1, 'Buat Data Umum', '02:46:37');
INSERT INTO `menu_log` VALUES (73, 1, 'Data Umum', '02:46:41');
INSERT INTO `menu_log` VALUES (74, 1, 'Buat Jadual', '02:46:48');
INSERT INTO `menu_log` VALUES (75, 1, 'Jadual', '02:47:13');
INSERT INTO `menu_log` VALUES (76, 1, 'Edit Jadual', '02:47:19');
INSERT INTO `menu_log` VALUES (77, 1, 'Jadual', '02:47:28');
INSERT INTO `menu_log` VALUES (78, 1, 'Buat Request', '02:47:30');
INSERT INTO `menu_log` VALUES (79, 1, 'Jadual', '02:47:48');
INSERT INTO `menu_log` VALUES (80, 1, 'Edit Jadual', '02:47:52');
INSERT INTO `menu_log` VALUES (81, 1, 'Jadual', '02:47:55');
INSERT INTO `menu_log` VALUES (82, 1, 'Buat Request', '02:48:03');
INSERT INTO `menu_log` VALUES (83, 1, 'Request', '02:50:25');
INSERT INTO `menu_log` VALUES (84, 1, 'Edit Request', '02:50:29');
INSERT INTO `menu_log` VALUES (85, 1, 'Request', '02:50:35');
INSERT INTO `menu_log` VALUES (86, 1, 'Buat Laporan Harian', '02:50:39');
INSERT INTO `menu_log` VALUES (87, 1, 'Request', '02:50:49');
INSERT INTO `menu_log` VALUES (88, 1, 'Request', '02:53:00');
INSERT INTO `menu_log` VALUES (89, 1, 'Laporan Harian', '02:53:03');
INSERT INTO `menu_log` VALUES (90, 1, 'Edit Laporan Harian', '02:53:13');
INSERT INTO `menu_log` VALUES (91, 1, 'Laporan Harian', '02:53:46');
INSERT INTO `menu_log` VALUES (92, 1, 'Request', '02:54:10');
INSERT INTO `menu_log` VALUES (93, 1, 'Jadual', '02:54:13');
INSERT INTO `menu_log` VALUES (94, 1, 'Data Umum', '02:54:20');
INSERT INTO `menu_log` VALUES (95, 1, 'Request', '02:54:49');
INSERT INTO `menu_log` VALUES (96, 1, 'Dashboard', '03:43:15');
INSERT INTO `menu_log` VALUES (97, 1, 'Laporan Harian', '03:43:56');
INSERT INTO `menu_log` VALUES (98, 1, 'Data Umum', '03:46:06');
INSERT INTO `menu_log` VALUES (99, 1, 'Buat Jadual', '03:46:10');
INSERT INTO `menu_log` VALUES (100, 1, 'Jadual', '03:46:13');
INSERT INTO `menu_log` VALUES (101, 1, 'Buat Request', '03:46:17');
INSERT INTO `menu_log` VALUES (102, 1, 'Request', '03:46:21');
INSERT INTO `menu_log` VALUES (103, 1, 'Jadual', '03:46:25');
INSERT INTO `menu_log` VALUES (104, 1, 'Buat Request', '03:46:28');
INSERT INTO `menu_log` VALUES (105, 1, 'Request', '03:48:13');
INSERT INTO `menu_log` VALUES (106, 1, 'Data Umum', '03:48:27');
INSERT INTO `menu_log` VALUES (107, 1, 'Jadual', '04:03:00');
INSERT INTO `menu_log` VALUES (108, 1, 'Logout', '16:03:06');
INSERT INTO `menu_log` VALUES (109, 1, 'Dashboard', '11:56:58');
INSERT INTO `menu_log` VALUES (110, 1, 'Jadual', '11:57:01');
INSERT INTO `menu_log` VALUES (111, 1, 'Data Umum', '11:57:02');
INSERT INTO `menu_log` VALUES (112, 1, 'Buat Jadual', '11:57:05');
INSERT INTO `menu_log` VALUES (113, 1, 'Dashboard', '02:53:39');
INSERT INTO `menu_log` VALUES (114, 1, 'Kontraktor', '02:56:03');
INSERT INTO `menu_log` VALUES (115, 1, 'Laporan Harian', '02:56:30');
INSERT INTO `menu_log` VALUES (116, 1, 'Laporan Harian', '02:56:36');
INSERT INTO `menu_log` VALUES (117, 1, 'Laporan Pekerjaan', '02:58:24');
INSERT INTO `menu_log` VALUES (118, 1, 'Dashboard', '03:05:30');
INSERT INTO `menu_log` VALUES (119, 1, 'Logout', '15:05:37');
INSERT INTO `menu_log` VALUES (120, 1, 'Dashboard', '03:05:49');
INSERT INTO `menu_log` VALUES (121, 1, 'Kontraktor', '03:11:53');
INSERT INTO `menu_log` VALUES (122, 1, 'Konsultan', '03:12:07');
INSERT INTO `menu_log` VALUES (123, 1, 'Laporan Harian', '03:16:30');
INSERT INTO `menu_log` VALUES (124, 1, 'Request', '03:18:47');
INSERT INTO `menu_log` VALUES (125, 1, 'Data Umum', '03:48:26');
INSERT INTO `menu_log` VALUES (126, 1, 'Jadual', '03:48:28');
INSERT INTO `menu_log` VALUES (127, 1, 'Kontraktor', '03:48:35');
INSERT INTO `menu_log` VALUES (128, 1, 'Data Umum', '03:50:27');
INSERT INTO `menu_log` VALUES (129, 1, 'Jadual', '03:50:29');
INSERT INTO `menu_log` VALUES (130, 1, 'Request', '03:50:30');
INSERT INTO `menu_log` VALUES (131, 1, 'Dashboard', '01:07:40');
INSERT INTO `menu_log` VALUES (132, 1, 'Dashboard', '10:58:17');
INSERT INTO `menu_log` VALUES (133, 1, 'Logout', '10:58:29');
INSERT INTO `menu_log` VALUES (134, 2, 'Dashboard', '10:58:44');
INSERT INTO `menu_log` VALUES (135, 2, 'Logout', '10:58:55');
INSERT INTO `menu_log` VALUES (136, 3, 'Dashboard', '10:59:09');
INSERT INTO `menu_log` VALUES (137, 3, 'Logout', '10:59:18');
INSERT INTO `menu_log` VALUES (138, 5, 'Dashboard', '10:59:26');
INSERT INTO `menu_log` VALUES (139, 5, 'Logout', '10:59:38');
INSERT INTO `menu_log` VALUES (140, 1, 'Dashboard', '10:59:49');
INSERT INTO `menu_log` VALUES (141, 1, 'Dashboard', '11:06:05');
INSERT INTO `menu_log` VALUES (142, 1, 'Pengguna', '11:06:23');
INSERT INTO `menu_log` VALUES (143, 1, 'Dashboard', '11:06:24');
INSERT INTO `menu_log` VALUES (144, 1, 'Dashboard', '11:07:45');
INSERT INTO `menu_log` VALUES (145, 1, 'Dashboard', '11:07:45');
INSERT INTO `menu_log` VALUES (146, 1, 'Pengguna', '11:07:59');
INSERT INTO `menu_log` VALUES (147, 1, 'Pengguna', '11:08:36');
INSERT INTO `menu_log` VALUES (148, 1, 'Pengguna', '11:12:23');
INSERT INTO `menu_log` VALUES (149, 1, 'Pengguna', '11:12:49');
INSERT INTO `menu_log` VALUES (150, 1, 'Jenis Pekerjaan', '11:12:53');
INSERT INTO `menu_log` VALUES (151, 1, 'Pengguna', '11:12:56');
INSERT INTO `menu_log` VALUES (152, 1, 'Pengguna', '11:14:08');
INSERT INTO `menu_log` VALUES (153, 1, 'Jenis Pekerjaan', '11:14:51');
INSERT INTO `menu_log` VALUES (154, 1, 'Pengguna', '11:14:57');
INSERT INTO `menu_log` VALUES (155, 1, 'Pengguna', '11:14:57');
INSERT INTO `menu_log` VALUES (156, 1, 'Pengguna', '11:15:10');
INSERT INTO `menu_log` VALUES (157, 1, 'Pengguna', '11:16:15');
INSERT INTO `menu_log` VALUES (158, 1, 'Pengguna', '11:16:28');
INSERT INTO `menu_log` VALUES (159, 1, 'Edit Pengguna', '11:16:46');
INSERT INTO `menu_log` VALUES (160, 1, 'Pengguna', '11:16:59');
INSERT INTO `menu_log` VALUES (161, 1, 'Pengguna', '11:17:59');
INSERT INTO `menu_log` VALUES (162, 1, 'Pengguna', '11:18:10');
INSERT INTO `menu_log` VALUES (163, 1, 'Pengguna', '11:18:24');
INSERT INTO `menu_log` VALUES (164, 1, 'Dashboard', '11:18:49');
INSERT INTO `menu_log` VALUES (165, 1, 'Dashboard', '11:18:51');
INSERT INTO `menu_log` VALUES (166, 1, 'Dashboard', '11:18:53');
INSERT INTO `menu_log` VALUES (167, 1, 'Data Umum', '11:18:54');
INSERT INTO `menu_log` VALUES (168, 1, 'Jenis Pekerjaan', '11:19:03');
INSERT INTO `menu_log` VALUES (169, 1, 'PPK', '11:19:07');
INSERT INTO `menu_log` VALUES (170, 1, 'Jadual', '11:19:14');
INSERT INTO `menu_log` VALUES (171, 1, 'Kontraktor', '11:19:37');
INSERT INTO `menu_log` VALUES (172, 1, 'Pengguna', '11:19:52');
INSERT INTO `menu_log` VALUES (173, 1, 'Request', '11:19:55');
INSERT INTO `menu_log` VALUES (174, 1, 'Laporan Harian', '11:20:14');
INSERT INTO `menu_log` VALUES (175, 1, 'Request', '11:20:34');
INSERT INTO `menu_log` VALUES (176, 1, 'Jadual', '11:20:38');
INSERT INTO `menu_log` VALUES (177, 1, 'Jadual', '11:20:43');
INSERT INTO `menu_log` VALUES (178, 1, 'Kontraktor', '11:20:52');
INSERT INTO `menu_log` VALUES (179, 1, 'Kontraktor', '11:20:53');
INSERT INTO `menu_log` VALUES (180, 1, 'Pengguna', '11:20:57');
INSERT INTO `menu_log` VALUES (181, 1, 'Konsultan', '11:21:04');
INSERT INTO `menu_log` VALUES (182, 1, 'Kontraktor', '11:21:12');
INSERT INTO `menu_log` VALUES (183, 1, 'PPK', '11:21:17');
INSERT INTO `menu_log` VALUES (184, 1, 'Konsultan', '11:21:18');
INSERT INTO `menu_log` VALUES (185, 1, 'PPK', '11:21:20');
INSERT INTO `menu_log` VALUES (186, 1, 'PPK', '11:21:29');
INSERT INTO `menu_log` VALUES (187, 1, 'Jenis Pekerjaan', '11:21:31');
INSERT INTO `menu_log` VALUES (188, 1, 'PPK', '11:21:50');
INSERT INTO `menu_log` VALUES (189, 1, 'Pengguna', '11:21:53');
INSERT INTO `menu_log` VALUES (190, 1, 'Edit Pengguna', '11:22:03');
INSERT INTO `menu_log` VALUES (191, 1, 'Pengguna', '11:22:12');
INSERT INTO `menu_log` VALUES (192, 1, 'Pengguna', '11:22:23');
INSERT INTO `menu_log` VALUES (193, 1, 'Konsultan', '11:22:33');
INSERT INTO `menu_log` VALUES (194, 1, 'Pengguna', '11:22:35');
INSERT INTO `menu_log` VALUES (195, 1, 'Kontraktor', '11:22:43');
INSERT INTO `menu_log` VALUES (196, 1, 'Jenis Pekerjaan', '11:22:47');
INSERT INTO `menu_log` VALUES (197, 1, 'Pengguna', '11:22:50');
INSERT INTO `menu_log` VALUES (198, 1, 'Jenis Pekerjaan', '11:23:01');
INSERT INTO `menu_log` VALUES (199, 1, 'Data Kontrak', '11:23:51');
INSERT INTO `menu_log` VALUES (200, 1, 'Perencanaan Konsultan', '11:24:17');
INSERT INTO `menu_log` VALUES (201, 1, 'Laporan Pekerjaan', '11:24:49');
INSERT INTO `menu_log` VALUES (202, 1, 'Buat Data Umum', '11:25:11');
INSERT INTO `menu_log` VALUES (203, 1, 'Data Umum', '11:25:50');
INSERT INTO `menu_log` VALUES (204, 1, 'Dashboard', '11:25:51');
INSERT INTO `menu_log` VALUES (205, 1, 'Data Umum', '11:26:02');
INSERT INTO `menu_log` VALUES (206, 1, 'Buat Data Umum', '11:26:22');
INSERT INTO `menu_log` VALUES (207, 1, 'Pengguna', '11:26:23');
INSERT INTO `menu_log` VALUES (208, 1, 'Buat Data Umum', '11:26:53');
INSERT INTO `menu_log` VALUES (209, 1, 'Pengguna', '11:27:20');
INSERT INTO `menu_log` VALUES (210, 1, 'Data Umum', '11:27:31');
INSERT INTO `menu_log` VALUES (211, 1, 'Dashboard', '11:29:41');
INSERT INTO `menu_log` VALUES (212, 1, 'Pengguna', '11:30:04');
INSERT INTO `menu_log` VALUES (213, 1, 'Buat Data Umum', '11:30:28');
INSERT INTO `menu_log` VALUES (214, 1, 'Buat Data Umum', '11:30:53');
INSERT INTO `menu_log` VALUES (215, 1, 'Pengguna', '11:31:15');
INSERT INTO `menu_log` VALUES (216, 1, 'Jadual', '11:32:31');
INSERT INTO `menu_log` VALUES (217, 1, 'Jadual', '11:32:57');
INSERT INTO `menu_log` VALUES (218, 1, 'Request', '11:32:58');
INSERT INTO `menu_log` VALUES (219, 1, 'Data Kontrak', '11:33:32');
INSERT INTO `menu_log` VALUES (220, 1, 'Laporan Harian', '11:33:49');
INSERT INTO `menu_log` VALUES (221, 1, 'Kontraktor', '11:34:12');
INSERT INTO `menu_log` VALUES (222, 1, 'Edit Laporan Harian', '11:34:18');
INSERT INTO `menu_log` VALUES (223, 1, 'Laporan Harian', '11:34:34');
INSERT INTO `menu_log` VALUES (224, 1, 'Kontraktor', '11:34:55');
INSERT INTO `menu_log` VALUES (225, 1, 'Pengguna', '11:34:58');
INSERT INTO `menu_log` VALUES (226, 1, 'Kontraktor', '11:34:59');
INSERT INTO `menu_log` VALUES (227, 1, 'Pengguna', '11:36:05');
INSERT INTO `menu_log` VALUES (228, 1, 'Kontraktor', '11:36:44');
INSERT INTO `menu_log` VALUES (229, 1, 'Konsultan', '11:37:04');
INSERT INTO `menu_log` VALUES (230, 1, 'Dashboard', '11:37:11');
INSERT INTO `menu_log` VALUES (231, 1, 'Data Umum', '11:37:53');
INSERT INTO `menu_log` VALUES (232, 1, 'Buat Jadual', '11:38:08');
INSERT INTO `menu_log` VALUES (233, 1, 'Pengguna', '11:38:47');
INSERT INTO `menu_log` VALUES (234, 1, 'Buat Jadual', '11:39:06');
INSERT INTO `menu_log` VALUES (235, 1, 'PPK', '11:39:31');
INSERT INTO `menu_log` VALUES (236, 1, 'PPK', '11:39:59');
INSERT INTO `menu_log` VALUES (237, 1, 'Jenis Pekerjaan', '11:40:13');
INSERT INTO `menu_log` VALUES (238, 1, 'Jenis Pekerjaan', '11:41:00');
INSERT INTO `menu_log` VALUES (239, 1, 'Pengguna', '11:41:11');
INSERT INTO `menu_log` VALUES (240, 1, 'Pengguna', '11:41:31');
INSERT INTO `menu_log` VALUES (241, 1, 'Pengguna', '11:41:39');
INSERT INTO `menu_log` VALUES (242, 1, 'Kontraktor', '11:42:00');
INSERT INTO `menu_log` VALUES (243, 1, 'Kontraktor', '11:43:33');
INSERT INTO `menu_log` VALUES (244, 1, 'Konsultan', '11:44:16');
INSERT INTO `menu_log` VALUES (245, 1, 'Pengguna', '11:44:45');
INSERT INTO `menu_log` VALUES (246, 1, 'Jadual', '11:45:13');
INSERT INTO `menu_log` VALUES (247, 1, 'Data Umum', '11:45:34');
INSERT INTO `menu_log` VALUES (248, 1, 'Buat Data Umum', '11:45:38');
INSERT INTO `menu_log` VALUES (249, 1, 'Data Umum', '11:46:40');
INSERT INTO `menu_log` VALUES (250, 1, 'Buat Jadual', '11:47:04');
INSERT INTO `menu_log` VALUES (251, 1, 'Dashboard', '11:48:24');
INSERT INTO `menu_log` VALUES (252, 1, 'Data Umum', '11:48:50');
INSERT INTO `menu_log` VALUES (253, 1, 'Request', '11:49:04');
INSERT INTO `menu_log` VALUES (254, 1, 'Buat Data Umum', '11:49:25');
INSERT INTO `menu_log` VALUES (255, 1, 'Logout', '11:49:28');
INSERT INTO `menu_log` VALUES (256, 1, 'Pengguna', '11:49:51');
INSERT INTO `menu_log` VALUES (257, 1, 'Dashboard', '11:54:11');
INSERT INTO `menu_log` VALUES (258, 1, 'Jenis Pekerjaan', '11:54:26');
INSERT INTO `menu_log` VALUES (259, 1, 'Edit Jenis Pekerjaan', '11:54:35');
INSERT INTO `menu_log` VALUES (260, 1, 'Jenis Pekerjaan', '11:54:36');
INSERT INTO `menu_log` VALUES (261, 1, 'Dashboard', '11:54:37');
INSERT INTO `menu_log` VALUES (262, 1, 'Laporan Pekerjaan', '11:54:56');
INSERT INTO `menu_log` VALUES (263, 1, 'Pengguna', '11:55:00');
INSERT INTO `menu_log` VALUES (264, 1, 'Edit User', '11:55:01');
INSERT INTO `menu_log` VALUES (265, 1, 'Request', '11:55:01');
INSERT INTO `menu_log` VALUES (266, 1, 'Pengguna', '11:55:01');
INSERT INTO `menu_log` VALUES (267, 1, 'Data Umum', '11:55:12');
INSERT INTO `menu_log` VALUES (268, 1, 'Jadual', '11:55:13');
INSERT INTO `menu_log` VALUES (269, 1, 'Kontraktor', '11:55:20');
INSERT INTO `menu_log` VALUES (270, 1, 'Konsultan', '11:55:26');
INSERT INTO `menu_log` VALUES (271, 1, 'PPK', '11:55:27');
INSERT INTO `menu_log` VALUES (272, 1, 'Dashboard', '11:55:29');
INSERT INTO `menu_log` VALUES (273, 1, 'Kontraktor', '11:55:34');
INSERT INTO `menu_log` VALUES (274, 1, 'Dashboard', '11:55:34');
INSERT INTO `menu_log` VALUES (275, 1, 'Konsultan', '11:55:35');
INSERT INTO `menu_log` VALUES (276, 1, 'Dashboard', '11:55:36');
INSERT INTO `menu_log` VALUES (277, 1, 'PPK', '11:55:36');
INSERT INTO `menu_log` VALUES (278, 1, 'Dashboard', '11:55:38');
INSERT INTO `menu_log` VALUES (279, 1, 'Jenis Pekerjaan', '11:55:39');
INSERT INTO `menu_log` VALUES (280, 1, 'Dashboard', '11:55:42');
INSERT INTO `menu_log` VALUES (281, 1, 'Pengguna', '12:02:27');
INSERT INTO `menu_log` VALUES (282, 1, 'Pengguna', '12:03:15');
INSERT INTO `menu_log` VALUES (283, 1, 'Pengguna', '12:03:18');
INSERT INTO `menu_log` VALUES (284, 1, 'Pengguna', '12:04:59');
INSERT INTO `menu_log` VALUES (285, 1, 'Pengguna', '01:18:32');
INSERT INTO `menu_log` VALUES (286, 1, 'Pengguna', '01:21:39');
INSERT INTO `menu_log` VALUES (287, 1, 'Pengguna', '01:21:49');
INSERT INTO `menu_log` VALUES (288, 1, 'Kontraktor', '01:21:58');
INSERT INTO `menu_log` VALUES (289, 1, 'Dashboard', '01:23:35');
INSERT INTO `menu_log` VALUES (290, 1, 'Jenis Pekerjaan', '01:24:19');
INSERT INTO `menu_log` VALUES (291, 1, 'Pengguna', '01:24:21');
INSERT INTO `menu_log` VALUES (292, 1, 'Kontraktor', '01:24:45');
INSERT INTO `menu_log` VALUES (293, 1, 'Jadual', '01:25:15');
INSERT INTO `menu_log` VALUES (294, 1, 'Edit Jadual', '01:25:22');
INSERT INTO `menu_log` VALUES (295, 1, 'Kontraktor', '01:26:14');
INSERT INTO `menu_log` VALUES (296, 1, 'Pengguna', '01:26:16');
INSERT INTO `menu_log` VALUES (297, 1, 'Jenis Pekerjaan', '01:26:58');
INSERT INTO `menu_log` VALUES (298, 1, 'Jenis Pekerjaan', '01:27:41');
INSERT INTO `menu_log` VALUES (299, 1, 'Pengguna', '01:28:10');
INSERT INTO `menu_log` VALUES (300, 1, 'Data Umum', '01:28:31');
INSERT INTO `menu_log` VALUES (301, 1, 'Buat Data Umum', '01:28:44');
INSERT INTO `menu_log` VALUES (302, 1, 'Request', '01:29:51');
INSERT INTO `menu_log` VALUES (303, 1, 'Laporan Harian', '01:30:37');
INSERT INTO `menu_log` VALUES (304, 1, 'Request', '01:30:52');
INSERT INTO `menu_log` VALUES (305, 1, 'Jadual', '01:31:26');
INSERT INTO `menu_log` VALUES (306, 1, 'Buat Request', '01:31:33');
INSERT INTO `menu_log` VALUES (307, 1, 'Dashboard', '10:23:26');
INSERT INTO `menu_log` VALUES (308, 1, 'Data Umum', '10:23:34');
INSERT INTO `menu_log` VALUES (309, 1, 'Kontraktor', '10:23:37');
INSERT INTO `menu_log` VALUES (310, 1, 'Kontraktor', '10:23:54');
INSERT INTO `menu_log` VALUES (311, 1, 'Kontraktor', '10:44:11');
INSERT INTO `menu_log` VALUES (312, 1, 'Konsultan', '10:54:42');
INSERT INTO `menu_log` VALUES (313, 1, 'Data Umum', '10:54:51');
INSERT INTO `menu_log` VALUES (314, 1, 'Jadual', '10:58:17');
INSERT INTO `menu_log` VALUES (315, 1, 'Kontraktor', '10:59:23');
INSERT INTO `menu_log` VALUES (316, 1, 'Pengguna', '11:05:11');
INSERT INTO `menu_log` VALUES (317, 1, 'Kontraktor', '11:09:19');
INSERT INTO `menu_log` VALUES (318, 1, 'Pengguna', '11:10:13');
INSERT INTO `menu_log` VALUES (319, 1, 'Kontraktor', '11:42:45');
INSERT INTO `menu_log` VALUES (320, 1, 'Konsultan', '11:42:47');
INSERT INTO `menu_log` VALUES (321, 1, 'PPK', '11:42:49');
INSERT INTO `menu_log` VALUES (322, 1, 'Jenis Pekerjaan', '11:42:50');
INSERT INTO `menu_log` VALUES (323, 1, 'Pengguna', '11:42:51');
INSERT INTO `menu_log` VALUES (324, 1, 'Data Umum', '11:42:54');
INSERT INTO `menu_log` VALUES (325, 1, 'Kontraktor', '11:42:58');
INSERT INTO `menu_log` VALUES (326, 1, 'Edit User', '11:43:01');
INSERT INTO `menu_log` VALUES (327, 1, 'Catatan Log', '11:43:32');
INSERT INTO `menu_log` VALUES (328, 1, 'Perencanaan Konsultan', '11:44:22');
INSERT INTO `menu_log` VALUES (329, 1, 'Laporan Pekerjaan', '11:44:27');
INSERT INTO `menu_log` VALUES (330, 1, 'Data Kontrak', '11:44:32');
INSERT INTO `menu_log` VALUES (331, 1, 'Dashboard', '11:44:52');
INSERT INTO `menu_log` VALUES (332, 1, 'Kontraktor', '11:44:54');
INSERT INTO `menu_log` VALUES (333, 1, 'Pengguna', '11:48:12');
INSERT INTO `menu_log` VALUES (334, 1, 'Kontraktor', '11:49:10');
INSERT INTO `menu_log` VALUES (335, 1, 'Konsultan', '11:52:46');
INSERT INTO `menu_log` VALUES (336, 1, 'PPK', '11:52:51');
INSERT INTO `menu_log` VALUES (337, 1, 'Jenis Pekerjaan', '11:52:56');
INSERT INTO `menu_log` VALUES (338, 1, 'Pengguna', '11:52:59');
INSERT INTO `menu_log` VALUES (339, 1, 'Data Umum', '11:53:03');
INSERT INTO `menu_log` VALUES (340, 1, 'Jadual', '11:55:45');
INSERT INTO `menu_log` VALUES (341, 1, 'Request', '11:56:26');
INSERT INTO `menu_log` VALUES (342, 1, 'Laporan Harian', '11:56:49');
INSERT INTO `menu_log` VALUES (343, 1, 'Data Kontrak', '11:57:38');
INSERT INTO `menu_log` VALUES (344, 1, 'Data Umum', '12:00:48');
INSERT INTO `menu_log` VALUES (345, 1, 'Data Kontrak', '12:01:23');
INSERT INTO `menu_log` VALUES (346, 1, 'Data Umum', '12:01:37');
INSERT INTO `menu_log` VALUES (347, 1, 'Data Kontrak', '12:02:41');
INSERT INTO `menu_log` VALUES (348, 1, 'Kontraktor', '12:03:02');
INSERT INTO `menu_log` VALUES (349, 1, 'Data Kontrak', '12:04:02');
INSERT INTO `menu_log` VALUES (350, 1, 'Dashboard', '12:14:27');
INSERT INTO `menu_log` VALUES (351, 1, 'Kontraktor', '12:14:29');
INSERT INTO `menu_log` VALUES (352, 1, 'Kontraktor', '12:16:03');
INSERT INTO `menu_log` VALUES (353, 1, 'Kontraktor', '12:16:45');
INSERT INTO `menu_log` VALUES (354, 1, 'Kontraktor', '12:17:56');
INSERT INTO `menu_log` VALUES (355, 1, 'Kontraktor', '12:18:58');
INSERT INTO `menu_log` VALUES (356, 1, 'Kontraktor', '12:23:01');
INSERT INTO `menu_log` VALUES (357, 1, 'Kontraktor', '12:23:24');
INSERT INTO `menu_log` VALUES (358, 1, 'Kontraktor', '12:24:02');
INSERT INTO `menu_log` VALUES (359, 1, 'Edit Kontraktor', '01:27:33');
INSERT INTO `menu_log` VALUES (360, 1, 'Dashboard', '01:27:39');
INSERT INTO `menu_log` VALUES (361, 1, 'Dashboard', '01:27:41');
INSERT INTO `menu_log` VALUES (362, 1, 'Kontraktor', '01:27:42');
INSERT INTO `menu_log` VALUES (363, 1, 'Edit Kontraktor', '01:27:52');
INSERT INTO `menu_log` VALUES (364, 1, 'Kontraktor', '01:27:58');
INSERT INTO `menu_log` VALUES (365, 1, 'Edit Kontraktor', '01:29:23');
INSERT INTO `menu_log` VALUES (366, 1, 'Kontraktor', '01:43:39');
INSERT INTO `menu_log` VALUES (367, 1, 'Kontraktor', '01:43:47');
INSERT INTO `menu_log` VALUES (368, 1, 'Edit Kontraktor', '01:43:58');
INSERT INTO `menu_log` VALUES (369, 1, 'Kontraktor', '02:00:07');
INSERT INTO `menu_log` VALUES (370, 1, 'Edit Kontraktor', '02:00:16');
INSERT INTO `menu_log` VALUES (371, 1, 'Kontraktor', '02:00:20');
INSERT INTO `menu_log` VALUES (372, 1, 'Edit Kontraktor', '02:00:55');
INSERT INTO `menu_log` VALUES (373, 1, 'Kontraktor', '02:01:01');
INSERT INTO `menu_log` VALUES (374, 1, 'Kontraktor', '02:08:00');
INSERT INTO `menu_log` VALUES (375, 1, 'Kontraktor', '02:08:26');
INSERT INTO `menu_log` VALUES (376, 1, 'Kontraktor', '02:08:29');
INSERT INTO `menu_log` VALUES (377, 1, 'Dashboard', '02:08:42');
INSERT INTO `menu_log` VALUES (378, 1, 'Kontraktor', '02:08:44');
INSERT INTO `menu_log` VALUES (379, 1, 'Dashboard', '02:09:49');
INSERT INTO `menu_log` VALUES (380, 1, 'Kontraktor', '02:09:54');
INSERT INTO `menu_log` VALUES (381, 1, 'Dashboard', '02:10:52');
INSERT INTO `menu_log` VALUES (382, 1, 'Kontraktor', '02:10:55');
INSERT INTO `menu_log` VALUES (383, 1, 'Kontraktor', '02:11:23');
INSERT INTO `menu_log` VALUES (384, 1, 'Kontraktor', '02:11:51');
INSERT INTO `menu_log` VALUES (385, 1, 'Kontraktor', '02:12:15');
INSERT INTO `menu_log` VALUES (386, 1, 'Kontraktor', '02:15:20');
INSERT INTO `menu_log` VALUES (387, 1, 'Kontraktor', '02:17:33');
INSERT INTO `menu_log` VALUES (388, 1, 'Kontraktor', '02:17:34');
INSERT INTO `menu_log` VALUES (389, 1, 'Kontraktor', '02:25:45');
INSERT INTO `menu_log` VALUES (390, 1, 'Edit Kontraktor', '02:26:56');
INSERT INTO `menu_log` VALUES (391, 1, 'Kontraktor', '02:27:01');
INSERT INTO `menu_log` VALUES (392, 1, 'Kontraktor', '02:41:26');
INSERT INTO `menu_log` VALUES (393, 1, 'Kontraktor', '02:42:33');
INSERT INTO `menu_log` VALUES (394, 1, 'Edit Kontraktor', '02:42:35');
INSERT INTO `menu_log` VALUES (395, 1, 'Kontraktor', '02:42:37');
INSERT INTO `menu_log` VALUES (396, 1, 'Kontraktor', '02:44:41');
INSERT INTO `menu_log` VALUES (397, 1, 'Kontraktor', '02:47:11');
INSERT INTO `menu_log` VALUES (398, 1, 'Kontraktor', '02:47:12');
INSERT INTO `menu_log` VALUES (399, 1, 'Kontraktor', '02:47:20');
INSERT INTO `menu_log` VALUES (400, 1, 'Kontraktor', '02:48:52');
INSERT INTO `menu_log` VALUES (401, 1, 'Kontraktor', '02:48:59');
INSERT INTO `menu_log` VALUES (402, 1, 'Kontraktor', '02:50:59');
INSERT INTO `menu_log` VALUES (403, 1, 'Kontraktor', '02:51:21');
INSERT INTO `menu_log` VALUES (404, 1, 'Kontraktor', '02:51:28');
INSERT INTO `menu_log` VALUES (405, 1, 'Kontraktor', '02:51:33');
INSERT INTO `menu_log` VALUES (406, 1, 'Kontraktor', '02:51:49');
INSERT INTO `menu_log` VALUES (407, 1, 'Konsultan', '02:51:59');
INSERT INTO `menu_log` VALUES (408, 1, 'Konsultan', '02:52:06');
INSERT INTO `menu_log` VALUES (409, 1, 'Konsultan', '02:55:17');
INSERT INTO `menu_log` VALUES (410, 1, 'Konsultan', '02:55:36');
INSERT INTO `menu_log` VALUES (411, 1, 'Konsultan', '02:56:35');
INSERT INTO `menu_log` VALUES (412, 1, 'Konsultan', '02:57:07');
INSERT INTO `menu_log` VALUES (413, 1, 'Konsultan', '02:57:12');
INSERT INTO `menu_log` VALUES (414, 1, 'Konsultan', '02:57:15');
INSERT INTO `menu_log` VALUES (415, 1, 'Konsultan', '02:58:08');
INSERT INTO `menu_log` VALUES (416, 1, 'Edit Konsultan', '02:58:11');
INSERT INTO `menu_log` VALUES (417, 1, 'Konsultan', '02:58:14');
INSERT INTO `menu_log` VALUES (418, 1, 'Konsultan', '02:58:19');
INSERT INTO `menu_log` VALUES (419, 1, 'PPK', '02:58:22');
INSERT INTO `menu_log` VALUES (420, 1, 'PPK', '03:00:44');
INSERT INTO `menu_log` VALUES (421, 1, 'PPK', '03:01:11');
INSERT INTO `menu_log` VALUES (422, 1, 'PPK', '03:01:22');
INSERT INTO `menu_log` VALUES (423, 1, 'PPK', '03:01:48');
INSERT INTO `menu_log` VALUES (424, 1, 'PPK', '03:01:55');
INSERT INTO `menu_log` VALUES (425, 1, 'Edit PPK', '03:02:02');
INSERT INTO `menu_log` VALUES (426, 1, 'PPK', '03:02:09');
INSERT INTO `menu_log` VALUES (427, 1, 'Edit PPK', '03:04:34');
INSERT INTO `menu_log` VALUES (428, 1, 'PPK', '03:05:36');
INSERT INTO `menu_log` VALUES (429, 1, 'PPK', '03:05:49');
INSERT INTO `menu_log` VALUES (430, 1, 'Edit PPK', '03:05:53');
INSERT INTO `menu_log` VALUES (431, 1, 'PPK', '03:05:56');
INSERT INTO `menu_log` VALUES (432, 1, 'PPK', '03:06:02');
INSERT INTO `menu_log` VALUES (433, 1, 'PPK', '03:06:07');
INSERT INTO `menu_log` VALUES (434, 1, 'PPK', '03:06:32');
INSERT INTO `menu_log` VALUES (435, 1, 'PPK', '03:06:37');
INSERT INTO `menu_log` VALUES (436, 1, 'PPK', '03:07:46');
INSERT INTO `menu_log` VALUES (437, 1, 'Edit PPK', '03:07:50');
INSERT INTO `menu_log` VALUES (438, 1, 'PPK', '03:07:51');
INSERT INTO `menu_log` VALUES (439, 1, 'Konsultan', '03:07:57');
INSERT INTO `menu_log` VALUES (440, 1, 'PPK', '03:08:05');
INSERT INTO `menu_log` VALUES (441, 1, 'Konsultan', '03:08:20');
INSERT INTO `menu_log` VALUES (442, 1, 'Konsultan', '03:08:42');
INSERT INTO `menu_log` VALUES (443, 1, 'Konsultan', '03:08:43');
INSERT INTO `menu_log` VALUES (444, 1, 'PPK', '03:08:45');
INSERT INTO `menu_log` VALUES (445, 1, 'Konsultan', '03:08:50');
INSERT INTO `menu_log` VALUES (446, 1, 'PPK', '03:10:04');
INSERT INTO `menu_log` VALUES (447, 1, 'PPK', '03:10:09');
INSERT INTO `menu_log` VALUES (448, 1, 'PPK', '03:11:05');
INSERT INTO `menu_log` VALUES (449, 1, 'PPK', '03:11:11');
INSERT INTO `menu_log` VALUES (450, 1, 'Jenis Pekerjaan', '03:11:15');
INSERT INTO `menu_log` VALUES (451, 1, 'Jenis Pekerjaan', '03:11:27');
INSERT INTO `menu_log` VALUES (452, 1, 'Pengguna', '03:11:49');
INSERT INTO `menu_log` VALUES (453, 1, 'Pengguna', '03:12:26');
INSERT INTO `menu_log` VALUES (454, 1, 'Jenis Pekerjaan', '03:12:27');
INSERT INTO `menu_log` VALUES (455, 1, 'Pengguna', '03:13:07');
INSERT INTO `menu_log` VALUES (456, 1, 'Jenis Pekerjaan', '03:13:08');
INSERT INTO `menu_log` VALUES (457, 1, 'Edit Jenis Pekerjaan', '03:13:12');
INSERT INTO `menu_log` VALUES (458, 1, 'Jenis Pekerjaan', '03:13:14');
INSERT INTO `menu_log` VALUES (459, 1, 'Pengguna', '03:13:15');
INSERT INTO `menu_log` VALUES (460, 1, 'Pengguna', '03:14:06');
INSERT INTO `menu_log` VALUES (461, 1, 'Pengguna', '03:15:39');
INSERT INTO `menu_log` VALUES (462, 1, 'Pengguna', '03:17:13');
INSERT INTO `menu_log` VALUES (463, 1, 'Jenis Pekerjaan', '03:17:14');
INSERT INTO `menu_log` VALUES (464, 1, 'Pengguna', '03:17:16');
INSERT INTO `menu_log` VALUES (465, 1, 'Pengguna', '03:21:05');
INSERT INTO `menu_log` VALUES (466, 1, 'Pengguna', '03:25:49');
INSERT INTO `menu_log` VALUES (467, 1, 'Kontraktor', '03:28:44');
INSERT INTO `menu_log` VALUES (468, 1, 'PPK', '03:28:49');
INSERT INTO `menu_log` VALUES (469, 1, 'Kontraktor', '03:28:50');
INSERT INTO `menu_log` VALUES (470, 1, 'PPK', '03:28:50');
INSERT INTO `menu_log` VALUES (471, 1, 'Jenis Pekerjaan', '03:28:52');
INSERT INTO `menu_log` VALUES (472, 1, 'Pengguna', '03:28:53');
INSERT INTO `menu_log` VALUES (473, 1, 'Pengguna', '03:28:54');
INSERT INTO `menu_log` VALUES (474, 1, 'Kontraktor', '03:37:39');
INSERT INTO `menu_log` VALUES (475, 1, 'Pengguna', '03:37:40');
INSERT INTO `menu_log` VALUES (476, 1, 'Pengguna', '03:39:51');
INSERT INTO `menu_log` VALUES (477, 1, 'Pengguna', '03:41:48');
INSERT INTO `menu_log` VALUES (478, 1, 'Pengguna', '03:42:10');
INSERT INTO `menu_log` VALUES (479, 1, 'Edit Pengguna', '03:42:19');
INSERT INTO `menu_log` VALUES (480, 1, 'Pengguna', '03:42:26');
INSERT INTO `menu_log` VALUES (481, 1, 'Pengguna', '03:42:34');
INSERT INTO `menu_log` VALUES (482, 1, 'Edit Pengguna', '03:42:41');
INSERT INTO `menu_log` VALUES (483, 1, 'Pengguna', '03:48:20');
INSERT INTO `menu_log` VALUES (484, 1, 'Jenis Pekerjaan', '03:48:28');
INSERT INTO `menu_log` VALUES (485, 1, 'Jenis Pekerjaan', '04:03:00');
INSERT INTO `menu_log` VALUES (486, 1, 'Edit Jenis Pekerjaan', '04:03:35');
INSERT INTO `menu_log` VALUES (487, 1, 'Jenis Pekerjaan', '04:03:41');
INSERT INTO `menu_log` VALUES (488, 1, 'Jenis Pekerjaan', '04:09:44');
INSERT INTO `menu_log` VALUES (489, 1, 'Jenis Pekerjaan', '04:10:26');
INSERT INTO `menu_log` VALUES (490, 1, 'Jenis Pekerjaan', '04:10:54');
INSERT INTO `menu_log` VALUES (491, 1, 'Jenis Pekerjaan', '04:11:07');
INSERT INTO `menu_log` VALUES (492, 1, 'Jenis Pekerjaan', '04:11:24');
INSERT INTO `menu_log` VALUES (493, 1, 'Jenis Pekerjaan', '04:11:30');
INSERT INTO `menu_log` VALUES (494, 1, 'Jenis Pekerjaan', '04:11:49');
INSERT INTO `menu_log` VALUES (495, 1, 'Dashboard', '04:11:53');
INSERT INTO `menu_log` VALUES (496, 1, 'Dashboard', '04:11:59');
INSERT INTO `menu_log` VALUES (497, 1, 'Dashboard', '10:14:00');
INSERT INTO `menu_log` VALUES (498, 1, 'Data Umum', '10:14:04');
INSERT INTO `menu_log` VALUES (499, 1, 'Buat Data Umum', '10:14:05');
INSERT INTO `menu_log` VALUES (500, 1, 'Kontraktor', '10:23:01');
INSERT INTO `menu_log` VALUES (501, 1, 'Kontraktor', '10:23:19');
INSERT INTO `menu_log` VALUES (502, 1, 'Kontraktor', '10:25:06');
INSERT INTO `menu_log` VALUES (503, 1, 'Kontraktor', '10:25:11');
INSERT INTO `menu_log` VALUES (504, 1, 'Logout', '10:25:24');
INSERT INTO `menu_log` VALUES (505, 1, 'Dashboard', '10:25:29');
INSERT INTO `menu_log` VALUES (506, 1, 'Kontraktor', '10:25:31');
INSERT INTO `menu_log` VALUES (507, 1, 'Kontraktor', '10:25:40');
INSERT INTO `menu_log` VALUES (508, 1, 'Kontraktor', '10:26:01');
INSERT INTO `menu_log` VALUES (509, 1, 'Kontraktor', '10:28:18');
INSERT INTO `menu_log` VALUES (510, 1, 'Kontraktor', '10:28:22');
INSERT INTO `menu_log` VALUES (511, 1, 'Konsultan', '10:28:31');
INSERT INTO `menu_log` VALUES (512, 1, 'Konsultan', '10:29:08');
INSERT INTO `menu_log` VALUES (513, 1, 'Edit Konsultan', '10:29:11');
INSERT INTO `menu_log` VALUES (514, 1, 'Konsultan', '10:29:16');
INSERT INTO `menu_log` VALUES (515, 1, 'Konsultan', '10:29:19');
INSERT INTO `menu_log` VALUES (516, 1, 'PPK', '10:29:30');
INSERT INTO `menu_log` VALUES (517, 1, 'PPK', '10:29:34');
INSERT INTO `menu_log` VALUES (518, 1, 'Edit PPK', '10:29:38');
INSERT INTO `menu_log` VALUES (519, 1, 'PPK', '10:29:41');
INSERT INTO `menu_log` VALUES (520, 1, 'PPK', '10:29:46');
INSERT INTO `menu_log` VALUES (521, 1, 'Jenis Pekerjaan', '10:29:51');
INSERT INTO `menu_log` VALUES (522, 1, 'Jenis Pekerjaan', '10:30:01');
INSERT INTO `menu_log` VALUES (523, 1, 'Edit Jenis Pekerjaan', '10:30:05');
INSERT INTO `menu_log` VALUES (524, 1, 'Jenis Pekerjaan', '10:30:10');
INSERT INTO `menu_log` VALUES (525, 1, 'Jenis Pekerjaan', '10:30:14');
INSERT INTO `menu_log` VALUES (526, 1, 'Pengguna', '10:30:25');
INSERT INTO `menu_log` VALUES (527, 1, 'Edit Pengguna', '10:30:32');
INSERT INTO `menu_log` VALUES (528, 1, 'Pengguna', '10:30:58');
INSERT INTO `menu_log` VALUES (529, 1, 'Data Kontrak', '10:41:34');
INSERT INTO `menu_log` VALUES (530, 1, 'Dashboard', '10:41:51');
INSERT INTO `menu_log` VALUES (531, 1, 'Kontraktor', '10:41:54');
INSERT INTO `menu_log` VALUES (532, 1, 'Konsultan', '10:41:59');
INSERT INTO `menu_log` VALUES (533, 1, 'Kontraktor', '10:42:03');
INSERT INTO `menu_log` VALUES (534, 1, 'Konsultan', '10:42:29');
INSERT INTO `menu_log` VALUES (535, 1, 'PPK', '10:42:31');
INSERT INTO `menu_log` VALUES (536, 1, 'Jenis Pekerjaan', '10:42:34');
INSERT INTO `menu_log` VALUES (537, 1, 'Pengguna', '10:42:36');
INSERT INTO `menu_log` VALUES (538, 1, 'Data Umum', '10:42:39');
INSERT INTO `menu_log` VALUES (539, 1, 'Data Umum', '10:50:32');
INSERT INTO `menu_log` VALUES (540, 1, 'Data Umum', '10:50:56');
INSERT INTO `menu_log` VALUES (541, 1, 'Data Umum', '10:51:08');
INSERT INTO `menu_log` VALUES (542, 1, 'Data Umum', '10:51:18');
INSERT INTO `menu_log` VALUES (543, 1, 'Jadual', '10:52:06');
INSERT INTO `menu_log` VALUES (544, 1, 'Request', '10:52:10');
INSERT INTO `menu_log` VALUES (545, 1, 'Laporan Harian', '10:52:14');
INSERT INTO `menu_log` VALUES (546, 1, 'Laporan Harian', '10:54:44');
INSERT INTO `menu_log` VALUES (547, 1, 'Data Umum', '10:54:47');
INSERT INTO `menu_log` VALUES (548, 1, 'Data Umum', '10:56:03');
INSERT INTO `menu_log` VALUES (549, 1, 'Data Umum', '10:56:25');
INSERT INTO `menu_log` VALUES (550, 1, 'Data Umum', '10:56:37');
INSERT INTO `menu_log` VALUES (551, 1, 'Data Umum', '10:59:17');
INSERT INTO `menu_log` VALUES (552, 1, 'Data Umum', '11:00:35');
INSERT INTO `menu_log` VALUES (553, 1, 'Data Umum', '11:01:43');
INSERT INTO `menu_log` VALUES (554, 1, 'Data Umum', '11:02:12');
INSERT INTO `menu_log` VALUES (555, 1, 'Data Umum', '11:04:49');
INSERT INTO `menu_log` VALUES (556, 1, 'Data Umum', '11:05:05');
INSERT INTO `menu_log` VALUES (557, 1, 'Jadual', '11:06:55');
INSERT INTO `menu_log` VALUES (558, 1, 'Data Umum', '11:06:57');
INSERT INTO `menu_log` VALUES (559, 1, 'Data Umum', '11:21:15');
INSERT INTO `menu_log` VALUES (560, 1, 'Buat Data Umum', '11:45:45');
INSERT INTO `menu_log` VALUES (561, 1, 'Data Umum', '11:45:47');
INSERT INTO `menu_log` VALUES (562, 1, 'Jadual', '11:46:02');
INSERT INTO `menu_log` VALUES (563, 1, 'Edit Jadual', '11:46:10');
INSERT INTO `menu_log` VALUES (564, 1, 'Jadual', '11:46:34');
INSERT INTO `menu_log` VALUES (565, 1, 'Edit Jadual', '11:47:18');
INSERT INTO `menu_log` VALUES (566, 1, 'Data Umum', '11:47:23');
INSERT INTO `menu_log` VALUES (567, 1, 'Buat Data Umum', '11:47:25');
INSERT INTO `menu_log` VALUES (568, 1, 'Dashboard', '11:49:30');
INSERT INTO `menu_log` VALUES (569, 1, 'Pengguna', '11:49:32');
INSERT INTO `menu_log` VALUES (570, 1, 'Pengguna', '11:53:38');
INSERT INTO `menu_log` VALUES (571, 1, 'Edit User', '11:54:53');
INSERT INTO `menu_log` VALUES (572, 1, 'Data Umum', '11:58:30');
INSERT INTO `menu_log` VALUES (573, 1, 'Jadual', '11:58:40');
INSERT INTO `menu_log` VALUES (574, 1, 'Edit Jadual', '11:58:45');
INSERT INTO `menu_log` VALUES (575, 1, 'Jadual', '11:58:51');
INSERT INTO `menu_log` VALUES (576, 1, 'Buat Request', '11:58:56');
INSERT INTO `menu_log` VALUES (577, 1, 'Data Umum', '11:58:57');
INSERT INTO `menu_log` VALUES (578, 1, 'Buat Jadual', '11:59:04');
INSERT INTO `menu_log` VALUES (579, 1, 'Jadual', '11:59:48');
INSERT INTO `menu_log` VALUES (580, 1, 'Pengguna', '12:00:07');
INSERT INTO `menu_log` VALUES (581, 1, 'Jenis Pekerjaan', '12:10:19');
INSERT INTO `menu_log` VALUES (582, 1, 'Pengguna', '12:10:22');
INSERT INTO `menu_log` VALUES (583, 1, 'Jadual', '12:10:27');
INSERT INTO `menu_log` VALUES (584, 1, 'Buat Request', '12:10:30');
INSERT INTO `menu_log` VALUES (585, 1, 'Data Umum', '12:10:32');
INSERT INTO `menu_log` VALUES (586, 1, 'Buat Jadual', '12:10:37');
INSERT INTO `menu_log` VALUES (587, 1, 'Jadual', '12:11:09');
INSERT INTO `menu_log` VALUES (588, 1, 'Request', '12:11:33');
INSERT INTO `menu_log` VALUES (589, 1, 'Jadual', '12:12:20');
INSERT INTO `menu_log` VALUES (590, 1, 'Buat Request', '12:12:23');
INSERT INTO `menu_log` VALUES (591, 1, 'Request', '12:12:33');
INSERT INTO `menu_log` VALUES (592, 1, 'Jadual', '12:12:49');
INSERT INTO `menu_log` VALUES (593, 1, 'Request', '12:12:52');
INSERT INTO `menu_log` VALUES (594, 1, 'Laporan Harian', '12:12:53');
INSERT INTO `menu_log` VALUES (595, 1, 'Request', '12:13:10');
INSERT INTO `menu_log` VALUES (596, 1, 'Request', '12:13:34');
INSERT INTO `menu_log` VALUES (597, 1, 'Edit Request', '12:14:15');
INSERT INTO `menu_log` VALUES (598, 1, 'Laporan Harian', '12:14:26');
INSERT INTO `menu_log` VALUES (599, 1, 'Data Kontrak', '12:14:34');
INSERT INTO `menu_log` VALUES (600, 1, 'Jenis Pekerjaan', '12:14:48');
INSERT INTO `menu_log` VALUES (601, 1, 'Edit Jenis Pekerjaan', '12:14:50');
INSERT INTO `menu_log` VALUES (602, 1, 'Jenis Pekerjaan', '12:14:54');
INSERT INTO `menu_log` VALUES (603, 1, 'Jenis Pekerjaan', '12:14:58');
INSERT INTO `menu_log` VALUES (604, 1, 'Jenis Pekerjaan', '12:16:15');
INSERT INTO `menu_log` VALUES (605, 1, 'Jenis Pekerjaan', '12:16:44');
INSERT INTO `menu_log` VALUES (606, 1, 'Jenis Pekerjaan', '12:18:46');
INSERT INTO `menu_log` VALUES (607, 1, 'Jenis Pekerjaan', '12:19:07');
INSERT INTO `menu_log` VALUES (608, 1, 'Jenis Pekerjaan', '12:19:17');
INSERT INTO `menu_log` VALUES (609, 1, 'Jenis Pekerjaan', '12:19:22');
INSERT INTO `menu_log` VALUES (610, 1, 'Jadual', '12:20:37');
INSERT INTO `menu_log` VALUES (611, 1, 'Edit Jadual', '12:20:40');
INSERT INTO `menu_log` VALUES (612, 1, 'Data Umum', '12:20:45');
INSERT INTO `menu_log` VALUES (613, 1, 'Buat Data Umum', '12:20:48');
INSERT INTO `menu_log` VALUES (614, 1, 'Data Umum', '12:21:07');
INSERT INTO `menu_log` VALUES (615, 1, 'Jenis Pekerjaan', '12:21:13');
INSERT INTO `menu_log` VALUES (616, 1, 'Jenis Pekerjaan', '12:21:40');
INSERT INTO `menu_log` VALUES (617, 1, 'Jenis Pekerjaan', '12:21:48');
INSERT INTO `menu_log` VALUES (618, 1, 'Dashboard', '01:19:01');
INSERT INTO `menu_log` VALUES (619, 1, 'Data Umum', '02:07:43');
INSERT INTO `menu_log` VALUES (620, 1, 'Edit User', '02:07:46');
INSERT INTO `menu_log` VALUES (621, 1, 'Catatan Log', '02:07:48');
INSERT INTO `menu_log` VALUES (622, 1, 'Data Umum', '02:15:44');
INSERT INTO `menu_log` VALUES (623, 1, 'Buat Data Umum', '02:15:47');
INSERT INTO `menu_log` VALUES (624, 1, 'Jadual', '02:19:55');
INSERT INTO `menu_log` VALUES (625, 1, 'Data Umum', '02:19:58');
INSERT INTO `menu_log` VALUES (626, 1, 'Catatan Log', '02:20:05');
INSERT INTO `menu_log` VALUES (627, 1, 'Kontraktor', '02:20:47');
INSERT INTO `menu_log` VALUES (628, 1, 'Dashboard', '02:23:20');
INSERT INTO `menu_log` VALUES (629, 1, 'Kontraktor', '02:23:22');
INSERT INTO `menu_log` VALUES (630, 1, 'Dashboard', '02:23:23');
INSERT INTO `menu_log` VALUES (631, 1, 'Pengguna', '02:23:25');
INSERT INTO `menu_log` VALUES (632, 1, 'Pengguna', '02:23:49');
INSERT INTO `menu_log` VALUES (633, 1, 'Pengguna', '02:23:54');
INSERT INTO `menu_log` VALUES (634, 1, 'Logout', '14:24:01');
INSERT INTO `menu_log` VALUES (635, 1, 'Dashboard', '02:36:40');
INSERT INTO `menu_log` VALUES (636, 1, 'Pengguna', '02:36:43');
INSERT INTO `menu_log` VALUES (637, 1, 'Data Umum', '02:45:26');
INSERT INTO `menu_log` VALUES (638, 1, 'Buat Data Umum', '02:45:27');
INSERT INTO `menu_log` VALUES (639, 1, 'Pengguna', '02:45:36');
INSERT INTO `menu_log` VALUES (640, 1, 'Data Umum', '02:47:09');
INSERT INTO `menu_log` VALUES (641, 1, 'Buat Data Umum', '02:47:10');
INSERT INTO `menu_log` VALUES (642, 1, 'Data Umum', '02:47:32');
INSERT INTO `menu_log` VALUES (643, 1, 'Buat Data Umum', '02:47:33');
INSERT INTO `menu_log` VALUES (644, 1, 'Data Umum', '02:47:35');
INSERT INTO `menu_log` VALUES (645, 1, 'Buat Jadual', '02:47:41');
INSERT INTO `menu_log` VALUES (646, 1, 'Data Umum', '02:49:37');
INSERT INTO `menu_log` VALUES (647, 1, 'Buat Jadual', '02:49:43');
INSERT INTO `menu_log` VALUES (648, 1, 'Data Umum', '02:52:49');
INSERT INTO `menu_log` VALUES (649, 1, 'Buat Data Umum', '02:52:50');
INSERT INTO `menu_log` VALUES (650, 1, 'Data Umum', '02:53:27');
INSERT INTO `menu_log` VALUES (651, 1, 'Buat Jadual', '02:53:35');
INSERT INTO `menu_log` VALUES (652, 1, 'Data Umum', '02:59:11');
INSERT INTO `menu_log` VALUES (653, 1, 'Buat Data Umum', '02:59:12');
INSERT INTO `menu_log` VALUES (654, 1, 'Data Umum', '03:05:57');
INSERT INTO `menu_log` VALUES (655, 1, 'Buat Jadual', '03:06:03');
INSERT INTO `menu_log` VALUES (656, 1, 'Buat Jadual', '03:06:49');
INSERT INTO `menu_log` VALUES (657, 1, 'Buat Jadual', '03:10:33');
INSERT INTO `menu_log` VALUES (658, 1, 'Buat Jadual', '03:10:42');
INSERT INTO `menu_log` VALUES (659, 1, 'Buat Jadual', '03:13:25');
INSERT INTO `menu_log` VALUES (660, 1, 'Buat Jadual', '03:13:30');
INSERT INTO `menu_log` VALUES (661, 1, 'Data Umum', '03:13:32');
INSERT INTO `menu_log` VALUES (662, 1, 'Buat Data Umum', '03:13:35');
INSERT INTO `menu_log` VALUES (663, 1, 'Data Umum', '03:13:37');
INSERT INTO `menu_log` VALUES (664, 1, 'Jadual', '03:13:42');
INSERT INTO `menu_log` VALUES (665, 1, 'Data Umum', '03:13:44');
INSERT INTO `menu_log` VALUES (666, 1, 'Buat Jadual', '03:13:47');
INSERT INTO `menu_log` VALUES (667, 1, 'Buat Jadual', '03:15:05');
INSERT INTO `menu_log` VALUES (668, 1, 'Buat Jadual', '03:16:54');
INSERT INTO `menu_log` VALUES (669, 1, 'Buat Jadual', '03:17:42');
INSERT INTO `menu_log` VALUES (670, 1, 'Buat Jadual', '03:29:04');
INSERT INTO `menu_log` VALUES (671, 1, 'Buat Jadual', '03:31:49');
INSERT INTO `menu_log` VALUES (672, 1, 'Buat Jadual', '03:39:13');
INSERT INTO `menu_log` VALUES (673, 1, 'Buat Jadual', '03:39:26');
INSERT INTO `menu_log` VALUES (674, 1, 'Buat Jadual', '04:03:30');
INSERT INTO `menu_log` VALUES (675, 1, 'Jadual', '04:14:54');
INSERT INTO `menu_log` VALUES (676, 1, 'Data Umum', '04:14:58');
INSERT INTO `menu_log` VALUES (677, 1, 'Data Umum', '04:15:20');
INSERT INTO `menu_log` VALUES (678, 1, 'Buat Data Umum', '04:15:22');
INSERT INTO `menu_log` VALUES (679, 1, 'Data Umum', '04:15:25');
INSERT INTO `menu_log` VALUES (680, 1, 'Buat Jadual', '04:15:28');
INSERT INTO `menu_log` VALUES (681, 1, 'Jadual', '04:16:06');
INSERT INTO `menu_log` VALUES (682, 1, 'Data Umum', '04:16:07');
INSERT INTO `menu_log` VALUES (683, 1, 'Jadual', '04:16:08');
INSERT INTO `menu_log` VALUES (684, 1, 'Data Umum', '04:16:15');
INSERT INTO `menu_log` VALUES (685, 1, 'Buat Data Umum', '04:16:16');
INSERT INTO `menu_log` VALUES (686, 1, 'Data Umum', '04:16:18');
INSERT INTO `menu_log` VALUES (687, 1, 'Buat Jadual', '04:16:21');
INSERT INTO `menu_log` VALUES (688, 1, 'Data Umum', '04:16:22');
INSERT INTO `menu_log` VALUES (689, 1, 'Buat Jadual', '04:16:27');
INSERT INTO `menu_log` VALUES (690, 1, 'Jadual', '04:18:00');
INSERT INTO `menu_log` VALUES (691, 1, 'Data Umum', '04:18:03');
INSERT INTO `menu_log` VALUES (692, 1, 'Buat Data Umum', '04:18:05');
INSERT INTO `menu_log` VALUES (693, 1, 'Data Umum', '04:18:12');
INSERT INTO `menu_log` VALUES (694, 1, 'Buat Jadual', '04:18:14');
INSERT INTO `menu_log` VALUES (695, 1, 'Jadual', '04:24:26');
INSERT INTO `menu_log` VALUES (696, 1, 'Edit Jadual', '04:24:30');
INSERT INTO `menu_log` VALUES (697, 1, 'Data Umum', '04:24:53');
INSERT INTO `menu_log` VALUES (698, 1, 'Buat Jadual', '04:24:56');
INSERT INTO `menu_log` VALUES (699, 1, 'Jenis Pekerjaan', '04:26:45');
INSERT INTO `menu_log` VALUES (700, 1, 'Data Umum', '04:26:57');
INSERT INTO `menu_log` VALUES (701, 1, 'Buat Jadual', '04:27:02');
INSERT INTO `menu_log` VALUES (702, 1, 'Dashboard', '04:51:01');
INSERT INTO `menu_log` VALUES (703, 1, 'Data Umum', '04:51:06');
INSERT INTO `menu_log` VALUES (704, 1, 'Buat Data Umum', '04:51:11');
INSERT INTO `menu_log` VALUES (705, 1, 'Buat Data Umum', '04:51:11');
INSERT INTO `menu_log` VALUES (706, 1, 'Buat Data Umum', '04:51:11');
INSERT INTO `menu_log` VALUES (707, 1, 'Data Umum', '04:51:21');
INSERT INTO `menu_log` VALUES (708, 1, 'Data Umum', '04:51:21');
INSERT INTO `menu_log` VALUES (709, 1, 'Buat Jadual', '04:51:25');
INSERT INTO `menu_log` VALUES (710, 1, 'Jadual', '04:54:27');
INSERT INTO `menu_log` VALUES (711, 1, 'Edit Jadual', '04:54:34');
INSERT INTO `menu_log` VALUES (712, 1, 'Data Umum', '04:54:43');
INSERT INTO `menu_log` VALUES (713, 1, 'Jadual', '04:54:44');
INSERT INTO `menu_log` VALUES (714, 1, 'Request', '04:54:46');
INSERT INTO `menu_log` VALUES (715, 1, 'Jadual', '04:54:49');
INSERT INTO `menu_log` VALUES (716, 1, 'Buat Request', '04:54:54');
INSERT INTO `menu_log` VALUES (717, 1, 'Jadual', '04:55:00');
INSERT INTO `menu_log` VALUES (718, 1, 'Request', '04:55:08');
INSERT INTO `menu_log` VALUES (719, 1, 'Jadual', '04:55:26');
INSERT INTO `menu_log` VALUES (720, 1, 'Buat Request', '04:55:31');
INSERT INTO `menu_log` VALUES (721, 1, 'Data Umum', '04:55:46');
INSERT INTO `menu_log` VALUES (722, 1, 'Buat Jadual', '04:55:52');
INSERT INTO `menu_log` VALUES (723, 1, 'Jadual', '04:55:59');
INSERT INTO `menu_log` VALUES (724, 1, 'Jadual', '04:55:59');
INSERT INTO `menu_log` VALUES (725, 1, 'Data Umum', '04:56:07');
INSERT INTO `menu_log` VALUES (726, 1, 'Buat Data Umum', '04:56:09');
INSERT INTO `menu_log` VALUES (727, 1, 'Data Umum', '04:56:27');
INSERT INTO `menu_log` VALUES (728, 1, 'Kontraktor', '04:57:47');
INSERT INTO `menu_log` VALUES (729, 1, 'Data Umum', '04:57:53');
INSERT INTO `menu_log` VALUES (730, 1, 'Jadual', '04:59:12');
INSERT INTO `menu_log` VALUES (731, 1, 'Request', '04:59:13');
INSERT INTO `menu_log` VALUES (732, 1, 'Data Umum', '05:00:20');
INSERT INTO `menu_log` VALUES (733, 1, 'Buat Data Umum', '05:00:23');
INSERT INTO `menu_log` VALUES (734, 1, 'Catatan Log', '05:00:49');
INSERT INTO `menu_log` VALUES (735, 1, 'Edit User', '05:01:07');
INSERT INTO `menu_log` VALUES (736, 1, 'Dashboard', '05:01:13');
INSERT INTO `menu_log` VALUES (737, 1, 'Pengguna', '05:01:17');
INSERT INTO `menu_log` VALUES (738, 1, 'Edit User', '05:02:46');
INSERT INTO `menu_log` VALUES (739, 1, 'Pengguna', '05:03:09');
INSERT INTO `menu_log` VALUES (740, 1, 'Kontraktor', '05:05:18');
INSERT INTO `menu_log` VALUES (741, 1, 'Pengguna', '05:05:38');
INSERT INTO `menu_log` VALUES (742, 1, 'Data Umum', '05:05:48');
INSERT INTO `menu_log` VALUES (743, 1, 'Buat Data Umum', '05:05:55');
INSERT INTO `menu_log` VALUES (744, 1, 'Data Umum', '05:05:57');
INSERT INTO `menu_log` VALUES (745, 1, 'Dashboard', '07:20:26');
INSERT INTO `menu_log` VALUES (746, 1, 'Kontraktor', '07:23:04');
INSERT INTO `menu_log` VALUES (747, 1, 'Data Umum', '07:25:25');
INSERT INTO `menu_log` VALUES (748, 1, 'Buat Data Umum', '07:25:26');
INSERT INTO `menu_log` VALUES (749, 1, 'Dashboard', '08:07:37');
INSERT INTO `menu_log` VALUES (750, 1, 'Dashboard', '09:21:07');
INSERT INTO `menu_log` VALUES (751, 1, 'Jadual', '09:51:04');
INSERT INTO `menu_log` VALUES (752, 1, 'Data Umum', '09:51:06');
INSERT INTO `menu_log` VALUES (753, 1, 'Buat Jadual', '09:51:08');
INSERT INTO `menu_log` VALUES (754, 1, 'Data Umum', '10:06:13');
INSERT INTO `menu_log` VALUES (755, 1, 'Buat Jadual', '10:06:16');
INSERT INTO `menu_log` VALUES (756, 1, 'Buat Jadual', '10:07:22');
INSERT INTO `menu_log` VALUES (757, 1, 'Buat Jadual', '10:08:58');
INSERT INTO `menu_log` VALUES (758, 1, 'Buat Jadual', '10:14:47');
INSERT INTO `menu_log` VALUES (759, 1, 'Dashboard', '10:20:03');
INSERT INTO `menu_log` VALUES (760, 1, 'Data Kontrak', '10:20:06');
INSERT INTO `menu_log` VALUES (761, 1, 'Perencanaan Konsultan', '10:20:12');
INSERT INTO `menu_log` VALUES (762, 1, 'Laporan Pekerjaan', '10:20:17');
INSERT INTO `menu_log` VALUES (763, 1, 'Edit User', '10:20:39');
INSERT INTO `menu_log` VALUES (764, 1, 'Dashboard', '12:24:38');
INSERT INTO `menu_log` VALUES (765, 1, 'Data Umum', '12:24:42');
INSERT INTO `menu_log` VALUES (766, 1, 'Buat Jadual', '12:24:45');
INSERT INTO `menu_log` VALUES (767, 1, 'Buat Jadual', '12:42:12');
INSERT INTO `menu_log` VALUES (768, 1, 'Buat Jadual', '12:42:49');
INSERT INTO `menu_log` VALUES (769, 1, 'Buat Jadual', '01:41:26');
INSERT INTO `menu_log` VALUES (770, 1, 'Jadual', '01:45:37');
INSERT INTO `menu_log` VALUES (771, 1, 'Data Umum', '02:13:45');
INSERT INTO `menu_log` VALUES (772, 1, 'Jadual', '02:13:46');
INSERT INTO `menu_log` VALUES (773, 1, 'Data Umum', '02:13:47');
INSERT INTO `menu_log` VALUES (774, 1, 'Data Umum', '02:16:58');
INSERT INTO `menu_log` VALUES (775, 1, 'Buat Jadual', '02:17:00');
INSERT INTO `menu_log` VALUES (776, 1, 'Buat Jadual', '02:19:58');
INSERT INTO `menu_log` VALUES (777, 1, 'Dashboard', '06:34:01');
INSERT INTO `menu_log` VALUES (778, 1, 'Dashboard', '06:34:08');
INSERT INTO `menu_log` VALUES (779, 1, 'Data Umum', '06:34:17');
INSERT INTO `menu_log` VALUES (780, 1, 'Buat Jadual', '06:34:22');
INSERT INTO `menu_log` VALUES (781, 1, 'Dashboard', '11:23:09');
INSERT INTO `menu_log` VALUES (782, 1, 'Kontraktor', '11:23:18');
INSERT INTO `menu_log` VALUES (783, 1, 'Dashboard', '11:23:20');
INSERT INTO `menu_log` VALUES (784, 1, 'Dashboard', '12:56:44');
INSERT INTO `menu_log` VALUES (785, 1, 'Data Umum', '12:56:49');
INSERT INTO `menu_log` VALUES (786, 1, 'Buat Jadual', '12:56:52');
INSERT INTO `menu_log` VALUES (787, 1, 'Dashboard', '03:24:59');
INSERT INTO `menu_log` VALUES (788, 1, 'Data Umum', '03:25:06');
INSERT INTO `menu_log` VALUES (789, 1, 'Buat Jadual', '03:25:10');
INSERT INTO `menu_log` VALUES (790, 1, 'Data Umum', '03:47:15');
INSERT INTO `menu_log` VALUES (791, 1, 'Buat Data Umum', '03:47:19');
INSERT INTO `menu_log` VALUES (792, 1, 'Logout', '15:55:58');
INSERT INTO `menu_log` VALUES (793, 1, 'Dashboard', '10:54:09');
INSERT INTO `menu_log` VALUES (794, 1, 'Kontraktor', '10:54:12');
INSERT INTO `menu_log` VALUES (795, 1, 'Data Umum', '10:54:19');
INSERT INTO `menu_log` VALUES (796, 1, 'Buat Data Umum', '10:54:21');
INSERT INTO `menu_log` VALUES (797, 1, 'Buat Data Umum', '11:17:17');
INSERT INTO `menu_log` VALUES (798, 1, 'Buat Data Umum', '11:28:39');
INSERT INTO `menu_log` VALUES (799, 1, 'Buat Data Umum', '11:32:49');
INSERT INTO `menu_log` VALUES (800, 1, 'Buat Data Umum', '11:33:45');
INSERT INTO `menu_log` VALUES (801, 1, 'Buat Data Umum', '11:34:35');
INSERT INTO `menu_log` VALUES (802, 1, 'Buat Data Umum', '12:17:11');
INSERT INTO `menu_log` VALUES (803, 1, 'Buat Data Umum', '12:18:21');
INSERT INTO `menu_log` VALUES (804, 1, 'Buat Data Umum', '01:23:53');
INSERT INTO `menu_log` VALUES (805, 1, 'Buat Data Umum', '01:46:06');
INSERT INTO `menu_log` VALUES (806, 1, 'Dashboard', '02:32:20');
INSERT INTO `menu_log` VALUES (807, 1, 'Dashboard', '03:12:37');
INSERT INTO `menu_log` VALUES (808, 1, 'Data Umum', '03:12:40');
INSERT INTO `menu_log` VALUES (809, 1, 'Buat Data Umum', '03:12:42');
INSERT INTO `menu_log` VALUES (810, 1, 'Buat Data Umum', '04:05:43');
INSERT INTO `menu_log` VALUES (811, 1, 'Jadual', '04:08:49');
INSERT INTO `menu_log` VALUES (812, 1, 'Data Umum', '04:08:59');
INSERT INTO `menu_log` VALUES (813, 1, 'Buat Data Umum', '04:09:12');
INSERT INTO `menu_log` VALUES (814, 1, 'Jadual', '04:10:32');
INSERT INTO `menu_log` VALUES (815, 1, 'Request', '04:10:42');
INSERT INTO `menu_log` VALUES (816, 1, 'Laporan Harian', '04:10:46');
INSERT INTO `menu_log` VALUES (817, 1, 'Data Kontrak', '04:10:53');
INSERT INTO `menu_log` VALUES (818, 1, 'Dashboard', '04:11:13');
INSERT INTO `menu_log` VALUES (819, 1, 'Kontraktor', '04:11:21');
INSERT INTO `menu_log` VALUES (820, 1, 'Catatan Log', '04:11:28');
INSERT INTO `menu_log` VALUES (821, 1, 'Edit User', '04:11:34');
INSERT INTO `menu_log` VALUES (822, 1, 'Dashboard', '04:11:37');
INSERT INTO `menu_log` VALUES (823, 1, 'Pengguna', '04:11:43');
INSERT INTO `menu_log` VALUES (824, 1, 'Jenis Pekerjaan', '04:11:45');
INSERT INTO `menu_log` VALUES (825, 1, 'PPK', '04:11:46');
INSERT INTO `menu_log` VALUES (826, 1, 'Konsultan', '04:11:49');
INSERT INTO `menu_log` VALUES (827, 1, 'Kontraktor', '04:11:50');
INSERT INTO `menu_log` VALUES (828, 1, 'Data Umum', '04:11:52');
INSERT INTO `menu_log` VALUES (829, 1, 'Buat Data Umum', '04:11:56');
INSERT INTO `menu_log` VALUES (830, 1, 'Dashboard', '08:59:50');
INSERT INTO `menu_log` VALUES (831, 1, 'Data Umum', '08:59:57');
INSERT INTO `menu_log` VALUES (832, 1, 'Buat Data Umum', '09:00:17');
INSERT INTO `menu_log` VALUES (833, 1, 'Jadual', '09:02:47');
INSERT INTO `menu_log` VALUES (834, 1, 'Buat Request', '09:02:51');
INSERT INTO `menu_log` VALUES (835, 1, 'Logout', '09:04:37');
INSERT INTO `menu_log` VALUES (836, 1, 'Dashboard', '11:11:30');
INSERT INTO `menu_log` VALUES (837, 1, 'Data Umum', '11:14:09');
INSERT INTO `menu_log` VALUES (838, 1, 'Buat Data Umum', '11:14:58');
INSERT INTO `menu_log` VALUES (839, 1, 'Jadual', '11:17:24');
INSERT INTO `menu_log` VALUES (840, 1, 'Buat Request', '11:17:33');
INSERT INTO `menu_log` VALUES (841, 1, 'Data Umum', '11:17:34');
INSERT INTO `menu_log` VALUES (842, 1, 'Buat Jadual', '11:17:37');
INSERT INTO `menu_log` VALUES (843, 1, 'Data Umum', '11:19:46');
INSERT INTO `menu_log` VALUES (844, 1, 'Jadual', '11:19:48');
INSERT INTO `menu_log` VALUES (845, 1, 'Buat Request', '11:19:51');
INSERT INTO `menu_log` VALUES (846, 1, 'Request', '11:21:03');
INSERT INTO `menu_log` VALUES (847, 1, 'Dashboard', '09:55:03');
INSERT INTO `menu_log` VALUES (848, 1, 'Data Umum', '09:55:07');
INSERT INTO `menu_log` VALUES (849, 1, 'Buat Jadual', '09:55:12');
INSERT INTO `menu_log` VALUES (850, 1, 'Dashboard', '10:00:19');
INSERT INTO `menu_log` VALUES (851, 1, 'Data Umum', '10:06:53');
INSERT INTO `menu_log` VALUES (852, 1, 'Buat Jadual', '10:06:58');
INSERT INTO `menu_log` VALUES (853, 1, 'Data Umum', '10:40:04');
INSERT INTO `menu_log` VALUES (854, 1, 'Buat Jadual', '10:40:12');
INSERT INTO `menu_log` VALUES (855, 1, 'Data Umum', '10:40:17');
INSERT INTO `menu_log` VALUES (856, 1, 'Buat Data Umum', '10:40:25');
INSERT INTO `menu_log` VALUES (857, 1, 'Jadual', '10:40:33');
INSERT INTO `menu_log` VALUES (858, 1, 'Laporan Harian', '10:40:39');
INSERT INTO `menu_log` VALUES (859, 1, 'Laporan Harian', '10:40:50');
INSERT INTO `menu_log` VALUES (860, 1, 'Request', '10:40:50');
INSERT INTO `menu_log` VALUES (861, 1, 'Jadual', '10:40:56');
INSERT INTO `menu_log` VALUES (862, 1, 'Data Umum', '10:40:59');
INSERT INTO `menu_log` VALUES (863, 1, 'Edit Data Umum', '10:41:14');
INSERT INTO `menu_log` VALUES (864, 1, 'Kontraktor', '10:41:27');
INSERT INTO `menu_log` VALUES (865, 1, 'Konsultan', '10:41:30');
INSERT INTO `menu_log` VALUES (866, 1, 'Dashboard', '10:41:33');
INSERT INTO `menu_log` VALUES (867, 1, 'Data Umum', '10:41:35');
INSERT INTO `menu_log` VALUES (868, 1, 'Jadual', '10:42:10');
INSERT INTO `menu_log` VALUES (869, 1, 'Kontraktor', '10:42:13');
INSERT INTO `menu_log` VALUES (870, 1, 'Pengguna', '10:42:14');
INSERT INTO `menu_log` VALUES (871, 1, 'Data Umum', '10:42:55');
INSERT INTO `menu_log` VALUES (872, 1, 'Buat Jadual', '10:44:33');
INSERT INTO `menu_log` VALUES (873, 1, 'Buat Jadual', '10:49:57');
INSERT INTO `menu_log` VALUES (874, 1, 'Data Umum', '10:50:36');
INSERT INTO `menu_log` VALUES (875, 1, 'Buat Data Umum', '10:50:37');
INSERT INTO `menu_log` VALUES (876, 1, 'Data Umum', '10:50:39');
INSERT INTO `menu_log` VALUES (877, 1, 'Buat Jadual', '10:50:42');
INSERT INTO `menu_log` VALUES (878, 1, 'Kontraktor', '11:03:51');
INSERT INTO `menu_log` VALUES (879, 1, 'Pengguna', '11:04:00');
INSERT INTO `menu_log` VALUES (880, 1, 'Jadual', '11:05:27');
INSERT INTO `menu_log` VALUES (881, 1, 'Data Umum', '11:05:34');
INSERT INTO `menu_log` VALUES (882, 1, 'Jadual', '11:05:39');
INSERT INTO `menu_log` VALUES (883, 1, 'Edit Jadual', '11:05:58');
INSERT INTO `menu_log` VALUES (884, 1, 'Dashboard', '09:16:06');
INSERT INTO `menu_log` VALUES (885, 1, 'Kontraktor', '09:16:11');
INSERT INTO `menu_log` VALUES (886, 1, 'Data Umum', '09:16:21');
INSERT INTO `menu_log` VALUES (887, 1, 'Buat Jadual', '09:16:28');
INSERT INTO `menu_log` VALUES (888, 1, 'Laporan Harian', '09:16:50');
INSERT INTO `menu_log` VALUES (889, 1, 'Request', '09:17:11');
INSERT INTO `menu_log` VALUES (890, 1, 'Jadual', '09:17:13');
INSERT INTO `menu_log` VALUES (891, 1, 'Data Umum', '09:17:17');
INSERT INTO `menu_log` VALUES (892, 1, 'Laporan Harian', '09:17:21');
INSERT INTO `menu_log` VALUES (893, 1, 'Request', '09:17:26');
INSERT INTO `menu_log` VALUES (894, 1, 'Data Umum', '09:25:09');
INSERT INTO `menu_log` VALUES (895, 1, 'Kontraktor', '09:25:15');
INSERT INTO `menu_log` VALUES (896, 1, 'Konsultan', '09:25:21');
INSERT INTO `menu_log` VALUES (897, 1, 'PPK', '09:25:23');
INSERT INTO `menu_log` VALUES (898, 1, 'Jenis Pekerjaan', '09:25:24');
INSERT INTO `menu_log` VALUES (899, 1, 'Pengguna', '09:25:25');
INSERT INTO `menu_log` VALUES (900, 1, 'Data Umum', '09:25:31');
INSERT INTO `menu_log` VALUES (901, 1, 'Jadual', '09:25:38');
INSERT INTO `menu_log` VALUES (902, 1, 'Data Umum', '09:25:47');
INSERT INTO `menu_log` VALUES (903, 1, 'Request', '09:25:48');
INSERT INTO `menu_log` VALUES (904, 1, 'Dashboard', '09:35:33');
INSERT INTO `menu_log` VALUES (905, 1, 'Kontraktor', '09:53:39');
INSERT INTO `menu_log` VALUES (906, 1, 'Jenis Pekerjaan', '09:54:23');
INSERT INTO `menu_log` VALUES (907, 1, 'Data Umum', '09:55:23');
INSERT INTO `menu_log` VALUES (908, 1, 'Buat Data Umum', '09:56:29');
INSERT INTO `menu_log` VALUES (909, 1, 'Data Umum', '10:09:39');
INSERT INTO `menu_log` VALUES (910, 1, 'Edit Data Umum', '10:09:52');
INSERT INTO `menu_log` VALUES (911, 1, 'Data Umum', '10:10:21');
INSERT INTO `menu_log` VALUES (912, 1, 'Jadual', '10:10:23');
INSERT INTO `menu_log` VALUES (913, 1, 'Data Umum', '10:10:25');
INSERT INTO `menu_log` VALUES (914, 1, 'Buat Jadual', '10:10:28');
INSERT INTO `menu_log` VALUES (915, 1, 'Request', '10:14:05');
INSERT INTO `menu_log` VALUES (916, 1, 'Jadual', '10:14:15');
INSERT INTO `menu_log` VALUES (917, 1, 'Request', '10:14:17');
INSERT INTO `menu_log` VALUES (918, 1, 'Edit Request', '10:14:20');
INSERT INTO `menu_log` VALUES (919, 1, 'Jadual', '10:16:13');
INSERT INTO `menu_log` VALUES (920, 1, 'Buat Request', '10:16:18');
INSERT INTO `menu_log` VALUES (921, 1, 'Request', '10:17:53');
INSERT INTO `menu_log` VALUES (922, 1, 'Laporan Harian', '10:18:47');
INSERT INTO `menu_log` VALUES (923, 1, 'Request', '10:19:05');
INSERT INTO `menu_log` VALUES (924, 1, 'Buat Laporan Harian', '10:19:10');
INSERT INTO `menu_log` VALUES (925, 1, 'Laporan Harian', '10:25:01');
INSERT INTO `menu_log` VALUES (926, 1, 'Laporan Harian', '10:27:40');
INSERT INTO `menu_log` VALUES (927, 1, 'Dashboard', '10:25:19');
INSERT INTO `menu_log` VALUES (928, 1, 'PPK', '10:25:49');
INSERT INTO `menu_log` VALUES (929, 1, 'Konsultan', '10:25:52');
INSERT INTO `menu_log` VALUES (930, 1, 'Kontraktor', '10:25:53');
INSERT INTO `menu_log` VALUES (931, 1, 'Pengguna', '10:25:55');
INSERT INTO `menu_log` VALUES (932, 1, 'Data Umum', '10:34:02');
INSERT INTO `menu_log` VALUES (933, 1, 'Jadual', '10:34:05');
INSERT INTO `menu_log` VALUES (934, 1, 'Data Kontrak', '10:34:09');
INSERT INTO `menu_log` VALUES (935, 1, 'Edit User', '10:37:45');
INSERT INTO `menu_log` VALUES (936, 1, 'Dashboard', '10:38:03');
INSERT INTO `menu_log` VALUES (937, 1, 'Data Umum', '10:38:09');
INSERT INTO `menu_log` VALUES (938, 1, 'Buat Data Umum', '10:39:43');
INSERT INTO `menu_log` VALUES (939, 1, 'Request', '11:08:58');
INSERT INTO `menu_log` VALUES (940, 1, 'Request', '11:09:06');
INSERT INTO `menu_log` VALUES (941, 1, 'Laporan Harian', '11:16:06');
INSERT INTO `menu_log` VALUES (942, 1, 'Data Umum', '11:16:13');
INSERT INTO `menu_log` VALUES (943, 1, 'Buat Data Umum', '11:16:16');
INSERT INTO `menu_log` VALUES (944, 1, 'Jadual', '11:27:20');
INSERT INTO `menu_log` VALUES (945, 1, 'Request', '11:27:32');
INSERT INTO `menu_log` VALUES (946, 1, 'Laporan Harian', '11:27:39');
INSERT INTO `menu_log` VALUES (947, 1, 'Data Umum', '11:27:44');
INSERT INTO `menu_log` VALUES (948, 1, 'Buat Data Umum', '11:27:48');
INSERT INTO `menu_log` VALUES (949, 1, 'Dashboard', '01:41:12');
INSERT INTO `menu_log` VALUES (950, 1, 'Data Umum', '01:41:25');
INSERT INTO `menu_log` VALUES (951, 1, 'Dashboard', '01:42:13');
INSERT INTO `menu_log` VALUES (952, 1, 'Kontraktor', '01:42:29');
INSERT INTO `menu_log` VALUES (953, 1, 'Konsultan', '01:42:31');
INSERT INTO `menu_log` VALUES (954, 1, 'PPK', '01:42:32');
INSERT INTO `menu_log` VALUES (955, 1, 'Data Umum', '01:42:34');
INSERT INTO `menu_log` VALUES (956, 1, 'Jadual', '01:43:47');
INSERT INTO `menu_log` VALUES (957, 1, 'Request', '01:43:50');
INSERT INTO `menu_log` VALUES (958, 1, 'Kontraktor', '01:43:52');
INSERT INTO `menu_log` VALUES (959, 1, 'Konsultan', '01:44:16');
INSERT INTO `menu_log` VALUES (960, 1, 'PPK', '01:44:30');
INSERT INTO `menu_log` VALUES (961, 1, 'Jenis Pekerjaan', '01:44:51');
INSERT INTO `menu_log` VALUES (962, 1, 'Pengguna', '01:44:54');
INSERT INTO `menu_log` VALUES (963, 1, 'Kontraktor', '01:45:08');
INSERT INTO `menu_log` VALUES (964, 1, 'Data Umum', '01:46:18');
INSERT INTO `menu_log` VALUES (965, 1, 'Jadual', '01:47:52');
INSERT INTO `menu_log` VALUES (966, 1, 'Request', '01:47:54');
INSERT INTO `menu_log` VALUES (967, 1, 'Laporan Harian', '01:48:10');
INSERT INTO `menu_log` VALUES (968, 1, 'Request', '01:48:11');
INSERT INTO `menu_log` VALUES (969, 1, 'Jadual', '01:48:14');
INSERT INTO `menu_log` VALUES (970, 1, 'Request', '01:48:15');
INSERT INTO `menu_log` VALUES (971, 1, 'Dashboard', '01:48:34');
INSERT INTO `menu_log` VALUES (972, 1, 'Kontraktor', '01:48:46');
INSERT INTO `menu_log` VALUES (973, 1, 'Kontraktor', '01:48:59');
INSERT INTO `menu_log` VALUES (974, 1, 'Konsultan', '01:49:17');
INSERT INTO `menu_log` VALUES (975, 1, 'Kontraktor', '01:49:21');
INSERT INTO `menu_log` VALUES (976, 1, 'Kontraktor', '01:50:12');
INSERT INTO `menu_log` VALUES (977, 1, 'Kontraktor', '01:50:16');
INSERT INTO `menu_log` VALUES (978, 1, 'Dashboard', '01:50:42');
INSERT INTO `menu_log` VALUES (979, 1, 'Kontraktor', '01:52:30');
INSERT INTO `menu_log` VALUES (980, 1, 'Data Umum', '01:53:16');
INSERT INTO `menu_log` VALUES (981, 1, 'Buat Jadual', '01:53:19');
INSERT INTO `menu_log` VALUES (982, 1, 'Jenis Pekerjaan', '01:54:28');
INSERT INTO `menu_log` VALUES (983, 1, 'Kontraktor', '01:54:30');
INSERT INTO `menu_log` VALUES (984, 1, 'Konsultan', '01:54:31');
INSERT INTO `menu_log` VALUES (985, 1, 'Data Umum', '01:54:34');
INSERT INTO `menu_log` VALUES (986, 1, 'Jadual', '01:55:38');
INSERT INTO `menu_log` VALUES (987, 1, 'Data Umum', '01:55:41');
INSERT INTO `menu_log` VALUES (988, 1, 'Buat Jadual', '01:55:43');
INSERT INTO `menu_log` VALUES (989, 1, 'Jadual', '02:07:56');
INSERT INTO `menu_log` VALUES (990, 1, 'Request', '02:07:57');
INSERT INTO `menu_log` VALUES (991, 1, 'Data Umum', '02:08:00');
INSERT INTO `menu_log` VALUES (992, 1, 'Dashboard', '02:11:17');
INSERT INTO `menu_log` VALUES (993, 1, 'Data Umum', '02:11:37');
INSERT INTO `menu_log` VALUES (994, 1, 'Buat Jadual', '02:11:40');
INSERT INTO `menu_log` VALUES (995, 1, 'Data Umum', '02:16:17');
INSERT INTO `menu_log` VALUES (996, 1, 'Buat Data Umum', '02:16:19');
INSERT INTO `menu_log` VALUES (997, 1, 'Data Umum', '02:16:20');
INSERT INTO `menu_log` VALUES (998, 1, 'Buat Jadual', '02:16:21');
INSERT INTO `menu_log` VALUES (999, 1, 'Buat Jadual', '02:16:55');
INSERT INTO `menu_log` VALUES (1000, 1, 'Dashboard', '03:04:31');
INSERT INTO `menu_log` VALUES (1001, 1, 'Jadual', '03:04:35');
INSERT INTO `menu_log` VALUES (1002, 1, 'Buat Request', '03:04:46');
INSERT INTO `menu_log` VALUES (1003, 1, 'Jadual', '03:04:51');
INSERT INTO `menu_log` VALUES (1004, 1, 'Data Umum', '03:05:00');
INSERT INTO `menu_log` VALUES (1005, 1, 'Jadual', '03:05:02');
INSERT INTO `menu_log` VALUES (1006, 1, 'Data Umum', '03:05:35');
INSERT INTO `menu_log` VALUES (1007, 1, 'Jadual', '03:05:55');
INSERT INTO `menu_log` VALUES (1008, 1, 'Request', '03:07:46');
INSERT INTO `menu_log` VALUES (1009, 1, 'Laporan Harian', '03:07:48');
INSERT INTO `menu_log` VALUES (1010, 1, 'Laporan Pekerjaan', '03:08:14');
INSERT INTO `menu_log` VALUES (1011, 1, 'Perencanaan Konsultan', '03:09:54');
INSERT INTO `menu_log` VALUES (1012, 1, 'Data Kontrak', '03:09:56');
INSERT INTO `menu_log` VALUES (1013, 1, 'Laporan Harian', '03:10:38');
INSERT INTO `menu_log` VALUES (1014, 1, 'Jadual', '03:10:40');
INSERT INTO `menu_log` VALUES (1015, 1, 'Data Umum', '03:25:23');
INSERT INTO `menu_log` VALUES (1016, 1, 'Buat Jadual', '03:25:26');
INSERT INTO `menu_log` VALUES (1017, 1, 'Dashboard', '10:19:01');
INSERT INTO `menu_log` VALUES (1018, 1, 'Kontraktor', '10:19:16');
INSERT INTO `menu_log` VALUES (1019, 1, 'Data Umum', '10:19:54');
INSERT INTO `menu_log` VALUES (1020, 1, 'Buat Jadual', '10:19:58');
INSERT INTO `menu_log` VALUES (1021, 1, 'Data Umum', '11:33:35');
INSERT INTO `menu_log` VALUES (1022, 1, 'Buat Jadual', '11:33:44');
INSERT INTO `menu_log` VALUES (1023, 1, 'Data Umum', '11:40:41');
INSERT INTO `menu_log` VALUES (1024, 1, 'Buat Jadual', '11:44:13');
INSERT INTO `menu_log` VALUES (1025, 1, 'Data Umum', '11:44:20');
INSERT INTO `menu_log` VALUES (1026, 1, 'Buat Jadual', '11:44:24');
INSERT INTO `menu_log` VALUES (1027, 1, 'Data Umum', '11:49:53');
INSERT INTO `menu_log` VALUES (1028, 1, 'Buat Jadual', '11:51:47');
INSERT INTO `menu_log` VALUES (1029, 1, 'Data Umum', '01:00:54');
INSERT INTO `menu_log` VALUES (1030, 1, 'Buat Data Umum', '01:00:55');
INSERT INTO `menu_log` VALUES (1031, 1, 'Catatan Log', '01:03:51');
INSERT INTO `menu_log` VALUES (1032, 1, 'Dashboard', '01:05:33');
INSERT INTO `menu_log` VALUES (1033, 1, 'Kontraktor', '01:05:36');
INSERT INTO `menu_log` VALUES (1034, 1, 'Data Umum', '01:05:40');
INSERT INTO `menu_log` VALUES (1035, 1, 'Dashboard', '01:08:42');
INSERT INTO `menu_log` VALUES (1036, 1, 'Kontraktor', '01:08:43');
INSERT INTO `menu_log` VALUES (1037, 1, 'Konsultan', '01:09:51');
INSERT INTO `menu_log` VALUES (1038, 1, 'PPK', '01:09:53');
INSERT INTO `menu_log` VALUES (1039, 1, 'Jenis Pekerjaan', '01:09:54');
INSERT INTO `menu_log` VALUES (1040, 1, 'Pengguna', '01:09:55');
INSERT INTO `menu_log` VALUES (1041, 1, 'Kontraktor', '01:09:56');
INSERT INTO `menu_log` VALUES (1042, 1, 'Data Umum', '01:09:58');
INSERT INTO `menu_log` VALUES (1043, 1, 'Buat Data Umum', '01:15:32');
INSERT INTO `menu_log` VALUES (1044, 1, 'Data Umum', '01:41:35');
INSERT INTO `menu_log` VALUES (1045, 1, 'Buat Jadual', '01:41:44');
INSERT INTO `menu_log` VALUES (1046, 1, 'Data Umum', '01:43:00');
INSERT INTO `menu_log` VALUES (1047, 1, 'Buat Jadual', '01:43:58');
INSERT INTO `menu_log` VALUES (1048, 1, 'Buat Jadual', '01:45:23');
INSERT INTO `menu_log` VALUES (1049, 1, 'Data Umum', '01:47:34');
INSERT INTO `menu_log` VALUES (1050, 1, 'Buat Data Umum', '01:47:35');
INSERT INTO `menu_log` VALUES (1051, 1, 'Jadual', '01:50:01');
INSERT INTO `menu_log` VALUES (1052, 1, 'Dashboard', '01:52:06');
INSERT INTO `menu_log` VALUES (1053, 1, 'Data Umum', '01:52:11');
INSERT INTO `menu_log` VALUES (1054, 1, 'Buat Jadual', '01:52:13');
INSERT INTO `menu_log` VALUES (1055, 1, 'Data Umum', '01:53:06');
INSERT INTO `menu_log` VALUES (1056, 1, 'Buat Data Umum', '01:53:08');
INSERT INTO `menu_log` VALUES (1057, 1, 'Data Umum', '01:54:11');
INSERT INTO `menu_log` VALUES (1058, 1, 'Buat Data Umum', '01:54:13');
INSERT INTO `menu_log` VALUES (1059, 1, 'Jadual', '02:00:16');
INSERT INTO `menu_log` VALUES (1060, 1, 'Buat Request', '02:00:19');
INSERT INTO `menu_log` VALUES (1061, 1, 'Request', '02:00:22');
INSERT INTO `menu_log` VALUES (1062, 1, 'Catatan Log', '02:01:32');
INSERT INTO `menu_log` VALUES (1063, 1, 'Jadual', '02:01:38');
INSERT INTO `menu_log` VALUES (1064, 1, 'Request', '02:01:39');
INSERT INTO `menu_log` VALUES (1065, 1, 'Perencanaan Konsultan', '02:01:56');
INSERT INTO `menu_log` VALUES (1066, 1, 'Catatan Log', '02:01:58');
INSERT INTO `menu_log` VALUES (1067, 1, 'Jadual', '02:02:04');
INSERT INTO `menu_log` VALUES (1068, 1, 'Request', '02:02:07');
INSERT INTO `menu_log` VALUES (1069, 1, 'Request', '02:02:08');
INSERT INTO `menu_log` VALUES (1070, 1, 'Jadual', '02:02:09');
INSERT INTO `menu_log` VALUES (1071, 1, 'Dashboard', '02:08:30');
INSERT INTO `menu_log` VALUES (1072, 1, 'Dashboard', '02:36:27');
INSERT INTO `menu_log` VALUES (1073, 1, 'Kontraktor', '02:36:29');
INSERT INTO `menu_log` VALUES (1074, 1, 'Data Umum', '02:36:31');
INSERT INTO `menu_log` VALUES (1075, 1, 'Buat Data Umum', '02:36:33');
INSERT INTO `menu_log` VALUES (1076, 1, 'Data Umum', '02:36:55');
INSERT INTO `menu_log` VALUES (1077, 1, 'Buat Jadual', '02:36:57');
INSERT INTO `menu_log` VALUES (1078, 1, 'Data Umum', '02:37:02');
INSERT INTO `menu_log` VALUES (1079, 1, 'Data Umum', '02:39:59');
INSERT INTO `menu_log` VALUES (1080, 1, 'Dashboard', '02:59:30');
INSERT INTO `menu_log` VALUES (1081, 1, 'Data Umum', '02:59:34');
INSERT INTO `menu_log` VALUES (1082, 1, 'Data Umum', '02:59:39');
INSERT INTO `menu_log` VALUES (1083, 1, 'Buat Data Umum', '02:59:40');
INSERT INTO `menu_log` VALUES (1084, 1, 'Data Umum', '02:59:45');
INSERT INTO `menu_log` VALUES (1085, 1, 'Data Umum', '03:14:28');
INSERT INTO `menu_log` VALUES (1086, 1, 'Data Umum', '03:15:24');
INSERT INTO `menu_log` VALUES (1087, 1, 'Buat Jadual', '03:15:33');
INSERT INTO `menu_log` VALUES (1088, 1, 'Data Umum', '03:16:01');
INSERT INTO `menu_log` VALUES (1089, 1, 'Buat Data Umum', '03:16:03');
INSERT INTO `menu_log` VALUES (1090, 1, 'Data Umum', '03:17:55');
INSERT INTO `menu_log` VALUES (1091, 1, 'Buat Data Umum', '03:17:58');
INSERT INTO `menu_log` VALUES (1092, 1, 'Data Umum', '03:24:43');
INSERT INTO `menu_log` VALUES (1093, 1, 'Buat Jadual', '03:24:45');
INSERT INTO `menu_log` VALUES (1094, 1, 'Data Umum', '03:32:54');
INSERT INTO `menu_log` VALUES (1095, 1, 'Data Umum', '03:33:49');
INSERT INTO `menu_log` VALUES (1096, 1, 'Buat Data Umum', '03:33:50');
INSERT INTO `menu_log` VALUES (1097, 1, 'Data Umum', '03:33:53');
INSERT INTO `menu_log` VALUES (1098, 1, 'Buat Jadual', '03:33:56');
INSERT INTO `menu_log` VALUES (1099, 1, 'Dashboard', '03:40:42');
INSERT INTO `menu_log` VALUES (1100, 1, 'Data Umum', '03:40:45');
INSERT INTO `menu_log` VALUES (1101, 1, 'Data Umum', '03:41:52');
INSERT INTO `menu_log` VALUES (1102, 1, 'Data Umum', '03:43:09');
INSERT INTO `menu_log` VALUES (1103, 1, 'Buat Data Umum', '03:43:10');
INSERT INTO `menu_log` VALUES (1104, 1, 'Jadual', '03:43:25');
INSERT INTO `menu_log` VALUES (1105, 1, 'Data Umum', '03:43:27');
INSERT INTO `menu_log` VALUES (1106, 1, 'Data Umum', '03:43:32');
INSERT INTO `menu_log` VALUES (1107, 1, 'Buat Data Umum', '03:43:34');
INSERT INTO `menu_log` VALUES (1108, 1, 'Data Umum', '03:43:36');
INSERT INTO `menu_log` VALUES (1109, 1, 'Buat Jadual', '03:43:46');
INSERT INTO `menu_log` VALUES (1110, 1, 'Jadual', '03:43:58');
INSERT INTO `menu_log` VALUES (1111, 1, 'Data Umum', '03:45:10');
INSERT INTO `menu_log` VALUES (1112, 1, 'Dashboard', '09:54:30');
INSERT INTO `menu_log` VALUES (1113, 1, 'Kontraktor', '09:54:32');
INSERT INTO `menu_log` VALUES (1114, 1, 'Data Umum', '09:54:34');
INSERT INTO `menu_log` VALUES (1115, 1, 'Buat Jadual', '09:54:51');
INSERT INTO `menu_log` VALUES (1116, 1, 'Data Umum', '10:00:31');
INSERT INTO `menu_log` VALUES (1117, 1, 'Buat Data Umum', '10:00:31');
INSERT INTO `menu_log` VALUES (1118, 1, 'Data Umum', '10:36:58');
INSERT INTO `menu_log` VALUES (1119, 1, 'Buat Jadual', '10:37:02');
INSERT INTO `menu_log` VALUES (1120, 1, 'Data Umum', '01:55:24');
INSERT INTO `menu_log` VALUES (1121, 1, 'Buat Jadual', '02:35:24');
INSERT INTO `menu_log` VALUES (1122, 1, 'Dashboard', '06:35:33');
INSERT INTO `menu_log` VALUES (1123, 1, 'Data Umum', '06:35:49');
INSERT INTO `menu_log` VALUES (1124, 1, 'Buat Data Umum', '06:35:50');
INSERT INTO `menu_log` VALUES (1125, 1, 'Kontraktor', '06:40:00');
INSERT INTO `menu_log` VALUES (1126, 1, 'Dashboard', '06:40:01');
INSERT INTO `menu_log` VALUES (1127, 1, 'Data Umum', '06:40:06');
INSERT INTO `menu_log` VALUES (1128, 1, 'Buat Data Umum', '06:40:24');
INSERT INTO `menu_log` VALUES (1129, 1, 'Data Umum', '06:40:27');
INSERT INTO `menu_log` VALUES (1130, 1, 'Data Umum', '07:11:10');
INSERT INTO `menu_log` VALUES (1131, 1, 'Dashboard', '08:26:33');
INSERT INTO `menu_log` VALUES (1132, 1, 'Data Umum', '08:26:46');
INSERT INTO `menu_log` VALUES (1133, 1, 'Buat Data Umum', '08:26:47');
INSERT INTO `menu_log` VALUES (1134, 1, 'Dashboard', '09:46:33');
INSERT INTO `menu_log` VALUES (1135, 1, 'Data Umum', '09:46:39');
INSERT INTO `menu_log` VALUES (1136, 1, 'Edit Data Umum', '09:49:34');
INSERT INTO `menu_log` VALUES (1137, 1, 'Data Umum', '09:53:16');
INSERT INTO `menu_log` VALUES (1138, 1, 'Buat Jadual', '11:02:18');
INSERT INTO `menu_log` VALUES (1139, 1, 'Data Umum', '11:05:45');
INSERT INTO `menu_log` VALUES (1140, 1, 'Jadual', '11:29:40');
INSERT INTO `menu_log` VALUES (1141, 1, 'Request', '11:41:51');
INSERT INTO `menu_log` VALUES (1142, 1, 'Dashboard', '10:35:43');
INSERT INTO `menu_log` VALUES (1143, 1, 'Data Umum', '10:38:00');
INSERT INTO `menu_log` VALUES (1144, 1, 'Buat Jadual', '11:27:33');
INSERT INTO `menu_log` VALUES (1145, 1, 'Request', '01:14:33');
INSERT INTO `menu_log` VALUES (1146, 1, 'Jadual', '01:14:35');
INSERT INTO `menu_log` VALUES (1147, 1, 'Buat Request', '01:14:37');
INSERT INTO `menu_log` VALUES (1148, 1, 'Jadual', '01:14:44');
INSERT INTO `menu_log` VALUES (1149, 1, 'Buat Request', '01:14:55');
INSERT INTO `menu_log` VALUES (1150, 1, 'Buat Request', '01:15:15');
INSERT INTO `menu_log` VALUES (1151, 1, 'Jadual', '01:15:27');
INSERT INTO `menu_log` VALUES (1152, 1, 'Buat Request', '01:15:28');
INSERT INTO `menu_log` VALUES (1153, 1, 'Jadual', '01:18:26');
INSERT INTO `menu_log` VALUES (1154, 1, 'Buat Request', '01:18:38');
INSERT INTO `menu_log` VALUES (1155, 1, 'Jadual', '01:30:17');
INSERT INTO `menu_log` VALUES (1156, 1, 'Request', '01:30:17');
INSERT INTO `menu_log` VALUES (1157, 1, 'Jadual', '02:35:21');
INSERT INTO `menu_log` VALUES (1158, 1, 'Laporan Harian', '02:37:06');
INSERT INTO `menu_log` VALUES (1159, 1, 'Edit Laporan Harian', '02:37:22');
INSERT INTO `menu_log` VALUES (1160, 1, 'Edit Laporan Harian', '02:37:22');
INSERT INTO `menu_log` VALUES (1161, 1, 'Request', '02:37:27');
INSERT INTO `menu_log` VALUES (1162, 1, 'Buat Laporan Harian', '02:37:30');
INSERT INTO `menu_log` VALUES (1163, 1, 'Laporan Harian', '02:38:43');
INSERT INTO `menu_log` VALUES (1164, 1, 'Request', '02:38:46');
INSERT INTO `menu_log` VALUES (1165, 1, 'Laporan Harian', '02:38:48');
INSERT INTO `menu_log` VALUES (1166, 1, 'Request', '02:40:12');
INSERT INTO `menu_log` VALUES (1167, 1, 'Dashboard', '03:50:39');
INSERT INTO `menu_log` VALUES (1168, 1, 'Data Umum', '03:50:44');
INSERT INTO `menu_log` VALUES (1169, 1, 'Data Umum', '04:36:17');
INSERT INTO `menu_log` VALUES (1170, 1, 'Data Umum', '04:36:19');
INSERT INTO `menu_log` VALUES (1171, 1, 'Data Umum', '04:36:21');
INSERT INTO `menu_log` VALUES (1172, 1, 'Data Umum', '04:37:12');
INSERT INTO `menu_log` VALUES (1173, 1, 'Logout', '16:37:16');
INSERT INTO `menu_log` VALUES (1174, 1, 'Dashboard', '04:37:29');
INSERT INTO `menu_log` VALUES (1175, 1, 'Data Umum', '04:37:32');
INSERT INTO `menu_log` VALUES (1176, 1, 'Dashboard', '04:54:51');
INSERT INTO `menu_log` VALUES (1177, 1, 'Data Umum', '04:54:53');
INSERT INTO `menu_log` VALUES (1178, 1, 'Dashboard', '06:36:28');
INSERT INTO `menu_log` VALUES (1179, 1, 'Data Umum', '06:37:05');
INSERT INTO `menu_log` VALUES (1180, 1, 'Data Umum', '07:00:58');
INSERT INTO `menu_log` VALUES (1181, 1, 'Data Umum', '07:01:11');
INSERT INTO `menu_log` VALUES (1182, 1, 'Data Umum', '07:01:45');
INSERT INTO `menu_log` VALUES (1183, 1, 'Data Umum', '07:03:35');
INSERT INTO `menu_log` VALUES (1184, 1, 'Data Umum', '07:03:49');
INSERT INTO `menu_log` VALUES (1185, 1, 'Edit User', '07:06:18');
INSERT INTO `menu_log` VALUES (1186, 1, 'Dashboard', '07:06:21');
INSERT INTO `menu_log` VALUES (1187, 1, 'Data Umum', '07:06:25');
INSERT INTO `menu_log` VALUES (1188, 1, 'Data Umum', '07:09:25');

-- ----------------------------
-- Table structure for pembangunan
-- ----------------------------
DROP TABLE IF EXISTS `pembangunan`;
CREATE TABLE `pembangunan`  (
  `kode_paket` int NOT NULL,
  `nama_paket` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `lokasi_pekerjaan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pagu_anggaran` decimal(20, 2) NOT NULL,
  `target_panjang` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `waktu_pelaksanaan_hk` int NOT NULL,
  `waktu_pelaksanaan_bln` int NOT NULL,
  `titik_segmen1` int NOT NULL,
  `km_bdg1` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `titik_segmen2` int NULL DEFAULT NULL,
  `km_bdg2` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `titik_segmen3` int NULL DEFAULT NULL,
  `km_bdg3` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `titik_segmen4` int NULL DEFAULT NULL,
  `km_bdg4` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `titik_segmen5` int NULL DEFAULT NULL,
  `km_bdg5` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `titik_segmen6` int NULL DEFAULT NULL,
  `km_bdg6` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `titik_segmen7` int NULL DEFAULT NULL,
  `km_bdg7` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `keterangan` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jenis_penanganan` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `penyedia_jasa` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nomor_kontrak` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_kontrak` date NOT NULL,
  `nilai_kontrak` decimal(20, 2) NOT NULL,
  `nilai_tambahan` decimal(20, 2) NOT NULL,
  `nilai_kontrak_perubahan` decimal(20, 2) NOT NULL,
  `total_tambahan` decimal(20, 2) NULL DEFAULT NULL,
  `total_sisa_lelang` decimal(20, 2) NULL DEFAULT NULL,
  `lat` float(10, 6) NOT NULL,
  `lng` float(10, 6) NOT NULL,
  `status` int NULL DEFAULT NULL,
  `kategori` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kegiatan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sup` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `lat1` float(10, 6) NOT NULL,
  `lng1` float(10, 6) NOT NULL,
  `uptd_id` int NOT NULL
) ENGINE = MyISAM CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of pembangunan
-- ----------------------------

-- ----------------------------
-- Table structure for penilaian
-- ----------------------------
DROP TABLE IF EXISTS `penilaian`;
CREATE TABLE `penilaian`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `no_kontrak` int NOT NULL,
  `nama_paket` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_penyedia_jasa` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of penilaian
-- ----------------------------

-- ----------------------------
-- Table structure for progress_mingguan
-- ----------------------------
DROP TABLE IF EXISTS `progress_mingguan`;
CREATE TABLE `progress_mingguan`  (
  `id_progress` int NOT NULL AUTO_INCREMENT,
  `id_data_umum` int NOT NULL,
  `namakegiatan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `field_team` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `panjang_km` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `penyedia_jasa` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `spmk` date NOT NULL,
  `pho` date NOT NULL,
  `waktu_pelaksanaan` int NOT NULL,
  `konsultan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `minggu_ke` int NOT NULL,
  `rencana` float NOT NULL,
  `realisasi` float NOT NULL,
  `deviasi` float NOT NULL,
  `keuangan_rp` double NOT NULL,
  `keuangan_per` double NOT NULL,
  PRIMARY KEY (`id_progress`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of progress_mingguan
-- ----------------------------
INSERT INTO `progress_mingguan` VALUES (1, 5, 'REHABILITAS JALAN SUKANAGARA - SINDANGBARANG (1,3KM)', 'One in All : 1. Andi 2. Gumelar', '12.00', 'PT. GENTA BANGUN NUSANTARA', '2020-05-09', '2020-05-21', 12, 'PT. JASA MITRA MANUNGGAL ', 5, 67, 34, 34, 55, 234);

-- ----------------------------
-- Table structure for proses_log
-- ----------------------------
DROP TABLE IF EXISTS `proses_log`;
CREATE TABLE `proses_log`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_login_user` int NOT NULL,
  `keterangan_proses` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jam_proses` time NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 58 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of proses_log
-- ----------------------------
INSERT INTO `proses_log` VALUES (1, 1, 'Mengubah data kontraktor', '01:27:58');
INSERT INTO `proses_log` VALUES (2, 1, 'Mengubah data kontraktor', '02:00:07');
INSERT INTO `proses_log` VALUES (3, 1, 'Mengubah data kontraktor', '02:00:20');
INSERT INTO `proses_log` VALUES (4, 1, 'Mengubah data kontraktor', '02:01:00');
INSERT INTO `proses_log` VALUES (5, 1, 'Menghapus data kontraktor', '02:08:35');
INSERT INTO `proses_log` VALUES (6, 1, 'Menghapus data kontraktor', '02:08:50');
INSERT INTO `proses_log` VALUES (7, 1, 'Menghapus data kontraktor', '02:09:59');
INSERT INTO `proses_log` VALUES (8, 1, 'Menghapus data kontraktor', '02:10:47');
INSERT INTO `proses_log` VALUES (9, 1, 'Menghapus data kontraktor', '02:11:03');
INSERT INTO `proses_log` VALUES (10, 1, 'Menghapus data kontraktor', '02:11:30');
INSERT INTO `proses_log` VALUES (11, 1, 'Menghapus data kontraktor', '02:11:55');
INSERT INTO `proses_log` VALUES (12, 1, 'Menghapus data kontraktor', '02:12:20');
INSERT INTO `proses_log` VALUES (13, 1, 'Menghapus data kontraktor', '02:47:20');
INSERT INTO `proses_log` VALUES (14, 1, 'Menghapus data kontraktor', '02:48:59');
INSERT INTO `proses_log` VALUES (15, 1, 'Menghapus data kontraktor', '02:51:28');
INSERT INTO `proses_log` VALUES (16, 1, 'Menghapus data konsultan', '02:55:21');
INSERT INTO `proses_log` VALUES (17, 1, 'Menghapus data konsultan', '02:56:35');
INSERT INTO `proses_log` VALUES (18, 1, 'Menghapus data konsultan', '02:57:15');
INSERT INTO `proses_log` VALUES (19, 1, 'Mengubah data konsultan2', '02:58:14');
INSERT INTO `proses_log` VALUES (20, 1, 'Menghapus data konsultan', '02:58:19');
INSERT INTO `proses_log` VALUES (21, 1, 'Mengubah data ppk2', '03:02:09');
INSERT INTO `proses_log` VALUES (22, 1, 'Mengubah data ppk2', '03:05:56');
INSERT INTO `proses_log` VALUES (23, 1, 'Menghapus data master ppk', '03:06:02');
INSERT INTO `proses_log` VALUES (24, 1, 'Menghapus data master ppk', '03:06:07');
INSERT INTO `proses_log` VALUES (25, 1, 'Menghapus data master ppk', '03:06:32');
INSERT INTO `proses_log` VALUES (26, 1, 'Menghapus data master ppk', '03:06:37');
INSERT INTO `proses_log` VALUES (27, 1, 'Mengubah data ppk2', '03:07:51');
INSERT INTO `proses_log` VALUES (28, 1, 'Menghapus data konsultan', '03:07:57');
INSERT INTO `proses_log` VALUES (29, 1, 'Menghapus data konsultan', '03:08:20');
INSERT INTO `proses_log` VALUES (30, 1, 'Menghapus data konsultan', '03:08:50');
INSERT INTO `proses_log` VALUES (31, 1, 'Menghapus data master ppk', '03:10:09');
INSERT INTO `proses_log` VALUES (32, 1, 'Menghapus data master ppk', '03:11:11');
INSERT INTO `proses_log` VALUES (33, 1, 'Mengubah data user', '03:42:25');
INSERT INTO `proses_log` VALUES (34, 1, 'Submit data user', '03:42:34');
INSERT INTO `proses_log` VALUES (35, 1, 'Mengubah data pekerjaan', '04:03:41');
INSERT INTO `proses_log` VALUES (36, 1, 'Menghapus data pekerjaan', '04:10:30');
INSERT INTO `proses_log` VALUES (37, 1, 'Menghapus data pekerjaan', '04:10:59');
INSERT INTO `proses_log` VALUES (38, 1, 'Menghapus data pekerjaan', '04:11:24');
INSERT INTO `proses_log` VALUES (39, 1, 'Menghapus data pekerjaan', '04:11:30');
INSERT INTO `proses_log` VALUES (40, 1, 'Menghapus data pekerjaan', '04:11:49');
INSERT INTO `proses_log` VALUES (41, 1, 'Menghapus data kontraktor', '10:25:40');
INSERT INTO `proses_log` VALUES (42, 1, 'Menghapus data kontraktor', '10:26:01');
INSERT INTO `proses_log` VALUES (43, 1, 'Menghapus data kontraktor', '10:28:22');
INSERT INTO `proses_log` VALUES (44, 1, 'Mengubah data konsultan2', '10:29:16');
INSERT INTO `proses_log` VALUES (45, 1, 'Menghapus data konsultan', '10:29:19');
INSERT INTO `proses_log` VALUES (46, 1, 'Mengubah data ppk2', '10:29:41');
INSERT INTO `proses_log` VALUES (47, 1, 'Menghapus data master ppk', '10:29:46');
INSERT INTO `proses_log` VALUES (48, 1, 'Mengubah data pekerjaan', '10:30:10');
INSERT INTO `proses_log` VALUES (49, 1, 'Menghapus data pekerjaan', '10:30:14');
INSERT INTO `proses_log` VALUES (50, 1, 'Mengubah data user', '10:30:57');
INSERT INTO `proses_log` VALUES (51, 1, 'Submit request', '12:13:34');
INSERT INTO `proses_log` VALUES (52, 1, 'Menghapus data pekerjaan', '12:19:17');
INSERT INTO `proses_log` VALUES (53, 1, 'Menghapus data pekerjaan', '12:19:22');
INSERT INTO `proses_log` VALUES (54, 1, 'Menghapus data pekerjaan', '12:21:48');
INSERT INTO `proses_log` VALUES (55, 1, 'Submit data user', '02:23:54');
INSERT INTO `proses_log` VALUES (56, 1, 'Menghapus data kontraktor', '01:50:12');
INSERT INTO `proses_log` VALUES (57, 1, 'Menghapus data kontraktor', '01:50:16');

-- ----------------------------
-- Table structure for rencana_pekerjaan
-- ----------------------------
DROP TABLE IF EXISTS `rencana_pekerjaan`;
CREATE TABLE `rencana_pekerjaan`  (
  `no_pekerjaan` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Tgl_rencana` date NOT NULL,
  `volume_rencana` decimal(10, 2) NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of rencana_pekerjaan
-- ----------------------------

-- ----------------------------
-- Table structure for request
-- ----------------------------
DROP TABLE IF EXISTS `request`;
CREATE TABLE `request`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nama_kegiatan` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `unor` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_jenis_pekerjaan` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jenis_pekerjaan` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `diajukan_tgl` date NOT NULL,
  `lokasi_sta` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `volume` decimal(10, 2) NOT NULL,
  `satuan` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pelaksanaan_tgl` date NOT NULL,
  `catatan_surveyor` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `catatan_Inspector` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `catatan_technician` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ci` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `qe` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nama_kontraktor` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nama_direksi` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nama_ppk` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kontraktor` int NOT NULL,
  `status` int NOT NULL,
  `konsultan` int NOT NULL,
  `ppk` int NOT NULL,
  `sketsa` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `foto_konsultan` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `app_konsultan` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `foto_ppk` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `note` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tgl_input` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tgl_update` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `gk1` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `gk2` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `gp1` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `aksi1` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `aksi2` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `aksi3` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `catatan_ppk` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `catatan_konsultan` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of request
-- ----------------------------
INSERT INTO `request` VALUES (1, '1', 'REHABILITASI JALAN BRATAYUDA DAN JALAN CILEDUG (GARUT)(1,00 KM)', '', '', 'Pemeliharaan Rutin Perkerasan ', '2020-03-09', '123', 222.00, '', '2020-03-09', '', '', '', '12121', '1212', 'PT. ERA TATA BUANA', 'PT. JASA MITRA MANUNGGAL', 'Maman Suparman, ST. MT', 0, 0, 1, 1, '26042020132517245.jpg', '', '', '', 'sadadadadadadad', '', '11 February 2021, 7:59', '1', '1', '1', 'disabled', 'disabled', '', 'good', 'ok');
INSERT INTO `request` VALUES (2, '1', 'REHABILITAS JALAN SUKANAGARA - SINDANGBARANG (1,3KM)', '', '', 'Pemeliharaan Rutin Perkerasan ', '2020-04-27', '110', 10.00, '', '2020-04-29', '', '', '', 'aa', 'bb', 'cc', 'konsultan', 'eko', 0, 0, 1, 1, '28042020075021Perkerasan Jalan Lentur.jpg', '', '', '', '', '28 April 2020, 7:50', '', '4', '1', '1', 'disabled', '', '', 'ok', 'teeeeees');
INSERT INTO `request` VALUES (3, '1', 'REHABILITASI JALAN BRATAYUDA DAN JALAN CILEDUG (GARUT)(1,00 KM)', '', '', 'apa aja', '2020-05-11', '12', 10.00, '', '2020-05-12', '', '', '', 'aa', 'bb', 'PT. GENTA BANGUN NUSANTARA', 'PT. JASA MITRA MANUNGGAL', 'Maman Suparman, ST. MT', 1, 0, 0, 0, '1.jpg', 'agregat5-1.JPG', 'Request-1.pdf', '1-0.jpg', '', '11 May 2020, 13:09', '11 May 2020, 15:06', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'disabled', '', '', 'tidak sesuai', 'Data Belum Lengkap');
INSERT INTO `request` VALUES (4, '1', 'REHABILITAS JALAN SUKANAGARA - SINDANGBARANG (1,3KM)', '', '', 'yang kedua', '2020-05-18', '56', 12.00, '', '2020-05-19', '', '', '', 'aas', 'asasa', 'PT. ERA TATA BUANA', 'PT. JASA MITRA MANUNGGAL', 'Maman Suparman, ST. MT', 1, 0, 1, 0, '110520201509071-0.jpg', 'agregat.JPG', '', '', '', '11 May 2020, 15:09', '', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'disabled', '', '', '', 'dsfdsfs');
INSERT INTO `request` VALUES (5, '1', 'ZZ', '', '', '1.21', '2020-07-07', '112', 2.00, '', '2020-07-09', '', '', '', '456', '789', 'PT. ERA TATA BUANA', 'PT. JASA MITRA MANUNGGAL', 'Maman Suparman, ST. MT', 1, 0, 0, 0, '06072020223946Perkerasan Jalan Lentur.jpg', '13123123.jpg', '', '', '', '6 July 2020, 22:39', '', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'disabled', '', '', '', 'fffffff');
INSERT INTO `request` VALUES (6, '1', 'ZZ', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - I', '', '1.21', '2020-07-13', '1111', 2.00, 'TON', '2020-07-15', '', '', '', '111234', '11123333', 'PT. ERA TATA BUANA', 'PT. JASA MITRA MANUNGGAL', 'Maman Suparman, ST. MT', 1, 0, 0, 1, '06072020224602d.png', '', '', 'apple6.png', '', '6 July 2020, 22:46', '', '4', '2', '1', 'disabled', 'disabled', '', 'ok', '');
INSERT INTO `request` VALUES (7, '1', 'hayyyyyy', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', '', '1.17', '2020-07-23', '123', 2.00, 'ton', '2020-07-27', '', '', '', '12', '12', 'PT. ERA TATA BUANA', 'PT. JASA MITRA MANUNGGAL', 'Maman Suparman, ST. MT', 1, 0, 0, 0, '2207202022195326042020132517245.jpg', '', '', '', '', '22 July 2020, 22:19', '', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>', 'disabled', '', '', '', '');
INSERT INTO `request` VALUES (8, '1', 'hayyyyyy', 'UPTD PENGELOLAAN JALAN DAN JEMBATAN WILAYAH PELAYANAN - IV', '', '1.17', '2020-07-23', '111', 2.00, 'ton', '2020-07-27', '', '', '', '1', '1', 'PT. ERA TATA BUANA', 'PT. JASA MITRA MANUNGGAL', 'Maman Suparman, ST. MT', 0, 0, 0, 0, '22072020222308260420201315503.png', '', '', '', '', '22 July 2020, 22:23', '', '', '', '', '', 'disabled', 'disabled', '', '');
INSERT INTO `request` VALUES (9, '1', 'REHABILITASI JALAN BRATAYUDA DAN JALAN CILEDUG (GARUT)(1,00 KM)', '', '', '12', '2020-08-05', '11qqqq', 1.00, '', '2020-08-05', '', '', '', '', '', 'PT. ERA TATA BUANA', 'PT. JASA MITRA MANUNGGAL', '', 0, 0, 0, 0, '0408202019303133b869f90619e81763dbf1fccc896d8d.jpg', '', '', '', '', '4 August 2020, 19:30', '', '', '', '', '', 'disabled', 'disabled', '', '');
INSERT INTO `request` VALUES (10, '1', 'coba tampilan baru', 'DINAS BINA MARGA DAN PENATAAN RUANG PROVINSI JAWA BARAT', 'Manajemen dan Keselamatan Lalu Lintas ', '1.18.(1)', '2020-08-05', '123', 1.00, 'TON', '2020-08-05', '', '', '', '123', '123', 'PT. ERA TATA BUANA', 'PT. SECON DWITUNGGAL PUTRA KSO PT.NUANSA GALAXY', 'Maman Suparman, ST. MT', 0, 0, 0, 0, '05082020063507123.jpg', '', '', '', '', '5 August 2020, 6:35', '', '', '', '', '', 'disabled', 'disabled', '', '');

-- ----------------------------
-- Table structure for ruas_jalan
-- ----------------------------
DROP TABLE IF EXISTS `ruas_jalan`;
CREATE TABLE `ruas_jalan`  (
  `id` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_ruas` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sup` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `lokasi` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `panjang` decimal(10, 2) NOT NULL,
  `uptd` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of ruas_jalan
-- ----------------------------
INSERT INTO `ruas_jalan` VALUES ('027.11K', 'Jalan Raya Siliwangi (Cibadak)', 'SUP-1', 'KM. BDG 112+180 - KM. BDG 147+957', 35.81, '2');
INSERT INTO `ruas_jalan` VALUES ('027.12K', 'Jalan Raya Cibolang (Cisaat)', 'SUP-1', 'KM. BDG 101+950 - KM. BDG 106+450', 4.50, '2');
INSERT INTO `ruas_jalan` VALUES ('027.13K', 'Jalan Raya Cisaat (Cisaat)', 'SUP-1', '', 2.42, '2');
INSERT INTO `ruas_jalan` VALUES ('027.14K', 'Jalan KH Sanusi (Sukabumi)', 'SUP-1', '', 2.03, '2');
INSERT INTO `ruas_jalan` VALUES ('027.15K', 'Jalan Bhayangkara (Sukabumi)', 'SUP-1', 'KM. BDG 147+957 - KM. BDG 151+347', 3.39, '2');
INSERT INTO `ruas_jalan` VALUES ('027.16K', 'Jalan Suryakencana (Sukabumi)', 'SUP-1', '', 0.08, '2');
INSERT INTO `ruas_jalan` VALUES ('027.17K', 'Jalan Rumah Sakit (Sukabumi)', 'SUP-1', '', 0.30, '2');
INSERT INTO `ruas_jalan` VALUES ('091-12-K', 'Jl. Siliwangi  (kuningan)', 'SUP-4', 'Kab. Kuningan', 1.75, '5');
INSERT INTO `ruas_jalan` VALUES ('097', 'NAROGONG - CILEUNGSI', 'SPP BOGOR II', 'KM.JKT. 47+430 s.d KM.JKT.53+470', 6.04, '1');
INSERT INTO `ruas_jalan` VALUES ('097-1', 'CILEUNGSI - CIBINONG (CITEUREUP)', 'SPP BOGOR II', 'KM.JKT. 53+470 s.d KM.JKT.67+600', 8.20, '1');
INSERT INTO `ruas_jalan` VALUES ('097-11K', 'JL. KARTINI (BEKASI)', 'SPP BEKASI', 'KM.JKT. 34+467 s.d KM.JKT. 36+587', 2.12, '1');
INSERT INTO `ruas_jalan` VALUES ('097-12K', 'JL. MAYOR OKING (CITEUREUP)', 'SPP BOGOR II', 'KM.JKT. 67+600 s.d KM.JKT.71+210', 3.61, '1');
INSERT INTO `ruas_jalan` VALUES ('097-13K', 'JL. SILIWANGI (BEKASI)', 'SPP BEKASI', 'KM.JKT. 36+582 s.d KM.JKT. 47+682', 11.10, '1');
INSERT INTO `ruas_jalan` VALUES ('097-14K', 'JL. MAYOR OKING (CIBINONG)', 'SPP BOGOR II', 'KM.JKT. 71+210 s.d KM.JKT.75+000', 3.79, '1');
INSERT INTO `ruas_jalan` VALUES ('106-1', 'Bandung (Kopo) - Soreang', 'SUP-KAB.BANDUNG', '6+360-16+500', 10.14, '3');
INSERT INTO `ruas_jalan` VALUES ('106-11.K', ' Jl. Kopo (Sp. Jl. Peta - Bts. Kota/Kab. Bandung) ', 'SUP-KOTA BANDUNG', 'Km. Bdg. 3+240-6+360', 3.12, '3');
INSERT INTO `ruas_jalan` VALUES ('1234', 'SP.KARANGHAWU-BTS.BANTEN(CIKOTOK)', 'SUP-5', '164+683 - 188+486', 23.77, '2');
INSERT INTO `ruas_jalan` VALUES ('161', 'Dayeuhkolot - Banjaran', 'SUP-KAB.BANDUNG', '8+710-17+040', 8.33, '3');
INSERT INTO `ruas_jalan` VALUES ('161-11.K', ' Jl. Moh. Toha (Sp. Jl. BKR - Bts. Kota/Kab. Bandung) ', 'SUP-KOTA BANDUNG', 'Km. Bdg. 2+450-5+190', 2.74, '3');
INSERT INTO `ruas_jalan` VALUES ('161-12.K', 'Jl. Raya Dayeuhkolot (Dayeuhkolot)', 'SUP-KAB.BANDUNG', '5+190-8+710', 3.52, '3');
INSERT INTO `ruas_jalan` VALUES ('161-13.K', 'Jl. Raya Banjaran (Banjaran)', 'SUP-KAB.BANDUNG', '17+040-19+560', 2.52, '3');
INSERT INTO `ruas_jalan` VALUES ('162', 'Banjaran - Pangalengan', 'SUP-KAB.BANDUNG', '19+560-39+950', 20.39, '3');
INSERT INTO `ruas_jalan` VALUES ('163-11.K', 'Jl. Raya Cisewu (Pangalengan)', 'SUP-KAB.BANDUNG', '39+950-40+470', 0.52, '3');
INSERT INTO `ruas_jalan` VALUES ('164.1', ' CUKUL (BTS. BANDUNG / GARUT) - SP.GENTENG ', 'SUP GARUT IV', 'Kab.Garut', 2.95, '4');
INSERT INTO `ruas_jalan` VALUES ('164.2', ' SP.GENTENG - SP.TALEGONG (SUKAMULYA) ', 'SUP GARUT IV', 'Kab.Garut', 6.96, '4');
INSERT INTO `ruas_jalan` VALUES ('164.3', ' SP.TALEGONG (SUKAMULYA) - CISEWU - SUKARAME -  RANCABUAYA (PALEUMBUHAN) ', 'SUP GARUT IV', 'Kab.Garut', 47.20, '4');
INSERT INTO `ruas_jalan` VALUES ('170-11.K', 'Jl. Gatot Subroto  (Cimahi)', 'SUP-KOTA CIMAHI', 'Km. Bdg. 9+590-11+810', 2.22, '3');
INSERT INTO `ruas_jalan` VALUES ('170-12.K', 'Jl. Baros  (Cimahi)', 'SUP-KOTA CIMAHI', 'Km. Bdg. 11+810-13+230', 1.42, '3');
INSERT INTO `ruas_jalan` VALUES ('170-13.K', 'Simpang Leuwigajah - Nanjung', 'SUP-KOTA CIMAHI', 'Km. Bdg. 13+230-15+000', 1.77, '3');
INSERT INTO `ruas_jalan` VALUES ('171', 'Nanjung - Patrol', 'SUP-KAB.BANDUNG', '15+145-20+755', 5.61, '3');
INSERT INTO `ruas_jalan` VALUES ('182', 'SP.3 PERINTIS KEMERDEKAAN (PASIR HAYAM) - CIBEBER', 'SPP CIANJUR I', 'KM.BDG. 68+440 s.d KM.BDG. 79+000', 10.56, '1');
INSERT INTO `ruas_jalan` VALUES ('182-11K', 'JL. RAYA CIBEBER (CIBEBER)', 'SPP CIANJUR I', 'KM.BDG. 79+000 s.d KM.BDG. 81+620', 2.62, '1');
INSERT INTO `ruas_jalan` VALUES ('183', 'CIBEBER - SUKANAGARA', 'SPP CIANJUR I', 'KM.BDG. 81+620 s.d KM.BDG. 107+740', 26.12, '1');
INSERT INTO `ruas_jalan` VALUES ('183-11K', 'JL. RAYA SUKANAGARA (SUKANAGARA)', 'SPP CIANJUR I', 'KM.BDG. 107+730 s.d KM.BDG. 109+800', 2.07, '1');
INSERT INTO `ruas_jalan` VALUES ('184', 'SUKANAGARA - SINDANGBARANG', 'SPP CIANJUR II', 'KM.BDG. 109+800 s.d KM.BDG. 172+260', 62.46, '1');
INSERT INTO `ruas_jalan` VALUES ('184-11K', 'JL. RAYA SUKANAGARA (SINDANGBARANG)', 'SPP CIANJUR II', 'KM.BDG. 172+900 s.d KM.BDG. 174+160', 1.26, '1');
INSERT INTO `ruas_jalan` VALUES ('191-12 K', 'Jl. Otto Iskandar Dinata', 'SUP-1', '94+405 - 95+357', 0.95, '2');
INSERT INTO `ruas_jalan` VALUES ('191-13 K', 'Jl. Didi Sukardi', 'SUP-1', '95+357 - 97+284', 1.92, '2');
INSERT INTO `ruas_jalan` VALUES ('191.11K', 'Jalan Achmad Yani (Sukabumi)', 'SUP-1', 'KM. BDG 93+304 - KM. BDG 93+474', 0.17, '2');
INSERT INTO `ruas_jalan` VALUES ('191.14K', 'Jalan Raya Baros', 'SUP-1', 'KM. BDG 97+284 - KM. BDG 100+964', 3.68, '2');
INSERT INTO `ruas_jalan` VALUES ('191.15K', 'Jalan Raya Sagaranten (Sagaranten)', 'SUP-3', 'Km. Bdg. 148+000 - 148+550', 0.54, '2');
INSERT INTO `ruas_jalan` VALUES ('191.16K', 'Jalan Pembangunan (Sukabumi)', 'SUP-1', 'KM. BDG 90+557 - KM. BDG 93+110', 2.55, '2');
INSERT INTO `ruas_jalan` VALUES ('191.17K', 'Jalan Sarasa (Sukabumi)', 'SUP-1', 'KM. BDG 93+110 - KM. BDG 95+223', 2.11, '2');
INSERT INTO `ruas_jalan` VALUES ('191.18K', 'Jalan Garuda (Sukabumi)', 'SUP-1', 'KM. BDG 95+225 - KM. BDG 97+625', 2.40, '2');
INSERT INTO `ruas_jalan` VALUES ('191K', 'Sukabumi (Baros)- Sagaranten', 'SUP-3', 'Km. Bdg. 101+057 - 148+000', 46.42, '2');
INSERT INTO `ruas_jalan` VALUES ('192.11K', 'Jalan Gudang (Sagaranten)', 'SUP-3', 'Km. Bdg. 148+550 - 149+112', 0.56, '2');
INSERT INTO `ruas_jalan` VALUES ('192K', 'Sagaranten - Tegal Buleud', 'SUP-3', 'Km. Bdg. 149+112 - 192+240', 42.44, '2');
INSERT INTO `ruas_jalan` VALUES ('193.11K', 'Jalan Lingkar Sukabumi', 'SUP-1', 'KM. BDG 97+350 - KM. BDG 99+550', 2.20, '2');
INSERT INTO `ruas_jalan` VALUES ('193.12K', 'Jalan Raya Pelabuhan Sukabumi', 'SUP-1', 'KM. BDG 97+425 - KM. BDG 102+716', 5.29, '2');
INSERT INTO `ruas_jalan` VALUES ('193.13K', 'Jalan Sejahtera Sukabumi', 'SUP-1', 'KM. BDG 98+075 - KM. BDG 99+518', 1.44, '2');
INSERT INTO `ruas_jalan` VALUES ('193.14K', 'Jalan Cemerlang Sukabumi', 'SUP-1', 'KM. BDG 99+518 - KM. BDG 103+449', 2.93, '2');
INSERT INTO `ruas_jalan` VALUES ('193.15K', 'Jalan Lingkar Sukabumi (Baros - Jl. Pembangunan)', 'SUP-1', 'KM. BDG 101+950 - KM. BDG 106+450', 2.87, '2');
INSERT INTO `ruas_jalan` VALUES ('193K', 'Sukabumi - cikembar', 'SUP-2', '', 9.72, '2');
INSERT INTO `ruas_jalan` VALUES ('194K', 'Cikembar - Cikembang', 'SUP-2', '', 3.51, '2');
INSERT INTO `ruas_jalan` VALUES ('195K', 'Cikembar - Jampang Tengah', 'SUP-2', '', 6.91, '2');
INSERT INTO `ruas_jalan` VALUES ('196K', 'Jampang Tengah - Kiara Dua', 'SUP-2', '', 45.89, '2');
INSERT INTO `ruas_jalan` VALUES ('197K', 'Surade - Ujung Genteng', 'SUP-4', '', 23.40, '2');
INSERT INTO `ruas_jalan` VALUES ('198.11K', 'Jalan Bhayangkara (Pelabuhan Ratu)', 'SUP-4', '', 3.39, '2');
INSERT INTO `ruas_jalan` VALUES ('198K', 'Cibadak - Cikidang - Pelabuhan Ratu', 'SUP-4', '', 35.81, '2');
INSERT INTO `ruas_jalan` VALUES ('202', 'PARUNG PANJANG - BUNAR', 'SPP BOGOR I', 'KM.JKT. 55+355 s.d KM.JKT.82+175', 26.82, '1');
INSERT INTO `ruas_jalan` VALUES ('202-11K', 'JL. MOCH. TOHA (PARUNG PANJANG)', 'SPP BOGOR I', 'KM.JKT. 53+855 s.d KM.JKT.55+355', 1.50, '1');
INSERT INTO `ruas_jalan` VALUES ('203', 'BTS. TANGGERANG/BOGOR - PARUNG', 'SPP BOGOR I', 'KM.JKT. 48+286 s.d KM.JKT.60+026', 11.74, '1');
INSERT INTO `ruas_jalan` VALUES ('204-11K', 'JL. SILIWANGI (BOGOR)', 'SPP BOGOR I', 'KM.JKT. 63+754 s.d KM.JKT.63+979', 0.23, '1');
INSERT INTO `ruas_jalan` VALUES ('204-12K', 'JL. LAWANG GINTUNG (BOGOR)', 'SPP BOGOR I', 'KM.JKT. 62+750 s.d KM.JKT.63+754', 1.00, '1');
INSERT INTO `ruas_jalan` VALUES ('204-13K', 'JL. PAHLAWAN (BOGOR)', 'SPP BOGOR I', 'KM.JKT. 60+610 s.d KM.JKT.62+750', 2.14, '1');
INSERT INTO `ruas_jalan` VALUES ('204-14K', 'JL. EMPANG - R. SALEH SARIEF BUSTAMAN (BOGOR)', 'SPP BOGOR I', 'KM.JKT. 60+360 s.d KM.JKT.60+610', 0.25, '1');
INSERT INTO `ruas_jalan` VALUES ('210-11K', 'JL. Ir. H. JUANDA (BOGOR)', 'SPP BOGOR I', 'KM.JKT. 58+589 s.d KM.JKT.60+360', 1.77, '1');
INSERT INTO `ruas_jalan` VALUES ('210-12K', 'JL. JEND. SUDIRMAN  (BOGOR)', 'SPP BOGOR I', 'KM.JKT. 57+286 s.d KM.JKT.58+589', 1.30, '1');
INSERT INTO `ruas_jalan` VALUES ('210-13K', 'JL. PEMUDA (BOGOR)', 'SPP BOGOR I', 'KM.JKT. 57+737 s.d KM.JKT.59+046', 1.31, '1');
INSERT INTO `ruas_jalan` VALUES ('210-14K', 'JL. KEBON PEDES (BOGOR)', 'SPP BOGOR I', 'KM.JKT. 56+750 s.d KM.JKT.57+737', 0.99, '1');
INSERT INTO `ruas_jalan` VALUES ('213-12K', 'JL. DEWI SARTIKA (DEPOK)', 'SPP BOGOR I', 'KM.JKT. 43+233 s.d KM.JKT.43+900', 0.67, '1');
INSERT INTO `ruas_jalan` VALUES ('213-13K', 'JL. MARGONDA RAYA (DEPOK)', 'SPP BOGOR I', 'KM.JKT. 37+529 s.d KM.JKT.37+662', 0.13, '1');
INSERT INTO `ruas_jalan` VALUES ('214-11K', 'JL. SILIWANGI (DEPOK)', 'SPP BOGOR I', 'KM.JKT. 37+529 s.d KM.JKT.38+809', 1.28, '1');
INSERT INTO `ruas_jalan` VALUES ('214-12K', 'JL. TOLE ISKANDAR (DEPOK)', 'SPP BOGOR I', 'KM.JKT. 38+809 s.d KM.JKT.39+869', 1.06, '1');
INSERT INTO `ruas_jalan` VALUES ('215', 'SP. JALAN TOLE ISKANDAR - PONDOK RAJEG (BTS. DEPOK/BOGOR)', 'SPP BOGOR I', 'KM.JKT. 39+869 s.d KM.JKT.48+459', 8.59, '1');
INSERT INTO `ruas_jalan` VALUES ('216', 'PONDOK RAJEG - HARAPAN JAYA (CIBINONG)', 'SPP BOGOR I', 'KM.JKT. 48+459 s.d KM.JKT.53+669', 5.21, '1');
INSERT INTO `ruas_jalan` VALUES ('216-1', 'JL. HARAPAN JAYA (CIBINONG) - BTS. KOTA BOGOR (KEDUNGHALANG)', 'SPP BOGOR I', 'KM.JKT. 53+669 s.d KM.JKT.61+089', 7.42, '1');
INSERT INTO `ruas_jalan` VALUES ('216-11K', 'BTS. KOTA BOGOR (KEDUNGHALANG) - SP.3 KEDUNGHALANG; JL RAYA PEMDA ', 'SPP BOGOR I', 'KM.JKT. 61+089 s.d KM.JKT.63+259', 2.17, '1');
INSERT INTO `ruas_jalan` VALUES ('224-11K', 'JL. Ir. H. JUANDA (BEKASI)', 'SPP BEKASI', 'KM.JKT. 00+000 s.d KM.JKT. 01+735', 1.74, '1');
INSERT INTO `ruas_jalan` VALUES ('224-12K', 'JL. PERJUANGAN (BEKASI)', 'SPP BEKASI', 'KM.JKT. 32+600 s.d KM.JKT. 39+600', 7.00, '1');
INSERT INTO `ruas_jalan` VALUES ('230', 'JALAN AKSES CIKARANG DRYPORT', 'SPP BEKASI', 'KM.JKT. 00+000 s.d KM.JKT. 06+330', 6.33, '1');
INSERT INTO `ruas_jalan` VALUES ('230-11', 'CIBARUSAH - MEKARMUKTI', 'SPP BEKASI', 'KM.JKT. 54+850 s.d KM.JKT. 76+250', 21.40, '1');
INSERT INTO `ruas_jalan` VALUES ('230-12', 'MEKARMUKTI - LEMAHABANG', 'SPP BEKASI', 'KM.JKT. 00+000 s.d KM.JKT. 03+800', 3.80, '1');
INSERT INTO `ruas_jalan` VALUES ('231', 'CIBARUSAH - CIBUCIL ', 'SPP BOGOR II', 'KM.JKT. 76+250 s.d KM.JKT.77+650', 1.40, '1');
INSERT INTO `ruas_jalan` VALUES ('232', 'Tanjungpura - Batujaya (Bts. Bekasi/Karawang)', 'SUP-KAB.KARAWANG', 'Km. Jkt. 69+000-104+860', 35.86, '3');
INSERT INTO `ruas_jalan` VALUES ('232-11.K', 'Jl. Proklamasi (Karawang)', 'SUP-KAB.KARAWANG', 'Km. Jkt. 67+370-69+000', 1.63, '3');
INSERT INTO `ruas_jalan` VALUES ('233', 'CILEUNGSI - CIBEET', 'SPP BOGOR II', 'KM.JKT. 53+171 s.d KM.JKT.97+751', 44.58, '1');
INSERT INTO `ruas_jalan` VALUES ('234', 'SELAJAMBE - CIBOGO - CIBEET (LEWAT JALAN BARU)', 'SPP CIANJUR I', 'KM.BDG. 53+090 s.d KM.BDG. 81+790', 28.70, '1');
INSERT INTO `ruas_jalan` VALUES ('240', 'Rajamandala - Jbt. Citarum Lama', 'SUP-KAB.BDG.BARAT', 'Km. Bdg. 36+600-39+550', 2.95, '3');
INSERT INTO `ruas_jalan` VALUES ('241', 'JBT. CITARUM LAMA - CIHAUR WANGI/ CIPEUYEUM', 'SPP CIANJUR I', 'KM.BDG. 39+520 s.d KM.BDG. 43+580', 4.06, '1');
INSERT INTO `ruas_jalan` VALUES ('242', 'Sp. Purwakarta - Jatiluhur', 'SUP-KAB.PURWAKARTA', 'Km. Jkt. 115+630-122+470', 6.84, '3');
INSERT INTO `ruas_jalan` VALUES ('243', 'KOSAMBI - BTS. KARAWANG/PURWAKARTA (CURUG)', 'SUP-KAB.PURWAKARTA', '84+250-95+950', 11.70, '3');
INSERT INTO `ruas_jalan` VALUES ('244', 'Bts. Karawang/Purwakarta (Curug) - Purwakarta', 'SUP-KAB.PURWAKARTA', 'Km. Jkt. 95+950-103+980', 8.03, '3');
INSERT INTO `ruas_jalan` VALUES ('244-11.K', 'Jl. Pahlawan (Purwakarta)', 'SUP-KAB.PURWAKARTA', 'Km. Jkt. 103+980-107+150', 3.17, '3');
INSERT INTO `ruas_jalan` VALUES ('245', 'Sp. Orion - Cihaliwung', 'SUP-KAB.BDG.BARAT', 'Km. Bdg. 16+400-18+550', 2.15, '3');
INSERT INTO `ruas_jalan` VALUES ('246', 'Padalarang (Sp.3 Stasion) - Sp. Cisarua', 'SUP-KAB.BDG.BARAT', 'Km. Bdg. 16+960-24+860', 7.90, '3');
INSERT INTO `ruas_jalan` VALUES ('247', 'Bts. Cimahi - Cisarua - Lembang', 'SUP-KAB.BDG.BARAT', 'Km. Bdg. 14+275-28+045', 13.77, '3');
INSERT INTO `ruas_jalan` VALUES ('247-11.K', 'Jl. Kolonel Masturi (Cimahi)', 'SUP-KOTA CIMAHI', 'Km. Bdg. 10+320-14+270', 3.95, '3');
INSERT INTO `ruas_jalan` VALUES ('248.K', ' Jl. Pajajaran (Akses Bandara Husein Satranegara) Kota Bandung ', 'SUP-KOTA BANDUNG', 'Km. Bdg. 4+090-5+090', 1.00, '3');
INSERT INTO `ruas_jalan` VALUES ('249-11.K', ' Jl. Pasir Kaliki (Sp. Pasteur - Sp. Sukajadi/Eyckman) Kota Bandung ', 'SUP-KOTA BANDUNG', '3+660-4+000', 0.34, '3');
INSERT INTO `ruas_jalan` VALUES ('249-12.K', 'Jl. Sukajadi (Bandung)', 'SUP-KOTA BANDUNG', 'Km. Bdg. 4+000-6+530', 2.53, '3');
INSERT INTO `ruas_jalan` VALUES ('249-13.K', 'Jl. Setiabudi (Bandung)', 'SUP-KOTA BANDUNG', 'Km. Bdg. 5+950-10+930', 4.98, '3');
INSERT INTO `ruas_jalan` VALUES ('249-14.K', 'Jl. Sukawangi (Bandung)', 'SUP-KOTA BANDUNG', 'Km. Bdg. 5+770-5+950', 0.18, '3');
INSERT INTO `ruas_jalan` VALUES ('250', 'Bts. Kota Bandung - Lembang', 'SUP-KAB.BDG.BARAT', 'Km. Bdg. 10+930-14+600', 3.67, '3');
INSERT INTO `ruas_jalan` VALUES ('250-1', 'Lembang - Maribaya', 'SUP-KAB.BDG.BARAT', 'Km. Bdg. 16+600-22+350', 5.75, '3');
INSERT INTO `ruas_jalan` VALUES ('250-11.K', 'Jl Raya Lembang (Lembang)', 'SUP-KAB.BDG.BARAT', 'Km. Bdg. 14+600-16+630', 2.03, '3');
INSERT INTO `ruas_jalan` VALUES ('250-12.K', 'Jalan Panorama (Lembang)', 'SUP-KAB.BDG.BARAT', 'Km. Bdg. 16+300-16+600', 0.30, '3');
INSERT INTO `ruas_jalan` VALUES ('250-13.K', 'Jalan Grand Hotel (Lembang)', 'SUP-KAB.BDG.BARAT', 'Km. Bdg. 15+300-16+300', 1.00, '3');
INSERT INTO `ruas_jalan` VALUES ('251', 'Lembang - Bts.Kab.Bandung/Kab. Subang', 'SUP-KAB.BDG.BARAT', 'Km. Bdg. 16+630-25+480', 8.85, '3');
INSERT INTO `ruas_jalan` VALUES ('252', 'Subang - Bts. Kab. Bandung / Kab. Subang', 'SUP-KAB.SUBANG1', 'Km. Jkt. 154+203-181+163', 26.96, '3');
INSERT INTO `ruas_jalan` VALUES ('252-11.K', 'Jl. Jend. A. Yani (Subang)', 'SUP-KAB.SUBANG1', 'Km. Jkt. 149+666-154+206', 4.54, '3');
INSERT INTO `ruas_jalan` VALUES ('253', 'Purwakarta - Wanayasa ', 'SUP-KAB.PURWAKARTA', 'Km. Jkt. 116+420-136+590', 20.17, '3');
INSERT INTO `ruas_jalan` VALUES ('253-11.K', 'Jl. Basuki Rahmat (Purwakarta)', 'SUP-KAB.PURWAKARTA', 'Km. Jkt. 114+360-115+070', 0.71, '3');
INSERT INTO `ruas_jalan` VALUES ('253-12.K', 'Jl. Kapten Halim (Purwakarta)', 'SUP-KAB.PURWAKARTA', 'Km. Jkt. 115+070-116+420', 1.35, '3');
INSERT INTO `ruas_jalan` VALUES ('253-13.K', 'Jl. Wanayasa (Wanayasa)', 'SUP-KAB.PURWAKARTA', 'Km. Jkt. 136+590-138+100', 1.51, '3');
INSERT INTO `ruas_jalan` VALUES ('254', 'Wanayasa - Bts. Purwakarta/Subang', 'SUP-KAB.PURWAKARTA', 'Km. Jkt. 138+100-142+890', 4.79, '3');
INSERT INTO `ruas_jalan` VALUES ('255', 'Jl. Cagak - Bts. Purwakarta/Subang', 'SUP-KAB.SUBANG1', 'Km. Jkt. 167+150-180+860', 13.71, '3');
INSERT INTO `ruas_jalan` VALUES ('256', ' SUMEDANG - BTS. SUMEDANG/SUBANG (CIKARAMAS) ', 'SUP SUMEDANG I', 'Kab.Sumedang', 20.91, '4');
INSERT INTO `ruas_jalan` VALUES ('257', 'Jl. Cagak - Bts. Subang/Sumedang (Cikaramas)', 'SUP-KAB.SUBANG1', 'Km. Jkt. 166+320-188+830', 22.51, '3');
INSERT INTO `ruas_jalan` VALUES ('258', 'SADANG - BTS. PURWAKARTA/SUBANG', 'SUP-KAB.PURWAKARTA', '107+900-120+140', 12.24, '3');
INSERT INTO `ruas_jalan` VALUES ('259', 'Bts. Purwakarta/Subang - Subang', 'SUP-KAB.SUBANG2', 'Km. Jkt. 120+100-145+230', 25.13, '3');
INSERT INTO `ruas_jalan` VALUES ('259-11.K', 'Jl. Mayjen. Sutoyo (Subang)', 'SUP-KAB.SUBANG2', 'Km. Jkt. 148+675-149+795', 1.12, '3');
INSERT INTO `ruas_jalan` VALUES ('259-12.K', 'Jl. Arief Rahman Hakim (Subang)', 'SUP-KAB.SUBANG2', 'Km. Jkt. 147+705-148+675', 0.97, '3');
INSERT INTO `ruas_jalan` VALUES ('259-13.K', 'Jl. Kapten Tendean (Subang)', 'SUP-KAB.SUBANG2', 'Km. Jkt. 145+875-147+705', 1.83, '3');
INSERT INTO `ruas_jalan` VALUES ('259-14.K', 'Jl. Dangdeur (Subang)', 'SUP-KAB.SUBANG2', 'Km. Jkt. 144+925-145+875', 0.95, '3');
INSERT INTO `ruas_jalan` VALUES ('260', 'Pamanukan - Pagaden', 'SUP-KAB.SUBANG2', 'Km. Jkt. 141+950-161+000', 19.05, '3');
INSERT INTO `ruas_jalan` VALUES ('260-11.K', 'Jl. H. Ikhsan (Pamanukan)', 'SUP-KAB.SUBANG2', 'Km. Jkt. 140+460-140+860', 0.40, '3');
INSERT INTO `ruas_jalan` VALUES ('260-12.K', 'Jl. Ion Martasasmita (Pamanukan)', 'SUP-KAB.SUBANG2', 'Km. Jkt. 140+860-141+950', 1.09, '3');
INSERT INTO `ruas_jalan` VALUES ('260-13.K', 'Jl. Jend. A. Yani (Pagaden)', 'SUP-KAB.SUBANG2', 'Km. Jkt. 161+000-162+700', 1.70, '3');
INSERT INTO `ruas_jalan` VALUES ('260-14.K', 'Jl. Raya Kamarung (Pagaden)', 'SUP-KAB.SUBANG2', 'Km. Jkt. 162+700-164+190', 1.49, '3');
INSERT INTO `ruas_jalan` VALUES ('261', 'Pagaden - Subang', 'SUP-KAB.SUBANG2', 'Km. Jkt. 164+190-172+860', 8.67, '3');
INSERT INTO `ruas_jalan` VALUES ('261-11.K', 'Jl. S. Parman (Subang)', 'SUP-KAB.SUBANG1', 'Km. Jkt. 149+598-149+798', 0.20, '3');
INSERT INTO `ruas_jalan` VALUES ('261-12.K', 'Jl. Mesjid Agung (Subang)', 'SUP-KAB.SUBANG1', 'Km. Jkt. 176+990-177+420', 0.43, '3');
INSERT INTO `ruas_jalan` VALUES ('261-13.K', 'Jl. Oto Iskandardinata (Subang) ', 'SUP-KAB.SUBANG1', 'Km. Jkt. 174+390-176+990', 2.60, '3');
INSERT INTO `ruas_jalan` VALUES ('261-14.K', 'Jl. Raya Sukamelang (Subang)', 'SUP-KAB.SUBANG2', 'Km. Jkt. 172+860-174+390', 1.53, '3');
INSERT INTO `ruas_jalan` VALUES ('265', 'Subang - Bantarwaru  (Bts. Kab. Subang/Indramayu)', 'SUP-KAB.SUBANG1', 'Km. Jkt. 176+443-186+653', 10.21, '3');
INSERT INTO `ruas_jalan` VALUES ('265-11.K', 'Jl. Kapten Hanafiah (Subang)', 'SUP-KAB.SUBANG1', 'Km. Jkt. 175+353-176+443', 1.09, '3');
INSERT INTO `ruas_jalan` VALUES ('266', 'CIKAMURANG - BANTARWARU', 'SUP INDRAMAYU II', 'Kab.Indramayu', 30600.00, '6');
INSERT INTO `ruas_jalan` VALUES ('267', 'JANGGA - CIKAMURANG', 'SUP INDRAMAYU II', 'Kab.Indramayu', 34980.00, '6');
INSERT INTO `ruas_jalan` VALUES ('273', ' LEBAKJATI - RANCAKALONG - SELAAWI ', 'SUP SUMEDANG I', 'Kab.Sumedang', 18.51, '4');
INSERT INTO `ruas_jalan` VALUES ('274', ' CIJELAG - BTS. SUMEDANG/INDRAMAYU  ', 'SUP SUMEDANG I', 'Kab.Sumedang', 20.95, '4');
INSERT INTO `ruas_jalan` VALUES ('275', 'BTS.SUMEDANG/INDRAMAYU - CIKAMURANG', 'SUP INDRAMAYU II', 'Kab.Indramayu', 610.00, '6');
INSERT INTO `ruas_jalan` VALUES ('281', ' SUMEDANG - SITURAJA  ', 'SUP SUMEDANG II', 'Kab.Sumedang', 11.37, '4');
INSERT INTO `ruas_jalan` VALUES ('281-11-K', ' JL. PRABU TAJI MALELA (SUMEDANG) ', 'SUP SUMEDANG II', 'Kab.Sumedang', 1.70, '4');
INSERT INTO `ruas_jalan` VALUES ('281-12-K', ' JL. RAYA SITURAJA (SITURAJA) ', 'SUP SUMEDANG II', 'Kab.Sumedang', 1.57, '4');
INSERT INTO `ruas_jalan` VALUES ('282', ' SITURAJA -DARMARAJA ', 'SUP SUMEDANG II', 'Kab.Sumedang', 10.84, '4');
INSERT INTO `ruas_jalan` VALUES ('283', 'SP.KIRISIK(WADO)-BTS.SUMEDANG/GARUT', 'SUP SUMEDANG II', 'Kab.Sumedang', 9.54, '4');
INSERT INTO `ruas_jalan` VALUES ('284', ' MALANGBONG - BTS. GARUT/SUMEDANG ', 'SUP GARUT I', 'Kab.Garut', 8.50, '4');
INSERT INTO `ruas_jalan` VALUES ('285', 'WADO(SP.KIRISIK)-BTS.SUMEDANG/MAJALENGKA(KIRISIK)', 'SUP SUMEDANG II', 'Kab.Sumedang', 11.31, '4');
INSERT INTO `ruas_jalan` VALUES ('286', 'Talaga - Bts. Majalengka/Sumedang (Kirisik)', 'SUP MAJALENGKA II', 'Kab. Majalengka', 24.06, '6');
INSERT INTO `ruas_jalan` VALUES ('286 11 K', 'Jl. Jend. Sudirman (Talaga)', 'SUP MAJALENGKA II', 'Kab. Majalengka', 0.69, '6');
INSERT INTO `ruas_jalan` VALUES ('287', 'Majalengka - Talaga', 'SUP MAJALENGKA II', 'Kab. Majalengka', 23.31, '6');
INSERT INTO `ruas_jalan` VALUES ('287 11 K', 'Jl. KH. Abdul Halim (Majalengka)', 'SUP MAJALENGKA I', 'Kab. Majalengka', 0.70, '6');
INSERT INTO `ruas_jalan` VALUES ('287 12 K', 'Jl. Jend. A. Yani (Talaga)', 'SUP MAJALENGKA II', 'Kab. Majalengka', 0.91, '6');
INSERT INTO `ruas_jalan` VALUES ('288', 'Talaga - Cikijing', 'SUP MAJALENGKA II', 'Kab. Majalengka', 5.77, '6');
INSERT INTO `ruas_jalan` VALUES ('288 11 K', 'Jl. Cipeucang (Talaga)', 'SUP MAJALENGKA II', 'Kab. Majalengka', 0.55, '6');
INSERT INTO `ruas_jalan` VALUES ('288 12 K', 'Jl. Kasturi (Cikijing)', 'SUP MAJALENGKA II', 'Kab. Majalengka', 1490.00, '6');
INSERT INTO `ruas_jalan` VALUES ('289', 'Majalengka - Kadipaten', 'SUP MAJALENGKA I', 'Kab. Majalengka', 6.46, '6');
INSERT INTO `ruas_jalan` VALUES ('289 11 K', 'Jl. KH. Abdul Halim (Majalengka)', 'SUP MAJALENGKA I', 'Kab. Majalengka', 5060.00, '6');
INSERT INTO `ruas_jalan` VALUES ('289 12 K', 'Jl. Raya Majalengka (Kadipaten)', 'SUP MAJALENGKA I', 'Kab. Majalengka', 1430.00, '6');
INSERT INTO `ruas_jalan` VALUES ('290', 'Kadipaten - Bts. Mjlk/Indramayu', 'SUP MAJALENGKA I', 'Kab. Majalengka', 22750.00, '6');
INSERT INTO `ruas_jalan` VALUES ('290 11 K', 'Jl. Pasar Balong', 'SUP MAJALENGKA I', 'Kab. Majalengka', 0.32, '6');
INSERT INTO `ruas_jalan` VALUES ('291', 'BTS.MAJALENGKA/INDRAMAYU - JATIBARANG', 'SUP INDRAMAYU I', 'Kab.Indramayu', 17610.00, '6');
INSERT INTO `ruas_jalan` VALUES ('292', 'PEKANDANGAN - JATIBARANG', 'SUP INDRAMAYU I', 'Kab.Indramayu', 11720.00, '6');
INSERT INTO `ruas_jalan` VALUES ('292 11 K', 'JL.JEND.A.YANI (JATIBARANG)', 'SUP INDRAMAYU I', 'KAB.INDRAMAYU', 230.00, '6');
INSERT INTO `ruas_jalan` VALUES ('292 12 K', 'JL.Mayor Dasuki (Jatibarang)', 'SUP INDRAMAYU I', 'Kab.Indramayu', 1880.00, '6');
INSERT INTO `ruas_jalan` VALUES ('292 13 K', 'JL.IR.SUTAMI', 'SUP INDRAMAYU I', 'Kab.Indramayu', 2100.00, '6');
INSERT INTO `ruas_jalan` VALUES ('293', 'JL.LETNAN JONI (JATIBARANG)', 'SUP INDRAMAYU I', 'Kab.Indramayu', 1750.00, '6');
INSERT INTO `ruas_jalan` VALUES ('294', 'KARANGAMPEL - JATIBARANG', 'SUP INDRAMAYU I', 'Kab.Indramayu', 17400.00, '6');
INSERT INTO `ruas_jalan` VALUES ('294 11 K', 'JL.SILIWANGI (JATIBARANG)', 'SUP INDRAMAYU I', 'Kab.Indramayu', 430.00, '6');
INSERT INTO `ruas_jalan` VALUES ('295', 'Sumber - Bts. Mjlk/Cirebon', 'SUP CIREBON', 'Kab. Cirebon', 6880.00, '6');
INSERT INTO `ruas_jalan` VALUES ('295 11 K', 'Jl. Nyi Ageng Serang (Sumber)', 'SUP CIREBON', 'Kab. Cirebon', 0.20, '6');
INSERT INTO `ruas_jalan` VALUES ('295 12 K', 'Jl. Dewi Sartika (Sumber)', 'SUP CIREBON', 'Kab. Cirebon', 3500.00, '6');
INSERT INTO `ruas_jalan` VALUES ('296', 'Bts. Mjlk/Cirebon - Cigasong', 'SUP MAJALENGKA I', 'Kab. Majalengka', 19530.00, '6');
INSERT INTO `ruas_jalan` VALUES ('297', 'Weru - Sumber/Jl.Fatahillah (Sumber)', 'SUP CIREBON', 'Kab. Cirebon', 6350.00, '6');
INSERT INTO `ruas_jalan` VALUES ('298', 'Sumber - Mandirancan (Jl. P. Kejaksan, Sumber)', 'SUP CIREBON', 'Kab. Cirebon', 4570.00, '6');
INSERT INTO `ruas_jalan` VALUES ('299-1', 'Mandirancan - Pakembangan', 'SUP-5', 'Kab. Kuningan', 6.60, '5');
INSERT INTO `ruas_jalan` VALUES ('299-2', 'Pakembangan  - Bojong (Jl. Linggarjati)', 'SUP-5', 'Kab. Kuningan', 8.16, '5');
INSERT INTO `ruas_jalan` VALUES ('300', 'Leuwimunding - Rajagaluh', 'SUP MAJALENGKA I', 'Kab. Majalengka', 6300.00, '6');
INSERT INTO `ruas_jalan` VALUES ('301', 'Parapatan - Leuwimunding', 'SUP MAJALENGKA I', 'Kab. Majalengka', 5000.00, '6');
INSERT INTO `ruas_jalan` VALUES ('302', 'Parapatan - Budur', 'SUP MAJALENGKA I', 'Kab. Majalengka', 1500.00, '6');
INSERT INTO `ruas_jalan` VALUES ('303', 'Budur - Susukan - Tegalgubug', 'SUP CIREBON', 'Kab. Cirebon', 7600.00, '6');
INSERT INTO `ruas_jalan` VALUES ('304', 'MUNDU - GOPALA', 'SUP INDRAMAYU I', 'Kab.Indramayu', 6100.00, '6');
INSERT INTO `ruas_jalan` VALUES ('305', 'Tegalgubug - Arjawinangun - Jagapura (Bts.Crb/Idm)', 'SUP CIREBON', 'Kab. Cirebon', 16940.00, '6');
INSERT INTO `ruas_jalan` VALUES ('306 K', 'Jl. Nyi Mas Gandasari', 'SUP CIREBON', 'Kota Cirebon', 1035.00, '6');
INSERT INTO `ruas_jalan` VALUES ('307 11 K', 'Jl. Ariodinoto', 'SUP CIREBON', 'Kota Cirebon', 0.20, '6');
INSERT INTO `ruas_jalan` VALUES ('307 12 K', 'Jl. Kasepuhan', 'SUP CIREBON', 'Kota Cirebon', 0.20, '6');
INSERT INTO `ruas_jalan` VALUES ('307 13 K', 'Jl. Pulasaren', 'SUP CIREBON', 'Kota Cirebon', 0.73, '6');
INSERT INTO `ruas_jalan` VALUES ('307 14 K', 'Jl. Lawanggada', 'SUP CIREBON', 'Kota Cirebon', 2240.00, '6');
INSERT INTO `ruas_jalan` VALUES ('307 K', 'Jl. Kesambi', 'SUP CIREBON', 'Kota Cirebon', 2240.00, '6');
INSERT INTO `ruas_jalan` VALUES ('308', 'Kuningan - Ciawigebang', 'SUP-4', 'Kab. Kuningan', 7.97, '5');
INSERT INTO `ruas_jalan` VALUES ('308-11-K', 'Jl. RE. Martadinata', 'SUP-4', 'Kab. Kuningan', 3.87, '5');
INSERT INTO `ruas_jalan` VALUES ('308-12-K', 'Jalan Raya Ciawigebang', 'SUP-5', 'Kab. Kuningan', 1.73, '5');
INSERT INTO `ruas_jalan` VALUES ('309', 'Ciawigebang - bts.Cirebon/kuningan', 'SUP-5', 'Kab. Kuningan', 15.65, '5');
INSERT INTO `ruas_jalan` VALUES ('309-11-K', 'Ciawigebang  - Jalaksana', 'SUP-5', 'Kab. Kuningan', 12.60, '5');
INSERT INTO `ruas_jalan` VALUES ('310', 'Bts. Crb/Kuningan (Waled) - Ciledug', 'SUP CIREBON', 'Kab. Cirebon', 3360.00, '6');
INSERT INTO `ruas_jalan` VALUES ('310 11 K', 'Jl. Siliwangi (Ciledug)', 'SUP CIREBON', 'Kab. Cirebon', 3300.00, '6');
INSERT INTO `ruas_jalan` VALUES ('310 12 K', 'Jl. Merdeka Barat (Ciledug)', 'SUP CIREBON', 'Kab. Cirebon', 0.94, '6');
INSERT INTO `ruas_jalan` VALUES ('310 13 K', 'Jl. Merdeka Timur (Ciledug)', 'SUP CIREBON', 'Kab. Cirebon', 0.96, '6');
INSERT INTO `ruas_jalan` VALUES ('311', 'Jl. Ciledug - Losari', 'SUP CIREBON', 'Kab. Cirebon', 10970.00, '6');
INSERT INTO `ruas_jalan` VALUES ('312', 'Ciledug - Bts. Jateng (Bantarsari)', 'SUP CIREBON', 'Kab. Cirebon', 1210.00, '6');
INSERT INTO `ruas_jalan` VALUES ('313', 'Oleced - Luragung', 'SUP-4', 'Kab. Kuningan', 8.37, '5');
INSERT INTO `ruas_jalan` VALUES ('313-11-K', 'Jalan Raya Luragung (Luragung)', 'SUP-4', 'Kab. Kuningan', 0.21, '5');
INSERT INTO `ruas_jalan` VALUES ('314', 'Luragung - Cibingbin', 'SUP-4', 'Kab. Kuningan', 15.99, '5');
INSERT INTO `ruas_jalan` VALUES ('315', 'Cibingbing -  Batas Jateng ( Penanggapan)', 'SUP-4', 'Kab. Kuningan', 3.43, '5');
INSERT INTO `ruas_jalan` VALUES ('331', 'Tasikmalaya-Manonjaya-Panaekan (Goler)		', 'SUP-1', 'Kab. Tasikmalaya', 16.63, '5');
INSERT INTO `ruas_jalan` VALUES ('331-11-K', 'Jl. Garuda   (Tasikmalaya)', 'SUP-1', 'Kota. Tasikmalaya', 5.19, '5');
INSERT INTO `ruas_jalan` VALUES ('332', 'Panaekan (goler) - Cimaragas-bts.banjar', 'SUP-3', 'Kab. Ciamis', 8.13, '5');
INSERT INTO `ruas_jalan` VALUES ('332-11-K', 'Jln. Perintis Kemerdekaan (Kota Banjar)', 'SUP-3', 'Kota. Banjar', 0.64, '5');
INSERT INTO `ruas_jalan` VALUES ('332-12-K', 'Jalan raya Cimaragas - Bts.Kota Banjar - Banjar		', 'SUP-3', 'Kota. Banjar', 8.33, '5');
INSERT INTO `ruas_jalan` VALUES ('339', 'Kalipucang - Majingklak', 'SUP-3', 'Kab. Pangandaran', 6.84, '5');
INSERT INTO `ruas_jalan` VALUES ('340', 'Jl. Ir. H Djuanda  (Tasikmalaya)', 'SUP-1', 'Kota. Tasikmalaya', 2.85, '5');
INSERT INTO `ruas_jalan` VALUES ('340-12-K', 'Jalan Brigjen Wasitakusumah', 'SUP-1', 'Kota. Tasikmalaya', 2.21, '5');
INSERT INTO `ruas_jalan` VALUES ('340-13-K', 'Jalan Letnan Harun', 'SUP-1', 'Kota. Tasikmalaya', 2.03, '5');
INSERT INTO `ruas_jalan` VALUES ('341', 'Jl.Gubernur Swaka   (Tasikmalaya)', 'SUP-1', 'Kota. Tasikmalaya', 3.79, '5');
INSERT INTO `ruas_jalan` VALUES ('342', 'Jl. Cisumur Garuda (Letjen Mashudi)', 'SUP-1', 'Kota. Tasikmalaya', 6.40, '5');
INSERT INTO `ruas_jalan` VALUES ('343', 'Tasikmalaya - Karangnunggal', 'SUP-2', 'Kab. Tasikmalaya', 41.78, '5');
INSERT INTO `ruas_jalan` VALUES ('343-11-K', 'Jl. Perintis Kemerdekaan   (Tasikmalaya)', 'SUP-2', 'Kota. Tasikmalaya', 2.09, '5');
INSERT INTO `ruas_jalan` VALUES ('343-12-K', 'Jalan Raya Karangnunggal(Karangnunggal)', 'SUP-2', 'Kab. Tasikmalaya', 0.94, '5');
INSERT INTO `ruas_jalan` VALUES ('344', 'Karangnunggal - Cipatujah', 'SUP-2', 'Kab. Tasikmalaya', 22.80, '5');
INSERT INTO `ruas_jalan` VALUES ('344-11-K', 'Jalan Raya Cipatujah (Cipatujah)', 'SUP-2', 'Kab. Tasikmalaya', 1.25, '5');
INSERT INTO `ruas_jalan` VALUES ('345', ' GARUT - BTS. GARUT/TASIKMALAYA ', 'SUP GARUT I', 'Kab.Garut', 13.35, '4');
INSERT INTO `ruas_jalan` VALUES ('345-11-K', ' JL. SUHERMAN (GARUT) ', 'SUP GARUT I', 'Kab.Garut', 1.37, '4');
INSERT INTO `ruas_jalan` VALUES ('345-12-K', ' JL. MERDEKA (GARUT) ', 'SUP GARUT I', 'Kab.Garut', 0.39, '4');
INSERT INTO `ruas_jalan` VALUES ('345-13-K', ' JL. JEND. SUDIRMAN (GARUT) ', 'SUP GARUT I', 'Kab.Garut', 5.58, '4');
INSERT INTO `ruas_jalan` VALUES ('345-14-K', ' JL. BRATAYUDA (GARUT) ', 'SUP GARUT I', 'Kab.Garut', 0.68, '4');
INSERT INTO `ruas_jalan` VALUES ('345-15-K', ' JL. CILEDUG (GARUT) ', 'SUP GARUT I', 'Kab.Garut', 0.91, '4');
INSERT INTO `ruas_jalan` VALUES ('346', 'Bts.Garut/Tasikmalaya  -  Singaparna', 'SUP-1', 'Kab. Tasikmalaya', 24.61, '5');
INSERT INTO `ruas_jalan` VALUES ('346-1', 'Jl. Alternatif Kp. Tenjowaringin (Salawu)', 'SUP-1', 'Kab. Tasikmalaya', 0.04, '5');
INSERT INTO `ruas_jalan` VALUES ('346-11-K', 'Jl. Raya Singaparna (singaparna)', 'SUP-1', 'Kab. Tasikmalaya', 2.64, '5');
INSERT INTO `ruas_jalan` VALUES ('346-12-K', 'Jl. Pasar Singaparna', 'SUP-1', 'Kab. Tasikmalaya', 0.18, '5');
INSERT INTO `ruas_jalan` VALUES ('347', 'Singaparna - Tasikmalaya', 'SUP-1', 'Kab. Tasikmalaya', 8.69, '5');
INSERT INTO `ruas_jalan` VALUES ('348', ' KADUNGORA (LELES) - CIBATU - SASAKBEUSI ', 'SUP GARUT I', 'Kab.Garut', 19.82, '4');
INSERT INTO `ruas_jalan` VALUES ('349', 'Nagreg - Bts Bandung/Garut', 'SUP-KAB.BANDUNG', '40+100-42+430', 2.33, '3');
INSERT INTO `ruas_jalan` VALUES ('350', ' BTS. BANDUNG/GARUT - GARUT  ', 'SUP GARUT I', 'Kab.Garut', 14.71, '4');
INSERT INTO `ruas_jalan` VALUES ('350-11-K', ' JL. OTISTA (GARUT)   ', 'SUP GARUT I', 'Kab.Garut', 3.37, '4');
INSERT INTO `ruas_jalan` VALUES ('350-12-K', ' JL. CIMANUK I (GARUT) ', 'SUP GARUT I', 'Kab.Garut', 2.46, '4');
INSERT INTO `ruas_jalan` VALUES ('351', ' GARUT - CIKAJANG ', 'SUP GARUT II', 'Kab.Garut', 23.20, '4');
INSERT INTO `ruas_jalan` VALUES ('351-11-K', ' JL. CIMANUK II (GARUT) ', 'SUP GARUT I', 'Kab.Garut', 1.79, '4');
INSERT INTO `ruas_jalan` VALUES ('352', ' CIKAJANG - PAMEUNGPEUK  ', 'SUP GARUT II', 'Kab.Garut', 55.32, '4');
INSERT INTO `ruas_jalan` VALUES ('352-11-K', ' JL. RAYA CIKAJANG (CIKAJANG) ', 'SUP GARUT II', 'Kab.Garut', 3.23, '4');
INSERT INTO `ruas_jalan` VALUES ('352-12-K', ' JL. RAYA PAMEUNGPEUK  ', 'SUP GARUT II', 'Kab.Garut', 0.75, '4');
INSERT INTO `ruas_jalan` VALUES ('353', ' KIARAKOHOK (SP. CILAUTEUREUN) - CILAUTEUREUN  ', 'SUP GARUT II', 'Kab.Garut', 2.16, '4');
INSERT INTO `ruas_jalan` VALUES ('354', ' CIKAJANG - SUMADRA ', 'SUP GARUT III', 'Kab.Garut', 12.66, '4');
INSERT INTO `ruas_jalan` VALUES ('355', ' SUMADRA - BUNGBULANG ', 'SUP GARUT III', 'Kab.Garut', 34.99, '4');
INSERT INTO `ruas_jalan` VALUES ('355.1', ' BUNGBULANG - SUKARAME ', 'SUP GARUT III', 'Kab.Garut', 15.08, '4');
INSERT INTO `ruas_jalan` VALUES ('364-11.K', 'Jl. Terusan Buah Batu (Sp.4 Soekarno Hatta - Bts. Kota/Kab. Bandung)', 'SUP-KOTA BANDUNG', 'Km. Bdg. 6+390-8+650', 2.26, '3');
INSERT INTO `ruas_jalan` VALUES ('364-12.K', 'Jl. Buah Batu (Sp.4 Pelajar Pejuang 45 - Sp.4 Soekarno Hatta)', 'SUP-KOTA BANDUNG', 'Km. Bdg. 4+690-6+390', 1.70, '3');
INSERT INTO `ruas_jalan` VALUES ('365', 'Sp. Munjul - Ciparay (Jl. Sp. Munjul - Jl. Laswi Ciparay)', 'SUP-KAB.BANDUNG', '13+988-20+958', 6.97, '3');
INSERT INTO `ruas_jalan` VALUES ('365-1', 'Jl. Terusan Buahbatu (Bts. Kota/Kab. Bandung) - Bojongsoang', 'SUP-KAB.BANDUNG', '8+650-10+650', 2.00, '3');
INSERT INTO `ruas_jalan` VALUES ('365-11.K', 'Jl. Raya Laswi (Ciparay)', 'SUP-KAB.BANDUNG', '20+958-24+358', 3.40, '3');
INSERT INTO `ruas_jalan` VALUES ('365-12.K', 'Jl. Raya Laswi (S.d Sp.3 Jl. Cikaro/Jl. Tengah), (Majalaya)', 'SUP-KAB.BANDUNG', '24+358-29+488', 5.13, '3');
INSERT INTO `ruas_jalan` VALUES ('365-2', 'Bojongsoang - Sp. Munjul (Jl. Siliwangi)', 'SUP-KAB.BANDUNG', '10+650-15+730', 5.08, '3');
INSERT INTO `ruas_jalan` VALUES ('367', 'Majalaya (Sp.3 Jl. Cikaro/Jl. Tengah) - Sawahbera (Sp.3 Cijapati) - Bts. Bdg/Garut (Cijapati)', 'SUP-KAB.BANDUNG', '29+488-43+148', 13.66, '3');
INSERT INTO `ruas_jalan` VALUES ('368', ' KADUNGORA (LELES) - BTS. BANDUNG/GARUT (CIJAPATI) ', 'SUP GARUT I', 'Kab.Garut', 8.60, '4');
INSERT INTO `ruas_jalan` VALUES ('369.K', 'Jl. Cicendo (Sp. Pajajaran - Sp. Kebon Kawung) Kota Bandung', 'SUP-KOTA BANDUNG', 'Km. Sta. 0+000-0+640', 0.64, '3');
INSERT INTO `ruas_jalan` VALUES ('370.K', 'Jl. Kebon Kawung (Sp. Cicendo - Sp. Pasirkaliki) Kota Bandung', 'SUP-KOTA BANDUNG', 'Km. Sta. 0+000-0+639', 0.64, '3');
INSERT INTO `ruas_jalan` VALUES ('371.K', 'Jl. Pajajaran (Sp. Pasirkaliki - Sp. Cicendo) Kota Bandung', 'SUP-KOTA BANDUNG', 'Km. Bdg. 2+925-3+575', 0.65, '3');
INSERT INTO `ruas_jalan` VALUES ('372.K', 'Jl. Pasirkaliki (Sp. Kebonkawung - Sp. Pajajaran) Kota Bandung', 'SUP-KOTA BANDUNG', 'Km. Sta. 0+000-0+660', 0.66, '3');
INSERT INTO `ruas_jalan` VALUES ('373.K', 'Jl. Terusan Pasir Koja (Sp. Jamika - Sp. Soekarno-Hatta) Kota Bandung', 'SUP-KOTA BANDUNG', 'Km. Bdg. 8+200-9+320', 1.12, '3');
INSERT INTO `ruas_jalan` VALUES ('374.K', 'Jl. Peta (Bandung)', 'SUP-KOTA BANDUNG', 'Km. Bdg. 7+000-9+457', 2.46, '3');
INSERT INTO `ruas_jalan` VALUES ('375.K', 'Jl. Bkr (Bandung)', 'SUP-KOTA BANDUNG', 'Km. Bdg. 4+731-6+918', 2.19, '3');
INSERT INTO `ruas_jalan` VALUES ('376.K', 'Jl. Pelajar Pejuang 45 (Bandung)', 'SUP-KOTA BANDUNG', 'Km. Bdg. 3+171-4+731', 1.56, '3');
INSERT INTO `ruas_jalan` VALUES ('377.K', 'Jl. Laswi (Bandung)', 'SUP-KOTA BANDUNG', 'Km. Bdg. 2+000-3+171', 1.17, '3');
INSERT INTO `ruas_jalan` VALUES ('378.K', 'Jl. Ahmad Yani (Sp. Laswi - Sp. Supratman) Kota Bandung', 'SUP-KOTA BANDUNG', 'Km. Sta. 0+000-0+535', 0.54, '3');
INSERT INTO `ruas_jalan` VALUES ('380.K', 'Jl. W. R. Supratman (Bandung)', 'SUP-KOTA BANDUNG', 'Km. Bdg. 3+000-4+676', 1.68, '3');
INSERT INTO `ruas_jalan` VALUES ('381.K', 'Jl. P. Diponegoro (Bandung)', 'SUP-KOTA BANDUNG', 'Km. Bdg. 4+676-6+045', 1.37, '3');
INSERT INTO `ruas_jalan` VALUES ('382.K', 'Jl. Cilamaya (Bandung)', 'SUP-KOTA BANDUNG', 'Km. Sta. 0+000-0+240', 0.24, '3');
INSERT INTO `ruas_jalan` VALUES ('383.K', 'Jl. Cimandiri (Bandung)', 'SUP-KOTA BANDUNG', 'Km. Sta. 0+000-0+345', 0.35, '3');
INSERT INTO `ruas_jalan` VALUES ('384.K', 'Jl. Depan Lan (Bandung)', 'SUP-KOTA BANDUNG', 'Km. Sta. 0+000-0+125', 0.13, '3');
INSERT INTO `ruas_jalan` VALUES ('385.K', 'Jl. Cilaki (Bandung)', 'SUP-KOTA BANDUNG', 'Km. Sta. 0+000-0+200', 0.20, '3');
INSERT INTO `ruas_jalan` VALUES ('386.K', 'Jl. Aria Jipang (Bandung)', 'SUP-KOTA BANDUNG', 'Km. Sta. 0+000-0+216', 0.22, '3');
INSERT INTO `ruas_jalan` VALUES ('387-11.K', 'Jl. Gasibu Barat (Bandung)', 'SUP-KOTA BANDUNG', 'Km. Sta. 0+000-0+205', 0.21, '3');
INSERT INTO `ruas_jalan` VALUES ('387-12.K', 'Jl. Sentot Alibasyah (Bandung)', 'SUP-KOTA BANDUNG', 'Km. Sta. 0+000-0+202', 0.20, '3');
INSERT INTO `ruas_jalan` VALUES ('388 K', 'Jl. Kalitanjung', 'SUP CIREBON', 'Kab. Cirebon', 1930.00, '6');
INSERT INTO `ruas_jalan` VALUES ('389 K', 'Jl. Pangeran Cakrabuana (Sumber)', 'SUP CIREBON', 'Kab. Cirebon', 4530.00, '6');
INSERT INTO `ruas_jalan` VALUES ('390', 'Jl. Sultan Agung (Sumber)', 'SUP CIREBON', 'Kab. Cirebon', 1060.00, '6');
INSERT INTO `ruas_jalan` VALUES ('391-1', 'Palumbonsari - Johar - Tegalloa (Loji)', 'SUP-KAB.KARAWANG', 'Km. Jkt. 74+100-109+720', 35.62, '3');
INSERT INTO `ruas_jalan` VALUES ('391-2', 'Tegalloa (Loji) - Baged/Jagatamu (Bts. Kab. Karawang/Bogor)', 'SUP-KAB.KARAWANG', 'Km. Jkt. 109+720-116+440', 6.72, '3');
INSERT INTO `ruas_jalan` VALUES ('391-3', 'CARIU - JAGATAMU/BAGED (BTS. KAB. BOGOR/KARAWANG)', 'SPP BOGOR II', 'KM.JKT. 78+744 s.d KM.JKT.85+317', 6.57, '1');
INSERT INTO `ruas_jalan` VALUES ('391K', 'Waluran-Malereng-Palangpang', 'SUP-4', 'KmBdg 189+600', 34.85, '2');
INSERT INTO `ruas_jalan` VALUES ('392', 'Palangpang - Puncak Darma', 'SUP-5', '', 5.20, '2');
INSERT INTO `ruas_jalan` VALUES ('392-1', 'Sp3.Loji (tegalnyampai) - Cibutun', 'SUP-5', '', 7.40, '2');
INSERT INTO `ruas_jalan` VALUES ('392-2', 'Cibutun - Balewer', 'SUP-5', '', 16.40, '2');
INSERT INTO `ruas_jalan` VALUES ('392-3', 'Balewer - Puncak Darma', 'SUP-5', '', 3.00, '2');
INSERT INTO `ruas_jalan` VALUES ('392.1K', 'Sp.3 Loji (Tegalnyampai) - Cibutun', 'SUP-4', '', 7.40, '2');
INSERT INTO `ruas_jalan` VALUES ('392.2K', 'Cibutun - Balewer', 'SUP-4', '', 16.40, '2');
INSERT INTO `ruas_jalan` VALUES ('392.3K', 'Balewer - Puncak Darma', 'SUP-4', '', 3.00, '2');
INSERT INTO `ruas_jalan` VALUES ('392K', 'Palangpang-Puncak Darma', 'SUP-5', '', 5.20, '2');
INSERT INTO `ruas_jalan` VALUES ('393', 'Kalijati - Sukamandi', 'SUP-KAB.SUBANG2', 'Km. Jkt. 135+050-157+050', 22.00, '3');
INSERT INTO `ruas_jalan` VALUES ('393.12K', 'Jalan Lingkar Sukabumi (Cibolang - Pelabuhan II)', 'SUP-1', 'KM. BDG 101+950 - KM. BDG 106+450', 2.40, '2');
INSERT INTO `ruas_jalan` VALUES ('393.13K', 'Jalan Lingkar Sukabumi (Cibolang - Pelabuhan II)', 'SUP-1', 'KM. BDG 99+550 - KM. BDG 101+950', 4.50, '2');
INSERT INTO `ruas_jalan` VALUES ('394', 'PATROL - HAURGEULIS - BANTARWARU', 'SUP INDRAMAYU II', 'Kab.Indramayu', 32080.00, '6');
INSERT INTO `ruas_jalan` VALUES ('395', 'Rajamandala - Cipeundeuy - Cikalongwetan', 'SUP-KAB.BDG.BARAT', 'Km. Bdg. 36+240-61+040', 24.80, '3');
INSERT INTO `ruas_jalan` VALUES ('396', 'SIMPANG PANCUH TILU - SIMPANG MUARA CIKADU', 'SPP CIANJUR II', 'KM.BDG. 103+150 s.d KM.BDG. 107+250', 4.10, '1');
INSERT INTO `ruas_jalan` VALUES ('397', 'CIKADU - SIMPANG PANCUH TILU', 'SPP CIANJUR II', 'KM.BDG. 83+350 s.d KM.BDG. 103+150', 19.80, '1');
INSERT INTO `ruas_jalan` VALUES ('398-1', 'BTS. BDG/ CJR - KEBON MUNCANG - CIKADU', 'SPP CIANJUR II', 'KM.BDG. 58+700 s.d KM.BDG. 83+350', 24.65, '1');
INSERT INTO `ruas_jalan` VALUES ('398-2', 'Bts. Kab. Bandung/Cianjur - Pondok Datar', 'SUP-KAB.BANDUNG', '57+863-58+763', 0.90, '3');
INSERT INTO `ruas_jalan` VALUES ('400', 'Cipamokolan (Bts. Kota Bandung/Jbt Tol) - Sp. Manirancan - Jl. Lingkar Luar Majalaya', 'SUP-KAB.BANDUNG', '13+980-29+100', 15.12, '3');
INSERT INTO `ruas_jalan` VALUES ('400-11.K', 'Jl. Gedebage Selatan (Rel KA - Sp. Derwati - Bts Kota Bandung/Jbt.Tol)', 'SUP-KOTA BANDUNG', 'Km. Bdg. 13+900-17+300', 3.40, '3');
INSERT INTO `ruas_jalan` VALUES ('401', 'Sp.3 Panenjoan - Sawahbera (Sp.3 Cijapati)', 'SUP-KAB.BANDUNG', '43+148-48+378', 5.23, '3');
INSERT INTO `ruas_jalan` VALUES ('402', 'Parakan Muncang - Sp.3 Panenjoan', 'SUP-KAB.BANDUNG', '48+378-50+228', 1.85, '3');
INSERT INTO `ruas_jalan` VALUES ('403', ' PARAKAN MUNCANG - WARUNG SIMPANG  ', 'SUP SUMEDANG II', 'Kab.Sumedang', 9.10, '4');
INSERT INTO `ruas_jalan` VALUES ('404-1', 'SP 3 Pamoyanan-Suryalaya-Warudoyong (Bts.Kab.Tasikmalaya/Ciamis)		', 'SUP-3', 'Kab. Tasikmalaya', 9.50, '5');
INSERT INTO `ruas_jalan` VALUES ('404-2', 'Warudoyong(Bts.Kab.Tasikmalaya/Ciamis) - SP 3 Winduraja(Kawali)		', 'SUP-3', 'Kab. Ciamis', 20.50, '5');
INSERT INTO `ruas_jalan` VALUES ('405', 'Jalan Bandara Nusawiru', 'SUP-3', 'Kab. Pangandaran', 2.05, '5');

-- ----------------------------
-- Table structure for rule_user
-- ----------------------------
DROP TABLE IF EXISTS `rule_user`;
CREATE TABLE `rule_user`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `rule` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of rule_user
-- ----------------------------
INSERT INTO `rule_user` VALUES (1, 'ADMINISTRATOR');
INSERT INTO `rule_user` VALUES (2, 'PPK');
INSERT INTO `rule_user` VALUES (3, 'ADMIN-UPTD');
INSERT INTO `rule_user` VALUES (4, 'KONSULTAN');
INSERT INTO `rule_user` VALUES (5, 'KONTRAKTOR');
INSERT INTO `rule_user` VALUES (6, 'USER');

-- ----------------------------
-- Table structure for satuan
-- ----------------------------
DROP TABLE IF EXISTS `satuan`;
CREATE TABLE `satuan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `satuan` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of satuan
-- ----------------------------
INSERT INTO `satuan` VALUES (1, 'PCS');
INSERT INTO `satuan` VALUES (2, 'DRUM');
INSERT INTO `satuan` VALUES (3, 'KG');
INSERT INTO `satuan` VALUES (4, 'TON');
INSERT INTO `satuan` VALUES (5, 'SET');
INSERT INTO `satuan` VALUES (6, 'M3');
INSERT INTO `satuan` VALUES (7, 'M2');
INSERT INTO `satuan` VALUES (8, 'KLG');

-- ----------------------------
-- Table structure for simbol_request
-- ----------------------------
DROP TABLE IF EXISTS `simbol_request`;
CREATE TABLE `simbol_request`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `simbol` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of simbol_request
-- ----------------------------
INSERT INTO `simbol_request` VALUES (1, 'Sudah di Setujui', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:green;font-size:18px\" title=\"Sudah di Setujui\">&nbsp;</span></a>');
INSERT INTO `simbol_request` VALUES (2, 'Menunggu Persetujuan', '<a href=\"#\"><span class=\"fas fa-check-square\" style=\"color:red;font-size:18px\"  title=\"Menunggu Persetujuan\">&nbsp;</span></a>');
INSERT INTO `simbol_request` VALUES (3, 'Ditolak', '<a href=\"#\"><span class=\"fas fa-times-circle\" style=\"color:red;font-size:18px\"  title=\"Ditolak\">&nbsp;</span></a>');
INSERT INTO `simbol_request` VALUES (4, 'Pengajuan', '<a href=\"#\"><span class=\"fas fa-arrow-alt-circle-up\" style=\"color:yellow;font-size:18px\"  title=\"Pengajuan\">&nbsp;</span></a>');

-- ----------------------------
-- Table structure for uptd
-- ----------------------------
DROP TABLE IF EXISTS `uptd`;
CREATE TABLE `uptd`  (
  `id_uptd` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `alamat` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `telp` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kepala_uptd` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_uptd`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of uptd
-- ----------------------------

-- ----------------------------
-- Table structure for utils_sup
-- ----------------------------
DROP TABLE IF EXISTS `utils_sup`;
CREATE TABLE `utils_sup`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kantor_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 37 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of utils_sup
-- ----------------------------
INSERT INTO `utils_sup` VALUES (1, 'SPP CIANJUR 1', 1);
INSERT INTO `utils_sup` VALUES (2, 'SPP CIANJUR 2', 1);
INSERT INTO `utils_sup` VALUES (3, 'SPP BOGOR 1', 1);
INSERT INTO `utils_sup` VALUES (4, 'SPP BOGOR 2', 1);
INSERT INTO `utils_sup` VALUES (5, 'SPP BEKASI', 1);
INSERT INTO `utils_sup` VALUES (6, 'SPP SUKABUMI 1', 2);
INSERT INTO `utils_sup` VALUES (7, 'SPP SUKABUMI 2', 2);
INSERT INTO `utils_sup` VALUES (8, 'SPP SUKABUMI 3', 2);
INSERT INTO `utils_sup` VALUES (9, 'SPP SUKABUMI 4', 2);
INSERT INTO `utils_sup` VALUES (10, 'SPP SUKABUMI 5', 2);
INSERT INTO `utils_sup` VALUES (11, 'SUP KOTA BANDUNG', 3);
INSERT INTO `utils_sup` VALUES (12, 'SUP KAB BANDUNG', 3);
INSERT INTO `utils_sup` VALUES (13, 'SUP KBB CIMAHI', 3);
INSERT INTO `utils_sup` VALUES (14, 'SUP KAB SUBANG 1', 3);
INSERT INTO `utils_sup` VALUES (15, 'SUP KAB SUBANG 2', 3);
INSERT INTO `utils_sup` VALUES (16, 'SUP KAB PURWAKARTA', 3);
INSERT INTO `utils_sup` VALUES (17, 'SUP KAB KARAWANG', 3);
INSERT INTO `utils_sup` VALUES (18, 'SUP GARUT 1', 4);
INSERT INTO `utils_sup` VALUES (19, 'SUP GARUT 2', 4);
INSERT INTO `utils_sup` VALUES (20, 'SUP GARUT 3', 4);
INSERT INTO `utils_sup` VALUES (21, 'SUP GARUT 4', 4);
INSERT INTO `utils_sup` VALUES (22, 'SUP SUMEDANG 1', 4);
INSERT INTO `utils_sup` VALUES (23, 'SUP SUMEDANG 2', 4);
INSERT INTO `utils_sup` VALUES (24, 'SUP TASIKMALAYA 1', 5);
INSERT INTO `utils_sup` VALUES (25, 'SUP TASIKMALAYA 2', 5);
INSERT INTO `utils_sup` VALUES (26, 'SATUAN PELAYANAN PENGELOLAAN JALAN DAN JEMBATAN WI', 5);
INSERT INTO `utils_sup` VALUES (27, 'SUP KUNINGAN 1', 5);
INSERT INTO `utils_sup` VALUES (28, 'SUP KUNINGAN 2', 5);
INSERT INTO `utils_sup` VALUES (29, 'SUP INDRAMAYU 1', 6);
INSERT INTO `utils_sup` VALUES (30, 'SUP INDRAMAYU 2', 6);
INSERT INTO `utils_sup` VALUES (31, 'SUP MAJALENGKA 1', 6);
INSERT INTO `utils_sup` VALUES (32, 'SUP MAJALENGKA 2', 6);
INSERT INTO `utils_sup` VALUES (33, 'SUP CIREBON', 6);

-- ----------------------------
-- View structure for pembangunan_rencana
-- ----------------------------
DROP VIEW IF EXISTS `pembangunan_rencana`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `pembangunan_rencana` AS select `jadual`.`id` AS `id_jadual_pembangunan`,`kategori_paket`.`nama_kategori` AS `nama_kategori`,`jadual`.`unor` AS `unor`,`jadual`.`kegiatan` AS `nama_paket`,`jadual`.`ruas_jalan` AS `lokasi_pekerjaan`,`data_umum_ruas`.`lat_awal` AS `lat_awal`,`data_umum_ruas`.`long_awal` AS `long_awal`,`data_umum_ruas`.`lat_akhir` AS `lat_akhir`,`data_umum_ruas`.`long_akhir` AS `long_akhir`,`jadual`.`panjang` AS `target_panjang`,`data_umum`.`waktu_pelaksanaan` AS `waktu_pelaksanaan_hk`,`data_umum_ruas`.`segmen_jalan` AS `km_bdg1`,`detail_laporan_harian_pekerjaan`.`jenis_pekerjaan` AS `jenis_penanganan`,`data_umum`.`penyedia_jasa` AS `penyedia_jasa`,`data_umum`.`no_kontrak` AS `no_kontrak`,`data_umum`.`tgl_kontrak` AS `tgl_kontrak`,`jadual`.`tgl_input` AS `tgl_input`,`data_umum`.`nilai_kontrak` AS `nilai_kontrak`,`member`.`nama_lengkap` AS `updated_by` from ((((((`detail_laporan_harian_pekerjaan` join `jadual` on((`jadual`.`id` = `detail_laporan_harian_pekerjaan`.`no_trans`))) join `detail_jadual` on((`jadual`.`id` = `detail_jadual`.`id_jadual`))) join `data_umum` on((`data_umum`.`id` = `jadual`.`id_data_umum`))) join `kategori_paket` on((`kategori_paket`.`id` = `data_umum`.`kategori`))) join `data_umum_ruas` on((`data_umum`.`id` = `data_umum_ruas`.`id`))) join `member` on((`member`.`id_member` = `jadual`.`user`))) group by `nama_paket` order by `jadual`.`tgl_input` ;

-- ----------------------------
-- View structure for tabel_proyek_kontrak
-- ----------------------------
DROP VIEW IF EXISTS `tabel_proyek_kontrak`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `tabel_proyek_kontrak` AS select `b`.`user` AS `ID_USER`,`a`.`nmp` AS `NMP`,`b`.`kegiatan` AS `NAMA_KEGIATAN`,`b`.`nama_penyedia` AS `PENYEDIA_JASA`,`b`.`konsultan` AS `KONSULTAN`,`c`.`tgl_spmk` AS `PERIODE_MULAI`,(`c`.`tgl_spmk` + interval `c`.`waktu_pelaksanaan` day) AS `PERIODE_SELESAI`,`c`.`waktu_pelaksanaan` AS `WAKTU_PELAKSANAAN`,`b`.`panjang` AS `PANJANG_KM`,`b`.`nilai_kontrak` AS `NILAI_KONTRAK_NON_PPN`,`d`.`jenis_pekerjaan` AS `JENIS_PEKERJAAN`,`a`.`harga_satuan` AS `HARGA_SATUAN`,`a`.`volume` AS `KUANTITAS_RENCANA`,`a`.`satuan` AS `SATUAN`,`a`.`jumlah_harga` AS `JUMLAH_BIAYA`,`a`.`bobot` AS `BOBOT_TERHADAP_KONTRAK` from (((`detail_jadual` `a` join `jadual` `b` on((`a`.`id_jadual` = `b`.`id`))) join `data_umum` `c` on((`b`.`id_data_umum` = `c`.`id`))) join `master_jenis_pekerjaan` `d` on((`a`.`nmp` = `d`.`id`))) ;

SET FOREIGN_KEY_CHECKS = 1;
