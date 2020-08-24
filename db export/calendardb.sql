-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2020 at 09:05 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `calendardb`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
`id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `fromdate` datetime NOT NULL,
  `todate` datetime NOT NULL,
  `location` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `id_user`, `description`, `fromdate`, `todate`, `location`) VALUES
(2, 1, '2Descriere eveniment', '2010-12-31 23:59:59', '2010-12-31 23:59:59', '2Locatie, eveniment'),
(3, 1, 'DDDDDDDDDDDDDD', '2019-12-12 00:00:00', '2019-12-12 00:00:00', 'LLLLLLLLLLLLL'),
(4, 1, 'DDDDDDDDDDDDDD', '2019-12-12 00:00:00', '2019-12-12 00:00:00', 'LLLLLLLLLLLLL'),
(5, 1, 'eee', '2019-12-12 00:00:00', '2019-12-12 00:00:00', 'fffff'),
(6, 1, 'uuuuuuuu', '2019-12-12 00:00:00', '2019-12-12 00:00:00', 'mmmmmmm');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'Primul Email', 'parola'),
(2, 'Doi Email', 'parola2'),
(5, 'xxx Nume', 'parolaxxx'),
(6, 'qqq Nume', 'parola qqq'),
(8, 'email@test.com', 'password123'),
(14, 'kiera.skiles@example.net', 'password123'),
(15, 'angeline25@example.org', 'password123'),
(16, 'hudson.eden@example.net', 'password123'),
(17, 'julian67@example.org', 'password123'),
(18, 'schultz.tomasa@example.net', 'password123'),
(19, 'laurel.ratke@example.com', 'password123'),
(20, 'braden.shields@example.org', 'password123'),
(21, 'hkovacek@example.net', 'password123'),
(22, 'pwhite@example.com', 'password123'),
(23, 'quigley.lessie@example.net', 'password123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
