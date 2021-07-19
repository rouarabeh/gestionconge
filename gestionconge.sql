-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 19, 2021 at 09:15 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestionconge`
--

-- --------------------------------------------------------

--
-- Table structure for table `demande_conge`
--

DROP TABLE IF EXISTS `demande_conge`;
CREATE TABLE IF NOT EXISTS `demande_conge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `duree` int(11) NOT NULL,
  `id_employe` int(11) NOT NULL,
  `id_type_conge` int(11) NOT NULL,
  `demande` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_employe` (`id_employe`),
  KEY `id_type_conge` (`id_type_conge`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `demande_conge`
--

INSERT INTO `demande_conge` (`id`, `date_debut`, `date_fin`, `duree`, `id_employe`, `id_type_conge`, `demande`) VALUES
(2, '2021-07-27', '2021-07-27', 1, 105, 2, 'AcceptÃ©'),
(7, '2021-07-21', '2021-07-21', 1, 105, 2, 'AcceptÃ©');

-- --------------------------------------------------------

--
-- Table structure for table `employe`
--

DROP TABLE IF EXISTS `employe`;
CREATE TABLE IF NOT EXISTS `employe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `CIN` varchar(8) NOT NULL,
  `Tel` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `date_embauche` date NOT NULL,
  `id_service` int(11) NOT NULL,
  `matricule` varchar(8) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `reste_conge` int(11) NOT NULL,
  `Type_emp` varchar(5) DEFAULT 'user',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `matricule` (`matricule`),
  KEY `service_1` (`id_service`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employe`
--

INSERT INTO `employe` (`id`, `nom`, `prenom`, `CIN`, `Tel`, `email`, `date_embauche`, `id_service`, `matricule`, `date_de_naissance`, `reste_conge`, `Type_emp`) VALUES
(76, 'Rouaa', 'Rabah', '0', 12345678, 'exemple@domain.com', '2021-07-11', 8, '111', '1996-08-11', 25, 'admin'),
(105, 'Soltani', 'Marwen', '07983622', 222, 'marouensoltani@gmail.com', '2021-07-13', 6, '22', '2021-07-01', 25, 'user'),
(110, 'aaa', 'aaa', '777', 777, 'aaa@aaa.com', '2021-07-14', 3, '777', '2021-07-14', 25, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Service` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `Service`) VALUES
(1, '-'),
(2, 'Technicien Informatique'),
(3, 'Service Maintenance'),
(4, 'Service Comptabilité'),
(6, 'Ressources Humaine'),
(7, 'Développeur front-end'),
(8, 'Développeur back-end'),
(9, 'Réception'),
(10, 'Designer'),
(11, 'Administrateur Système'),
(12, 'Full Stack developer');

-- --------------------------------------------------------

--
-- Table structure for table `type_conge`
--

DROP TABLE IF EXISTS `type_conge`;
CREATE TABLE IF NOT EXISTS `type_conge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type_conge`
--

INSERT INTO `type_conge` (`id`, `type`) VALUES
(1, '-'),
(2, 'Congé annuel'),
(3, 'Congé exceptionnel'),
(4, 'Autorisation'),
(5, 'Congé de maladie'),
(6, 'Maternité');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employe`
--
ALTER TABLE `employe`
  ADD CONSTRAINT `service_1` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
