-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2021 at 04:33 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bbc-projekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `bbckorisnik`
--

CREATE TABLE `bbckorisnik` (
  `id` int(11) NOT NULL,
  `korisnicko_ime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prezime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lozinka` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `razina` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bbckorisnik`
--

INSERT INTO `bbckorisnik` (`id`, `korisnicko_ime`, `ime`, `prezime`, `lozinka`, `razina`) VALUES
(1, 'dori_polic', 'Dorijan', 'Polic', '$2y$10$G8OA3S19Fl0K8x/aEeYNxeRRdOS5LRb1CfoqY8.660xdFtXWTq.j.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bbcvijesti`
--

CREATE TABLE `bbcvijesti` (
  `id` int(11) NOT NULL,
  `datum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `naslov` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sazetak` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tekst` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slika` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategorija` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arhiva` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bbcvijesti`
--

INSERT INTO `bbcvijesti` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(20, '10-06-2021 01:50:01', 'HollowKnight2', 'HollowKnightOpis2', 'HollowKnightSadrzaj2', 'Hollow_Knight.jpg', 'news', 1),
(21, '10-06-2021 01:50:19', 'HollowKnight3', 'HollowKnightOpis3', 'HollowKnightSadrzaj3', 'Hollow_Knight.jpg', 'news', 1),
(22, '10-06-2021 01:50:38', 'HollowKnight4', 'HollowKnightOpis4', 'HollowKnightSadrzaj4', 'Hollow_Knight.jpg', 'news', 1),
(23, '10-06-2021 01:50:54', 'Silksong1', 'SilksongOpis1', 'SilksongSadrzaj1', 'Silksong.jpg', 'sport', 1),
(24, '10-06-2021 01:51:13', 'Silksong2', 'SilksongOpis2', 'SilksongSadrzaj2', 'Silksong.jpg', 'sport', 1),
(25, '10-06-2021 01:51:31', 'Silksong3', 'SilksongOpis3', 'SilksongSadrzaj3', 'Silksong.jpg', 'sport', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bbckorisnik`
--
ALTER TABLE `bbckorisnik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bbcvijesti`
--
ALTER TABLE `bbcvijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bbckorisnik`
--
ALTER TABLE `bbckorisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bbcvijesti`
--
ALTER TABLE `bbcvijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
