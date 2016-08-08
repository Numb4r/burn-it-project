/*
Navicat MariaDB Data Transfer

Source Server         : Amazon
Source Server Version : 100113
Source Host           : arosni.ddns.net:3306
Source Database       : burnit

Target Server Type    : MariaDB
Target Server Version : 100113
File Encoding         : 65001

Date: 2016-08-07 22:17:30
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` text CHARACTER SET latin1 NOT NULL,
  `Description` text CHARACTER SET latin1 NOT NULL,
  `User` text CHARACTER SET latin1 NOT NULL,
  `Tags` text CHARACTER SET latin1 NOT NULL,
  `Date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES ('17', 'AOKDAOSKDOAKO', 'EQWASDasdasd', '6d7e7b71-51de-11e6-99d5-02b5780b768f', 'LEWqwe', '2016-07-24 05:42:13');
INSERT INTO `posts` VALUES ('18', 'dasdad', 'dadadadadadadadadadada', '574c228d-51e2-11e6-99d5-02b5780b768f', 'asdadadadad', '2016-07-24 06:10:15');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UID` text NOT NULL,
  `Password` text CHARACTER SET latin1 NOT NULL,
  `Email` text CHARACTER SET latin1 NOT NULL,
  `Realname` text CHARACTER SET latin1 NOT NULL,
  `Date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `Description` text NOT NULL,
  `vKey` text CHARACTER SET latin1 NOT NULL,
  `vBool` tinyint(1) NOT NULL,
  `Image` varchar(255) CHARACTER SET latin1 DEFAULT '../imgs/phoenix.png',
  `Theme` varchar(255) NOT NULL DEFAULT 'white',
  `Level` int(20) NOT NULL DEFAULT '0',
  `Badges` text,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('31', '6d7e7b71-51de-11e6-99d5-02b5780b768f', '6f1cb4111e4b03776abaa23c01b41e18', 'juninhowblu@gmail.com', 'Marcos Maia', '2016-07-27 23:17:09', 'Fica queto aí em', '65445sd', '1', '../imgs/avatars/6d7e7b71-51de-11e6-99d5-02b5780b768f/avatar.jpg', 'white', '99', '[{\"Class\":\"linux\",\"Color\":\"black\",\"Description\":\"Usuario de Linux\"}]');
INSERT INTO `users` VALUES ('32', '574c228d-51e2-11e6-99d5-02b5780b768f', 'e10adc3949ba59abbe56e057f20f883e', 'yuridimitre@hotmail.com', 'Yuri', '2016-07-27 23:17:12', 'Penes', '7b7b4396c08c9e4a74dc3b6a8ea83ec5257c', '1', '../imgs/avatars/574c228d-51e2-11e6-99d5-02b5780b768f/avatar.jpg', 'white', '99', '[{\"Class\":\"linux\",\"Color\":\"black\",\"Description\":\"Usuario de Linux\"}]');
INSERT INTO `users` VALUES ('33', '429f7b9b-52d2-11e6-99d5-02b5780b768f', '18d8c3171f231055859b337810a2f7fb', 'sousajunior.alves@gmail.com', 'Joao', '2016-07-26 01:42:49', '', '1c51d6c4a9be33a47773c2ff1453c234599d', '0', '../imgs/phoenix.png', 'white', '0', null);
INSERT INTO `users` VALUES ('34', 'ccd60c38-52f2-11e6-99d5-02b5780b768f', 'e10adc3949ba59abbe56e057f20f883e', 'sousajunior.alves@hotmail.com', 'JoÃ£o Alves', '2016-07-26 05:35:45', '', '910cf3cc0dfb609b32760a24cabfab3dc808', '0', '../imgs/phoenix.png', 'white', '0', null);
INSERT INTO `users` VALUES ('35', '510935ff-57de-11e6-99d5-02b5780b768f', '6f3ff1942e5401c09f436c847b5d3121', 'pedro-pio@bol.com.br', 'Pedro Pio', '2016-08-01 11:54:08', '', '9e468e8059fae5ed69c8148d3b62ce69bdb5', '1', '../imgs/phoenix.png', 'white', '0', null);
INSERT INTO `users` VALUES ('36', '2c19975c-57ec-11e6-99d5-02b5780b768f', '68e723f09b0709cf6d7c2c75512cd516', 'bob_quadrante@htmail.com', 'Pipo', '2016-08-01 13:30:54', '', 'd5c142a8c509d85a6624423eff1e039c6ef3', '0', '../imgs/phoenix.png', 'white', '0', null);
INSERT INTO `users` VALUES ('37', '6b282249-5912-11e6-99d5-02b5780b768f', 'e10adc3949ba59abbe56e057f20f883e', 'puntaquite@live.com', 'Fake', '2016-08-03 00:37:12', '', 'f6b577c5dbc525c34eab6392051272f55c14', '0', '../imgs/phoenix.png', 'white', '0', null);
INSERT INTO `users` VALUES ('38', '6da93512-5b05-11e6-99d5-02b5780b768f', 'e10adc3949ba59abbe56e057f20f883e', 'joaocartola16@outlook.com', 'JoÃ£o', '2016-08-05 12:10:52', '', 'f4f1acfd33f8c15baf706b416889ba17d44f', '1', '../imgs/phoenix.png', 'white', '0', null);
INSERT INTO `users` VALUES ('39', '1ae9f5ba-5b70-11e6-8471-02b5780b768f', '11f9a89c5b3ffcae99966ac397e9e03f', 'murillo.camargolopes@hotmail.com', 'chapu', '2016-08-06 00:52:52', '', 'd536f90cf5a529cb2d4efe77f10acccd6d9d', '0', '../imgs/phoenix.png', 'white', '0', null);
INSERT INTO `users` VALUES ('40', '72562347-5b73-11e6-8471-02b5780b768f', 'e2283dec75ab1901742212efcb01c980', 'ildemarleonardo@bol.com.br', 'Leonardo ', '2016-08-06 01:16:47', '', '7658f19ce263bae7eb0fbed4815d2513dd03', '0', '../imgs/phoenix.png', 'white', '0', null);
DROP TRIGGER IF EXISTS `UIDGen`;
DELIMITER ;;
CREATE TRIGGER `UIDGen` BEFORE INSERT ON `users` FOR EACH ROW BEGIN
  SET new.UID = UUID();
  SET new.Date = NOW();
  SET new.vKey  =  SUBSTR(CONCAT(MD5(RAND()),MD5(RAND())),1,36);
END
;;
DELIMITER ;
