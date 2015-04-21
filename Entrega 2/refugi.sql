-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21-04-2015 a les 13:58:06
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
  `habitacio` varchar(25) NOT NULL,
  `n_persones` int(2) NOT NULL,
  `username` varchar(25) NOT NULL,
  `dia` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Bolcant dades de la taula `reserves`
--

INSERT INTO `reserves` (`n_reserva`, `habitacio`, `n_persones`, `username`, `dia`) VALUES
(1, 'canigo', 5, 'merce', '25/06/2015');

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
  `active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Bolcant dades de la taula `usuaris`
--

INSERT INTO `usuaris` (`user_id`, `username`, `password`, `nom`, `cognoms`, `email`, `data_naixement`, `user_date`, `last_login`, `active`) VALUES
(1, 'alex', '5f4dcc3b5aa765d61d8327deb882cf99', 'Alexandre', 'Martinez Sistach', 'alex@gmail.com', '2014-05-13', '2015-04-08 12:20:40', '2015-04-08 16:16:15', 1),
(2, 'howna13', 'e404b253da46751a429ac447b2e893f3', 'Bru', 'Mas Ribera', 'howna13@gmail.com', '0000-00-00', '0000-00-00 00:00:00', NULL, 1),
(3, 'merce', 'd8b5b939757e2e6c9ac90622b0b60331', 'MercÃ¨', 'Ribera BergÃ³s', 'merceriberab@gmail.com', '0000-00-00', '0000-00-00 00:00:00', NULL, 1),
(4, 'sdasad', '5f4dcc3b5aa765d61d8327deb882cf99', 'dfsasa', '', 'dfsad@sadas.com', '0000-00-00', '0000-00-00 00:00:00', NULL, 0);

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
MODIFY `n_reserva` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `usuaris`
--
ALTER TABLE `usuaris`
MODIFY `user_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
