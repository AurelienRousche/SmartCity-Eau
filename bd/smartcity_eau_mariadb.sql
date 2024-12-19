-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 19, 2024 at 09:53 AM
-- Server version: 11.8.0-MariaDB-log
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartcity_eau`
--

-- --------------------------------------------------------

--
-- Table structure for table `capteurs_eau`
--

CREATE TABLE `capteurs_eau` (
  `id_capteur` int(11) NOT NULL,
  `emplacement` varchar(100) NOT NULL,
  `type_capteur` varchar(50) NOT NULL,
  `valeur` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `capteurs_eau`
--

INSERT INTO `capteurs_eau` (`id_capteur`, `emplacement`, `type_capteur`, `valeur`) VALUES
(1, 'Rue Principale', 'consommation', 150.5),
(2, 'Avenue Nord', 'fuite', 0),
(3, 'Quartier Est', 'consommation', 300.2),
(4, 'Boulevard Ouest', 'consommation', 250),
(5, 'Lotissement Sud', 'fuite', 0);

-- --------------------------------------------------------

--
-- Table structure for table `consommation_eau`
--

CREATE TABLE `consommation_eau` (
  `id_consommation` int(11) NOT NULL,
  `quartier` varchar(50) NOT NULL,
  `valeur_litres` float NOT NULL,
  `date_mesure` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consommation_eau`
--

INSERT INTO `consommation_eau` (`id_consommation`, `quartier`, `valeur_litres`, `date_mesure`) VALUES
(1, 'Centre-ville', 2000.5, '2024-06-15 12:00:00'),
(2, 'Quartier Sud', 3500, '2024-06-16 12:00:00'),
(3, 'Quartier Est', 1800.75, '2024-06-17 12:00:00'),
(4, 'Quartier Nord', 2200, '2024-06-18 12:00:00'),
(5, 'Lotissement Ouest', 1950.25, '2024-06-19 12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fuites_eau`
--

CREATE TABLE `fuites_eau` (
  `id_fuite` int(11) NOT NULL,
  `id_capteur` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_signalement` datetime NOT NULL,
  `statut` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fuites_eau`
--

INSERT INTO `fuites_eau` (`id_fuite`, `id_capteur`, `description`, `date_signalement`, `statut`) VALUES
(1, 2, 'Fuite détectée au sol', '2024-06-15 10:00:00', '1'),
(2, 2, 'Réparation en cours', '2024-06-16 14:30:00', '0'),
(3, 5, 'Fuite dans la conduite principale', '2024-06-17 09:30:00', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `capteurs_eau`
--
ALTER TABLE `capteurs_eau`
  ADD PRIMARY KEY (`id_capteur`);

--
-- Indexes for table `consommation_eau`
--
ALTER TABLE `consommation_eau`
  ADD PRIMARY KEY (`id_consommation`);

--
-- Indexes for table `fuites_eau`
--
ALTER TABLE `fuites_eau`
  ADD PRIMARY KEY (`id_fuite`),
  ADD KEY `id_capteur` (`id_capteur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consommation_eau`
--
ALTER TABLE `consommation_eau`
  MODIFY `id_consommation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fuites_eau`
--
ALTER TABLE `fuites_eau`
  MODIFY `id_fuite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fuites_eau`
--
ALTER TABLE `fuites_eau`
  ADD CONSTRAINT `fuites_eau_ibfk_1` FOREIGN KEY (`id_capteur`) REFERENCES `capteurs_eau` (`id_capteur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
