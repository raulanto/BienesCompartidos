/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100902
 Source Host           : localhost:3306
 Source Schema         : inmueblepr

 Target Server Type    : MySQL
 Target Server Version : 100902
 File Encoding         : 65001

 Date: 24/05/2023 01:32:38
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for asentamiento
-- ----------------------------
DROP TABLE IF EXISTS `asentamiento`;
CREATE TABLE `asentamiento`  (
  `ID_asentamiento` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ID_asentamiento`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of asentamiento
-- ----------------------------
INSERT INTO `asentamiento` VALUES (1, 'Aeropuerto');
INSERT INTO `asentamiento` VALUES (2, 'Colonia');
INSERT INTO `asentamiento` VALUES (3, 'Condominio');
INSERT INTO `asentamiento` VALUES (4, 'Conjunto habitacional');
INSERT INTO `asentamiento` VALUES (5, 'Ejido');
INSERT INTO `asentamiento` VALUES (6, 'Equipamiento');
INSERT INTO `asentamiento` VALUES (7, 'Fraccionamiento');
INSERT INTO `asentamiento` VALUES (8, 'Pueblo');
INSERT INTO `asentamiento` VALUES (9, 'Ranchería');
INSERT INTO `asentamiento` VALUES (10, 'Unidad habitacional');
INSERT INTO `asentamiento` VALUES (11, 'Zona industrial');

-- ----------------------------
-- Table structure for asesor
-- ----------------------------
DROP TABLE IF EXISTS `asesor`;
CREATE TABLE `asesor`  (
  `ID_asesor` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `ape_paterno` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `ape_materno` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `telefono` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `correo` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `CURP` varchar(18) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`ID_asesor`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of asesor
-- ----------------------------
INSERT INTO `asesor` VALUES (1, 'Raul antonio ', 'de la cruz ', 'hernandez', '9371216052', 'eeeeeee@gmail.com', 'wwwwwwwwwwwwwwwwww');

-- ----------------------------
-- Table structure for caracteristicas
-- ----------------------------
DROP TABLE IF EXISTS `caracteristicas`;
CREATE TABLE `caracteristicas`  (
  `ID_caracterisiticas` int NOT NULL AUTO_INCREMENT,
  `superficieTerrestre` float NOT NULL,
  `superficieConstru` float NOT NULL,
  `no_estacionamiento` tinyint NOT NULL,
  `no_baños` tinyint NOT NULL,
  `no_recamaras` tinyint NOT NULL,
  `fk_inmueble` int NOT NULL,
  `fk_estadoinmueble` int NOT NULL,
  `no_NivelesCasa` tinyint NOT NULL DEFAULT 1,
  PRIMARY KEY (`ID_caracterisiticas`) USING BTREE,
  INDEX `inmueble_idx`(`fk_inmueble`) USING BTREE,
  INDEX `estado_idx`(`fk_estadoinmueble`) USING BTREE,
  CONSTRAINT `estado` FOREIGN KEY (`fk_estadoinmueble`) REFERENCES `estadoinmuebles` (`ID_estadoinmuebles`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `inmueble2` FOREIGN KEY (`fk_inmueble`) REFERENCES `inmueble` (`ID_inmueble`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of caracteristicas
-- ----------------------------
INSERT INTO `caracteristicas` VALUES (24, 150, 120, 1, 1, 1, 1, 2, 0);
INSERT INTO `caracteristicas` VALUES (25, 100, 50, 0, 2, 2, 2, 1, 0);
INSERT INTO `caracteristicas` VALUES (26, 1, 1, 1, 1, 1, 3, 2, 0);

-- ----------------------------
-- Table structure for colonias
-- ----------------------------
DROP TABLE IF EXISTS `colonias`;
CREATE TABLE `colonias`  (
  `ID_colonias` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `fk_tipodeAsentamiento` int NOT NULL,
  `CP` varchar(6) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ID_colonias`) USING BTREE,
  INDEX `asentamientofk_idx`(`fk_tipodeAsentamiento`) USING BTREE,
  CONSTRAINT `asentamientofk` FOREIGN KEY (`fk_tipodeAsentamiento`) REFERENCES `asentamiento` (`ID_asentamiento`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 450 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of colonias
-- ----------------------------
INSERT INTO `colonias` VALUES (1, 'Villahermosa (Cap. P. A. Carlos Rovirosa)', 1, '86049');
INSERT INTO `colonias` VALUES (2, '18 de Marzo', 2, '86140');
INSERT INTO `colonias` VALUES (3, 'Adolfo Lopez Mateos', 2, '86040');
INSERT INTO `colonias` VALUES (4, 'Agraria (La Isla)', 2, '86289');
INSERT INTO `colonias` VALUES (5, 'Anacleto Canabal 1ra. Sección', 2, '86287');
INSERT INTO `colonias` VALUES (6, 'Anacleto Canabal 2da. Sección', 2, '86287');
INSERT INTO `colonias` VALUES (7, 'Atasta', 2, '86100');
INSERT INTO `colonias` VALUES (8, 'Buena Vista Río Nuevo 4a Sección', 2, '86280');
INSERT INTO `colonias` VALUES (9, 'Carrizal', 2, '86108');
INSERT INTO `colonias` VALUES (10, 'Casa Blanca 1a Sección', 2, '86060');
INSERT INTO `colonias` VALUES (11, 'Casa Blanca 2a Sección', 2, '86060');
INSERT INTO `colonias` VALUES (12, 'Clara Córdova Moran', 2, '86288');
INSERT INTO `colonias` VALUES (13, 'Constitución', 2, '86276');
INSERT INTO `colonias` VALUES (14, 'Cotip', 2, '86129');
INSERT INTO `colonias` VALUES (15, 'Del Bosque', 2, '86160');
INSERT INTO `colonias` VALUES (16, 'El Espejo 1', 2, '86108');
INSERT INTO `colonias` VALUES (17, 'El Espejo 2', 2, '86109');
INSERT INTO `colonias` VALUES (18, 'El Parque', 2, '86096');
INSERT INTO `colonias` VALUES (19, 'El Recreo', 2, '86020');
INSERT INTO `colonias` VALUES (20, 'Florida', 2, '86040');
INSERT INTO `colonias` VALUES (21, 'Framboyanes', 2, '86020');
INSERT INTO `colonias` VALUES (22, 'Galaxia/tabasco 2000', 2, '86035');
INSERT INTO `colonias` VALUES (23, 'Gaviotas Norte', 2, '86068');
INSERT INTO `colonias` VALUES (24, 'Gaviotas Norte Sector Explanada', 2, '86090');
INSERT INTO `colonias` VALUES (25, 'Gaviotas Norte Sector Popular', 2, '86067');
INSERT INTO `colonias` VALUES (26, 'Gaviotas Sur (El Monal)', 2, '86099');
INSERT INTO `colonias` VALUES (27, 'Gaviotas Sur Sección San Jose', 2, '86090');
INSERT INTO `colonias` VALUES (28, 'Gaviotas Sur Sector Armenia', 2, '86099');
INSERT INTO `colonias` VALUES (29, 'Gil y Sáenz (El Águila)', 2, '86080');
INSERT INTO `colonias` VALUES (30, 'Guadalupe Borja', 2, '86120');
INSERT INTO `colonias` VALUES (31, 'Guayabal', 2, '86090');
INSERT INTO `colonias` VALUES (32, 'Jardines de Villahermosa', 2, '86027');
INSERT INTO `colonias` VALUES (33, 'Jesús Garcia', 2, '86040');
INSERT INTO `colonias` VALUES (34, 'Jose Colomo', 2, '86100');
INSERT INTO `colonias` VALUES (35, 'José María Pino Suárez', 2, '86029');
INSERT INTO `colonias` VALUES (36, 'Jose N Rovirosa', 2, '86050');
INSERT INTO `colonias` VALUES (37, 'Jose Pages Llergo', 2, '86125');
INSERT INTO `colonias` VALUES (38, 'La Manga I', 2, '86069');
INSERT INTO `colonias` VALUES (39, 'La Manga II', 2, '86068');
INSERT INTO `colonias` VALUES (40, 'La Manga III', 2, '86068');
INSERT INTO `colonias` VALUES (41, 'La Providencia (La Majahua)', 2, '86193');
INSERT INTO `colonias` VALUES (42, 'Lago Ilusiones', 2, '86040');
INSERT INTO `colonias` VALUES (43, 'Las Brisas', 2, '86095');
INSERT INTO `colonias` VALUES (44, 'Las Delicias', 2, '86140');
INSERT INTO `colonias` VALUES (45, 'Las Torres', 2, '86026');
INSERT INTO `colonias` VALUES (46, 'Lidia Esther Mónica de Portilla', 2, '86040');
INSERT INTO `colonias` VALUES (47, 'Lindavista', 2, '86050');
INSERT INTO `colonias` VALUES (48, 'Loma Bonita', 2, '86050');
INSERT INTO `colonias` VALUES (49, 'Loma Linda', 2, '86050');
INSERT INTO `colonias` VALUES (50, 'Los Pinos', 2, '86108');
INSERT INTO `colonias` VALUES (51, 'Magisterial', 2, '86040');
INSERT INTO `colonias` VALUES (52, 'Mayito', 2, '86098');
INSERT INTO `colonias` VALUES (53, 'Medellin y Pigua 1ra. Sección', 2, '86010');
INSERT INTO `colonias` VALUES (54, 'Miguel Hidalgo', 2, '86127');
INSERT INTO `colonias` VALUES (55, 'Municipal', 2, '86090');
INSERT INTO `colonias` VALUES (56, 'Nueva Pensiones', 2, '86149');
INSERT INTO `colonias` VALUES (57, 'Nueva Villahermosa', 2, '86070');
INSERT INTO `colonias` VALUES (58, 'Parque Tabasco', 2, '86037');
INSERT INTO `colonias` VALUES (59, 'Paseos Del Usumacinta', 2, '86035');
INSERT INTO `colonias` VALUES (60, 'Pensiones', 2, '86169');
INSERT INTO `colonias` VALUES (61, 'Periodista', 2, '86059');
INSERT INTO `colonias` VALUES (62, 'Pino Suárez', 2, '86168');
INSERT INTO `colonias` VALUES (63, 'Plutarco Elías Calles (Cura Hueso)', 2, '86170');
INSERT INTO `colonias` VALUES (64, 'Primero de Mayo', 2, '86190');
INSERT INTO `colonias` VALUES (65, 'Privada Golondrinas', 2, '86026');
INSERT INTO `colonias` VALUES (66, 'Punta Brava', 2, '86150');
INSERT INTO `colonias` VALUES (67, 'Real de Sabina', 2, '86153');
INSERT INTO `colonias` VALUES (68, 'Real de Tabasco', 2, '86035');
INSERT INTO `colonias` VALUES (69, 'Reforma', 2, '86250');
INSERT INTO `colonias` VALUES (70, 'Reforma', 2, '86080');
INSERT INTO `colonias` VALUES (71, 'Revolución', 2, '86288');
INSERT INTO `colonias` VALUES (72, 'Roberto Madrazo Pintado Ciudad Industrial', 2, '86019');
INSERT INTO `colonias` VALUES (73, 'Sabina', 2, '86153');
INSERT INTO `colonias` VALUES (74, 'San Antonio', 2, '86288');
INSERT INTO `colonias` VALUES (75, 'Sanchez Magallanes', 2, '86160');
INSERT INTO `colonias` VALUES (76, 'Santa Isabel', 2, '86250');
INSERT INTO `colonias` VALUES (77, 'Santa Rita', 2, '86289');
INSERT INTO `colonias` VALUES (78, 'Tamulte de las Barrancas', 2, '86150');
INSERT INTO `colonias` VALUES (79, 'Tierra Colorada', 2, '86029');
INSERT INTO `colonias` VALUES (80, 'Triangulo Industrial', 2, '86010');
INSERT INTO `colonias` VALUES (81, 'Triunfo la Manga I', 2, '86099');
INSERT INTO `colonias` VALUES (82, 'Vicente Guerrero', 2, '86019');
INSERT INTO `colonias` VALUES (83, 'Villa de las Palmas', 2, '86026');
INSERT INTO `colonias` VALUES (84, 'Villa de los Arcos', 2, '86130');
INSERT INTO `colonias` VALUES (85, 'Villa de los Trabajadores', 2, '86108');
INSERT INTO `colonias` VALUES (86, 'Villa las Fuentes', 2, '86167');
INSERT INTO `colonias` VALUES (87, 'Villahermosa Centro', 2, '86000');
INSERT INTO `colonias` VALUES (88, 'Fovissste Casa Blanca', 3, '86060');
INSERT INTO `colonias` VALUES (89, 'Arboledas', 4, '86079');
INSERT INTO `colonias` VALUES (90, 'Acachapan y Colmena 2da. Sección (El Maluco)', 5, '86277');
INSERT INTO `colonias` VALUES (91, 'La Victoria', 5, '86290');
INSERT INTO `colonias` VALUES (92, 'Parrilla 5ta. Sección (El Carmen)', 5, '86288');
INSERT INTO `colonias` VALUES (93, 'Secretaria de La Defensa Nacional', 6, '86087');
INSERT INTO `colonias` VALUES (94, 'Universidad Autónoma de Tabasco', 6, '86025');
INSERT INTO `colonias` VALUES (95, '27 de Octubre', 7, '86288');
INSERT INTO `colonias` VALUES (96, 'Alfa y Omega', 7, '86281');
INSERT INTO `colonias` VALUES (97, 'Álvaro Obregón', 7, '86050');
INSERT INTO `colonias` VALUES (98, 'América', 7, '86143');
INSERT INTO `colonias` VALUES (99, 'Ángeles Ixtacomitan', 7, '86143');
INSERT INTO `colonias` VALUES (100, 'Aurora', 7, '86107');
INSERT INTO `colonias` VALUES (101, 'Benito Juárez', 7, '86126');
INSERT INTO `colonias` VALUES (102, 'Bicentenario', 7, '86290');
INSERT INTO `colonias` VALUES (103, 'Blancas Mariposas', 7, '86170');
INSERT INTO `colonias` VALUES (104, 'Bonampak', 7, '86127');
INSERT INTO `colonias` VALUES (105, 'Bonanza', 7, '86030');
INSERT INTO `colonias` VALUES (106, 'Bosques de Araba', 7, '86294');
INSERT INTO `colonias` VALUES (107, 'Bosques de Villahermosa', 7, '86030');
INSERT INTO `colonias` VALUES (108, 'Brisa del Usumacinta', 7, '86100');
INSERT INTO `colonias` VALUES (109, 'Brisas Del Grijalva', 7, '86060');
INSERT INTO `colonias` VALUES (110, 'Campestre Parrilla', 7, '86284');
INSERT INTO `colonias` VALUES (111, 'Carlos A Madrazo', 7, '86126');
INSERT INTO `colonias` VALUES (112, 'Carlos Pellicer Camara', 7, '86270');
INSERT INTO `colonias` VALUES (113, 'Carrizal', 7, '86038');
INSERT INTO `colonias` VALUES (114, 'Casa del Árbol', 7, '86284');
INSERT INTO `colonias` VALUES (115, 'Casas Para Todos', 7, '86284');
INSERT INTO `colonias` VALUES (116, 'Cedros', 7, '86068');
INSERT INTO `colonias` VALUES (117, 'Chichicaste', 7, '86127');
INSERT INTO `colonias` VALUES (118, 'Chilam Balam', 7, '86284');
INSERT INTO `colonias` VALUES (119, 'Club Campestre', 7, '86037');
INSERT INTO `colonias` VALUES (120, 'Club de Lago', 7, '86035');
INSERT INTO `colonias` VALUES (121, 'Colinas de Santo Domingo', 7, '86270');
INSERT INTO `colonias` VALUES (122, 'Conjunto Habitacional Los Álamos', 7, '86108');
INSERT INTO `colonias` VALUES (123, 'Conjunto Habitacional Revolución', 7, '86140');
INSERT INTO `colonias` VALUES (124, 'Conjunto Habitacional Tercer Milenio', 7, '86250');
INSERT INTO `colonias` VALUES (125, 'Cosmos', 7, '86017');
INSERT INTO `colonias` VALUES (126, 'Cumbres', 7, '86144');
INSERT INTO `colonias` VALUES (127, 'Deportiva Residencial', 7, '86189');
INSERT INTO `colonias` VALUES (128, 'Edén Premier', 7, '86153');
INSERT INTO `colonias` VALUES (129, 'El Almendro', 7, '86288');
INSERT INTO `colonias` VALUES (130, 'El Amate', 7, '86284');
INSERT INTO `colonias` VALUES (131, 'El Árbol', 7, '86284');
INSERT INTO `colonias` VALUES (132, 'El Country', 7, '86287');
INSERT INTO `colonias` VALUES (133, 'El Edén', 7, '86153');
INSERT INTO `colonias` VALUES (134, 'El Encanto', 7, '86288');
INSERT INTO `colonias` VALUES (135, 'El Manzano', 7, '86288');
INSERT INTO `colonias` VALUES (136, 'El Paraíso', 7, '86288');
INSERT INTO `colonias` VALUES (137, 'España', 7, '86190');
INSERT INTO `colonias` VALUES (138, 'Espinoza Galindo', 7, '86288');
INSERT INTO `colonias` VALUES (139, 'Estrellas de Buenavista', 7, '86127');
INSERT INTO `colonias` VALUES (140, 'Flores del Trópico', 7, '86287');
INSERT INTO `colonias` VALUES (141, 'Fovissste Kilómetro 9', 7, '86284');
INSERT INTO `colonias` VALUES (142, 'Francisco Villa', 7, '86019');
INSERT INTO `colonias` VALUES (143, 'Galaxia', 7, '86035');
INSERT INTO `colonias` VALUES (144, 'Gracias México', 7, '86288');
INSERT INTO `colonias` VALUES (145, 'Guadalupe', 7, '86180');
INSERT INTO `colonias` VALUES (146, 'Hacienda Buena Vista', 7, '86126');
INSERT INTO `colonias` VALUES (147, 'Hacienda Casa Blanca', 7, '86287');
INSERT INTO `colonias` VALUES (148, 'Hacienda Del Sol', 7, '86288');
INSERT INTO `colonias` VALUES (149, 'Hacienda Esmeralda', 7, '86144');
INSERT INTO `colonias` VALUES (150, 'Heriberto Kehoe Vicent', 7, '86030');
INSERT INTO `colonias` VALUES (151, 'Huapinol', 7, '86284');
INSERT INTO `colonias` VALUES (152, 'Infonavit Parrilla', 7, '86284');
INSERT INTO `colonias` VALUES (153, 'Insurgentes', 7, '86019');
INSERT INTO `colonias` VALUES (154, 'Islas Del Mundo', 7, '86126');
INSERT INTO `colonias` VALUES (155, 'Isset', 7, '86270');
INSERT INTO `colonias` VALUES (156, 'Jardines de Buenavista', 7, '86127');
INSERT INTO `colonias` VALUES (157, 'Jardines de Huapinol', 7, '86284');
INSERT INTO `colonias` VALUES (158, 'Jardines del Country', 7, '86287');
INSERT INTO `colonias` VALUES (159, 'Jardines Del Sol', 7, '86017');
INSERT INTO `colonias` VALUES (160, 'Jardines Del Sur I y II', 7, '86150');
INSERT INTO `colonias` VALUES (161, 'Jesús Antonio Sibilla Zurita', 7, '86280');
INSERT INTO `colonias` VALUES (162, 'Joyas de Buena Vista', 7, '86126');
INSERT INTO `colonias` VALUES (163, 'Juchimán', 7, '86284');
INSERT INTO `colonias` VALUES (164, 'La Ceiba', 7, '86180');
INSERT INTO `colonias` VALUES (165, 'La Ceiba', 7, '86127');
INSERT INTO `colonias` VALUES (166, 'La Ceiba', 7, '86270');
INSERT INTO `colonias` VALUES (167, 'La Choca', 7, '86037');
INSERT INTO `colonias` VALUES (168, 'La Gloria', 7, '86170');
INSERT INTO `colonias` VALUES (169, 'La Gran Villa', 7, '86035');
INSERT INTO `colonias` VALUES (170, 'La Huerta Residencial', 7, '86276');
INSERT INTO `colonias` VALUES (171, 'La Joya', 7, '86109');
INSERT INTO `colonias` VALUES (172, 'La Lima', 7, '86288');
INSERT INTO `colonias` VALUES (173, 'La Pigua', 7, '86017');
INSERT INTO `colonias` VALUES (174, 'La Unión hace la Fuerza', 7, '86284');
INSERT INTO `colonias` VALUES (175, 'La Venta', 7, '86288');
INSERT INTO `colonias` VALUES (176, 'Lagunas', 7, '86019');
INSERT INTO `colonias` VALUES (177, 'Lagunas de San José', 7, '86019');
INSERT INTO `colonias` VALUES (178, 'Las Garzas', 7, '86017');
INSERT INTO `colonias` VALUES (179, 'Las Giraldas', 7, '86038');
INSERT INTO `colonias` VALUES (180, 'Las Hadas', 7, '86287');
INSERT INTO `colonias` VALUES (181, 'Las Huertas', 7, '86144');
INSERT INTO `colonias` VALUES (182, 'Las Lomas', 7, '86144');
INSERT INTO `colonias` VALUES (183, 'Las Margaritas', 7, '86293');
INSERT INTO `colonias` VALUES (184, 'Las Mercedes', 7, '86288');
INSERT INTO `colonias` VALUES (185, 'Las Rosas', 7, '86270');
INSERT INTO `colonias` VALUES (186, 'Las Torres', 7, '86039');
INSERT INTO `colonias` VALUES (187, 'Loma Diamante', 7, '86170');
INSERT INTO `colonias` VALUES (188, 'Loma Real', 7, '86170');
INSERT INTO `colonias` VALUES (189, 'Lomas de Bella Vista', 7, '86126');
INSERT INTO `colonias` VALUES (190, 'Lomas de Ocuiltzapotlan', 7, '86270');
INSERT INTO `colonias` VALUES (191, 'Lomas Del Dorado', 7, '86153');
INSERT INTO `colonias` VALUES (192, 'Lomas del Encanto', 7, '86270');
INSERT INTO `colonias` VALUES (193, 'Lomas del Palmar', 7, '86288');
INSERT INTO `colonias` VALUES (194, 'Los Angeles', 7, '86270');
INSERT INTO `colonias` VALUES (195, 'Los Gansos', 7, '86283');
INSERT INTO `colonias` VALUES (196, 'Los Mezquites', 7, '86143');
INSERT INTO `colonias` VALUES (197, 'Los Ríos', 7, '86035');
INSERT INTO `colonias` VALUES (198, 'Los Sauces Residencial', 7, '86127');
INSERT INTO `colonias` VALUES (199, 'Los Tulipanes', 7, '86097');
INSERT INTO `colonias` VALUES (200, 'Macuilis', 7, '86100');
INSERT INTO `colonias` VALUES (201, 'Manuel Andrade Díaz', 7, '86126');
INSERT INTO `colonias` VALUES (202, 'Marcos Buendia', 7, '86190');
INSERT INTO `colonias` VALUES (203, 'Militar', 7, '86170');
INSERT INTO `colonias` VALUES (204, 'Militar', 7, '86050');
INSERT INTO `colonias` VALUES (205, 'Monteceibas', 7, '86288');
INSERT INTO `colonias` VALUES (206, 'Multiochenta', 7, '86035');
INSERT INTO `colonias` VALUES (207, 'Nances', 7, '86030');
INSERT INTO `colonias` VALUES (208, 'Nueva Invitab', 7, '86126');
INSERT INTO `colonias` VALUES (209, 'Ocuitzapotlán Dos', 7, '86270');
INSERT INTO `colonias` VALUES (210, 'Olimpo', 7, '86127');
INSERT INTO `colonias` VALUES (211, 'Olmeca', 7, '86019');
INSERT INTO `colonias` VALUES (212, 'Ónix', 7, '86144');
INSERT INTO `colonias` VALUES (213, 'Oropeza', 7, '86030');
INSERT INTO `colonias` VALUES (214, 'Orquidea', 7, '86180');
INSERT INTO `colonias` VALUES (215, 'Palma Real', 7, '86143');
INSERT INTO `colonias` VALUES (216, 'Palmeira', 7, '86190');
INSERT INTO `colonias` VALUES (217, 'Parrilla II', 7, '86288');
INSERT INTO `colonias` VALUES (218, 'Paso Real', 7, '86153');
INSERT INTO `colonias` VALUES (219, 'Plaza Jardín', 7, '86170');
INSERT INTO `colonias` VALUES (220, 'Plaza Villahermosa', 7, '86179');
INSERT INTO `colonias` VALUES (221, 'Policía y Transito', 7, '86284');
INSERT INTO `colonias` VALUES (222, 'Popular Manuel Silva', 7, '86284');
INSERT INTO `colonias` VALUES (223, 'Popular Pedro C Colorado', 7, '86153');
INSERT INTO `colonias` VALUES (224, 'Portal del Agua', 7, '86000');
INSERT INTO `colonias` VALUES (225, 'Prados de Villahermosa', 7, '86030');
INSERT INTO `colonias` VALUES (226, 'Privada Alcatraces', 7, '86100');
INSERT INTO `colonias` VALUES (227, 'Privada de Lagunas del Maurel', 7, '86019');
INSERT INTO `colonias` VALUES (228, 'Privada La Mandarina', 7, '86143');
INSERT INTO `colonias` VALUES (229, 'Privanza del Campo', 7, '86143');
INSERT INTO `colonias` VALUES (230, 'Puerta Azul', 7, '86287');
INSERT INTO `colonias` VALUES (231, 'Puerta de Hierro', 7, '86287');
INSERT INTO `colonias` VALUES (232, 'Puerta Grande', 7, '86287');
INSERT INTO `colonias` VALUES (233, 'Puerta Magna', 7, '86287');
INSERT INTO `colonias` VALUES (234, 'Puerta Real', 7, '86287');
INSERT INTO `colonias` VALUES (235, 'Real de Diamante', 7, '86270');
INSERT INTO `colonias` VALUES (236, 'Real de Minas', 7, '86035');
INSERT INTO `colonias` VALUES (237, 'Real de San Jorge', 7, '86153');
INSERT INTO `colonias` VALUES (238, 'Real del Angel', 7, '86153');
INSERT INTO `colonias` VALUES (239, 'Real Del Sur', 7, '86170');
INSERT INTO `colonias` VALUES (240, 'Real del Valle', 7, '86127');
INSERT INTO `colonias` VALUES (241, 'Real Usumacinta', 7, '86108');
INSERT INTO `colonias` VALUES (242, 'Residencial Bugambilias', 7, '86100');
INSERT INTO `colonias` VALUES (243, 'Residencial del Río', 7, '86127');
INSERT INTO `colonias` VALUES (244, 'Residencial Esmeralda', 7, '86190');
INSERT INTO `colonias` VALUES (245, 'Residencial Flamingos', 7, '86030');
INSERT INTO `colonias` VALUES (246, 'Residencial Los Ángeles', 7, '86030');
INSERT INTO `colonias` VALUES (247, 'Residencial Los Robles', 7, '86170');
INSERT INTO `colonias` VALUES (248, 'Residencial Paseo de las Palmas', 7, '86050');
INSERT INTO `colonias` VALUES (249, 'Residencial Río Viejo', 7, '86127');
INSERT INTO `colonias` VALUES (250, 'Residencial San Ángel', 7, '86108');
INSERT INTO `colonias` VALUES (251, 'Residencial Villas del Sol', 7, '86100');
INSERT INTO `colonias` VALUES (252, 'San Ángel', 7, '86281');
INSERT INTO `colonias` VALUES (253, 'San Felipe de Jesús', 7, '86276');
INSERT INTO `colonias` VALUES (254, 'San Jorge III', 7, '86153');
INSERT INTO `colonias` VALUES (255, 'San José', 7, '86153');
INSERT INTO `colonias` VALUES (256, 'San Manuel', 7, '86288');
INSERT INTO `colonias` VALUES (257, 'San Miguel', 7, '86127');
INSERT INTO `colonias` VALUES (258, 'Santa Cecilia (los Músicos)', 7, '86284');
INSERT INTO `colonias` VALUES (259, 'Santa Elena', 7, '86126');
INSERT INTO `colonias` VALUES (260, 'Santa Fe', 7, '86284');
INSERT INTO `colonias` VALUES (261, 'Santa Karla II', 7, '86150');
INSERT INTO `colonias` VALUES (262, 'Santa Teresa', 7, '86143');
INSERT INTO `colonias` VALUES (263, 'Sol Campestre', 7, '86287');
INSERT INTO `colonias` VALUES (264, 'Topacio', 7, '86288');
INSERT INTO `colonias` VALUES (265, 'Triunfo La Manga 3', 7, '86099');
INSERT INTO `colonias` VALUES (266, 'Tucanes las Quintas', 7, '86107');
INSERT INTO `colonias` VALUES (267, 'Valle del Jaguar', 7, '86287');
INSERT INTO `colonias` VALUES (268, 'Valle Marino', 7, '86026');
INSERT INTO `colonias` VALUES (269, 'Villa de las Flores', 7, '86019');
INSERT INTO `colonias` VALUES (270, 'Villa de los Ríos', 7, '86035');
INSERT INTO `colonias` VALUES (271, 'Villa el Cielo', 7, '86290');
INSERT INTO `colonias` VALUES (272, 'Villa Floresta', 7, '86284');
INSERT INTO `colonias` VALUES (273, 'Villa las Torres', 7, '86126');
INSERT INTO `colonias` VALUES (274, 'Villa los Claustros', 7, '86288');
INSERT INTO `colonias` VALUES (275, 'Villas Del Bosque', 7, '86109');
INSERT INTO `colonias` VALUES (276, 'Villas Del Campestre', 7, '86035');
INSERT INTO `colonias` VALUES (277, 'Virginia', 7, '86108');
INSERT INTO `colonias` VALUES (278, 'Vista Alegre', 7, '86137');
INSERT INTO `colonias` VALUES (279, 'Zafiro', 7, '86287');
INSERT INTO `colonias` VALUES (280, 'Anacleto Canabal 3ra. Sección', 8, '86287');
INSERT INTO `colonias` VALUES (281, 'Anacleto Canabal 4ta. Sección', 8, '86287');
INSERT INTO `colonias` VALUES (282, 'Carlos A Madrazo', 8, '86143');
INSERT INTO `colonias` VALUES (283, 'Dos Montes', 8, '86275');
INSERT INTO `colonias` VALUES (284, 'El Espino', 8, '86258');
INSERT INTO `colonias` VALUES (285, 'El Recreo', 8, '86289');
INSERT INTO `colonias` VALUES (286, 'La Arena', 8, '86257');
INSERT INTO `colonias` VALUES (287, 'La Vuelta (laguna)', 8, '86274');
INSERT INTO `colonias` VALUES (288, 'Luis Gil Pérez', 8, '86280');
INSERT INTO `colonias` VALUES (289, 'Macultepec', 8, '86250');
INSERT INTO `colonias` VALUES (290, 'Ocuiltzapotlán', 8, '86270');
INSERT INTO `colonias` VALUES (291, 'Parrilla', 8, '86284');
INSERT INTO `colonias` VALUES (292, 'Playas del Rosario (Subteniente García)', 8, '86288');
INSERT INTO `colonias` VALUES (293, 'Pueblo Nuevo de las Raíces', 8, '86289');
INSERT INTO `colonias` VALUES (294, 'Río Viejo 1a Sección', 8, '86127');
INSERT INTO `colonias` VALUES (295, 'Santa Catalina (San Marcos)', 8, '86287');
INSERT INTO `colonias` VALUES (296, 'Tamulté de las Sabanas', 8, '86250');
INSERT INTO `colonias` VALUES (297, 'Acachapan y Colmena 1a Secc', 9, '86281');
INSERT INTO `colonias` VALUES (298, 'Acachapan y Colmena 2da. Sección (La Arena)', 9, '86277');
INSERT INTO `colonias` VALUES (299, 'Acachapan y Colmena 3ra. Sección', 9, '86277');
INSERT INTO `colonias` VALUES (300, 'Acachapan y Colmena 4ta. Sección', 9, '86255');
INSERT INTO `colonias` VALUES (301, 'Acachapan y Colmena 5a Sección', 9, '86255');
INSERT INTO `colonias` VALUES (302, 'Alvarado (Colima)', 9, '86291');
INSERT INTO `colonias` VALUES (303, 'Alvarado Guardacosta', 9, '86291');
INSERT INTO `colonias` VALUES (304, 'Alvarado Jimbal', 9, '86292');
INSERT INTO `colonias` VALUES (305, 'Alvarado Santa Irene 1ra. Sección', 9, '86293');
INSERT INTO `colonias` VALUES (306, 'Alvarado Santa Irene 2da. Sección (El Taizal)', 9, '86297');
INSERT INTO `colonias` VALUES (307, 'Aniceto', 9, '86253');
INSERT INTO `colonias` VALUES (308, 'Aztlán 1a Sección (Sector La Piedad)', 9, '86277');
INSERT INTO `colonias` VALUES (309, 'Aztlán 1ra. Sección', 9, '86278');
INSERT INTO `colonias` VALUES (310, 'Aztlán 1ra. Sección (Sector Majahual)', 9, '86278');
INSERT INTO `colonias` VALUES (311, 'Aztlán 2da. Sección el Cuy', 9, '86278');
INSERT INTO `colonias` VALUES (312, 'Aztlán 3a Sección (Jahuacte)', 9, '86278');
INSERT INTO `colonias` VALUES (313, 'Aztlán 4ta. Sección (Corcho y Chilapilla)', 9, '86256');
INSERT INTO `colonias` VALUES (314, 'Aztlán 5ta. Sección (Palomillal)', 9, '86257');
INSERT INTO `colonias` VALUES (315, 'Barrancas y Amate 2da. Sección', 9, '86273');
INSERT INTO `colonias` VALUES (316, 'Barrancas y Amate 3ra. Sección', 9, '86273');
INSERT INTO `colonias` VALUES (317, 'Barrancas y Guanal González', 9, '86275');
INSERT INTO `colonias` VALUES (318, 'Barrancas y Guanal López Portillo', 9, '86275');
INSERT INTO `colonias` VALUES (319, 'Barrancas y Guanal Tintillo', 9, '86275');
INSERT INTO `colonias` VALUES (320, 'Boca de Aztlán 2da. Sección', 9, '86278');
INSERT INTO `colonias` VALUES (321, 'Boca de Guanal', 9, '86278');
INSERT INTO `colonias` VALUES (322, 'Boquerón (San Pedro)', 9, '86294');
INSERT INTO `colonias` VALUES (323, 'Boquerón 2a Sección (El Barquillo)', 9, '86293');
INSERT INTO `colonias` VALUES (324, 'Boquerón 3a Sección (Guanal)', 9, '86294');
INSERT INTO `colonias` VALUES (325, 'Boquerón 4a Sección (Laguna Nueva)', 9, '86294');
INSERT INTO `colonias` VALUES (326, 'Boquerón 5a Sección (La Lagartera)', 9, '86295');
INSERT INTO `colonias` VALUES (327, 'Buena Vista 1a Sección', 9, '86254');
INSERT INTO `colonias` VALUES (328, 'Buena Vista 2da. Sección', 9, '86250');
INSERT INTO `colonias` VALUES (329, 'Buena Vista 3a Sección (Boca de Escoba)', 9, '86255');
INSERT INTO `colonias` VALUES (330, 'Buena Vista Río Nuevo 1ra. Sección', 9, '86280');
INSERT INTO `colonias` VALUES (331, 'Buena Vista Río Nuevo 2a Sección', 9, '86283');
INSERT INTO `colonias` VALUES (332, 'Buena Vista Río Nuevo 3a Sección', 9, '86283');
INSERT INTO `colonias` VALUES (333, 'Chacté', 9, '86274');
INSERT INTO `colonias` VALUES (334, 'Chiquiguao 1ra. Sección', 9, '86274');
INSERT INTO `colonias` VALUES (335, 'Chiquiguao 2da. Sección (Chiquiguaíto)', 9, '86274');
INSERT INTO `colonias` VALUES (336, 'Coronel Traconis (Guerrero 3ra. Sección)', 9, '86265');
INSERT INTO `colonias` VALUES (337, 'Coronel Traconis (San Diego 5ta. Sección)', 9, '86265');
INSERT INTO `colonias` VALUES (338, 'Coronel Traconis (San Francisco 4ta. Sección)', 9, '86265');
INSERT INTO `colonias` VALUES (339, 'Coronel Traconis 1ra Sección (La Isla)', 9, '86265');
INSERT INTO `colonias` VALUES (340, 'Coronel Traconis 2da. Sección (El Zapote)', 9, '86265');
INSERT INTO `colonias` VALUES (341, 'Corregidora Ortiz 1a Secc', 9, '86280');
INSERT INTO `colonias` VALUES (342, 'Corregidora Ortiz 2a Secc', 9, '86287');
INSERT INTO `colonias` VALUES (343, 'Corregidora Ortiz 3ra Sección (San Pedrito)', 9, '86280');
INSERT INTO `colonias` VALUES (344, 'Corregidora Ortiz 4a Sección', 9, '86280');
INSERT INTO `colonias` VALUES (345, 'Corregidora Ortiz 5a Secc', 9, '86280');
INSERT INTO `colonias` VALUES (346, 'El Alambrado', 9, '86253');
INSERT INTO `colonias` VALUES (347, 'El Censo', 9, '86266');
INSERT INTO `colonias` VALUES (348, 'El Corozal', 9, '86273');
INSERT INTO `colonias` VALUES (349, 'El Novillo', 9, '86250');
INSERT INTO `colonias` VALUES (350, 'El Zapotal', 9, '86276');
INSERT INTO `colonias` VALUES (351, 'Emiliano Zapata', 9, '86287');
INSERT INTO `colonias` VALUES (352, 'Estancia', 9, '86253');
INSERT INTO `colonias` VALUES (353, 'Estancia Vieja 1a Secc', 9, '86283');
INSERT INTO `colonias` VALUES (354, 'Estancia Vieja 2a Secc', 9, '86283');
INSERT INTO `colonias` VALUES (355, 'Estanzuela 1ra. Sección', 9, '86288');
INSERT INTO `colonias` VALUES (356, 'Estanzuela 2da. Sección', 9, '86288');
INSERT INTO `colonias` VALUES (357, 'García', 9, '86254');
INSERT INTO `colonias` VALUES (358, 'Gaviotas Sur (El Cedral)', 9, '86260');
INSERT INTO `colonias` VALUES (359, 'Gaviotas Sur (El Chiflón)', 9, '86260');
INSERT INTO `colonias` VALUES (360, 'Gonzalez 1a Secc', 9, '86280');
INSERT INTO `colonias` VALUES (361, 'Gonzalez 2a Secc', 9, '86280');
INSERT INTO `colonias` VALUES (362, 'Gonzalez 3a Secc', 9, '86280');
INSERT INTO `colonias` VALUES (363, 'González 4a Secc', 9, '86283');
INSERT INTO `colonias` VALUES (364, 'Guineo 1a Secc', 9, '86283');
INSERT INTO `colonias` VALUES (365, 'Hueso de Puerco', 9, '86298');
INSERT INTO `colonias` VALUES (366, 'Ismate y Chilapilla 1ra Sección (San Antonio)', 9, '86274');
INSERT INTO `colonias` VALUES (367, 'Ismate y Chilapilla 1ra. Sección', 9, '86274');
INSERT INTO `colonias` VALUES (368, 'Ismate y Chilapilla 2a Sección (Jahuactillo)', 9, '86274');
INSERT INTO `colonias` VALUES (369, 'Ismate y Chilapilla 2a Sección (Zapotal)', 9, '86274');
INSERT INTO `colonias` VALUES (370, 'Ixtacomitán 1ra. Sección', 9, '86143');
INSERT INTO `colonias` VALUES (371, 'Ixtacomitán 2a. Sección', 9, '86144');
INSERT INTO `colonias` VALUES (372, 'Ixtacomitan 3a Sección', 9, '86153');
INSERT INTO `colonias` VALUES (373, 'Ixtacomitan 4a Sección', 9, '86144');
INSERT INTO `colonias` VALUES (374, 'Ixtacomitan 5a Sección', 9, '86294');
INSERT INTO `colonias` VALUES (375, 'Jolochero (Boca de Culebra)', 9, '86270');
INSERT INTO `colonias` VALUES (376, 'Jolochero 2da. Sección', 9, '86270');
INSERT INTO `colonias` VALUES (377, 'Jornaleros y Aparceros (Pajaritos)', 9, '86277');
INSERT INTO `colonias` VALUES (378, 'La Ceiba', 9, '86254');
INSERT INTO `colonias` VALUES (379, 'La Cruz del Bajío', 9, '86275');
INSERT INTO `colonias` VALUES (380, 'La Huasteca 1ra. Sección', 9, '86290');
INSERT INTO `colonias` VALUES (381, 'La Huasteca 2da. Sección (Alvarado la Raya)', 9, '86290');
INSERT INTO `colonias` VALUES (382, 'La Loma', 9, '86253');
INSERT INTO `colonias` VALUES (383, 'La Manga', 9, '86254');
INSERT INTO `colonias` VALUES (384, 'La Manga 2da. Sección (El Jobal)', 9, '86275');
INSERT INTO `colonias` VALUES (385, 'La Palma', 9, '86275');
INSERT INTO `colonias` VALUES (386, 'La Parrilla 2a Secc La Lima', 9, '86288');
INSERT INTO `colonias` VALUES (387, 'Lagartera 1a Secc', 9, '86276');
INSERT INTO `colonias` VALUES (388, 'Lagartera 2a Secc', 9, '86276');
INSERT INTO `colonias` VALUES (389, 'Las Matillas 4a Secc', 9, '86274');
INSERT INTO `colonias` VALUES (390, 'Las Matillas 4ta Sección (San Antonio)', 9, '86274');
INSERT INTO `colonias` VALUES (391, 'Las Raíces', 9, '86266');
INSERT INTO `colonias` VALUES (392, 'Lázaro Cárdenas 1a Sección', 9, '86287');
INSERT INTO `colonias` VALUES (393, 'Lázaro Cárdenas 2a Sección', 9, '86287');
INSERT INTO `colonias` VALUES (394, 'Lázaro Cárdenas 2da Sección (21 de Marzo)', 9, '86287');
INSERT INTO `colonias` VALUES (395, 'Medellín y Madero 1a Secc', 9, '86270');
INSERT INTO `colonias` VALUES (396, 'Medellin y Madero 2a Secc', 9, '86270');
INSERT INTO `colonias` VALUES (397, 'Medellín y Madero 3a Secc', 9, '86270');
INSERT INTO `colonias` VALUES (398, 'Medellín y Madero 4ta. Sección', 9, '86270');
INSERT INTO `colonias` VALUES (399, 'Medellín y Pigua 2da. Sección', 9, '86276');
INSERT INTO `colonias` VALUES (400, 'Medellin y Pigua 3ra. Sección', 9, '86276');
INSERT INTO `colonias` VALUES (401, 'Medellín y Pigua 4ta. Sección (El Aguacate)', 9, '86276');
INSERT INTO `colonias` VALUES (402, 'Miguel Hidalgo 2da. Sección (La Guaira)', 9, '86127');
INSERT INTO `colonias` VALUES (403, 'Miraflores 1ra. Sección', 9, '86265');
INSERT INTO `colonias` VALUES (404, 'Miraflores 1ra. Sección (Arroyo Grande)', 9, '86273');
INSERT INTO `colonias` VALUES (405, 'Miraflores 2da. Sección', 9, '86273');
INSERT INTO `colonias` VALUES (406, 'Miraflores 2da. Sección (Zapotillo)', 9, '86265');
INSERT INTO `colonias` VALUES (407, 'Miraflores 3ra. Sección', 9, '86273');
INSERT INTO `colonias` VALUES (408, 'Miramar', 9, '86254');
INSERT INTO `colonias` VALUES (409, 'Pablo L Sidar', 9, '86294');
INSERT INTO `colonias` VALUES (410, 'Pablo L Sidar (Miramar)', 9, '86280');
INSERT INTO `colonias` VALUES (411, 'Pablo L. Sidar (Guineo)', 9, '86295');
INSERT INTO `colonias` VALUES (412, 'Pablo L. Sidar (La Aurora)', 9, '86283');
INSERT INTO `colonias` VALUES (413, 'Pajonal', 9, '86275');
INSERT INTO `colonias` VALUES (414, 'Parrilla 3ra Sección (La Providencia)', 9, '86294');
INSERT INTO `colonias` VALUES (415, 'Parrilla 4ta. Sección (Los Acosta)', 9, '86284');
INSERT INTO `colonias` VALUES (416, 'Paso Real de La Victoria', 9, '86270');
INSERT INTO `colonias` VALUES (417, 'Plátano y Cacao 1a Secc', 9, '86280');
INSERT INTO `colonias` VALUES (418, 'Plátano y Cacao 2da. Sección (La Isla)', 9, '86280');
INSERT INTO `colonias` VALUES (419, 'Plátano y Cacao 3a Secc', 9, '86280');
INSERT INTO `colonias` VALUES (420, 'Plátano y Cacao 4ta. Sección', 9, '86280');
INSERT INTO `colonias` VALUES (421, 'Plutarco Elías Calles (La Majahua)', 9, '86294');
INSERT INTO `colonias` VALUES (422, 'Ribera de las Raíces', 9, '86266');
INSERT INTO `colonias` VALUES (423, 'Rio Tinto 1a Secc', 9, '86283');
INSERT INTO `colonias` VALUES (424, 'Río Tinto 2a Secc', 9, '86283');
INSERT INTO `colonias` VALUES (425, 'Río Tinto 3a Secc', 9, '86283');
INSERT INTO `colonias` VALUES (426, 'Rio Viejo 2a Sección', 9, '86127');
INSERT INTO `colonias` VALUES (427, 'Rio Viejo 3a Sección', 9, '86127');
INSERT INTO `colonias` VALUES (428, 'Rovirosa', 9, '86254');
INSERT INTO `colonias` VALUES (429, 'Sabanas Nuevas', 9, '86274');
INSERT INTO `colonias` VALUES (430, 'Tierra Amarilla 1ra. Sección', 9, '86270');
INSERT INTO `colonias` VALUES (431, 'Tierra Amarilla 2da Sección', 9, '86270');
INSERT INTO `colonias` VALUES (432, 'Tierra Amarilla 3ra Sección', 9, '86270');
INSERT INTO `colonias` VALUES (433, 'Tocoal', 9, '86250');
INSERT INTO `colonias` VALUES (434, 'Torno Largo 1ra. Sección', 9, '86260');
INSERT INTO `colonias` VALUES (435, 'Torno Largo 2da. Sección', 9, '86260');
INSERT INTO `colonias` VALUES (436, 'Torno Largo 3ra. Sección (Sabanilla)', 9, '86260');
INSERT INTO `colonias` VALUES (437, 'Torno Largo Estancia (El Manguito)', 9, '86253');
INSERT INTO `colonias` VALUES (438, 'Tumbulushal', 9, '86290');
INSERT INTO `colonias` VALUES (439, 'Villa Unión', 9, '86270');
INSERT INTO `colonias` VALUES (440, 'Artesanos Infonavit', 10, '86130');
INSERT INTO `colonias` VALUES (441, 'Fovissste 1a Etapa', 10, '86180');
INSERT INTO `colonias` VALUES (442, 'Fovissste 2a Etapa', 10, '86170');
INSERT INTO `colonias` VALUES (443, 'Indeco Unidad', 10, '86017');
INSERT INTO `colonias` VALUES (444, 'Infonavit', 10, '86018');
INSERT INTO `colonias` VALUES (445, 'Nueva Imagen', 10, '86030');
INSERT INTO `colonias` VALUES (446, 'Palmitas', 10, '86130');
INSERT INTO `colonias` VALUES (447, 'Triunfo La Manga 2', 10, '86099');
INSERT INTO `colonias` VALUES (448, 'Fideicomiso Ciudad Industrial', 11, '86010');
INSERT INTO `colonias` VALUES (449, 'Parque Logístico Industrial Tabasco', 11, '86287');

-- ----------------------------
-- Table structure for datosusuario
-- ----------------------------
DROP TABLE IF EXISTS `datosusuario`;
CREATE TABLE `datosusuario`  (
  `ID_datosusuario` int NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `password` int NOT NULL,
  `token` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `fk_asesor` int NOT NULL,
  PRIMARY KEY (`ID_datosusuario`) USING BTREE,
  INDEX `asesor`(`fk_asesor`) USING BTREE,
  CONSTRAINT `asesor` FOREIGN KEY (`fk_asesor`) REFERENCES `asesor` (`ID_asesor`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of datosusuario
-- ----------------------------
INSERT INTO `datosusuario` VALUES (21, 'pepe', 12345678, 'UHBE2', 1);

-- ----------------------------
-- Table structure for estadoinmuebles
-- ----------------------------
DROP TABLE IF EXISTS `estadoinmuebles`;
CREATE TABLE `estadoinmuebles`  (
  `ID_estadoinmuebles` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`ID_estadoinmuebles`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of estadoinmuebles
-- ----------------------------
INSERT INTO `estadoinmuebles` VALUES (1, 'Estrenar');
INSERT INTO `estadoinmuebles` VALUES (2, 'Años de antiguedad');
INSERT INTO `estadoinmuebles` VALUES (3, 'Construcion');
INSERT INTO `estadoinmuebles` VALUES (5, 'Semi Nuevo');

-- ----------------------------
-- Table structure for galeria
-- ----------------------------
DROP TABLE IF EXISTS `galeria`;
CREATE TABLE `galeria`  (
  `ID_galeria` int NOT NULL AUTO_INCREMENT,
  `img` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `fk_inmueble` int NOT NULL,
  PRIMARY KEY (`ID_galeria`) USING BTREE,
  INDEX `inmueble_idx`(`fk_inmueble`) USING BTREE,
  CONSTRAINT `inmueble3` FOREIGN KEY (`fk_inmueble`) REFERENCES `inmueble` (`ID_inmueble`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 41 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of galeria
-- ----------------------------
INSERT INTO `galeria` VALUES (26, 'registroCasa/imagenescasa/Casa carol1.jpg', 1);
INSERT INTO `galeria` VALUES (27, 'registroCasa/imagenescasa/Casa carol2.jpg', 1);
INSERT INTO `galeria` VALUES (28, 'registroCasa/imagenescasa/Casa carol3.jpg', 1);
INSERT INTO `galeria` VALUES (29, 'registroCasa/imagenescasa/Casa carol4.jpg', 1);
INSERT INTO `galeria` VALUES (30, 'registroCasa/imagenescasa/Casa carol5.jpg', 1);
INSERT INTO `galeria` VALUES (31, 'registroCasa/imagenescasa/Casa Perla1.jpg', 2);
INSERT INTO `galeria` VALUES (32, 'registroCasa/imagenescasa/Casa Perla2.jpg', 2);
INSERT INTO `galeria` VALUES (33, 'registroCasa/imagenescasa/Casa Perla3.jpg', 2);
INSERT INTO `galeria` VALUES (34, 'registroCasa/imagenescasa/Casa Perla4.jpg', 2);
INSERT INTO `galeria` VALUES (35, 'registroCasa/imagenescasa/Casa Perla5.jpg', 2);
INSERT INTO `galeria` VALUES (36, 'registroCasa/imagenescasa/11.jpg', 3);
INSERT INTO `galeria` VALUES (37, 'registroCasa/imagenescasa/12.jpg', 3);
INSERT INTO `galeria` VALUES (38, 'registroCasa/imagenescasa/13.jpg', 3);
INSERT INTO `galeria` VALUES (39, 'registroCasa/imagenescasa/14.jpg', 3);
INSERT INTO `galeria` VALUES (40, 'registroCasa/imagenescasa/15.jpg', 3);

-- ----------------------------
-- Table structure for inmobiliarias
-- ----------------------------
DROP TABLE IF EXISTS `inmobiliarias`;
CREATE TABLE `inmobiliarias`  (
  `ID_inmobiliarias` int NOT NULL AUTO_INCREMENT,
  `nombreEmpresa` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `ubicacion` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL,
  `telefono` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `logo` mediumtext CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL,
  `RPC` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `correo` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `fk_asesor` int NOT NULL,
  PRIMARY KEY (`ID_inmobiliarias`) USING BTREE,
  INDEX `fk_asesor`(`fk_asesor`) USING BTREE,
  CONSTRAINT `inmobiliarias_ibfk_1` FOREIGN KEY (`fk_asesor`) REFERENCES `asesor` (`ID_asesor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 38 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of inmobiliarias
-- ----------------------------
INSERT INTO `inmobiliarias` VALUES (36, 'Raulkk', '222', '22', '9371216052', 'registroasesor/imagenesEmpresa/Raulkk.jpg', 'werew7777777777777', 'wewe@gmail.com', 1);

-- ----------------------------
-- Table structure for inmueble
-- ----------------------------
DROP TABLE IF EXISTS `inmueble`;
CREATE TABLE `inmueble`  (
  `ID_inmueble` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `precio` varchar(8) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL,
  `fk_asesor` int NOT NULL,
  `fk_tipooperacion` int NOT NULL,
  `fk_tipodeinmueble` int NULL DEFAULT NULL,
  `inmueblecantidad` int NOT NULL,
  PRIMARY KEY (`ID_inmueble`) USING BTREE,
  INDEX `asesor_idx`(`fk_asesor`) USING BTREE,
  INDEX `operacion_idx`(`fk_tipooperacion`) USING BTREE,
  INDEX `suptipo_idx`(`fk_tipodeinmueble`) USING BTREE,
  CONSTRAINT `asesors` FOREIGN KEY (`fk_asesor`) REFERENCES `asesor` (`ID_asesor`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `operacions` FOREIGN KEY (`fk_tipooperacion`) REFERENCES `tipooperacion` (`ID_operacion`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `suptipo` FOREIGN KEY (`fk_tipodeinmueble`) REFERENCES `subtipodeinmueble` (`ID_subtipodeinmueble`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of inmueble
-- ----------------------------
INSERT INTO `inmueble` VALUES (1, 'Casa carol', '600,000', 'Casa muy bonita', 1, 1, 7, 1);
INSERT INTO `inmueble` VALUES (2, 'Casa Perla', '150,000', 'Casa para pasar el rato', 1, 1, 4, 1);
INSERT INTO `inmueble` VALUES (3, '1', '1', '1', 1, 2, 16, 1);

-- ----------------------------
-- Table structure for subtipodeinmueble
-- ----------------------------
DROP TABLE IF EXISTS `subtipodeinmueble`;
CREATE TABLE `subtipodeinmueble`  (
  `ID_subtipodeinmueble` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `fk_tipoinmuble` int NOT NULL,
  PRIMARY KEY (`ID_subtipodeinmueble`) USING BTREE,
  INDEX `tipo_idx`(`fk_tipoinmuble`) USING BTREE,
  CONSTRAINT `tipo` FOREIGN KEY (`fk_tipoinmuble`) REFERENCES `tipoinmueble` (`ID_tipodeinmuble`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of subtipodeinmueble
-- ----------------------------
INSERT INTO `subtipodeinmueble` VALUES (1, 'Casa de Campo', 1);
INSERT INTO `subtipodeinmueble` VALUES (2, 'Casa de Condominio', 1);
INSERT INTO `subtipodeinmueble` VALUES (3, 'Casa de ciudad', 1);
INSERT INTO `subtipodeinmueble` VALUES (4, 'Casa de playa', 1);
INSERT INTO `subtipodeinmueble` VALUES (5, 'Casa de quinta', 1);
INSERT INTO `subtipodeinmueble` VALUES (6, ' departamento loft', 2);
INSERT INTO `subtipodeinmueble` VALUES (7, 'departamento Penthouse', 2);
INSERT INTO `subtipodeinmueble` VALUES (8, 'departamento minidepartam', 2);
INSERT INTO `subtipodeinmueble` VALUES (9, 'departamento de campo', 2);
INSERT INTO `subtipodeinmueble` VALUES (10, 'departamento de ciudad', 2);
INSERT INTO `subtipodeinmueble` VALUES (11, 'departamento de playa', 2);
INSERT INTO `subtipodeinmueble` VALUES (13, 'Terreno comercial', 3);
INSERT INTO `subtipodeinmueble` VALUES (15, 'Terreno playa', 4);
INSERT INTO `subtipodeinmueble` VALUES (16, 'Terreno  campestre', 4);
INSERT INTO `subtipodeinmueble` VALUES (17, 'Terreno  insdustrial', 4);
INSERT INTO `subtipodeinmueble` VALUES (18, 'Terreno  residencial', 4);
INSERT INTO `subtipodeinmueble` VALUES (19, 'local ', 5);

-- ----------------------------
-- Table structure for tipoinmueble
-- ----------------------------
DROP TABLE IF EXISTS `tipoinmueble`;
CREATE TABLE `tipoinmueble`  (
  `ID_tipodeinmuble` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`ID_tipodeinmuble`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tipoinmueble
-- ----------------------------
INSERT INTO `tipoinmueble` VALUES (1, 'Casa');
INSERT INTO `tipoinmueble` VALUES (2, 'departamento');
INSERT INTO `tipoinmueble` VALUES (3, 'edificio');
INSERT INTO `tipoinmueble` VALUES (4, 'Terreno');
INSERT INTO `tipoinmueble` VALUES (5, 'local');

-- ----------------------------
-- Table structure for tipooperacion
-- ----------------------------
DROP TABLE IF EXISTS `tipooperacion`;
CREATE TABLE `tipooperacion`  (
  `ID_operacion` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`ID_operacion`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tipooperacion
-- ----------------------------
INSERT INTO `tipooperacion` VALUES (1, 'Renta');
INSERT INTO `tipooperacion` VALUES (2, 'Venta');
INSERT INTO `tipooperacion` VALUES (3, 'Temporada');

-- ----------------------------
-- Table structure for ubicacion
-- ----------------------------
DROP TABLE IF EXISTS `ubicacion`;
CREATE TABLE `ubicacion`  (
  `ID_ubicacion` int NOT NULL AUTO_INCREMENT,
  `calle` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `fk_colonia` int NOT NULL,
  `fk_inmueble` int NOT NULL,
  `descripcion` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL,
  `codigo_postal` int NOT NULL,
  PRIMARY KEY (`ID_ubicacion`) USING BTREE,
  INDEX `inmueble_idx`(`fk_inmueble`) USING BTREE,
  INDEX `colonia_idx`(`fk_colonia`) USING BTREE,
  CONSTRAINT `coloniad` FOREIGN KEY (`fk_colonia`) REFERENCES `colonias` (`ID_colonias`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `inmuebled` FOREIGN KEY (`fk_inmueble`) REFERENCES `inmueble` (`ID_inmueble`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ubicacion
-- ----------------------------
INSERT INTO `ubicacion` VALUES (16, '86500', 8, 1, 'es un lugar muy bonito', 0);
INSERT INTO `ubicacion` VALUES (17, 'calle mandarina', 9, 2, 'una casa para poder pasar el rato', 0);
INSERT INTO `ubicacion` VALUES (18, 'dfgd', 14, 3, 'dfgfdg', 0);

SET FOREIGN_KEY_CHECKS = 1;
