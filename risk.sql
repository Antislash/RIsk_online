-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 02 Mars 2016 à 17:13
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
-- Structure de la table `continent`
--
CREATE DATABASE Risk;
USE risk;

CREATE TABLE IF NOT EXISTS `continent` (
  `nom` varchar(40) CHARACTER SET utf8 NOT NULL,
  `nb_pays` int(11) NOT NULL,
  PRIMARY KEY (`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `continent_has_pays`
--

CREATE TABLE IF NOT EXISTS `continent_has_pays` (
  `nom_continent` varchar(40) NOT NULL,
  `nom_pays` varchar(40) NOT NULL,
  PRIMARY KEY (`nom_continent`,`nom_pays`),
  KEY `fk_nom_continent` (`nom_continent`),
  KEY `fk_nom_pays` (`nom_pays`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

CREATE TABLE IF NOT EXISTS `joueur` (
  `user_id` int(11) NOT NULL,
  `nb_pays` int(11) NOT NULL DEFAULT '0',
  `nb_continent` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  KEY `fk_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `partie`
--

CREATE TABLE IF NOT EXISTS `partie` (
  `id_partie` int(11) NOT NULL,
  `date_crea` date NOT NULL COMMENT 'avec l''heure',
  `date_maj` date NOT NULL COMMENT 'avec l''heure',
  `map` int(11) NOT NULL COMMENT 'On reste sur la Terre',
  `a_qui_le_tour` int(11) NOT NULL,
  PRIMARY KEY (`id_partie`),
  KEY `fk_a_qui_le_tour` (`a_qui_le_tour`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE IF NOT EXISTS `pays` (
  `nom` varchar(40) CHARACTER SET utf8 NOT NULL,
  `joueur_id` int(11) NOT NULL,
  `nb_pions` int(11) NOT NULL,
  PRIMARY KEY (`nom`),
  KEY `fk_joueur_id` (`joueur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `stats_joueur`
--

CREATE TABLE IF NOT EXISTS `stats_joueur` (
  `joueur_id` int(11) NOT NULL COMMENT 'Ajouter des statistiques',
  PRIMARY KEY (`joueur_id`),
  KEY `fk_joueur_id` (`joueur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `statut_user`
--

CREATE TABLE IF NOT EXISTS `statut_user` (
  `id_statut` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_statut`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `statut_user`
--

INSERT INTO `statut_user` (`id_statut`, `nom`) VALUES
(1, 'En Ligne'),
(2, 'Hors Ligne'),
(3, 'Occupé');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table pour les liens d''amitié';

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(40) CHARACTER SET utf8 NOT NULL,
  `email` varchar(40) CHARACTER SET utf8,
  `avatar` varchar(40) CHARACTER SET utf8 NOT NULL,
  `date_inscription` date,
  `statut` int(11) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `fk_statut` (`statut`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `continent_has_pays`
--
ALTER TABLE `continent_has_pays`
  ADD CONSTRAINT `continent_has_pays_ibfk_2` FOREIGN KEY (`nom_pays`) REFERENCES `pays` (`nom`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `continent_has_pays_ibfk_1` FOREIGN KEY (`nom_continent`) REFERENCES `continent` (`nom`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD CONSTRAINT `joueur_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `utilisateur` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `partie`
--
ALTER TABLE `partie`
  ADD CONSTRAINT `partie_ibfk_1` FOREIGN KEY (`a_qui_le_tour`) REFERENCES `joueur` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `partie_has_user`
--
ALTER TABLE `partie_has_user`
  ADD CONSTRAINT `partie_has_user_ibfk_2` FOREIGN KEY (`id_joueur`) REFERENCES `joueur` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `partie_has_user_ibfk_1` FOREIGN KEY (`id_partie`) REFERENCES `partie` (`id_partie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `pays`
--
ALTER TABLE `pays`
  ADD CONSTRAINT `pays_ibfk_1` FOREIGN KEY (`joueur_id`) REFERENCES `joueur` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `stats_joueur`
--
ALTER TABLE `stats_joueur`
  ADD CONSTRAINT `stats_joueur_ibfk_1` FOREIGN KEY (`joueur_id`) REFERENCES `joueur` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `stats_user`
--
ALTER TABLE `stats_user`
  ADD CONSTRAINT `stats_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `utilisateur` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `user1_has_user2`
--
ALTER TABLE `user1_has_user2`
  ADD CONSTRAINT `user1_has_user2_ibfk_2` FOREIGN KEY (`id_user2`) REFERENCES `utilisateur` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user1_has_user2_ibfk_1` FOREIGN KEY (`id_user1`) REFERENCES `utilisateur` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`statut`) REFERENCES `statut_user` (`id_statut`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
