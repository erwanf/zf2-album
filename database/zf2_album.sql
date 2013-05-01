/*
SQLyog Enterprise - MySQL GUI v8.12 
MySQL - 5.5.13 : Database - zf2_tutorial
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`zf2_tutorial` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `zf2_tutorial`;

/*Table structure for table `album` */

DROP TABLE IF EXISTS `album`;

CREATE TABLE `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `artist` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `album` */

insert  into `album`(`id`,`title`,`artist`) values (1,'muhabat','chena'),(2,'Punjab K shery','Arif'),(3,'Jawani','Ali'),(4,'Roog','Nasir'),(5,'Title test','Artist test'),(6,'Title test','Artist test'),(7,'Title test','Artist test'),(8,'Title test new','Artist test');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`id`,`name`,`email`,`password`) values (1,'sohail','sohail@gmail.com',NULL),(2,'Muhammad','muhammad@yahoo.com',NULL),(3,'zubair','zubair@hotmail.com','123456'),(4,'123','123','123');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
