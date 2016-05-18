-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2016 at 08:04 PM
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
CREATE DATABASE IF NOT EXISTS `risk` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `risk`;

-- --------------------------------------------------------

--
-- Table structure for table `ancien_message`
--

DROP TABLE IF EXISTS `ancien_message`;
CREATE TABLE IF NOT EXISTS `ancien_message` (
  `pseudo` varchar(255) NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ancien_message`
--

INSERT INTO `ancien_message` (`pseudo`, `message`) VALUES
('patrick', 'test'),
('gataf', 'test'),
('gataf', 'ok'),
('patrick', 'test'),
('gataf', 'ok'),
('gataf', 'Je fais un message pour voir si le chat est bien isolé par room'),
('patrick', 'Je parle'),
('gataf', 'ça marche?'),
('gataf', 'test'),
('gataf', 'Cool'),
('patrick', 'bug?'),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('test', ''),
('room_76', 'La partie commence'),
('room_76', 'La partie commence'),
('room_76', 'La partie commence'),
('room_71', 'La partie commence'),
('room_71', 'La partie commence'),
('room_71', 'La partie commence'),
('room_70', 'La partie commence'),
('room_70', 'La partie commence'),
('room_70', 'La partie commence'),
('room_70', 'La partie commence'),
('room_70', 'La partie commence'),
('room_70', 'La partie commence'),
('room_70', 'La partie commence'),
('room_70', 'La partie commence'),
('room_70', 'La partie commence'),
('room_70', 'La partie commence'),
('room_70', 'La partie commence'),
('room_70', 'La partie commence'),
('room_70', 'La partie commence'),
('room_70', 'La partie commence'),
('room_70', 'La partie commence'),
('room_70', 'La partie commence'),
('room_70', 'La partie commence'),
('room_70', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('p', 'dans 3s'),
('p', 'dans 2s'),
('p', 'dans 1s'),
('p', 'dans 0s'),
('p', 'dans -1s'),
('p', 'dans -2s'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('p', 'dans -2s'),
('p', 'dans -1s'),
('p', 'dans 0s'),
('p', 'dans 1s'),
('p', 'dans 2s'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence'),
('room_77', 'La partie commence');

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

DROP TABLE IF EXISTS `chat_messages`;
CREATE TABLE IF NOT EXISTS `chat_messages` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `message_text` longtext NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `message_room_id` int(4) NOT NULL,
  PRIMARY KEY (`message_id`),
  UNIQUE KEY `fk_id_room` (`message_room_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1545 ;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`message_id`, `message_text`, `pseudo`, `timestamp`, `message_room_id`) VALUES
(1544, 'yo', 'gataf', 1463481652, 81);

-- --------------------------------------------------------

--
-- Table structure for table `continent`
--

DROP TABLE IF EXISTS `continent`;
CREATE TABLE IF NOT EXISTS `continent` (
  `cnt_id` int(11) NOT NULL AUTO_INCREMENT,
  `cnt_nom` varchar(40) NOT NULL,
  `cnt_nb_pays` int(11) NOT NULL,
  `cnt_nb_renfort` int(11) NOT NULL DEFAULT '0' COMMENT 'nombre de renfort une fois le continent conquit',
  PRIMARY KEY (`cnt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `continent`
--

INSERT INTO `continent` (`cnt_id`, `cnt_nom`, `cnt_nb_pays`, `cnt_nb_renfort`) VALUES
(1, 'Europe', 7, 5),
(2, 'Asie', 12, 7),
(3, 'Amérique du Nord', 9, 5),
(4, 'Amérique du Sud', 4, 2),
(5, 'Afrique', 6, 3),
(6, 'Océanie', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `couleur`
--

DROP TABLE IF EXISTS `couleur`;
CREATE TABLE IF NOT EXISTS `couleur` (
  `clr_code` varchar(40) CHARACTER SET utf8 NOT NULL,
  `clr_css` varchar(6) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`clr_code`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_bin COMMENT='couleur du site';

--
-- Dumping data for table `couleur`
--

INSERT INTO `couleur` (`clr_code`, `clr_css`) VALUES
('blanc', 'FFFFFF'),
('bleu', '0000FF'),
('jaune', 'FFFF00'),
('noir', '000000'),
('rose', 'FF3366'),
('rouge', 'FF0000'),
('vert', '00FF00');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `img_nom` varchar(60) NOT NULL,
  `img_chemin` varchar(255) DEFAULT 'images/default.png',
  PRIMARY KEY (`img_id`),
  UNIQUE KEY `nom` (`img_nom`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`img_id`, `img_nom`, `img_chemin`) VALUES
(1, 'avatar.png', '0'),
(2, 'avatar2.png', '0'),
(3, 'avatar3.png', '0'),
(4, 'img_news.png', '0'),
(5, 'logo_risk.png', '0'),
(6, 'stats.png', '0');

-- --------------------------------------------------------

--
-- Table structure for table `joueur`
--

DROP TABLE IF EXISTS `joueur`;
CREATE TABLE IF NOT EXISTS `joueur` (
  `usr_id` int(11) NOT NULL,
  `stats_id` int(11) DEFAULT NULL,
  `nb_pays` int(11) NOT NULL DEFAULT '0',
  `nb_continent` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`usr_id`),
  KEY `fk_user_id` (`usr_id`),
  KEY `fk_stats_id` (`stats_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `joueur`
--

INSERT INTO `joueur` (`usr_id`, `stats_id`, `nb_pays`, `nb_continent`) VALUES
(0, 1, 0, 0),
(11, 1, 0, 0),
(14, 1, 0, 0),
(16, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `nws_id` int(11) NOT NULL AUTO_INCREMENT,
  `nws_titre` varchar(40) NOT NULL,
  `nws_contenu` text NOT NULL,
  `nws_date` date NOT NULL,
  `id_img` int(11) DEFAULT '1',
  PRIMARY KEY (`nws_id`),
  KEY `fk_image_id` (`id_img`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`nws_id`, `nws_titre`, `nws_contenu`, `nws_date`, `id_img`) VALUES
(1, 'News jeu', 'GDC 2016 : Un Star Wars : Battlefront exclusif au Playstation VR en préparation ', '2016-03-01', 1),
(2, 'News hardware', 'GDC 2016 : Playstation VR, disponible en octobre 2016 pour la somme de 399 euros ! ', '2016-03-02', 2),
(3, 'News bon plan', 'PlayStation Store : Derniers jours de promos sur les exclus numériques !', '2016-03-04', 3),
(4, 'News jeu', 'Far Cry Primal : Le Patch 1.02 disponible sur PS4 et Xbox One ', '2016-03-09', 4),
(5, 'News bon plan', 'Promo : The Division à - 25% ', '2016-03-13', 4),
(6, 'News jeu', 'XING : The Land Beyond compatible avec le Playstation VR ', '2016-03-13', 5),
(7, 'News culture', 'Metro 2033 : L''adaptation cinématographique hérite du producteur de 50 Shades of Grey ', '2016-03-15', 6);

-- --------------------------------------------------------

--
-- Table structure for table `partie`
--

DROP TABLE IF EXISTS `partie`;
CREATE TABLE IF NOT EXISTS `partie` (
  `id_partie` int(11) NOT NULL AUTO_INCREMENT,
  `nb_joueurs` int(6) NOT NULL DEFAULT '0',
  `date_crea` date NOT NULL COMMENT 'avec l''heure',
  `date_maj` date NOT NULL COMMENT 'avec l''heure',
  `map` int(11) DEFAULT NULL COMMENT 'On reste sur la Terre',
  `a_qui_le_tour` int(11) DEFAULT NULL,
  `partie_statut` varchar(20) NOT NULL,
  PRIMARY KEY (`id_partie`),
  KEY `fk_a_qui_le_tour` (`a_qui_le_tour`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=120 ;

--
-- Dumping data for table `partie`
--

INSERT INTO `partie` (`id_partie`, `nb_joueurs`, `date_crea`, `date_maj`, `map`, `a_qui_le_tour`, `partie_statut`) VALUES
(118, 2, '2016-05-18', '2016-05-18', 0, 11, 'init'),
(119, 2, '2016-05-18', '2016-05-18', 0, 11, 'init');

-- --------------------------------------------------------

--
-- Table structure for table `partie_has_joueur`
--

DROP TABLE IF EXISTS `partie_has_joueur`;
CREATE TABLE IF NOT EXISTS `partie_has_joueur` (
  `id_partie` int(11) NOT NULL,
  `id_joueur` int(11) NOT NULL,
  `code_clr` varchar(40) DEFAULT NULL,
  `joueur_dans_partie` int(2) NOT NULL,
  PRIMARY KEY (`id_partie`,`id_joueur`),
  KEY `fk_partie` (`id_partie`),
  KEY `fk_joueur` (`id_joueur`),
  KEY `fk_code_clr` (`code_clr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `partie_has_joueur`
--

INSERT INTO `partie_has_joueur` (`id_partie`, `id_joueur`, `code_clr`, `joueur_dans_partie`) VALUES
(118, 11, 'blanc', 0),
(118, 16, 'blanc', 0),
(119, 11, 'blanc', 0),
(119, 16, 'blanc', 0);

-- --------------------------------------------------------

--
-- Table structure for table `partie_has_joueur_has_pays`
--

DROP TABLE IF EXISTS `partie_has_joueur_has_pays`;
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

--
-- Dumping data for table `partie_has_joueur_has_pays`
--

INSERT INTO `partie_has_joueur_has_pays` (`id_partie`, `id_joueur`, `id_pays`, `nb_pions`) VALUES
(119, 11, 1, 1),
(119, 11, 3, 1),
(119, 11, 5, 1),
(119, 11, 7, 1),
(119, 11, 8, 1),
(119, 11, 11, 1),
(119, 11, 13, 1),
(119, 11, 16, 1),
(119, 11, 17, 1),
(119, 11, 18, 1),
(119, 11, 20, 1),
(119, 11, 21, 1),
(119, 11, 23, 1),
(119, 11, 24, 1),
(119, 11, 26, 1),
(119, 11, 28, 1),
(119, 11, 35, 1),
(119, 11, 36, 1),
(119, 11, 38, 1),
(119, 11, 39, 1),
(119, 11, 40, 1),
(119, 16, 2, 1),
(119, 16, 4, 1),
(119, 16, 6, 1),
(119, 16, 9, 1),
(119, 16, 10, 1),
(119, 16, 12, 1),
(119, 16, 14, 1),
(119, 16, 15, 1),
(119, 16, 19, 1),
(119, 16, 22, 1),
(119, 16, 25, 1),
(119, 16, 27, 1),
(119, 16, 29, 1),
(119, 16, 30, 1),
(119, 16, 31, 1),
(119, 16, 32, 1),
(119, 16, 33, 1),
(119, 16, 34, 1),
(119, 16, 37, 1),
(119, 16, 41, 1),
(119, 16, 42, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pays`
--

DROP TABLE IF EXISTS `pays`;
CREATE TABLE IF NOT EXISTS `pays` (
  `id_pays` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) NOT NULL,
  `continent_id` int(11) NOT NULL COMMENT 'Continent du pays',
  PRIMARY KEY (`id_pays`),
  KEY `fk_continent_id` (`continent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `pays`
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

-- --------------------------------------------------------

--
-- Table structure for table `pays1_has_pays2`
--

DROP TABLE IF EXISTS `pays1_has_pays2`;
CREATE TABLE IF NOT EXISTS `pays1_has_pays2` (
  `id_pays1` int(11) NOT NULL,
  `id_pays2` int(11) NOT NULL,
  PRIMARY KEY (`id_pays1`,`id_pays2`),
  KEY `fk_pays1` (`id_pays1`),
  KEY `fk_pays2` (`id_pays2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Frontière entre les pays';

--
-- Dumping data for table `pays1_has_pays2`
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

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE IF NOT EXISTS `room` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_date_creation` date DEFAULT NULL,
  `room_nb_joueur` int(11) DEFAULT '0',
  `room_password` varchar(60) DEFAULT NULL COMMENT 'Mot de passe d''une room',
  `room_name` varchar(60) NOT NULL,
  `statut_room` varchar(15) NOT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Table de définition d''une room' AUTO_INCREMENT=85 ;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_date_creation`, `room_nb_joueur`, `room_password`, `room_name`, `statut_room`) VALUES
(64, '2016-05-16', 2, NULL, 'test room 2', 'supprime'),
(65, '2016-05-16', 2, NULL, 'test gataf', 'supprime'),
(66, '2016-05-16', 4, NULL, 'ok20', 'supprime'),
(67, '2016-05-16', 4, NULL, 'test begin', 'supprime'),
(68, '2016-05-16', 4, NULL, 'ok gataf', 'supprime'),
(69, '2016-05-16', 4, NULL, 'test commence', 'supprime'),
(70, '2016-05-16', 4, NULL, 'ezg', 'supprime'),
(71, '2016-05-16', 4, NULL, 'test', 'supprime'),
(72, '2016-05-16', 4, NULL, 'ezg', 'supprime'),
(73, '2016-05-16', 4, NULL, 'gezg', 'supprime'),
(74, '2016-05-16', 4, NULL, 'fzeaf', 'supprime'),
(75, '2016-05-16', 4, NULL, 'eg', 'supprime'),
(76, '2016-05-16', 4, NULL, 'ezg', 'supprime'),
(77, '2016-05-16', 4, NULL, 'tentgfhgesdbn', 'supprime'),
(78, '2016-05-16', 4, NULL, 'test p', 'supprime'),
(79, '2016-05-16', 4, NULL, 'test r', 'supprime'),
(80, '2016-05-16', 4, NULL, 'gzeg', 'en partie'),
(81, '2016-05-17', 4, NULL, 'aeg', 'en partie'),
(82, '2016-05-17', 4, NULL, 'test', 'supprime'),
(83, '2016-05-17', 4, NULL, 'egzg', 'supprime'),
(84, '2016-05-17', 4, NULL, 'zegez', 'en partie');

-- --------------------------------------------------------

--
-- Table structure for table `stats_joueur`
--

DROP TABLE IF EXISTS `stats_joueur`;
CREATE TABLE IF NOT EXISTS `stats_joueur` (
  `id_stats` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_stats`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `stats_joueur`
--

INSERT INTO `stats_joueur` (`id_stats`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `stats_user`
--

DROP TABLE IF EXISTS `stats_user`;
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

DROP TABLE IF EXISTS `statut_user`;
CREATE TABLE IF NOT EXISTS `statut_user` (
  `sta_code` varchar(40) NOT NULL,
  `sta_nom` varchar(40) DEFAULT NULL,
  `sta_class` varchar(255) NOT NULL DEFAULT 'offline',
  PRIMARY KEY (`sta_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statut_user`
--

INSERT INTO `statut_user` (`sta_code`, `sta_nom`, `sta_class`) VALUES
('gam', 'Occupé', 'ingame'),
('off', 'Hors Ligne', 'offline'),
('on', 'En Ligne', 'online');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `usr_id` int(11) NOT NULL AUTO_INCREMENT,
  `usr_pseudo` varchar(40) NOT NULL,
  `usr_password` varchar(40) NOT NULL,
  `usr_email` varchar(40) DEFAULT NULL,
  `usr_date_inscription` date DEFAULT NULL,
  `id_img` int(11) DEFAULT '1',
  `code_sta` varchar(40) DEFAULT 'off' COMMENT '(ex: en ligne ...)',
  `usr_level` int(4) DEFAULT NULL,
  PRIMARY KEY (`usr_id`),
  KEY `fk_statut` (`code_sta`),
  KEY `fk_image_id` (`id_img`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`usr_id`, `usr_pseudo`, `usr_password`, `usr_email`, `usr_date_inscription`, `id_img`, `code_sta`, `usr_level`) VALUES
(2, 'Mathilde', '2226544ec104d654102a154fb4c2de52', NULL, '2016-01-05', 3, 'gam', 1),
(3, 'Luc', '893785018d20a58cf029e2e9fa6aacf8', NULL, '2016-03-11', 1, 'off', 1),
(4, 'Vivien', 'f7d71c05a57c4f4300601662e5eba4ae', NULL, '2015-11-16', 4, 'on', 1),
(5, 'Ali', '7a9b46ab6d983a85dd4d9a1aa64a3945', NULL, '2016-03-01', 1, 'on', 1),
(6, 'Max', '6a061313d22e51e0f25b7cd4dc065233', NULL, '2016-03-08', 5, 'off', 1),
(11, 'gataf', '098f6bcd4621d373cade4e832627b4f6', NULL, '2016-05-11', 1, 'gam', 1),
(12, 'test', '098f6bcd4621d373cade4e832627b4f6', NULL, '2016-05-11', 1, 'off', 1),
(14, 'patrick', '098f6bcd4621d373cade4e832627b4f6', NULL, '2016-05-15', 1, 'off', 1),
(15, 'caf', '098f6bcd4621d373cade4e832627b4f6', NULL, '2016-05-15', 1, 'off', 1),
(16, 'p', '098f6bcd4621d373cade4e832627b4f6', NULL, '2016-05-15', 1, 'gam', 0),
(17, 't', '098f6bcd4621d373cade4e832627b4f6', NULL, '2016-05-15', 1, 'off', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user1_has_user2`
--

DROP TABLE IF EXISTS `user1_has_user2`;
CREATE TABLE IF NOT EXISTS `user1_has_user2` (
  `id_usr1` int(11) NOT NULL,
  `id_usr2` int(11) NOT NULL,
  PRIMARY KEY (`id_usr1`,`id_usr2`),
  KEY `fk_id_user1` (`id_usr1`),
  KEY `fk_id_user2` (`id_usr2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Table pour les liens d''amitié';

--
-- Dumping data for table `user1_has_user2`
--

INSERT INTO `user1_has_user2` (`id_usr1`, `id_usr2`) VALUES
(2, 3),
(2, 4),
(2, 6),
(3, 2),
(3, 4),
(4, 2),
(4, 3),
(6, 2),
(6, 11),
(11, 6),
(11, 12),
(11, 14),
(11, 17),
(12, 11),
(14, 11),
(17, 11);

-- --------------------------------------------------------

--
-- Table structure for table `user_has_room`
--

DROP TABLE IF EXISTS `user_has_room`;
CREATE TABLE IF NOT EXISTS `user_has_room` (
  `id_room` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `usr_admin` tinyint(1) NOT NULL,
  `statut_usr_room` varchar(20) DEFAULT NULL COMMENT '''in'' ou ''out''',
  PRIMARY KEY (`id_room`,`id_user`),
  KEY `fk_id_room` (`id_room`),
  KEY `fk_id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_has_room`
--

INSERT INTO `user_has_room` (`id_room`, `id_user`, `usr_admin`, `statut_usr_room`) VALUES
(82, 11, 0, 'out'),
(82, 16, 0, 'out'),
(83, 11, 0, 'out'),
(83, 16, 0, 'out'),
(84, 11, 1, 'in'),
(84, 16, 0, 'in');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `joueur`
--
ALTER TABLE `joueur`
  ADD CONSTRAINT `joueur_ibfk_2` FOREIGN KEY (`stats_id`) REFERENCES `stats_joueur` (`id_stats`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`id_img`) REFERENCES `image` (`img_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `partie_has_joueur`
--
ALTER TABLE `partie_has_joueur`
  ADD CONSTRAINT `partie_has_joueur_ibfk_2` FOREIGN KEY (`id_joueur`) REFERENCES `joueur` (`usr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `partie_has_joueur_ibfk_3` FOREIGN KEY (`code_clr`) REFERENCES `couleur` (`clr_code`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `partie_has_joueur_has_pays`
--
ALTER TABLE `partie_has_joueur_has_pays`
  ADD CONSTRAINT `partie_has_joueur_has_pays_ibfk_2` FOREIGN KEY (`id_joueur`) REFERENCES `joueur` (`usr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `partie_has_joueur_has_pays_ibfk_3` FOREIGN KEY (`id_pays`) REFERENCES `pays` (`id_pays`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pays`
--
ALTER TABLE `pays`
  ADD CONSTRAINT `pays_ibfk_1` FOREIGN KEY (`continent_id`) REFERENCES `continent` (`cnt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pays1_has_pays2`
--
ALTER TABLE `pays1_has_pays2`
  ADD CONSTRAINT `pays1_has_pays2_ibfk_1` FOREIGN KEY (`id_pays1`) REFERENCES `pays` (`id_pays`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pays1_has_pays2_ibfk_2` FOREIGN KEY (`id_pays2`) REFERENCES `pays` (`id_pays`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
