-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2016 at 09:57 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `risk`
--

-- --------------------------------------------------------

--
-- Table structure for table `ancien_message`
--

CREATE TABLE IF NOT EXISTS `ancien_message` (
  `pseudo` varchar(255) NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE IF NOT EXISTS `chat_messages` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `message_text` longtext CHARACTER SET latin1 COLLATE latin1_german1_ci NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `timestamp` int(11) NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=169 ;

-- --------------------------------------------------------

--
-- Table structure for table `continent`
--

CREATE TABLE IF NOT EXISTS `continent` (
  `cnt_id` int(11) NOT NULL AUTO_INCREMENT,
  `cnt_nom` varchar(40) NOT NULL,
  `cnt_nb_pays` int(11) NOT NULL,
  `cnt_nb_renfort` int(11) NOT NULL DEFAULT '0' COMMENT 'nombre de renfort une fois le continent conquit',
  PRIMARY KEY (`cnt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `img_nom` varchar(60) NOT NULL,
  `img_chemin` varchar(255) DEFAULT 'images/default.png',
  PRIMARY KEY (`img_id`),
  UNIQUE KEY `nom` (`img_nom`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `joueur`
--

CREATE TABLE IF NOT EXISTS `joueur` (
  `usr_id` int(11) NOT NULL,
  `stats_id` int(11) DEFAULT NULL,
  `nb_pays` int(11) NOT NULL DEFAULT '0',
  `nb_continent` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`usr_id`),
  KEY `fk_user_id` (`usr_id`),
  KEY `fk_stats_id` (`stats_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `nws_id` int(11) NOT NULL AUTO_INCREMENT,
  `nws_titre` varchar(40) NOT NULL,
  `nws_contenu` text NOT NULL,
  `nws_date` date NOT NULL,
  `id_img` int(11) DEFAULT '1',
  PRIMARY KEY (`nws_id`),
  KEY `fk_image_id` (`id_img`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `partie`
--

CREATE TABLE IF NOT EXISTS `partie` (
  `id_partie` int(11) NOT NULL,
  `nb_joueurs` int(6) NOT NULL DEFAULT '0',
  `date_crea` date NOT NULL COMMENT 'avec l''heure',
  `date_maj` date NOT NULL COMMENT 'avec l''heure',
  `map` int(11) DEFAULT NULL COMMENT 'On reste sur la Terre',
  `a_qui_le_tour` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_partie`),
  KEY `fk_a_qui_le_tour` (`a_qui_le_tour`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `partie_has_joueur`
--

CREATE TABLE IF NOT EXISTS `partie_has_joueur` (
  `id_partie` int(11) NOT NULL,
  `id_joueur` int(11) NOT NULL,
  PRIMARY KEY (`id_partie`,`id_joueur`),
  KEY `fk_partie` (`id_partie`),
  KEY `fk_joueur` (`id_joueur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `partie_has_joueur_has_pays`
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
-- Table structure for table `pays`
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
-- Table structure for table `pays1_has_pays2`
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
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_date_creation` date DEFAULT NULL,
  `room_nb_joueur` int(11) DEFAULT '0',
  `room_password` varchar(60) DEFAULT NULL COMMENT 'Mot de passe d''une room',
  `room_name` varchar(60) NOT NULL,
  `statut_room` varchar(15) NOT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Table de définition d''une room' AUTO_INCREMENT=35 ;

-- --------------------------------------------------------

--
-- Table structure for table `stats_joueur`
--

CREATE TABLE IF NOT EXISTS `stats_joueur` (
  `id_stats` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_stats`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stats_user`
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
-- Table structure for table `statut_user`
--

CREATE TABLE IF NOT EXISTS `statut_user` (
  `sta_code` varchar(40) NOT NULL,
  `sta_nom` varchar(40) DEFAULT NULL,
  `sta_class` varchar(255) NOT NULL DEFAULT 'offline',
  PRIMARY KEY (`sta_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `usr_id` int(11) NOT NULL AUTO_INCREMENT,
  `usr_pseudo` varchar(40) NOT NULL,
  `usr_password` varchar(40) NOT NULL,
  `usr_email` varchar(40) DEFAULT NULL,
  `usr_date_inscription` date DEFAULT NULL,
  `id_img` int(11) DEFAULT '1',
  `code_sta` varchar(40) DEFAULT 'off' COMMENT '(ex: en ligne ...)',
  PRIMARY KEY (`usr_id`),
  KEY `fk_statut` (`code_sta`),
  KEY `fk_image_id` (`id_img`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Table structure for table `user1_has_user2`
--

CREATE TABLE IF NOT EXISTS `user1_has_user2` (
  `id_usr1` int(11) NOT NULL,
  `id_usr2` int(11) NOT NULL,
  PRIMARY KEY (`id_usr1`,`id_usr2`),
  KEY `fk_id_user1` (`id_usr1`),
  KEY `fk_id_user2` (`id_usr2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Table pour les liens d''amitié';

-- --------------------------------------------------------

--
-- Table structure for table `user_has_room`
--

CREATE TABLE IF NOT EXISTS `user_has_room` (
  `id_room` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `usr_admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_room`,`id_user`),
  KEY `fk_id_room` (`id_room`),
  KEY `fk_id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `joueur`
--
ALTER TABLE `joueur`
  ADD CONSTRAINT `joueur_ibfk_1` FOREIGN KEY (`usr_id`) REFERENCES `user` (`usr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `joueur_ibfk_2` FOREIGN KEY (`stats_id`) REFERENCES `stats_joueur` (`id_stats`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`id_img`) REFERENCES `image` (`img_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `partie`
--
ALTER TABLE `partie`
  ADD CONSTRAINT `partie_ibfk_1` FOREIGN KEY (`a_qui_le_tour`) REFERENCES `joueur` (`usr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `partie_has_joueur`
--
ALTER TABLE `partie_has_joueur`
  ADD CONSTRAINT `partie_has_joueur_ibfk_1` FOREIGN KEY (`id_partie`) REFERENCES `partie` (`id_partie`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `partie_has_joueur_ibfk_2` FOREIGN KEY (`id_joueur`) REFERENCES `joueur` (`usr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `partie_has_joueur_has_pays`
--
ALTER TABLE `partie_has_joueur_has_pays`
  ADD CONSTRAINT `partie_has_joueur_has_pays_ibfk_3` FOREIGN KEY (`id_pays`) REFERENCES `pays` (`id_pays`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `partie_has_joueur_has_pays_ibfk_1` FOREIGN KEY (`id_partie`) REFERENCES `partie` (`id_partie`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `partie_has_joueur_has_pays_ibfk_2` FOREIGN KEY (`id_joueur`) REFERENCES `joueur` (`usr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pays`
--
ALTER TABLE `pays`
  ADD CONSTRAINT `pays_ibfk_1` FOREIGN KEY (`continent_id`) REFERENCES `continent` (`cnt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pays1_has_pays2`
--
ALTER TABLE `pays1_has_pays2`
  ADD CONSTRAINT `pays1_has_pays2_ibfk_2` FOREIGN KEY (`id_pays2`) REFERENCES `pays` (`id_pays`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pays1_has_pays2_ibfk_1` FOREIGN KEY (`id_pays1`) REFERENCES `pays` (`id_pays`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `stats_user`
--
ALTER TABLE `stats_user`
  ADD CONSTRAINT `stats_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`usr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`code_sta`) REFERENCES `statut_user` (`sta_code`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`id_img`) REFERENCES `image` (`img_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user1_has_user2`
--
ALTER TABLE `user1_has_user2`
  ADD CONSTRAINT `user1_has_user2_ibfk_1` FOREIGN KEY (`id_usr1`) REFERENCES `user` (`usr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user1_has_user2_ibfk_2` FOREIGN KEY (`id_usr2`) REFERENCES `user` (`usr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_has_room`
--
ALTER TABLE `user_has_room`
  ADD CONSTRAINT `user_has_room_ibfk_1` FOREIGN KEY (`id_room`) REFERENCES `room` (`room_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_has_room_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`usr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
