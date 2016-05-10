-- phpMyAdmin SQL Dump
-- version 4.0.10.12
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 16 Mars 2016 à 11:26
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



--
-- Contenu de la table `continent`
--

INSERT INTO `continent` (`id_continent`, `nom`, `nb_pays`, `nb_renfort`) VALUES
(1, 'Europe', 7, 5),
(2, 'Asie', 12, 7),
(3, 'Amérique du Nord', 9, 5),
(4, 'Amérique du Sud', 4, 2),
(5, 'Afrique', 6, 3),
(6, 'Océanie', 4, 2);

--
-- Contenu de la table `image`
--

INSERT INTO `image` (`id_image`, `nom`, `chemin`) VALUES
(1, 'avatar.png', NULL),
(2, 'avatar2.png', NULL),
(3, 'avatar3.png', NULL),
(4, 'img_news.png', NULL),
(5, 'logo_risk.png', NULL),
(6, 'stats.png', NULL);

--
-- Contenu de la table `actualites`
--

INSERT INTO `actualites` (`id_actualite`, `titre`, `contenu`, `date`, `image_id`) VALUES
(1, 'News jeu', 'GDC 2016 : Un Star Wars : Battlefront exclusif au Playstation VR en préparation ', '2016-03-01', 1),
(2, 'News hardware', 'GDC 2016 : Playstation VR, disponible en octobre 2016 pour la somme de 399 euros ! ', '2016-03-02', 2),
(3, 'News bon plan', 'PlayStation Store : Derniers jours de promos sur les exclus numériques !', '2016-03-04', 3),
(4, 'News jeu', 'Far Cry Primal : Le Patch 1.02 disponible sur PS4 et Xbox One ', '2016-03-09', 4),
(5, 'News bon plan', 'Promo : The Division à - 25% ', '2016-03-13', 4),
(6, 'News jeu', 'XING : The Land Beyond compatible avec le Playstation VR ', '2016-03-13', 5),
(7, 'News culture', 'Metro 2033 : L''adaptation cinématographique hérite du producteur de 50 Shades of Grey ', '2016-03-15', 6);

--
-- Contenu de la table `pays`
--

INSERT INTO `pays` (`id_pays`, `nom`, `continent_id`) VALUES
(1, 'Grande-Bretagne', 1),
(2, 'Islande', 1),
(3, 'Europe du Nord', 1),
(4, 'Scandinavie', 1),
(5, 'Europe du Sud', 1),
(6, 'Ukraine', 1),
(7, 'Europe occidentale', 1),
(8, 'Afghanistan', 2),
(9, 'Chine', 2),
(10, 'Inde', 2),
(11, 'Tchita', 2),
(12, 'Japon', 2),
(13, 'Kamchatka', 2),
(14, 'Moyen-Orient', 2),
(15, 'Mongolie', 2),
(16, 'Siam', 2),
(17, 'Sibérie', 2),
(18, 'Oural', 2),
(19, 'Yakoutie', 2),
(20, 'Alaska', 3),
(21, 'Alberta', 3),
(22, 'Amérique centrale', 3),
(23, 'États de l''Est', 3),
(24, 'Groenland', 3),
(25, 'Territoires du Nord-Ouest', 3),
(26, 'Ontario', 3),
(27, 'Québec', 3),
(28, 'États de l''Ouest', 3),
(29, 'Argentine', 4),
(30, 'Brésil', 4),
(31, 'Pérou', 4),
(32, 'Venezuela', 4),
(33, 'Congo', 5),
(34, 'Afrique de l''Est', 5),
(35, 'Égypte', 5),
(36, 'Madagascar', 5),
(37, 'Afrique du Nord', 5),
(38, 'Afrique du Sud', 5),
(39, 'Australie Orientale', 6),
(40, 'Indonésie', 6),
(41, 'Nouvelle-Guinée', 6),
(42, 'Australie Occidentale', 6);

--
-- Contenu de la table `pays1_has_pays2`
--

INSERT INTO `pays1_has_pays2` (`id_pays1`, `id_pays2`) VALUES
(1, 2),
(1, 3),
(1, 4),
(1, 7),
(2, 1),
(2, 4),
(2, 24),
(3, 1),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(4, 1),
(4, 2),
(4, 3),
(4, 6),
(5, 3),
(5, 6),
(5, 7),
(5, 14),
(5, 35),
(5, 37),
(6, 3),
(6, 4),
(6, 5),
(6, 8),
(6, 14),
(6, 18),
(7, 1),
(7, 3),
(7, 5),
(7, 37),
(8, 6),
(8, 9),
(8, 10),
(8, 14),
(8, 18),
(9, 8),
(9, 10),
(9, 15),
(9, 16),
(9, 17),
(9, 18),
(10, 8),
(10, 9),
(10, 14),
(10, 16),
(11, 13),
(11, 15),
(11, 17),
(11, 19),
(12, 13),
(12, 15),
(13, 11),
(13, 12),
(13, 15),
(13, 19),
(13, 20),
(14, 5),
(14, 6),
(14, 8),
(14, 10),
(14, 34),
(14, 35),
(15, 9),
(15, 11),
(15, 12),
(15, 13),
(15, 17),
(16, 9),
(16, 10),
(16, 40),
(17, 9),
(17, 11),
(17, 15),
(17, 18),
(17, 19),
(18, 6),
(18, 8),
(18, 9),
(18, 17),
(19, 11),
(19, 13),
(19, 17),
(20, 13),
(20, 21),
(20, 25),
(21, 20),
(21, 25),
(21, 26),
(21, 28),
(22, 23),
(22, 28),
(22, 32),
(23, 22),
(23, 26),
(23, 27),
(23, 28),
(24, 2),
(24, 25),
(24, 26),
(24, 27),
(25, 20),
(25, 21),
(25, 24),
(25, 26),
(26, 21),
(26, 23),
(26, 24),
(26, 25),
(26, 27),
(26, 28),
(27, 23),
(27, 24),
(27, 26),
(28, 21),
(28, 22),
(28, 23),
(28, 26),
(29, 30),
(29, 31),
(30, 29),
(30, 31),
(30, 32),
(30, 37),
(31, 29),
(31, 30),
(31, 32),
(32, 22),
(32, 30),
(32, 31),
(33, 34),
(33, 37),
(33, 38),
(34, 14),
(34, 33),
(34, 35),
(34, 36),
(34, 37),
(34, 38),
(35, 5),
(35, 14),
(35, 34),
(35, 37),
(36, 34),
(36, 38),
(37, 5),
(37, 7),
(37, 30),
(37, 33),
(37, 34),
(37, 35),
(38, 33),
(38, 34),
(38, 36),
(39, 41),
(39, 42),
(40, 16),
(40, 41),
(40, 42),
(41, 39),
(41, 40),
(41, 42),
(42, 39),
(42, 40),
(42, 41);

--
-- Contenu de la table `statut_user`
--

INSERT INTO `statut_user` (`nom`, `nom_complet`) VALUES
('gam', 'Occupé'),
('off', 'Hors Ligne'),
('on', 'En Ligne');

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `pseudo`, `password`, `email`, `date_inscription`, `image_id`, `statut`) VALUES
(2, 'Mathilde', '2226544ec104d654102a154fb4c2de52', NULL, '2016-01-05', 3, 'gam'),
(3, 'Luc', '893785018d20a58cf029e2e9fa6aacf8', NULL, '2016-03-11', NULL, 'off'),
(4, 'Vivien', 'f7d71c05a57c4f4300601662e5eba4ae', NULL, '2015-11-16', 4, 'on'),
(5, 'Ali', '7a9b46ab6d983a85dd4d9a1aa64a3945', NULL, '2016-03-01', 1, 'on'),
(6, 'Max', '6a061313d22e51e0f25b7cd4dc065233', NULL, '2016-03-08', 5, 'off');

--
-- Contenu de la table `user1_has_user2`
--

INSERT INTO `user1_has_user2` (`id_user1`, `id_user2`) VALUES
(2, 3),
(2, 4),
(2, 6),
(3, 2),
(3, 4),
(4, 2),
(4, 3),
(6, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
