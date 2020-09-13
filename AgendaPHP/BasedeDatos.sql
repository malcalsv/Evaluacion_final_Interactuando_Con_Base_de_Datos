/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 80017
Source Host           : localhost:3306
Source Database       : agendaphp

Target Server Type    : MYSQL
Target Server Version : 80017
File Encoding         : 65001

Date: 2020-09-13 15:14:45
*/

SET FOREIGN_KEY_CHECKS=0;


CREATE DATABASE agenda;
use agenda;


-- ----------------------------
-- Table structure for tbleventos
-- ----------------------------
DROP TABLE IF EXISTS `tbleventos`;
CREATE TABLE `tbleventos` (
  `idevento` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `titulo` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fechaini` date NOT NULL,
  `fechafin` date DEFAULT NULL,
  `horaini` time DEFAULT NULL,
  `horafin` time DEFAULT NULL,
  `todoeldia` bit(1) DEFAULT b'0',
  PRIMARY KEY (`idevento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of tbleventos
-- ----------------------------
INSERT INTO `tbleventos` VALUES ('1', '1', 'Cita de prueba', '2020-09-15', '2020-09-15', '07:00:00', '08:00:00', '\0');

-- ----------------------------
-- Table structure for tblusuarios
-- ----------------------------
DROP TABLE IF EXISTS `tblusuarios`;
CREATE TABLE `tblusuarios` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nombre` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fechanac` date NOT NULL,
  `contrasena` blob NOT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of tblusuarios
-- ----------------------------
INSERT INTO `tblusuarios` VALUES ('1', 'malcalsv@gmail.com', 'Miguel Lopez', '1972-06-26', 0x3230326362393632616335393037356239363462303731353264323334623730);
INSERT INTO `tblusuarios` VALUES ('2', 'beronik@gmail.com', 'Veronica Gomez', '1985-11-01', 0x6531306164633339343962613539616262653536653035376632306638383365);
INSERT INTO `tblusuarios` VALUES ('3', 'benjamin@gmail.com', 'Benjamin Franklin', '1980-01-12', 0x6531306164633339343962613539616262653536653035376632306638383365);
