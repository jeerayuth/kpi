/*
Navicat MySQL Data Transfer

Source Server         : SERVER_MASTER
Source Server Version : 50532
Source Host           : 192.168.1.253:3306
Source Database       : db_kpi

Target Server Type    : MYSQL
Target Server Version : 50532
File Encoding         : 65001

Date: 2015-11-26 14:58:54
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
INSERT INTO configure VALUES ('1', '11381', 'โรงพยาบาลละแม', '45 ม. 7 ถ.เพชรเกษม ต.ละแม อ.ละแม จ.ชุมพร', '077-559116', 'enable');

-- ----------------------------
-- Table structure for `department`
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `template_type_id` int(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of department
-- ----------------------------
INSERT INTO department VALUES ('1', 'โรงพยาบาลละแม', '1');
INSERT INTO department VALUES ('2', 'ทีม RM', '2');
INSERT INTO department VALUES ('3', 'ไอที', '3');
INSERT INTO department VALUES ('4', 'กลุ่มการพยาบาล', '3');

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
  `created` datetime NOT NULL,
  `state` enum('enable','locked') NOT NULL,
  `username` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kpi
-- ----------------------------
INSERT INTO kpi VALUES ('1', '1', '3', '800', '650', 'รายปี', '2015-11-05 00:00:00', 'locked', 'admin');
INSERT INTO kpi VALUES ('2', '1', '4', '800', '700', 'รายปี', '2015-11-05 00:00:00', 'enable', 'admin');
INSERT INTO kpi VALUES ('3', '2', '3', '25', '20', 'รายปี', '2015-11-05 00:00:00', 'locked', 'admin');
INSERT INTO kpi VALUES ('4', '2', '4', '25', '23', 'รายปี', '2015-11-05 00:00:00', 'enable', 'admin');
INSERT INTO kpi VALUES ('5', '3', '4', '900', '650', 'มกราคม', '2015-11-05 15:02:09', 'locked', 'admin');
INSERT INTO kpi VALUES ('6', '3', '4', '900', '750', 'กุมภาพันธ์', '2015-11-05 15:02:19', 'locked', 'admin');
INSERT INTO kpi VALUES ('7', '3', '4', '900', '850', 'มีนาคม', '2015-11-05 15:02:30', 'locked', 'admin');
INSERT INTO kpi VALUES ('8', '3', '4', '900', '700', 'เมษายน', '2015-11-05 15:02:35', 'locked', 'admin');
INSERT INTO kpi VALUES ('9', '3', '4', '900', '800', 'พฤษภาคม', '2015-11-05 15:02:46', 'locked', 'admin');
INSERT INTO kpi VALUES ('10', '3', '4', '900', '850', 'มิถุนายน', '2015-11-05 15:02:50', 'locked', 'admin');
INSERT INTO kpi VALUES ('11', '3', '4', '900', '800', 'กรกฎาคม', '2015-11-05 15:02:53', 'enable', 'admin');
INSERT INTO kpi VALUES ('12', '3', '4', '900', '850', 'สิงหาคม', '2015-11-05 15:03:01', 'enable', 'admin');
INSERT INTO kpi VALUES ('13', '3', '4', '900', '880', 'กันยายน', '2015-11-05 15:03:04', 'enable', 'admin');
INSERT INTO kpi VALUES ('14', '3', '4', '900', '850', 'ตุลาคม', '2015-11-05 15:03:08', 'enable', 'admin');
INSERT INTO kpi VALUES ('15', '3', '4', '901', '841', 'พฤศจิกายน', '2015-11-05 18:30:10', 'enable', 'admin');
INSERT INTO kpi VALUES ('16', '3', '4', '900', '885', 'ธันวาคม', '2015-11-05 18:31:21', 'enable', 'user');

-- ----------------------------
-- Table structure for `newyear`
-- ----------------------------
DROP TABLE IF EXISTS `newyear`;
CREATE TABLE `newyear` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of newyear
-- ----------------------------
INSERT INTO newyear VALUES ('1', '2555');
INSERT INTO newyear VALUES ('2', '2556');
INSERT INTO newyear VALUES ('3', '2557');
INSERT INTO newyear VALUES ('4', '2558');
INSERT INTO newyear VALUES ('5', '2559');

-- ----------------------------
-- Table structure for `template`
-- ----------------------------
DROP TABLE IF EXISTS `template`;
CREATE TABLE `template` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `department_id` int(13) NOT NULL,
  `title` varchar(255) NOT NULL,
  `template_type_level_id` int(13) DEFAULT NULL,
  `goal` varchar(255) NOT NULL,
  `details` text,
  `type_id` enum('รายปี','รายครึ่งปี','รายไตรมาส','รายเดือน') NOT NULL,
  `template_type_id` int(13) NOT NULL,
  `state` enum('enable','disable') NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of template
-- ----------------------------
INSERT INTO template VALUES ('1', '1', 'ประชากรที่ได้รับการตรวจสุขภาพประจำปี', '1', 'ร้อยละ 80', 'เป้าหมาย คือ ประชากรในเขตรับผิดชอบ อายุ 60 ปี ขึ้นไป ของ อ.พะโต๊ะ จ.ชุมพร', 'รายปี', '1', 'enable', '2015-11-26');
INSERT INTO template VALUES ('2', '3', 'ความพึงพอใจในการตอบสนองต่อรายงานสารสนเทศ', null, 'ร้อยละ 85', 'เป้าหมาย คือ จำนวนรายงานที่ตอบสนองต่อหน่วยงานต่างๆใน รพ. ', 'รายปี', '3', 'enable', '2015-11-05');
INSERT INTO template VALUES ('3', '2', 'ความพึงพอใจในการรับบริการของผู้ป่วยนอก', null, 'ร้อยละ 85', 'เป้าหมายคือ จำนวน คนไข้ OPD ที่มารับบริการที่ รพ.ละแม ที่มีระยะเวลาในการรับบริการไม่ถึง 2 ชั่วโมง ตั้งแต่ห้องบัตร ถึงห้องเก็บเงิน', 'รายเดือน', '2', 'enable', '2015-11-26');

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
INSERT INTO template_type VALUES ('1', 'ตัวชี้วัดโรงพยาบาล');
INSERT INTO template_type VALUES ('2', 'ตัวชี้วัดทีม');
INSERT INTO template_type VALUES ('3', 'ตัวชี้วัดหน่วยงาน');

-- ----------------------------
-- Table structure for `template_type_level`
-- ----------------------------
DROP TABLE IF EXISTS `template_type_level`;
CREATE TABLE `template_type_level` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of template_type_level
-- ----------------------------
INSERT INTO template_type_level VALUES ('1', '1.ผลด้านการดูแลผู้ป่วย');
INSERT INTO template_type_level VALUES ('2', '2.ผลด้านการมุ่งเน้นของผู้ป่วยและผู้รับผลงานอื่น');
INSERT INTO template_type_level VALUES ('3', '3.ผลด้านการเงิน (Financial System)');
INSERT INTO template_type_level VALUES ('4', '4.ผลด้านทรัพยากรบุคคล (Human resource system)');
INSERT INTO template_type_level VALUES ('5', '5.ผลด้านระบบงานและกระบวนการสำคัญ');
INSERT INTO template_type_level VALUES ('6', '6.ผลด้านการนำองค์กร');
INSERT INTO template_type_level VALUES ('7', '7.ผลด้านการสร้างเสริมสุขภาพ (Health Promotion)');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO user VALUES ('1', 'จีระยุทธ', 'ปิ่นสุวรรณ', 'admin', 'admin', '2015-11-05', 'admin', 'เปิดใช้งาน', '1,2,3');
INSERT INTO user VALUES ('2', 'สุภมาส', 'วังมี', 'user', 'user', '2015-11-26', 'user', 'เปิดใช้งาน', '1,2');
