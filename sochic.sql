/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1_3306
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : sochic

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-02-06 10:26:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for about_more_images
-- ----------------------------
DROP TABLE IF EXISTS `about_more_images`;
CREATE TABLE `about_more_images` (
  `ami_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_id` int(11) DEFAULT NULL,
  `image` text,
  `date_time` datetime DEFAULT NULL,
  PRIMARY KEY (`ami_id`),
  KEY `about_more_title_about_more` (`t_id`),
  CONSTRAINT `about_more_title_about_more` FOREIGN KEY (`t_id`) REFERENCES `about_more_title` (`t_id`)
) ENGINE=InnoDB AUTO_INCREMENT=391 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of about_more_images
-- ----------------------------
INSERT INTO `about_more_images` VALUES ('167', '8', 'about/proprietor/d8f9193cd79b5571bae5511121257639.jpg', '2017-01-26 15:34:24');
INSERT INTO `about_more_images` VALUES ('168', '2', 'about/team/member1.png', '2016-04-11 06:26:24');
INSERT INTO `about_more_images` VALUES ('169', '2', 'about/team/member2.png', '2016-04-11 06:26:46');
INSERT INTO `about_more_images` VALUES ('170', '2', 'about/team/member3.png', '2016-04-11 09:18:04');
INSERT INTO `about_more_images` VALUES ('171', '5', 'about/service/13135dc67f49d94faef9d3191a21628f.png', '2016-04-11 09:22:26');
INSERT INTO `about_more_images` VALUES ('172', '5', 'about/service/2f714d3a40b669d59536a5b1c5447628.jpg', '2016-04-11 09:22:37');
INSERT INTO `about_more_images` VALUES ('174', '4', 'about/product/37a8cbd642b921e9cd7a9cb89b9faa32.png', '2016-04-11 09:23:10');
INSERT INTO `about_more_images` VALUES ('175', '4', 'about/product/537eecd8565dc65e763c4903557d6ebf.png', '2016-04-11 09:23:14');
INSERT INTO `about_more_images` VALUES ('185', '2', 'about/team/member4.png', '2016-04-13 09:03:45');
INSERT INTO `about_more_images` VALUES ('192', '3', 'about/customer/6e17c478a9483f3dc4f4a94155b557e7.jpg', '2016-04-13 09:07:50');
INSERT INTO `about_more_images` VALUES ('193', '3', 'about/customer/3002ccc6f607959c1d0d443a3eda6de7.jpg', '2016-04-13 09:07:57');
INSERT INTO `about_more_images` VALUES ('194', '3', 'about/customer/cc9529f6a1e1026f3f2f186e7127874c.jpg', '2016-04-13 09:08:02');
INSERT INTO `about_more_images` VALUES ('195', '3', 'about/customer/38d78c9b3231c5505ed9aca8eb03a92a.jpg', '2016-04-13 09:08:12');
INSERT INTO `about_more_images` VALUES ('196', '4', 'about/product/daf461c0a417e771b77ec9aa9a9342ee.png', '2016-04-13 09:10:15');
INSERT INTO `about_more_images` VALUES ('199', '4', 'about/product/815b0f09e22ffe222b1a7afb62583dc5.png', '2016-04-13 09:11:11');
INSERT INTO `about_more_images` VALUES ('200', '5', 'about/service/dac9770d418867064de5faf3c07a1151.jpg', '2016-04-13 09:11:38');
INSERT INTO `about_more_images` VALUES ('202', '5', 'about/service/b5b1e856ee98e8c066584471ff40a6f9.jpg', '2016-04-13 09:11:52');
INSERT INTO `about_more_images` VALUES ('203', '5', 'about/service/89a872046218fe64dae92dc2bca4e36f.jpg', '2016-04-13 09:12:04');
INSERT INTO `about_more_images` VALUES ('204', '5', 'about/service/77a83a77091d9d554345c6a1a5ef65ca.jpg', '2016-04-13 09:12:15');
INSERT INTO `about_more_images` VALUES ('257', '4', 'about/product/522fe5c6ae2d1f205084e64ed97db604.jpg', '2016-08-30 02:56:35');
INSERT INTO `about_more_images` VALUES ('269', null, null, null);
INSERT INTO `about_more_images` VALUES ('270', null, null, null);
INSERT INTO `about_more_images` VALUES ('271', null, null, null);
INSERT INTO `about_more_images` VALUES ('272', null, null, null);
INSERT INTO `about_more_images` VALUES ('279', null, null, null);
INSERT INTO `about_more_images` VALUES ('280', null, null, null);
INSERT INTO `about_more_images` VALUES ('282', null, null, null);
INSERT INTO `about_more_images` VALUES ('283', null, null, null);
INSERT INTO `about_more_images` VALUES ('284', null, null, null);
INSERT INTO `about_more_images` VALUES ('295', '4', 'about/product/53b7a6bd6e5cd4f9298b5890b1433c13.png', '2016-11-28 03:24:39');
INSERT INTO `about_more_images` VALUES ('296', null, null, null);
INSERT INTO `about_more_images` VALUES ('297', '2', 'about/team/9832891cacae8360b641b3c968fd8301.png', '2016-11-28 03:26:40');
INSERT INTO `about_more_images` VALUES ('298', null, null, null);
INSERT INTO `about_more_images` VALUES ('299', null, null, null);
INSERT INTO `about_more_images` VALUES ('300', '4', 'about/product/a185800e5b811be79357fa27a8957dce.jpg', '2016-12-01 02:32:55');
INSERT INTO `about_more_images` VALUES ('301', '4', 'about/product/28d59d9a1fe189ea0e87c66d43855925.jpg', '2016-12-01 02:33:04');
INSERT INTO `about_more_images` VALUES ('302', '4', 'about/product/f11d467a4fc93a37f286771f2d7d188c.jpg', '2016-12-01 02:33:21');
INSERT INTO `about_more_images` VALUES ('303', '4', 'about/product/4ecfe688e964266488b6497916608ec8.jpg', '2016-12-01 02:33:27');
INSERT INTO `about_more_images` VALUES ('304', '4', 'about/product/e6114fa1b3fa825a4a55f742a1a1a76c.jpg', '2016-12-01 02:33:34');
INSERT INTO `about_more_images` VALUES ('305', '4', 'about/product/c032078894158112dac719340b00bcc5.jpg', '2016-12-01 02:33:43');
INSERT INTO `about_more_images` VALUES ('306', null, null, null);
INSERT INTO `about_more_images` VALUES ('307', null, null, null);
INSERT INTO `about_more_images` VALUES ('308', '5', 'about/service/0e44b58ea1c903896ad04d8595caa017.JPG', '2016-12-01 02:36:26');
INSERT INTO `about_more_images` VALUES ('309', '5', 'about/service/28f890847600ae81e921fa2429b55c4b.JPG', '2016-12-01 02:36:34');
INSERT INTO `about_more_images` VALUES ('310', '5', 'about/service/b602312fbe1f9e6bfde07e66adf8dba3.JPG', '2016-12-01 02:36:41');
INSERT INTO `about_more_images` VALUES ('311', '5', 'about/service/54a477b8e5e7ce8c6a014e35b935911b.JPG', '2016-12-01 02:36:47');
INSERT INTO `about_more_images` VALUES ('312', '5', 'about/service/8a11a081b91e95c3107b793d24ddb241.JPG', '2016-12-01 02:36:50');
INSERT INTO `about_more_images` VALUES ('313', null, null, null);
INSERT INTO `about_more_images` VALUES ('314', '2', 'about/team/fcba94c713558a8ccba52a3a486248ea.JPG', '2016-12-01 02:37:16');
INSERT INTO `about_more_images` VALUES ('315', '2', 'about/team/ed9f6de944db95d108b061b031aed729.JPG', '2016-12-01 02:37:22');
INSERT INTO `about_more_images` VALUES ('316', '2', 'about/team/86a2b0d144af733445f3d792e2cd5706.JPG', '2016-12-01 02:37:27');
INSERT INTO `about_more_images` VALUES ('317', '4', 'about/product/2afdc1f26a52c63f22b5a966d274ffa8.jpg', '2016-12-06 08:58:22');
INSERT INTO `about_more_images` VALUES ('318', '2', 'about/team/062a281d13ac95bba2558840c3768a14.jpg', '2016-12-06 08:58:48');
INSERT INTO `about_more_images` VALUES ('319', '4', 'about/product/3572275790fd4a97acfc492c96d75c4e.jpg', '2016-12-07 03:57:07');
INSERT INTO `about_more_images` VALUES ('320', null, null, null);
INSERT INTO `about_more_images` VALUES ('322', '4', 'about/product/1a08c9807634c271a423b3ef0a168c1c.JPG', '2016-12-08 02:27:23');
INSERT INTO `about_more_images` VALUES ('323', null, null, null);
INSERT INTO `about_more_images` VALUES ('324', null, null, null);
INSERT INTO `about_more_images` VALUES ('325', null, null, null);
INSERT INTO `about_more_images` VALUES ('326', null, null, null);
INSERT INTO `about_more_images` VALUES ('327', null, null, null);
INSERT INTO `about_more_images` VALUES ('328', null, null, null);
INSERT INTO `about_more_images` VALUES ('329', null, null, null);
INSERT INTO `about_more_images` VALUES ('330', '4', 'about/product/448b2a5ecfcd5cf75d1fc25e3ce9b536.jpg', '2016-12-08 02:45:18');
INSERT INTO `about_more_images` VALUES ('331', '5', 'about/service/ed0fc73d96b8511ea63d8ecf3e606fd6.jpg', '2016-12-08 02:46:25');
INSERT INTO `about_more_images` VALUES ('332', '2', 'about/team/70891df931b13ecec06a1553cd1f4e09.jpg', '2016-12-08 02:46:57');
INSERT INTO `about_more_images` VALUES ('344', null, null, null);
INSERT INTO `about_more_images` VALUES ('347', null, null, null);
INSERT INTO `about_more_images` VALUES ('348', '4', 'about/product/21882854d31db197901abb805e3d7c0b.png', '2016-12-09 08:36:34');
INSERT INTO `about_more_images` VALUES ('349', '5', 'about/service/b2aa41cc607cce2c0267e0ab335dd1d3.jpg', '2016-12-12 02:45:29');
INSERT INTO `about_more_images` VALUES ('350', null, 'about/service/', '2016-12-12 02:45:55');
INSERT INTO `about_more_images` VALUES ('351', null, 'about/service/', '2016-12-12 02:45:58');
INSERT INTO `about_more_images` VALUES ('352', null, 'about/service/', '2016-12-12 02:45:58');
INSERT INTO `about_more_images` VALUES ('353', null, 'about/service/', '2016-12-12 02:45:59');
INSERT INTO `about_more_images` VALUES ('354', null, 'about/service/', '2016-12-12 02:45:59');
INSERT INTO `about_more_images` VALUES ('355', '2', 'about/team/1edb95317cda643c03baea0b0d8d29b1.jpg', '2016-12-12 02:46:33');
INSERT INTO `about_more_images` VALUES ('366', null, null, null);
INSERT INTO `about_more_images` VALUES ('367', null, null, null);
INSERT INTO `about_more_images` VALUES ('368', null, null, null);
INSERT INTO `about_more_images` VALUES ('369', null, null, null);
INSERT INTO `about_more_images` VALUES ('370', null, null, null);
INSERT INTO `about_more_images` VALUES ('371', null, null, null);
INSERT INTO `about_more_images` VALUES ('372', null, null, null);
INSERT INTO `about_more_images` VALUES ('373', null, null, null);
INSERT INTO `about_more_images` VALUES ('374', '5', 'about/service/e145b08a3f0e4fe6231397727b5599b0.jpg', '2016-12-13 04:50:08');
INSERT INTO `about_more_images` VALUES ('375', '2', 'about/team/4cd683bddc93ddb2fb164bc655766850.jpg', '2016-12-13 04:54:08');
INSERT INTO `about_more_images` VALUES ('377', null, 'about/customer/b834fdcef680d9b408e112f408f25833.jpg', '2016-12-13 04:57:26');
INSERT INTO `about_more_images` VALUES ('378', null, 'about/customer/cc7d09da9b257ee5c792d423a80cca8a.jpg', '2016-12-13 04:57:50');
INSERT INTO `about_more_images` VALUES ('379', '4', 'about/product/6b73b91c997967f5771df3a01615eca1.jpg', '2016-12-15 02:10:46');
INSERT INTO `about_more_images` VALUES ('380', '4', 'about/product/53129b7aa707c6e71de85df8be25b633.jpg', '2016-12-15 03:33:33');
INSERT INTO `about_more_images` VALUES ('381', '4', 'about/product/5a5f2e432b145a7c5662c1ec1cc54f58.jpg', '2016-12-15 03:34:05');
INSERT INTO `about_more_images` VALUES ('382', '4', 'about/product/76ce0ac469d050d7b40236780c7c5198.jpg', '2016-12-15 04:25:47');
INSERT INTO `about_more_images` VALUES ('383', '4', 'about/product/df55fe1145c82c8864195f80bc54c921.jpg', '2016-12-15 04:26:11');
INSERT INTO `about_more_images` VALUES ('384', '4', 'about/product/2dc22f580a79bdb8009056fac59044f7.jpg', '2016-12-15 04:26:27');
INSERT INTO `about_more_images` VALUES ('385', '4', 'about/product/3573da4ded773706fdddad0f7298dabd.jpg', '2016-12-15 04:26:45');
INSERT INTO `about_more_images` VALUES ('386', '2', 'about/team/c41cdcd65f09604e446286a9d3a0d6c4.jpg', '2016-12-15 04:29:44');
INSERT INTO `about_more_images` VALUES ('387', '4', 'about/product/44a231c88cbc675799cb7b4bfd13cd1d.jpg', '2016-12-19 03:58:12');
INSERT INTO `about_more_images` VALUES ('388', '4', 'about/product/e3d537253dcd9154b8a6cbc3a95a212b.jpg', '2016-12-19 03:59:36');
INSERT INTO `about_more_images` VALUES ('389', '4', 'about/product/de22194bc535463e020ef094ee56b1a1.jpg', '2016-12-19 04:00:13');
INSERT INTO `about_more_images` VALUES ('390', '4', 'about/product/eb6b68cbdad7fdb7de73d838afe7869a.jpg', '2017-01-26 02:52:29');

-- ----------------------------
-- Table structure for about_more_title
-- ----------------------------
DROP TABLE IF EXISTS `about_more_title`;
CREATE TABLE `about_more_title` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text,
  `description` text,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of about_more_title
-- ----------------------------
INSERT INTO `about_more_title` VALUES ('2', 'Our Team', 'Lorem Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil, nobis, totam! Asperiores facere mollitia praesentium quaerat sit. Atque facilis itaque reprehenderit sit vitae. Expedita nobis odit omnis recusandae soluta veniam. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam iusto nihil expedita quaerat repellat ipsa tempore quae eos voluptatem suscipit itaque illum iste ab fugit, cum veniam ex! Praesentium, fugiat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
INSERT INTO `about_more_title` VALUES ('3', 'Our  Customers', 'Lorem Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil, nobis, totam! Asperiores facere mollitia praesentium quaerat sit. Atque facilis itaque reprehenderit sit vitae. Expedita nobis odit omnis recusandae soluta veniam. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam iusto nihil expedita quaerat repellat ipsa tempore quae eos voluptatem suscipit itaque illum iste ab fugit, cum veniam ex! Praesentium, fugiat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
INSERT INTO `about_more_title` VALUES ('4', 'Our Products', 'Gray');
INSERT INTO `about_more_title` VALUES ('5', 'Our Services', 'Test2 sadasdsas');
INSERT INTO `about_more_title` VALUES ('6', 'Contact Us', null);
INSERT INTO `about_more_title` VALUES ('7', 'Location', null);
INSERT INTO `about_more_title` VALUES ('8', 'The Proprietor', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

-- ----------------------------
-- Table structure for about_our_team
-- ----------------------------
DROP TABLE IF EXISTS `about_our_team`;
CREATE TABLE `about_our_team` (
  `aot_id` int(11) NOT NULL DEFAULT '0',
  `aot_title` text,
  `aot_desc` text,
  PRIMARY KEY (`aot_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of about_our_team
-- ----------------------------

-- ----------------------------
-- Table structure for about_proprietor
-- ----------------------------
DROP TABLE IF EXISTS `about_proprietor`;
CREATE TABLE `about_proprietor` (
  `ap_id` int(11) NOT NULL DEFAULT '0',
  `ap_title` text,
  `ap_desc` text,
  PRIMARY KEY (`ap_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of about_proprietor
-- ----------------------------

-- ----------------------------
-- Table structure for access_menu
-- ----------------------------
DROP TABLE IF EXISTS `access_menu`;
CREATE TABLE `access_menu` (
  `am_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(50) DEFAULT NULL,
  `mod_id` int(11) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`am_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of access_menu
-- ----------------------------
INSERT INTO `access_menu` VALUES ('1', 'common cashiering', '1', 'sell');
INSERT INTO `access_menu` VALUES ('2', 'account information', '2', 'user_account');
INSERT INTO `access_menu` VALUES ('3', 'product information', '2', 'product');
INSERT INTO `access_menu` VALUES ('4', 'service information', '2', 'services');
INSERT INTO `access_menu` VALUES ('5', 'artist information', '2', 'artist');
INSERT INTO `access_menu` VALUES ('6', 'company information', '2', 'company');
INSERT INTO `access_menu` VALUES ('7', 'pointing system', '3', 'reward');
INSERT INTO `access_menu` VALUES ('8', 'inventory', '4', 'reports/inventory_reports');
INSERT INTO `access_menu` VALUES ('9', 'sales', '4', 'reports/sales_reports');
INSERT INTO `access_menu` VALUES ('10', 'artist', '4', 'reports/artist');

-- ----------------------------
-- Table structure for account
-- ----------------------------
DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `acc_id` int(11) NOT NULL AUTO_INCREMENT,
  `img_path` varchar(255) DEFAULT NULL,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `f_name` varchar(40) DEFAULT NULL,
  `l_name` varchar(40) DEFAULT NULL,
  `m_name` varchar(40) DEFAULT NULL,
  `pos_id` int(40) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `ci_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `on_delete` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`acc_id`),
  KEY `ci_id` (`ci_id`),
  KEY `pos_id` (`pos_id`),
  CONSTRAINT `account_ibfk_1` FOREIGN KEY (`ci_id`) REFERENCES `company_info` (`ci_id`) ON DELETE CASCADE,
  CONSTRAINT `account_ibfk_2` FOREIGN KEY (`pos_id`) REFERENCES `positions` (`pos_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of account
-- ----------------------------
INSERT INTO `account` VALUES ('32', 'users/4a5efaf351ff8a847348c35bb985c7da.png', 'admin', 'd038gRGkHdDUQ', 'sochic', 'Salon', '', '1', '2016-04-09', null, '1', null);

-- ----------------------------
-- Table structure for amenities
-- ----------------------------
DROP TABLE IF EXISTS `amenities`;
CREATE TABLE `amenities` (
  `amenities_id` int(11) NOT NULL AUTO_INCREMENT,
  `amenity_name` varchar(40) DEFAULT NULL,
  `amenity_type` varchar(40) DEFAULT NULL,
  `amenity_class` varchar(40) DEFAULT NULL,
  `amenity_capacity` varchar(40) DEFAULT NULL,
  `amenity_desc` text,
  `amenity_image` text,
  `on_delete` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`amenities_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of amenities
-- ----------------------------

-- ----------------------------
-- Table structure for artist
-- ----------------------------
DROP TABLE IF EXISTS `artist`;
CREATE TABLE `artist` (
  `ar_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) DEFAULT NULL,
  `midname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `address` text,
  `on_delete` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ar_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of artist
-- ----------------------------

-- ----------------------------
-- Table structure for artist_commision
-- ----------------------------
DROP TABLE IF EXISTS `artist_commision`;
CREATE TABLE `artist_commision` (
  `ac_id` int(11) NOT NULL AUTO_INCREMENT,
  `commission` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `ar_id` int(11) DEFAULT NULL,
  `r_id` int(11) DEFAULT NULL,
  `service_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ac_id`),
  KEY `ar_id` (`ar_id`),
  KEY `r_id` (`r_id`),
  CONSTRAINT `artist_commision_ibfk_1` FOREIGN KEY (`ar_id`) REFERENCES `artist` (`ar_id`),
  CONSTRAINT `artist_commision_ibfk_2` FOREIGN KEY (`r_id`) REFERENCES `rendered_history` (`r_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of artist_commision
-- ----------------------------

-- ----------------------------
-- Table structure for artist_commission_package
-- ----------------------------
DROP TABLE IF EXISTS `artist_commission_package`;
CREATE TABLE `artist_commission_package` (
  `ac_id` int(11) NOT NULL AUTO_INCREMENT,
  `commission` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `ar_id` int(11) DEFAULT NULL,
  `r_id` int(11) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ac_id`),
  KEY `ar_id` (`ar_id`),
  KEY `r_id` (`r_id`),
  KEY `p_id` (`p_id`),
  CONSTRAINT `artist_commission_package_ibfk_1` FOREIGN KEY (`ar_id`) REFERENCES `artist` (`ar_id`),
  CONSTRAINT `artist_commission_package_ibfk_2` FOREIGN KEY (`r_id`) REFERENCES `rendered_history` (`r_id`),
  CONSTRAINT `artist_commission_package_ibfk_3` FOREIGN KEY (`p_id`) REFERENCES `package` (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of artist_commission_package
-- ----------------------------

-- ----------------------------
-- Table structure for artist_temp
-- ----------------------------
DROP TABLE IF EXISTS `artist_temp`;
CREATE TABLE `artist_temp` (
  `artist_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_info_id` int(11) NOT NULL,
  `ar_id` varchar(255) DEFAULT NULL,
  `commission` varchar(255) DEFAULT NULL,
  `acc_id` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `service_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`artist_id`),
  KEY `id` (`id`),
  CONSTRAINT `artist_temp_ibfk_1` FOREIGN KEY (`id`) REFERENCES `service_temp` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of artist_temp
-- ----------------------------

-- ----------------------------
-- Table structure for artist_temp_package
-- ----------------------------
DROP TABLE IF EXISTS `artist_temp_package`;
CREATE TABLE `artist_temp_package` (
  `temp_id` int(11) NOT NULL AUTO_INCREMENT,
  `ar_id` int(11) DEFAULT NULL,
  `commission` varchar(255) DEFAULT NULL,
  `acc_id` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`temp_id`),
  KEY `ar_id` (`ar_id`),
  KEY `acc_id` (`acc_id`),
  KEY `id` (`id`),
  CONSTRAINT `artist_temp_package_ibfk_1` FOREIGN KEY (`ar_id`) REFERENCES `artist` (`ar_id`),
  CONSTRAINT `artist_temp_package_ibfk_2` FOREIGN KEY (`acc_id`) REFERENCES `account` (`acc_id`),
  CONSTRAINT `artist_temp_package_ibfk_3` FOREIGN KEY (`id`) REFERENCES `package_temp` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of artist_temp_package
-- ----------------------------

-- ----------------------------
-- Table structure for availability_status
-- ----------------------------
DROP TABLE IF EXISTS `availability_status`;
CREATE TABLE `availability_status` (
  `as_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(40) DEFAULT NULL,
  `roominfo_id` int(11) DEFAULT NULL,
  `amenities_id` int(11) DEFAULT NULL,
  `food_id` int(11) DEFAULT NULL,
  `table_info_id` int(11) DEFAULT NULL,
  `service_info_id` int(11) DEFAULT NULL,
  `tour_info` int(11) DEFAULT NULL,
  PRIMARY KEY (`as_id`),
  KEY `room_info_availability_status` (`roominfo_id`),
  KEY `amenities_availability_status` (`amenities_id`),
  KEY `food_info_availability_status` (`food_id`),
  KEY `table_info_availability_status` (`table_info_id`),
  KEY `service_info_availability_status` (`service_info_id`),
  CONSTRAINT `amenities_availability_status` FOREIGN KEY (`amenities_id`) REFERENCES `amenities` (`amenities_id`),
  CONSTRAINT `food_info_availability_status` FOREIGN KEY (`food_id`) REFERENCES `food_info` (`food_id`),
  CONSTRAINT `room_info_availability_status` FOREIGN KEY (`roominfo_id`) REFERENCES `room_info` (`roominfo_id`),
  CONSTRAINT `service_info_availability_status` FOREIGN KEY (`service_info_id`) REFERENCES `service_info` (`service_info_id`),
  CONSTRAINT `table_info_availability_status` FOREIGN KEY (`table_info_id`) REFERENCES `table_info` (`table_info_id`)
) ENGINE=InnoDB AUTO_INCREMENT=187 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of availability_status
-- ----------------------------
INSERT INTO `availability_status` VALUES ('155', 'available', null, null, null, null, '80', null);
INSERT INTO `availability_status` VALUES ('156', 'available', null, null, null, null, '81', null);
INSERT INTO `availability_status` VALUES ('157', 'available', null, null, null, null, '82', null);
INSERT INTO `availability_status` VALUES ('158', 'Available', null, null, null, null, null, null);
INSERT INTO `availability_status` VALUES ('159', 'Available', null, null, null, null, null, null);
INSERT INTO `availability_status` VALUES ('160', 'Available', null, null, null, null, null, null);
INSERT INTO `availability_status` VALUES ('161', 'available', null, null, null, null, '83', null);
INSERT INTO `availability_status` VALUES ('162', 'available', null, null, null, null, '84', null);
INSERT INTO `availability_status` VALUES ('163', 'available', null, null, null, null, '85', null);
INSERT INTO `availability_status` VALUES ('164', 'available', null, null, null, null, '86', null);
INSERT INTO `availability_status` VALUES ('165', 'available', null, null, null, null, '87', null);
INSERT INTO `availability_status` VALUES ('166', 'available', null, null, null, null, '88', null);
INSERT INTO `availability_status` VALUES ('167', 'available', null, null, null, null, '89', null);
INSERT INTO `availability_status` VALUES ('168', 'available', null, null, null, null, '90', null);
INSERT INTO `availability_status` VALUES ('169', 'available', null, null, null, null, '91', null);
INSERT INTO `availability_status` VALUES ('170', 'available', null, null, null, null, '92', null);
INSERT INTO `availability_status` VALUES ('171', 'available', null, null, null, null, '93', null);
INSERT INTO `availability_status` VALUES ('172', 'available', null, null, null, null, '94', null);
INSERT INTO `availability_status` VALUES ('173', 'available', null, null, null, null, '95', null);
INSERT INTO `availability_status` VALUES ('174', 'available', null, null, null, null, '96', null);
INSERT INTO `availability_status` VALUES ('175', 'available', null, null, null, null, '97', null);
INSERT INTO `availability_status` VALUES ('176', 'available', null, null, null, null, '98', null);
INSERT INTO `availability_status` VALUES ('177', 'available', null, null, null, null, '99', null);
INSERT INTO `availability_status` VALUES ('178', 'available', null, null, null, null, '100', null);
INSERT INTO `availability_status` VALUES ('179', 'Available', null, null, null, null, null, null);
INSERT INTO `availability_status` VALUES ('180', 'available', null, null, null, null, '101', null);
INSERT INTO `availability_status` VALUES ('181', 'available', null, null, null, null, '102', null);
INSERT INTO `availability_status` VALUES ('182', 'available', null, null, null, null, '103', null);
INSERT INTO `availability_status` VALUES ('183', 'available', null, null, null, null, '104', null);
INSERT INTO `availability_status` VALUES ('184', 'available', null, null, null, null, '105', null);
INSERT INTO `availability_status` VALUES ('185', 'available', null, null, null, null, '106', null);
INSERT INTO `availability_status` VALUES ('186', 'available', null, null, null, null, '107', null);

-- ----------------------------
-- Table structure for barcode
-- ----------------------------
DROP TABLE IF EXISTS `barcode`;
CREATE TABLE `barcode` (
  `bc_id` int(11) NOT NULL AUTO_INCREMENT,
  `barcode` varchar(40) DEFAULT NULL,
  `prod_id` int(11) DEFAULT NULL,
  `on_delete` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`bc_id`),
  KEY `product_main_info_barcode` (`prod_id`),
  CONSTRAINT `product_main_info_barcode` FOREIGN KEY (`prod_id`) REFERENCES `product_main_info` (`prod_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of barcode
-- ----------------------------
INSERT INTO `barcode` VALUES ('1', '', '1', null);
INSERT INTO `barcode` VALUES ('2', '122342', '2', null);
INSERT INTO `barcode` VALUES ('3', '111', '3', null);

-- ----------------------------
-- Table structure for card_holder
-- ----------------------------
DROP TABLE IF EXISTS `card_holder`;
CREATE TABLE `card_holder` (
  `ch_id` int(11) NOT NULL AUTO_INCREMENT,
  `cus_id` int(11) NOT NULL,
  `card_no` varchar(40) DEFAULT NULL,
  `date_reg` varchar(40) DEFAULT NULL,
  `image` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`ch_id`),
  KEY `customer_info_card_holder` (`cus_id`),
  CONSTRAINT `customer_info_card_holder` FOREIGN KEY (`cus_id`) REFERENCES `customer_info` (`cus_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of card_holder
-- ----------------------------

-- ----------------------------
-- Table structure for cash
-- ----------------------------
DROP TABLE IF EXISTS `cash`;
CREATE TABLE `cash` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` varchar(40) DEFAULT NULL,
  `payment_id` int(11) NOT NULL,
  PRIMARY KEY (`c_id`),
  KEY `payment_cash` (`payment_id`),
  CONSTRAINT `cash_ibfk_1` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cash
-- ----------------------------

-- ----------------------------
-- Table structure for ci_sessions
-- ----------------------------
DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ci_sessions
-- ----------------------------
INSERT INTO `ci_sessions` VALUES ('262cc86ce97949c61703b8cb4adc12ed3e3b841b', '127.0.0.1', '1517882773', 0x5F5F63695F6C6173745F726567656E65726174657C693A313531373838323737323B);
INSERT INTO `ci_sessions` VALUES ('5f4db80780950afda0cf4b19f2914819c529f5cf', '127.0.0.1', '1517883903', 0x5F5F63695F6C6173745F726567656E65726174657C693A313531373838333838303B6C6F676765645F696E7C613A333A7B733A323A226964223B733A323A223332223B733A383A22706F736974696F6E223B733A363A2241646D696E31223B733A353A226C6F67696E223B733A33313A2246656272756172792030362C2032303138207C2030393A32393A353620414D223B7D);

-- ----------------------------
-- Table structure for company_info
-- ----------------------------
DROP TABLE IF EXISTS `company_info`;
CREATE TABLE `company_info` (
  `ci_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `tin_number` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ci_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of company_info
-- ----------------------------
INSERT INTO `company_info` VALUES ('1', 'Christoff\'s Place Butuan', 'company/d231a8aebdb25fcd704cd8b89c44381a.png', '999 J.C. Aquino Avenue, Butuan City Ah 26, Butuan City, 08600 Agusan Del Norte', '09123456789', '8600', '123321123', 'bittersweetsalt@email.com');

-- ----------------------------
-- Table structure for contact_us
-- ----------------------------
DROP TABLE IF EXISTS `contact_us`;
CREATE TABLE `contact_us` (
  `con_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `remark` text,
  PRIMARY KEY (`con_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of contact_us
-- ----------------------------

-- ----------------------------
-- Table structure for ct_booking
-- ----------------------------
DROP TABLE IF EXISTS `ct_booking`;
CREATE TABLE `ct_booking` (
  `ct_id` int(11) NOT NULL AUTO_INCREMENT,
  `tour_info` int(11) NOT NULL,
  `cus_res_id` int(11) NOT NULL,
  `departure_location` varchar(40) DEFAULT NULL,
  `arrival_location` varchar(40) DEFAULT NULL,
  `tour_desc` varchar(40) DEFAULT NULL,
  `travellers_quantity` varchar(40) DEFAULT NULL,
  `departure_date` varchar(40) DEFAULT NULL,
  `departure_time` varchar(40) DEFAULT NULL,
  `duration` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`ct_id`),
  KEY `tour_information_ct_booking` (`tour_info`),
  KEY `cus_res_book_ct_booking` (`cus_res_id`),
  CONSTRAINT `cus_res_book_ct_booking` FOREIGN KEY (`cus_res_id`) REFERENCES `cus_res_book` (`cus_res_id`),
  CONSTRAINT `tour_information_ct_booking` FOREIGN KEY (`tour_info`) REFERENCES `tour_information` (`tour_info`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ct_booking
-- ----------------------------

-- ----------------------------
-- Table structure for customer_info
-- ----------------------------
DROP TABLE IF EXISTS `customer_info`;
CREATE TABLE `customer_info` (
  `cus_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `block` varchar(50) DEFAULT NULL,
  `lot_num` varchar(50) DEFAULT NULL,
  `street` varchar(50) DEFAULT NULL,
  `brgy` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `zipcode` varchar(50) DEFAULT NULL,
  `province` varchar(50) DEFAULT NULL,
  `country` varchar(50) NOT NULL,
  PRIMARY KEY (`cus_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of customer_info
-- ----------------------------

-- ----------------------------
-- Table structure for cus_res_book
-- ----------------------------
DROP TABLE IF EXISTS `cus_res_book`;
CREATE TABLE `cus_res_book` (
  `cus_res_id` int(11) NOT NULL AUTO_INCREMENT,
  `cus_id` int(11) NOT NULL,
  PRIMARY KEY (`cus_res_id`),
  KEY `customer_info_cus_res_book` (`cus_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cus_res_book
-- ----------------------------

-- ----------------------------
-- Table structure for dcp
-- ----------------------------
DROP TABLE IF EXISTS `dcp`;
CREATE TABLE `dcp` (
  `crdt_id` int(11) NOT NULL AUTO_INCREMENT,
  `dcp_type` varchar(40) DEFAULT NULL,
  `trans_number` varchar(40) DEFAULT NULL,
  `card_number` varchar(40) DEFAULT NULL,
  `date_paid` varchar(40) DEFAULT NULL,
  `expires` varchar(40) DEFAULT NULL,
  `secuirty_code` varchar(40) DEFAULT NULL,
  `amount` varchar(40) DEFAULT NULL,
  `dcp_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  PRIMARY KEY (`crdt_id`),
  KEY `dcp_holder_dcp` (`dcp_id`),
  KEY `payment_dcp` (`payment_id`),
  CONSTRAINT `dcp_holder_dcp` FOREIGN KEY (`dcp_id`) REFERENCES `dcp_holder` (`dcp_id`),
  CONSTRAINT `dcp_ibfk_1` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dcp
-- ----------------------------

-- ----------------------------
-- Table structure for dcp_holder
-- ----------------------------
DROP TABLE IF EXISTS `dcp_holder`;
CREATE TABLE `dcp_holder` (
  `dcp_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(40) DEFAULT NULL,
  `lname` varchar(40) DEFAULT NULL,
  `mname` varchar(40) DEFAULT NULL,
  `sufix` varchar(40) DEFAULT NULL,
  `address` varchar(40) DEFAULT NULL,
  `contact_number` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`dcp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dcp_holder
-- ----------------------------

-- ----------------------------
-- Table structure for discounting
-- ----------------------------
DROP TABLE IF EXISTS `discounting`;
CREATE TABLE `discounting` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
  `percent` varchar(40) DEFAULT NULL,
  `raw_price` varchar(40) DEFAULT NULL,
  `ch_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`d_id`),
  KEY `card_holder_discounting` (`ch_id`),
  CONSTRAINT `card_holder_discounting` FOREIGN KEY (`ch_id`) REFERENCES `card_holder` (`ch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of discounting
-- ----------------------------

-- ----------------------------
-- Table structure for disc_hist
-- ----------------------------
DROP TABLE IF EXISTS `disc_hist`;
CREATE TABLE `disc_hist` (
  `dh_id` int(11) NOT NULL AUTO_INCREMENT,
  `percent` varchar(40) DEFAULT NULL,
  `ch_id` int(11) NOT NULL,
  `tc_id` int(11) NOT NULL,
  PRIMARY KEY (`dh_id`),
  KEY `card_holder_disc_hist` (`ch_id`),
  KEY `trans_code_disc_hist` (`tc_id`),
  CONSTRAINT `card_holder_disc_hist` FOREIGN KEY (`ch_id`) REFERENCES `card_holder` (`ch_id`),
  CONSTRAINT `trans_code_disc_hist` FOREIGN KEY (`tc_id`) REFERENCES `trans_code` (`tc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of disc_hist
-- ----------------------------

-- ----------------------------
-- Table structure for display_in
-- ----------------------------
DROP TABLE IF EXISTS `display_in`;
CREATE TABLE `display_in` (
  `disp_in_id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` varchar(40) DEFAULT NULL,
  `bc_id` int(11) NOT NULL,
  PRIMARY KEY (`disp_in_id`),
  KEY `barcode_display_in` (`bc_id`),
  CONSTRAINT `barcode_display_in` FOREIGN KEY (`bc_id`) REFERENCES `barcode` (`bc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of display_in
-- ----------------------------

-- ----------------------------
-- Table structure for display_in_hist
-- ----------------------------
DROP TABLE IF EXISTS `display_in_hist`;
CREATE TABLE `display_in_hist` (
  `dih_id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` varchar(40) DEFAULT NULL,
  `disp_date` date DEFAULT NULL,
  `disp_time` time DEFAULT NULL,
  `bc_id` int(11) NOT NULL,
  PRIMARY KEY (`dih_id`),
  KEY `barcode_display_in_hist` (`bc_id`),
  CONSTRAINT `barcode_display_in_hist` FOREIGN KEY (`bc_id`) REFERENCES `barcode` (`bc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of display_in_hist
-- ----------------------------

-- ----------------------------
-- Table structure for division
-- ----------------------------
DROP TABLE IF EXISTS `division`;
CREATE TABLE `division` (
  `div_id` int(11) NOT NULL AUTO_INCREMENT,
  `division` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`div_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of division
-- ----------------------------

-- ----------------------------
-- Table structure for food_info
-- ----------------------------
DROP TABLE IF EXISTS `food_info`;
CREATE TABLE `food_info` (
  `food_id` int(11) NOT NULL AUTO_INCREMENT,
  `food_type` varchar(50) DEFAULT NULL,
  `food_class` varchar(50) DEFAULT NULL,
  `food_name` varchar(50) DEFAULT NULL,
  `food_capacity` varchar(50) DEFAULT NULL,
  `food_desc` text,
  `food_image` text,
  `food_date_exp` varchar(50) DEFAULT NULL,
  `food_made_date` varchar(50) DEFAULT NULL,
  `food_manufacturer` text,
  PRIMARY KEY (`food_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of food_info
-- ----------------------------

-- ----------------------------
-- Table structure for installation
-- ----------------------------
DROP TABLE IF EXISTS `installation`;
CREATE TABLE `installation` (
  `i_id` int(11) NOT NULL AUTO_INCREMENT,
  `mod_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`i_id`),
  KEY `module_list_installation` (`mod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of installation
-- ----------------------------

-- ----------------------------
-- Table structure for log_history
-- ----------------------------
DROP TABLE IF EXISTS `log_history`;
CREATE TABLE `log_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acc_id` int(11) DEFAULT NULL,
  `logout` varchar(255) DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`acc_id`),
  CONSTRAINT `log_history_ibfk_1` FOREIGN KEY (`acc_id`) REFERENCES `account` (`acc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of log_history
-- ----------------------------

-- ----------------------------
-- Table structure for module_list
-- ----------------------------
DROP TABLE IF EXISTS `module_list`;
CREATE TABLE `module_list` (
  `mod_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(225) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`mod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of module_list
-- ----------------------------
INSERT INTO `module_list` VALUES ('1', 'Sell', 'fa fa-credit-card');
INSERT INTO `module_list` VALUES ('2', 'profile', 'fa fa-edit');
INSERT INTO `module_list` VALUES ('3', 'reward', 'fa fa-gift');
INSERT INTO `module_list` VALUES ('4', 'report', 'fa fa-bar-chart-o');
INSERT INTO `module_list` VALUES ('5', 'website setting', 'fa fa-windows');

-- ----------------------------
-- Table structure for on_que
-- ----------------------------
DROP TABLE IF EXISTS `on_que`;
CREATE TABLE `on_que` (
  `oq_id` int(11) NOT NULL AUTO_INCREMENT,
  `time_out` varchar(40) DEFAULT NULL,
  `date_out` varchar(40) DEFAULT NULL,
  `type` varchar(40) DEFAULT NULL,
  `quantity` varchar(40) DEFAULT NULL,
  `unit` varchar(40) DEFAULT NULL,
  `bc_id` int(11) NOT NULL,
  `trans_code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`oq_id`),
  KEY `barcode_on_que` (`bc_id`),
  CONSTRAINT `barcode_on_que` FOREIGN KEY (`bc_id`) REFERENCES `barcode` (`bc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of on_que
-- ----------------------------

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(40) DEFAULT NULL,
  `time` varchar(40) DEFAULT NULL,
  `prod_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `quantity` varchar(40) DEFAULT NULL,
  `unit` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `product_main_info_order` (`prod_id`),
  KEY `food_info_order` (`food_id`),
  CONSTRAINT `food_info_order` FOREIGN KEY (`food_id`) REFERENCES `food_info` (`food_id`),
  CONSTRAINT `product_main_info_order` FOREIGN KEY (`prod_id`) REFERENCES `product_main_info` (`prod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of order
-- ----------------------------

-- ----------------------------
-- Table structure for package
-- ----------------------------
DROP TABLE IF EXISTS `package`;
CREATE TABLE `package` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `package_name` varchar(255) DEFAULT NULL,
  `price` double(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text,
  `type` varchar(255) DEFAULT NULL,
  `on_delete` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `vat` double DEFAULT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of package
-- ----------------------------
INSERT INTO `package` VALUES ('29', 'P1_MEDIUM', '625.00', 'default/default.png', 'PACKAGE 1_MEDIUM', 'Minor', null, '75');
INSERT INTO `package` VALUES ('30', 'P1_SHORT', '535.71', 'default/default.png', 'PACKAGE 1_SHORT', 'Minor', null, '64.285714285714');
INSERT INTO `package` VALUES ('31', 'P1_LONG', '714.29', 'default/default.png', 'PACKAGE 1 LONG', 'Minor', null, '85.714285714286');
INSERT INTO `package` VALUES ('32', 'P1_XL', '803.57', 'default/default.png', 'PACKAGE 1_XL', 'Minor', null, '96.428571428571');
INSERT INTO `package` VALUES ('33', 'P2_SHORT', '401.79', 'default/default.png', 'PACKAGE 2_SHORT', 'Minor', null, '48.214285714286');
INSERT INTO `package` VALUES ('34', 'P2_MEDIUM', '491.07', 'default/default.png', 'PACKAGE 2_MEDIUM', 'Minor', null, '58.928571428571');
INSERT INTO `package` VALUES ('35', 'P2_LONG', '580.36', 'default/default.png', 'PACKAGE 2 LONG', 'Minor', null, '69.642857142857');
INSERT INTO `package` VALUES ('36', 'P2_XL', '625.00', 'default/default.png', 'PACKAGE 2 XL', 'Minor', null, '75');
INSERT INTO `package` VALUES ('37', 'P3_SHORT', '491.07', 'default/default.png', 'PACKAGE 3 SHORT', 'Minor', null, '58.928571428571');
INSERT INTO `package` VALUES ('38', 'P3_MEDIUM', '580.36', 'default/default.png', 'PACKAGE 3 MEDIUM', 'minor', null, '69.642857142857');
INSERT INTO `package` VALUES ('39', 'P3_LONG', '669.64', 'default/default.png', 'PACKAGE 3 LONG', 'minor', null, '80.357142857143');
INSERT INTO `package` VALUES ('40', 'P3_XL', '714.29', 'default/default.png', 'PACKAGE 3 XL', 'minor', null, '85.714285714286');
INSERT INTO `package` VALUES ('41', 'P4_SHORT', '580.36', 'default/default.png', 'PACKAGE 4 SHORT', 'minor', null, '69.642857142857');
INSERT INTO `package` VALUES ('42', 'P4_MEDIUM', '669.64', 'default/default.png', 'PACKAGE 4 MEDIUM', 'minor', null, '80.357142857143');
INSERT INTO `package` VALUES ('43', 'P4_LONG', '758.93', 'default/default.png', 'PACKAGE 4 LONG', 'minor', null, '91.071428571429');
INSERT INTO `package` VALUES ('44', 'P4_XL', '848.21', 'default/default.png', 'PACKAGE 4 XL', 'minor', null, '101.78571428571');
INSERT INTO `package` VALUES ('45', 'P4_XL', '848.21', 'default/default.png', 'PACKAGE 4 XL', 'minor', null, '101.78571428571');
INSERT INTO `package` VALUES ('46', 'P7_WT', '714.29', 'default/default.png', 'PACKAGE 7 WAXING AND THREADING', 'minor', null, '85.714285714286');
INSERT INTO `package` VALUES ('47', 'P8_HM', '758.93', 'default/default.png', 'HAIR AND MAKE UP: EYELASH, PERMING, EXTENTION', 'minor', null, '91.071428571429');
INSERT INTO `package` VALUES ('48', 'P5_SHORT', '1428.57', 'default/default.png', 'PACKAGE 5 SHORT', 'minor', null, '171.42857142857');
INSERT INTO `package` VALUES ('49', 'P5_MEDIUM', '1607.14', 'default/default.png', 'PACKAGE 5 MEDIUM', 'minor', null, '192.85714285714');
INSERT INTO `package` VALUES ('50', 'P5_LONG', '1696.43', 'default/default.png', 'PACKAGE 5 LONG', 'minor', null, '203.57142857143');
INSERT INTO `package` VALUES ('51', 'P5_XL', '1785.71', 'default/default.png', 'PACKAGE 5 XL', 'Minor', null, '214.28571428571');
INSERT INTO `package` VALUES ('52', 'P5_LONG', '1696.43', 'default/default.png', 'PACKAGE 5 LONG', 'minor', null, '203.57142857143');
INSERT INTO `package` VALUES ('53', 'P6_SHORT', '625.00', 'default/default.png', 'PACKAGE 6 SHORT', 'minor', null, '75');
INSERT INTO `package` VALUES ('54', 'P6_MEDIUM', '714.29', 'default/default.png', 'PACKAGE 6 MEDIUM', 'minor', null, '85.714285714286');
INSERT INTO `package` VALUES ('55', 'P6_LONG', '803.57', 'default/default.png', 'PACKAGE 6 LONG', 'minor', null, '96.428571428571');
INSERT INTO `package` VALUES ('56', 'P6_XL', '892.86', 'default/default.png', 'PACKAGE 6 XL', 'minor', null, '107.14285714286');

-- ----------------------------
-- Table structure for package_artist_temp
-- ----------------------------
DROP TABLE IF EXISTS `package_artist_temp`;
CREATE TABLE `package_artist_temp` (
  `package_id` int(11) NOT NULL AUTO_INCREMENT,
  `commission` varchar(255) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `ar_id` int(11) DEFAULT NULL,
  `acc_id` int(11) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`package_id`),
  KEY `id` (`id`),
  KEY `ar_id` (`ar_id`),
  KEY `acc_id` (`acc_id`),
  KEY `p_id` (`p_id`),
  CONSTRAINT `package_artist_temp_ibfk_1` FOREIGN KEY (`id`) REFERENCES `package_temp` (`id`) ON DELETE CASCADE,
  CONSTRAINT `package_artist_temp_ibfk_2` FOREIGN KEY (`ar_id`) REFERENCES `artist` (`ar_id`),
  CONSTRAINT `package_artist_temp_ibfk_3` FOREIGN KEY (`acc_id`) REFERENCES `account` (`acc_id`),
  CONSTRAINT `package_artist_temp_ibfk_4` FOREIGN KEY (`p_id`) REFERENCES `package` (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of package_artist_temp
-- ----------------------------

-- ----------------------------
-- Table structure for package_temp
-- ----------------------------
DROP TABLE IF EXISTS `package_temp`;
CREATE TABLE `package_temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `acc_id` int(11) DEFAULT NULL,
  `last_update` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `qty` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `discount` double(255,2) DEFAULT NULL,
  `vat` double(255,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `acc_id` (`acc_id`),
  CONSTRAINT `package_temp_ibfk_1` FOREIGN KEY (`acc_id`) REFERENCES `account` (`acc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of package_temp
-- ----------------------------

-- ----------------------------
-- Table structure for payment
-- ----------------------------
DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_out_hist_id` int(11) DEFAULT NULL,
  `acc_id` int(11) DEFAULT NULL,
  `r_id` int(11) NOT NULL,
  PRIMARY KEY (`payment_id`),
  KEY `stock_out_payment` (`stock_out_hist_id`),
  KEY `account_payment` (`acc_id`),
  KEY `rendered_history_payment` (`r_id`),
  CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`stock_out_hist_id`) REFERENCES `stock_out_history` (`stock_out_hist_id`),
  CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`acc_id`) REFERENCES `account` (`acc_id`),
  CONSTRAINT `payment_ibfk_3` FOREIGN KEY (`r_id`) REFERENCES `rendered_history` (`r_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of payment
-- ----------------------------

-- ----------------------------
-- Table structure for personal_info
-- ----------------------------
DROP TABLE IF EXISTS `personal_info`;
CREATE TABLE `personal_info` (
  `acc_id` int(11) NOT NULL AUTO_INCREMENT,
  `img_path` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `birthdate` datetime DEFAULT NULL,
  `pos_id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`acc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of personal_info
-- ----------------------------

-- ----------------------------
-- Table structure for point
-- ----------------------------
DROP TABLE IF EXISTS `point`;
CREATE TABLE `point` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `points` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of point
-- ----------------------------
INSERT INTO `point` VALUES ('4', null, '200');

-- ----------------------------
-- Table structure for positions
-- ----------------------------
DROP TABLE IF EXISTS `positions`;
CREATE TABLE `positions` (
  `pos_id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pos_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of positions
-- ----------------------------
INSERT INTO `positions` VALUES ('1', 'Admin1');

-- ----------------------------
-- Table structure for pos_sessions
-- ----------------------------
DROP TABLE IF EXISTS `pos_sessions`;
CREATE TABLE `pos_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pos_sessions
-- ----------------------------

-- ----------------------------
-- Table structure for pricing
-- ----------------------------
DROP TABLE IF EXISTS `pricing`;
CREATE TABLE `pricing` (
  `pricing_id` int(11) NOT NULL AUTO_INCREMENT,
  `price` double(40,2) DEFAULT NULL,
  `vat` double(40,2) DEFAULT NULL,
  `table_info_id` int(11) DEFAULT NULL,
  `food_id` int(11) DEFAULT NULL,
  `amenities_id` int(11) DEFAULT NULL,
  `roominfo_id` int(11) DEFAULT NULL,
  `service_info_id` int(11) DEFAULT NULL,
  `tour_info` int(11) DEFAULT NULL,
  `bc_id` int(11) DEFAULT NULL,
  `mark_up` double(11,2) DEFAULT NULL,
  PRIMARY KEY (`pricing_id`),
  KEY `table_info_pricing` (`table_info_id`),
  KEY `food_info_pricing` (`food_id`),
  KEY `amenities_pricing` (`amenities_id`),
  KEY `room_info_pricing` (`roominfo_id`),
  KEY `service_info_pricing` (`service_info_id`),
  KEY `tour_information_pricing` (`tour_info`),
  KEY `barcode_pricing` (`bc_id`),
  CONSTRAINT `amenities_pricing` FOREIGN KEY (`amenities_id`) REFERENCES `amenities` (`amenities_id`),
  CONSTRAINT `barcode_pricing` FOREIGN KEY (`bc_id`) REFERENCES `barcode` (`bc_id`) ON DELETE CASCADE,
  CONSTRAINT `food_info_pricing` FOREIGN KEY (`food_id`) REFERENCES `food_info` (`food_id`),
  CONSTRAINT `room_info_pricing` FOREIGN KEY (`roominfo_id`) REFERENCES `room_info` (`roominfo_id`),
  CONSTRAINT `service_info_pricing` FOREIGN KEY (`service_info_id`) REFERENCES `service_info` (`service_info_id`),
  CONSTRAINT `table_info_pricing` FOREIGN KEY (`table_info_id`) REFERENCES `table_info` (`table_info_id`),
  CONSTRAINT `tour_information_pricing` FOREIGN KEY (`tour_info`) REFERENCES `tour_information` (`tour_info`)
) ENGINE=InnoDB AUTO_INCREMENT=1105 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pricing
-- ----------------------------
INSERT INTO `pricing` VALUES ('1074', '71.43', '8.57', null, null, null, null, '80', null, null, null);
INSERT INTO `pricing` VALUES ('1075', '133.93', '16.07', null, null, null, null, '81', null, null, null);
INSERT INTO `pricing` VALUES ('1076', '178.57', '21.43', null, null, null, null, '82', null, null, null);
INSERT INTO `pricing` VALUES ('1077', '223.21', '26.79', null, null, null, null, '83', null, null, null);
INSERT INTO `pricing` VALUES ('1078', '267.86', '32.14', null, null, null, null, '84', null, null, null);
INSERT INTO `pricing` VALUES ('1079', '267.86', '32.14', null, null, null, null, '85', null, null, null);
INSERT INTO `pricing` VALUES ('1080', '223.21', '26.79', null, null, null, null, '86', null, null, null);
INSERT INTO `pricing` VALUES ('1081', '267.86', '32.14', null, null, null, null, '87', null, null, null);
INSERT INTO `pricing` VALUES ('1082', '312.50', '37.50', null, null, null, null, '88', null, null, null);
INSERT INTO `pricing` VALUES ('1083', '357.14', '42.86', null, null, null, null, '89', null, null, null);
INSERT INTO `pricing` VALUES ('1084', '0.89', '0.11', null, null, null, null, '90', null, null, null);
INSERT INTO `pricing` VALUES ('1085', '0.89', '0.11', null, null, null, null, '91', null, null, null);
INSERT INTO `pricing` VALUES ('1086', '0.89', '0.11', null, null, null, null, '92', null, null, null);
INSERT INTO `pricing` VALUES ('1087', '0.89', '0.11', null, null, null, null, '93', null, null, null);
INSERT INTO `pricing` VALUES ('1088', '0.89', '0.11', null, null, null, null, '94', null, null, null);
INSERT INTO `pricing` VALUES ('1089', '0.89', '0.11', null, null, null, null, '95', null, null, null);
INSERT INTO `pricing` VALUES ('1090', '0.89', '0.11', null, null, null, null, '96', null, null, null);
INSERT INTO `pricing` VALUES ('1091', '0.89', '0.11', null, null, null, null, '97', null, null, null);
INSERT INTO `pricing` VALUES ('1092', '0.89', '0.11', null, null, null, null, '98', null, null, null);
INSERT INTO `pricing` VALUES ('1093', '0.89', '0.11', null, null, null, null, '99', null, null, null);
INSERT INTO `pricing` VALUES ('1094', '0.89', '0.11', null, null, null, null, '100', null, null, null);
INSERT INTO `pricing` VALUES ('1095', '0.89', '0.11', null, null, null, null, '101', null, null, null);
INSERT INTO `pricing` VALUES ('1096', '0.89', '0.11', null, null, null, null, '102', null, null, null);
INSERT INTO `pricing` VALUES ('1097', '0.89', '0.11', null, null, null, null, '103', null, null, null);
INSERT INTO `pricing` VALUES ('1098', '0.89', '0.11', null, null, null, null, '104', null, null, null);
INSERT INTO `pricing` VALUES ('1099', '0.89', '0.11', null, null, null, null, '105', null, null, null);
INSERT INTO `pricing` VALUES ('1100', '0.89', '0.11', null, null, null, null, '106', null, null, null);
INSERT INTO `pricing` VALUES ('1101', '0.89', '0.11', null, null, null, null, '107', null, null, null);
INSERT INTO `pricing` VALUES ('1102', '71.43', '8.57', null, null, null, null, null, null, '1', '30.00');
INSERT INTO `pricing` VALUES ('1103', '0.00', '0.00', null, null, null, null, null, null, '2', '0.00');
INSERT INTO `pricing` VALUES ('1104', '89.29', '10.71', null, null, null, null, null, null, '3', '0.00');

-- ----------------------------
-- Table structure for product_class
-- ----------------------------
DROP TABLE IF EXISTS `product_class`;
CREATE TABLE `product_class` (
  `prod_class_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_type_id` int(11) DEFAULT NULL,
  `prod_class` varchar(50) DEFAULT NULL,
  `prod_class_desc` text,
  PRIMARY KEY (`prod_class_id`),
  KEY `prod_type_id` (`prod_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of product_class
-- ----------------------------

-- ----------------------------
-- Table structure for product_main_info
-- ----------------------------
DROP TABLE IF EXISTS `product_main_info`;
CREATE TABLE `product_main_info` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_type_id` int(11) DEFAULT NULL,
  `prod_class` varchar(255) DEFAULT NULL,
  `prod_image` varchar(255) DEFAULT NULL,
  `prod_name` varchar(50) DEFAULT NULL,
  `prod_subname` varchar(50) DEFAULT NULL,
  `prod_packaging_type` varchar(40) DEFAULT NULL,
  `prod_size_id` int(11) DEFAULT NULL,
  `prod_size` varchar(40) DEFAULT NULL,
  `prod_wu_id` int(11) DEFAULT NULL,
  `prod_weight` varchar(40) DEFAULT NULL,
  `prod_manufacturer` varchar(50) DEFAULT NULL,
  `prod_benefits` varchar(50) DEFAULT NULL,
  `prod_desc` text,
  `prod_made_date` date DEFAULT NULL,
  `prod_date_exp` date DEFAULT NULL,
  `prod_info_date_inputted` date DEFAULT NULL,
  `view` tinyint(4) DEFAULT NULL,
  `option` varchar(255) DEFAULT NULL,
  `on_delete` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `email` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`prod_id`),
  KEY `prod_type_id` (`prod_type_id`),
  KEY `prod_class_id` (`prod_class`),
  KEY `prod_size_id` (`prod_size_id`),
  KEY `prod_wu_id` (`prod_wu_id`),
  CONSTRAINT `product_main_info_ibfk_1` FOREIGN KEY (`prod_size_id`) REFERENCES `size` (`prod_size_id`),
  CONSTRAINT `product_main_info_ibfk_2` FOREIGN KEY (`prod_wu_id`) REFERENCES `weight_unit` (`prod_wu_id`),
  CONSTRAINT `product_main_info_ibfk_4` FOREIGN KEY (`prod_type_id`) REFERENCES `product_type` (`prod_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of product_main_info
-- ----------------------------
INSERT INTO `product_main_info` VALUES ('1', null, null, 'products/ab66d1ae4221e982a022f19c947dcd6a.jpg', 'Tempra', '', '', '12', '60', '10', '60', null, null, '', '2018-01-24', '2020-01-24', '2018-01-24', '0', 'yes', null, 'sanofi@sanofi.com', '09123456890');
INSERT INTO `product_main_info` VALUES ('2', '12', 'Gold', 'default/default.png', 'test', '', 'test', '10', '12', '1', '12', null, null, '', '2018-02-06', '2018-02-06', '2018-02-06', '0', null, null, '', '');
INSERT INTO `product_main_info` VALUES ('3', null, null, 'default/default.png', '111', '', '11', '10', '1', '1', '11', null, null, '1', '2018-02-06', '2018-02-06', '2018-02-06', '0', 'no', null, '', '');

-- ----------------------------
-- Table structure for product_type
-- ----------------------------
DROP TABLE IF EXISTS `product_type`;
CREATE TABLE `product_type` (
  `prod_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_type` varchar(50) DEFAULT NULL,
  `prod_type_image` varchar(100) DEFAULT NULL,
  `prod_type_desc` text,
  PRIMARY KEY (`prod_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of product_type
-- ----------------------------
INSERT INTO `product_type` VALUES ('12', 'Medicine', null, 'For Fever');
INSERT INTO `product_type` VALUES ('13', 'Type', null, 'Test');

-- ----------------------------
-- Table structure for purchase_pointing
-- ----------------------------
DROP TABLE IF EXISTS `purchase_pointing`;
CREATE TABLE `purchase_pointing` (
  `pointing_id` int(11) NOT NULL AUTO_INCREMENT,
  `points` varchar(40) DEFAULT NULL,
  `ch_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`pointing_id`),
  KEY `card_holder_purchase_pointing` (`ch_id`),
  CONSTRAINT `card_holder_purchase_pointing` FOREIGN KEY (`ch_id`) REFERENCES `card_holder` (`ch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of purchase_pointing
-- ----------------------------

-- ----------------------------
-- Table structure for purchase_pointing_hist
-- ----------------------------
DROP TABLE IF EXISTS `purchase_pointing_hist`;
CREATE TABLE `purchase_pointing_hist` (
  `pph_id` int(11) NOT NULL AUTO_INCREMENT,
  `points` varchar(40) DEFAULT NULL,
  `ch_id` int(11) NOT NULL,
  `tc_id` int(11) NOT NULL,
  PRIMARY KEY (`pph_id`),
  KEY `card_holder_purchase_pointing_hist` (`ch_id`),
  KEY `trans_code_purchase_pointing_hist` (`tc_id`),
  CONSTRAINT `card_holder_purchase_pointing_hist` FOREIGN KEY (`ch_id`) REFERENCES `card_holder` (`ch_id`),
  CONSTRAINT `trans_code_purchase_pointing_hist` FOREIGN KEY (`tc_id`) REFERENCES `trans_code` (`tc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of purchase_pointing_hist
-- ----------------------------

-- ----------------------------
-- Table structure for receipt_info
-- ----------------------------
DROP TABLE IF EXISTS `receipt_info`;
CREATE TABLE `receipt_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pn` varchar(255) DEFAULT NULL,
  `min` varchar(255) DEFAULT NULL,
  `serial_number` varchar(255) DEFAULT NULL,
  `accreditation_date` date DEFAULT NULL,
  `accreditation_no` varchar(255) DEFAULT NULL,
  `note` text,
  `si` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of receipt_info
-- ----------------------------
INSERT INTO `receipt_info` VALUES ('1', '113-116-173832-045', '123432', '59B319561211', '2012-02-14', '116-000345273-000258-57230121', 'Exchange of Item for reasons other than those provided under the Consumer Act will only be allowed within 7 days from date of purchase. Please present this Sales Invoice.', '23432343');

-- ----------------------------
-- Table structure for reimburse_temp
-- ----------------------------
DROP TABLE IF EXISTS `reimburse_temp`;
CREATE TABLE `reimburse_temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bc_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `stock_in_id` int(11) DEFAULT NULL,
  `stock_out_id` int(11) DEFAULT NULL,
  `tc_id` int(11) DEFAULT NULL,
  `acc_id` int(11) DEFAULT NULL,
  `new_qty` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tc_id` (`tc_id`),
  KEY `acc_id` (`acc_id`),
  CONSTRAINT `reimburse_temp_ibfk_1` FOREIGN KEY (`tc_id`) REFERENCES `trans_code` (`tc_id`),
  CONSTRAINT `reimburse_temp_ibfk_2` FOREIGN KEY (`acc_id`) REFERENCES `account` (`acc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of reimburse_temp
-- ----------------------------

-- ----------------------------
-- Table structure for rendered_artist
-- ----------------------------
DROP TABLE IF EXISTS `rendered_artist`;
CREATE TABLE `rendered_artist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `r_id` int(11) DEFAULT NULL,
  `ac_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `r_id` (`r_id`),
  KEY `ac_id` (`ac_id`),
  CONSTRAINT `rendered_artist_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `rendered_history` (`r_id`) ON DELETE CASCADE,
  CONSTRAINT `rendered_artist_ibfk_2` FOREIGN KEY (`ac_id`) REFERENCES `artist_commision` (`ac_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rendered_artist
-- ----------------------------

-- ----------------------------
-- Table structure for rendered_history
-- ----------------------------
DROP TABLE IF EXISTS `rendered_history`;
CREATE TABLE `rendered_history` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_info_id` int(11) DEFAULT NULL,
  `date_rendered` date DEFAULT NULL,
  `remarks` text,
  `roominfo_id` int(11) DEFAULT NULL,
  `amenities_id` int(11) DEFAULT NULL,
  `food_id` int(11) DEFAULT NULL,
  `table_info_id` int(11) DEFAULT NULL,
  `tour_info` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `vat` decimal(10,2) DEFAULT NULL,
  `acc_id` int(11) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL,
  `service_qty` int(11) DEFAULT NULL,
  `package_qty` int(11) DEFAULT NULL,
  PRIMARY KEY (`r_id`),
  KEY `service_info_rendered_history` (`service_info_id`),
  KEY `room_info_rendered_history` (`roominfo_id`),
  KEY `amenities_rendered_history` (`amenities_id`),
  KEY `food_info_rendered_history` (`food_id`),
  KEY `table_info_rendered_history` (`table_info_id`),
  KEY `tour_information_rendered_history` (`tour_info`),
  CONSTRAINT `amenities_rendered_history` FOREIGN KEY (`amenities_id`) REFERENCES `amenities` (`amenities_id`),
  CONSTRAINT `food_info_rendered_history` FOREIGN KEY (`food_id`) REFERENCES `food_info` (`food_id`),
  CONSTRAINT `room_info_rendered_history` FOREIGN KEY (`roominfo_id`) REFERENCES `room_info` (`roominfo_id`),
  CONSTRAINT `service_info_rendered_history` FOREIGN KEY (`service_info_id`) REFERENCES `service_info` (`service_info_id`),
  CONSTRAINT `table_info_rendered_history` FOREIGN KEY (`table_info_id`) REFERENCES `table_info` (`table_info_id`),
  CONSTRAINT `tour_information_rendered_history` FOREIGN KEY (`tour_info`) REFERENCES `tour_information` (`tour_info`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rendered_history
-- ----------------------------

-- ----------------------------
-- Table structure for reservation
-- ----------------------------
DROP TABLE IF EXISTS `reservation`;
CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `ro_id` int(11) DEFAULT NULL,
  `roominfo_id` int(11) DEFAULT NULL,
  `amenities_id` int(11) DEFAULT NULL,
  `food_id` int(11) DEFAULT NULL,
  `table_info_id` int(11) DEFAULT NULL,
  `service_info_id` int(11) DEFAULT NULL,
  `prod_id` int(11) DEFAULT NULL,
  `quantity` varchar(40) NOT NULL,
  PRIMARY KEY (`reservation_id`),
  KEY `room_info_reservation` (`roominfo_id`),
  KEY `amenities_reservation` (`amenities_id`),
  KEY `food_info_reservation` (`food_id`),
  KEY `table_info_reservation` (`table_info_id`),
  KEY `service_info_reservation` (`service_info_id`),
  KEY `product_main_info_reservation` (`prod_id`),
  KEY `res_obj_reservation` (`ro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of reservation
-- ----------------------------

-- ----------------------------
-- Table structure for res_obj
-- ----------------------------
DROP TABLE IF EXISTS `res_obj`;
CREATE TABLE `res_obj` (
  `ro_id` int(11) NOT NULL AUTO_INCREMENT,
  `reservation_date` varchar(40) DEFAULT NULL,
  `reservation_time` varchar(40) DEFAULT NULL,
  `remarks` text,
  `cus_res_id` int(11) NOT NULL,
  `rs_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ro_id`),
  KEY `cus_res_book_res_obj` (`cus_res_id`),
  KEY `res_status_res_obj` (`rs_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of res_obj
-- ----------------------------

-- ----------------------------
-- Table structure for res_status
-- ----------------------------
DROP TABLE IF EXISTS `res_status`;
CREATE TABLE `res_status` (
  `rs_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`rs_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of res_status
-- ----------------------------

-- ----------------------------
-- Table structure for res_status_history
-- ----------------------------
DROP TABLE IF EXISTS `res_status_history`;
CREATE TABLE `res_status_history` (
  `rsh_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `ro_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`rsh_id`),
  KEY `res_obj_res_status_history` (`ro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of res_status_history
-- ----------------------------

-- ----------------------------
-- Table structure for room_info
-- ----------------------------
DROP TABLE IF EXISTS `room_info`;
CREATE TABLE `room_info` (
  `roominfo_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_number` varchar(40) DEFAULT NULL,
  `room_type_id` varchar(40) DEFAULT NULL,
  `room_class` varchar(40) DEFAULT NULL,
  `room_floor` varchar(40) DEFAULT NULL,
  `room_capacity` varchar(40) DEFAULT NULL,
  `room_desc` text,
  `room_image` varchar(40) DEFAULT NULL,
  `on_delete` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`roominfo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of room_info
-- ----------------------------

-- ----------------------------
-- Table structure for room_reservation
-- ----------------------------
DROP TABLE IF EXISTS `room_reservation`;
CREATE TABLE `room_reservation` (
  `res_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) DEFAULT NULL,
  `cus_id` int(11) DEFAULT NULL,
  `reservation_date` varchar(255) DEFAULT NULL,
  `arrival_date` varchar(255) DEFAULT NULL,
  `arrival_time` varchar(255) DEFAULT NULL,
  `departure_date` varchar(255) DEFAULT NULL,
  `departure_time` varchar(255) DEFAULT NULL,
  `no_of_child` int(11) DEFAULT NULL,
  `no_of_pax` int(11) DEFAULT NULL,
  PRIMARY KEY (`res_id`),
  KEY `cus_id` (`cus_id`),
  CONSTRAINT `room_reservation_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `customer_info` (`cus_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of room_reservation
-- ----------------------------

-- ----------------------------
-- Table structure for room_type
-- ----------------------------
DROP TABLE IF EXISTS `room_type`;
CREATE TABLE `room_type` (
  `room_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_type` varchar(255) DEFAULT NULL,
  `room_type_description` text,
  `room_type_capacity` int(11) DEFAULT NULL,
  PRIMARY KEY (`room_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of room_type
-- ----------------------------

-- ----------------------------
-- Table structure for sales_report
-- ----------------------------
DROP TABLE IF EXISTS `sales_report`;
CREATE TABLE `sales_report` (
  `sa_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_id` int(11) DEFAULT NULL,
  `stock_out_hist_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`sa_id`),
  KEY `r_id` (`r_id`),
  KEY `stock_out_hist_id` (`stock_out_hist_id`),
  CONSTRAINT `sales_report_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `rendered_history` (`r_id`) ON DELETE CASCADE,
  CONSTRAINT `sales_report_ibfk_2` FOREIGN KEY (`stock_out_hist_id`) REFERENCES `stock_out_history` (`stock_out_hist_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sales_report
-- ----------------------------

-- ----------------------------
-- Table structure for service_artist_temp
-- ----------------------------
DROP TABLE IF EXISTS `service_artist_temp`;
CREATE TABLE `service_artist_temp` (
  `service_artist_id` int(11) NOT NULL AUTO_INCREMENT,
  `commission` varchar(255) DEFAULT NULL,
  `ar_id` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `service_info_id` int(11) DEFAULT NULL,
  `acc_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`service_artist_id`),
  KEY `ar_id` (`ar_id`),
  KEY `id` (`id`),
  KEY `service_info_id` (`service_info_id`),
  KEY `acc_id` (`acc_id`),
  CONSTRAINT `service_artist_temp_ibfk_1` FOREIGN KEY (`ar_id`) REFERENCES `artist` (`ar_id`),
  CONSTRAINT `service_artist_temp_ibfk_2` FOREIGN KEY (`id`) REFERENCES `service_temp` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `service_artist_temp_ibfk_3` FOREIGN KEY (`service_info_id`) REFERENCES `service_info` (`service_info_id`),
  CONSTRAINT `service_artist_temp_ibfk_4` FOREIGN KEY (`acc_id`) REFERENCES `account` (`acc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of service_artist_temp
-- ----------------------------

-- ----------------------------
-- Table structure for service_class
-- ----------------------------
DROP TABLE IF EXISTS `service_class`;
CREATE TABLE `service_class` (
  `service_class_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_class` varchar(50) DEFAULT NULL,
  `service_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`service_class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of service_class
-- ----------------------------
INSERT INTO `service_class` VALUES ('18', 'long', '2');
INSERT INTO `service_class` VALUES ('19', 'short', '2');
INSERT INTO `service_class` VALUES ('20', 'medium', '2');
INSERT INTO `service_class` VALUES ('21', 'Extra  Long', '2');
INSERT INTO `service_class` VALUES ('32', 'normal', '10');
INSERT INTO `service_class` VALUES ('33', 'normal', '10');
INSERT INTO `service_class` VALUES ('34', 'NORMAL', '3');
INSERT INTO `service_class` VALUES ('35', 'ART', '10');
INSERT INTO `service_class` VALUES ('36', 'EXTENSION', '3');
INSERT INTO `service_class` VALUES ('37', 'ART', '3');
INSERT INTO `service_class` VALUES ('38', 'OTHERS', '11');
INSERT INTO `service_class` VALUES ('39', 'OTHER', '12');

-- ----------------------------
-- Table structure for service_info
-- ----------------------------
DROP TABLE IF EXISTS `service_info`;
CREATE TABLE `service_info` (
  `service_info_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_type_id` int(11) DEFAULT NULL,
  `service_class_id` int(11) DEFAULT NULL,
  `service_image` text,
  `service_name` varchar(40) DEFAULT NULL,
  `service_desc` text,
  `view` tinyint(4) DEFAULT NULL,
  `on_delete` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`service_info_id`),
  KEY `service_type_id` (`service_type_id`),
  KEY `service_class_id` (`service_class_id`),
  CONSTRAINT `service_info_ibfk_2` FOREIGN KEY (`service_type_id`) REFERENCES `service_type` (`service_type_id`),
  CONSTRAINT `service_info_ibfk_3` FOREIGN KEY (`service_class_id`) REFERENCES `service_class` (`service_class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of service_info
-- ----------------------------
INSERT INTO `service_info` VALUES ('80', '2', '18', 'default/default.png', 'HAIR CUT', 'HAIR CUT', '0', null, 'minor');
INSERT INTO `service_info` VALUES ('81', '2', '19', 'default/default.png', 'HOT OIL_SHORT', 'With Free Hair Cut And Blow Dry', '0', null, 'minor');
INSERT INTO `service_info` VALUES ('82', '2', '20', 'default/default.png', 'HOT OIL_MEDIUM', 'With Free Hair Cut And Blow Dry', '0', null, 'minor');
INSERT INTO `service_info` VALUES ('83', '2', '18', 'default/default.png', 'HOT OIL_LONG', 'with free hair cut and blow dry', '0', null, 'minor');
INSERT INTO `service_info` VALUES ('84', '2', '21', 'default/default.png', 'HOT OIL_XL', 'with free hair cut and blow dry', '0', '2017-02-12 10:11:02', 'minor');
INSERT INTO `service_info` VALUES ('85', '2', '21', 'default/default.png', 'HOT OIL_XL', 'with free hair cut and blow dry', '0', null, 'minor');
INSERT INTO `service_info` VALUES ('86', '2', '19', 'default/default.png', 'HAIR SPA_SHORT', 'with free hair cut and blow dry', '0', null, 'minor');
INSERT INTO `service_info` VALUES ('87', '2', '20', 'default/default.png', 'HAIR SPA_MEDIUM', 'with free hair cut and blow dry', '0', null, 'minor');
INSERT INTO `service_info` VALUES ('88', '2', '18', 'default/default.png', 'HAIR SPA_LONG', 'with free hair cut and blow dry', '0', null, 'minor');
INSERT INTO `service_info` VALUES ('89', '2', '21', 'default/default.png', 'HAIR SPA_XL', 'with free hair cut and blow dry', '0', null, 'minor');
INSERT INTO `service_info` VALUES ('90', '2', '19', 'default/default.png', 'HAIR COLOR', 'HAIR COLOR', '0', null, 'minor');
INSERT INTO `service_info` VALUES ('91', '10', '32', 'default/default.png', 'FOOT SPA', 'FOOT', '0', null, 'minor');
INSERT INTO `service_info` VALUES ('92', '3', '36', 'default/default.png', 'PEDICURE', 'EXTENSION', '0', null, 'minor');
INSERT INTO `service_info` VALUES ('93', '2', '19', 'default/default.png', 'HAIR CELLOPHANE', 'HAIR CELLOPHANE', '0', null, 'minor');
INSERT INTO `service_info` VALUES ('94', '2', '19', 'default/default.png', 'KERATIN TREATMENT', 'KERATIN', '0', null, 'minor');
INSERT INTO `service_info` VALUES ('95', '3', '34', 'default/default.png', 'MANICURE', 'NORMAL', '0', '2017-02-12 10:09:32', 'minor');
INSERT INTO `service_info` VALUES ('96', '3', '34', 'default/default.png', 'MANICURE', 'NORMAL', '0', null, 'minor');
INSERT INTO `service_info` VALUES ('97', '11', '38', 'default/default.png', 'WAXING AND THREADING', 'WAX AND THREAD', '0', null, 'minor');
INSERT INTO `service_info` VALUES ('98', '12', null, 'default/default.png', 'EYE BROW', 'EYE', '0', null, 'minor');
INSERT INTO `service_info` VALUES ('99', '12', '39', 'default/default.png', 'WT_UNDER ARM', 'UNDER ARM', '0', null, 'minor');
INSERT INTO `service_info` VALUES ('100', '12', '39', 'default/default.png', 'WT_LEGS', 'LEGS', '0', null, 'minor');
INSERT INTO `service_info` VALUES ('101', '12', '39', 'default/default.png', 'WT_EYEBROW', 'EYEBROW', '0', null, 'minor');
INSERT INTO `service_info` VALUES ('102', '12', '39', 'default/default.png', 'WT_ARMS', 'ARMS', '0', null, 'minor');
INSERT INTO `service_info` VALUES ('103', '2', '19', 'default/default.png', 'HIGH LIGHT', 'SHORT', '0', null, 'minor');
INSERT INTO `service_info` VALUES ('104', '2', '19', 'default/default.png', 'HAIR CURLING', 'HAIR CURLING', '0', null, 'minor');
INSERT INTO `service_info` VALUES ('105', '11', '38', 'default/default.png', 'EYELASH', 'EYELASH', '0', null, 'minor');
INSERT INTO `service_info` VALUES ('106', '11', '38', 'default/default.png', 'PERMING', 'PERMING', '0', null, 'minor');
INSERT INTO `service_info` VALUES ('107', '11', '38', 'default/default.png', 'EXTENTION', 'EXTENTION', '0', null, 'minor');

-- ----------------------------
-- Table structure for service_package
-- ----------------------------
DROP TABLE IF EXISTS `service_package`;
CREATE TABLE `service_package` (
  `sp_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) DEFAULT NULL,
  `service_info_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`sp_id`),
  KEY `p_id` (`p_id`),
  KEY `service_info_id` (`service_info_id`),
  CONSTRAINT `service_package_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `package` (`p_id`),
  CONSTRAINT `service_package_ibfk_2` FOREIGN KEY (`service_info_id`) REFERENCES `service_info` (`service_info_id`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of service_package
-- ----------------------------
INSERT INTO `service_package` VALUES ('60', '29', '90');
INSERT INTO `service_package` VALUES ('61', '29', '81');
INSERT INTO `service_package` VALUES ('62', '29', '80');
INSERT INTO `service_package` VALUES ('63', '30', '90');
INSERT INTO `service_package` VALUES ('64', '30', '81');
INSERT INTO `service_package` VALUES ('65', '30', '80');
INSERT INTO `service_package` VALUES ('66', '31', '92');
INSERT INTO `service_package` VALUES ('67', '31', '91');
INSERT INTO `service_package` VALUES ('68', '31', '90');
INSERT INTO `service_package` VALUES ('69', '31', '83');
INSERT INTO `service_package` VALUES ('70', '31', '80');
INSERT INTO `service_package` VALUES ('71', '32', '92');
INSERT INTO `service_package` VALUES ('72', '32', '91');
INSERT INTO `service_package` VALUES ('73', '32', '90');
INSERT INTO `service_package` VALUES ('74', '32', '85');
INSERT INTO `service_package` VALUES ('75', '32', '80');
INSERT INTO `service_package` VALUES ('76', '33', '92');
INSERT INTO `service_package` VALUES ('77', '33', '91');
INSERT INTO `service_package` VALUES ('78', '33', '81');
INSERT INTO `service_package` VALUES ('79', '33', '80');
INSERT INTO `service_package` VALUES ('80', '34', '92');
INSERT INTO `service_package` VALUES ('81', '34', '91');
INSERT INTO `service_package` VALUES ('82', '34', '82');
INSERT INTO `service_package` VALUES ('83', '34', '80');
INSERT INTO `service_package` VALUES ('84', '35', '92');
INSERT INTO `service_package` VALUES ('85', '35', '91');
INSERT INTO `service_package` VALUES ('86', '35', '83');
INSERT INTO `service_package` VALUES ('87', '35', '80');
INSERT INTO `service_package` VALUES ('88', '36', '92');
INSERT INTO `service_package` VALUES ('89', '36', '91');
INSERT INTO `service_package` VALUES ('90', '36', '85');
INSERT INTO `service_package` VALUES ('91', '36', '80');
INSERT INTO `service_package` VALUES ('92', '37', '93');
INSERT INTO `service_package` VALUES ('93', '37', '92');
INSERT INTO `service_package` VALUES ('94', '37', '91');
INSERT INTO `service_package` VALUES ('95', '37', '80');
INSERT INTO `service_package` VALUES ('96', '38', '93');
INSERT INTO `service_package` VALUES ('97', '38', '92');
INSERT INTO `service_package` VALUES ('98', '38', '91');
INSERT INTO `service_package` VALUES ('99', '38', '80');
INSERT INTO `service_package` VALUES ('100', '39', '93');
INSERT INTO `service_package` VALUES ('101', '39', '92');
INSERT INTO `service_package` VALUES ('102', '39', '91');
INSERT INTO `service_package` VALUES ('103', '39', '80');
INSERT INTO `service_package` VALUES ('104', '40', '93');
INSERT INTO `service_package` VALUES ('105', '40', '92');
INSERT INTO `service_package` VALUES ('106', '40', '91');
INSERT INTO `service_package` VALUES ('107', '40', '80');
INSERT INTO `service_package` VALUES ('108', '41', '103');
INSERT INTO `service_package` VALUES ('109', '41', '96');
INSERT INTO `service_package` VALUES ('110', '41', '92');
INSERT INTO `service_package` VALUES ('111', '41', '91');
INSERT INTO `service_package` VALUES ('112', '41', '90');
INSERT INTO `service_package` VALUES ('113', '42', '103');
INSERT INTO `service_package` VALUES ('114', '42', '96');
INSERT INTO `service_package` VALUES ('115', '42', '92');
INSERT INTO `service_package` VALUES ('116', '42', '91');
INSERT INTO `service_package` VALUES ('117', '42', '90');
INSERT INTO `service_package` VALUES ('118', '43', '103');
INSERT INTO `service_package` VALUES ('119', '43', '96');
INSERT INTO `service_package` VALUES ('120', '43', '92');
INSERT INTO `service_package` VALUES ('121', '43', '91');
INSERT INTO `service_package` VALUES ('122', '43', '90');
INSERT INTO `service_package` VALUES ('123', '44', '103');
INSERT INTO `service_package` VALUES ('124', '44', '96');
INSERT INTO `service_package` VALUES ('125', '44', '92');
INSERT INTO `service_package` VALUES ('126', '44', '91');
INSERT INTO `service_package` VALUES ('127', '44', '90');
INSERT INTO `service_package` VALUES ('128', '45', '103');
INSERT INTO `service_package` VALUES ('129', '45', '96');
INSERT INTO `service_package` VALUES ('130', '45', '92');
INSERT INTO `service_package` VALUES ('131', '45', '91');
INSERT INTO `service_package` VALUES ('132', '45', '90');
INSERT INTO `service_package` VALUES ('133', '46', '102');
INSERT INTO `service_package` VALUES ('134', '46', '101');
INSERT INTO `service_package` VALUES ('135', '46', '100');
INSERT INTO `service_package` VALUES ('136', '46', '99');
INSERT INTO `service_package` VALUES ('137', '47', '85');
INSERT INTO `service_package` VALUES ('138', '48', '94');
INSERT INTO `service_package` VALUES ('139', '49', '94');
INSERT INTO `service_package` VALUES ('140', '50', '94');
INSERT INTO `service_package` VALUES ('141', '51', '94');
INSERT INTO `service_package` VALUES ('142', '52', '94');
INSERT INTO `service_package` VALUES ('143', '53', '90');
INSERT INTO `service_package` VALUES ('144', '54', '90');
INSERT INTO `service_package` VALUES ('145', '55', '90');
INSERT INTO `service_package` VALUES ('146', '56', '90');

-- ----------------------------
-- Table structure for service_redeem
-- ----------------------------
DROP TABLE IF EXISTS `service_redeem`;
CREATE TABLE `service_redeem` (
  `sr_id` int(11) NOT NULL AUTO_INCREMENT,
  `ch_id` int(11) DEFAULT NULL,
  `service_info_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `acc_id` int(11) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `vat` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`sr_id`),
  KEY `ch_id` (`ch_id`),
  KEY `service_info_id` (`service_info_id`),
  KEY `acc_id` (`acc_id`),
  CONSTRAINT `service_redeem_ibfk_1` FOREIGN KEY (`ch_id`) REFERENCES `card_holder` (`ch_id`),
  CONSTRAINT `service_redeem_ibfk_2` FOREIGN KEY (`service_info_id`) REFERENCES `service_info` (`service_info_id`),
  CONSTRAINT `service_redeem_ibfk_3` FOREIGN KEY (`acc_id`) REFERENCES `account` (`acc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of service_redeem
-- ----------------------------

-- ----------------------------
-- Table structure for service_reservation
-- ----------------------------
DROP TABLE IF EXISTS `service_reservation`;
CREATE TABLE `service_reservation` (
  `res_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_info_id` int(11) DEFAULT NULL,
  `cus_id` int(11) DEFAULT NULL,
  `res_date` varchar(255) DEFAULT NULL,
  `res_time` varchar(255) DEFAULT NULL,
  `date_reserved` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`res_id`),
  KEY `service_reservation_ibfk_1` (`cus_id`),
  KEY `service_reservation_ibfk_2` (`service_info_id`),
  CONSTRAINT `service_reservation_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `customer_info` (`cus_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `service_reservation_ibfk_2` FOREIGN KEY (`service_info_id`) REFERENCES `service_info` (`service_info_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of service_reservation
-- ----------------------------

-- ----------------------------
-- Table structure for service_temp
-- ----------------------------
DROP TABLE IF EXISTS `service_temp`;
CREATE TABLE `service_temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `price` varchar(255) DEFAULT NULL,
  `vat` varchar(255) DEFAULT NULL,
  `service_info_id` int(11) DEFAULT NULL,
  `acc_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `last_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `discount` double(255,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of service_temp
-- ----------------------------

-- ----------------------------
-- Table structure for service_type
-- ----------------------------
DROP TABLE IF EXISTS `service_type`;
CREATE TABLE `service_type` (
  `service_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_type` varchar(50) DEFAULT NULL,
  `service_type_image` varchar(100) DEFAULT NULL,
  `service_type_desc` text,
  PRIMARY KEY (`service_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of service_type
-- ----------------------------
INSERT INTO `service_type` VALUES ('1', 'Facial Services', 'service_type/968704280f451f8aea3afb4ae2e9cb85.jpg', 'Custom facials can address a variety of needs ranging from premature aging and environmental damage to acne flare-ups to a dull and patchy complexion. Custom facials use products and techniques precisely fit your skincare concerns. Custom facials can address a variety of needs ranging from premature aging and environmental damage to acne flare-ups to a dull and patchy complexion. When it comes to our skin, sometimes it’s tough to face the facts. If your less-than-perfect complexion is causing you stress and could use a pick-me-up, you may want to consider booking a custom facial at your favorite spa.1');
INSERT INTO `service_type` VALUES ('2', 'Hair Services', 'service_type/cf932cd797f84e07eb5f9da0dde43549.jpg', 'For Permanently smoothed, curled or waved hair. Shape control provides an alternative for achieving permanently smooth, curled or waved results. Utilizing advanced haircare technology combined with a breakthrough texture system you can safely change the texture of your hair with or without the use of heat! All three Reducers have a rich, creamy texture and are fortified with cationic conditioners to provide softness and shine, smoothing waxes for frizz taming and detangling, and dithioglycolic acid to minimize the risk of breakage. Please contact Maude’s hostess for a complimentary consultation on which formula would be right for you');
INSERT INTO `service_type` VALUES ('3', 'Nail Services', 'service_type/af6f9dcb1e93747794f877827eddbe7f.jpg', 'Our spa manicure and pedicure services soothe with a warm neck pillow. Skin exfoliation and a hydrating massage are extended to the elbow for manicures and to the knee for pedicures, which also include a customized foot bath with essential oil. A paraffin treatment seals in moisture for softer hands and feet. Nails are polished to perfection with our luxury nail care services.');
INSERT INTO `service_type` VALUES ('10', 'Foot Services', null, 'Foot Services');
INSERT INTO `service_type` VALUES ('11', 'OTHERS', null, 'OTHERS');
INSERT INTO `service_type` VALUES ('12', 'WAXING AND THREADING', null, 'WAX AND THREAD');

-- ----------------------------
-- Table structure for size
-- ----------------------------
DROP TABLE IF EXISTS `size`;
CREATE TABLE `size` (
  `prod_size_id` int(11) NOT NULL AUTO_INCREMENT,
  `size_type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`prod_size_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of size
-- ----------------------------
INSERT INTO `size` VALUES ('10', 'Extra Large');
INSERT INTO `size` VALUES ('11', 'Double Extra Large');
INSERT INTO `size` VALUES ('12', 'Extra Small');
INSERT INTO `size` VALUES ('13', 'ML');

-- ----------------------------
-- Table structure for stock_history_type
-- ----------------------------
DROP TABLE IF EXISTS `stock_history_type`;
CREATE TABLE `stock_history_type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of stock_history_type
-- ----------------------------
INSERT INTO `stock_history_type` VALUES ('1', 'New');
INSERT INTO `stock_history_type` VALUES ('2', 'pull out');
INSERT INTO `stock_history_type` VALUES ('3', 'Damaged');
INSERT INTO `stock_history_type` VALUES ('4', 'Wasted');
INSERT INTO `stock_history_type` VALUES ('5', 'Back Ordered');
INSERT INTO `stock_history_type` VALUES ('6', 'Sold');

-- ----------------------------
-- Table structure for stock_in
-- ----------------------------
DROP TABLE IF EXISTS `stock_in`;
CREATE TABLE `stock_in` (
  `stock_in_id` int(11) NOT NULL AUTO_INCREMENT,
  `bc_id` int(11) NOT NULL,
  `quantity` int(40) DEFAULT NULL,
  PRIMARY KEY (`stock_in_id`),
  KEY `barcode_stock_in` (`bc_id`),
  CONSTRAINT `barcode_stock_in` FOREIGN KEY (`bc_id`) REFERENCES `barcode` (`bc_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of stock_in
-- ----------------------------
INSERT INTO `stock_in` VALUES ('1', '1', '100');
INSERT INTO `stock_in` VALUES ('2', '2', '100');
INSERT INTO `stock_in` VALUES ('3', '3', '1');

-- ----------------------------
-- Table structure for stock_in_history
-- ----------------------------
DROP TABLE IF EXISTS `stock_in_history`;
CREATE TABLE `stock_in_history` (
  `stock_in_hist_id` int(11) NOT NULL AUTO_INCREMENT,
  `time_in` varchar(40) DEFAULT NULL,
  `date_in` varchar(40) DEFAULT NULL,
  `quantity` varchar(40) DEFAULT NULL,
  `bc_id` int(11) NOT NULL,
  `type_id` int(40) DEFAULT NULL,
  `acc_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`stock_in_hist_id`),
  KEY `barcode_stock_in_history` (`bc_id`),
  KEY `type_stock_in_history` (`type_id`),
  KEY `acc_id` (`acc_id`),
  CONSTRAINT `barcode_stock_in_history` FOREIGN KEY (`bc_id`) REFERENCES `barcode` (`bc_id`) ON DELETE CASCADE,
  CONSTRAINT `stock_in_history_ibfk_1` FOREIGN KEY (`acc_id`) REFERENCES `account` (`acc_id`),
  CONSTRAINT `type_stock_in_history` FOREIGN KEY (`type_id`) REFERENCES `stock_history_type` (`type_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of stock_in_history
-- ----------------------------
INSERT INTO `stock_in_history` VALUES ('1', '02:20:17 PM', '2018-01-24', '100', '1', '1', '32');
INSERT INTO `stock_in_history` VALUES ('2', '10:10:15 AM', '2018-02-06', '100', '2', '1', '32');
INSERT INTO `stock_in_history` VALUES ('3', '10:18:21 AM', '2018-02-06', '1', '3', '1', '32');

-- ----------------------------
-- Table structure for stock_out
-- ----------------------------
DROP TABLE IF EXISTS `stock_out`;
CREATE TABLE `stock_out` (
  `stock_out_id` int(11) NOT NULL AUTO_INCREMENT,
  `bc_id` int(11) NOT NULL,
  `quantity` varchar(40) DEFAULT NULL,
  `acc_id` int(11) DEFAULT NULL,
  `trans_code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`stock_out_id`),
  KEY `barcode_stock_out` (`bc_id`),
  KEY `acc_id` (`acc_id`),
  CONSTRAINT `barcode_stock_out` FOREIGN KEY (`bc_id`) REFERENCES `barcode` (`bc_id`) ON DELETE CASCADE,
  CONSTRAINT `stock_out_ibfk_1` FOREIGN KEY (`acc_id`) REFERENCES `account` (`acc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of stock_out
-- ----------------------------

-- ----------------------------
-- Table structure for stock_out_history
-- ----------------------------
DROP TABLE IF EXISTS `stock_out_history`;
CREATE TABLE `stock_out_history` (
  `stock_out_hist_id` int(11) NOT NULL AUTO_INCREMENT,
  `time_out` varchar(40) DEFAULT NULL,
  `date_out` varchar(40) DEFAULT NULL,
  `quantity` varchar(40) DEFAULT NULL,
  `bc_id` int(11) NOT NULL,
  `tc_id` int(11) NOT NULL,
  `type_id` int(40) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `mark_up` decimal(10,2) DEFAULT NULL,
  `vat` varchar(255) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`stock_out_hist_id`),
  KEY `barcode_stock_out_history` (`bc_id`),
  KEY `type_stock_out_history` (`type_id`),
  KEY `tc_id` (`tc_id`),
  CONSTRAINT `barcode_stock_out_history` FOREIGN KEY (`bc_id`) REFERENCES `barcode` (`bc_id`) ON DELETE CASCADE,
  CONSTRAINT `stock_out_history_ibfk_1` FOREIGN KEY (`tc_id`) REFERENCES `trans_code` (`tc_id`),
  CONSTRAINT `type_stock_out_history` FOREIGN KEY (`type_id`) REFERENCES `stock_history_type` (`type_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of stock_out_history
-- ----------------------------

-- ----------------------------
-- Table structure for system_access
-- ----------------------------
DROP TABLE IF EXISTS `system_access`;
CREATE TABLE `system_access` (
  `sa_id` int(11) NOT NULL AUTO_INCREMENT,
  `access` varchar(40) DEFAULT NULL,
  `acc_id` int(11) NOT NULL,
  PRIMARY KEY (`sa_id`),
  KEY `acc_id` (`acc_id`),
  CONSTRAINT `system_access_ibfk_1` FOREIGN KEY (`acc_id`) REFERENCES `account` (`acc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of system_access
-- ----------------------------

-- ----------------------------
-- Table structure for table_info
-- ----------------------------
DROP TABLE IF EXISTS `table_info`;
CREATE TABLE `table_info` (
  `table_info_id` int(11) NOT NULL AUTO_INCREMENT,
  `table_type` varchar(40) DEFAULT NULL,
  `table_name` varchar(50) DEFAULT NULL,
  `table_class` varchar(40) DEFAULT NULL,
  `table_capacity` varchar(40) DEFAULT NULL,
  `table_desc` text,
  `table_image` text,
  `on_delete` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`table_info_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of table_info
-- ----------------------------

-- ----------------------------
-- Table structure for table_reservation
-- ----------------------------
DROP TABLE IF EXISTS `table_reservation`;
CREATE TABLE `table_reservation` (
  `res_id` int(11) NOT NULL AUTO_INCREMENT,
  `cus_id` int(11) DEFAULT NULL,
  `table_info_id` int(11) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `res_date` varchar(255) DEFAULT NULL,
  `res_from_time` varchar(255) DEFAULT NULL,
  `res_until_time` varchar(255) DEFAULT NULL,
  `no_of_person` int(11) DEFAULT NULL,
  PRIMARY KEY (`res_id`),
  KEY `cus_id` (`cus_id`),
  CONSTRAINT `table_reservation_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `customer_info` (`cus_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of table_reservation
-- ----------------------------

-- ----------------------------
-- Table structure for temp_artist_package
-- ----------------------------
DROP TABLE IF EXISTS `temp_artist_package`;
CREATE TABLE `temp_artist_package` (
  `ar_package_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ar_package_id`),
  KEY `id` (`id`),
  CONSTRAINT `temp_artist_package_ibfk_1` FOREIGN KEY (`id`) REFERENCES `package_temp` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of temp_artist_package
-- ----------------------------

-- ----------------------------
-- Table structure for temp_table
-- ----------------------------
DROP TABLE IF EXISTS `temp_table`;
CREATE TABLE `temp_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bc_id` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `price` double(255,2) DEFAULT NULL,
  `acc_id` int(11) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `mark_up` double(11,2) DEFAULT NULL,
  `vat` double(11,2) DEFAULT NULL,
  `last_update` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `acc_id` (`acc_id`),
  CONSTRAINT `temp_table_ibfk_1` FOREIGN KEY (`acc_id`) REFERENCES `account` (`acc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of temp_table
-- ----------------------------

-- ----------------------------
-- Table structure for tour_information
-- ----------------------------
DROP TABLE IF EXISTS `tour_information`;
CREATE TABLE `tour_information` (
  `tour_info` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(40) DEFAULT NULL,
  `trav_capacity` varchar(40) DEFAULT NULL,
  `days_duration` varchar(40) DEFAULT NULL,
  `details` text,
  `on_delete` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`tour_info`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tour_information
-- ----------------------------

-- ----------------------------
-- Table structure for trans_code
-- ----------------------------
DROP TABLE IF EXISTS `trans_code`;
CREATE TABLE `trans_code` (
  `tc_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_code` varchar(220) DEFAULT NULL,
  `t_date` date DEFAULT NULL,
  `t_time` time DEFAULT NULL,
  `acc_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`tc_id`),
  KEY `acc_id` (`acc_id`),
  CONSTRAINT `trans_code_ibfk_1` FOREIGN KEY (`acc_id`) REFERENCES `account` (`acc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=232 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of trans_code
-- ----------------------------
INSERT INTO `trans_code` VALUES ('230', '000001', '2017-03-01', '03:25:33', '32');
INSERT INTO `trans_code` VALUES ('231', '000002', '2017-03-01', '03:30:14', '32');

-- ----------------------------
-- Table structure for user_accessibility_option
-- ----------------------------
DROP TABLE IF EXISTS `user_accessibility_option`;
CREATE TABLE `user_accessibility_option` (
  `uao_id` int(11) NOT NULL AUTO_INCREMENT,
  `am_id` int(11) DEFAULT NULL,
  `acc_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`uao_id`),
  KEY `am_id` (`am_id`),
  KEY `acc_id` (`acc_id`),
  CONSTRAINT `user_accessibility_option_ibfk_1` FOREIGN KEY (`am_id`) REFERENCES `access_menu` (`am_id`)
) ENGINE=InnoDB AUTO_INCREMENT=582 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_accessibility_option
-- ----------------------------
INSERT INTO `user_accessibility_option` VALUES ('576', '2', '32');
INSERT INTO `user_accessibility_option` VALUES ('577', '3', '32');
INSERT INTO `user_accessibility_option` VALUES ('578', '8', '32');
INSERT INTO `user_accessibility_option` VALUES ('579', '9', '32');
INSERT INTO `user_accessibility_option` VALUES ('580', '10', '32');
INSERT INTO `user_accessibility_option` VALUES ('581', '1', '32');

-- ----------------------------
-- Table structure for web_module_list
-- ----------------------------
DROP TABLE IF EXISTS `web_module_list`;
CREATE TABLE `web_module_list` (
  `wml_id` int(11) NOT NULL DEFAULT '0',
  `wml_title` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`wml_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of web_module_list
-- ----------------------------

-- ----------------------------
-- Table structure for weight_unit
-- ----------------------------
DROP TABLE IF EXISTS `weight_unit`;
CREATE TABLE `weight_unit` (
  `prod_wu_id` int(11) NOT NULL AUTO_INCREMENT,
  `unit` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`prod_wu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of weight_unit
-- ----------------------------
INSERT INTO `weight_unit` VALUES ('1', '3');
INSERT INTO `weight_unit` VALUES ('2', '1');
INSERT INTO `weight_unit` VALUES ('3', '1');
INSERT INTO `weight_unit` VALUES ('4', '1');
INSERT INTO `weight_unit` VALUES ('5', 'oz');
INSERT INTO `weight_unit` VALUES ('6', 'K');
INSERT INTO `weight_unit` VALUES ('7', 'Kilo');
INSERT INTO `weight_unit` VALUES ('8', '1');
INSERT INTO `weight_unit` VALUES ('9', 'Pounds');
INSERT INTO `weight_unit` VALUES ('10', 'Ml');
INSERT INTO `weight_unit` VALUES ('11', 'G');
