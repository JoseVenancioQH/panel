/*
 Navicat Premium Data Transfer

 Source Server         : 185
 Source Server Type    : MySQL
 Source Server Version : 50508
 Source Host           : 192.168.1.185:3306
 Source Schema         : controlplacas

 Target Server Type    : MySQL
 Target Server Version : 50508
 File Encoding         : 65001

 Date: 09/08/2018 09:52:52
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cat_almacen
-- ----------------------------
DROP TABLE IF EXISTS `cat_almacen`;
CREATE TABLE `cat_almacen`  (
  `cat_almacen_id_almacen` int(11) NOT NULL AUTO_INCREMENT,
  `cat_almacen_nombre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cat_almacen_status` tinyint(4) NULL DEFAULT NULL,
  `cat_almacen_fecharegistro` datetime NULL DEFAULT NULL,
  `cat_almacen_fechaactualiza` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`cat_almacen_id_almacen`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of cat_almacen
-- ----------------------------
INSERT INTO `cat_almacen` VALUES (5, 'Almacen 1', 1, '2018-07-04 17:09:21', '2018-07-04 17:09:18');
INSERT INTO `cat_almacen` VALUES (6, 'Almacen 2', 1, '2018-07-04 17:09:25', '2018-07-04 17:09:22');
INSERT INTO `cat_almacen` VALUES (7, 'Almacen 3', 1, '2018-07-04 17:09:29', '2018-07-04 17:09:25');
INSERT INTO `cat_almacen` VALUES (8, 'Nuevo Almacen1', 1, '2018-07-18 11:20:05', '2018-07-18 18:24:47');
INSERT INTO `cat_almacen` VALUES (9, 'TIJUANA CENTRAL', 1, '2018-07-18 17:30:50', '2018-07-18 17:31:06');
INSERT INTO `cat_almacen` VALUES (10, 'Nuevo Almacen 12333', 1, '2018-07-23 11:22:13', NULL);
INSERT INTO `cat_almacen` VALUES (11, 'Nuevo Almacen 54321', 1, '2018-07-23 11:26:57', NULL);
INSERT INTO `cat_almacen` VALUES (12, 'Otro Alamacen Nuevo 098765', 1, '2018-07-23 11:41:01', NULL);
INSERT INTO `cat_almacen` VALUES (13, 'Nueva Almacen Entrante 123456789', 1, '2018-07-23 11:53:00', NULL);
INSERT INTO `cat_almacen` VALUES (14, 'NuevoAlmacen0987654321', 1, '2018-07-23 11:53:57', NULL);
INSERT INTO `cat_almacen` VALUES (15, 'NuevoAlmacen1234567890', 1, '2018-07-23 11:55:20', NULL);
INSERT INTO `cat_almacen` VALUES (16, 'HolaNuevoPermisionario', 1, '2018-07-23 14:10:52', NULL);
INSERT INTO `cat_almacen` VALUES (17, 'NuevoPermisionario123456', 1, '2018-07-23 14:11:58', NULL);
INSERT INTO `cat_almacen` VALUES (18, 'wwwwwwww', 1, '2018-07-30 12:06:37', '2018-08-08 15:31:09');
INSERT INTO `cat_almacen` VALUES (19, '23ewsd', 1, '2018-07-30 12:06:57', NULL);
INSERT INTO `cat_almacen` VALUES (20, 'ALMACEN 23AVP', 1, '2018-08-01 15:00:12', '2018-08-01 15:00:49');
INSERT INTO `cat_almacen` VALUES (21, '1222', 1, '2018-08-03 11:19:06', NULL);

-- ----------------------------
-- Table structure for cat_cobros
-- ----------------------------
DROP TABLE IF EXISTS `cat_cobros`;
CREATE TABLE `cat_cobros`  (
  `cat_cobros_id_cobros` int(11) NOT NULL AUTO_INCREMENT,
  `cat_cobros_nombre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cat_cobros_porcentaje` float NULL DEFAULT NULL,
  `cat_cobros_porcentajedecimal` float NULL DEFAULT NULL,
  `cat_cobros_status` tinyint(4) NULL DEFAULT NULL,
  `cat_cobros_fecharegistro` datetime NULL DEFAULT NULL,
  `cat_cobros_fechaactualiza` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`cat_cobros_id_cobros`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of cat_cobros
-- ----------------------------
INSERT INTO `cat_cobros` VALUES (2, '3000', 20, 0.2, 1, '2018-06-26 18:43:35', '2018-06-27 03:43:35');
INSERT INTO `cat_cobros` VALUES (3, '2000', 15, 0.15, 1, '2018-06-26 18:43:24', '2018-06-27 03:43:24');
INSERT INTO `cat_cobros` VALUES (4, '2000', 15, 0.15, 1, '2018-07-18 18:27:49', '2018-07-18 18:28:13');
INSERT INTO `cat_cobros` VALUES (5, '2001', 20, 0.2, 1, '2018-07-26 17:24:38', NULL);
INSERT INTO `cat_cobros` VALUES (6, '2005', 15, 0.15, 1, '2018-08-01 15:11:17', NULL);
INSERT INTO `cat_cobros` VALUES (7, '5000', 20, 0.2, 1, '2018-08-01 15:15:33', '2018-08-01 17:29:26');
INSERT INTO `cat_cobros` VALUES (9, '2005', 16, 0.16, 1, '2018-08-01 17:35:57', NULL);
INSERT INTO `cat_cobros` VALUES (10, '1001', 50, 0.5, 1, '2018-08-03 15:17:50', NULL);
INSERT INTO `cat_cobros` VALUES (11, '123', 30, 0.3, 1, '2018-08-03 16:50:44', NULL);

-- ----------------------------
-- Table structure for cat_empresa
-- ----------------------------
DROP TABLE IF EXISTS `cat_empresa`;
CREATE TABLE `cat_empresa`  (
  `cat_empresa_id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `cat_empresa_nombre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cat_empresa_status` tinyint(4) NULL DEFAULT NULL,
  `cat_empresa_fecharegistro` datetime NULL DEFAULT NULL,
  `cat_empresa_fechaactualiza` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`cat_empresa_id_empresa`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of cat_empresa
-- ----------------------------
INSERT INTO `cat_empresa` VALUES (13, 'Empresa 1', 1, '2018-06-19 21:15:43', '2018-08-01 17:38:42');
INSERT INTO `cat_empresa` VALUES (14, 'Empresa 2', 1, '2018-06-19 21:15:57', NULL);
INSERT INTO `cat_empresa` VALUES (15, 'Empresa 3', 1, '2018-06-19 21:16:07', NULL);
INSERT INTO `cat_empresa` VALUES (16, 'ABC12', 1, '2018-06-25 17:50:58', '2018-06-25 17:50:58');
INSERT INTO `cat_empresa` VALUES (17, 'AUTOBUSES ABC PLUS', 1, '2018-07-18 17:31:48', '2018-07-18 17:55:53');
INSERT INTO `cat_empresa` VALUES (18, 'LINEAS DE TRANSPORTE URBANO Y SUBURBANO DE BC', 1, '2018-07-18 17:32:04', '2018-08-01 17:39:09');
INSERT INTO `cat_empresa` VALUES (19, 'AMB', 1, '2018-08-01 14:59:15', NULL);
INSERT INTO `cat_empresa` VALUES (20, '23AVP', 1, '2018-08-01 14:59:30', '2018-08-01 17:38:58');

-- ----------------------------
-- Table structure for cat_marcas_unidades
-- ----------------------------
DROP TABLE IF EXISTS `cat_marcas_unidades`;
CREATE TABLE `cat_marcas_unidades`  (
  `cat_marcas_unidades_id_marca` int(11) NOT NULL AUTO_INCREMENT,
  `cat_marcas_unidades_nombre` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cat_marcas_unidades_status` int(11) NOT NULL,
  `cat_marcas_unidades_fecharegistro` datetime NULL DEFAULT NULL,
  `cat_marcas_unidades_fechaactualizada` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`cat_marcas_unidades_id_marca`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of cat_marcas_unidades
-- ----------------------------
INSERT INTO `cat_marcas_unidades` VALUES (6, 'Michelin', 1, NULL, NULL);
INSERT INTO `cat_marcas_unidades` VALUES (7, 'Bridgestone', 1, NULL, NULL);
INSERT INTO `cat_marcas_unidades` VALUES (8, 'Pirelli', 1, NULL, NULL);
INSERT INTO `cat_marcas_unidades` VALUES (9, 'Good Year', 1, NULL, NULL);
INSERT INTO `cat_marcas_unidades` VALUES (10, 'DUNLOP', 1, NULL, NULL);
INSERT INTO `cat_marcas_unidades` VALUES (11, 'Firestone', 1, NULL, NULL);
INSERT INTO `cat_marcas_unidades` VALUES (12, 'Zeta', 1, NULL, NULL);
INSERT INTO `cat_marcas_unidades` VALUES (13, 'GENERAL', 1, NULL, NULL);
INSERT INTO `cat_marcas_unidades` VALUES (14, 'YOKOHAMA', 1, NULL, NULL);
INSERT INTO `cat_marcas_unidades` VALUES (15, 'uniroyal-rs20', 1, NULL, NULL);
INSERT INTO `cat_marcas_unidades` VALUES (16, 'DURUN', 1, NULL, NULL);
INSERT INTO `cat_marcas_unidades` VALUES (17, 'INTERNATIONAL', 1, '2018-07-18 18:04:29', '2018-07-18 18:05:04');
INSERT INTO `cat_marcas_unidades` VALUES (18, 'MERCEDEZ BENZ1', 1, '2018-07-26 17:30:58', '2018-07-26 17:34:25');
INSERT INTO `cat_marcas_unidades` VALUES (19, 'EJEMPLO1', 1, '2018-08-01 15:24:41', '2018-08-01 15:24:49');

-- ----------------------------
-- Table structure for cat_menu
-- ----------------------------
DROP TABLE IF EXISTS `cat_menu`;
CREATE TABLE `cat_menu`  (
  `cat_menu_id` int(255) NOT NULL AUTO_INCREMENT,
  `cat_menu_nombre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cat_permisos_id` int(11) NULL DEFAULT NULL,
  `cat_menu_status` tinyint(255) NULL DEFAULT NULL,
  `cat_menu_nombre_clear` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cat_menu_id_padre` int(255) NULL DEFAULT NULL,
  `cat_menu_orden_padre` int(100) NULL DEFAULT NULL,
  `cat_menu_orden_hijo` int(255) NULL DEFAULT NULL,
  `cat_menu_class_padre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cat_menu_class_hijo` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cat_menu_link` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cat_menu_unico` tinyint(255) NULL DEFAULT NULL,
  PRIMARY KEY (`cat_menu_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 184 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of cat_menu
-- ----------------------------
INSERT INTO `cat_menu` VALUES (46, 'Sistema', NULL, 1, 'sistema', 0, 1, 0, NULL, NULL, NULL, NULL);
INSERT INTO `cat_menu` VALUES (47, 'Usuarios', NULL, 1, 'usuarios', 46, 0, 2, NULL, NULL, 'Sistema_Usuarios', NULL);
INSERT INTO `cat_menu` VALUES (48, 'Permisos', NULL, 1, 'permisos', 46, 0, 4, NULL, NULL, 'Sistema_Permisos', NULL);
INSERT INTO `cat_menu` VALUES (49, 'Perfiles', NULL, 1, 'perfiles', 46, 0, 3, NULL, NULL, 'Sistema_Perfiles', NULL);
INSERT INTO `cat_menu` VALUES (145, 'Catalogo', NULL, 1, 'catalogo', 0, 0, 4, NULL, NULL, '', NULL);
INSERT INTO `cat_menu` VALUES (150, 'Unidad', NULL, 1, 'unidad', 160, 0, 2, NULL, NULL, 'Catalogos_Unidades', NULL);
INSERT INTO `cat_menu` VALUES (153, 'Marca', NULL, 1, 'marca', 160, 0, 8, NULL, NULL, 'Catalogos_MarcaUnidad', NULL);
INSERT INTO `cat_menu` VALUES (154, 'Modelo', NULL, 1, 'modelo', 160, 0, 13, NULL, NULL, 'Catalogos_ModeloUnidad', NULL);
INSERT INTO `cat_menu` VALUES (155, 'Servicio', NULL, 1, 'servicio', 160, 0, 10, NULL, NULL, 'Catalogos_ServicioUnidad', NULL);
INSERT INTO `cat_menu` VALUES (156, 'Rol', NULL, 1, 'rol', 160, 0, 11, NULL, NULL, 'Catalogos_RolUnidad', NULL);
INSERT INTO `cat_menu` VALUES (157, 'Empresa', NULL, 1, 'empresa', 145, 0, 17, NULL, NULL, 'Catalogos_Empresa', NULL);
INSERT INTO `cat_menu` VALUES (158, 'Almacen', NULL, 1, 'almacen', 145, 0, 36, NULL, NULL, 'Catalogos_Almacen', NULL);
INSERT INTO `cat_menu` VALUES (159, 'Zona', NULL, 1, 'zona', 160, 0, 12, NULL, NULL, 'Catalogos_ZonaUnidad', NULL);
INSERT INTO `cat_menu` VALUES (160, 'Unidades', NULL, 1, 'unidades', 145, 0, 32, NULL, NULL, '-', NULL);
INSERT INTO `cat_menu` VALUES (161, 'Permisionario', NULL, 1, 'permisionario', 145, 0, 30, NULL, NULL, 'Catalogos_Permisionario', NULL);
INSERT INTO `cat_menu` VALUES (162, 'Operadores', NULL, 1, 'operadores', 145, 0, 34, NULL, NULL, 'Catalogos_Operadores', NULL);
INSERT INTO `cat_menu` VALUES (163, 'Placas', NULL, 1, 'placas', 145, 0, 24, NULL, NULL, 'Catalogos_Placas', NULL);
INSERT INTO `cat_menu` VALUES (164, 'Periodo Pago', NULL, 1, 'periodo-pago', 145, 0, 25, NULL, NULL, 'Catalogos_PeriodoPago', NULL);
INSERT INTO `cat_menu` VALUES (165, 'Cobros', NULL, 1, 'cobros', 145, 0, 26, NULL, NULL, 'Catalogos_Cobros', NULL);
INSERT INTO `cat_menu` VALUES (166, 'Status Fianzas', NULL, 1, 'status-fianzas', 145, 0, 27, NULL, NULL, 'Catalogos_StatusFianzas', NULL);
INSERT INTO `cat_menu` VALUES (168, 'Permisionario', NULL, 1, 'permisionario', 0, 0, 1, NULL, NULL, 'Registro_Permisionario', NULL);
INSERT INTO `cat_menu` VALUES (169, 'Pagos', NULL, 1, 'pagos', 168, 0, 1, NULL, NULL, 'Registros_PagosPermisionarios', NULL);
INSERT INTO `cat_menu` VALUES (170, 'Vincular', NULL, 1, 'vincular', 168, 0, 2, NULL, NULL, 'Catalogos_VincularPermisionario', NULL);
INSERT INTO `cat_menu` VALUES (171, 'Fianzas', NULL, 1, 'fianzas', 0, 0, 2, NULL, NULL, '', NULL);
INSERT INTO `cat_menu` VALUES (172, 'Registro', NULL, 1, 'registro', 171, 0, 4, NULL, NULL, 'Catalogos_VincularFianza', NULL);
INSERT INTO `cat_menu` VALUES (173, 'Pagos Fianzas', NULL, 1, 'pagos-fianzas', 171, 0, 2, NULL, NULL, 'Registros_PagosFianzas', NULL);
INSERT INTO `cat_menu` VALUES (174, 'Reportes', NULL, 1, 'reportes', 0, 0, 3, NULL, NULL, '', NULL);
INSERT INTO `cat_menu` VALUES (175, 'Reportes Permisionarios', NULL, 1, 'reportes-permisionarios', 174, 0, 1, NULL, NULL, 'Reportes_Permisionarios', NULL);
INSERT INTO `cat_menu` VALUES (176, 'Reportes Fianzas', NULL, 1, 'reportes-fianzas', 174, 0, 2, NULL, NULL, 'Reportes_Fianzas', NULL);
INSERT INTO `cat_menu` VALUES (182, 'Nuevo Permiso', NULL, 1, 'nuevo-permiso', 145, 0, 35, NULL, NULL, 'Nuevo_Permiso', NULL);
INSERT INTO `cat_menu` VALUES (183, 'NuevoPermiso', NULL, 1, 'nuevopermiso', 145, 0, 37, NULL, NULL, 'Nuevo_Permiso', NULL);

-- ----------------------------
-- Table structure for cat_modelos_unidades
-- ----------------------------
DROP TABLE IF EXISTS `cat_modelos_unidades`;
CREATE TABLE `cat_modelos_unidades`  (
  `cat_modelos_unidades_id_modelo` int(11) NOT NULL AUTO_INCREMENT,
  `cat_modelos_unidades_nombre` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cat_modelos_unidades_status` int(11) NOT NULL,
  `cat_modelos_unidades_fecharegistro` datetime NULL DEFAULT NULL,
  `cat_modelos_unidades_fechaactualiza` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`cat_modelos_unidades_id_modelo`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 42 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of cat_modelos_unidades
-- ----------------------------
INSERT INTO `cat_modelos_unidades` VALUES (12, 'OMNIBUS', 1, '2018-06-13 11:44:51', '2018-06-13 20:44:51');
INSERT INTO `cat_modelos_unidades` VALUES (13, 'ZAFIRO', 1, '2018-06-13 11:44:20', '2018-06-13 11:44:20');
INSERT INTO `cat_modelos_unidades` VALUES (14, 'kodiak', 1, NULL, NULL);
INSERT INTO `cat_modelos_unidades` VALUES (15, 'SPRINTER', 1, NULL, NULL);
INSERT INTO `cat_modelos_unidades` VALUES (16, 'BOXER OF1', 1, NULL, '2018-07-18 18:06:51');
INSERT INTO `cat_modelos_unidades` VALUES (17, 'BOXER-OF', 1, NULL, NULL);
INSERT INTO `cat_modelos_unidades` VALUES (18, '9700', 1, NULL, NULL);
INSERT INTO `cat_modelos_unidades` VALUES (19, 'SCANIA I6', 1, NULL, NULL);
INSERT INTO `cat_modelos_unidades` VALUES (20, '7350', 1, NULL, NULL);
INSERT INTO `cat_modelos_unidades` VALUES (21, 'Bóxer', 1, NULL, NULL);
INSERT INTO `cat_modelos_unidades` VALUES (22, 'Torino', 1, NULL, NULL);
INSERT INTO `cat_modelos_unidades` VALUES (23, 'E-450', 1, NULL, NULL);
INSERT INTO `cat_modelos_unidades` VALUES (24, 'F-450', 1, NULL, NULL);
INSERT INTO `cat_modelos_unidades` VALUES (25, 'J 4500', 1, NULL, NULL);
INSERT INTO `cat_modelos_unidades` VALUES (26, '8-150', 1, NULL, NULL);
INSERT INTO `cat_modelos_unidades` VALUES (27, 'C-11-F', 1, NULL, NULL);
INSERT INTO `cat_modelos_unidades` VALUES (28, 'V-7550', 1, NULL, NULL);
INSERT INTO `cat_modelos_unidades` VALUES (29, 'V-320', 1, NULL, NULL);
INSERT INTO `cat_modelos_unidades` VALUES (30, '9300', 1, NULL, NULL);
INSERT INTO `cat_modelos_unidades` VALUES (31, 'SCANIA I5', 1, NULL, NULL);
INSERT INTO `cat_modelos_unidades` VALUES (32, 'SCANIA K - 124', 1, NULL, NULL);
INSERT INTO `cat_modelos_unidades` VALUES (33, 'BUSSCAR 320', 0, NULL, NULL);
INSERT INTO `cat_modelos_unidades` VALUES (34, 'BUSSCAR 340', 1, NULL, NULL);
INSERT INTO `cat_modelos_unidades` VALUES (35, 'NAVISTAR1', 1, '2018-07-18 18:05:35', '2018-07-18 18:05:49');
INSERT INTO `cat_modelos_unidades` VALUES (36, 'MAYBATCH1', 1, '2018-07-26 17:35:28', '2018-07-26 17:35:37');
INSERT INTO `cat_modelos_unidades` VALUES (37, 'MAYBATCH1', 1, NULL, '2018-07-26 17:35:37');
INSERT INTO `cat_modelos_unidades` VALUES (38, 'MODELO 20181', 1, '2018-08-01 15:25:20', '2018-08-01 15:25:30');
INSERT INTO `cat_modelos_unidades` VALUES (39, 'MODELO 20181', 1, NULL, '2018-08-01 15:25:30');
INSERT INTO `cat_modelos_unidades` VALUES (40, 'MODELO 20191', 1, '2018-08-01 15:25:51', '2018-08-01 15:26:18');
INSERT INTO `cat_modelos_unidades` VALUES (41, 'MODELO 20191', 1, NULL, '2018-08-01 15:26:18');

-- ----------------------------
-- Table structure for cat_operadores
-- ----------------------------
DROP TABLE IF EXISTS `cat_operadores`;
CREATE TABLE `cat_operadores`  (
  `cat_operadores_id_operadores` int(11) NOT NULL AUTO_INCREMENT,
  `cat_operadores_nombre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cat_operadores_telefono` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cat_operadores_direccion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cat_operadores_id_zona` int(11) NULL DEFAULT NULL,
  `cat_operadores_status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cat_operadores_fecharegistro` datetime NULL DEFAULT NULL,
  `cat_operadores_fechaactualiza` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`cat_operadores_id_operadores`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of cat_operadores
-- ----------------------------
INSERT INTO `cat_operadores` VALUES (3, 'Nuevo Cliente 1', '6648082285', 'Direccion Conocida 1', 5, '1', '2018-06-19 21:28:12', NULL);
INSERT INTO `cat_operadores` VALUES (4, 'Nuevo Cliente 2', '6648082285', 'Nueva Dirección Conocida 2', 7, '1', '2018-06-19 21:28:41', NULL);
INSERT INTO `cat_operadores` VALUES (5, 'Nuevo Cliente 3', '6648082285', 'Dirección Conocida 3', 8, '1', '2018-06-19 21:29:20', NULL);
INSERT INTO `cat_operadores` VALUES (6, 'hkjh', 'kjhkjh', 'kjhkjh', 6, '1', '2018-06-26 03:06:25', NULL);
INSERT INTO `cat_operadores` VALUES (7, 'Otro', '865657', '765765675', 6, '1', '2018-07-18 15:54:08', '2018-07-18 17:39:04');
INSERT INTO `cat_operadores` VALUES (8, 'nuefd', '986986', 'fgf765', 6, '1', '2018-07-18 16:33:29', NULL);
INSERT INTO `cat_operadores` VALUES (9, 'HAZAEL PERAZA1', '6641047400', 'BLV. LAZARO CARDENAS 1501', 9, '1', '2018-07-18 18:17:21', '2018-07-18 18:17:30');
INSERT INTO `cat_operadores` VALUES (10, 'VENANCIO QUINTERO', '6641047400', 'BLV. LAZARO CARDENAS', 8, '1', '2018-07-26 17:29:10', NULL);
INSERT INTO `cat_operadores` VALUES (11, 'JESUS FLORES1', '6641047400', 'BLV. LAZARO CARDFENAS', 7, '1', '2018-08-01 15:30:55', '2018-08-01 15:31:01');
INSERT INTO `cat_operadores` VALUES (12, 'Juan Garcia', '667542342324', 'conocida', 6, '1', '2018-08-03 16:50:10', NULL);
INSERT INTO `cat_operadores` VALUES (13, 'Jose Carreon', '6648082285', 'Julios ters', 6, '1', '2018-08-03 16:59:14', NULL);
INSERT INTO `cat_operadores` VALUES (14, '123456asdqew', '6648081285', 'Concidicima', 12, '1', '2018-08-03 17:00:10', NULL);
INSERT INTO `cat_operadores` VALUES (15, '4444', '444', '444', 6, '1', '2018-08-03 17:00:36', NULL);
INSERT INTO `cat_operadores` VALUES (16, '12qwsa|', '6648082285', 'Concidicima', 7, '1', '2018-08-03 17:00:59', NULL);
INSERT INTO `cat_operadores` VALUES (17, 'juan aguirre', '6648082285', 'huoions', 6, '1', '2018-08-03 17:03:34', NULL);
INSERT INTO `cat_operadores` VALUES (18, 'Otro Operador', '664859263', 'Conicidicima', 14, '1', '2018-08-08 16:34:15', NULL);

-- ----------------------------
-- Table structure for cat_perfiles
-- ----------------------------
DROP TABLE IF EXISTS `cat_perfiles`;
CREATE TABLE `cat_perfiles`  (
  `id_perfiles` int(11) NOT NULL AUTO_INCREMENT,
  `cat_perfiles_nombre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cat_perfiles_nombre_clear` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cat_perfiles_permisos` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `cat_perfiles_status` tinyint(4) NULL DEFAULT NULL,
  PRIMARY KEY (`id_perfiles`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of cat_perfiles
-- ----------------------------
INSERT INTO `cat_perfiles` VALUES (11, 'Administrador', 'administrador', '[\"46-Sistema_padre\",\"46-Sistema_grabar\",\"46-Sistema_editar\",\"46-Sistema_borrar\",\"46-Sistema_otro\",\"46-Sistema_47-Usuarios_padre\",\"46-Sistema_47-Usuarios_grabar\",\"46-Sistema_47-Usuarios_editar\",\"46-Sistema_47-Usuarios_borrar\",\"46-Sistema_47-Usuarios_otro\",\"46-Sistema_49-Perfiles_padre\",\"46-Sistema_49-Perfiles_grabar\",\"46-Sistema_49-Perfiles_editar\",\"46-Sistema_49-Perfiles_borrar\",\"46-Sistema_49-Perfiles_otro\",\"46-Sistema_48-Permisos_padre\",\"46-Sistema_48-Permisos_grabar\",\"46-Sistema_48-Permisos_editar\",\"46-Sistema_48-Permisos_borrar\",\"46-Sistema_48-Permisos_otro\",\"168-Permisionario_padre\",\"168-Permisionario_grabar\",\"168-Permisionario_editar\",\"168-Permisionario_borrar\",\"168-Permisionario_otro\",\"168-Permisionario_169-Pagos_padre\",\"168-Permisionario_169-Pagos_grabar\",\"168-Permisionario_169-Pagos_editar\",\"168-Permisionario_169-Pagos_borrar\",\"168-Permisionario_169-Pagos_otro\",\"168-Permisionario_170-Vincular_padre\",\"168-Permisionario_170-Vincular_grabar\",\"168-Permisionario_170-Vincular_editar\",\"168-Permisionario_170-Vincular_borrar\",\"168-Permisionario_170-Vincular_otro\",\"171-Fianzas_padre\",\"171-Fianzas_grabar\",\"171-Fianzas_editar\",\"171-Fianzas_borrar\",\"171-Fianzas_otro\",\"171-Fianzas_173-Pagos Fianzas_padre\",\"171-Fianzas_173-Pagos Fianzas_grabar\",\"171-Fianzas_173-Pagos Fianzas_editar\",\"171-Fianzas_173-Pagos Fianzas_borrar\",\"171-Fianzas_173-Pagos Fianzas_otro\",\"171-Fianzas_172-Registro_padre\",\"171-Fianzas_172-Registro_grabar\",\"171-Fianzas_172-Registro_editar\",\"171-Fianzas_172-Registro_borrar\",\"171-Fianzas_172-Registro_otro\",\"174-Reportes_padre\",\"174-Reportes_grabar\",\"174-Reportes_editar\",\"174-Reportes_borrar\",\"174-Reportes_otro\",\"174-Reportes_175-Reportes Permisionarios_padre\",\"174-Reportes_175-Reportes Permisionarios_grabar\",\"174-Reportes_175-Reportes Permisionarios_editar\",\"174-Reportes_175-Reportes Permisionarios_borrar\",\"174-Reportes_175-Reportes Permisionarios_otro\",\"174-Reportes_176-Reportes Fianzas_padre\",\"174-Reportes_176-Reportes Fianzas_grabar\",\"174-Reportes_176-Reportes Fianzas_editar\",\"174-Reportes_176-Reportes Fianzas_borrar\",\"174-Reportes_176-Reportes Fianzas_otro\",\"145-Catalogo_padre\",\"145-Catalogo_grabar\",\"145-Catalogo_editar\",\"145-Catalogo_borrar\",\"145-Catalogo_otro\",\"145-Catalogo_157-Empresa_padre\",\"145-Catalogo_157-Empresa_grabar\",\"145-Catalogo_157-Empresa_editar\",\"145-Catalogo_157-Empresa_borrar\",\"145-Catalogo_157-Empresa_otro\",\"145-Catalogo_158-Almacen_padre\",\"145-Catalogo_158-Almacen_grabar\",\"145-Catalogo_158-Almacen_editar\",\"145-Catalogo_158-Almacen_borrar\",\"145-Catalogo_158-Almacen_otro\",\"145-Catalogo_163-Placas_padre\",\"145-Catalogo_163-Placas_grabar\",\"145-Catalogo_163-Placas_editar\",\"145-Catalogo_163-Placas_borrar\",\"145-Catalogo_163-Placas_otro\",\"145-Catalogo_164-Periodo Pago_padre\",\"145-Catalogo_164-Periodo Pago_grabar\",\"145-Catalogo_164-Periodo Pago_editar\",\"145-Catalogo_164-Periodo Pago_borrar\",\"145-Catalogo_164-Periodo Pago_otro\",\"145-Catalogo_165-Cobros_padre\",\"145-Catalogo_165-Cobros_grabar\",\"145-Catalogo_165-Cobros_editar\",\"145-Catalogo_165-Cobros_borrar\",\"145-Catalogo_165-Cobros_otro\",\"145-Catalogo_166-Status Fianzas_padre\",\"145-Catalogo_166-Status Fianzas_grabar\",\"145-Catalogo_166-Status Fianzas_editar\",\"145-Catalogo_166-Status Fianzas_borrar\",\"145-Catalogo_166-Status Fianzas_otro\",\"145-Catalogo_161-Permisionario_padre\",\"145-Catalogo_161-Permisionario_grabar\",\"145-Catalogo_161-Permisionario_editar\",\"145-Catalogo_161-Permisionario_borrar\",\"145-Catalogo_161-Permisionario_otro\",\"145-Catalogo_162-Operadores_padre\",\"145-Catalogo_162-Operadores_grabar\",\"145-Catalogo_162-Operadores_editar\",\"145-Catalogo_162-Operadores_borrar\",\"145-Catalogo_162-Operadores_otro\",\"145-Catalogo_160-Unidades_padre\",\"145-Catalogo_160-Unidades_grabar\",\"145-Catalogo_160-Unidades_editar\",\"145-Catalogo_160-Unidades_borrar\",\"145-Catalogo_160-Unidades_otro\",\"145-Catalogo_160-Unidades_150-Unidad_padre\",\"145-Catalogo_160-Unidades_150-Unidad_grabar\",\"145-Catalogo_160-Unidades_150-Unidad_editar\",\"145-Catalogo_160-Unidades_150-Unidad_borrar\",\"145-Catalogo_160-Unidades_150-Unidad_otro\",\"145-Catalogo_160-Unidades_153-Marca_padre\",\"145-Catalogo_160-Unidades_153-Marca_grabar\",\"145-Catalogo_160-Unidades_153-Marca_editar\",\"145-Catalogo_160-Unidades_153-Marca_borrar\",\"145-Catalogo_160-Unidades_153-Marca_otro\",\"145-Catalogo_160-Unidades_154-Modelo_padre\",\"145-Catalogo_160-Unidades_154-Modelo_grabar\",\"145-Catalogo_160-Unidades_154-Modelo_editar\",\"145-Catalogo_160-Unidades_154-Modelo_borrar\",\"145-Catalogo_160-Unidades_154-Modelo_otro\",\"145-Catalogo_160-Unidades_155-Servicio_padre\",\"145-Catalogo_160-Unidades_155-Servicio_grabar\",\"145-Catalogo_160-Unidades_155-Servicio_editar\",\"145-Catalogo_160-Unidades_155-Servicio_borrar\",\"145-Catalogo_160-Unidades_155-Servicio_otro\",\"145-Catalogo_160-Unidades_156-Rol_padre\",\"145-Catalogo_160-Unidades_156-Rol_grabar\",\"145-Catalogo_160-Unidades_156-Rol_editar\",\"145-Catalogo_160-Unidades_156-Rol_borrar\",\"145-Catalogo_160-Unidades_156-Rol_otro\",\"145-Catalogo_160-Unidades_159-Zona_padre\",\"145-Catalogo_160-Unidades_159-Zona_grabar\",\"145-Catalogo_160-Unidades_159-Zona_editar\",\"145-Catalogo_160-Unidades_159-Zona_borrar\",\"145-Catalogo_160-Unidades_159-Zona_otro\",\"145-Catalogo_160-Unidades_150-Unidad_grabar\",\"145-Catalogo_160-Unidades_150-Unidad_editar\",\"145-Catalogo_160-Unidades_150-Unidad_borrar\",\"145-Catalogo_160-Unidades_150-Unidad_otro\",\"145-Catalogo_160-Unidades_153-Marca_grabar\",\"145-Catalogo_160-Unidades_153-Marca_editar\",\"145-Catalogo_160-Unidades_153-Marca_borrar\",\"145-Catalogo_160-Unidades_153-Marca_otro\",\"145-Catalogo_160-Unidades_154-Modelo_grabar\",\"145-Catalogo_160-Unidades_154-Modelo_editar\",\"145-Catalogo_160-Unidades_154-Modelo_borrar\",\"145-Catalogo_160-Unidades_154-Modelo_otro\",\"145-Catalogo_160-Unidades_155-Servicio_grabar\",\"145-Catalogo_160-Unidades_155-Servicio_editar\",\"145-Catalogo_160-Unidades_155-Servicio_borrar\",\"145-Catalogo_160-Unidades_155-Servicio_otro\",\"145-Catalogo_160-Unidades_156-Rol_grabar\",\"145-Catalogo_160-Unidades_156-Rol_editar\",\"145-Catalogo_160-Unidades_156-Rol_borrar\",\"145-Catalogo_160-Unidades_156-Rol_otro\",\"145-Catalogo_160-Unidades_159-Zona_grabar\",\"145-Catalogo_160-Unidades_159-Zona_editar\",\"145-Catalogo_160-Unidades_159-Zona_borrar\",\"145-Catalogo_160-Unidades_159-Zona_otro\",\"145-Catalogo_160-Unidades_150-Unidad_grabar\",\"145-Catalogo_160-Unidades_150-Unidad_editar\",\"145-Catalogo_160-Unidades_150-Unidad_borrar\",\"145-Catalogo_160-Unidades_150-Unidad_otro\",\"145-Catalogo_160-Unidades_153-Marca_grabar\",\"145-Catalogo_160-Unidades_153-Marca_editar\",\"145-Catalogo_160-Unidades_153-Marca_borrar\",\"145-Catalogo_160-Unidades_153-Marca_otro\",\"145-Catalogo_160-Unidades_154-Modelo_grabar\",\"145-Catalogo_160-Unidades_154-Modelo_editar\",\"145-Catalogo_160-Unidades_154-Modelo_borrar\",\"145-Catalogo_160-Unidades_154-Modelo_otro\",\"145-Catalogo_160-Unidades_155-Servicio_grabar\",\"145-Catalogo_160-Unidades_155-Servicio_editar\",\"145-Catalogo_160-Unidades_155-Servicio_borrar\",\"145-Catalogo_160-Unidades_155-Servicio_otro\",\"145-Catalogo_160-Unidades_156-Rol_grabar\",\"145-Catalogo_160-Unidades_156-Rol_editar\",\"145-Catalogo_160-Unidades_156-Rol_borrar\",\"145-Catalogo_160-Unidades_156-Rol_otro\",\"145-Catalogo_160-Unidades_159-Zona_grabar\",\"145-Catalogo_160-Unidades_159-Zona_editar\",\"145-Catalogo_160-Unidades_159-Zona_borrar\",\"145-Catalogo_160-Unidades_159-Zona_otro\",\"145-Catalogo_160-Unidades_150-Unidad_grabar\",\"145-Catalogo_160-Unidades_150-Unidad_editar\",\"145-Catalogo_160-Unidades_150-Unidad_borrar\",\"145-Catalogo_160-Unidades_150-Unidad_otro\",\"145-Catalogo_160-Unidades_153-Marca_grabar\",\"145-Catalogo_160-Unidades_153-Marca_editar\",\"145-Catalogo_160-Unidades_153-Marca_borrar\",\"145-Catalogo_160-Unidades_153-Marca_otro\",\"145-Catalogo_160-Unidades_154-Modelo_grabar\",\"145-Catalogo_160-Unidades_154-Modelo_editar\",\"145-Catalogo_160-Unidades_154-Modelo_borrar\",\"145-Catalogo_160-Unidades_154-Modelo_otro\",\"145-Catalogo_160-Unidades_155-Servicio_grabar\",\"145-Catalogo_160-Unidades_155-Servicio_editar\",\"145-Catalogo_160-Unidades_155-Servicio_borrar\",\"145-Catalogo_160-Unidades_155-Servicio_otro\",\"145-Catalogo_160-Unidades_156-Rol_grabar\",\"145-Catalogo_160-Unidades_156-Rol_editar\",\"145-Catalogo_160-Unidades_156-Rol_borrar\",\"145-Catalogo_160-Unidades_156-Rol_otro\",\"145-Catalogo_160-Unidades_159-Zona_grabar\",\"145-Catalogo_160-Unidades_159-Zona_editar\",\"145-Catalogo_160-Unidades_159-Zona_borrar\",\"145-Catalogo_160-Unidades_159-Zona_otro\",\"145-Catalogo_160-Unidades_150-Unidad_grabar\",\"145-Catalogo_160-Unidades_150-Unidad_editar\",\"145-Catalogo_160-Unidades_150-Unidad_borrar\",\"145-Catalogo_160-Unidades_150-Unidad_otro\",\"145-Catalogo_160-Unidades_153-Marca_grabar\",\"145-Catalogo_160-Unidades_153-Marca_editar\",\"145-Catalogo_160-Unidades_153-Marca_borrar\",\"145-Catalogo_160-Unidades_153-Marca_otro\",\"145-Catalogo_160-Unidades_154-Modelo_grabar\",\"145-Catalogo_160-Unidades_154-Modelo_editar\",\"145-Catalogo_160-Unidades_154-Modelo_borrar\",\"145-Catalogo_160-Unidades_154-Modelo_otro\",\"145-Catalogo_160-Unidades_155-Servicio_grabar\",\"145-Catalogo_160-Unidades_155-Servicio_editar\",\"145-Catalogo_160-Unidades_155-Servicio_borrar\",\"145-Catalogo_160-Unidades_155-Servicio_otro\",\"145-Catalogo_160-Unidades_156-Rol_grabar\",\"145-Catalogo_160-Unidades_156-Rol_editar\",\"145-Catalogo_160-Unidades_156-Rol_borrar\",\"145-Catalogo_160-Unidades_156-Rol_otro\",\"145-Catalogo_160-Unidades_159-Zona_grabar\",\"145-Catalogo_160-Unidades_159-Zona_editar\",\"145-Catalogo_160-Unidades_159-Zona_borrar\",\"145-Catalogo_160-Unidades_159-Zona_otro\",\"145-Catalogo_160-Unidades_150-Unidad_grabar\",\"145-Catalogo_160-Unidades_150-Unidad_editar\",\"145-Catalogo_160-Unidades_150-Unidad_borrar\",\"145-Catalogo_160-Unidades_150-Unidad_otro\",\"145-Catalogo_160-Unidades_153-Marca_grabar\",\"145-Catalogo_160-Unidades_153-Marca_editar\",\"145-Catalogo_160-Unidades_153-Marca_borrar\",\"145-Catalogo_160-Unidades_153-Marca_otro\",\"145-Catalogo_160-Unidades_154-Modelo_grabar\",\"145-Catalogo_160-Unidades_154-Modelo_editar\",\"145-Catalogo_160-Unidades_154-Modelo_borrar\",\"145-Catalogo_160-Unidades_154-Modelo_otro\",\"145-Catalogo_160-Unidades_155-Servicio_grabar\",\"145-Catalogo_160-Unidades_155-Servicio_editar\",\"145-Catalogo_160-Unidades_155-Servicio_borrar\",\"145-Catalogo_160-Unidades_155-Servicio_otro\",\"145-Catalogo_160-Unidades_156-Rol_grabar\",\"145-Catalogo_160-Unidades_156-Rol_editar\",\"145-Catalogo_160-Unidades_156-Rol_borrar\",\"145-Catalogo_160-Unidades_156-Rol_otro\",\"145-Catalogo_160-Unidades_159-Zona_grabar\",\"145-Catalogo_160-Unidades_159-Zona_editar\",\"145-Catalogo_160-Unidades_159-Zona_borrar\",\"145-Catalogo_160-Unidades_159-Zona_otro\"]', 1);
INSERT INTO `cat_perfiles` VALUES (16, 'Nuevo Perfil', 'nuevo-perfil', '[\"46-Sistema_padre\",\"46-Sistema_grabar\",\"46-Sistema_editar\",\"46-Sistema_borrar\",\"46-Sistema_otro\",\"46-Sistema_47-Usuarios_padre\",\"46-Sistema_47-Usuarios_grabar\",\"46-Sistema_47-Usuarios_editar\",\"46-Sistema_47-Usuarios_borrar\",\"46-Sistema_47-Usuarios_otro\",\"46-Sistema_49-Perfiles_padre\",\"46-Sistema_49-Perfiles_grabar\",\"46-Sistema_49-Perfiles_editar\",\"46-Sistema_49-Perfiles_borrar\",\"46-Sistema_49-Perfiles_otro\",\"46-Sistema_48-Permisos_padre\",\"46-Sistema_48-Permisos_grabar\",\"46-Sistema_48-Permisos_editar\",\"46-Sistema_48-Permisos_borrar\",\"46-Sistema_48-Permisos_otro\",\"168-Permisionario_padre\",\"168-Permisionario_grabar\",\"168-Permisionario_editar\",\"168-Permisionario_borrar\",\"168-Permisionario_otro\",\"168-Permisionario_169-Pagos_padre\",\"168-Permisionario_169-Pagos_grabar\",\"168-Permisionario_169-Pagos_editar\",\"168-Permisionario_169-Pagos_borrar\",\"168-Permisionario_169-Pagos_otro\",\"168-Permisionario_170-Vincular_padre\",\"168-Permisionario_170-Vincular_grabar\",\"168-Permisionario_170-Vincular_editar\",\"168-Permisionario_170-Vincular_borrar\",\"168-Permisionario_170-Vincular_otro\",\"171-Fianzas_padre\",\"171-Fianzas_grabar\",\"171-Fianzas_editar\",\"171-Fianzas_borrar\",\"171-Fianzas_otro\",\"171-Fianzas_173-Pagos Fianzas_padre\",\"171-Fianzas_173-Pagos Fianzas_grabar\",\"171-Fianzas_173-Pagos Fianzas_editar\",\"171-Fianzas_173-Pagos Fianzas_borrar\",\"171-Fianzas_173-Pagos Fianzas_otro\",\"171-Fianzas_172-Registro_padre\",\"171-Fianzas_172-Registro_grabar\",\"171-Fianzas_172-Registro_editar\",\"171-Fianzas_172-Registro_borrar\",\"171-Fianzas_172-Registro_otro\",\"174-Reportes_padre\",\"174-Reportes_grabar\",\"174-Reportes_editar\",\"174-Reportes_borrar\",\"174-Reportes_otro\",\"174-Reportes_175-Reportes Permisionarios_padre\",\"174-Reportes_175-Reportes Permisionarios_grabar\",\"174-Reportes_175-Reportes Permisionarios_editar\",\"174-Reportes_175-Reportes Permisionarios_borrar\",\"174-Reportes_175-Reportes Permisionarios_otro\",\"174-Reportes_176-Reportes Fianzas_padre\",\"174-Reportes_176-Reportes Fianzas_grabar\",\"174-Reportes_176-Reportes Fianzas_editar\",\"174-Reportes_176-Reportes Fianzas_borrar\",\"174-Reportes_176-Reportes Fianzas_otro\"]', 1);

-- ----------------------------
-- Table structure for cat_periodopago
-- ----------------------------
DROP TABLE IF EXISTS `cat_periodopago`;
CREATE TABLE `cat_periodopago`  (
  `cat_periodopago_id_periodopago` int(11) NOT NULL AUTO_INCREMENT,
  `cat_periodopago_nombre` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cat_periodopago_periodo` double NULL DEFAULT NULL COMMENT 'Dia de pago cada mes',
  `cat_periodopago_fechainicio` datetime NULL DEFAULT NULL,
  `cat_periodopago_status` tinyint(4) NULL DEFAULT NULL,
  `cat_periodopago_diascondonados` int(11) NULL DEFAULT NULL,
  `cat_periodopago_fecharegistro` datetime NULL DEFAULT NULL,
  `cat_periodopago_fechaactualiza` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`cat_periodopago_id_periodopago`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of cat_periodopago
-- ----------------------------
INSERT INTO `cat_periodopago` VALUES (7, 'Quincenal', 0.5, '2018-06-06 00:00:00', 1, 6, '2018-06-21 15:10:36', '2018-08-08 17:57:30');
INSERT INTO `cat_periodopago` VALUES (8, 'Mensual', 1, '2018-06-28 00:00:00', 1, 5, '2018-06-21 15:11:19', '2018-07-19 12:12:47');
INSERT INTO `cat_periodopago` VALUES (9, 'Diario', 0.033333, '2018-06-19 00:00:00', 1, -1, '2018-06-21 15:12:01', '2018-08-01 16:22:31');
INSERT INTO `cat_periodopago` VALUES (10, 'BIMESTRAL', 2, '2018-07-01 00:00:00', 1, 5, '2018-07-18 18:21:27', '2018-08-01 16:25:28');
INSERT INTO `cat_periodopago` VALUES (11, 'SEMESTRAL', 6, '2017-03-01 00:00:00', 1, 10, '2018-07-19 17:05:53', NULL);
INSERT INTO `cat_periodopago` VALUES (12, 'ANUAL1', 12, '2018-07-01 00:00:00', 1, 2, '2018-07-26 17:21:59', '2018-07-26 17:22:24');
INSERT INTO `cat_periodopago` VALUES (13, 'ejemplo1', 8, '2018-08-01 00:00:00', 1, 5, '2018-08-01 15:08:47', '2018-08-01 15:10:22');
INSERT INTO `cat_periodopago` VALUES (14, 'otro', 5, '2018-08-01 00:00:00', 1, 3, '2018-08-01 16:11:20', NULL);

-- ----------------------------
-- Table structure for cat_permisionario
-- ----------------------------
DROP TABLE IF EXISTS `cat_permisionario`;
CREATE TABLE `cat_permisionario`  (
  `cat_permisionario_id_permisionario` int(11) NOT NULL AUTO_INCREMENT,
  `cat_permisionario_nombre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cat_permisionario_telefono` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cat_permisionario_direccion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cat_permisionario_status` tinyint(4) NULL DEFAULT NULL,
  `cat_permisionario_fecharegistro` datetime NULL DEFAULT NULL,
  `cat_permisionario_fechaactualiza` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`cat_permisionario_id_permisionario`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of cat_permisionario
-- ----------------------------
INSERT INTO `cat_permisionario` VALUES (1, 'Jose Venancio', '6648082285', 'conocida', 1, '2018-06-19 14:23:37', '2018-06-19 14:23:37');
INSERT INTO `cat_permisionario` VALUES (9, 'Juan Manuel Garcia Amescua', '6648082285', 'Dirección Conocida, de Prueba', 1, '2018-06-19 21:07:31', NULL);
INSERT INTO `cat_permisionario` VALUES (10, 'Otro Permisionario', '6648082285', 'Conocida, otra dirección conocida.', 1, '2018-06-19 21:13:02', NULL);
INSERT INTO `cat_permisionario` VALUES (11, 'Nuevo Permisionario', '6648082285', 'Conocidicima', 1, '2018-06-19 23:24:01', NULL);
INSERT INTO `cat_permisionario` VALUES (12, 'ELSA SARA MATIAS', '6641047400', 'BLV LAZARO CARDENAS', 1, '2018-10-01 01:48:54', '2018-07-26 17:26:35');
INSERT INTO `cat_permisionario` VALUES (13, 'Antonio Dominguez', '6641234567', 'Conocidicima', 1, '2018-07-17 00:49:58', NULL);
INSERT INTO `cat_permisionario` VALUES (14, 'Jose Amescua', '664345678', 'juan anguiano', 1, '2018-07-16 16:18:04', NULL);
INSERT INTO `cat_permisionario` VALUES (15, 'Otro Señor Permisionario', '6648082285', 'Conicidicima', 1, '2018-07-18 11:18:35', NULL);
INSERT INTO `cat_permisionario` VALUES (16, 'VENANCIO QUINTERO', '6641047400', 'BLV. LAZARO CARDENAS 1501', 1, '2018-07-18 18:34:05', '2018-07-18 18:34:23');
INSERT INTO `cat_permisionario` VALUES (17, 'Permisionario 23', '6648082285', 'Entre', 1, '2018-07-19 09:34:00', NULL);
INSERT INTO `cat_permisionario` VALUES (18, 'HAZAEL PERAZA HERNANDEZ', '6640147589', 'BLV LAZARO CARDENAS', 1, '2018-07-26 17:27:04', '2018-07-26 17:28:19');
INSERT INTO `cat_permisionario` VALUES (19, 'jesus flores bojorquez1', '6641047400', 'BLV LAZARO CARDENAS', 1, '2018-08-01 15:17:15', '2018-08-01 15:17:59');
INSERT INTO `cat_permisionario` VALUES (20, 'Nuevo Permisionario 2', '66480285963', 'Conocidicima', 1, '2018-08-08 15:47:30', NULL);
INSERT INTO `cat_permisionario` VALUES (21, 'Jose Venancio Segundo', '661234586', 'Conocidicima', 1, '2018-08-08 15:50:54', NULL);
INSERT INTO `cat_permisionario` VALUES (22, 'Jose Antonio Garcia', '664875962', 'Conocidicimo', 1, '2018-08-08 15:53:10', NULL);
INSERT INTO `cat_permisionario` VALUES (23, '2154', '54545454', '545454545454', 1, '2018-08-08 16:27:12', NULL);

-- ----------------------------
-- Table structure for cat_permisos
-- ----------------------------
DROP TABLE IF EXISTS `cat_permisos`;
CREATE TABLE `cat_permisos`  (
  `cat_permisos_id_cat_permisos` int(11) NOT NULL AUTO_INCREMENT,
  `cat_permisos_nombre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cat_permisos_nombre_limpio` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`cat_permisos_id_cat_permisos`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of cat_permisos
-- ----------------------------
INSERT INTO `cat_permisos` VALUES (1, 'Modúlo', 'modulo');
INSERT INTO `cat_permisos` VALUES (2, 'Catálogo', 'catalogo');
INSERT INTO `cat_permisos` VALUES (3, 'Acción Grabar', 'accion_grabar');
INSERT INTO `cat_permisos` VALUES (4, 'Acción Actualizar', 'accion_actualizar');
INSERT INTO `cat_permisos` VALUES (5, 'Acción Borrar', 'accion_borrar');
INSERT INTO `cat_permisos` VALUES (6, 'Reportes', 'reportes');
INSERT INTO `cat_permisos` VALUES (7, 'Configuración', 'configuracion');

-- ----------------------------
-- Table structure for cat_placas_unidades
-- ----------------------------
DROP TABLE IF EXISTS `cat_placas_unidades`;
CREATE TABLE `cat_placas_unidades`  (
  `cat_placas_id_placas` int(11) NOT NULL AUTO_INCREMENT,
  `cat_placas_numero` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cat_placas_id_periodopago` int(11) NULL DEFAULT NULL,
  `cat_placas_id_base` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cat_placas_status` tinyint(4) NULL DEFAULT NULL,
  `cat_placas_fecharegistro` datetime NULL DEFAULT NULL,
  `cat_placas_fechaactualiza` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`cat_placas_id_placas`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of cat_placas_unidades
-- ----------------------------
INSERT INTO `cat_placas_unidades` VALUES (4, 'placas345', 10, NULL, 1, '2018-06-19 23:06:37', '2018-07-26 17:16:59');
INSERT INTO `cat_placas_unidades` VALUES (5, 'placaej', 10, NULL, 1, '2018-06-19 23:06:47', '2018-07-26 17:19:17');
INSERT INTO `cat_placas_unidades` VALUES (6, 'CXZ123', 8, NULL, 1, '2018-06-19 23:07:00', NULL);
INSERT INTO `cat_placas_unidades` VALUES (7, '963258741', 10, NULL, 1, '2018-06-19 23:07:16', '2018-07-26 17:10:52');
INSERT INTO `cat_placas_unidades` VALUES (8, 'plasac', 10, NULL, 1, '2018-07-26 17:09:57', '2018-07-26 17:11:49');
INSERT INTO `cat_placas_unidades` VALUES (9, 'plcasejemplo', 10, NULL, 1, '2018-07-26 17:18:27', NULL);
INSERT INTO `cat_placas_unidades` VALUES (10, '85496321', 8, NULL, 1, '2018-08-01 15:02:55', NULL);
INSERT INTO `cat_placas_unidades` VALUES (11, 'sss12333', NULL, NULL, 1, '2018-08-03 14:38:21', '2018-08-03 14:38:31');
INSERT INTO `cat_placas_unidades` VALUES (12, 'Nueva placa', NULL, NULL, 1, '2018-08-08 16:34:29', NULL);

-- ----------------------------
-- Table structure for cat_rol_unidades
-- ----------------------------
DROP TABLE IF EXISTS `cat_rol_unidades`;
CREATE TABLE `cat_rol_unidades`  (
  `cat_rol_unidades_id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `cat_rol_unidades_nombre` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cat_rol_unidades_status` int(11) NOT NULL,
  `cat_rol_unidades_fecharegistro` datetime NULL DEFAULT NULL,
  `cat_rol_unidades_fechaactualiza` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`cat_rol_unidades_id_rol`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 41 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of cat_rol_unidades
-- ----------------------------
INSERT INTO `cat_rol_unidades` VALUES (14, 'Villa Fontana', 1, '2018-06-13 13:01:21', '2018-06-13 13:01:21');
INSERT INTO `cat_rol_unidades` VALUES (15, 'Casas Beta', 1, '2018-06-13 13:01:38', '2018-07-30 15:57:04');
INSERT INTO `cat_rol_unidades` VALUES (16, 'Homex', 1, NULL, '2018-07-31 09:07:08');
INSERT INTO `cat_rol_unidades` VALUES (17, 'Casas Geo', 1, NULL, NULL);
INSERT INTO `cat_rol_unidades` VALUES (18, 'Presidentes', 1, NULL, NULL);
INSERT INTO `cat_rol_unidades` VALUES (19, 'Morita', 1, NULL, NULL);
INSERT INTO `cat_rol_unidades` VALUES (20, 'Natura', 1, NULL, NULL);
INSERT INTO `cat_rol_unidades` VALUES (21, 'VALLE DE LAS PALMAS', 1, NULL, NULL);
INSERT INTO `cat_rol_unidades` VALUES (22, 'PENÍNSULA 100', 1, NULL, NULL);
INSERT INTO `cat_rol_unidades` VALUES (23, 'ABC 204', 1, NULL, NULL);
INSERT INTO `cat_rol_unidades` VALUES (24, 'MXL Urbano', 1, NULL, NULL);
INSERT INTO `cat_rol_unidades` VALUES (25, 'MEXICOACH 550', 1, NULL, NULL);
INSERT INTO `cat_rol_unidades` VALUES (26, 'MEXICOACH', 1, NULL, NULL);
INSERT INTO `cat_rol_unidades` VALUES (27, 'LOS AMARILLOS', 1, NULL, NULL);
INSERT INTO `cat_rol_unidades` VALUES (28, 'EL HONGO', 1, NULL, NULL);
INSERT INTO `cat_rol_unidades` VALUES (29, 'SUBURBAJA', 1, NULL, NULL);
INSERT INTO `cat_rol_unidades` VALUES (30, 'ABC 301', 1, NULL, NULL);
INSERT INTO `cat_rol_unidades` VALUES (31, 'ECO BAJA TOAURS 209', 1, NULL, NULL);
INSERT INTO `cat_rol_unidades` VALUES (32, 'VILLAS DEL CAMPO', 1, NULL, NULL);
INSERT INTO `cat_rol_unidades` VALUES (33, 'RUTA DEL VINO', 1, NULL, NULL);
INSERT INTO `cat_rol_unidades` VALUES (34, 'ABC PLUS   200', 1, NULL, NULL);
INSERT INTO `cat_rol_unidades` VALUES (35, 'ABC 202', 1, NULL, NULL);
INSERT INTO `cat_rol_unidades` VALUES (36, 'ABC PLUS   201', 1, NULL, NULL);
INSERT INTO `cat_rol_unidades` VALUES (37, 'LAZARO CARDENAS', 1, '2018-07-18 18:09:17', '2018-07-18 18:11:54');
INSERT INTO `cat_rol_unidades` VALUES (38, 'OTAY MODULOS', 1, '2018-07-26 17:38:26', '2018-07-26 17:38:38');
INSERT INTO `cat_rol_unidades` VALUES (39, 'sdasd1', 1, '2018-07-31 09:07:21', '2018-08-01 15:29:18');
INSERT INTO `cat_rol_unidades` VALUES (40, 'ROL1', 1, '2018-08-01 15:28:40', '2018-08-01 15:28:49');

-- ----------------------------
-- Table structure for cat_servicio_unidades
-- ----------------------------
DROP TABLE IF EXISTS `cat_servicio_unidades`;
CREATE TABLE `cat_servicio_unidades`  (
  `cat_servicio_unidades_id_servicio` int(11) NOT NULL AUTO_INCREMENT,
  `cat_servicio_unidades_nombre` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cat_servicio_unidades_status` tinyint(11) NULL DEFAULT NULL,
  `cat_servicio_unidades_fecharegistro` datetime NULL DEFAULT NULL,
  `cat_servicio_unidades_fechaactualiza` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`cat_servicio_unidades_id_servicio`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of cat_servicio_unidades
-- ----------------------------
INSERT INTO `cat_servicio_unidades` VALUES (13, 'Urbano', 1, '2018-06-13 12:49:22', '2018-06-13 12:49:22');
INSERT INTO `cat_servicio_unidades` VALUES (14, 'Suburbano', 1, '2018-06-13 12:49:52', '2018-06-13 21:49:52');
INSERT INTO `cat_servicio_unidades` VALUES (15, 'Ejecutivo', 1, '2018-06-13 12:43:09', '2018-06-13 12:43:09');
INSERT INTO `cat_servicio_unidades` VALUES (16, 'Plus', 1, '2018-06-13 12:49:15', '2018-06-13 12:49:15');
INSERT INTO `cat_servicio_unidades` VALUES (17, 'Primera', 1, NULL, NULL);
INSERT INTO `cat_servicio_unidades` VALUES (18, 'Shuttle', 0, NULL, NULL);
INSERT INTO `cat_servicio_unidades` VALUES (19, 'EJEMPLO1', 0, '2018-07-18 18:07:31', '2018-07-18 18:07:48');
INSERT INTO `cat_servicio_unidades` VALUES (20, 'SERV EJEMPLO1', 1, '2018-07-26 17:37:53', '2018-07-26 17:38:05');
INSERT INTO `cat_servicio_unidades` VALUES (21, 'EJEMPLO1', 1, '2018-08-01 15:27:22', '2018-08-01 15:28:16');

-- ----------------------------
-- Table structure for cat_statusfianzas
-- ----------------------------
DROP TABLE IF EXISTS `cat_statusfianzas`;
CREATE TABLE `cat_statusfianzas`  (
  `cat_statusfianzas_id_statusfianzas` int(11) NOT NULL AUTO_INCREMENT,
  `cat_statusfianzas_nombre` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cat_statusfianzas_status` tinyint(4) NULL DEFAULT NULL,
  `cat_statusfianzas_fecharegistro` datetime NULL DEFAULT NULL,
  `cat_statusfianzas_fechaactualiza` datetime NULL DEFAULT NULL,
  `cat_statusfianzas_llave` tinyint(4) NULL DEFAULT NULL,
  PRIMARY KEY (`cat_statusfianzas_id_statusfianzas`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of cat_statusfianzas
-- ----------------------------
INSERT INTO `cat_statusfianzas` VALUES (3, 'ELIMINADO', 1, '2018-06-19 23:21:17', '2018-07-26 17:25:30', 1);
INSERT INTO `cat_statusfianzas` VALUES (4, 'EJEMPLO', 1, '2018-06-19 23:21:29', '2018-07-26 17:25:52', 0);
INSERT INTO `cat_statusfianzas` VALUES (5, 'Oculto', 1, '2018-06-19 23:21:37', NULL, 0);
INSERT INTO `cat_statusfianzas` VALUES (6, 'EJEMPLO1', 1, '2018-07-18 18:30:43', '2018-07-18 18:31:24', 0);
INSERT INTO `cat_statusfianzas` VALUES (7, 'ejemplo2_1', 1, '2018-08-01 15:16:22', '2018-08-01 15:16:38', NULL);

-- ----------------------------
-- Table structure for cat_unidades
-- ----------------------------
DROP TABLE IF EXISTS `cat_unidades`;
CREATE TABLE `cat_unidades`  (
  `cat_unidades_id_unidad` int(11) NOT NULL AUTO_INCREMENT,
  `cat_unidades_numeconomico` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cat_unidades_id_marca` int(11) NULL DEFAULT NULL,
  `cat_unidades_id_modelo` int(11) NULL DEFAULT NULL,
  `cat_unidades_id_servicio` int(11) NULL DEFAULT NULL,
  `cat_unidades_id_rol` int(11) NULL DEFAULT NULL,
  `cat_unidades_ano` int(11) NULL DEFAULT NULL,
  `cat_unidades_id_placas` int(255) NULL DEFAULT NULL,
  `cat_unidades_id_empresa` int(11) NULL DEFAULT NULL,
  `cat_unidades_id_zona` int(11) NULL DEFAULT NULL,
  `cat_unidades_id_almacen` int(11) NULL DEFAULT NULL,
  `cat_unidades_fechaactualizada` datetime NULL DEFAULT NULL,
  `cat_unidades_fecharegistro` datetime NULL DEFAULT NULL,
  `cat_unidades_status` tinyint(11) NULL DEFAULT NULL,
  PRIMARY KEY (`cat_unidades_id_unidad`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of cat_unidades
-- ----------------------------
INSERT INTO `cat_unidades` VALUES (8, '1002', 6, 12, 13, 14, 1978, 8, 13, 5, 5, '2018-08-03 13:44:42', '2018-06-20 02:26:54', 1);
INSERT INTO `cat_unidades` VALUES (9, '1003', 7, 13, 14, 15, 1999, 5, 17, 5, 5, '2018-07-18 18:16:35', '2018-06-20 02:27:26', 1);
INSERT INTO `cat_unidades` VALUES (10, '10002', 6, 12, 13, 14, 1997, 6, 13, 5, 5, NULL, '2018-07-17 00:55:41', 1);
INSERT INTO `cat_unidades` VALUES (11, 'V014', 17, 35, 14, 16, 2017, 7, 18, 9, 9, '2018-07-31 16:54:23', '2018-07-18 18:14:58', 1);
INSERT INTO `cat_unidades` VALUES (12, '4057', 9, 16, 14, 15, 2018, 8, 14, 8, 9, NULL, '2018-08-01 15:20:25', 1);
INSERT INTO `cat_unidades` VALUES (13, '10023', 7, 13, 14, 15, 12334, 5, 15, 6, 6, NULL, '2018-08-02 18:40:25', 1);
INSERT INTO `cat_unidades` VALUES (14, '10022', 19, 40, 20, 38, 1978, NULL, 19, 15, 20, NULL, '2018-08-08 16:22:46', 1);
INSERT INTO `cat_unidades` VALUES (15, '100226', 19, 40, 21, 39, 1852, NULL, 17, 15, 20, NULL, '2018-08-08 16:26:20', 1);

-- ----------------------------
-- Table structure for cat_vincularfianza
-- ----------------------------
DROP TABLE IF EXISTS `cat_vincularfianza`;
CREATE TABLE `cat_vincularfianza`  (
  `cat_vincularfianza_id_vincularfianza` int(11) NOT NULL AUTO_INCREMENT,
  `cat_vincularfianza_noconvenio` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cat_vincularfianza_id_status` tinyint(4) NULL DEFAULT NULL,
  `cat_vincularfianza_montopactado` float NULL DEFAULT NULL,
  `cat_vincularfianza_fecha` datetime NULL DEFAULT NULL,
  `cat_vincularfianza_id_operadores` int(200) NULL DEFAULT NULL,
  `cat_vincularfianza_nombreafectado` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cat_vincularfianza_evidencia` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `cat_vincularfianza_status` tinyint(4) NULL DEFAULT NULL,
  `cat_vincularfianza_fecharegistro` datetime NULL DEFAULT NULL,
  `cat_vincularfianza_fechaactualiza` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`cat_vincularfianza_id_vincularfianza`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of cat_vincularfianza
-- ----------------------------
INSERT INTO `cat_vincularfianza` VALUES (12, 'AQW123', 5, 3000, '2018-06-04 00:00:00', 4, 'JUAN ANTONIOxxxxx', '', 1, '2018-06-26 11:05:50', '2018-07-17 18:21:38');
INSERT INTO `cat_vincularfianza` VALUES (13, 'gtfrdeswaq12', 3, 40000, '2018-06-05 00:00:00', 3, 'Antonio Amescua Robres', '', 1, '2018-06-26 11:06:42', '2018-07-13 02:35:41');
INSERT INTO `cat_vincularfianza` VALUES (14, 'DESWQ', 3, 2000, '2018-07-10 00:00:00', 4, 'ANTONIO DOMINGUEZ', '', 1, '2018-07-07 02:43:54', '2018-07-18 16:33:02');

-- ----------------------------
-- Table structure for cat_vincularpermisionario
-- ----------------------------
DROP TABLE IF EXISTS `cat_vincularpermisionario`;
CREATE TABLE `cat_vincularpermisionario`  (
  `cat_vincularpermisionario_id_vincularpermisionario` int(255) NOT NULL AUTO_INCREMENT,
  `cat_vincularpermisionario_id_permisionario` int(255) NULL DEFAULT NULL,
  `cat_vincularpermisionario_id_unidad` int(255) NULL DEFAULT NULL,
  `cat_vincularpermisionario_id_operadores` int(255) NULL DEFAULT NULL,
  `cat_vincularpermisionario_id_placa` int(11) NULL DEFAULT NULL,
  `cat_vincularpermisionario_id_periodopago` int(11) NULL DEFAULT NULL,
  `cat_vincularpermisionario_id_cobros` int(11) NULL DEFAULT NULL,
  `cat_vincularpermisionario_status` tinyint(4) NULL DEFAULT NULL,
  `cat_vincularpermisionario_fechainicio` datetime NULL DEFAULT NULL,
  `cat_vincularpermisionario_fecharegistro` datetime NULL DEFAULT NULL,
  `cat_vincularpermisionario_fechaactualiza` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`cat_vincularpermisionario_id_vincularpermisionario`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of cat_vincularpermisionario
-- ----------------------------
INSERT INTO `cat_vincularpermisionario` VALUES (33, 21, 9, 12, 4, 7, 3, 0, NULL, '2018-08-08 17:41:39', '2018-08-08 17:42:21');
INSERT INTO `cat_vincularpermisionario` VALUES (34, 14, 8, 12, 5, 7, 4, 1, '2018-08-09 00:00:00', '2018-08-08 17:44:16', NULL);
INSERT INTO `cat_vincularpermisionario` VALUES (35, 14, 8, 4, 4, 7, 4, 1, '2018-07-01 00:00:00', '2018-08-08 17:45:59', '2018-08-08 17:49:53');

-- ----------------------------
-- Table structure for cat_zonas_unidades
-- ----------------------------
DROP TABLE IF EXISTS `cat_zonas_unidades`;
CREATE TABLE `cat_zonas_unidades`  (
  `cat_zonas_unidades_id_zona` int(11) NOT NULL AUTO_INCREMENT,
  `cat_zonas_unidades_nombre` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cat_zonas_unidades_pivote` tinyint(4) NULL DEFAULT -1,
  `cat_zonas_unidades_status` tinyint(11) NULL DEFAULT NULL,
  `cat_zonas_unidades_fecharegistro` datetime NULL DEFAULT NULL,
  `cat_zonas_unidades_fechaactualiza` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`cat_zonas_unidades_id_zona`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of cat_zonas_unidades
-- ----------------------------
INSERT INTO `cat_zonas_unidades` VALUES (5, 'Blvd AC', -1, 1, NULL, NULL);
INSERT INTO `cat_zonas_unidades` VALUES (6, 'Fuera', -1, 1, NULL, NULL);
INSERT INTO `cat_zonas_unidades` VALUES (7, 'Homex', -1, 1, NULL, '2018-07-30 16:40:15');
INSERT INTO `cat_zonas_unidades` VALUES (8, 'Presidentes', -1, 1, NULL, NULL);
INSERT INTO `cat_zonas_unidades` VALUES (9, 'Tijuana', 1, 1, NULL, NULL);
INSERT INTO `cat_zonas_unidades` VALUES (10, 'Tecate', -1, 1, NULL, NULL);
INSERT INTO `cat_zonas_unidades` VALUES (11, 'Mexicali', -1, 1, NULL, NULL);
INSERT INTO `cat_zonas_unidades` VALUES (12, 'Ensenada', -1, 1, NULL, NULL);
INSERT INTO `cat_zonas_unidades` VALUES (13, 'General (Todas)', -1, 1, NULL, NULL);
INSERT INTO `cat_zonas_unidades` VALUES (14, 'Verde y Crema VyC', -1, 1, NULL, NULL);
INSERT INTO `cat_zonas_unidades` VALUES (15, 'TIJUANA BCN1', -1, 1, '2018-07-26 17:39:00', '2018-07-26 17:39:07');
INSERT INTO `cat_zonas_unidades` VALUES (16, 'AGUACALIENTE1', -1, 1, '2018-08-01 15:29:37', '2018-08-01 15:29:43');

-- ----------------------------
-- Table structure for reg_movimientos
-- ----------------------------
DROP TABLE IF EXISTS `reg_movimientos`;
CREATE TABLE `reg_movimientos`  (
  `reg_movimientos_id_movimiento` int(11) NOT NULL AUTO_INCREMENT,
  `reg_movimientos_result` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `reg_movimientos_tipo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `reg_movimientos_modulo` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `reg_movimientos_id_usuario` int(11) NULL DEFAULT NULL,
  `reg_movimientos_data` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `reg_movimientos_fechahora` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`reg_movimientos_id_movimiento`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 357 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of reg_movimientos
-- ----------------------------
INSERT INTO `reg_movimientos` VALUES (1, NULL, 'insert', 'cat_almacen', NULL, '{\"cat_almacen_nombre\":\"Nuevo Almacen 12333\",\"cat_almacen_status\":1,\"cat_almacen_fecharegistro\":\"2018-07-23 11:22:13\"}', '2018-07-23 11:22:13');
INSERT INTO `reg_movimientos` VALUES (2, NULL, 'insert', 'cat_almacen', 60, '{\"cat_almacen_nombre\":\"Nuevo Almacen 54321\",\"cat_almacen_status\":1,\"cat_almacen_fecharegistro\":\"2018-07-23 11:26:57\"}', '2018-07-23 11:26:57');
INSERT INTO `reg_movimientos` VALUES (3, NULL, NULL, NULL, NULL, 'null', '2018-07-23 11:37:42');
INSERT INTO `reg_movimientos` VALUES (4, NULL, 'insert', 'cat_almacen', 60, '{\"cat_almacen_nombre\":\"NuevoAlmacen1234567890\",\"cat_almacen_status\":1,\"cat_almacen_fecharegistro\":\"2018-07-23 11:55:20\"}', '2018-07-23 11:55:20');
INSERT INTO `reg_movimientos` VALUES (5, NULL, 'success', 'insert', 60, '{\"cat_almacen_nombre\":\"HolaNuevoPermisionario\",\"cat_almacen_status\":1,\"cat_almacen_fecharegistro\":\"2018-07-23 14:10:52\"}', '2018-07-23 14:10:52');
INSERT INTO `reg_movimientos` VALUES (6, NULL, 'success', 'insert', 60, '\"cat_almacen\"', '2018-07-23 14:11:58');
INSERT INTO `reg_movimientos` VALUES (7, 'error', 'insert', 'cat_almacen', 60, '{\"cat_almacen_nombre\":\"NuevoAlmacen0987654321\",\"cat_almacen_status\":1,\"cat_almacen_fecharegistro\":\"2018-07-23 14:14:23\"}', '2018-07-23 14:14:23');
INSERT INTO `reg_movimientos` VALUES (8, 'success', 'insert', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_id_permisionario\":\"10\",\"cat_vincularpermisionario_id_unidad\":\"8\",\"cat_vincularpermisionario_id_operadores\":\"4\",\"cat_vincularpermisionario_id_placa\":\"4\",\"cat_vincularpermisionario_id_periodopago\":\"7\",\"cat_vincularpermisionario_id_cobros\":\"2\",\"cat_vincularpermisionario_fechainicio\":\"2018-07-01 00:00:00\",\"cat_vincularpermisionario_status\":1,\"cat_vincularpermisionario_fecharegistro\":\"2018-07-23 14:20:48\"}', '2018-07-23 14:20:48');
INSERT INTO `reg_movimientos` VALUES (9, 'success', 'insert', 'cat_perfiles', 60, '\"60\"', '2018-07-26 13:55:59');
INSERT INTO `reg_movimientos` VALUES (10, 'success', 'update', 'cat_perfiles', 60, '\"60\"', '2018-07-26 14:18:07');
INSERT INTO `reg_movimientos` VALUES (11, 'success', 'update', 'cat_perfiles', 60, '\"60\"', '2018-07-26 14:18:45');
INSERT INTO `reg_movimientos` VALUES (12, 'success', 'update', 'cat_perfiles', 60, '\"60\"', '2018-07-26 14:23:54');
INSERT INTO `reg_movimientos` VALUES (13, 'success', 'delete', 'cat_perfiles', 60, '\"60\"', '2018-07-26 14:28:08');
INSERT INTO `reg_movimientos` VALUES (14, 'success', 'delete', 'cat_perfiles', 60, '\"60\"', '2018-07-26 14:28:19');
INSERT INTO `reg_movimientos` VALUES (15, 'success', 'delete', 'cat_perfiles', 60, '\"60\"', '2018-07-26 14:36:54');
INSERT INTO `reg_movimientos` VALUES (16, 'success', 'delete', 'cat_perfiles', 60, '\"60\"', '2018-07-26 14:37:47');
INSERT INTO `reg_movimientos` VALUES (17, 'success', 'insert', 'cat_perfiles', 60, '\"60\"', '2018-07-26 14:44:12');
INSERT INTO `reg_movimientos` VALUES (18, 'success', 'update', 'cat_perfiles', 60, '\"60\"', '2018-07-26 14:45:14');
INSERT INTO `reg_movimientos` VALUES (19, 'success', 'delete', 'cat_perfiles', 60, '\"60\"', '2018-07-26 14:45:47');
INSERT INTO `reg_movimientos` VALUES (20, 'success', 'delete', 'cat_perfiles', 60, '\"60\"', '2018-07-26 14:46:03');
INSERT INTO `reg_movimientos` VALUES (21, 'success', 'update', 'cat_menu', 60, '\"60\"', '2018-07-26 17:00:52');
INSERT INTO `reg_movimientos` VALUES (22, 'success', 'update', 'cat_menu', 60, '\"60\"', '2018-07-26 17:01:15');
INSERT INTO `reg_movimientos` VALUES (23, 'success', 'update', 'cat_perfiles', 60, '\"60\"', '2018-07-26 17:01:40');
INSERT INTO `reg_movimientos` VALUES (24, 'success', 'update', 'cat_perfiles', 60, '\"60\"', '2018-07-26 17:01:47');
INSERT INTO `reg_movimientos` VALUES (25, 'success', 'update', 'cat_placas_unidades', 68, '{\"cat_placas_numero\":\"123456987\",\"cat_placas_status\":1,\"cat_placas_id_periodopago\":\"10\",\"cat_placas_fechaactualiza\":\"2018-07-26 17:08:25\"}', '2018-07-26 17:08:25');
INSERT INTO `reg_movimientos` VALUES (26, 'success', 'update', 'cat_placas_unidades', 68, '{\"cat_placas_numero\":\"123456987\",\"cat_placas_status\":1,\"cat_placas_id_periodopago\":\"11\",\"cat_placas_fechaactualiza\":\"2018-07-26 17:09:36\"}', '2018-07-26 17:09:36');
INSERT INTO `reg_movimientos` VALUES (27, 'success', 'insert', 'cat_placas_unidades', 68, '{\"cat_placas_numero\":\"14587963\",\"cat_placas_status\":1,\"cat_placas_id_periodopago\":\"10\",\"cat_placas_fecharegistro\":\"2018-07-26 17:09:57\"}', '2018-07-26 17:09:57');
INSERT INTO `reg_movimientos` VALUES (28, 'success', 'update', 'cat_placas_unidades', 68, '{\"cat_placas_numero\":\"14587963\",\"cat_placas_status\":1,\"cat_placas_id_periodopago\":\"11\",\"cat_placas_fechaactualiza\":\"2018-07-26 17:10:22\"}', '2018-07-26 17:10:23');
INSERT INTO `reg_movimientos` VALUES (29, 'success', 'update', 'cat_placas_unidades', 68, '{\"cat_placas_numero\":\"963258741\",\"cat_placas_status\":1,\"cat_placas_id_periodopago\":\"10\",\"cat_placas_fechaactualiza\":\"2018-07-26 17:10:52\"}', '2018-07-26 17:10:52');
INSERT INTO `reg_movimientos` VALUES (30, 'success', 'update', 'cat_placas_unidades', 68, '{\"cat_placas_numero\":\"plasac\",\"cat_placas_status\":1,\"cat_placas_id_periodopago\":\"10\",\"cat_placas_fechaactualiza\":\"2018-07-26 17:11:49\"}', '2018-07-26 17:11:49');
INSERT INTO `reg_movimientos` VALUES (31, 'success', 'update', 'cat_placas_unidades', 68, '{\"cat_placas_numero\":\"placas345\",\"cat_placas_status\":1,\"cat_placas_id_periodopago\":\"10\",\"cat_placas_fechaactualiza\":\"2018-07-26 17:16:59\"}', '2018-07-26 17:16:59');
INSERT INTO `reg_movimientos` VALUES (32, 'success', 'update', 'cat_placas_unidades', 68, '{\"cat_placas_numero\":\"placas56789\",\"cat_placas_status\":1,\"cat_placas_id_periodopago\":\"10\",\"cat_placas_fechaactualiza\":\"2018-07-26 17:18:06\"}', '2018-07-26 17:18:06');
INSERT INTO `reg_movimientos` VALUES (33, 'success', 'insert', 'cat_placas_unidades', 68, '{\"cat_placas_numero\":\"plcasejemplo\",\"cat_placas_status\":1,\"cat_placas_id_periodopago\":\"10\",\"cat_placas_fecharegistro\":\"2018-07-26 17:18:27\"}', '2018-07-26 17:18:27');
INSERT INTO `reg_movimientos` VALUES (34, 'success', 'update', 'cat_placas_unidades', 68, '{\"cat_placas_numero\":\"placaej\",\"cat_placas_status\":1,\"cat_placas_id_periodopago\":\"10\",\"cat_placas_fechaactualiza\":\"2018-07-26 17:19:17\"}', '2018-07-26 17:19:17');
INSERT INTO `reg_movimientos` VALUES (35, 'success', 'insert', 'cat_periodopago', 68, '{\"cat_periodopago_nombre\":\"ANUAL\",\"cat_periodopago_periodo\":\"12\",\"cat_periodopago_diascondonados\":\"2\",\"cat_periodopago_fechainicio\":\"2018-07-01 00:00:00\",\"cat_periodopago_status\":1,\"cat_periodopago_fecharegistro\":\"2018-07-26 17:21:59\"}', '2018-07-26 17:21:59');
INSERT INTO `reg_movimientos` VALUES (36, 'success', 'update', 'cat_periodopago', 68, '{\"cat_periodopago_nombre\":\"ANUAL1\",\"cat_periodopago_periodo\":\"12\",\"cat_periodopago_diascondonados\":\"2\",\"cat_periodopago_fechainicio\":\"2018-07-01 00:00:00\",\"cat_periodopago_status\":1,\"cat_periodopago_fechaactualiza\":\"2018-07-26 17:22:24\"}', '2018-07-26 17:22:24');
INSERT INTO `reg_movimientos` VALUES (37, 'success', 'delete', 'cat_periodopago', 68, '{\"cat_periodopago_status\":\"0\"}', '2018-07-26 17:22:46');
INSERT INTO `reg_movimientos` VALUES (38, 'success', 'delete', 'cat_periodopago', 68, '{\"cat_periodopago_status\":\"1\"}', '2018-07-26 17:22:49');
INSERT INTO `reg_movimientos` VALUES (39, 'success', 'delete', 'cat_periodopago', 68, '{\"cat_periodopago_status\":\"0\"}', '2018-07-26 17:22:54');
INSERT INTO `reg_movimientos` VALUES (40, 'error', 'insert', 'cat_cobros', 68, '{\"cat_cobros_nombre\":\"2000\",\"cat_cobros_porcentaje\":\"15\",\"cat_cobros_porcentajedecimal\":\"0.15\",\"cat_cobros_status\":1,\"cat_cobros_fecharegistro\":\"2018-07-26 17:23:33\"}', '2018-07-26 17:23:33');
INSERT INTO `reg_movimientos` VALUES (41, 'error', 'insert', 'cat_cobros', 68, '{\"cat_cobros_nombre\":\"2000\",\"cat_cobros_porcentaje\":\"15\",\"cat_cobros_porcentajedecimal\":\"0.15\",\"cat_cobros_status\":1,\"cat_cobros_fecharegistro\":\"2018-07-26 17:23:53\"}', '2018-07-26 17:23:53');
INSERT INTO `reg_movimientos` VALUES (42, 'error', 'insert', 'cat_cobros', 68, '{\"cat_cobros_nombre\":\"2000\",\"cat_cobros_porcentaje\":\"20\",\"cat_cobros_porcentajedecimal\":\"0.20\",\"cat_cobros_status\":1,\"cat_cobros_fecharegistro\":\"2018-07-26 17:24:05\"}', '2018-07-26 17:24:05');
INSERT INTO `reg_movimientos` VALUES (43, 'error', 'insert', 'cat_cobros', 68, '{\"cat_cobros_nombre\":\"2000\",\"cat_cobros_porcentaje\":\"20\",\"cat_cobros_porcentajedecimal\":\"0.20\",\"cat_cobros_status\":1,\"cat_cobros_fecharegistro\":\"2018-07-26 17:24:21\"}', '2018-07-26 17:24:21');
INSERT INTO `reg_movimientos` VALUES (44, 'success', 'insert', 'cat_cobros', 68, '{\"cat_cobros_nombre\":\"2001\",\"cat_cobros_porcentaje\":\"20\",\"cat_cobros_porcentajedecimal\":\"0.20\",\"cat_cobros_status\":1,\"cat_cobros_fecharegistro\":\"2018-07-26 17:24:38\"}', '2018-07-26 17:24:38');
INSERT INTO `reg_movimientos` VALUES (45, 'success', 'update', 'cat_statusfianzas', 68, '{\"cat_statusfianzas_nombre\":\"ELIMINADO\",\"cat_statusfianzas_status\":1,\"cat_statusfianzas_fechaactualiza\":\"2018-07-26 17:25:30\"}', '2018-07-26 17:25:30');
INSERT INTO `reg_movimientos` VALUES (46, 'success', 'update', 'cat_statusfianzas', 68, '{\"cat_statusfianzas_nombre\":\"EJEMPLO\",\"cat_statusfianzas_status\":1,\"cat_statusfianzas_fechaactualiza\":\"2018-07-26 17:25:52\"}', '2018-07-26 17:25:52');
INSERT INTO `reg_movimientos` VALUES (47, 'success', 'update', 'cat_permisionario', 68, '{\"cat_permisionario_nombre\":\"ELSA SARA MATIAS\",\"cat_permisionario_telefono\":\"6641047400\",\"cat_permisionario_direccion\":\"BLV LAZARO CARDENAS\",\"cat_permisionario_status\":1,\"cat_permisionario_fechaactualiza\":\"2018-07-26 17:26:35\"}', '2018-07-26 17:26:35');
INSERT INTO `reg_movimientos` VALUES (48, 'success', 'insert', 'cat_permisionario', 68, '{\"cat_permisionario_nombre\":\"HAZAEL PERAZA\",\"cat_permisionario_telefono\":\"6640147589\",\"cat_permisionario_direccion\":\"BLV LAZARO CARDENAS\",\"cat_permisionario_status\":1,\"cat_permisionario_fecharegistro\":\"2018-07-26 17:27:04\"}', '2018-07-26 17:27:04');
INSERT INTO `reg_movimientos` VALUES (49, 'success', 'update', 'cat_permisionario', 68, '{\"cat_permisionario_nombre\":\"HAZAEL PERAZA HERNANDEZ\",\"cat_permisionario_telefono\":\"6640147589\",\"cat_permisionario_direccion\":\"BLV LAZARO CARDENAS\",\"cat_permisionario_status\":1,\"cat_permisionario_fechaactualiza\":\"2018-07-26 17:27:43\"}', '2018-07-26 17:27:43');
INSERT INTO `reg_movimientos` VALUES (50, 'success', 'update', 'cat_permisionario', 68, '{\"cat_permisionario_nombre\":\"HAZAEL PERAZA HERNANDEZ1\",\"cat_permisionario_telefono\":\"6640147589\",\"cat_permisionario_direccion\":\"BLV LAZARO CARDENAS\",\"cat_permisionario_status\":1,\"cat_permisionario_fechaactualiza\":\"2018-07-26 17:27:56\"}', '2018-07-26 17:27:56');
INSERT INTO `reg_movimientos` VALUES (51, 'success', 'update', 'cat_permisionario', 68, '{\"cat_permisionario_nombre\":\"HAZAEL PERAZA HERNANDEZ\",\"cat_permisionario_telefono\":\"6640147589\",\"cat_permisionario_direccion\":\"BLV LAZARO CARDENAS\",\"cat_permisionario_status\":1,\"cat_permisionario_fechaactualiza\":\"2018-07-26 17:28:19\"}', '2018-07-26 17:28:19');
INSERT INTO `reg_movimientos` VALUES (52, 'success', 'insert', 'cat_operadores', 68, '{\"cat_operadores_nombre\":\"VENANCIO QUINTERO\",\"cat_operadores_telefono\":\"6641047400\",\"cat_operadores_direccion\":\"BLV. LAZARO CARDENAS\",\"cat_operadores_id_zona\":\"8\",\"cat_operadores_status\":1,\"cat_operadores_fecharegistro\":\"2018-07-26 17:29:10\"}', '2018-07-26 17:29:10');
INSERT INTO `reg_movimientos` VALUES (53, 'success', 'insert', 'cat_marcas_unidades', 68, '{\"cat_marcas_unidades_nombre\":\"MERCEDEZ BENZ\",\"cat_marcas_unidades_status\":1,\"cat_marcas_unidades_fecharegistro\":\"2018-07-26 17:30:58\"}', '2018-07-26 17:30:58');
INSERT INTO `reg_movimientos` VALUES (54, 'success', 'update', 'cat_marcas_unidades', 68, '{\"cat_marcas_unidades_nombre\":\"MERCEDEZ BENZ1\",\"cat_marcas_unidades_status\":1,\"cat_marcas_unidades_fechaactualizada\":\"2018-07-26 17:34:25\"}', '2018-07-26 17:34:25');
INSERT INTO `reg_movimientos` VALUES (55, 'success', 'insert', 'cat_modelos_unidades', 68, '{\"cat_modelos_unidades_nombre\":\"MAYBATCH\",\"cat_modelos_unidades_status\":1,\"cat_modelos_unidades_fecharegistro\":\"2018-07-26 17:35:28\"}', '2018-07-26 17:35:28');
INSERT INTO `reg_movimientos` VALUES (56, 'success', 'update', 'cat_modelos_unidades', 68, '{\"cat_modelos_unidades_nombre\":\"MAYBATCH1\",\"cat_modelos_unidades_status\":1,\"cat_modelos_unidades_fechaactualiza\":\"2018-07-26 17:35:37\"}', '2018-07-26 17:35:37');
INSERT INTO `reg_movimientos` VALUES (57, 'success', 'insert', 'cat_servicio_unidade', 68, '{\"cat_servicio_unidades_nombre\":\"SERV EJEMPLO\",\"cat_servicio_unidades_status\":1,\"cat_servicio_unidades_fecharegistro\":\"2018-07-26 17:37:53\"}', '2018-07-26 17:37:53');
INSERT INTO `reg_movimientos` VALUES (58, 'success', 'update', 'cat_servicio_unidade', 68, '{\"cat_servicio_unidades_nombre\":\"SERV EJEMPLO1\",\"cat_servicio_unidades_status\":1,\"cat_servicio_unidades_fechaactualiza\":\"2018-07-26 17:38:05\"}', '2018-07-26 17:38:06');
INSERT INTO `reg_movimientos` VALUES (59, 'success', 'insert', 'cat_rol_unidades', 68, '{\"cat_rol_unidades_nombre\":\"OTAY\",\"cat_rol_unidades_status\":1,\"cat_rol_unidades_fecharegistro\":\"2018-07-26 17:38:26\"}', '2018-07-26 17:38:26');
INSERT INTO `reg_movimientos` VALUES (60, 'success', 'update', 'cat_rol_unidades', 68, '{\"cat_rol_unidades_nombre\":\"OTAY MODULOS\",\"cat_rol_unidades_status\":1,\"cat_rol_unidades_fechaactualiza\":\"2018-07-26 17:38:38\"}', '2018-07-26 17:38:38');
INSERT INTO `reg_movimientos` VALUES (61, 'success', 'insert', 'cat_zonas_unidades', 68, '\"68\"', '2018-07-26 17:39:00');
INSERT INTO `reg_movimientos` VALUES (62, 'success', 'update', 'cat_zonas_unidades', 68, '\"68\"', '2018-07-26 17:39:07');
INSERT INTO `reg_movimientos` VALUES (63, 'success', 'insert', 'cat_almacen', 60, '{\"cat_almacen_nombre\":\"wwwwwwww\",\"cat_almacen_status\":1,\"cat_almacen_fecharegistro\":\"2018-07-30 12:06:37\"}', '2018-07-30 12:06:37');
INSERT INTO `reg_movimientos` VALUES (64, 'success', 'update', 'cat_almacen', 60, '{\"cat_almacen_nombre\":\"wwwwwwww\",\"cat_almacen_status\":1,\"cat_almacen_fechaactualiza\":\"2018-07-30 12:06:46\"}', '2018-07-30 12:06:46');
INSERT INTO `reg_movimientos` VALUES (65, 'success', 'update', 'cat_almacen', 60, '{\"cat_almacen_nombre\":\"wwwwwwww1111111111\",\"cat_almacen_status\":1,\"cat_almacen_fechaactualiza\":\"2018-07-30 12:06:50\"}', '2018-07-30 12:06:50');
INSERT INTO `reg_movimientos` VALUES (66, 'success', 'insert', 'cat_almacen', 60, '{\"cat_almacen_nombre\":\"23ewsd\",\"cat_almacen_status\":1,\"cat_almacen_fecharegistro\":\"2018-07-30 12:06:57\"}', '2018-07-30 12:06:57');
INSERT INTO `reg_movimientos` VALUES (67, 'success', 'update', 'cat_rol_unidades', 60, '{\"cat_rol_unidades_nombre\":\"Casas Beta\",\"cat_rol_unidades_status\":1,\"cat_rol_unidades_fechaactualiza\":\"2018-07-30 15:57:04\"}', '2018-07-30 15:57:04');
INSERT INTO `reg_movimientos` VALUES (68, 'success', 'delete', 'cat_rol_unidades', 60, '{\"cat_rol_unidades_status\":\"0\"}', '2018-07-30 15:57:16');
INSERT INTO `reg_movimientos` VALUES (69, 'success', 'insert', 'reg_pagosfianzas', 60, '{\"reg_pagosfianzas_id_vincularfianza\":\"13\",\"reg_pagosfianzas_monto\":\"5000\",\"reg_pagosfianzas_consecutivo\":11,\"reg_pagosfianzas_status\":1,\"reg_pagosfianzas_fecharegistro\":\"2018-07-30 15:58:22\"}', '2018-07-30 15:58:22');
INSERT INTO `reg_movimientos` VALUES (70, 'success', 'update', 'cat_zonas_unidades', 60, '\"60\"', '2018-07-30 16:40:15');
INSERT INTO `reg_movimientos` VALUES (71, 'success', 'update', 'cat_rol_unidades', 60, '{\"cat_rol_unidades_nombre\":\"Homex\",\"cat_rol_unidades_status\":1,\"cat_rol_unidades_fechaactualiza\":\"2018-07-31 09:07:08\"}', '2018-07-31 09:07:08');
INSERT INTO `reg_movimientos` VALUES (72, 'success', 'insert', 'cat_rol_unidades', 60, '{\"cat_rol_unidades_nombre\":\"sdasd\",\"cat_rol_unidades_status\":1,\"cat_rol_unidades_fecharegistro\":\"2018-07-31 09:07:21\"}', '2018-07-31 09:07:21');
INSERT INTO `reg_movimientos` VALUES (73, 'success', 'delete', 'cat_servicio_unidade', 60, '{\"cat_servicio_unidades_status\":\"1\"}', '2018-07-31 10:14:50');
INSERT INTO `reg_movimientos` VALUES (74, 'success', 'delete', 'cat_servicio_unidade', 60, '{\"cat_servicio_unidades_status\":\"1\"}', '2018-07-31 10:14:51');
INSERT INTO `reg_movimientos` VALUES (75, 'success', 'delete', 'cat_servicio_unidade', 60, '{\"cat_servicio_unidades_status\":\"1\"}', '2018-07-31 10:14:53');
INSERT INTO `reg_movimientos` VALUES (76, 'success', 'delete', 'cat_servicio_unidade', 60, '{\"cat_servicio_unidades_status\":\"1\"}', '2018-07-31 10:14:54');
INSERT INTO `reg_movimientos` VALUES (77, 'success', 'update', 'cat_menu', 60, '\"60\"', '2018-07-31 12:47:43');
INSERT INTO `reg_movimientos` VALUES (78, 'success', 'delete', 'cat_empresa', 60, '{\"cat_empresa_status\":\"0\"}', '2018-07-31 14:49:14');
INSERT INTO `reg_movimientos` VALUES (79, 'success', 'delete', 'cat_almacen', 60, '{\"cat_almacen_status\":\"0\"}', '2018-07-31 14:51:57');
INSERT INTO `reg_movimientos` VALUES (80, 'success', 'delete', 'cat_empresa', 60, '{\"cat_empresa_status\":\"1\"}', '2018-07-31 14:53:15');
INSERT INTO `reg_movimientos` VALUES (81, 'success', 'delete', 'cat_almacen', 60, '{\"cat_almacen_status\":\"1\"}', '2018-07-31 14:53:36');
INSERT INTO `reg_movimientos` VALUES (82, 'success', 'delete', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_status\":\"0\"}', '2018-07-31 15:37:14');
INSERT INTO `reg_movimientos` VALUES (83, 'success', 'delete', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_status\":\"0\"}', '2018-07-31 15:37:16');
INSERT INTO `reg_movimientos` VALUES (84, 'success', 'delete', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_status\":\"0\"}', '2018-07-31 15:37:18');
INSERT INTO `reg_movimientos` VALUES (85, 'success', 'delete', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_status\":\"0\"}', '2018-07-31 15:37:20');
INSERT INTO `reg_movimientos` VALUES (86, 'success', 'delete', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_status\":\"0\"}', '2018-07-31 15:37:26');
INSERT INTO `reg_movimientos` VALUES (87, 'success', 'delete', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_status\":\"0\"}', '2018-07-31 15:37:30');
INSERT INTO `reg_movimientos` VALUES (88, 'success', 'delete', 'cat_permisionario', 60, '{\"cat_permisionario_status\":\"0\"}', '2018-07-31 16:07:38');
INSERT INTO `reg_movimientos` VALUES (89, 'success', 'delete', 'cat_unidades', 60, '{\"cat_unidades_status\":\"1\"}', '2018-07-31 16:12:33');
INSERT INTO `reg_movimientos` VALUES (90, 'success', 'delete', 'cat_operadores', 60, '{\"cat_operadores_status\":\"0\"}', '2018-07-31 16:14:48');
INSERT INTO `reg_movimientos` VALUES (91, 'success', 'delete', 'cat_placas_unidades', 60, '{\"cat_placas_status\":\"0\"}', '2018-07-31 16:15:07');
INSERT INTO `reg_movimientos` VALUES (92, 'success', 'delete', 'cat_placas_unidades', 60, '{\"cat_placas_status\":\"1\"}', '2018-07-31 16:17:52');
INSERT INTO `reg_movimientos` VALUES (93, 'success', 'delete', 'cat_periodopago', 60, '{\"cat_periodopago_status\":\"1\"}', '2018-07-31 16:19:04');
INSERT INTO `reg_movimientos` VALUES (94, 'success', 'delete', 'cat_cobros', 60, '{\"cat_cobros_status\":\"0\"}', '2018-07-31 16:19:22');
INSERT INTO `reg_movimientos` VALUES (95, 'success', 'delete', 'cat_cobros', 60, '{\"cat_cobros_status\":\"1\"}', '2018-07-31 16:19:40');
INSERT INTO `reg_movimientos` VALUES (96, 'success', 'delete', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_status\":\"1\"}', '2018-07-31 16:20:44');
INSERT INTO `reg_movimientos` VALUES (97, 'success', 'delete', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_status\":\"1\"}', '2018-07-31 16:20:56');
INSERT INTO `reg_movimientos` VALUES (98, 'success', 'delete', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_status\":\"1\"}', '2018-07-31 16:21:01');
INSERT INTO `reg_movimientos` VALUES (99, 'success', 'delete', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_status\":\"1\"}', '2018-07-31 16:21:03');
INSERT INTO `reg_movimientos` VALUES (100, 'success', 'delete', 'cat_permisionario', 60, '{\"cat_permisionario_status\":\"1\"}', '2018-07-31 16:21:24');
INSERT INTO `reg_movimientos` VALUES (101, 'success', 'delete', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_status\":\"0\"}', '2018-07-31 16:21:36');
INSERT INTO `reg_movimientos` VALUES (102, 'success', 'delete', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_status\":\"1\"}', '2018-07-31 16:27:21');
INSERT INTO `reg_movimientos` VALUES (103, 'success', 'delete', 'cat_permisionario', 60, '{\"cat_permisionario_status\":\"0\"}', '2018-07-31 16:39:57');
INSERT INTO `reg_movimientos` VALUES (104, 'success', 'delete', 'cat_permisionario', 60, '{\"cat_permisionario_status\":\"1\"}', '2018-07-31 16:40:15');
INSERT INTO `reg_movimientos` VALUES (105, 'success', 'delete', 'cat_unidades', 60, '{\"cat_unidades_status\":\"0\"}', '2018-07-31 16:42:46');
INSERT INTO `reg_movimientos` VALUES (106, 'success', 'delete', 'cat_unidades', 60, '{\"cat_unidades_status\":\"1\"}', '2018-07-31 16:44:24');
INSERT INTO `reg_movimientos` VALUES (107, 'success', 'delete', 'cat_unidades', 60, '{\"cat_unidades_status\":\"0\"}', '2018-07-31 16:44:37');
INSERT INTO `reg_movimientos` VALUES (108, 'success', 'delete', 'cat_marcas_unidades', 60, '{\"cat_marcas_unidades_status\":\"0\"}', '2018-07-31 16:44:53');
INSERT INTO `reg_movimientos` VALUES (109, 'success', 'delete', 'cat_marcas_unidades', 60, '{\"cat_marcas_unidades_status\":\"1\"}', '2018-07-31 16:44:54');
INSERT INTO `reg_movimientos` VALUES (110, 'success', 'update', 'cat_zonas_unidades', 60, '\"60\"', '2018-07-31 16:45:02');
INSERT INTO `reg_movimientos` VALUES (111, 'success', 'update', 'cat_zonas_unidades', 60, '\"60\"', '2018-07-31 16:45:04');
INSERT INTO `reg_movimientos` VALUES (112, 'success', 'delete', 'cat_unidades', 60, '{\"cat_unidades_status\":\"1\"}', '2018-07-31 16:45:11');
INSERT INTO `reg_movimientos` VALUES (113, 'success', 'delete', 'cat_unidades', 60, '{\"cat_unidades_status\":\"0\"}', '2018-07-31 16:49:03');
INSERT INTO `reg_movimientos` VALUES (114, 'success', 'delete', 'cat_unidades', 60, '{\"cat_unidades_status\":\"1\"}', '2018-07-31 16:50:53');
INSERT INTO `reg_movimientos` VALUES (115, 'success', 'delete', 'cat_unidades', 60, '{\"cat_unidades_status\":\"0\"}', '2018-07-31 16:50:56');
INSERT INTO `reg_movimientos` VALUES (116, 'success', 'delete', 'cat_unidades', 60, '{\"cat_unidades_status\":\"1\"}', '2018-07-31 16:50:57');
INSERT INTO `reg_movimientos` VALUES (117, 'success', 'update', 'cat_unidades', 60, '{\"cat_unidades_numeconomico\":\"V014\",\"cat_unidades_ano\":\"2017\",\"cat_unidades_placas\":\"TGFRDESR\",\"cat_unidades_id_marca\":\"17\",\"cat_unidades_id_modelo\":\"35\",\"cat_unidades_id_servicio\":\"14\",\"cat_unidades_id_rol\":\"16\",\"cat_unidades_id_empresa\":\"18\",\"cat_unidades_id_almacen\":\"9\",\"cat_unidades_id_zona\":\"9\",\"cat_unidades_status\":1,\"cat_unidades_fechaactualizada\":\"2018-07-31 16:54:23\"}', '2018-07-31 16:54:23');
INSERT INTO `reg_movimientos` VALUES (118, 'success', 'delete', 'cat_rol_unidades', 60, '{\"cat_rol_unidades_status\":\"1\"}', '2018-07-31 16:54:57');
INSERT INTO `reg_movimientos` VALUES (119, 'success', 'delete', 'cat_rol_unidades', 60, '{\"cat_rol_unidades_status\":\"1\"}', '2018-07-31 16:54:58');
INSERT INTO `reg_movimientos` VALUES (120, 'success', 'delete', 'cat_rol_unidades', 60, '{\"cat_rol_unidades_status\":\"1\"}', '2018-07-31 16:55:00');
INSERT INTO `reg_movimientos` VALUES (121, 'success', 'delete', 'cat_rol_unidades', 60, '{\"cat_rol_unidades_status\":\"1\"}', '2018-07-31 16:55:01');
INSERT INTO `reg_movimientos` VALUES (122, 'success', 'delete', 'cat_rol_unidades', 60, '{\"cat_rol_unidades_status\":\"1\"}', '2018-07-31 16:55:04');
INSERT INTO `reg_movimientos` VALUES (123, 'success', 'delete', 'cat_rol_unidades', 60, '{\"cat_rol_unidades_status\":\"1\"}', '2018-07-31 16:55:07');
INSERT INTO `reg_movimientos` VALUES (124, 'success', 'delete', 'cat_rol_unidades', 60, '{\"cat_rol_unidades_status\":\"1\"}', '2018-07-31 16:55:13');
INSERT INTO `reg_movimientos` VALUES (125, 'success', 'delete', 'cat_rol_unidades', 60, '{\"cat_rol_unidades_status\":\"1\"}', '2018-07-31 16:55:22');
INSERT INTO `reg_movimientos` VALUES (126, 'success', 'delete', 'cat_rol_unidades', 60, '{\"cat_rol_unidades_status\":\"1\"}', '2018-07-31 16:57:16');
INSERT INTO `reg_movimientos` VALUES (127, 'success', 'delete', 'cat_rol_unidades', 60, '{\"cat_rol_unidades_status\":\"1\"}', '2018-07-31 16:57:18');
INSERT INTO `reg_movimientos` VALUES (128, 'success', 'delete', 'cat_rol_unidades', 60, '{\"cat_rol_unidades_status\":\"1\"}', '2018-07-31 16:57:21');
INSERT INTO `reg_movimientos` VALUES (129, 'success', 'delete', 'cat_rol_unidades', 60, '{\"cat_rol_unidades_status\":\"1\"}', '2018-07-31 16:57:24');
INSERT INTO `reg_movimientos` VALUES (130, 'success', 'delete', 'cat_rol_unidades', 60, '{\"cat_rol_unidades_status\":\"1\"}', '2018-07-31 16:57:27');
INSERT INTO `reg_movimientos` VALUES (131, 'success', 'delete', 'cat_rol_unidades', 60, '{\"cat_rol_unidades_status\":\"1\"}', '2018-07-31 16:57:29');
INSERT INTO `reg_movimientos` VALUES (132, 'success', 'delete', 'cat_rol_unidades', 60, '{\"cat_rol_unidades_status\":\"1\"}', '2018-07-31 16:57:32');
INSERT INTO `reg_movimientos` VALUES (133, 'success', 'delete', 'cat_rol_unidades', 60, '{\"cat_rol_unidades_status\":\"1\"}', '2018-07-31 16:57:35');
INSERT INTO `reg_movimientos` VALUES (134, 'success', 'delete', 'cat_rol_unidades', 60, '{\"cat_rol_unidades_status\":\"1\"}', '2018-07-31 16:57:38');
INSERT INTO `reg_movimientos` VALUES (135, 'success', 'delete', 'cat_rol_unidades', 60, '{\"cat_rol_unidades_status\":\"1\"}', '2018-07-31 16:57:41');
INSERT INTO `reg_movimientos` VALUES (136, 'success', 'delete', 'cat_rol_unidades', 60, '{\"cat_rol_unidades_status\":\"1\"}', '2018-07-31 16:57:44');
INSERT INTO `reg_movimientos` VALUES (137, 'success', 'delete', 'cat_rol_unidades', 60, '{\"cat_rol_unidades_status\":\"1\"}', '2018-07-31 16:57:46');
INSERT INTO `reg_movimientos` VALUES (138, 'success', 'delete', 'cat_rol_unidades', 60, '{\"cat_rol_unidades_status\":\"1\"}', '2018-07-31 16:57:49');
INSERT INTO `reg_movimientos` VALUES (139, 'success', 'delete', 'cat_rol_unidades', 60, '{\"cat_rol_unidades_status\":\"1\"}', '2018-07-31 16:57:54');
INSERT INTO `reg_movimientos` VALUES (140, 'success', 'update', 'cat_zonas_unidades', 60, '\"60\"', '2018-07-31 17:03:56');
INSERT INTO `reg_movimientos` VALUES (141, 'success', 'update', 'cat_zonas_unidades', 60, '\"60\"', '2018-07-31 17:03:58');
INSERT INTO `reg_movimientos` VALUES (142, 'success', 'update', 'cat_zonas_unidades', 60, '\"60\"', '2018-07-31 17:03:59');
INSERT INTO `reg_movimientos` VALUES (143, 'success', 'delete', 'cat_operadores', 60, '{\"cat_operadores_status\":\"0\"}', '2018-07-31 18:05:02');
INSERT INTO `reg_movimientos` VALUES (144, 'success', 'delete', 'cat_operadores', 60, '{\"cat_operadores_status\":\"1\"}', '2018-07-31 18:06:11');
INSERT INTO `reg_movimientos` VALUES (145, 'success', 'delete', 'cat_operadores', 60, '{\"cat_operadores_status\":\"0\"}', '2018-07-31 18:07:24');
INSERT INTO `reg_movimientos` VALUES (146, 'success', 'asignarllave', 'cat_statusfianzas', 60, '{\"cat_statusfianzas_llave\":\"1\"}', '2018-08-01 09:53:11');
INSERT INTO `reg_movimientos` VALUES (147, 'success', 'delete', 'cat_statusfianzas', 60, '{\"cat_statusfianzas_status\":\"0\"}', '2018-08-01 09:53:14');
INSERT INTO `reg_movimientos` VALUES (148, 'success', 'delete', 'cat_statusfianzas', 60, '{\"cat_statusfianzas_status\":\"1\"}', '2018-08-01 10:01:27');
INSERT INTO `reg_movimientos` VALUES (149, 'success', 'asignarllave', 'cat_statusfianzas', 60, '{\"cat_statusfianzas_llave\":\"1\"}', '2018-08-01 10:01:30');
INSERT INTO `reg_movimientos` VALUES (150, 'success', 'delete', 'cat_operadores', 60, '{\"cat_operadores_status\":\"1\"}', '2018-08-01 10:03:39');
INSERT INTO `reg_movimientos` VALUES (151, 'success', 'delete', 'cat_operadores', 60, '{\"cat_operadores_status\":\"1\"}', '2018-08-01 10:03:41');
INSERT INTO `reg_movimientos` VALUES (152, 'success', 'update', 'cat_zonas_unidades', 60, '\"60\"', '2018-08-01 11:03:52');
INSERT INTO `reg_movimientos` VALUES (153, 'success', 'insert', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_id_permisionario\":\"1\",\"cat_vincularpermisionario_id_unidad\":\"9\",\"cat_vincularpermisionario_id_operadores\":\"3\",\"cat_vincularpermisionario_id_placa\":\"4\",\"cat_vincularpermisionario_id_periodopago\":\"7\",\"cat_vincularpermisionario_id_cobros\":\"3\",\"cat_vincularpermisionario_fechainicio\":\"2018-08-01 00:00:00\",\"cat_vincularpermisionario_status\":1,\"cat_vincularpermisionario_fecharegistro\":\"2018-08-01 11:17:39\"}', '2018-08-01 11:17:39');
INSERT INTO `reg_movimientos` VALUES (154, 'success', 'insert', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_id_permisionario\":\"1\",\"cat_vincularpermisionario_id_unidad\":\"8\",\"cat_vincularpermisionario_id_operadores\":\"3\",\"cat_vincularpermisionario_id_placa\":\"4\",\"cat_vincularpermisionario_id_periodopago\":\"7\",\"cat_vincularpermisionario_id_cobros\":\"4\",\"cat_vincularpermisionario_fechainicio\":\"2018-08-01 00:00:00\",\"cat_vincularpermisionario_status\":1,\"cat_vincularpermisionario_fecharegistro\":\"2018-08-01 11:22:45\"}', '2018-08-01 11:22:45');
INSERT INTO `reg_movimientos` VALUES (155, 'success', 'insert', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_id_permisionario\":\"1\",\"cat_vincularpermisionario_id_unidad\":\"9\",\"cat_vincularpermisionario_id_operadores\":\"3\",\"cat_vincularpermisionario_id_placa\":\"4\",\"cat_vincularpermisionario_id_periodopago\":\"7\",\"cat_vincularpermisionario_id_cobros\":\"3\",\"cat_vincularpermisionario_fechainicio\":\"2018-08-01 00:00:00\",\"cat_vincularpermisionario_status\":1,\"cat_vincularpermisionario_fecharegistro\":\"2018-08-01 11:23:27\"}', '2018-08-01 11:23:27');
INSERT INTO `reg_movimientos` VALUES (156, 'success', 'insert', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_id_permisionario\":\"1\",\"cat_vincularpermisionario_id_unidad\":\"9\",\"cat_vincularpermisionario_id_operadores\":\"3\",\"cat_vincularpermisionario_id_placa\":\"4\",\"cat_vincularpermisionario_id_periodopago\":\"7\",\"cat_vincularpermisionario_id_cobros\":\"3\",\"cat_vincularpermisionario_fechainicio\":\"2018-08-01 00:00:00\",\"cat_vincularpermisionario_status\":1,\"cat_vincularpermisionario_fecharegistro\":\"2018-08-01 11:24:24\"}', '2018-08-01 11:24:24');
INSERT INTO `reg_movimientos` VALUES (157, 'success', 'insert', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_id_permisionario\":\"1\",\"cat_vincularpermisionario_id_unidad\":\"9\",\"cat_vincularpermisionario_id_operadores\":\"3\",\"cat_vincularpermisionario_id_placa\":\"4\",\"cat_vincularpermisionario_id_periodopago\":\"7\",\"cat_vincularpermisionario_id_cobros\":\"3\",\"cat_vincularpermisionario_fechainicio\":\"2018-08-01 00:00:00\",\"cat_vincularpermisionario_status\":1,\"cat_vincularpermisionario_fecharegistro\":\"2018-08-01 11:24:34\"}', '2018-08-01 11:24:34');
INSERT INTO `reg_movimientos` VALUES (158, 'success', 'update', 'cat_menu', 60, '\"60\"', '2018-08-01 11:45:54');
INSERT INTO `reg_movimientos` VALUES (159, 'success', 'update', 'cat_menu', 60, '\"60\"', '2018-08-01 11:46:43');
INSERT INTO `reg_movimientos` VALUES (160, 'error', 'update', 'cat_menu', 60, '\"60\"', '2018-08-01 12:27:12');
INSERT INTO `reg_movimientos` VALUES (161, 'success', 'update', 'cat_menu', 60, '\"60\"', '2018-08-01 12:27:23');
INSERT INTO `reg_movimientos` VALUES (162, 'success', 'update', 'cat_menu', 60, '\"60\"', '2018-08-01 12:28:47');
INSERT INTO `reg_movimientos` VALUES (163, 'success', 'update', 'cat_menu', 60, '\"60\"', '2018-08-01 12:29:36');
INSERT INTO `reg_movimientos` VALUES (164, 'success', 'update', 'cat_menu', 60, '\"60\"', '2018-08-01 12:29:50');
INSERT INTO `reg_movimientos` VALUES (165, 'success', 'update', 'cat_menu', 60, '\"60\"', '2018-08-01 12:33:45');
INSERT INTO `reg_movimientos` VALUES (166, 'success', 'update', 'cat_menu', 60, '\"60\"', '2018-08-01 12:34:23');
INSERT INTO `reg_movimientos` VALUES (167, 'success', 'insert', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_id_permisionario\":\"1\",\"cat_vincularpermisionario_id_unidad\":\"8\",\"cat_vincularpermisionario_id_operadores\":\"3\",\"cat_vincularpermisionario_id_placa\":\"4\",\"cat_vincularpermisionario_id_periodopago\":\"7\",\"cat_vincularpermisionario_id_cobros\":\"3\",\"cat_vincularpermisionario_fechainicio\":\"2018-08-01 00:00:00\",\"cat_vincularpermisionario_status\":1,\"cat_vincularpermisionario_fecharegistro\":\"2018-08-01 14:22:57\"}', '2018-08-01 14:22:57');
INSERT INTO `reg_movimientos` VALUES (168, 'success', 'insert', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_id_permisionario\":\"1\",\"cat_vincularpermisionario_id_unidad\":\"8\",\"cat_vincularpermisionario_id_operadores\":\"3\",\"cat_vincularpermisionario_id_placa\":\"4\",\"cat_vincularpermisionario_id_periodopago\":\"7\",\"cat_vincularpermisionario_id_cobros\":\"3\",\"cat_vincularpermisionario_fechainicio\":\"2018-08-01 00:00:00\",\"cat_vincularpermisionario_status\":1,\"cat_vincularpermisionario_fecharegistro\":\"2018-08-01 14:23:27\"}', '2018-08-01 14:23:27');
INSERT INTO `reg_movimientos` VALUES (169, 'success', 'update', 'cat_perfiles', 60, '\"60\"', '2018-08-01 14:57:58');
INSERT INTO `reg_movimientos` VALUES (170, 'success', 'update', 'cat_perfiles', 60, '\"60\"', '2018-08-01 14:58:09');
INSERT INTO `reg_movimientos` VALUES (171, 'success', 'update', 'cat_perfiles', 60, '\"60\"', '2018-08-01 14:58:17');
INSERT INTO `reg_movimientos` VALUES (172, 'success', 'insert', 'cat_empresa', 60, '{\"cat_empresa_nombre\":\"AMB\",\"cat_empresa_status\":1,\"cat_empresa_fecharegistro\":\"2018-08-01 14:59:15\"}', '2018-08-01 14:59:15');
INSERT INTO `reg_movimientos` VALUES (173, 'success', 'insert', 'cat_empresa', 60, '{\"cat_empresa_nombre\":\"AVP\",\"cat_empresa_status\":1,\"cat_empresa_fecharegistro\":\"2018-08-01 14:59:30\"}', '2018-08-01 14:59:31');
INSERT INTO `reg_movimientos` VALUES (174, 'success', 'update', 'cat_empresa', 60, '{\"cat_empresa_nombre\":\"23AVP\",\"cat_empresa_status\":1,\"cat_empresa_fechaactualiza\":\"2018-08-01 14:59:42\"}', '2018-08-01 14:59:42');
INSERT INTO `reg_movimientos` VALUES (175, 'success', 'delete', 'cat_empresa', 60, '{\"cat_empresa_status\":\"0\"}', '2018-08-01 14:59:48');
INSERT INTO `reg_movimientos` VALUES (176, 'success', 'insert', 'cat_almacen', 60, '{\"cat_almacen_nombre\":\"ALMACEN AVP\",\"cat_almacen_status\":1,\"cat_almacen_fecharegistro\":\"2018-08-01 15:00:12\"}', '2018-08-01 15:00:12');
INSERT INTO `reg_movimientos` VALUES (177, 'success', 'update', 'cat_almacen', 60, '{\"cat_almacen_nombre\":\"ALMACEN 23AVP\",\"cat_almacen_status\":1,\"cat_almacen_fechaactualiza\":\"2018-08-01 15:00:49\"}', '2018-08-01 15:00:49');
INSERT INTO `reg_movimientos` VALUES (178, 'success', 'insert', 'cat_placas_unidades', 60, '{\"cat_placas_numero\":\"85496321\",\"cat_placas_status\":1,\"cat_placas_id_periodopago\":\"8\",\"cat_placas_fecharegistro\":\"2018-08-01 15:02:55\"}', '2018-08-01 15:02:55');
INSERT INTO `reg_movimientos` VALUES (179, 'error', 'insert', 'cat_placas_unidades', 60, '{\"cat_placas_numero\":\"85496321\",\"cat_placas_status\":1,\"cat_placas_id_periodopago\":\"8\",\"cat_placas_fecharegistro\":\"2018-08-01 15:03:10\"}', '2018-08-01 15:03:10');
INSERT INTO `reg_movimientos` VALUES (180, 'error', 'insert', 'cat_placas_unidades', 60, '{\"cat_placas_numero\":\"85496321\",\"cat_placas_status\":1,\"cat_placas_id_periodopago\":\"8\",\"cat_placas_fecharegistro\":\"2018-08-01 15:03:37\"}', '2018-08-01 15:03:37');
INSERT INTO `reg_movimientos` VALUES (181, 'success', 'insert', 'cat_periodopago', 60, '{\"cat_periodopago_nombre\":\"ejemplo\",\"cat_periodopago_periodo\":\"8\",\"cat_periodopago_diascondonados\":\"5\",\"cat_periodopago_fechainicio\":\"2018-08-01 00:00:00\",\"cat_periodopago_status\":1,\"cat_periodopago_fecharegistro\":\"2018-08-01 15:08:47\"}', '2018-08-01 15:08:47');
INSERT INTO `reg_movimientos` VALUES (182, 'success', 'update', 'cat_periodopago', 60, '{\"cat_periodopago_nombre\":\"ejemplo1\",\"cat_periodopago_periodo\":\"8\",\"cat_periodopago_diascondonados\":\"5\",\"cat_periodopago_fechainicio\":\"2018-08-01 00:00:00\",\"cat_periodopago_status\":1,\"cat_periodopago_fechaactualiza\":\"2018-08-01 15:10:16\"}', '2018-08-01 15:10:16');
INSERT INTO `reg_movimientos` VALUES (183, 'success', 'update', 'cat_periodopago', 60, '{\"cat_periodopago_nombre\":\"ejemplo1\",\"cat_periodopago_periodo\":\"8\",\"cat_periodopago_diascondonados\":\"5\",\"cat_periodopago_fechainicio\":\"2018-08-01 00:00:00\",\"cat_periodopago_status\":1,\"cat_periodopago_fechaactualiza\":\"2018-08-01 15:10:22\"}', '2018-08-01 15:10:22');
INSERT INTO `reg_movimientos` VALUES (184, 'success', 'insert', 'cat_cobros', 60, '{\"cat_cobros_nombre\":\"2005\",\"cat_cobros_porcentaje\":\"15\",\"cat_cobros_porcentajedecimal\":\"0.15\",\"cat_cobros_status\":1,\"cat_cobros_fecharegistro\":\"2018-08-01 15:11:17\"}', '2018-08-01 15:11:17');
INSERT INTO `reg_movimientos` VALUES (185, 'error', 'insert', 'cat_cobros', 60, '{\"cat_cobros_nombre\":\"2005\",\"cat_cobros_porcentaje\":\"20\",\"cat_cobros_porcentajedecimal\":\".20\",\"cat_cobros_status\":1,\"cat_cobros_fecharegistro\":\"2018-08-01 15:11:35\"}', '2018-08-01 15:11:35');
INSERT INTO `reg_movimientos` VALUES (186, 'success', 'insert', 'cat_cobros', 60, '{\"cat_cobros_nombre\":\"5000\",\"cat_cobros_porcentaje\":\"20\",\"cat_cobros_porcentajedecimal\":\"0.20\",\"cat_cobros_status\":1,\"cat_cobros_fecharegistro\":\"2018-08-01 15:15:33\"}', '2018-08-01 15:15:33');
INSERT INTO `reg_movimientos` VALUES (187, 'error', 'insert', 'cat_statusfianzas', 60, '{\"cat_statusfianzas_nombre\":\"ejemplo\",\"cat_statusfianzas_status\":1,\"cat_statusfianzas_fecharegistro\":\"2018-08-01 15:15:58\"}', '2018-08-01 15:15:58');
INSERT INTO `reg_movimientos` VALUES (188, 'error', 'insert', 'cat_statusfianzas', 60, '{\"cat_statusfianzas_nombre\":\"EJEMPLO\",\"cat_statusfianzas_status\":1,\"cat_statusfianzas_fecharegistro\":\"2018-08-01 15:16:14\"}', '2018-08-01 15:16:14');
INSERT INTO `reg_movimientos` VALUES (189, 'success', 'insert', 'cat_statusfianzas', 60, '{\"cat_statusfianzas_nombre\":\"ejemplo2\",\"cat_statusfianzas_status\":1,\"cat_statusfianzas_fecharegistro\":\"2018-08-01 15:16:22\"}', '2018-08-01 15:16:22');
INSERT INTO `reg_movimientos` VALUES (190, 'success', 'update', 'cat_statusfianzas', 60, '{\"cat_statusfianzas_nombre\":\"ejemplo2_1\",\"cat_statusfianzas_status\":1,\"cat_statusfianzas_fechaactualiza\":\"2018-08-01 15:16:38\"}', '2018-08-01 15:16:38');
INSERT INTO `reg_movimientos` VALUES (191, 'success', 'insert', 'cat_permisionario', 60, '{\"cat_permisionario_nombre\":\"jesus flores bojorquez\",\"cat_permisionario_telefono\":\"6641047400\",\"cat_permisionario_direccion\":\"BLV LAZARO CARDENAS\",\"cat_permisionario_status\":1,\"cat_permisionario_fecharegistro\":\"2018-08-01 15:17:15\"}', '2018-08-01 15:17:15');
INSERT INTO `reg_movimientos` VALUES (192, 'success', 'update', 'cat_permisionario', 60, '{\"cat_permisionario_nombre\":\"jesus flores bojorquez1\",\"cat_permisionario_telefono\":\"6641047400\",\"cat_permisionario_direccion\":\"BLV LAZARO CARDENAS\",\"cat_permisionario_status\":1,\"cat_permisionario_fechaactualiza\":\"2018-08-01 15:17:59\"}', '2018-08-01 15:17:59');
INSERT INTO `reg_movimientos` VALUES (193, 'error', 'insert', 'cat_unidades', 60, '{\"cat_unidades_numeconomico\":\"1002\",\"cat_unidades_ano\":\"1999\",\"cat_unidades_placas\":\"85274586\",\"cat_unidades_id_marca\":\"7\",\"cat_unidades_id_modelo\":\"15\",\"cat_unidades_id_servicio\":\"14\",\"cat_unidades_id_rol\":\"15\",\"cat_unidades_id_empresa\":\"14\",\"cat_unidades_id_almacen\":\"6\",\"cat_unidades_id_zona\":\"7\",\"cat_unidades_status\":1,\"cat_unidades_fecharegistro\":\"2018-08-01 15:19:10\"}', '2018-08-01 15:19:10');
INSERT INTO `reg_movimientos` VALUES (194, 'success', 'insert', 'cat_unidades', 60, '{\"cat_unidades_numeconomico\":\"4057\",\"cat_unidades_ano\":\"2018\",\"cat_unidades_placas\":\"ASQW1234\",\"cat_unidades_id_marca\":\"9\",\"cat_unidades_id_modelo\":\"16\",\"cat_unidades_id_servicio\":\"14\",\"cat_unidades_id_rol\":\"15\",\"cat_unidades_id_empresa\":\"14\",\"cat_unidades_id_almacen\":\"9\",\"cat_unidades_id_zona\":\"8\",\"cat_unidades_status\":1,\"cat_unidades_fecharegistro\":\"2018-08-01 15:20:25\"}', '2018-08-01 15:20:25');
INSERT INTO `reg_movimientos` VALUES (195, 'success', 'insert', 'cat_marcas_unidades', 60, '{\"cat_marcas_unidades_nombre\":\"EJEMPLO\",\"cat_marcas_unidades_status\":1,\"cat_marcas_unidades_fecharegistro\":\"2018-08-01 15:24:41\"}', '2018-08-01 15:24:41');
INSERT INTO `reg_movimientos` VALUES (196, 'success', 'update', 'cat_marcas_unidades', 60, '{\"cat_marcas_unidades_nombre\":\"EJEMPLO1\",\"cat_marcas_unidades_status\":1,\"cat_marcas_unidades_fechaactualizada\":\"2018-08-01 15:24:49\"}', '2018-08-01 15:24:49');
INSERT INTO `reg_movimientos` VALUES (197, 'success', 'insert', 'cat_modelos_unidades', 60, '{\"cat_modelos_unidades_nombre\":\"MODELO 2018\",\"cat_modelos_unidades_status\":1,\"cat_modelos_unidades_fecharegistro\":\"2018-08-01 15:25:20\"}', '2018-08-01 15:25:20');
INSERT INTO `reg_movimientos` VALUES (198, 'success', 'update', 'cat_modelos_unidades', 60, '{\"cat_modelos_unidades_nombre\":\"MODELO 20181\",\"cat_modelos_unidades_status\":1,\"cat_modelos_unidades_fechaactualiza\":\"2018-08-01 15:25:30\"}', '2018-08-01 15:25:30');
INSERT INTO `reg_movimientos` VALUES (199, 'success', 'insert', 'cat_modelos_unidades', 60, '{\"cat_modelos_unidades_nombre\":\"MODELO 2019\",\"cat_modelos_unidades_status\":1,\"cat_modelos_unidades_fecharegistro\":\"2018-08-01 15:25:51\"}', '2018-08-01 15:25:51');
INSERT INTO `reg_movimientos` VALUES (200, 'success', 'update', 'cat_modelos_unidades', 60, '{\"cat_modelos_unidades_nombre\":\"MODELO 20191\",\"cat_modelos_unidades_status\":1,\"cat_modelos_unidades_fechaactualiza\":\"2018-08-01 15:26:18\"}', '2018-08-01 15:26:18');
INSERT INTO `reg_movimientos` VALUES (201, 'success', 'insert', 'cat_servicio_unidade', 60, '{\"cat_servicio_unidades_nombre\":\"EJEMPLO\",\"cat_servicio_unidades_status\":1,\"cat_servicio_unidades_fecharegistro\":\"2018-08-01 15:27:22\"}', '2018-08-01 15:27:22');
INSERT INTO `reg_movimientos` VALUES (202, 'success', 'update', 'cat_servicio_unidade', 60, '{\"cat_servicio_unidades_nombre\":\"EJEMPLO1\",\"cat_servicio_unidades_status\":1,\"cat_servicio_unidades_fechaactualiza\":\"2018-08-01 15:27:31\"}', '2018-08-01 15:27:31');
INSERT INTO `reg_movimientos` VALUES (203, 'success', 'update', 'cat_servicio_unidade', 60, '{\"cat_servicio_unidades_nombre\":\"EJEMPLO2\",\"cat_servicio_unidades_status\":1,\"cat_servicio_unidades_fechaactualiza\":\"2018-08-01 15:27:43\"}', '2018-08-01 15:27:43');
INSERT INTO `reg_movimientos` VALUES (204, 'error', 'insert', 'cat_servicio_unidade', 60, '{\"cat_servicio_unidades_nombre\":\"EJEMPLO1\",\"cat_servicio_unidades_status\":1,\"cat_servicio_unidades_fecharegistro\":\"2018-08-01 15:27:53\"}', '2018-08-01 15:27:53');
INSERT INTO `reg_movimientos` VALUES (205, 'success', 'update', 'cat_servicio_unidade', 60, '{\"cat_servicio_unidades_nombre\":\"EJEMPLO1\",\"cat_servicio_unidades_status\":1,\"cat_servicio_unidades_fechaactualiza\":\"2018-08-01 15:28:16\"}', '2018-08-01 15:28:16');
INSERT INTO `reg_movimientos` VALUES (206, 'success', 'insert', 'cat_rol_unidades', 60, '{\"cat_rol_unidades_nombre\":\"ROL\",\"cat_rol_unidades_status\":1,\"cat_rol_unidades_fecharegistro\":\"2018-08-01 15:28:40\"}', '2018-08-01 15:28:40');
INSERT INTO `reg_movimientos` VALUES (207, 'success', 'update', 'cat_rol_unidades', 60, '{\"cat_rol_unidades_nombre\":\"ROL1\",\"cat_rol_unidades_status\":1,\"cat_rol_unidades_fechaactualiza\":\"2018-08-01 15:28:49\"}', '2018-08-01 15:28:50');
INSERT INTO `reg_movimientos` VALUES (208, 'error', 'insert', 'cat_rol_unidades', 60, '{\"cat_rol_unidades_nombre\":\"sdasd\",\"cat_rol_unidades_status\":1,\"cat_rol_unidades_fecharegistro\":\"2018-08-01 15:29:04\"}', '2018-08-01 15:29:04');
INSERT INTO `reg_movimientos` VALUES (209, 'success', 'update', 'cat_rol_unidades', 60, '{\"cat_rol_unidades_nombre\":\"sdasd1\",\"cat_rol_unidades_status\":1,\"cat_rol_unidades_fechaactualiza\":\"2018-08-01 15:29:18\"}', '2018-08-01 15:29:18');
INSERT INTO `reg_movimientos` VALUES (210, 'success', 'insert', 'cat_zonas_unidades', 60, '\"60\"', '2018-08-01 15:29:37');
INSERT INTO `reg_movimientos` VALUES (211, 'success', 'update', 'cat_zonas_unidades', 60, '\"60\"', '2018-08-01 15:29:43');
INSERT INTO `reg_movimientos` VALUES (212, 'error', 'insert', 'cat_operadores', 60, '{\"cat_operadores_nombre\":\"VENANCIO QUINTERO\",\"cat_operadores_telefono\":\"6641047400\",\"cat_operadores_direccion\":\"BLV LAZARO CARDENAS\",\"cat_operadores_id_zona\":\"8\",\"cat_operadores_status\":1,\"cat_operadores_fecharegistro\":\"2018-08-01 15:30:30\"}', '2018-08-01 15:30:30');
INSERT INTO `reg_movimientos` VALUES (213, 'success', 'insert', 'cat_operadores', 60, '{\"cat_operadores_nombre\":\"JESUS FLORES\",\"cat_operadores_telefono\":\"6641047400\",\"cat_operadores_direccion\":\"BLV. LAZARO CARDFENAS\",\"cat_operadores_id_zona\":\"7\",\"cat_operadores_status\":1,\"cat_operadores_fecharegistro\":\"2018-08-01 15:30:55\"}', '2018-08-01 15:30:55');
INSERT INTO `reg_movimientos` VALUES (214, 'success', 'update', 'cat_operadores', 60, '{\"cat_operadores_nombre\":\"JESUS FLORES1\",\"cat_operadores_telefono\":\"6641047400\",\"cat_operadores_direccion\":\"BLV. LAZARO CARDFENAS\",\"cat_operadores_id_zona\":\"7\",\"cat_operadores_status\":1,\"cat_operadores_fechaactualiza\":\"2018-08-01 15:31:01\"}', '2018-08-01 15:31:01');
INSERT INTO `reg_movimientos` VALUES (215, 'success', 'insert', 'cat_periodopago', 60, '{\"cat_periodopago_nombre\":\"otro\",\"cat_periodopago_periodo\":\"5\",\"cat_periodopago_diascondonados\":\"3\",\"cat_periodopago_fechainicio\":\"2018-08-01 00:00:00\",\"cat_periodopago_status\":1,\"cat_periodopago_fecharegistro\":\"2018-08-01 16:11:20\"}', '2018-08-01 16:11:20');
INSERT INTO `reg_movimientos` VALUES (216, 'success', 'update', 'cat_periodopago', 60, '{\"cat_periodopago_nombre\":\"Quincenal\",\"cat_periodopago_periodo\":\"0.5\",\"cat_periodopago_diascondonados\":\"3\",\"cat_periodopago_fechainicio\":\"2018-06-06 00:00:00\",\"cat_periodopago_status\":1,\"cat_periodopago_fechaactualiza\":\"2018-08-01 16:11:49\"}', '2018-08-01 16:11:49');
INSERT INTO `reg_movimientos` VALUES (217, 'success', 'update', 'cat_periodopago', 60, '{\"cat_periodopago_nombre\":\"Diario\",\"cat_periodopago_periodo\":\"0.033333\",\"cat_periodopago_diascondonados\":\"-1\",\"cat_periodopago_fechainicio\":\"2018-06-19 00:00:00\",\"cat_periodopago_status\":1,\"cat_periodopago_fechaactualiza\":\"2018-08-01 16:22:31\"}', '2018-08-01 16:22:32');
INSERT INTO `reg_movimientos` VALUES (218, 'success', 'update', 'cat_periodopago', 60, '{\"cat_periodopago_nombre\":\"Quincenal\",\"cat_periodopago_periodo\":\"0.5\",\"cat_periodopago_diascondonados\":\"3\",\"cat_periodopago_fechainicio\":\"2018-06-06 00:00:00\",\"cat_periodopago_status\":1,\"cat_periodopago_fechaactualiza\":\"2018-08-01 16:24:09\"}', '2018-08-01 16:24:09');
INSERT INTO `reg_movimientos` VALUES (219, 'success', 'update', 'cat_periodopago', 60, '{\"cat_periodopago_nombre\":\"Quincenal\",\"cat_periodopago_periodo\":\"0.5\",\"cat_periodopago_diascondonados\":\"3\",\"cat_periodopago_fechainicio\":\"2018-06-06 00:00:00\",\"cat_periodopago_status\":1,\"cat_periodopago_fechaactualiza\":\"2018-08-01 16:25:22\"}', '2018-08-01 16:25:22');
INSERT INTO `reg_movimientos` VALUES (220, 'success', 'update', 'cat_periodopago', 60, '{\"cat_periodopago_nombre\":\"BIMESTRAL\",\"cat_periodopago_periodo\":\"2\",\"cat_periodopago_diascondonados\":\"5\",\"cat_periodopago_fechainicio\":\"2018-07-01 00:00:00\",\"cat_periodopago_status\":1,\"cat_periodopago_fechaactualiza\":\"2018-08-01 16:25:28\"}', '2018-08-01 16:25:28');
INSERT INTO `reg_movimientos` VALUES (221, 'success', 'insert', 'cat_cobros', 60, '{\"cat_cobros_nombre\":\"aaa\",\"cat_cobros_porcentaje\":\"20\",\"cat_cobros_porcentajedecimal\":\"0.2\",\"cat_cobros_status\":1,\"cat_cobros_fecharegistro\":\"2018-08-01 17:03:15\"}', '2018-08-01 17:03:15');
INSERT INTO `reg_movimientos` VALUES (222, 'success', 'delete', 'cat_cobros', 60, '{\"cat_cobros_status\":\"0\"}', '2018-08-01 17:25:12');
INSERT INTO `reg_movimientos` VALUES (223, 'success', 'delete', 'cat_cobros', 60, '{\"cat_cobros_status\":\"1\"}', '2018-08-01 17:25:15');
INSERT INTO `reg_movimientos` VALUES (224, 'success', 'update', 'cat_cobros', 60, '{\"cat_cobros_nombre\":\"5000\",\"cat_cobros_porcentaje\":\"20\",\"cat_cobros_porcentajedecimal\":\"0.2\",\"cat_cobros_status\":1,\"cat_cobros_fechaactualiza\":\"2018-08-01 17:29:26\"}', '2018-08-01 17:29:26');
INSERT INTO `reg_movimientos` VALUES (225, 'error', 'insert', 'cat_cobros', 60, '{\"cat_cobros_nombre\":\"2005\",\"cat_cobros_porcentaje\":\"15\",\"cat_cobros_porcentajedecimal\":\"0.15\",\"cat_cobros_status\":1,\"cat_cobros_fecharegistro\":\"2018-08-01 17:33:50\"}', '2018-08-01 17:33:50');
INSERT INTO `reg_movimientos` VALUES (226, 'error', 'insert', 'cat_cobros', 60, '{\"cat_cobros_nombre\":\"2005\",\"cat_cobros_porcentaje\":\"15\",\"cat_cobros_porcentajedecimal\":\"0.15\",\"cat_cobros_status\":1,\"cat_cobros_fecharegistro\":\"2018-08-01 17:35:28\"}', '2018-08-01 17:35:28');
INSERT INTO `reg_movimientos` VALUES (227, 'error', 'insert', 'cat_cobros', 60, '{\"cat_cobros_nombre\":\"2005\",\"cat_cobros_porcentaje\":\"15\",\"cat_cobros_porcentajedecimal\":\"0.15\",\"cat_cobros_status\":1,\"cat_cobros_fecharegistro\":\"2018-08-01 17:35:37\"}', '2018-08-01 17:35:37');
INSERT INTO `reg_movimientos` VALUES (228, 'success', 'insert', 'cat_cobros', 60, '{\"cat_cobros_nombre\":\"2005\",\"cat_cobros_porcentaje\":\"16\",\"cat_cobros_porcentajedecimal\":\"0.16\",\"cat_cobros_status\":1,\"cat_cobros_fecharegistro\":\"2018-08-01 17:35:57\"}', '2018-08-01 17:35:57');
INSERT INTO `reg_movimientos` VALUES (229, 'error', 'insert', 'cat_cobros', 60, '{\"cat_cobros_nombre\":\"5000\",\"cat_cobros_porcentaje\":\"20\",\"cat_cobros_porcentajedecimal\":\"0.2\",\"cat_cobros_status\":1,\"cat_cobros_fecharegistro\":\"2018-08-01 17:36:12\"}', '2018-08-01 17:36:12');
INSERT INTO `reg_movimientos` VALUES (230, 'error', 'insert', 'cat_cobros', 60, '{\"cat_cobros_nombre\":\"5000\",\"cat_cobros_porcentaje\":\"20\",\"cat_cobros_porcentajedecimal\":\"0.2\",\"cat_cobros_status\":1,\"cat_cobros_fecharegistro\":\"2018-08-01 17:36:13\"}', '2018-08-01 17:36:13');
INSERT INTO `reg_movimientos` VALUES (231, 'error', 'insert', 'cat_cobros', 60, '{\"cat_cobros_nombre\":\"5000\",\"cat_cobros_porcentaje\":\"20\",\"cat_cobros_porcentajedecimal\":\"0.2\",\"cat_cobros_status\":1,\"cat_cobros_fecharegistro\":\"2018-08-01 17:36:14\"}', '2018-08-01 17:36:14');
INSERT INTO `reg_movimientos` VALUES (232, 'error', 'insert', 'cat_cobros', 60, '{\"cat_cobros_nombre\":\"5000\",\"cat_cobros_porcentaje\":\"20\",\"cat_cobros_porcentajedecimal\":\"0.2\",\"cat_cobros_status\":1,\"cat_cobros_fecharegistro\":\"2018-08-01 17:36:14\"}', '2018-08-01 17:36:14');
INSERT INTO `reg_movimientos` VALUES (233, 'success', 'delete', 'cat_cobros', 60, '{\"cat_cobros_status\":\"0\"}', '2018-08-01 17:36:21');
INSERT INTO `reg_movimientos` VALUES (234, 'success', 'delete', 'cat_cobros', 60, '{\"cat_cobros_status\":\"1\"}', '2018-08-01 17:36:23');
INSERT INTO `reg_movimientos` VALUES (235, 'error', 'insert', 'cat_empresa', 60, '{\"cat_empresa_nombre\":\"ABC12\",\"cat_empresa_status\":1,\"cat_empresa_fecharegistro\":\"2018-08-01 17:38:21\"}', '2018-08-01 17:38:21');
INSERT INTO `reg_movimientos` VALUES (236, 'error', 'insert', 'cat_empresa', 60, '{\"cat_empresa_nombre\":\"abc12\",\"cat_empresa_status\":1,\"cat_empresa_fecharegistro\":\"2018-08-01 17:38:33\"}', '2018-08-01 17:38:33');
INSERT INTO `reg_movimientos` VALUES (237, 'success', 'update', 'cat_empresa', 60, '{\"cat_empresa_nombre\":\"Empresa 1\",\"cat_empresa_status\":1,\"cat_empresa_fechaactualiza\":\"2018-08-01 17:38:42\"}', '2018-08-01 17:38:42');
INSERT INTO `reg_movimientos` VALUES (238, 'success', 'delete', 'cat_empresa', 60, '{\"cat_empresa_status\":\"1\"}', '2018-08-01 17:38:53');
INSERT INTO `reg_movimientos` VALUES (239, 'success', 'update', 'cat_empresa', 60, '{\"cat_empresa_nombre\":\"23AVP\",\"cat_empresa_status\":1,\"cat_empresa_fechaactualiza\":\"2018-08-01 17:38:58\"}', '2018-08-01 17:38:58');
INSERT INTO `reg_movimientos` VALUES (240, 'success', 'update', 'cat_empresa', 60, '{\"cat_empresa_nombre\":\"LINEAS DE TRANSPORTE URBANO Y SUBURBANO DE BC\",\"cat_empresa_status\":1,\"cat_empresa_fechaactualiza\":\"2018-08-01 17:39:09\"}', '2018-08-01 17:39:09');
INSERT INTO `reg_movimientos` VALUES (241, 'error', 'insert', 'cat_empresa', 60, '{\"cat_empresa_nombre\":\"Empresa 2\",\"cat_empresa_status\":1,\"cat_empresa_fecharegistro\":\"2018-08-01 17:39:20\"}', '2018-08-01 17:39:20');
INSERT INTO `reg_movimientos` VALUES (242, 'error', 'insert', 'cat_almacen', 60, '{\"cat_almacen_nombre\":\"23ewsd\",\"cat_almacen_status\":1,\"cat_almacen_fecharegistro\":\"2018-08-01 17:46:47\"}', '2018-08-01 17:46:47');
INSERT INTO `reg_movimientos` VALUES (243, 'error', 'insert', 'cat_almacen', 60, '{\"cat_almacen_nombre\":\"23ewsd\",\"cat_almacen_status\":1,\"cat_almacen_fecharegistro\":\"2018-08-01 17:48:01\"}', '2018-08-01 17:48:01');
INSERT INTO `reg_movimientos` VALUES (244, 'error', 'insert', 'cat_almacen', 60, '{\"cat_almacen_nombre\":\"23ewsd\",\"cat_almacen_status\":1,\"cat_almacen_fecharegistro\":\"2018-08-01 17:48:13\"}', '2018-08-01 17:48:13');
INSERT INTO `reg_movimientos` VALUES (245, 'success', 'update', 'cat_unidades', 60, '{\"cat_unidades_numeconomico\":\"1002\",\"cat_unidades_ano\":\"1978\",\"cat_unidades_id_placas\":\"8\",\"cat_unidades_id_marca\":\"6\",\"cat_unidades_id_modelo\":\"12\",\"cat_unidades_id_servicio\":\"13\",\"cat_unidades_id_rol\":\"14\",\"cat_unidades_id_empresa\":\"13\",\"cat_unidades_id_almacen\":\"5\",\"cat_unidades_id_zona\":\"5\",\"cat_unidades_status\":1,\"cat_unidades_fechaactualizada\":\"2018-08-02 18:34:26\"}', '2018-08-02 18:34:26');
INSERT INTO `reg_movimientos` VALUES (246, 'success', 'update', 'cat_unidades', 60, '{\"cat_unidades_numeconomico\":\"1002\",\"cat_unidades_ano\":\"1978\",\"cat_unidades_id_placas\":\"8\",\"cat_unidades_id_marca\":\"6\",\"cat_unidades_id_modelo\":\"12\",\"cat_unidades_id_servicio\":\"13\",\"cat_unidades_id_rol\":\"14\",\"cat_unidades_id_empresa\":\"13\",\"cat_unidades_id_almacen\":\"5\",\"cat_unidades_id_zona\":\"5\",\"cat_unidades_status\":1,\"cat_unidades_fechaactualizada\":\"2018-08-02 18:39:41\"}', '2018-08-02 18:39:41');
INSERT INTO `reg_movimientos` VALUES (247, 'error', 'insert', 'cat_unidades', 60, '{\"cat_unidades_numeconomico\":\"1002\",\"cat_unidades_ano\":\"12334\",\"cat_unidades_id_placas\":\"5\",\"cat_unidades_id_marca\":\"7\",\"cat_unidades_id_modelo\":\"13\",\"cat_unidades_id_servicio\":\"14\",\"cat_unidades_id_rol\":\"15\",\"cat_unidades_id_empresa\":\"15\",\"cat_unidades_id_almacen\":\"6\",\"cat_unidades_id_zona\":\"6\",\"cat_unidades_status\":1,\"cat_unidades_fecharegistro\":\"2018-08-02 18:40:17\"}', '2018-08-02 18:40:17');
INSERT INTO `reg_movimientos` VALUES (248, 'success', 'insert', 'cat_unidades', 60, '{\"cat_unidades_numeconomico\":\"10023\",\"cat_unidades_ano\":\"12334\",\"cat_unidades_id_placas\":\"5\",\"cat_unidades_id_marca\":\"7\",\"cat_unidades_id_modelo\":\"13\",\"cat_unidades_id_servicio\":\"14\",\"cat_unidades_id_rol\":\"15\",\"cat_unidades_id_empresa\":\"15\",\"cat_unidades_id_almacen\":\"6\",\"cat_unidades_id_zona\":\"6\",\"cat_unidades_status\":1,\"cat_unidades_fecharegistro\":\"2018-08-02 18:40:25\"}', '2018-08-02 18:40:25');
INSERT INTO `reg_movimientos` VALUES (249, 'success', 'update', 'cat_unidades', 60, '{\"cat_unidades_numeconomico\":\"1002\",\"cat_unidades_ano\":\"1978\",\"cat_unidades_id_placas\":\"8\",\"cat_unidades_id_marca\":\"6\",\"cat_unidades_id_modelo\":\"12\",\"cat_unidades_id_servicio\":\"13\",\"cat_unidades_id_rol\":\"14\",\"cat_unidades_id_empresa\":\"13\",\"cat_unidades_id_almacen\":\"5\",\"cat_unidades_id_zona\":\"5\",\"cat_unidades_status\":1,\"cat_unidades_fechaactualizada\":\"2018-08-02 19:05:36\"}', '2018-08-02 19:05:36');
INSERT INTO `reg_movimientos` VALUES (250, 'error', 'insert', 'cat_unidades', 60, '{\"cat_unidades_numeconomico\":\"1002\",\"cat_unidades_ano\":\"1981\",\"cat_unidades_id_placas\":\"8\",\"cat_unidades_id_marca\":\"7\",\"cat_unidades_id_modelo\":\"13\",\"cat_unidades_id_servicio\":\"14\",\"cat_unidades_id_rol\":\"15\",\"cat_unidades_id_empresa\":\"15\",\"cat_unidades_id_almacen\":\"6\",\"cat_unidades_id_zona\":\"5\",\"cat_unidades_status\":1,\"cat_unidades_fecharegistro\":\"2018-08-02 19:06:03\"}', '2018-08-02 19:06:03');
INSERT INTO `reg_movimientos` VALUES (251, 'error', 'insert', 'cat_unidades', 60, '{\"cat_unidades_numeconomico\":\"1002\",\"cat_unidades_ano\":\"1981\",\"cat_unidades_id_placas\":\"5\",\"cat_unidades_id_marca\":\"7\",\"cat_unidades_id_modelo\":\"13\",\"cat_unidades_id_servicio\":\"14\",\"cat_unidades_id_rol\":\"15\",\"cat_unidades_id_empresa\":\"15\",\"cat_unidades_id_almacen\":\"6\",\"cat_unidades_id_zona\":\"5\",\"cat_unidades_status\":1,\"cat_unidades_fecharegistro\":\"2018-08-02 19:06:16\"}', '2018-08-02 19:06:16');
INSERT INTO `reg_movimientos` VALUES (252, 'error', 'insert', 'cat_unidades', 60, '{\"cat_unidades_numeconomico\":\"1002\",\"cat_unidades_ano\":\"1981\",\"cat_unidades_id_placas\":\"4\",\"cat_unidades_id_marca\":\"7\",\"cat_unidades_id_modelo\":\"13\",\"cat_unidades_id_servicio\":\"14\",\"cat_unidades_id_rol\":\"15\",\"cat_unidades_id_empresa\":\"15\",\"cat_unidades_id_almacen\":\"6\",\"cat_unidades_id_zona\":\"5\",\"cat_unidades_status\":1,\"cat_unidades_fecharegistro\":\"2018-08-02 19:06:23\"}', '2018-08-02 19:06:23');
INSERT INTO `reg_movimientos` VALUES (253, 'success', 'insert', 'cat_almacen', 60, '{\"cat_almacen_nombre\":\"1222\",\"cat_almacen_status\":1,\"cat_almacen_fecharegistro\":\"2018-08-03 11:19:06\"}', '2018-08-03 11:19:06');
INSERT INTO `reg_movimientos` VALUES (254, 'success', 'insert', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_id_permisionario\":\"1\",\"cat_vincularpermisionario_id_unidad\":\"8\",\"cat_vincularpermisionario_id_operadores\":\"9\",\"cat_vincularpermisionario_id_placa\":\"8\",\"cat_vincularpermisionario_id_periodopago\":\"10\",\"cat_vincularpermisionario_id_cobros\":\"3\",\"cat_vincularpermisionario_fechainicio\":\"2018-08-03 11:24:39\",\"cat_vincularpermisionario_status\":1,\"cat_vincularpermisionario_fecharegistro\":\"2018-08-03 11:24:39\"}', '2018-08-03 11:24:39');
INSERT INTO `reg_movimientos` VALUES (255, 'success', 'insert', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_id_permisionario\":\"1\",\"cat_vincularpermisionario_id_unidad\":\"8\",\"cat_vincularpermisionario_id_operadores\":\"9\",\"cat_vincularpermisionario_id_placa\":\"8\",\"cat_vincularpermisionario_id_periodopago\":\"10\",\"cat_vincularpermisionario_id_cobros\":\"3\",\"cat_vincularpermisionario_fechainicio\":\"2018-08-03 11:51:27\",\"cat_vincularpermisionario_status\":1,\"cat_vincularpermisionario_fecharegistro\":\"2018-08-03 11:51:27\"}', '2018-08-03 11:51:27');
INSERT INTO `reg_movimientos` VALUES (256, 'success', 'insert', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_id_permisionario\":\"1\",\"cat_vincularpermisionario_id_unidad\":\"8\",\"cat_vincularpermisionario_id_operadores\":\"9\",\"cat_vincularpermisionario_id_placa\":\"8\",\"cat_vincularpermisionario_id_periodopago\":\"10\",\"cat_vincularpermisionario_id_cobros\":\"3\",\"cat_vincularpermisionario_fechainicio\":\"2018-08-03 11:51:40\",\"cat_vincularpermisionario_status\":1,\"cat_vincularpermisionario_fecharegistro\":\"2018-08-03 11:51:40\"}', '2018-08-03 11:51:40');
INSERT INTO `reg_movimientos` VALUES (257, 'success', 'insert', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_id_permisionario\":\"1\",\"cat_vincularpermisionario_id_unidad\":\"8\",\"cat_vincularpermisionario_id_operadores\":\"9\",\"cat_vincularpermisionario_id_placa\":\"8\",\"cat_vincularpermisionario_id_periodopago\":\"10\",\"cat_vincularpermisionario_id_cobros\":\"3\",\"cat_vincularpermisionario_fechainicio\":\"2018-08-03 11:51:50\",\"cat_vincularpermisionario_status\":1,\"cat_vincularpermisionario_fecharegistro\":\"2018-08-03 11:51:50\"}', '2018-08-03 11:51:50');
INSERT INTO `reg_movimientos` VALUES (258, 'success', 'insert', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_id_permisionario\":\"1\",\"cat_vincularpermisionario_id_unidad\":\"8\",\"cat_vincularpermisionario_id_operadores\":\"9\",\"cat_vincularpermisionario_id_placa\":\"8\",\"cat_vincularpermisionario_id_periodopago\":\"10\",\"cat_vincularpermisionario_id_cobros\":\"3\",\"cat_vincularpermisionario_fechainicio\":\"2018-08-03 11:51:59\",\"cat_vincularpermisionario_status\":1,\"cat_vincularpermisionario_fecharegistro\":\"2018-08-03 11:51:59\"}', '2018-08-03 11:51:59');
INSERT INTO `reg_movimientos` VALUES (259, 'success', 'insert', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_id_permisionario\":\"1\",\"cat_vincularpermisionario_id_unidad\":\"8\",\"cat_vincularpermisionario_id_operadores\":\"9\",\"cat_vincularpermisionario_id_placa\":\"8\",\"cat_vincularpermisionario_id_periodopago\":\"10\",\"cat_vincularpermisionario_id_cobros\":\"3\",\"cat_vincularpermisionario_fechainicio\":\"2018-08-03 11:52:26\",\"cat_vincularpermisionario_status\":1,\"cat_vincularpermisionario_fecharegistro\":\"2018-08-03 11:52:26\"}', '2018-08-03 11:52:26');
INSERT INTO `reg_movimientos` VALUES (260, 'success', 'insert', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_id_permisionario\":\"1\",\"cat_vincularpermisionario_id_unidad\":\"8\",\"cat_vincularpermisionario_id_operadores\":\"9\",\"cat_vincularpermisionario_id_placa\":\"8\",\"cat_vincularpermisionario_id_periodopago\":\"10\",\"cat_vincularpermisionario_id_cobros\":\"3\",\"cat_vincularpermisionario_fechainicio\":\"2018-08-03 11:52:55\",\"cat_vincularpermisionario_status\":1,\"cat_vincularpermisionario_fecharegistro\":\"2018-08-03 11:52:55\"}', '2018-08-03 11:52:55');
INSERT INTO `reg_movimientos` VALUES (261, 'success', 'update', 'cat_unidades', 60, '{\"cat_unidades_numeconomico\":\"1002\",\"cat_unidades_ano\":\"1978\",\"cat_unidades_id_marca\":\"6\",\"cat_unidades_id_modelo\":\"12\",\"cat_unidades_id_servicio\":\"13\",\"cat_unidades_id_rol\":\"14\",\"cat_unidades_id_empresa\":\"13\",\"cat_unidades_id_almacen\":\"5\",\"cat_unidades_id_zona\":\"5\",\"cat_unidades_status\":1,\"cat_unidades_fechaactualizada\":\"2018-08-03 13:44:42\"}', '2018-08-03 13:44:42');
INSERT INTO `reg_movimientos` VALUES (262, 'success', 'delete', 'cat_unidades', 60, '{\"cat_unidades_status\":\"0\"}', '2018-08-03 13:44:46');
INSERT INTO `reg_movimientos` VALUES (263, 'success', 'delete', 'cat_unidades', 60, '{\"cat_unidades_status\":\"1\"}', '2018-08-03 13:44:47');
INSERT INTO `reg_movimientos` VALUES (264, 'success', 'insert', 'cat_placas_unidades', 60, '{\"cat_placas_numero\":\"sss\",\"cat_placas_status\":1,\"cat_placas_fecharegistro\":\"2018-08-03 14:38:21\"}', '2018-08-03 14:38:21');
INSERT INTO `reg_movimientos` VALUES (265, 'success', 'update', 'cat_placas_unidades', 60, '{\"cat_placas_numero\":\"sss12333\",\"cat_placas_status\":1,\"cat_placas_fechaactualiza\":\"2018-08-03 14:38:31\"}', '2018-08-03 14:38:31');
INSERT INTO `reg_movimientos` VALUES (266, 'success', 'insert', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_id_permisionario\":\"1\",\"cat_vincularpermisionario_id_unidad\":\"8\",\"cat_vincularpermisionario_id_operadores\":\"3\",\"cat_vincularpermisionario_id_placa\":\"4\",\"cat_vincularpermisionario_id_periodopago\":\"7\",\"cat_vincularpermisionario_id_cobros\":\"5\",\"cat_vincularpermisionario_fechainicio\":\"2018-08-01 00:00:00\",\"cat_vincularpermisionario_status\":1,\"cat_vincularpermisionario_fecharegistro\":\"2018-08-03 15:12:03\"}', '2018-08-03 15:12:03');
INSERT INTO `reg_movimientos` VALUES (267, 'success', 'insert', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_id_permisionario\":\"1\",\"cat_vincularpermisionario_id_unidad\":\"9\",\"cat_vincularpermisionario_id_operadores\":\"3\",\"cat_vincularpermisionario_id_placa\":\"4\",\"cat_vincularpermisionario_id_periodopago\":\"7\",\"cat_vincularpermisionario_id_cobros\":\"3\",\"cat_vincularpermisionario_fechainicio\":\"2018-08-01 00:00:00\",\"cat_vincularpermisionario_status\":1,\"cat_vincularpermisionario_fecharegistro\":\"2018-08-03 15:14:18\"}', '2018-08-03 15:14:18');
INSERT INTO `reg_movimientos` VALUES (268, 'success', 'insert', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_id_permisionario\":\"1\",\"cat_vincularpermisionario_id_unidad\":\"9\",\"cat_vincularpermisionario_id_operadores\":\"3\",\"cat_vincularpermisionario_id_placa\":\"4\",\"cat_vincularpermisionario_id_periodopago\":\"7\",\"cat_vincularpermisionario_id_cobros\":\"6\",\"cat_vincularpermisionario_fechainicio\":\"2018-08-01 00:00:00\",\"cat_vincularpermisionario_status\":1,\"cat_vincularpermisionario_fecharegistro\":\"2018-08-03 15:14:31\"}', '2018-08-03 15:14:31');
INSERT INTO `reg_movimientos` VALUES (269, 'success', 'insert', 'cat_cobros', 60, '{\"cat_cobros_nombre\":\"1001\",\"cat_cobros_porcentaje\":\"50\",\"cat_cobros_porcentajedecimal\":\"0.5\",\"cat_cobros_status\":1,\"cat_cobros_fecharegistro\":\"2018-08-03 15:17:50\"}', '2018-08-03 15:17:50');
INSERT INTO `reg_movimientos` VALUES (270, 'success', 'update', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_status\":0,\"cat_vincularpermisionario_fechainicio\":null}', '2018-08-03 15:18:50');
INSERT INTO `reg_movimientos` VALUES (271, 'success', 'insert', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_id_permisionario\":\"1\",\"cat_vincularpermisionario_id_unidad\":\"9\",\"cat_vincularpermisionario_id_operadores\":\"3\",\"cat_vincularpermisionario_id_placa\":\"4\",\"cat_vincularpermisionario_id_periodopago\":\"7\",\"cat_vincularpermisionario_id_cobros\":\"10\",\"cat_vincularpermisionario_fechainicio\":\"2018-08-01 00:00:00\",\"cat_vincularpermisionario_status\":1,\"cat_vincularpermisionario_fecharegistro\":\"2018-08-03 15:18:50\"}', '2018-08-03 15:18:50');
INSERT INTO `reg_movimientos` VALUES (272, 'success', 'insert', 'cat_operadores', 60, '{\"cat_operadores_nombre\":\"Juan Garcia\",\"cat_operadores_telefono\":\"667542342324\",\"cat_operadores_direccion\":\"conocida\",\"cat_operadores_id_zona\":\"6\",\"cat_operadores_status\":1,\"cat_operadores_fecharegistro\":\"2018-08-03 16:50:10\"}', '2018-08-03 16:50:10');
INSERT INTO `reg_movimientos` VALUES (273, 'success', 'insert', 'cat_cobros', 60, '{\"cat_cobros_nombre\":\"123\",\"cat_cobros_porcentaje\":\"30\",\"cat_cobros_porcentajedecimal\":\".3\",\"cat_cobros_status\":1,\"cat_cobros_fecharegistro\":\"2018-08-03 16:50:44\"}', '2018-08-03 16:50:44');
INSERT INTO `reg_movimientos` VALUES (274, 'error', 'insert', 'cat_operadores', 60, '{\"cat_operadores_nombre\":\"Juan Garcia\",\"cat_operadores_telefono\":\"6648082285\",\"cat_operadores_direccion\":\"Conocida\",\"cat_operadores_id_zona\":\"6\",\"cat_operadores_status\":1,\"cat_operadores_fecharegistro\":\"2018-08-03 16:57:57\"}', '2018-08-03 16:57:57');
INSERT INTO `reg_movimientos` VALUES (275, 'success', 'insert', 'cat_operadores', 60, '{\"cat_operadores_nombre\":\"Jose Carreon\",\"cat_operadores_telefono\":\"6648082285\",\"cat_operadores_direccion\":\"Julios ters\",\"cat_operadores_id_zona\":\"6\",\"cat_operadores_status\":1,\"cat_operadores_fecharegistro\":\"2018-08-03 16:59:14\"}', '2018-08-03 16:59:14');
INSERT INTO `reg_movimientos` VALUES (276, 'success', 'insert', 'cat_operadores', 60, '{\"cat_operadores_nombre\":\"123456asdqew\",\"cat_operadores_telefono\":\"6648081285\",\"cat_operadores_direccion\":\"Concidicima\",\"cat_operadores_id_zona\":\"12\",\"cat_operadores_status\":1,\"cat_operadores_fecharegistro\":\"2018-08-03 17:00:10\"}', '2018-08-03 17:00:10');
INSERT INTO `reg_movimientos` VALUES (277, 'success', 'insert', 'cat_operadores', 60, '{\"cat_operadores_nombre\":\"4444\",\"cat_operadores_telefono\":\"444\",\"cat_operadores_direccion\":\"444\",\"cat_operadores_id_zona\":\"6\",\"cat_operadores_status\":1,\"cat_operadores_fecharegistro\":\"2018-08-03 17:00:36\"}', '2018-08-03 17:00:36');
INSERT INTO `reg_movimientos` VALUES (278, 'success', 'insert', 'cat_operadores', 60, '{\"cat_operadores_nombre\":\"12qwsa|\",\"cat_operadores_telefono\":\"6648082285\",\"cat_operadores_direccion\":\"Concidicima\",\"cat_operadores_id_zona\":\"7\",\"cat_operadores_status\":1,\"cat_operadores_fecharegistro\":\"2018-08-03 17:00:59\"}', '2018-08-03 17:00:59');
INSERT INTO `reg_movimientos` VALUES (279, 'success', 'insert', 'cat_operadores', 60, '{\"cat_operadores_nombre\":\"juan aguirre\",\"cat_operadores_telefono\":\"6648082285\",\"cat_operadores_direccion\":\"huoions\",\"cat_operadores_id_zona\":\"6\",\"cat_operadores_status\":1,\"cat_operadores_fecharegistro\":\"2018-08-03 17:03:34\"}', '2018-08-03 17:03:34');
INSERT INTO `reg_movimientos` VALUES (280, 'error', 'insert', 'cat_cobros', 60, '{\"cat_cobros_nombre\":\"3000\",\"cat_cobros_porcentaje\":\"20\",\"cat_cobros_porcentajedecimal\":\".2\",\"cat_cobros_status\":1,\"cat_cobros_fecharegistro\":\"2018-08-03 17:09:42\"}', '2018-08-03 17:09:42');
INSERT INTO `reg_movimientos` VALUES (281, 'success', 'delete', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_status\":0,\"cat_vincularpermisionario_fechainicio\":null,\"cat_vincularpermisionario_id_placa\":\"4\"}', '2018-08-06 12:01:14');
INSERT INTO `reg_movimientos` VALUES (282, 'success', 'delete', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_status\":\"1\",\"cat_vincularpermisionario_fechainicio\":\"2018-08-06 12:01:14\"}', '2018-08-06 12:01:14');
INSERT INTO `reg_movimientos` VALUES (283, 'success', 'delete', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_status\":\"0\"}', '2018-08-06 12:02:02');
INSERT INTO `reg_movimientos` VALUES (284, 'success', 'delete', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_status\":0,\"cat_vincularpermisionario_fechainicio\":null,\"cat_vincularpermisionario_id_placa\":\"4\"}', '2018-08-06 12:02:25');
INSERT INTO `reg_movimientos` VALUES (285, 'success', 'delete', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_status\":\"1\",\"cat_vincularpermisionario_fechainicio\":\"2018-08-06 12:02:25\"}', '2018-08-06 12:02:25');
INSERT INTO `reg_movimientos` VALUES (286, 'success', 'delete', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_status\":\"0\"}', '2018-08-06 14:03:44');
INSERT INTO `reg_movimientos` VALUES (287, 'success', 'delete', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_status\":0,\"cat_vincularpermisionario_fechainicio\":null,\"cat_vincularpermisionario_id_placa\":\"8\"}', '2018-08-06 14:03:55');
INSERT INTO `reg_movimientos` VALUES (288, 'success', 'delete', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_status\":\"1\",\"cat_vincularpermisionario_fechainicio\":\"2018-08-06 14:03:55\"}', '2018-08-06 14:03:55');
INSERT INTO `reg_movimientos` VALUES (289, 'success', 'delete', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_status\":\"0\"}', '2018-08-06 17:57:23');
INSERT INTO `reg_movimientos` VALUES (290, 'success', 'update', 'cat_menu', 60, '\"60\"', '2018-08-07 10:50:36');
INSERT INTO `reg_movimientos` VALUES (291, 'success', 'update', 'cat_menu', 60, '\"60\"', '2018-08-07 10:51:17');
INSERT INTO `reg_movimientos` VALUES (292, 'success', 'update', 'cat_menu', 60, '\"60\"', '2018-08-07 11:04:09');
INSERT INTO `reg_movimientos` VALUES (293, 'success', 'update', 'cat_menu', 60, '\"60\"', '2018-08-07 11:16:01');
INSERT INTO `reg_movimientos` VALUES (294, 'success', 'update', 'cat_menu', 60, '\"60\"', '2018-08-07 11:17:23');
INSERT INTO `reg_movimientos` VALUES (295, 'success', 'update', 'cat_menu', 60, '\"60\"', '2018-08-07 11:33:16');
INSERT INTO `reg_movimientos` VALUES (296, 'success', 'update', 'cat_menu', 60, '\"60\"', '2018-08-07 11:37:30');
INSERT INTO `reg_movimientos` VALUES (297, 'success', 'update', 'cat_menu', 60, '\"60\"', '2018-08-07 11:37:52');
INSERT INTO `reg_movimientos` VALUES (298, 'success', 'update', 'cat_menu', 60, '\"60\"', '2018-08-07 11:40:33');
INSERT INTO `reg_movimientos` VALUES (299, 'success', 'delete', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_status\":0,\"cat_vincularpermisionario_fechainicio\":null,\"cat_vincularpermisionario_id_placa\":\"4\"}', '2018-08-07 11:59:25');
INSERT INTO `reg_movimientos` VALUES (300, 'success', 'delete', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_status\":\"1\",\"cat_vincularpermisionario_fechainicio\":\"2018-08-07 11:59:25\"}', '2018-08-07 11:59:25');
INSERT INTO `reg_movimientos` VALUES (301, 'success', 'delete', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_status\":\"0\"}', '2018-08-07 11:59:28');
INSERT INTO `reg_movimientos` VALUES (302, 'success', 'update', 'cat_menu', 60, '\"60\"', '2018-08-07 14:33:52');
INSERT INTO `reg_movimientos` VALUES (303, 'success', 'update', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_status\":0,\"cat_vincularpermisionario_fechainicio\":null}', '2018-08-07 16:24:20');
INSERT INTO `reg_movimientos` VALUES (304, 'success', 'insert', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_id_permisionario\":\"1\",\"cat_vincularpermisionario_id_unidad\":\"10\",\"cat_vincularpermisionario_id_operadores\":\"3\",\"cat_vincularpermisionario_id_placa\":\"4\",\"cat_vincularpermisionario_id_periodopago\":\"7\",\"cat_vincularpermisionario_id_cobros\":\"4\",\"cat_vincularpermisionario_fechainicio\":\"2018-08-01 00:00:00\",\"cat_vincularpermisionario_status\":1,\"cat_vincularpermisionario_fecharegistro\":\"2018-08-07 16:24:20\"}', '2018-08-07 16:24:20');
INSERT INTO `reg_movimientos` VALUES (305, 'error', 'insert', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_id_permisionario\":\"1\",\"cat_vincularpermisionario_id_unidad\":\"10\",\"cat_vincularpermisionario_id_operadores\":\"3\",\"cat_vincularpermisionario_id_placa\":\"4\",\"cat_vincularpermisionario_id_periodopago\":\"7\",\"cat_vincularpermisionario_id_cobros\":\"4\",\"cat_vincularpermisionario_fechainicio\":\"2018-08-01 00:00:00\",\"cat_vincularpermisionario_status\":1,\"cat_vincularpermisionario_fecharegistro\":\"2018-08-07 16:25:44\"}', '2018-08-07 16:25:44');
INSERT INTO `reg_movimientos` VALUES (306, 'success', 'update', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_status\":0,\"cat_vincularpermisionario_fechainicio\":null}', '2018-08-07 16:26:14');
INSERT INTO `reg_movimientos` VALUES (307, 'success', 'insert', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_id_permisionario\":\"1\",\"cat_vincularpermisionario_id_unidad\":\"10\",\"cat_vincularpermisionario_id_operadores\":\"3\",\"cat_vincularpermisionario_id_placa\":\"5\",\"cat_vincularpermisionario_id_periodopago\":\"7\",\"cat_vincularpermisionario_id_cobros\":\"4\",\"cat_vincularpermisionario_fechainicio\":\"2018-08-01 00:00:00\",\"cat_vincularpermisionario_status\":1,\"cat_vincularpermisionario_fecharegistro\":\"2018-08-07 16:26:14\"}', '2018-08-07 16:26:14');
INSERT INTO `reg_movimientos` VALUES (308, 'success', 'update', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_status\":0,\"cat_vincularpermisionario_fechainicio\":null}', '2018-08-07 17:47:16');
INSERT INTO `reg_movimientos` VALUES (309, 'success', 'insert', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_id_permisionario\":\"1\",\"cat_vincularpermisionario_id_unidad\":\"10\",\"cat_vincularpermisionario_id_operadores\":\"3\",\"cat_vincularpermisionario_id_placa\":\"4\",\"cat_vincularpermisionario_id_periodopago\":\"7\",\"cat_vincularpermisionario_id_cobros\":\"3\",\"cat_vincularpermisionario_fechainicio\":\"2018-07-08 00:00:00\",\"cat_vincularpermisionario_status\":1,\"cat_vincularpermisionario_fecharegistro\":\"2018-08-07 17:47:16\"}', '2018-08-07 17:47:16');
INSERT INTO `reg_movimientos` VALUES (310, 'success', 'update', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_status\":0,\"cat_vincularpermisionario_fechainicio\":null}', '2018-08-07 18:20:22');
INSERT INTO `reg_movimientos` VALUES (311, 'success', 'insert', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_id_permisionario\":\"14\",\"cat_vincularpermisionario_id_unidad\":\"13\",\"cat_vincularpermisionario_id_operadores\":\"4\",\"cat_vincularpermisionario_id_placa\":\"5\",\"cat_vincularpermisionario_id_periodopago\":\"7\",\"cat_vincularpermisionario_id_cobros\":\"4\",\"cat_vincularpermisionario_fechainicio\":\"2018-08-15 00:00:00\",\"cat_vincularpermisionario_status\":1,\"cat_vincularpermisionario_fecharegistro\":\"2018-08-07 18:20:22\"}', '2018-08-07 18:20:22');
INSERT INTO `reg_movimientos` VALUES (312, 'success', 'update', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_id_permisionario\":\"14\",\"cat_vincularpermisionario_id_unidad\":\"13\",\"cat_vincularpermisionario_id_operadores\":\"4\",\"cat_vincularpermisionario_id_placa\":\"5\",\"cat_vincularpermisionario_id_periodopago\":\"7\",\"cat_vincularpermisionario_id_cobros\":\"4\",\"cat_vincularpermisionario_fechainicio\":\"2018-06-01 00:00:00\",\"cat_vincularpermisionario_status\":1,\"cat_vincularpermisionario_fechaactualiza\":\"2018-08-07 18:21:11\"}', '2018-08-07 18:21:11');
INSERT INTO `reg_movimientos` VALUES (313, 'success', 'update', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_id_permisionario\":\"14\",\"cat_vincularpermisionario_id_unidad\":\"13\",\"cat_vincularpermisionario_id_operadores\":\"4\",\"cat_vincularpermisionario_id_placa\":\"5\",\"cat_vincularpermisionario_id_periodopago\":\"7\",\"cat_vincularpermisionario_id_cobros\":\"4\",\"cat_vincularpermisionario_fechainicio\":\"2018-08-31 00:00:00\",\"cat_vincularpermisionario_status\":1,\"cat_vincularpermisionario_fechaactualiza\":\"2018-08-07 18:24:46\"}', '2018-08-07 18:24:46');
INSERT INTO `reg_movimientos` VALUES (314, 'success', 'update', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_status\":0,\"cat_vincularpermisionario_fechainicio\":null}', '2018-08-07 18:44:46');
INSERT INTO `reg_movimientos` VALUES (315, 'success', 'insert', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_id_permisionario\":\"14\",\"cat_vincularpermisionario_id_unidad\":\"13\",\"cat_vincularpermisionario_id_operadores\":\"4\",\"cat_vincularpermisionario_id_placa\":\"5\",\"cat_vincularpermisionario_id_periodopago\":\"7\",\"cat_vincularpermisionario_id_cobros\":\"3\",\"cat_vincularpermisionario_fechainicio\":\"2018-08-07 00:00:00\",\"cat_vincularpermisionario_status\":1,\"cat_vincularpermisionario_fecharegistro\":\"2018-08-07 18:44:46\"}', '2018-08-07 18:44:46');
INSERT INTO `reg_movimientos` VALUES (316, 'error', 'insert', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_id_permisionario\":\"14\",\"cat_vincularpermisionario_id_unidad\":\"13\",\"cat_vincularpermisionario_id_operadores\":\"4\",\"cat_vincularpermisionario_id_placa\":\"5\",\"cat_vincularpermisionario_id_periodopago\":\"7\",\"cat_vincularpermisionario_id_cobros\":\"3\",\"cat_vincularpermisionario_fechainicio\":\"2018-08-07 00:00:00\",\"cat_vincularpermisionario_status\":1,\"cat_vincularpermisionario_fecharegistro\":\"2018-08-07 18:45:31\"}', '2018-08-07 18:45:31');
INSERT INTO `reg_movimientos` VALUES (317, 'success', 'update', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_status\":0,\"cat_vincularpermisionario_fechainicio\":null}', '2018-08-07 18:45:43');
INSERT INTO `reg_movimientos` VALUES (318, 'success', 'insert', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_id_permisionario\":\"14\",\"cat_vincularpermisionario_id_unidad\":\"13\",\"cat_vincularpermisionario_id_operadores\":\"4\",\"cat_vincularpermisionario_id_placa\":\"5\",\"cat_vincularpermisionario_id_periodopago\":\"7\",\"cat_vincularpermisionario_id_cobros\":\"4\",\"cat_vincularpermisionario_fechainicio\":\"2018-08-07 00:00:00\",\"cat_vincularpermisionario_status\":1,\"cat_vincularpermisionario_fecharegistro\":\"2018-08-07 18:45:43\"}', '2018-08-07 18:45:43');
INSERT INTO `reg_movimientos` VALUES (319, 'success', 'update', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_status\":0,\"cat_vincularpermisionario_fechainicio\":null}', '2018-08-08 10:56:50');
INSERT INTO `reg_movimientos` VALUES (320, 'success', 'insert', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_id_permisionario\":\"1\",\"cat_vincularpermisionario_id_unidad\":\"13\",\"cat_vincularpermisionario_id_operadores\":\"3\",\"cat_vincularpermisionario_id_placa\":\"4\",\"cat_vincularpermisionario_id_periodopago\":\"7\",\"cat_vincularpermisionario_id_cobros\":\"4\",\"cat_vincularpermisionario_fechainicio\":\"2018-08-08 00:00:00\",\"cat_vincularpermisionario_status\":1,\"cat_vincularpermisionario_fecharegistro\":\"2018-08-08 10:56:50\"}', '2018-08-08 10:56:50');
INSERT INTO `reg_movimientos` VALUES (321, 'success', 'update', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_id_permisionario\":\"1\",\"cat_vincularpermisionario_id_unidad\":\"13\",\"cat_vincularpermisionario_id_operadores\":\"3\",\"cat_vincularpermisionario_id_placa\":\"4\",\"cat_vincularpermisionario_id_periodopago\":\"7\",\"cat_vincularpermisionario_id_cobros\":\"4\",\"cat_vincularpermisionario_fechainicio\":\"2018-08-08 00:00:00\",\"cat_vincularpermisionario_status\":1,\"cat_vincularpermisionario_fechaactualiza\":\"2018-08-08 14:47:35\"}', '2018-08-08 14:47:35');
INSERT INTO `reg_movimientos` VALUES (322, 'success', 'update', 'cat_almacen', 60, '{\"cat_almacen_nombre\":\"wwwwwwww\",\"cat_almacen_status\":1,\"cat_almacen_fechaactualiza\":\"2018-08-08 15:31:09\"}', '2018-08-08 15:31:09');
INSERT INTO `reg_movimientos` VALUES (323, 'error', 'insert', 'cat_permisionario', 60, '{\"cat_permisionario_nombre\":\"Nuevo Permisionario\",\"cat_permisionario_telefono\":\"66480285963\",\"cat_permisionario_direccion\":\"Conocidicima\",\"cat_permisionario_status\":1,\"cat_permisionario_fecharegistro\":\"2018-08-08 15:47:01\"}', '2018-08-08 15:47:01');
INSERT INTO `reg_movimientos` VALUES (324, 'success', 'insert', 'cat_permisionario', 60, '{\"cat_permisionario_nombre\":\"Nuevo Permisionario 2\",\"cat_permisionario_telefono\":\"66480285963\",\"cat_permisionario_direccion\":\"Conocidicima\",\"cat_permisionario_status\":1,\"cat_permisionario_fecharegistro\":\"2018-08-08 15:47:30\"}', '2018-08-08 15:47:30');
INSERT INTO `reg_movimientos` VALUES (325, 'error', 'insert', 'cat_unidades', 60, '{\"cat_unidades_numeconomico\":\"Nueva Unidad 2\",\"cat_unidades_ano\":\"1978\",\"cat_unidades_id_marca\":\"18\",\"cat_unidades_id_modelo\":\"38\",\"cat_unidades_id_servicio\":\"20\",\"cat_unidades_id_rol\":\"38\",\"cat_unidades_id_empresa\":\"18\",\"cat_unidades_id_almacen\":\"20\",\"cat_unidades_id_zona\":\"15\",\"cat_unidades_status\":1,\"cat_unidades_fecharegistro\":\"2018-08-08 15:48:17\"}', '2018-08-08 15:48:17');
INSERT INTO `reg_movimientos` VALUES (326, 'error', 'insert', 'cat_unidades', 60, '{\"cat_unidades_numeconomico\":\"10033\",\"cat_unidades_ano\":\"1978\",\"cat_unidades_id_marca\":\"18\",\"cat_unidades_id_modelo\":\"38\",\"cat_unidades_id_servicio\":\"20\",\"cat_unidades_id_rol\":\"38\",\"cat_unidades_id_empresa\":\"18\",\"cat_unidades_id_almacen\":\"20\",\"cat_unidades_id_zona\":\"15\",\"cat_unidades_status\":1,\"cat_unidades_fecharegistro\":\"2018-08-08 15:48:53\"}', '2018-08-08 15:48:53');
INSERT INTO `reg_movimientos` VALUES (327, 'error', 'insert', 'cat_unidades', 60, '{\"cat_unidades_numeconomico\":\"100335\",\"cat_unidades_ano\":\"1978\",\"cat_unidades_id_marca\":\"18\",\"cat_unidades_id_modelo\":\"38\",\"cat_unidades_id_servicio\":\"20\",\"cat_unidades_id_rol\":\"38\",\"cat_unidades_id_empresa\":\"18\",\"cat_unidades_id_almacen\":\"20\",\"cat_unidades_id_zona\":\"15\",\"cat_unidades_status\":1,\"cat_unidades_fecharegistro\":\"2018-08-08 15:49:10\"}', '2018-08-08 15:49:10');
INSERT INTO `reg_movimientos` VALUES (328, 'error', 'insert', 'cat_unidades', 60, '{\"cat_unidades_numeconomico\":\"123456\",\"cat_unidades_ano\":\"1978\",\"cat_unidades_id_marca\":\"18\",\"cat_unidades_id_modelo\":\"38\",\"cat_unidades_id_servicio\":\"20\",\"cat_unidades_id_rol\":\"38\",\"cat_unidades_id_empresa\":\"18\",\"cat_unidades_id_almacen\":\"20\",\"cat_unidades_id_zona\":\"15\",\"cat_unidades_status\":1,\"cat_unidades_fecharegistro\":\"2018-08-08 15:49:49\"}', '2018-08-08 15:49:49');
INSERT INTO `reg_movimientos` VALUES (329, 'success', 'insert', 'cat_permisionario', 60, '{\"cat_permisionario_nombre\":\"Jose Venancio Segundo\",\"cat_permisionario_telefono\":\"661234586\",\"cat_permisionario_direccion\":\"Conocidicima\",\"cat_permisionario_status\":1,\"cat_permisionario_fecharegistro\":\"2018-08-08 15:50:54\"}', '2018-08-08 15:50:54');
INSERT INTO `reg_movimientos` VALUES (330, 'error', 'insert', 'cat_unidades', 60, '{\"cat_unidades_numeconomico\":\"10056\",\"cat_unidades_ano\":\"1978\",\"cat_unidades_id_marca\":\"14\",\"cat_unidades_id_modelo\":\"41\",\"cat_unidades_id_servicio\":\"17\",\"cat_unidades_id_rol\":\"28\",\"cat_unidades_id_empresa\":\"14\",\"cat_unidades_id_almacen\":\"20\",\"cat_unidades_id_zona\":\"15\",\"cat_unidades_status\":1,\"cat_unidades_fecharegistro\":\"2018-08-08 15:52:09\"}', '2018-08-08 15:52:09');
INSERT INTO `reg_movimientos` VALUES (331, 'success', 'insert', 'cat_permisionario', 60, '{\"cat_permisionario_nombre\":\"Jose Antonio Garcia\",\"cat_permisionario_telefono\":\"664875962\",\"cat_permisionario_direccion\":\"Conocidicimo\",\"cat_permisionario_status\":1,\"cat_permisionario_fecharegistro\":\"2018-08-08 15:53:10\"}', '2018-08-08 15:53:10');
INSERT INTO `reg_movimientos` VALUES (332, 'error', 'insert', 'cat_unidades', 60, '{\"cat_unidades_numeconomico\":\"1111\",\"cat_unidades_ano\":\"1988\",\"cat_unidades_id_marca\":\"19\",\"cat_unidades_id_modelo\":\"40\",\"cat_unidades_id_servicio\":\"21\",\"cat_unidades_id_rol\":\"40\",\"cat_unidades_id_empresa\":\"19\",\"cat_unidades_id_almacen\":\"20\",\"cat_unidades_id_zona\":\"15\",\"cat_unidades_status\":1,\"cat_unidades_fecharegistro\":\"2018-08-08 16:06:17\"}', '2018-08-08 16:06:17');
INSERT INTO `reg_movimientos` VALUES (333, 'error', 'insert', 'cat_unidades', 60, '{\"cat_unidades_numeconomico\":\"3333\",\"cat_unidades_ano\":\"1978\",\"cat_unidades_id_marca\":\"18\",\"cat_unidades_id_modelo\":\"40\",\"cat_unidades_id_servicio\":\"20\",\"cat_unidades_id_rol\":\"38\",\"cat_unidades_id_empresa\":\"18\",\"cat_unidades_id_almacen\":\"20\",\"cat_unidades_id_zona\":\"15\",\"cat_unidades_status\":1,\"cat_unidades_fecharegistro\":\"2018-08-08 16:08:51\"}', '2018-08-08 16:08:51');
INSERT INTO `reg_movimientos` VALUES (334, 'error', 'insert', 'cat_unidades', 60, '{\"cat_unidades_numeconomico\":\"1526\",\"cat_unidades_ano\":\"1978\",\"cat_unidades_id_marca\":\"19\",\"cat_unidades_id_modelo\":\"38\",\"cat_unidades_id_servicio\":\"21\",\"cat_unidades_id_rol\":\"40\",\"cat_unidades_id_empresa\":\"20\",\"cat_unidades_id_almacen\":\"21\",\"cat_unidades_id_zona\":\"16\",\"cat_unidades_status\":1,\"cat_unidades_fecharegistro\":\"2018-08-08 16:11:56\"}', '2018-08-08 16:11:56');
INSERT INTO `reg_movimientos` VALUES (335, 'error', 'insert', 'cat_unidades', 60, '{\"cat_unidades_numeconomico\":\"15262\",\"cat_unidades_ano\":\"1978\",\"cat_unidades_id_marca\":\"19\",\"cat_unidades_id_modelo\":\"38\",\"cat_unidades_id_servicio\":\"21\",\"cat_unidades_id_rol\":\"40\",\"cat_unidades_id_empresa\":\"20\",\"cat_unidades_id_almacen\":\"21\",\"cat_unidades_id_zona\":\"16\",\"cat_unidades_status\":1,\"cat_unidades_fecharegistro\":\"2018-08-08 16:19:31\"}', '2018-08-08 16:19:31');
INSERT INTO `reg_movimientos` VALUES (336, 'error', 'insert', 'cat_unidades', 60, '{\"cat_unidades_numeconomico\":\"1003\",\"cat_unidades_ano\":\"1978\",\"cat_unidades_id_marca\":\"19\",\"cat_unidades_id_modelo\":\"40\",\"cat_unidades_id_servicio\":\"21\",\"cat_unidades_id_rol\":\"39\",\"cat_unidades_id_empresa\":\"19\",\"cat_unidades_id_almacen\":\"20\",\"cat_unidades_id_zona\":\"15\",\"cat_unidades_status\":1,\"cat_unidades_fecharegistro\":\"2018-08-08 16:20:31\"}', '2018-08-08 16:20:31');
INSERT INTO `reg_movimientos` VALUES (337, 'success', 'insert', 'cat_unidades', 60, '{\"cat_unidades_numeconomico\":\"10022\",\"cat_unidades_ano\":\"1978\",\"cat_unidades_id_marca\":\"19\",\"cat_unidades_id_modelo\":\"40\",\"cat_unidades_id_servicio\":\"20\",\"cat_unidades_id_rol\":\"38\",\"cat_unidades_id_empresa\":\"19\",\"cat_unidades_id_almacen\":\"20\",\"cat_unidades_id_zona\":\"15\",\"cat_unidades_status\":1,\"cat_unidades_fecharegistro\":\"2018-08-08 16:22:46\"}', '2018-08-08 16:22:46');
INSERT INTO `reg_movimientos` VALUES (338, 'error', 'insert', 'cat_unidades', 60, '{\"cat_unidades_numeconomico\":\"10022\",\"cat_unidades_ano\":\"1852\",\"cat_unidades_id_marca\":\"19\",\"cat_unidades_id_modelo\":\"40\",\"cat_unidades_id_servicio\":\"21\",\"cat_unidades_id_rol\":\"39\",\"cat_unidades_id_empresa\":\"17\",\"cat_unidades_id_almacen\":\"20\",\"cat_unidades_id_zona\":\"15\",\"cat_unidades_status\":1,\"cat_unidades_fecharegistro\":\"2018-08-08 16:23:23\"}', '2018-08-08 16:23:23');
INSERT INTO `reg_movimientos` VALUES (339, 'success', 'insert', 'cat_unidades', 60, '{\"cat_unidades_numeconomico\":\"100226\",\"cat_unidades_ano\":\"1852\",\"cat_unidades_id_marca\":\"19\",\"cat_unidades_id_modelo\":\"40\",\"cat_unidades_id_servicio\":\"21\",\"cat_unidades_id_rol\":\"39\",\"cat_unidades_id_empresa\":\"17\",\"cat_unidades_id_almacen\":\"20\",\"cat_unidades_id_zona\":\"15\",\"cat_unidades_status\":1,\"cat_unidades_fecharegistro\":\"2018-08-08 16:26:20\"}', '2018-08-08 16:26:21');
INSERT INTO `reg_movimientos` VALUES (340, 'success', 'insert', 'cat_permisionario', 60, '{\"cat_permisionario_nombre\":\"2154\",\"cat_permisionario_telefono\":\"54545454\",\"cat_permisionario_direccion\":\"545454545454\",\"cat_permisionario_status\":1,\"cat_permisionario_fecharegistro\":\"2018-08-08 16:27:12\"}', '2018-08-08 16:27:12');
INSERT INTO `reg_movimientos` VALUES (341, 'success', 'update', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_status\":0,\"cat_vincularpermisionario_fechainicio\":null}', '2018-08-08 16:28:50');
INSERT INTO `reg_movimientos` VALUES (342, 'success', 'insert', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_id_permisionario\":\"23\",\"cat_vincularpermisionario_id_unidad\":\"10\",\"cat_vincularpermisionario_id_operadores\":\"9\",\"cat_vincularpermisionario_id_placa\":\"5\",\"cat_vincularpermisionario_id_periodopago\":\"7\",\"cat_vincularpermisionario_id_cobros\":\"3\",\"cat_vincularpermisionario_fechainicio\":\"2018-08-08 00:00:00\",\"cat_vincularpermisionario_status\":1,\"cat_vincularpermisionario_fecharegistro\":\"2018-08-08 16:28:50\"}', '2018-08-08 16:28:50');
INSERT INTO `reg_movimientos` VALUES (343, 'success', 'insert', 'cat_operadores', 60, '{\"cat_operadores_nombre\":\"Otro Operador\",\"cat_operadores_telefono\":\"664859263\",\"cat_operadores_direccion\":\"Conicidicima\",\"cat_operadores_id_zona\":\"14\",\"cat_operadores_status\":1,\"cat_operadores_fecharegistro\":\"2018-08-08 16:34:15\"}', '2018-08-08 16:34:15');
INSERT INTO `reg_movimientos` VALUES (344, 'success', 'insert', 'cat_placas_unidades', 60, '{\"cat_placas_numero\":\"Nueva placa\",\"cat_placas_status\":1,\"cat_placas_fecharegistro\":\"2018-08-08 16:34:29\"}', '2018-08-08 16:34:29');
INSERT INTO `reg_movimientos` VALUES (345, 'success', 'update', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_status\":0,\"cat_vincularpermisionario_fechainicio\":null}', '2018-08-08 16:50:29');
INSERT INTO `reg_movimientos` VALUES (346, 'success', 'insert', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_id_permisionario\":\"1\",\"cat_vincularpermisionario_id_unidad\":\"13\",\"cat_vincularpermisionario_id_operadores\":\"9\",\"cat_vincularpermisionario_id_placa\":\"4\",\"cat_vincularpermisionario_id_periodopago\":\"7\",\"cat_vincularpermisionario_id_cobros\":\"3\",\"cat_vincularpermisionario_fechainicio\":\"2018-08-08 00:00:00\",\"cat_vincularpermisionario_status\":1,\"cat_vincularpermisionario_fecharegistro\":\"2018-08-08 16:50:29\"}', '2018-08-08 16:50:29');
INSERT INTO `reg_movimientos` VALUES (347, 'success', 'insert', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_id_permisionario\":\"21\",\"cat_vincularpermisionario_id_unidad\":\"8\",\"cat_vincularpermisionario_id_operadores\":\"12\",\"cat_vincularpermisionario_id_placa\":\"4\",\"cat_vincularpermisionario_id_periodopago\":\"7\",\"cat_vincularpermisionario_id_cobros\":\"3\",\"cat_vincularpermisionario_fechainicio\":\"2018-08-08 00:00:00\",\"cat_vincularpermisionario_status\":1,\"cat_vincularpermisionario_fecharegistro\":\"2018-08-08 17:41:39\"}', '2018-08-08 17:41:39');
INSERT INTO `reg_movimientos` VALUES (348, 'success', 'update', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_id_permisionario\":\"21\",\"cat_vincularpermisionario_id_unidad\":\"9\",\"cat_vincularpermisionario_id_operadores\":\"12\",\"cat_vincularpermisionario_id_placa\":\"4\",\"cat_vincularpermisionario_id_periodopago\":\"7\",\"cat_vincularpermisionario_id_cobros\":\"3\",\"cat_vincularpermisionario_fechainicio\":\"2018-08-08 00:00:00\",\"cat_vincularpermisionario_status\":1,\"cat_vincularpermisionario_fechaactualiza\":\"2018-08-08 17:42:21\"}', '2018-08-08 17:42:21');
INSERT INTO `reg_movimientos` VALUES (349, 'success', 'insert', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_id_permisionario\":\"14\",\"cat_vincularpermisionario_id_unidad\":\"8\",\"cat_vincularpermisionario_id_operadores\":\"12\",\"cat_vincularpermisionario_id_placa\":\"5\",\"cat_vincularpermisionario_id_periodopago\":\"7\",\"cat_vincularpermisionario_id_cobros\":\"4\",\"cat_vincularpermisionario_fechainicio\":\"2018-08-09 00:00:00\",\"cat_vincularpermisionario_status\":1,\"cat_vincularpermisionario_fecharegistro\":\"2018-08-08 17:44:16\"}', '2018-08-08 17:44:16');
INSERT INTO `reg_movimientos` VALUES (350, 'error', 'insert', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_id_permisionario\":\"14\",\"cat_vincularpermisionario_id_unidad\":\"8\",\"cat_vincularpermisionario_id_operadores\":\"4\",\"cat_vincularpermisionario_id_placa\":\"5\",\"cat_vincularpermisionario_id_periodopago\":\"7\",\"cat_vincularpermisionario_id_cobros\":\"4\",\"cat_vincularpermisionario_fechainicio\":\"2018-08-10 00:00:00\",\"cat_vincularpermisionario_status\":1,\"cat_vincularpermisionario_fecharegistro\":\"2018-08-08 17:45:11\"}', '2018-08-08 17:45:11');
INSERT INTO `reg_movimientos` VALUES (351, 'success', 'update', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_status\":0,\"cat_vincularpermisionario_fechainicio\":null}', '2018-08-08 17:45:59');
INSERT INTO `reg_movimientos` VALUES (352, 'success', 'insert', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_id_permisionario\":\"14\",\"cat_vincularpermisionario_id_unidad\":\"8\",\"cat_vincularpermisionario_id_operadores\":\"4\",\"cat_vincularpermisionario_id_placa\":\"4\",\"cat_vincularpermisionario_id_periodopago\":\"7\",\"cat_vincularpermisionario_id_cobros\":\"4\",\"cat_vincularpermisionario_fechainicio\":\"2018-08-10 00:00:00\",\"cat_vincularpermisionario_status\":1,\"cat_vincularpermisionario_fecharegistro\":\"2018-08-08 17:45:59\"}', '2018-08-08 17:45:59');
INSERT INTO `reg_movimientos` VALUES (353, 'success', 'update', 'cat_vincularpermisio', 60, '{\"cat_vincularpermisionario_id_permisionario\":\"14\",\"cat_vincularpermisionario_id_unidad\":\"8\",\"cat_vincularpermisionario_id_operadores\":\"4\",\"cat_vincularpermisionario_id_placa\":\"4\",\"cat_vincularpermisionario_id_periodopago\":\"7\",\"cat_vincularpermisionario_id_cobros\":\"4\",\"cat_vincularpermisionario_fechainicio\":\"2018-07-01 00:00:00\",\"cat_vincularpermisionario_status\":1,\"cat_vincularpermisionario_fechaactualiza\":\"2018-08-08 17:49:53\"}', '2018-08-08 17:49:53');
INSERT INTO `reg_movimientos` VALUES (354, 'success', 'update', 'cat_periodopago', 60, '{\"cat_periodopago_nombre\":\"Quincenal\",\"cat_periodopago_periodo\":\"0.5\",\"cat_periodopago_diascondonados\":\"8\",\"cat_periodopago_fechainicio\":\"2018-06-06 00:00:00\",\"cat_periodopago_status\":1,\"cat_periodopago_fechaactualiza\":\"2018-08-08 17:50:50\"}', '2018-08-08 17:50:50');
INSERT INTO `reg_movimientos` VALUES (355, 'success', 'update', 'cat_periodopago', 60, '{\"cat_periodopago_nombre\":\"Quincenal\",\"cat_periodopago_periodo\":\"0.5\",\"cat_periodopago_diascondonados\":\"7\",\"cat_periodopago_fechainicio\":\"2018-06-06 00:00:00\",\"cat_periodopago_status\":1,\"cat_periodopago_fechaactualiza\":\"2018-08-08 17:57:11\"}', '2018-08-08 17:57:11');
INSERT INTO `reg_movimientos` VALUES (356, 'success', 'update', 'cat_periodopago', 60, '{\"cat_periodopago_nombre\":\"Quincenal\",\"cat_periodopago_periodo\":\"0.5\",\"cat_periodopago_diascondonados\":\"6\",\"cat_periodopago_fechainicio\":\"2018-06-06 00:00:00\",\"cat_periodopago_status\":1,\"cat_periodopago_fechaactualiza\":\"2018-08-08 17:57:30\"}', '2018-08-08 17:57:30');

-- ----------------------------
-- Table structure for reg_pagosfianzas
-- ----------------------------
DROP TABLE IF EXISTS `reg_pagosfianzas`;
CREATE TABLE `reg_pagosfianzas`  (
  `reg_pagosfianzas_id_pagosfianzas` int(11) NOT NULL AUTO_INCREMENT,
  `reg_pagosfianzas_id_vincularfianza` int(11) NULL DEFAULT NULL,
  `reg_pagosfianzas_id_actor` int(11) NULL DEFAULT NULL,
  `reg_pagosfianzas_consecutivo` tinyint(4) NULL DEFAULT NULL,
  `reg_pagosfianzas_status` tinyint(4) NULL DEFAULT NULL,
  `reg_pagosfianzas_monto` float NULL DEFAULT NULL,
  `reg_pagosfianzas_fecharegistro` datetime NULL DEFAULT NULL,
  `reg_pagosfianzas_fechaactualiza` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`reg_pagosfianzas_id_pagosfianzas`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of reg_pagosfianzas
-- ----------------------------
INSERT INTO `reg_pagosfianzas` VALUES (13, 12, NULL, 1, 1, 2000, '2018-06-27 02:43:48', NULL);
INSERT INTO `reg_pagosfianzas` VALUES (14, 12, NULL, 2, 1, 2000, '2018-06-27 02:44:06', NULL);
INSERT INTO `reg_pagosfianzas` VALUES (15, 13, NULL, 1, 1, 10000, '2018-06-27 02:48:13', NULL);
INSERT INTO `reg_pagosfianzas` VALUES (16, 12, NULL, 3, 1, 100, '2018-06-27 02:54:32', NULL);
INSERT INTO `reg_pagosfianzas` VALUES (17, 12, NULL, 4, 1, 100, '2018-06-27 02:55:29', NULL);
INSERT INTO `reg_pagosfianzas` VALUES (18, 13, NULL, 2, 1, 21000, '2018-06-27 02:55:49', NULL);
INSERT INTO `reg_pagosfianzas` VALUES (19, 12, NULL, 5, 1, 2000, '2018-07-02 16:31:46', '2018-07-02 16:31:46');
INSERT INTO `reg_pagosfianzas` VALUES (20, 14, NULL, 1, 1, 2000, '2018-07-07 02:44:40', NULL);
INSERT INTO `reg_pagosfianzas` VALUES (21, 13, NULL, 3, 1, 0, '2018-07-13 00:55:39', NULL);
INSERT INTO `reg_pagosfianzas` VALUES (22, 13, NULL, 4, 1, 0, '2018-07-13 01:15:50', NULL);
INSERT INTO `reg_pagosfianzas` VALUES (23, 13, NULL, 5, 1, 1000, '2018-07-13 02:36:04', NULL);
INSERT INTO `reg_pagosfianzas` VALUES (24, 14, NULL, 2, 1, 1, '2018-07-14 02:46:21', NULL);
INSERT INTO `reg_pagosfianzas` VALUES (25, 13, NULL, 6, 1, 1000, '2018-07-16 21:57:39', NULL);
INSERT INTO `reg_pagosfianzas` VALUES (26, 13, NULL, 7, 1, 1000, '2018-07-18 16:34:52', NULL);
INSERT INTO `reg_pagosfianzas` VALUES (27, 13, NULL, 8, 1, 11, '2018-07-19 14:57:29', NULL);
INSERT INTO `reg_pagosfianzas` VALUES (28, 13, NULL, 9, 1, 100, '2018-07-19 14:57:39', NULL);
INSERT INTO `reg_pagosfianzas` VALUES (29, 13, NULL, 10, 1, 889, '2018-07-19 14:57:48', NULL);
INSERT INTO `reg_pagosfianzas` VALUES (30, 13, NULL, 11, 1, 5000, '2018-07-30 15:58:22', NULL);

-- ----------------------------
-- Table structure for reg_pagospermisionarios
-- ----------------------------
DROP TABLE IF EXISTS `reg_pagospermisionarios`;
CREATE TABLE `reg_pagospermisionarios`  (
  `reg_pagospermisionarios_id_pagospermisionarios` int(11) NOT NULL AUTO_INCREMENT,
  `reg_pagospermisionarios_id_vincularpermisionario` int(11) NULL DEFAULT NULL,
  `reg_pagospermisionarios_monto_cobro` float NULL DEFAULT NULL,
  `reg_pagospermisionarios_status` tinyint(4) NULL DEFAULT NULL,
  `reg_pagospermisionarios_fechahora` datetime NULL DEFAULT NULL,
  `reg_pagospermisionarios_consecutivo` tinyint(4) NULL DEFAULT NULL,
  `reg_pagospermisionarios_tipo` tinyint(4) NULL DEFAULT NULL,
  PRIMARY KEY (`reg_pagospermisionarios_id_pagospermisionarios`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 70 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios`  (
  `usuarios_id_usuarios` int(11) NOT NULL AUTO_INCREMENT,
  `usuarios_nombre_completo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `usuarios_correo_sistema` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `usuarios_nombre_sistema` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `usuarios_pass_sistema` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `usuarios_id_empresa` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `usuarios_id_almacen` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `usuarios_id_perfil` int(11) NULL DEFAULT NULL,
  `usuarios_fechaalta` datetime NULL DEFAULT NULL,
  `usuarios_status` tinyint(4) NULL DEFAULT NULL,
  `usuarios_permisos` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `usuarios_unico` tinyint(4) NULL DEFAULT NULL,
  PRIMARY KEY (`usuarios_id_usuarios`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 70 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES (60, 'Jose Venancio Quintero Hermosillo', 'vquintero@abc.com.mx', 'vquintero', 'cWZzZDIxa2w=', '[\"13\",\"14\"]', '[\"6\",\"7\"]', 11, '2018-07-26 14:47:21', 1, '[\"46-Sistema_padre\",\"46-Sistema_grabar\",\"46-Sistema_editar\",\"46-Sistema_borrar\",\"46-Sistema_otro\",\"46-Sistema_47-Usuarios_padre\",\"46-Sistema_47-Usuarios_grabar\",\"46-Sistema_47-Usuarios_editar\",\"46-Sistema_47-Usuarios_borrar\",\"46-Sistema_47-Usuarios_otro\",\"46-Sistema_49-Perfiles_padre\",\"46-Sistema_49-Perfiles_grabar\",\"46-Sistema_49-Perfiles_editar\",\"46-Sistema_49-Perfiles_borrar\",\"46-Sistema_49-Perfiles_otro\",\"46-Sistema_48-Permisos_padre\",\"46-Sistema_48-Permisos_grabar\",\"46-Sistema_48-Permisos_editar\",\"46-Sistema_48-Permisos_borrar\",\"46-Sistema_48-Permisos_otro\",\"168-Permisionario_padre\",\"168-Permisionario_grabar\",\"168-Permisionario_editar\",\"168-Permisionario_borrar\",\"168-Permisionario_otro\",\"168-Permisionario_169-Pagos_padre\",\"168-Permisionario_169-Pagos_grabar\",\"168-Permisionario_169-Pagos_editar\",\"168-Permisionario_169-Pagos_borrar\",\"168-Permisionario_169-Pagos_otro\",\"168-Permisionario_170-Vincular_padre\",\"168-Permisionario_170-Vincular_grabar\",\"168-Permisionario_170-Vincular_editar\",\"168-Permisionario_170-Vincular_borrar\",\"168-Permisionario_170-Vincular_otro\",\"171-Fianzas_padre\",\"171-Fianzas_grabar\",\"171-Fianzas_editar\",\"171-Fianzas_borrar\",\"171-Fianzas_otro\",\"171-Fianzas_173-Pagos Fianzas_padre\",\"171-Fianzas_173-Pagos Fianzas_grabar\",\"171-Fianzas_173-Pagos Fianzas_editar\",\"171-Fianzas_173-Pagos Fianzas_borrar\",\"171-Fianzas_173-Pagos Fianzas_otro\",\"171-Fianzas_172-Registro_padre\",\"171-Fianzas_172-Registro_grabar\",\"171-Fianzas_172-Registro_editar\",\"171-Fianzas_172-Registro_borrar\",\"171-Fianzas_172-Registro_otro\",\"174-Reportes_padre\",\"174-Reportes_grabar\",\"174-Reportes_editar\",\"174-Reportes_borrar\",\"174-Reportes_otro\",\"174-Reportes_175-Reportes Permisionarios_padre\",\"174-Reportes_175-Reportes Permisionarios_grabar\",\"174-Reportes_175-Reportes Permisionarios_editar\",\"174-Reportes_175-Reportes Permisionarios_borrar\",\"174-Reportes_175-Reportes Permisionarios_otro\",\"174-Reportes_176-Reportes Fianzas_padre\",\"174-Reportes_176-Reportes Fianzas_grabar\",\"174-Reportes_176-Reportes Fianzas_editar\",\"174-Reportes_176-Reportes Fianzas_borrar\",\"174-Reportes_176-Reportes Fianzas_otro\",\"145-Catalogo_padre\",\"145-Catalogo_grabar\",\"145-Catalogo_editar\",\"145-Catalogo_borrar\",\"145-Catalogo_otro\",\"145-Catalogo_157-Empresa_padre\",\"145-Catalogo_157-Empresa_grabar\",\"145-Catalogo_157-Empresa_editar\",\"145-Catalogo_157-Empresa_borrar\",\"145-Catalogo_157-Empresa_otro\",\"145-Catalogo_158-Almacen_padre\",\"145-Catalogo_158-Almacen_grabar\",\"145-Catalogo_158-Almacen_editar\",\"145-Catalogo_158-Almacen_borrar\",\"145-Catalogo_158-Almacen_otro\",\"145-Catalogo_160-Unidades_padre\",\"145-Catalogo_160-Unidades_grabar\",\"145-Catalogo_160-Unidades_editar\",\"145-Catalogo_160-Unidades_borrar\",\"145-Catalogo_160-Unidades_otro\",\"145-Catalogo_160-Unidades_150-Unidad_padre\",\"145-Catalogo_160-Unidades_150-Unidad_grabar\",\"145-Catalogo_160-Unidades_150-Unidad_editar\",\"145-Catalogo_160-Unidades_150-Unidad_borrar\",\"145-Catalogo_160-Unidades_150-Unidad_otro\",\"145-Catalogo_160-Unidades_153-Marca_padre\",\"145-Catalogo_160-Unidades_153-Marca_grabar\",\"145-Catalogo_160-Unidades_153-Marca_editar\",\"145-Catalogo_160-Unidades_153-Marca_borrar\",\"145-Catalogo_160-Unidades_153-Marca_otro\",\"145-Catalogo_160-Unidades_154-Modelo_padre\",\"145-Catalogo_160-Unidades_154-Modelo_grabar\",\"145-Catalogo_160-Unidades_154-Modelo_editar\",\"145-Catalogo_160-Unidades_154-Modelo_borrar\",\"145-Catalogo_160-Unidades_154-Modelo_otro\",\"145-Catalogo_160-Unidades_155-Servicio_padre\",\"145-Catalogo_160-Unidades_155-Servicio_grabar\",\"145-Catalogo_160-Unidades_155-Servicio_editar\",\"145-Catalogo_160-Unidades_155-Servicio_borrar\",\"145-Catalogo_160-Unidades_155-Servicio_otro\",\"145-Catalogo_160-Unidades_156-Rol_padre\",\"145-Catalogo_160-Unidades_156-Rol_grabar\",\"145-Catalogo_160-Unidades_156-Rol_editar\",\"145-Catalogo_160-Unidades_156-Rol_borrar\",\"145-Catalogo_160-Unidades_156-Rol_otro\",\"145-Catalogo_160-Unidades_159-Zona_padre\",\"145-Catalogo_160-Unidades_159-Zona_grabar\",\"145-Catalogo_160-Unidades_159-Zona_editar\",\"145-Catalogo_160-Unidades_159-Zona_borrar\",\"145-Catalogo_160-Unidades_159-Zona_otro\",\"145-Catalogo_162-Operadores_padre\",\"145-Catalogo_162-Operadores_grabar\",\"145-Catalogo_162-Operadores_editar\",\"145-Catalogo_162-Operadores_borrar\",\"145-Catalogo_162-Operadores_otro\",\"145-Catalogo_163-Placas_padre\",\"145-Catalogo_163-Placas_grabar\",\"145-Catalogo_163-Placas_editar\",\"145-Catalogo_163-Placas_borrar\",\"145-Catalogo_163-Placas_otro\",\"145-Catalogo_164-Periodo Pago_padre\",\"145-Catalogo_164-Periodo Pago_grabar\",\"145-Catalogo_164-Periodo Pago_editar\",\"145-Catalogo_164-Periodo Pago_borrar\",\"145-Catalogo_164-Periodo Pago_otro\",\"145-Catalogo_165-Cobros_padre\",\"145-Catalogo_165-Cobros_grabar\",\"145-Catalogo_165-Cobros_editar\",\"145-Catalogo_165-Cobros_borrar\",\"145-Catalogo_165-Cobros_otro\",\"145-Catalogo_166-Status Fianzas_padre\",\"145-Catalogo_166-Status Fianzas_grabar\",\"145-Catalogo_166-Status Fianzas_editar\",\"145-Catalogo_166-Status Fianzas_borrar\",\"145-Catalogo_166-Status Fianzas_otro\",\"145-Catalogo_161-Permisionario_padre\",\"145-Catalogo_161-Permisionario_grabar\",\"145-Catalogo_161-Permisionario_editar\",\"145-Catalogo_161-Permisionario_borrar\",\"145-Catalogo_161-Permisionario_otro\"]', NULL);
INSERT INTO `usuarios` VALUES (67, 'Juan Dominguez Aguirre', 'juandominguez@abc.com.mx', 'juandominguez', 'cWZzZDIxa2w=', '[\"13\",\"14\"]', '[\"7\",\"9\"]', 11, '2018-08-01 14:57:38', 1, '[\"46-Sistema_padre\",\"46-Sistema_grabar\",\"46-Sistema_editar\",\"46-Sistema_borrar\",\"46-Sistema_otro\",\"46-Sistema_47-Usuarios_padre\",\"46-Sistema_47-Usuarios_grabar\",\"46-Sistema_47-Usuarios_editar\",\"46-Sistema_47-Usuarios_borrar\",\"46-Sistema_47-Usuarios_otro\",\"46-Sistema_49-Perfiles_padre\",\"46-Sistema_49-Perfiles_grabar\",\"46-Sistema_49-Perfiles_editar\",\"46-Sistema_49-Perfiles_borrar\",\"46-Sistema_49-Perfiles_otro\",\"46-Sistema_48-Permisos_padre\",\"46-Sistema_48-Permisos_grabar\",\"46-Sistema_48-Permisos_editar\",\"46-Sistema_48-Permisos_borrar\",\"46-Sistema_48-Permisos_otro\",\"168-Permisionario_padre\",\"168-Permisionario_grabar\",\"168-Permisionario_editar\",\"168-Permisionario_borrar\",\"168-Permisionario_otro\",\"168-Permisionario_169-Pagos_padre\",\"168-Permisionario_169-Pagos_grabar\",\"168-Permisionario_169-Pagos_editar\",\"168-Permisionario_169-Pagos_borrar\",\"168-Permisionario_169-Pagos_otro\",\"168-Permisionario_170-Vincular_padre\",\"168-Permisionario_170-Vincular_grabar\",\"168-Permisionario_170-Vincular_editar\",\"168-Permisionario_170-Vincular_borrar\",\"168-Permisionario_170-Vincular_otro\",\"171-Fianzas_padre\",\"171-Fianzas_grabar\",\"171-Fianzas_editar\",\"171-Fianzas_borrar\",\"171-Fianzas_otro\",\"171-Fianzas_173-Pagos Fianzas_padre\",\"171-Fianzas_173-Pagos Fianzas_grabar\",\"171-Fianzas_173-Pagos Fianzas_editar\",\"171-Fianzas_173-Pagos Fianzas_borrar\",\"171-Fianzas_173-Pagos Fianzas_otro\",\"171-Fianzas_172-Registro_padre\",\"171-Fianzas_172-Registro_grabar\",\"171-Fianzas_172-Registro_editar\",\"171-Fianzas_172-Registro_borrar\",\"171-Fianzas_172-Registro_otro\",\"145-Catalogo_padre\",\"145-Catalogo_grabar\",\"145-Catalogo_editar\",\"145-Catalogo_borrar\",\"145-Catalogo_otro\",\"145-Catalogo_157-Empresa_padre\",\"145-Catalogo_157-Empresa_grabar\",\"145-Catalogo_157-Empresa_editar\",\"145-Catalogo_157-Empresa_borrar\",\"145-Catalogo_157-Empresa_otro\",\"145-Catalogo_158-Almacen_padre\",\"145-Catalogo_158-Almacen_grabar\",\"145-Catalogo_158-Almacen_editar\",\"145-Catalogo_158-Almacen_borrar\",\"145-Catalogo_158-Almacen_otro\",\"145-Catalogo_163-Placas_padre\",\"145-Catalogo_163-Placas_grabar\",\"145-Catalogo_163-Placas_editar\",\"145-Catalogo_163-Placas_borrar\",\"145-Catalogo_163-Placas_otro\",\"145-Catalogo_164-Periodo Pago_padre\",\"145-Catalogo_164-Periodo Pago_grabar\",\"145-Catalogo_164-Periodo Pago_editar\",\"145-Catalogo_164-Periodo Pago_borrar\",\"145-Catalogo_164-Periodo Pago_otro\",\"145-Catalogo_165-Cobros_padre\",\"145-Catalogo_165-Cobros_grabar\",\"145-Catalogo_165-Cobros_editar\",\"145-Catalogo_165-Cobros_borrar\",\"145-Catalogo_165-Cobros_otro\",\"145-Catalogo_166-Status Fianzas_padre\",\"145-Catalogo_166-Status Fianzas_grabar\",\"145-Catalogo_166-Status Fianzas_editar\",\"145-Catalogo_166-Status Fianzas_borrar\",\"145-Catalogo_166-Status Fianzas_otro\",\"145-Catalogo_161-Permisionario_padre\",\"145-Catalogo_161-Permisionario_grabar\",\"145-Catalogo_161-Permisionario_editar\",\"145-Catalogo_161-Permisionario_borrar\",\"145-Catalogo_161-Permisionario_otro\",\"145-Catalogo_160-Unidades_padre\",\"145-Catalogo_160-Unidades_grabar\",\"145-Catalogo_160-Unidades_editar\",\"145-Catalogo_160-Unidades_borrar\",\"145-Catalogo_160-Unidades_otro\",\"145-Catalogo_160-Unidades_150-Unidad_padre\",\"145-Catalogo_160-Unidades_150-Unidad_grabar\",\"145-Catalogo_160-Unidades_150-Unidad_editar\",\"145-Catalogo_160-Unidades_150-Unidad_borrar\",\"145-Catalogo_160-Unidades_150-Unidad_otro\",\"145-Catalogo_160-Unidades_153-Marca_padre\",\"145-Catalogo_160-Unidades_153-Marca_grabar\",\"145-Catalogo_160-Unidades_153-Marca_editar\",\"145-Catalogo_160-Unidades_153-Marca_borrar\",\"145-Catalogo_160-Unidades_153-Marca_otro\",\"145-Catalogo_160-Unidades_154-Modelo_padre\",\"145-Catalogo_160-Unidades_154-Modelo_grabar\",\"145-Catalogo_160-Unidades_154-Modelo_editar\",\"145-Catalogo_160-Unidades_154-Modelo_borrar\",\"145-Catalogo_160-Unidades_154-Modelo_otro\",\"145-Catalogo_160-Unidades_155-Servicio_padre\",\"145-Catalogo_160-Unidades_155-Servicio_grabar\",\"145-Catalogo_160-Unidades_155-Servicio_editar\",\"145-Catalogo_160-Unidades_155-Servicio_borrar\",\"145-Catalogo_160-Unidades_155-Servicio_otro\",\"145-Catalogo_160-Unidades_156-Rol_padre\",\"145-Catalogo_160-Unidades_156-Rol_grabar\",\"145-Catalogo_160-Unidades_156-Rol_editar\",\"145-Catalogo_160-Unidades_156-Rol_borrar\",\"145-Catalogo_160-Unidades_156-Rol_otro\",\"145-Catalogo_160-Unidades_159-Zona_padre\",\"145-Catalogo_160-Unidades_159-Zona_grabar\",\"145-Catalogo_160-Unidades_159-Zona_editar\",\"145-Catalogo_160-Unidades_159-Zona_borrar\",\"145-Catalogo_160-Unidades_159-Zona_otro\",\"145-Catalogo_162-Operadores_padre\",\"145-Catalogo_162-Operadores_grabar\",\"145-Catalogo_162-Operadores_editar\",\"145-Catalogo_162-Operadores_borrar\",\"145-Catalogo_162-Operadores_otro\"]', NULL);
INSERT INTO `usuarios` VALUES (68, 'ELSA SARA MATIAS PEREZ12345', 'sperez@abc.com.mx', 'sperez', 'Y2hpbWVjYQ==', '[\"17\"]', '[\"9\"]', 11, '2018-08-01 14:32:26', 1, '[\"46-Sistema_padre\",\"46-Sistema_grabar\",\"46-Sistema_editar\",\"46-Sistema_borrar\",\"46-Sistema_otro\",\"46-Sistema_47-Usuarios_padre\",\"46-Sistema_47-Usuarios_grabar\",\"46-Sistema_47-Usuarios_editar\",\"46-Sistema_47-Usuarios_borrar\",\"46-Sistema_47-Usuarios_otro\",\"46-Sistema_49-Perfiles_padre\",\"46-Sistema_49-Perfiles_grabar\",\"46-Sistema_49-Perfiles_editar\",\"46-Sistema_49-Perfiles_borrar\",\"46-Sistema_49-Perfiles_otro\",\"46-Sistema_48-Permisos_padre\",\"46-Sistema_48-Permisos_grabar\",\"46-Sistema_48-Permisos_editar\",\"46-Sistema_48-Permisos_borrar\",\"46-Sistema_48-Permisos_otro\",\"168-Permisionario_padre\",\"168-Permisionario_grabar\",\"168-Permisionario_editar\",\"168-Permisionario_borrar\",\"168-Permisionario_otro\",\"168-Permisionario_169-Pagos_padre\",\"168-Permisionario_169-Pagos_grabar\",\"168-Permisionario_169-Pagos_editar\",\"168-Permisionario_169-Pagos_borrar\",\"168-Permisionario_169-Pagos_otro\",\"168-Permisionario_170-Vincular_padre\",\"168-Permisionario_170-Vincular_grabar\",\"168-Permisionario_170-Vincular_editar\",\"168-Permisionario_170-Vincular_borrar\",\"168-Permisionario_170-Vincular_otro\",\"171-Fianzas_padre\",\"171-Fianzas_grabar\",\"171-Fianzas_editar\",\"171-Fianzas_borrar\",\"171-Fianzas_otro\",\"171-Fianzas_173-Pagos Fianzas_padre\",\"171-Fianzas_173-Pagos Fianzas_grabar\",\"171-Fianzas_173-Pagos Fianzas_editar\",\"171-Fianzas_173-Pagos Fianzas_borrar\",\"171-Fianzas_173-Pagos Fianzas_otro\",\"171-Fianzas_172-Registro_padre\",\"171-Fianzas_172-Registro_grabar\",\"171-Fianzas_172-Registro_editar\",\"171-Fianzas_172-Registro_borrar\",\"171-Fianzas_172-Registro_otro\",\"174-Reportes_padre\",\"174-Reportes_grabar\",\"174-Reportes_editar\",\"174-Reportes_borrar\",\"174-Reportes_otro\",\"174-Reportes_175-Reportes Permisionarios_padre\",\"174-Reportes_175-Reportes Permisionarios_grabar\",\"174-Reportes_175-Reportes Permisionarios_editar\",\"174-Reportes_175-Reportes Permisionarios_borrar\",\"174-Reportes_175-Reportes Permisionarios_otro\",\"174-Reportes_176-Reportes Fianzas_padre\",\"174-Reportes_176-Reportes Fianzas_grabar\",\"174-Reportes_176-Reportes Fianzas_editar\",\"174-Reportes_176-Reportes Fianzas_borrar\",\"174-Reportes_176-Reportes Fianzas_otro\",\"145-Catalogo_padre\",\"145-Catalogo_grabar\",\"145-Catalogo_editar\",\"145-Catalogo_borrar\",\"145-Catalogo_otro\",\"145-Catalogo_157-Empresa_padre\",\"145-Catalogo_157-Empresa_grabar\",\"145-Catalogo_157-Empresa_editar\",\"145-Catalogo_157-Empresa_borrar\",\"145-Catalogo_157-Empresa_otro\",\"145-Catalogo_158-Almacen_padre\",\"145-Catalogo_158-Almacen_grabar\",\"145-Catalogo_158-Almacen_editar\",\"145-Catalogo_158-Almacen_borrar\",\"145-Catalogo_158-Almacen_otro\",\"145-Catalogo_163-Placas_padre\",\"145-Catalogo_163-Placas_grabar\",\"145-Catalogo_163-Placas_editar\",\"145-Catalogo_163-Placas_borrar\",\"145-Catalogo_163-Placas_otro\",\"145-Catalogo_164-Periodo Pago_padre\",\"145-Catalogo_164-Periodo Pago_grabar\",\"145-Catalogo_164-Periodo Pago_editar\",\"145-Catalogo_164-Periodo Pago_borrar\",\"145-Catalogo_164-Periodo Pago_otro\",\"145-Catalogo_165-Cobros_padre\",\"145-Catalogo_165-Cobros_grabar\",\"145-Catalogo_165-Cobros_editar\",\"145-Catalogo_165-Cobros_borrar\",\"145-Catalogo_165-Cobros_otro\",\"145-Catalogo_166-Status Fianzas_padre\",\"145-Catalogo_166-Status Fianzas_grabar\",\"145-Catalogo_166-Status Fianzas_editar\",\"145-Catalogo_166-Status Fianzas_borrar\",\"145-Catalogo_166-Status Fianzas_otro\",\"145-Catalogo_161-Permisionario_padre\",\"145-Catalogo_161-Permisionario_grabar\",\"145-Catalogo_161-Permisionario_editar\",\"145-Catalogo_161-Permisionario_borrar\",\"145-Catalogo_161-Permisionario_otro\",\"145-Catalogo_160-Unidades_padre\",\"145-Catalogo_160-Unidades_grabar\",\"145-Catalogo_160-Unidades_editar\",\"145-Catalogo_160-Unidades_borrar\",\"145-Catalogo_160-Unidades_otro\",\"145-Catalogo_160-Unidades_150-Unidad_padre\",\"145-Catalogo_160-Unidades_150-Unidad_grabar\",\"145-Catalogo_160-Unidades_150-Unidad_editar\",\"145-Catalogo_160-Unidades_150-Unidad_borrar\",\"145-Catalogo_160-Unidades_150-Unidad_otro\",\"145-Catalogo_160-Unidades_153-Marca_padre\",\"145-Catalogo_160-Unidades_153-Marca_grabar\",\"145-Catalogo_160-Unidades_153-Marca_editar\",\"145-Catalogo_160-Unidades_153-Marca_borrar\",\"145-Catalogo_160-Unidades_153-Marca_otro\",\"145-Catalogo_160-Unidades_154-Modelo_padre\",\"145-Catalogo_160-Unidades_154-Modelo_grabar\",\"145-Catalogo_160-Unidades_154-Modelo_editar\",\"145-Catalogo_160-Unidades_154-Modelo_borrar\",\"145-Catalogo_160-Unidades_154-Modelo_otro\",\"145-Catalogo_160-Unidades_155-Servicio_padre\",\"145-Catalogo_160-Unidades_155-Servicio_grabar\",\"145-Catalogo_160-Unidades_155-Servicio_editar\",\"145-Catalogo_160-Unidades_155-Servicio_borrar\",\"145-Catalogo_160-Unidades_155-Servicio_otro\",\"145-Catalogo_160-Unidades_156-Rol_padre\",\"145-Catalogo_160-Unidades_156-Rol_grabar\",\"145-Catalogo_160-Unidades_156-Rol_editar\",\"145-Catalogo_160-Unidades_156-Rol_borrar\",\"145-Catalogo_160-Unidades_156-Rol_otro\",\"145-Catalogo_160-Unidades_159-Zona_padre\",\"145-Catalogo_160-Unidades_159-Zona_grabar\",\"145-Catalogo_160-Unidades_159-Zona_editar\",\"145-Catalogo_160-Unidades_159-Zona_borrar\",\"145-Catalogo_160-Unidades_159-Zona_otro\",\"145-Catalogo_160-Unidades_150-Unidad_grabar\",\"145-Catalogo_160-Unidades_150-Unidad_editar\",\"145-Catalogo_160-Unidades_150-Unidad_borrar\",\"145-Catalogo_160-Unidades_150-Unidad_otro\",\"145-Catalogo_160-Unidades_153-Marca_grabar\",\"145-Catalogo_160-Unidades_153-Marca_editar\",\"145-Catalogo_160-Unidades_153-Marca_borrar\",\"145-Catalogo_160-Unidades_153-Marca_otro\",\"145-Catalogo_160-Unidades_154-Modelo_grabar\",\"145-Catalogo_160-Unidades_154-Modelo_editar\",\"145-Catalogo_160-Unidades_154-Modelo_borrar\",\"145-Catalogo_160-Unidades_154-Modelo_otro\",\"145-Catalogo_160-Unidades_155-Servicio_grabar\",\"145-Catalogo_160-Unidades_155-Servicio_editar\",\"145-Catalogo_160-Unidades_155-Servicio_borrar\",\"145-Catalogo_160-Unidades_155-Servicio_otro\",\"145-Catalogo_160-Unidades_156-Rol_grabar\",\"145-Catalogo_160-Unidades_156-Rol_editar\",\"145-Catalogo_160-Unidades_156-Rol_borrar\",\"145-Catalogo_160-Unidades_156-Rol_otro\",\"145-Catalogo_160-Unidades_159-Zona_grabar\",\"145-Catalogo_160-Unidades_159-Zona_editar\",\"145-Catalogo_160-Unidades_159-Zona_borrar\",\"145-Catalogo_160-Unidades_159-Zona_otro\",\"145-Catalogo_160-Unidades_150-Unidad_grabar\",\"145-Catalogo_160-Unidades_150-Unidad_editar\",\"145-Catalogo_160-Unidades_150-Unidad_borrar\",\"145-Catalogo_160-Unidades_150-Unidad_otro\",\"145-Catalogo_160-Unidades_153-Marca_grabar\",\"145-Catalogo_160-Unidades_153-Marca_editar\",\"145-Catalogo_160-Unidades_153-Marca_borrar\",\"145-Catalogo_160-Unidades_153-Marca_otro\",\"145-Catalogo_160-Unidades_154-Modelo_grabar\",\"145-Catalogo_160-Unidades_154-Modelo_editar\",\"145-Catalogo_160-Unidades_154-Modelo_borrar\",\"145-Catalogo_160-Unidades_154-Modelo_otro\",\"145-Catalogo_160-Unidades_155-Servicio_grabar\",\"145-Catalogo_160-Unidades_155-Servicio_editar\",\"145-Catalogo_160-Unidades_155-Servicio_borrar\",\"145-Catalogo_160-Unidades_155-Servicio_otro\",\"145-Catalogo_160-Unidades_156-Rol_grabar\",\"145-Catalogo_160-Unidades_156-Rol_editar\",\"145-Catalogo_160-Unidades_156-Rol_borrar\",\"145-Catalogo_160-Unidades_156-Rol_otro\",\"145-Catalogo_160-Unidades_159-Zona_grabar\",\"145-Catalogo_160-Unidades_159-Zona_editar\",\"145-Catalogo_160-Unidades_159-Zona_borrar\",\"145-Catalogo_160-Unidades_159-Zona_otro\",\"145-Catalogo_160-Unidades_150-Unidad_grabar\",\"145-Catalogo_160-Unidades_150-Unidad_editar\",\"145-Catalogo_160-Unidades_150-Unidad_borrar\",\"145-Catalogo_160-Unidades_150-Unidad_otro\",\"145-Catalogo_160-Unidades_153-Marca_grabar\",\"145-Catalogo_160-Unidades_153-Marca_editar\",\"145-Catalogo_160-Unidades_153-Marca_borrar\",\"145-Catalogo_160-Unidades_153-Marca_otro\",\"145-Catalogo_160-Unidades_154-Modelo_grabar\",\"145-Catalogo_160-Unidades_154-Modelo_editar\",\"145-Catalogo_160-Unidades_154-Modelo_borrar\",\"145-Catalogo_160-Unidades_154-Modelo_otro\",\"145-Catalogo_160-Unidades_155-Servicio_grabar\",\"145-Catalogo_160-Unidades_155-Servicio_editar\",\"145-Catalogo_160-Unidades_155-Servicio_borrar\",\"145-Catalogo_160-Unidades_155-Servicio_otro\",\"145-Catalogo_160-Unidades_156-Rol_grabar\",\"145-Catalogo_160-Unidades_156-Rol_editar\",\"145-Catalogo_160-Unidades_156-Rol_borrar\",\"145-Catalogo_160-Unidades_156-Rol_otro\",\"145-Catalogo_160-Unidades_159-Zona_grabar\",\"145-Catalogo_160-Unidades_159-Zona_editar\",\"145-Catalogo_160-Unidades_159-Zona_borrar\",\"145-Catalogo_160-Unidades_159-Zona_otro\",\"145-Catalogo_160-Unidades_150-Unidad_grabar\",\"145-Catalogo_160-Unidades_150-Unidad_editar\",\"145-Catalogo_160-Unidades_150-Unidad_borrar\",\"145-Catalogo_160-Unidades_150-Unidad_otro\",\"145-Catalogo_160-Unidades_153-Marca_grabar\",\"145-Catalogo_160-Unidades_153-Marca_editar\",\"145-Catalogo_160-Unidades_153-Marca_borrar\",\"145-Catalogo_160-Unidades_153-Marca_otro\",\"145-Catalogo_160-Unidades_154-Modelo_grabar\",\"145-Catalogo_160-Unidades_154-Modelo_editar\",\"145-Catalogo_160-Unidades_154-Modelo_borrar\",\"145-Catalogo_160-Unidades_154-Modelo_otro\",\"145-Catalogo_160-Unidades_155-Servicio_grabar\",\"145-Catalogo_160-Unidades_155-Servicio_editar\",\"145-Catalogo_160-Unidades_155-Servicio_borrar\",\"145-Catalogo_160-Unidades_155-Servicio_otro\",\"145-Catalogo_160-Unidades_156-Rol_grabar\",\"145-Catalogo_160-Unidades_156-Rol_editar\",\"145-Catalogo_160-Unidades_156-Rol_borrar\",\"145-Catalogo_160-Unidades_156-Rol_otro\",\"145-Catalogo_160-Unidades_159-Zona_grabar\",\"145-Catalogo_160-Unidades_159-Zona_editar\",\"145-Catalogo_160-Unidades_159-Zona_borrar\",\"145-Catalogo_160-Unidades_159-Zona_otro\",\"145-Catalogo_160-Unidades_150-Unidad_grabar\",\"145-Catalogo_160-Unidades_150-Unidad_editar\",\"145-Catalogo_160-Unidades_150-Unidad_borrar\",\"145-Catalogo_160-Unidades_150-Unidad_otro\",\"145-Catalogo_160-Unidades_153-Marca_grabar\",\"145-Catalogo_160-Unidades_153-Marca_editar\",\"145-Catalogo_160-Unidades_153-Marca_borrar\",\"145-Catalogo_160-Unidades_153-Marca_otro\",\"145-Catalogo_160-Unidades_154-Modelo_grabar\",\"145-Catalogo_160-Unidades_154-Modelo_editar\",\"145-Catalogo_160-Unidades_154-Modelo_borrar\",\"145-Catalogo_160-Unidades_154-Modelo_otro\",\"145-Catalogo_160-Unidades_155-Servicio_grabar\",\"145-Catalogo_160-Unidades_155-Servicio_editar\",\"145-Catalogo_160-Unidades_155-Servicio_borrar\",\"145-Catalogo_160-Unidades_155-Servicio_otro\",\"145-Catalogo_160-Unidades_156-Rol_grabar\",\"145-Catalogo_160-Unidades_156-Rol_editar\",\"145-Catalogo_160-Unidades_156-Rol_borrar\",\"145-Catalogo_160-Unidades_156-Rol_otro\",\"145-Catalogo_160-Unidades_159-Zona_grabar\",\"145-Catalogo_160-Unidades_159-Zona_editar\",\"145-Catalogo_160-Unidades_159-Zona_borrar\",\"145-Catalogo_160-Unidades_159-Zona_otro\",\"145-Catalogo_162-Operadores_padre\",\"145-Catalogo_162-Operadores_grabar\",\"145-Catalogo_162-Operadores_editar\",\"145-Catalogo_162-Operadores_borrar\",\"145-Catalogo_162-Operadores_otro\"]', NULL);
INSERT INTO `usuarios` VALUES (69, 'Nuevo Usauario 181920', 'andres@abc.com.mx', 'Andres', 'cWZzZDIxa2w=', '[\"13\",\"14\"]', '[\"6\",\"8\"]', 16, '2018-07-30 17:48:43', 1, '[\"46-Sistema_padre\",\"46-Sistema_grabar\",\"46-Sistema_editar\",\"46-Sistema_borrar\",\"46-Sistema_otro\",\"46-Sistema_47-Usuarios_padre\",\"46-Sistema_47-Usuarios_grabar\",\"46-Sistema_47-Usuarios_editar\",\"46-Sistema_47-Usuarios_borrar\",\"46-Sistema_47-Usuarios_otro\",\"46-Sistema_49-Perfiles_padre\",\"46-Sistema_49-Perfiles_grabar\",\"46-Sistema_49-Perfiles_editar\",\"46-Sistema_49-Perfiles_borrar\",\"46-Sistema_49-Perfiles_otro\",\"46-Sistema_48-Permisos_padre\",\"46-Sistema_48-Permisos_grabar\",\"46-Sistema_48-Permisos_editar\",\"46-Sistema_48-Permisos_borrar\",\"46-Sistema_48-Permisos_otro\",\"171-Fianzas_padre\",\"171-Fianzas_grabar\",\"171-Fianzas_editar\",\"171-Fianzas_borrar\",\"171-Fianzas_otro\",\"171-Fianzas_173-Pagos Fianzas_padre\",\"171-Fianzas_173-Pagos Fianzas_grabar\",\"171-Fianzas_173-Pagos Fianzas_editar\",\"171-Fianzas_173-Pagos Fianzas_borrar\",\"171-Fianzas_173-Pagos Fianzas_otro\",\"171-Fianzas_172-Registro_padre\",\"171-Fianzas_172-Registro_grabar\",\"171-Fianzas_172-Registro_editar\",\"171-Fianzas_172-Registro_borrar\",\"171-Fianzas_172-Registro_otro\",\"145-Catalogo_padre\",\"145-Catalogo_grabar\",\"145-Catalogo_editar\",\"145-Catalogo_borrar\",\"145-Catalogo_otro\",\"145-Catalogo_157-Empresa_padre\",\"145-Catalogo_157-Empresa_grabar\",\"145-Catalogo_157-Empresa_editar\",\"145-Catalogo_157-Empresa_borrar\",\"145-Catalogo_157-Empresa_otro\",\"145-Catalogo_158-Almacen_padre\",\"145-Catalogo_158-Almacen_grabar\",\"145-Catalogo_158-Almacen_editar\",\"145-Catalogo_158-Almacen_borrar\",\"145-Catalogo_158-Almacen_otro\",\"145-Catalogo_163-Placas_padre\",\"145-Catalogo_163-Placas_grabar\",\"145-Catalogo_163-Placas_editar\",\"145-Catalogo_163-Placas_borrar\",\"145-Catalogo_163-Placas_otro\",\"145-Catalogo_164-Periodo Pago_padre\",\"145-Catalogo_164-Periodo Pago_grabar\",\"145-Catalogo_164-Periodo Pago_editar\",\"145-Catalogo_164-Periodo Pago_borrar\",\"145-Catalogo_164-Periodo Pago_otro\",\"145-Catalogo_165-Cobros_padre\",\"145-Catalogo_165-Cobros_grabar\",\"145-Catalogo_165-Cobros_editar\",\"145-Catalogo_165-Cobros_borrar\",\"145-Catalogo_165-Cobros_otro\",\"145-Catalogo_166-Status Fianzas_padre\",\"145-Catalogo_166-Status Fianzas_grabar\",\"145-Catalogo_166-Status Fianzas_editar\",\"145-Catalogo_166-Status Fianzas_borrar\",\"145-Catalogo_166-Status Fianzas_otro\",\"145-Catalogo_161-Permisionario_padre\",\"145-Catalogo_161-Permisionario_grabar\",\"145-Catalogo_161-Permisionario_editar\",\"145-Catalogo_161-Permisionario_borrar\",\"145-Catalogo_161-Permisionario_otro\",\"145-Catalogo_162-Operadores_padre\",\"145-Catalogo_162-Operadores_grabar\",\"145-Catalogo_162-Operadores_editar\",\"145-Catalogo_162-Operadores_borrar\",\"145-Catalogo_162-Operadores_otro\",\"145-Catalogo_160-Unidades_padre\",\"145-Catalogo_160-Unidades_grabar\",\"145-Catalogo_160-Unidades_editar\",\"145-Catalogo_160-Unidades_borrar\",\"145-Catalogo_160-Unidades_otro\",\"145-Catalogo_160-Unidades_150-Unidad_padre\",\"145-Catalogo_160-Unidades_150-Unidad_grabar\",\"145-Catalogo_160-Unidades_150-Unidad_editar\",\"145-Catalogo_160-Unidades_150-Unidad_borrar\",\"145-Catalogo_160-Unidades_150-Unidad_otro\",\"145-Catalogo_160-Unidades_153-Marca_padre\",\"145-Catalogo_160-Unidades_153-Marca_grabar\",\"145-Catalogo_160-Unidades_153-Marca_editar\",\"145-Catalogo_160-Unidades_153-Marca_borrar\",\"145-Catalogo_160-Unidades_153-Marca_otro\",\"145-Catalogo_160-Unidades_154-Modelo_padre\",\"145-Catalogo_160-Unidades_154-Modelo_grabar\",\"145-Catalogo_160-Unidades_154-Modelo_editar\",\"145-Catalogo_160-Unidades_154-Modelo_borrar\",\"145-Catalogo_160-Unidades_154-Modelo_otro\",\"145-Catalogo_160-Unidades_155-Servicio_padre\",\"145-Catalogo_160-Unidades_155-Servicio_grabar\",\"145-Catalogo_160-Unidades_155-Servicio_editar\",\"145-Catalogo_160-Unidades_155-Servicio_borrar\",\"145-Catalogo_160-Unidades_155-Servicio_otro\",\"145-Catalogo_160-Unidades_156-Rol_padre\",\"145-Catalogo_160-Unidades_156-Rol_grabar\",\"145-Catalogo_160-Unidades_156-Rol_editar\",\"145-Catalogo_160-Unidades_156-Rol_borrar\",\"145-Catalogo_160-Unidades_156-Rol_otro\",\"145-Catalogo_160-Unidades_159-Zona_padre\",\"145-Catalogo_160-Unidades_159-Zona_grabar\",\"145-Catalogo_160-Unidades_159-Zona_editar\",\"145-Catalogo_160-Unidades_159-Zona_borrar\",\"145-Catalogo_160-Unidades_159-Zona_otro\"]', NULL);

-- ----------------------------
-- Table structure for usuarios_permisos
-- ----------------------------
DROP TABLE IF EXISTS `usuarios_permisos`;
CREATE TABLE `usuarios_permisos`  (
  `usuarios_permisos_id_usuariospermisos` int(11) NOT NULL AUTO_INCREMENT,
  `usuarios_permisos_nombre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `usuarios_permisos_id_catpermisos` int(11) NULL DEFAULT NULL,
  `usuarios_permisos_status` tinyint(4) NULL DEFAULT NULL,
  `usuarios_permisos_nombre_limpio` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `usuarios_permisos_nombre_controlador` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `usuarios_permisos_class_menu` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `usuarios_permisos_class_header_span` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `usuarios_permisos_class_header_i` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `usuarios_permisos_menu_principal` tinyint(4) NULL DEFAULT NULL,
  `usuarios_permisos_menu_padre` int(11) NULL DEFAULT NULL,
  `usuarios_permisos_nivel_modulo` int(11) NULL DEFAULT NULL,
  `usuarios_permisos_orden_modulo` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`usuarios_permisos_id_usuariospermisos`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of usuarios_permisos
-- ----------------------------
INSERT INTO `usuarios_permisos` VALUES (1, 'Sistema', 1, 1, 'sistema', 'sistema', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `usuarios_permisos` VALUES (2, 'Usuarios', 1, 1, 'usuarios', 'usuarios', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `usuarios_permisos` VALUES (3, 'Permisos', 1, 1, 'permisos', 'permisos', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `usuarios_permisos` VALUES (4, 'Perfiles', 1, 1, 'perfiles', 'perfiles', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
