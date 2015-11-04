/*
Navicat MySQL Data Transfer

Source Server         : connect_hosxp_192.168.1.253
Source Server Version : 50532
Source Host           : 192.168.1.253:3306
Source Database       : db_kpi

Target Server Type    : MYSQL
Target Server Version : 50532
File Encoding         : 65001

Date: 2015-11-02 16:48:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `configure`
-- ----------------------------
DROP TABLE IF EXISTS `configure`;
CREATE TABLE `configure` (
  `id` int(13) NOT NULL,
  `hospcode` int(13) NOT NULL,
  `hospname` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `state` enum('enable','disable') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of configure
-- ----------------------------
INSERT INTO `configure` VALUES ('1', '11381', 'โรงพยาบาลละแม', '45 ม. 7 ถ.เพชรเกษม ต.ละแม อ.ละแม จ.ชุมพร', '077-559116', 'enable');

-- ----------------------------
-- Table structure for `department`
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of department
-- ----------------------------
INSERT INTO `department` VALUES ('1', 'สารสนเทศและไอที');
INSERT INTO `department` VALUES ('2', 'กลุ่มการพยาบาล');
INSERT INTO `department` VALUES ('3', 'ห้องคลอด');
INSERT INTO `department` VALUES ('4', 'โรงพยาบาลละแม');
INSERT INTO `department` VALUES ('5', 'ตัวชี้วัดทีม RM');

-- ----------------------------
-- Table structure for `kpi`
-- ----------------------------
DROP TABLE IF EXISTS `kpi`;
CREATE TABLE `kpi` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `template_id` int(13) NOT NULL,
  `newyear_id` int(13) NOT NULL,
  `target` varchar(255) DEFAULT NULL,
  `result` varchar(255) DEFAULT NULL,
  `type_id` enum('รายปี','ครึ่งปีแรก','ครึ่งปีหลัง','ไตรมาส1','ไตรมาส2','ไตรมาส3','ไตรมาส4','มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม') NOT NULL,
  `created` date NOT NULL,
  `state` enum('enable','locked') NOT NULL,
  `username` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kpi
-- ----------------------------
INSERT INTO `kpi` VALUES ('1', '1', '4', '0', '0', 'รายปี', '2015-11-02', 'enable', 'admin');
INSERT INTO `kpi` VALUES ('2', '1', '5', '0', '0', 'รายปี', '2015-11-02', 'enable', 'admin');

-- ----------------------------
-- Table structure for `newyear`
-- ----------------------------
DROP TABLE IF EXISTS `newyear`;
CREATE TABLE `newyear` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of newyear
-- ----------------------------
INSERT INTO `newyear` VALUES ('1', '2555');
INSERT INTO `newyear` VALUES ('2', '2556');
INSERT INTO `newyear` VALUES ('3', '2557');
INSERT INTO `newyear` VALUES ('4', '2558');
INSERT INTO `newyear` VALUES ('5', '2559');
INSERT INTO `newyear` VALUES ('6', '2560');

-- ----------------------------
-- Table structure for `template`
-- ----------------------------
DROP TABLE IF EXISTS `template`;
CREATE TABLE `template` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `department_id` int(13) NOT NULL,
  `title` varchar(255) NOT NULL,
  `details` text,
  `type_id` enum('รายปี','รายครึ่งปี','รายไตรมาส','รายเดือน') NOT NULL,
  `template_type_id` int(13) NOT NULL,
  `state` enum('enable','disable') NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of template
-- ----------------------------
INSERT INTO `template` VALUES ('1', '1', 'ร้อยละของระบบเครือข่ายล่ม', '', 'รายปี', '2', 'enable', '2015-11-02');

-- ----------------------------
-- Table structure for `template_type`
-- ----------------------------
DROP TABLE IF EXISTS `template_type`;
CREATE TABLE `template_type` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of template_type
-- ----------------------------
INSERT INTO `template_type` VALUES ('1', 'ตัวชี้วัดโรงพยาบาล');
INSERT INTO `template_type` VALUES ('2', 'ตัวชี้วัดหน่วยงาน');
INSERT INTO `template_type` VALUES ('3', 'ตัวชี้วัดทีม');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส',
  `fname` varchar(255) NOT NULL COMMENT 'ชื่อ',
  `lname` varchar(255) NOT NULL COMMENT 'สกุล',
  `username` varchar(255) NOT NULL COMMENT 'ชื่อผู้ใช้',
  `password` varchar(255) NOT NULL COMMENT 'รหัสผ่าน',
  `created` date NOT NULL COMMENT 'วันที่สร้าง',
  `type` enum('user','admin') NOT NULL COMMENT 'ประเภทผู้ใช้งาน',
  `status` enum('เปิดใช้งาน','ปิดใช้งาน') NOT NULL COMMENT 'สถานะผู้ใช้ระบบ',
  `department_id` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'จีระยุทธ', 'ปิ่นสุวรรณ', 'admin', 'admin', '2015-11-02', 'admin', 'เปิดใช้งาน', '1');
INSERT INTO `user` VALUES ('55', 'สมชาย', 'นาคทอง', 'user', '123', '2015-10-27', 'user', 'เปิดใช้งาน', '1');
