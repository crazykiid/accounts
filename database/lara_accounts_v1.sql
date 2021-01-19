-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 19, 2021 at 06:34 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


-- --------------------------------------------------------

--
-- Table structure for table `admin_accounts`
--

DROP TABLE IF EXISTS `admin_accounts`;
CREATE TABLE IF NOT EXISTS `admin_accounts` (
  `_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `_username` varchar(63) COLLATE utf8mb4_unicode_ci NOT NULL,
  `_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `_reg_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`_id`),
  UNIQUE KEY `USERNAME` (`_username`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_accounts`
--

INSERT INTO `admin_accounts` (`_id`, `_username`, `_password`, `_reg_at`) VALUES
(1, 'admin', '$2y$10$7Hn3laK52CXywTQe8GWTkOk7FIGyu9gmrKNWjoLo46WqfflYYAFAW', '2021-01-10 18:03:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

DROP TABLE IF EXISTS `user_accounts`;
CREATE TABLE IF NOT EXISTS `user_accounts` (
  `_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `_name` varchar(63) COLLATE utf8mb4_unicode_ci NOT NULL,
  `_email` varchar(63) COLLATE utf8mb4_unicode_ci NOT NULL,
  `_contact` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `_status` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `_reg_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`_id`),
  UNIQUE KEY `EMAIL` (`_email`),
  UNIQUE KEY `CONTACT` (`_contact`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`_id`, `_name`, `_email`, `_contact`, `_password`, `_status`, `_reg_at`) VALUES
(1, 'mohit Nath', 'mohit@ac.com', '2342323232', '$2y$10$VOwxHGn5z8zPKdjPJ1ytt.SPmXocfHugDmycRXgb5nQhUrT9vCMhO', 9, '2021-01-10 19:48:30'),
(2, 'shukla', 'shukii12@ac.com', '3435443253', '$2y$10$F4YmUYl/K64U5s50ZXR44Oh/Cg2m9sTYmWXBQgjU/m8JHYNdw0wHS', 1, '2021-01-10 19:51:08'),
(3, 'mohit shah', 'rajeev89@ac.com', '2309746253', '$2y$10$m4IHmhCum1V6aF5rVkAPX.GXNtktly8PBCvzZniBkl/iK14lUexCa', 1, '2021-01-10 19:52:34'),
(4, 'pihu', 'pihu76@ac.com', '8754565576', '$2y$10$4T3osJXd/WQo/l9ScRH51uWWcwD1nPWjFEM6s0SfS3KcuIG9vvRVG', 1, '2021-01-10 20:03:07'),
(5, 'chitra', 'chitra23@ac.com', '3643643643', '$2y$10$miWrQiFi4glTlXeY7sTREuFl94BunN4XRqiGIgostyA4M8dm5nKwW', 0, '2021-01-10 20:30:19'),
(6, 'deepak', 'deepak@ck.com', '35325325', '$2y$10$zbTuzDaKG96zjA9itHDoz.VcUIRxJBcmx4aUMLUcKCVupkkQQiZnm', 0, '2021-01-10 20:35:59'),
(7, 'mahesh', 'mahesh.f2@fcc.com', '235325325', '$2y$10$6pMFKk3B.TVtgq2mqyMxXuOWmxQguDtw54kTwUbQ0MmFpyb4EdWHy', 1, '2021-01-10 20:37:10'),
(8, 'mukta', 'mukta@cd.com', '3526326', '$2y$10$VYt7QCnEELgSCFFHA10SkuBMFB58RbyYIbQ2.feT/LOeWcCj8ez3O', 9, '2021-01-10 21:32:54'),
(9, 'mohit koshik', 'mandy23@ac.com', '3946229385', '$2y$10$b1b3EVKqa8wPnjJKP1qveuCLU8A9A0UFpqedhOSnwONt5W77TPx0G', 0, '2021-01-15 15:33:40'),
(10, 'Mohit Nanda', 'mohitn34@ac.com', '2395867347', '$2y$10$D8YnJ9eIcCDZ83Zx/vEm6eQJ0AEOi7cWXW97B16GlYPUhaTAyGGMu', 1, '2021-01-16 10:03:32'),
(11, 'shashank varma', 'sashi23@hq.com', '46465475475', '$2y$10$aNjMAP2nu18pKyYP6mH26uuE9/qCEFcOhAO5z9ZVejIGffgZjT5k.', 0, '2021-01-16 10:15:00'),
(12, 'Sobhit Chanda', 'sobhi23@ck.com', '4592850385', '$2y$10$5BfmhDrOfwCteVuJpDWYjuPVTqu7bJ7isMtd606hZbD02O0tJ9EU2', 1, '2021-01-19 13:28:38'),
(13, 'Mehak Mukharji', 'mehak.m13@gh.com', '8436295735', '$2y$10$jNK3Y5IR5P1TCgYHxADXV.iUk.GXuGEow/KomY5cc4pVCmeSNBSF2', 1, '2021-01-19 13:30:19');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
