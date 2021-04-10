-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 10 avr. 2021 à 21:12
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestiondev`
--

-- --------------------------------------------------------

--
-- Structure de la table `developpeurs`
--

DROP TABLE IF EXISTS `developpeurs`;
CREATE TABLE IF NOT EXISTS `developpeurs` (
  `id_dev` int(11) NOT NULL AUTO_INCREMENT,
  `nom_dev` varchar(20) DEFAULT NULL,
  `prenom_dev` varchar(20) DEFAULT NULL,
  `email_dev` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_dev`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `developpeurs`
--

INSERT INTO `developpeurs` (`id_dev`, `nom_dev`, `prenom_dev`, `email_dev`) VALUES
(5, 'MERIMI', 'Mehdi', 'mhidomer@gmail.com'),
(6, 'LAGHMAM', 'Bilal', 'bilallaghmam@gmail.com'),
(7, 'AYADI', 'Oussama', 'ayadiossama44@gmail.com'),
(8, 'MANSSOURI', 'Ilyass', 'ilyassber123@gmail.com'),
(9, 'Badr', 'Jaouad', 'jawad@gmail.com'),
(10, 'mohemed', 'Tejinni', 'tijini@gmail.com'),
(11, 'Dros', 'Dizzy', 'dizzyd@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `technos`
--

DROP TABLE IF EXISTS `technos`;
CREATE TABLE IF NOT EXISTS `technos` (
  `id_technos` int(11) NOT NULL AUTO_INCREMENT,
  `html` int(11) DEFAULT NULL,
  `cgi` int(11) DEFAULT NULL,
  `js` int(11) DEFAULT NULL,
  `ajax` int(11) DEFAULT NULL,
  `php` int(11) DEFAULT NULL,
  `id_dev` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_technos`),
  KEY `id_dev` (`id_dev`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `technos`
--

INSERT INTO `technos` (`id_technos`, `html`, `cgi`, `js`, `ajax`, `php`, `id_dev`) VALUES
(5, 5, 1, 1, 1, 1, 5),
(6, 1, 1, 1, 1, 1, 5),
(7, 5, 3, 0, 1, -1, 6),
(8, 2, 5, 4, -1, 2, 9),
(9, 1, 0, 3, 4, 2, 11),
(10, -1, 0, 5, 2, 4, 10);

-- --------------------------------------------------------

--
-- Structure de la table `user_table`
--

DROP TABLE IF EXISTS `user_table`;
CREATE TABLE IF NOT EXISTS `user_table` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom_user` varchar(30) DEFAULT NULL,
  `prenom_user` varchar(30) DEFAULT NULL,
  `email_user` varchar(100) DEFAULT NULL,
  `password_user` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user_table`
--

INSERT INTO `user_table` (`id_user`, `nom_user`, `prenom_user`, `email_user`, `password_user`) VALUES
(1, 'Mehdi', 'MERIMI', 'mhidomer@gmail.com', 'azerty'),
(5, 'Batata', 'ayadi', 'ayadiossama44@gmail.com', 'a'),
(6, 'MERIMI', 'bataata', 'mhifkjez@gmail.com', 'azerty'),
(7, '', '', '', ''),
(8, 'laghmam', 'bilal', 'mhifkjez@gmail.com', 'a'),
(9, '', '', '', ''),
(10, '', '', '', ''),
(11, '', '', '', ''),
(12, '', '', '', ''),
(13, 'mimi', '9amar', 'oussama@gmail.com', 'a'),
(14, 'mimi', '9amar', 'oussama@gmail.com', 'a'),
(15, 'ag', 'zezr', 'zqrs@gmail.com', ''),
(16, 'KALB', 'KALB', 'mhidomer@gmail.com', '$2y$10$8rJDCTfKA7WXE.asmLBVcuiK7u6e5F0EWtPzGdtkmGngSPdc4uahG'),
(17, 'mhd', 'mr', 'mr@gmail.com', '$2y$10$HwfwToD7d2BFGmI2DaXntOZ4wqaUHx36b9JW2YgHzZHQ15yyCUOi.');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `technos`
--
ALTER TABLE `technos`
  ADD CONSTRAINT `technos_ibfk_1` FOREIGN KEY (`id_dev`) REFERENCES `developpeurs` (`id_dev`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
