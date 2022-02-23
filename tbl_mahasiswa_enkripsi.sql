/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100408
 Source Host           : localhost:3306
 Source Schema         : db_dewankomputer

 Target Server Type    : MySQL
 Target Server Version : 100408
 File Encoding         : 65001

 Date: 01/02/2020 02:38:23
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_mahasiswa_enkripsi
-- ----------------------------
DROP TABLE IF EXISTS `tbl_mahasiswa_enkripsi`;
CREATE TABLE `tbl_mahasiswa_enkripsi`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_mahasiswa` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jenis_kelamin` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_masuk` date NOT NULL,
  `jurusan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_mahasiswa_enkripsi
-- ----------------------------
INSERT INTO `tbl_mahasiswa_enkripsi` VALUES (1, 'RmwxWnVLd2VQSHIzbUZRUE15Y3dLdz09', 'c1o4QUk1WTRnU3VnNHpld05Ob0Ezdz09', 'aTEzSE93UTBWQkVBeGZ0TEpRYXlRZz09', '2019-10-08', 'NlJaaTA1SGxJczkrRG14S0JpYzMrVlphQ0xma0VKRkVMM2cyT29YbDRmVT0=');
INSERT INTO `tbl_mahasiswa_enkripsi` VALUES (2, 'ZWVQTi9ad284bnNHY05HVnI2U3pXZz09', 'Njd6bTIrSW8vU2pLa3ljMmtHekFEUT09', 'aTEzSE93UTBWQkVBeGZ0TEpRYXlRZz09', '2019-08-28', 'TzR1NFZkUjhRS0lIR3NDMmJVaSt5UGI5YW5xcGxXRWNFVDVpK3dUN3Y4OD0=');

SET FOREIGN_KEY_CHECKS = 1;
