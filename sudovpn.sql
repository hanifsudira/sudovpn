/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 5.5.49-0ubuntu0.14.04.1 : Database - sudovpn
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sudovpn` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `sudovpn`;

/*Table structure for table `list_packet` */

DROP TABLE IF EXISTS `list_packet`;

CREATE TABLE `list_packet` (
  `id_list` int(4) NOT NULL AUTO_INCREMENT,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `stop_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_user` int(4) DEFAULT NULL,
  `id_packet` int(4) DEFAULT NULL,
  PRIMARY KEY (`id_list`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `list_packet` */

/*Table structure for table `packet` */

DROP TABLE IF EXISTS `packet`;

CREATE TABLE `packet` (
  `id_packet` int(4) NOT NULL AUTO_INCREMENT,
  `packet_name` varchar(20) DEFAULT NULL,
  `max` int(2) DEFAULT NULL,
  `bandwidth` int(3) DEFAULT NULL,
  `parenting` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_packet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `packet` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int(4) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text,
  `status` int(1) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id_user`,`email`,`password`,`fullname`,`phone`,`address`,`status`,`time`) values (1,'hanumuslem@gmail.com','89a9a878f28ce610e5e8d804d53de632','Burhanudin Rasyid','085790288545','Keputih Gg 3E, No 37 A',1,'2016-05-09 12:01:23');

/*Table structure for table `vpn` */

DROP TABLE IF EXISTS `vpn`;

CREATE TABLE `vpn` (
  `id_vpn` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `id_list` int(4) DEFAULT NULL,
  PRIMARY KEY (`id_vpn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `vpn` */

/* Procedure structure for procedure `SP_ListAllUser` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_ListAllUser` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ListAllUser`()
BEGIN
	SELECT * FROM `user` ORDER BY id_user DESC;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_Login` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_Login` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Login`(_email VARCHAR(50),_password VARCHAR(100))
BEGIN
		SELECT id_user FROM `user` WHERE email=_email AND `password`=MD5(_password);
    END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_Register` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_Register` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Register`(_fullname VARCHAR(100), _email VARCHAR(100),_phone varchar(20), _address text,_password VARCHAR(100))
BEGIN
	INSERT INTO `user` (fullname,email,phone,address,`password`,`status`,`time`) VALUES (_fullname, _email, _phone,_address,MD5(_password),1,now());
    END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
