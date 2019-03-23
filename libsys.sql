/*
Navicat MySQL Data Transfer

Source Server         : wamp
Source Server Version : 50723
Source Host           : localhost:3306
Source Database       : libsys

Target Server Type    : MYSQL
Target Server Version : 50723
File Encoding         : 65001

Date: 2018-10-26 00:17:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for lib_admin
-- ----------------------------
DROP TABLE IF EXISTS `lib_admin`;
CREATE TABLE `lib_admin` (
  `admin_id` varchar(20) NOT NULL,
  `password` varchar(25) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lib_admin
-- ----------------------------

-- ----------------------------
-- Table structure for lib_book_species
-- ----------------------------
DROP TABLE IF EXISTS `lib_book_species`;
CREATE TABLE `lib_book_species` (
  `isbn` varchar(13) NOT NULL DEFAULT 'Unknown ISBN',
  `title` varchar(60) NOT NULL DEFAULT 'Unknown Title',
  `author` varchar(60) NOT NULL DEFAULT 'Unknown Author',
  `author_intro` varchar(100) DEFAULT 'There is no introduction of this author.',
  `press` varchar(60) NOT NULL DEFAULT 'Unknown Press',
  `category` varchar(255) NOT NULL DEFAULT 'Unknown',
  `summary` text,
  `pub_date` varchar(20) DEFAULT 'Unknown',
  `price` varchar(20) DEFAULT 'Unknown',
  `floor` int(10) NOT NULL DEFAULT '-1',
  `bookshelf` varchar(20) NOT NULL DEFAULT 'Uknown',
  `area_code` varchar(20) NOT NULL DEFAULT 'Unknown',
  PRIMARY KEY (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lib_book_species
-- ----------------------------
INSERT INTO `lib_book_species` VALUES ('1', '去去去去', '请求', 'There is no introduction of this author.', '方法', '发到', null, '2018-06-24', '43', '18', '123', '123');
INSERT INTO `lib_book_species` VALUES ('10', 'seffs', 'fsefse', 'There is no introduction of this author.', 'sdesed', 'sdsed', null, '2014-10-24', '22', '10', '123', '123');
INSERT INTO `lib_book_species` VALUES ('11', 'I‘m Qu Zhuohan', 'Qu Zhuohan', 'There is no introduction of this author.', 'Northwestern Polytechnic University Press', 'Science', null, '2018-10-24', '20', '1', '1', '1');
INSERT INTO `lib_book_species` VALUES ('12', '123', '123', 'There is no introduction of this author.', '123', '123', null, '2018-10-24', '123', '123', '123', '123');
INSERT INTO `lib_book_species` VALUES ('13', '4', '5', 'There is no introduction of this author.', '6', '6', null, '2018-10-24', '4', '6', '6', '6');
INSERT INTO `lib_book_species` VALUES ('2', '哈哈哈', '啊哈哈', 'There is no introduction of this author.', '哈哈', '哈哈', null, '2015-10-24', '123', '99', '1231', '12312');
INSERT INTO `lib_book_species` VALUES ('3', 'Unknown Title', 'Unknown Author', 'There is no introduction of this author.', 'Unknown Press', 'Unknown', null, 'Unknown', 'Unknown', '-1', 'Uknown', 'Unknown');
INSERT INTO `lib_book_species` VALUES ('333', '史嘉辉', '史嘉辉', 'There is no introduction of this author.', '史仔', '史仔', null, '2018-10-25', '123', '123', '123', '123');
INSERT INTO `lib_book_species` VALUES ('4', '123', '123', 'There is no introduction of this author.', '123', '123', null, '2014-10-24', '123', '123', '123', '123');
INSERT INTO `lib_book_species` VALUES ('5', 'Unknown Title', 'Unknown Author', 'There is no introduction of this author.', 'Unknown Press', 'Unknown', null, 'Unknown', 'Unknown', '-1', 'Uknown', 'Unknown');
INSERT INTO `lib_book_species` VALUES ('6', 'Unknown Title', 'Unknown Author', 'There is no introduction of this author.', 'Unknown Press', 'Unknown', null, 'Unknown', 'Unknown', '-1', 'Uknown', 'Unknown');
INSERT INTO `lib_book_species` VALUES ('7', 'Unknown Title', 'Unknown Author', 'There is no introduction of this author.', 'Unknown Press', 'Unknown', null, 'Unknown', 'Unknown', '-1', 'Uknown', 'Unknown');
INSERT INTO `lib_book_species` VALUES ('8', '马嘉伟', '马嘉伟', 'There is no introduction of this author.', '西工大', '发电方式', null, '2018-10-25', '123', '12', '1', '123');
INSERT INTO `lib_book_species` VALUES ('9', 'Unknown Title', 'Unknown Author', 'There is no introduction of this author.', 'Unknown Press', 'Unknown', null, 'Unknown', 'Unknown', '-1', 'Uknown', 'Unknown');

-- ----------------------------
-- Table structure for lib_book_unique
-- ----------------------------
DROP TABLE IF EXISTS `lib_book_unique`;
CREATE TABLE `lib_book_unique` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `isbn` varchar(13) NOT NULL,
  PRIMARY KEY (`book_id`),
  KEY `ISBN` (`isbn`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lib_book_unique
-- ----------------------------
INSERT INTO `lib_book_unique` VALUES ('1', '1');
INSERT INTO `lib_book_unique` VALUES ('2', '1');
INSERT INTO `lib_book_unique` VALUES ('3', '1');
INSERT INTO `lib_book_unique` VALUES ('4', '1');
INSERT INTO `lib_book_unique` VALUES ('5', '2');
INSERT INTO `lib_book_unique` VALUES ('6', '2');
INSERT INTO `lib_book_unique` VALUES ('7', '3');
INSERT INTO `lib_book_unique` VALUES ('8', '3');
INSERT INTO `lib_book_unique` VALUES ('9', '3');
INSERT INTO `lib_book_unique` VALUES ('10', '4');
INSERT INTO `lib_book_unique` VALUES ('11', '5');
INSERT INTO `lib_book_unique` VALUES ('12', '5');
INSERT INTO `lib_book_unique` VALUES ('13', '5');
INSERT INTO `lib_book_unique` VALUES ('14', '5');
INSERT INTO `lib_book_unique` VALUES ('15', '5');
INSERT INTO `lib_book_unique` VALUES ('16', '6');
INSERT INTO `lib_book_unique` VALUES ('17', '7');
INSERT INTO `lib_book_unique` VALUES ('18', '8');
INSERT INTO `lib_book_unique` VALUES ('19', '9');
INSERT INTO `lib_book_unique` VALUES ('20', '9');
INSERT INTO `lib_book_unique` VALUES ('21', '10');
INSERT INTO `lib_book_unique` VALUES ('22', '10');
INSERT INTO `lib_book_unique` VALUES ('23', '10');
INSERT INTO `lib_book_unique` VALUES ('24', '11');
INSERT INTO `lib_book_unique` VALUES ('25', '11');
INSERT INTO `lib_book_unique` VALUES ('26', '11');
INSERT INTO `lib_book_unique` VALUES ('27', '11');
INSERT INTO `lib_book_unique` VALUES ('28', '11');
INSERT INTO `lib_book_unique` VALUES ('29', '11');
INSERT INTO `lib_book_unique` VALUES ('30', '11');
INSERT INTO `lib_book_unique` VALUES ('31', '11');
INSERT INTO `lib_book_unique` VALUES ('32', '11');
INSERT INTO `lib_book_unique` VALUES ('33', '11');
INSERT INTO `lib_book_unique` VALUES ('34', '12');
INSERT INTO `lib_book_unique` VALUES ('35', '12');
INSERT INTO `lib_book_unique` VALUES ('36', '13');
INSERT INTO `lib_book_unique` VALUES ('37', '13');
INSERT INTO `lib_book_unique` VALUES ('38', '13');
INSERT INTO `lib_book_unique` VALUES ('39', '333');
INSERT INTO `lib_book_unique` VALUES ('40', '333');
INSERT INTO `lib_book_unique` VALUES ('41', '333');
INSERT INTO `lib_book_unique` VALUES ('42', '333');
INSERT INTO `lib_book_unique` VALUES ('43', '333');
INSERT INTO `lib_book_unique` VALUES ('44', '333');

-- ----------------------------
-- Table structure for lib_borrow
-- ----------------------------
DROP TABLE IF EXISTS `lib_borrow`;
CREATE TABLE `lib_borrow` (
  `book_id` varchar(10) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `bor_time` date NOT NULL,
  `bor_length` int(11) NOT NULL DEFAULT '0',
  `cost` float(10,2) NOT NULL DEFAULT '0.00',
  `staff_id` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lib_borrow
-- ----------------------------
INSERT INTO `lib_borrow` VALUES ('3', '18792512569', '2018-10-24', '0', '0.00', '2016303120');
INSERT INTO `lib_borrow` VALUES ('12', '17792933795', '2018-10-19', '0', '0.00', '2016303118');
INSERT INTO `lib_borrow` VALUES ('13', '17792933795', '2018-10-20', '0', '0.00', '2016303119');

-- ----------------------------
-- Table structure for lib_lost
-- ----------------------------
DROP TABLE IF EXISTS `lib_lost`;
CREATE TABLE `lib_lost` (
  `book_id` varchar(10) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `cost` float(11,2) NOT NULL,
  `staff_id` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lib_lost
-- ----------------------------
INSERT INTO `lib_lost` VALUES ('4', '17792933795', '88.00', '2016303120');
INSERT INTO `lib_lost` VALUES ('5', '17792933795', '88.00', '2016303118');
INSERT INTO `lib_lost` VALUES ('6', '17792933795', '88.00', '2016303118');
INSERT INTO `lib_lost` VALUES ('7', '18792512569', '66.00', '2016303119');

-- ----------------------------
-- Table structure for lib_notice
-- ----------------------------
DROP TABLE IF EXISTS `lib_notice`;
CREATE TABLE `lib_notice` (
  `notice_id` int(10) NOT NULL AUTO_INCREMENT,
  `notice_title` varchar(100) NOT NULL DEFAULT 'Notice',
  `notice_body` text NOT NULL,
  `release_time` date NOT NULL,
  `staff_id` varchar(20) NOT NULL,
  PRIMARY KEY (`notice_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lib_notice
-- ----------------------------
INSERT INTO `lib_notice` VALUES ('1', '10.1-10.7 Holiday', 'From 10.1 to 10.7, we will have a holiday because of the National Festival', '2018-09-30', '2016303120');
INSERT INTO `lib_notice` VALUES ('2', 'System Maintenance', 'From 10.24 to 10.25 We will have a System Maintenance', '2018-10-23', '2016303120');

-- ----------------------------
-- Table structure for lib_order
-- ----------------------------
DROP TABLE IF EXISTS `lib_order`;
CREATE TABLE `lib_order` (
  `user_id` varchar(20) NOT NULL,
  `book_id` varchar(10) NOT NULL,
  `ord_time` datetime NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `book_id` (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lib_order
-- ----------------------------

-- ----------------------------
-- Table structure for lib_remove
-- ----------------------------
DROP TABLE IF EXISTS `lib_remove`;
CREATE TABLE `lib_remove` (
  `book_id` varchar(10) NOT NULL,
  `reason` varchar(255) NOT NULL DEFAULT 'Lost',
  `remove_time` datetime NOT NULL,
  `staff_id` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lib_remove
-- ----------------------------
INSERT INTO `lib_remove` VALUES ('4', 'Lost', '2018-10-25 00:00:00', '2016303120');
INSERT INTO `lib_remove` VALUES ('5', 'Lost', '2018-10-24 00:00:00', '2016303118');
INSERT INTO `lib_remove` VALUES ('6', 'Lost', '2018-10-25 00:00:00', '2016303119');
INSERT INTO `lib_remove` VALUES ('7', 'Lost', '2018-10-23 00:00:00', '2016303120');
INSERT INTO `lib_remove` VALUES ('8', 'Destroyed', '2018-10-25 00:00:00', '2016303121');
INSERT INTO `lib_remove` VALUES ('9', 'Destroyed', '2018-10-25 00:00:00', '2016303121');
INSERT INTO `lib_remove` VALUES ('43', 'Destroyed', '2018-10-25 00:00:00', '2016303120');

-- ----------------------------
-- Table structure for lib_return
-- ----------------------------
DROP TABLE IF EXISTS `lib_return`;
CREATE TABLE `lib_return` (
  `user_id` varchar(20) NOT NULL,
  `book_id` varchar(10) NOT NULL,
  `bor_time` date NOT NULL,
  `ret_time` date NOT NULL,
  `fine` float(11,2) NOT NULL DEFAULT '0.00',
  `staff_id` int(10) NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `book_id` (`book_id`),
  KEY `staff_id` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lib_return
-- ----------------------------
INSERT INTO `lib_return` VALUES ('17792933795', '15', '2018-10-18', '2018-10-19', '0.00', '2016303118');
INSERT INTO `lib_return` VALUES ('17792933795', '23', '2018-10-24', '2018-10-25', '0.00', '2016303118');
INSERT INTO `lib_return` VALUES ('18792512569', '21', '2018-10-24', '2018-10-25', '0.00', '2016303120');
INSERT INTO `lib_return` VALUES ('18792512569', '25', '2018-10-24', '2018-10-24', '0.00', '2016303121');
INSERT INTO `lib_return` VALUES ('17792933795', '30', '2018-10-20', '2018-10-23', '0.00', '2016303119');
INSERT INTO `lib_return` VALUES ('18792512569 ', '2 ', '2018-10-24', '2018-10-26', '0.00', '2016303120');

-- ----------------------------
-- Table structure for lib_setting
-- ----------------------------
DROP TABLE IF EXISTS `lib_setting`;
CREATE TABLE `lib_setting` (
  `daily_fine` float(11,2) NOT NULL DEFAULT '1.00',
  `borrow_length` int(11) NOT NULL DEFAULT '30',
  `security_deposit` float(11,2) NOT NULL DEFAULT '300.00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lib_setting
-- ----------------------------
INSERT INTO `lib_setting` VALUES ('1.00', '20', '300.00');

-- ----------------------------
-- Table structure for lib_staff
-- ----------------------------
DROP TABLE IF EXISTS `lib_staff`;
CREATE TABLE `lib_staff` (
  `staff_id` varchar(20) NOT NULL,
  `password` varchar(25) NOT NULL DEFAULT '00010001',
  `name` varchar(30) NOT NULL,
  `avatar` varchar(300) DEFAULT 'http://localhost/libSys/public/avatar/default_avatar.jpg',
  `introduction` text,
  `tel` char(11) DEFAULT '',
  `email` varchar(50) DEFAULT 'Unknown',
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lib_staff
-- ----------------------------
INSERT INTO `lib_staff` VALUES ('2016303118', '00010001', 'Lv Bingxu', 'http://localhost/libSys/public/avatar/default_avatar.jpg', 'TL of Reader Team', '18220815305', 'lvbingxu@163.com');
INSERT INTO `lib_staff` VALUES ('2016303119', '00010001', 'Ma Jiawei', 'http://localhost/libSys/public/avatar/default_avatar.jpg', 'TM of Reader Team', '18629447641', 'majiawei@126.com');
INSERT INTO `lib_staff` VALUES ('2016303120', '00010001', 'Qu Zhuohan', 'http://localhost/libSys/public/avatar/default_avatar.jpg', 'TL of Librarian Team', '17629050308', 'quzhuohan1998@yahoo.com');
INSERT INTO `lib_staff` VALUES ('2016303121', '00010001', 'Shi Jiahui', 'http://localhost/libSys/public/avatar/default_avatar.jpg', 'TM of Librarian Team', '18229003162', 'shijiahui@outlook.com');

-- ----------------------------
-- Table structure for lib_user
-- ----------------------------
DROP TABLE IF EXISTS `lib_user`;
CREATE TABLE `lib_user` (
  `user_id` varchar(20) NOT NULL,
  `password` varchar(25) NOT NULL DEFAULT '12345678',
  `name` varchar(30) NOT NULL DEFAULT 'Unknown',
  `avatar` varchar(300) DEFAULT 'http://localhost/libSys/public/avatar/default_avatar.jpg',
  `email` varchar(256) NOT NULL DEFAULT 'Unknown',
  `address` varchar(300) NOT NULL DEFAULT 'Unknown',
  `balance` float(255,2) NOT NULL DEFAULT '300.00',
  `register_time` date NOT NULL,
  `card_id` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lib_user
-- ----------------------------
INSERT INTO `lib_user` VALUES ('13181981175', '123456', '曲仔', 'http://localhost/libSys/public/avatar/default_avatar.jpg', '1029789014@qq.com', 'shandong', '300.00', '2018-10-26', '0002817188');
INSERT INTO `lib_user` VALUES ('17792933795', '12345678', 'Xiao Yifu', 'http://localhost/libSys/public/avatar/default_avatar.jpg', '1029789014@qq.com', 'Unknown', '300.00', '2018-10-18', '0000012345');
INSERT INTO `lib_user` VALUES ('18792512569', '12345678', 'Qu Zhuohan', 'http://localhost/libSys/public/avatar/default_avatar.jpg', 'Molicaliatimis@outlook.com', 'Unknown', '300.00', '2018-10-24', '0000013232');
