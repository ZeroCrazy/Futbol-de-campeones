/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : database

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2023-03-09 10:49:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cms_settings
-- ----------------------------
DROP TABLE IF EXISTS `cms_settings`;
CREATE TABLE `cms_settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `site` varchar(255) DEFAULT NULL,
  `sitename` varchar(255) DEFAULT NULL,
  `colorsv` varchar(255) DEFAULT NULL,
  `rankadmin` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- ----------------------------
-- Records of cms_settings
-- ----------------------------
INSERT INTO `cms_settings` VALUES ('1', 'http://127.0.0.1', 'Futbol de Campeones', '#0558bc', '3');

-- ----------------------------
-- Table structure for cms_slider
-- ----------------------------
DROP TABLE IF EXISTS `cms_slider`;
CREATE TABLE `cms_slider` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `textillo` enum('left-align','right-align','center-align') DEFAULT 'center-align',
  `image` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- ----------------------------
-- Records of cms_slider
-- ----------------------------
INSERT INTO `cms_slider` VALUES ('1', 'Ligas de Fútbol Sala y Fútbol 7', '', '', 'center-align', 'http://www.futboldecampeones.com/wp-content/uploads/2015/04/slider-home-2.jpg', '27/07/2018 12:50:37', '1');
INSERT INTO `cms_slider` VALUES ('65', ' ', '', '', '', 'src/img/imagen-home-nike.jpg', '29/07/2018 18:50:15', '1');
INSERT INTO `cms_slider` VALUES ('66', ' ', '', '', '', 'src/img/nike.jpg', '29/07/2018 18:50:27', '1');
INSERT INTO `cms_slider` VALUES ('67', ' ', '', '', '', 'src/img/slider-home-1.jpg', '29/07/2018 18:50:38', '1');

-- ----------------------------
-- Table structure for cms_sponsors
-- ----------------------------
DROP TABLE IF EXISTS `cms_sponsors`;
CREATE TABLE `cms_sponsors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- ----------------------------
-- Records of cms_sponsors
-- ----------------------------
INSERT INTO `cms_sponsors` VALUES ('1', 'Joma', 'joma.png', 'https://www.joma-sport.com/');
INSERT INTO `cms_sponsors` VALUES ('2', 'Nike', 'nike.png', 'https://www.nike.com/es/es_es/');
INSERT INTO `cms_sponsors` VALUES ('3', 'Adidas', 'adidas.png', 'https://www.adidas.es/');
INSERT INTO `cms_sponsors` VALUES ('4', 'Puma', 'puma.png', 'https://www.puma.com/');
INSERT INTO `cms_sponsors` VALUES ('5', 'Reebok', 'reebok.png', 'http://www.reebok.es/');

-- ----------------------------
-- Table structure for equipos
-- ----------------------------
DROP TABLE IF EXISTS `equipos`;
CREATE TABLE `equipos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `liga_fdc_id` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `bgcolor` varchar(255) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `web` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- ----------------------------
-- Records of equipos
-- ----------------------------
INSERT INTO `equipos` VALUES ('1', 'Minions', 'http://www.futboldecampeones.com/wp-content/uploads/2018/01/5ees9d-248x300.png', null, '', null, '1', '', '1');
INSERT INTO `equipos` VALUES ('2', 'Gorriones', 'http://www.futboldecampeones.com/wp-content/uploads/2018/01/IMG-20180130-WA0025.png', null, null, '#ad0f39', null, null, null);

-- ----------------------------
-- Table structure for equipos_miembros
-- ----------------------------
DROP TABLE IF EXISTS `equipos_miembros`;
CREATE TABLE `equipos_miembros` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_completo` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `posicion` enum('Delantero','Defensa','Portero') DEFAULT NULL,
  `numero_camiseta` varchar(255) DEFAULT NULL,
  `equipo_id` int(11) DEFAULT NULL,
  `goles` varchar(255) DEFAULT NULL,
  `tarjetas_amarillas` varchar(255) DEFAULT NULL,
  `tarjetas_azules` varchar(255) DEFAULT NULL,
  `puntos` varchar(255) DEFAULT NULL,
  `partidos_jugados` varchar(255) DEFAULT NULL,
  `media_puntuacion_fdc` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- ----------------------------
-- Records of equipos_miembros
-- ----------------------------
INSERT INTO `equipos_miembros` VALUES ('1', 'Victor', 'src/img/miembros/Minions-Victor8.png', 'Delantero', '8', '2', null, null, null, null, null, null, '1');
INSERT INTO `equipos_miembros` VALUES ('4', 'danii', 'src/img/miembros/Minions-Victor8.png', 'Defensa', '9', '1', null, null, null, null, null, null, '1');
INSERT INTO `equipos_miembros` VALUES ('5', 'pedro', 'src/img/miembros/Minions-Victor8.png', 'Delantero', '1', '2', null, null, null, null, null, null, '1');

-- ----------------------------
-- Table structure for instalaciones
-- ----------------------------
DROP TABLE IF EXISTS `instalaciones`;
CREATE TABLE `instalaciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `disponibilidades` varchar(255) DEFAULT NULL,
  `futbol_sala` varchar(255) DEFAULT NULL,
  `futbol_7` varchar(255) DEFAULT NULL,
  `puntos` varchar(255) DEFAULT NULL,
  `slider_1` varchar(255) DEFAULT NULL,
  `slider_2` varchar(255) DEFAULT NULL,
  `slider_3` varchar(255) DEFAULT NULL,
  `slider_4` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `web` varchar(255) DEFAULT NULL,
  `provincia` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- ----------------------------
-- Records of instalaciones
-- ----------------------------
INSERT INTO `instalaciones` VALUES ('1', 'Fútbol Sala Promosportive', 'http://www.futboldecampeones.com/wp-content/uploads/2017/05/logo_promosportive-300x63.jpg', '3 CAMPOS DE FUTBOL SALA<br>2 CAMPOS DE FUTBOL 7<br>PISCINA<br>VESTUARIO<br>BAR', null, null, '1', 'http://www.futboldecampeones.com/wp-content/uploads/2017/05/Promosportive-1024x683.jpg', 'http://www.futboldecampeones.com/wp-content/uploads/2017/05/Promosportive2-1024x684.jpg', 'http://www.futboldecampeones.com/wp-content/uploads/2017/05/Promosportive3-1024x684.jpg', 'http://www.futboldecampeones.com/wp-content/uploads/2017/05/Promosportive4-1024x684.jpg', 'Camí Pau Redó, s/n, 08908 L’Hospitalet de Llobregat, Barcelona', '933 35 95 12', 'info@futbolsalapromosportive.com', 'futbolsalapromosportive.com', 'Barcelona', '1');
INSERT INTO `instalaciones` VALUES ('4', 'Sports la Pava', ' ', '', null, null, null, 'http://www.futboldecampeones.com/wp-content/uploads/2017/10/IMG_9265.jpg', '', '', '', 'Camí de la Pava, 14, 08850 Gavà, Barcelona', '936 33 13 57', 'info@sportslapava.com', 'www.sportslapava.com', 'Barcelona', '1');

-- ----------------------------
-- Table structure for ligas
-- ----------------------------
DROP TABLE IF EXISTS `ligas`;
CREATE TABLE `ligas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `instalacion_id` int(11) DEFAULT NULL,
  `tipo` enum('fs','f7') DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- ----------------------------
-- Records of ligas
-- ----------------------------
INSERT INTO `ligas` VALUES ('1', 'Sábados mañana', '1', 'fs', '1');
INSERT INTO `ligas` VALUES ('2', 'Sábados tarde', '1', 'fs', '1');
INSERT INTO `ligas` VALUES ('5', 'Domingos mañana', null, 'fs', '1');
INSERT INTO `ligas` VALUES ('6', 'Domingos tarde', null, 'fs', '1');
INSERT INTO `ligas` VALUES ('9', 'Sábados mañana', '1', 'f7', '1');

-- ----------------------------
-- Table structure for ligas_tiempo
-- ----------------------------
DROP TABLE IF EXISTS `ligas_tiempo`;
CREATE TABLE `ligas_tiempo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `liga_id` int(11) DEFAULT NULL,
  `equipo_id` int(11) DEFAULT NULL,
  `instalacion_id` int(11) DEFAULT NULL,
  `tipo` enum('f7','fs') DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- ----------------------------
-- Records of ligas_tiempo
-- ----------------------------
INSERT INTO `ligas_tiempo` VALUES ('1', '1', '1', null, null, null);
INSERT INTO `ligas_tiempo` VALUES ('2', '1', '2', null, null, null);
INSERT INTO `ligas_tiempo` VALUES ('3', '1', null, '1', 'fs', '1');
INSERT INTO `ligas_tiempo` VALUES ('4', '2', null, '1', 'f7', '1');
INSERT INTO `ligas_tiempo` VALUES ('5', '9', null, '1', 'f7', '1');

-- ----------------------------
-- Table structure for provincias
-- ----------------------------
DROP TABLE IF EXISTS `provincias`;
CREATE TABLE `provincias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `provincia` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- ----------------------------
-- Records of provincias
-- ----------------------------
INSERT INTO `provincias` VALUES ('1', 'Barcelona');
INSERT INTO `provincias` VALUES ('2', 'Tarragona');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `rank` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `so` varchar(255) DEFAULT NULL,
  `last_online` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `perfil` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', 'dani@dani.com', '3', null, 'Windows 7', null, 'Admin', null, null);

-- ----------------------------
-- Table structure for visitas
-- ----------------------------
DROP TABLE IF EXISTS `visitas`;
CREATE TABLE `visitas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ruta` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `dia` varchar(255) DEFAULT NULL,
  `mes` varchar(255) DEFAULT NULL,
  `ano` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- ----------------------------
-- Records of visitas
-- ----------------------------
