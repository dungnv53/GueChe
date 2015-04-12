-- MySQL dump 10.13  Distrib 5.5.34, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: goiche
-- ------------------------------------------------------
-- Server version	5.5.34-0ubuntu0.12.04.1-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Món ăn','2014-09-26 05:11:07','2014-09-26 05:11:07'),(2,'Sữa chua','2014-09-26 05:11:07','2014-09-26 05:11:07'),(3,'Chè','2014-09-26 05:11:07','2014-09-26 05:11:07'),(4,'Nước ép','2014-09-26 05:11:07','2014-09-26 05:11:07'),(5,'Sinh tố','2014-09-26 05:11:07','2014-09-26 05:11:07'),(6,'Hoa quả ','2014-09-26 05:11:07','2014-09-26 05:11:07');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_09_25_180007_create_categories_table',1),('2014_09_25_180007_create_order_session_table',1),('2014_09_25_180007_create_orders_table',1),('2014_09_25_180007_create_product_order_table',1),('2014_09_25_180007_create_products_table',1),('2014_09_25_180007_create_roles_table',1),('2014_09_25_180007_create_users_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_session`
--

DROP TABLE IF EXISTS `order_session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_session` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `start` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_session`
--

LOCK TABLES `order_session` WRITE;
/*!40000 ALTER TABLE `order_session` DISABLE KEYS */;
INSERT INTO `order_session` VALUES (1,'2014-10-01 17:00:00','2014-10-01 19:51:12','2014-10-02 00:00:00','2014-10-01 17:37:55','2014-10-01 17:54:14'),(2,'2015-02-25 17:00:00','2015-02-26 15:35:59','2015-02-25 17:36:59','2015-02-26 16:36:31','2015-02-26 16:37:05'),(3,'2015-03-25 17:00:00','2015-03-26 09:45:42','2015-03-26 10:45:42','2015-03-26 09:45:58','2015-03-26 09:45:58');
/*!40000 ALTER TABLE `order_session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `orderSession_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (11,34,0,0,1,'2014-09-28 06:34:41','2015-02-26 16:37:42'),(12,2,0,0,1,'2014-09-28 08:34:14','2014-10-01 18:13:11'),(13,15,0,0,1,'2014-09-29 11:34:05','2014-09-29 17:10:14'),(14,9,0,0,1,'2014-09-29 11:56:47','2014-09-30 00:19:24'),(15,21,0,0,1,'2014-09-29 16:39:11','2014-09-29 17:10:14'),(16,8,0,0,1,'2014-09-29 17:46:44','2014-09-29 17:46:44'),(18,0,0,0,1,'2014-09-29 19:43:09','2014-10-01 18:41:04'),(19,5,0,0,1,'2014-09-29 22:47:11','2014-09-29 23:42:16'),(20,12,0,0,1,'2014-10-01 18:08:34','2014-10-01 18:08:34'),(21,0,0,0,1,'2014-10-01 18:41:48','2014-10-01 18:41:48'),(22,20,0,0,1,'2014-10-01 18:49:00','2015-03-26 09:48:22'),(23,7,0,0,1,'2014-10-01 18:49:10','2014-10-01 18:53:56');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_order`
--

DROP TABLE IF EXISTS `product_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_order`
--

LOCK TABLES `product_order` WRITE;
/*!40000 ALTER TABLE `product_order` DISABLE KEYS */;
INSERT INTO `product_order` VALUES (29,25,13,1,'2014-09-29 11:34:05','2014-09-29 17:06:51'),(32,25,15,2,'2014-09-29 16:39:11','2014-09-29 17:06:51'),(33,27,16,1,'2014-09-29 17:46:44','2014-09-29 17:46:44'),(34,24,16,1,'2014-09-29 17:46:44','2014-09-29 17:46:44'),(35,24,17,1,'2014-09-29 19:36:12','2014-09-29 19:36:12'),(43,35,19,1,'2014-09-29 23:42:16','2014-09-29 23:42:16'),(48,48,14,1,'2014-09-30 00:19:24','2014-09-30 00:19:24'),(49,22,14,2,'2014-09-30 00:19:24','2014-09-30 00:19:24'),(62,1,20,1,'2014-10-01 18:08:34','2014-10-01 18:08:34'),(65,1,12,1,'2014-10-01 18:13:11','2014-10-01 18:13:11'),(66,35,12,1,'2014-10-01 18:13:12','2014-10-01 18:13:12'),(79,28,18,1,'2014-10-01 18:41:04','2014-10-01 18:41:04'),(80,28,18,1,'2014-10-01 18:41:48','2014-10-01 18:41:48'),(83,46,23,1,'2014-10-01 18:53:56','2014-10-01 18:53:56'),(84,48,23,1,'2014-10-01 18:53:56','2014-10-01 18:53:56'),(85,1,11,2,'2015-02-26 16:37:42','2015-02-26 16:37:42'),(86,35,11,1,'2015-02-26 16:37:42','2015-02-26 16:37:42'),(87,25,22,1,'2015-03-26 09:48:22','2015-03-26 09:48:22');
/*!40000 ALTER TABLE `product_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cat_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Bánh bột lọc',3500,'cai',1,'2014-09-26 05:11:05','2014-09-26 05:11:05'),(2,'Bánh rán ngọt',5000,'cai',1,'2014-09-26 05:11:05','2014-09-26 05:11:05'),(3,'Bánh tẻ',6000,'cai',1,'2014-09-26 05:11:05','2014-09-26 05:11:05'),(4,'Bánh rán mặn',5000,'cai',1,'2014-09-26 05:11:05','2014-09-26 05:11:05'),(5,'Phỏ cuốn',6000,'cai',1,'2014-09-26 05:11:05','2014-09-26 05:11:05'),(6,'Nem chua rán',5000,'cai',1,'2014-09-26 05:11:05','2014-09-26 05:11:05'),(7,'Nem chua nướng',5000,'cai',1,'2014-09-26 05:11:05','2014-09-26 05:11:05'),(8,'Nem cuốn tôm thịt',7000,'cai',1,'2014-09-26 05:11:05','2014-09-26 05:11:05'),(9,'Nem lụi',7000,'cai',1,'2014-09-26 05:11:05','2014-09-26 05:11:05'),(10,'Thịt xiên nướng',7000,'xiên',1,'2014-09-26 05:11:05','2014-09-26 05:11:05'),(11,'Xúc xích Đức Việt',12000,'cai',1,'2014-09-26 05:11:05','2014-09-26 05:11:05'),(12,'Nem cuốn',6000,'cai',1,'2014-09-26 05:11:05','2014-09-26 05:11:05'),(13,'Bánh gối',10000,'cai',1,'2014-09-26 05:11:05','2014-09-26 05:11:05'),(14,'Khoai môn lệ phố',20000,'suất',1,'2014-09-26 05:11:05','2014-09-26 05:11:05'),(15,'Khoai(Lang/Tây) chiên',30000,'suất',1,'2014-09-26 05:11:05','2014-09-26 05:11:05'),(16,'Củ đậu/ Dưa chuột',15000,'suất',1,'2014-09-26 05:11:05','2014-09-26 05:11:05'),(17,'Nem tai',27000,'suất',1,'2014-09-26 05:11:05','2014-09-26 05:11:05'),(18,'Nem phùng',22000,'suât',1,'2014-09-26 05:11:05','2014-09-26 05:11:05'),(19,'Nộm bò khô',22000,'bát',1,'2014-09-26 05:11:05','2014-09-26 05:11:05'),(20,'Pate',170000,'kg',1,'2014-09-26 05:11:05','2014-09-26 05:11:05'),(21,'Mít nghệ bóc múi',90000,'kg',1,'2014-09-26 05:11:05','2014-09-26 05:11:05'),(22,'Caramen',8000,'cốc',2,'2014-09-26 05:11:06','2014-09-26 05:11:06'),(23,'Caramen thập cẩm',15000,'cốc',2,'2014-09-26 05:11:06','2014-09-26 05:11:06'),(24,'Sữa chua đậu đỏ',15000,'cốc',2,'2014-09-26 05:11:06','2014-09-26 05:11:06'),(25,'Sữa chua nếp cẩm',15000,'cốc',2,'2014-09-26 05:11:06','2014-09-26 05:11:06'),(26,'Sữa chua nha đam',15000,'cốc',2,'2014-09-26 05:11:06','2014-09-26 05:11:06'),(27,'Sữa chua thạch',15000,'cốc',2,'2014-09-26 05:11:06','2014-09-26 05:11:06'),(28,'Sữa chua táo nha đam',18000,'cốc',2,'2014-09-26 05:11:06','2014-09-26 05:11:06'),(29,'Sữa chua nếp cẩm mít',16000,'cốc',2,'2014-09-26 05:11:06','2014-09-26 05:11:06'),(30,'Sữa chua mít',16000,'cốc',2,'2014-09-26 05:11:06','2014-09-26 05:11:06'),(31,'Sữa chua hoa quả',18000,'cốc',2,'2014-09-26 05:11:06','2014-09-26 05:11:06'),(32,'Sữa chua xoài',18000,'cốc',2,'2014-09-26 05:11:06','2014-09-26 05:11:06'),(33,'Sữa chua bơ',18000,'cốc',2,'2014-09-26 05:11:06','2014-09-26 05:11:06'),(34,'Sữa chua dâu tây',20000,'cốc',2,'2014-09-26 05:11:06','2014-09-26 05:11:06'),(35,'Chè đậu xanh',15000,'cốc',3,'2014-09-26 05:11:06','2014-09-26 05:11:06'),(36,'Chè đậu đen cốt dừa',15000,'cốc',3,'2014-09-26 05:11:06','2014-09-26 05:11:06'),(37,'Chè ngô cốm',15000,'cốc',3,'2014-09-26 05:11:06','2014-09-26 05:11:06'),(38,'Chè đậu đỏ cốt dừa',15000,'cốc',3,'2014-09-26 05:11:07','2014-09-26 05:11:07'),(39,'Chè mít',15000,'cốc',3,'2014-09-26 05:11:07','2014-09-26 05:11:07'),(40,'Chè hạt sen đậu xanh',15000,'cốc',3,'2014-09-26 05:11:07','2014-09-26 05:11:07'),(41,'Chè khoai môn cốm',15000,'cốc',3,'2014-09-26 05:11:07','2014-09-26 05:11:07'),(42,'Chè đậu ngự',15000,'cốc',3,'2014-09-26 05:11:07','2014-09-26 05:11:07'),(43,'Chè sương sa hạt lựu',15000,'cốc',3,'2014-09-26 05:11:07','2014-09-26 05:11:07'),(44,'Chè khúc bạch',20000,'cốc',3,'2014-09-26 05:11:07','2014-09-26 05:11:07'),(45,'Chè thập cẩm',15000,'cốc',3,'2014-09-26 05:11:07','2014-09-26 05:11:07'),(46,'Nước ép cà chua',18000,'cốc',4,'2014-09-26 05:11:07','2014-09-26 05:11:07'),(47,'Nước ép chanh leo',18000,'cốc',4,'2014-09-26 05:11:07','2014-09-26 05:11:07'),(48,'Nước ép cà rốt mật ong',18000,'cốc',4,'2014-09-26 05:11:07','2014-09-26 05:11:07'),(49,'Nước ép dưa hấu',18000,'cốc',4,'2014-09-26 05:11:07','2014-09-26 05:11:07'),(50,'Nước ép cam',20000,'cốc',4,'2014-09-26 05:11:07','2014-09-26 05:11:07'),(51,'Sinh tố dứa',18000,'cốc',5,'2014-09-26 05:11:07','2014-09-26 05:11:07'),(52,'Sinh tố bơ',20000,'cốc',5,'2014-09-26 05:11:07','2014-09-26 05:11:07'),(53,'Sinh tố chanh leo',18000,'cốc',5,'2014-09-26 05:11:07','2014-09-26 05:11:07'),(54,'Sinh tố xoài',20000,'cốc',5,'2014-09-26 05:11:07','2014-09-26 05:11:07'),(55,'Dưa hấu dầm',18000,'cốc',6,'2014-09-26 05:11:07','2014-09-26 05:11:07'),(56,'Bơ dầm',18000,'cốc',6,'2014-09-26 05:11:07','2014-09-26 05:11:07'),(57,'Hoa quả dầm',18000,'cốc',6,'2014-09-26 05:11:07','2014-09-26 05:11:07');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','2014-09-26 05:11:05','2014-09-26 05:11:05'),(2,'user','2014-09-26 05:11:05','2014-09-26 05:11:05');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin',NULL,'admin@chris.cn','$2y$10$uVTH5tf/aM/8e9ioF0LHuecq1vOwLU90aZUuRe.oKktGxWbHKXIO2',1,'WyznCS2jO1oWoiwA4YtcOvUADxbvqgGaZ2Pz5esBczjk12JMWdVI47yY93bV','2014-09-26 05:11:04','2015-02-26 16:37:12'),(2,'tunglv','Lê văn Tùng','tunglv@nadia.bz','$2y$10$l7fTNLDOcGlDqCl7ZuXEH.VjQphYPISrCHSvfK8/ssy6W1WeKHroW',2,'jypyXvq4RiAcm9VYahXsJNowC68OK7Wkji9GzndtORwDrgmlOreoXkj7KfQG','2014-09-26 05:11:05','2014-10-01 18:45:11'),(3,'lanpt','Phạm thị Lan','lanpt@nal.vn','$2y$10$W2ksG1C36292Ns4e.Jh4d.GneA1Rvz3sVgktGUhFFVRA4liZjV9Nm',2,NULL,'2014-09-25 18:43:47','2014-09-28 11:07:45'),(4,'thaott','Trần thị Thảo','thaott@nal.vn','$2y$10$NwynRSjp220/Xhd3i0wpWeIp07TsoIDX8Rp5F9toq9Sjk4BK9fW2K',2,NULL,'2014-09-25 18:56:45','2014-09-28 11:07:58'),(5,'tuandt','Đàm thanh Tuấn','tuandt@nal.vn','$2y$10$pdwhawa6wrVcGp41KrO.C.cOS.1dut9xsStTuZryAipUG5aQBheNm',2,'E4tNXRbWQ65SGyYOcpCCwFD15YU4lwFDMzuDMlbf28XWKL29QOHoQLoZK7CD','2014-09-25 18:57:17','2014-09-30 00:19:32'),(6,'huyendt','Đoàn thu Huyền','huyendt@nal.vn','$2y$10$qGdy5RVPokk1K69p4tRyg.GyAD1Ls2EgEIYrFTXo78ymIKEfoCMxy',2,NULL,'2014-09-25 18:57:40','2014-09-28 11:08:29'),(7,'canhnnt','Nguyễn ng. Trần Canh','canhnnt@nal.vn','$2y$10$7wiB/GsWFV0TEoILcvt9BO4AsZfbI/epNvKmCNF4vMI78H06Jx/N.',2,NULL,'2014-09-25 18:58:00','2014-09-28 11:08:40'),(8,'manhdt','Duơng Mạnh','manhdt@nal.vn','$2y$10$ac62FecmW6DYI761lZ9.tu1l7GezyBbMfnKEXfi.ts6J/LT.Mhtxm',2,'cCb73gfcIjvT1sWrqgfh78wxjQYblgRp9QP4LqNsdAMFasYkReBUzkuKLHgU','2014-09-25 18:58:27','2014-09-29 21:15:28'),(9,'hoanlv','Lê văn Hoàn','hoanlv@nal.vn','$2y$10$nDtli6lG1Scz/c3Hq9xGeOUPTj8QkSf6/fA4wHY9x4AutKEJ8qca.',2,NULL,'2014-09-25 18:59:09','2014-09-28 11:09:16'),(10,'thanhnt','Nguyễn  Trung Thành','thanhnt@nal.vn','$2y$10$lLTB7TZ31JPYuz6mqTWJIunH9S4SWs1MCBst1Rdbkkx7IzD/sjKXa',2,NULL,'2014-09-25 18:59:32','2014-09-28 11:09:07'),(11,'tuannv','Nguyễn văn Tuấn','tuannv@nal.vn','$2y$10$uoNqA4S1bCq8m.BbyFwqouAmm7GEHVt.5JFXoySza9VVxChbGa3Ja',2,NULL,'2014-09-25 19:00:03','2014-09-28 11:09:24'),(12,'conglv','Lê văn Công','conglv@nal.vn','$2y$10$BVqP7TkSKF9l.cLI2idvteNP2iSuBuvofGdVZzIGedUqAzEewSxkq',2,'lx3ct100paRpwRnXQ6D6ob9wRgojjbnTgVOqpDu3NnamOFBV0bYAO3cE7ScQ','2014-09-25 19:02:55','2014-10-01 18:08:47'),(13,'thanglh','Lê hoàng Thắng','thanglh@nal.vn','$2y$10$7e2w.VDCv18Ems4obFKI5e0sAl8L8NsUrGT6jZxtl459Yv0vK81ka',2,NULL,'2014-09-25 19:03:20','2014-09-28 11:09:47'),(14,'datnx','Nguyễn xuân Đạt','datnx@nal.vn','$2y$10$1UW.0DnptlMnK3U/5Odc2.tdEShK7V8iW1ppN7ly1K23l3AMQ.g1y',2,NULL,'2014-09-25 19:03:41','2014-09-28 11:10:03'),(15,'ngocdm','Đinh minh Ngọc','ngocdm@nal.vn','$2y$10$Dd.JDx3/3yCvq1DRDcq/A.7IoS53w7HRsUlqYXULVfj7PM3iGeNIu',2,'Pca4BSGU4Abho7dPqj2Ju8lgms0S203LTwBfZXde9ylSbJQROW3DkGjEGb2c','2014-09-25 19:04:34','2014-09-29 11:56:15'),(16,'vietbq','Bùi quốc Việt','vietbq@nal.vn','$2y$10$nqKGpuGQn.GRYI/1EYWKauei32LAHqSCXIpQdaJOzq8qC6Ei0OJ6K',2,NULL,'2014-09-25 19:05:03','2014-09-28 11:10:30'),(17,'dungnvi','Nguyễn Văn Dũng(nvi)','dungnvi@nal.vn','$2y$10$N7tz4qS8LmbAtiFwTVt7ruuVDh/gelOwyqLPtfR/6QDjJ2Y9NvwMG',2,NULL,'2014-09-25 19:06:22','2014-09-28 11:10:45'),(18,'thangbk','Bùi khắc Thắng','thangbk@nal.vn','$2y$10$S5yDh22hIAlf1PgrgvhTH.37UblFMXUMRDWGH96Z/QwVM1rjr1RMu',2,NULL,'2014-09-25 19:06:50','2014-09-28 11:10:59'),(19,'sonnq','Nguyễn quý Sơn','sonnq@nal.vn','$2y$10$oTmRqXvusB0.q.say1shWeT0VfbA7f09/yRH1KUMouMYTeEI7CS/K',2,NULL,'2014-09-25 19:07:37','2014-09-28 11:11:11'),(20,'anhnt','Nguyễn thế Anh','anhnt@nal.vn','$2y$10$Rdh83nBJCMHDk.IbkiQPweE5kdNs0MvwYu/kduBup6Vna5WQVJNYq',2,NULL,'2014-09-25 19:07:58','2014-09-28 11:11:25'),(21,'linhptt','Phạm thị thuỳ Linh','linhptt@nal.vn','$2y$10$4TkgIpJ0SSZWC8MuwK94DOQn0Lx7j/9beUY8aTmfpHQpdCzynwXKa',2,'c4w7Vo38Sw5rjh0i1FLuzOmpe7kQ6WikPrEJ038xLTts30wiyGy5mHhh4eg1','2014-09-25 19:08:22','2014-09-29 17:53:20'),(22,'duongld','Lê đại Dương','duongld@nal.vn','$2y$10$.8reTRGSb48m7wgwFys4Yu8eqmvCjuxcrWoL6x6I0BrB.ldsnh2zq',2,NULL,'2014-09-25 19:09:07','2014-09-28 11:11:49'),(23,'tuannq','Nguyễn quang Tuấn','tuannq@nal.vn','$2y$10$yLLZlwHLhn50Eolfe9J9oOlphCns1aF0zyRCYwQhOSHteenDxY6nK',2,NULL,'2014-09-25 19:09:22','2014-09-28 11:11:58'),(24,'mendt','Dương thị Mến','mendt@nal.vn','$2y$10$8itCFIhBs8tCdxfXJ9fsPuRs3ZfIzbA8jjjBvUhoxgmZNrQXLsq3K',2,NULL,'2014-09-25 19:10:48','2014-09-28 11:12:13'),(25,'tungpv','Phan văn Tùng','tungpv@nal.vn','$2y$10$bt/nAyzsRSOEvnBF9hUWIOMDezE4QMsu1pv7GAHXKkZ9iTkx15XL2',2,NULL,'2014-09-25 19:12:17','2014-09-28 11:12:26'),(26,'thaihv','Hà văn Thái','thaihv@nal.vn','$2y$10$UzTPhx.WepcD7wXZZms3ReuM3dG38lrY61E7ooRyZ6muC0Q3qvncK',2,NULL,'2014-09-25 19:12:36','2014-09-28 11:12:36'),(27,'tuannh','Nguyễn hoàng Tuấn','tuannh@nal.vn','$2y$10$og3/l0xn92ck/E2Ob8rLqOdB3TUnBqaFI9WufwjD/km/Y4iqh72vW',2,NULL,'2014-09-25 19:14:10','2014-09-28 11:12:46'),(28,'hailt','Lê thanh Hải','hailt@nal.vn','$2y$10$aYV/mGMt8qEZxtEbl2AEgurBiqFYus.a8yCciNveeGECZDdeKufhe',2,NULL,'2014-09-25 19:15:27','2014-09-28 11:12:58'),(29,'namlh','Lê hoàng Nam','namlh@nal.vn','$2y$10$rsjcnSCZuW.JTGDnDTxl6.OnKKBdpk.QqEx7wXzcWngLICzi9cjw.',2,NULL,'2014-09-25 19:15:44','2014-09-28 11:13:10'),(30,'lanpm','Phạm mạnh Lân','lanpm@nal.vn','$2y$10$yFR8Mu1/RaXzHcIkwCpLVORiJeKxvgx/hh9M/NhfBlJ.wHDkILgjm',2,NULL,'2014-09-25 19:16:00','2014-09-28 11:13:42'),(31,'cuonggt','Giang thái Cường','cuonggt@nal.vn','$2y$10$1iItxLVAwp3BKzPJCnsXOuJPiM4k7bxruXMiGrPCBThwxl8j2WWkG',2,'YjPN8OJ3KEFG9GUjlL4pI16WjTwA2kW03YXHQLxC7tJldlqUHqVTamcv2ZIX','2014-09-25 19:16:32','2014-09-28 13:40:16'),(32,'haihd','Hoàng duy Hải','haihd@nal.vn','$2y$10$6UJzqsbDiRrCAsZFHbVTeOvovQXiX2mKYEskh3pepfgGM3uxnVDtq',2,NULL,'2014-09-25 19:17:00','2014-09-28 11:14:03'),(33,'ducnn','Nguyễn ngọc Đức','ducnn@nal.vn','$2y$10$iF7GCKJsLS5GYuJgsa6E6.OnPgYnwSfTNB3hwbuLbt67DAvzqhdN.',2,NULL,'2014-09-25 19:17:37','2014-09-28 11:14:23'),(34,'dungnv','Nguyễn Văn Dũng','dungnv@nal.vn','$2y$10$KLeTmOD83aVKRvXhaQxr4.isVC.gB7wymErgcVx0jrNa46Zwa6yTK',2,'rtngpyHywnAeuR0xR5E29MHhBCfAkTRJop7tMjIzxtUsmYrZ2z3VElnThotV','2014-09-25 19:17:37','2015-02-26 16:37:46');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-04-12 15:25:08
