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
-- Table structure for table `users`
--

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin',NULL,'admin@chris.cn','$2y$10$KLeTmOD83aVKRvXhaQxr4.isVC.gB7wymErgcVx0jrNa46Zwa6yTK',1,'I4xIdH965lVGqAbLRe0NrtLKAK9FS1MdkOEkOUAzSapQRjiEqPpYhpjjZmsk','2014-09-26 05:11:04','2014-09-28 05:39:07');
INSERT INTO `users` VALUES (2,'tunglv','Lê văn Tùng','tunglv@nadia.bz','$2y$10$KLeTmOD83aVKRvXhaQxr4.isVC.gB7wymErgcVx0jrNa46Zwa6yTK',2,'trEgEYHaI9jgFXhjCrNy7YW5akA8ieFtKDIYQxQy3Mc2eSc1wsYPEGxuQE6O','2014-09-26 05:11:05','2014-09-28 10:23:36');
INSERT INTO `users` VALUES (3,'lanpt','Phạm thị Lan','lanpt@nal.vn','$2y$10$W2ksG1C36292Ns4e.Jh4d.GneA1Rvz3sVgktGUhFFVRA4liZjV9Nm',2,NULL,'2014-09-25 18:43:47','2014-09-28 11:07:45');
INSERT INTO `users` VALUES (4,'thaott','Trần thị Thảo','thaott@nal.vn','$2y$10$NwynRSjp220/Xhd3i0wpWeIp07TsoIDX8Rp5F9toq9Sjk4BK9fW2K',2,NULL,'2014-09-25 18:56:45','2014-09-28 11:07:58');
INSERT INTO `users` VALUES (5,'tuandt','Đàm thanh Tuấn','tuandt@nal.vn','$2y$10$pdwhawa6wrVcGp41KrO.C.cOS.1dut9xsStTuZryAipUG5aQBheNm',2,NULL,'2014-09-25 18:57:17','2014-09-28 11:08:15');
INSERT INTO `users` VALUES (6,'huyendt','Đoàn thu Huyền','huyendt@nal.vn','$2y$10$qGdy5RVPokk1K69p4tRyg.GyAD1Ls2EgEIYrFTXo78ymIKEfoCMxy',2,NULL,'2014-09-25 18:57:40','2014-09-28 11:08:29');
INSERT INTO `users` VALUES (7,'canhnnt','Nguyễn ng. Trần Canh','canhnnt@nal.vn','$2y$10$7wiB/GsWFV0TEoILcvt9BO4AsZfbI/epNvKmCNF4vMI78H06Jx/N.',2,NULL,'2014-09-25 18:58:00','2014-09-28 11:08:40');
INSERT INTO `users` VALUES (8,'manhdt','Duơng Mạnh','manhdt@nal.vn','$2y$10$ac62FecmW6DYI761lZ9.tu1l7GezyBbMfnKEXfi.ts6J/LT.Mhtxm',2,NULL,'2014-09-25 18:58:27','2014-09-28 11:08:49');
INSERT INTO `users` VALUES (9,'hoanlv','Lê văn Hoàn','hoanlv@nal.vn','$2y$10$nDtli6lG1Scz/c3Hq9xGeOUPTj8QkSf6/fA4wHY9x4AutKEJ8qca.',2,NULL,'2014-09-25 18:59:09','2014-09-28 11:09:16');
INSERT INTO `users` VALUES (10,'thanhnt','Nguyễn  Trung Thành','thanhnt@nal.vn','$2y$10$lLTB7TZ31JPYuz6mqTWJIunH9S4SWs1MCBst1Rdbkkx7IzD/sjKXa',2,NULL,'2014-09-25 18:59:32','2014-09-28 11:09:07');
INSERT INTO `users` VALUES (11,'tuannv','Nguyễn văn Tuấn','tuannv@nal.vn','$2y$10$uoNqA4S1bCq8m.BbyFwqouAmm7GEHVt.5JFXoySza9VVxChbGa3Ja',2,NULL,'2014-09-25 19:00:03','2014-09-28 11:09:24');
INSERT INTO `users` VALUES (12,'conglv','Lê văn Công','conglv@nal.vn','$2y$10$BVqP7TkSKF9l.cLI2idvteNP2iSuBuvofGdVZzIGedUqAzEewSxkq',2,NULL,'2014-09-25 19:02:55','2014-09-28 11:09:38');
INSERT INTO `users` VALUES (13,'thanglh','Lê hoàng Thắng','thanglh@nal.vn','$2y$10$7e2w.VDCv18Ems4obFKI5e0sAl8L8NsUrGT6jZxtl459Yv0vK81ka',2,NULL,'2014-09-25 19:03:20','2014-09-28 11:09:47');
INSERT INTO `users` VALUES (14,'datnx','Nguyễn xuân Đạt','datnx@nal.vn','$2y$10$1UW.0DnptlMnK3U/5Odc2.tdEShK7V8iW1ppN7ly1K23l3AMQ.g1y',2,NULL,'2014-09-25 19:03:41','2014-09-28 11:10:03');
INSERT INTO `users` VALUES (15,'ngocdm','Đinh minh Ngọc','ngocdm@nal.vn','$2y$10$Dd.JDx3/3yCvq1DRDcq/A.7IoS53w7HRsUlqYXULVfj7PM3iGeNIu',2,NULL,'2014-09-25 19:04:34','2014-09-28 11:10:14');
INSERT INTO `users` VALUES (16,'vietbq','Bùi quốc Việt','vietbq@nal.vn','$2y$10$nqKGpuGQn.GRYI/1EYWKauei32LAHqSCXIpQdaJOzq8qC6Ei0OJ6K',2,NULL,'2014-09-25 19:05:03','2014-09-28 11:10:30');
INSERT INTO `users` VALUES (17,'dungnvi','Nguyễn Văn Dũng(nvi)','dungnvi@nal.vn','$2y$10$N7tz4qS8LmbAtiFwTVt7ruuVDh/gelOwyqLPtfR/6QDjJ2Y9NvwMG',2,NULL,'2014-09-25 19:06:22','2014-09-28 11:10:45');
INSERT INTO `users` VALUES (18,'thangbk','Bùi khắc Thắng','thangbk@nal.vn','$2y$10$S5yDh22hIAlf1PgrgvhTH.37UblFMXUMRDWGH96Z/QwVM1rjr1RMu',2,NULL,'2014-09-25 19:06:50','2014-09-28 11:10:59');
INSERT INTO `users` VALUES (19,'sonnq','Nguyễn quý Sơn','sonnq@nal.vn','$2y$10$oTmRqXvusB0.q.say1shWeT0VfbA7f09/yRH1KUMouMYTeEI7CS/K',2,NULL,'2014-09-25 19:07:37','2014-09-28 11:11:11');
INSERT INTO `users` VALUES (20,'anhnt','Nguyễn thế Anh','anhnt@nal.vn','$2y$10$Rdh83nBJCMHDk.IbkiQPweE5kdNs0MvwYu/kduBup6Vna5WQVJNYq',2,NULL,'2014-09-25 19:07:58','2014-09-28 11:11:25');
INSERT INTO `users` VALUES (21,'linhptt','Phạm thị thuỳ Linh','linhptt@nal.vn','$2y$10$4TkgIpJ0SSZWC8MuwK94DOQn0Lx7j/9beUY8aTmfpHQpdCzynwXKa',2,NULL,'2014-09-25 19:08:22','2014-09-28 11:11:35');
INSERT INTO `users` VALUES (22,'duongld','Lê đại Dương','duongld@nal.vn','$2y$10$.8reTRGSb48m7wgwFys4Yu8eqmvCjuxcrWoL6x6I0BrB.ldsnh2zq',2,NULL,'2014-09-25 19:09:07','2014-09-28 11:11:49');
INSERT INTO `users` VALUES (23,'tuannq','Nguyễn quang Tuấn','tuannq@nal.vn','$2y$10$yLLZlwHLhn50Eolfe9J9oOlphCns1aF0zyRCYwQhOSHteenDxY6nK',2,NULL,'2014-09-25 19:09:22','2014-09-28 11:11:58');
INSERT INTO `users` VALUES (24,'mendt','Dương thị Mến','mendt@nal.vn','$2y$10$8itCFIhBs8tCdxfXJ9fsPuRs3ZfIzbA8jjjBvUhoxgmZNrQXLsq3K',2,NULL,'2014-09-25 19:10:48','2014-09-28 11:12:13');
INSERT INTO `users` VALUES (25,'tungpv','Phan văn Tùng','tungpv@nal.vn','$2y$10$bt/nAyzsRSOEvnBF9hUWIOMDezE4QMsu1pv7GAHXKkZ9iTkx15XL2',2,NULL,'2014-09-25 19:12:17','2014-09-28 11:12:26');
INSERT INTO `users` VALUES (26,'thaihv','Hà văn Thái','thaihv@nal.vn','$2y$10$UzTPhx.WepcD7wXZZms3ReuM3dG38lrY61E7ooRyZ6muC0Q3qvncK',2,NULL,'2014-09-25 19:12:36','2014-09-28 11:12:36');
INSERT INTO `users` VALUES (27,'tuannh','Nguyễn hoàng Tuấn','tuannh@nal.vn','$2y$10$og3/l0xn92ck/E2Ob8rLqOdB3TUnBqaFI9WufwjD/km/Y4iqh72vW',2,NULL,'2014-09-25 19:14:10','2014-09-28 11:12:46');
INSERT INTO `users` VALUES (28,'hailt','Lê thanh Hải','hailt@nal.vn','$2y$10$aYV/mGMt8qEZxtEbl2AEgurBiqFYus.a8yCciNveeGECZDdeKufhe',2,NULL,'2014-09-25 19:15:27','2014-09-28 11:12:58');
INSERT INTO `users` VALUES (29,'namlh','Lê hoàng Nam','namlh@nal.vn','$2y$10$rsjcnSCZuW.JTGDnDTxl6.OnKKBdpk.QqEx7wXzcWngLICzi9cjw.',2,NULL,'2014-09-25 19:15:44','2014-09-28 11:13:10');
INSERT INTO `users` VALUES (30,'lanpm','Phạm mạnh Lân','lanpm@nal.vn','$2y$10$yFR8Mu1/RaXzHcIkwCpLVORiJeKxvgx/hh9M/NhfBlJ.wHDkILgjm',2,NULL,'2014-09-25 19:16:00','2014-09-28 11:13:42');
INSERT INTO `users` VALUES (31,'cuonggt','Giang thái Cường','cuonggt@nal.vn','$2y$10$1iItxLVAwp3BKzPJCnsXOuJPiM4k7bxruXMiGrPCBThwxl8j2WWkG',2,NULL,'2014-09-25 19:16:32','2014-09-28 10:57:24');
INSERT INTO `users` VALUES (32,'haihd','Hoàng duy Hải','haihd@nal.vn','$2y$10$6UJzqsbDiRrCAsZFHbVTeOvovQXiX2mKYEskh3pepfgGM3uxnVDtq',2,NULL,'2014-09-25 19:17:00','2014-09-28 11:14:03');
INSERT INTO `users` VALUES (33,'ducnn','Nguyễn ngọc Đức','ducnn@nal.vn','$2y$10$iF7GCKJsLS5GYuJgsa6E6.OnPgYnwSfTNB3hwbuLbt67DAvzqhdN.',2,NULL,'2014-09-25 19:17:37','2014-09-28 11:14:23');
INSERT INTO `users` VALUES (34,'dungnv','Nguyễn Văn Dũng','dungnv@nal.vn','$2y$10$KLeTmOD83aVKRvXhaQxr4.isVC.gB7wymErgcVx0jrNa46Zwa6yTK',2,NULL,'2014-09-25 19:17:37','2014-09-28 08:34:02');
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

-- Dump completed on 2014-09-28 18:26:12
