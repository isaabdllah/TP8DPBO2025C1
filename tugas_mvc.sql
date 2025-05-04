/*
 Navicat Premium Dump SQL

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : localhost:3306
 Source Schema         : tugas_mvc

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 04/05/2025 20:44:28
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for ambil_mk
-- ----------------------------
DROP TABLE IF EXISTS `ambil_mk`;
CREATE TABLE `ambil_mk`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_mahasiswa` int NULL DEFAULT NULL,
  `id_mk` int NULL DEFAULT NULL,
  `semester` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_mahasiswa`(`id_mahasiswa` ASC) USING BTREE,
  INDEX `id_mk`(`id_mk` ASC) USING BTREE,
  CONSTRAINT `ambil_mk_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `ambil_mk_ibfk_2` FOREIGN KEY (`id_mk`) REFERENCES `mata_kuliah` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 77 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ambil_mk
-- ----------------------------
INSERT INTO `ambil_mk` VALUES (1, 1, 1, 'Satu');
INSERT INTO `ambil_mk` VALUES (2, 2, 2, 'Dua');
INSERT INTO `ambil_mk` VALUES (3, 3, 3, 'Tiga');
INSERT INTO `ambil_mk` VALUES (4, 4, 4, 'Empat');
INSERT INTO `ambil_mk` VALUES (5, 5, 5, 'Lima');
INSERT INTO `ambil_mk` VALUES (6, 1, 2, 'Enam');
INSERT INTO `ambil_mk` VALUES (7, 2, 3, 'Tujuh');
INSERT INTO `ambil_mk` VALUES (8, 3, 4, 'Delapan');
INSERT INTO `ambil_mk` VALUES (9, 4, 1, 'Tiga');
INSERT INTO `ambil_mk` VALUES (75, 5, 3, 'DuaBelas');
INSERT INTO `ambil_mk` VALUES (76, 2, 2, 'Empat');

-- ----------------------------
-- Table structure for dosen
-- ----------------------------
DROP TABLE IF EXISTS `dosen`;
CREATE TABLE `dosen`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_dosen` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `nip` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dosen
-- ----------------------------
INSERT INTO `dosen` VALUES (1, 'Dr. Siti Aminah', '1987654321', 'siti@example.com');
INSERT INTO `dosen` VALUES (2, 'Prof. Bambang Subroto', '1234567890', 'bambang@example.com');
INSERT INTO `dosen` VALUES (3, 'Dr. Rina Kusuma', '1122334455', 'rina@example.com');
INSERT INTO `dosen` VALUES (4, 'Dr. Agus Wijaya', '9988776655', 'agus@example.com');
INSERT INTO `dosen` VALUES (5, 'Prof. Taufik Hidayat', '5566778899', 'taufik@example.com');

-- ----------------------------
-- Table structure for mahasiswa
-- ----------------------------
DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE `mahasiswa`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `nim` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `telepon` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `tanggal_masuk` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mahasiswa
-- ----------------------------
INSERT INTO `mahasiswa` VALUES (1, 'Ahmad Fauzi', '111111', '081234567890', 'ahmad@example.com', '2023-01-15');
INSERT INTO `mahasiswa` VALUES (2, 'Budi Santoso', '87654321', '081298765432', 'budi@example.com', '2023-02-10');
INSERT INTO `mahasiswa` VALUES (3, 'Citra Dewi', '11223344', '081345678901', 'citra@example.com', '2023-03-05');
INSERT INTO `mahasiswa` VALUES (4, 'Dewi Lestari', '44332211', '081456789012', 'dewi@example.com', '2023-04-20');
INSERT INTO `mahasiswa` VALUES (5, 'Eko Prasetyo', '55667788', '081567890123', 'eko@example.com', '2023-05-25');

-- ----------------------------
-- Table structure for mata_kuliah
-- ----------------------------
DROP TABLE IF EXISTS `mata_kuliah`;
CREATE TABLE `mata_kuliah`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_mk` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `kode_mk` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `id_dosen` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_dosen`(`id_dosen` ASC) USING BTREE,
  CONSTRAINT `mata_kuliah_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mata_kuliah
-- ----------------------------
INSERT INTO `mata_kuliah` VALUES (1, 'Pemrograman Web', 'MK001', 1);
INSERT INTO `mata_kuliah` VALUES (2, 'Basis Data', 'MK002', 2);
INSERT INTO `mata_kuliah` VALUES (3, 'Jaringan Komputer', 'MK003', 3);
INSERT INTO `mata_kuliah` VALUES (4, 'Kecerdasan Buatan', 'MK004', 4);
INSERT INTO `mata_kuliah` VALUES (5, 'Sistem Operasi', 'MK005', 5);

SET FOREIGN_KEY_CHECKS = 1;
