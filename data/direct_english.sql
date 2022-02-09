/*
 Navicat Premium Data Transfer

 Source Server         : MYSQL - Local
 Source Server Type    : MySQL
 Source Server Version : 80021
 Source Host           : localhost:3306
 Source Schema         : direct_english

 Target Server Type    : MySQL
 Target Server Version : 80021
 File Encoding         : 65001

 Date: 09/02/2022 14:35:09
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for productos
-- ----------------------------
DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `sku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `cantidad` int(0) NOT NULL,
  `precio` double NOT NULL,
  `descripcion` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `estado` int(0) NULL DEFAULT 1 COMMENT '1: Activo; 2:Eliminado',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of productos
-- ----------------------------
INSERT INTO `productos` VALUES (1, '32434', 'Producto 1', 2, 222, 'descripcion del producto 1', 1, '2022-02-09 16:06:05', '2022-02-09 16:21:49');
INSERT INTO `productos` VALUES (2, '32434', 'Producto 2', 89, 100, 'descripcion del producto 2', 1, '2022-02-09 16:06:30', '2022-02-09 16:06:30');
INSERT INTO `productos` VALUES (3, '5675674', 'Producto 3', 20, 890, 'descripcion del producto 3', 1, '2022-02-09 16:18:04', '2022-02-09 17:02:49');
INSERT INTO `productos` VALUES (4, '4354534', 'Producto 4', 22, 99, 'descripcion del producto 4', 1, '2022-02-09 17:07:29', '2022-02-09 18:25:49');

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `telefono` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `fecha_nacimiento` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `correo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `estado` int(0) NULL DEFAULT 1 COMMENT '1: Activo; 2:Eliminado',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES (1, 'usuario 1', '1111111111', 'user1', '232-34234', 'prueba@test.com', 1, '12345678', '2022-02-09 15:49:49', '2022-02-09 16:19:27');
INSERT INTO `usuarios` VALUES (2, 'usuario 2', '2222222222', 'user2', '232-34234', 'prueba2@test.com', 1, '123456789', '2022-02-09 15:50:39', '2022-02-09 18:20:28');

SET FOREIGN_KEY_CHECKS = 1;
