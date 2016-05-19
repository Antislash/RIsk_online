-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 19 Mai 2016 à 15:47
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `risk`
--

-- --------------------------------------------------------

--
-- Structure de la table `couleur`
--

CREATE TABLE IF NOT EXISTS `couleur` (
  `clr_code` varchar(40) CHARACTER SET utf8 NOT NULL,
  `clr_css` varchar(6) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`clr_code`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_bin COMMENT='couleur du site';

--
-- Contenu de la table `couleur`
--

INSERT INTO `couleur` (`clr_code`, `clr_css`) VALUES
('blanc', 'FFFFFF'),
('bleu', '393977'),
('jaune', 'fdff5a'),
('noir', '000000'),
('orange', 'c96605'),
('rouge', 'ba0c0c'),
('vert', '61b567');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
