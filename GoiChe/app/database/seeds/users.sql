-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Sep 26, 2014 at 11:28 AM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `goiche`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=34 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@chris.cn', '$2y$10$8Au5McglJVnxPPFks3E71.5Pz', 1, '2014-09-25 23:59:59', '2014-09-25 23:59:59'),
(2, 'tunglv', 'tunglv@nadia.bz', '$2y$10$02udi8p.fx70Z3pEpEGQk.pKK', 2, '2014-09-26 00:00:00', '2014-09-26 00:00:00'),
(3, 'lanpt', 'lanpt@nal.vn', '$2y$10$TWVKVDRp3MIkplPc/kJQreXV9', 2, '2014-09-26 01:43:47', '2014-09-26 01:43:47'),
(4, 'thaott', 'thaott@nal.vn', '$2y$10$QRv0u4qnJeHwL/30roSl/OQyM', 2, '2014-09-26 01:56:45', '2014-09-26 01:56:45'),
(5, 'tuandt', 'tuandt@nal.vn', '$2y$10$BQcUeaX48l0tIGCJXHMO9u2dr', 2, '2014-09-26 01:57:17', '2014-09-26 01:57:17'),
(6, 'huyendt', 'huyendt@nal.vn', '$2y$10$8.04OQK4LqGmhma1p4pfvuWMi', 2, '2014-09-26 01:57:40', '2014-09-26 01:57:40'),
(7, 'canhnnt', 'canhnnt@nal.vn', '$2y$10$atl7B2TikkCiyrbgqAcr.eoJ6', 2, '2014-09-26 01:58:00', '2014-09-26 01:58:00'),
(8, 'manhdt', 'manhdt@nal.vn', '$2y$10$vbmMB5SVShxHyo0da5EDC.ilS', 2, '2014-09-26 01:58:27', '2014-09-26 01:58:27'),
(9, 'hoanlv', 'hoanlv@nal.vn', '$2y$10$LUwNgtmdrvyAFGb1zWx2auiBX', 2, '2014-09-26 01:59:09', '2014-09-26 01:59:09'),
(10, 'thanhnt', 'thanhnt@nal.vn', '$2y$10$.RIb6A8cvYQRUleYOmq/M.zVT', 2, '2014-09-26 01:59:32', '2014-09-26 01:59:32'),
(11, 'tuannv', 'tuannv@nal.vn', '$2y$10$uYr0HqQKEtwx8G0DEK0p3OI6c', 2, '2014-09-26 02:00:03', '2014-09-26 02:00:03'),
(12, 'conglv', 'conglv@nal.vn', '$2y$10$Y/yDxb0eO2GDo0SxYSsufORnM', 2, '2014-09-26 02:02:55', '2014-09-26 02:02:55'),
(13, 'thanglh', 'thanglh@nal.vn', '$2y$10$KTKPTVftYnwVE7wgtj/ifebyo', 2, '2014-09-26 02:03:20', '2014-09-26 02:03:20'),
(14, 'datnx', 'datnx@nal.vn', '$2y$10$Y.f.3HdU6POwaCOWmp1EU.bxt', 2, '2014-09-26 02:03:41', '2014-09-26 02:03:41'),
(15, 'ngocdm', 'ngocdm@nal.vn', '$2y$10$ANAtKWsPtHZ/av1UiugbFeJNw', 2, '2014-09-26 02:04:34', '2014-09-26 02:04:34'),
(16, 'vietbq', 'vietbq@nal.vn', '$2y$10$LRYtUsKrjdPqpxZ8xb/yyOWCq', 2, '2014-09-26 02:05:03', '2014-09-26 02:05:03'),
(17, 'dungnvi', 'dungnvi@nal.vn', '$2y$10$j3SBVKDSoqJK725mmbjUqOYgG', 2, '2014-09-26 02:06:22', '2014-09-26 02:06:22'),
(18, 'thangbk', 'thangbk@nal.vn', '$2y$10$uRUhH82I5K0B1yIWJfl6T.ujd', 2, '2014-09-26 02:06:50', '2014-09-26 02:06:50'),
(19, 'sonnq', 'sonnq@nal.vn', '$2y$10$4t4LMuUegC2dqmR1el0HYOwTi', 2, '2014-09-26 02:07:37', '2014-09-26 02:07:37'),
(20, 'anhnt', 'anhnt@nal.vn', '$2y$10$aQ84fyzHkC5yKb/V9smj8.0oK', 2, '2014-09-26 02:07:58', '2014-09-26 02:07:58'),
(21, 'linhptt', 'linhptt@nal.vn', '$2y$10$75xe1Ae2Xa.0GWvIShL/fOScP', 2, '2014-09-26 02:08:22', '2014-09-26 02:08:22'),
(22, 'duongld', 'duongld@nal.vn', '$2y$10$QG1AhG.G64Jgy9f5kgQXS.bAK', 2, '2014-09-26 02:09:07', '2014-09-26 02:09:07'),
(23, 'tuannq', 'tuannq@nal.vn', '$2y$10$R1W3VukFLjq16ooy8Ll5.eNE3', 2, '2014-09-26 02:09:22', '2014-09-26 02:09:22'),
(24, 'mendt', 'mendt@nal.vn', '$2y$10$RV2YmGjEpT7l3.pcAcWYSuzgX', 2, '2014-09-26 02:10:48', '2014-09-26 02:10:48'),
(25, 'tungpv', 'tungpv@nal.vn', '$2y$10$lbxIqdhuoMBtOxsSd4/9X.PT9', 2, '2014-09-26 02:12:17', '2014-09-26 02:12:17'),
(26, 'thaihv', 'thaihv@nal.vn', '$2y$10$9SRQjZs6dB8Q5uMbPo9hDu3Wh', 2, '2014-09-26 02:12:36', '2014-09-26 02:12:36'),
(27, 'tuannh', 'tuannh@nal.vn', '$2y$10$l4htOqW1AYnrRWBUgh0lO.uwa', 2, '2014-09-26 02:14:10', '2014-09-26 02:14:10'),
(28, 'hailh', 'hailh@nal.vn', '$2y$10$RdhTDPelh/CCm8rphtwkSO73k', 2, '2014-09-26 02:15:27', '2014-09-26 02:15:27'),
(29, 'namlh', 'namlh@nal.vn', '$2y$10$nLH8y2ZtdJZKczevRGAuN.10G', 2, '2014-09-26 02:15:44', '2014-09-26 02:15:44'),
(30, 'lanpm', 'lanpm@nal.vn', '$2y$10$t2tPF61qRwEUJznZjqsKGezDx', 2, '2014-09-26 02:16:00', '2014-09-26 02:16:00'),
(31, 'cuonggt', 'cuonggt@nal.vn', '$2y$10$wP0Cq6zTvY4wA9DAyQCPH.xg0', 2, '2014-09-26 02:16:32', '2014-09-26 02:16:32'),
(32, 'haihd', 'haihd@nal.vn', '$2y$10$Cd9xm9VTClqId23va.7H4urAL', 2, '2014-09-26 02:17:00', '2014-09-26 02:17:00'),
(33, 'ducnn', 'ducnn@nal.vn', '$2y$10$xB5WGRGQmop9AwkjzubFeOs.Y', 2, '2014-09-26 02:17:37', '2014-09-26 02:17:37');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
