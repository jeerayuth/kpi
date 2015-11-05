-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2015 at 12:39 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kpi`
--

-- --------------------------------------------------------

--
-- Table structure for table `configure`
--

CREATE TABLE `configure` (
  `id` int(13) NOT NULL,
  `hospcode` int(13) NOT NULL,
  `hospname` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `state` enum('enable','disable') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `configure`
--

INSERT INTO `configure` (`id`, `hospcode`, `hospname`, `address`, `telephone`, `state`) VALUES
(1, 11381, 'โรงพยาบาลละแม', '45 ม. 7 ถ.เพชรเกษม ต.ละแม อ.ละแม จ.ชุมพร', '077-559116', 'enable');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(13) NOT NULL,
  `name` varchar(100) NOT NULL,
  `template_type_id` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `template_type_id`) VALUES
(1, 'โรงพยาบาลละแม', 1),
(2, 'ทีม RM', 2),
(3, 'ไอที', 3),
(4, 'กลุ่มการพยาบาล', 3);

-- --------------------------------------------------------

--
-- Table structure for table `kpi`
--

CREATE TABLE `kpi` (
  `id` int(13) NOT NULL,
  `template_id` int(13) NOT NULL,
  `newyear_id` int(13) NOT NULL,
  `target` varchar(255) DEFAULT NULL,
  `result` varchar(255) DEFAULT NULL,
  `type_id` enum('รายปี','ครึ่งปีแรก','ครึ่งปีหลัง','ไตรมาส1','ไตรมาส2','ไตรมาส3','ไตรมาส4','มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม') NOT NULL,
  `created` datetime NOT NULL,
  `state` enum('enable','locked') NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kpi`
--

INSERT INTO `kpi` (`id`, `template_id`, `newyear_id`, `target`, `result`, `type_id`, `created`, `state`, `username`) VALUES
(1, 1, 3, '800', '650', 'รายปี', '2015-11-05 00:00:00', 'locked', 'admin'),
(2, 1, 4, '800', '700', 'รายปี', '2015-11-05 00:00:00', 'enable', 'admin'),
(3, 2, 3, '25', '20', 'รายปี', '2015-11-05 00:00:00', 'locked', 'admin'),
(4, 2, 4, '25', '23', 'รายปี', '2015-11-05 00:00:00', 'enable', 'admin'),
(5, 3, 4, '900', '650', 'มกราคม', '2015-11-05 15:02:09', 'locked', 'admin'),
(6, 3, 4, '900', '750', 'กุมภาพันธ์', '2015-11-05 15:02:19', 'locked', 'admin'),
(7, 3, 4, '900', '850', 'มีนาคม', '2015-11-05 15:02:30', 'locked', 'admin'),
(8, 3, 4, '900', '700', 'เมษายน', '2015-11-05 15:02:35', 'locked', 'admin'),
(9, 3, 4, '900', '800', 'พฤษภาคม', '2015-11-05 15:02:46', 'locked', 'admin'),
(10, 3, 4, '900', '850', 'มิถุนายน', '2015-11-05 15:02:50', 'locked', 'admin'),
(11, 3, 4, '900', '800', 'กรกฎาคม', '2015-11-05 15:02:53', 'enable', 'admin'),
(12, 3, 4, '900', '850', 'สิงหาคม', '2015-11-05 15:03:01', 'enable', 'admin'),
(13, 3, 4, '900', '880', 'กันยายน', '2015-11-05 15:03:04', 'enable', 'admin'),
(14, 3, 4, '900', '850', 'ตุลาคม', '2015-11-05 15:03:08', 'enable', 'admin'),
(15, 3, 4, '901', '841', 'พฤศจิกายน', '2015-11-05 18:30:10', 'enable', 'admin'),
(16, 3, 4, '900', '885', 'ธันวาคม', '2015-11-05 18:31:21', 'enable', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `newyear`
--

CREATE TABLE `newyear` (
  `id` int(13) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `newyear`
--

INSERT INTO `newyear` (`id`, `name`) VALUES
(1, '2555'),
(2, '2556'),
(3, '2557'),
(4, '2558'),
(5, '2559');

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE `template` (
  `id` int(13) NOT NULL,
  `department_id` int(13) NOT NULL,
  `title` varchar(255) NOT NULL,
  `goal` varchar(255) NOT NULL,
  `details` text,
  `type_id` enum('รายปี','รายครึ่งปี','รายไตรมาส','รายเดือน') NOT NULL,
  `template_type_id` int(13) NOT NULL,
  `state` enum('enable','disable') NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`id`, `department_id`, `title`, `goal`, `details`, `type_id`, `template_type_id`, `state`, `created`) VALUES
(1, 1, 'ประชากรที่ได้รับการตรวจสุขภาพประจำปี', 'ร้อยละ 80', 'เป้าหมาย คือ ประชากรในเขตรับผิดชอบ อายุ 60 ปี ขึ้นไป ของ อ.พะโต๊ะ จ.ชุมพร', 'รายปี', 1, 'enable', '2015-11-05'),
(2, 3, 'ความพึงพอใจในการตอบสนองต่อรายงานสารสนเทศ', 'ร้อยละ 85', 'เป้าหมาย คือ จำนวนรายงานที่ตอบสนองต่อหน่วยงานต่างๆใน รพ. ', 'รายปี', 3, 'enable', '2015-11-05'),
(3, 2, 'ความพึงพอใจในการรับบริการของผู้ป่วยนอก', 'ร้อยละ 85', 'เป้าหมายคือ จำนวน คนไข้ OPD ที่มารับบริการที่ รพ.ละแม ที่มีระยะเวลาในการรับบริการไม่ถึง 2 ชั่วโมง ตั้งแต่ห้องบัตร ถึงห้องเก็บเงิน', 'รายเดือน', 2, 'enable', '2015-11-05');

-- --------------------------------------------------------

--
-- Table structure for table `template_type`
--

CREATE TABLE `template_type` (
  `id` int(13) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `template_type`
--

INSERT INTO `template_type` (`id`, `name`) VALUES
(1, 'ตัวชี้วัดโรงพยาบาล'),
(2, 'ตัวชี้วัดทีม'),
(3, 'ตัวชี้วัดหน่วยงาน');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL COMMENT 'รหัส',
  `fname` varchar(255) NOT NULL COMMENT 'ชื่อ',
  `lname` varchar(255) NOT NULL COMMENT 'สกุล',
  `username` varchar(255) NOT NULL COMMENT 'ชื่อผู้ใช้',
  `password` varchar(255) NOT NULL COMMENT 'รหัสผ่าน',
  `created` date NOT NULL COMMENT 'วันที่สร้าง',
  `type` enum('user','admin') NOT NULL COMMENT 'ประเภทผู้ใช้งาน',
  `status` enum('เปิดใช้งาน','ปิดใช้งาน') NOT NULL COMMENT 'สถานะผู้ใช้ระบบ',
  `department_id` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `username`, `password`, `created`, `type`, `status`, `department_id`) VALUES
(1, 'จีระยุทธ', 'ปิ่นสุวรรณ', 'admin', 'admin', '2015-11-05', 'admin', 'เปิดใช้งาน', '1,2,3'),
(2, 'สุภมาส', 'วังมี', 'user', 'user', '2015-11-05', 'user', 'เปิดใช้งาน', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `configure`
--
ALTER TABLE `configure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kpi`
--
ALTER TABLE `kpi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newyear`
--
ALTER TABLE `newyear`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template_type`
--
ALTER TABLE `template_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kpi`
--
ALTER TABLE `kpi`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `newyear`
--
ALTER TABLE `newyear`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `template_type`
--
ALTER TABLE `template_type`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
