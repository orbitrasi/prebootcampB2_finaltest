-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2021 at 03:45 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_hero`
--

-- --------------------------------------------------------

--
-- Table structure for table `hero_tb`
--

CREATE TABLE `hero_tb` (
  `id_hero` int(11) NOT NULL,
  `name_hero` varchar(255) NOT NULL,
  `id_type` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hero_tb`
--

INSERT INTO `hero_tb` (`id_hero`, `name_hero`, `id_type`, `photo`) VALUES
(1, 'Wan Wan', 4, 'wan_wan.jpg'),
(2, 'Yu Zhong', 2, 'yuzhong.jpg'),
(3, 'Tigreal', 6, 'tigreal.jpg'),
(4, 'Gussion', 1, 'gussion.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `type_tb`
--

CREATE TABLE `type_tb` (
  `id_type` int(11) NOT NULL,
  `name_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type_tb`
--

INSERT INTO `type_tb` (`id_type`, `name_type`) VALUES
(1, 'Assasin'),
(2, 'Fighter'),
(3, 'Mage'),
(4, 'Marksman'),
(5, 'Support'),
(6, 'Tank');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hero_tb`
--
ALTER TABLE `hero_tb`
  ADD PRIMARY KEY (`id_hero`),
  ADD UNIQUE KEY `name_hero` (`name_hero`),
  ADD KEY `id_type` (`id_type`);

--
-- Indexes for table `type_tb`
--
ALTER TABLE `type_tb`
  ADD PRIMARY KEY (`id_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hero_tb`
--
ALTER TABLE `hero_tb`
  MODIFY `id_hero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `type_tb`
--
ALTER TABLE `type_tb`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hero_tb`
--
ALTER TABLE `hero_tb`
  ADD CONSTRAINT `hero_tb_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `type_tb` (`id_type`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
