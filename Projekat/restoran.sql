-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 20, 2024 at 06:55 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restoran`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

DROP TABLE IF EXISTS `korisnici`;
CREATE TABLE IF NOT EXISTS `korisnici` (
  `korisnik_id` int NOT NULL AUTO_INCREMENT,
  `ime` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lozinka` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefon` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`korisnik_id`),
  UNIQUE KEY `email` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`korisnik_id`, `ime`, `username`, `lozinka`, `telefon`, `adresa`) VALUES
(1, 'Uros', 'Uros12', '$2y$10$29z/l7DMByeHzi2yFF8P4emMP0AOVqfr.S1iVDPoc1CJbzQnmhTMS', '021391190', 'Test Adresa'),
(2, 'Test', 'Test', '$2y$10$7q3YExPONmPVsBxzFgZ3NeXW2yfRmqvJsjbFYBfTqTjrZdKLmRmLW', '931893314', 'Test Adresa'),
(3, 'Nikola', 'Zivanovic', '$2y$10$9pDI81Ra8L4cB2WMIllX7usNuQDcc5J7uc3KmQqfQ3J7oRtX3MrIC', '212143141', 'Test Adresa'),
(4, 'Bogdan', 'Bogi', '$2y$10$98Lil4zy6RrYL8hGlDnd.ugv0IujdTafLfaAMnMdiEUsML9SGaQRi', '314515t242', 'Test Adresa');

-- --------------------------------------------------------

--
-- Table structure for table `meni`
--

DROP TABLE IF EXISTS `meni`;
CREATE TABLE IF NOT EXISTS `meni` (
  `jelo_id` int NOT NULL AUTO_INCREMENT,
  `naziv` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `opis` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cena` decimal(10,2) NOT NULL,
  `slika` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`jelo_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meni`
--

INSERT INTO `meni` (`jelo_id`, `naziv`, `opis`, `cena`, `slika`) VALUES
(1, 'Cheeseburger', 'Sočni goveđi burger sa sirom, zelena salata, paradajz, kiseli krastavci i specijalni sos.', 500.00, 'Cheeseburger.jpeg'),
(2, 'Pizza Margherita', ' Tradicionalna italijanska pizza sa svežim paradajzom, mocarelom i bosiljkom', 700.00, 'Pizza Margherita.jpg'),
(3, 'Chicken Caesar Salad', 'Svježa salata sa piletinom, parmezanom, krutonima i Caesar dressingom.', 450.00, 'Chicken Caesar Salad.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ocene`
--

DROP TABLE IF EXISTS `ocene`;
CREATE TABLE IF NOT EXISTS `ocene` (
  `ocena_id` int NOT NULL AUTO_INCREMENT,
  `ime` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `opis` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ocena` int NOT NULL,
  `datum` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ocena_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ocene`
--

INSERT INTO `ocene` (`ocena_id`, `ime`, `email`, `opis`, `ocena`, `datum`) VALUES
(1, 'Uros', 'uros12@gmail.com', 'Veoma odlicna hrana sve pohvale', 4, '2024-07-18 13:01:57');

-- --------------------------------------------------------

--
-- Table structure for table `porudzbine`
--

DROP TABLE IF EXISTS `porudzbine`;
CREATE TABLE IF NOT EXISTS `porudzbine` (
  `porudzbina_id` int NOT NULL AUTO_INCREMENT,
  `ime` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefon` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jela` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `datum` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`porudzbina_id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `porudzbine`
--

INSERT INTO `porudzbine` (`porudzbina_id`, `ime`, `email`, `telefon`, `adresa`, `jela`, `datum`) VALUES
(1, 'Uros', 'uros12@gmail.com', '931893314', 'Test Adresa', 'Cheeseburger, Chicken Caesar Salad', '2024-07-18 12:16:48'),
(2, 'Uros', 'uros12@gmail.com', '931893314', 'Test Adresa', 'Pizza Margherita', '2024-07-18 13:09:19'),
(24, 'Nemanja', 'nemanja56@gmail.com', '931893314', 'Test Adresa', 'Cheeseburger', '2024-07-18 19:43:25'),
(25, 'test', 'test@gmail.com', '931893314', 'Test Adresa', 'Cheeseburger', '2024-08-20 06:05:56'),
(26, 'Bogdan', 'generate@gmail.com', '931893314', 'Test Adresa', 'Chicken Caesar Salad', '2024-08-20 06:40:10');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
