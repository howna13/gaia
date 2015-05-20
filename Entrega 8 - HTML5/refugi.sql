-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18-05-2015 a les 03:09:16
-- Versió del servidor: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `refugi`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `habitacions`
--

CREATE TABLE IF NOT EXISTS `habitacions` (
`hab_id` int(3) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `places` int(11) NOT NULL,
  `preu` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Bolcant dades de la taula `habitacions`
--

INSERT INTO `habitacions` (`hab_id`, `nom`, `places`, `preu`) VALUES
(1, 'canigo', 10, 10),
(2, 'pedraforca', 25, 8),
(3, 'peguera', 20, 9);

-- --------------------------------------------------------

--
-- Estructura de la taula `reserves`
--

CREATE TABLE IF NOT EXISTS `reserves` (
`n_reserva` int(6) NOT NULL,
  `habitacio` varchar(25) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `n_persones` int(2) NOT NULL,
  `username` varchar(25) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `dia` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `sopar` varchar(2) NOT NULL,
  `esmorzar` varchar(2) NOT NULL,
  `picnic` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de la taula `usuaris`
--

CREATE TABLE IF NOT EXISTS `usuaris` (
`user_id` int(8) NOT NULL,
  `username` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `nom` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `cognoms` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `data_naixement` date NOT NULL,
  `user_date` datetime NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Bolcant dades de la taula `usuaris`
--

INSERT INTO `usuaris` (`user_id`, `username`, `password`, `nom`, `cognoms`, `email`, `data_naixement`, `user_date`, `last_login`, `active`) VALUES
(36, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'Admin', '', 'admin@gaia.com', '0000-00-00', '0000-00-00 00:00:00', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `habitacions`
--
ALTER TABLE `habitacions`
 ADD PRIMARY KEY (`hab_id`);

--
-- Indexes for table `reserves`
--
ALTER TABLE `reserves`
 ADD PRIMARY KEY (`n_reserva`);

--
-- Indexes for table `usuaris`
--
ALTER TABLE `usuaris`
 ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `habitacions`
--
ALTER TABLE `habitacions`
MODIFY `hab_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `reserves`
--
ALTER TABLE `reserves`
MODIFY `n_reserva` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuaris`
--
ALTER TABLE `usuaris`
MODIFY `user_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
