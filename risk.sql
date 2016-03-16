-- phpMyAdmin SQL Dump
-- version 4.0.10.12
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 16 Mars 2016 à 11:24
-- Version du serveur: 5.1.73
-- Version de PHP: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `risk`
--
CREATE DATABASE IF NOT EXISTS `risk` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `risk`;

-- --------------------------------------------------------

--
-- Structure de la table `actualites`
--

CREATE TABLE IF NOT EXISTS `actualites` (
  `id_actualite` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(40) NOT NULL,
  `contenu` text NOT NULL,
  `date` date NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_actualite`),
  KEY `fk_image_id` (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Structure de la table `continent`
--

CREATE TABLE IF NOT EXISTS `continent` (
  `id_continent` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) NOT NULL,
  `nb_pays` int(11) NOT NULL,
  `nb_renfort` int(11) NOT NULL DEFAULT '0' COMMENT 'nombre de renfort une fois le continent conquit',
  PRIMARY KEY (`id_continent`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id_image` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(60) NOT NULL,
  `chemin` int(100) DEFAULT NULL,
  PRIMARY KEY (`id_image`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

CREATE TABLE IF NOT EXISTS `joueur` (
  `user_id` int(11) NOT NULL,
  `stats_id` int(11) NOT NULL,
  `nb_pays` int(11) NOT NULL DEFAULT '0',
  `nb_continent` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  KEY `fk_user_id` (`user_id`),
  KEY `fk_stats_id` (`stats_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `partie`
--

CREATE TABLE IF NOT EXISTS `partie` (
  `id_partie` int(11) NOT NULL,
  `date_crea` date NOT NULL COMMENT 'avec l''heure',
  `date_maj` date NOT NULL COMMENT 'avec l''heure',
  `map` int(11) NOT NULL COMMENT 'On reste sur la Terre',
  `a_qui_le_tour` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_partie`),
  KEY `fk_a_qui_le_tour` (`a_qui_le_tour`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `partie_has_joueur_has_pays`
--

CREATE TABLE IF NOT EXISTS `partie_has_joueur_has_pays` (
  `id_partie` int(11) NOT NULL,
  `id_joueur` int(11) NOT NULL,
  `id_pays` int(11) NOT NULL,
  `nb_pions` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_partie`,`id_joueur`,`id_pays`),
  KEY `fk_id_partie` (`id_partie`),
  KEY `fk_id_joueur` (`id_joueur`),
  KEY `fk_id_pays` (`id_pays`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Table pour savoir qui possède quel pays pour une partie';

-- --------------------------------------------------------

--
-- Structure de la table `partie_has_user`
--

CREATE TABLE IF NOT EXISTS `partie_has_user` (
  `id_partie` int(11) NOT NULL,
  `id_joueur` int(11) NOT NULL,
  PRIMARY KEY (`id_partie`,`id_joueur`),
  KEY `fk_partie` (`id_partie`),
  KEY `fk_joueur` (`id_joueur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE IF NOT EXISTS `pays` (
  `id_pays` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) NOT NULL,
  `continent_id` int(11) NOT NULL COMMENT 'Continent du pays',
  PRIMARY KEY (`id_pays`),
  KEY `fk_continent_id` (`continent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

-- --------------------------------------------------------

--
-- Structure de la table `pays1_has_pays2`
--

CREATE TABLE IF NOT EXISTS `pays1_has_pays2` (
  `id_pays1` int(11) NOT NULL,
  `id_pays2` int(11) NOT NULL,
  PRIMARY KEY (`id_pays1`,`id_pays2`),
  KEY `fk_pays1` (`id_pays1`),
  KEY `fk_pays2` (`id_pays2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Frontière entre les pays';

-- --------------------------------------------------------

--
-- Structure de la table `stats_joueur`
--

CREATE TABLE IF NOT EXISTS `stats_joueur` (
  `id_stats` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_stats`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `stats_user`
--

CREATE TABLE IF NOT EXISTS `stats_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `niveau` int(11) NOT NULL DEFAULT '0',
  `nb_parties_jouees` int(11) NOT NULL DEFAULT '0',
  `nb_parties_gagnees` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  KEY `fk_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `statut_user`
--

CREATE TABLE IF NOT EXISTS `statut_user` (
  `nom` varchar(40) NOT NULL,
  `nom_complet` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `date_inscription` date DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL COMMENT 'Avatar (TODO: mettre avatar par défaut)',
  `statut` varchar(40) DEFAULT 'off' COMMENT '(ex: en ligne ...)',
  PRIMARY KEY (`id_user`),
  KEY `fk_statut` (`statut`),
  KEY `fk_image_id` (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Structure de la table `user1_has_user2`
--

CREATE TABLE IF NOT EXISTS `user1_has_user2` (
  `id_user1` int(11) NOT NULL,
  `id_user2` int(11) NOT NULL,
  PRIMARY KEY (`id_user1`,`id_user2`),
  KEY `fk_id_user1` (`id_user1`),
  KEY `fk_id_user2` (`id_user2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Table pour les liens d''amitié';

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `actualites`
--
ALTER TABLE `actualites`
  ADD CONSTRAINT `actualites_ibfk_1` FOREIGN KEY (`image_id`) REFERENCES `image` (`id_image`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD CONSTRAINT `joueur_ibfk_2` FOREIGN KEY (`stats_id`) REFERENCES `stats_joueur` (`id_stats`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `joueur_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `partie`
--
ALTER TABLE `partie`
  ADD CONSTRAINT `partie_ibfk_1` FOREIGN KEY (`a_qui_le_tour`) REFERENCES `joueur` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `partie_has_joueur_has_pays`
--
ALTER TABLE `partie_has_joueur_has_pays`
  ADD CONSTRAINT `partie_has_joueur_has_pays_ibfk_3` FOREIGN KEY (`id_pays`) REFERENCES `pays` (`id_pays`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `partie_has_joueur_has_pays_ibfk_1` FOREIGN KEY (`id_partie`) REFERENCES `partie` (`id_partie`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `partie_has_joueur_has_pays_ibfk_2` FOREIGN KEY (`id_joueur`) REFERENCES `joueur` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `partie_has_user`
--
ALTER TABLE `partie_has_user`
  ADD CONSTRAINT `partie_has_user_ibfk_1` FOREIGN KEY (`id_partie`) REFERENCES `partie` (`id_partie`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `partie_has_user_ibfk_2` FOREIGN KEY (`id_joueur`) REFERENCES `joueur` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `pays`
--
ALTER TABLE `pays`
  ADD CONSTRAINT `pays_ibfk_1` FOREIGN KEY (`continent_id`) REFERENCES `continent` (`id_continent`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `pays1_has_pays2`
--
ALTER TABLE `pays1_has_pays2`
  ADD CONSTRAINT `pays1_has_pays2_ibfk_2` FOREIGN KEY (`id_pays2`) REFERENCES `pays` (`id_pays`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pays1_has_pays2_ibfk_1` FOREIGN KEY (`id_pays1`) REFERENCES `pays` (`id_pays`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `stats_user`
--
ALTER TABLE `stats_user`
  ADD CONSTRAINT `stats_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`statut`) REFERENCES `statut_user` (`nom`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`image_id`) REFERENCES `image` (`id_image`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `user1_has_user2`
--
ALTER TABLE `user1_has_user2`
  ADD CONSTRAINT `user1_has_user2_ibfk_1` FOREIGN KEY (`id_user1`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user1_has_user2_ibfk_2` FOREIGN KEY (`id_user2`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
